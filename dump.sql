-- MySQL dump 10.13  Distrib 8.0.21, for Linux (x86_64)
--
-- Host: localhost    Database: oriGamers
-- ------------------------------------------------------
-- Server version	8.0.21-0ubuntu0.20.04.4

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `username` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Ratnesh','Karbhari','ratneshkarbhari','$2y$10$I5r7j4c94TZpaC0lzQwYE.nHAbHt0gdyqVrgLMvOXAXWm5eaCImXe');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` varchar(500) NOT NULL,
  `mobile_number` text NOT NULL,
  `password` varchar(500) NOT NULL,
  `reff_code` varchar(500) NOT NULL,
  `parent_code` varchar(500) NOT NULL,
  `city` text NOT NULL,
  `pincode` text NOT NULL,
  `country` text NOT NULL,
  `state` text NOT NULL,
  `account_auth_by` text NOT NULL,
  `purchased` text NOT NULL,
  `gpay_credit_claim_status` varchar(100) NOT NULL,
  `google_play_email_id` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (2,'Ratnesh','Karbhari','rkarbhari23@gmail.com','9137976398','','5f6d9bcf2a0bc','independent','Mumbai','400083','India','Maharashtra','google_login','yes','',''),(6,'Ratnesh','Karbhari','codesevaco@gmail.com','','$2y$10$DykzdpWPC9STG6/2poeMAe7XFJzVYro1coAhxqGFcJpQXyYd/Z2Ai','5f6ed90c52867','5f6d9bcf2a0bc','','','','','email','no','settled','rkarbhari23@gmail.com'),(7,'Emmanuel','Peter','mr.peter0201@gmail.com','','','5f70b3848c5d0','5f6d9bcf2a0bc','','','','','google_login','yes','','');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_products`
--

DROP TABLE IF EXISTS `game_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `game_products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `slug` varchar(500) NOT NULL,
  `parent_game` int NOT NULL,
  `description` text NOT NULL,
  `featured_image` varchar(500) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_products`
--

