<?php
/*
 * Created on 2010-6-28
 *
 * 数据库初始化
 */
 require_once ('configs/global.php');
 
 $db_init1 = "
 CREATE TABLE IF NOT EXISTS `nwu_building` (
  `b_id` int(5) NOT NULL AUTO_INCREMENT,
  `b_name` varchar(20) DEFAULT NULL,
  `b_room` char(32) DEFAULT NULL,
  PRIMARY KEY (`b_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;";

 $db_init2 = "
 CREATE TABLE IF NOT EXISTS `nwu_room` (
  `r_id` int(5) NOT NULL AUTO_INCREMENT,
  `r_name` varchar(20) DEFAULT NULL,
  `r_class` char(32) DEFAULT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;";

 $db_init3 = "
 CREATE TABLE IF NOT EXISTS `nwu_class` (
  `c_id` int(5) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(20) DEFAULT NULL,
  `c_department` char(32) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;";

 echo $db_init."<br><br>";
 $info = $db->query($db_init1);
 echo $info;
 
 echo $db_init."<br><br>";
 $info = $db->query($db_init2);
 echo $info;
 
 echo $db_init."<br><br>";
 $info = $db->query($db_init3);
 echo $info;
 
?>
