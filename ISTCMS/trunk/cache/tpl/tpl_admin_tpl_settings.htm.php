<?php if(!defined('IN_SUPESITE')) exit('Access Denied'); ?><table summary="" id="pagehead" cellpadding="0" cellspacing="0" border="0" width="100%">
<tr>
<td><h1>ϵͳ����</h1></td>
<td class="actions"></td>
</tr>
</table>

<form method="post" name="thevalueform" id="theform" action="<?=CPURL?>?action=settings" enctype="multipart/form-data">

<input type="hidden" name="formhash" value="<?php echo formhash();; ?>" />

<div class="colorarea01">
<table cellspacing="2" cellpadding="2" class="helptable">
<tr>
<td>
<ul>
<li>��ͨ����ҳ����Զ�վ�������Ϣ������Ŀ¼��htmlĿ¼��ͼƬˮӡ��ͼƬ����ͼ�Ƚ��в����趨��</li>
</ul>
</td>
</tr>
</table>
</div>

<a name="base"></a>
<div class="colorarea02">

<h2>վ������</h2>
<table cellspacing="0" cellpadding="0" width="100%"  class="maintable">

<tr id="tr_sitename">
<th>վ������</th>
<td><input name="sitename" type="text" id="sitename" size="30" value="<?=$thevalue['sitename']?>" /></td>
</tr>

<tr id="tr_closesite">
<th>��ʱ�ر�վ��</th>
<td>
<select name="closesite" id="closesite">
<option value="0"
<?php if(!$thevalue['closesite']) { ?>
 selected
<?php } ?>
>վ�㿪��</option>
<option value="1"
<?php if($thevalue['closesite']) { ?>
 selected
<?php } ?>
>վ��ر�</option>
</select>
</td>
</tr>

<tr id="tr_closemessage">
<th>�ر�վ���ԭ��</th>
<td><textarea name="closemessage" style="width:98%;" rows="3"><?=$thevalue['closemessage']?></textarea></td>
</tr>

<tr id="tr_template">
<th>վ����Ŀ¼</th>
<td>
<select name="template" id="template">
<?php if(is_array($templatearr)) { foreach($templatearr as $key => $value) { ?>
<option value="<?=$key?>"
<?php if($key == $thevalue['template']) { ?>
 selected
<?php } ?>
><?=$value?></option>
<?php } } ?>
</select>
</td>
</tr>

<tr id="tr_attachmentdirtype">
<th>վ�㸽�����෽ʽ</th>
<td>
<select name="attachmentdirtype" id="attachmentdirtype">
<?php if(is_array($attachmentdirtypearr)) { foreach($attachmentdirtypearr as $key => $value) { ?>
<option value="<?=$key?>"
<?php if($key == $thevalue['attachmentdirtype']) { ?>
 selected
<?php } ?>
><?=$value?></option>
<?php } } ?>
</select>
</td>
</tr>

<tr id="tr_allowregister">
<th>վ���Ƿ񿪷�ע��</th>
<td>
<select name="allowregister" id="allowregister">
<option value="0"
<?php if(!$thevalue['allowregister']) { ?>
 selected
<?php } ?>
>������</option>
<option value="1"
<?php if($thevalue['allowregister']) { ?>
 selected
<?php } ?>
>����</option>
</select>
</td>
</tr>

<tr id="tr_registerrule">
<th>ע���������<p>�û�ע���ʱ�����ʾ����Ҫ���ܵķ��������֧��html���ԣ�����ʹ��&lt;br&gt;��</p></th>
<td><textarea name="registerrule" style="width:98%;" rows="3"><?=$thevalue['registerrule']?></textarea></td>
</tr>

<tr id="tr_allowcache">
<th>���û���<p>ǿ�ҽ��鿪�����������Ļ���������Ӱ�����������</p></th>
<td>
<select name="allowcache" id="allowcache">
<option value="0"
<?php if(!$thevalue['allowcache']) { ?>
 selected
<?php } ?>
>����������</option>
<option value="1"
<?php if($thevalue['allowcache']) { ?>
 selected
<?php } ?>
>��������</option>
</select>
</td>
</tr>

<tr id="tr_cachemode">
<th>����洢��ʽ</th>
<td>
<select name="cachemode" id="cachemode">
<option value="database"
<?php if($thevalue['cachemode'] != 'file') { ?>
 selected
<?php } ?>
>�洢�����ݿ�</option>
<option value="file"
<?php if($thevalue['cachemode'] == 'file') { ?>
 selected
<?php } ?>
>�洢���ı�</option>
</select>
</td>
</tr>

<tr id="tr_allowguestsearch">
<th>�����ο�����</th>
<td>
<select name="allowguestsearch" id="allowguestsearch">
<option value="0"
<?php if(!$thevalue['allowguestsearch']) { ?>
 selected
<?php } ?>
>������</option>
<option value="1"
<?php if($thevalue['allowguestsearch']) { ?>
 selected
<?php } ?>
>����</option>
</select>
</td>
</tr>

