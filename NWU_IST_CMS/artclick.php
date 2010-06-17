<?php
/*
 * Created on 2010-6-17
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 require_once ('configs/global.php');


$id = $_GET['id'] == '' ? 0 : $_GET['id'];

if ($id > 0) {
	echo "document.write('".$db->news_click($id)."')";
}

?>
