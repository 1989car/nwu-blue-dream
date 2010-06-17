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
    case "addclass":
        $db->news_addclass($_POST['fid'], $_POST['name']);
        break;
    case "editclass":
        $db->news_editclass($_POST['id'], $_POST['fid'], $_POST['name']);
        break;
    case "delclass":
        $db->news_delclass($_GET['id']);
        break;
    default:
        break;
}

switch ($_GET['tp'])
{
    case "editclass":

        $smarty->assign('tp', "editclass");
        $smarty->assign('id', $_GET['id']);
        $smarty->assign('name', urldecode($_GET['classname']));
        $smarty->assign('newsclass3', $db->news_listclass(3, $_GET['fid']));
        break;
    default:
        $smarty->assign('newsclass', $db->news_listclass());
        $smarty->assign('newsclass2', $db->news_listclass(2));
        break;
}

$smarty->display('newsclass.htm');

?>