<tr id="tr_allowguestdownload">
<th>�����ο����ظ���</th>
<td>
<select name="allowguestdownload" id="allowguestdownload">
<option value="0"
<?php if(!$thevalue['allowguestdownload']) { ?>
 selected
<?php } ?>
>������</option>
<option value="1"
<?php if($thevalue['allowguestdownload']) { ?>
 selected
<?php } ?>
>����</option>
</select>
</td>
</tr>

<tr id="tr_allowtagshow">
<th>����TAG�㹦��<p>���������ܺ�ϵͳ���Զ�ѡȡ����tag�������������Զ�����tag����<p></th>
<td>
<select name="allowtagshow" id="allowtagshow">
<option value="0"
<?php if(!$thevalue['allowtagshow']) { ?>
 selected
<?php } ?>
>������</option>
<option value="1"
<?php if($thevalue['allowtagshow']) { ?>
 selected
<?php } ?>
>����</option>
</select>
</td>
</tr>

<tr id="tr_miibeian">
<th>��վ������Ϣ<p>������������վ����Ϣ��ҵ���ı�����Ϣ������:��ICP��04000001��</p></th>
<td><input name="miibeian" type="text" id="miibeian" size="30" value="<?=$thevalue['miibeian']?>" /></td>
</tr>

<tr id="tr_searchinterval">
<th>�������ʱ��(��)<p>0��ʾ������</p></th>
<td><input name="searchinterval" type="text" id="searchinterval" size="10" value="<?=$thevalue['searchinterval']?>" /></td>
</tr>
<tr id="tr_searchinterval">
<th>Ͷ��ʱ��(��)<p>0��ʾ������</p></th>
<td><input name="searchinterval" type="text" id="posttime" size="10" value="<?=$thevalue['posttime']?>" /></td>
</tr>
<tr id="tr_bbsurltype">
<th>��̳��uchome����URL��ʽ<p>���õ�վ�������ȡ��̳����б�,uchome��־�������û�������������ֱ�ӽ������Ӧ�ò鿴������ʹ��վ��ģʽ�鿴</p></th>
<td>
<select name="bbsurltype" id="bbsurltype">
<option value="site"
<?php if($thevalue['bbsurltype'] != 'bbs') { ?>
 selected
<?php } ?>
>վ��ģʽ</option>
<option value="bbs"
<?php if($thevalue['bbsurltype'] == 'bbs') { ?>
 selected
<?php } ?>
>���ӵ�Ӧ��</option>
</select>
</td>
</tr>
<tr><th><?=$alang['allowpostnews']?></th><td><input type="radio" name="allowpostnews" value="1" <?=$checkedarr['1']?> /><?=$alang['postnews_on']?><input type="radio" name="allowpostnews" value="0" <?=$checkedarr['0']?> /><?=$alang['postnews_off']?></td></tr>

</table>

</div>

<div class="buttons">
<input type="submit" name="thevaluesubmit" value="�ύ����" class="submit" onclick="this.form.action+='&subtype=base';">
<input type="reset" name="thevaluereset" value="����">
</div>

<a name="dir"></a>

<div class="colorarea03">

<h2>����·������</h2>
<table cellspacing="0" cellpadding="0" width="100%"  class="maintable">

<tr id="tr_attachmentdir">
<th>վ�㸽��Ŀ¼<p>����Ϊ����������Ŀ¼������ ./ ��ͷ�����Ŀ¼(ĩβ��Ҫ�� / )</p></th>
<td><input name="attachmentdir" type="text" id="attachmentdir" size="30" value="<?=$thevalue['attachmentdir']?>" /></td>
</tr>

<tr id="tr_attachmenturl">
<th>վ�㸽��URL��ַ<p>�������վ�㸽��Ŀ¼Ϊ ./ ��ͷ�����Ŀ¼����ѡ�����Ϊ�ա�������������http://��ͷ��URL��ַ(ĩβ��Ҫ�� / )</p></th>
<td><input name="attachmenturl" type="text" id="attachmenturl" size="30" value="<?=$thevalue['attachmenturl']?>" /></td>
</tr>

<tr id="tr_htmldir">
<th>HTML���Ŀ¼<p>����Ϊ����������Ŀ¼������ ./ ��ͷ�����Ŀ¼(ĩβ��Ҫ�� / )</p></th>
<td><input name="htmldir" type="text" id="htmldir" size="30" value="<?=$thevalue['htmldir']?>" /></td>
</tr>

<tr id="tr_htmlurl">
<th>HTML��URL��ַ<p>�������HTML���Ŀ¼Ϊ ./ ��ͷ�����Ŀ¼����ѡ�����Ϊ�ա�������������http://��ͷ��URL��ַ(ĩβ��Ҫ�� / )</p></th>
<td><input name="htmlurl" type="text" id="htmlurl" size="30" value="<?=$thevalue['htmlurl']?>" /></td>
</tr>

