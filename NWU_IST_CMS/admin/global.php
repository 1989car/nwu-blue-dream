<?php
/*
 * Created on 2010-6-17
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 session_start();

require_once('../configs/config.php');
require_once('../common/mysql.class.php');
require_once('../common/page.class.php');
require_once('common/action.class.php');

$db=new action($host,$user,$pass,$dbname,$pre,$PRE_PASS,"utf8");
$db->user_logincheck();//登陆检测
$db->unsqlin();//防注入检测

//以下为smarty配置
require_once("../common/smarty/Smarty.class.php"); //包含smarty类文件
$smarty = new Smarty(); //建立smarty实例对象$smarty
$smarty->template_dir = "./templates"; //设置模板目录
$smarty->compile_dir = "../tmp/templates_c"; //设置编译目录
$smarty->config_dir="../common/smarty/Config_File.class.php";  // 目录变量
$smarty->caching=false; //是否使用缓存，项目在调试期间，不建议启用缓存
$smarty->cache_dir = "../tmp/cache"; //缓存文件夹
$smarty->cache_lifetime = 60;  //缓存时间

//----------------------------------------------------
//左右边界符，默认为{}，但实际应用当中容易与JavaScript相冲突
//----------------------------------------------------
$smarty->left_delimiter = "{";
$smarty->right_delimiter = "}";
 
 
?>
