<?php

class action extends mysql
{
    //将需要多次使用且不变的地址定义为常量
    const INDEXURL = 'index.php', LOGINURL = 'login.php', NEWSCLASSURL =
        'newsclass.php', NEWADDURL = 'newsmanage.php?tp=add', NEWLISTURL =
        'newsmanage.php?tp=list', USERLISTURL = 'useradmin.php?tp=useradmin', CONFIGURL =
        'sysmanage.php?tp=baseset';

    //----------------------------------------用户相关操作-----------------------------------------------
    //用户登陆认证
    function user_login($user, $pass, $vcode)
    {
        $query = $this->query("select `name`,`pass` from " . $this->pre .
            "admin where name='" . trim($user) . "'");
        $row = $this->fetch($query);
        if (is_array($row) && strtolower(md5($this->PRE_PASS . $pass)) == strtolower($row['pass']) &&
            strtolower($vcode) == strtolower($_SESSION['vcode']))
        {
            $_SESSION['name'] = $row['name'];
            $_SESSION['shell'] = md5($row['name'] . $row['pass']);
            $_SESSION['ontime'] = mktime();
            $this->showmsg("登陆成功", self::INDEXURL);
        } else
        {
            session_destroy();
            $this->showmsg("登陆失败", self::LOGINURL);
        }
    }

    //用户退出登陆
    function user_logout()
    {
        session_destroy();
        $this->showmsg("登陆已注销", self::LOGINURL);
    }

    //用户登陆检测
    function user_logincheck()
    {
        if (!$this->checkbasename() && (($_SESSION['name'] == '') || ($_SESSION['shell'] ==
            '')))
        {
            $this->showmsg("没有操作权限，请登录", self::LOGINURL);
        } else
        {
            $this->user_online();
        }
    }

    //用户列表
    function user_list()
    {
        $re = $this->query("select * from " . $this->pre . "admin order by id desc");
        return $re;
    }

    //用户修改密码
    function user_mod($user, $pass, $newpass, $renewpass)
    {
        $query = $this->query("select pass from " . $this->pre . "admin where name='" .
            trim($user) . "'");
        if ($row = $this->fetch($query))
        {
            if (($row['pass'] == md5($this->PRE_PASS . $pass)) && ($newpass == $renewpass))
            {
                $query = $this->query("update " . $this->pre . "admin set `pass`='" . md5($this->
                    PRE_PASS . $newpass) . "' where name='" . trim($user) . "'");
                if ($query)
                {
                    session_destroy();
                    $str = "密码修改成功,请重新登陆";
                } else
                {
                    $str = "密码修改失败";
                }
            } else
            {
                $str = "原密码错误/两次输入密码不一致";
            }
        } else
        {
            $str = "该用户不存在";
        }
        $this->showmsg($str, str_replace("?action", "?tp", $this->geturl()));
    }

    //增加用户
    function user_add($user, $pass)
    {
        if ($user != '' && $pass != '')
        {
            $query = $this->query("select id from " . $this->pre . "admin where name='" .
                trim($user) . "'");
            if ($row = $this->fetch($query))
            {
                $str = "该用户已存在";
            } else
            {
                $query = $this->query("insert into " . $this->pre . "admin values ('','" . $user .
                    "','" . md5($this->PRE_PASS . $pass) . "')");
                if ($query)
                {
                    $str = "增加用户成功";
                } else
                {
                    $str = "增加用户失败";
                }
            }

        } else
        {
            $str = "用户名密码都不能为空";
        }
        $this->showmsg($str, str_replace("?action", "?tp", $this->geturl()));
    }

    //删除用户
    function user_del($id)
    {
        $query = $this->query("delete from " . $this->pre . "admin where id =" . $id);
        if ($query)
        {
            $str = "成功删除用户";
        } else
        {
            $str = "删除用户失败";
        }
        $this->showmsg($str, self::USERLISTURL);
    }

    //在线时间检测,大于$logintime T掉用户，结束本次登陆
    function user_online($logintime = 1200)
    {
        $now = mktime();
        if (!$this->checkbasename() && ($now - $_SESSION['ontime'] > $logintime))
        {
            session_destroy();
            $this->showmsg("登陆已超时，请重新登录", self::LOGINURL);
        } else
        {
            $_SESSION['ontime'] = mktime();
        }
    }

