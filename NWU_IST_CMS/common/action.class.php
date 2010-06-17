<?php


/*
 * Author:webfly  webfly@gmail.com
 * Date:  2010-1-23
 * Site:  http://Wesoho.Com
 *
 */

class action extends mysql {
	//获取网站首页导航
	function nav() {
		$query = $this->query("select id,fid,name from " . $this->pre . "newsclass where fid=0");

		if ($_GET[cid] == '') {
			$upclass = " class=up";
		} else {
			$upclass = "";
		}
		$navmenu = "<LI" . $upclass . "><A href=\"index.php\" target=_top title=\"首页\">首页</A> </LI>";
		while ($row = $this->fetch($query)) {
			if ($_GET[cid] == $row['id']) {
				$upclass = " class=up";
			} else {
				$upclass = "";
			}
			$navmenu .= "<LI" . $upclass . "><A href=\"list.php?cid=" . $row['id'] . "\" target=_top title=" . $row['name'] . ">" . $row['name'] . "</A></LI>";
		}
		return $navmenu;
	}

	//根据文章id构造导航
	function newsnav($cid) {
		$query = $this->query("select * from " . $this->pre . "newsclass where id=" . $cid);

		while ($row = $this->fetch($query)) {
			$re .= "<a href=list.php?cid=" . $row['id'] . ">" . $row['name'] . "</a>  , ";
			$re .= $this->newsnav($row['fid']);
		}

		return $re;
	}

	//========================================================================================

	//获取新闻无限级分类 以逗号分割 供批量操作使用
	function news_listclassbyid($classid) {
		$query = $this->query("select * from " . $this->pre . "newsclass where fid=" . $classid);

		while ($row = $this->fetch($query)) {
			$re .= $row['id'] . ",";
			$re .= $this->news_listclassbyid($row['id']);
		}

		return $re;
	}

	//列出所有一级类 供首页新闻列表使用
	function list1stclass() {
		$query = $this->query("select id,fid,name from " . $this->pre . "newsclass where fid=0");

		while ($row = $this->fetch($query)) {
			$ids[] = $row;
		}
		return $ids;
	}

	//新闻列表
	function news_listnews($page, $pagesize, $keyword = '', $cid = '0') {
		//按照id查找下级id下所有新闻有问题
		if ($keyword != '') {
			if ($cid != 0) {
				$sql = "select * from " . $this->pre . "news where title like '%" . $keyword .
				"%' and cid in (" . $cid . ") order by id desc limit " . ($page -1) * $pagesize .
				"," . $pagesize;
			} else {
				$sql = "select * from " . $this->pre . "news where title like '%" . $keyword .
				"%' order by id desc limit " . ($page -1) * $pagesize . "," . $pagesize;
			}
			$re = $this->query($sql);
		} else {
			if ($cid != 0) {
				$sql = "select * from " . $this->pre . "news where cid in (" . $cid .
				") order by id desc limit " . ($page -1) * $pagesize . "," . $pagesize;
				$re = $this->query($sql);
			} else {
				$re = $this->querypage($this->pre . "news", $page, $pagesize, "id");
			}
		}
		return $re;
	}

	//根据指定的排序方式列出指定条数的文章 $cid-类别 $orderby-排序方式 $num-列出数目
	function listnewsbyorder($cid = '0', $orderby = "id desc", $num = 10) {
		if ($cid != 0)
			$cidsql = "where cid in (" . $this->news_listclassbyid($cid) . $cid . ")";
		$sql = "select * from " . $this->pre . "news " . $cidsql . " order by " . $orderby . " limit 0," . $num;
		$re = $this->query($sql);
		return $re;
	}

	//点击数增加1 并返回增加后的点击数
	function news_click($id) {
		@ $this->query("update " . $this->pre . "news set clicks=clicks+1 where id=" . $id);
		$query = @ $this->query("select clicks from " . $this->pre . "news where id=" . $id);
		if ($row = $this->fetch($query)) {
			return $row['clicks'];
		}
	}

	//根据id获取新闻内容
	function getnews($id) {
		if (!isset ($id)) {
			$this->showmsg('新闻id为空');
		}
		$query = $this->query("select a.*,b.* from " . $this->pre . "news a left join " . $this->pre . "news_content b on a.id=b.nid where a.id=" . $id);
		$row = $this->fetch($query);
		return $row;
	}

	//根据id获取上一条新闻
	function getprevnews($id) {
		if (!isset ($id)) {
			$this->showmsg('新闻id为空');
		}
		$query = $this->query("select id,title from " . $this->pre . "news where id<" . $id . " order by id desc limit 0,1");
		if ($row = $this->fetch($query)) {
			$pre = "<A href=view.php?id=$row[id] title=$row[title]>$row[title]</A>";
		} else {
			$pre = "无";
		}
		return $pre;
	}

