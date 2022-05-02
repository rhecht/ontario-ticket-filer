-- MySQL dump 10.13  Distrib 5.5.34, for Linux (x86_64)
--
-- Host: localhost    Database: irise_projects_ttsfiler_db
-- ------------------------------------------------------
-- Server version	5.5.34-cll

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
-- Table structure for table `t_admins`
--

DROP TABLE IF EXISTS `t_admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_admins` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) NOT NULL DEFAULT '0',
  `admin_fname` varchar(255) DEFAULT NULL,
  `admin_lname` varchar(255) DEFAULT NULL,
  `admin_password` varchar(1024) NOT NULL,
  `admin_email_addr` text NOT NULL,
  `admin_phone` varchar(50) DEFAULT NULL,
  `admin_dateadded` datetime DEFAULT NULL,
  `admin_datemodified` datetime DEFAULT NULL,
  `admin_datedelete` datetime DEFAULT NULL,
  `active` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_admins`
--

LOCK TABLES `t_admins` WRITE;
/*!40000 ALTER TABLE `t_admins` DISABLE KEYS */;
INSERT INTO `t_admins` VALUES (10,'rafihecht','Rafi','Hecht','be6d724989161e83eadae161845332cf','rh@irisemedia.com','14168407749','2012-10-23 21:08:57','2013-01-22 13:43:07',NULL,1);
/*!40000 ALTER TABLE `t_admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_content`
--

DROP TABLE IF EXISTS `t_content`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_content` (
  `tc_id` int(10) NOT NULL AUTO_INCREMENT,
  `tc_page_name` varchar(1024) DEFAULT NULL,
  `tc_title` varchar(1024) DEFAULT NULL,
  `tc_content` longtext,
  `tc_content2` longtext,
  `tc_content3` longtext,
  `tc_content4` longtext,
  `tc_meta_keywords` longtext,
  `tc_meta_description` longtext,
  `tc_date_created` datetime DEFAULT NULL,
  `tc_date_modified` datetime DEFAULT NULL,
  `tc_date_removed` datetime DEFAULT NULL,
  `tc_active` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`tc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_content`
--

LOCK TABLES `t_content` WRITE;
/*!40000 ALTER TABLE `t_content` DISABLE KEYS */;
INSERT INTO `t_content` VALUES (1,'test','test','test 12345\n\n\ndkngfkmdnfmgn','','','','','test desc','0000-00-00 00:00:00','2012-10-23 20:38:09','0000-00-00 00:00:00',0);
/*!40000 ALTER TABLE `t_content` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_emails`
--

DROP TABLE IF EXISTS `t_emails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_emails` (
  `email_id` int(10) NOT NULL AUTO_INCREMENT,
  `email_subject` varchar(50) DEFAULT NULL,
  `email_message` longtext,
  `email_date_sent` datetime DEFAULT NULL,
  `email_from_name` varchar(255) DEFAULT NULL,
  `email_from_email` varchar(255) DEFAULT NULL,
  `email_form_type` varchar(255) DEFAULT NULL,
  `email_ip_address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`email_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_emails`
--

LOCK TABLES `t_emails` WRITE;
/*!40000 ALTER TABLE `t_emails` DISABLE KEYS */;
INSERT INTO `t_emails` VALUES (1,'test',NULL,'2012-08-07 20:18:17','Rafi Hecht','info@irisemedia.com','Contact Form','174.116.136.227'),(2,'test','Email from TTS: test','2012-08-07 20:18:35','Rafi Hecht','info@irisemedia.com','Contact Form','174.116.136.227'),(3,'Ticket Time Saver Password Reminder','Your Password Reset Link is: http://projects.irisemedia.com/ttsfiler/index.php/accounts/lost_password_new_password/user/1/key/5666408','2012-08-08 18:36:14','rhecht@gmail.com','rhecht@gmail.com','Contact Form','174.116.136.227'),(4,'Ticket Time Saver Password Reminder','Your Password Reset Link is: http://projects.irisemedia.com/ttsfiler/index.php/accounts/lost_password_new_password/user/1/key/3371158','2012-08-08 18:36:20','rhecht@gmail.com','rhecht@gmail.com','Contact Form','174.116.136.227'),(5,'Ticket Time Saver Password Reminder','Your Password Reset Link is: http://projects.irisemedia.com/ttsfiler/index.php/accounts/lost_password_new_password/user/1/key/1169866','2012-08-08 18:36:42','rhecht@gmail.com','rhecht@gmail.com','Contact Form','174.116.136.227'),(6,'Ticket Time Saver Password Reminder','Your Password Reset Link is: http://projects.irisemedia.com/ttsfiler/index.php/accounts/lost_password_new_password/user/1/key/2874010','2012-08-08 18:38:18','rhecht@gmail.com','rhecht@gmail.com','Contact Form','174.116.136.227');
/*!40000 ALTER TABLE `t_emails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_rel_tickets_user`
--

DROP TABLE IF EXISTS `t_rel_tickets_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_rel_tickets_user` (
  `tu_id` int(10) NOT NULL AUTO_INCREMENT,
  `tu_userid` int(10) DEFAULT NULL,
  `tu_ticketid` int(10) DEFAULT NULL,
  `tu_active` int(10) DEFAULT NULL,
  PRIMARY KEY (`tu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_rel_tickets_user`
--

LOCK TABLES `t_rel_tickets_user` WRITE;
/*!40000 ALTER TABLE `t_rel_tickets_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `t_rel_tickets_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_site`
--

DROP TABLE IF EXISTS `t_site`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_site` (
  `site_id` int(10) NOT NULL AUTO_INCREMENT,
  `site_title` text,
  `site_content` mediumtext,
  `date_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`site_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_site`
--

LOCK TABLES `t_site` WRITE;
/*!40000 ALTER TABLE `t_site` DISABLE KEYS */;
INSERT INTO `t_site` VALUES (1,'Some Title','content 1','0000-00-00 00:00:00'),(2,'Another Title','content 2',NULL),(3,'test3','content 3',NULL),(4,'0','0',NULL),(5,'another test test','this is another test test',NULL);
/*!40000 ALTER TABLE `t_site` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_tickets`
--

DROP TABLE IF EXISTS `t_tickets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_tickets` (
  `ticket_id` int(10) NOT NULL AUTO_INCREMENT,
  `ticket_name` varchar(255) DEFAULT NULL,
  `ticket_offence_date` datetime DEFAULT NULL,
  `ticket_type` int(1) DEFAULT NULL,
  `ticket_booking_fee_status` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ticket_is_paid` int(10) DEFAULT NULL,
  `ticket_session_marker` varchar(50) DEFAULT NULL,
  `date_added` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  `date_deleted` datetime DEFAULT NULL,
  `active` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`ticket_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_tickets`
--

LOCK TABLES `t_tickets` WRITE;
/*!40000 ALTER TABLE `t_tickets` DISABLE KEYS */;
INSERT INTO `t_tickets` VALUES (1,'this is a test234','2013-01-15 18:02:33',1,1,1,1,NULL,'2012-10-03 18:02:49','2012-10-24 16:12:32','0000-00-00 00:00:00',1),(2,'this is test 2345','2013-01-15 18:02:33',1,0,1,0,'1026191','2012-10-03 22:36:16','2012-10-23 18:32:24','0000-00-00 00:00:00',0),(3,NULL,'2013-01-15 18:02:33',1,1,1,NULL,NULL,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00',1),(4,NULL,'2013-01-15 18:02:33',1,0,1,NULL,NULL,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00',1),(5,NULL,'2013-01-15 18:02:33',1,0,1,NULL,NULL,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00',1),(6,NULL,'2013-01-15 18:02:33',1,0,1,NULL,NULL,'0000-00-00 00:00:00',NULL,'0000-00-00 00:00:00',1),(7,NULL,'2013-01-15 18:02:33',1,1,1,1,NULL,'2012-07-18 04:34:50','2013-01-31 17:15:25','0000-00-00 00:00:00',1),(8,NULL,'2013-01-15 18:02:33',1,1,1,NULL,NULL,'2012-07-25 22:08:13',NULL,'0000-00-00 00:00:00',1),(9,NULL,'2013-01-15 18:02:33',3,1,1,NULL,NULL,'2012-07-27 04:20:47',NULL,'0000-00-00 00:00:00',1),(10,NULL,'2013-01-15 18:02:33',2,1,1,NULL,NULL,'2012-07-27 04:31:44',NULL,'0000-00-00 00:00:00',1),(11,NULL,'2013-01-15 18:02:33',2,0,7,NULL,NULL,'2012-07-31 14:38:15',NULL,'0000-00-00 00:00:00',1),(12,NULL,'2013-01-15 18:02:33',2,1,1,1,'','2012-07-31 16:00:22','2012-10-24 16:05:02','0000-00-00 00:00:00',1),(13,NULL,'2013-01-15 18:02:33',2,1,1,1,'','2012-08-08 21:17:25','2012-10-24 16:05:02','0000-00-00 00:00:00',1),(14,NULL,'2013-01-15 18:02:33',2,0,8,NULL,NULL,'2012-10-15 21:58:23',NULL,'0000-00-00 00:00:00',1),(15,NULL,'2013-01-15 18:02:33',3,0,8,NULL,NULL,'2012-10-15 22:33:52',NULL,'0000-00-00 00:00:00',1),(16,NULL,'2013-01-15 18:02:33',3,0,8,NULL,NULL,'2012-10-15 22:34:26',NULL,'0000-00-00 00:00:00',1),(17,NULL,'2013-01-15 18:02:33',1,0,8,NULL,NULL,'2012-10-15 22:44:00',NULL,'0000-00-00 00:00:00',1),(18,NULL,'1969-12-31 19:00:00',3,0,1,NULL,NULL,'2013-02-27 18:34:05',NULL,NULL,1),(19,NULL,'1969-12-31 19:00:00',3,0,1,NULL,NULL,'2013-02-27 18:34:10',NULL,NULL,1);
/*!40000 ALTER TABLE `t_tickets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_tickets_booking_fee_status`
--

DROP TABLE IF EXISTS `t_tickets_booking_fee_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_tickets_booking_fee_status` (
  `tbfs_id` int(10) NOT NULL AUTO_INCREMENT,
  `tbfs_name` varchar(255) DEFAULT NULL,
  `active` int(10) DEFAULT NULL,
  PRIMARY KEY (`tbfs_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_tickets_booking_fee_status`
--

LOCK TABLES `t_tickets_booking_fee_status` WRITE;
/*!40000 ALTER TABLE `t_tickets_booking_fee_status` DISABLE KEYS */;
INSERT INTO `t_tickets_booking_fee_status` VALUES (0,'Pending - Unpaid',1),(1,'Paid',1);
/*!40000 ALTER TABLE `t_tickets_booking_fee_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_tickets_general_details`
--

DROP TABLE IF EXISTS `t_tickets_general_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_tickets_general_details` (
  `ttgd_id` int(10) NOT NULL AUTO_INCREMENT,
  `ttgd_ticket_id` int(10) DEFAULT NULL,
  `ttgd_fullname` varchar(1024) DEFAULT NULL,
  `ttgd_address` varchar(2000) DEFAULT NULL,
  `ttgd_apt` varchar(10) DEFAULT NULL,
  `ttgd_municipality` varchar(255) DEFAULT NULL,
  `ttgd_province_state` varchar(255) DEFAULT NULL,
  `ttgd_postal_zip_code` varchar(50) DEFAULT NULL,
  `ttgd_icon` varchar(255) DEFAULT NULL,
  `ttgd_offence_num` varchar(255) DEFAULT NULL,
  `ttgd_offence_date` datetime DEFAULT NULL,
  `ttgd_officer_attend_trial` tinyint(2) DEFAULT NULL,
  `ttgd_intend_to_appear_in_court` tinyint(2) DEFAULT NULL,
  `ttgd_intend_to_appear_in_court_fr` tinyint(2) DEFAULT NULL,
  `ttgd_intend_to_appear_in_court_date` datetime DEFAULT NULL,
  `ttgd_languageinterpreter` varchar(50) DEFAULT NULL,
  `ttgd_fr_languageinterpreter` varchar(50) DEFAULT NULL,
  `ttgd_signature` varchar(2000) DEFAULT NULL,
  `ttgd_signature_date` datetime DEFAULT NULL,
  `ttgd_rep_name` varchar(1024) DEFAULT NULL,
  `ttgd_rep_address` varchar(2000) DEFAULT NULL,
  `ttgd_rep_apt` varchar(10) DEFAULT NULL,
  `ttgd_rep_province_state` varchar(255) DEFAULT NULL,
  `ttgd_rep_street` varchar(255) DEFAULT NULL,
  `ttgd_rep_municipality` varchar(255) DEFAULT NULL,
  `ttgd_rep_postal_zip_code` varchar(50) DEFAULT NULL,
  `ttgd_date_added` datetime DEFAULT NULL,
  `ttgd_date_modified` datetime DEFAULT NULL,
  `ttgd_date_deleted` datetime DEFAULT NULL,
  `ttgd_pending_status` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`ttgd_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_tickets_general_details`
--

LOCK TABLES `t_tickets_general_details` WRITE;
/*!40000 ALTER TABLE `t_tickets_general_details` DISABLE KEYS */;
INSERT INTO `t_tickets_general_details` VALUES (1,3,'Rafi Hecht','4 Meadowbrook Road','4','Toronto','Ontario','M6B 2S4','111','111','0000-00-00 00:00:00',1,1,0,'0000-00-00 00:00:00','Greek',NULL,'',NULL,'Ticket Time Saver','875 Eglinton Avenue West, Suite 210','Suite 210','Ontario','Eglinton Avenue West','Toronto','M6C 3Z9','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(2,4,'Joe Blo','123 anywhere lane','1234','Toronto','ON','m123','1234','not offence','0000-00-00 00:00:00',1,1,1,'0000-00-00 00:00:00',NULL,NULL,'',NULL,'Ticket Time Saver','875 Eglinton Avenue West, Suite 210','Suite 210','Ontario','Eglinton Avenue West','Toronto','M6C 3Z9','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL),(3,5,'Rafi Hecht','4 Meadowbrook Road, #4','4','Toronto','Ontario','M6B2S4','1234','12345','2012-07-19 00:00:00',1,1,0,'0000-00-00 00:00:00',NULL,NULL,'',NULL,'Ticket Time Saver','875 Eglinton Avenue West, Suite 210','Suite 210','Ontario','Eglinton Avenue West','Toronto','M6C 3Z9','2012-07-18 00:00:00','2012-07-18 00:00:00',NULL,NULL),(4,6,'Rafi Hecht','4 Meadowbrook Road, #4','4','Toronto','Ontario','M6B2S4','1234','12345','2012-07-19 00:00:00',1,1,0,'0000-00-00 00:00:00',NULL,NULL,'',NULL,'Ticket Time Saver','875 Eglinton Avenue West, Suite 210','Suite 210','Ontario','Eglinton Avenue West','Toronto','M6C 3Z9','2012-07-18 00:00:00','2012-07-18 00:00:00',NULL,NULL),(5,7,'Rafi Hecht','4 Meadowbrook Road, #4','4','Toronto','Ontario','M6B2S4','1234','12345','2012-07-19 00:00:00',1,1,0,'0000-00-00 00:00:00','Russian',NULL,'',NULL,'Ticket Time Saver','875 Eglinton Avenue West, Suite 210','Suite 210','Ontario','Eglinton Avenue West','Toronto','M6C 3Z9','2012-07-18 04:34:50','2012-07-18 04:34:50',NULL,NULL),(6,8,'Rafi Hecht','1','1','1','1','1','1111','1','2012-07-24 00:00:00',1,1,1,'0000-00-00 00:00:00','','','','0000-00-00 00:00:00','Ticket Time Saver','875 Eglinton Avenue West, Suite 210','Suite 210','Ontario','Eglinton Avenue West','Toronto','M6C 3Z9','2012-07-25 22:08:13','2012-07-25 22:08:13',NULL,NULL),(7,17,'dd','31','dar','d','d','d','2','test','2012-10-09 00:00:00',1,1,1,'0000-00-00 00:00:00','','','','0000-00-00 00:00:00','Ticket Time Saver','875 Eglinton Avenue West, Suite 210','Suite 210','Ontario','Eglinton Avenue West','Toronto','M6C 3Z9','2012-10-15 22:44:00','2012-10-15 22:44:00',NULL,NULL),(8,1,'Rafi Hecht','4 Meadowbrook Road','4','Toronto','Ontario','M6B 2S4','111','111','0000-00-00 00:00:00',1,1,0,'0000-00-00 00:00:00','Greek',NULL,NULL,NULL,'Ticket Time Saver','875 Eglinton Avenue West, Suite 210','Suite 210','Ontario','Eglinton Avenue West','Toronto','M6C 3Z9','0000-00-00 00:00:00','0000-00-00 00:00:00',NULL,NULL);
/*!40000 ALTER TABLE `t_tickets_general_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_tickets_parking_details`
--

DROP TABLE IF EXISTS `t_tickets_parking_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_tickets_parking_details` (
  `ttpd_id` int(10) NOT NULL AUTO_INCREMENT,
  `ttpd_ticket_id` int(10) DEFAULT NULL,
  `ttpd_parking_infraction_notice_number` varchar(50) DEFAULT NULL,
  `ttpd_defendant_owners_name` varchar(1024) DEFAULT NULL,
  `ttpd_current_mailing_address` varchar(2000) DEFAULT NULL,
  `ttpd_apt_suite` varchar(10) DEFAULT NULL,
  `ttpd_city` varchar(255) DEFAULT NULL,
  `ttpd_province_state` varchar(255) DEFAULT NULL,
  `ttpd_postal_zip_code` varchar(50) DEFAULT NULL,
  `ttpd_daytime_tel_num` varchar(255) DEFAULT NULL,
  `ttpd_intend_to_challenge_evidence` varchar(25) DEFAULT NULL,
  `ttpd_trial_language` varchar(50) DEFAULT NULL,
  `ttpd_trial_interpreter` varchar(50) DEFAULT NULL,
  `ttpd_signature` varchar(2000) DEFAULT NULL,
  `ttpd_signature_date` datetime DEFAULT NULL,
  `ttpd_agent_name` varchar(1024) DEFAULT NULL,
  `ttpd_agent_will_appear_for_defendant` tinyint(2) DEFAULT NULL,
  `ttpd_agent_mailing_address` varchar(2000) DEFAULT NULL,
  `ttpd_agent_apt_suite` varchar(10) DEFAULT NULL,
  `ttpd_agent_city` varchar(255) DEFAULT NULL,
  `ttpd_agent_province` varchar(255) DEFAULT NULL,
  `ttpd_agent_zip_postal_code` varchar(50) DEFAULT NULL,
  `ttpd_agent_daytime_tel_num` varchar(50) DEFAULT NULL,
  `ttpd_agent_appearing` varchar(50) DEFAULT NULL,
  `ttpd_pending_status` tinyint(10) DEFAULT NULL,
  `ttpd_date_added` datetime DEFAULT NULL,
  `ttpd_date_modified` datetime DEFAULT NULL,
  `ttpd_date_deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`ttpd_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_tickets_parking_details`
--

LOCK TABLES `t_tickets_parking_details` WRITE;
/*!40000 ALTER TABLE `t_tickets_parking_details` DISABLE KEYS */;
INSERT INTO `t_tickets_parking_details` VALUES (1,10,'1234','tjnjkfnsj','4 Meadowbrook Road, #4','','Toronto','Ontario','M6B2S4','4167820272','No','English Language','Ooga Booga','','2012-07-09 00:00:00','Ticket Time Saver',0,'875 Eglinton Avenue West, Suite 210','','Toronto','Ontario','M3B 3X9','416-828-6605',NULL,1,'2012-07-27 04:31:44','2012-07-27 04:31:44',NULL),(2,11,'1234','Chaim Mordche Bensimon','123 anywhere','4','ANYPLACE','ON','123456','1234567890','Yes','English Language','Creole','','2012-07-09 00:00:00','Ticket Time Saver',0,'875 Eglinton Avenue West, Suite 210','','Toronto','Ontario','M3B 3X9','416-828-6605','0',1,'2012-07-31 14:38:15','2012-07-31 14:38:15',NULL),(3,12,'1','1','1','1','1','1','1','1','Yes','English Language','','','2012-07-09 00:00:00','Ticket Time Saver',0,'875 Eglinton Avenue West, Suite 210','','Toronto','Ontario','M3B 3X9','416-828-6605','0',1,'2012-07-31 16:00:22','2012-07-31 16:00:22',NULL),(4,13,'1234','Rafi Hecht','4 Meadowbrook Road','4','Toronto','ON','M6B 2S4','416-782-0272','Yes','English Language','Swahili','','2012-08-08 00:00:00','Ticket Time Saver',0,'875 Eglinton Avenue West, Suite 210','','Toronto','Ontario','M3B 3X9','416-828-6605','0',1,'2012-08-08 21:17:25','2012-08-08 21:17:25',NULL),(5,14,'d','d','31','','test','quebec','d','5','Yes','English Language','hebrew','','2012-07-09 00:00:00','Ticket Time Saver',0,'875 Eglinton Avenue West, Suite 210','','Toronto','Ontario','M3B 3X9','416-828-6605','0',1,'2012-10-15 21:58:23','2012-10-15 21:58:23',NULL);
/*!40000 ALTER TABLE `t_tickets_parking_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_tickets_redlight_details`
--

DROP TABLE IF EXISTS `t_tickets_redlight_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_tickets_redlight_details` (
  `ttrd_id` int(10) NOT NULL AUTO_INCREMENT,
  `ttrd_ticket_id` int(10) DEFAULT NULL,
  `ttrd_fullname` varchar(1024) DEFAULT NULL,
  `ttrd_address` varchar(2000) DEFAULT NULL,
  `ttrd_apt` varchar(10) DEFAULT NULL,
  `ttrd_municipality` varchar(255) DEFAULT NULL,
  `ttrd_province_state` varchar(255) DEFAULT NULL,
  `ttrd_postal_zip_code` varchar(50) DEFAULT NULL,
  `ttrd_icon` varchar(255) DEFAULT NULL,
  `ttrd_offence_num` varchar(255) DEFAULT NULL,
  `ttrd_offence_date` datetime DEFAULT NULL,
  `ttrd_officer_attend_trial` tinyint(2) DEFAULT NULL,
  `ttrd_intend_to_appear_in_court` tinyint(2) DEFAULT NULL,
  `ttrd_intend_to_appear_in_court_fr` tinyint(2) DEFAULT NULL,
  `ttrd_intend_to_appear_in_court_date` datetime DEFAULT NULL,
  `ttrd_languageinterpreter` varchar(50) DEFAULT NULL,
  `ttrd_fr_languageinterpreter` varchar(50) DEFAULT NULL,
  `ttrd_signature` varchar(2000) DEFAULT NULL,
  `ttrd_signature_date` datetime DEFAULT NULL,
  `ttrd_rep_name` varchar(1024) DEFAULT NULL,
  `ttrd_rep_address` varchar(2000) DEFAULT NULL,
  `ttrd_rep_apt` varchar(10) DEFAULT NULL,
  `ttrd_rep_province_state` varchar(255) DEFAULT NULL,
  `ttrd_rep_street` varchar(255) DEFAULT NULL,
  `ttrd_rep_municipality` varchar(255) DEFAULT NULL,
  `ttrd_rep_postal_zip_code` varchar(50) DEFAULT NULL,
  `ttrd_date_added` datetime DEFAULT NULL,
  `ttrd_date_modified` datetime DEFAULT NULL,
  `ttgd_date_deleted` datetime DEFAULT NULL,
  `ttrd_pending_status` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`ttrd_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_tickets_redlight_details`
--

LOCK TABLES `t_tickets_redlight_details` WRITE;
/*!40000 ALTER TABLE `t_tickets_redlight_details` DISABLE KEYS */;
INSERT INTO `t_tickets_redlight_details` VALUES (1,9,'Joe Blo','2rkdfkdsf','dkfj','Toronto','Ontario','M6B2S4','0','12345','2012-07-09 00:00:00',1,1,0,'0000-00-00 00:00:00',NULL,NULL,'','0000-00-00 00:00:00','Ticket Time Saver','875 Eglinton Avenue West, Suite 210','Suite 210','Ontario','Eglinton Avenue West','Toronto','M6C 3Z9','2012-07-27 04:20:47','2012-07-27 04:20:47',NULL,NULL),(2,15,'','31','','to','ON','l4j','0','','1970-01-01 00:00:00',1,1,0,'0000-00-00 00:00:00',NULL,NULL,'','0000-00-00 00:00:00','Ticket Time Saver','875 Eglinton Avenue West, Suite 210','Suite 210','Ontario','Eglinton Avenue West','Toronto','M6C 3Z9','2012-10-15 22:33:52','2012-10-15 22:33:52',NULL,NULL),(3,16,'','31','','to','ON','l4j','0','ddd','1970-01-01 00:00:00',1,1,0,'0000-00-00 00:00:00',NULL,NULL,'','0000-00-00 00:00:00','Ticket Time Saver','875 Eglinton Avenue West, Suite 210','Suite 210','Ontario','Eglinton Avenue West','Toronto','M6C 3Z9','2012-10-15 22:34:26','2012-10-15 22:34:26',NULL,NULL),(4,18,'','','','','','','0','','1969-12-31 19:00:00',1,1,0,'0000-00-00 00:00:00',NULL,NULL,'','0000-00-00 00:00:00','Ticket Time Saver','875 Eglinton Avenue West, Suite 210','Suite 210','Ontario','Eglinton Avenue West','Toronto','M6C 3Z9','2013-02-27 18:34:05','2013-02-27 18:34:05',NULL,NULL),(5,19,'','','','','','','0','','1969-12-31 19:00:00',1,1,0,'0000-00-00 00:00:00',NULL,NULL,'','0000-00-00 00:00:00','Ticket Time Saver','875 Eglinton Avenue West, Suite 210','Suite 210','Ontario','Eglinton Avenue West','Toronto','M6C 3Z9','2013-02-27 18:34:10','2013-02-27 18:34:10',NULL,NULL);
/*!40000 ALTER TABLE `t_tickets_redlight_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_tickets_type`
--

DROP TABLE IF EXISTS `t_tickets_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_tickets_type` (
  `ttt_id` int(10) NOT NULL,
  `ttt_type_name` varchar(255) DEFAULT NULL,
  `ttt_price` float DEFAULT NULL,
  `ttt_active` int(10) DEFAULT NULL,
  PRIMARY KEY (`ttt_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_tickets_type`
--

LOCK TABLES `t_tickets_type` WRITE;
/*!40000 ALTER TABLE `t_tickets_type` DISABLE KEYS */;
INSERT INTO `t_tickets_type` VALUES (1,'General',15,1),(2,'Parking',15,1),(3,'Redlight',15,1);
/*!40000 ALTER TABLE `t_tickets_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_users`
--

DROP TABLE IF EXISTS `t_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_users` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL DEFAULT '0',
  `user_fname` varchar(255) DEFAULT NULL,
  `user_lname` varchar(255) DEFAULT NULL,
  `user_password` varchar(1024) NOT NULL,
  `user_email_addr` text NOT NULL,
  `user_phone` varchar(50) DEFAULT NULL,
  `user_dateadded` datetime DEFAULT NULL,
  `user_datemodified` datetime DEFAULT NULL,
  `user_datedelete` datetime DEFAULT NULL,
  `active` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_users`
--

LOCK TABLES `t_users` WRITE;
/*!40000 ALTER TABLE `t_users` DISABLE KEYS */;
INSERT INTO `t_users` VALUES (1,'rhecht','Rafi','Hecht','be6d724989161e83eadae161845332cf','rhecht@gmail.com','','2012-07-02 22:23:54','2013-02-28 12:58:17',NULL,1),(6,'hechtr','hecht','rafi','be6d724989161e83eadae161845332cf','hechtr@gmail.com',NULL,NULL,'2012-10-24 16:39:59',NULL,NULL),(7,'jimbensimon','Jim','Bensimon','400e837d1346e5e275abe5712bd11262','jb@irisemedia.com',NULL,NULL,NULL,NULL,NULL),(8,'darrefaeli','Dar','Refaeli','f6217ec67abeae3b6cbdd6702dd9d688','dr@irisemedia.com',NULL,'2012-10-15 19:30:33','2012-10-15 22:49:06',NULL,NULL),(9,'joeblo','Joe','Bloe','','joeblo@gmail.com','123','2012-10-23 19:48:12','2012-10-23 20:20:57',NULL,1),(12,'avioziel','Avi','Oziel','122a77617a22e1bd61d19612e8f0aa25','ao@irisemedia.com',NULL,'2013-02-28 11:54:06','2013-02-28 12:25:19',NULL,NULL);
/*!40000 ALTER TABLE `t_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_users_logs`
--

DROP TABLE IF EXISTS `t_users_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_users_logs` (
  `ul_id` int(10) NOT NULL AUTO_INCREMENT,
  `ul_user_id` int(10) DEFAULT NULL,
  `ul_ip_address` varchar(120) DEFAULT NULL,
  `ul_action_description` text,
  `ul_date_of_action` datetime DEFAULT NULL,
  PRIMARY KEY (`ul_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_users_logs`
--

LOCK TABLES `t_users_logs` WRITE;
/*!40000 ALTER TABLE `t_users_logs` DISABLE KEYS */;
INSERT INTO `t_users_logs` VALUES (1,1,'174.116.136.227','User rhecht Modified Info','2012-07-31 15:34:53'),(2,1,NULL,'User rhecht Reset Password','2012-08-08 18:45:13'),(3,1,'174.116.136.227','User rhecht Reset Password','2012-08-08 18:46:29'),(4,1,'174.116.136.227','User rhecht Modified Info','2012-08-08 18:48:09'),(5,8,'174.116.136.227','User darrefaeli Reset Password','2012-10-15 22:49:06'),(6,6,'174.116.136.227','User hechtr Reset Password','2012-10-24 16:39:59'),(7,12,'174.116.136.227','User avioziel Reset Password','2013-02-28 12:25:19');
/*!40000 ALTER TABLE `t_users_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `t_users_password_reset_keys`
--

DROP TABLE IF EXISTS `t_users_password_reset_keys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `t_users_password_reset_keys` (
  `uprk_id` int(10) NOT NULL AUTO_INCREMENT,
  `uprk_user_id` int(10) DEFAULT NULL,
  `uprk_key` varchar(50) DEFAULT NULL,
  `uprk_date_added` datetime NOT NULL,
  `uprk_ip_added` varchar(50) DEFAULT NULL,
  `uprk_date_used` datetime NOT NULL,
  `uprk_ip_used` varchar(50) DEFAULT NULL,
  `uprk_active` tinyint(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`uprk_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `t_users_password_reset_keys`
--

LOCK TABLES `t_users_password_reset_keys` WRITE;
/*!40000 ALTER TABLE `t_users_password_reset_keys` DISABLE KEYS */;
INSERT INTO `t_users_password_reset_keys` VALUES (1,1,'8945424','2012-08-07 02:32:52',NULL,'2012-08-08 18:46:29','174.116.136.227',0),(2,1,'6456472','2012-08-07 02:47:29',NULL,'2012-08-08 18:46:29','174.116.136.227',0),(3,1,'5187573','2012-08-08 18:33:30','174.116.136.227','2012-08-08 18:46:29','174.116.136.227',0),(4,1,'2874010','2012-08-08 18:38:18','174.116.136.227','2012-08-08 18:46:29','174.116.136.227',0),(5,1,'1754100','2012-08-08 18:40:02','174.116.136.227','2012-08-08 18:46:29','174.116.136.227',0),(6,8,'2268763','2012-10-15 22:47:53','174.116.136.227','2012-10-15 22:49:06','174.116.136.227',0),(7,6,'3265872','2012-10-24 16:39:23','174.116.136.227','2012-10-24 16:39:59','174.116.136.227',0),(8,12,'5974853','2013-02-28 12:19:08','174.116.136.227','2013-02-28 12:25:19','174.116.136.227',0);
/*!40000 ALTER TABLE `t_users_password_reset_keys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `vw_tickets`
--

DROP TABLE IF EXISTS `vw_tickets`;
/*!50001 DROP VIEW IF EXISTS `vw_tickets`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `vw_tickets` (
  `ticket_id` tinyint NOT NULL,
  `ticket_name` tinyint NOT NULL,
  `ticket_offence_date` tinyint NOT NULL,
  `ticket_type` tinyint NOT NULL,
  `ticket_type_name` tinyint NOT NULL,
  `ticket_booking_fee_status` tinyint NOT NULL,
  `ticket_booking_fee_status_name` tinyint NOT NULL,
  `user_id` tinyint NOT NULL,
  `ticket_is_paid` tinyint NOT NULL,
  `date_added` tinyint NOT NULL,
  `date_modified` tinyint NOT NULL,
  `date_deleted` tinyint NOT NULL,
  `active` tinyint NOT NULL,
  `price` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `vw_tickets`
--

/*!50001 DROP TABLE IF EXISTS `vw_tickets`*/;
/*!50001 DROP VIEW IF EXISTS `vw_tickets`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`irise_iriseuser`@`174.116.136.227` SQL SECURITY DEFINER */
/*!50001 VIEW `vw_tickets` AS select `tt`.`ticket_id` AS `ticket_id`,`tt`.`ticket_name` AS `ticket_name`,`tt`.`ticket_offence_date` AS `ticket_offence_date`,`tt`.`ticket_type` AS `ticket_type`,`ttt`.`ttt_type_name` AS `ticket_type_name`,`tt`.`ticket_booking_fee_status` AS `ticket_booking_fee_status`,`tbfs`.`tbfs_name` AS `ticket_booking_fee_status_name`,`tt`.`user_id` AS `user_id`,`tt`.`ticket_is_paid` AS `ticket_is_paid`,`tt`.`date_added` AS `date_added`,`tt`.`date_modified` AS `date_modified`,`tt`.`date_deleted` AS `date_deleted`,`tt`.`active` AS `active`,`ttt`.`ttt_price` AS `price` from ((`t_tickets` `tt` join `t_tickets_type` `ttt` on((`ttt`.`ttt_id` = `tt`.`ticket_type`))) join `t_tickets_booking_fee_status` `tbfs` on((`tbfs`.`tbfs_id` = `tt`.`ticket_booking_fee_status`))) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-12-31  2:01:12