</table>

</div>

<div class="buttons">
<input type="submit" name="thevaluesubmit" value="�ύ����" class="submit" onclick="this.form.action+='&subtype=dir';">
<input type="reset" name="thevaluereset" value="����">
</div>

<a name="thumb"></a>

<div class="colorarea01">

<h2>����ͼ����</h2>
<table cellspacing="0" cellpadding="0" width="100%"  class="maintable">

<tr id="tr_thumbbgcolor">
<th>����ͼ����ɫ</th>
<td><input name="thumbbgcolor" type="text" id="thumbbgcolor" size="30" value="<?=$thevalue['thumbbgcolor']?>" /></td>
</tr>

<tr id="tr_thumboption">
<th>����ͼ����ģʽ</th>
<td>
<select name="thumboption" id="thumboption">
<?php if(is_array($thumboptionarr)) { foreach($thumboptionarr as $key => $value) { ?>
<option value="<?=$key?>"
<?php if($key == $thevalue['thumboption']) { ?>
 selected
<?php } ?>
><?=$value?></option>
<?php } } ?>
</select>
</td>
</tr>

<tr id="tr_thumbcutmode">
<th>����ͼ����ģʽ</th>
<td><select name="thumbcutmode" id="thumbcutmode">
<option value="0"
<?php if($thevalue['thumbcutmode'] == 0) { ?>
 selected
<?php } ?>
>Ĭ��ģʽ</option>
<option value="1"
<?php if($thevalue['thumbcutmode'] == 1) { ?>
 selected
<?php } ?>
>����ϼ���ģʽ</option>
<option value="2"
<?php if($thevalue['thumbcutmode'] == 2) { ?>
 selected
<?php } ?>
>�м����ģʽ</option>
<option value="3"
<?php if($thevalue['thumbcutmode'] == 3) { ?>
 selected
<?php } ?>
>�һ��¼���ģʽ</option>
</select>
</td>
</tr>

<tr id="tr_thumbcutstartx">
<th>���е���ʼ������<p>��λ:����(px)</p></th>
<td><input name="thumbcutstartx" type="text" id="thumbcutstartx" size="30" value="<?=$thevalue['thumbcutstartx']?>" /></td>
</tr>

<tr id="tr_thumbcutstarty">
<th>���е���ʼ������<p>��λ:����(px)</p></th>
<td><input name="thumbcutstarty" type="text" id="thumbcutstarty" size="30" value="<?=$thevalue['thumbcutstarty']?>" /></td>
</tr>

<tr>
<th>��Ѷ����ͼ���<p>Ĭ�Ϲ��400x300</p></th>
<td>��� <input type="text" name="thumbarray[news][0]" value="<?=$thevalue['thumbarray']['news']['0']?>" size="5"> ����, �߶� <input type="text" name="thumbarray[news][1]" value="<?=$thevalue['thumbarray']['news']['1']?>" size="5"> ����</td>
</tr>

</table>

</div>

<div class="buttons">
<input type="submit" name="thevaluesubmit" value="�ύ����" class="submit" onclick="this.form.action+='&subtype=thumb';">
<input type="reset" name="thevaluereset" value="����">
</div>

<a name="watermark"></a>

<div class="colorarea02">

<h2>ˮӡ����</h2>
<table cellspacing="0" cellpadding="0" width="100%"  class="maintable">

<tr id="tr_watermark">
<th>ͼƬ���ˮӡ</th>
<td><input name="watermark" type="radio" value="0"
<?php if(!$thevalue['watermark']) { ?>
 checked
<?php } ?>
 />�����ˮӡ&nbsp;&nbsp;
<input name="watermark" type="radio" value="1"
<?php if($thevalue['watermark']) { ?>
 checked
<?php } ?>
 />���ˮӡ&nbsp;&nbsp;</td>
</tr>

<tr id="tr_watermarkfile">
<th>ˮӡͼƬ�ļ���ַ<p>֧��GIF��PNG����ˮӡͼƬ����GD�����֧��GIF��PNG</p></th>
<td><input name="watermarkfile" type="text" id="watermarkfile" size="30" value="<?=$thevalue['watermarkfile']?>" /></td>
</tr>

