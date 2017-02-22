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
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidateactivities`
--

LOCK TABLES `candidateactivities` WRITE;
/*!40000 ALTER TABLE `candidateactivities` DISABLE KEYS */;
INSERT INTO `candidateactivities` VALUES (1,5,6,'03-11-2014 11:56:41',7,4,'Written Qualified',1),(2,1,7,'03-11-2014 11:57:34',6,4,'Good',1),(3,6,6,'03-11-2014 11:57:47',7,4,'Written Test Qualified',1),(4,2,7,'03-11-2014 11:58:14',2,3,'Good',1),(5,6,6,'03-11-2014 11:58:21',3,5,'Round 1 DisQualified',1),(6,1,7,'03-11-2014 11:58:50',8,6,'Great',1),(7,6,6,'03-11-2014 11:59:06',7,6,'Qualified',1),(8,1,7,'03-11-2014 11:59:06',0,7,'Good',1),(9,3,7,'03-11-2014 11:59:53',10,4,'Great',1),(10,3,7,'03-11-2014 12:00:07',8,8,'Awesome',1),(11,3,7,'03-11-2014 12:00:18',6,10,'Good',1),(12,3,7,'03-11-2014 12:00:37',2,11,'Good',1),(13,5,6,'03-11-2014 12:01:49',4,5,'rty rt',1),(14,5,6,'03-11-2014 12:02:53',5,6,'er',1),(15,5,6,'03-11-2014 12:03:11',0,8,'etetet',1),(16,5,6,'03-11-2014 12:03:28',5,10,'rrtyryryry rytry',1),(17,5,6,'03-11-2014 12:03:38',8,12,'est ryiu',1),(18,4,6,'03-11-2014 17:04:28',7,3,'dsgdsfg',1),(19,6,5,'03-11-2014 17:06:44',3,8,'Round2 Qualified',1),(20,4,6,'03-11-2014 17:06:48',9,4,'dsfg',1),(21,6,5,'03-11-2014 17:32:20',6,10,'Round3 Qualified',1),(22,6,5,'03-11-2014 17:43:30',4,12,'Round4 Qualified',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidates`
--

LOCK TABLES `candidates` WRITE;
/*!40000 ALTER TABLE `candidates` DISABLE KEYS */;
INSERT INTO `candidates` VALUES (1,'sri','krishna','skc@flexeye.com','996-330-9089','06/05/1988',2,'Andhra university',1,2,'2010','83','96','77',NULL,'4','Friend','0311001','03-11-2014 11:54:14',7,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),(2,'Vanicetti','Shalini','sv@flexeye.com','949-230-9779','15/11/1988',1,'HCU',1,1,'2011','84.5','78','78','Flexeye','3.6','Through my COlleague','0311002','03-11-2014 11:54:30',3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),(3,'Sreedevi','Mallemula','sm@flexeye.com','958-149-7306','24/12/1986',1,'SHNT',2,1,'2009','73','79','92','Flexeye','4','Job Portal','0311003','03-11-2014 11:54:32',11,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),(4,'Abhijeet','Kumar VV','akv@flexeye.com','999-999-9999','28/06/1992',2,'sf',1,2,'4444','45','45','45','4','4','4','0311004','03-11-2014 11:54:58',4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),(5,'ShivaRam','Reddy','srk@flexeye.com','900-056-9655','07/02/1992',2,'VBIT',1,1,'2013','83','84','80','Flexeye','1','Monster','0311005','03-11-2014 11:55:58',12,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),(6,'Navaneeth','Reddy','nrm@flexeye.com','123-456-7890','11/11/1992',2,'CMR',1,3,'2013','90','90','90','Flexeye','1','Internet','0311006','03-11-2014 11:56:13',6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1);
/*!40000 ALTER TABLE `candidates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emails`
--

DROP TABLE IF EXISTS `emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emails` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `subject` varchar(250) DEFAULT NULL,
  `body` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emails`
--

LOCK TABLES `emails` WRITE;
/*!40000 ALTER TABLE `emails` DISABLE KEYS */;
INSERT INTO `emails` VALUES (1,'Registration','Confirmation of Registration','<title></title>\r\n<p><span style=\"font-family: Arial; font-size: 12px; \">Dear Candidate,</span></p>\r\n\r\n<div style=\"display: inline; font-family: Calibri; font-size: small; text-decoration: none; \">\r\n<p><span style=\"FONT-SIZE: 12px\"><font face=\"Arial\">'),(2,'Disqualified','Interview Status','<title></title>\r\n<p><span style=\"font-family: Arial; font-size: 12px; \">Dear Candidate,</span></p>\r\n\r\n<div style=\"display: inline; font-family: Calibri; font-size: small; text-decoration: none; \">\r\n<p><span style=\"FONT-SIZE: 12px\"><font face=\"Arial\">'),(3,'Qualified','Interview Status','<title></title>\r\n<p><span style=\"font-family: Arial; font-size: 12px; \">Dear Candidate,</span></p>\r\n\r\n<div style=\"display: inline; font-family: Calibri; font-size: small; text-decoration: none; \">\r\n<p><span style=\"FONT-SIZE: 12px\"><font face=\"Arial\">'),(4,'Intimation','Interview Information','<title></title>\r\n<p><span style=\"font-family: Arial; font-size: 12px; \">Dear Candidate,</span></p>\r\n\r\n<div style=\"display: inline; font-family: Calibri; font-size: small; text-decoration: none; \">\r\n<p><span style=\"FONT-SIZE: 12px\"><font face=\"Arial\">');
/*!40000 ALTER TABLE `emails` ENABLE KEYS */;
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
  `emailTemplate` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Registered','Registration Completed',1,0,1),(2,'Left for Day','Left for Day',2,0,NULL),(3,'Written Test Rejected','Written Test Disqualified',2,0,2),(4,'Written Test Qualified','Written Test Qualified',3,0,3),(5,'Round1 Rejected','Round1 Disqualified',2,1,2),(6,'Round1 Qualified','Round1 Qualified',3,1,3),(7,'Round2 Rejected','Round2 Disqualified',2,2,2),(8,'Round2 Qualified','Round2 Qualified',3,2,3),(9,'Round3 Rejected','Round3 Disqualified',2,3,2),(10,'Round3 Qualified','Round3 Qualified',3,3,3),(11,'Round4 Rejected','Round4 Disqualified',2,4,2),(12,'Round4 Qualified','Round4 Qualified',3,4,3),(13,'Onsite Rejected','Onsite Disqualified',2,5,2),(14,'Onsite Qualified','Onsite Qualified',3,5,3),(15,'HR Rejected','HR Round Disqualified',2,6,2),(16,'HR Qualified','HR Round Qualified',3,6,3),(17,'Final Round Rejected','Final Round Disqualified',2,7,2),(18,'Final Round Qualified','Final Round Qualified',3,7,3);
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

-- Dump completed on 2014-11-03 17:48:07