	//根据id获取下一条新闻
	function getnextnews($id) {
		if (!isset ($id)) {
			$this->showmsg('新闻id为空');
		}
		$query = $this->query("select id,title from " . $this->pre . "news where id>" . $id . " order by id limit 0,1");
		if ($row = $this->fetch($query)) {
			$next = "<A href=view.php?id=$row[id] title=$row[title]>$row[title]</A>";
		} else {
			$next = "无";
		}
		return $next;
	}

	//========================================================================================
	//截取中文字串
	function cut_str($string, $start = 0, $sublen = 20, $code = 'UTF-8') {
		if ($code == 'UTF-8') {
			$pa = "/[\x01-\x7f]|[\xc2-\xdf][\x80-\xbf]|\xe0[\xa0-\xbf][\x80-\xbf]|[\xe1-\xef][\x80-\xbf][\x80-\xbf]|\xf0[\x90-\xbf][\x80-\xbf][\x80-\xbf]|[\xf1-\xf7][\x80-\xbf][\x80-\xbf][\x80-\xbf]/";
			preg_match_all($pa, $string, $t_string);

			if (count($t_string[0]) - $start > $sublen)
				return join('', array_slice($t_string[0], $start, $sublen)) . "...";
			return join('', array_slice($t_string[0], $start, $sublen));
		} else {
			$start = $start * 2;
			$sublen = $sublen * 2;
			$strlen = strlen($string);
			$tmpstr = '';

			for ($i = 0; $i < $strlen; $i++) {
				if ($i >= $start && $i < ($start + $sublen)) {
					if (ord(substr($string, $i, 1)) > 129) {
						$tmpstr .= substr($string, $i, 2);
					} else {
						$tmpstr .= substr($string, $i, 1);
					}
				}
				if (ord(substr($string, $i, 1)) > 129)
					$i++;
			}
			if (strlen($tmpstr) < $strlen)
				$tmpstr = $tmpstr;
			return $tmpstr;
		}
	}

	//防SQL注入函数
	function unsqlin() {
		foreach ($_GET as $key => $value) {
			$_GET[$key] = $this->dowith_sql($value);
		}
		foreach ($_POST as $key => $value) {
			$_POST[$key] = $this->dowith_sql($value);
		}

		foreach ($_COOKIE as $key => $value) {
			$_COOKIE[$key] = $this->dowith_sql($value);
		}
	}

	function dowith_sql($str) {
		$str=strtolower($str);
		$str = str_replace("and", "", $str);
		$str = str_replace("or", "", $str);
		$str = str_replace("union", "", $str);
		$str = str_replace("update", "", $str);
		$str = str_replace("count", "", $str);
		$str = str_replace("mid", "", $str);
		$str = str_replace("char", "", $str);
		$str = str_replace("ord", "", $str);
		$str = str_replace("length", "", $str);
		$str = str_replace("left", "", $str);
		$str = str_replace("into", "", $str);
		$str = str_replace("where", "", $str);
		$str = str_replace("select", "", $str);
		$str = str_replace("create", "", $str);
		$str = str_replace("delete", "", $str);
		$str = str_replace("insert", "", $str);
		$str = str_replace("show", "", $str);
		$str = str_replace('\\', '', $str);
		$str = str_replace("'", "", $str);
		$str = str_replace('"', '', $str);
		$str = str_replace(" ", "", $str);
		$str = str_replace("=", "", $str);
		$str = str_replace(">", "", $str);
		$str = str_replace("<", "", $str);
		$str = str_replace(";", "", $str);
		$str = str_replace("%", "", $str);
		return $str;
	}

	//信息提示
	function showmsg($msg = '操作成功', $tourl = '') {
		if ($tourl != '') {
			echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"><html xmlns=\"http://www.w3.org/1999/xhtml\"><head><META http-equiv=Content-Type content=\"text/html; charset=utf-8\"><meta http-equiv=\"refresh\" content=\"5;URL=$tourl\" /></head>";
			$msg .= "<br /><br />5秒后自动跳转，也可以直接<a href=$tourl><font color=blue>点击这里</font></a>";
		} else {
			echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"><html xmlns=\"http://www.w3.org/1999/xhtml\"><head><META http-equiv=Content-Type content=\"text/html; charset=utf-8\"></head>";
		}

		echo "<body><TABLE cellSpacing=0 cellPadding=0 width=\"30%\" align=center border=0><TR height=200><TD></TD></TR><TR height=22><TD style=\"PADDING-LEFT: 20px; FONT-WEIGHT: bold; COLOR: #ffffff\" align=middle background=images/title_bg2.jpg>YfNews系统提示</TD></TR><TR bgColor=#ecf4fc height=150><TD align=center>$msg</TD></TR></TABLE></body><html>";
		exit ();
	}
}
?>