<tr id="tr_">
<th>ˮӡ����λ��</th>
<td>
<table cellspacing="0" cellpadding="0" class="watermark">
<tr align="center">
<td><input type="radio" name="watermarkstatus" value="1"
<?php if($thevalue['watermarkstatus'] == 1) { ?>
 checked
<?php } ?>
> #1</td>
<td><input type="radio" name="watermarkstatus" value="2"
<?php if($thevalue['watermarkstatus'] == 2) { ?>
 checked
<?php } ?>
> #2</td>
<td><input type="radio" name="watermarkstatus" value="3"
<?php if($thevalue['watermarkstatus'] == 3) { ?>
 checked
<?php } ?>
> #3</td>
</tr>
<tr>
<td><input type="radio" name="watermarkstatus" value="4"
<?php if($thevalue['watermarkstatus'] == 4) { ?>
 checked
<?php } ?>
> #4</td>
<td><input type="radio" name="watermarkstatus" value="5"
<?php if($thevalue['watermarkstatus'] == 5) { ?>
 checked
<?php } ?>
> #5</td>
<td><input type="radio" name="watermarkstatus" value="6"
<?php if($thevalue['watermarkstatus'] == 6) { ?>
 checked
<?php } ?>
> #6</td>
</tr>
<tr>
<td><input type="radio" name="watermarkstatus" value="7"
<?php if($thevalue['watermarkstatus'] == 7) { ?>
 checked
<?php } ?>
> #7</td>
<td><input type="radio" name="watermarkstatus" value="8"
<?php if($thevalue['watermarkstatus'] == 8) { ?>
 checked
<?php } ?>
> #8</td>
<td><input type="radio" name="watermarkstatus" value="9"
<?php if($thevalue['watermarkstatus'] == 9) { ?>
 checked
<?php } ?>
> #9</td>
</tr>
</table>
</td>
</tr>

<tr id="tr_watermarktrans">
<th>ˮӡ�ں϶�<p>����ˮӡͼƬ��ԭʼͼƬ���ں϶ȣ���ΧΪ 1~100 ����������ֵԽ��ˮӡͼƬ͸����Խ��</p></th>
<td><input name="watermarktrans" type="text" id="watermarktrans" size="30" value="<?=$thevalue['watermarktrans']?>" /></td>
</tr>

<tr id="tr_watermarkjpgquality">
<th>ͼƬ��������<p>�������ˮӡ���ͼƬ��������ΧΪ 1~100 ����������ֵԽ������Խ�ߣ�����ͼƬ��СҲԽ��</p></th>
<td><input name="watermarkjpgquality" type="text" id="watermarkjpgquality" size="30" value="<?=$thevalue['watermarkjpgquality']?>" /></td>
</tr>

</table>

</div>

<div class="buttons">
<input type="submit" name="thevaluesubmit" value="�ύ����" class="submit" onclick="this.form.action+='&subtype=watermark';">
<input type="reset" name="thevaluereset" value="����">
</div>

<a name="rss"></a>

<div class="colorarea03">

<h2>RSS����</h2>
<table cellspacing="0" cellpadding="0" width="100%"  class="maintable">

<tr id="tr_rssnum">
<th>Ĭ��RSS��¼��</th>
<td><input name="rssnum" type="text" id="rssnum" size="30" value="<?=$thevalue['rssnum']?>" /></td>
</tr>

<tr id="tr_rssupdatetime">
<th>RSS�����Զ����¼��</th>
<td><input name="rssupdatetime" type="text" id="rssupdatetime" size="10" value="<?=$thevalue['rssupdatetime']?>" />
<select name="slrssupdatetime" onchange="changevalue('rssupdatetime', this.value)">
<?php if(is_array($htmltimearr)) { foreach($htmltimearr as $key => $value) { ?>
<option value="<?=$key?>"
<?php if($key == $thevalue['rssupdatetime']) { ?>
 selected
<?php } ?>
><?=$value?></option>
<?php } } ?>
</select></td>
</tr>

</table>

</div>

<div class="buttons">
<input type="submit" name="thevaluesubmit" value="�ύ����" class="submit" onclick="this.form.action+='&subtype=rss';">
<input type="reset" name="thevaluereset" value="����">
</div>

<a name="seo"></a>

<div class="colorarea01">

<h2>���������Ż�</h2>
<table cellspacing="0" cellpadding="0" width="100%"  class="maintable">

<tr id="tr_urltype">
<th>վ������URL��ʽ<p>�����Ը����Լ��ķ��������ѡ����ʵ�URL��ʽ</p></th>
<td>
<select name="urltype" id="urltype">
<option value="1"
<?php if($thevalue['urltype'] == 1) { ?>
 selected
<?php } ?>
>���ͨ��ģʽ(URL�϶̵�Ӱ��ҳ��Ч��)</option>
<option value="4"
<?php if($thevalue['urltype'] == 4) { ?>
 selected
<?php } ?>
>��Чͨ��ģʽ(ҳ��Ч�ʸߵ�URL�ϳ�)</option>
<option value="2"
<?php if($thevalue['urltype'] == 2) { ?>
 selected
<?php } ?>
>���APACHEģʽ(��Apace����������)</option>
<option value="5"
<?php if($thevalue['urltype'] == 5) { ?>
 selected
<?php } ?>
>��ЧAPACHEģʽ(��Apace����������)</option>
<option value="3"
<?php if($thevalue['urltype'] == 3) { ?>
 selected
<?php } ?>
>���REWRITEģʽ(�������REWRITE֧��)</option>
</select>
</td>
</tr>

