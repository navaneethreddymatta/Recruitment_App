-- MySQL dump 10.13  Distrib 5.1.47, for Win32 (ia32)
--
-- Host: localhost    Database: recruitment
-- ------------------------------------------------------
-- Server version	5.1.47-community

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
-- Table structure for table `candidateactivities`
--

DROP TABLE IF EXISTS `candidateactivities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `candidateactivities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `eid` int(11) DEFAULT NULL,
  `stime` varchar(50) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `comment` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidateactivities`
--

LOCK TABLES `candidateactivities` WRITE;
/*!40000 ALTER TABLE `candidateactivities` DISABLE KEYS */;
INSERT INTO `candidateactivities` VALUES (1,1,1,'20-10-2014 05:12:15',0,1,'Test'),(2,2,1,'20-10-2014 05:20:15',5,1,'test'),(3,1,1,'20-10-2014 17:24:15',2,2,'testing'),(4,1,1,'20-10-2014 19:33:14',3,3,'Testing'),(5,2,1,'20-10-2014 17:24:15',10,1,NULL),(6,1,1,'20-10-2014 17:24:15',10,1,NULL),(7,2,1,'20-10-2014 17:24:15',10,1,NULL),(8,1,1,'20-10-2014 17:24:15',10,1,'weretr 3w53 4w544545'),(9,1,1,'20-10-2014 17:24:15',10,1,'wqrewr e55555555555555555555 ryrrr'),(10,1,1,'20-10-2014 17:24:15',10,1,'Happy Diwali :)'),(11,1,1,'20-10-2014 17:24:15',10,1,'test'),(12,1,1,'20-10-2014 17:24:15',10,1,'Happy Diwali :) aeqwqe'),(13,3,6,'20-10-2014 17:24:15',10,1,'srk@flexeye.com'),(14,3,6,'22-10-2014 17:24:15',10,16,'ewr6tyu'),(15,3,6,'22-10-2014 17:24:15',10,15,'sfrsfsd'),(16,3,6,'22-10-2014 17:24:15',10,15,'setrret'),(17,3,6,'22-10-2014 17:24:15',10,16,'sdfetrerwersdt et  ert  ert r tr tretert'),(18,1,6,'22-10-2014 17:24:15',10,6,'drteter'),(19,2,6,'22-10-2014 17:24:15',10,8,'erewrwerwe'),(20,4,6,'22-10-2014 17:24:15',10,10,'tetrerewretrr'),(21,5,6,'22-10-2014 17:24:15',10,12,'etrwerwer'),(22,3,6,'22-10-2014 17:24:15',10,17,'aeawewewweewe'),(23,3,6,'22-10-2014 17:24:15',10,17,'weweererert'),(24,4,6,'22-10-2014 17:24:15',10,11,'serewrwewerwe'),(25,4,6,'22-10-2014 17:24:15',10,11,'erwererer'),(26,3,6,'22-10-2014 17:24:15',10,18,'xdfertyuio354545'),(27,2,6,'22-10-2014 17:24:15',10,10,'ewrrtrtersetrertrt'),(28,4,6,'22-10-2014 17:24:15',10,12,'dertrtyrtyftytry ryt tyui '),(29,5,6,'22-10-2014 17:24:15',10,14,'trretrtrre rt 34345 Onsite Qualified'),(30,5,6,'22-10-2014 17:24:15',10,16,'ettertert HR Qualifued'),(31,5,6,'22-10-2014 17:24:15',10,18,'dsrerewrer Final '),(32,1,6,'22-10-2014 17:24:15',10,8,'wewweeerereww 3ewrt'),(33,1,6,'22-10-2014 17:24:15',10,10,'dsfdfgdf ererew  rer  round 3'),(34,1,6,'22-10-2014 17:24:15',10,12,'sdrtretreyrtsr ryrrt try rseyttryd'),(35,1,6,'22-10-2014 17:24:15',10,14,'saDsrfe sr tyr'),(36,2,6,'22-10-2014 17:24:15',10,11,'ertrtysretrtrtaest trte tyt'),(37,2,6,'22-10-2014 17:24:15',10,12,'fdfgf rrt r 6t'),(38,2,6,'22-10-2014 17:24:15',10,13,'ertrtrtretrete'),(39,1,6,'22-10-2014 17:24:15',10,15,'sretyyuertrt tyrty'),(40,1,6,'22-10-2014 17:24:15',10,16,'htgfh hjy juuyi'),(41,2,6,'22-10-2014 17:24:15',10,16,'ghjuyii tuiyi'),(42,7,6,'22-10-2014 17:24:15',10,4,'Written Test Qualified'),(43,7,6,'22-10-2014 17:24:15',10,5,'Gruop Discuusion Disqulaified'),(44,7,6,'22-10-2014 17:24:15',10,6,'346436 e trye'),(45,7,6,'22-10-2014 17:24:15',10,7,'e45645645w 6756756'),(46,7,6,'22-10-2014 17:24:15',10,8,'gfuiop'),(47,7,6,'22-10-2014 17:24:15',10,9,'erttyuytuu'),(48,7,6,'22-10-2014 17:24:15',10,10,'ftyhdtuytrytutyu!!!!!!!!!!!!!!!!!!!!!!!!!!'),(49,7,6,'27-10-2014 13:55:58',10,11,'sfdfgdfgsdftet $$$$$$$$$$$$$$'),(50,7,6,'27-10-2014 14:28:06',10,11,'sedrfwerewt 5rytrutfu ytu'),(51,7,6,'27-10-2014 14:28:38',10,12,'ear yui W657567'),(52,4,6,'27-10-2014 14:44:31',10,13,'wejrkert re tht'),(53,4,6,'27-10-2014 14:45:59',10,14,'dgdgsawr rt'),(54,7,6,'27-10-2014 14:57:39',6,14,'gj kghkhgjhgj lfljkl %%%%%%%%%%%%'),(55,7,6,'27-10-2014 15:15:03',9,15,'shf rn eteretretuhtir'),(56,8,6,'27-10-2014 16:40:08',0,2,'awewrw'),(57,5,6,'27-10-2014 16:41:10',0,1,'dfgfhdhfffhfhse rry ry'),(58,4,6,'27-10-2014 16:42:21',4,15,'gfhtydf'),(59,1,6,'27-10-2014 17:35:35',4,17,'Ftfjygjuv '),(60,7,6,'28-10-2014 10:48:43',5,16,'jsdfhf eiuwqrueirwerwer'),(61,7,6,'28-10-2014 10:49:02',5,16,'jsdfhf eiuwqrueirwerwer'),(62,7,6,'28-10-2014 10:50:28',5,17,'testing session variables'),(63,7,6,'28-10-2014 10:50:39',5,17,'testing session variables'),(64,8,6,'28-10-2014 10:52:21',5,3,'1111111111111'),(65,8,6,'28-10-2014 10:52:49',5,4,'-1-1-1-1-1-1-1-1'),(66,8,6,'28-10-2014 10:52:58',5,4,'-1-1-1-1-1-1-1-1'),(67,2,6,'28-10-2014 11:00:16',6,17,'rwqr er ert etet ery'),(68,8,6,'28-10-2014 11:02:40',7,5,'22222222222222222222'),(69,8,6,'28-10-2014 11:04:39',7,6,'333333333333333333333333'),(70,8,6,'28-10-2014 11:06:51',6,7,'44444444444444444'),(71,8,6,'28-10-2014 11:08:20',3,8,'5555555555555555'),(72,8,6,'28-10-2014 11:10:37',7,9,'66666666666666666666666'),(73,8,6,'28-10-2014 11:13:53',4,10,'7777777777777'),(74,8,6,'28-10-2014 11:23:59',4,11,'88888888888888'),(75,8,6,'28-10-2014 11:27:51',6,12,'9999999999999999999999999999'),(76,8,6,'28-10-2014 11:32:27',8,13,'0000000000000000000000000000000000'),(77,8,6,'28-10-2014 11:33:55',8,14,'11111111111111111111111'),(78,8,6,'28-10-2014 11:37:47',9,15,'222222222222'),(79,8,6,'28-10-2014 11:42:05',9,16,'33333333333333333333'),(80,8,6,'28-10-2014 11:43:49',9,17,'4444444444444'),(81,4,6,'28-10-2014 11:47:23',8,16,'111111111111111111111'),(82,5,5,'28-10-2014 11:51:40',5,3,'vb gfb'),(83,5,6,'28-10-2014 11:55:08',4,4,'11111111111111111111111111'),(84,5,6,'28-10-2014 11:58:47',8,5,'2222'),(85,5,6,'28-10-2014 11:59:10',9,6,'333333333333333'),(86,5,6,'28-10-2014 12:06:28',6,7,'4444444444'),(87,9,6,'28-10-2014 12:08:28',7,2,'111111111111111111111111111'),(88,9,6,'28-10-2014 12:10:28',3,3,'2222222222222222'),(89,9,6,'28-10-2014 12:10:45',7,4,'3333333333333333333'),(90,5,6,'28-10-2014 12:11:50',8,8,'555555555555555555555'),(91,9,6,'28-10-2014 12:14:11',4,5,'44444444444444444'),(92,9,6,'28-10-2014 12:15:33',9,6,'5555555555'),(93,9,6,'28-10-2014 12:16:30',9,6,''),(94,9,6,'28-10-2014 12:17:00',6,7,'7777777777777777777777777777777'),(95,9,6,'28-10-2014 12:17:46',7,8,'888888888888888888888888888888888'),(96,9,6,'28-10-2014 12:18:25',8,9,'999999999999999999'),(97,9,6,'28-10-2014 14:06:25',8,10,'Hey check out the score'),(98,9,6,'28-10-2014 14:27:39',7,11,'new value slider'),(99,9,6,'28-10-2014 14:28:36',9,12,'testing'),(100,9,6,'28-10-2014 16:05:41',3,13,'sfsgsf h'),(101,9,6,'28-10-2014 16:14:54',3,13,'sfsgsf h'),(102,9,6,'28-10-2014 16:17:05',3,13,'sfsgsf h'),(103,9,6,'28-10-2014 16:27:24',7,14,'hey congrats!!!'),(104,9,6,'28-10-2014 16:29:39',7,14,'hey congrats!!!'),(105,9,6,'28-10-2014 16:30:01',7,14,'hey congrats!!!'),(106,9,6,'28-10-2014 16:30:55',7,14,'hey congrats!!!'),(107,9,6,'28-10-2014 16:33:55',7,14,'hey congrats!!!'),(108,9,6,'28-10-2014 16:35:20',7,14,'hey congrats!!!'),(109,9,6,'28-10-2014 16:36:09',7,14,'hey congrats!!!'),(110,9,6,'28-10-2014 16:36:52',7,14,'hey congrats!!!'),(111,9,6,'28-10-2014 16:37:46',7,14,'hey congrats!!!'),(112,9,6,'28-10-2014 16:38:03',7,14,'hey congrats!!!'),(113,9,6,'28-10-2014 16:42:09',7,14,'hey congrats!!!'),(114,9,6,'28-10-2014 16:42:42',9,15,'rqwrv ewtwetertwrt'),(115,9,6,'28-10-2014 16:52:17',7,16,'Ok ok');
/*!40000 ALTER TABLE `candidateactivities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `candidates`
--

