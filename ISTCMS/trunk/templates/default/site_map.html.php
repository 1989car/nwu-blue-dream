<?exit?>
<!--{template header}-->
</div><!--header end-->

<div id="nav">
	<div class="main_nav">
		<ul>
			<!--{if empty($_SCONFIG['defaultchannel'])}-->
			<li><a href="{S_URL}/">��ҳ</a></li>
			<!--{/if}-->
			<!--{loop $channels['menus'] $key $value}-->
			<li><a href="$value[url]">$value[name]</a></li>
			<!--{/loop}-->
		</ul>
	</div>
</div><!--nav end-->

<div class="column global_module bg_fff">
	<div class="global_module3_caption">
	<h3>���λ�ã�<a href="{S_URL}/">$_SCONFIG[sitename]</a>
				&gt;&gt; $title</h3></div>
	<div id="site_map">
	<!--{loop $channels['menus'] $key $value}-->
		<!--{if $key == 'news' || $value['upnameid']=='news'}-->
			<!--��Ѷ������ ��ʼ-->
			<!--{block name="category" parameter="type/$key/isroot/1/limit/0,100/order/c.displayorder/cachetime/10800/cachename/category"}-->
			<div>
				<h1>$value['name']</h1>
				<ul>
				<!--{loop $_SBLOCK['category'] $value}-->
				<li><a href="$value[url]" title="$value[name]">$value[name]</a></li>
				<!--{/loop}-->
				</ul>
			</div>
		<!--{/if}-->
	<!--{/loop}-->
	

	<!--ģ���б�ʼ-->
	<!--{loop $modelarr $value}-->
	<div>
		<h1>$value[modelalias]</h1>
		<ul>
			<!--{loop $value['categories'] $key $val}-->
			<li><a href="{S_URL}/m.php?name={$value[modelname]}&mo_catid=$key" title="$val">$val</a></li>
			<!--{/loop}-->
		</ul>
	</div>
			<!--{/loop}-->
	<!--ģ���б����-->
	<!--��̳����б�100�� ��ʼ-->
	<!--{if !empty($channels['menus']['bbs'])}-->
	<!--{block name="bbsforum" parameter="type/forum/limit/0,100/order/f.displayorder/cachetime/21500/cachename/bbsforum/tpl/data"}-->
	<div>
		<h1>$channels['menus']['bbs']['name']</h1>
		<ul>
			<!--{loop $_SBLOCK['bbsforum'] $value}-->
			<li><a href="$value[url]" title="$value[name]">$value[name]</a></li>
			<!--{/loop}-->
		</ul>
	</div>
	<!--{/if}-->

	<!--{if !empty($channels['menus']['uchimage'])}-->
	<div>
		<h1>$channels['menus']['uchimage']['name']</h1>
	</div>
	<!--{/if}-->

	<!--{if !empty($channels['menus']['uchblog'])}-->
	<div>
		<h1>$channels['menus']['uchblog']['name']</h1>
	</div>
	<!--{/if}-->
	</div>

</div>

<!--{template footer}-->