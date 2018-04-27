/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : sg_blog

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2018-04-22 10:53:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sg_admin
-- ----------------------------
DROP TABLE IF EXISTS `sg_admin`;
CREATE TABLE `sg_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `faceurl` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(5) DEFAULT NULL,
  `remark` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `last_login_time` int(11) DEFAULT NULL,
  `last_login_ip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_login_brand` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_admin` int(1) DEFAULT '0',
  `is_active` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of sg_admin
-- ----------------------------
INSERT INTO `sg_admin` VALUES ('50', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 'https://www.sunmale.cn/static/common/images/face/8.jpg', '', '1', '超级管理员，拥有全部权限', '1505286093', '1524364786', null, null, null, '1', '1');
INSERT INTO `sg_admin` VALUES ('64', 'e10adc3949ba59abbe56e057f20f883e', 'admin1', 'http://www.ceshi.com/static/common/images/face/6.jpg', '1040657944@qq.com', '1', '', '1523591336', '1523591336', null, null, null, '0', '0');

-- ----------------------------
-- Table structure for sg_article
-- ----------------------------
DROP TABLE IF EXISTS `sg_article`;
CREATE TABLE `sg_article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tags` text COLLATE utf8mb4_unicode_ci,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_reprint` int(3) NOT NULL DEFAULT '0',
  `typeid` int(3) NOT NULL,
  `remark` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reprint_url` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_time` int(20) NOT NULL,
  `update_time` int(20) DEFAULT NULL,
  `status` int(3) NOT NULL DEFAULT '0',
  `view` int(11) NOT NULL DEFAULT '0',
  `common` int(11) NOT NULL DEFAULT '0',
  `user_id` int(11) DEFAULT NULL,
  `like` int(11) DEFAULT '0',
  `date` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `update_time` (`update_time`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of sg_article
-- ----------------------------
INSERT INTO `sg_article` VALUES ('1', 'Linux搭建svn服务器', '1,2', '<p><span style=\"font-size: 14px;\"><b>什么是SVN</b></span></p><p>简单的说，您可以把SVN当成您的备份服务器，更好的是，他可以帮您记住每次上传到这个服务器的档案内容。并且自动的赋予每次的变更一个版本。 &nbsp;</p><p>本篇文章就是以 linux centos为例讲解Linux下搭建svn服务器</p><p><span style=\"color: rgb(34, 34, 34); font-family: Consolas, &quot;Lucida Console&quot;, &quot;Courier New&quot;, monospace; white-space: pre-wrap; background-color: rgb(255, 255, 255); font-size: 14px;\"><strong><br></strong></span></p><p><b>Linux下安装SVN服务器&nbsp;&nbsp;</b><br></p><p>&nbsp;1.下载安装svn &nbsp;linux命令行直接输入 &nbsp;# yum install subversion&nbsp;&nbsp;<br></p><p><font color=\"#3f3f3f\" face=\"Consolas, Lucida Console, Courier New, monospace\"><span style=\"white-space: pre-wrap;\">&nbsp;</span></font>2.创建svn文件保存目录还有 &nbsp; &nbsp;# mkdir /home/svn<br></p><p><font color=\"#222222\" face=\"Consolas, Lucida Console, Courier New, monospace\"><span style=\"white-space: pre-wrap;\">&nbsp;</span></font>3.新建一个资源版本库 &nbsp; &nbsp; # svnadmin create /home/svn/project</p><p><strong><br></strong></p><p><b>目录用途说明：&nbsp;&nbsp;</b></p><p>hooks目录：放置hook脚本文件的目录&nbsp;&nbsp;</p><p>locks目录：用来放置subversion的db锁文件和db_logs锁文件的目录，用来追踪存取文件库的客户端&nbsp;</p><p>&nbsp;format文件：是一个文本文件，里面只放了一个整数，表示当前文件库配置的版本号<br></p><p>conf目录：是这个仓库的配置文件（仓库的用户访问账号、权限等）</p><p><b><br></b></p><p><b>配置conf文件下的三个文件 &nbsp;</b><br></p><p>1 .# vi /home/svn/project/conf/svnserve.conf &nbsp; 打开并编辑这个文件 &nbsp;把 &nbsp;password-db = passwd &nbsp;跟 &nbsp;authz-db = authz &nbsp;前面的#还有空格去除。 &nbsp;&nbsp;&nbsp;</p><p><img src=\"https://www.sunmale.cn/uploads/20170928/6ed0385de96cccda2dbb670a8c36193c.png\" style=\"max-width:100%;\" class=\"\"></p><p>2. # vi /home/svn/project/conf/passwd  &nbsp;这个文件是设置用户名密码的 &nbsp;</p><p><img src=\"https://www.sunmale.cn/uploads/20170928/6081a3b0e928f445836ef23b4770349c.png\" style=\"max-width:100%;\" class=\"\"></p><p>3.# vi /home/svn/project/conf/authz&nbsp;&nbsp;这个文件是设置用户权限的 r代表读取权限 &nbsp;w代表写入权限&nbsp;&nbsp;<br></p><p><img src=\"https://www.sunmale.cn/uploads/20170928/f728b0df1ec1ed467abee3ba02a84a2f.png\" style=\"max-width:100%;\" class=\"\"></p><p><b>启动SVN服务器 &nbsp;</b></p><p># &nbsp;svnserve -d &nbsp;-r /home/svn/ &nbsp; &nbsp; &nbsp;监听这个svn版本库的根目录<strong style=\"color: rgb(63, 63, 63); font-family: 宋体, SimSun; font-size: 18px;\"><span style=\"white-space: pre-wrap;\">&nbsp;&nbsp;</span></strong><br></p><p>注意： 对权限配置文件的修改立即生效，不必重启svn。 因为svn默认端口是 &nbsp;3690 &nbsp;使用客户端&nbsp;，连接必须确保防火墙是允许此端口的。 如果不允许 &nbsp;添加防火墙允许访问规则<br></p><p><span style=\"background-color: rgb(248, 248, 248); color: rgb(61, 70, 77); font-family: &quot;Pingfang SC&quot;, STHeiti, &quot;Lantinghei SC&quot;, &quot;Open Sans&quot;, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, &quot;WenQuanYi Micro Hei&quot;, SimSun, sans-serif; white-space: pre-wrap;\">           </span># iptables -A INPUT -p tcp --dport 3690 &nbsp;-j ACCEPT添加规则</p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;# service iptables save 保存规则&nbsp;&nbsp;<br></p><p><span style=\"white-space: pre-wrap; box-sizing: inherit; -webkit-tap-highlight-color: transparent; color: rgb(61, 70, 77); background-color: rgb(248, 248, 248); font-family: 宋体, SimSun;\"><b><br></b></span></p><p><b>windows 本地使用客户端连接SVN</b>&nbsp;&nbsp;<br></p><p>1. 下载&nbsp;SVN客户端：TortoiseSVN，官网下载：<a href=\"http://tortoisesvn.net/downloads.html\">http://tortoisesvn.net/downloads.html</a>&nbsp;&nbsp;<strong><span style=\"white-space: pre-wrap; box-sizing: inherit; -webkit-tap-highlight-color: transparent; color: rgb(61, 70, 77); background-color: rgb(248, 248, 248); font-family: 宋体, SimSun;\"><br></span></strong></p><p>2.安装好客户端后 &nbsp;鼠标右键 &nbsp;svn检出&nbsp;输入版本库的地址 &nbsp;svn://ip地址/project &nbsp;， &nbsp;这时候本地就下载一个带 .svn的文件夹 &nbsp;默认跟 project名称一样.</p><p>3.本地修改数据 先更新文件 &nbsp;在提交到服务器版本库中。&nbsp;&nbsp;<br></p><p>这样一个SVN服务就搭建完成了 &nbsp; 可以轻松管理你的项目<span style=\"color: rgb(89, 89, 89);\">&nbsp;</span></p><p>&nbsp; SVN学习视频资料 &nbsp;Windows下如何搭建SVN服务器 &nbsp;<span style=\"color: rgb(89, 89, 89);\">&nbsp;&nbsp;</span>&nbsp; 网盘地址：&nbsp;<font color=\"#c24f4a\"><a href=\"http://pan.baidu.com/s/1kUIR5dH\">&nbsp;</a><font color=\"#c24f4a\"><a href=\"http://pan.baidu.com/s/1kUIR5dH\" target=\"_blank\">Windows下如何使用SVN</a>&nbsp;</font>&nbsp;</font></p><p><span style=\"color: rgb(89, 89, 89);\">&nbsp;&nbsp;</span></p><p><br></p>', '2', '30', '您可以把SVN当成您的备份服务器，更好的是，他可以帮您记住每次上传到这个服务器的档案内容。并且自动的赋予每次的变更一个版本。  本篇文章就是以 linux centos为例讲解Linux下搭建svn服务器 ', '琪哥', 'https://www.sunmale.cn/1.html', '1481389355', '1523514678', '1', '827', '0', '50', '0', '2016-12');
INSERT INTO `sg_article` VALUES ('2', 'Linux下使用Cron定时执行脚本', '1', '<p><span style=\"font-size: 16px; color: rgb(63, 63, 63); font-family: arial, helvetica, sans-serif;\">我是使用 Linux centos7.0讲解的。</span></p><p><span style=\"font-size: 16px; color: rgb(63, 63, 63); font-family: arial, helvetica, sans-serif;\"><br></span></p><p><span style=\"color: rgb(38, 38, 38);\">因为最近公司项目需求 需要写一个脚本每天自动去获取数据。因为php本身的 sleep()函数定时不太好，</span></p><p><br></p><p><span style=\"color: rgb(38, 38, 38);\">所以就用了 Linux系统自带的定时器 cron 。</span></p><p><span style=\"color: rgb(38, 38, 38);\"><br></span></p><p><span style=\"color:#262626\">1.安装cron <span style=\"font-size: 16px;\">&nbsp;#&nbsp;</span></span><span style=\"font-family: 宋体; text-indent: 28px; color: rgb(51, 51, 51); font-size: 16px;\">yum install crontabs</span><span style=\"font-family: 宋体; font-size: 14px; text-indent: 28px; color: rgb(51, 51, 51);\">（</span><span style=\"font-family: 宋体; font-size: 14px; text-indent: 28px; color: rgb(255, 0, 0);\">我执行这一步的时候，提示我已经安装了，不知道啥时候安装的</span><span style=\"font-family: 宋体; font-size: 14px; text-indent: 28px; color: rgb(51, 51, 51);\">）</span></p><p><span style=\"font-family: 宋体; font-size: 14px; text-indent: 28px; color: rgb(51, 51, 51);\"><br></span></p><p><span style=\"font-family: 宋体; text-indent: 28px; color: rgb(51, 51, 51); font-size: 16px;\">2.查看安装目录 &nbsp;which crond &nbsp; 一般会是在 /usr/sbin/crond</span></p><p><span style=\"color: rgb(38, 38, 38); font-family: 宋体; text-indent: 28px;\"><br></span></p><p><span style=\"font-family: 宋体, SimSun;\">3. 使用命令<br></span></p><p><span style=\"font-family: 宋体, SimSun;\"><br></span></p><p><span style=\"font-family: 宋体, SimSun; color: rgb(38, 38, 38);\">&nbsp;/usr/sbin/service crond start &nbsp; //启动服务</span></p><p><span style=\"font-family: 宋体, SimSun; color: rgb(38, 38, 38);\"><br>&nbsp;/usr/sbin/service crond stop &nbsp; //关闭服务</span></p><p><span style=\"font-family: 宋体, SimSun; color: rgb(38, 38, 38);\"><br>&nbsp;/usr/sbin/service crond restart &nbsp; //重启服务</span></p><p><span style=\"font-family: 宋体, SimSun; color: rgb(38, 38, 38);\"><br>&nbsp;/usr/sbin/service crond reload &nbsp; //重新载入配置</span></p><p><span style=\"font-family: 宋体, SimSun; color: rgb(38, 38, 38);\"><br></span></p><p><span style=\"font-family: 宋体, SimSun; color: rgb(38, 38, 38);\">&nbsp;查看crontab服务状态：service crond status</span></p><p><span style=\"font-family: 宋体, SimSun; color: rgb(38, 38, 38);\"><br></span></p><p><span style=\"font-family: 宋体, SimSun; color: rgb(38, 38, 38);\">&nbsp;手动启动crontab服务：service crond start</span></p><p><span style=\"font-family: 宋体, SimSun; color: rgb(38, 38, 38);\"><br></span></p><p><span style=\"font-family: 宋体, SimSun; color: rgb(38, 38, 38);\">&nbsp;查看crontab服务是否已设置为开机启动，执行命令：ntsysv</span></p><p><span style=\"font-family: 宋体, SimSun; color: rgb(38, 38, 38);\"><br></span></p><p><span style=\"font-family: 宋体, SimSun; color: rgb(38, 38, 38);\">&nbsp;在CentOS系统中加入开机自动启动:chkconfig --level 35 crond on</span></p><p><span style=\"font-family: 宋体, SimSun;\"><br></span></p><p><span style=\"font-family: 宋体, SimSun; color: rgb(38, 38, 38);\">&nbsp;CentOS系统 crontab命令</span></p><p><span style=\"font-family: 宋体, SimSun; color: rgb(38, 38, 38);\"><br></span></p><p><span style=\"font-family: 宋体, SimSun; color: rgb(38, 38, 38);\">&nbsp;功能说明：设置计时器。</span></p><p><span style=\"font-family: 宋体, SimSun; color: rgb(38, 38, 38);\"><br></span></p><p><span style=\"font-family: 宋体, SimSun; color: rgb(38, 38, 38);\">&nbsp;语法：crontab [-u &lt;用户名称&gt;][配置文件] 或 crontab [-u &lt;用户名称&gt;][-elr]</span></p><p><span style=\"font-family: 宋体, SimSun; color: rgb(38, 38, 38);\">&nbsp;补充说明：cron是一个常驻服务，它提供计时器的功能，</span></p><p><span style=\"font-family: 宋体, SimSun; color: rgb(38, 38, 38);\">让用户在特定的时间得以执行预设的指令或 程序。只要用户会编辑计时器的配置文件，</span></p><p><span style=\"font-family: 宋体, SimSun; color: rgb(38, 38, 38);\">就可以使 用计时器的功能。其配置文件格式如下：Minute &nbsp;Hour Day Month DayOFWeek Command</span></p><p><span style=\"font-family: 宋体, SimSun; color: rgb(38, 38, 38);\">&nbsp;</span></p><p><span style=\"font-family: 宋体, SimSun; color: rgb(38, 38, 38);\">参数：&nbsp;</span></p><p><span style=\"font-family: 宋体, SimSun; color: rgb(38, 38, 38);\">&nbsp;-e 　编辑该用户的计时器设置。&nbsp;<br>&nbsp;-l 　列出该用户的计时器设置。&nbsp;<br>&nbsp;-r 　删除该用户的计时器设置。&nbsp;<br>&nbsp;-u&lt;用户名称&gt; 　指定要设定计时器的用户名称。</span></p><p><span style=\"font-family: 宋体, SimSun; color: rgb(38, 38, 38);\"><br></span></p><p><span style=\"font-family: 宋体; font-size: 14px; text-indent: 28px; color: rgb(51, 51, 51);\"></span></p><p style=\"font-size: 24px; font-variant-ligatures: normal; orphans: 2; white-space: normal; widows: 2;\"><span style=\"color: rgb(38, 38, 38); font-family: 宋体, SimSun; font-size: 16px;\">4 使用方式</span></p><p style=\"font-size: 24px; font-variant-ligatures: normal; orphans: 2; white-space: normal; widows: 2;\"><span style=\"color:#262626;font-family:宋体, SimSun\"></span></p><p style=\"font-size: 14px; font-variant-ligatures: normal; orphans: 2; white-space: normal; widows: 2; color: rgb(51, 51, 51); font-family: Arial; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 16px; font-family: 宋体, SimSun; color: rgb(38, 38, 38);\">基本格式 :<br>*　　*　　*　　*　　*　　command<br>分　时　日　月　周　命令</span></p><p style=\"font-size: 14px; font-variant-ligatures: normal; orphans: 2; white-space: normal; widows: 2; color: rgb(51, 51, 51); font-family: Arial; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 16px; font-family: 宋体, SimSun; color: rgb(38, 38, 38);\">第1列表示分钟1～59 每分钟用*或者 */1表示<br>第2列表示小时1～23（0表示0点）<br>第3列表示日期1～31<br>第4列表示月份1～12<br>第5列标识号星期0～6（0表示星期天）<br>第6列要运行的命令</span></p><p style=\"font-size: 14px; font-variant-ligatures: normal; orphans: 2; white-space: normal; widows: 2; color: rgb(51, 51, 51); font-family: Arial; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 16px; font-family: 宋体, SimSun; color: rgb(38, 38, 38);\">crontab文件的一些例子：</span></p><p style=\"font-size: 14px; font-variant-ligatures: normal; orphans: 2; white-space: normal; widows: 2; color: rgb(51, 51, 51); font-family: Arial; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 16px; font-family: 宋体, SimSun; color: rgb(38, 38, 38);\">30 21 * * * /usr/local/etc/rc.d/lighttpd restart</span><span style=\"font-size: 16px; font-family: 宋体, SimSun;\"><br>上面的例子表示每晚的21:30重启apache。</span></p><p style=\"font-size: 14px; font-variant-ligatures: normal; orphans: 2; white-space: normal; widows: 2; color: rgb(51, 51, 51); font-family: Arial; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 16px; font-family: 宋体, SimSun;\">45 4 1,10,22 * * /usr/local/etc/rc.d/lighttpd restart<br>上面的例子表示每月1、10、22日的4 : 45重启apache。</span></p><p style=\"font-size: 14px; font-variant-ligatures: normal; orphans: 2; white-space: normal; widows: 2; color: rgb(51, 51, 51); font-family: Arial; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 16px; font-family: 宋体, SimSun;\">10 1 * * 6,0 /usr/local/etc/rc.d/lighttpd restart<br>上面的例子表示每周六、周日的1 : 10重启apache。</span></p><p style=\"font-size: 14px; font-variant-ligatures: normal; orphans: 2; white-space: normal; widows: 2; color: rgb(51, 51, 51); font-family: Arial; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 16px; font-family: 宋体, SimSun;\">0,30 18-23 * * * /usr/local/etc/rc.d/lighttpd restart<br>上面的例子表示在每天18 : 00至23 : 00之间每隔30分钟重启apache。</span></p><p style=\"font-size: 14px; font-variant-ligatures: normal; orphans: 2; white-space: normal; widows: 2; color: rgb(51, 51, 51); font-family: Arial; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 16px; font-family: 宋体, SimSun;\">0 23 * * 6 /usr/local/etc/rc.d/lighttpd restart<br>上面的例子表示每星期六的11 : 00 pm重启apache。</span></p><p style=\"font-size: 14px; font-variant-ligatures: normal; orphans: 2; white-space: normal; widows: 2; color: rgb(51, 51, 51); font-family: Arial; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 16px; font-family: 宋体, SimSun;\">* */1 * * * /usr/local/etc/rc.d/lighttpd restart<br>每一小时重启apache</span></p><p style=\"font-size: 14px; font-variant-ligatures: normal; orphans: 2; white-space: normal; widows: 2; color: rgb(51, 51, 51); font-family: Arial; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 16px; font-family: 宋体, SimSun;\">* 23-7/1 * * * /usr/local/etc/rc.d/lighttpd restart<br>晚上11点到早上7点之间，每隔一小时重启apache</span></p><p style=\"font-size: 14px; font-variant-ligatures: normal; orphans: 2; white-space: normal; widows: 2; color: rgb(51, 51, 51); font-family: Arial; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 16px; font-family: 宋体, SimSun;\">0 11 4 * mon-wed /usr/local/etc/rc.d/lighttpd restart<br>每月的4号与每周一到周三的11点重启apache</span></p><p style=\"font-size: 14px; font-variant-ligatures: normal; orphans: 2; white-space: normal; widows: 2; color: rgb(51, 51, 51); font-family: Arial; background-color: rgb(255, 255, 255);\"><span style=\"font-size: 16px; font-family: 宋体, SimSun;\">0 4 1 jan * /usr/local/etc/rc.d/lighttpd restart<br>一月一号的4点重启apache</span></p><p><span style=\"font-family: 宋体; font-size: 14px; text-indent: 28px; color: rgb(51, 51, 51);\"><br></span><br></p><p><span style=\"font-family: 宋体; font-size: 14px; text-indent: 28px; color: rgb(51, 51, 51);\"><br></span></p><p><span style=\"font-family: 宋体; font-size: 14px; text-indent: 28px; color: rgb(51, 51, 51);\"><br></span></p><p><span style=\"color:#262626\"></span><br></p><p><span style=\"color: rgb(38, 38, 38);\"><br></span></p><p><span style=\"color: rgb(38, 38, 38);\"><br></span></p><p><span style=\"font-size: 16px; color: rgb(63, 63, 63); font-family: arial, helvetica, sans-serif;\"><br></span></p><p><span style=\"font-size: 16px; color: rgb(63, 63, 63); font-family: arial, helvetica, sans-serif;\"><br></span></p><p><br></p>', '1', '30', 'Linux下使用cron定时执行脚本', '晴枫', '', '1481983401', '1508197586', '0', '479', '0', '50', '0', '2016-12');
INSERT INTO `sg_article` VALUES ('3', 'thinkphp5.0使用sqlserver数据库', '3,4', '<p><span style=\"font-size: 18px; font-family: 宋体, SimSun; box-sizing: border-box; margin: 0px; padding: 0px; color: rgb(51, 51, 51); background-color: rgb(255, 255, 255);\"><span style=\"font-family: &quot;Helvetica Neue&quot;, Helvetica, &quot;PingFang SC&quot;, 微软雅黑, Tahoma, Arial, sans-serif; font-size: 14px;\">1.首先打开ThinkPHP5的数据库配置文件，将数据库连接信息修改如下：</span>&nbsp;&nbsp;</span></p><pre><code>    \'type\'            =&gt; \'Sqlsrv\',\n    // 服务器地址\n    \'hostname\'        =&gt; \'localhost\',\n    // 数据库名\n    \'database\'        =&gt; \'\',\n    // 用户名\n    \'username\'        =&gt; \'sa\',\n    // 密码\n    \'password\'        =&gt; \'sa\',\n    // 端口\n    \'hostport\'        =&gt; \'1433\',</code></pre><p><span style=\"font-size: 18px; font-family: 宋体, SimSun; color: rgb(51, 51, 51);\"></span></p><p>上面的type类型必须改为Sqlsrv。 &nbsp;<br></p><p><br></p><p>2.下载windows提供的php支持sqlserver数据库的扩展，下载地址如下。&nbsp;&nbsp;<span style=\"color: rgb(51, 51, 51); font-family: 宋体, SimSun; font-size: 18px; background-color: rgb(255, 255, 255);\"><br></span></p><p><a href=\"https://www.microsoft.com/en-us/download/details.aspx?id=20098\">https://www.microsoft.com/en-us/download/details.aspx?id=20098</a>&nbsp;&nbsp;<br></p><p>下载跟php版本相对应的驱动版本。 &nbsp;</p><table border=\"0\" width=\"100%\" cellpadding=\"0\" cellspacing=\"0\"><tbody><tr><th>Microsoft PHP 驱动程序版本&nbsp;&nbsp;&nbsp;</th><th>PHP 版本&nbsp;&nbsp;&nbsp;</th></tr><tr><td>&nbsp;\n\n3.2</td><td>&nbsp;\n\n5.6、5.5 和 5.4</td></tr><tr><td>&nbsp;\n\n3.1</td><td>&nbsp;5.5和5.4</td></tr><tr><td>&nbsp;\n\n3.0</td><td>&nbsp;5.4</td></tr></tbody></table><p>现在4.0支持的php版本是7.0以上了。&nbsp;&nbsp;<br></p><p><br></p><p>3.下载后安装解压到某个目录下，分别是不同版本的的驱动库。 &nbsp; &nbsp;把你需要的扩展放在php版本的扩展中。（也就是php目录的 ext文件下） &nbsp;</p><p><br></p><p>4.打开php安装目录中的php.ini，来到extension扩展库区，向里面加入如下内容，因为我的php版本是5.6。大家根据自己的版本进行修改即可。 &nbsp;<br></p><p>&nbsp; &nbsp; &nbsp;extension=php_sqlsrv_56_nts.dll &nbsp;<br></p><p>&nbsp; &nbsp; extension=php_pdo_sqlsrv_56_nts.dll&nbsp;&nbsp;<br></p><p>这个时候使用php的 phpinfo()方法就能看到添加的扩展已经出现了，如果没有显示，说明配置错误，检查下自己的php版本跟操作系统。&nbsp;&nbsp;<br></p><p><br></p><p>4.第一次连接sqlserver可能会提示odbc有问题&nbsp;，网上的解决方法有很多，百度一下就可以。最简单的方法可以去下载一个sqlserver odbc驱动源，安装即可。这里没办法演示，只能遇到自己解决，我把sqlserver odbc的下载地址提供在下面。下载安装就行了。 &nbsp; &nbsp;&nbsp;<a href=\"https://www.microsoft.com/zh-cn/download/details.aspx?id=36434\">https://www.microsoft.com/zh-cn/download/details.aspx?id=36434</a>&nbsp;&nbsp;</p><p><br></p><p>5.最后直接连接使用个最简单的操作测试是否成功就行了，测试代码如下。 &nbsp;<br></p><pre><code>public function  test(){\n       $user =   Db::table(\'Test\')-&gt;select();\n       print_r($user);\n     }</code></pre><p><br></p><p>注意 &nbsp;： &nbsp;使用thinkphp5连接sqlserver数据库只能使用windows服务器。使用过程中发现只能使用 &nbsp;Db::table(\'完整表名\') &nbsp;进行数据库操作或者直接自己写原生sql语句。 &nbsp; 模型操作跟 Db::name(\'不带前缀表‘) 会出现错误。 测试使用的thinkphp5.0.4版本。</p><p><br></p>', '2', '24', 'PHP+MySQL是天生的好搭档，在ThinkPHP中，我们也是通过配置直接连上MySQL，使用起来非常便捷，近日遇到了ThinkPHP连接SQL Server的问题，而如何使用ThinkPHP连接SQL Server已是老生常谈，查了网上很多资料都不适合，最后整合了多方资料，终于弄好了，下面是具体的方法，这里使用的是phpStudy，PHP版本选择的是PHP5.6nts版本。', '琪哥', 'https://www.sunmale.cn/', '1487839960', '1524030997', '1', '397', '0', '50', '0', '2017-02');
INSERT INTO `sg_article` VALUES ('5', '网站改版上线啦！旧时光博客V3.0', '3', '<p>&nbsp; &nbsp; 旧时光博客经过一段时间的沉淀后终于推出了第三个版本。这个版本融合了上个版本的一些样式。至于现在对这个版本还是挺满意的。以后就不知道了。因为琪哥是个追求完美的人，不允许自己项目有瑕疵，要做就做最好的。不然就不要去做。浪费时间，浪费精力。<br></p><p>&nbsp; &nbsp; 目前经手的一个项目。一个人负责整个后台的架构设计，还有数据库，带编码，全部一个人去搞。很累，再加上生活中的琐事，搞的我精疲力尽。有时候文章也来不及更新。<br></p><p>&nbsp; &nbsp; 做博客就是一个坚持的过程，坚持下去就是胜利。我呢不光写技术文章，还会写一些生活中的琐事，及美丽的风景。其实本人心中有一个愿望，那就是每年抽个时间去旅游一圈，大概为期两个星期。争取在有生之年走遍祖国的大好河山。想要实现这个梦想，就要去努力工作了。<br></p><p>&nbsp; &nbsp; 工作要做，梦想也不能丢。<br></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 旧时光博客创始人：琪哥<br></p><p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2018.04.09<br></p>', '1', '19', '旧时光博客V3.0版本于2018年4月9号改版上线。感谢晴枫博客，本博客融合了晴枫博客和时光博客V2.0版本而成。', '琪哥', '', '1523285710', '1524229103', '1', '188', '0', '50', '0', '2018-04');

-- ----------------------------
-- Table structure for sg_article_tag
-- ----------------------------
DROP TABLE IF EXISTS `sg_article_tag`;
CREATE TABLE `sg_article_tag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  `css` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of sg_article_tag
-- ----------------------------
INSERT INTO `sg_article_tag` VALUES ('1', 'Linux', '1', null, null, 'layui-bg-orange');
INSERT INTO `sg_article_tag` VALUES ('2', 'svn', '1', null, null, 'layui-badge');
INSERT INTO `sg_article_tag` VALUES ('3', 'tp5', '1', null, null, 'layui-bg-blue');
INSERT INTO `sg_article_tag` VALUES ('4', 'sqlserver', '1', null, null, 'layui-bg-black');
INSERT INTO `sg_article_tag` VALUES ('5', '快捷登录', '1', null, null, 'layui-badge');
INSERT INTO `sg_article_tag` VALUES ('6', 'redis', '1', null, null, 'layui-bg-orange');
INSERT INTO `sg_article_tag` VALUES ('7', 'lnmp', '1', null, null, 'layui-bg-black');
INSERT INTO `sg_article_tag` VALUES ('8', 'nginx', '1', null, null, 'layui-bg-blue');
INSERT INTO `sg_article_tag` VALUES ('9', 'mysql', '1', null, null, 'layui-bg-orange');

