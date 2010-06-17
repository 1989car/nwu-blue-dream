<?php
/*
 * Created on 2010-6-16
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */

require_once ('configs/global.php');

$query = $db->listnewsbyorder($cid);
while ($row = $db->fetch($query)) {
	$newlist[] = $row;
}

$query = $db->listnewsbyorder($cid, "clicks desc");
while ($row = $db->fetch($query)) {
	$hotlist[] = $row;
}

//获取所有一级类的新闻 每个类取10条
$classarr = $db->list1stclass();
foreach ($classarr as $k => $v) {
	unset ($classnews);
	$query = $db->listnewsbyorder($v[id]);
	while ($row = $db->fetch($query)) {
		$classnews[] = $row;
	}
$classnewslist[] = array("key"=>$k,"id"=>$v[id],"name"=>$v[name],"news"=>$classnews);
}

$smarty->assign('classnewslist', $classnewslist);
$smarty->assign('newlist', $newlist);
$smarty->assign('hotlist', $hotlist);

$smarty->assign('navmenu', $db->nav());
$smarty->display($skin . '/index.htm')
?>
