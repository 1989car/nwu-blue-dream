<?php if(!defined('IN_SITE')) exit('Access Denied!'); checktplrefresh('D:/xampp/htdocs/nbd_web/templates/default/upload.htm', 1297740960); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Flash批量上传</title>
<link href="static/js/css.css" rel="stylesheet" type="text/css">
<script src="static/js/as.js" type="text/javascript"></script>
</head>
<body>
<h1>Flash批量上传 </h1>
<div class="sapload">
<h4>Sapload v3</h4>
    <div id="sapload">
    
    </div>
    <div>上传开始：<span id="start">否</span></div>
    <div>单体上传进度：<span id="pros"></span></div>
    <div>总体上传进度：<span id="prosAll"></span></div>
    <div>最后一次回调：<span id="lastci">否</span></div>
    <div>上传结束：<span id="ends">否</span></div>
    <div id="pw" style="margin-top:8px;">
    </div>
    
</div>

<script type="text/javascript">
// <![CDATA[

var so = new SWFObject("static/upload.swf", "saploadv3", "600", "600", "10", "#ffffff");
so.addVariable('config','static/uploadConfig.xml');
so.write("sapload");

function FeedBackFunction(t){
var pstr=$("#pw").html();
var itml = pstr + '<a href="' + t + '" target="_blank">'+ t + '</a><br>';
$("#pw").html(itml);
$("#danci").html(t);
//alert(t);
}
function LastFeedBackFunction(t){
$("#lastci").html(t);
}
function ProgressFunction(t){
$("#pros").html(t+ " %");
}
function AllProgressFunction(t){
$("#prosAll").html(t+ " %");
}
function workStart(){
$("#start").html("是");
}
function workEnd(){
$("#ends").html("是");
}
// ]]>
</script>
</body>
</html>