<tr id="tr_pagepostfix">
<th>վ������URL��׺<p>����վ������URL��ʽΪ���ģʽ����Ч</p></th>
<td><input name="pagepostfix" type="text" id="pagepostfix" size="30" value="<?=$thevalue['pagepostfix']?>" /></td>
</tr>

<tr id="tr_seotitle">
<th>���⸽����</th>
<td><input name="seotitle" type="text" id="seotitle" size="30" value="<?=$thevalue['seotitle']?>" /></td>
</tr>

<tr id="tr_seokeywords">
<th>Meta Keywords</th>
<td><input name="seokeywords" type="text" id="seokeywords" size="30" value="<?=$thevalue['seokeywords']?>" /></td>
</tr>

<tr id="tr_seodescription">
<th>Meta Description</th>
<td><input name="seodescription" type="text" id="seodescription" size="30" value="<?=$thevalue['seodescription']?>" /></td>
</tr>

<tr id="tr_seohead">
<th>����ͷ����Ϣ</th>
<td><textarea name="seohead" style="width:98%;" rows="6"><?=$thevalue['seohead']?></textarea></td>
</tr>

</table>

</div>

<div class="buttons">
<input type="submit" name="thevaluesubmit" value="�ύ����" class="submit" onclick="this.form.action+='&subtype=seo';">
<input type="reset" name="thevaluereset" value="����">
</div>
<?php if($_SC['freshhtml']) { ?>
<a name="html"></a>

<div class="colorarea01">

<h2>��̬ҳ����</h2>
<table cellspacing="0" cellpadding="0" width="100%"  class="maintable">

<tr id="tr_makehtml">
<th>��Ѷ��̬��ѡ��<br /><p>��ͳģʽ:��̬���ɣ��ʺ��û����<p><p>�Ż�ģʽ:ȫ����̬���ɣ�SEOЧ����<p></th>
<td><input name="makehtml" type="radio" value="0" 
<?php if(!$thevalue['makehtml']) { ?>
 checked
<?php } ?>
 />��ͳ��̬ģʽ&nbsp;&nbsp;
<input name="makehtml" type="radio" value="1" 
<?php if($thevalue['makehtml']) { ?>
 checked
<?php } ?>
 />�Ż���̬ģʽ&nbsp;&nbsp;</td>
</tr>

</table>

</div>

<div class="buttons">
<input type="submit" name="thevaluesubmit" value="�ύ����" class="submit" onclick="this.form.action+='&subtype=seo';">
<input type="reset" name="thevaluereset" value="����">
</div>
<?php } ?>
<a name="comments"></a>

<div class="colorarea02">

<h2>��������</h2>
<table cellspacing="0" cellpadding="0" width="100%"  class="maintable">

<tr>
<th>�Ƿ�������<p>������ϵ�ʱ�򣬿�����ʱ������ȫ�����ܹر�</p></th>
<td>
<input type="radio" name="commstatus" value="1"
<?php if($thevalue['commstatus']) { ?>
 checked
<?php } ?>
> ���� 
<input type="radio" name="commstatus" value="0"
<?php if(!$thevalue['commstatus']) { ?>
 checked
<?php } ?>
> �ر�
</td>
</tr>

<tr>
<th>���ۿ򱳾�ͼƬ<p>����ɷ��ñ���վLOGO��Ҳ���ԷŹ��ͼƬ����Ҫȷ������ͼƬ�ϴ�������� ./images/comment/ Ŀ¼���档</p></th>
<td>./images/comment/<input type="text" name="commicon" value="<?=$thevalue['commicon']?>" size="15"></td>
</tr>

<tr>
<th>���ۿ�Ĭ������</th>
<td><input name="commdefault" type="text" size="30" value="<?=$thevalue['commdefault']?>" /></td>
</tr>

<tr>
<th>���ۼ��ʱ��<p>(Ϊ0ʱ�޼������,��λ:��)</p></th>
<td><input type="text" name="commenttime" value="<?=$thevalue['commenttime']?>" size=10></td>
</tr>

<tr>
<th>��Ϣҳ��������<p>��Ϣ�鿴ҳ�·�������ʾ������</p></th>
<td><input type="text" name="viewspace_pernum" value="<?=$thevalue['viewspace_pernum']?>" size="10"></td>
</tr>

<tr>
<th>���۲鿴ҳ����<p>���۲鿴ҳÿҳ��ʾ������</p></th>
<td><input type="text" name="commviewnum" value="<?=$thevalue['commviewnum']?>" size="10"></td>
</tr>

<tr>
<th>����ʽ<p>�����ʺ����۵���ɳ�������㡣�����ʺϸ�¥�������ظ�¥�㡣</p></th>
<td>
<select name="commorderby" id="commorderby">
<option value="1"
<?php if($thevalue['commorderby']) { ?>
 selected
<?php } ?>
>����</option>
<option value="0"
<?php if(!$thevalue['commorderby']) { ?>
 selected
<?php } ?>
>����</option>
</select>
</td>
</tr>

