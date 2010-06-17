<?php

class page
{
    private $currentpage; //��ǰҳ
    private $pagesize; //ÿҳ��ʾ������
    private $nums; //������
    private $pagenums; //��ҳ��
    private $disnums; //��ҳ�����г�����������
    private $pagestyle; //��ҳ��ʽ 2�ֹ�ѡ�� ��һҳ��һҳ��123456
    private $disjump; //�Ƿ���ʾ��ת������ҳ
    private $css; //���� ������ҳ��ʽ

    //���캯��
    function __construct($currentpage = 1, $pagesize, $nums, $disnums = 5, $pagestyle =
        1, $disjump = 1, $css = '')
    {
        $this->currentpage = ($currentpage == '') || ($currentpage < 1) ? 1 : intval($currentpage);
        $this->pagesize = intval($pagesize);
        $this->nums = intval($nums);
        $this->pagenums = ceil($this->nums / $this->pagesize);
        $this->disnums = intval($disnums);
        $this->pagestyle = intval($pagestyle);
        $this->disjump = intval($disjump);
        $this->css = $css;
        $this->showpages();
    }

    //�������ķ�ҳ��ʽ ѡ������ĸ���ҳ����
    function showpages()
    {
        $urls = parse_url($_SERVER['REQUEST_URI']);
        $url = $urls['path'];
        $urlquery = $urls['query'];
        $urlquery = str_replace("&page=" . $this->currentpage, "", $urlquery);
        $urlquery = str_replace("page=" . $this->currentpage, "", $urlquery);
        if ($urlquery != '')
            $urlquery = $urlquery . '&';

        $lastpg = $this->pagenums;
        $prev = $this->currentpage - 1;
        $next = $this->currentpage + 1;
        $prev = max(1, $prev);
        $next = min($next, $lastpg);

        switch ($this->pagestyle)
        {
            case 1:
                return $this->pagestyle1($url, $urlquery, $lastpg, $prev, $next);
                break;
            case 2:
                return $this->pagestyle2($url, $urlquery, $lastpg, $prev, $next);
                break;
            default:
                echo '分页类型pagestyle只能为1或者2';
                break;
        }
    }

    function pagestyle1($url, $urlquery, $lastpg, $prev, $next)
    {
        $showpage = "第" . $this->currentpage . "页/共" . $lastpg . "页  <a href=$url?" . $urlquery .
            "page=1>首页</a>  <a href=$url?" . $urlquery . "page=$prev>上一页</a>  <a href=$url?" .
            $urlquery . "page=$next>下一页</a>  <a href=$url?" . $urlquery . "page=$lastpg>末页</a>";

        $showpage .= $this->jumpage($url, $urlquery);
        return $showpage;
    }

    function pagestyle2($url, $urlquery, $lastpg, $prev, $next)
    {
        $showpage = "第" . $this->currentpage . "页/共" . $lastpg . "页  <a href=$url?" . $urlquery .
            "page=1>|<</a>  <a href=$url?" . $urlquery . "page=$prev><<</a>";
        $maxdis = ($this->currentpage + $this->disnums <= $this->pagenums) ? $this->
            currentpage + $this->disnums - 1 : $this->pagenums;
        for ($i = $this->currentpage; $i <= $maxdis; $i++)
        {


            $showpage .= "  <a href=$url?" . $urlquery . "page=$i>" . $i . "</a>";

        }

        $showpage .= "  <a href=$url?" . $urlquery . "page=$next>>></a>  <a href=$url?" .
            $urlquery . "page=$lastpg>>|</a>  ";

        $showpage .= $this->jumpage($url, $urlquery);
        return $showpage;
    }


    //跳转代码
    function jumpage($url, $urlquery)
    {
        //是否显示跳转
        if ($this->disjump == 1)
        {
            $showpage .= "    <select name='jump' onchange=javascript:window.open('" . $url .
                "?" . $urlquery . "page='+this.options[this.selectedIndex].value,'_self')\n";
            $showpage .= "<option>跳转到</option>\n";

            for ($i = 1; $i <= $this->pagenums; $i++)
            {

                $showpage .= "<option value=" . $i;
                if ($i == $this->currentpage)
                    $showpage .= " selected";
                $showpage .= ">" . $i . "</option>\n";
            }
            $showpage .= "</select>\n";
        }
        return $showpage;
    }

    //析构函数
    function __destruct()
    {
        unset($currentpage);
        unset($pagesize);
        unset($nums);
        unset($pagenums);
        unset($disnums);
        unset($style);
        unset($disjump);
        unset($css);
    }
}
?>