<?php
require("./source/include/common.inc.php");


$template_path = $config[template][path];


if($config[template][cache]==1)
cache_page($config[template][cache_time]);


$title = "Hello World";
$str = 'Hello world!';

$db = DB::init($config['dbInfo'], 'common');
try {
	$rs = $db['common']->query('SELECT * FROM user');
	while ($row = $db['common']->fetch($rs)) {
		$record[] = $row;
	}
	$records = $db['common']->getAll('SELECT * FROM user');
	
	//mysql_connect
	//var_dump($record);
	$record = $db['common']->getRow('SELECT * FROM user');
	//mysql_connect
	//print_r($record);
	
} catch (DB_Exception $e) {
	print_r($e);
}
$arr = array(1,2,3,4,5);


//var_dump($rows);
//var_dump($config);
//print_r($config);



include template('testdb');
?>