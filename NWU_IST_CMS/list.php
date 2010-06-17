<?php
/*
 * Created on 2010-6-17
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 require_once ('configs/global.php');

$smarty->assign('navmenu', $db->nav());
switch ($_GET['tp']) {
	case "search" :
		$keyword = ($_POST['keyword'] == '') ? $_GET['keyword'] : $_POST['keyword'];
		$fid = ($_POST['fid'] == '') ? $_GET['fid'] : $_POST['fid'];

		$pagesize = 10;
		$page = ($_GET['page'] == '' || !isset ($_GET['page'])) ? 1 : $_GET['page'];

		if ($fid != 0)
			$fids = $db->news_listclassbyid($fid) . $fid;
		$nums = $db->count($pre . "news", $keyword, $fids);
		$pagelist = new page($page, $pagesize, $nums);

		$query = $db->news_listnews($page, $pagesize, $keyword, $fids);
		while ($row = $db->fetch($query)) {
			$newslist[] = $row;
		}

		$smarty->assign('pagelist', $pagelist->showpages());
		$smarty->assign('newslist', $newslist);
		$smarty->assign('newsclass', $db->news_listclass(3, $fid));
		$smarty->display($skin . '/list.htm');
		break;

	default :
		$pagesize = 10;
		$page = ($_GET['page'] == '' || !isset ($_GET['page'])) ? 1 : $_GET['page'];

		$cid = ($_GET['cid'] == '' || !isset ($_GET['cid'])) ? 0 : $_GET['cid'];
		if ($cid != 0)
			$cids = $db->news_listclassbyid($cid) . $cid;

		$nums = $db->count($pre . "news", $keyword, $cids);
		$pagelist = new page($page, $pagesize, $nums);

		$query = $db->news_listnews($page, $pagesize, $keyword, $cids);
		while ($row = $db->fetch($query)) {
			$newslist[] = $row;
		}

		$query = $db->listnewsbyorder($cid);
		while ($row = $db->fetch($query)) {
			$rightlist[] = $row;
		}

		$smarty->assign('pagelist', $pagelist->showpages());
		$smarty->assign('newslist', $newslist);
		$smarty->assign('rightlist', $rightlist);
		$smarty->assign('cid', $cid);

		$arr = explode(",", $db->newsnav($cid));

		for ($i = count($arr) - 1; $i >= 0; $i--) {
			$newsnav .= $arr[$i] . " -> ";
		}

		$smarty->assign('newsnav', "<a href=index.php>首页</a>" . $newsnav);
		$smarty->display($skin . '/list.htm');
		break;
}
?>
