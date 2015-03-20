<?php

defined('IN_SITE') || exit(header('HTTP/1.0 400 Bad Request'));

/*********************************************************************
*         sa_upload(FormName, Directroy, MaxSize); 实例化上传类
*         FormName    文件域名称 
*         Directroy   指定上传路径 
*         MaxSize     设置可上传文件大小 
*         
*         调用方法
*         upload(fileName);文件上传,强制命名fileName
*         cut_upload(fileName, Width, Height);裁剪上传,强制命名fileName,尺寸
*         thumb(dscChar, Width, Height);创建缩略图,前缀,尺寸
*         filePath();文件路径
*         thumbMap();缩略图路径
*         get_Time();上传时间
*
*         错误代码
*  		  错误参数：
*		  0=正常,
*		  1=文件域未定义,
*		  2=文件不存在或者无法读取,
*		  3=上传失败目录不可写?
*		  4=无法执行裁剪上传(文件格式不支持?),
*		  6=未知错误!,
*		  7=无法创建缩略图(文件格式不支持?),
*********************************************************************/ 
class sa_upload{

	var $FormName; //文件域名称
	var $Directroy; //上传至目录
	var $MaxSize; //最大上传大小
	var $CanUpload; //是否可以上传
	var $doUpFile; //上传的文件名
	var $sm_File; //缩略图名称
	var $a_Time;//附件上传时间
	var $Error; 
	
	//构造函数
	function sa_upload($formName='', $dirPath='', $maxSize=1000000) //formName=文件域,dirPath=上传目录,maxSize=上传大小限制
	{
		//初始化各种参数
		$this->FormName = $formName;
		$this->MaxSize = $maxSize;
		$this->CanUpload = true;
		$this->doUpFile = '';
		$this->sm_File = '';
		$this->Error = 0;
		
		//文件域检测
		if ($formName == ''){
			$this->CanUpload = false;
			$this->Error = 1;
			break;
		}
		
		//上传路径处理
		if ($dirPath == ''){
			$this->Directroy = $dirPath;
		}else{
			$this->Directroy = $dirPath.'/';
		}
		
		//文件大小检测
		if($this->getSize(M) > $this->MaxSize){
			$this->CanUpload = false;
			$this->Error = 7;
			return $this->Error;
			break;
		}
	}

	//检查文件是否存在
	function scanFile()
	{
		if ($this->CanUpload){
			$scan = is_readable($_FILES[$this->FormName]['name']);
			if ($scan){ 
				$this->Error = 2;
			}
			return $this->scan;
		}
	}


	//获取文件大小
	function getSize($format = 'B')
	{
		if ($this->CanUpload){
			if ($_FILES[$this->FormName]['size'] == 0){
				$this->Error = 2;
				$this->CanUpload = false;
			}
			//计算文件大小
			switch ($format){
				case 'B':
					return $_FILES[$this->FormName]['size'].'kb';
				break;
				case 'M':
					return sprintf("%01.2f",($_FILES[$this->FormName]['size'])/(1024*1024)).'mb';
			}
		}
	}

	//获取文件类型
	function getExt()
	{
		if ($this->CanUpload){
			$ext=$_FILES[$this->FormName]['name'];
			$extStr=explode('.',$ext);
			$count=count($extStr)-1;
		}
		return $extStr[$count];
	}

	//获取文件名称
	function getName()
	{
		if ($this->CanUpload){
			return $_FILES[$this->FormName]['name'];
		}
	}
	
	//获取上传时间
	function get_Time()
	{
		if ($this->CanUpload){
			return $this->a_Time;
		}
	}

	//重命名
	function newName()
	{
		if ($this->CanUpload){
			$FullName=$_FILES[$this->FormName]['name'];
			$extStr=explode('.',$FullName);
			$count=count($extStr)-1;
			$ext = $extStr[$count];
			$tempTimes=time();
			$this->a_Time=$tempTimes;
			return $FullName.'-'.$tempTimes.'.'.$ext;
		}
	}

	//上传文件
	function upload($fileName = '')
	{
		if ($this->CanUpload){
			if ($_FILES[$this->FormName]['size'] == 0){
				$this->Error = 2;
				$this->CanUpload = false;
				return $this->Error;
				break;
			}
		}
		
		if($this->CanUpload){
			//未指定名称则执行默认重命名
			if ($fileName == ''){
				$fileName = $this->newName();
			}else{
				$this->a_Time=time();
				$fileName = $fileName.'.'.$this->getExt();
			}
			//上传
			$this->doUpload=@copy($_FILES[$this->FormName]['tmp_name'], $this->Directroy.$fileName);
			if($this->doUpload)
			{//上传成功则返回重命名之后名称,更改文件属性
				$this->doUpFile = $fileName;
				chmod($this->Directroy.$fileName, 0777);
				return true;
			}else{//上传失败,返回错误代码
				$this->Error = 3;
				return $this->Error;
			}
			
		}
	}
	
