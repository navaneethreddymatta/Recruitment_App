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
  `event` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidateactivities`
--

LOCK TABLES `candidateactivities` WRITE;
/*!40000 ALTER TABLE `candidateactivities` DISABLE KEYS */;
INSERT INTO `candidateactivities` VALUES (1,1,7,'30-10-2014 16:42:20',6,4,'Good ',1),(2,1,7,'30-10-2014 16:54:49',5,6,'Nice',1),(3,1,7,'30-10-2014 17:05:29',6,8,'Great',1),(4,2,7,'30-10-2014 17:06:12',6,4,'Good',1),(5,2,7,'30-10-2014 17:06:41',7,6,'Great',1),(6,2,7,'30-10-2014 17:07:29',2,7,'Wow',1),(7,3,7,'30-10-2014 17:29:01',10,4,'Awesome',1),(8,3,7,'30-10-2014 17:29:33',2,5,'Great',1),(9,2,7,'30-10-2014 18:09:37',10,8,'Hard working guy.',1),(10,2,7,'30-10-2014 18:11:36',0,9,'Not a hard working guy',1),(11,1,6,'31-10-2014 10:52:05',2,9,'fghgfg',1),(12,3,6,'31-10-2014 12:10:41',7,6,'cool ',1),(13,4,7,'31-10-2014 15:14:36',5,4,'5',1),(14,4,7,'31-10-2014 15:15:04',8,6,'6',2);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidates`
--

LOCK TABLES `candidates` WRITE;
/*!40000 ALTER TABLE `candidates` DISABLE KEYS */;
INSERT INTO `candidates` VALUES (1,'ShivaRam','Reddy','srk@flexeye.com','900-056-9655','07/02/1992',2,'VBIT',1,1,'2013','82','88','80','Flexeye','1','Online','3010001','30-10-2014 16:20:51',9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),(2,'nava','neeth','nrm@flexeye.com','123-213-2342','12/01/1992',2,'asfg',1,1,'2001','32','23','34',NULL,NULL,'Intenet','3010002','30-10-2014 16:23:54',9,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),(3,'Abhi','V.V.','akv@flexeye.com','777-777-7777','28/06/1992',2,'ada',1,5,'7777','77','77','77','77','7','77','3010003','30-10-2014 17:27:57',6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),(4,'Krishna','CCC','skc@flexeye.com','888-888-8888','22/02/2022',2,'Flex',1,4,'4444','45','45','45','4','4','44444','3110004','31-10-2014 14:18:07',6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1);
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

-- Dump completed on 2014-10-31 19:59:15
