-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: scrum
-- ------------------------------------------------------
-- Server version	5.7.12-log

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
-- Table structure for table `card_files`
--

DROP TABLE IF EXISTS `card_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `card_files` (
  `card_id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `card_files`
--

LOCK TABLES `card_files` WRITE;
/*!40000 ALTER TABLE `card_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `card_files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `card_members`
--

DROP TABLE IF EXISTS `card_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `card_members` (
  `card_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `card_members`
--

LOCK TABLES `card_members` WRITE;
/*!40000 ALTER TABLE `card_members` DISABLE KEYS */;
/*!40000 ALTER TABLE `card_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cards`
--

DROP TABLE IF EXISTS `cards`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cards` (
  `card_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `card_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `card_column` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_priority` tinyint(1) NOT NULL,
  `card_duedate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `start_timer` int(11) NOT NULL DEFAULT '1471773019',
  `pause_timer` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`card_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cards`
--

LOCK TABLES `cards` WRITE;
/*!40000 ALTER TABLE `cards` DISABLE KEYS */;
INSERT INTO `cards` (`card_id`, `project_id`, `card_title`, `card_column`, `is_priority`, `card_duedate`, `start_timer`, `pause_timer`) VALUES (1,1,'tset','',0,'0000-00-00 00:00:00',1471773019,0),(2,1,'teste','',0,'0000-00-00 00:00:00',1471773019,0),(3,1,'test','',0,'0000-00-00 00:00:00',1471773019,0),(4,0,'asdfg','',0,'0000-00-00 00:00:00',1471773019,0),(5,0,'ttssdfkk','',0,'0000-00-00 00:00:00',1471773019,0),(6,0,'sdfgsdgsdgf','',0,'0000-00-00 00:00:00',1471773019,0),(7,0,'dfgsdfg','',0,'0000-00-00 00:00:00',1471773019,0),(8,0,'tessstt','',0,'0000-00-00 00:00:00',1471773019,0),(9,0,'zxcvbn','',0,'0000-00-00 00:00:00',1471773019,0),(10,0,'ZXCV','',0,'0000-00-00 00:00:00',1471773019,0),(11,0,'TEST','',0,'0000-00-00 00:00:00',1471773019,0),(12,0,'x','',0,'0000-00-00 00:00:00',1471773019,0),(13,0,'qwert','',0,'0000-00-00 00:00:00',1471773019,0),(14,0,'xcv','',0,'0000-00-00 00:00:00',1471773019,0),(15,0,'dx','',0,'0000-00-00 00:00:00',1471773019,0),(16,0,'xxvx','',0,'0000-00-00 00:00:00',1471773019,0),(17,0,'zczxc','',0,'0000-00-00 00:00:00',1471773019,0),(18,0,'xc','',0,'0000-00-00 00:00:00',1471773019,0),(19,0,'xv','',0,'0000-00-00 00:00:00',1471773019,0),(20,1,'ZXCZC','',0,'0000-00-00 00:00:00',1471773019,0),(21,0,'xdv','',0,'0000-00-00 00:00:00',1471773019,0),(22,0,'asdczxc','',0,'0000-00-00 00:00:00',1471773019,0),(23,1,'qazxswedc','',0,'0000-00-00 00:00:00',1471773019,0),(24,1,'zx','',0,'0000-00-00 00:00:00',1471773019,0),(25,1,'z','',0,'0000-00-00 00:00:00',1471773019,0),(26,1,'z','',0,'0000-00-00 00:00:00',1471773019,0),(27,1,'x\n','',0,'0000-00-00 00:00:00',1471773019,0);
/*!40000 ALTER TABLE `cards` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `card_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`migration`, `batch`) VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2016_07_03_103937_projects_table',2),('2016_07_03_143139_projects_table',3),('2016_07_03_144921_create_projects_table',4),('2016_07_16_152241_create_project_members_table',5),('2016_07_26_160516_create_cards_table',6),('2016_07_26_162042_create_card_members_table',6),('2016_07_26_162051_create_card_files_table',6),('2016_08_21_085237_added_timer',7),('2016_08_21_231134_create_comments_table',7),('2016_08_22_050201_drop_project_columns',7);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_members`
--

DROP TABLE IF EXISTS `project_members`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `project_members` (
  `member_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_members`
--

LOCK TABLES `project_members` WRITE;
/*!40000 ALTER TABLE `project_members` DISABLE KEYS */;
/*!40000 ALTER TABLE `project_members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `projects` (
  `project_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `project_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `project_manager_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` (`project_id`, `project_name`, `project_manager_id`, `created_at`, `updated_at`) VALUES (1,'project_01','01','0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'project 02','01','0000-00-00 00:00:00','0000-00-00 00:00:00'),(3,'test','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(4,'test02','','0000-00-00 00:00:00','0000-00-00 00:00:00'),(5,'test04','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),(6,'test05','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),(8,'teest07','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),(9,'test08','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),(10,'test09','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),(11,'test10','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),(12,'test11','1','0000-00-00 00:00:00','0000-00-00 00:00:00'),(13,'testt20','2','0000-00-00 00:00:00','0000-00-00 00:00:00'),(14,'TEST21','2','0000-00-00 00:00:00','0000-00-00 00:00:00'),(15,'ASDFGH','2','0000-00-00 00:00:00','0000-00-00 00:00:00'),(16,'test21','1','0000-00-00 00:00:00','0000-00-00 00:00:00');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES (1,'admin','johnjayanora@gmail.com','$2y$10$SpB.TQIiG9BPQeFJdlgIweaAgHBqhgkhBWuyKNbqt/rXC9QV7oiRK','tNcNrMVsDJN6seCtQJ2HkkxJbhGA9NfvBh6uYfHnKju4nH1sIYp5QUEqGQvX','2016-06-22 03:07:15','2016-08-19 03:08:52'),(2,'john','johnjayanora@gnail.com','$2y$10$bkjCreSNGqRmJG0oTICFcOg5UeYTZkNGlv.Jxb5DTLhB8gCfNrdcm','ClyikQRW6IakXbuTQyJU30f3pfY4EX3EDT6BHYBcwXR8SMpaRjkJGEB6Icol','2016-07-06 13:30:35','2016-08-15 07:05:01');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-23 12:00:51
