<?exit?>
<!--{template cp_header}-->

	<ul class="ext_nav clearfix">
		<li><a href="{S_URL}/cp.php?ac=news&op=add$mpurlstr&{eval echo rand(1, 999999)}">��ҪͶ��</a></li>
		<li><a href="{S_URL}/cp.php?ac=news&op=list&do=pass&type=$type&{eval echo rand(1, 999999)}">�ҵķ�����</a></li>
		<li><a href="{S_URL}/cp.php?ac=news&op=list&type=$type&{eval echo rand(1, 999999)}">�ҵĴ�����</a></li>
	</ul>
</div>

<div class="column">
	<div class="col1" >

<!--{if $op == 'list'}-->

	<form action="{S_URL}/cp.php?ac=news" method="post">
	<input type="hidden" name="formhash" value="<!--{eval echo formhash();}-->" />
	<div class="global_module margin_bot10 bg_fff userpanel">
		<div class="global_module3_caption">
			<h3>���λ�ã�$channels['menus'][$channel][name] &gt;&gt;
				<!--{if $do == 'pass'}-->�ҵķ�����<!--{else}-->�ҵĴ�����<!--{/if}--></h3>
		</div>
		<!--{if $list}-->
			<table class="article_list" cellspacing="0" cellpadding="0">
				<tbody>
					<!--{loop $list $value}-->
					<tr>
						<td class="td_input"><!--{if $do=='me'}--><input type="checkbox" value="$value[itemid]"  name="item[]"/><!--{/if}--></td>
						<td><span class="color_gray">[<a href="{S_URL}/cp.php?ac=news&op=list&do=$do&catid=$value[catid]&type=$type" class="color_gray">{$catarr[$value[catid]][name]}</a>]
							<!--{if $do == 'pass'}-->
							<a href="#action/viewnews/itemid/$value[itemid]#" target="_blank">
							<!--{else}-->
							<a href="{S_URL}/cp.php?ac=news&op=view&itemid=$value[itemid]">
							<!--{/if}-->
							$value[subject]</a> 
							#date("m-d H:i", $value[dateline], 1)#</span></td>
						<td width="130">

							</td>
						<!--{if $do=='me'}-->
						<td width="40">
							<a href="{S_URL}/cp.php?ac=news&amp;op=edit&amp;itemid=$value[itemid]&do=$do">�༭</a>
						</td>
						<!--{/if}-->
					</tr>
					<!--{/loop}-->
					<!--{if $multipage}-->
					<tr>
						<td <!--{if $do=='me'}-->colspan="4"<!--{else}-->colspan="3"<!--{/if}-->>
						$multipage
						</td>
					</tr>
					<!--{/if}-->
					<!--{if $do == 'me'}-->
					<tr class="checkall_box">
						<td class="td_input"><input type="checkbox" onclick="checkall(this.form, 'item')" name="chkall"/> </td>
						<td colspan="4"><label for="check_all">ȫѡ</label> <input class="input_del" type="submit" value="ɾ��" name="delitemsubmit" onclick="return confirm('ɾ�����ɻָ�\nȷ��ɾ����');"/></td>
					</tr>
					<!--{/if}-->
				</tbody>
			</table>
		<!--{else}-->
			<div class="user_no_body"><!--{if empty($_SGLOBAL['supe_uid'])}-->�ο��޷����Ͷ����Ϣ<!--{else}-->û�з�����������Ϣ<!--{/if}--></div>
		<!--{/if}-->
	</div>
	</form>
	
	</div>
	
	<div class="col2" >
		<div id="user_login">
			<script src="{S_URL}/batch.panel.php?rand={eval echo rand(1, 999999)}" type="text/javascript" language="javascript"></script>
		</div><!--user_login end-->
	
		<div id="contribute" class="global_module bg_fff margin_bot10">
			<div class="global_module2_caption"><h3>Ƶ��</h3></div>
			<ul>
				<!--{loop $channels['menus'] $value}-->
					<!--{if $value[type]=='type' || $value[upnameid]=='news'}-->
					<li<!--{if $value[nameid]==$type}--> class="current"<!--{/if}--> onclick="window.location.href='{S_URL}/cp.php?ac=news&op=list&do=$do&type=$value[nameid]&{eval echo rand(1, 999999)}';">
						<span><!--{if $value[nameid]==$type}-->��($listcount)�� ��ǰƵ��<!--{else}-->���<!--{/if}--></span>
						<a>$value[name]</a></li>
					<!--{elseif $value[type]=='model'}-->
					<li onclick="window.location.href='{S_URL}/cp.php?ac=models&op=list&do=$do&nameid=$value[nameid]&{eval echo rand(1, 999999)}';">
						<span>���</span>
						<a>$value[name]</a></li>
					<!--{/if}-->
				<!--{/loop}-->
			</ul>
		</div>
		
		<!--{if $do == 'me'}-->
			<!--{block name="postitem" parameter="type/$type/uid/$_SGLOBAL[supe_uid]/dateline/604800/order/i.dateline DESC/limit/0,10/cachetime/900/subjectlen/32/cachename/mynews"}-->
		<!--{elseif $do=='pass'}-->
			<!--{block name="spacenews" parameter="type/$type/uid/$_SGLOBAL[supe_uid]/dateline/604800/order/i.click_9 DESC,i.dateline DESC/limit/0,10/cachetime/900/subjectlen/32/cachename/mynews"}-->
		<!--{else}-->
			<!--{block name="postitem" parameter="type/$type/dateline/604800/order/i.dateline DESC/limit/0,10/cachetime/900/subjectlen/40/cachename/mynews"}-->
		<!--{/if}-->
		<div class="global_module bg_fff margin_bot10">
			<div class="global_module2_caption"><h3>һ�ܱ�����������</h3></div>
			<ul class="global_tx_list2">
			<!--{loop $_SBLOCK['mynews'] $value}-->
			<li><span class="box_r">$value[click_9]</span><a href="$value[url]" title="$value[subjectall]">$value[subject]</a></li>
			<!--{/loop}-->
			</ul>
		</div>
	
		<!--{if $do == 'me'}-->
			<!--{block name="postitem" parameter="type/$type/uid/$_SGLOBAL[supe_uid]/order/i.dateline DESC/limit/0,10/cachetime/900/subjectlen/32/cachename/mynews2"}-->
		<!--{elseif $do=='pass'}-->
			<!--{block name="spacenews" parameter="type/$type/uid/$_SGLOBAL[supe_uid]/order/i.click_10 DESC,i.dateline DESC/limit/0,10/cachetime/900/subjectlen/32/cachename/mynews2"}-->
		<!--{else}-->
			<!--{block name="postitem" parameter="type/$type/order/i.dateline DESC/limit/0,10/cachetime/900/subjectlen/40/cachename/mynews2"}-->
		<!--{/if}-->
		<div class="global_module bg_fff">
			<div class="global_module2_caption"><h3>һ�ܱ�����������</h3></div>
			<ul class="global_tx_list2">
			<!--{loop $_SBLOCK['mynews2'] $value}-->
			<li><span class="box_r">$value[click_10]</span><a href="$value[url]" title="$value[subjectall]">$value[subject]</a></li>
			<!--{/loop}-->
			</ul>
		</div>
	</div><!--col2-->

