<?php
//error_reporting(E_ERROR || E_PARSE);//屏蔽错误显示
define('IN_SITE', TRUE);//安全设置
unset($LANG, $_REQUEST, $HTTP_ENV_VARS, $HTTP_POST_VARS, $HTTP_GET_VARS, $HTTP_POST_FILES, $HTTP_COOKIE_VARS);
set_magic_quotes_runtime(0);



define('INC', str_replace('\\', '/', dirname(__FILE__) ) );//include 目录
define('WEBROOT', substr(INC, 0, -15));//web 根目录
define('FUNC', WEBROOT.'/source/function');
define('CLA',WEBROOT.'/source/class');
define('CACHE',WEBROOT.'/runtime/cache');
define('STAT', WEBROOT.'/static');
define('MOD',WEBROOT.'/source/module');




require(WEBROOT.'/config.inc.php');


require(FUNC.'/template.func.php');//模板引擎
$tplrefresh = 1;                              ///设置是否检查更新
$tpldir = WEBROOT.'/'.$config[template][path].'/';   //模板存放目录
$objdir = WEBROOT.'/runtime/cache/templates/';  //模板编译文件存放目录


$language = include $tpldir.'language/cn.language.php'; //语言文件


require(CLA.'/db.class.php');//数据库

if($config[template][cache]==1)
{
	require(FUNC.'/cache.func.php');//缓存
}
ob_start();
header("Content-type:text/html; charset=utf-8");
?>