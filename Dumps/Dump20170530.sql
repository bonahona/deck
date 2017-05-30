-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: deck
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `eventstatus`
--

DROP TABLE IF EXISTS `eventstatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventstatus` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserId` varchar(128) DEFAULT NULL,
  `EventId` varchar(128) DEFAULT NULL,
  `IsDismissed` int(1) NOT NULL DEFAULT '0',
  `IsSeen` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventstatus`
--

LOCK TABLES `eventstatus` WRITE;
/*!40000 ALTER TABLE `eventstatus` DISABLE KEYS */;
INSERT INTO `eventstatus` VALUES (1,'10210910887321210','348158402245583',0,1),(2,'10210910887321210','180077455790303',0,1),(3,'10210910887321210','1733573373620508',0,1),(4,'10210910887321210','1016388601794922',0,1),(5,'10210910887321210','1165928896849747',0,1),(6,'10210910887321210','1643483819002731',0,1),(7,'10210910887321210','1644250942566017',1,1),(8,'10210910887321210','403798403314410',1,1),(9,'10210910887321210','1011814468918457',0,1),(10,'10210910887321210','916286448474242',0,1),(11,'10210910887321210','402792200097434',0,1),(12,'10210910887321210','321269818253876',0,1),(13,'10210910887321210','1086836598090152',0,1),(14,'10210910887321210','191660957984231',0,1),(15,'10210910887321210','641371476063942',0,1),(16,'10210910887321210','1810691792589747',1,1),(17,'10210910887321210','1889926724561521',0,1),(18,'10210910887321210','493143751017416',0,1),(19,'10210910887321210','1832348970315908',0,1),(20,'10210910887321210','241130823027717',1,1),(21,'10210910887321210','1075034362640758',0,1),(22,'10210910887321210','274402789686719',0,1),(23,'10210910887321210','1798073447176807',0,1),(24,'10210910887321210','172739496536728',0,1),(25,'10210910887321210','1744905982192933',0,1),(26,'10210910887321210','1454776721209446',0,1),(27,'10210910887321210','1941711719382997',0,1),(28,'10210910887321210','206974796481355',0,1),(29,'10210910887321210','1324407520979671',0,1),(30,'10210910887321210','160114117848929',0,1);
/*!40000 ALTER TABLE `eventstatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedtype`
--

DROP TABLE IF EXISTS `feedtype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedtype` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(256) DEFAULT NULL,
  `Description` varchar(2048) DEFAULT NULL,
  `Icon` varchar(256) DEFAULT NULL,
  `TemplateName` varchar(256) DEFAULT NULL,
  `TemplateVariableName` varchar(256) DEFAULT NULL,
  `TemplatePath` varchar(256) DEFAULT NULL,
  `LaneName` varchar(256) DEFAULT NULL,
  `LaneTitle` varchar(256) DEFAULT NULL,
  `JavascriptFunctionName` varchar(256) DEFAULT NULL,
  `DataSourceUrl` varchar(256) DEFAULT NULL,
  `CallbackFunction` varchar(256) DEFAULT NULL,
  `IsUnique` int(1) DEFAULT '0',
  `IsDeleted` int(1) DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedtype`
--

LOCK TABLES `feedtype` WRITE;
/*!40000 ALTER TABLE `feedtype` DISABLE KEYS */;
INSERT INTO `feedtype` VALUES (1,'Facebook pending events','Any event you are invited to but no answer has been given.','fa fa-facebook-official','event-template','eventTemplate','Templates/Event','event-pending','Pending Events','getPendingEvents','/events/pendingevents','updatePendingEvents',0,0),(2,'Facebook coming events','Any event you are interested in, going to or maybe going to.','fa fa-facebook-official','event-template','eventTemplate','Templates/Event','event-coming','Coming Events','getComingEvents','/events/comingevents','updateComingEvents',0,0),(3,'Github','Log from a github repo','fa fa-github','github-log','githubLog','Templates/GithubLog','github-log','Github','1','1','1',0,0),(4,'Facebook pending events - Clone','Any event you are invited to but no answer has been given.','fa fa-facebook-official','event-template','eventTemplate','Templates/Event','event-pending','Pending Events','getPendingEvents','/events/pendingevents','updatePendingEvents',0,1);
/*!40000 ALTER TABLE `feedtype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedtypemeta`
--

DROP TABLE IF EXISTS `feedtypemeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `feedtypemeta` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `DisplayName` varchar(256) DEFAULT NULL,
  `DataName` varchar(256) DEFAULT NULL,
  `IsOptional` int(1) DEFAULT '1',
  `IsDeleted` int(1) DEFAULT '0',
  `FeedTypeId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `FeedTypeId` (`FeedTypeId`),
  CONSTRAINT `feedtypemeta_ibfk_1` FOREIGN KEY (`FeedTypeId`) REFERENCES `feedtype` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedtypemeta`
--

LOCK TABLES `feedtypemeta` WRITE;
/*!40000 ALTER TABLE `feedtypemeta` DISABLE KEYS */;
INSERT INTO `feedtypemeta` VALUES (1,'Path','Path',1,1,1),(2,'Test','Test',0,1,1),(3,NULL,NULL,1,1,1),(4,'Path','Path',0,0,3),(5,'Username','Username',1,0,3),(6,'Password','Passwird',1,0,3);
/*!40000 ALTER TABLE `feedtypemeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `localuser`
--

DROP TABLE IF EXISTS `localuser`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `localuser` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FacebookUserId` varchar(256) DEFAULT NULL,
  `UserLevel` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `localuser`
--

LOCK TABLES `localuser` WRITE;
/*!40000 ALTER TABLE `localuser` DISABLE KEYS */;
INSERT INTO `localuser` VALUES (1,'10210910887321210',1);
/*!40000 ALTER TABLE `localuser` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userfeed`
--

DROP TABLE IF EXISTS `userfeed`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userfeed` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FeedTypeId` int(11) NOT NULL,
  `Width` int(11) NOT NULL DEFAULT '0',
  `IsDeleted` int(11) NOT NULL DEFAULT '0',
  `IsNotify` int(11) NOT NULL DEFAULT '0',
  `LaneId` int(11) NOT NULL DEFAULT '0',
  `UserPageId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `UserPageId` (`UserPageId`),
  KEY `FeedTypeId` (`FeedTypeId`),
  CONSTRAINT `userfeed_ibfk_1` FOREIGN KEY (`UserPageId`) REFERENCES `userpage` (`Id`),
  CONSTRAINT `userfeed_ibfk_2` FOREIGN KEY (`FeedTypeId`) REFERENCES `feedtype` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userfeed`
--

LOCK TABLES `userfeed` WRITE;
/*!40000 ALTER TABLE `userfeed` DISABLE KEYS */;
/*!40000 ALTER TABLE `userfeed` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userfeedmeta`
--

DROP TABLE IF EXISTS `userfeedmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userfeedmeta` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Identifier` varchar(128) DEFAULT NULL,
  `Value` varchar(2048) DEFAULT NULL,
  `UserFeedId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `UserFeedId` (`UserFeedId`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userfeedmeta`
--

LOCK TABLES `userfeedmeta` WRITE;
/*!40000 ALTER TABLE `userfeedmeta` DISABLE KEYS */;
/*!40000 ALTER TABLE `userfeedmeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `userpage`
--

DROP TABLE IF EXISTS `userpage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `userpage` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `NavigationName` varchar(256) DEFAULT NULL,
  `PageTitle` varchar(256) DEFAULT NULL,
  `IsActive` int(1) NOT NULL DEFAULT '0',
  `IsNotify` int(1) NOT NULL DEFAULT '0',
  `IsDeleted` int(1) NOT NULL DEFAULT '0',
  `ShowInMenu` int(1) NOT NULL DEFAULT '0',
  `LocalUserId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `LocalUserId` (`LocalUserId`),
  CONSTRAINT `userpage_ibfk_1` FOREIGN KEY (`LocalUserId`) REFERENCES `localuser` (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `userpage`
--

LOCK TABLES `userpage` WRITE;
/*!40000 ALTER TABLE `userpage` DISABLE KEYS */;
INSERT INTO `userpage` VALUES (1,'test','TEs',1,0,0,1,1),(2,'facebook','Facebook',1,1,0,1,1);
/*!40000 ALTER TABLE `userpage` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-30 17:11:06
