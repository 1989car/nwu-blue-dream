<?php if(!defined('IN_SITE')) exit('Access Denied!'); checktplrefresh('D:/xampp/htdocs/nbd_web/templates/default/test.htm', 1296571300); ?>
<?php include template('header'); ?><h1><?php echo $str; ?></h1>
文章列表
<ul>
  <?php if(is_array($arr)) { foreach($arr as $val) { ?>  <li><?php echo $val; ?></li>
  <?php } } ?></ul><?php $str = 'Yes'; ?><h1><?php echo $str; ?></h1>
<h3><?php if($str == 'Yes') { echo 'right'; } else { echo 'wrong'; } ?><h3><?php include template('footer'); ?>