<?php
/*
 * Created on 2010-6-17
 *
 * To change the template for this generated file go to
 * Window - Preferences - PHPeclipse - PHP - Code Templates
 */
 
 require_once('configs/global.php');
$newscontent=$db->getnews($_GET['id']);
$smarty->assign('navmenu', $db->nav());
$smarty->assign('newscontent',$newscontent);
$smarty->assign('prevnews', $db->getprevnews($_GET['id']));
$smarty->assign('nextnews', $db->getnextnews($_GET['id']));

$arr=explode(",",$db->newsnav($newscontent['cid']));

for($i=count($arr)-1;$i>=0;$i--)
{
	$newsnav.=$arr[$i]." -> ";
}


$smarty->assign('newsnav',"<a href=index.php>首页</a>".$newsnav);
$smarty->display($skin.'/view.htm');

?>