    //----------------------------------------配置文件操作-----------------------------------------------
    //增加配置
    function config_add($name, $value)
    {
        if ($this->forbiddenname($name))
        {
            $str = "要增加的配置名属于系统保留，请修改";
        } else
        {
            //检测有没有同名配置
            $query = $this->query("select id from " . $this->pre . "config where name='" .
                trim($name) . "'");
            if ($row = $this->fetch($query))
            {
                $str = "同名配置已存在";
            } else
            {
                $query = $this->query("insert into " . $this->pre .
                    "config (name,value) values ('" . $name . "','" . $value . "')");
                if ($query)
                {
                    $str = "成功增加配置";
                    $this->config_gen();
                } else
                {
                    $str = "增加配置失败";
                }
            }
        }
        $this->showmsg($str, self::CONFIGURL);
    }

    //修改配置
    function config_edit($id, $name, $value)
    {
        //系统初始化后 PRE_PASS 不允许修改
        if ($name == 'PRE_PASS')
        {

            $str = "系统初始化后 PRE_PASS 不允许修改";
        } else
        {
            $query = $this->query("select * from " . $this->pre . "config where id=" . $id);
            if ($row = $this->fetch($query))
            {
                //如果配置名为保留 只修改配置值
                if (!$this->forbiddenname($name))
                {
                    $query = $this->query("update " . $this->pre . "config set `name`='" . $name .
                        "',`value`='" . $value . "' where id=" . $id);
                } else
                {
                    $query = $this->query("update " . $this->pre . "config set `value`='" . $value .
                        "' where id=" . $id);
                }

                if ($query)
                {
                    $str = "配置修改成功";
                    $this->config_gen();
                } else
                {
                    $str = "配置修改失败";
                }
            } else
            {
                $str = "该配置不存在";
            }
        }
        $this->showmsg($str, self::CONFIGURL);
    }

    //生成配置
    function config_gen()
    {
        $query = $this->query("select * from " . $this->pre . "config");
        while ($row = $this->fetch($query))
        {
            $cfgfile .= "$" . $row['name'] . "='" . $row['value'] . "';\r\n";
        }
        $cfgfile = "<?php\r\n" . $cfgfile;
        $cfgfile .= "?>";

        if ($this->savetxtfile("../configs/config.php", $cfgfile, "w") == false)
        {
            $str = "生成配置文件失败";
        } else
        {
            $str = "生成配置文件成功";
        }

        $this->showmsg($str, self::CONFIGURL);
    }

    //检测禁止增加和修改的配置名 作为系统保留配置名
    function forbiddenname($name)
    {
        if (($name == 'host') || ($name == 'user') || ($name == 'pass') || ($name ==
            'dbname') || ($name == 'pre') || ($name == 'PRE_PASS') || ($name == 'sitename')|| ($name == 'skin'))
        {
            return true;
        } else
        {
            return false;
        }
    }

    //删除配置
    function config_del($id)
    {
        if ($id<10)
        {
            $str = "要删除的配置名属于系统保留，请修改";
        } else
        {
        $query = $this->query("delete from " . $this->pre . "config where id =" . $id);
        if ($query)
        {
            $str = "成功删除配置";
            $this->config_gen();
        } else
        {
            $str = "删除配置失败";
        }
        }
        $this->showmsg($str, self::CONFIGURL);
    }
    //----------------------------------------新闻分类操作-----------------------------------------------
    //获取新闻无限级分类
    function news_listclass($showtype = 1, $selid = '')
    {
        $arr = array();
        $query = $this->query("select * from " . $this->pre . "newsclass");

        while ($row = $this->fetch($query))
        {
            $arr[] = array($row['id'], $row['fid'], $row['name']);
        }

        return $this->class_arr($arr, $showtype, 0, 0, $selid);
    }

    //获取新闻无限级分类 以逗号分割 供批量操作使用
    function news_listclassbyid($classid)
    {
        $query = $this->query("select * from " . $this->pre . "newsclass where fid=" . $classid);

        while ($row = $this->fetch($query))
        {
            $re .= $row['id'] . ",";
            $re .= $this->news_listclassbyid($row['id']);
        }

        return $re;
    }

