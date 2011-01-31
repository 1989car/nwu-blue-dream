<?php
define('IN_SITE', TRUE);
define('INC', substr(str_replace('\\', '/', dirname(__FILE__) ),0,-7 ));
echo INC;
define('SITE_ROOT', substr(dirname(__FILE__), 0, -7));
//echo SITE_ROOT;
require SITE_ROOT.'/common/template.func.php';

$tplrefresh = 1;                              //设置是否检查更新
$tpldir = SITE_ROOT.'/templates/default/';   //模板存放目录
//echo $tpldir;
$objdir = SITE_ROOT.'/runtime/templates_cache/';  //模板编译文件存放目录
?>