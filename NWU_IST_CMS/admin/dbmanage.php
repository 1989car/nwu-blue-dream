<?php
/*
 * Created on 2010-6-17
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 require_once ('global.php');

switch ($_GET['tp'])
{
    case "bak":
        $db->dbbak($dbname);
        break;

    case "restore":
        $db->dbrestore($dbname, $file);
        break;
    default:
        break;
}

?>