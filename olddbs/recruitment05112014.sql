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
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidateactivities`
--

LOCK TABLES `candidateactivities` WRITE;
/*!40000 ALTER TABLE `candidateactivities` DISABLE KEYS */;
INSERT INTO `candidateactivities` VALUES (1,10,6,'05-11-2014 13:38:06',6,3,'Disqualified',1),(2,9,6,'05-11-2014 13:38:56',5,4,'werwetr ',1),(3,9,6,'05-11-2014 13:39:07',5,6,'4rt 55 65',1),(4,9,6,'05-11-2014 13:39:18',6,8,'35 46575r tutur',1),(5,9,6,'05-11-2014 13:39:31',7,10,'try yyiyiuor tui',1),(6,9,6,'05-11-2014 13:39:43',6,12,'t uu trutru utu',1),(7,7,6,'05-11-2014 13:46:00',7,3,'ery  ',1),(8,8,6,'05-11-2014 13:48:14',3,4,'er 6',1),(9,8,6,'05-11-2014 13:48:27',5,5,'tw 4 y6 574',1),(10,8,6,'05-11-2014 13:48:39',5,6,'4 6455 trfryry yr',1),(11,8,6,'05-11-2014 13:48:51',6,8,'re ty utyiyi tr yuru',1),(12,8,6,'05-11-2014 13:49:18',7,9,'fd ry ur yut u',1),(13,6,6,'05-11-2014 13:49:55',5,4,'rdrt re ',1),(14,6,6,'05-11-2014 13:50:08',4,6,'rt yreyrtt r yrey ',1),(15,6,6,'05-11-2014 13:50:22',7,7,'ert ryu tew ry ryyt',1),(16,1,6,'05-11-2014 13:50:50',7,4,'rteyt y',1),(17,1,6,'05-11-2014 13:50:53',7,4,'rteyt y',1),(18,1,6,'05-11-2014 13:51:05',8,6,' rtyt c5ryr y u reta t ',1),(19,1,6,'05-11-2014 13:51:14',6,8,'tr erytryr',1),(20,1,6,'05-11-2014 13:51:27',8,10,'re yreyry tyr ry',1),(21,2,6,'05-11-2014 13:51:50',6,3,'re rtyriy  rt ',1),(22,3,6,'05-11-2014 13:52:08',5,4,' ertrt rtry ',1),(23,3,6,'05-11-2014 13:52:19',7,6,'r r tuy r er re r',1),(24,4,6,'05-11-2014 13:52:55',5,4,'r eeer ttry',1),(25,4,6,'05-11-2014 13:53:06',6,5,'re yry y',1),(26,5,6,'05-11-2014 13:53:23',4,4,'tr rea tew ',1),(27,5,6,'05-11-2014 13:53:31',8,6,'e rtrt',1),(28,5,6,'05-11-2014 13:53:41',8,8,'e rerr',1),(29,5,6,'05-11-2014 13:53:52',9,10,'e wr  wq we',1),(30,5,6,'05-11-2014 13:54:03',8,12,' ewrererte t',1),(31,12,6,'05-11-2014 14:01:07',6,4,'ww  etere re tetre r',1),(32,1,7,'05-11-2014 16:51:38',4,11,'yep',1),(33,1,7,'05-11-2014 16:51:51',8,12,'yep',1),(34,1,7,'05-11-2014 16:52:03',7,14,'yepp',1),(35,8,7,'05-11-2014 17:18:10',10,10,'qualified',1),(36,11,5,'05-11-2014 17:39:30',6,4,'Written Test Qualified',1),(37,12,5,'05-11-2014 17:39:30',7,6,'R1 Qualified',1);
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
  `isWritten` int(10) DEFAULT NULL,
  `otherSections` int(10) DEFAULT NULL,
  `round1` int(10) DEFAULT NULL,
  `isR1` int(10) DEFAULT NULL,
  `round2` int(10) DEFAULT NULL,
  `isR2` int(10) DEFAULT NULL,
  `round3` int(10) DEFAULT NULL,
  `isR3` int(10) DEFAULT NULL,
  `round4` int(10) DEFAULT NULL,
  `isR4` int(10) DEFAULT NULL,
  `onsite` int(10) DEFAULT NULL,
  `isOnsite` int(10) DEFAULT NULL,
  `hr` int(10) DEFAULT NULL,
  `isHR` int(10) DEFAULT NULL,
  `finalStatus` int(10) DEFAULT NULL,
  `isFinal` int(10) DEFAULT NULL,
  `event` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `regId` (`regId`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `candidates`
--

LOCK TABLES `candidates` WRITE;
/*!40000 ALTER TABLE `candidates` DISABLE KEYS */;
INSERT INTO `candidates` VALUES (1,'sri','krishna','skc@flexeye.com','996-330-9089','06/05/1988',2,'Andhra university',1,2,'2010','83','96','77','FLEXEYE','4','Collage Friend ','0511001','05-11-2014 12:25:40',14,7,1,NULL,8,1,6,1,8,1,8,1,7,NULL,NULL,NULL,NULL,NULL,1),(2,'Vanicetti','Shalini','sv@flexeye.com','949-230-9779','15/11/1988',1,'HCU',1,1,'2011','84.5','82.2','79.4','Flexeye IT Servces','3.6','Through my Colleague.','0511002','05-11-2014 12:25:44',3,6,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),(3,'Sreedevi','Mallemula','sm@flexeye.com','958-149-7306','24/12/1986',1,'SHNT',2,1,'2009','73','73','92','Flexeye','4','Job Portal','0511003','05-11-2014 12:26:19',6,5,1,NULL,7,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),(4,'Jjj','sss','js@flexeye.com',NULL,'01/01/2009',2,'atri',2,6,'2001','60','70','80',NULL,NULL,'Friends','0511004','05-11-2014 12:26:30',5,5,1,NULL,6,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),(5,'Satya','Nadella','sn@flexeye.com','900-000-0000','10/07/1975',2,'IIM',1,1,'2000','90','90','90','Microsoft','15','Job Portal','0511005','05-11-2014 12:27:40',12,4,1,NULL,8,1,8,1,9,1,8,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(6,'ram','babu','aa@aa.aa','999-999-9999','09/09/2099',2,'ABC Collage of Management',2,6,'2011','34','22','50',NULL,NULL,'TPO','0511006','05-11-2014 12:27:46',7,5,1,NULL,4,1,7,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),(7,'Jith','Singh','dngdfg@ds.sf.sdf','789-456-1233','02/02/2005',2,'OU',1,2,'2002','90','90','100','Flexeye','4','Monster','0511007','05-11-2014 12:28:41',3,7,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),(8,'James','Smith','Jamessmith@gmail.com','123-456-7890','12/10/1990',2,'Adam\'s College',1,1,'2013','80','80','80','Fresher','1','Website','0511008','05-11-2014 12:29:44',10,3,1,NULL,5,1,6,1,10,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),(9,'ShivaRam','Reddy','srk@flexeye.com','900-056-9655','07/02/1992',2,'VBIT',1,1,'2013','80','80','80','Flexeye','1','MONSTER','0511009','05-11-2014 13:34:54',12,5,1,NULL,5,1,6,1,7,1,6,1,NULL,NULL,NULL,NULL,NULL,NULL,1),(10,'robert','junior','junior@senior.com','897-897-7292','07/04/1992',2,'MIT',1,4,'2014','90','95','95','Facebook','2','facebook','0511010','05-11-2014 13:36:48',3,6,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),(11,'Navaneeth','Reddy','nrm@flexeye.com','903-086-8598','10/09/1992',2,'CMR',1,3,'2013','90','90','90','Flexeye','1','Internet','0511011','05-11-2014 13:47:20',4,6,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1),(12,'Nav','nrm','nrm1@flexeye.com','234-282-1665','11/02/1991',2,'CMR',1,1,'2013','90','90','90','Flexeye','1','Internet','0511012','05-11-2014 13:51:20',6,6,1,NULL,7,1,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1);
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
  `body` varchar(2500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emails`
