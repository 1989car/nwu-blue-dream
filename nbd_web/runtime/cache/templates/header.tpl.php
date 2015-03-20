<?php if(!defined('IN_SITE')) exit('Access Denied!'); checktplrefresh('D:/xampp/htdocs/nbd_web/templates/default/header.htm', 1297740911); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title; ?></title>
<link type="text/css" href="<?php echo $template_path; ?>/css/common.css"
rel="stylesheet" />
<script src="<?php echo $template_path; ?>/js/main.js" type="text/javascript"></script>
</head>
<body>
<span> <a href="http://localhost/"><img
src="<?php echo $template_path; ?>/image/banner1.jpg" alt=""></a> </span>

<!--日志根分类导航菜单-->
<div id=body>
<DIV id=menu_a2>
<DIV id=menu_a1></DIV>
<DIV id=menu_a3></DIV>
</DIV>
<DIV id=menu>
<ul><?php if(is_array($arr)) { foreach($arr as $val) { ?><li><a href="<?php echo $val[link]; ?>" target="_blank"><?php echo $val; ?></a></li><?php } } ?></ul>
</DIV>
<DIV id=menu_c2>
<DIV id=menu_c1></DIV>
<DIV id=menu_c3></DIV>
</DIV>
</div>