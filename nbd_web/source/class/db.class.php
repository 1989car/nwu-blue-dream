<?php

defined('IN_SITE') || exit(header('HTTP/1.0 400 Bad Request'));

/**
 * DB 抽象类
 * 其中主要是创建了一个静态变量$db，所有集成类的对象实例化到$db中方便调用
 * 该抽象类初始化时候根据配置文件存入$db变量，并调用子类进行DB实例化，使用DB::init()进行调用
 * 本类只实现了一个静态方法，并规定了其子类必须实现的一些方法。
 *
 */

class DB_Exception extends Exception
{

}

abstract class DB {
	const DB_FETCH_ASSOC    = 1;
	const DB_FETCH_ARRAY    = 3;
	const DB_FETCH_ROW      = 2;
	const DB_FETCH_DEFAULT  = self::DB_FETCH_ASSOC;

	public static $db;
	protected static $dbType = array('mysqli' => 'MySQLi', 'oracle' => 'Oracle');

	protected $uConn;
	protected $qConn;
	protected $dsn;
	protected $dbKey;
	protected $fecthMode;
	protected $sql;
	protected $sqls;
	protected $qrs;
	protected $urs;
	protected $uSqls;
	protected $qSqls;
	protected $queryNum;
	protected $updateNum;

	protected function __construct() {
	}

	/**
	 * DB初始化
	 *
	 * @param array $dsn 配置文件中的DB信息
	 * @param string $dbKey 配置中的数据库KEY名
	 * @param const $fetchMode 返回数据的KEY类型
	 * @return array|DB DB对象
	 */
	public static function &init(& $dsn, $dbKey, $fetchMode = self::DB_FETCH_ASSOC) {
		$key = "['" . str_replace('.', "']['",  $dbKey) . "']";
		eval('$flag = isset(self::$db' . $key . ');');
		eval("\$dbInfo = \$dsn" . $key . ";");
		if (!$flag) {
			$class_name = 'DB_' . self::$dbType[strtolower($dbInfo['dbType'])];
			$obj = new $class_name($dbInfo, $dbKey, $fetchMode);
			eval('self::$db' . $key . ' =& $obj;');
			unset($obj);
		}
		return self::$db;
	}

	public abstract function connect($type = "slave");
	public abstract function close();
	public abstract function query($sql, $limit = null, $quick = false);
	public abstract function update($sql);
	public abstract function getOne($sql);
	public abstract function getCol($sql, $limit = null);
	public abstract function getRow($sql, $fetchMode = self::DB_FETCH_DEFAULT);
	public abstract function getAll($sql, $limit = null, $fetchMode = self::DB_FETCH_DEFAULT);
}

class DB_MySQLi extends DB {
	/**
	 * MySQLi构造函数
	 *
	 * @param array $dbInfo 数据库配置信息
	 * @param string $dbKey db的key
	 * @param 返回的数据格式 $fetchMode
	 */
	public function __construct(& $dbInfo, $dbKey, $fetchMode) {
		$this->dbKey = $dbKey;
		$this->dsn =& $dbInfo;
		$this->fecthMode = $fetchMode;
	}

