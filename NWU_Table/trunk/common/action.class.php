<?php

class action extends mysql
{
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