<!--{elseif $op=='view'}-->

	<div class="global_module margin_bot10 bg_fff userpanel">
		<div class="global_module3_caption"><h3>���λ�ã�$channels['menus'][$channel][name] &gt;&gt; ��ϸ����</h3></div>
		<div class="view_article">
			<h2>���ݲ鿴</h2>
			<table class="list">
				<tr>
					<td class="left_title">���⣺</td>
					<td>$item[subject]</td>
				</tr>
				<tr>
					<td class="left_title">����:</td>
					<td>{$catarr[$item[catid]][name]}</td>
				</tr>
				<!--{if $item['newsfrom']}-->
				<tr>
					<td class="left_title">��Դ��</td>
					<td>$item[newsfrom]</td>
				</tr>
				<!--{/if}-->
				<!--{if $item['newsfromurl']}-->
				<tr>
					<td class="left_title">��ԴURL��</td>
					<td>$item[newsfromurl]</td>
				</tr>
				<!--{/if}-->
				<!--{if $item['newsauthorl']}-->
				<tr>
					<td class="left_title">ԭ�����ߣ�</td>
					<td>$item[newsauthor]</td>
				</tr>
				<!--{/if}-->
			</table>
			<div id="article_body" class="content">
				<h3>���ݣ�</h3>
				$item[message]
			</div>

		</div>
	</div>
	
	</div>
	
	<div class="col2" >
		<div id="user_login">
			<script src="{S_URL}/batch.panel.php?rand={eval echo rand(1, 999999)}" type="text/javascript" language="javascript"></script>
		</div><!--user_login end-->
	
		<div id="contribute" class="global_module bg_fff margin_bot10">
			<div class="global_module2_caption"><h3>Ƶ��</h3></div>
			<ul>
				<!--{loop $channels['menus'] $value}-->
					<!--{if $value[type]=='type' || $value[upnameid]=='news'}-->
					<li<!--{if $value[nameid]==$type}--> class="current"<!--{/if}--> onclick="window.location.href='{S_URL}/cp.php?ac=news&op=list&do=$do&type=$value[nameid]&{eval echo rand(1, 999999)}';">
						<span><!--{if $value[nameid]==$type}-->��ǰƵ��<!--{else}-->���<!--{/if}--></span>
						<a>$value[name]</a></li>
					<!--{elseif $value[type]=='model'}-->
					<li onclick="window.location.href='{S_URL}/cp.php?ac=models&op=list&do=$do&nameid=$value[nameid]&{eval echo rand(1, 999999)}';">
						<span>���</span>
						<a>$value[name]</a></li>
					<!--{/if}-->
				<!--{/loop}-->
			</ul>
		</div>
		
		<!--{block name="spacenews" parameter="uid/$_SGLOBAL[supe_uid]/order/i.dateline DESC/limit/0,10/cachetime/900/subjectlen/40/subjectdot/0/cachename/mynews"}-->
		<div class="global_module bg_fff margin_bot10">
			<div class="global_module2_caption"><h3>֧������Ͷ��</h3></div>
			<ul class="global_tx_list2">
			<!--{loop $_SBLOCK['mynews'] $value}-->
			<li><a href="$value[url]" title="$value[subjectall]">$value[subject]</a></li>
			<!--{/loop}-->
			</ul>
		</div>
	
		<!--{block name="spacenews" parameter="uid/$_SGLOBAL[supe_uid]/order/i.dateline DESC/limit/0,10/cachetime/900/subjectlen/40/subjectdot/0/cachename/mynews2"}-->
		<div class="global_module bg_fff">
			<div class="global_module2_caption"><h3>��������Ͷ��</h3></div>
			<ul class="global_tx_list2">
			<!--{loop $_SBLOCK['mynews2'] $value}-->
			<li><a href="$value[url]" title="$value[subjectall]">$value[subject]</a></li>
			<!--{/loop}-->
			</ul>
		</div>
	</div><!--col2-->

	<script language="javascript" type="text/javascript">
	<!--
	addMediaAction('article_body');
	addImgLink("article_body");
	//-->
	</script>