-- ----------------------------
-- Table structure for sg_article_type
-- ----------------------------
DROP TABLE IF EXISTS `sg_article_type`;
CREATE TABLE `sg_article_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pid` int(5) NOT NULL DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '1',
  `create_time` int(20) DEFAULT NULL,
  `update_time` int(20) DEFAULT NULL,
  `sort` int(11) DEFAULT NULL,
  `remark` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of sg_article_type
-- ----------------------------
INSERT INTO `sg_article_type` VALUES ('12', '编程', null, '0', '1', '1479440963', '1505731718', '0', '日常遇到的程序技术');
INSERT INTO `sg_article_type` VALUES ('13', '生活', null, '0', '1', '1479441239', '1505731444', '10', '生活的记录1');
INSERT INTO `sg_article_type` VALUES ('18', '心情', null, '13', '1', '1479441317', '1505731670', '0', '');
INSERT INTO `sg_article_type` VALUES ('19', '随笔', null, '13', '1', '1479441327', null, null, '');
INSERT INTO `sg_article_type` VALUES ('20', '摄影', null, '13', '1', '1479441342', '1505731686', '20', '生活');
INSERT INTO `sg_article_type` VALUES ('24', 'PHP', null, '12', '1', '1479458575', '1505731604', '0', 'PHP的文章类容');
INSERT INTO `sg_article_type` VALUES ('25', '数据库', null, '12', '1', '1479458613', '1508327122', '20', '数据库的文章');
INSERT INTO `sg_article_type` VALUES ('27', '前端', null, '12', '1', '1479779792', '1508327183', '30', '前端js结束');
INSERT INTO `sg_article_type` VALUES ('30', 'Linux', null, '12', '1', '1480922965', '1505731654', '40', 'Linux操作系统方面的知识');