--

LOCK TABLES `emails` WRITE;
/*!40000 ALTER TABLE `emails` DISABLE KEYS */;
INSERT INTO `emails` VALUES (1,'Registration','Confirmation of Registration',' You have successfully registered with Flexeye IT Services for the Recruitment Drive.</font></span></p>\r\n\r\n<p><font face=\"Arial\"><span style=\"FONT-SIZE: 12px\"><font face=\"Arial\">Regards,<br />\r\n<span class=\"gD\" style=\"text-align: left; background-color: rgb(255, 255, 255); display: inline; font-family: arial, sans-serif; color: rgb(0, 104, 28); vertical-align: top; font-weight: bold; \">Flexeye Recruitment Team</span></font></span></font><br />\r\n<br />\r\n<span style=\"font-size:12px;\"><span style=\"font-family:arial,helvetica,sans-serif;\"><span style=\"color:#696969;\">This is an automated email sent from recruitment system. Please do not reply to this message.</span></span></span></p>\r\n</div>\">\">\">\">'),(2,'Disqualified','Interview Status','<p><span style=\"font-family: Arial; font-size: 12px; \">Dear Candidate,</span></p>\r\n\r\n<div style=\"display: inline; font-family: Calibri; font-size: small; text-decoration: none; \">\r\n<p><span style=\"FONT-SIZE: 12px\"><font face=\"Arial\">We are sorry that you have not cleared the --status--. Thanks for your participation in the recruitment drive.</font></span></p>\r\n\r\n<p><font face=\"Arial\"><span style=\"FONT-SIZE: 12px\"><font face=\"Arial\">Regards,<br />\r\n<span class=\"gD\" style=\"text-align: left; background-color: rgb(255, 255, 255); display: inline; font-family: arial, sans-serif; color: rgb(0, 104, 28); vertical-align: top; font-weight: bold; \">Flexeye Recruitment Team</span></font></span></font><br />\r\n<br />\r\n<span style=\"font-size:12px;\"><span style=\"font-family:arial,helvetica,sans-serif;\"><span style=\"color:#696969;\">This is an automated email sent from recruitment system. Please do not reply to this message.</span></span></span></p>\r\n</div>'),(3,'Qualified','Interview Status','<p><span style=\"font-family: Arial; font-size: 12px; \">Dear Candidate,</span></p>\r\n\r\n<div style=\"display: inline; font-family: Calibri; font-size: small; text-decoration: none; \">\r\n<p><span style=\"FONT-SIZE: 12px\"><font face=\"Arial\">We congratulate you on qualifying the --status--. You will be intimated about the next level of recruitment shortly.</font></span></p>\r\n\r\n<p><font face=\"Arial\"><span style=\"FONT-SIZE: 12px\"><font face=\"Arial\">Regards,<br />\r\n<span class=\"gD\" style=\"text-align: left; background-color: rgb(255, 255, 255); display: inline; font-family: arial, sans-serif; color: rgb(0, 104, 28); vertical-align: top; font-weight: bold; \">Flexeye Recruitment Team</span></font></span></font><br />\r\n<br />\r\n<span style=\"font-size:12px;\"><span style=\"font-family:arial,helvetica,sans-serif;\"><span style=\"color:#696969;\">This is an automated email sent from recruitment system. Please do not reply to this message.</span></span></span></p>\r\n</div>'),(4,'Intimation','Interview Information','<p><span style=\"font-family: Arial; font-size: 12px; \">Dear Candidate,</span></p>\r\n\r\n<div style=\"display: inline; font-family: Calibri; font-size: small; text-decoration: none; \">\r\n<p><span style=\"FONT-SIZE: 12px\"><font face=\"Arial\">Please make yourself available for --status-- at room --number-- in --time--.</font></span></p>\r\n\r\n<p><font face=\"Arial\"><span style=\"FONT-SIZE: 12px\"><font face=\"Arial\">Regards,<br />\r\n<span class=\"gD\" style=\"text-align: left; background-color: rgb(255, 255, 255); display: inline; font-family: arial, sans-serif; color: rgb(0, 104, 28); vertical-align: top; font-weight: bold; \">Flexeye Recruitment Team</span></font></span></font><br />\r\n<br />\r\n<span style=\"font-size:12px;\"><span style=\"font-family:arial,helvetica,sans-serif;\"><span style=\"color:#696969;\">This is an automated email sent from recruitment system. Please do not reply to this message.</span></span></span></p>\r\n</div>'),(5,'Left',NULL,NULL),(6,'test','testing','drtydrnm'),(7,'test1','test12','Dear Candidate,</span></p>\r\n\r\n<div style=\"display: inline; font-family: Calibri; font-size: small; text-decoration: none; \">\r\n<p><span style=\"FONT-SIZE: 12px\"><font face=\"Arial\">Please make yourself available for --status-- at room --number-- in --time--.</font></span></p>\r\n\r\n<p><font face=\"Arial\"><span style=\"FONT-SIZE: 12px\"><font face=\"Arial\">Regards,<br />\r\n<span class=\"gD\" style=\"text-align: left; background-color: rgb(255, 255, 255); display: inline; font-family: arial, sans-serif; color: rgb(0, 104, 28); vertical-align: top; font-weight: bold; \">Flexeye Recruitment Team</span></font></span></font><br />\r\n<br />\r\n<span style=\"font-size:12px;\"><span style=\"font-family:arial,helvetica,sans-serif;\"><span style=\"color:#696969;\">This is an automated email sent from recruitment system. Please do not reply to this message.</span></span></span></p>\r\n</div>\">');
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
  `evtDate` varchar(250) DEFAULT NULL,
  `evtDetails` varchar(250) DEFAULT NULL,
  `evtCutOff` int(10) DEFAULT NULL,
  `evtYearFrom` int(10) DEFAULT NULL,
  `evtYearTo` int(10) DEFAULT NULL,
  `evtDM` varchar(50) DEFAULT NULL,
  `isActive` int(10) DEFAULT NULL,
  `isEmail` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `events`