    //获取新闻无限级分类--递归函数将分类分级别整理
    function class_arr($arr, $showtype = 1, $m = 0, $id = 0, $selid = 0)
    {
        $n = str_pad('', $m, '-', STR_PAD_RIGHT);
        $n = '|' . $n;
        //$n = str_replace("-", "&nbsp;&nbsp;", $n);
        for ($i = 0; $i < count($arr); $i++)
        {
            if ($arr[$i][1] == $id)
            {
                if ($showtype == 1)
                {
                    $color = $arr[$i][1] == 0 ? "red" : "green";
                    $re .= "<tr><td>&nbsp;</td><td colspan=\"3\"><a href=?tp=editclass&id=" . $arr[$i][0] .
                        "&fid=" . $arr[$i][1] . "&classname=" . urlencode($arr[$i][2]) . ">" . $n .
                        "<font color=" . $color . ">" . $arr[$i][2] .
                        "</font></a></td><td><a href=?tp=editclass&id=" . $arr[$i][0] . "&fid=" . $arr[$i][1] .
                        "&classname=" . urlencode($arr[$i][2]) . ">编辑</a>  <a href=?action=delclass&id=" .
                        $arr[$i][0] . ">删除</a></td>
	    </tr>";
                } elseif ($showtype == 2)
                {
                    $re .= "<option value=\"" . $arr[$i][0] . "\">" . $n . $arr[$i][2] . "</option>\n";
                } elseif ($showtype == 3)
                {
                    $ckd = ($arr[$i][0] == $selid) ? "selected" : "";

                    $re .= "<option value=\"" . $arr[$i][0] . "\" $ckd>" . $n . $arr[$i][2] .
                        "</option>\n";
                }
                $re .= $this->class_arr($arr, $showtype, $m + 1, $arr[$i][0], $selid);
            }
        }
        return $re;
    }


    //增加新闻分类
    function news_addclass($fid, $name)
    {
        //检测同级分类下有没有同名类
        $query = $this->query("select id from " . $this->pre . "newsclass where name='" .
            trim($name) . "' and fid=" . $fid);
        if ($row = $this->fetch($query))
        {
            $str = "同级同名类已存在";
        } else
        {
            $query = $this->query("insert into " . $this->pre .
                "newsclass (fid,name) values (" . $fid . ",'" . $name . "')");
            if ($query)
            {
                $str = "成功增加分类";
            } else
            {
                $str = "增加分类失败";
            }
        }
        $this->showmsg($str, self::NEWSCLASSURL);
    }

    //修改新闻分类
    function news_editclass($id, $fid, $name)
    {
        if ($id == $fid)
        {
            $this->showmsg("不能选择自己作为上级分类", self::NEWSCLASSURL);
        } else
        {
            $query = $this->query("update " . $this->pre . "newsclass set fid=" . $fid .
                ",name='" . $name . "' where id=" . $id);
            if ($query)
            {
                $str = "成功修改分类";
            } else
            {
                $str = "修改分类失败";
            }
            $this->showmsg($str, self::NEWSCLASSURL);
        }
    }

    //删除新闻分类
    function news_delclass($id)
    {
        $ids = $this->news_listclassbyid($id);
        $query = $this->query("delete from " . $this->pre . "newsclass where id in(" . $ids .
            $id . ")");
        //同时删除分类下新闻
        $this->news_delnewsbycid($ids . $id);
        if ($query)
        {
            $str = "成功删除分类";
        } else
        {
            $str = "删除分类失败";
        }
        $this->showmsg($str, self::NEWSCLASSURL);
    }

    //----------------------------------------新闻相关操作-----------------------------------------------
    //添加新闻
    function news_addnews($title, $keyword, $fid, $author, $content, $time, $clicks =
        0)
    {
        $query = $this->query("insert into " . $this->pre . "news values (''," . $fid .
            ",'" . $title . "','" . $author . "'," . $time . "," . $clicks . ")");
        $nid = $this->insertid();
        $query = $this->query("insert into " . $this->pre . "news_content values (''," .
            $nid . ",'" . $keyword . "','" . $content . "')");
        if ($query)
        {
            $str = "添加新闻成功";
        } else
        {
            $str = "添加新闻失败";
        }
        $this->showmsg($str, self::NEWADDURL);
    }