-- ----------------------------
-- Table structure for sg_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `sg_auth_group`;
CREATE TABLE `sg_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  `create_time` int(11) DEFAULT NULL,
  `update_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sg_auth_group
-- ----------------------------
INSERT INTO `sg_auth_group` VALUES ('101', '访问者', '1', '110,111,125,126,127,112,128,129,130,108,109,131,132,133', '1523506007', '1523506057');

-- ----------------------------
-- Table structure for sg_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `sg_auth_group_access`;
CREATE TABLE `sg_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sg_auth_group_access
-- ----------------------------
INSERT INTO `sg_auth_group_access` VALUES ('51', '101');
INSERT INTO `sg_auth_group_access` VALUES ('52', '101');
INSERT INTO `sg_auth_group_access` VALUES ('53', '101');
INSERT INTO `sg_auth_group_access` VALUES ('54', '101');
INSERT INTO `sg_auth_group_access` VALUES ('55', '101');
INSERT INTO `sg_auth_group_access` VALUES ('56', '101');
INSERT INTO `sg_auth_group_access` VALUES ('57', '101');
INSERT INTO `sg_auth_group_access` VALUES ('59', '101');
INSERT INTO `sg_auth_group_access` VALUES ('61', '101');
INSERT INTO `sg_auth_group_access` VALUES ('63', '101');
INSERT INTO `sg_auth_group_access` VALUES ('64', '101');

-- ----------------------------
-- Table structure for sg_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `sg_auth_rule`;
CREATE TABLE `sg_auth_rule` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `css` varchar(20) NOT NULL COMMENT '样式',
  `condition` char(100) NOT NULL,
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父栏目ID',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `create_time` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(11) DEFAULT NULL,
  `remark` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=139 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sg_auth_rule
-- ----------------------------
INSERT INTO `sg_auth_rule` VALUES ('103', '#', '系统管理', '1', '1', '&#xe620;', '', '0', '0', '1505303639', '1505303639', '系统管理');
INSERT INTO `sg_auth_rule` VALUES ('104', '#', '权限管理', '1', '1', '&#xe631;', '', '0', '10', '1505303666', '1505303666', '权限管理');
INSERT INTO `sg_auth_rule` VALUES ('105', 'admin/Admin/index', '用户管理', '1', '1', '&#xe612;', '', '104', '0', '1505303858', '1505303858', '用户管理');
INSERT INTO `sg_auth_rule` VALUES ('106', 'admin/Group/index', '用户组管理', '1', '1', '&#xe613;', '', '104', '10', '1505303892', '1505303892', '用户组管理');
INSERT INTO `sg_auth_rule` VALUES ('107', 'admin/Rule/index', '菜单管理', '1', '1', '&#xe671;', '', '104', '20', '1505303916', '1505303916', '菜单管理');
INSERT INTO `sg_auth_rule` VALUES ('108', '#', '微语管理', '1', '1', '', '', '0', '100', '1505313545', '1505313686', '微语管理');
INSERT INTO `sg_auth_rule` VALUES ('109', 'admin/said/index', '我的微语言', '1', '1', '', '', '108', '0', '1505313673', '1505572104', '我的微语言');
INSERT INTO `sg_auth_rule` VALUES ('110', '#', '文章管理', '1', '1', '&#xe705;', '', '0', '30', '1505379698', '1505379698', '文章管理');
INSERT INTO `sg_auth_rule` VALUES ('111', 'admin/Articletype/index', '文章分类', '1', '1', '&#xe62a;', '', '110', '0', '1505379931', '1505379931', '文章分类');
INSERT INTO `sg_auth_rule` VALUES ('112', 'admin/Article/index', '文章列表', '1', '1', '', '', '110', '10', '1505807869', '1505808557', '文章列表');
INSERT INTO `sg_auth_rule` VALUES ('113', 'admin/System/index', '网站设置', '1', '1', '', '', '103', '0', '1506410839', '1506430547', '网站基本设置');
INSERT INTO `sg_auth_rule` VALUES ('114', 'admin/System/add_base', '添加基本配置', '1', '1', '', '', '113', '0', '1508985329', '1508985329', '添加基本配置');
INSERT INTO `sg_auth_rule` VALUES ('115', 'admin/Admin/add', '新增用户', '1', '1', '', '', '105', '0', '1508985396', '1508985396', '新增管理用户');
INSERT INTO `sg_auth_rule` VALUES ('116', 'admin/Admin/edit', '修改用户', '1', '1', '', '', '105', '10', '1508985447', '1508985447', '修改用户信息');
INSERT INTO `sg_auth_rule` VALUES ('117', 'admin/Admin/delete', '删除用户', '1', '1', '', '', '105', '20', '1508985468', '1508985468', '删除用户信息');
INSERT INTO `sg_auth_rule` VALUES ('118', 'admin/Group/add', '新增用户组', '1', '1', '', '', '106', '0', '1508985525', '1508985525', '新增用户组');
INSERT INTO `sg_auth_rule` VALUES ('119', 'admin/Group/edit', '修改用户组', '1', '1', '', '', '106', '10', '1508985550', '1508985550', '修改用户组');
INSERT INTO `sg_auth_rule` VALUES ('120', 'admin/Group/delete', '删除用户组', '1', '1', '', '', '106', '20', '1508985582', '1508985582', '删除用户组');
INSERT INTO `sg_auth_rule` VALUES ('121', 'admin/Group/rule_group', '分配用户组权限', '1', '1', '', '', '106', '30', '1508985652', '1508985652', '分配用户组权限');
INSERT INTO `sg_auth_rule` VALUES ('122', 'admin/Rule/add', '新增功能菜单', '1', '1', '', '', '107', '0', '1508985704', '1508985704', '新增功能菜单');
INSERT INTO `sg_auth_rule` VALUES ('123', 'admin/Rule/edit', '修改功能菜单', '1', '1', '', '', '107', '10', '1508985726', '1508985726', '修改功能菜单');
INSERT INTO `sg_auth_rule` VALUES ('124', 'admin/Rule/delete', '删除功能菜单', '1', '1', '', '', '107', '30', '1508985759', '1508985772', '删除功能菜单');
INSERT INTO `sg_auth_rule` VALUES ('125', 'admin/Articletype/add', '新增文章分类', '1', '1', '', '', '111', '0', '1508986744', '1508986744', '新增文章分类');
INSERT INTO `sg_auth_rule` VALUES ('126', 'admin/Articletype/edit', '修改文章分类', '1', '1', '', '', '111', '10', '1508986766', '1508986766', '修改文章分类');
INSERT INTO `sg_auth_rule` VALUES ('127', 'admin/Articletype/delete', '删除文章分类', '1', '1', '', '', '111', '20', '1508986786', '1508986786', '删除文章分类');
INSERT INTO `sg_auth_rule` VALUES ('128', 'admin/Article/add', '新增文章', '1', '1', '', '', '112', '0', '1508986839', '1508986839', '新增文章');
INSERT INTO `sg_auth_rule` VALUES ('129', 'admin/Article/edit', '修改文章', '1', '1', '', '', '112', '10', '1508986857', '1508986857', '修改文章');
INSERT INTO `sg_auth_rule` VALUES ('130', 'admin/Article/delete', '删除文章', '1', '1', '', '', '112', '20', '1508986877', '1508986877', '删除文章');
INSERT INTO `sg_auth_rule` VALUES ('131', 'admin/said/add', '新增我的微语', '1', '1', '', '', '109', '0', '1508986925', '1508986925', '新增我的微语');
INSERT INTO `sg_auth_rule` VALUES ('132', 'admin/said/edit', '修改我的微语言', '1', '1', '', '', '109', '10', '1508986948', '1508986948', '修改我的微语言');
INSERT INTO `sg_auth_rule` VALUES ('133', 'admin/said/delete', '删除我的微语', '1', '1', '', '', '109', '20', '1508986974', '1508986974', '删除我的微语');
INSERT INTO `sg_auth_rule` VALUES ('134', 'admin/Admin/updatepassword', '修改密码', '1', '1', '', '', '106', '40', '1508991273', '1508991273', '修改密码');
INSERT INTO `sg_auth_rule` VALUES ('135', 'admin/banner/index', '轮播图管理', '1', '1', '', '', '0', '22', '1524035563', '1524035805', '轮播图管理');
INSERT INTO `sg_auth_rule` VALUES ('136', 'admin/banner/index', '轮播图列表', '1', '1', '&#xe634;', '', '135', '0', '1524035627', '1524035627', '');
INSERT INTO `sg_auth_rule` VALUES ('137', 'admin/notice/index', '网站通告', '1', '1', '&#xe645;', '', '0', '99', '1524229246', '1524229246', '');
INSERT INTO `sg_auth_rule` VALUES ('138', 'admin/notice/index', '通知列表', '1', '1', '&#xe645;', '', '137', '98', '1524229293', '1524229293', '');

-- ----------------------------
-- Table structure for sg_banner
-- ----------------------------
DROP TABLE IF EXISTS `sg_banner`;
CREATE TABLE `sg_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `ban_img` varchar(128) DEFAULT NULL COMMENT '图片地址',
  `ban_view` tinyint(2) DEFAULT '0' COMMENT '是否显示 1显示2不显示',
  `ban_title` varchar(128) DEFAULT NULL COMMENT '描述/标题',
  `ban_createtime` datetime DEFAULT NULL COMMENT '添加时间',
  `ban_edittime` datetime DEFAULT NULL COMMENT '修改时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='banner图';

