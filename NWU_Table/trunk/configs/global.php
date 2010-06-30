<?php
/*
 * Created on 2010-6-27
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 require_once('config.php');
 require_once('common/mysql.class.php');
 require_once('common/action.class.php');
 
 $db=new action($host,$user,$pass,$dbname,$pre,$PRE_PASS,"utf8");
 
//防止sql注入
$db->unsqlin();
 
 
?>