    //修改新闻
    function news_editnews($id, $title, $keyword, $fid, $author, $content)
    {
        $query = $this->query("update " . $this->pre . "news set title='" . $title .
            "',author='" . $author . "',cid=" . $fid . " where id=" . $id);

        $query = $this->query("update " . $this->pre . "news_content set keyword='" . $keyword .
            "',content='" . $content . "' where nid=" . $id);
        if ($query)
        {
            $str = "修改新闻成功";
        } else
        {
            $str = "修改新闻失败";
        }
        $this->showmsg($str, self::NEWLISTURL);
    }

    //删除新闻
    function news_delnews($ids)
    {
        $query = $this->query("delete from " . $this->pre . "news where id in(" . $ids .
            ")");
        $query = $this->query("delete from " . $this->pre . "news_content where nid in(" .
            $ids . ")");
        if ($query)
        {
            $str = "删除新闻成功";
        } else
        {
            $str = "删除新闻失败";
        }
        $this->showmsg($str, self::NEWLISTURL);
    }

    //删除新闻 按照分类删除新闻
    function news_delnewsbycid($ids)
    {
        $query = $this->query("delete from " . $this->pre .
            "news_content where nid in (select id from " . $this->pre . "news where cid in(" .
            $ids . "))");
        $query = $this->query("delete from " . $this->pre . "news where cid in(" . $ids .
            ")");
        if ($query)
        {
            $str = "删除分类及分类下新闻成功";
        } else
        {
            $str = "删除新闻失败";
        }
        $this->showmsg($str, self::NEWSCLASSURL);
    }

    //新闻列表
    function news_listnews($page, $pagesize, $keyword = '', $cid = '0')
    {
        //按照id查找下级id下所有新闻有问题
        if ($keyword != '')
        {
            if ($cid != 0)
            {
                $sql = "select * from " . $this->pre . "news where title like '%" . $keyword .
                    "%' and cid in (" .  $cid . ") order by id desc limit " . ($page - 1) * $pagesize .
                    "," . $pagesize;
            } else
            {
                $sql = "select * from " . $this->pre . "news where title like '%" . $keyword .
                    "%' order by id desc limit " . ($page - 1) * $pagesize . "," . $pagesize;
            }
            $re = $this->query($sql);
        } else
        {
            if ($cid != 0)
            {
                $sql = "select * from " . $this->pre . "news where cid in (" . $cid .
                    ") order by id desc limit " . ($page - 1) * $pagesize . "," . $pagesize;
                $re = $this->query($sql);
            } else
            {
                $re = $this->querypage($this->pre . "news", $page, $pagesize, "id");
            }
        }
        return $re;
    }