<tr>
<th>��ʾ����<p>��¥ʱ�Ĳ���������ֵƫСʱ�ɳ�������Ч����0��ʾ�����ƣ��ɳ��ָ�¥��ۡ�</p></th>
<td><input name="commfloornum" type="text" id="commfloornum" size="10" value="<?=$thevalue['commfloornum']?>" /></td>
</tr>

<th>�Ƿ�������ͬ¥��<p>����¥�������ж�ǰ���Ƿ�����ͬ¥�㣬����л��Զ����ء�����ʽΪ����Ч����ѣ�����ʱ��¥Ч���ϲ��˵������ǲ����鿪���˹��ܡ�</p></th>
<td>
<input name="commhidefloor" type="radio" value="1"
<?php if($thevalue['commhidefloor']) { ?>
 checked
<?php } ?>
 />����&nbsp;&nbsp;
<input name="commhidefloor" type="radio" value="0"
<?php if(!$thevalue['commhidefloor']) { ?>
 checked
<?php } ?>
 />������&nbsp;&nbsp;
</td>
</tr>

<tr id="tr_allowguest">
<th>�����ο�����</th>
<td>
<input name="allowguest" type="radio" value="1"
<?php if($thevalue['allowguest']) { ?>
 checked
<?php } ?>
 />����&nbsp;&nbsp;
<input name="allowguest" type="radio" value="0"
<?php if(!$thevalue['allowguest']) { ?>
 checked
<?php } ?>
 />������&nbsp;&nbsp;
</td>
</tr>

<tr>
<th>�Ƿ���������<p>��¼��Ļ�Ա���������Լ���ʵ��ݡ�</p></th>
<td>
<input name="commanonymous" type="radio" value="1"
<?php if($thevalue['commanonymous']) { ?>
 checked
<?php } ?>
 />����&nbsp;&nbsp;
<input name="commanonymous" type="radio" value="0"
<?php if(!$thevalue['commanonymous']) { ?>
 checked
<?php } ?>
 />������&nbsp;&nbsp;
</td>
</tr>

<tr>
<th>�Ƿ���ʾIP<p>������ǰ̨���ߺ�������ip:192.168.*.*���͵�IP</p></th>
<td><input type="radio" name="commshowip" value="1"
<?php if($thevalue['commshowip']) { ?>
 checked
<?php } ?>
> ��ʾ 
<input type="radio" name="commshowip" value="0"
<?php if(!$thevalue['commshowip']) { ?>
 checked
<?php } ?>
> ����ʾ 
</td>
</tr>

<tr>
<th>�Ƿ���������IP<p>���������Լ���ip������Ч����ip:*.*.*.*</p></th>
<td><input type="radio" name="commhideip" value="1"
<?php if($thevalue['commhideip']) { ?>
 checked
<?php } ?>
> ���� 
<input type="radio" name="commhideip" value="0"
<?php if(!$thevalue['commhideip']) { ?>
 checked
<?php } ?>
> ������ 
</td>
</tr>

<tr>
<th>�Ƿ���ʾ����λ��<p>������ǰ̨����ǰ�����֣��㶫��ݸXXX</p></th>
<td><input type="radio" name="commshowlocation" value="1"
<?php if($thevalue['commshowlocation']) { ?>
 checked
<?php } ?>
> ��ʾ 
<input type="radio" name="commshowlocation" value="0"
<?php if(!$thevalue['commshowlocation']) { ?>
 checked
<?php } ?>
> ����ʾ
</td>
</tr>

<tr>
<th>�Ƿ�������������λ��<p>���������Լ���λ�ã�����ǰ�治���������λ��</p></th>
<td><input type="radio" name="commhidelocation" value="1"
<?php if($thevalue['commhidelocation']) { ?>
 checked
<?php } ?>
> ���� 
<input type="radio" name="commhidelocation" value="0"
<?php if(!$thevalue['commhidelocation']) { ?>
 checked
<?php } ?>
> ������ 
</td>
</tr>

<tr>
<th>�Ƿ񿪷ű��۹���<p>�����󣬵������ȶȴﵽָ������ʱ�Զ�����</p></th>
<td><input type="radio" name="commdebate" value="1"
<?php if($thevalue['commdebate']) { ?>
 checked
<?php } ?>
> ���� 
<input type="radio" name="commdebate" value="0"
<?php if(!$thevalue['commdebate']) { ?>
 checked
<?php } ?>
> ������ 
</td>
</tr>

<tr>
<th>���۽綨ֵ<p>�������ȶȴﵽ����ֵʱ���Զ��������۹���</p></th>
<td><input name="commdivide" type="text" size="10" value="<?=$thevalue['commdivide']?>" /></td>
</tr>

</table>

</div>

<div class="buttons">
<input type="submit" name="thevaluesubmit" value="�ύ����" class="submit" onclick="this.form.action+='&subtype=comments';">
<input type="reset" name="thevaluereset" value="����">
</div>

<a name="mail"></a>

