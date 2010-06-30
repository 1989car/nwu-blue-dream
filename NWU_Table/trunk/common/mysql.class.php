<?php

/*
 * 数据库封装类
 * Oishi 2010.6.27 建立
 */

class mysql 
{
	private $host,$uname,$upass,$db,$scode;
	public $charset,$pre,$PRE_PASS;
	
	
	function __construct ($host = 'localhost', $uname = 'root', $upass = '', $db = '',$pre = 'nwu_',$PRE_PASS = 'oishi',$scode = 'utf8')
	{
		$this->host = $host;
		$this->uname = $uname;
		$this->upass = $upass;
		$this->db = $db;
		$this->pre = $pre;
		$this->PRE_PASS = $PRE_PASS;
		$this->scode = $scode;
		$this->charset = $scode;
		$this->connect($this->host, $this->uname, $this->upass, $this->db, $this->pre,$this->PRE_PASS,$this->scode);
	}
	
	
    //建立连接
    function connect($host, $uname, $upass, $db, $pre, $tPRE_PASS, $scode)
    {
    	$conn = mysql_connect($host,$uname,$upass) or die($this->error());
    	mysql_select_db($db,$conn) or die($this->error());
    	mysql_query('set names'.$scode);
    }
    
    //查询制定表所有字段
    function query_all($tbname)
    {
    	$query = mysql_query("select * from $tbname") or die($this->error());
    	return $query;
    }
    
    //普通查询
    function query($sql)
    {
    	//$query = mysql_query($sql) or die("sql:".$sql."<br>error:".$this->error());
    	$query = mysql_query($sql) or die("error:".$this->error());
    	return $query;
    }
    
    //获取字段内容
    function fetch($re)
    {
    	$row = mysql_fetch_array($re);
    	return $row;
    }
    
    //获取字段内容
    function fetchrow($re)
    {
    	$row = mysql_fetch_row($re);
    	return $row;
    }
    
    //获得刚刚插入的id
    function insertid()
    {
    	return mysql_insert_id();
    }
    
    //显示mysql错误
    function error()
    {
    	return mysql_error();
    }
    
    //关闭数据库 
    function close()
    {
    	return mysql_close();
    }
    
    function __call($n,$v)
    {
    	echo "无效类 $n";
    }
    
    function __destruct()
    {
    	$this->close();
    }
}

?>