-- ----------------------------
-- Records of sg_banner
-- ----------------------------
INSERT INTO `sg_banner` VALUES ('1', '/uploads/1524207553661.jpg', '2', '大上海', '2018-04-20 14:59:31', '2018-04-20 15:25:15');
INSERT INTO `sg_banner` VALUES ('2', '/uploads/1524207627852.png', '1', '不平凡的你', '2018-04-20 15:00:40', '2018-04-20 15:00:40');

-- ----------------------------
-- Table structure for sg_message
-- ----------------------------
DROP TABLE IF EXISTS `sg_message`;
CREATE TABLE `sg_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `nickname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` mediumtext COLLATE utf8mb4_unicode_ci,
  `os` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_time` int(20) DEFAULT NULL,
  `pid` int(11) DEFAULT '0',
  `headurl` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` int(1) DEFAULT NULL COMMENT '1.留言。2,文章评论',
  `article_id` int(11) DEFAULT NULL COMMENT '文章自增ID,外键',
  `status` int(1) DEFAULT '1',
  `reply_nickname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reply_id` int(11) DEFAULT NULL COMMENT '回复人的Id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of sg_message
-- ----------------------------
INSERT INTO `sg_message` VALUES ('22', '5', '默〃', '河南省商丘市', '223.89.149.171', null, '第一条留言奥。', 'Win 10', '1523364722', '0', 'http://thirdqq.qlogo.cn/qqapp/101463996/F6A57D837C769242681E1AA8E021D96E/40', '1', null, '1', null, null);
INSERT INTO `sg_message` VALUES ('23', '6', 'Herman', '湖北省十堰市', '111.173.71.123', null, '11111', 'Win 10', '1523406049', '0', 'http://thirdqq.qlogo.cn/qqapp/101463996/FCD3FBD422FE91744A32CFA407D540FE/40', '2', '4', '1', null, null);
INSERT INTO `sg_message` VALUES ('24', '6', 'Herman', '湖北省十堰市', '111.173.71.123', null, '5555', 'Win 10', '1523406058', '0', 'http://thirdqq.qlogo.cn/qqapp/101463996/FCD3FBD422FE91744A32CFA407D540FE/40', '2', '4', '1', null, null);
INSERT INTO `sg_message` VALUES ('25', '6', 'Herman', '湖北省十堰市', '111.173.71.123', null, '888888', 'Win 10', '1523406068', '0', 'http://thirdqq.qlogo.cn/qqapp/101463996/FCD3FBD422FE91744A32CFA407D540FE/40', '2', '4', '1', null, null);
INSERT INTO `sg_message` VALUES ('26', '6', 'Herman', '湖北省十堰市', '111.173.71.123', null, '9999', 'Win 10', '1523406077', '0', 'http://thirdqq.qlogo.cn/qqapp/101463996/FCD3FBD422FE91744A32CFA407D540FE/40', '2', '4', '1', null, null);
INSERT INTO `sg_message` VALUES ('27', '6', 'Herman', '湖北省十堰市', '111.173.71.123', null, '1111', 'Win 10', '1523406089', '0', 'http://thirdqq.qlogo.cn/qqapp/101463996/FCD3FBD422FE91744A32CFA407D540FE/40', '2', '4', '1', null, null);
INSERT INTO `sg_message` VALUES ('28', '6', 'Herman', '湖北省十堰市', '111.173.71.123', null, '@<a href=\"javascript:;\" class=\"fly-aite\">Herman</a> 11111', 'Win 10', '1523406103', '25', 'http://thirdqq.qlogo.cn/qqapp/101463996/FCD3FBD422FE91744A32CFA407D540FE/40', '2', '4', '1', 'Herman ', '25');
INSERT INTO `sg_message` VALUES ('29', '6', 'Herman', '湖北省十堰市', '111.173.71.123', null, '@<a href=\"javascript:;\" class=\"fly-aite\">Herman</a> 11111', 'Win 10', '1523406115', '25', 'http://thirdqq.qlogo.cn/qqapp/101463996/FCD3FBD422FE91744A32CFA407D540FE/40', '2', '4', '1', 'Herman', '28');
INSERT INTO `sg_message` VALUES ('30', '6', 'Herman', '湖北省十堰市', '111.173.71.123', null, '@<a href=\"javascript:;\" class=\"fly-aite\">Herman</a> 22222', 'Win 10', '1523406132', '25', 'http://thirdqq.qlogo.cn/qqapp/101463996/FCD3FBD422FE91744A32CFA407D540FE/40', '2', '4', '1', 'Herman', '28');
INSERT INTO `sg_message` VALUES ('31', '7', '^牟ヽ小爷', '江苏省南京市', '117.89.214.32', null, '大兄弟   博客后台用什么框架写的？', 'Win 10', '1523412644', '0', 'http://thirdqq.qlogo.cn/qqapp/101463996/96F5E8E27FAE558905DA84B3FCBE98BA/40', '1', null, '1', null, null);
INSERT INTO `sg_message` VALUES ('32', '5', '默〃', '河南省商丘市', '223.89.190.140', null, '@<a href=\"javascript:;\" class=\"fly-aite\">^牟ヽ小爷</a> 基于TP5开发的，后台功能还没开发完', 'Win 7', '1523440165', '31', 'http://thirdqq.qlogo.cn/qqapp/101463996/F6A57D837C769242681E1AA8E021D96E/40', '1', null, '1', '^牟ヽ小爷 ', '31');
INSERT INTO `sg_message` VALUES ('33', '9', '謓dêシ累了', '北京市', '203.93.23.4', null, '<img alt=\"[嘻嘻]\" title=\"[嘻嘻]\" src=\"http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/0b/tootha_thumb.gif\">', 'Win 7', '1523510703', '0', 'http://thirdqq.qlogo.cn/qqapp/101463996/A027F5B90BCD3391C153DC413028AD34/40', '1', null, '1', null, null);
INSERT INTO `sg_message` VALUES ('34', '9', '謓dêシ累了', '北京市', '203.93.23.4', null, '<img alt=\"[晕]\" title=\"[晕]\" src=\"http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d9/dizzya_thumb.gif\">', 'Win 7', '1523510721', '0', 'http://thirdqq.qlogo.cn/qqapp/101463996/A027F5B90BCD3391C153DC413028AD34/40', '1', null, '1', null, null);
INSERT INTO `sg_message` VALUES ('35', '9', '謓dêシ累了', '北京市', '203.93.23.4', null, '<img alt=\"[晕]\" title=\"[晕]\" src=\"http://img.t.sinajs.cn/t4/appstyle/expression/ext/normal/d9/dizzya_thumb.gif\">', 'Win 7', '1523510721', '0', 'http://thirdqq.qlogo.cn/qqapp/101463996/A027F5B90BCD3391C153DC413028AD34/40', '1', null, '1', null, null);
INSERT INTO `sg_message` VALUES ('36', '9', '謓dêシ累了', '北京市', '203.93.23.4', null, '1121212', 'Win 7', '1523511230', '0', 'http://thirdqq.qlogo.cn/qqapp/101463996/A027F5B90BCD3391C153DC413028AD34/40', '1', null, '1', null, null);
INSERT INTO `sg_message` VALUES ('37', '9', '謓dêシ累了', '北京市', '203.93.23.4', null, '死死死死死死死死死', 'Win 7', '1523511241', '0', 'http://thirdqq.qlogo.cn/qqapp/101463996/A027F5B90BCD3391C153DC413028AD34/40', '1', null, '1', null, null);
INSERT INTO `sg_message` VALUES ('38', '9', '謓dêシ累了', '北京市', '203.93.23.4', null, '111', 'Win 7', '1523511391', '0', 'http://thirdqq.qlogo.cn/qqapp/101463996/A027F5B90BCD3391C153DC413028AD34/40', '1', null, '1', null, null);
INSERT INTO `sg_message` VALUES ('39', '9', '謓dêシ累了', '北京市', '203.93.23.4', null, '111', 'Win 7', '1523511413', '0', 'http://thirdqq.qlogo.cn/qqapp/101463996/A027F5B90BCD3391C153DC413028AD34/40', '1', null, '1', null, null);
INSERT INTO `sg_message` VALUES ('40', '9', '謓dêシ累了', '北京市', '203.93.23.4', null, '111', 'Win 7', '1523511480', '0', 'http://thirdqq.qlogo.cn/qqapp/101463996/A027F5B90BCD3391C153DC413028AD34/40', '1', null, '1', null, null);
INSERT INTO `sg_message` VALUES ('41', '9', '謓dêシ累了', '北京市', '203.93.23.4', null, '1', 'Win 7', '1523511639', '0', 'http://thirdqq.qlogo.cn/qqapp/101463996/A027F5B90BCD3391C153DC413028AD34/40', '1', null, '1', null, null);

-- ----------------------------
-- Table structure for sg_said
-- ----------------------------
DROP TABLE IF EXISTS `sg_said`;
CREATE TABLE `sg_said` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_time` int(20) DEFAULT NULL,
  `update_time` int(20) DEFAULT NULL,
  `os` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `zan` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of sg_said
