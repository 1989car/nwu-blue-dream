<?php
/*
 * Created on 2010-6-17
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
require_once('global.php');

$arrInfo = array();
$arrInfo['serverinfo'] = PHP_OS.' / PHP v'.PHP_VERSION;
$arrInfo['serverinfo'] .= @ini_get('safe_mode') ? ' / 安全模式' : NULL;
if(@ini_get("file_uploads")) {
	$arrInfo['fileupload'] = "允许 - 文件 ".ini_get("upload_max_filesize")." - 表单：".ini_get("post_max_size");
} else {
	$arrInfo['fileupload'] = "<font color=\"red\">禁止</font>";
}
if (get_cfg_var('register_globals')){
	$arrInfo['onoff'] ="打开";
}else{
	$arrInfo['onoff'] = "关闭";
}

$mysqlver= mysql_get_server_info();

    $smarty->assign('serverinfo', $arrInfo);
    $smarty->assign('mysqlver', $mysqlver);
    $smarty->assign('ip', $db->user_realip());
    $smarty->assign('user', $_SESSION['name']);
    $smarty->display('main.htm');
    
?>
