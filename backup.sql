-- MySQL dump 10.13  Distrib 5.7.28, for Linux (x86_64)
--
-- Host: localhost    Database: labs_registration_system
-- ------------------------------------------------------
-- Server version	5.7.28-0ubuntu0.18.04.4

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (112233,'Admin.112233');
/*!40000 ALTER h40lg7qyub2umdvb.cbetxkdyhwsb.us-east-1.rds.amazonaws.com TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hall`
--

DROP TABLE IF EXISTS `hall`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hall` (
  `Seat Count` int(11) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `hallName` varchar(12) NOT NULL,
  PRIMARY KEY (`hallName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hall`
--

LOCK TABLES `hall` WRITE;
/*!40000 ALTER TABLE `hall` DISABLE KEYS */;
INSERT INTO `hall` VALUES
(25,20,'CIS02'),
(20,25,'CIS03'),
(20,28,'CIS05'),
(20,28,'CIS06');
/*!40000 ALTER TABLE `hall` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lab`
--

DROP TABLE IF EXISTS `lab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lab` (
  `symbol` varchar(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `section` int(2) NOT NULL,
  `day` varchar(3) NOT NULL,
  `time` time NOT NULL,
  `hall` varchar(20) NOT NULL,
  `Registered` int(11) NOT NULL,
  PRIMARY KEY (`symbol`,`section`),
  KEY `hall` (`hall`),
  CONSTRAINT `lab_ibfk_1` FOREIGN KEY (`hall`) REFERENCES `hall` (`hallName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lab`
--

LOCK TABLES `lab` WRITE;
/*!40000 ALTER TABLE `lab` DISABLE KEYS */;
INSERT INTO `lab` VALUES
('CIS221','Fundamentals of Database System	',1,'SUN','02:30:00','CIS02',2),
('CIS221','Fundamentals of Database System',2,'MON','08:30:00','CIS06',1),
('CIS221','Fundamentals of Database System',3,'MON','03:00:00','CIS03',0),
('CIS221','Fundamentals of Database System',4,'TUE','08:30:00','CIS03',1),
('CIS221','Fundamentals of Database System',5,'TUE','11:30:00','CIS03',0),
('CIS221','Fundamentals of Database System',6,'WED','08:30:00','CIS02',0),
('CIS221','Fundamentals of Database System',7,'WED','10:30:00','CIS03',0),
('CIS221','Fundamentals of Database System',8,'WED','02:30:00','CIS06',0),
('CIS221','Fundamentals of Database System',9,'WED','04:30:00','CIS03',0),
('CIS341','Web applications development',1,'MON','11:30:00','CIS02',0),
('CIS341','Web applications development',2,'MON','02:30:00','CIS03',0),
('CIS341','Web applications development',3,'TUE','02:30:00','CIS02',5),
('CIS341','Web applications development',4,'WED','08:30:00','CIS06',0),
('CIS341','Web applications development',5,'THU','08:30:00','CIS03',0),
('CIS421','DATABASE Applications',1,'SUN','08:30:00','CIS03',1),
('CIS421','DATABASE Applications',2,'MON','02:30:00','CIS06',0),
('CIS421','DATABASE Applications',3,'WED','08:30:00','CIS03',1),
('CIS421','DATABASE Applications',4,'THU','02:30:00','CIS03',1),
('CIS441','Business Data Communication',1,'MON','08:30:00','CIS02',0),
('CIS441','Business Data Communication',2,'MON','02:30:00','CIS05',0),
('CIS441','Business Data Communication',3,'WED','11:30:00','CIS02',0);
/*!40000 ALTER TABLE `lab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Age` int(3) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES
(114111,'sham','Ayah.114111',23),
(114170,'Ayah Alrifai','Ayah.114170',23),
(114200,'Nadeen Nader','Nadeen.114200',23),
(114207,'Rawan Alsmadi','Rawan.114207',23),
(114364,'Shatha Mallak','Shatha.114364',23);
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `studentlabs`
--

DROP TABLE IF EXISTS `studentlabs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `studentlabs` (
  `studentID` int(11) NOT NULL,
  `labSymbol` varchar(11) NOT NULL,
  `section` int(11) NOT NULL,
  KEY `studentID` (`studentID`),
  KEY `labSymbol` (`labSymbol`,`section`),
  CONSTRAINT `studentlabs_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `student` (`ID`),
  CONSTRAINT `studentlabs_ibfk_2` FOREIGN KEY (`labSymbol`, `section`) REFERENCES `lab` (`symbol`, `section`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `studentlabs`
--

LOCK TABLES `studentlabs` WRITE;
/*!40000 ALTER TABLE `studentlabs` DISABLE KEYS */;
INSERT INTO `studentlabs` VALUES
(114200,'CIS341',3),
(114200,'CIS221',1),
(114207,'CIS341',3),
(114207,'CIS221',1),
(114207,'CIS421',1),
(114364,'CIS221',2),
(114364,'CIS341',3),
(114364,'CIS421',4),
(114111,'CIS341',3),
(114111,'CIS221',4),
(114170,'CIS341',3),
(114170,'CIS421',3);
/*!40000 ALTER TABLE `studentlabs` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-12-26  0:13:49
