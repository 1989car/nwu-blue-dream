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
    case "modpass":
        if ($_GET['id'] != '')
        {
            $query = $db->query("select id,name from " . $pre . "admin where id=" . $_GET['id']);
            $row = $db->fetch($query);
            $smarty->assign('id', $row['id']);
            $smarty->assign('user', $row['name']);
        } else
        {
            $smarty->assign('user', $_SESSION['name']);
        }

        $smarty->assign('tp', "modpass");
        $smarty->display('modpass.htm');
        break;
    case "useradmin":
        $query = $db->user_list();
        while ($row = $db->fetch($query))
        {
            $userslist[] = $row;
        }
        $smarty->assign('tp', "useradmin");
        $smarty->assign('userslist', $userslist);
        $smarty->display('modpass.htm');
        break;
    case "useradd":
        $smarty->assign('tp', "useradd");
        $smarty->display('modpass.htm');
        break;
    default:
        break;
}


switch ($_GET['action'])
{
    case "modpass":
        $db->user_mod($_POST['name'], $_POST['pass'], $_POST['newpass'], $_POST['renewpass']);
        break;
    case "useradmin":
        break;
    case "useradd":
        $db->user_add($_POST['name'], $_POST['pass']);
        break;
    case "userdel":
        $db->user_del($_GET['id']);
        break;
    default:
        break;
}

?>
