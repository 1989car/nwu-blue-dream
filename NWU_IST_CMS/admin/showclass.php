<?php
/*
 * Created on 2010-6-17
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
require_once ('global.php');

$query=$db->query("select name from ". $pre . "newsclass where id=".$_GET['fid']);
$row=$db->fetch($query);
echo "document.write('".$row['name']."');";

?>
