<?php if(!defined('IN_SUPESITE')) exit('Access Denied'); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="content-type" content="text/html; charset=<?=$_SC['charset']?>" />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<title>SupeSite Control Panel</title>
<link id="mastercss" rel="stylesheet" href="admin/images/style.css" type="text/css" media="screen" />
<script>var siteUrl='<?=$_SC['siteurl']?>';</script>
<script language="javascript" type="text/javascript" src="include/js/common.js"></script>
<script language="javascript" type="text/javascript" src="images/edit/edit.js"></script>
<script language="javascript" type="text/javascript" src="include/js/admin.js"></script>
<script language="javascript" type="text/javascript" src="include/js/ajax.js"></script>
<script language="javascript" type="text/javascript" src="include/js/selectdate.js"></script>
<link href="images/edit/edit.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="wrap"
<?php if(submitcheck('debug')) { ?>
 style="width: 99%;"
<?php } ?>
>
<?php if(!submitcheck('debug')) { ?>
<div id="header">
<h2><a href="<?=S_URL?>/" title="<?=$_SCONFIG['sitename']?>"><img src="images/logo.gif" alt="<?=$_SCONFIG['sitename']?>" /></a></h2>

<div id="topmenu" class="gray">
��ӭ����<a href="space.php?uid=<?=$_SGLOBAL['supe_uid']?>"><?=$_SGLOBAL['member']['username']?></a> | 
<a href="<?=S_URL?>/" target="_blank">վ����ҳ</a> | 
<a href="batch.login.php?action=logout&refer=<?=S_URL?>">�˳�</a>
</div>

<ul id="menu">
<li id="li_-1"><a href="<?=CPURL?>">��ҳ</a></li>
<?php if($menus['0']) { ?>
<li id="li_0"><a href="javascript:;" onclick="cpmenus(0)">ϵͳ����</a></li>
<?php } ?>

<?php if($menus['1']) { ?>
<li id="li_1"><a href="javascript:;" onclick="cpmenus(1)">��Ϣ����</a></li>
<?php } ?>

<?php if($menus['2']) { ?>
<li id="li_2"><a href="javascript:;" onclick="cpmenus(2)">�û�����</a></li>
<?php } ?>

<?php if($menus['3']) { ?>
<li id="li_3"><a href="javascript:;" onclick="cpmenus(3)">ģ�����</a></li>
<?php } ?>

<?php if($menus['4']) { ?>
<li id="li_4"><a href="javascript:;" onclick="cpmenus(4)">����ά��</a></li>
<?php } ?>

<?php if($menus['5']) { ?>
<li id="li_5"><a href="javascript:;" onclick="cpmenus(5)">�ɼ�����</a></li>
<?php } ?>

<?php if($menus['6']) { ?>
<li id="li_6"><a href="javascript:;" onclick="cpmenus(6)">ģ�͹���</a></li>
<?php } ?>

<?php if($menus['7']) { ?>
<li id="li_7"><a href="javascript:;" onclick="cpmenus(7)">�ۺ�����</a></li>
<?php } ?>

<?php if($menus['0']['settings']) { ?>
<li><a href="<?=UC_API?>" target="_blank">UCenter</a></li>
<?php } ?>
</ul>
</div>
<?php } ?>
<div id="content">
<div class="mainarea">
<div class="maininner"
<?php if(submitcheck('debug')) { ?>
  style="margin-left: 0px;"
<?php } ?>
>