-- MySQL dump 10.13  Distrib 5.5.28, for Linux (i686)
--
-- Host: localhost    Database: blog
-- ------------------------------------------------------
-- Server version	5.5.28-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `b_article`
--

DROP TABLE IF EXISTS `b_article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b_article` (
  `no` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(40) NOT NULL,
  `content` text,
  `excerpt` varchar(100) DEFAULT NULL,
  `user_id` int(5) NOT NULL,
  `category_id` int(2) DEFAULT NULL,
  `tag` varchar(50) DEFAULT NULL,
  `post_type` int(2) NOT NULL,
  `create_date` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `hit_count` int(5) DEFAULT NULL,
  `vote` int(10) DEFAULT '0',
  `rank` int(10) DEFAULT '0',
  PRIMARY KEY (`no`)
) ENGINE=MyISAM AUTO_INCREMENT=69 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b_article`
--

LOCK TABLES `b_article` WRITE;
/*!40000 ALTER TABLE `b_article` DISABLE KEYS */;
INSERT INTO `b_article` VALUES (48,'Hello!1111','这是一篇初始文章！111111','',1,1,'Blog',4,'2014-05-15 22:47:19',0,0,0,0),(49,'测试文章1','<p>\r\n	时间过的好快，感觉昨天才写的三月份总结啊，今天居然就又不是月末了，真是光阴似箭啊。\r\n</p>\r\n<p>\r\n	这个月花了好多好多钱，因为是到深圳，找了房子，放后购买各种生活用品，厨具是一比相当大的花销，购置了各种锅，还有餐具，烤箱等。自己的生活气息真是越来越浓厚了。\r\n</p>\r\n<p>\r\n	随着厨具什么的到位，自己的朋友圈也越来越丰富了，欢迎大家加我私人微信号啊coderfa，我还是蛮喜欢聊天的，前提是有共同语言~\r\n</p>','',1,1,'测试1,测试2,测试',4,'2014-05-17 22:57:10',0,0,0,0),(50,'测试文章13','时间过的好快，感觉昨天才写的三月份总结啊，今天居然就又不是月末了，真是光阴似箭啊。<br />\r\n这个月花了好多好多钱，因为是到深圳，找了房子，放后购买各种生活用品，厨具是一比相当大的花销，购置了各种锅，还有餐具，烤箱等。自己的生活气息真是越来越浓厚了。<br />\r\n随着厨具什么的到位，自己的朋友圈也越来越丰富了，欢迎大家加我私人微信号啊coderfa，我还是蛮喜欢聊天的，前提是有共同语言~<br />','',1,1,'测试1,测试2,测试',4,'2014-05-17 22:57:36',0,0,0,0),(51,'测试文章3','时间过的好快，感觉昨天才写的三月份总结啊，今天居然就又不是月末了，真是光阴似箭啊。<br />\r\n这个月花了好多好多钱，因为是到深圳，找了房子，放后购买各种生活用品，厨具是一比相当大的花销，购置了各种锅，还有餐具，烤箱等。自己的生活气息真是越来越浓厚了。<br />\r\n随着厨具什么的到位，自己的朋友圈也越来越丰富了，欢迎大家加我私人微信号啊coderfa，我还是蛮喜欢聊天的，前提是有共同语言~<br />','',1,1,'测试1,测试2,测试',4,'2014-05-17 22:57:55',0,0,0,0),(52,'测试文章4','时间过的好快，感觉昨天才写的三月份总结啊，今天居然就又不是月末了，真是光阴似箭啊。<br />\r\n这个月花了好多好多钱，因为是到深圳，找了房子，放后购买各种生活用品，厨具是一比相当大的花销，购置了各种锅，还有餐具，烤箱等。自己的生活气息真是越来越浓厚了。<br />\r\n随着厨具什么的到位，自己的朋友圈也越来越丰富了，欢迎大家加我私人微信号啊coderfa，我还是蛮喜欢聊天的，前提是有共同语言~<br />','',1,1,'测试1,测试2,测试',4,'2014-05-17 22:58:18',0,1,0,0),(53,'测试文章5','时间过的好快，感觉昨天才写的三月份总结啊，今天居然就又不是月末了，真是光阴似箭啊。<br />\r\n这个月花了好多好多钱，因为是到深圳，找了房子，放后购买各种生活用品，厨具是一比相当大的花销，购置了各种锅，还有餐具，烤箱等。自己的生活气息真是越来越浓厚了。<br />\r\n随着厨具什么的到位，自己的朋友圈也越来越丰富了，欢迎大家加我私人微信号啊coderfa，我还是蛮喜欢聊天的，前提是有共同语言~<br />','',1,1,'测试1,测试2,测试',4,'2014-05-17 22:58:37',0,0,0,0),(54,'测试文章6','时间过的好快，感觉昨天才写的三月份总结啊，今天居然就又不是月末了，真是光阴似箭啊。<br />\r\n这个月花了好多好多钱，因为是到深圳，找了房子，放后购买各种生活用品，厨具是一比相当大的花销，购置了各种锅，还有餐具，烤箱等。自己的生活气息真是越来越浓厚了。<br />\r\n随着厨具什么的到位，自己的朋友圈也越来越丰富了，欢迎大家加我私人微信号啊coderfa，我还是蛮喜欢聊天的，前提是有共同语言~<br />','',1,1,'测试1,测试2,测试',4,'2014-05-17 22:58:55',0,0,0,0),(55,'测试文章7','时间过的好快，感觉昨天才写的三月份总结啊，今天居然就又不是月末了，真是光阴似箭啊。<br />\r\n这个月花了好多好多钱，因为是到深圳，找了房子，放后购买各种生活用品，厨具是一比相当大的花销，购置了各种锅，还有餐具，烤箱等。自己的生活气息真是越来越浓厚了。<br />\r\n随着厨具什么的到位，自己的朋友圈也越来越丰富了，欢迎大家加我私人微信号啊coderfa，我还是蛮喜欢聊天的，前提是有共同语言~<br />','',1,1,'测试1,测试2,测试',4,'2014-05-17 23:01:45',0,0,0,0),(56,'测试文章8','时间过的好快，感觉昨天才写的三月份总结啊，今天居然就又不是月末了，真是光阴似箭啊。<br />\r\n这个月花了好多好多钱，因为是到深圳，找了房子，放后购买各种生活用品，厨具是一比相当大的花销，购置了各种锅，还有餐具，烤箱等。自己的生活气息真是越来越浓厚了。<br />\r\n随着厨具什么的到位，自己的朋友圈也越来越丰富了，欢迎大家加我私人微信号啊coderfa，我还是蛮喜欢聊天的，前提是有共同语言~<br />','',1,1,'测试1,测试2,测试',4,'2014-05-17 23:02:08',0,0,0,0),(57,'测试文章9','时间过的好快，感觉昨天才写的三月份总结啊，今天居然就又不是月末了，真是光阴似箭啊。<br />\r\n这个月花了好多好多钱，因为是到深圳，找了房子，放后购买各种生活用品，厨具是一比相当大的花销，购置了各种锅，还有餐具，烤箱等。自己的生活气息真是越来越浓厚了。<br />\r\n随着厨具什么的到位，自己的朋友圈也越来越丰富了，欢迎大家加我私人微信号啊coderfa，我还是蛮喜欢聊天的，前提是有共同语言~<br />','',1,1,'测试1,测试2,测试',4,'2014-05-17 23:02:27',0,0,0,0),(58,'测试文章10','时间过的好快，感觉昨天才写的三月份总结啊，今天居然就又不是月末了，真是光阴似箭啊。<br />\r\n这个月花了好多好多钱，因为是到深圳，找了房子，放后购买各种生活用品，厨具是一比相当大的花销，购置了各种锅，还有餐具，烤箱等。自己的生活气息真是越来越浓厚了。<br />\r\n随着厨具什么的到位，自己的朋友圈也越来越丰富了，欢迎大家加我私人微信号啊coderfa，我还是蛮喜欢聊天的，前提是有共同语言~<br />','',1,1,'测试1,测试2,测试',4,'2014-05-17 23:02:45',0,0,0,0),(59,'测试文章12','时间过的好快，感觉昨天才写的三月份总结啊，今天居然就又不是月末了，真是光阴似箭啊。<br />\r\n这个月花了好多好多钱，因为是到深圳，找了房子，放后购买各种生活用品，厨具是一比相当大的花销，购置了各种锅，还有餐具，烤箱等。自己的生活气息真是越来越浓厚了。<br />\r\n随着厨具什么的到位，自己的朋友圈也越来越丰富了，欢迎大家加我私人微信号啊coderfa，我还是蛮喜欢聊天的，前提是有共同语言~<br />','',1,1,'测试1,测试2,测试',4,'2014-05-17 23:03:01',0,6,0,0),(60,'测试15','<p>\r\n	<img src=\"/tinblog/attached/image/20140520/20140520211606_16014.jpg\" alt=\"\" width=\"600\" height=\"337\" title=\"\" align=\"\" />\r\n</p>\r\n<p>\r\n	测试图片属性\r\n</p>','',1,2,'关于你',1,'2014-05-20 21:16:42',0,4,0,0),(61,'测试17','<p>\r\n	<img src=\"/tinblog/attached/image/20140520/20140520214752_38711.jpg\" alt=\"\" width=\"400\" height=\"225\" title=\"\" align=\"\" /> \r\n</p>\r\n<p>\r\n	<a href=\"/tinblog/attached/image/20140520/20140520214808_94279.jpg\"><img src=\"/tinblog/attached/image/20140520/20140520214808_94279.jpg\" alt=\"\" width=\"600\" height=\"337\" title=\"\" align=\"\" /></a> \r\n</p>','',1,2,'关于你',1,'2014-05-20 21:49:07',0,2,0,0),(62,'测试19','<img src=\"/tinblog/attached/image/20140520/20140520215546_59373.jpg\" alt=\"\" width=\"400\" height=\"225\" title=\"\" align=\"\" /><img src=\"/tinblog/attached/image/20140520/20140520215609_10702.jpg\" alt=\"\" />','',1,2,'关于你',1,'2014-05-20 21:56:32',0,3,0,0),(63,'测试20','<p>\r\n	<a href=\"/tinblog/attached/image/20140520/20140520215757_80268.jpg\" rel=\"gallery\" target=\"_blank\" title=\"\" style=\"line-height:1.5;\"><img src=\"/tinblog/attached/image/20140520/20140520215757_80268.jpg\" alt=\"\" /></a>\r\n</p>\r\n<p>\r\n	<a href=\"/tinblog/attached/image/20140520/20140520215828_39045.jpg\" rel=\"gallery\" target=\"_blank\" title=\"\"><img src=\"/tinblog/attached/image/20140520/20140520215828_39045.jpg\" alt=\"\" /></a>\r\n</p>','',1,2,'关于你',1,'2014-05-20 21:58:48',0,35,0,0),(64,'cs ','cs caasfasfafasdfsadfsdfdsf','',1,2,'彩色,彩色',4,'2014-06-08 23:44:56',0,0,0,0),(65,'测试文章12234','<p>\r\n	近日在戛纳掀<span style=\"font-size:14px;color:#999999;\">起一阵音乐、时尚风暴的华语天后张靓颖，在结束了《龙之谷》电影全球发布会以及红毯秀之后丝毫没有懈怠，立刻投入到今日发布的新专辑主打歌《永远》的宣传。随着张靓颖第七张专辑《第七感》进入倒计时，大众一直对新作品充满期待。今日(5月20日)，新歌《永远》首发，这首唯美、极致的新曲，也与承载着无数经典的戛纳碰撞出来时代的火花。</span>\r\n</p>\r\n<p>\r\n	<span style=\"font-size:14px;color:#999999;\">为时近一周的戛纳行，张靓颖作为唯一以歌手身份出席的中国艺人，成为首位在戛纳二度献声的华语歌手。而她不断变化和创新的红毯时尚，也向世界展示了自己的创意与活力。张靓颖无疑用实力让世界瞩目的“中国力量”不再只有电影，而是真正意义的全方位展现实力。此次紧锣密鼓推出新曲《永远》，也正是全方位引爆新专辑，开启影音、时尚新篇章，同时也昭示着无论张靓颖出道多久，走到哪里，音乐的路没有终点，永远张靓颖。选择在刚刚结束戛纳行就马上推出新曲，目的就是让大家在一波又一波的视觉和活动冲击后，迎面而来的便是“永远”。</span>\r\n</p>\r\n<p>\r\n	<span style=\"font-size:14px;color:#999999;\"> &nbsp; &nbsp;《永远》以中版R&amp;B &nbsp;舞曲节拍，酝酿爱情到来，既期待又怕受伤害的酸甜情绪，借此诉说张靓颖私人对感情的态度：“不轻易恋爱，一旦爱了就要爱到永远。” 用一首一见钟情的歌，唱出天长地久的爱情观。张靓颖说，第一次听到这首歌的demo就很有感觉，像一见钟情般，脑中很有画面，而且让她很想跳舞！张靓颖首次与擅长掌控节奏的韩国制作人Jae Chong合作，两人在音乐上的互动沟通可以用“一拍即合”来形容，彼此对音乐的想法相近，沟通非常顺畅，制作人与张靓颖在录音间互动极为融洽，录音才花一个小时就连和声都录完，迅速到令人惊讶，成果更令人惊喜！所有工作人员听了配唱好的成品不约而同露出笑容，赞不绝口，一致推荐！张靓颖也深情表示，“我无法在最美好的年华停留，只有将它尽可能深植在你的记忆。那，将是属于我们的永远。”为这首歌做了最好的注释</span>\r\n</p>','',1,2,'测试1,测试2,测试',4,'2014-06-09 00:10:38',0,0,0,0),(66,'测试文章121214','<p>\r\n	近日在戛纳掀起一阵音乐、时尚风暴的华语天后张靓颖，在结束了《龙之谷》电影全球发布会以及红毯秀之后丝毫没有懈怠，立刻投入到今日发布的新专辑主打歌《永远》的宣传。随着张靓颖第七张专辑《第七感》进入倒计时，大众一直对新作品充满期待。今日(5月20日)，新歌《永远》首发，这首唯美、极致的新曲，也与承载着无数经典的戛纳碰撞出来时代的火花。\r\n</p>\r\n<p>\r\n	为时近一周的戛纳行，张靓颖作为唯一以歌手<span style=\"font-family:Microsoft YaHei;\">身份出席的中国艺人，成为首位在戛纳二度献声的华语歌手。而她不断变化和创新的红毯时尚，也向世界展示了自己的创意与活力。张靓颖无疑用实力让世界瞩目的“中国力量”不再只有电影，而是真正意义的全方位展现实力。此次紧锣密鼓推出新曲《<span style=\"font-family:Microsoft YaHei;\">永远》，也正是全方位引爆新专辑，开启影音、时尚新篇章，同时也昭示着无论张靓颖出道多久，走到哪里，音乐的路没有终点，永远张靓颖。选择在刚刚结束戛纳行就马上推出新曲，目的就是让大家在一波又一波的视觉和活动冲击后，迎面而来的便是“永远”。</span></span>\r\n</p>\r\n<p>\r\n	<span style=\"font-family:Microsoft YaHei;\"><span style=\"font-family:Microsoft YaHei;\"> &nbsp; &nbsp;《永远》以中版R&amp;B &nbsp;舞曲节拍，酝酿爱情到来，既期待又怕受伤害的酸甜情绪，借此诉说张靓颖私人对感情的态度：“不轻易恋爱，一旦爱了就要爱到永远。” 用一首一见钟情的歌，唱出天长地久的爱情观。张靓颖说，第一次听到这首歌的demo就很有感觉，像一见钟情般，脑中很有画面，而且让她很想跳舞！张靓颖首次与擅长</span>掌控节奏的韩国制</span>作人Jae Chong合作，两人在音乐上的互动沟通可以用“一拍即合”来形容，彼此对音乐的想法相近，沟通非常顺畅，制作人与张靓颖在录音间互动极为融洽，录音才花一个小时就连和声都录完，迅速到令人惊讶，成果更令人惊喜！所有工作人员听了配唱好的成品不约而同露出笑容，赞不绝口，一致推荐！张靓颖也深情表示，“我无法在最美好的年华停留，只有将它尽可能深植在你的记忆。那，将是属于我们的永远。”为这首歌做了最好的注释\r\n</p>','',1,2,'测试1,测试2,测试',4,'2014-06-09 00:12:08',0,0,0,0),(67,'啊啊发送','<p>\r\n	近日在戛纳掀起<span style=\"font-size:14px;color:#999999;\">一阵音乐、时尚风暴的华语天后张靓颖，在结束了《龙之谷》电影全球发布会以及红毯秀之后丝毫没有懈怠，立刻投入到今日发布的新专辑主打歌《永远》的宣传。随着张靓颖第七张专辑《第七感》进入倒计时，大众一直对新作品充满期待。今日(5月20日)，新歌《永远》首发，这首唯美、极致的新曲，也与承载着无数经典的戛纳碰撞出来时代的火花。</span>\r\n</p>\r\n<p>\r\n	<span style=\"font-size:14px;color:#999999;\">为时近一周的戛纳行，张靓颖作为唯一以歌手身份出席的中国艺人，成为首位在戛纳二度献声的华语歌手。而她不断变化和创新的红毯时尚，也向世界展示了自己的创意与活力。张靓颖无疑用实力让世界瞩目的“中国力量”不再只有电影，而是真正意义的全方位展现实力。此次紧锣密鼓推出新曲《永远》，也正是全方位引爆新专辑，开启影音、时尚新篇章，同时也昭示着无论张靓颖出道多久，走到哪里，音乐的路没有终点，永远张靓颖。选择在刚刚结束戛纳行就马上推出新曲，目的就是让大家在一波又一波的视觉和活动冲击后，迎面而来的便是“永远”。</span>\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp;《永远》以中版R&amp;B &nbsp;舞曲节拍，酝酿爱情到来，既期待又怕受伤害的酸甜情绪，借此诉说张靓颖私人对感情的态度：“不轻易恋爱，一旦爱了就要爱到永远。” 用一首一见钟情的歌，唱出天长地久的爱情观。张靓颖说，第一次听到这首歌的demo就很有感觉，像一见钟情般，脑中很有画面，而且让她很想跳舞！张靓颖首次与擅长掌控节奏的韩国制作人Jae Chong合作，两人在音乐上的互动沟通可以用“一拍即合”来形容，彼此对音乐的想法相近，沟通非常顺畅，制作人与张靓颖在录音间互动极为融洽，录音才花一个小时就连和声都录完，迅速到令人惊讶，成果更令人惊喜！所有工作人员听了配唱好的成品不约而同露出笑容，赞不绝口，一致推荐！张靓颖也深情表示，“我无法在最美好的年华停留，只有将它尽可能深植在你的记忆。那，将是属于我们的永远。”为这首歌做了最好的注释\r\n</p>','',1,2,'测试1,测试2,测试',4,'2014-06-09 00:13:33',0,7,0,0),(68,'cs ','这是一个测试','',1,4,'测试1,测试2,测试',4,'2014-07-14 22:43:55',0,51,0,0);
/*!40000 ALTER TABLE `b_article` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `b_attachment`
--

DROP TABLE IF EXISTS `b_attachment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b_attachment` (
  `no` int(10) NOT NULL AUTO_INCREMENT,
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `url` varchar(50) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b_attachment`
--

