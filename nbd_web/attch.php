<?php

require("./source/include/common.inc.php");

require(CLA.'/upload.class.php');//文件上传系统

$upfos = new sa_upload('Filedata','runtime/files'); //实例化类
$upfos->upload($_POST['sa_date']);//上传
if($upfos->filePath() != ""){
	echo $upfos->filePath();
}else{
	echo $upfos->Err();
}



?>