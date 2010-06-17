<?php
/*
 * Created on 2010-6-17
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
require_once('global.php');
switch($_GET['action'])
{
case "login":
$db->user_login($_POST['name'],$_POST['pass'],$_POST['vcode']);
break;
case "logout":
$db->user_logout();
break;
default:
	    $smarty->display('login.htm');
}

?>