	/**
	 * 连接数据库
	 *
	 * 连接数据库之前可能需要改变DSN，一般不建议使用此方法
	 *
	 * @param string $type 选择连接主服务器或者从服务器
	 * @return boolean
	 */
	public function connect($type = "slave") {
		if ($type == "master" || !isset($this->dsn["slave"])) {
			$dbHost = isset($this->dsn["master"]) ? $this->dsn["master"]["dbHost"] : $this->dsn["dbHost"];
			$dbName = isset($this->dsn["master"]) ? $this->dsn["master"]["dbName"] : $this->dsn["dbName"];
			$dbUser = isset($this->dsn["master"]) ? $this->dsn["master"]["dbUser"] : $this->dsn["dbUser"];
			$dbPass = isset($this->dsn["master"]) ? $this->dsn["master"]["dbPass"] : $this->dsn["dbPass"];
			$this->uConn = mysqli_connect($dbHost, $dbUser, $dbPass);
			if (!$this->uConn) {
				throw new DB_Exception('更新数据库连接失败');
			}
			if (!mysqli_select_db($this->uConn, $dbName)) {
				throw new DB_Exception('更新数据库选择失败');
			}
			if (!isset($this->dsn["slave"])) {
				$this->qConn =& $this->uConn;
			}
		} else {
			if (empty($this->dsn["slave"])) {
				$this->connect('master');
				return $this->qConn =& $this->uConn;
			}
			if (empty($_COOKIE[COOKIE_PREFIX . $this->dbKey . 'DbNo'])) {
				$dbNo = array_rand($this->dsn["slave"]);
				setcookie(COOKIE_PREFIX . $this->dbKey . 'DbNo', $dbNo, null, COOKIE_PATH, COOKIE_DOMAIN);
			} else {
				$dbNo = $_COOKIE[COOKIE_PREFIX . $this->dbKey . 'DbNo'];
			}
			$dbInfo = $this->dsn["slave"][$dbNo];
			$dbHost = $dbInfo["dbHost"];
			$dbName = $dbInfo["dbName"];
			$dbUser = $dbInfo["dbUser"];
			$dbPass = $dbInfo["dbPass"];
			$this->qConn = mysqli_connect($dbHost, $dbUser, $dbPass);

			if (!$this->qConn) {
				if (!$this->uConn) {
					$this->connect('slave');
				}
				$this->qConn =& $this->uConn;
				if (!$this->qConn) {
					throw new DB_Exception('查询数据库连接失败');
				}
			} else {
				if (!mysqli_select_db($this->qConn, $dbName)) {
					throw new DB_Exception('查询数据库选择失败');
				}
			}
		}
		return true;
	}

	/**
	 * 关闭数据库连接
	 *
	 * 一般不需要调用此方法
	 */
	public function close() {
		if ($this->uConn === $this->qConn) {
			if (is_object($this->uConn)) {
				mysqli_close($this->uConn);
			}
		} else {
			if (is_object($this->uConn)) {
				mysqli_close($this->uConn);
			}
			if (is_object($this->qConn)) {
				mysqli_close($this->qConn);
			}
		}
	}

	/**
	 * 执行一个SQL查询
	 *
	 * 本函数仅限于执行SELECT类型的SQL语句
	 *
	 * @param string $sql SQL查询语句
	 * @param mixed $limit 整型或者字符串类型，如10|10,10
	 * @param boolean $quick 是否快速查询
	 * @return resource 返回查询结果资源句柄
	 */
	public function query($sql, $limit = null, $quick = false) {
		if ($limit != null) {
			$sql = $sql . " LIMIT " . $limit;
		}
		$this->sqls[] = $sql;
		$this->qSqls[] = $sql;
		$this->sql = $sql;

		if (!$this->qConn) {
			$this->connect("slave");
		}

		$this->qrs = mysqli_query($this->qConn, $sql, $quick ? MYSQLI_USE_RESULT : MYSQLI_STORE_RESULT);
		if (!$this->qrs) {
			throw new DB_Exception('查询失败:' . mysqli_error($this->qConn));
		} else {
			$this->queryNum++;
			return $this->qrs;
		}
	}

	/**
	 * 获取结果集
	 *
	 * @param resource $rs 查询结果资源句柄
	 * @param const $fetchMode 返回的数据格式
	 * @return array 返回数据集每一行，并将$rs指针下移
	 */
	public function fetch($rs, $fetchMode = self::DB_FETCH_DEFAULT) {
		switch ($fetchMode) {
			case 1:
				$fetchMode = self::DB_FETCH_ASSOC;
				break;
			case 2:
				$fetchMode = self::DB_FETCH_ROW;
				break;
			case 3:
				$fetchMode = self::DB_FETCH_ARRAY;
				break;
			default:
				$fetchMode = self::DB_FETCH_DEFAULT;
				break;
		}
		return mysqli_fetch_array($rs, $fetchMode);
	}