--

LOCK TABLES `events` WRITE;
/*!40000 ALTER TABLE `events` DISABLE KEYS */;
INSERT INTO `events` VALUES (1,'ST Peters Engineering College','Dhulapally','2014-09-27 09:30:00','ST Peters Engineering College',50,2010,NULL,'Test',NULL,1),(2,'Testing','Test','05-11-2014 11:53:50','Test',75,2011,NULL,'Test',1,NULL);
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
INSERT INTO `staff` VALUES (1,'vn@flexeye.com','vn@flexeye.com','Admin','Vamsi'),(2,'sc@flexeye.com','sc@flexeye.com','Admin','Srini'),(3,'pm@flexeye.com','pm@flexeye.com','Admin','Pallavi'),(4,'js@flexeye.com','js@flexeye.com','Staff','Jitender'),(5,'nrm@flexeye.com','nrm@flexeye.com','Staff','Navaneeth'),(6,'srk@flexeye.com','srk@flexeye.com','Staff','Shiva Ram'),(7,'akv@flexeye.com','akv@flexeye.com','Staff','Abhijeet'),(8,'skc@flexeye.com','skc@flexeye.com','Staff','Sri Krishna'),(9,'sv@flexeye.com','sv@flexeye.com','Staff','Shalini'),(10,'Guest','Guest','Guest','Guest');
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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `status`
--

