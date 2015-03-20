<?php

require("./source/include/common.inc.php");

$template_path = $config[template][path];

if($config[template][cache]==1)
cache_page($config[template][cache_time]);

//echo WEBROOT;
$title = "Hello World";
$str = 'Hello world!';
$arr = array(1, 2, 3,4,5,6,7);


include template('test');
?>
