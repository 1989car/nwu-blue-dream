<?php if(!defined('IN_SUPESITE')) exit('Access Denied'); ?><table summary="" id="pagehead" cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
<td><h1>����Ƶ������</h1></td>
<td class="actions">
<table summary="" cellpadding="0" cellspacing="0" border="0" align="right">
<tr>
<td<?=$viewclass?>><a href="<?=$theurl?>" class="view">����Ƶ������</a></td>
<td<?=$addclass?>><a href="<?=$theurl?>&op=add" class="add">����Ƶ��</a></td>
</tr>
</table>
</td>
</tr>
</table>
<?php if($thevalue) { ?>
<script language="javascript">
<!--
function thevalidate(theform) {
return true;
}
//-->
</script>
<form method="post" name="thevalueform" id="theform" action="<?=$theurl?>" enctype="multipart/form-data" onSubmit="return validate(this)">
<input type="hidden" name="formhash" value="<?php echo formhash();; ?>" />
<div class="colorarea01">
<table cellspacing="0" cellpadding="0" width="100%"  class="maintable">
<tr id="tr_name">
<th>Ƶ����</th>
<td><input name="name" type="text" id="name" size="30" value="<?=$thevalue['name']?>" /></td>
</tr>
<tr id="tr_nameid">
<th>Ӣ��ID(�벻Ҫ�����»���)</th>
<td>
<?php if($_GET['op']=='edit') { ?>
<?=$thevalue['nameid']?>
<?php } else { ?>
<input name="nameid" type="text" id="nameid" size="30" value="<?=$thevalue['nameid']?>" />
<?php } ?>
</td>
</tr>
<tr id="tr_url">
<th>���ʵ�ַ</th>
<td><input name="url" type="text" id="url" size="30" value="<?=$thevalue['url']?>" /></td>
</tr>
<?php if($_SC['freshhtml']) { ?>
<tr id="tr_path">
<th>��̬ҳĿ¼</th>
<td><input name="path" type="text" id="path" size="30" value="<?=$thevalue['path']?>" /></td>
</tr>
<tr id="tr_domain">
<th>Ƶ������</th>
<td><input name="domain" type="text" id="domain" size="30" value="<?=$thevalue['domain']?>" /></td>
</tr>
<?php } ?>
<tr id="tr_type">
<th>����</th>
<td>
<?php if($_GET['op']!='edit') { ?>
<input name="type" type="radio" value="channel"
<?php if(!$thevalue['type']) { ?>
 checked
<?php } ?>
 onclick="checktype('tr_usesample');readonlyall(this.form, true);" />����ҳ��&nbsp;&nbsp;
<input name="type" type="radio" value="news"
<?php if($thevalue['type']) { ?>
 checked
<?php } ?>
  onclick="checktype('tr_category');readonlyall(this.form, false);" />����Ƶ��&nbsp;&nbsp;
<?php } else { ?>
<?php $typearr = array('type'=>'����','system'=>'�ۺ�','model'=>'ģ��','user'=>'�Զ���');; ?><?=$typearr[$thevalue['type']]?>
<?php if($thevalue['type']=='user') { ?>
 
<?php if($thevalue['upnameid']=='news') { ?>
����Ƶ��
<?php } else { ?>
����ҳ��
<?php } ?>
<?php } ?>
<?php } ?>
</td>
</tr>
<?php if($_GET['op']!='edit') { ?>
<tr id="tr_usesample"
<?php if($thevalue['type']) { ?>
 style="display:none;"
<?php } ?>
>
<th>���ɻ��������ļ�<p>ѡ������ϵͳ��Ϊ��Ƶ�����ɻ�����PHP�����ļ���ģ���ļ�</p></th>
<td><input name="usesample" type="radio" value="1"
<?php if($thevalue['usesample']) { ?>
 checked
<?php } ?>
 />����&nbsp;&nbsp;
<input name="usesample" type="radio" value="0"
<?php if(!$thevalue['usesample']) { ?>
 checked
<?php } ?>
 />������&nbsp;&nbsp;</td>
</tr>
<tr id="tr_category"
<?php if(!$thevalue['type']) { ?>
 style="display:none;"
<?php } ?>
>
<th>���·���<p>һ��һ�����࣬���Ԫ����"�س�"�񿪡�</p></th>
<td><img src="<?=S_URL?>/admin/images/zoomin.gif" onmouseover="this.style.cursor='pointer'" onclick="zoomtextarea('category', 1)"> 
<img src="<?=S_URL?>/admin/images/zoomout.gif" onmouseover="this.style.cursor='pointer'" onclick="zoomtextarea('category', 0)"><br>
<textarea name="category" rows="8" id="category" cols="37"></textarea></td>
</tr>
<?php } ?>
<?php if(in_array($channels['menus'][$thevalue['nameid']]['type'], array('type')) || ($channels['menus'][$thevalue['nameid']]['type']=='user' && $channels['menus'][$thevalue['nameid']]['upnameid']=='news')) { ?>
<tr id="tr_tpl"
<?php if(!$thevalue['type']) { ?>
 style="display:none;"
<?php } ?>
>
<th>Ƶ����ҳģ��<p>�ɲο�news_index.html.php�����������ϵͳ����Ĭ��ֵ��</p></th>
<td>./templates/<?=$_SCONFIG['template']?>/<input name="tpl" type="text" id="tpl" size="30" value="<?=$thevalue['tpl']?>" />.html.php<br />
��Ҫȷ������ģ���ļ��ϴ���ģ��� ./templates/<?=$_SCONFIG['template']?>/ Ŀ¼���档</td>
</tr>
<tr id="tr_categorytpl"
<?php if(!$thevalue['type']) { ?>
 style="display:none;"
<?php } ?>
>
<th>Ƶ������ҳģ��<p>�ɲο�news_category.html.php�����������ϵͳ����Ĭ��ֵ��</p></th>
<td>./templates/<?=$_SCONFIG['template']?>/<input name="categorytpl" type="text" id="categorytpl" size="30" value="<?=$thevalue['categorytpl']?>" />.html.php<br />
��Ҫȷ������ģ���ļ��ϴ���ģ��� ./templates/<?=$_SCONFIG['template']?>/ Ŀ¼���档</td>
</tr>
<tr id="tr_viewtpl"
<?php if(!$thevalue['type']) { ?>
 style="display:none;"
<?php } ?>
>
<th>Ƶ���鿴ҳģ��<p>�ɲο�news_view.html.php�����������ϵͳ����Ĭ��ֵ��</p></th>
<td>./templates/<?=$_SCONFIG['template']?>/<input name="viewtpl" type="text" id="viewtpl" size="30" value="<?=$thevalue['viewtpl']?>" />.html.php<br />
��Ҫȷ������ģ���ļ��ϴ���ģ��� ./templates/<?=$_SCONFIG['template']?>/ Ŀ¼���档</td>
</tr>
<?php } ?>
</table>
</div>
<br />
<div class="colorarea01">
<h2>Ȩ������</h2>
<table cellspacing="0" cellpadding="0" width="100%"  class="maintable">
<tr>
<th>&nbsp;</th>
<th align="center"><input type="checkbox" onclick="checkall(this.form, 'viewperm', 'chkallview');" name="chkallview" />���</th>
<th align="center"><input type="checkbox" onclick="checkall(this.form, 'postperm', 'chkallpost');" name="chkallpost"  />Ͷ��</th>
<th><input type="checkbox" onclick="checkall(this.form, 'commentperm', 'chkallcomment');" name="chkallcomment" />����</th>
<th><input type="checkbox" onclick="checkall(this.form, 'getattachperm', 'chkallgetattach');" name="chkallgetattach"  />����</th>
<th><input type="checkbox" onclick="checkall(this.form, 'postattachperm', 'chkallpostattach');" name="chkallpostattach" />�ϴ�</th>
<th align="center"><input type="checkbox" onclick="checkall(this.form, 'manageperm', 'chkallmanage');" name="chkallmanage" />��̨����</th>
</tr>
<?php if(is_array($_SGLOBAL['grouparr'])) { foreach($_SGLOBAL['grouparr'] as $value) { ?>
<tr>
<th><input type="checkbox" onclick="checkall(this.form, '<?=$value['groupid']?>', 'groupname_<?=$value['groupid']?>', 'value');" name="groupname_<?=$value['groupid']?>" /><?=$value['grouptitle']?></th>
<td align="center"><input type="checkbox" value="<?=$value['groupid']?>" 
<?php if(in_array($value['groupid'], $viewarr)) { ?>
 checked="checked" 
<?php } ?>
 name="viewperm[]" /></td>
<td align="center"><input type="checkbox" value="<?=$value['groupid']?>" 
<?php if(in_array($value['groupid'], $postarr)) { ?>
 checked="checked" 
<?php } ?>
 name="postperm[]" /></td>
<td align="center"><input type="checkbox" value="<?=$value['groupid']?>" 
<?php if(in_array($value['groupid'], $replyarr)) { ?>
 checked="checked" 
<?php } ?>
 name="commentperm[]" /></td>
<td align="center"><input type="checkbox" value="<?=$value['groupid']?>" 
<?php if(in_array($value['groupid'], $getattacharr)) { ?>
 checked="checked" 
<?php } ?>
 name="getattachperm[]" /></td>
<td align="center"><input type="checkbox" value="<?=$value['groupid']?>" 
<?php if(in_array($value['groupid'], $postattacharr)) { ?>
 checked="checked" 
<?php } ?>
 name="postattachperm[]" /></td>
<td align="center"><input type="checkbox" value="<?=$value['groupid']?>" 
<?php if(in_array($value['groupid'], $managearr)) { ?>
 checked="checked" 
<?php } ?>
 name="manageperm[]" /></td>
</tr>
<?php } } ?>
</table>
</div>
<div class="buttons">
<input type="submit" name="thevaluesubmit" value="�ύ����" class="submit">
<input type="reset" name="thevaluereset" value="����">
<input name="valuesubmit" type="hidden" value="yes" />
<input type="hidden" name="op" value="<?=$_GET['op']?>">
<?php if($_GET['op']=='edit') { ?>
<input type="hidden" name="nameid" value="<?=$thevalue['nameid']?>">
<input type="hidden" name="type" value="<?=$thevalue['upnameid']?>">
<?php } ?>
</div>
</form>
<script language="javascript">
<!--
function checktype(id) {
if(id == 'tr_usesample') {
$(id).style.display='';
$('tr_category').style.display='none';
$('tr_tpl').style.display='none';
$('tr_categorytpl').style.display='none';
$('tr_viewtpl').style.display='none';
} else if('tr_category') {
$(id).style.display='';
$('tr_tpl').style.display='';
$('tr_categorytpl').style.display='';
$('tr_viewtpl').style.display='';
$('tr_usesample').style.display='none';
}
}

function readonlyall(form, type) {
for(var i = 0; i < form.elements.length; i++) {
var e = form.elements[i];
if(e.name.match('postperm') || e.name.match('commentperm') || e.name.match('getattachperm') || e.name.match('postattachperm') || e.name.match('manageperm') || e.name.match('chkallpost') || e.name.match('chkallcomment') || e.name.match('chkallgetattach') || e.name.match('chkallpostattach') || e.name.match('chkallmanage')) {
e.disabled = type;
}
}
}
<?php if(!(in_array($channels['menus'][$thevalue['nameid']]['type'], array('type', 'model')) || ($channels['menus'][$thevalue['nameid']]['type']=='user' && $channels['menus'][$thevalue['nameid']]['upnameid']=='news'))) { ?>
readonlyall($('theform'), true);
<?php } ?>
//-->
</script>
<?php } elseif(is_array($listarr) && $listarr) { ?>
<form method="post" name="listform" id="theform" action="<?=CPURL?>?action=channel" enctype="multipart/form-data">
<input type="hidden" name="formhash" value="<?php echo formhash();; ?>" />
<table cellspacing="2" cellpadding="2" class="helptable">
<tr><td>
<ul>
<li>ϵͳ��������ѶƵ����������Ϊ��ЩƵ������������������ȷ���Ƿ���ʾ��վ��˵����档</li>
<li>�������վ��<u>ϵͳ����</u>����δ����ĳ��Ƶ�����ܣ����Ƶ��������ʾ��վ��˵����档</li>
<li>��Ҳ��������Լ���Ƶ������ĳ��Ƶ������Ϊվ�����ҳ��Ҳ����ָ��Ƶ�����ʵ�ַΪ������վҳ�档</li>
<li>�Լ���ӵ�Ƶ�������ļ������ <u><em>channel</em></u> �ļ������棬ģ���ļ������ <u><em>templates</em></u> ��Ӧ�ķ��Ŀ¼���档����Ҫ����������������޸ġ�</li>
</ul>
</td></tr>
</table>
<table cellspacing="0" cellpadding="0" width="100%"  class="listtable">
<tr>
<th width="20">ɾ?</th>
<th width="">Ӣ��ID</th>
<th width="150">״̬</th>
<th width="30">��Ϊ��ҳ</th>
<th width="60">Ƶ����</th>
<th width="60">���ʵ�ַ</th>
<?php if($_SC['freshhtml']) { ?>
<th width="70">��̬ҳĿ¼</th>
<th width="30">Ƶ������</th>
<?php } ?>
<th width="50">˳��</th>
<th width="60">����</th>
<th width="80">Ƶ������</th>
</tr><?php empty($class) ? $class=' class="darkrow"': $class='';; ?><tr<?=$class?> align="center">
<td>-</td>
<td>-</td>
<td>-</td>
<td><input type="radio" name="default" onclick="defaultchennel(this.form, 'index');" value="index" checked /></td>
<td>�ۺ���ҳ</td>
<td title="<?=S_URL_ALL?>">*</td>
<?php if($_SC['freshhtml']) { ?>
<td>-</td>
<td>-</td>
<?php } ?>
<td>-</td>
<td>-</td>
<td><a href="<?=S_URL_ALL?>" target="_blank">����</a></td>
</tr>
<?php if(is_array($listarr)) { foreach($listarr as $listvalue) { ?>
<?php empty($class) ? $class=' class="darkrow"': $class='';; ?><?php $typearr = array('type'=>'����','system'=>'�ۺ�','model'=>'ģ��','user'=>'�Զ���');; ?><tr<?=$class?> align="center">
<td><input type="checkbox" name="delete[<?=$listvalue['nameid']?>]" value="1"
<?php if($listvalue['type']!='user') { ?>
 disabled
<?php } ?>
 /></td>
<td><strong><?=$listvalue['nameid']?></strong><input type="hidden" name="nameid[<?=$listvalue['nameid']?>]" value="<?=$listvalue['type']?>" /></td>
<td><input type="radio" name="show[<?=$listvalue['nameid']?>]" value="1"
<?php if($listvalue['status']>0) { ?>
 checked
<?php } ?>

<?php if($listvalue['status']==2) { ?>
 disabled
<?php } ?>
 />����
<input type="radio" name="show[<?=$listvalue['nameid']?>]" value="-1"
<?php if($listvalue['status']<0) { ?>
 checked
<?php } ?>

<?php if($listvalue['status']==2) { ?>
 disabled
<?php } ?>
 />�ر�
<input type="radio" name="show[<?=$listvalue['nameid']?>]" value="0"
<?php if($listvalue['status']==0) { ?>
 checked
<?php } ?>

<?php if($listvalue['status']==2) { ?>
 disabled
<?php } ?>
 />����</td>
<td><input type="radio" name="default" onclick="defaultchennel(this.form, '<?=$listvalue['nameid']?>');" value="<?=$listvalue['nameid']?>"
<?php if($listvalue['status']==2) { ?>
 checked
<?php } ?>
 /></td>
<td><input type="text" name="name[<?=$listvalue['nameid']?>]" size="6" value="<?=$listvalue['name']?>" /></td>
<td title="<?=$listvalue['url']?>">
<?php if($listvalue['url']) { ?>
*
<?php } ?>
</td>
<?php if($_SC['freshhtml']) { ?>
<td><input type="text" name="path[<?=$listvalue['path']?>]" size="6" value="<?=$listvalue['path']?>" /></td>
<td title="<?=$listvalue['domain']?>">
<?php if($listvalue['domain']) { ?>
*
<?php } ?>
</td>
<?php } ?>
<td><input type="text" name="displayorder[<?=$listvalue['nameid']?>]" size="2" value="<?=$listvalue['displayorder']?>" /></td>
<td><?=$typearr[$listvalue['type']]?>
<?php if($listvalue['type']=='user') { ?>
<br />
<?php if($listvalue['upnameid']=='news') { ?>
����Ƶ��
<?php } else { ?>
����ҳ��
<?php } ?>
<?php } ?>
</td>
<td><a href="<?=$theurl?>&op=edit&nameid=<?=$listvalue['nameid']?>">�༭</a> | 
<a href="<?=$listvalue['visit']?>" target="_blank">����</a><br>
<a href="<?=$theurl?>&op=edittpl&nameid=<?=$listvalue['nameid']?>" target="_blank">�༭ģ��</a></td>
</tr>
<?php } } ?>
</table>
<table cellspacing="0" cellpadding="0" width="100%"  class="btmtable">
<tr>
<th><input type="checkbox" name="chkall" onclick="checkall(this.form, 'delete')">ȫѡ 
<input name="importdelete" type="radio" value="1" checked /> ɾ��</th>
</tr>
</table>
<div class="buttons">
<input type="submit" name="listsubmit" value="�ύ����" class="submit">
<input type="reset" name="listreset" value="����">
</div>
</form>
<?php } ?>