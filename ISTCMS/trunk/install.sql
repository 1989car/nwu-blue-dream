/*
SQLyog Ultimate - MySQL GUI v8.21 
MySQL - 5.1.41 : Database - istcms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`istcms` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `istcms`;

/*Table structure for table `supe_adminsession` */

DROP TABLE IF EXISTS `supe_adminsession`;

CREATE TABLE `supe_adminsession` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `ip` char(15) NOT NULL DEFAULT '',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `errorcount` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=MEMORY DEFAULT CHARSET=gbk;

/*Data for the table `supe_adminsession` */

/*Table structure for table `supe_ads` */

DROP TABLE IF EXISTS `supe_ads`;

CREATE TABLE `supe_ads` (
  `adid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `available` tinyint(1) NOT NULL DEFAULT '1',
  `displayorder` tinyint(3) NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL DEFAULT '',
  `adtype` enum('echo','js','iframe','text','code','image','flash') NOT NULL DEFAULT 'text',
  `pagetype` varchar(20) NOT NULL DEFAULT '',
  `type` mediumtext NOT NULL,
  `parameters` mediumtext NOT NULL,
  `system` tinyint(1) NOT NULL DEFAULT '0',
  `style` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`adid`),
  KEY `system` (`system`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_ads` */

/*Table structure for table `supe_announcements` */

DROP TABLE IF EXISTS `supe_announcements`;

CREATE TABLE `supe_announcements` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `author` varchar(15) NOT NULL DEFAULT '',
  `subject` varchar(80) NOT NULL DEFAULT '',
  `announcementsurl` varchar(255) NOT NULL DEFAULT '',
  `displayorder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `starttime` int(10) unsigned NOT NULL DEFAULT '0',
  `endtime` int(10) unsigned NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `timespan` (`starttime`,`endtime`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_announcements` */

/*Table structure for table `supe_attachments` */

DROP TABLE IF EXISTS `supe_attachments`;

CREATE TABLE `supe_attachments` (
  `aid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `isavailable` tinyint(1) NOT NULL DEFAULT '0',
  `type` char(30) NOT NULL DEFAULT '',
  `itemid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `catid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `filename` char(150) NOT NULL DEFAULT '',
  `subject` char(80) NOT NULL DEFAULT '',
  `attachtype` char(10) NOT NULL DEFAULT '',
  `isimage` tinyint(1) NOT NULL DEFAULT '0',
  `size` int(10) unsigned NOT NULL DEFAULT '0',
  `filepath` char(200) NOT NULL DEFAULT '',
  `thumbpath` char(200) NOT NULL DEFAULT '',
  `downloads` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `hash` char(16) NOT NULL DEFAULT '',
  PRIMARY KEY (`aid`),
  KEY `hash` (`hash`),
  KEY `itemid` (`itemid`),
  KEY `uid` (`uid`,`type`,`dateline`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_attachments` */

/*Table structure for table `supe_attachmenttypes` */

DROP TABLE IF EXISTS `supe_attachmenttypes`;

CREATE TABLE `supe_attachmenttypes` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `fileext` char(10) NOT NULL DEFAULT '',
  `maxsize` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=gbk;

/*Data for the table `supe_attachmenttypes` */

insert  into `supe_attachmenttypes`(`id`,`fileext`,`maxsize`) values (1,'jpg',2097152),(2,'jpeg',2097152),(3,'png',2097152),(4,'gif',2097152),(5,'rar',2097152),(6,'txt',2097152),(7,'zip',2097152);

/*Table structure for table `supe_blocks` */

DROP TABLE IF EXISTS `supe_blocks`;

CREATE TABLE `supe_blocks` (
  `blockid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `blocktype` varchar(20) NOT NULL DEFAULT '',
  `blockname` varchar(80) NOT NULL DEFAULT '',
  `blockmodel` tinyint(1) NOT NULL DEFAULT '1',
  `blocktext` text NOT NULL,
  `blockcode` text NOT NULL,
  PRIMARY KEY (`blockid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_blocks` */

/*Table structure for table `supe_cache` */

DROP TABLE IF EXISTS `supe_cache`;

CREATE TABLE `supe_cache` (
  `cachekey` varchar(16) NOT NULL DEFAULT '',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `cachename` varchar(20) NOT NULL DEFAULT '',
  `value` mediumtext NOT NULL,
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cachekey`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_cache` */

/*Table structure for table `supe_cache_0` */

DROP TABLE IF EXISTS `supe_cache_0`;

CREATE TABLE `supe_cache_0` (
  `cachekey` varchar(16) NOT NULL DEFAULT '',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `cachename` varchar(20) NOT NULL DEFAULT '',
  `value` mediumtext NOT NULL,
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cachekey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `supe_cache_0` */

insert  into `supe_cache_0`(`cachekey`,`uid`,`cachename`,`value`,`updatetime`) values ('066958af74f61237',0,'spacenews','N;',1283068039);

/*Table structure for table `supe_cache_1` */

DROP TABLE IF EXISTS `supe_cache_1`;

CREATE TABLE `supe_cache_1` (
  `cachekey` varchar(16) NOT NULL DEFAULT '',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `cachename` varchar(20) NOT NULL DEFAULT '',
  `value` mediumtext NOT NULL,
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cachekey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `supe_cache_1` */

insert  into `supe_cache_1`(`cachekey`,`uid`,`cachename`,`value`,`updatetime`) values ('1232bb375888dab5',0,'spacenews','N;',1283074516),('1fc9f160ab479b24',0,'spacenews','N;',1283074904);

/*Table structure for table `supe_cache_2` */

DROP TABLE IF EXISTS `supe_cache_2`;

CREATE TABLE `supe_cache_2` (
  `cachekey` varchar(16) NOT NULL DEFAULT '',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `cachename` varchar(20) NOT NULL DEFAULT '',
  `value` mediumtext NOT NULL,
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cachekey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `supe_cache_2` */

insert  into `supe_cache_2`(`cachekey`,`uid`,`cachename`,`value`,`updatetime`) values ('2fda1bf5eebb654d',0,'spacenews','N;',1282986865),('2b5649164ddf0a2a',0,'tag','N;',1283072863);

/*Table structure for table `supe_cache_3` */

DROP TABLE IF EXISTS `supe_cache_3`;

CREATE TABLE `supe_cache_3` (
  `cachekey` varchar(16) NOT NULL DEFAULT '',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `cachename` varchar(20) NOT NULL DEFAULT '',
  `value` mediumtext NOT NULL,
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cachekey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `supe_cache_3` */

insert  into `supe_cache_3`(`cachekey`,`uid`,`cachename`,`value`,`updatetime`) values ('3344d17c87c059ef',0,'spacenews','N;',1282986655),('3a0ae0205626bac8',0,'spacenews','N;',1282986775),('39ff60cf84052abd',0,'category','N;',1282995928);

/*Table structure for table `supe_cache_4` */

DROP TABLE IF EXISTS `supe_cache_4`;

CREATE TABLE `supe_cache_4` (
  `cachekey` varchar(16) NOT NULL DEFAULT '',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `cachename` varchar(20) NOT NULL DEFAULT '',
  `value` mediumtext NOT NULL,
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cachekey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `supe_cache_4` */

insert  into `supe_cache_4`(`cachekey`,`uid`,`cachename`,`value`,`updatetime`) values ('4dc9b8a52e02fc38',0,'poll','N;',1283064639),('49a3913a13a36df2',0,'spacenews','N;',1283070255),('4ca0e946dd4672c8',0,'spacenews','N;',1282998827);

/*Table structure for table `supe_cache_5` */

DROP TABLE IF EXISTS `supe_cache_5`;

CREATE TABLE `supe_cache_5` (
  `cachekey` varchar(16) NOT NULL DEFAULT '',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `cachename` varchar(20) NOT NULL DEFAULT '',
  `value` mediumtext NOT NULL,
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cachekey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `supe_cache_5` */

insert  into `supe_cache_5`(`cachekey`,`uid`,`cachename`,`value`,`updatetime`) values ('5bbd65716295e37b',0,'category','a:9:{i:0;a:23:{s:5:\"catid\";s:1:\"1\";s:4:\"upid\";s:1:\"0\";s:4:\"name\";s:12:\"科技世界\";s:4:\"note\";s:0:\"\";s:4:\"type\";s:4:\"news\";s:9:\"ischannel\";s:1:\"0\";s:12:\"displayorder\";s:1:\"0\";s:3:\"tpl\";s:0:\"\";s:7:\"viewtpl\";s:0:\"\";s:5:\"thumb\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:5:\"image\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:10:\"haveattach\";s:1:\"0\";s:8:\"bbsmodel\";s:1:\"0\";s:10:\"bbsurltype\";s:0:\"\";s:10:\"blockmodel\";s:1:\"1\";s:14:\"blockparameter\";s:0:\"\";s:9:\"blocktext\";s:0:\"\";s:3:\"url\";s:48:\"http://localhost/istcms/?action-category-catid-1\";s:8:\"subcatid\";s:1:\"1\";s:8:\"htmlpath\";s:0:\"\";s:6:\"domain\";s:0:\"\";s:7:\"perpage\";s:1:\"0\";s:7:\"prehtml\";s:0:\"\";}i:1;a:23:{s:5:\"catid\";s:1:\"2\";s:4:\"upid\";s:1:\"0\";s:4:\"name\";s:12:\"互联网络\";s:4:\"note\";s:0:\"\";s:4:\"type\";s:4:\"news\";s:9:\"ischannel\";s:1:\"0\";s:12:\"displayorder\";s:1:\"0\";s:3:\"tpl\";s:0:\"\";s:7:\"viewtpl\";s:0:\"\";s:5:\"thumb\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:5:\"image\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:10:\"haveattach\";s:1:\"0\";s:8:\"bbsmodel\";s:1:\"0\";s:10:\"bbsurltype\";s:0:\"\";s:10:\"blockmodel\";s:1:\"1\";s:14:\"blockparameter\";s:0:\"\";s:9:\"blocktext\";s:0:\"\";s:3:\"url\";s:48:\"http://localhost/istcms/?action-category-catid-2\";s:8:\"subcatid\";s:1:\"2\";s:8:\"htmlpath\";s:0:\"\";s:6:\"domain\";s:0:\"\";s:7:\"perpage\";s:1:\"0\";s:7:\"prehtml\";s:0:\"\";}i:2;a:23:{s:5:\"catid\";s:1:\"3\";s:4:\"upid\";s:1:\"0\";s:4:\"name\";s:12:\"财经报道\";s:4:\"note\";s:0:\"\";s:4:\"type\";s:4:\"news\";s:9:\"ischannel\";s:1:\"0\";s:12:\"displayorder\";s:1:\"0\";s:3:\"tpl\";s:0:\"\";s:7:\"viewtpl\";s:0:\"\";s:5:\"thumb\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:5:\"image\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:10:\"haveattach\";s:1:\"0\";s:8:\"bbsmodel\";s:1:\"0\";s:10:\"bbsurltype\";s:0:\"\";s:10:\"blockmodel\";s:1:\"1\";s:14:\"blockparameter\";s:0:\"\";s:9:\"blocktext\";s:0:\"\";s:3:\"url\";s:48:\"http://localhost/istcms/?action-category-catid-3\";s:8:\"subcatid\";s:1:\"3\";s:8:\"htmlpath\";s:0:\"\";s:6:\"domain\";s:0:\"\";s:7:\"perpage\";s:1:\"0\";s:7:\"prehtml\";s:0:\"\";}i:3;a:23:{s:5:\"catid\";s:1:\"4\";s:4:\"upid\";s:1:\"0\";s:4:\"name\";s:12:\"体育资讯\";s:4:\"note\";s:0:\"\";s:4:\"type\";s:4:\"news\";s:9:\"ischannel\";s:1:\"0\";s:12:\"displayorder\";s:1:\"0\";s:3:\"tpl\";s:0:\"\";s:7:\"viewtpl\";s:0:\"\";s:5:\"thumb\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:5:\"image\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:10:\"haveattach\";s:1:\"0\";s:8:\"bbsmodel\";s:1:\"0\";s:10:\"bbsurltype\";s:0:\"\";s:10:\"blockmodel\";s:1:\"1\";s:14:\"blockparameter\";s:0:\"\";s:9:\"blocktext\";s:0:\"\";s:3:\"url\";s:48:\"http://localhost/istcms/?action-category-catid-4\";s:8:\"subcatid\";s:1:\"4\";s:8:\"htmlpath\";s:0:\"\";s:6:\"domain\";s:0:\"\";s:7:\"perpage\";s:1:\"0\";s:7:\"prehtml\";s:0:\"\";}i:4;a:23:{s:5:\"catid\";s:1:\"5\";s:4:\"upid\";s:1:\"0\";s:4:\"name\";s:12:\"明星娱乐\";s:4:\"note\";s:0:\"\";s:4:\"type\";s:4:\"news\";s:9:\"ischannel\";s:1:\"0\";s:12:\"displayorder\";s:1:\"0\";s:3:\"tpl\";s:0:\"\";s:7:\"viewtpl\";s:0:\"\";s:5:\"thumb\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:5:\"image\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:10:\"haveattach\";s:1:\"0\";s:8:\"bbsmodel\";s:1:\"0\";s:10:\"bbsurltype\";s:0:\"\";s:10:\"blockmodel\";s:1:\"1\";s:14:\"blockparameter\";s:0:\"\";s:9:\"blocktext\";s:0:\"\";s:3:\"url\";s:48:\"http://localhost/istcms/?action-category-catid-5\";s:8:\"subcatid\";s:1:\"5\";s:8:\"htmlpath\";s:0:\"\";s:6:\"domain\";s:0:\"\";s:7:\"perpage\";s:1:\"0\";s:7:\"prehtml\";s:0:\"\";}i:5;a:23:{s:5:\"catid\";s:1:\"6\";s:4:\"upid\";s:1:\"0\";s:4:\"name\";s:12:\"生活资讯\";s:4:\"note\";s:0:\"\";s:4:\"type\";s:4:\"news\";s:9:\"ischannel\";s:1:\"0\";s:12:\"displayorder\";s:1:\"0\";s:3:\"tpl\";s:0:\"\";s:7:\"viewtpl\";s:0:\"\";s:5:\"thumb\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:5:\"image\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:10:\"haveattach\";s:1:\"0\";s:8:\"bbsmodel\";s:1:\"0\";s:10:\"bbsurltype\";s:0:\"\";s:10:\"blockmodel\";s:1:\"1\";s:14:\"blockparameter\";s:0:\"\";s:9:\"blocktext\";s:0:\"\";s:3:\"url\";s:48:\"http://localhost/istcms/?action-category-catid-6\";s:8:\"subcatid\";s:1:\"6\";s:8:\"htmlpath\";s:0:\"\";s:6:\"domain\";s:0:\"\";s:7:\"perpage\";s:1:\"0\";s:7:\"prehtml\";s:0:\"\";}i:6;a:23:{s:5:\"catid\";s:1:\"7\";s:4:\"upid\";s:1:\"0\";s:4:\"name\";s:12:\"网站建设\";s:4:\"note\";s:0:\"\";s:4:\"type\";s:4:\"news\";s:9:\"ischannel\";s:1:\"0\";s:12:\"displayorder\";s:1:\"0\";s:3:\"tpl\";s:0:\"\";s:7:\"viewtpl\";s:0:\"\";s:5:\"thumb\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:5:\"image\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:10:\"haveattach\";s:1:\"0\";s:8:\"bbsmodel\";s:1:\"0\";s:10:\"bbsurltype\";s:0:\"\";s:10:\"blockmodel\";s:1:\"1\";s:14:\"blockparameter\";s:0:\"\";s:9:\"blocktext\";s:0:\"\";s:3:\"url\";s:48:\"http://localhost/istcms/?action-category-catid-7\";s:8:\"subcatid\";s:1:\"7\";s:8:\"htmlpath\";s:0:\"\";s:6:\"domain\";s:0:\"\";s:7:\"perpage\";s:1:\"0\";s:7:\"prehtml\";s:0:\"\";}i:7;a:23:{s:5:\"catid\";s:1:\"8\";s:4:\"upid\";s:1:\"0\";s:4:\"name\";s:12:\"动态报道\";s:4:\"note\";s:0:\"\";s:4:\"type\";s:4:\"news\";s:9:\"ischannel\";s:1:\"0\";s:12:\"displayorder\";s:1:\"0\";s:3:\"tpl\";s:0:\"\";s:7:\"viewtpl\";s:0:\"\";s:5:\"thumb\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:5:\"image\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:10:\"haveattach\";s:1:\"0\";s:8:\"bbsmodel\";s:1:\"0\";s:10:\"bbsurltype\";s:0:\"\";s:10:\"blockmodel\";s:1:\"1\";s:14:\"blockparameter\";s:0:\"\";s:9:\"blocktext\";s:0:\"\";s:3:\"url\";s:48:\"http://localhost/istcms/?action-category-catid-8\";s:8:\"subcatid\";s:1:\"8\";s:8:\"htmlpath\";s:0:\"\";s:6:\"domain\";s:0:\"\";s:7:\"perpage\";s:1:\"0\";s:7:\"prehtml\";s:0:\"\";}i:8;a:23:{s:5:\"catid\";s:1:\"9\";s:4:\"upid\";s:1:\"0\";s:4:\"name\";s:12:\"特别关注\";s:4:\"note\";s:0:\"\";s:4:\"type\";s:4:\"news\";s:9:\"ischannel\";s:1:\"0\";s:12:\"displayorder\";s:1:\"0\";s:3:\"tpl\";s:0:\"\";s:7:\"viewtpl\";s:0:\"\";s:5:\"thumb\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:5:\"image\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:10:\"haveattach\";s:1:\"0\";s:8:\"bbsmodel\";s:1:\"0\";s:10:\"bbsurltype\";s:0:\"\";s:10:\"blockmodel\";s:1:\"1\";s:14:\"blockparameter\";s:0:\"\";s:9:\"blocktext\";s:0:\"\";s:3:\"url\";s:48:\"http://localhost/istcms/?action-category-catid-9\";s:8:\"subcatid\";s:1:\"9\";s:8:\"htmlpath\";s:0:\"\";s:6:\"domain\";s:0:\"\";s:7:\"perpage\";s:1:\"0\";s:7:\"prehtml\";s:0:\"\";}}',1283065655),('59e4bef7eecf9164',0,'spacenews','N;',1282986745);

/*Table structure for table `supe_cache_6` */

DROP TABLE IF EXISTS `supe_cache_6`;

CREATE TABLE `supe_cache_6` (
  `cachekey` varchar(16) NOT NULL DEFAULT '',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `cachename` varchar(20) NOT NULL DEFAULT '',
  `value` mediumtext NOT NULL,
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cachekey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `supe_cache_6` */

insert  into `supe_cache_6`(`cachekey`,`uid`,`cachename`,`value`,`updatetime`) values ('659b2605d3291c20',0,'spacenews','N;',1282986685),('6d22da87283eedf3',0,'spacenews','N;',1282998828);

/*Table structure for table `supe_cache_7` */

DROP TABLE IF EXISTS `supe_cache_7`;

CREATE TABLE `supe_cache_7` (
  `cachekey` varchar(16) NOT NULL DEFAULT '',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `cachename` varchar(20) NOT NULL DEFAULT '',
  `value` mediumtext NOT NULL,
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cachekey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `supe_cache_7` */

insert  into `supe_cache_7`(`cachekey`,`uid`,`cachename`,`value`,`updatetime`) values ('740cf266b8f70dff',0,'spacenews','N;',1282986805),('7eb12a2e77f3a492',0,'spacenews','N;',1283060255);

/*Table structure for table `supe_cache_8` */

DROP TABLE IF EXISTS `supe_cache_8`;

CREATE TABLE `supe_cache_8` (
  `cachekey` varchar(16) NOT NULL DEFAULT '',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `cachename` varchar(20) NOT NULL DEFAULT '',
  `value` mediumtext NOT NULL,
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cachekey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `supe_cache_8` */

insert  into `supe_cache_8`(`cachekey`,`uid`,`cachename`,`value`,`updatetime`) values ('821c9f60894af653',0,'category','a:9:{i:0;a:23:{s:5:\"catid\";s:1:\"1\";s:4:\"upid\";s:1:\"0\";s:4:\"name\";s:12:\"科技世界\";s:4:\"note\";s:0:\"\";s:4:\"type\";s:4:\"news\";s:9:\"ischannel\";s:1:\"0\";s:12:\"displayorder\";s:1:\"0\";s:3:\"tpl\";s:0:\"\";s:7:\"viewtpl\";s:0:\"\";s:5:\"thumb\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:5:\"image\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:10:\"haveattach\";s:1:\"0\";s:8:\"bbsmodel\";s:1:\"0\";s:10:\"bbsurltype\";s:0:\"\";s:10:\"blockmodel\";s:1:\"1\";s:14:\"blockparameter\";s:0:\"\";s:9:\"blocktext\";s:0:\"\";s:3:\"url\";s:48:\"http://localhost/istcms/?action-category-catid-1\";s:8:\"subcatid\";s:1:\"1\";s:8:\"htmlpath\";s:0:\"\";s:6:\"domain\";s:0:\"\";s:7:\"perpage\";s:1:\"0\";s:7:\"prehtml\";s:0:\"\";}i:1;a:23:{s:5:\"catid\";s:1:\"2\";s:4:\"upid\";s:1:\"0\";s:4:\"name\";s:12:\"互联网络\";s:4:\"note\";s:0:\"\";s:4:\"type\";s:4:\"news\";s:9:\"ischannel\";s:1:\"0\";s:12:\"displayorder\";s:1:\"0\";s:3:\"tpl\";s:0:\"\";s:7:\"viewtpl\";s:0:\"\";s:5:\"thumb\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:5:\"image\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:10:\"haveattach\";s:1:\"0\";s:8:\"bbsmodel\";s:1:\"0\";s:10:\"bbsurltype\";s:0:\"\";s:10:\"blockmodel\";s:1:\"1\";s:14:\"blockparameter\";s:0:\"\";s:9:\"blocktext\";s:0:\"\";s:3:\"url\";s:48:\"http://localhost/istcms/?action-category-catid-2\";s:8:\"subcatid\";s:1:\"2\";s:8:\"htmlpath\";s:0:\"\";s:6:\"domain\";s:0:\"\";s:7:\"perpage\";s:1:\"0\";s:7:\"prehtml\";s:0:\"\";}i:2;a:23:{s:5:\"catid\";s:1:\"3\";s:4:\"upid\";s:1:\"0\";s:4:\"name\";s:12:\"财经报道\";s:4:\"note\";s:0:\"\";s:4:\"type\";s:4:\"news\";s:9:\"ischannel\";s:1:\"0\";s:12:\"displayorder\";s:1:\"0\";s:3:\"tpl\";s:0:\"\";s:7:\"viewtpl\";s:0:\"\";s:5:\"thumb\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:5:\"image\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:10:\"haveattach\";s:1:\"0\";s:8:\"bbsmodel\";s:1:\"0\";s:10:\"bbsurltype\";s:0:\"\";s:10:\"blockmodel\";s:1:\"1\";s:14:\"blockparameter\";s:0:\"\";s:9:\"blocktext\";s:0:\"\";s:3:\"url\";s:48:\"http://localhost/istcms/?action-category-catid-3\";s:8:\"subcatid\";s:1:\"3\";s:8:\"htmlpath\";s:0:\"\";s:6:\"domain\";s:0:\"\";s:7:\"perpage\";s:1:\"0\";s:7:\"prehtml\";s:0:\"\";}i:3;a:23:{s:5:\"catid\";s:1:\"4\";s:4:\"upid\";s:1:\"0\";s:4:\"name\";s:12:\"体育资讯\";s:4:\"note\";s:0:\"\";s:4:\"type\";s:4:\"news\";s:9:\"ischannel\";s:1:\"0\";s:12:\"displayorder\";s:1:\"0\";s:3:\"tpl\";s:0:\"\";s:7:\"viewtpl\";s:0:\"\";s:5:\"thumb\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:5:\"image\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:10:\"haveattach\";s:1:\"0\";s:8:\"bbsmodel\";s:1:\"0\";s:10:\"bbsurltype\";s:0:\"\";s:10:\"blockmodel\";s:1:\"1\";s:14:\"blockparameter\";s:0:\"\";s:9:\"blocktext\";s:0:\"\";s:3:\"url\";s:48:\"http://localhost/istcms/?action-category-catid-4\";s:8:\"subcatid\";s:1:\"4\";s:8:\"htmlpath\";s:0:\"\";s:6:\"domain\";s:0:\"\";s:7:\"perpage\";s:1:\"0\";s:7:\"prehtml\";s:0:\"\";}i:4;a:23:{s:5:\"catid\";s:1:\"5\";s:4:\"upid\";s:1:\"0\";s:4:\"name\";s:12:\"明星娱乐\";s:4:\"note\";s:0:\"\";s:4:\"type\";s:4:\"news\";s:9:\"ischannel\";s:1:\"0\";s:12:\"displayorder\";s:1:\"0\";s:3:\"tpl\";s:0:\"\";s:7:\"viewtpl\";s:0:\"\";s:5:\"thumb\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:5:\"image\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:10:\"haveattach\";s:1:\"0\";s:8:\"bbsmodel\";s:1:\"0\";s:10:\"bbsurltype\";s:0:\"\";s:10:\"blockmodel\";s:1:\"1\";s:14:\"blockparameter\";s:0:\"\";s:9:\"blocktext\";s:0:\"\";s:3:\"url\";s:48:\"http://localhost/istcms/?action-category-catid-5\";s:8:\"subcatid\";s:1:\"5\";s:8:\"htmlpath\";s:0:\"\";s:6:\"domain\";s:0:\"\";s:7:\"perpage\";s:1:\"0\";s:7:\"prehtml\";s:0:\"\";}i:5;a:23:{s:5:\"catid\";s:1:\"6\";s:4:\"upid\";s:1:\"0\";s:4:\"name\";s:12:\"生活资讯\";s:4:\"note\";s:0:\"\";s:4:\"type\";s:4:\"news\";s:9:\"ischannel\";s:1:\"0\";s:12:\"displayorder\";s:1:\"0\";s:3:\"tpl\";s:0:\"\";s:7:\"viewtpl\";s:0:\"\";s:5:\"thumb\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:5:\"image\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:10:\"haveattach\";s:1:\"0\";s:8:\"bbsmodel\";s:1:\"0\";s:10:\"bbsurltype\";s:0:\"\";s:10:\"blockmodel\";s:1:\"1\";s:14:\"blockparameter\";s:0:\"\";s:9:\"blocktext\";s:0:\"\";s:3:\"url\";s:48:\"http://localhost/istcms/?action-category-catid-6\";s:8:\"subcatid\";s:1:\"6\";s:8:\"htmlpath\";s:0:\"\";s:6:\"domain\";s:0:\"\";s:7:\"perpage\";s:1:\"0\";s:7:\"prehtml\";s:0:\"\";}i:6;a:23:{s:5:\"catid\";s:1:\"7\";s:4:\"upid\";s:1:\"0\";s:4:\"name\";s:12:\"网站建设\";s:4:\"note\";s:0:\"\";s:4:\"type\";s:4:\"news\";s:9:\"ischannel\";s:1:\"0\";s:12:\"displayorder\";s:1:\"0\";s:3:\"tpl\";s:0:\"\";s:7:\"viewtpl\";s:0:\"\";s:5:\"thumb\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:5:\"image\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:10:\"haveattach\";s:1:\"0\";s:8:\"bbsmodel\";s:1:\"0\";s:10:\"bbsurltype\";s:0:\"\";s:10:\"blockmodel\";s:1:\"1\";s:14:\"blockparameter\";s:0:\"\";s:9:\"blocktext\";s:0:\"\";s:3:\"url\";s:48:\"http://localhost/istcms/?action-category-catid-7\";s:8:\"subcatid\";s:1:\"7\";s:8:\"htmlpath\";s:0:\"\";s:6:\"domain\";s:0:\"\";s:7:\"perpage\";s:1:\"0\";s:7:\"prehtml\";s:0:\"\";}i:7;a:23:{s:5:\"catid\";s:1:\"8\";s:4:\"upid\";s:1:\"0\";s:4:\"name\";s:12:\"动态报道\";s:4:\"note\";s:0:\"\";s:4:\"type\";s:4:\"news\";s:9:\"ischannel\";s:1:\"0\";s:12:\"displayorder\";s:1:\"0\";s:3:\"tpl\";s:0:\"\";s:7:\"viewtpl\";s:0:\"\";s:5:\"thumb\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:5:\"image\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:10:\"haveattach\";s:1:\"0\";s:8:\"bbsmodel\";s:1:\"0\";s:10:\"bbsurltype\";s:0:\"\";s:10:\"blockmodel\";s:1:\"1\";s:14:\"blockparameter\";s:0:\"\";s:9:\"blocktext\";s:0:\"\";s:3:\"url\";s:48:\"http://localhost/istcms/?action-category-catid-8\";s:8:\"subcatid\";s:1:\"8\";s:8:\"htmlpath\";s:0:\"\";s:6:\"domain\";s:0:\"\";s:7:\"perpage\";s:1:\"0\";s:7:\"prehtml\";s:0:\"\";}i:8;a:23:{s:5:\"catid\";s:1:\"9\";s:4:\"upid\";s:1:\"0\";s:4:\"name\";s:12:\"特别关注\";s:4:\"note\";s:0:\"\";s:4:\"type\";s:4:\"news\";s:9:\"ischannel\";s:1:\"0\";s:12:\"displayorder\";s:1:\"0\";s:3:\"tpl\";s:0:\"\";s:7:\"viewtpl\";s:0:\"\";s:5:\"thumb\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:5:\"image\";s:45:\"http://localhost/istcms/images/base/nopic.gif\";s:10:\"haveattach\";s:1:\"0\";s:8:\"bbsmodel\";s:1:\"0\";s:10:\"bbsurltype\";s:0:\"\";s:10:\"blockmodel\";s:1:\"1\";s:14:\"blockparameter\";s:0:\"\";s:9:\"blocktext\";s:0:\"\";s:3:\"url\";s:48:\"http://localhost/istcms/?action-category-catid-9\";s:8:\"subcatid\";s:1:\"9\";s:8:\"htmlpath\";s:0:\"\";s:6:\"domain\";s:0:\"\";s:7:\"perpage\";s:1:\"0\";s:7:\"prehtml\";s:0:\"\";}}',1283065439),('8b94e82ddf95fff7',0,'spacenews','N;',1283071539),('87db395ce37590dd',0,'spacenews','N;',1282996785),('856654a1202cdc91',0,'spacenews','N;',1283074905);

/*Table structure for table `supe_cache_9` */

DROP TABLE IF EXISTS `supe_cache_9`;

CREATE TABLE `supe_cache_9` (
  `cachekey` varchar(16) NOT NULL DEFAULT '',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `cachename` varchar(20) NOT NULL DEFAULT '',
  `value` mediumtext NOT NULL,
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cachekey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `supe_cache_9` */

insert  into `supe_cache_9`(`cachekey`,`uid`,`cachename`,`value`,`updatetime`) values ('9b589f6aab95e254',0,'spacenews','N;',1282986835);

/*Table structure for table `supe_cache_a` */

DROP TABLE IF EXISTS `supe_cache_a`;

CREATE TABLE `supe_cache_a` (
  `cachekey` varchar(16) NOT NULL DEFAULT '',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `cachename` varchar(20) NOT NULL DEFAULT '',
  `value` mediumtext NOT NULL,
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cachekey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `supe_cache_a` */

insert  into `supe_cache_a`(`cachekey`,`uid`,`cachename`,`value`,`updatetime`) values ('ad18405ef584bf15',0,'category','N;',1282995927);

/*Table structure for table `supe_cache_b` */

DROP TABLE IF EXISTS `supe_cache_b`;

CREATE TABLE `supe_cache_b` (
  `cachekey` varchar(16) NOT NULL DEFAULT '',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `cachename` varchar(20) NOT NULL DEFAULT '',
  `value` mediumtext NOT NULL,
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cachekey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `supe_cache_b` */

insert  into `supe_cache_b`(`cachekey`,`uid`,`cachename`,`value`,`updatetime`) values ('b5178e2669ff4266',0,'spacenews','N;',1282986895),('b8fa55c1531e4871',0,'spacenews','N;',1282992355);

/*Table structure for table `supe_cache_c` */

DROP TABLE IF EXISTS `supe_cache_c`;

CREATE TABLE `supe_cache_c` (
  `cachekey` varchar(16) NOT NULL DEFAULT '',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `cachename` varchar(20) NOT NULL DEFAULT '',
  `value` mediumtext NOT NULL,
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cachekey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `supe_cache_c` */

insert  into `supe_cache_c`(`cachekey`,`uid`,`cachename`,`value`,`updatetime`) values ('c954011ed21b4149',0,'spacenews','N;',1282986715),('cd16a98afd13dbef',0,'spacenews','N;',1282993027);

/*Table structure for table `supe_cache_d` */

DROP TABLE IF EXISTS `supe_cache_d`;

CREATE TABLE `supe_cache_d` (
  `cachekey` varchar(16) NOT NULL DEFAULT '',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `cachename` varchar(20) NOT NULL DEFAULT '',
  `value` mediumtext NOT NULL,
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cachekey`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

/*Data for the table `supe_cache_d` */

insert  into `supe_cache_d`(`cachekey`,`uid`,`cachename`,`value`,`updatetime`) values ('dc2c0d9adef7e7e8',0,'spacenews','N;',1283070039),('d8d2bf8d21f1998e',0,'announcement','N;',1283081039),('de29470f0fa7208b',0,'spacenews','N;',1282993028);

/*Table structure for table `supe_categories` */

DROP TABLE IF EXISTS `supe_categories`;

CREATE TABLE `supe_categories` (
  `catid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `upid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  `note` text NOT NULL,
  `type` varchar(30) NOT NULL DEFAULT '',
  `ischannel` tinyint(1) NOT NULL DEFAULT '0',
  `displayorder` mediumint(6) unsigned NOT NULL DEFAULT '0',
  `tpl` varchar(80) NOT NULL DEFAULT '',
  `viewtpl` varchar(80) NOT NULL DEFAULT '',
  `thumb` varchar(150) NOT NULL DEFAULT '',
  `image` varchar(150) NOT NULL DEFAULT '',
  `haveattach` tinyint(1) NOT NULL DEFAULT '0',
  `bbsmodel` tinyint(1) NOT NULL DEFAULT '0',
  `bbsurltype` varchar(15) NOT NULL DEFAULT '',
  `blockmodel` tinyint(1) NOT NULL DEFAULT '1',
  `blockparameter` text NOT NULL,
  `blocktext` text NOT NULL,
  `url` varchar(255) NOT NULL DEFAULT '',
  `subcatid` text NOT NULL,
  `htmlpath` varchar(80) NOT NULL DEFAULT '',
  `domain` varchar(50) NOT NULL DEFAULT '',
  `perpage` smallint(6) NOT NULL DEFAULT '0',
  `prehtml` varchar(20) NOT NULL,
  PRIMARY KEY (`catid`),
  KEY `type` (`type`),
  KEY `upid` (`upid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=gbk;

/*Data for the table `supe_categories` */

insert  into `supe_categories`(`catid`,`upid`,`name`,`note`,`type`,`ischannel`,`displayorder`,`tpl`,`viewtpl`,`thumb`,`image`,`haveattach`,`bbsmodel`,`bbsurltype`,`blockmodel`,`blockparameter`,`blocktext`,`url`,`subcatid`,`htmlpath`,`domain`,`perpage`,`prehtml`) values (1,0,'科技世界','','news',0,0,'','','','',0,0,'',1,'','','','1','','',0,''),(2,0,'互联网络','','news',0,0,'','','','',0,0,'',1,'','','','2','','',0,''),(3,0,'财经报道','','news',0,0,'','','','',0,0,'',1,'','','','3','','',0,''),(4,0,'体育资讯','','news',0,0,'','','','',0,0,'',1,'','','','4','','',0,''),(5,0,'明星娱乐','','news',0,0,'','','','',0,0,'',1,'','','','5','','',0,''),(6,0,'生活资讯','','news',0,0,'','','','',0,0,'',1,'','','','6','','',0,''),(7,0,'网站建设','','news',0,0,'','','','',0,0,'',1,'','','','7','','',0,''),(8,0,'动态报道','','news',0,0,'','','','',0,0,'',1,'','','','8','','',0,''),(9,0,'特别关注','','news',0,0,'','','','',0,0,'',1,'','','','9','','',0,'');

/*Table structure for table `supe_channels` */

DROP TABLE IF EXISTS `supe_channels`;

CREATE TABLE `supe_channels` (
  `nameid` char(30) NOT NULL DEFAULT '',
  `name` char(50) NOT NULL DEFAULT '',
  `url` char(200) NOT NULL DEFAULT '',
  `tpl` char(50) NOT NULL DEFAULT '',
  `categorytpl` char(50) NOT NULL DEFAULT '',
  `viewtpl` char(50) NOT NULL DEFAULT '',
  `type` char(20) NOT NULL DEFAULT '',
  `path` char(30) NOT NULL DEFAULT '',
  `domain` char(50) NOT NULL DEFAULT '',
  `upnameid` char(30) NOT NULL DEFAULT '',
  `displayorder` smallint(3) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `allowpost` text NOT NULL,
  `allowview` text NOT NULL,
  `allowcomment` text NOT NULL,
  `allowgetattach` text NOT NULL,
  `allowpostattach` text NOT NULL,
  `allowmanage` text NOT NULL,
  PRIMARY KEY (`nameid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_channels` */

insert  into `supe_channels`(`nameid`,`name`,`url`,`tpl`,`categorytpl`,`viewtpl`,`type`,`path`,`domain`,`upnameid`,`displayorder`,`status`,`allowpost`,`allowview`,`allowcomment`,`allowgetattach`,`allowpostattach`,`allowmanage`) values ('news','资讯','','','','','type','','','',0,1,'','','','','',''),('top','排行榜','','','','','system','','','',10,1,'','','','','','');

/*Table structure for table `supe_click` */

DROP TABLE IF EXISTS `supe_click`;

CREATE TABLE `supe_click` (
  `clickid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL DEFAULT '',
  `icon` char(100) NOT NULL DEFAULT '',
  `displayorder` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `groupid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `score` tinyint(2) NOT NULL DEFAULT '0',
  `filename` char(50) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `system` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`clickid`),
  KEY `groupid` (`groupid`,`displayorder`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=gbk;

/*Data for the table `supe_click` */

insert  into `supe_click`(`clickid`,`name`,`icon`,`displayorder`,`groupid`,`score`,`filename`,`status`,`system`) values (1,'感动','19.gif',0,1,0,'',1,0),(2,'同情','20.gif',0,1,0,'',1,0),(3,'无聊','09.gif',0,1,0,'',1,0),(4,'愤怒','02.gif',0,1,0,'',1,0),(5,'搞笑','08.gif',0,1,0,'',1,0),(6,'难过','15.gif',0,1,0,'',1,0),(7,'高兴','12.gif',0,1,0,'',1,0),(8,'路过','14.gif',0,1,0,'',1,0),(9,'支持','',0,2,0,'',1,1),(10,'反对','',1,2,0,'',1,1),(11,'-5','',0,4,-5,'',1,0),(12,'-4','',1,4,-4,'',1,0),(13,'-3','',2,4,-3,'',1,0),(14,'-2','',3,4,-2,'',1,0),(15,'-1','',4,4,-1,'',1,0),(16,'0','',5,4,0,'',1,0),(17,'1','',6,4,1,'',1,0),(18,'2','',7,4,2,'',1,0),(19,'3','',8,4,3,'',1,0),(20,'4','',9,4,4,'',1,0),(21,'5','',10,4,5,'',1,0),(22,'-5','',0,5,-5,'',1,0),(23,'-4','',1,5,-4,'',1,0),(24,'-3','',2,5,-3,'',1,0),(25,'-2','',3,5,-2,'',1,0),(26,'-1','',4,5,-1,'',1,0),(27,'0','',5,5,0,'',1,0),(28,'1','',6,5,1,'',1,0),(29,'2','',7,5,2,'',1,0),(30,'3','',8,5,3,'',1,0),(31,'4','',9,5,4,'',1,0),(32,'5','',10,5,5,'',1,0),(33,'支持','icon8.gif',0,3,0,'',1,1),(34,'反对','icon9.gif',1,3,0,'',1,1);

/*Table structure for table `supe_clickgroup` */

DROP TABLE IF EXISTS `supe_clickgroup`;

CREATE TABLE `supe_clickgroup` (
  `groupid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `grouptitle` char(20) NOT NULL DEFAULT '',
  `idtype` char(15) NOT NULL DEFAULT '',
  `mid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `icon` char(100) NOT NULL DEFAULT '',
  `allowspread` tinyint(1) NOT NULL DEFAULT '0',
  `spreadtime` int(10) NOT NULL DEFAULT '0',
  `allowrepeat` tinyint(1) NOT NULL DEFAULT '0',
  `allowtop` tinyint(1) NOT NULL DEFAULT '0',
  `allowguest` tinyint(1) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `system` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`groupid`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=gbk;

/*Data for the table `supe_clickgroup` */

insert  into `supe_clickgroup`(`groupid`,`grouptitle`,`idtype`,`mid`,`icon`,`allowspread`,`spreadtime`,`allowrepeat`,`allowtop`,`allowguest`,`status`,`system`) values (1,'心情','spaceitems',0,'topmood.jpg',1,0,0,1,1,1,1),(2,'Digg','spaceitems',0,'',0,0,0,0,1,1,1),(3,'回复打分','spacecomments',0,'',0,0,0,0,1,1,1),(4,'事件或人物打分','spaceitems',0,'',0,0,0,0,1,1,1),(5,'内容质量打分','spaceitems',0,'',0,0,0,0,1,1,1);

/*Table structure for table `supe_clickuser` */

DROP TABLE IF EXISTS `supe_clickuser`;

CREATE TABLE `supe_clickuser` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` char(15) NOT NULL DEFAULT '',
  `id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `idtype` char(15) NOT NULL DEFAULT '',
  `clickid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `groupid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `ip` char(15) NOT NULL DEFAULT '',
  KEY `id` (`id`,`idtype`,`groupid`,`dateline`),
  KEY `uid` (`uid`,`idtype`,`groupid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_clickuser` */

/*Table structure for table `supe_creditlog` */

DROP TABLE IF EXISTS `supe_creditlog`;

CREATE TABLE `supe_creditlog` (
  `clid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `rid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `total` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `cyclenum` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `credit` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `experience` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `starttime` int(10) unsigned NOT NULL DEFAULT '0',
  `info` text NOT NULL,
  `user` text NOT NULL,
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`clid`),
  KEY `uid` (`uid`,`rid`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

/*Data for the table `supe_creditlog` */

insert  into `supe_creditlog`(`clid`,`uid`,`rid`,`total`,`cyclenum`,`credit`,`experience`,`starttime`,`info`,`user`,`dateline`) values (1,1,7,1,1,10,10,0,'','',1283006334);

/*Table structure for table `supe_creditrule` */

DROP TABLE IF EXISTS `supe_creditrule`;

CREATE TABLE `supe_creditrule` (
  `rid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `rulename` char(20) NOT NULL DEFAULT '',
  `action` char(20) NOT NULL DEFAULT '',
  `cycletype` tinyint(1) NOT NULL DEFAULT '0',
  `cycletime` int(10) NOT NULL DEFAULT '0',
  `rewardnum` tinyint(2) NOT NULL DEFAULT '1',
  `rewardtype` tinyint(1) NOT NULL DEFAULT '1',
  `norepeat` tinyint(1) NOT NULL DEFAULT '0',
  `credit` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `experience` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`rid`),
  KEY `action` (`action`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=gbk;

/*Data for the table `supe_creditrule` */

insert  into `supe_creditrule`(`rid`,`rulename`,`action`,`cycletype`,`cycletime`,`rewardnum`,`rewardtype`,`norepeat`,`credit`,`experience`) values (1,'发表信息','postinfo',1,0,3,1,0,10,10),(2,'评论','postcomment',1,0,20,1,0,1,1),(3,'上传','postattach',1,0,3,1,0,10,10),(4,'投票','postvote',1,0,10,1,0,1,1),(5,'点击','postclick',1,0,20,1,0,1,1),(6,'设置头像','setavatar',0,0,1,1,0,10,10),(7,'每天登陆','daylogin',1,0,1,1,0,10,10),(9,'举报','report',1,0,10,1,0,1,1),(10,'删除信息','delinfo',4,0,0,2,0,10,10),(11,'删除评论','delcomment',4,0,0,2,0,10,10),(12,'搜索','seach',4,0,0,0,0,1,1),(13,'匿名评论','anonymous',4,0,0,0,0,5,1),(14,'隐藏ip','hideip',4,0,0,0,0,5,1),(15,'隐藏位置','hidelocation',4,0,0,0,0,5,1),(16,'浏览','view',4,0,0,0,0,0,1),(17,'下载','download',4,0,0,0,0,5,1);

/*Table structure for table `supe_crons` */

DROP TABLE IF EXISTS `supe_crons`;

CREATE TABLE `supe_crons` (
  `cronid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `available` tinyint(1) NOT NULL DEFAULT '0',
  `type` enum('user','system') NOT NULL DEFAULT 'user',
  `name` char(50) NOT NULL DEFAULT '',
  `filename` char(50) NOT NULL DEFAULT '',
  `lastrun` int(10) unsigned NOT NULL DEFAULT '0',
  `nextrun` int(10) unsigned NOT NULL DEFAULT '0',
  `weekday` tinyint(1) NOT NULL DEFAULT '0',
  `day` tinyint(2) NOT NULL DEFAULT '0',
  `hour` tinyint(2) NOT NULL DEFAULT '0',
  `minute` char(36) NOT NULL DEFAULT '',
  PRIMARY KEY (`cronid`),
  KEY `nextrun` (`available`,`nextrun`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=gbk;

/*Data for the table `supe_crons` */

insert  into `supe_crons`(`cronid`,`available`,`type`,`name`,`filename`,`lastrun`,`nextrun`,`weekday`,`day`,`hour`,`minute`) values (1,1,'system','更新热门TAG','tagcontent.php',1283006321,1283006321,-1,-1,-1,'0'),(2,1,'system','清理无用附件','cleanattachment.php',1283006321,1283006321,-1,-1,4,'0'),(3,1,'system','清理临时文件','cleanimporttemp.php',1283006321,1283006321,-1,-1,4,'15'),(4,1,'system','更新论坛缓存','updatebbscache.php',1283006321,1283006321,-1,-1,2,'0'),(5,1,'system','更新信息查看数','updateviewnum.php',1283006321,1283006321,-1,-1,3,'5	15	25	35	45	55'),(6,1,'system','更新论坛帖子收录','updatebbsforums.php',1283006321,1283006321,-1,-1,-1,'0	5	10	15	20	25	30	35	40	45	50	55');

/*Table structure for table `supe_customfields` */

DROP TABLE IF EXISTS `supe_customfields`;

CREATE TABLE `supe_customfields` (
  `customfieldid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `type` varchar(30) NOT NULL DEFAULT '',
  `name` varchar(80) NOT NULL DEFAULT '',
  `displayorder` smallint(6) unsigned NOT NULL DEFAULT '0',
  `customfieldtext` text NOT NULL,
  `isdefault` tinyint(1) NOT NULL DEFAULT '0',
  `isshare` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`customfieldid`),
  KEY `uid` (`uid`,`type`),
  KEY `isshare` (`isshare`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_customfields` */

/*Table structure for table `supe_forums` */

DROP TABLE IF EXISTS `supe_forums`;

CREATE TABLE `supe_forums` (
  `fid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `fup` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL DEFAULT '',
  `type` enum('group','forum','sub') NOT NULL DEFAULT 'forum',
  `allowshare` tinyint(1) NOT NULL DEFAULT '0',
  `pushsetting` text NOT NULL,
  `updateline` int(10) NOT NULL,
  `displayorder` tinyint(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`fid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_forums` */

/*Table structure for table `supe_friendlinks` */

DROP TABLE IF EXISTS `supe_friendlinks`;

CREATE TABLE `supe_friendlinks` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `displayorder` tinyint(3) NOT NULL DEFAULT '0',
  `name` varchar(100) NOT NULL DEFAULT '',
  `url` varchar(100) NOT NULL DEFAULT '',
  `description` varchar(100) NOT NULL DEFAULT '',
  `logo` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_friendlinks` */

/*Table structure for table `supe_members` */

DROP TABLE IF EXISTS `supe_members`;

CREATE TABLE `supe_members` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `groupid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `username` char(15) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `email` char(100) NOT NULL DEFAULT '',
  `experience` int(10) NOT NULL DEFAULT '0',
  `credit` int(10) NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  `lastlogin` int(10) unsigned NOT NULL DEFAULT '0',
  `flag` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ip` char(15) NOT NULL DEFAULT '',
  `lastsearchtime` int(10) unsigned NOT NULL DEFAULT '0',
  `lastcommenttime` int(10) unsigned NOT NULL DEFAULT '0',
  `lastposttime` int(10) unsigned NOT NULL DEFAULT '0',
  `authstr` char(20) NOT NULL DEFAULT '',
  `avatar` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_members` */

insert  into `supe_members`(`uid`,`groupid`,`username`,`password`,`email`,`experience`,`credit`,`dateline`,`updatetime`,`lastlogin`,`flag`,`ip`,`lastsearchtime`,`lastcommenttime`,`lastposttime`,`authstr`,`avatar`) values (1,1,'nwuist','c39b145cc727c5146362a8bfdcc4bd77','',10,10,1283006333,1283006333,1283006333,0,'unknown',0,0,0,'',0);

/*Table structure for table `supe_modelcolumns` */

DROP TABLE IF EXISTS `supe_modelcolumns`;

CREATE TABLE `supe_modelcolumns` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `upid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `mid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `fieldname` varchar(30) NOT NULL DEFAULT '',
  `fieldcomment` varchar(60) NOT NULL DEFAULT '',
  `fieldtype` varchar(20) NOT NULL DEFAULT '',
  `fieldlength` int(5) unsigned NOT NULL DEFAULT '0',
  `fielddefault` text NOT NULL,
  `formtype` varchar(20) NOT NULL DEFAULT '',
  `fielddata` text NOT NULL,
  `displayorder` tinyint(2) unsigned NOT NULL DEFAULT '0',
  `allowindex` tinyint(1) NOT NULL DEFAULT '0',
  `allowshow` tinyint(1) NOT NULL DEFAULT '0',
  `allowlist` tinyint(1) NOT NULL DEFAULT '0',
  `allowsearch` tinyint(1) NOT NULL DEFAULT '0',
  `allowpost` tinyint(1) NOT NULL DEFAULT '0',
  `isfixed` tinyint(1) NOT NULL DEFAULT '0',
  `isbbcode` tinyint(1) NOT NULL DEFAULT '0',
  `ishtml` tinyint(1) NOT NULL DEFAULT '0',
  `isrequired` tinyint(1) NOT NULL DEFAULT '0',
  `isfile` varchar(50) NOT NULL DEFAULT '',
  `isimage` varchar(50) NOT NULL DEFAULT '',
  `isflash` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `mid` (`mid`,`displayorder`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_modelcolumns` */

/*Table structure for table `supe_modelfolders` */

DROP TABLE IF EXISTS `supe_modelfolders`;

CREATE TABLE `supe_modelfolders` (
  `itemid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `mid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `subject` char(80) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `folder` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`),
  KEY `folder` (`folder`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_modelfolders` */

/*Table structure for table `supe_modelinterval` */

DROP TABLE IF EXISTS `supe_modelinterval`;

CREATE TABLE `supe_modelinterval` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(1) unsigned NOT NULL DEFAULT '0',
  KEY `uid` (`uid`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_modelinterval` */

/*Table structure for table `supe_models` */

DROP TABLE IF EXISTS `supe_models`;

CREATE TABLE `supe_models` (
  `mid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `modelname` char(20) NOT NULL DEFAULT '',
  `modelalias` char(60) NOT NULL DEFAULT '',
  `allowpost` tinyint(1) NOT NULL DEFAULT '0',
  `allowguest` tinyint(1) NOT NULL DEFAULT '0',
  `allowgrade` tinyint(1) NOT NULL DEFAULT '0',
  `allowcomment` tinyint(1) NOT NULL DEFAULT '0',
  `allowrate` tinyint(1) NOT NULL DEFAULT '0',
  `allowguestsearch` tinyint(1) NOT NULL DEFAULT '0',
  `allowfeed` tinyint(1) NOT NULL DEFAULT '1',
  `searchinterval` smallint(6) unsigned NOT NULL DEFAULT '0',
  `allowguestdownload` tinyint(1) NOT NULL DEFAULT '0',
  `downloadinterval` smallint(6) unsigned NOT NULL DEFAULT '0',
  `allowfilter` tinyint(1) NOT NULL DEFAULT '0',
  `listperpage` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `seokeywords` char(200) NOT NULL DEFAULT '',
  `seodescription` char(200) NOT NULL DEFAULT '',
  `thumbsize` char(19) NOT NULL DEFAULT '',
  `tpl` char(20) NOT NULL DEFAULT '',
  `fielddefault` char(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_models` */

/*Table structure for table `supe_pages` */

DROP TABLE IF EXISTS `supe_pages`;

CREATE TABLE `supe_pages` (
  `type` char(30) NOT NULL DEFAULT '',
  `catid` smallint(6) NOT NULL DEFAULT '0',
  `pageid` smallint(6) NOT NULL DEFAULT '0',
  `startid` mediumint(8) NOT NULL DEFAULT '0',
  `endid` mediumint(8) NOT NULL DEFAULT '0',
  KEY `catid` (`catid`,`type`),
  KEY `pageid` (`catid`,`pageid`),
  KEY `sitemid` (`startid`,`endid`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_pages` */

/*Table structure for table `supe_polls` */

DROP TABLE IF EXISTS `supe_polls`;

CREATE TABLE `supe_polls` (
  `pollid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `pollnum` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  `ismulti` tinyint(1) NOT NULL DEFAULT '0',
  `subject` varchar(80) NOT NULL DEFAULT '',
  `pollsurl` varchar(255) NOT NULL DEFAULT '',
  `summary` text NOT NULL,
  `options` text NOT NULL,
  `voters` text NOT NULL,
  PRIMARY KEY (`pollid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_polls` */

/*Table structure for table `supe_postitems` */

DROP TABLE IF EXISTS `supe_postitems`;

CREATE TABLE `supe_postitems` (
  `itemid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `oitemid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `catid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` char(15) NOT NULL DEFAULT '',
  `subject` char(100) NOT NULL DEFAULT '',
  `type` char(30) NOT NULL DEFAULT '',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `lastpost` int(10) unsigned NOT NULL DEFAULT '0',
  `hash` char(16) NOT NULL DEFAULT '',
  `folder` tinyint(1) NOT NULL DEFAULT '1',
  `allowreply` tinyint(1) NOT NULL DEFAULT '1',
  `haveattach` tinyint(1) NOT NULL DEFAULT '0',
  `picid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `hot` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `fromtype` char(10) NOT NULL DEFAULT 'adminpost',
  `fromid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`),
  KEY `uid` (`uid`,`type`,`dateline`),
  KEY `catid` (`catid`,`dateline`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_postitems` */

/*Table structure for table `supe_postlog` */

DROP TABLE IF EXISTS `supe_postlog`;

CREATE TABLE `supe_postlog` (
  `itemid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `id` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `setid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` char(15) NOT NULL DEFAULT '',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_postlog` */

/*Table structure for table `supe_postmessages` */

DROP TABLE IF EXISTS `supe_postmessages`;

CREATE TABLE `supe_postmessages` (
  `nid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `onid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `itemid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  `relativetags` text NOT NULL,
  `postip` varchar(15) NOT NULL DEFAULT '',
  `relativeitemids` varchar(255) NOT NULL DEFAULT '',
  `customfieldid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `customfieldtext` text NOT NULL,
  `includetags` text NOT NULL,
  `newsauthor` varchar(50) NOT NULL DEFAULT '',
  `newsfrom` varchar(50) NOT NULL DEFAULT '',
  `newsurl` varchar(255) NOT NULL DEFAULT '',
  `newsfromurl` varchar(150) NOT NULL DEFAULT '',
  `pageorder` smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`nid`),
  KEY `itemid` (`itemid`,`pageorder`,`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_postmessages` */

/*Table structure for table `supe_postset` */

DROP TABLE IF EXISTS `supe_postset`;

CREATE TABLE `supe_postset` (
  `setid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `setname` varchar(10) NOT NULL DEFAULT '',
  `settype` varchar(10) NOT NULL DEFAULT '',
  `setting` mediumtext NOT NULL,
  PRIMARY KEY (`setid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_postset` */

/*Table structure for table `supe_prefields` */

DROP TABLE IF EXISTS `supe_prefields`;

CREATE TABLE `supe_prefields` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `type` char(10) NOT NULL DEFAULT '',
  `field` char(20) NOT NULL DEFAULT '',
  `value` char(50) NOT NULL DEFAULT '',
  `isdefault` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_prefields` */

/*Table structure for table `supe_reports` */

DROP TABLE IF EXISTS `supe_reports`;

CREATE TABLE `supe_reports` (
  `reportid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `itemid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `reportuid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `reporter` char(15) NOT NULL DEFAULT '',
  `reportdate` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`reportid`),
  KEY `itemid` (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_reports` */

/*Table structure for table `supe_robotitems` */

DROP TABLE IF EXISTS `supe_robotitems`;

CREATE TABLE `supe_robotitems` (
  `itemid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` char(15) NOT NULL DEFAULT '',
  `catid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `robotid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `robottime` int(10) unsigned NOT NULL DEFAULT '0',
  `subject` char(80) NOT NULL DEFAULT '',
  `author` char(35) NOT NULL DEFAULT '',
  `itemfrom` char(50) NOT NULL DEFAULT '',
  `dateline` char(50) NOT NULL DEFAULT '',
  `isimport` tinyint(1) NOT NULL DEFAULT '0',
  `haveattach` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`),
  KEY `robotid` (`robotid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_robotitems` */

/*Table structure for table `supe_robotlog` */

DROP TABLE IF EXISTS `supe_robotlog`;

CREATE TABLE `supe_robotlog` (
  `hash` char(32) NOT NULL DEFAULT '',
  PRIMARY KEY (`hash`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_robotlog` */

/*Table structure for table `supe_robotmessages` */

DROP TABLE IF EXISTS `supe_robotmessages`;

CREATE TABLE `supe_robotmessages` (
  `msgid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `itemid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `robotid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  `picurls` text NOT NULL,
  `flashurls` text NOT NULL,
  PRIMARY KEY (`msgid`),
  KEY `itemid` (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_robotmessages` */

/*Table structure for table `supe_robots` */

DROP TABLE IF EXISTS `supe_robots`;

CREATE TABLE `supe_robots` (
  `robotid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT '',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `lasttime` int(10) unsigned NOT NULL DEFAULT '0',
  `importcatid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `importtype` varchar(10) NOT NULL DEFAULT '',
  `robotnum` smallint(6) unsigned NOT NULL DEFAULT '0',
  `listurltype` varchar(10) NOT NULL DEFAULT '',
  `listurl` text NOT NULL,
  `listpagestart` smallint(6) unsigned NOT NULL DEFAULT '0',
  `listpageend` smallint(6) unsigned NOT NULL DEFAULT '0',
  `reverseorder` tinyint(1) NOT NULL DEFAULT '1',
  `allnum` smallint(6) unsigned NOT NULL DEFAULT '0',
  `pernum` smallint(6) unsigned NOT NULL DEFAULT '0',
  `savepic` tinyint(1) NOT NULL DEFAULT '0',
  `encode` varchar(20) NOT NULL DEFAULT '',
  `picurllinkpre` text NOT NULL,
  `saveflash` tinyint(1) NOT NULL DEFAULT '0',
  `subjecturlrule` text NOT NULL,
  `subjecturllinkrule` text NOT NULL,
  `subjecturllinkpre` text NOT NULL,
  `subjectrule` text NOT NULL,
  `subjectfilter` text NOT NULL,
  `subjectreplace` text NOT NULL,
  `subjectreplaceto` text NOT NULL,
  `subjectkey` text NOT NULL,
  `subjectallowrepeat` tinyint(1) NOT NULL DEFAULT '0',
  `datelinerule` text NOT NULL,
  `fromrule` text NOT NULL,
  `authorrule` text NOT NULL,
  `messagerule` text NOT NULL,
  `messagefilter` text NOT NULL,
  `messagepagetype` varchar(10) NOT NULL DEFAULT '',
  `messagepagerule` text NOT NULL,
  `messagepageurlrule` text NOT NULL,
  `messagepageurllinkpre` text NOT NULL,
  `messagereplace` text NOT NULL,
  `messagereplaceto` text NOT NULL,
  `autotype` tinyint(1) NOT NULL DEFAULT '0',
  `wildcardlen` tinyint(1) NOT NULL DEFAULT '0',
  `subjecturllinkcancel` text NOT NULL,
  `subjecturllinkfilter` text NOT NULL,
  `subjecturllinkpf` text NOT NULL,
  `subjectkeycancel` text NOT NULL,
  `messagekey` text NOT NULL,
  `messagekeycancel` text NOT NULL,
  `messageformat` tinyint(1) NOT NULL DEFAULT '0',
  `messagepageurllinkpf` text NOT NULL,
  `uidrule` text NOT NULL,
  `defaultdateline` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`robotid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_robots` */

/*Table structure for table `supe_rss` */

DROP TABLE IF EXISTS `supe_rss`;

CREATE TABLE `supe_rss` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `type` varchar(30) NOT NULL DEFAULT '',
  `data` mediumtext NOT NULL,
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`,`type`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_rss` */

/*Table structure for table `supe_settings` */

DROP TABLE IF EXISTS `supe_settings`;

CREATE TABLE `supe_settings` (
  `variable` varchar(32) NOT NULL DEFAULT '',
  `value` text NOT NULL,
  PRIMARY KEY (`variable`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_settings` */

insert  into `supe_settings`(`variable`,`value`) values ('allowcache','1'),('allowguest','0'),('attachmentdir','./attachments'),('attachmentdirtype','month'),('allowregister','1'),('attachmenturl',''),('bbsurltype','site'),('checkgrade',''),('debug','0'),('gzipcompress','0'),('htmldir','./html'),('htmlurl',''),('htmlcategory','0'),('htmlcategorytime','300'),('htmlindex','0'),('htmlindextime','300'),('htmlviewnews','0'),('htmlviewnewstime','300'),('language','chinese.php'),('needcheck','0'),('pagepostfix',''),('searchinterval','30'),('sitename','SupeSite社区门户'),('template','default'),('thumbbgcolor','#C0C0C0'),('thumbcutmode','2'),('thumbcutstartx','0'),('thumbcutstarty','0'),('thumboption','4'),('timeoffset','8'),('urltype','4'),('watermark','0'),('watermarkfile','images/base/watermark.gif'),('watermarkjpgquality','85'),('watermarkstatus','9'),('watermarktrans','30'),('seotitle',''),('seokeywords',''),('seodescription',''),('seohead',''),('noseccode','1'),('showindex','0'),('newsjammer','0'),('updateview','1'),('allowguestsearch','0'),('commenttime','30'),('posttime','30'),('customaddfeed','1'),('allowfeed','1'),('sitekey','d19d27c4719VWUU1'),('commstatus','1'),('commicon','logo.gif'),('commdefault','我也来评论！'),('commorderby','0'),('commfloornum','2'),('commshowip','1'),('commshowlocation','1'),('commdebate','0'),('commdivide','10'),('commviewnum','50'),('commhidefloor','0'),('makehtml','0'),('itempost','flower'),('post_flower','0'),('post_egg','0'),('post_flower_egg','0'),('perpage','20'),('prehtml','info');

/*Table structure for table `supe_sitemaplogs` */

DROP TABLE IF EXISTS `supe_sitemaplogs`;

CREATE TABLE `supe_sitemaplogs` (
  `slogid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `mapname` varchar(50) NOT NULL DEFAULT '',
  `maptype` varchar(20) NOT NULL DEFAULT '',
  `mapnum` int(10) unsigned NOT NULL DEFAULT '0',
  `createtype` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `mapdata` mediumtext NOT NULL,
  `lastitemid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) NOT NULL DEFAULT '0',
  `changefreq` varchar(20) NOT NULL DEFAULT '',
  `lastfileid` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`slogid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_sitemaplogs` */

/*Table structure for table `supe_spacecomments` */

DROP TABLE IF EXISTS `supe_spacecomments`;

CREATE TABLE `supe_spacecomments` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `itemid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `type` varchar(30) NOT NULL DEFAULT '',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `authorid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `author` varchar(15) NOT NULL DEFAULT '',
  `ip` varchar(15) NOT NULL DEFAULT '',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `url` varchar(150) NOT NULL DEFAULT '',
  `subject` varchar(100) NOT NULL DEFAULT '',
  `message` text NOT NULL,
  `hot` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `click_33` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_34` smallint(6) unsigned NOT NULL DEFAULT '0',
  `floornum` smallint(6) unsigned NOT NULL DEFAULT '0',
  `hideauthor` tinyint(1) NOT NULL DEFAULT '0',
  `hideip` tinyint(1) NOT NULL DEFAULT '0',
  `hidelocation` tinyint(1) NOT NULL DEFAULT '0',
  `firstcid` int(10) unsigned NOT NULL DEFAULT '0',
  `upcid` int(10) unsigned NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cid`),
  KEY `itemid` (`itemid`,`dateline`),
  KEY `uid` (`uid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_spacecomments` */

/*Table structure for table `supe_spaceitems` */

DROP TABLE IF EXISTS `supe_spaceitems`;

CREATE TABLE `supe_spaceitems` (
  `itemid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `catid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `tid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` char(15) NOT NULL DEFAULT '',
  `itemtypeid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `type` char(30) NOT NULL DEFAULT '',
  `subtype` char(10) NOT NULL DEFAULT '',
  `subject` char(80) NOT NULL DEFAULT '',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `lastpost` int(10) unsigned NOT NULL DEFAULT '0',
  `viewnum` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `replynum` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `digest` tinyint(1) NOT NULL DEFAULT '0',
  `top` tinyint(1) NOT NULL DEFAULT '0',
  `allowreply` tinyint(1) NOT NULL DEFAULT '1',
  `hash` char(16) NOT NULL DEFAULT '',
  `haveattach` tinyint(1) NOT NULL DEFAULT '0',
  `grade` tinyint(1) NOT NULL DEFAULT '0',
  `gid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `gdigest` tinyint(1) NOT NULL DEFAULT '0',
  `password` char(10) NOT NULL DEFAULT '',
  `styletitle` char(11) NOT NULL DEFAULT '',
  `picid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `fromtype` char(10) NOT NULL DEFAULT 'adminpost',
  `fromid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `hot` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `click_1` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_2` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_3` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_4` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_5` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_6` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_7` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_8` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_9` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_10` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_11` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_12` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_13` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_14` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_15` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_16` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_17` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_18` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_19` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_20` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_21` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_22` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_23` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_24` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_25` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_26` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_27` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_28` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_29` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_30` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_31` smallint(6) unsigned NOT NULL DEFAULT '0',
  `click_32` smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`itemid`),
  KEY `uid` (`uid`,`type`,`top`,`dateline`),
  KEY `catid` (`catid`,`dateline`),
  KEY `type` (`type`),
  KEY `gid` (`gid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_spaceitems` */

/*Table structure for table `supe_spacenews` */

DROP TABLE IF EXISTS `supe_spacenews`;

CREATE TABLE `supe_spacenews` (
  `nid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `itemid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  `relativetags` text NOT NULL,
  `postip` varchar(15) NOT NULL DEFAULT '',
  `relativeitemids` varchar(255) NOT NULL DEFAULT '',
  `customfieldid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `customfieldtext` text NOT NULL,
  `includetags` text NOT NULL,
  `newsauthor` varchar(20) NOT NULL DEFAULT '',
  `newsfrom` varchar(50) NOT NULL DEFAULT '',
  `newsfromurl` varchar(150) NOT NULL DEFAULT '',
  `newsurl` varchar(255) NOT NULL DEFAULT '',
  `pageorder` smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`nid`),
  KEY `itemid` (`itemid`,`pageorder`,`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_spacenews` */

/*Table structure for table `supe_spacepages` */

DROP TABLE IF EXISTS `supe_spacepages`;

CREATE TABLE `supe_spacepages` (
  `pageid` smallint(6) NOT NULL,
  `sitemid` mediumint(8) NOT NULL,
  `eitemid` mediumint(8) NOT NULL,
  `catid` smallint(6) NOT NULL,
  KEY `pageid` (`pageid`,`catid`),
  KEY `sitemid` (`sitemid`,`eitemid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_spacepages` */

/*Table structure for table `supe_spacetags` */

DROP TABLE IF EXISTS `supe_spacetags`;

CREATE TABLE `supe_spacetags` (
  `itemid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `tagid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `type` char(30) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`itemid`,`tagid`),
  KEY `tagid` (`tagid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_spacetags` */

/*Table structure for table `supe_styles` */

DROP TABLE IF EXISTS `supe_styles`;

CREATE TABLE `supe_styles` (
  `tplid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `tplname` varchar(80) NOT NULL DEFAULT '',
  `tplnote` text NOT NULL,
  `tpltype` varchar(20) DEFAULT NULL,
  `tplfilepath` varchar(80) NOT NULL DEFAULT '',
  PRIMARY KEY (`tplid`),
  KEY `tpltype` (`tpltype`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=gbk;

/*Data for the table `supe_styles` */

insert  into `supe_styles`(`tplid`,`tplname`,`tplnote`,`tpltype`,`tplfilepath`) values (1,'系统分类名称列表','显示数据: 系统分类名\r\n显示方式: 以 &lt;li&gt;名称&lt;/li&gt; 的方式循环显示','category','name_li'),(2,'资讯标题列表','显示数据: 资讯标题\r\n显示方式: 以 &lt;li&gt;标题&lt;/li&gt; 的方式循环显示','spacenews','subject_li'),(3,'模型文章标题列表','显示数据: 模型标题\r\n显示方式: 以 &lt;li&gt;标题&lt;/li&gt; 的方式循环显示','model','subject_li'),(4,'投票表单','显示数据: 投票表单\r\n显示方式: 以 &lt;form&gt;投票具体选项&lt;/form&gt; 的方式循环显示','poll','poll_form'),(5,'TAG名列表','显示数据: TAG名\r\n显示方式: 以 &lt;li&gt;TAG名&lt;/li&gt; 的方式循环显示','tag','tagname_li'),(6,'文章标题列表','显示数据: 信息标题、作者\r\n显示方式: 以 &lt;li&gt;标题(作者)&lt;/li&gt; 的方式循环显示','spacetag','subject_username_li'),(7,'回复内容列表','显示数据: 标题、内容\r\n显示方式: 以 &lt;li&gt;&lt;p&gt;标题&lt;/p&gt;&lt;p&gt;内容&lt;/p&gt;&lt;/li&gt; 的方式循环显示','spacecomment','subject_message_li'),(8,'公告标题列表','显示数据: 标题\r\n显示方式: 以 &lt;li&gt;标题&lt;/li&gt; 的方式循环显示','announcement','subject_li'),(9,'友情链接名列表','显示数据: 标题\r\n显示方式: 以 &lt;li&gt;标题&lt;/li&gt; 的方式循环显示','friendlink','name_li'),(10,'主题列表','显示数据: 标题\r\n显示方式: 以 &lt;li&gt;标题&lt;/li&gt; 的方式循环显示','bbsthread','subject_li'),(11,'论坛公告列表','显示数据: 标题\r\n显示方式: 以 &lt;li&gt;标题&lt;/li&gt; 的方式循环显示','bbsannouncement','subject_li'),(12,'论坛版块名列表','显示数据: 版块名\r\n显示方式: 以 &lt;li&gt;版块名&lt;/li&gt; 的方式循环显示','bbsforum','name_li'),(13,'友情链接名列表','显示数据: 链接名\r\n显示方式: 以 &lt;li&gt;链接名&lt;/li&gt; 的方式循环显示','bbslink','name_li'),(14,'会员名列表','显示数据: 会员名\r\n显示方式: 以 &lt;li&gt;会员名&lt;/li&gt; 的方式循环显示','bbsmember','username_li'),(15,'附件名列表','显示数据: 附件名\r\n显示方式: 以 &lt;li&gt;附件名&lt;/li&gt; 的方式循环显示','bbsattachment','filename_li'),(16,'帖子内容列表','显示数据: 标题、内容(包含附件)\r\n显示方式: 以 &lt;li&gt;&lt;p&gt;标题&lt;/p&gt;&lt;p&gt;内容&lt;/p&gt;&lt;/li&gt; 的方式循环显示','bbspost','post_subject_message_li');

/*Table structure for table `supe_tagcache` */

DROP TABLE IF EXISTS `supe_tagcache`;

CREATE TABLE `supe_tagcache` (
  `cachekey` varchar(16) NOT NULL DEFAULT '',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `cachename` varchar(20) NOT NULL DEFAULT '',
  `value` mediumtext NOT NULL,
  `updatetime` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`cachekey`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_tagcache` */

/*Table structure for table `supe_tags` */

DROP TABLE IF EXISTS `supe_tags`;

CREATE TABLE `supe_tags` (
  `tagid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `tagname` char(20) NOT NULL DEFAULT '',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` char(15) NOT NULL DEFAULT '',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `close` tinyint(1) NOT NULL DEFAULT '0',
  `spacenewsnum` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `relativetags` char(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`tagid`),
  KEY `tagname` (`tagname`),
  KEY `tagid` (`tagid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_tags` */

/*Table structure for table `supe_usergroups` */

DROP TABLE IF EXISTS `supe_usergroups`;

CREATE TABLE `supe_usergroups` (
  `groupid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `grouptitle` char(20) NOT NULL DEFAULT '',
  `system` tinyint(1) NOT NULL DEFAULT '0',
  `explower` int(10) NOT NULL DEFAULT '0',
  `allowview` tinyint(1) NOT NULL DEFAULT '0',
  `allowpost` tinyint(1) NOT NULL DEFAULT '0',
  `allowcomment` tinyint(1) NOT NULL DEFAULT '0',
  `allowgetattach` tinyint(1) NOT NULL DEFAULT '0',
  `allowpostattach` tinyint(1) NOT NULL DEFAULT '0',
  `allowvote` tinyint(1) NOT NULL DEFAULT '0',
  `allowsearch` tinyint(1) NOT NULL DEFAULT '0',
  `allowtransfer` tinyint(1) NOT NULL DEFAULT '0',
  `allowpushin` tinyint(1) NOT NULL DEFAULT '0',
  `allowpushout` tinyint(1) NOT NULL DEFAULT '0',
  `allowdirectpost` tinyint(1) NOT NULL DEFAULT '0',
  `allowanonymous` tinyint(1) NOT NULL DEFAULT '0',
  `allowhideip` tinyint(1) NOT NULL DEFAULT '0',
  `allowhidelocation` tinyint(1) NOT NULL DEFAULT '0',
  `allowclick` tinyint(1) NOT NULL DEFAULT '0',
  `closeignore` tinyint(1) NOT NULL DEFAULT '0',
  `managemodpost` tinyint(1) NOT NULL DEFAULT '0',
  `manageeditpost` tinyint(1) NOT NULL DEFAULT '0',
  `managedelpost` tinyint(1) NOT NULL DEFAULT '0',
  `managefolder` tinyint(1) NOT NULL DEFAULT '0',
  `managemodcat` tinyint(1) NOT NULL DEFAULT '0',
  `manageeditcat` tinyint(1) NOT NULL DEFAULT '0',
  `managedelcat` tinyint(1) NOT NULL DEFAULT '0',
  `managemodrobot` tinyint(1) NOT NULL DEFAULT '0',
  `manageuserobot` tinyint(1) NOT NULL DEFAULT '0',
  `manageeditrobot` tinyint(1) NOT NULL DEFAULT '0',
  `managedelrobot` tinyint(1) NOT NULL DEFAULT '0',
  `managemodrobotmsg` tinyint(1) NOT NULL DEFAULT '0',
  `manageundelete` tinyint(1) NOT NULL DEFAULT '0',
  `manageadmincp` tinyint(1) NOT NULL DEFAULT '0',
  `manageviewlog` tinyint(1) NOT NULL DEFAULT '0',
  `managesettings` tinyint(1) NOT NULL DEFAULT '0',
  `manageusergroups` tinyint(1) NOT NULL DEFAULT '0',
  `manageannouncements` tinyint(1) NOT NULL DEFAULT '0',
  `managead` tinyint(1) NOT NULL DEFAULT '0',
  `manageblocks` tinyint(1) NOT NULL DEFAULT '0',
  `managebbs` tinyint(1) NOT NULL DEFAULT '0',
  `managebbsforums` tinyint(1) NOT NULL DEFAULT '0',
  `managethreads` tinyint(1) NOT NULL DEFAULT '0',
  `manageuchome` tinyint(1) NOT NULL DEFAULT '0',
  `managemodels` tinyint(1) NOT NULL DEFAULT '0',
  `managechannel` tinyint(1) NOT NULL DEFAULT '0',
  `managemember` tinyint(1) NOT NULL DEFAULT '0',
  `managehtml` tinyint(1) NOT NULL DEFAULT '0',
  `managecache` tinyint(1) NOT NULL DEFAULT '0',
  `managewords` tinyint(1) NOT NULL DEFAULT '0',
  `manageattachmenttypes` tinyint(1) NOT NULL DEFAULT '0',
  `managedatabase` tinyint(1) NOT NULL DEFAULT '0',
  `managetpl` tinyint(1) NOT NULL DEFAULT '0',
  `managecrons` tinyint(1) NOT NULL DEFAULT '0',
  `managecheck` tinyint(1) NOT NULL DEFAULT '0',
  `managecss` tinyint(1) NOT NULL DEFAULT '0',
  `managefriendlinks` tinyint(1) NOT NULL DEFAULT '0',
  `manageprefields` tinyint(1) NOT NULL DEFAULT '0',
  `managesitemap` tinyint(1) NOT NULL DEFAULT '0',
  `manageitems` tinyint(1) NOT NULL DEFAULT '0',
  `managecomments` tinyint(1) NOT NULL DEFAULT '0',
  `manageattachments` tinyint(1) NOT NULL DEFAULT '0',
  `managetags` tinyint(1) NOT NULL DEFAULT '0',
  `managereports` tinyint(1) NOT NULL DEFAULT '0',
  `managepolls` tinyint(1) NOT NULL DEFAULT '0',
  `managecustomfields` tinyint(1) NOT NULL DEFAULT '0',
  `managestyles` tinyint(1) NOT NULL DEFAULT '0',
  `managestyletpl` tinyint(1) NOT NULL DEFAULT '0',
  `manageclick` tinyint(1) NOT NULL DEFAULT '0',
  `managedelmembers` tinyint(1) NOT NULL DEFAULT '0',
  `managecredit` tinyint(1) NOT NULL DEFAULT '0',
  `managepostnews` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`groupid`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=gbk;

/*Data for the table `supe_usergroups` */

insert  into `supe_usergroups`(`groupid`,`grouptitle`,`system`,`explower`,`allowview`,`allowpost`,`allowcomment`,`allowgetattach`,`allowpostattach`,`allowvote`,`allowsearch`,`allowtransfer`,`allowpushin`,`allowpushout`,`allowdirectpost`,`allowanonymous`,`allowhideip`,`allowhidelocation`,`allowclick`,`closeignore`,`managemodpost`,`manageeditpost`,`managedelpost`,`managefolder`,`managemodcat`,`manageeditcat`,`managedelcat`,`managemodrobot`,`manageuserobot`,`manageeditrobot`,`managedelrobot`,`managemodrobotmsg`,`manageundelete`,`manageadmincp`,`manageviewlog`,`managesettings`,`manageusergroups`,`manageannouncements`,`managead`,`manageblocks`,`managebbs`,`managebbsforums`,`managethreads`,`manageuchome`,`managemodels`,`managechannel`,`managemember`,`managehtml`,`managecache`,`managewords`,`manageattachmenttypes`,`managedatabase`,`managetpl`,`managecrons`,`managecheck`,`managecss`,`managefriendlinks`,`manageprefields`,`managesitemap`,`manageitems`,`managecomments`,`manageattachments`,`managetags`,`managereports`,`managepolls`,`managecustomfields`,`managestyles`,`managestyletpl`,`manageclick`,`managedelmembers`,`managecredit`,`managepostnews`) values (1,'管理员',-1,0,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1),(2,'游客组',-1,0,1,0,1,0,0,1,1,0,0,0,1,0,0,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(3,'禁止访问',-1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(4,'禁止发言',-1,0,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(10,'贵宾VIP',1,0,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(11,'受限制会员',0,-999999999,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(12,'初级会员',0,0,1,1,1,0,0,1,1,0,0,0,1,0,0,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(13,'中级会员',0,300,1,1,1,1,0,1,1,1,0,0,1,0,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0),(14,'高级会员',0,800,1,1,1,1,1,1,1,1,1,1,0,1,1,1,1,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);

/*Table structure for table `supe_userlog` */

DROP TABLE IF EXISTS `supe_userlog`;

CREATE TABLE `supe_userlog` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` char(15) NOT NULL DEFAULT '',
  `action` char(10) NOT NULL DEFAULT '',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_userlog` */

/*Table structure for table `supe_words` */

DROP TABLE IF EXISTS `supe_words`;

CREATE TABLE `supe_words` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `admin` varchar(15) NOT NULL DEFAULT '',
  `find` varchar(255) NOT NULL DEFAULT '',
  `replacement` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `supe_words` */

/*Table structure for table `uc_admins` */

DROP TABLE IF EXISTS `uc_admins`;

CREATE TABLE `uc_admins` (
  `uid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(15) NOT NULL DEFAULT '',
  `allowadminsetting` tinyint(1) NOT NULL DEFAULT '0',
  `allowadminapp` tinyint(1) NOT NULL DEFAULT '0',
  `allowadminuser` tinyint(1) NOT NULL DEFAULT '0',
  `allowadminbadword` tinyint(1) NOT NULL DEFAULT '0',
  `allowadmintag` tinyint(1) NOT NULL DEFAULT '0',
  `allowadminpm` tinyint(1) NOT NULL DEFAULT '0',
  `allowadmincredits` tinyint(1) NOT NULL DEFAULT '0',
  `allowadmindomain` tinyint(1) NOT NULL DEFAULT '0',
  `allowadmindb` tinyint(1) NOT NULL DEFAULT '0',
  `allowadminnote` tinyint(1) NOT NULL DEFAULT '0',
  `allowadmincache` tinyint(1) NOT NULL DEFAULT '0',
  `allowadminlog` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `uc_admins` */

/*Table structure for table `uc_applications` */

DROP TABLE IF EXISTS `uc_applications`;

CREATE TABLE `uc_applications` (
  `appid` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `type` char(16) NOT NULL DEFAULT '',
  `name` char(20) NOT NULL DEFAULT '',
  `url` char(255) NOT NULL DEFAULT '',
  `authkey` char(255) NOT NULL DEFAULT '',
  `ip` char(15) NOT NULL DEFAULT '',
  `viewprourl` char(255) NOT NULL,
  `apifilename` char(30) NOT NULL DEFAULT 'uc.php',
  `charset` char(8) NOT NULL DEFAULT '',
  `dbcharset` char(8) NOT NULL DEFAULT '',
  `synlogin` tinyint(1) NOT NULL DEFAULT '0',
  `recvnote` tinyint(1) DEFAULT '0',
  `extra` mediumtext NOT NULL,
  `tagtemplates` mediumtext NOT NULL,
  PRIMARY KEY (`appid`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

/*Data for the table `uc_applications` */

insert  into `uc_applications`(`appid`,`type`,`name`,`url`,`authkey`,`ip`,`viewprourl`,`apifilename`,`charset`,`dbcharset`,`synlogin`,`recvnote`,`extra`,`tagtemplates`) values (1,'SUPESITE','信息科学技术学院·软件学院学生工作','http://localhost/istcms','Oboey8m7BbGaP5Q7ibF07bI1Y4d9D2ue60v5ubEaEb43A6d4F1UdS7A1r3Y0paB7','','','uc.php','gbk','gbk',1,1,'','<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\r\n<root>\r\n	<item id=\"template\"><![CDATA[<a href=\"{url}\" target=\"_blank\">{subject}</a>]]></item>\r\n	<item id=\"fields\">\r\n		<item id=\"subject\"><![CDATA[资讯标题]]></item>\r\n		<item id=\"url\"><![CDATA[资讯地址]]></item>\r\n	</item>\r\n</root>');

/*Table structure for table `uc_badwords` */

DROP TABLE IF EXISTS `uc_badwords`;

CREATE TABLE `uc_badwords` (
  `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,
  `admin` varchar(15) NOT NULL DEFAULT '',
  `find` varchar(255) NOT NULL DEFAULT '',
  `replacement` varchar(255) NOT NULL DEFAULT '',
  `findpattern` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `find` (`find`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `uc_badwords` */

/*Table structure for table `uc_domains` */

DROP TABLE IF EXISTS `uc_domains`;

CREATE TABLE `uc_domains` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `domain` char(40) NOT NULL DEFAULT '',
  `ip` char(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `uc_domains` */

/*Table structure for table `uc_failedlogins` */

DROP TABLE IF EXISTS `uc_failedlogins`;

CREATE TABLE `uc_failedlogins` (
  `ip` char(15) NOT NULL DEFAULT '',
  `count` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `lastupdate` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`ip`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `uc_failedlogins` */

/*Table structure for table `uc_feeds` */

DROP TABLE IF EXISTS `uc_feeds`;

CREATE TABLE `uc_feeds` (
  `feedid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `appid` varchar(30) NOT NULL DEFAULT '',
  `icon` varchar(30) NOT NULL DEFAULT '',
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` varchar(15) NOT NULL DEFAULT '',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `hash_template` varchar(32) NOT NULL DEFAULT '',
  `hash_data` varchar(32) NOT NULL DEFAULT '',
  `title_template` text NOT NULL,
  `title_data` text NOT NULL,
  `body_template` text NOT NULL,
  `body_data` text NOT NULL,
  `body_general` text NOT NULL,
  `image_1` varchar(255) NOT NULL DEFAULT '',
  `image_1_link` varchar(255) NOT NULL DEFAULT '',
  `image_2` varchar(255) NOT NULL DEFAULT '',
  `image_2_link` varchar(255) NOT NULL DEFAULT '',
  `image_3` varchar(255) NOT NULL DEFAULT '',
  `image_3_link` varchar(255) NOT NULL DEFAULT '',
  `image_4` varchar(255) NOT NULL DEFAULT '',
  `image_4_link` varchar(255) NOT NULL DEFAULT '',
  `target_ids` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`feedid`),
  KEY `uid` (`uid`,`dateline`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `uc_feeds` */

/*Table structure for table `uc_friends` */

DROP TABLE IF EXISTS `uc_friends`;

CREATE TABLE `uc_friends` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `friendid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `direction` tinyint(1) NOT NULL DEFAULT '0',
  `version` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `delstatus` tinyint(1) NOT NULL DEFAULT '0',
  `comment` char(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`version`),
  KEY `uid` (`uid`),
  KEY `friendid` (`friendid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `uc_friends` */

/*Table structure for table `uc_mailqueue` */

DROP TABLE IF EXISTS `uc_mailqueue`;

CREATE TABLE `uc_mailqueue` (
  `mailid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `touid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `tomail` varchar(32) NOT NULL,
  `frommail` varchar(100) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `charset` varchar(15) NOT NULL,
  `htmlon` tinyint(1) NOT NULL DEFAULT '0',
  `level` tinyint(1) NOT NULL DEFAULT '1',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `failures` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `appid` smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`mailid`),
  KEY `appid` (`appid`),
  KEY `level` (`level`,`failures`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `uc_mailqueue` */

/*Table structure for table `uc_memberfields` */

DROP TABLE IF EXISTS `uc_memberfields`;

CREATE TABLE `uc_memberfields` (
  `uid` mediumint(8) unsigned NOT NULL,
  `blacklist` text NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `uc_memberfields` */

insert  into `uc_memberfields`(`uid`,`blacklist`) values (1,'');

/*Table structure for table `uc_members` */

DROP TABLE IF EXISTS `uc_members`;

CREATE TABLE `uc_members` (
  `uid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `username` char(15) NOT NULL DEFAULT '',
  `password` char(32) NOT NULL DEFAULT '',
  `email` char(32) NOT NULL DEFAULT '',
  `myid` char(30) NOT NULL DEFAULT '',
  `myidkey` char(16) NOT NULL DEFAULT '',
  `regip` char(15) NOT NULL DEFAULT '',
  `regdate` int(10) unsigned NOT NULL DEFAULT '0',
  `lastloginip` int(10) NOT NULL DEFAULT '0',
  `lastlogintime` int(10) unsigned NOT NULL DEFAULT '0',
  `salt` char(6) NOT NULL,
  `secques` char(8) NOT NULL DEFAULT '',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

/*Data for the table `uc_members` */

insert  into `uc_members`(`uid`,`username`,`password`,`email`,`myid`,`myidkey`,`regip`,`regdate`,`lastloginip`,`lastlogintime`,`salt`,`secques`) values (1,'nwuist','166ce2e8598fdf9927f725774b57ffaf','webmastor@yourdomain.com','','','unknown',1283006333,0,0,'d2751e','');

/*Table structure for table `uc_mergemembers` */

DROP TABLE IF EXISTS `uc_mergemembers`;

CREATE TABLE `uc_mergemembers` (
  `appid` smallint(6) unsigned NOT NULL,
  `username` char(15) NOT NULL,
  PRIMARY KEY (`appid`,`username`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `uc_mergemembers` */

/*Table structure for table `uc_newpm` */

DROP TABLE IF EXISTS `uc_newpm`;

CREATE TABLE `uc_newpm` (
  `uid` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `uc_newpm` */

/*Table structure for table `uc_notelist` */

DROP TABLE IF EXISTS `uc_notelist`;

CREATE TABLE `uc_notelist` (
  `noteid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `operation` char(32) NOT NULL,
  `closed` tinyint(4) NOT NULL DEFAULT '0',
  `totalnum` smallint(6) unsigned NOT NULL DEFAULT '0',
  `succeednum` smallint(6) unsigned NOT NULL DEFAULT '0',
  `getdata` mediumtext NOT NULL,
  `postdata` mediumtext NOT NULL,
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `pri` tinyint(3) NOT NULL DEFAULT '0',
  `app1` tinyint(4) NOT NULL,
  PRIMARY KEY (`noteid`),
  KEY `closed` (`closed`,`pri`,`noteid`),
  KEY `dateline` (`dateline`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk;

/*Data for the table `uc_notelist` */

insert  into `uc_notelist`(`noteid`,`operation`,`closed`,`totalnum`,`succeednum`,`getdata`,`postdata`,`dateline`,`pri`,`app1`) values (1,'updateapps',1,0,0,'','<?xml version=\"1.0\" encoding=\"ISO-8859-1\"?>\r\n<root>\r\n	<item id=\"1\">\r\n		<item id=\"appid\"><![CDATA[1]]></item>\r\n		<item id=\"type\"><![CDATA[SUPESITE]]></item>\r\n		<item id=\"name\"><![CDATA[信息科学技术学院·软件学院学生工作]]></item>\r\n		<item id=\"url\"><![CDATA[http://localhost/istcms]]></item>\r\n		<item id=\"ip\"><![CDATA[]]></item>\r\n		<item id=\"charset\"><![CDATA[gbk]]></item>\r\n		<item id=\"synlogin\"><![CDATA[1]]></item>\r\n		<item id=\"extra\"><![CDATA[]]></item>\r\n	</item>\r\n	<item id=\"UC_API\"><![CDATA[http://localhost/istcms/ucenter]]></item>\r\n</root>',0,0,0);

/*Table structure for table `uc_pms` */

DROP TABLE IF EXISTS `uc_pms`;

CREATE TABLE `uc_pms` (
  `pmid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `msgfrom` varchar(15) NOT NULL DEFAULT '',
  `msgfromid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `msgtoid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `folder` enum('inbox','outbox') NOT NULL DEFAULT 'inbox',
  `new` tinyint(1) NOT NULL DEFAULT '0',
  `subject` varchar(75) NOT NULL DEFAULT '',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `message` text NOT NULL,
  `delstatus` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `related` int(10) unsigned NOT NULL DEFAULT '0',
  `fromappid` smallint(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`pmid`),
  KEY `msgtoid` (`msgtoid`,`folder`,`dateline`),
  KEY `msgfromid` (`msgfromid`,`folder`,`dateline`),
  KEY `related` (`related`),
  KEY `getnum` (`msgtoid`,`folder`,`delstatus`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `uc_pms` */

/*Table structure for table `uc_protectedmembers` */

DROP TABLE IF EXISTS `uc_protectedmembers`;

CREATE TABLE `uc_protectedmembers` (
  `uid` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `username` char(15) NOT NULL DEFAULT '',
  `appid` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `dateline` int(10) unsigned NOT NULL DEFAULT '0',
  `admin` char(15) NOT NULL DEFAULT '0',
  UNIQUE KEY `username` (`username`,`appid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `uc_protectedmembers` */

insert  into `uc_protectedmembers`(`uid`,`username`,`appid`,`dateline`,`admin`) values (1,'nwuist',0,1283006333,'nwuist');

/*Table structure for table `uc_settings` */

DROP TABLE IF EXISTS `uc_settings`;

CREATE TABLE `uc_settings` (
  `k` varchar(32) NOT NULL DEFAULT '',
  `v` text NOT NULL,
  PRIMARY KEY (`k`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `uc_settings` */

insert  into `uc_settings`(`k`,`v`) values ('accessemail',''),('censoremail',''),('censorusername',''),('dateformat','y-n-j'),('doublee','1'),('nextnotetime','0'),('timeoffset','28800'),('pmlimit1day','100'),('pmfloodctrl','15'),('pmcenter','1'),('sendpmseccode','1'),('pmsendregdays','0'),('maildefault','username@21cn.com'),('mailsend','1'),('mailserver','smtp.21cn.com'),('mailport','25'),('mailauth','1'),('mailfrom','UCenter <username@21cn.com>'),('mailauth_username','username@21cn.com'),('mailauth_password','password'),('maildelimiter','0'),('mailusername','1'),('mailsilent','1'),('version','1.5.0');

/*Table structure for table `uc_sqlcache` */

DROP TABLE IF EXISTS `uc_sqlcache`;

CREATE TABLE `uc_sqlcache` (
  `sqlid` char(6) NOT NULL DEFAULT '',
  `data` char(100) NOT NULL,
  `expiry` int(10) unsigned NOT NULL,
  PRIMARY KEY (`sqlid`),
  KEY `expiry` (`expiry`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `uc_sqlcache` */

/*Table structure for table `uc_tags` */

DROP TABLE IF EXISTS `uc_tags`;

CREATE TABLE `uc_tags` (
  `tagname` char(20) NOT NULL,
  `appid` smallint(6) unsigned NOT NULL DEFAULT '0',
  `data` mediumtext,
  `expiration` int(10) unsigned NOT NULL,
  KEY `tagname` (`tagname`,`appid`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

/*Data for the table `uc_tags` */

/*Table structure for table `uc_vars` */

DROP TABLE IF EXISTS `uc_vars`;

CREATE TABLE `uc_vars` (
  `name` char(32) NOT NULL DEFAULT '',
  `value` char(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`name`)
) ENGINE=MEMORY DEFAULT CHARSET=gbk;

/*Data for the table `uc_vars` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