<!--{elseif $op=='add' || $op=='edit'}-->

	<script language="javascript">
	<!--//
		function textCounter(obj, showid, maxlimit) {
			var len = strLen(obj.value);
			var showobj = document.getElementById(showid);
			if(len < maxlimit) {
				showobj.innerHTML = maxlimit - len;
			} else {
				obj.value = getStrbylen(obj.value, maxlimit);
				showobj.innerHTML = "0";
			}
		}
		function strLen(str) {
			var charset = is_ie ? document.charset : document.characterSet;
			var len = 0;
			for(var i = 0; i < str.length; i++) {
				len += str.charCodeAt(i) < 0 || str.charCodeAt(i) > 255 ? (charset.toLowerCase() == "utf-8" ? 3 : 2) : 1;
			}
			return len;
		}
	//-->
	</script>
	<form method="post" name="thevalueform" id="theform" action="{S_URL}/cp.php?ac=news" enctype="multipart/form-data" onSubmit="return validate(this)">
	<input type="hidden" name="formhash" value="<!--{eval echo formhash();}-->" />
	<!--{if $_POST['setid']}-->
		<input type="hidden" name="fromtype" value="newspost" />
		<input type="hidden" name="id" value="$_POST[setid]"  />
	<!--{/if}-->
	<div class="global_module margin_bot10 bg_fff userpanel">
		<div class="global_module3_caption">
			<h3>���λ�ã�$channels['menus'][$channel][name] &gt;&gt; �ҵ�Ͷ��</h3>
		</div>
		<div class="contribution">
			<table width="100%" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
						<td width="110" align="right"><span class="color_red">*</span>��&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�⣺</td>
						<td><input id="subject" class="input_tx" onblur="relatekw();" type="text" name="subject" value="$item[subject]" style="$mktitlestyle"  onkeyup="textCounter(this, 'maxlimit', 80);"/>
							<span class="color_gray">��ǰ������д����<strong id="maxlimit">80</strong>�ֽڣ����80���ֽ�</span></td>
					</tr>
					<tr>
						<td align="right"><span class="color_red">*</span>ϵͳ���ࣺ</td>
						<td>
							<select name="catid" id="catid">
								<option>------</option>
								<!--{loop $catarr $value}-->
									<option value="$value[catid]"<!--{if $value['catid'] == $item['catid']}--> selected="selected"<!--{/if}-->>{$value[pre]}{$value[name]}</option>
								<!--{/loop}-->
							</select>
						 	<span class="color_gray">��Ϊ������Ϣ��ȷѡ��һ��ϵͳ���࣬������Ϣ��������˲鿴��</span>
						 </td>
					</tr>
					<tr>
						<td colspan="2" style="padding:0 10px;">
							<div id="fulledit" style="margin-top:12px;" class="editerTextBox"><div id="message" class="editerTextBox"></div></div>
							<script type="text/javascript">
							function init() {
								et = new word("message", "{$item[message]}", 0, 0);
							}
							if(window.Event) {
								window.onload = init;
							} else {
								init();
							}
							</script>
						</td>
					</tr>
				</tbody>
			</table>
			
			<table width="100%" class="globalbox_border">
				<tbody>
					<tr>
						<td width="100" align="right">��ȡԶ����Ѷ��</td>
						<td>
							<input type="text" name="referurl" id="referurl" class="input_tx" size="60" value="" />
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
						<select name="robotlevel">
						<option value="1">�򵥻�ȡ</option>
						<option value="2" selected="selected">���ܻ�ȡ</option>
						</select>
					
						<span id="scharset" name="scharset">
						<select name="charset" id="charset">
						<option value="">�Զ���������</option>
						<option value="GBK">GBK</option>
						<option value="GB2312" selected="true">GB2312</option>
						<option value="BIG5">BIG5</option>
						<option value="UTF-8">UTF-8</option>
					
						<option value="UNICODE">UNICODE</option>
						</select>
						</span>
						<input type="button"  value="��ȡԶ����Ѷ" onclick="return robotReferUrl('getrobotmsg');" />
						<input type="hidden"  value="1" name="isfront" id="isfront" />
							<p class="textmsg" id="divshowrobotmsg" style="display:none"></p>
							<p class="textmsg succ" id="divshowrobotmsgok" style="display:none"></p>
							<span class="color_gray" style="display:block; padding-top:5px;">������ַ���������ȡԶ����Ѷ����ť�Ϳɻ����ַ�е���Ѷ��Ϣ</span>
						</td>
					</tr>
				</tbody>
			</table>

			<table width="100%" class="globalbox_border">
				<tbody>
					<tr>
						<td width="100" align="right">TAG��</td>
						<td>
							<input name="tagname" type="text" id="tagname" class="input_tx" size="30" value="$item[tagname]" /><input type="button"  value="����TAG" onclick="relatekw();return false;" />
						</td>
					</tr>
					<tr>
						<td></td>
						<td>
							<span class="color_gray">TAG����һƪ��Ϣ�Ĺؼ��֣�ֻ�ܰ�����Ӣ�����»��ߣ����Ȳ�����10���ַ������TAG֮���ð�ǿո������</span>
						</td>
					</tr>
				</tbody>
			</table>
			
			<table width="100%" class="globalbox_border">
				<tbody>
					<tr>
						<td width="100" align="right">ԭ�����ߣ�</td>
						<td>
							<input name="newsauthor" type="text" id="newsauthor" class="input_tx" style="width:150px;" value="$item[newsauthor]" />
						</td>
					</tr>
					<tr>
						<td align="right">��Ϣ��Դ��</td>
						<td>
							<input name="newsfrom" type="text" id="newsfrom" class="input_tx" style="width:150px;" value="$item[newsfrom]"  />
						</td>
					</tr>
					<tr>
						<td align="right">��Ϣ��ԴURL��</td>
						<td>
							<input name="newsfromurl" type="text" id="newsfromurl" size="60" value="$item[newsfromurl]" class="input_tx" />
						</td>
					</tr>
				</tbody>
			</table>	
		
			<div style="padding-left:10px;" align="center">
			<input class="input_search" type="submit"  name="postsubmit" onclick="publish_article();"  value="�ύ"/>
			<input class="input_search" type="submit" name="searchbtn" value="����"/>
			<input type="hidden" name="itemid" value="$item[itemid]"/>
			<input type="hidden" name="type" value="$type"/>
			</div>
			
		</div>
	</div>
	</form>
	
	</div>
	
	<div class="col2" style="overflow:visible;">
		<div id="user_login">
			<script src="{S_URL}/batch.panel.php?rand={eval echo rand(1, 999999)}" type="text/javascript" language="javascript"></script>
		</div><!--user_login end-->
	
		<div id="contribute" class="global_module bg_fff margin_bot10">
			<div class="global_module2_caption"><h3>Ͷ��Ƶ��</h3></div>
			<ul>
				<!--{loop $channels['menus'] $value}-->
					<!--{if $value[type]=='type' || $value[upnameid]=='news'}-->
					<li<!--{if $value[nameid]==$type}--> class="current"<!--{else}--> onclick="window.location.href='{S_URL}/cp.php?ac=news&op=add&type=$value[nameid]&{eval echo rand(1, 999999)}';"<!--{/if}-->>
						<span><!--{if $value[nameid]==$type}-->��ǰƵ��<!--{elseif !in_array($value[nameid], $postmenus)}-->��Ȩ��Ͷ��<!--{else}-->Ͷ��<!--{/if}--></span>
						<a>$value[name]</a></li>
					<!--{elseif $value[type]=='model'}-->
					<li onclick="window.location.href='{S_URL}/cp.php?ac=models&op=add&nameid=$value[nameid]&{eval echo rand(1, 999999)}';">
						<span><!--{if !in_array($value[nameid], $postmenus)}-->��Ȩ��Ͷ��<!--{else}-->Ͷ��<!--{/if}--></span>
						<a>$value[name]</a></li>
					<!--{/if}-->
				<!--{/loop}-->
			</ul>
		</div>
				
		<!--{block name="spacenews" parameter="uid/$_SGLOBAL[supe_uid]/order/i.dateline DESC/limit/0,10/cachetime/900/subjectlen/40/subjectdot/0/cachename/mynews"}-->
		<div class="global_module bg_fff margin_bot10">
			<div class="global_module2_caption"><h3>���ͨ����Ͷ��</h3></div>
			<ul class="global_tx_list2">
			<!--{loop $_SBLOCK['mynews'] $value}-->
			<li><a href="$value[url]" title="$value[subjectall]">$value[subject]</a></li>
			<!--{/loop}-->
			</ul>
		</div>
	
		<!--{block name="spacenews" parameter="uid/$_SGLOBAL[supe_uid]/order/i.dateline DESC/limit/0,10/cachetime/900/subjectlen/40/subjectdot/0/cachename/mynews2"}-->
		<div class="global_module bg_fff">
			<div class="global_module2_caption"><h3>�ȴ���˵�Ͷ��</h3></div>
			<ul class="global_tx_list2">
			<!--{loop $_SBLOCK['mynews2'] $value}-->
			<li><a href="$value[url]" title="$value[subjectall]">$value[subject]</a></li>
			<!--{/loop}-->
			</ul>
		</div>
	</div><!--col2-->
	
<!--{/if}-->

</div> 
<iframe id="phpframe" name="phpframe" width="0" height="0" marginwidth="0" frameborder="0" src="about:blank"></iframe>

<!--{template cp_footer}-->
	