    //----------------------------------------数据库操作-----------------------------------------------
    //备份数据库
    function dbbak($dbname, $filesize = 1024)
    {
        //列出所有表
        //$dbresult = @mysql_list_tables($dbname) or die($this->error());
        //$tbresult = @mysql_list_fields($dbrow[0]) or die($this->error());

        //    字段属性
        //    [Field] => id
        //    [Type] => int(5)
        //    [Null] => NO
        //    [Key] => PRI
        //    [Default] =>
        //    [Extra] => auto_increment

        //   SHOW CREATE TABLE p_admin  这个语句可以直接打印出创建表结构的sql语句

        //        $dbresult = $this->query('show create table p_admin');
        //        $dbrow = $this->fetch($dbresult);
        //        print_r($dbrow);
        //        exit;

        $dbresult = $this->query('SHOW TABLES FROM ' . $dbname);
        while ($dbrow = $this->fetch($dbresult))
        {
            //备份数据库结构
            $tbstructure .= "DROP TABLE IF EXISTS `" . $dbrow[0] . "`;\r\n";
            $tbresult = $this->query("show create table `" . $dbrow[0] . "`");
            $tbrow = $this->fetch($tbresult);
            //print_r($tbrow);
            $tbstructure .= $tbrow[1] . ";\r\n";
            //            $tbstructure .= "CREATE TABLE `" . $dbrow[0] . "` (\r\n";
            //            $tbresult = $this->query('SHOW COLUMNS FROM ' . $dbrow[0]);
            //
            //            $PRI = '';
            //            $autoincrement = '';
            //
            //            while ($tbrow = $this->fetch($tbresult))
            //            {
            //                $charset = $this->charset;
            //
            //                if ($tbrow[null] == "NO")
            //                {
            //                    $notnull = "NOT NULL";
            //                } else
            //                {
            //                    $notnull = 'DEFAULT NULL';
            //                }
            //
            //                if ($tbrow[Extra] == "auto_increment")
            //                {
            //                    $autoincrement = " AUTO_INCREMENT";
            //                } else
            //                {
            //                    $autoincrement = "";
            //                }
            //
            //                if ($tbrow[Key] == "PRI")
            //                {
            //                    $PRI = $tbrow[Field];
            //                }
            //
            //                $tbstructure .= "`" . $tbrow[Field] . "` " . $tbrow[Type] . " " . $notnull . $autoincrement .
            //                    ",\r\n";
            //            }
            //            $tbstructure .= mysql_escape_string("PRIMARY KEY (`" . $PRI . "`)")."\r\n";
            //            $tbstructure .= mysql_escape_string(") ENGINE=MyISAM DEFAULT CHARSET=" . $charset )."\r\n\r\n";

            //备份数据库数据
            $tbdataresult = $this->query('Select * FROM ' . $dbrow[0]);
            $start = 0;
            $fields = '';
            while ($tbfieldrow = mysql_fetch_field($tbdataresult))
            {
                //$tbdata .= "insert into `" . $tbrow[Field] . "` " . $tbrow[Type] . " " . $notnull . $autoincrement . ",\r\n";
                if ($start == 0)
                {
                    $fields .= "`" . mysql_escape_string($tbfieldrow->name) . "`";
                } else
                {
                    $fields .= ",`" . mysql_escape_string($tbfieldrow->name) . "`";
                }

                $start++;
            }

            //上面已经生成了栏目名 下面循环 生成数据 暂时没有限制单文件大小 以后补上
            $tbdataresult = $this->query('Select * FROM ' . $dbrow[0]);
            while ($tbdatarow = $this->fetchrow($tbdataresult))
            {
                $start = 0;
                $datas = '';
                foreach ($tbdatarow as $k => $v)
                {
                    if ($start == 0)
                    {
                        $datas .= '\'' . mysql_escape_string($tbdatarow[$k]) . '\'';
                    } else
                    {
                        $datas .= "," . '\'' . mysql_escape_string($tbdatarow[$k]) . '\'';
                    }
                    $start++;
                }
                $tbdata .= "insert into `" . $dbrow[0] . "` (" . $fields . ") values (" . $datas .
                    ");\r\n";
            }

        }

        if ($this->savetxtfile("dbbak/tbstructure.txt", $tbstructure, "w") == false)
        {
            $str .= "备份表结构失败<br>";
        } else
        {
            $str .= "备份表结构成功<br>";
        }

        if ($this->savetxtfile("dbbak/tbdata.txt", $tbdata, "w") == false)
        {
            $str .= "备份表数据失败<br>";
        } else
        {
            $str .= "备份表数据成功<br>";
        }
        $this->showmsg($str);
    }

    //恢复数据库
    function dbrestore($dbname)
    {
        if ($this->exesql(file_get_contents('dbbak/tbstructure.txt')))
        {
            $str .= "恢复表结构失败<br>";
        } else
        {
            $str .= "恢复表结构成功<br>";
        }
        if ($this->exesql(file_get_contents('dbbak/tbdata.txt')))
        {
            $str .= "恢复表数据失败<br>";
        } else
        {
            $str .= "恢复表数据成功<br>";
        }
        $this->showmsg($str);
    }

    //恢复sql脚本
    function exesql($sqltxt)
    {
        //通过sql语法的语句分割符进行分割
        $segment = explode(";\r\n", trim($sqltxt));
        foreach ($segment as $k => $v)
        {
           // echo $v;
			if(trim($v)!='') $this->query($v);
        }
    }
    //----------------------------------------可视化编辑器定义-------------------------------------------
    //实例化 fckeditor
    function editor($input_name, $input_value)
    {
        global $smarty;
        include ('./common/edt/fckeditor.php');
        $sBasePath = './common/edt/';
        $editor = new FCKeditor($input_name);
        $editor->BasePath = $sBasePath; //指定编辑器路径
        $editor->ToolbarSet = "Yangfan"; //编辑器工具栏有Basic（基本工具）,Default（所有工具）选择
        $editor->Width = "100%";
        $editor->Height = "500";
        $editor->Value = $input_value;
        $editor->Config['AutoDetectLanguage'] = true;
        $editor->Config['DefaultLanguage'] = 'cn'; //语言
        $FCKeditor = $editor->CreateHtml();
        $smarty->assign("editor", $FCKeditor); //指定区域

    }