-- ----------------------------
INSERT INTO `sg_said` VALUES ('2', '2018年4月10号，我的出生似乎有点不太完美，不过还好发现的及时，修复了登录，随便增添了第三方快捷登录。<img src=\"https://www.zqfirst.top/static/common/layui/images/face/1.gif\" alt=\"[嘻嘻]\">', '1523365062', '1523365062', 'Win 10', '河南省商丘市', '223.89.149.171', '1', '0');
INSERT INTO `sg_said` VALUES ('3', '2018年4月20号网站数据库遭到破坏,所有数据均被删除，无奈！从新从本地导入新的数据库。槽糕的一天。', '1524207524', '1524207524', 'Win 10', '本地', '127.0.0.1', '1', '0');

-- ----------------------------
-- Table structure for sg_system
-- ----------------------------
DROP TABLE IF EXISTS `sg_system`;
CREATE TABLE `sg_system` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `system_type` varchar(50) NOT NULL COMMENT '博客设置的名称',
  `sys_name` varchar(128) NOT NULL COMMENT '网站名称',
  `sys_icp` varchar(32) NOT NULL COMMENT '备案',
  `sys_copy` varchar(128) NOT NULL COMMENT '版权',
  `sys_footer` text NOT NULL COMMENT '统计',
  `footer_text` varchar(255) NOT NULL COMMENT '底部励志文字',
  `title` varchar(255) DEFAULT NULL COMMENT 'seo',
  `description` varchar(255) DEFAULT NULL COMMENT 'seo',
  `keywords` varchar(255) DEFAULT NULL COMMENT 'seo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='系统基本表';