	/**
	 * 执行一个SQL更新
	 *
	 * 本方法仅限数据库UPDATE操作
	 *
	 * @param string $sql 数据库更新SQL语句
	 * @return boolean
	 */
	public function update($sql) {
		$this->sql = $sql;
		$this->sqls[] = $this->sql;
		$this->uSqls[] = $this->sql;
		if (!$this->uConn) {
			$this->connect("master");
		}

		$this->urs = mysqli_query($this->uConn, $sql);

		if (!$this->urs) {
			throw new DB_Exception('更新失败:' . mysqli_error($this->uConn));
		} else {
			$this->updateNum++;
			return $this->urs;
		}
	}

	/**
	 * 返回SQL语句执行结果集中的第一行第一列数据
	 *
	 * @param string $sql 需要执行的SQL语句
	 * @return mixed 查询结果
	 */
	public function getOne($sql) {
		if (!$rs = $this->query($sql, 1, true)) {
			return false;
		}
		$row = $this->fetch($rs, self::DB_FETCH_ROW);
		$this->free($rs);
		return $row[0];
	}

	/**
	 * 返回SQL语句执行结果集中的第一列数据
	 *
	 * @param string $sql 需要执行的SQL语句
	 * @param mixed $limit 整型或者字符串类型，如10|10,10
	 * @return array 结果集数组
	 */
	public function getCol($sql, $limit = null) {
		if (!$rs = $this->query($sql, $limit, true)) {
			return false;
		}
		$result = array();
		while ($rows = $this->fetch($rs, self::DB_FETCH_ROW)) {
			$result[] = $rows[0];
		}
		$this->free($rs);
		return $result;
	}

	/**
	 * 返回SQL语句执行结果中的第一行数据
	 *
	 * @param string $sql 需要执行的SQL语句
	 * @param const $fetchMode 返回的数据格式
	 * @return array 结果集数组
	 */
	public function getRow($sql, $fetchMode = self::DB_FETCH_DEFAULT) {
		if (!$rs = $this->query($sql, 1, true)) {
			return false;
		}
		$row = $this->fetch($rs, $fetchMode);
		$this->free($rs);
		return $row;
	}

	/**
	 * 返回SQL语句执行结果中的所有行数据
	 *
	 * @param string $sql 需要执行的SQL语句
	 * @param mixed $limit 整型或者字符串类型，如10|10,10
	 * @param const $fetchMode 返回的数据格式
	 * @return array 结果集二维数组
	 */
	public function getAll($sql, $limit = null, $fetchMode = self::DB_FETCH_DEFAULT) {
		if (!$rs = $this->query($sql, $limit, true)) {
			return false;
		}
		$allRows = array();
		while($row = $this->fetch($rs, $fetchMode)) {
			$allRows[] = $row;
		}
		$this->free($rs);
		return $allRows;
	}

	/**
	 * 设置是否开启事务(是否自动提交)
	 *
	 * 当设置为false的时候,即开启事务处理模式,表类型应该为INNODB
	 *
	 * @param boolean $mode
	 * @return boolean
	 */
	public function autoCommit($mode = false) {
		return mysqli_autocommit($this->uConn, $mode);
	}

	/**
	 * 提交执行的SQL
	 *
	 * 当开启事务处理后,要手动提交执行的SQL语句
	 *
	 * @return boolean
	 */
	public function commit() {
		return mysqli_commit($this->uConn);
	}

	/**
	 * 回滚
	 *
	 * 当开启事务处理后,有需要的时候进行回滚
	 *
	 * @return boolean
	 */
	public function rollback() {
		return mysqli_rollback($this->uConn);
	}

	/**
	 * 返回最近一次查询返回的结果集条数
	 *
	 * @return int
	 */
	public function rows($rs) {
		return mysqli_num_rows($rs);
	}

	/**
	 * 返回最近一次插入语句的自增长字段的值
	 *
	 * @return int
	 */
	public function lastID() {
		return mysqli_insert_id($this->uConn);
	}

	/**
	 * 释放当前查询结果资源句柄
	 *
	 */
	public function free($rs) {
		if ($rs) {
			return mysqli_free_result($rs);
		}
	}

	/**
	 * 转义需要插入或者更新的字段值
	 *
	 * 在所有查询和更新的字段变量都需要调用此方法处理数据
	 *
	 * @param mixed $str 需要处理的变量
	 * @return mixed 返回转义后的结果
	 */
	public function escape($str) {
		return addslashes($str);
	}