<div class="colorarea02">

<h2>�ʼ�����</h2>
<table cellspacing="0" cellpadding="0" width="100%" class="maintable">
<tbody>
<tr>
<th style="width: 15em;">�ʼ����ͷ�ʽ</th>
<td>
<input type="radio" onclick="$('tb_smtp1').style.display = 'none';$('tb_smtp2').style.display = 'none';" value="1" name="mail[mailsend]" class="radio"
<?php if($_SC['mailsend'] == 1 ) { ?>
 checked
<?php } ?>
 /> ͨ�� PHP ������ sendmail ����(�Ƽ��˷�ʽ)<br/>
<input type="radio" onclick="$('tb_smtp1').style.display = '';$('tb_smtp2').style.display = '';" value="2" name="mail[mailsend]" class="radio"
<?php if($_SC['mailsend'] == 2) { ?>
 checked
<?php } ?>
 /> ͨ�� SOCKET ���� SMTP ����������(֧�� ESMTP ��֤)<br/>
<input type="radio" onclick="$('tb_smtp1').style.display = '';$('tb_smtp2').style.display = 'none';" value="3" name="mail[mailsend]" class="radio"
<?php if($_SC['mailsend'] == 3) { ?>
 checked
<?php } ?>
 /> ͨ�� PHP ���� SMTP ���� Email(�� Windows ��������Ч, ��֧�� ESMTP ��֤)
</td>
</tr>

<tr>
<th>�ʼ�ͷ�ķָ���</th>
<td>
<input type="radio" value="0" name="mail[maildelimiter]" class="radio"
<?php if($mailcfg['maildelimiter'] == 0) { ?>
 checked
<?php } ?>
 /> ʹ�� LF ��Ϊ�ָ���(ͨ��Ϊ Unix/Linux ����)<br/>
<input type="radio" value="1" name="mail[maildelimiter]" class="radio"
<?php if($mailcfg['maildelimiter'] == 1) { ?>
 checked
<?php } ?>
 /> ʹ�� CRLF ��Ϊ�ָ���(ͨ��Ϊ Windows ����)<br/>
<input type="radio" value="2" name="mail[maildelimiter]" class="radio"
<?php if($mailcfg['maildelimiter'] == 2) { ?>
 checked
<?php } ?>
 /> ʹ�� CR ��Ϊ�ָ���(ͨ��Ϊ Mac ����)
</td>
</tr>

<tr>
<th>�ռ�����ʾ�û���</th>
<td>
<input type="radio" checked="" value="1" name="mail[mailusername]" class="radio"
<?php if($mailcfg['mailusername']) { ?>
 checked
<?php } ?>
 /> ��    
<input type="radio" value="0" name="mail[mailusername]" class="radio"
<?php if(!$mailcfg['mailusername']) { ?>
 checked
<?php } ?>
  /> ��    
</td>
</tr>
</tbody>

<tbody id="tb_smtp1" <?=$smtparr['1']?> >
<tr>
<th></th>
<td>
<table>
<tbody>
<tr>
<td width="120">SMTP ������</td>
<td><input type="text" name="mail[server]" value="<?=$mailcfg['server']?>" /></td>
</tr>
<tr>
<td>SMTP �˿�</td>
<td><input type="text" size="5" name="mail[port]" value="<?=$mailcfg['port']?>" /> Ĭ��Ϊ 25</td>
</tr>
</tbody>

<tbody id="tb_smtp2" <?=$smtparr['2']?> >
<tr>
<td>Ҫ�������֤</td>
<td><input type="radio" checked="" value="1" name="mail[auth]" class="radio"
<?php if($mailcfg['auth']) { ?>
 checked
<?php } ?>
 /> ��     
<input type="radio" value="0" name="mail[auth]" class="radio"
<?php if(!$mailcfg['auth']) { ?>
 checked
<?php } ?>
 /> ��</td>
</tr>
<tr>
<td>�������ʼ���ַ</td>
<td><input type="text" name="mail[from]" value="<?=$mailcfg['from']?>" /><br/>��ʽΪ��username &lt;user@domain.com&gt;����Ҳ����ֻ���ַ</td>
</tr>
<tr>
<td>SMTP �û���</td>
<td><input type="text" value="<?=$mailcfg['auth_username']?>" name="mail[auth_username]"/></td>
</tr>
<tr>
<td>SMTP ����</td>
<td><input type="password" value="<?=$mailcfg['auth_password']?>" name="mail[auth_password]"/></td>
</tr>
</tbody>
</table>
</td>
</tr>

</tbody></table>

</div>

<div class="buttons">
<input type="submit" name="thevaluesubmit" value="�ύ����" class="submit" onclick="this.form.action+='&subtype=mail';">
<input type="reset" name="thevaluereset" value="����">
</div>

<a name="other"></a>

<div class="colorarea02">

<h2>��������</h2>
<table cellspacing="0" cellpadding="0" width="100%"  class="maintable">