    //----------------------------------------通用函数定义-----------------------------------------------
	//列出模板目录下的皮肤文件
	function listskins()
	{
		return scandir("../templates");
	}

    //检测当前页是不是登陆页面LOGINURL
    function checkbasename()
    {
        $urls = pathinfo($this->geturl());
        $urls = explode('?', $urls['basename']);
        if (strtolower($urls[0]) == self::LOGINURL)
        {
            return true;
        } else
        {
            return false;
        }
    }

    function geturl()
    {
        return $_SERVER['REQUEST_URI'];
    }

    //获得真实ip
    function user_realip()
    {
        if (getenv('HTTP_CLIENT_IP'))
        {
            $ip = getenv('HTTP_CLIENT_IP');
        } elseif (getenv('HTTP_X_FORWARDED_FOR'))
        {
            $ip = getenv('HTTP_X_FORWARDED_FOR');
        } elseif (getenv('REMOTE_ADDR'))
        {
            $ip = getenv('REMOTE_ADDR');
        } else
        {
            $ip = $HTTP_SERVER_VARS['REMOTE_ADDR'];
        }
        return $ip;
    }

    //保存文本文件
    function savetxtfile($filepath, $filecontent = '', $optype = 'w')
    {
        $handle = fopen($filepath, $optype);
        $re = fwrite($handle, $filecontent);
        fclose($handle);
        return $re;
    }

	//防SQL注入函数
	function unsqlin() {
		foreach ($_GET as $key => $value) {
			$_GET[$key] = $this->dowith_sql($value);
		}

		foreach ($_COOKIE as $key => $value) {
			$_COOKIE[$key] = $this->dowith_sql($value);
		}

		foreach ($_POST as $key => $value) {
			if($key!='content'){
					$_POST[$key] =htmlspecialchars($value);
			}

		}
	}

	function dowith_sql($str) {
		$str=strtolower($str);
		$str = str_replace("or", "", $str);
		$str = str_replace("and", "", $str);
		$str = str_replace("union", "", $str);
		$str = str_replace("update", "", $str);
		$str = str_replace("count", "", $str);
		$str = str_replace("mid", "", $str);
		$str = str_replace("char", "", $str);
		$str = str_replace("length", "", $str);
		$str = str_replace("left", "", $str);
		$str = str_replace("into", "", $str);
		$str = str_replace("where", "", $str);
		$str = str_replace("select", "", $str);
		$str = str_replace("create", "", $str);
		$str = str_replace("delete", "", $str);
		$str = str_replace("insert", "", $str);
		$str = str_replace('\\', '', $str);
		$str = str_replace("'", "", $str);
		$str = str_replace('"', '', $str);
		$str = str_replace(" ", "", $str);
		$str = str_replace("=", "", $str);
		$str = str_replace(">", "", $str);
		$str = str_replace("<", "", $str);
		$str = str_replace(";", "；", $str);
		$str = str_replace("%", "", $str);
		return $str;
	}


    //信息提示
    function showmsg($msg = '操作成功', $tourl = '')
    {
        if ($tourl != '')
        {
            echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"><html xmlns=\"http://www.w3.org/1999/xhtml\"><head><META http-equiv=Content-Type content=\"text/html; charset=utf-8\"><meta http-equiv=\"refresh\" content=\"5;URL=$tourl\" /></head>";
            $msg .= "<br /><br />5秒后自动跳转，也可以直接<a href=$tourl><font color=blue>点击这里</font></a>";
        } else
        {
            echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\"><html xmlns=\"http://www.w3.org/1999/xhtml\"><head><META http-equiv=Content-Type content=\"text/html; charset=utf-8\"></head>";
        }

        echo "<body><TABLE cellSpacing=0 cellPadding=0 width=\"30%\" align=center border=0><TR height=200><TD></TD></TR><TR height=22><TD style=\"PADDING-LEFT: 20px; FONT-WEIGHT: bold; COLOR: #ffffff\" align=middle background=images/title_bg2.jpg>YfNews系统提示</TD></TR><TR bgColor=#ecf4fc height=150><TD align=center>$msg</TD></TR></TABLE></body><html>";
        exit();
    }
}

?>