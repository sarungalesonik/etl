-- MySQL dump 10.13  Distrib 8.0.13, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: iia
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.18-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin_users`
--

DROP TABLE IF EXISTS `admin_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `admin_users` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_users`
--

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'Admin','admin','$2y$10$FndLzZIHiKTQa54ILojb7.c1PLNk4bx/iXBSb.Xx6FtaAm692xxVK',1,'2023-10-28 20:05:34');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `api_group`
--

DROP TABLE IF EXISTS `api_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `api_group` (
  `api_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `api_group_name` varchar(200) NOT NULL,
  PRIMARY KEY (`api_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api_group`
--

LOCK TABLES `api_group` WRITE;
/*!40000 ALTER TABLE `api_group` DISABLE KEYS */;
INSERT INTO `api_group` VALUES (1,'Source 1'),(2,'Source 2'),(3,'Source 3');
/*!40000 ALTER TABLE `api_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `api_logs`
--

DROP TABLE IF EXISTS `api_logs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `api_logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `api_id` int(6) NOT NULL,
  `url` varchar(500) NOT NULL,
  `method` varchar(50) NOT NULL,
  `payload` varchar(5000) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api_logs`
--

LOCK TABLES `api_logs` WRITE;
/*!40000 ALTER TABLE `api_logs` DISABLE KEYS */;
INSERT INTO `api_logs` VALUES (1,1,'https://api.linkedin.com/v2/userinfo','GET','Array','2023-11-06 01:29:41'),(2,2,'https://api.reversecontact.com/enrichment?apikey=sk_live_6548091be4c74507a6846d9d_key_sb2wgfiy3m8&email=sonik.sarungale@gmail.com','GET','Array','2023-11-06 01:29:44'),(3,4,'https://api.prospeo.io/linkedin-email-finder','POST','{\"url\":\"https:\\/\\/linkedin.com\\/in\\/soniksarungale\\/\"}','2023-11-06 01:30:56'),(4,1,'https://api.linkedin.com/v2/userinfo','GET','[]','2023-11-06 01:32:56'),(5,2,'https://api.reversecontact.com/enrichment?apikey=sk_live_6548091be4c74507a6846d9d_key_sb2wgfiy3m8&email=sonik.sarungale@gmail.com','GET','{\"email\":\"sonik.sarungale@gmail.com\"}','2023-11-06 01:33:03'),(6,1,'https://api.linkedin.com/v2/userinfo','GET','[]','2023-11-06 01:35:09'),(7,2,'https://api.reversecontact.com/enrichment?apikey=sk_live_6548091be4c74507a6846d9d_key_sb2wgfiy3m8&email=sonik.sarungale@gmail.com','GET','{\"email\":\"sonik.sarungale@gmail.com\"}','2023-11-06 01:35:12'),(8,3,'https://nubela.co/proxycurl/api/v2/linkedin?linkedin_profile_url=https://linkedin.com/in/soniksarungale/','GET','{\"linkedin_profile_url\":\"https:\\/\\/linkedin.com\\/in\\/soniksarungale\\/\"}','2023-11-06 01:35:16'),(9,1,'https://api.linkedin.com/v2/userinfo','GET','[]','2023-11-06 02:32:26'),(10,2,'https://api.reversecontact.com/enrichment?apikey=sk_live_6548091be4c74507a6846d9d_key_sb2wgfiy3m8&email=','GET','{\"email\":null}','2023-11-06 02:32:29'),(11,1,'https://api.linkedin.com/v2/userinfo','GET','[]','2023-11-06 02:33:00'),(12,2,'https://api.reversecontact.com/enrichment?apikey=sk_live_6548091be4c74507a6846d9d_key_sb2wgfiy3m8&email=sonik.sarungale@gmail.com','GET','{\"email\":\"sonik.sarungale@gmail.com\"}','2023-11-06 02:34:22'),(13,3,'https://nubela.co/proxycurl/api/v2/linkedin?linkedin_profile_url=https://linkedin.com/in/soniksarungale/','GET','{\"linkedin_profile_url\":\"https:\\/\\/linkedin.com\\/in\\/soniksarungale\\/\"}','2023-11-06 02:34:24'),(14,2,'https://api.reversecontact.com/enrichment?apikey=sk_live_6548091be4c74507a6846d9d_key_sb2wgfiy3m8&email=sonik.sarungale@gmail.com','GET','{\"email\":\"sonik.sarungale@gmail.com\"}','2023-11-06 02:35:10'),(15,3,'https://nubela.co/proxycurl/api/v2/linkedin?linkedin_profile_url=https://linkedin.com/in//','GET','{\"linkedin_profile_url\":\"https:\\/\\/linkedin.com\\/in\\/\\/\"}','2023-11-06 02:35:11'),(16,2,'https://api.reversecontact.com/enrichment?apikey=sk_live_6525239903a13c05ef2af924_key_8tbx8z81zly&email=sonik.sarungale@gmail.com','GET','{\"email\":\"sonik.sarungale@gmail.com\"}','2023-11-06 02:39:00'),(17,4,'https://api.prospeo.io/linkedin-email-finder','POST','{\"url\":\"https:\\/\\/linkedin.com\\/in\\/\\/\"}','2023-11-06 02:39:01'),(18,1,'https://api.linkedin.com/v2/userinfo','GET','{\"\":\"AQWYRNTeXaKgovI_f2P-VLj3Fo34-wJsOEfz81XLGJTJ1Pa_sxUm0DyuqVo6u775Nb9O3-uFBISxtNzgBX5FeIFWgCRDsgLL-de5Bv-VepU4X3DzXk8h7v5mwi3Iwm9Z-NeMydt3TcZBPp9r_vgTUA3V3NSzIwuwWY-Wlmub3jqOG11i5C0vmwdK9gd_hZogDzfBDLxmx4vd6e1YodXFOgxGVNOvL_wwtKqv2akjHbejDQ_kVSMJKj9_P2XQs_45cCQDMhvxwWdJ0XWI-YGv2s-8Uy0saerKhbrGpNqicaZjv-r5iTaz5mwpnvzwT6Kg0OA743aJ2sYp1e98JPRPr_jx9RHF-Q\"}','2023-11-06 11:04:16'),(19,2,'https://api.reversecontact.com/enrichment?apikey=sk_live_6525239903a13c05ef2af924_key_8tbx8z81zly&email=sonik.sarungale@gmail.com','GET','{\"email\":\"sonik.sarungale@gmail.com\"}','2023-11-06 11:04:48'),(20,2,'https://api.reversecontact.com/enrichment?apikey=sk_live_6525239903a13c05ef2af924_key_8tbx8z81zly&email=sahilmore405@gmail.com','GET','{\"email\":\"sahilmore405@gmail.com\"}','2023-11-06 11:05:08'),(21,3,'https://nubela.co/proxycurl/api/v2/linkedin?linkedin_profile_url=https://linkedin.com/in/soniksarungale/','GET','{\"linkedin_profile_url\":\"https:\\/\\/linkedin.com\\/in\\/soniksarungale\\/\"}','2023-11-06 11:05:22'),(22,4,'https://api.prospeo.io/linkedin-email-finder','POST','{\"url\":\"https:\\/\\/linkedin.com\\/in\\/soniksarungale\\/\"}','2023-11-06 11:06:00'),(23,4,'https://api.prospeo.io/linkedin-email-finder','POST','{\"url\":\"https:\\/\\/linkedin.com\\/in\\/soniksarungale\\/\"}','2023-11-06 11:06:30'),(24,2,'https://api.reversecontact.com/enrichment?apikey=sk_live_6525239903a13c05ef2af924_key_8tbx8z81zly&email=sonik.sarungale@gmail.com','GET','{\"email\":\"sonik.sarungale@gmail.com\"}','2023-11-06 11:08:09'),(25,4,'https://api.prospeo.io/linkedin-email-finder','POST','{\"url\":\"https:\\/\\/linkedin.com\\/in\\/\\/\"}','2023-11-06 11:08:40');
/*!40000 ALTER TABLE `api_logs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `api_master`
--

DROP TABLE IF EXISTS `api_master`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `api_master` (
  `api_master_id` int(11) NOT NULL AUTO_INCREMENT,
  `api_type` int(2) NOT NULL DEFAULT 1 COMMENT '1 = Outh\n2 = REST API\n3 = Scrapper',
  `api_group_id` int(6) NOT NULL,
  `api_name` varchar(200) NOT NULL,
  `api_code` varchar(200) NOT NULL,
  `api_url` varchar(200) NOT NULL,
  `api_path` varchar(200) NOT NULL,
  `credentials_type` int(2) NOT NULL DEFAULT 1 COMMENT '0 = None\\n1 = Key',
  `api_key` varchar(200) NOT NULL,
  `key_param` varchar(200) NOT NULL,
  `api_method` varchar(50) NOT NULL,
  `api_status` int(2) NOT NULL DEFAULT 0,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `api_db_key` varchar(200) NOT NULL,
  `api_db_val` varchar(200) NOT NULL,
  `temp_payload` varchar(2000) DEFAULT NULL,
  `api_bearer_token` varchar(500) DEFAULT NULL,
  `api_key_type` int(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`api_master_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `api_master`
--

LOCK TABLES `api_master` WRITE;
/*!40000 ALTER TABLE `api_master` DISABLE KEYS */;
INSERT INTO `api_master` VALUES (1,1,1,'LinkedIn Official API','LINKEDINOFF','https://api.linkedin.com','v2/userinfo',3,'','','GET',1,'2023-10-29 12:53:45','','','AQVnVeV3PaBXrOrlV_6BFvRX44FKOFXbjNknGLijlgvJxYTf-Mf5NOHSslA6qWQJk4aPh1BTtnr9gNsw6PwKAkmVuANtEDqKJ6dW8BWEqn-BEJsckgwwJCVJeM-iJX_b7BQlFxGJAF_dYi1drxCfWA08Qfr9KhtDywYnqhtxEcICd2TH5CUf8ttMG15C9ah1lX-Dslto1w4ZHqY3yQz1e7HPEP8QlI5fytI_RkFAxD1EjG1Ee8T1Tlr9mZX5uT3u-XBZPcCdxeVpiNnrw-hg0ZAE5lIRpCKuMWdz62xbNEbFtDNY8BzI2YP_V91TvtPUZOu4y4vONBlbaGLb6AUVMbv4Czp2lQ','',0),(2,2,2,'Reverse Contact','reversecontact','https://api.reversecontact.com','enrichment',2,'sk_live_6525239903a13c05ef2af924_key_8tbx8z81zly','apikey','GET',1,'2023-10-29 12:59:42','email','email','sahilmore405@gmail.com','',0),(3,2,3,'ProxyCurl','proxycurl','https://nubela.co','proxycurl/api/v2/linkedin',3,'','','GET',0,'2023-11-05 23:28:47','linkedin_profile_url','url','https://linkedin.com/in/soniksarungale/','48CH4vR_I9v-XB2fC2Htyw',0),(4,2,3,'Prospeo','prospeo','https://api.prospeo.io','linkedin-email-finder',2,'0be076582f9108ac71654264386a0b5d','X-KEY','POST',1,'2023-11-06 00:42:44','url','url','https://linkedin.com/in/soniksarungale/','',1);
/*!40000 ALTER TABLE `api_master` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cron_log`
--

DROP TABLE IF EXISTS `cron_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `cron_log` (
  `cron_log_id` int(11) NOT NULL AUTO_INCREMENT,
  `cron_type` int(11) NOT NULL,
  `cron_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_rows` int(11) NOT NULL,
  `rows_affected` int(11) NOT NULL,
  `isCompleted` int(11) NOT NULL,
  `cron_start` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cron_last_updated` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cron_end` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `error` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`cron_log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cron_log`
--

LOCK TABLES `cron_log` WRITE;
/*!40000 ALTER TABLE `cron_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `cron_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cron_tab`
--

DROP TABLE IF EXISTS `cron_tab`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `cron_tab` (
  `cron_tab_id` int(11) NOT NULL AUTO_INCREMENT,
  `cron_time` varchar(100) NOT NULL,
  `cron_name` varchar(200) NOT NULL,
  `path` varchar(500) NOT NULL,
  `file` varchar(100) NOT NULL,
  `isActive` int(2) NOT NULL DEFAULT 0,
  `created_by` varchar(15) NOT NULL,
  `created_on` timestamp NULL DEFAULT NULL,
  `modified_by` varchar(15) NOT NULL,
  `modified_on` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`cron_tab_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cron_tab`
--

LOCK TABLES `cron_tab` WRITE;
/*!40000 ALTER TABLE `cron_tab` DISABLE KEYS */;
INSERT INTO `cron_tab` VALUES (1,'* */1 * * *','Fetch Data','/var/www/html/workfolio/autoscript/','fetch.php',1,'0I97TYOJBZVL','2022-06-02 17:33:20','1','2023-11-06 02:13:27');
/*!40000 ALTER TABLE `cron_tab` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materialized_view`
--

DROP TABLE IF EXISTS `materialized_view`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `materialized_view` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `auth_token` varchar(2000) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_on` timestamp NULL DEFAULT NULL,
  `location` varchar(500) DEFAULT NULL,
  `skills` varchar(2000) DEFAULT NULL,
  `picture` varchar(500) DEFAULT NULL,
  `username` varchar(500) DEFAULT NULL,
  `url` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materialized_view`
--

LOCK TABLES `materialized_view` WRITE;
/*!40000 ALTER TABLE `materialized_view` DISABLE KEYS */;
INSERT INTO `materialized_view` VALUES (3,'sonik sarungale','sonik.sarungale@gmail.com','AQWyydT8ayaPxmh5EY2nEBjxOA0k52zYzmx5IWT7_acnR1gRCcHDgDjyzqLBorCrWNQgfx-pwVurGHh-TossACFRI35N91Qv01nmS7_YM36Z4c65csLACyk1__VDWH4fqSwEekKZoT_G0dgsYU9fOijbRbR87efUVGXOyV2r-Ll3yVgeDqZsg-s943ZndcbRbku9qCyrKbae4aUcmt_X19m_dkcWq7MSe_h2Tz766Xxuj93WnBDRvYjMIaDejWJlVlK9qruF_2YBEedI11ulDmPQI9fuEAnXLWZTFDm7UPvzrOm2wI37rdZv7qMUQ66k82cy6fId4ryhizy398Gj5L11M7iDvw','2023-11-05 20:48:59','2023-11-06 02:34:24','Mumbai Maharashtra','PHP MySQL Responsive Web Design Search Engine Optimization (SEO) User Experience Design (UED) Front-end Development React.js HTML5 CSS JavaScript','https://s3.us-west-000.backblazeb2.com/proxycurl/person/soniksarungale/profile?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=0004d7f56a0400b0000000001%2F20231106%2Fus-west-000%2Fs3%2Faws4_request&X-Amz-Date=20231106T023424Z&X-Amz-Expires=3600&X-Amz-SignedHeaders=host&X-Amz-Signature=ee3941e97f7c399a5ea577bc35fecac3158ea58373c94c0f1eb397a0d0f1e9eb','','https://linkedin.com/in/soniksarungale/');
/*!40000 ALTER TABLE `materialized_view` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schema_mapping`
--

DROP TABLE IF EXISTS `schema_mapping`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `schema_mapping` (
  `schema_mapping_id` int(11) NOT NULL AUTO_INCREMENT,
  `api_master_id` int(6) NOT NULL,
  `field` varchar(200) NOT NULL,
  `tempValue` text NOT NULL,
  `dbValue` varchar(200) DEFAULT NULL,
  `isActive` int(2) NOT NULL DEFAULT 0,
  PRIMARY KEY (`schema_mapping_id`)
) ENGINE=InnoDB AUTO_INCREMENT=406 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schema_mapping`
--

LOCK TABLES `schema_mapping` WRITE;
/*!40000 ALTER TABLE `schema_mapping` DISABLE KEYS */;
INSERT INTO `schema_mapping` VALUES (20,2,'success','1','',0),(21,2,'email','sahilmore405@gmail.com','email',1),(22,2,'emailType','personal','',0),(23,2,'person/publicIdentifier','sahil-more-405','',0),(24,2,'person/linkedInIdentifier','ACoAAC_q07YBpcFg_sZRpQ62-kpxGqIbazFqcr4','',0),(25,2,'person/firstName','Sahil','full_name',1),(26,2,'person/lastName','More','full_name',1),(27,2,'person/headline','IIIT D MTech CSE\'25 ||  Ex-TCSer (Digital Cadre) || 5⭐ Problem Solver @HackerRank || GATE CS Qualified','',0),(28,2,'person/location','Mumbai, Maharashtra India','location',1),(29,2,'person/photoUrl','https://media.licdn.com/dms/image/D4D03AQF9yFdgrioxsQ/profile-displayphoto-shrink_800_800/0/1677177924065?e=1704931200&v=beta&t=8ATqkVWM2sl1MkSghKi_HnK7Mo0woO4ztYNsoaqxSfQ','picture',1),(30,2,'person/creationDate/month','3','',0),(31,2,'person/creationDate/year','2020','',0),(32,2,'person/followerCount','299','',0),(33,2,'person/connectionCount','301','',0),(34,2,'person/positions/positionsCount','1','',0),(35,2,'person/positions/positionHistory[0]/startEndDate/start/month','8','',0),(36,2,'person/positions/positionHistory[0]/startEndDate/start/year','2022','',0),(37,2,'person/positions/positionHistory[0]/startEndDate/end/month','5','',0),(38,2,'person/positions/positionHistory[0]/startEndDate/end/year','2023','',0),(39,2,'person/positions/positionHistory[0]/title','System Engineer (Digital - C1)','',0),(40,2,'person/positions/positionHistory[0]/description','Role: Engineer.Information Security\r\nDelivery Governance, Risk & Security','',0),(41,2,'person/positions/positionHistory[0]/companyName','Tata Consultancy Services ','',0),(42,2,'person/positions/positionHistory[0]/companyLocation','Mumbai, Maharashtra, India','',0),(43,2,'person/positions/positionHistory[0]/companyLogo','https://media.licdn.com/dms/image/C4D0BAQFPP1NRP4F5dQ/company-logo_200_200/0/1656657978597/tata_consultancy_services_logo?e=1707350400&v=beta&t=KoHJTQLKQFIWrXszWKOB5-bCoNRgB7fMqqQMHaH0AnU','',0),(44,2,'person/positions/positionHistory[0]/linkedInUrl','https://www.linkedin.com/company/1353/','',0),(45,2,'person/schools/educationsCount','2','',0),(46,2,'person/schools/educationHistory[0]/schoolName','Indraprastha Institute of Information Technology, Delhi','',0),(47,2,'person/schools/educationHistory[0]/description','IIIT D M.Tech CSE program is designed to improve the student\'s theoretical foundations, practical skills, research abilities, communication skills and professional ethics in the field of Computer Science.\r\n\r\nI am glad to be part of this Institute.','',0),(48,2,'person/schools/educationHistory[0]/degreeName','Master of Technology - MTech, Computer Science','',0),(49,2,'person/schools/educationHistory[0]/fieldOfStudy','Master of Technology - MTech, Computer Science','',0),(50,2,'person/schools/educationHistory[0]/schoolLogo','https://media.licdn.com/dms/image/C560BAQG8G8yRaFuoBQ/company-logo_200_200/0/1631351289400?e=1707350400&v=beta&t=-rTKGol-nkRA8K0E1GMhw1nu1x2j3cGcKKndI4RNeJo','',0),(51,2,'person/schools/educationHistory[0]/linkedInUrl','https://www.linkedin.com/company/362624/','',0),(52,2,'person/schools/educationHistory[1]/startEndDate/start/month','8','',0),(53,2,'person/schools/educationHistory[1]/startEndDate/start/year','2018','',0),(54,2,'person/schools/educationHistory[1]/startEndDate/end/month','8','',0),(55,2,'person/schools/educationHistory[1]/startEndDate/end/year','2022','',0),(56,2,'person/schools/educationHistory[1]/schoolName','Savitribai Phule Pune University','',0),(57,2,'person/schools/educationHistory[1]/description','Skills: Databases · Fundamentals · MySQL · Programming · Mathematics · Data Structures · C (Programming Language)','',0),(58,2,'person/schools/educationHistory[1]/degreeName','Bachelor of Engineering - BE, Computer Science','',0),(59,2,'person/schools/educationHistory[1]/fieldOfStudy','Bachelor of Engineering - BE, Computer Science','',0),(60,2,'person/schools/educationHistory[1]/schoolLogo','https://media.licdn.com/dms/image/C4E0BAQEFsIyAZyuMwA/company-logo_200_200/0/1519904707827?e=1707350400&v=beta&t=dq1kW7-cJLYjwZR5KYPXB_GxF5B029Lj1JxGqZtPlkI','',0),(61,2,'person/schools/educationHistory[1]/linkedInUrl','https://www.linkedin.com/company/15094398/','',0),(62,2,'person/summary','Hi, I am a 22-year-old IT Engineer with 9-Months 9-Days professional working experience having.\r\n•  Strong core CS Fundamentals (OS,DBMS,CN,COA)\r\n•  Beginner-intermediate in programming (C/Py)\r\n•  Soft Skills - Teamwork, Communication, Organization skills & Work Ethics\r\nEager to learn how I can utilize my expertise to solve the real-world problems and explore new challenges in this journey of |_earning.','',0),(63,2,'person/skills[0]','Security Controls','skills',1),(64,2,'person/skills[1]','ISO 27001','skills',1),(65,2,'person/skills[2]','Information Security Incident Management ','skills',1),(66,2,'person/skills[3]','Problem Solving','skills',1),(67,2,'person/skills[4]','Computer Science','skills',1),(68,2,'person/skills[5]','x86 Assembly','skills',1),(69,2,'person/skills[6]','Microprocessors','skills',1),(70,2,'person/skills[7]','Assembly Language','skills',1),(71,2,'person/skills[8]','HTML','skills',1),(72,2,'person/skills[9]','Relational Databases','skills',1),(73,2,'person/skills[10]','Oral Communication','',0),(74,2,'person/skills[11]','Operating Systems','',0),(75,2,'person/skills[12]','Written Communication','',0),(76,2,'person/skills[13]','System Development','',0),(77,2,'person/skills[14]','Learning','',0),(78,2,'person/skills[15]','Computer Engineering','',0),(79,2,'person/skills[16]','RDBMS','',0),(80,2,'person/skills[17]','Debugging','',0),(81,2,'person/skills[18]','Analytical Skills','',0),(82,2,'person/skills[19]','Humility','',0),(83,2,'person/linkedInUrl','https://linkedin.com/in/sahil-more-405','',0),(84,2,'company/websiteUrl','https://www.tcs.com/','',0),(85,2,'company/name','Tata Consultancy Services','',0),(86,2,'company/logo','https://media.licdn.com/dms/image/C4D0BAQFPP1NRP4F5dQ/company-logo_200_200/0/1656657978597/tata_consultancy_services_logo?e=1707350400&v=beta&t=KoHJTQLKQFIWrXszWKOB5-bCoNRgB7fMqqQMHaH0AnU','',0),(87,2,'company/employeeCount','578298','',0),(88,2,'company/description','A purpose-led organization that is building a meaningful future through innovation, technology, and collective knowledge. We\'re #BuildingOnBelief.\r\n\r\nA part of the Tata group, India\'s largest multinational business group, TCS has over 500,000 of the world’s best-trained consultants in 46 countries. The company generated consolidated revenues of US $22.2 billion in the fiscal year ended March 31, 2021, and is listed on the BSE (formerly Bombay Stock Exchange) and the NSE (National Stock Exchange) in India. \r\n\r\nTCS\' proactive stance on climate change and award-winning work with communities across the world have earned it a place in leading sustainability indices such as the MSCI Global Sustainability Index and the FTSE4Good Emerging Index. \r\n\r\nFor more information, visit us at the link below\r\n\r\n*Caution against fraudulent job offers*: TCS doesn\'t charge any fee throughout the recruitment process. Refer here: on.tcs.com/3i9X5BU','',0),(89,2,'company/tagline','Building on belief','',0),(90,2,'company/specialities[0]','IT Services','',0),(91,2,'company/specialities[1]','Business Solutions','',0),(92,2,'company/specialities[2]','Consulting','',0),(93,2,'company/headquarter/country','IN','',0),(94,2,'company/headquarter/geographicArea','Maharashtra','',0),(95,2,'company/headquarter/city','Mumbai','',0),(96,2,'company/headquarter/postalCode','400001','',0),(97,2,'company/industry','IT Services and IT Consulting','',0),(98,2,'company/universalName','tata-consultancy-services','',0),(99,2,'company/linkedinUrl','https://www.linkedin.com/company/tata-consultancy-services/','',0),(100,2,'company/linkedinId','1353','',0),(101,2,'credits_left','6','',0),(102,2,'rate_limit_left','19','',0),(103,1,'sub','73ZSZGfyNg','',0),(104,1,'email_verified','1','',0),(105,1,'name','sonik sarungale','full_name',1),(106,1,'locale/country','US','',0),(107,1,'locale/language','en','',0),(108,1,'given_name','sonik','',0),(109,1,'family_name','sarungale','',0),(110,1,'email','sonik.sarungale@gmail.com','email',1),(111,1,'picture','https://media.licdn.com/dms/image/D4D03AQFbSYPJy3zV7Q/profile-displayphoto-shrink_100_100/0/1677224131733?e=1704931200&v=beta&t=oLbmaJzLrUXNK4s5y6ZaY8bdg7yN_VYZ4Ka-BFi1o1I','picture',1),(112,3,'public_identifier','soniksarungale','username',1),(113,3,'profile_pic_url','https://s3.us-west-000.backblazeb2.com/proxycurl/person/soniksarungale/profile?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=0004d7f56a0400b0000000001%2F20231105%2Fus-west-000%2Fs3%2Faws4_request&X-Amz-Date=20231105T233556Z&X-Amz-Expires=3600&X-Amz-SignedHeaders=host&X-Amz-Signature=22a78835360d7b4300e07ed57f4d483633256788d39477cf8ac0907ceb530620','picture',1),(114,3,'background_cover_image_url','https://s3.us-west-000.backblazeb2.com/proxycurl/person/soniksarungale/cover?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=0004d7f56a0400b0000000001%2F20231105%2Fus-west-000%2Fs3%2Faws4_request&X-Amz-Date=20231105T233556Z&X-Amz-Expires=3600&X-Amz-SignedHeaders=host&X-Amz-Signature=78bfa8b1c87f34cbb4c3f79d403d5c2b59a0811ffa0618bafdf1fcfb8edd8e4d','',0),(115,3,'first_name','sonik','',0),(116,3,'last_name','sarungale','',0),(117,3,'full_name','sonik sarungale','full_name',1),(118,3,'follower_count','','',0),(119,3,'occupation','','',0),(120,3,'headline','','',0),(121,3,'summary','Just a developer who likes to stay updated over the internet and a huge fan of anime & cricket.','',0),(122,3,'country','IN','',0),(123,3,'country_full_name','India','',0),(124,3,'city','Mumbai','location',1),(125,3,'state','Maharashtra','location',1),(126,3,'experiences[0]/starts_at','','',0),(127,3,'experiences[0]/ends_at','','',0),(128,3,'experiences[0]/company','','',0),(129,3,'experiences[0]/company_linkedin_profile_url','','',0),(130,3,'experiences[0]/title','Parle Tilak Vidyalaya Associations','',0),(131,3,'experiences[0]/description','','',0),(132,3,'experiences[0]/location','','',0),(133,3,'experiences[0]/logo_url','','',0),(134,3,'education[0]/starts_at/day','1','',0),(135,3,'education[0]/starts_at/month','1','',0),(136,3,'education[0]/starts_at/year','2017','',0),(137,3,'education[0]/ends_at/day','31','',0),(138,3,'education[0]/ends_at/month','12','',0),(139,3,'education[0]/ends_at/year','2020','',0),(140,3,'education[0]/field_of_study','Information Technology','',0),(141,3,'education[0]/degree_name','Bachelor of Science','',0),(142,3,'education[0]/school','Parle Tilak Vidyalaya Associations Mulund College of Commerce','',0),(143,3,'education[0]/school_linkedin_profile_url','','',0),(144,3,'education[0]/description','','',0),(145,3,'education[0]/logo_url','','',0),(146,3,'education[0]/grade','','',0),(147,3,'education[0]/activities_and_societies','','',0),(148,3,'education[1]/starts_at/day','1','',0),(149,3,'education[1]/starts_at/month','1','',0),(150,3,'education[1]/starts_at/year','2015','',0),(151,3,'education[1]/ends_at/day','31','',0),(152,3,'education[1]/ends_at/month','12','',0),(153,3,'education[1]/ends_at/year','2017','',0),(154,3,'education[1]/field_of_study','','',0),(155,3,'education[1]/degree_name','commerce','',0),(156,3,'education[1]/school','idubs jr college','',0),(157,3,'education[1]/school_linkedin_profile_url','','',0),(158,3,'education[1]/description','','',0),(159,3,'education[1]/logo_url','','',0),(160,3,'education[1]/grade','','',0),(161,3,'education[1]/activities_and_societies','','',0),(162,3,'education[2]/starts_at/day','1','',0),(163,3,'education[2]/starts_at/month','1','',0),(164,3,'education[2]/starts_at/year','2004','',0),(165,3,'education[2]/ends_at/day','31','',0),(166,3,'education[2]/ends_at/month','12','',0),(167,3,'education[2]/ends_at/year','2015','',0),(168,3,'education[2]/field_of_study','','',0),(169,3,'education[2]/degree_name','','',0),(170,3,'education[2]/school','Adarsha Vidyalaya High School','',0),(171,3,'education[2]/school_linkedin_profile_url','','',0),(172,3,'education[2]/description','','',0),(173,3,'education[2]/logo_url','','',0),(174,3,'education[2]/grade','','',0),(175,3,'education[2]/activities_and_societies','','',0),(176,3,'accomplishment_projects[0]/starts_at','','',0),(177,3,'accomplishment_projects[0]/ends_at','','',0),(178,3,'accomplishment_projects[0]/title','Academic Audit','',0),(179,3,'accomplishment_projects[0]/description','Academic Audit portal for mumbai university','',0),(180,3,'accomplishment_projects[0]/url','http://academicaudit.mu.ac.in/','',0),(181,3,'accomplishment_projects[1]/starts_at','','',0),(182,3,'accomplishment_projects[1]/ends_at','','',0),(183,3,'accomplishment_projects[1]/title','codetine','',0),(184,3,'accomplishment_projects[1]/description','','',0),(185,3,'accomplishment_projects[1]/url','https://codetine.com/','',0),(186,3,'accomplishment_projects[2]/starts_at','','',0),(187,3,'accomplishment_projects[2]/ends_at','','',0),(188,3,'accomplishment_projects[2]/title','wwaindia','',0),(189,3,'accomplishment_projects[2]/description','','',0),(190,3,'accomplishment_projects[2]/url','http://wwaindia.org/','',0),(191,3,'connections','59','',0),(192,3,'similarly_named_profiles[0]/name','Sonik Sarungale','',0),(193,3,'similarly_named_profiles[0]/link','https://in.linkedin.com/in/sonik-sarungale-a28124119','',0),(194,3,'similarly_named_profiles[0]/summary','--','',0),(195,3,'similarly_named_profiles[0]/location','India','',0),(196,3,'inferred_salary','','',0),(197,3,'gender','','',0),(198,3,'birth_date','','',0),(199,3,'industry','','',0),(200,3,'extra','','',0),(204,4,'error','','',0),(205,4,'response/first_name','Sonik','',0),(206,4,'response/last_name','Sarungale','',0),(207,4,'response/full_name','sonik sarungale','full_name',1),(208,4,'response/gender','','',0),(209,4,'response/job_title','IIIT Delhi MTech CSE, Software Developer','',0),(210,4,'response/linkedin','https://www.linkedin.com/in/soniksarungale','',0),(211,4,'response/summary','Development who wear a hoodie and have a keyboard for a weapon.','',0),(212,4,'response/premium','','',0),(213,4,'response/skills','PHP, MySQL, Responsive Web Design, Search Engine Optimization (SEO), User Experience Design (UED), Front-end Development, React.js, HTML5, CSS, JavaScript, jQuery, Content Management Systems (CMS), c, C++, Adobe Photoshop, Python, AngularJS, Bootstrap, Microsoft Office, Windows','skills',1),(214,4,'response/work_experience[0]/company/id','83130414','',0),(215,4,'response/work_experience[0]/company/name','Ekrayah - Global Ecommerce','',0),(216,4,'response/work_experience[0]/company/logo','https://media.licdn.com/dms/image/C4D0BAQEc7YkZEbLi0w/company-logo_400_400/0/1654333591764/ekrayah_global_ecommerce_logo?e=1707350400&v=beta&t=wPDu3pZewf9_TbV2rhPISEzxCtZclu5i1AEmwVljD28','',0),(217,4,'response/work_experience[0]/company/url','https://www.linkedin.com/company/ekrayah-global-ecommerce/','',0),(218,4,'response/work_experience[0]/company/employees/start','2','',0),(219,4,'response/work_experience[0]/company/employees/end','10','',0),(220,4,'response/work_experience[0]/date/start/month','12','',0),(221,4,'response/work_experience[0]/date/start/day','','',0),(222,4,'response/work_experience[0]/date/start/year','2021','',0),(223,4,'response/work_experience[0]/date/end/month','9','',0),(224,4,'response/work_experience[0]/date/end/day','','',0),(225,4,'response/work_experience[0]/date/end/year','2022','',0),(226,4,'response/work_experience[0]/profile_positions[0]/location','','',0),(227,4,'response/work_experience[0]/profile_positions[0]/date/start/month','12','',0),(228,4,'response/work_experience[0]/profile_positions[0]/date/start/day','','',0),(229,4,'response/work_experience[0]/profile_positions[0]/date/start/year','2021','',0),(230,4,'response/work_experience[0]/profile_positions[0]/date/end/month','9','',0),(231,4,'response/work_experience[0]/profile_positions[0]/date/end/day','','',0),(232,4,'response/work_experience[0]/profile_positions[0]/date/end/year','2022','',0),(233,4,'response/work_experience[0]/profile_positions[0]/company','Ekrayah - Global Ecommerce','',0),(234,4,'response/work_experience[0]/profile_positions[0]/description','','',0),(235,4,'response/work_experience[0]/profile_positions[0]/title','Software Developer','',0),(236,4,'response/work_experience[0]/profile_positions[0]/employment_type','','',0),(237,4,'response/work_experience[1]/company/id','13450831','',0),(238,4,'response/work_experience[1]/company/name','Revolo Infotech','',0),(239,4,'response/work_experience[1]/company/logo','https://media.licdn.com/dms/image/C4D0BAQEMkxkVQr2_zA/company-logo_400_400/0/1655818503272/revolo_logo?e=1707350400&v=beta&t=nISrJ9_4hcpTBwVWOSnUtJg1Ubdgg3d6Tf0_vi_EtkU','',0),(240,4,'response/work_experience[1]/company/url','https://www.linkedin.com/company/revolo/','',0),(241,4,'response/work_experience[1]/company/employees/start','51','',0),(242,4,'response/work_experience[1]/company/employees/end','200','',0),(243,4,'response/work_experience[1]/date/start/month','12','',0),(244,4,'response/work_experience[1]/date/start/day','','',0),(245,4,'response/work_experience[1]/date/start/year','2020','',0),(246,4,'response/work_experience[1]/date/end/month','12','',0),(247,4,'response/work_experience[1]/date/end/day','','',0),(248,4,'response/work_experience[1]/date/end/year','2021','',0),(249,4,'response/work_experience[1]/profile_positions[0]/location','','',0),(250,4,'response/work_experience[1]/profile_positions[0]/date/start/month','12','',0),(251,4,'response/work_experience[1]/profile_positions[0]/date/start/day','','',0),(252,4,'response/work_experience[1]/profile_positions[0]/date/start/year','2020','',0),(253,4,'response/work_experience[1]/profile_positions[0]/date/end/month','12','',0),(254,4,'response/work_experience[1]/profile_positions[0]/date/end/day','','',0),(255,4,'response/work_experience[1]/profile_positions[0]/date/end/year','2021','',0),(256,4,'response/work_experience[1]/profile_positions[0]/company','Revolo Infotech','',0),(257,4,'response/work_experience[1]/profile_positions[0]/description','','',0),(258,4,'response/work_experience[1]/profile_positions[0]/title','Web Developer','',0),(259,4,'response/work_experience[1]/profile_positions[0]/employment_type','Full-time','',0),(260,4,'response/work_experience[2]/company/id','','',0),(261,4,'response/work_experience[2]/company/name','Codetine','',0),(262,4,'response/work_experience[2]/company/logo','','',0),(263,4,'response/work_experience[2]/company/url','','',0),(264,4,'response/work_experience[2]/company/employees/start','','',0),(265,4,'response/work_experience[2]/company/employees/end','','',0),(266,4,'response/work_experience[2]/date/start/month','3','',0),(267,4,'response/work_experience[2]/date/start/day','','',0),(268,4,'response/work_experience[2]/date/start/year','2020','',0),(269,4,'response/work_experience[2]/date/end/month','12','',0),(270,4,'response/work_experience[2]/date/end/day','','',0),(271,4,'response/work_experience[2]/date/end/year','2020','',0),(272,4,'response/work_experience[2]/profile_positions[0]/location','Mumbai','',0),(273,4,'response/work_experience[2]/profile_positions[0]/date/start/month','3','',0),(274,4,'response/work_experience[2]/profile_positions[0]/date/start/day','','',0),(275,4,'response/work_experience[2]/profile_positions[0]/date/start/year','2020','',0),(276,4,'response/work_experience[2]/profile_positions[0]/date/end/month','12','',0),(277,4,'response/work_experience[2]/profile_positions[0]/date/end/day','','',0),(278,4,'response/work_experience[2]/profile_positions[0]/date/end/year','2020','',0),(279,4,'response/work_experience[2]/profile_positions[0]/company','Codetine','',0),(280,4,'response/work_experience[2]/profile_positions[0]/description','','',0),(281,4,'response/work_experience[2]/profile_positions[0]/title','Web Developer','',0),(282,4,'response/work_experience[2]/profile_positions[0]/employment_type','Freelance','',0),(283,4,'response/work_experience[3]/company/id','','',0),(284,4,'response/work_experience[3]/company/name','Self-Employed','',0),(285,4,'response/work_experience[3]/company/logo','','',0),(286,4,'response/work_experience[3]/company/url','','',0),(287,4,'response/work_experience[3]/company/employees/start','','',0),(288,4,'response/work_experience[3]/company/employees/end','','',0),(289,4,'response/work_experience[3]/date/start/month','1','',0),(290,4,'response/work_experience[3]/date/start/day','','',0),(291,4,'response/work_experience[3]/date/start/year','2016','',0),(292,4,'response/work_experience[3]/date/end/month','3','',0),(293,4,'response/work_experience[3]/date/end/day','','',0),(294,4,'response/work_experience[3]/date/end/year','2020','',0),(295,4,'response/work_experience[3]/profile_positions[0]/location','Mumbai Area, India','',0),(296,4,'response/work_experience[3]/profile_positions[0]/date/start/month','1','',0),(297,4,'response/work_experience[3]/profile_positions[0]/date/start/day','','',0),(298,4,'response/work_experience[3]/profile_positions[0]/date/start/year','2016','',0),(299,4,'response/work_experience[3]/profile_positions[0]/date/end/month','3','',0),(300,4,'response/work_experience[3]/profile_positions[0]/date/end/day','','',0),(301,4,'response/work_experience[3]/profile_positions[0]/date/end/year','2020','',0),(302,4,'response/work_experience[3]/profile_positions[0]/company','Self-Employed','',0),(303,4,'response/work_experience[3]/profile_positions[0]/description','','',0),(304,4,'response/work_experience[3]/profile_positions[0]/title','Web Developer','',0),(305,4,'response/work_experience[3]/profile_positions[0]/employment_type','Freelance','',0),(306,4,'response/education[0]/date/start/month','7','',0),(307,4,'response/education[0]/date/start/day','','',0),(308,4,'response/education[0]/date/start/year','2023','',0),(309,4,'response/education[0]/date/end/month','','',0),(310,4,'response/education[0]/date/end/day','','',0),(311,4,'response/education[0]/date/end/year','','',0),(312,4,'response/education[0]/school/name','Indraprastha Institute of Information Technology, Delhi','',0),(313,4,'response/education[0]/school/logo','https://media.licdn.com/dms/image/C560BAQG8G8yRaFuoBQ/company-logo_400_400/0/1631351289400?e=1707350400&v=beta&t=X6BNFoj11acOEN3PDQPOy2hS3nYNpiKz3HRZImtn9iY','',0),(314,4,'response/education[0]/school/url','https://www.linkedin.com/school/iiit-delhi/','',0),(315,4,'response/education[0]/degree_name','Master of Technology - MTech','',0),(316,4,'response/education[0]/field_of_study','','',0),(317,4,'response/education[0]/grade','','',0),(318,4,'response/education[1]/date/start/month','','',0),(319,4,'response/education[1]/date/start/day','','',0),(320,4,'response/education[1]/date/start/year','2020','',0),(321,4,'response/education[1]/date/end/month','','',0),(322,4,'response/education[1]/date/end/day','','',0),(323,4,'response/education[1]/date/end/year','2022','',0),(324,4,'response/education[1]/school/name','Mulund College Of Commerce','',0),(325,4,'response/education[1]/school/logo','https://media.licdn.com/dms/image/C560BAQGz0Wzd18Msew/company-logo_400_400/0/1624384059158/mulund_college_of_commerce_logo?e=1707350400&v=beta&t=MAw8dntA9hp4XpVsLpWtVgQXbclNpylr9r7U-CdUO14','',0),(326,4,'response/education[1]/school/url','https://www.linkedin.com/school/mulund-college-of-commerce/','',0),(327,4,'response/education[1]/degree_name','Master of Science - MS','',0),(328,4,'response/education[1]/field_of_study','Information Technology','',0),(329,4,'response/education[1]/grade','','',0),(330,4,'response/education[2]/date/start/month','','',0),(331,4,'response/education[2]/date/start/day','','',0),(332,4,'response/education[2]/date/start/year','2017','',0),(333,4,'response/education[2]/date/end/month','','',0),(334,4,'response/education[2]/date/end/day','','',0),(335,4,'response/education[2]/date/end/year','2020','',0),(336,4,'response/education[2]/school/name','Mulund College Of Commerce','',0),(337,4,'response/education[2]/school/logo','https://media.licdn.com/dms/image/C560BAQGz0Wzd18Msew/company-logo_400_400/0/1624384059158/mulund_college_of_commerce_logo?e=1707350400&v=beta&t=MAw8dntA9hp4XpVsLpWtVgQXbclNpylr9r7U-CdUO14','',0),(338,4,'response/education[2]/school/url','https://www.linkedin.com/school/mulund-college-of-commerce/','',0),(339,4,'response/education[2]/degree_name','Bachelor of Science','',0),(340,4,'response/education[2]/field_of_study','Information Technology','',0),(341,4,'response/education[2]/grade','','',0),(342,4,'response/education[3]/date/start/month','','',0),(343,4,'response/education[3]/date/start/day','','',0),(344,4,'response/education[3]/date/start/year','2015','',0),(345,4,'response/education[3]/date/end/month','','',0),(346,4,'response/education[3]/date/end/day','','',0),(347,4,'response/education[3]/date/end/year','2017','',0),(348,4,'response/education[3]/school/name','idubs jr college','',0),(349,4,'response/education[3]/school/logo','','',0),(350,4,'response/education[3]/school/url','','',0),(351,4,'response/education[3]/degree_name','','',0),(352,4,'response/education[3]/field_of_study','commerce','',0),(353,4,'response/education[3]/grade','','',0),(354,4,'response/education[4]/date/start/month','','',0),(355,4,'response/education[4]/date/start/day','','',0),(356,4,'response/education[4]/date/start/year','2004','',0),(357,4,'response/education[4]/date/end/month','','',0),(358,4,'response/education[4]/date/end/day','','',0),(359,4,'response/education[4]/date/end/year','2015','',0),(360,4,'response/education[4]/school/name','Adarsh Vidyalaya High School - India','',0),(361,4,'response/education[4]/school/logo','','',0),(362,4,'response/education[4]/school/url','https://www.linkedin.com/school/adarsh-vidyalaya-high-school---india/','',0),(363,4,'response/education[4]/degree_name','','',0),(364,4,'response/education[4]/field_of_study','','',0),(365,4,'response/education[4]/grade','','',0),(366,4,'response/languages/primary_locale/country','US','',0),(367,4,'response/languages/primary_locale/language','en','',0),(368,4,'response/languages/supported_locales[0]/country','US','',0),(369,4,'response/languages/supported_locales[0]/language','en','',0),(370,4,'response/current_job_year','2021','',0),(371,4,'response/current_job_month','12','',0),(372,4,'response/entity_urn','ACoAABxsaB0BxUlfo6nIHamaypJZ-SnA2xofH_g','',0),(373,4,'response/picture','https://assets-prospeo.s3.us-east-2.amazonaws.com/lead_F10469J2OA78AOKUKH8H.jpg','',0),(374,4,'response/email/email','','',0),(375,4,'response/email/email_anon_id','','',0),(376,4,'response/email/email_status','NOT_FOUND','',0),(377,4,'response/email/email_type','professional','',0),(378,4,'response/company/name','Ekrayah - Global Ecommerce','',0),(379,4,'response/company/is_catch_all','','',0),(380,4,'response/company/size','2-10','',0),(381,4,'response/company/logo','https://assets-prospeo.s3.us-east-2.amazonaws.com/company_VFXQH78MOHTOS6Q2LGZV.jpg','',0),(382,4,'response/company/linkedin','https://www.linkedin.com/company/ekrayah-global-ecommerce','',0),(383,4,'response/company/website','http://www.ekrayah.com','',0),(384,4,'response/company/domain','ekrayah.com','',0),(385,4,'response/company/common_email_pattern','{first}.{last}','',0),(386,4,'response/company/industry','Software Development','',0),(387,4,'response/company/founded_in','2022','',0),(388,4,'response/company/description','Ekrayah Bridges the gap of availability for all your favorite overseas products to your doorsteps. We help your brand to scale globally and give the best shopping experience & customer service to your overseas customers.\r\n\r\nMajor categories we deal in are Health & Beauty, Personal care, Toys, Health Aids, Supplements & many more.\r\n\r\nEkrayah is taking one more step to help Indian Sellers to sell Globally via Ekrayah or your own D2C Platforms and enjoy the leverage of expanding and benefiting from the Global Market.','',0),(389,4,'response/company/total_emails','1','',0),(390,4,'response/company/location/country','India','',0),(391,4,'response/company/location/country_code','IN','',0),(392,4,'response/company/location/state','','',0),(393,4,'response/company/location/city','Mumbai','',0),(394,4,'response/company/location/timezone','Asia/Kolkata','',0),(395,4,'response/company/location/timezone_offset','5.5','',0),(396,4,'response/company/location/postal_code','','',0),(397,4,'response/company/location/address','','',0),(398,4,'response/location/country','India','',0),(399,4,'response/location/country_code','IN','',0),(400,4,'response/location/state','Maharashtra','',0),(401,4,'response/location/city','Mumbai','',0),(402,4,'response/location/timezone','Asia/Kolkata','',0),(403,4,'response/location/timezone_offset','5.5','',0),(404,4,'response/location/postal_code','','',0),(405,4,'response/location/raw','Mumbai, Maharashtra, India','location',1);
/*!40000 ALTER TABLE `schema_mapping` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-21 12:08:24
