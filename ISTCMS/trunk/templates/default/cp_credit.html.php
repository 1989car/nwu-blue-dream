<?exit?>
<!--{template cp_header}-->

	<ul class="ext_nav clearfix">
		<li><a href="cp.php?ac=credit">������־</a></li>
		<li><a href="cp.php?ac=credit&op=rule">���ֹ���</a></li>
		<!--{if checkperm('allowtransfer') }-->
		<li><a href="cp.php?ac=credit&op=exchange">���ֶһ�</a></li>
		<!--{/if}-->
	</ul>
</div>

<!--{eval $_TPL['rewardtype'] = array('0' => '����','1' => '����','2' => '�ͷ�');
	$_TPL['cycletype'] = array('0' => 'һ����','1' => 'ÿ��','2' => '����','3' => '�������','4' => '��������'); }-->

<div class="column">
	<div class="col1" >
	
	<!--{if empty($op)}-->
		<div class="global_module margin_bot10 bg_fff userpanel">
			<div class="global_module3_caption"><h3>���λ�ã�<a href="cp.php?ac=credit">������־</a></h3></div>
			<div class="integral">
				<div class="integral_caption"><h2>��û�����ʷ</h2></div>
				<table><tbody>
					<tr>
						<td width="17%">��������</td>
						<td width="17%">�ܴ���</td>
						<td width="17%">���ڴ���</td>
						<td width="17%">���λ���</td>
						<td width="18%">���ξ���ֵ</td>
						<td>�����ʱ��</td>
					</tr>
					<!--{if $list}-->
						<!--{loop $list $key $value}-->
						<tr>
							<td><a>$value[rulename]</a></td>
							<td>$value[total]</td>
							<td>$value[cyclenum]</td>
							<td>$value[credit]</td>
							<td>$value[experience]</td>
							<td>#date('m-d H:i',$value[dateline], 1)#</td>
						</tr>
						<!--{/loop}-->
					<!--{else}-->
						<tr>
							<td colspan="6" class="user_no_body">��ʱû�л���κλ���</td>
						</tr>
					<!--{/if}-->
				</tbody></table>
			</div>
		</div>
	<!--{elseif $op=='rule'}-->
		<div class="global_module margin_bot10 bg_fff userpanel">
			<div class="global_module3_caption"><h3>���λ�ã�<a href="cp.php?ac=credit&op=rule">���ֹ���</a></h3></div>
			<div class="personaldata">
				<table><tbody>
					<!--{if $list}-->
						<tr class="font_weight">
							<td>��������</td>
							<td width="80">��������</td>
							<td width="80">��������</td>
							<td width="80">������ʽ</td>
							<td width="80">��û���</td>
							<td width="80">��þ���ֵ</td>
						</tr>
						<!--{loop $list $value}-->
						<tr>
							<td>$value[rulename]</td>
							<td>$_TPL[cycletype][$value[cycletype]]</td>
							<td>$value[rewardnum]</td>
							<td<!--{if $value[rewardtype]==1}--> class="num_add"<!--{else}--> class="num_reduce"<!--{/if}-->>$_TPL[rewardtype][$value[rewardtype]]</td>
							<td><!--{if $value[rewardtype]==1}-->+<!--{else}-->-<!--{/if}-->$value[credit]</td>
							<td><!--{if $value[rewardtype]==2}-->-<!--{else}-->+<!--{/if}-->$value[experience]</td>
						</tr>
						<!--{/loop}-->
					<!--{else}-->
						<tr>
							<td colspan="5" class="user_no_body">������ػ��ֹ���</td>
						</tr>
					<!--{/if}-->
					<!--{if $multi}-->
						<tr>
							<td colspan="6"><div class="pages">$multi</div></td>
						</tr>
					<!--{/if}-->
				</tbody></table>
			</div>
		</div>
	<!--{elseif $op == 'exchange'}-->
		<form method="post" action="cp.php?ac=credit&op=exchange">
			<input type="hidden" name="formhash" value="<!--{eval echo formhash();}-->" />
			<div class="global_module margin_bot10 bg_fff userpanel">
				<div class="global_module3_caption"><h3>���λ�ã�<a href="cp.php?ac=credit&op=rule">���ֶһ�</a></h3></div>
				<div class="sumup">
					<h2>�����Խ��Լ��Ļ��ֶһ�����վ������Ӧ�ã�������̳�����档</h2>
					<table cellspacing="0" cellpadding="0" class="formtable">
						<tr><th width="150">Ŀǰ���Ļ�����:</th>
							<td><span class="big_red">{$_SGLOBAL[member][credit]}</span></td></tr>
						<tr><th><label for="password">����</label>:</th>
							<td><input type="password" name="password" class="t_input" /></td></tr>
						<tr><th>֧������:</th>
							<td><input type="text" id="amount" name="amount" value="0" class="t_input" onkeyup="calcredit();" /></td></tr>
						<tr><th>�һ���:</th>
							<td><input type="text" id="desamount" value="0" class="t_input" disabled />&nbsp;&nbsp;
								<select name="tocredits" id="tocredits" onChange="calcredit();">
								<!--{loop $_CACHE['creditsettings'] $id $ecredits}-->
									<!--{if $ecredits[ratio]}-->
										<option value="$id" unit="$ecredits[unit]" title="$ecredits[title]" ratio="$ecredits[ratio]">$ecredits[title]</option>
									<!--{/if}-->
								<!--{/loop}-->
								</select></td></tr>
						<tr><th>�һ�����:</th>
							<td><span class="bold">1</span>&nbsp;<span id="orgcreditunit">����</span>
								<span id="orgcredittitle"></span>&nbsp;�һ�&nbsp;
								<span class="bold" id="descreditamount"></span>&nbsp;
								<span id="descreditunit"></span><span id="descredittitle"></span></td></tr>
						<tr><th>&nbsp;</th><td><input type="submit" name="exchangesubmit" value="�һ�����" class="submit"></td></tr>
					</table>
				</div>
			</div>
		</form>
	
		<script type="text/javascript">
			function calcredit() {
				tocredit = $('tocredits')[$('tocredits').selectedIndex];
				$('descreditunit').innerHTML = tocredit.getAttribute('unit');
				$('descredittitle').innerHTML = tocredit.getAttribute('title');
				$('descreditamount').innerHTML = Math.round(1/tocredit.getAttribute('ratio') * 100) / 100;
				$('amount').value = $('amount').value.toInt();
				if($('amount').value != 0) {
					$('desamount').value = Math.floor(1/tocredit.getAttribute('ratio') * $('amount').value);
				} else {
					$('desamount').value = $('amount').value;
				}
			}
			String.prototype.toInt = function() {
				var s = parseInt(this);
				return isNaN(s) ? 0 : s;
			}
			calcredit();
		</script>
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