	//裁剪上传
	function cut_upload($fileName = '',$width=500,$height=500){ 
		if ($this->CanUpload){
			if ($_FILES[$this->FormName]['size'] == 0){
				$this->Error = 2;
				$this->CanUpload = false;
				return $this->Error;
				break;
			}
		}
		
		
		if($this->CanUpload){
			//未指定名称则执行默认重命名
			if ($fileName == ''){
				$fileName = $this->newName();
			}else{
				$this->a_Time=time();
				$fileName = $fileName.'.'.$this->getExt();
			}
			//检查是否可自行裁剪操作(图片),特殊原因png不支持裁剪上传
			$data = getimagesize($_FILES[$this->FormName]['tmp_name'],&$info);
			switch ($data[2]) {
				case 1:
					$temp_img = @imagecreatefromgif($_FILES[$this->FormName]['tmp_name']); 
				break;
				case 2:
					$temp_img = @imagecreatefromjpeg($_FILES[$this->FormName]['tmp_name']); 
				break;
				default:
					$this->Error = 4;
					$this->CanUpload = false;
					return $this->Error;
				break;
			}
			
			$o_width  = imagesx($temp_img);                                 //取得原图宽 
			$o_height = imagesy($temp_img);                                 //取得原图高 
			if($width>$o_width && $height>$o_height){//原图小于裁剪尺寸,直接使用原图,并且返回文件名称.
				$this->doUpload=@copy($_FILES[$this->FormName]['tmp_name'], $this->Directroy.$fileName);
				if($this->doUpload)
				{//上传成功则返回重命名之后名称,更改文件属性
					$this->doUpFile = $fileName;
					chmod($this->Directroy.$fileName, 0777);
					return true;
				}else{//上传失败,返回错误代码
					$this->Error = 3;
					return $this->Error;
				}
			}else{//原图大于裁剪尺寸,执行裁剪
				//等比缩放尺寸计算
				if($o_width/$o_height >= $width/$height){
					if($o_width>$width){ 
						$newwidth=$width;
						$newheight=$o_height*$width/$o_width; 
					}else{
						$newwidth=$o_width;
						$newheight=$o_height;
					}
				}else{
				
					if($o_height>$height){ 
						$newheight=$height;
						$newwidth=$o_width*$height/$o_height;
					}else{
						$newwidth=$o_width;
						$newheight=$o_height;
					}
				} 
				//图片生成
				$new_img = imagecreatetruecolor($newwidth, $newheight); 
				imagecopyresampled($new_img, $temp_img, 0, 0, 0, 0, $newwidth, $newheight, $o_width, $o_height); 
				$cr=imagejpeg($new_img , $this->Directroy.$fileName);      
				$this->doUpFile=$fileName;              
				imagedestroy($new_img); 
				//返回执行结果
				if ($cr){
					$this->sm_File = $dscFile;
					return true;
				}else{
					$this->Error = 15;
					return $this->Error;
				}
			} 
		}
	} 

	//创建图片缩略图
	function thumb($dscChar='',$width=150,$height=113)
	{
		if ($this->CanUpload && $this->doUpFile != ''){
			$srcFile = $this->doUpFile;
			//缩略图前缀
			if ($dscChar == ''){
				$dscChar = 'sm_';
			}

			$dscFile = $this->Directroy.$dscChar.$srcFile;
			$data = getimagesize($this->Directroy.$srcFile,&$info);

			switch ($data[2]) {
				case 1:
				$im = @imagecreatefromgif($this->Directroy.$srcFile);
				break;

				case 2:
				$im = @imagecreatefromjpeg($this->Directroy.$srcFile);
				break;

				case 3:
				$im = @imagecreatefrompng($this->Directroy.$srcFile);
				break;
				
				default:
					$this->Error = 7;
					return $this->Error;
				break;
			}
			
			$srcW=imagesx($im);
			$srcH=imagesy($im);
			
			if($width>$srcW && $height>$srcH){//原图宽或高比规定的尺寸小,填充背景色 
				$x=($width-$srcW)/2; 
				$y=($height-$srcH)/2; 
				$ni=imagecreatetruecolor($width,$height);
				$background = imagecolorallocate($ni, 0, 0, 0);
				imagecopyresized($ni,$im,$x,$y,0,0,$width,$height,$width,$height);
				imagecolortransparent($ni,$background);
				$cr = imagejpeg($ni,$dscFile);
				@imagecolorallocatealpha($cr,255,255,255,127);
				chmod($dscFile, 0777);			
			}else{//缩放且裁剪
				 if($srcW/$srcH >= $width/$height){
				 		if($srcW>$width){ 
							$newwidth=$width;
							$newheight=$srcH*$width/$srcW; 
						}else{
							$newwidth=$srcW;
							$newheight=$srcH;
						}
						$x=0; 
						$y=($newheight-$height)/2; 
				 }else{    //否则确定height与规定相同,width自适应 
				 		if($srcH>$height){ 
							$newheight=$height;
							$newwidth=$srcW*$height/$srcH;
						}else{
							$newwidth=$srcW;
							$newheight=$srcH;
						}
						$x=($newwidth-$width)/2; 
						$y=0; 
				 } 
				
				 $ni=imagecreatetruecolor($newwidth,$newheight);
				 imagecopyresized($ni,$im,0,0,0,0,$newwidth,$newheight,$srcW,$srcH);
				 $nix=imagecreatetruecolor($width,$height);
				 imagecopyresized($nix,$ni,0,0,$x,$y,$width,$height,$width,$height);
				 
				 $cr = imagejpeg($nix,$dscFile);
				 @imagecolorallocatealpha($cr,255,255,255,127);
				 chmod($dscFile, 0777);			
			}
			if ($cr){
				$this->sm_File = $dscFile;
				return true;
			}else{
				$this->Error = 5;
				return $this->Error;
			}
		}
	}

	//显示错误参数
	function Err(){
		return $this->Error;
	}

	//上传后的文件名
	function UpFile(){
		if ($this->doUpFile != ''){
			return $this->$doUpFile;
		}else{
			$this->Error = 6;
		}
	}

	//上传文件的路径
	function filePath(){
		if ($this->doUpFile != ''){
			return $this->Directroy.$this->doUpFile;
			$this->Error = 6;
		} 
	}

	//缩略图文件名称
	function thumbMap(){
		if ($this->sm_File != ''){
			return $this->sm_File;
		}else{
			$this->Error = 6;
		}
	}

	//显示版本信息
	function ieb_version(){
		return 'sa_upload CLASS Ver 1.1';
	}
}
?>