DROP TABLE IF EXISTS `candidates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `candidates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) DEFAULT NULL,
  `lname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL,
  `gender` int(4) DEFAULT NULL,
  `college` varchar(100) DEFAULT NULL,
  `qualification` int(10) DEFAULT NULL,
  `stream` int(10) DEFAULT NULL,
  `yearPassed` varchar(50) DEFAULT NULL,
  `ssc` varchar(10) DEFAULT NULL,
  `inter` varchar(10) DEFAULT NULL,
  `degree` varchar(10) DEFAULT NULL,
  `currentCompany` varchar(150) DEFAULT NULL,
  `yearsOfExperience` varchar(50) DEFAULT NULL,
  `source` varchar(250) DEFAULT NULL,
  `regId` varchar(50) DEFAULT NULL,
  `regDate` varchar(50) DEFAULT NULL,
  `status` int(10) DEFAULT NULL,
  `written` int(10) DEFAULT NULL,
  `otherSections` int(10) DEFAULT NULL,
  `round1` int(10) DEFAULT NULL,
  `round2` int(10) DEFAULT NULL,
  `round3` int(10) DEFAULT NULL,
  `round4` int(10) DEFAULT NULL,
  `onsite` int(10) DEFAULT NULL,
  `finalStatus` int(10) DEFAULT NULL,
  `event` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `regId` (`regId`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidates`
