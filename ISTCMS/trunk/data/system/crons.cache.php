<?php

if(!defined('IN_SUPESITE')) exit('Access Denied');

$_SGLOBAL['crons']=Array (1 => Array ('cronid' => 1,'available' => 1,'type' => 'system','name' => '更新热门TAG','filename' => 'tagcontent.php','lastrun' => 1283080161,'nextrun' => 1283083200,'weekday' => -1,'day' => -1,'hour' => -1,'minute' => Array (0 => 0)),2 => Array ('cronid' => 2,'available' => 1,'type' => 'system','name' => '清理无用附件','filename' => 'cleanattachment.php','lastrun' => 1283071373,'nextrun' => 1283112000,'weekday' => -1,'day' => -1,'hour' => 4,'minute' => Array (0 => 0)),3 => Array ('cronid' => 3,'available' => 1,'type' => 'system','name' => '清理临时文件','filename' => 'cleanimporttemp.php','lastrun' => 1283071373,'nextrun' => 1283112900,'weekday' => -1,'day' => -1,'hour' => 4,'minute' => Array (0 => 15)),4 => Array ('cronid' => 4,'available' => 1,'type' => 'system','name' => '更新论坛缓存','filename' => 'updatebbscache.php','lastrun' => 1283071373,'nextrun' => 1283104800,'weekday' => -1,'day' => -1,'hour' => 2,'minute' => Array (0 => 0)),5 => Array ('cronid' => 5,'available' => 1,'type' => 'system','name' => '更新信息查看数','filename' => 'updateviewnum.php','lastrun' => 1283071373,'nextrun' => 1283108700,'weekday' => -1,'day' => -1,'hour' => 3,'minute' => Array (0 => 5,1 => 15,2 => 25,3 => 35,4 => 45,5 => 55)),6 => Array ('cronid' => 6,'available' => 1,'type' => 'system','name' => '更新论坛帖子收录','filename' => 'updatebbsforums.php','lastrun' => 1283080201,'nextrun' => 1283080500,'weekday' => -1,'day' => -1,'hour' => -1,'minute' => Array (0 => 0,1 => 5,2 => 10,3 => 15,4 => 20,5 => 25,6 => 30,7 => 35,8 => 40,9 => 45,10 => 50,11 => 55)))

?>