	/**
	 * 析构函数，暂时不需要做什么处理
	 *
	 */
	public function __destruct() {
	}
}

class DB_Oracle extends DB {
	protected $limit;
	protected $autoCommit = OCI_COMMIT_ON_SUCCESS;

	public function __construct(& $dbInfo, $dbKey, $fetchMode) {
		$this->dbKey = $dbKey;
		$this->dsn =& $dbInfo;
		$this->fecthMode = $fetchMode;
	}

	public function connect($type = "slave") {
		global $_configs;
		if ($type == "master" || !isset($this->dsn["slave"])) {
			$dbName = isset($this->dsn["master"]) ? $this->dsn["master"]["dbName"] : $this->dsn["dbName"];
			$dbUser = isset($this->dsn["master"]) ? $this->dsn["master"]["dbUser"] : $this->dsn["dbUser"];
			$dbPass = isset($this->dsn["master"]) ? $this->dsn["master"]["dbPass"] : $this->dsn["dbPass"];
			$this->uConn = oci_new_connect($dbUser, $dbPass, $dbName);
			if (!$this->uConn) {
				throw new DB_Exception('更新数据库连接失败');
			}
			if (!isset($this->dsn["slave"])) {
				$this->qConn =& $this->uConn;
			}
		} else {
			if (empty($this->dsn["slave"])) {
				$this->connect('master');
				return $this->qConn =& $this->uConn;
			}
			if (empty($_COOKIE[COOKIE_PREFIX . $this->dbKey . 'DbNo'])) {
				$dbNo = array_rand($this->dsn["slave"]);
				setcookie(COOKIE_PREFIX . $this->dbKey . 'DbNo', $dbNo, null, COOKIE_PATH, COOKIE_DOMAIN);
			} else {
				$dbNo = $_COOKIE[COOKIE_PREFIX . $this->dbKey . 'DbNo'];
			}
			$dbInfo = $this->dsn["slave"][$dbNo];
			$dbName = $dbInfo["dbName"];
			$dbUser = $dbInfo["dbUser"];
			$dbPass = $dbInfo["dbPass"];
			$this->qConn = oci_new_connect($dbUser, $dbPass, $dbName);

			if (!$this->qConn) {
				if (!$this->uConn) {
					$this->connect('slave');
				}
				$this->qConn =& $this->uConn;
				if (!$this->qConn) {
					throw new DB_Exception('查询数据库选择失败');
				}
			}
		}
		return true;
	}

	public function close() {
		if (is_resource($this->uConn)) {
			oci_close($this->uConn);
		}
		if (is_resource($this->qConn)) {
			oci_close($this->qConn);
		}
	}

	public function query($sql, $limit = null, $quick = false) {
		if ($limit != null) {
			$limit = explode(',', $limit);
			foreach ($limit as $key => $value) {
				$limit[$key] = (int) trim($value);
			}
			if (count($limit) == 1) {
				$limit[1] = $limit[0];
				$limit[0] = 0;
			}
		} else {
			$limit[0] = 0;
			$limit[1] = -1;
		}
		$this->sqls[] = $sql;
		$this->qSqls[] = $sql;
		$this->sql = $sql;
		$this->limit = $limit;

		if (!$this->qConn) {
			$this->connect("slave");
		}
		if (!$this->qrs = oci_parse($this->qConn, $sql)) {
			$e = oci_error($this->qrs);
			throw new DB_Exception('SQL解析失败:' . $e['message']);
		}

		if (!oci_execute($this->qrs, $this->autoCommit)) {
			$e = oci_error($this->qrs);
			throw new DB_Exception('查询执行失败:' . $e['message']);
		}
		$this->queryNum++;
		return $this->qrs;
	}

	public function fetch($rs, $fetchMode = self::DB_FETCH_DEFAULT) {
		switch ($fetchMode) {
			case 1:
				$fetchMode = self::DB_FETCH_ASSOC;
				break;
			case 2:
				$fetchMode = self::DB_FETCH_ROW;
				break;
			case 3:
				$fetchMode = self::DB_FETCH_ARRAY;
				break;
			default:
				$fetchMode = self::DB_FETCH_DEFAULT;
				break;
		}
		$record = oci_fetch_array($rs, $fetchMode);
		return $record;
	}

