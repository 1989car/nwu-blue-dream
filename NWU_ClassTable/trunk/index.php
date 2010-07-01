<?php
/*
 * Created on 2010-6-27
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 require_once ('configs/global.php');
 
 
 
 $class = array(1,2,3,5,6);
 //for( $i = 0; $i < 5000;$i++)
 $cache = serialize($class);
 echo $cache.'<br>';
 $cls = unserialize($cache);
 
 print_r($cls);
?>
