<?php
/*
 * Created on 2010-6-16
 *
 * mysql��
 */
 	
class mysql
{
	private $host,$uname,$upass,$db,$scode;
	public $charset,$pre,$PRE_PASS;
	
	function __tosting()
	{
		echo "mysql类";
	}
	
	function __construct($host = 'localhost', $uname = 'root',$upass = '',$db = '',$pre = 'p_',$PRE_PASS = 'NWU_IST_CMS',$scode = 'utf8')
	{
		$this->host = $host;
		$this->uname = $uname;
		$this->upass = $upass;
		$this->db = $db;
		$this->pre = $pre;
		$this->PRE_PASS = $PRE_PASS;
		$this->scode = $scode;
		$this->charset = $scode;
		
		$this->connect($this->host,$this->uname,$this->upass,$this->db,$this->pre,$this->PRE_PASS,$this->scode);
		
		
	}
	
	//������ݿ�����
	function connect($host,$uname,$upass,$db,$pre,$PRE_PASS,$scode)
	{
		$conn = mysql_connect($host,$uname,$upass) or die ($this->error());
		mysql_select_db($db,$conn) or die ($this->error());
		mysql_query('set names'.$scode);		
	}
	
	//��ѯ�ƶ��������ֶ�
	function findall($tbname)
	{
		$query = mysql_query("select * from $tbname") or die ($this->error());
		return $query;
	}
	
	//��ͨ��ѯ����
    function query($sql)
    {
        //���Ե�ʱ�����ʹ�������ʾ����sql���
        //$query = mysql_query($sql) or die("����Sql��䣺" . $sql . "<br>ϵͳ������ʾ:" . $this->error());
        //ϵͳ��ʽ�����Ժ�ʹ�����������ʾ
        $query = mysql_query($sql) or die("ϵͳ������ʾ:" . $this->error());
        return $query;
    }
    
    //��ҳʹ�õĲ�ѯ����
    function querypage($tbname, $page, $pagesize, $orderby)
    {
        $sql = "select * from " . $tbname . " order by " . $orderby . " desc limit " . ($page -
            1) * $pagesize . "," . $pagesize;
        $query = mysql_query($sql) or die($this->error());
        return $query;
    }
    
    //��ȡ�ֶ�����
    function fetch($re)
    {
        $row = mysql_fetch_array($re);
        return $row;
    }

    //��ȡ�ֶ�����
    function fetchrow($re)
    {
        $row = mysql_fetch_row($re);
        return $row;
    }


    //��ȡ��¼��
    function count($tbname, $keyword = '', $cid = '0')
    {
        if (($keyword == '') && ($cid == 0))
        {
            $sql = "select count(*) as nums from " . $tbname;
        } else
        {
            if (($keyword != '') && ($cid != 0))
            {
                $sql = "select count(*) as nums from " . $tbname . " where title like '%" . $keyword .
                    "%' and cid in(" . $cid . ")";
            } elseif ($keyword != '')
            {
                $sql = "select count(*) as nums from " . $tbname . " where title like '%" . $keyword .
                    "%'";
            } else
            {
                $sql = "select count(*) as nums from " . $tbname . " where cid in(" . $cid . ")";
            }
        }

        $re = $this->query($sql);
        $row = $this->fetch($re);
        return $row[nums];
    }

    //��ȡ�ող����id
    function insertid()
    {
        return mysql_insert_id();
    }

    //��ʾmysql����
    function error()
    {
        return mysql_error();
    }

    //�ر���ݿ�
    function close()
    {
        return mysql_close();
    }

    function __call($n, $v)
    {
        echo "��Ч��$n";
    }

    function __destruct()
    {
        $this->close();
    }
	
	
}
 	
 
?>