	public function update($sql) {
		$this->sql = $sql;
		$this->sqls[] = $this->sql;
		$this->uSqls[] = $this->sql;
		if (!$this->uConn) {
			$this->connect("master");
		}

		if (!$this->urs = oci_parse($this->uConn, $sql)) {
			$e = oci_error($this->urs);
			throw new DB_Exception('SQL解析失败:' . $e['message']);
		}

		if (!oci_execute($this->urs, $this->autoCommit)) {
			$e = oci_error($this->urs);
			throw new DB_Exception('更新失败:' . $e['message']);
		} else {
			$this->updateNum++;
			return $this->urs;
		}
	}

	public function getOne($sql) {
		if (!$rs = $this->query($sql, 1, true)) {
			return false;
		}
		$result = array();
		oci_fetch_all($rs, $result, $this->limit[0], $this->limit[1], self::DB_FETCH_ROW);
		$this->free();
		return $result[0][0];
	}

	public function getCol($sql, $limit = null) {
		if (!$rs = $this->query($sql, $limit, true)) {
			return false;
		}
		$result = array();
		oci_fetch_all($rs, $result, $this->limit[0], $this->limit[1], self::DB_FETCH_ROW);
		foreach ($result as $key => $value) {
			$this->free();
			return $value;
		}
	}

	public function getRow($sql, $fetchMode = self::DB_FETCH_DEFAULT) {
		if (!$rs = $this->query($sql, 1, true)) {
			return false;
		}
		oci_fetch_all($rs, $result, $this->limit[0], $this->limit[1], $fetchMode);
		$result = $this->changeData($result);
		$this->free();
		return $result[0];
	}

	public function getAll($sql, $limit = null, $fetchMode = self::DB_FETCH_DEFAULT) {
		if (!$rs = $this->query($sql, $limit, true)) {
			return false;
		}
		$result = array();
		oci_fetch_all($rs, $result, $this->limit[0], $this->limit[1], $fetchMode);
		$result = $this->changeData($result);
		$this->free();
		return $result;
	}

	public function changeData($data) {
		$result = array();
		if (is_array($data)) {
			foreach ($data as $key => $value) {
				if (is_array($value)) {
					// 将Oracle以下划线作为分割符的字段名转换为驼峰式
					$key = strtolower($key);
					$key = preg_replace('/(?<=\w)_(\w)/e', 'strtoupper("\1")', $key);
					foreach ($value as $k => $v) {
						$result[$k][$key] = $v;
					}
				}
			}
		}
		return $result;
	}

	public function rows() {
		return oci_num_rows($this->qrs);
	}

	public function free() {
		if ($this->qrs) {
			oci_free_statement($this->qrs);
		}
		if ($this->urs) {
			oci_free_statement($this->urs);
		}
		$this->qrs = null;
		$this->urs = null;
	}

	public function escape($str) {
		if (is_array($str)) {
			foreach ($str as $key => $value) {
				$str[$key] = $this->escape($value);
			}
		} else {
			return str_replace("'", "''", $str);
		}
	}

	/**
	 * 设置是否开启事务(是否自动提交)
	 *
	 * 当设置为false的时候,即开启事务处理模式,表类型应该为INNODB
	 *
	 * @param boolean $mode
	 * @return boolean
	 */
	public function autoCommit($mode = false) {
		if ($mode) {
			$this->autoCommit = OCI_COMMIT_ON_SUCCESS;
		} else {
			$this->autoCommit = OCI_DEFAULT;
		}
	}

	/**
	 * 提交执行的SQL
	 *
	 * 当开启事务处理后,要手动提交执行的SQL语句
	 *
	 * @return boolean
	 */
	public function commit() {
		return oci_commit($this->uConn);
	}

	/**
	 * 回滚
	 *
	 * 当开启事务处理后,有需要的时候进行回滚
	 *
	 * @return boolean
	 */
	public function rollback() {
		return oci_rollback($this->uConn);
	}

	public function __destruct() {
	}
}



?>