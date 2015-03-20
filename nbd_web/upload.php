<?php
require("./source/include/common.inc.php");





//$template_path = $config[template][path];

if($config[template][cache]==1)
cache_page($config[template][cache_time]);






include template('upload');
?>