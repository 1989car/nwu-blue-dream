<?exit?>
<!--{if empty($_SGLOBAL['inajax'])}-->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=$_SC[charset]" />
<title>$title $_SCONFIG[seotitle] - Powered by SupeSite</title>
<meta name="keywords" content="$keywords $_SCONFIG[seokeywords]" />
<meta name="description" content="$description $_SCONFIG[seodescription]" />
<meta name="generator" content="Blue Dreamz " />
<meta name="author" content="Blue Dreamz " />
<meta name="copyright" content="2009 - 2010 Blue Dreamz " />
<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7" />
<link rel="stylesheet" type="text/css" href="{S_URL}/templates/$_SCONFIG[template]/css/css.css" />
$_SCONFIG[seohead]
<script type="text/javascript">
var siteUrl = "{S_URL}";
</script>
<!--[if IE ]>
		<script src="{S_URL}/templates/$_SCONFIG[template]/js/pngAlaph.js"></script>
		<script>
			DD_belatedPNG.fix('.something,#some_head,#some_bottom, img');
		</script>
<![endif]-->
</head>
<body>
<div id="layout">


			<div id="head">
				<div id="head1"></div>
				<div id="head2"></div>
				<div id="head3"></div>
				<div id="head4"></div>
				<div id="head5"></div>
				<div id="head6">
					<ul>
						<li class="current"><a href="{S_URL}/">Ê×Ò³</a></li>
						<!--{loop $channels['menus'] $key $value}-->
						<li><a href="$value[url]">$value[name]</a></li>
						<!--{/loop}-->
					</ul>
				</div>
			</div>
<!--{/if}-->
