<?php if(!defined('IN_SUPESITE')) exit('Access Denied'); ?>
<?php if($menus['0']) { ?>
<div class="block style1" id="menus_0">
<h2>ϵͳ����</h2>
<ul class="folder">
<?php if($menus['0']['settings']) { ?>
<li<?=$menuactive['settings']?>><a href="<?=CPURL?>?action=settings">ϵͳ����</a></li>
<?php } ?>

<?php if($menus['0']['channel']) { ?>
<li<?=$menuactive['channel']?>><a href="<?=CPURL?>?action=channel">Ƶ������</a></li>
<?php } ?>

<?php if($menus['0']['html']) { ?>
<li<?=$menuactive['html']?>>
<?php if($_SCONFIG['makehtml'] == 1) { ?>
<a href="<?=CPURL?>?action=makehtml">��̬����</a></li>
<?php } else { ?>
<a href="<?=CPURL?>?action=html">��̬����</a></li>
<?php } ?>
<?php } ?>
<?php if($menus['0']['html'] && $_SC['freshhtml']) { ?>
<li<?=$menuactive['freshhtml']?>><a href="<?=CPURL?>?action=freshhtml">����HTML</a></li>
<?php } ?>

<?php if($menus['0']['tpl']) { ?>
<li<?=$menuactive['tpl']?>><a href="<?=CPURL?>?action=tpl">ģ��༭</a></li>
<?php } ?>

<?php if($menus['0']['css']) { ?>
<li<?=$menuactive['css']?>><a href="<?=CPURL?>?action=css">��ʽ���༭</a></li>
<?php } ?>

<?php if($menus['0']['crons']) { ?>
<li<?=$menuactive['crons']?>><a href="<?=CPURL?>?action=crons">�ƻ�����</a></li>
<?php } ?>

<?php if($menus['0']['database']) { ?>
<li<?=$menuactive['database']?>><a href="<?=CPURL?>?action=database">���ݿ�</a></li>
<?php } ?>

<?php if($menus['0']['words']) { ?>
<li<?=$menuactive['words']?>><a href="<?=CPURL?>?action=words">�������</a></li>
<?php } ?>

<?php if($menus['0']['attachmenttypes']) { ?>
<li<?=$menuactive['attachmenttypes']?>><a href="<?=CPURL?>?action=attachmenttypes">��������</a></li>
<?php } ?>

<?php if($menus['0']['prefields']) { ?>
<li<?=$menuactive['prefields']?>><a href="<?=CPURL?>?action=prefields">Ԥ��ֵ</a></li>
<?php } ?>

<?php if($menus['0']['sitemap']) { ?>
<li<?=$menuactive['sitemap']?>><a href="<?=CPURL?>?action=sitemap">SITEMAP</a></li>
<?php } ?>

<?php if($menus['0']['polls']) { ?>
<li<?=$menuactive['polls']?>><a href="<?=CPURL?>?action=polls">ͶƱ</a></li>
<?php } ?>

<?php if($menus['0']['customfields']) { ?>
<li<?=$menuactive['customfields']?>><a href="<?=CPURL?>?action=customfields">�Զ�����Ϣ</a></li>
<?php } ?>

<?php if($menus['0']['announcements']) { ?>
<li<?=$menuactive['announcements']?>><a href="<?=CPURL?>?action=announcements">�������</a></li>
<?php } ?>

<?php if($menus['0']['ad']) { ?>
<li<?=$menuactive['ad']?>><a href="<?=CPURL?>?action=ad">���</a></li>
<?php } ?>

<?php if($menus['0']['friendlinks']) { ?>
<li<?=$menuactive['friendlinks']?>><a href="<?=CPURL?>?action=friendlinks">��������</a></li>
<?php } ?>

<?php if($menus['0']['cache']) { ?>
<li<?=$menuactive['cache']?>><a href="<?=CPURL?>?action=cache">�������</a></li>
<?php } ?>
</ul>
</div>
<?php } ?>
<?php if($menus['1']) { ?>
<div class="block style1" id="menus_1">
<h2>��Ϣ����</h2>
<ul class="folder">
<?php if($menus['1']['modpost'] || $menus['1']['editpost'] || $menus['1']['delpost']) { ?>
<li<?=$menuactive['spacenews']?>><a href="<?=CPURL?>?action=spacenews">��Ѷ����</a></li>
<?php } ?>

<?php if($models) { ?>
<?php if(is_array($models)) { foreach($models as $value) { ?>
<?php $channel = $value['modelname'];; ?>
<?php if(checkperm('allowmanage')) { ?>
<?php if($menus['1']['modpost'] || $menus['1']['editpost'] || $menus['1']['delpost']) { ?>
<li><a href="<?=CPURL?>?action=modelmanages&mid=<?=$value['mid']?>"><?=$value['modelalias']?>����</a></li>
<?php } ?>
<?php } ?>
<?php } } ?>
<?php } ?>
<?php if($menus['1']['modcat'] || $menus['1']['editcat'] || $menus['1']['delcat']) { ?>
<li<?=$menuactive['categories']?>><a href="<?=CPURL?>?action=categories">��Ѷ����</a></li>
<?php } ?>

<?php if($models) { ?>
<?php if(is_array($models)) { foreach($models as $value) { ?>
<?php if(checkperm('allowmanage', 0, $_SGLOBAL['member']['groupid'], $value['modelname'])) { ?>
<?php if($menus['1']['modcat'] || $menus['1']['editcat'] || $menus['1']['delcat']) { ?>
<li><a href="<?=CPURL?>?action=modelcategories&mid=<?=$value['mid']?>"><?=$value['modelalias']?>����</a></li>
<?php } ?>
<?php } ?>
<?php } } ?>
<?php } ?>
<?php if($menus['1']['check']) { ?>
<li<?=$menuactive['check']?>><a href="<?=CPURL?>?action=check">��Ѷ�ȼ����</a></li>
<?php } ?>

<?php if($models) { ?>
<?php if(is_array($models)) { foreach($models as $value) { ?>
<?php if(checkperm('allowmanage', 0, $_SGLOBAL['member']['groupid'], $value['modelname'])) { ?>
<?php if($menus['1']['folder']) { ?>
<li><a href="<?=CPURL?>?action=modelfolders&mid=<?=$value['mid']?>"><?=$value['modelalias']?>�ȼ����</a></li>
<?php } ?>
<?php } ?>
<?php } } ?>
<?php } ?>
<?php if($menus['1']['postnews']) { ?>
<li<?=$menuactive['postnews']?>><a href="<?=CPURL?>?action=postnews">��Ϣ����</a></li>
<?php } ?>

<?php if($menus['1']['click']) { ?>
<li<?=$menuactive['click']?>><a href="<?=CPURL?>?action=click">�����</a></li>
<?php } ?>
</ul>
</div>
<?php } ?>
<?php if($menus['2']) { ?>
<div class="block style1" id="menus_2">
<h2>�û�����</h2>
<ul class="folder">
<?php if($menus['2']['member']) { ?>
<li<?=$menuactive['member']?>><a href="<?=CPURL?>?action=member">�û�����</a></li>
<?php } ?>

<?php if($menus['2']['usergroups']) { ?>
<li<?=$menuactive['usergroupsadd']?>><a href="<?=CPURL?>?action=usergroups&op=add">�����û���</a></li>
<?php } ?>

<?php if($menus['2']['usergroups']) { ?>
<li<?=$menuactive['usergroups']?>><a href="<?=CPURL?>?action=usergroups">�û���</a></li>
<?php } ?>

<?php if($menus['2']['credit']) { ?>
<li<?=$menuactive['credit']?>><a href="<?=CPURL?>?action=credit">���ֹ���</a></li>
<?php } ?>

<?php if($menus['2']['delmembers']) { ?>
<li<?=$menuactive['delmembers']?>><a href="<?=CPURL?>?action=delmembers">�ָ������û�</a></li>
<?php } ?>
</ul>
</div>
<?php } ?>
<?php if($menus['3']) { ?>
<div class="block style1" id="menus_3">
<h2>ģ�����</h2>
<ul class="folder">
<?php if($menus['3']['blocks']) { ?>
<li<?=$menuactive['blocksadd']?>><a href="<?=CPURL?>?action=blocks&op=add">����ģ��</a></li>
<?php } ?>

<?php if($menus['3']['blocks']) { ?>
<li<?=$menuactive['blocks']?>><a href="<?=CPURL?>?action=blocks">ģ�����</a></li>
<?php } ?>

<?php if($menus['3']['styles']) { ?>
<li<?=$menuactive['stylesadd']?>><a href="<?=CPURL?>?action=styles&op=add">�����·��</a></li>
<?php } ?>

<?php if($menus['3']['styles']) { ?>
<li<?=$menuactive['styles']?>><a href="<?=CPURL?>?action=styles">ģ����</a></li>
<?php } ?>

<?php if($menus['3']['styletpl']) { ?>
<li<?=$menuactive['styletpl']?>><a href="<?=CPURL?>?action=styletpl">���ģ��</a></li>
<?php } ?>
</ul>
</div>
<?php } ?>
<?php if($menus['4']) { ?>
<div class="block style1" id="menus_4">
<h2>����ά��</h2>
<ul class="folder">
<?php if($menus['4']['items']) { ?>
<li<?=$menuactive['items']?>><a href="<?=CPURL?>?action=items">�������</a></li>
<?php } ?>

<?php if($menus['4']['comments']) { ?>
<li<?=$menuactive['comments']?>><a href="<?=CPURL?>?action=comments">���۹���</a></li>
<?php } ?>

<?php if($menus['4']['attachments']) { ?>
<li<?=$menuactive['attachments']?>><a href="<?=CPURL?>?action=attachments">�ϴ���������</a></li>
<?php } ?>

<?php if($menus['4']['tags']) { ?>
<li<?=$menuactive['tags']?>><a href="<?=CPURL?>?action=tags">TAG����</a></li>
<?php } ?>

<?php if($menus['4']['reports']) { ?>
<li<?=$menuactive['reports']?>><a href="<?=CPURL?>?action=reports">�ٱ���Ϣ����</a></li>
<?php } ?>
</ul>
</div>
<?php } ?>
<?php if($menus['5']) { ?>
<div class="block style1" id="menus_5">
<h2>�ɼ�����</h2>
<ul class="folder">
<?php if($menus['5']['modrobot'] || $menus['5']['editrobot']) { ?>
<li<?=$menuactive['robotsadd']?>><a href="<?=CPURL?>?action=robots&op=add">�����»�����</a></li>
<?php } ?>

<?php if($menus['5']['modrobot'] || $menus['5']['userobot'] || $menus['5']['editrobot'] || $menus['5']['delrobot']) { ?>
<li<?=$menuactive['robots']?>><a href="<?=CPURL?>?action=robots">�ɼ���</a></li>
<?php } ?>

<?php if($menus['5']['modrobotmsg']) { ?>
<li<?=$menuactive['robotmessages']?>><a href="<?=CPURL?>?action=robotmessages">�ɼ����¹���</a></li>
<?php } ?>
</ul>
</div>
<?php } ?>
<?php if($menus['6']) { ?>
<div class="block style1" id="menus_6">
<h2>ģ�͹���</h2>
<ul class="folder">
<?php if($menus['6']['models']) { ?>
<li<?=$menuactive['modelsadd']?>><a href="<?=CPURL?>?action=models&op=add">�½�ģ��</a></li>
<?php } ?>

<?php if($menus['6']['models']) { ?>
<li<?=$menuactive['models']?>><a href="<?=CPURL?>?action=models">ģ�͹���</a></li>
<?php } ?>

<?php if($menus['6']['models']) { ?>
<li<?=$menuactive['modelsimport']?>><a href="<?=CPURL?>?action=models&op=import">ģ�ͱ���</a></li>
<?php } ?>
</ul>
</div>
<?php } ?>
<?php if($menus['7']) { ?>
<div class="block style1" id="menus_7">
<h2>�ۺ�����</h2>
<ul class="folder">
<?php if($menus['7']['bbs']) { ?>
<li<?=$menuactive['bbs']?>><a href="<?=CPURL?>?action=bbs">��̳����</a></li>
<?php } ?>

<?php if($menus['7']['bbsforums']) { ?>
<li<?=$menuactive['bbsforums']?>><a href="<?=CPURL?>?action=bbsforums">���ۺ�</a></li>
<?php } ?>

<?php if($menus['7']['threads']) { ?>
<li<?=$menuactive['threads']?>><a href="<?=CPURL?>?action=threads">���������ۺ�</a></li>
<?php } ?>

<?php if($menus['7']['uchome']) { ?>
<li<?=$menuactive['uchome']?>><a href="<?=CPURL?>?action=uchome">UCHome����</a></li>
<?php } ?>
</ul>
</div>
<?php } ?>
<script>cpmenus(<?=$acid?>);</script>