--

LOCK TABLES `candidates` WRITE;
/*!40000 ALTER TABLE `candidates` DISABLE KEYS */;
INSERT INTO `candidates` VALUES (1,'test','test','test@test.com','454-545-4545','01/01/1991',2,'Test',1,1,'2007','70','70','70',NULL,NULL,'source','1910001','19-10-2014 21:00:08',17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,'Test','Test','test1@test.com','454-545-4546','01/01/1991',2,'test',1,1,'2007','78','78','78',NULL,NULL,'Test','2010002','20-10-2014 10:01:19',17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,'ShivaRam','Reddy','srk@flexeye.com','900-056-9655','07/02/1992',2,'VBIT',1,1,'2013','83','83','80','Flexeye','1','Facebook','2110003','21-10-2014 12:00:52',18,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,'Abhijeet','vemuri','akv@flexeye.com','897-897-7292','07/02/1992',2,'GRIT',2,1,'2013','90','80','70','Flexeye','1','Monster','2110004','21-10-2014 12:32:13',16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'sfsfdf','dfdfdf','s@s.com','123-333-3333','22/02/2022',1,'22222223',1,1,'2323','1212','2323','23232','23232313','2323','23232323232323','2110005','21-10-2014 15:27:09',8,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,'jitender','singh','js@flexeye.com','123-456-7890','07/02/1992',2,'df',1,3,'2014','80','80','80','dfdf drgt','3','ddgfg','2710006','27-10-2014 12:32:38',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,'ewrwr','rtyhrtewt','js1@flexeye.com','987-456-1230','07/02/1992',1,'dsergewte',1,3,'2013','80','80','90','ertrret','03','drdyetest','2710007','27-10-2014 13:31:08',17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,'cdd','cvb','vvvv2dss@dsfnsdfs.sdfsdf','939-300-9300','19/11/2011',2,'qqq',2,1,'1111','22','22','222','dfs','2','qqq qqq','2710008','27-10-2014 16:36:43',17,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,'nnn','rrr','nn@nn.nn','123-456-7880','10/09/1990',2,'CMR',1,3,'2013','90','90','90',NULL,NULL,'Internet','2810009','28-10-2014 11:54:09',16,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `candidates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `events`
--

DROP TABLE IF EXISTS `events`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `events` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `location` varchar(150) DEFAULT NULL,
  `evtDate` datetime DEFAULT NULL,
  `evtDetails` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'ST Peters Engineering College','Dhulapally','2014-09-27 09:30:00','ST Peters Engineering College');
/*!40000 ALTER TABLE `events` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genders`
--

DROP TABLE IF EXISTS `genders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genders` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genders`
--

LOCK TABLES `genders` WRITE;
/*!40000 ALTER TABLE `genders` DISABLE KEYS */;
INSERT INTO `genders` VALUES (1,'Female'),(2,'Male');
/*!40000 ALTER TABLE `genders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qualifications`
--

DROP TABLE IF EXISTS `qualifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `qualifications` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qualifications`
--

LOCK TABLES `qualifications` WRITE;
/*!40000 ALTER TABLE `qualifications` DISABLE KEYS */;
INSERT INTO `qualifications` VALUES (1,'B.E/B.Tech'),(2,'MCA');
/*!40000 ALTER TABLE `qualifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff`
--

DROP TABLE IF EXISTS `staff`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff`
--

LOCK TABLES `staff` WRITE;
/*!40000 ALTER TABLE `staff` DISABLE KEYS */;
INSERT INTO `staff` VALUES (1,'vn@flexeye.com','vn@flexeye.com','Staff','Vamsi'),(2,'sc@flexeye.com','sc@flexeye.com','Staff','Srini'),(3,'pm@flexeye.com','pm@flexeye.com','Staff','Pallavi'),(4,'js@flexeye.com','js@flexeye.com','Staff','Jitender'),(5,'nrm@flexeye.com','nrm@flexeye.com','Staff','Navaneeth'),(6,'srk@flexeye.com','srk@flexeye.com','Staff','Shiva Ram'),(7,'akv@flexeye.com','akv@flexeye.com','Staff','Abhijeet'),(8,'skc@flexeye.com','skc@flexeye.com','Staff','Sri Krishna'),(9,'sv@flexeye.com','sv@flexeye.com','Staff','Shalini'),(10,'Guest','Guest','Guest','Guest');
/*!40000 ALTER TABLE `staff` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `state` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `state`
--

LOCK TABLES `state` WRITE;
/*!40000 ALTER TABLE `state` DISABLE KEYS */;
INSERT INTO `state` VALUES (1,'Active'),(2,'Rejected'),(3,'Qualified');
/*!40000 ALTER TABLE `state` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `status` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `displayName` varchar(150) DEFAULT NULL,
  `state` int(10) DEFAULT NULL,
  `round` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Registered','Registration Completed',1,0),(2,'Left for Day','Left for Day',2,0),(3,'Written Test Rejected','Written Test Disqualified',2,0),(4,'Written Test Qualified','Written Test Qualified',3,0),(5,'Round1 Rejected','Round1 Disqualified',2,1),(6,'Round1 Qualified','Round1 Qualified',3,1),(7,'Round2 Rejected','Round2 Disqualified',2,2),(8,'Round2 Qualified','Round2 Qualified',3,2),(9,'Round3 Rejected','Round3 Disqualified',2,3),(10,'Round3 Qualified','Round3 Qualified',3,3),(11,'Round4 Rejected','Round4 Disqualified',2,4),(12,'Round4 Qualified','Round4 Qualified',3,4),(13,'Onsite Rejected','Onsite Disqualified',2,5),(14,'Onsite Qualified','Onsite Qualified',3,5),(15,'HR Rejected','HR Round Disqualified',2,6),(16,'HR Qualified','HR Round Qualified',3,6),(17,'Final Round Rejected','Final Round Disqualified',2,7),(18,'Final Round Qualified','Final Round Qualified',3,7);
/*!40000 ALTER TABLE `status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `streams`
--

DROP TABLE IF EXISTS `streams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `streams` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `streams`
--

LOCK TABLES `streams` WRITE;
/*!40000 ALTER TABLE `streams` DISABLE KEYS */;
INSERT INTO `streams` VALUES (1,'CSE'),(2,'IT'),(3,'ECE'),(4,'EEE'),(5,'MECH'),(6,'Others');
/*!40000 ALTER TABLE `streams` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-10-29 12:00:10