LOCK TABLES `b_attachment` WRITE;
/*!40000 ALTER TABLE `b_attachment` DISABLE KEYS */;
/*!40000 ALTER TABLE `b_attachment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `b_category`
--

DROP TABLE IF EXISTS `b_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b_category` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b_category`
--

LOCK TABLES `b_category` WRITE;
/*!40000 ALTER TABLE `b_category` DISABLE KEYS */;
INSERT INTO `b_category` VALUES (2,'Codes'),(4,'Movies');
/*!40000 ALTER TABLE `b_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `b_comments`
--

DROP TABLE IF EXISTS `b_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b_comments` (
  `no` int(10) NOT NULL,
  `post_id` int(10) NOT NULL AUTO_INCREMENT,
  `pre_post_id` int(10) DEFAULT NULL,
  `user_id` varchar(50) DEFAULT NULL,
  `name` varchar(20) NOT NULL,
  `url` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `text` text,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b_comments`
--

LOCK TABLES `b_comments` WRITE;
/*!40000 ALTER TABLE `b_comments` DISABLE KEYS */;
INSERT INTO `b_comments` VALUES (68,2,0,'0','测试1','admin@uuuuj.com','http://www.uuuuj.com','测试1',NULL),(68,3,2,'0','测试2','admin@uuuuj.com','http://www.uuuuj.com','测试2',NULL),(68,4,0,'0',' cshi ','http://http://www.uuuuj.com','admin@uuuuj.com','cs dafafafsa','2014-08-12 22:04:32'),(68,5,0,'0',' cshi ','http://http://http://www.uuuuj.com','admin@uuuuj.com','测试','2014-08-12 22:50:51'),(68,6,0,'0',' cshi ','http://http://http://http://www.uuuuj.com','admin@uuuuj.com','撒旦发送到分撒旦','2014-08-12 22:52:35'),(68,7,0,'0',' cshi ','http://http://http://http://http://www.uuuuj.com','admin@uuuuj.com','阿飞撒旦放大萨芬','2014-08-12 22:53:35'),(68,8,0,'0',' cshi ','http://www.uuuuj.com','admin@uuuuj.com','打三分萨法','2014-08-12 22:55:31');
/*!40000 ALTER TABLE `b_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `b_links`
--

DROP TABLE IF EXISTS `b_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b_links` (
  `no` int(10) NOT NULL,
  `title` varchar(20) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b_links`
--

LOCK TABLES `b_links` WRITE;
/*!40000 ALTER TABLE `b_links` DISABLE KEYS */;
INSERT INTO `b_links` VALUES (0,'wordpress','http://blog.uuuuj.com','Brague22'),(1,'wordpress','http://blog.uuuuj.com','Brague'),(2,'wordpress','http://blog.uuuuj.com','Brague3');
/*!40000 ALTER TABLE `b_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `b_option`
--

DROP TABLE IF EXISTS `b_option`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b_option` (
  `title` varchar(50) NOT NULL,
  `keywords` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b_option`
--

LOCK TABLES `b_option` WRITE;
/*!40000 ALTER TABLE `b_option` DISABLE KEYS */;
INSERT INTO `b_option` VALUES ('Brague','Brague,PHP,wordpress,emlog,html5,css3,js','Life is a color blind!');
/*!40000 ALTER TABLE `b_option` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `b_tag`
--

DROP TABLE IF EXISTS `b_tag`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b_tag` (
  `id` int(10) NOT NULL,
  `tag_name` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b_tag`
--

LOCK TABLES `b_tag` WRITE;
/*!40000 ALTER TABLE `b_tag` DISABLE KEYS */;
INSERT INTO `b_tag` VALUES (1,'tag1'),(2,'tag2');
/*!40000 ALTER TABLE `b_tag` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `b_third`
--

DROP TABLE IF EXISTS `b_third`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b_third` (
  `user_id` varchar(50) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `third_id` varchar(50) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b_third`
--

LOCK TABLES `b_third` WRITE;
/*!40000 ALTER TABLE `b_third` DISABLE KEYS */;
/*!40000 ALTER TABLE `b_third` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `b_user`
--

DROP TABLE IF EXISTS `b_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `b_user` (
  `user_id` int(2) NOT NULL,
  `user_email` varchar(20) DEFAULT NULL,
  `user_name` varchar(12) NOT NULL,
  `user_paswd` varchar(40) NOT NULL,
  `user_des` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `b_user`
--

LOCK TABLES `b_user` WRITE;
/*!40000 ALTER TABLE `b_user` DISABLE KEYS */;
INSERT INTO `b_user` VALUES (1,'admin@uuuuj.com','tinty','d417234476','从明天起，做一个幸福的人；骑马、砍柴、周游世界！');
/*!40000 ALTER TABLE `b_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-09-04 10:09:29
