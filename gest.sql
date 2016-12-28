-- MySQL dump 10.13  Distrib 5.5.50, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: gest
-- ------------------------------------------------------
-- Server version	5.5.50-0ubuntu0.14.04.1

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
-- Table structure for table `avvocati`
--

DROP TABLE IF EXISTS `avvocati`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `avvocati` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `cognome` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(40) NOT NULL DEFAULT '310f33551bf8516f35af19723698ebcf9d659d1e',
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `avvocati`
--

LOCK TABLES `avvocati` WRITE;
/*!40000 ALTER TABLE `avvocati` DISABLE KEYS */;
/*!40000 ALTER TABLE `avvocati` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `azioni`
--

DROP TABLE IF EXISTS `azioni`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `azioni` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descr` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `date_create` datetime NOT NULL,
  `date_edit` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `azioni`
--

LOCK TABLES `azioni` WRITE;
/*!40000 ALTER TABLE `azioni` DISABLE KEYS */;
INSERT INTO `azioni` VALUES (1,'ffff',1,'2016-12-28 19:32:43',NULL),(2,'prova',1,'2016-12-28 19:37:38',NULL),(3,'prova',1,'2016-12-28 19:37:55',NULL),(4,'prova 2',1,'2016-12-28 19:45:41',NULL),(5,'44234prova 2',1,'2016-12-28 19:47:07',NULL);
/*!40000 ALTER TABLE `azioni` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campi`
--

DROP TABLE IF EXISTS `campi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campi` (
  `id` int(11) NOT NULL,
  `id_azioni` int(11) NOT NULL,
  `descrizione` varchar(100) NOT NULL,
  `editabile` int(11) NOT NULL DEFAULT '0',
  `date_create` datetime NOT NULL,
  `date_edit` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campi`
--

LOCK TABLES `campi` WRITE;
/*!40000 ALTER TABLE `campi` DISABLE KEYS */;
/*!40000 ALTER TABLE `campi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
INSERT INTO `ci_sessions` VALUES ('c026f7ea7c5955c7929e31d90c9c84f0b7b458da','127.0.0.1',1482947027,'__ci_last_regenerate|i:1482946968;'),('6a9457fc1048054217374c2f4e8eb56f7b5eef3a','127.0.0.1',1482947460,'__ci_last_regenerate|i:1482947317;'),('1e1bcab3f3a021bb7e2ab2abf5efc1ee705e6a3c','127.0.0.1',1482949398,'__ci_last_regenerate|i:1482949122;'),('ebcc90bf3e046fef253f62f77b6fc2375ae119a1','127.0.0.1',1482949704,'__ci_last_regenerate|i:1482949603;'),('f8c629102ed961de389ac8ffc3ab997f4055bd8d','127.0.0.1',1482950197,'__ci_last_regenerate|i:1482949921;'),('7aae50807ad51243f943b9c3dfe7aae60e7d411b','127.0.0.1',1482950275,'__ci_last_regenerate|i:1482950255;'),('fe552e5f476c93a91648713139a7a41717030083','127.0.0.1',1482950827,'__ci_last_regenerate|i:1482950647;'),('dde34a8337fefafb9985aff7183c48db3a8d282f','127.0.0.1',1482951370,'__ci_last_regenerate|i:1482951126;'),('b798b4050f734c91df3e6dee1d77af4b5b10d4be','127.0.0.1',1482951735,'__ci_last_regenerate|i:1482951614;');
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `record`
--

DROP TABLE IF EXISTS `record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `record` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_campi` int(11) NOT NULL,
  `id_editor` int(11) NOT NULL DEFAULT '0',
  `valore` varchar(100) NOT NULL,
  `date_create` datetime NOT NULL,
  `date_edit` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `record`
--

LOCK TABLES `record` WRITE;
/*!40000 ALTER TABLE `record` DISABLE KEYS */;
/*!40000 ALTER TABLE `record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `record_log`
--

DROP TABLE IF EXISTS `record_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `record_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_campi` int(11) NOT NULL,
  `id_editor` int(11) NOT NULL DEFAULT '0',
  `valore` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `record_log`
--

LOCK TABLES `record_log` WRITE;
/*!40000 ALTER TABLE `record_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `record_log` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-12-28 20:56:53
