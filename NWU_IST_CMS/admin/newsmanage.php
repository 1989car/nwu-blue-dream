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
    case "add":
        $db->news_addnews($_POST['title'], $_POST['keyword'], $_POST['fid'], $_POST['author'],
            $_POST['content'], time());
        break;
    case "edit":
        $db->news_editnews($_POST['id'], $_POST['title'], $_POST['keyword'], $_POST['fid'],
            $_POST['author'], $_POST['content']);
        break;
    case "del":
        $db->news_delnews($_GET['id']);
        break;
    case "delall":
        $idarr = $_POST['id'];
        if ($idarr == '')
            $this->showmsg('请指定要删除新闻的id', 'newsmanage.php?tp=list');
        foreach ($idarr as $k => $v)
        {
            $ids .= $v;
            if ($k < count($_POST['id']) - 1)
                $ids .= ",";
        }
        $db->news_delnews($ids);
        break;
    default:
        break;
}


switch ($_GET['tp'])
{
    case "add":
        $db->editor('content', '');
        $smarty->assign('newsclass', $db->news_listclass(2));
        $smarty->display('addnews.htm');
        break;
    case "edit":
        $query = $db->query("select n.*,nc.* from " . $pre . "news n left join " . $pre .
            "news_content nc on n.id=nc.nid where n.id=" . $_GET['id']);
        $row = $db->fetch($query);

        $db->editor('content', $row['content']);
        $smarty->assign('id', $_GET['id']);
        $smarty->assign('newstitle', $row['title']);
        $smarty->assign('newsauthor', $row['author']);
        $smarty->assign('newskeyword', $row['keyword']);
        $smarty->assign('newsclass', $db->news_listclass(3, $row['cid']));
        $smarty->display('editnews.htm');
        break;

    case "search":
        //页面中动态改变搜索表单action的值 通过参数来传递keyword fid
        $keyword = ($_POST['keyword'] == '') ? $_GET['keyword']:
        $_POST['keyword'];
        $fid = ($_POST['fid'] == '') ? $_GET['fid']:
        $_POST['fid'];


        $pagesize = 10;
        $page = ($_GET['page'] == '' || !isset($_GET['page'])) ? 1:
        $_GET['page'];

        if ($fid != 0)
            $fids = $db->news_listclassbyid($fid) . $fid;
        $nums = $db->count($pre . "news", $keyword, $fids);
        $pagelist = new page($page, $pagesize, $nums);

        $query = $db->news_listnews($page, $pagesize, $keyword, $fids);
        while ($row = $db->fetch($query))
        {
            $newslist[] = $row;
        }

        $smarty->assign('pagelist', $pagelist->showpages());
        $smarty->assign('newslist', $newslist);
        $smarty->assign('newsclass', $db->news_listclass(3, $fid));
        $smarty->display('listnews.htm');
        break;

    case "list":
        $pagesize = 10;
        $page = ($_GET['page'] == '' || !isset($_GET['page'])) ? 1:
        $_GET['page'];

        $pagelist = new page($page, $pagesize, $db->count($pre . "news"));
        $query = $db->news_listnews($page, $pagesize);
        while ($row = $db->fetch($query))
        {
            $newslist[] = $row;
        }

        $smarty->assign('pagelist', $pagelist->showpages());
        $smarty->assign('newslist', $newslist);
        $smarty->assign('newsclass', $db->news_listclass(2));
        $smarty->display('listnews.htm');
        break;
    default:
        break;
}


?>