-- ----------------------------
-- Records of sg_system
-- ----------------------------
INSERT INTO `sg_system` VALUES ('1', '网站设置', '旧时光博客', '京ICP备17046230号-2', '© 2016 - 2018 旧时光', '<script>\nvar _hmt = _hmt || [];\n(function() {\n  var hm = document.createElement(\"script\");\n  hm.src = \"https://hm.baidu.com/hm.js?ebde62a3c8d8ba0c9aa5007b88c9b6d0\";\n  var s = document.getElementsByTagName(\"script\")[0]; \n  s.parentNode.insertBefore(hm, s);\n})();\n</script>         ', '三更灯火五更鸡，正是男儿读书时，黑发不知勤学早，白发方悔读书迟。', null, null, null);
INSERT INTO `sg_system` VALUES ('3', 'SEO设置', '', '', '', '', '', '旧时光博客', '一个90后phper的个人博客', '旧时光，技术 博客，个人技术博客');

-- ----------------------------
-- Table structure for sg_tip
-- ----------------------------
DROP TABLE IF EXISTS `sg_tip`;
CREATE TABLE `sg_tip` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `content` text COMMENT '提示文字',
  `create_time` int(20) DEFAULT NULL COMMENT '添加时间',
  `tip_status` tinyint(3) DEFAULT '0' COMMENT '是否显示 0显示 1不显示',
  `tip_os` varchar(50) DEFAULT NULL COMMENT '发布设备',
  `tip_address` varchar(100) DEFAULT NULL COMMENT '发布地址',
  `update_time` int(20) DEFAULT NULL COMMENT '修改时间',
  `ip` varchar(255) DEFAULT NULL COMMENT '使用者ip',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sg_tip
