<?php
/*
 * Created on 2010-6-17
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
require_once ('global.php');

switch ($_GET['action'])
{
    case "addconfig":
        $db->config_add($_POST['name'], $_POST['value']);
        break;
    case "editconfig":
        $db->config_edit($_GET['id'],$_POST['name'], $_POST['value']);
        break;
    case "genconfig":
        $db->config_gen();
        break;
    case "delconfig":
        $db->config_del($_GET['id']);
        break;
     case "changeskin":
     	  $db->config_edit(9,"skin", $_GET['skin']);
        break;
    default:
        break;
}

switch ($_GET['tp'])
{
    case "addconfig":
    	$smarty->assign('tp', "addconfig");
        $smarty->display('sysmanage.htm');
        break;
     case "changeskin":
    	$smarty->assign('tp', "changeskin");
    	$smarty->assign('skins', $db->listskins());
        $smarty->display('sysmanage.htm');
        break;
     case "baseset":
        $query = $db->query("select * from ".$pre . "config");
        while ($row = $db->fetch($query))
        {
            $sysconfiglist[] = $row;
        }

        $smarty->assign('sysconfiglist', $sysconfiglist);
        $smarty->assign('tp', "baseset");
        $smarty->display('sysmanage.htm');
        break;
    default:
        break;
}

?>
