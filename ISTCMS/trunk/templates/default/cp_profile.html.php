<?exit?>
<!--{template cp_header}-->

	<ul class="ext_nav clearfix">
		<li><a href="cp.php?ac=profile">���˸���</a></li>
		<li><a href="cp.php?ac=profile&op=avatar">ͷ�����</a></li>
		<li><a href="cp.php?ac=profile&op=email">�������</a></li>
		<li><a href="cp.php?ac=profile&op=pwd">�������</a></li>
	</ul>
</div>

<div class="column">
	<div class="col1" >
		<!--{if empty($op)}-->
			<div class="global_module margin_bot10 bg_fff userpanel">
				<div class="global_module3_caption"><h3>���λ�ã�<a href="cp.php?ac=profile">���˸���</a></h3></div>
				<div class="sumup">
					<table><tbody>
						<tr><td width="200">������</td>
							<td><span class="big_red">{$_SGLOBAL['member'][credit]}</span></td></tr>
						<tr><td>����ֵ</td>
							<td><span class="big_red">{$_SGLOBAL['member'][experience]}</span></td></tr>
						<tr><td>�����û���</td>
							<td>{$_SGLOBAL['grouparr'][$_SGLOBAL['member']['groupid']]['grouptitle']}</td></tr>
						<tr><td>����ʱ��</td>
							<td>#date('Y-m-d',$_SGLOBAL['member']['dateline'])#</td></tr>
						<tr><td>�ϴε�¼</td>
							<td>
							<!--{if ($_SGLOBAL['timestamp'] - $_SGLOBAL['member']['lastlogin']) > 86400}--> 
							#date("Y-m-d", $value[updatetime])#
							<!--{else}-->
							<!--{eval echo intval(($_SGLOBAL['timestamp'] - $_SGLOBAL['member']['lastlogin']) / 3600 + 1);}-->Сʱ֮ǰ
							<!--{/if}-->
							</td></tr>
						<tr><td>������</td>
							<td>#date('Y-m-d',$_SGLOBAL['member']['updatetime'])#</td></tr>
					</tbody></table>
				</div>
			</div>
		<!--{elseif $op=='avatar'}-->
			<div class="global_module margin_bot10 bg_fff userpanel">
				<div class="global_module3_caption"><h3>���λ�ã�<a href="cp.php?ac=profile&op=avatar">ͷ�����</a></h3></div>
				<div class="upavatarbox">
					<table>
						<tbody>
							<tr class="font_weight">
								<td width="170">��ǰ�ҵ�ͷ��</td>
								<td>�����ҵ�ͷ��</td>
							</tr>
							<tr>
								<td><img src="{UC_API}/avatar.php?uid=$_SGLOBAL[supe_uid]&rand=$_SGLOBAL[timestamp]" id="avatar" /></td>
								<td>$uc_avatarflash</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		<!--{elseif $op=='email'}-->
			<form action="cp.php?ac=profile" method="post">
				<input type="hidden" name="formhash" value="<!--{eval echo formhash();}-->" />
				<div class="global_module margin_bot10 bg_fff userpanel">
					<div class="global_module3_caption"><h3>���λ�ã�<a href="cp.php?ac=profile&amp;op=email">�������</a></h3></div>
					<div class="setmail">
						����д�������Ǳ��ܵģ�ȡ�����붼�����͵������䡣<br />
						<table><tbody>
							<tr>
								<td width="70"><label for="setmail_pass">��¼����:</label></td>
								<td><input class="input_tx" id="setmail_pass" type="password" size="30" name="password"/></td>
							</tr>
							<tr>
								<td><label for="setmail_mail">��ʵ����:</label></td>
								<td><input class="input_tx" id="setmail_mail" type="text" size="30" value="$email" name="email"/></td>
							</tr>
							<tr>
								<td></td>
								<td><input class="input_search" type="submit" name="updateemailvalue" value="ȷ��"/>
									<input class="input_search" type="reset" name="searchbtn" value="����"/></td>
							</tr>
						</tbody></table>	
					</div>
				</div>
			</form>
		<!--{elseif $op=='pwd'}-->
			<form action="$cpurl?action=profile" method="post">
				<input type="hidden" name="formhash" value="<!--{eval echo formhash();}-->" />
				<div class="global_module margin_bot10 bg_fff userpanel">
					<div class="global_module3_caption"><h3>���λ�ã�<a href="cp.php?ac=profile&amp;op=pwd">�������</a></h3></div>
					<div class="setmail">
						<table><tbody>
							<tr>
								<td width="70"><label for="setmail_pass">��½�û���:</label></td>
								<td>$_SGLOBAL[supe_username]</td>
							</tr>
							<tr>
								<td><label for="setmail_pass">������:</label></td>
								<td><input class="input_tx" id="setmail_pass" type="password" size="30" name="password"/></td>
							</tr>
							<tr>
								<td><label for="setmail_mail">������:</label></td>
								<td><input class="input_tx" id="setmail_mail" type="password" size="30" value="" name="newpasswd1"/></td>
							</tr>
							<tr>
								<td><label for="setmail_mail">ȷ��������:</label></td>
								<td><input class="input_tx" id="setmail_mail" type="password" size="30" value="" name="newpasswd2"/></td>
							</tr>
							<tr>
								<td></td>
								<td><input class="input_search" type="submit" name="pwdsubmit" value="ȷ��"/>
									<input class="input_search" type="reset" name="searchbtn" value="����"/></td>
							</tr>
						</tbody></table>
					</div>
				</div>
			</form>
		<!--{/if}-->
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
	</div><!--col2-->
</div>
<!--{template cp_footer}-->