-- ----------------------------
INSERT INTO `sg_tip` VALUES ('2', '欢迎光临旧时光博客系统', '1524234622', '1', 'Win 10', '本地', '1524234622', '127.0.0.1');

-- ----------------------------
-- Table structure for sg_user
-- ----------------------------
DROP TABLE IF EXISTS `sg_user`;
CREATE TABLE `sg_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nickname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `headurl` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `ip` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_time` int(20) DEFAULT NULL,
  `update_time` int(20) DEFAULT NULL,
  `is_active` int(2) DEFAULT '1',
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qq_openid` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wx_openid` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of sg_user
-- ----------------------------
INSERT INTO `sg_user` VALUES ('1', '942846103@qq.com', 'e807f1fcf82d132f9bb018ca6738a19f', 'ewe', 'http://blog.tunnel.51lzyl.com/static/common/images/face/3.jpg', '1', null, null, '1523326776', '1523326776', '0', '942846103@qq.com', null, null);
INSERT INTO `sg_user` VALUES ('2', '15751155335@163.com', '0e256e49265d2f83e8a4a509d48b065e', 'ONE源码', 'http://blog.tunnel.51lzyl.com/static/common/images/face/5.jpg', '1', null, null, '1523336700', '1523363640', '1', '15751155335@163.com', null, null);
INSERT INTO `sg_user` VALUES ('4', 'ac@qq.com', '0bf2400c6d0cfd49ec5ebd8577d52e02', 'ac@qq.com', 'http://blog.tunnel.51lzyl.com/static/common/images/face/5.jpg', '1', null, null, '1523338794', '1523338794', '0', 'ac@qq.com', null, null);
INSERT INTO `sg_user` VALUES ('5', null, null, '默〃', 'http://thirdqq.qlogo.cn/qqapp/101463996/F6A57D837C769242681E1AA8E021D96E/40', '1', null, null, '1523364688', '1523364688', '0', null, 'F6A57D837C769242681E1AA8E021D96E', null);
INSERT INTO `sg_user` VALUES ('6', null, null, 'Herman', 'http://thirdqq.qlogo.cn/qqapp/101463996/FCD3FBD422FE91744A32CFA407D540FE/40', '1', null, null, '1523406029', '1523406029', '0', null, 'FCD3FBD422FE91744A32CFA407D540FE', null);
INSERT INTO `sg_user` VALUES ('7', null, null, '^牟ヽ小爷', 'http://thirdqq.qlogo.cn/qqapp/101463996/96F5E8E27FAE558905DA84B3FCBE98BA/40', '1', null, null, '1523412619', '1523412619', '0', null, '96F5E8E27FAE558905DA84B3FCBE98BA', null);
INSERT INTO `sg_user` VALUES ('8', null, null, '空空兄', 'http://thirdqq.qlogo.cn/qqapp/101463996/297B3E2167253CC6D762473A47723F7A/40', '1', null, null, '1523414317', '1523414317', '0', null, '297B3E2167253CC6D762473A47723F7A', null);
INSERT INTO `sg_user` VALUES ('9', null, null, '謓dêシ累了', 'http://thirdqq.qlogo.cn/qqapp/101463996/A027F5B90BCD3391C153DC413028AD34/40', '1', null, null, '1523510626', '1523510626', '0', null, 'A027F5B90BCD3391C153DC413028AD34', null);
INSERT INTO `sg_user` VALUES ('12', '1040657944@qq.com', 'e10adc3949ba59abbe56e057f20f883e', 'zq', 'http://www.ceshi.com/static/common/images/face/0.jpg', '1', null, null, '1523590737', '1523590737', '1', '1040657944@qq.com', null, null);

-- ----------------------------
-- Table structure for sg_zan
-- ----------------------------
DROP TABLE IF EXISTS `sg_zan`;
CREATE TABLE `sg_zan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `os` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_time` int(11) NOT NULL,
  `message_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `FK_messageid` (`message_id`),
  CONSTRAINT `sg_zan_ibfk_1` FOREIGN KEY (`message_id`) REFERENCES `sg_message` (`id`),
  CONSTRAINT `sg_zan_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `sg_user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of sg_zan
-- ----------------------------
