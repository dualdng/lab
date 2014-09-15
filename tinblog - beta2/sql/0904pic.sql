-- MySQL dump 10.13  Distrib 5.5.28, for Linux (i686)
--
-- Host: localhost    Database: pic
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
-- Table structure for table `pic`
--

DROP TABLE IF EXISTS `pic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pic` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pic`
--

LOCK TABLES `pic` WRITE;
/*!40000 ALTER TABLE `pic` DISABLE KEYS */;
INSERT INTO `pic` VALUES (1,'','img/119213196736.jpg'),(2,'','img/119213205450.jpg'),(3,'','img/119213212657.jpg'),(4,'','img/119213219769.jpg'),(5,'','img/119213227846.jpg'),(6,'','img/119213236379.jpg'),(7,'','img/119214863704.jpg'),(8,'','img/119214869935.jpg'),(9,'','img/119214878672.jpg'),(10,'','img/cos58efceb18e9387f5.jpg'),(11,'','img/cos70bf592a3c08895es.jpg'),(12,'','img/cos89ba9117tw1e1woho7yurj.jpg'),(13,'','img/cosa5fbb7betw1e2brhvrlwuj.jpg'),(14,'','img/cosa5fbb7betw1e2brhyamxrj.jpg'),(15,'','img/cosa5fbb7betw1e2okc1maisj.jpg'),(16,'','img/cosa5fbb7betw1e5zmmpz3fkj20m80xcgpy.jpg'),(17,'','img/cosa5fbb7betw1e5zmmxgar5j20jg0t6tcg.jpg'),(18,'','img/cosa5fbb7betw1e5zmn1p8u9j20iz0sggof.jpg'),(19,'','img/cosa5fbb7betw1e5zmn4ysycj20jn0tkq62.jpg'),(20,'','img/66620b29gw1efmdba9dluj20et0m8dii.jpg'),(21,'','img/66620b29gw1efmdaejqo6j20et0m878j.jpg'),(22,'','img/66620b29gw1efmdagve3uj20m80ettct.jpg'),(23,'','img/66620b29gw1efmdaebcjaj21kw2dctt7.jpg'),(24,'','img/c2ad87a8gw1e9fd444copj20go0p0aed.jpg'),(25,'','img/c2ad87a8gw1e9fd444copj20go0p0aed.jpg.jpg'),(26,'','img/c2ad87a8gw1e9fd47dpb0j20go0dmwh1.jpg'),(27,'','img/c2ad87a8gw1e9fd3uba1bj20go0p043s.jpg'),(28,'','img/c2ad87a8gw1e9fd4pik2lj20go0p10xc.jpg'),(29,'','img/5113d1e9tw1eexz3lzpuqj21kw16oq9a.jpg'),(30,'','img/5113d1e9tw1eexz3opyrkj21kw23uk2u.jpg'),(31,'','img/69120b3agw1eey60dxvpmj20g40ra3zq.jpg'),(32,'','img/69120b3agw1eey60iyjwgj20g40og74u.jpg'),(33,'','img/69120b3agw1eey6107zldj20g40l0dgj.jpg'),(34,'','img/6e243a28jw1eewxyr09rmj21kw2cz7wh.jpg'),(35,'','img/6e243a28jw1eewy0ea178j20s011ctgn.jpg'),(36,'','img/6e243a28jw1eewy0i1spjj21kw23u7wh.jpg'),(37,'','img/d7529e11jw1edldkgdamsj218g0qqn09.jpg'),(38,'','img/d7529e11jw1edldkjtiujj20k00qo3zm.jpg'),(39,'','img/d7529e11jw1eeprvj1bp6j20xc18gtdg.jpg'),(40,'','img/5113d1e9tw1eexz3qcnj7j21kw23uh2s.jpg'),(41,'','img/69120b3agw1eey5zkx1hcj20g40njjs3.jpg'),(42,'','img/69120b3agw1eey5zqzfcij20g40okt98.jpg'),(43,'','img/69120b3agw1eey5zue0hbj20g40pnq43.jpg'),(44,'','img/69120b3agw1eey5zx2m1qj20g40nmgmq.jpg'),(45,'','img/69120b3agw1eey608eu2xj20g40fmt93.jpg'),(46,'','img/69120b3agw1eey617yothj20g40o674u.jpg'),(47,'','img/6e243a28jw1eewxyqxagnj21kw2cz1kx.jpg'),(48,'','img/6e243a28jw1eewxz4j9adj21kw1227su.jpg'),(49,'','img/6e243a28jw1eewy0a8pojj21kw16odtb.jpg'),(50,'','img/6e243a28jw1eewy0fzdnkj21kw1221kx.jpg'),(51,'','img/d7529e11jw1edsm0dpyabj20g10qo75d.jpg'),(52,'','img/d7529e11jw1ee56uk99e3j20hs0npgmr.jpg'),(53,'','img/d7529e11jw1eeprvjonjcj20xc18g41t.jpg'),(54,'','img/d7529e11jw1eesc48snd0j20xc18gace.jpg'),(55,'','img/d7529e11jw1eesc4qwzngj218g0xcgp2.jpg'),(56,'','img/69120b3agw1eey60bc7uij20g40qqgmg.jpg'),(57,'','img/69120b3agw1eey60mgvqbj20g40s4dh1.jpg'),(58,'','img/69120b3agw1eey60p1jzjj20g40qat9r.jpg'),(59,'','img/69120b3agw1eey612udwcj20g40gujs0.jpg'),(60,'','img/69120b3agw1eey615oe1oj20g40od3zp.jpg'),(61,'','img/6df98ffegw1eewvmmxvhoj20dw36y13l.jpg'),(62,'','img/6e243a28jw1eewy02ppb3j21kw28ix43.jpg'),(63,'','img/d7529e11jw1edldkcjkj3j20xc18gjuk.jpg'),(64,'','img/d7529e11jw1edldky3h9vj20qq18gwh0.jpg'),(65,'','img/d7529e11jw1edsm0e3253j20g10qo75e.jpg'),(66,'','img/d7529e11jw1edsm2badodj20qq18gjub.jpg'),(67,'','img/d7529e11jw1ee56uldjamj20np0hs75a.jpg'),(68,'','img/d7529e11jw1eeprvmwrkdj20xc18gq6p.jpg'),(69,'','img/d7529e11jw1eeptlxjaetj20xc18g0vl.jpg'),(70,'','img/5113d1e9tw1eexz3myeeej21kw23u10o.jpg'),(71,'','img/69120b3agw1eey605vj0fj20g40nxt9r.jpg'),(72,'','img/69120b3agw1eey60gwm3kj20g40ndmy1.jpg'),(73,'','img/69120b3agw1eey60s5p4cj20g40p0q42.jpg'),(74,'','img/69120b3agw1eey60xb020j20g40lr74z.jpg'),(75,'','img/6e243a28jw1eewy07kt31j21kw23u1kx.jpg'),(76,'','img/d7529e11jw1edldkirwkdj20xc18gdit.jpg'),(77,'','img/d7529e11jw1edsm2a5ih6j218g0qqgoo.jpg'),(78,'','img/d7529e11jw1eesc4l5cgxj20xc18gdj9.jpg');
/*!40000 ALTER TABLE `pic` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-09-04 10:11:55
