<?php
/*
 * Created on 2010-6-17
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 require_once('global.php');
    $smarty->assign('user', $_SESSION['name']);
    $smarty->display('header.htm');
    
?>
