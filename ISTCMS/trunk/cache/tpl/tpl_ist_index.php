<?php if(!defined('IN_SUPESITE')) exit('Access Denied'); ?>
<?php include template('header'); ?>
    <div id="main">
    	<div id="left">
    	    <div style="width: 342px; height: 527px; background: url(<?=S_URL?>/templates/<?=$_SCONFIG['template']?>/images/ibg4.jpg) repeat scroll 0% 0% transparent;" id="pic"></div>
            <div id="mail"><a href="./affairs/?class-xuegongxinxiang.htm" ><img src="<?=S_URL?>/templates/<?=$_SCONFIG['template']?>/images/mail.png" width="181" height="46" alt="" /></a></div>
        </div>
        <div id="content">
        	<div id="nav">
        	<ul>
        
<?php if(is_array($channels['menus'])) { foreach($channels['menus'] as $key => $value) { ?>
<li><a href="<?=$value['url']?>"><?=$value['name']?></a></li>
<?php } } ?>
        	</ul>
            </div>
        	<div id="news"><img src="<?=S_URL?>/templates/<?=$_SCONFIG['template']?>/images/news.png" width="144" height="44" alt=""  />
            	<span class="more"><a href="./news/?cate-xiaonaxinwen.htm">更多&gt;&gt;</a></span> <ul>

<li class=""><a href="./news/?view-2639.htm" title="【经院】经济学院第十四届分团委学生会成立大会隆重举行&#13;点击量：19 &#13;发布时间：2010-09-05 13:32" target="_blank">【经院】经济学院第十四届分团委...</a></li><li class=""><a href="./news/?view-2635.htm" title="【民社】展青春风采 创新瑞院貌——民社院积极开展2009至2010年度“个人风采”评选活动&#13;点击量：69 &#13;发布时间：2010-09-02 22:38" target="_blank">【民社】展青春风采 创新瑞院貌—...</a></li><li class=""><a href="./news/?view-2620.htm" title="分享经历 共话成长——我校召开2010年暑假返校学生代表座谈会&#13;点击量：78 &#13;发布时间：2010-09-01 17:28" target="_blank">分享经历 共话成长——我校召开20...</a></li><li class=""><a href="./news/?view-2618.htm" title="我校2010年新进辅导员培训班圆满结束&#13;点击量：204 &#13;发布时间：2010-08-29 12:43" target="_blank">我校2010年新进辅导员培训班圆满结...[图]</a></li><li class=""><a href="./news/?view-2537.htm" title="全国大学生运动精英首聚中南民族大学——记第十一届“耐克杯”全国大学生运动会&#13;点击量：695 &#13;发布时间：2010-07-11 14:35" target="_blank">全国大学生运动精英首聚中南民族...[图]</a></li><li class=""><a href="./news/?view-2536.htm" title="我校召开学生工作会议 研究部署近期学生教育管理工作&#13;点击量：330 &#13;发布时间：2010-07-07 10:02" target="_blank">我校召开学生工作会议 研究部署近...[图]</a></li><li class=""><a href="./news/?view-2534.htm" title="2010年湖北省大中专学生暑期社会实践暨“青春在沃·学见计划”、“荆楚英才学校”大学生骨干培训班顺利启动&#13;点击量：795 &#13;发布时间：2010-07-05 21:24" target="_blank">2010年湖北省大中专学生暑期社会实...</a></li>                </ul>
            </div>
            <div id="notice"><img src="<?=S_URL?>/templates/<?=$_SCONFIG['template']?>/images/notice.png" width="144" height="44" alt=""  />
            	<span class="more"><a href="./news/?class-zuixingonggao.htm">更多&gt;&gt;</a></span> <ul>

<li class="istop"><a href="./affairs/?view-2629.htm" title="新生“绿色通道”入学流程&#13;点击量：114 &#13;发布时间：2010-09-02 10:40" target="_blank">新生“绿色通道”入学流程</a></li><li class=""><a href="./affairs/?view-2638.htm" title="关于做好2010年生源地信用助学贷款有关工作的通知&#13;点击量：59 &#13;发布时间：2010-09-03 20:22" target="_blank">关于做好2010年生源地信用助学贷款有关...</a></li><li class=""><a href="./affairs/?view-2636.htm" title="关于采集2007-2009级在校学生人口信息的通知&#13;点击量：103 &#13;发布时间：2010-09-03 16:22" target="_blank">关于采集2007-2009级在校学生人口信息的...</a></li><li class=""><a href="./affairs/?view-2634.htm" title="武汉市实有人口信息登记表（空表）&#13;点击量：194 &#13;发布时间：2010-09-02 15:41" target="_blank">武汉市实有人口信息登记表（空表）</a></li><li class=""><a href="./affairs/?view-2633.htm" title="武汉市流动人口信息登记表（空表）&#13;点击量：166 &#13;发布时间：2010-09-02 15:40" target="_blank">武汉市流动人口信息登记表（空表）</a></li><li class=""><a href="./affairs/?view-2631.htm" title="中南民族大学2010级新生报到流程&#13;点击量：81 &#13;发布时间：2010-09-02 10:46" target="_blank">中南民族大学2010级新生报到流程</a></li><li class=""><a href="./affairs/?view-2630.htm" title="中南民族大学2010级新生报到须知&#13;点击量：70 &#13;发布时间：2010-09-02 10:44" target="_blank">中南民族大学2010级新生报到须知</a></li>                </ul>
            </div>
        </div>
        <div id="some">
        	<div id="some_head">&nbsp;</div>

            <div class="something"><a href="http://www.scuec.edu.cn/stu/lecture/" target="_blank"><img src="<?=S_URL?>/templates/<?=$_SCONFIG['template']?>/images/search.png" width="104" height="53" alt=""  /></a></div>
            <div class="something"><a href="#" id="emap"><img src="<?=S_URL?>/templates/<?=$_SCONFIG['template']?>/images/emap.png" width="109" height="54" alt=""  /></a></div>
            <div class="something"><a href="#" id="market"><img src="<?=S_URL?>/templates/<?=$_SCONFIG['template']?>/images/market.png" width="106" height="50" alt=""  /></a></div>
            <div id="some_bottom">&nbsp;</div>
        </div>
        <form id="search">
        	<input type="text" name="w" id="keywords" class="float">
            <input type="image" id="button" src="<?=S_URL?>/templates/<?=$_SCONFIG['template']?>/images/search_button.png">
        </form>

        <div id="system"><a href="http://xjxl.chsi.com.cn/index.do"><img src="<?=S_URL?>/templates/<?=$_SCONFIG['template']?>/images/system.png" width="263" height="77" alt=""  /></a></div>
    </div>
<?php include template('footer'); ?>