<tr id="tr_gzipcompress">
<th>ҳ��GZIPѹ��</th>
<td>
<input name="gzipcompress" type="radio" value="0"
<?php if(!$thevalue['gzipcompress']) { ?>
 checked
<?php } ?>
 />������GZIPѹ��&nbsp;&nbsp;
<input name="gzipcompress" type="radio" value="1"
<?php if($thevalue['gzipcompress']) { ?>
 checked
<?php } ?>
 />����GZIPѹ��&nbsp;&nbsp;</td>
</tr>

<tr id="tr_debug">
<th>��ʾ����������Ϣ</th>
<td>
<input name="debug" type="radio" value="0"
<?php if(!$thevalue['debug']) { ?>
 checked
<?php } ?>
 />����ʾ&nbsp;&nbsp;
<input name="debug" type="radio" value="1"
<?php if($thevalue['debug']) { ?>
 checked
<?php } ?>
 />��ʾ&nbsp;&nbsp;</td>
</tr>

<tr id="tr_updateview">
<th>�Ƿ�����ˢ��<p>ע��:��������ˢ�»����ӷ���������</p></th>
<td><input name="updateview" type="radio" value="0"
<?php if(!$thevalue['updateview']) { ?>
 checked
<?php } ?>
 />����ˢ��&nbsp;&nbsp;
<input name="updateview" type="radio" value="1"
<?php if($thevalue['updateview']) { ?>
 checked
<?php } ?>
 />��ˢ��&nbsp;&nbsp;</td>
</tr>

<tr id="tr_">
<th>�Զ�����˵ȼ�����<p>ϵͳ�ṩ����ȼ�����Ϣ��˼���������Ϊ�������˵ȼ�ָ������</p></th>
<td>
<table>
<tr><td>һ�ȼ�</td><td><input type="text" name="checkgrade[]" value="<?=$checkgrade['0']?>" size="20"></td></tr>
<tr><td>���ȼ�</td><td><input type="text" name="checkgrade[]" value="<?=$checkgrade['1']?>" size="20"></td></tr>
<tr><td>���ȼ�</td><td><input type="text" name="checkgrade[]" value="<?=$checkgrade['2']?>" size="20"></td></tr>
<tr><td>�ĵȼ�</td><td><input type="text" name="checkgrade[]" value="<?=$checkgrade['3']?>" size="20"></td></tr>
<tr><td>��ȼ�</td><td><input type="text" name="checkgrade[]" value="<?=$checkgrade['4']?>" size="20"></td></tr>
</table>
</td>
</tr>

<tr id="tr_timeoffset">
<th>ϵͳĬ��ʱ��</th>
<td>
<select name="timeoffset" id="timeoffset">
<?php if(is_array($timeoffsetarr)) { foreach($timeoffsetarr as $key => $value) { ?>
<option value="<?=$key?>"
<?php if($key == $thevalue['timeoffset']) { ?>
 selected
<?php } ?>
><?=$value?></option>
<?php } } ?>
</select>
</td>
</tr>

<tr>
<th>�Ƿ��ֹ��֤�빦��</th>
<td><input type="radio" name="noseccode" value="0"
<?php if(!$thevalue['noseccode']) { ?>
 checked
<?php } ?>
> ʹ����֤�� 
<input type="radio" name="noseccode" value="1"
<?php if($thevalue['noseccode']) { ?>
 checked
<?php } ?>
> ��ֹʹ�� </td>
</tr>

<tr>
<th>�Ƿ�����Ѷ������</th>
<td><input type="radio" name="newsjammer" value="1"
<?php if($thevalue['newsjammer']) { ?>
 checked
<?php } ?>
> ���������� 
<input type="radio" name="newsjammer" value="0"
<?php if(!$thevalue['newsjammer']) { ?>
 checked
<?php } ?>
> ��ֹ������ 
</td>
</tr>

<tr>
<th>��ҳ��ʾ����������</th>
<td><input type="text" name="showindex" value="<?=$thevalue['showindex']?>" size=10></td>
</tr>

<tr>
<th>�Ƿ����¼����͹���</th>
<td><input type="radio" name="allowfeed" value="1"
<?php if($thevalue['allowfeed']) { ?>
 checked
<?php } ?>
> ���� 
<input type="radio" name="allowfeed" value="0"
<?php if(!$thevalue['allowfeed']) { ?>
 checked
<?php } ?>
> ������</td>
</tr>

<tr>
<th>�����¼�����</th>
<td><input type="checkbox" name="addfeed[1]" value="1"<?=$feedchecks['1']?>> ���� 
<input type="checkbox" name="addfeed[2]" value="1"<?=$feedchecks['2']?>> �ظ�</td>
</tr>

</table>

</div>

<div class="buttons">
<input type="submit" name="thevaluesubmit" value="�ύ����" class="submit" onclick="this.form.action+='&subtype=other';">
<input type="reset" name="thevaluereset" value="����">
</div>

</form>