<?php
/*
 * Created on 2010-6-16
 *
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
require_once('common/mysql.class.php');
require_once('common/action.class.php');
require_once('common/page.class.php');
require_once('config.php');

$db=new action($host,$user,$pass,$dbname,$pre,$PRE_PASS,"utf8");

//防止sql注入
$db->unsqlin();


//以下为smarty配置
require_once("./common/smarty/Smarty.class.php"); //包含smarty类文件
$smarty = new Smarty(); //建立smarty实例对象$smarty
$smarty->template_dir = "./templates"; //设置模板目录
$smarty->compile_dir = "./tmp/templates_c"; //设置编译目录
$smarty->config_dir="./common/smarty/Config_File.class.php";  // 目录变量
$smarty->caching=false; //是否使用缓存，项目在调试期间，不建议启用缓存
$smarty->cache_dir = "./tmp/cache"; //缓存文件夹
$smarty->cache_lifetime = 60;  //缓存时间

$smarty->assign('skin', $skin);  //当前模板
$smarty->assign('sitename', $sitename);

//注册自定义smarty函数
$smarty->register_function('cnsubstr', 'cnsubstr');

//自定义smarty函数
function cnsubstr($params) {
	extract($params);
	$re = cut_str($str, $start, $len);
	return $re;
}

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

//----------------------------------------------------
//左右边界符，默认为{}，但实际应用当中容易与JavaScript相冲突
//----------------------------------------------------
$smarty->left_delimiter = "{";
$smarty->right_delimiter = "}";
?>