LOCK TABLES `game_products` WRITE;
/*!40000 ALTER TABLE `game_products` DISABLE KEYS */;
INSERT INTO `game_products` VALUES (10,'PUBG Mobile 600 UC + 60 Free','pubg-mobile-660-uc',13,'.................................','8713a439a04e2578ca82052b9292f228.jpg',740.00,280.00),(11,'PUBG Mobile Falcon','pubg-mobile-falcon',13,'.......................................','f0c576124e5686683cd8c737997df0e0.jpg',1876.00,680.00),(13,'PUBG Royal Pass','pubg-mobile-royal-pass',13,'.............................................','380ff2e401ca2c57bc158de0a3a969a3.jpg',800.00,280.00),(14,'PUBG Mobile Royal Pass Plus','pubg-mobile-royal-pass-plus',13,'....................................','c3b7470dbd1bad351d708b54e18f31f5.jpg',1876.00,680.00),(15,'COD Mobile 400 CP + 20 CP Free','cod-mobile-420-CP-coins',15,'.........................','a9bdaca6bd686d19d5222594b8cfd01c.jpg',399.00,180.00),(16,'COD Mobile 800 CP + 80 CP Free','cod-mobile-880CP-coins',15,'........................','c457000d447ff68123f0bef484df71e3.jpg',799.00,280.00),(17,'COD Mobile 2000 CP + 400 CP Free','cod-mobile-2400-coins',15,'.................................................','86bd48309ab9f2cf965d75a586017609.jpg',1949.00,780.00),(18,'COD Mobile 4000 CP + 1000 CP Free','cod-mobile-5000-coins',15,'.........................................','83a2c631919bba86163424aef014e3c1.jpg',3200.00,1280.00),(19,'FREE FIRE 100 DIAMONDS','Free-Fire-100-diamonds',16,'.............................................','29acbbe70ab28394f677164bebf490c6.jpg',80.00,40.00),(20,'FREE FIRE 310 DIAMONDS','Free-Fire-310-diamonds',16,'.........................................','093281346d6685287dfa41b82b83a49b.jpg',250.00,90.00),(21,'FREE FIRE 520 DIAMONDS','Free-Fire-520-diamonds',16,'................................................','d5feeaa5f63a21363d9601504afe849f.jpg',400.00,180.00),(22,'FREE FIRE 1060 DIAMONDS','Free-Fire-1060-diamonds',16,'..............................','11adb745190e98479cb06b94bf58ad80.jpg',800.00,280.00),(23,'FREE FIRE 2180 DIAMONDS','Free-Fire-2180-diamonds',16,'.......................................','e588642cfb1999a1c63220d535eb5bd6.jpg',1600.00,580.00),(24,'Clash of Clans 500 Gems','clash-of-clans-500-Gems',18,'.......................','e01c3605a568ab08835e3e09b2ea9b71.jpg',400.00,180.00);
/*!40000 ALTER TABLE `game_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `games` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `slug` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `featured_image` varchar(500) NOT NULL,
  `banner_images` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `games`
--

LOCK TABLES `games` WRITE;
/*!40000 ALTER TABLE `games` DISABLE KEYS */;
INSERT INTO `games` VALUES (13,'PUBG Mobile','pubg-mobile','','4726fb52b3ad7530fccee9b454352a40.jpg','[\"82302504b73de1473bff0c49f4ba96b9.png\",\"e3f88b3f1887f0c24376a4dc6a4f5d88.jpg\",\"39b2db86acbf11f054a60fb3cdb7d270.jpg\",\"88fea8712513cb9b70d819cb493189d7.png\",\"ca330704364957e5ba78efe38b440013.jpg\",\"5b1b1edfe8794b93d585ebf153316595.jpg\",\"3a283f1e2c4c1592d502591ac887d898.jpg\"]'),(15,'COD Mobile ','cod-mobile','......................','69e6158a0a49c23a408f6d358e165697.jpg','[\"d3312ef0f251794808bbf6aed4db8969.jpg\",\"dd15e66c8dd976448f96d27b3dd3b9d5.jpg\",\"d48a49410dc0b857444984c0eb6ffb43.jpg\",\"e425bfccd416fd430a9ab81fc7eb5942.jpg\",\"c56fdd8648b999d316972eaf18ad5405.jpg\"]'),(16,'FREE FIRE','Free-Fire','...............................','32f9c882032cf6851f625deb151a460d.jpg','[\"0a1aeba1d9126ab0bd2ec5238f09dc32.jpg\",\"3fc04a2a263f1cb5fcb4ba56f9da1b0e.jpg\"]'),(18,'Clash of Clans','clash-of-clans','..........................','4646089e47741cfac909e1360b267ec5.jpg','[\"ea767bf4192410f6a9866b0aac099ead.jpg\"]'),(19,'Clash Royale','clash-royale','.......................................','900c032dc1ec0edd13f6336ceacc4f1f.png','[\"94cd1486d681bf4043fa882fcd7cb465.jpg\",\"1c18a5b88f833600022e04925b13eb15.jpg\"]'),(20,'PUBG Mobile Lite','pubg-mobile-lite','........................jgjjjg','d30b2bdd469223f17b2efd5c855ddcb9.jpg','[\"4176d42c4d7331d7456a6331c1e0b0be.jpg\",\"709fb1efe16ab565757a2001fc75f41e.jpg\"]');
/*!40000 ALTER TABLE `games` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gpay_credit_requests`
--

DROP TABLE IF EXISTS `gpay_credit_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `gpay_credit_requests` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` text NOT NULL,
  `customer_id` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gpay_credit_requests`
--

LOCK TABLES `gpay_credit_requests` WRITE;
/*!40000 ALTER TABLE `gpay_credit_requests` DISABLE KEYS */;
INSERT INTO `gpay_credit_requests` VALUES (1,'rkarbhari23@gmail.com','6');
/*!40000 ALTER TABLE `gpay_credit_requests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `razorpay_payment_id` text NOT NULL,
  `razorpay_order_id` text NOT NULL,
  `razorpay_signature` text NOT NULL,
  `payee_customer_email` varchar(500) NOT NULL,
  `payee_customer_name` text NOT NULL,
  `product_id` int NOT NULL,
  `date` text NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,'pay_FfdvJTwnhB9lfN','order_FfduXwwo2Ix1UJ','e63907c632b0cfb4e9d5627657718fb88502c53cff357b1c51bfc3b1492dd986','codesevaco@gmail.com','Code Seva',10,'2020-09-25',1.00),(2,'pay_Ffe2U8CN7XyN49','order_Ffe1lBRav0OXuZ','4b438788e4c34444a8698a95361710c3993cdbf4e5e5dc079ce1a069cdc88064','codesevaco@gmail.com','Code Seva',13,'2020-09-25',1.00),(3,'pay_FgLLMvWdfqW8FF','order_FgLKgr7whC0CqI','626d4d661eb479cdd3498e3bd31682d6692c76da36d647d9c4e2c9e0e918105e','rkarbhari23@gmail.com','Ratnesh Karbhari',14,'2020-09-25',2.00);
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-10-01 12:36:26
