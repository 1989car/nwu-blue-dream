<?php
header("Content-type:text/html; charset=utf-8");
require SITE_ROOT.'/common/common.inc.php';

$var = 'abc';
$arr = array(1, 2, 3);

include template('index');
?>
