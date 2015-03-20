<?php

function cache_page($refresh){
	ob_start();//开启缓冲区
	$hash=sha1($_SERVER['PHP_SELF'].'|G|'.serialize($_GET).'|P|'.serialize($_POST));//缓存文件名字
	$file=CACHE.'/'.$hash;//缓存文件路径
	if(!file_exists($file)){//缓存文件不存在
		register_shutdown_function('cache_page_go',$file);

	}else{//缓存文件存在
		if( (time()-filemtime($file))>$refresh ){//缓存超时
			register_shutdown_function('cache_page_go',$file);//调用函数
		}
		else{//正常使用缓存文件
			$f=file_get_contents($file);//取出缓存文件内容
			echo $f;//输出缓存内容
			$output=ob_get_contents();//取出缓冲区内容
			ob_get_clean();    //清空缓冲区
			echo $output;      //输出
			exit();
		}
	}
}

function cache_page_go($file){

	$output=ob_get_contents();//获取缓冲区内容
	ob_get_clean();           //清空缓冲区
	file_put_contents($file,$output,LOCK_EX);//写入缓存文件
	echo $output;//输出缓存内容
	exit();
}
?>