LOCK TABLES `status` WRITE;
/*!40000 ALTER TABLE `status` DISABLE KEYS */;
INSERT INTO `status` VALUES (1,'Registered','Registration Completed',1,0,1),(2,'Left for Day','Left for Day',2,0,5),(3,'Written Test Rejected','Written Test Disqualified',2,0,2),(4,'Written Test Qualified','Written Test Qualified',3,0,3),(5,'Round1 Rejected','R1 Disqualified',2,1,2),(6,'Round1 Qualified','R1 Qualified',3,1,3),(7,'Round2 Rejected','R2 Disqualified',2,2,2),(8,'Round2 Qualified','R2 Qualified',3,2,3),(9,'Round3 Rejected','R3 Disqualified',2,3,2),(10,'Round3 Qualified','R3 Qualified',3,3,3),(11,'Round4 Rejected','R4 Disqualified',2,4,2),(12,'Round4 Qualified','R4 Qualified',3,4,3),(13,'Onsite Rejected','Onsite Disqualified',2,5,2),(14,'Onsite Qualified','Onsite Qualified',3,5,3),(15,'HR Rejected','HR Round Disqualified',2,6,2),(16,'HR Qualified','HR Round Qualified',3,6,3),(17,'Final Round Rejected','Final Round Disqualified',2,7,2),(18,'Final Round Qualified','Final Round Qualified',3,7,3),(19,NULL,NULL,NULL,NULL,NULL),(20,NULL,NULL,NULL,NULL,NULL),(21,NULL,NULL,NULL,NULL,NULL),(22,NULL,NULL,NULL,NULL,NULL),(23,NULL,NULL,NULL,NULL,NULL);
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

-- Dump completed on 2014-11-05 21:49:53
