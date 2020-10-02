-- MariaDB dump 10.17  Distrib 10.4.14-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u366233228_oriGamersNew
-- ------------------------------------------------------
-- Server version	10.4.14-MariaDB-cll-lve

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (2,'Ratnesh','Karbhari','rkarbhari23@gmail.com','9137976398','','5f6d9bcf2a0bc','independent','Mumbai','400083','India','Maharashtra','google_login','yes','',''),(6,'Ratnesh','Karbhari','codesevaco@gmail.com','','$2y$10$DykzdpWPC9STG6/2poeMAe7XFJzVYro1coAhxqGFcJpQXyYd/Z2Ai','5f6ed90c52867','independent','','','','','email','no','requested','rkarbhari23@gmail.com'),(7,'Emmanuel','Peter','mr.peter0201@gmail.com','9766497776','','5f70b3848c5d0','independent','Lohegaon, Pune','411047','','Maharashtra','google_login','no','',''),(8,'Treta','Jethwa','tretajethwa3@gmail.com','7841021675','','5f75e88ca60d4','independent','Nagpur ','440012','India ','Maharashtra ','google_login','no','',''),(9,'Vijay','Peter','vijaypeter786@gmail.com','9561079432 ','','5f76f52a53aad','independent','Nagpur ','440027 ','India ','Maharashtra ','google_login','yes','',''),(10,'misehelle','peter','misehelle.peter@mcghsajni.in','8788921416','','5f7760288b24e','independent','Nagpur','440027','India','Maharashtra','google_login','no','',''),(11,'Archit','Kukdey','archit.123k@gmail.com','9130351561','','5f776111165fb','independent','Nagpur ','440013','India ','Maharashtra ','google_login','no','',''),(12,'Zeus','Codes','zeuscodesagency@gmail.com','','','5f77722b4fc89','independent','','','','','google_login','no','','');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `game_products`
--

DROP TABLE IF EXISTS `game_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `game_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `slug` varchar(500) NOT NULL,
  `parent_game` int(11) NOT NULL,
  `description` text NOT NULL,
  `featured_image` varchar(500) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `game_products`
--

LOCK TABLES `game_products` WRITE;
/*!40000 ALTER TABLE `game_products` DISABLE KEYS */;
INSERT INTO `game_products` VALUES (10,'PUBG Mobile 600 UC + 60 Free','pubg-mobile-660-uc',13,'.................................','8713a439a04e2578ca82052b9292f228.jpg',740.00,280.00),(11,'PUBG Mobile Falcon','pubg-mobile-falcon',13,'A falcon companion is a bird that sits on a player\'s shoulder or flies alongside as he or she moves throughout a game. ... According to an in-game description, the falcon will only be visible to a player and his/her teammates. Thus, one doesn\'t have to worry about getting exposed to enemies because of the companion.','f0c576124e5686683cd8c737997df0e0.jpg',1876.00,680.00),(13,'PUBG Royal Pass','pubg-mobile-royal-pass',13,'With the beginning of a new Season, Tencent Games has announced the launch of a new Royale Pass, which is now available for all players. Using the Royal Pass, the users will get to play additional Season missions and earn more rewards.','380ff2e401ca2c57bc158de0a3a969a3.jpg',800.00,280.00),(14,'PUBG Mobile Royal Pass Plus','pubg-mobile-royal-pass-plus',13,'FREE PASS. Open to all players. Earn Royale Points from missions, items and crates to rank up and collect rewards. ...\r\nELITE PASS. Costs 600 UC. ...\r\nELITE PASS PLUS. Includes everything offered by Elite Pass, and grants 25 ranks at 40% off compared to Elite Pass.','c3b7470dbd1bad351d708b54e18f31f5.jpg',1876.00,680.00),(15,'COD Mobile 400 CP + 20 CP Free','cod-mobile-420-CP-coins',15,'COD points (CP) are the in-game currency of Call of Duty Mobile and are used to purchase numerous items like skins and emotes from the store. Even the tier-based reward system, Battle Pass, can be bought using CP. Users have to pay real money to purchase CP. Here we provide 400CP plus 20CP Free.','a9bdaca6bd686d19d5222594b8cfd01c.jpg',399.00,180.00),(16,'COD Mobile 800 CP + 80 CP Free','cod-mobile-880CP-coins',15,'COD points (CP) are the in-game currency of Call of Duty Mobile and are used to purchase numerous items like skins and emotes from the store. Even the tier-based reward system, Battle Pass, can be bought using CP. Users have to pay real money to purchase CP. Here we provide 800CP plus 80CP Free.','c457000d447ff68123f0bef484df71e3.jpg',799.00,280.00),(17,'COD Mobile 2000 CP + 400 CP Free','cod-mobile-2400-coins',15,'COD points (CP) are the in-game currency of Call of Duty Mobile and are used to purchase numerous items like skins and emotes from the store. Even the tier-based reward system, Battle Pass, can be bought using CP. Users have to pay real money to purchase CP. Here we provide 2000CP plus 400CP Free.','86bd48309ab9f2cf965d75a586017609.jpg',1949.00,780.00),(18,'COD Mobile 4000 CP + 1000 CP Free','cod-mobile-5000-coins',15,'COD points (CP) are the in-game currency of Call of Duty Mobile and are used to purchase numerous items like skins and emotes from the store. Even the tier-based reward system, Battle Pass, can be bought using CP. Users have to pay real money to purchase CP. Here we provide 4000CP plus 1000CP Free.','83a2c631919bba86163424aef014e3c1.jpg',3200.00,1280.00),(19,'FREE FIRE 100 DIAMONDS','Free-Fire-100-diamonds',16,'Diamonds in Free Fire are used to purchase exclusive in-game items like characters, outfits, weapons, vehicle skins, and much more. These rewards can be obtained directly from the shop or redeemed by completing Elite Pass missions. The diamonds can be purchased by navigating to the diamond section of the game. Here we provide 100 diamonds.','29acbbe70ab28394f677164bebf490c6.jpg',80.00,40.00),(20,'FREE FIRE 310 DIAMONDS','Free-Fire-310-diamonds',16,'Diamonds in Free Fire are used to purchase exclusive in-game items like characters, outfits, weapons, vehicle skins, and much more. These rewards can be obtained directly from the shop or redeemed by completing Elite Pass missions. The diamonds can be purchased by navigating to the diamond section of the game. Here we provide 310 diamonds.','093281346d6685287dfa41b82b83a49b.jpg',250.00,90.00),(21,'FREE FIRE 520 DIAMONDS','Free-Fire-520-diamonds',16,'Diamonds in Free Fire are used to purchase exclusive in-game items like characters, outfits, weapons, vehicle skins, and much more. These rewards can be obtained directly from the shop or redeemed by completing Elite Pass missions. The diamonds can be purchased by navigating to the diamond section of the game. Here we provide 520 diamonds.','d5feeaa5f63a21363d9601504afe849f.jpg',400.00,180.00),(22,'FREE FIRE 1060 DIAMONDS','Free-Fire-1060-diamonds',16,'Diamonds in Free Fire are used to purchase exclusive in-game items like characters, outfits, weapons, vehicle skins, and much more. These rewards can be obtained directly from the shop or redeemed by completing Elite Pass missions. The diamonds can be purchased by navigating to the diamond section of the game. Here we provide 1060 diamonds.','11adb745190e98479cb06b94bf58ad80.jpg',800.00,280.00),(23,'FREE FIRE 2180 DIAMONDS','Free-Fire-2180-diamonds',16,'Diamonds in Free Fire are used to purchase exclusive in-game items like characters, outfits, weapons, vehicle skins, and much more. These rewards can be obtained directly from the shop or redeemed by completing Elite Pass missions. The diamonds can be purchased by navigating to the diamond section of the game. Here we provide 2180 diamonds.','e588642cfb1999a1c63220d535eb5bd6.jpg',1600.00,580.00),(24,'Clash of Clans 500 Gems','clash-of-clans-500-Gems',18,'At first you have to use gems to collect all five builders then you can keep it for emergencies like war attacks and loots. And sometimes to use it when you get 1 gem boost offers .Here we provide pile of 500 gems.','fe7510ee1e520d52b8d1536865785208.jpg',400.00,180.00),(25,'Clash of Clans 1200 Gems','clash-of-clans-1200-Gems',18,'At first you have to use gems to collect all five builders then you can keep it for emergencies like war attacks and loots. And sometimes to use it when you get 1 gem boost offers .Here we provide bag of 1200 gems.','b5a0e9769f6054b0d849f876745045fd.jpg',799.00,280.00),(26,'Clash of Clans 2500 Gems','clash-of-clans-2500-Gems',18,'At first you have to use gems to collect all five builders then you can keep it for emergencies like war attacks and loots. And sometimes to use it when you get 1 gem boost offers .Here we provide sack of 2500 gems.','e80959e5f32048c479d6ed0d9c116e2b.jpg',1599.00,620.00),(28,'Clash of Clans 6500 Gems','clash-of-clans-6500-Gems',18,'At first you have to use gems to collect all five builders then you can keep it for emergencies like war attacks and loots. And sometimes to use it when you get 1 gem boost offers .Here we provide box of 6500 gems.','0ce69f2aee8f86ce0428f5d3925e8431.jpg',3999.00,1420.00),(29,'Clash of Clans 14000 Gems','clash-of-clans-14000-Gems',18,'At first you have to use gems to collect all five builders then you can keep it for emergencies like war attacks and loots. And sometimes to use it when you get 1 gem boost offers .Here we provide chest of 14000 gems.','ae4cea8400df30665420d7bcf974381e.jpg',7900.00,2880.00),(31,'Clash Royale 80 Gems','clash-royale-80-gems',19,'Gems can be used to buy gold or speed up the unlocking of chests. Gems are the premium currency of Clash Royale. When players first download the game, they start with 100 Gems. Here we provide fistful of 80 gems.','70d91c7b46163af7160dbfeb225773ef.jpg',79.00,35.00),(32,'Clash Royale 500 Gems','clash-royale-500-Gems',19,'Gems can be used to buy gold or speed up the unlocking of chests. Gems are the premium currency of Clash Royale. When players first download the game, they start with 100 Gems. Here we provide pouch of 500 gems.','f7dc8fbf9fd96255a12bf917b7125000.jpg',399.00,180.00),(33,'Clash Royale 1200 Gems','clash-royale-1200-Gems',19,'Gems can be used to buy gold or speed up the unlocking of chests. Gems are the premium currency of Clash Royale. When players first download the game, they start with 100 Gems. Here we provide bucket of 1200 gems.','bb3b2b1dc9d1823ded56f1f530c67ff1.jpg',799.00,280.00),(34,'Clash Royale 2500 Gems','clash-royale-2500-Gems',19,'Gems can be used to buy gold or speed up the unlocking of chests. Gems are the premium currency of Clash Royale. When players first download the game, they start with 100 Gems. Here we provide barrel of 2500 gems..','eb5a21a29285ed97c3519de555c8562b.jpg',1599.00,620.00),(35,'Clash Royale 6500 Gems','clash-royale-6500-Gems',19,'Gems can be used to buy gold or speed up the unlocking of chests. Gems are the premium currency of Clash Royale. When players first download the game, they start with 100 Gems. Here we provide wagon of 6500 gems.','37593c13850e540e655345dcf7fa2b61.jpg',3999.00,1420.00),(36,'Clash Royale 14000 Gems','clash-royale',19,'Gems can be used to buy gold or speed up the unlocking of chests. Gems are the premium currency of Clash Royale. When players first download the game, they start with 100 Gems. Here we provide mountain of 14000 gems.','ba94f3b9cf46cf058dce1798d7bc5d7a.png',7900.00,1420.00),(37,'Pubg Mobile Lite 60BC+30BC extra','Pubg-mobile-lite-60BC30BC-extra',20,'BC or Battle Coins are the currency of PUBG Mobile Lite, which is the toned-down version of PUBG Mobile. Players use BC to purchase the winner pass as well as several exclusive skins, costumes and exciting features in the game. As the game is free, the developers use micro-transactions to generate revenue. Here we provide 60BC+30BC extra.','cee2daf229e7474f5cfff727663e31ea.png',76.23,35.00),(38,'Pubg Mobile Lite 190BC+95BC extra','Pubg-mobile-lite-190BC95BC-extra',20,'BC or Battle Coins are the currency of PUBG Mobile Lite, which is the toned-down version of PUBG Mobile. Players use BC to purchase the winner pass as well as several exclusive skins, costumes and exciting features in the game. As the game is free, the developers use micro-transactions to generate revenue. Here we provide 190BC+95BC.','67fceeeb38b3f1c8b592f48cd564eeb7.png',219.17,90.00),(39,'Pubg Mobile Lite 320BC+160BC extra','Pubg-mobile-lite-320BC160BC-extra',20,'BC or Battle Coins are the currency of PUBG Mobile Lite, which is the toned-down version of PUBG Mobile. Players use BC to purchase the winner pass as well as several exclusive skins, costumes and exciting features in the game. As the game is free, the developers use micro-transactions to generate revenue. Here we provide 320BC+160BC.','f8c94deb59cf10c9a2752a73240996d5.png',362.11,180.00),(40,'Pubg Mobile Lite 650BC+325BC extra','Pubg-mobile-lite-650BC325BC-extra',20,'BC or Battle Coins are the currency of PUBG Mobile Lite, which is the toned-down version of PUBG Mobile. Players use BC to purchase the winner pass as well as several exclusive skins, costumes and exciting features in the game. As the game is free, the developers use micro-transactions to generate revenue. Here we provide 650BC+325BC.','2372e980bd97e7fe6583a25dd13b00ea.png',743.28,320.00),(41,'Pubg Mobile Lite 1700BC+850BC extra','Pubg-mobile-lite-1700BC850BC-extra',20,'BC or Battle Coins are the currency of PUBG Mobile Lite, which is the toned-down version of PUBG Mobile. Players use BC to purchase the winner pass as well as several exclusive skins, costumes and exciting features in the game. As the game is free, the developers use micro-transactions to generate revenue. Here we provide 1700BC+850BC.','2738b643582ad80d37aff4bc8eb21ad8.png',1886.79,720.00),(42,'Pubg Mobile Lite 3500 BC+1750 BC extra','Pubg-mobile-lite-3500BC1750BC-extra',20,'BC or Battle Coins are the currency of PUBG Mobile Lite, which is the toned-down version of PUBG Mobile. Players use BC to purchase the winner pass as well as several exclusive skins, costumes and exciting features in the game. As the game is free, the developers use micro-transactions to generate revenue. Here we provide 3500BC+1750BC.','d2ba1f16b35f4c9aed4363307796e898.png',3792.64,1380.00),(44,'Pubg Mobile 60UC','Pubg-Mobile-60UC',13,'UC stands for unknown cash which is the currency used in pubg to get skins of guns helmet and bag-packs and good clothing. You have to buy it through the game using real currency. Here we provide 60UC.','87c84a1c79fed9fc4054b0eb06acfaee.jpg',76.23,35.00),(45,'Pubg Mobile 300UC+25UC free','Pubg-Mobile-300UC25UC-free',13,'UC stands for unknown cash which is the currency used in pubg to get skins of guns helmet and bagpacks and good clothing. You have to buy it through the game using real currency. Here we provide 300UC+25UC free.','b20ab7ba62c6bc448a85e14307431672.jpg',362.11,180.00),(46,'Pubg Mobile 1500UC+300UC free','Pubg-Mobile-1500UC300UC-free',13,'UC stands for unknown cash which is the currency used in pubg to get skins of guns helmet and bag-packs and good clothing. You have to buy it through the game using real currency. Here we provide 600UC+60UC free.','b5d68f8de2d784aa5bf1096c6c1b9a3e.jpg',1886.79,720.00),(47,'Pubg Mobile 3000UC+850UC free','Pubg-Mobile-3000UC850UC-free',13,'UC stands for unknown cash which is the currency used in pubg to get skins of guns helmet and bag-packs and good clothing. You have to buy it through the game using real currency. Here we provide 3000UC+850UC free.','8950f05570ab8e1de13ee1dda3c4c0ad.jpg',3792.64,1380.00),(48,'Pubg Mobile 6000UC+2100UC free','Pubg-Mobile-6000UC-2100UC-free',13,'UC stands for unknown cash which is the currency used in pubg to get skins of guns helmet and bagpacks and good clothing. You have to buy it through the game using real currency. Here we provide 6000UC+2100UC free.','56410fa94e3a7e6aee77904b4d454269.jpg',7509.05,2880.00),(49,'RatneshTestprod','ratneshtestprod',16,'','c5a65d81f8395df87db2ec835c1f1efc.jpg',10.00,1.00);
/*!40000 ALTER TABLE `game_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `slug` varchar(500) NOT NULL,
  `description` text NOT NULL,
  `featured_image` varchar(500) NOT NULL,
  `banner_images` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `games`
--

LOCK TABLES `games` WRITE;
/*!40000 ALTER TABLE `games` DISABLE KEYS */;
INSERT INTO `games` VALUES (13,'PUBG Mobile','pubg-mobile','PLAYERUNKNOWN\'S BATTLEGROUNDS (PUBG) is a competitive survival shooter formally developed/published by Bluehole . PUBG Mobile is running on Unreal Engine 4, players take on the Battle Royale experience on a map called \"Erangel.\" In this game players purchase several things like UC , royale pass and falcon.','4726fb52b3ad7530fccee9b454352a40.jpg','[\"82302504b73de1473bff0c49f4ba96b9.png\",\"e3f88b3f1887f0c24376a4dc6a4f5d88.jpg\",\"39b2db86acbf11f054a60fb3cdb7d270.jpg\",\"88fea8712513cb9b70d819cb493189d7.png\",\"ca330704364957e5ba78efe38b440013.jpg\",\"5b1b1edfe8794b93d585ebf153316595.jpg\",\"3a283f1e2c4c1592d502591ac887d898.jpg\"]'),(15,'COD Mobile ','cod-mobile','Call of Duty is a first-person shooter video game based on id Tech 3. The game was developed by Infinity Ward and published by Activision. The game simulates the infantry and combined arms warfare of World War II. Here the gamers can purchase CP.','69e6158a0a49c23a408f6d358e165697.jpg','[\"d3312ef0f251794808bbf6aed4db8969.jpg\",\"dd15e66c8dd976448f96d27b3dd3b9d5.jpg\",\"d48a49410dc0b857444984c0eb6ffb43.jpg\",\"e425bfccd416fd430a9ab81fc7eb5942.jpg\",\"c56fdd8648b999d316972eaf18ad5405.jpg\"]'),(16,'FREE FIRE','Free-Fire','Garena Free Fire is an online-only action-adventure battle royale game played in a third person perspective. The game consists of up to 50 players falling from a parachute on an island in search of weapons and equipment to kill the other players. In this game you can buy diamonds.','32f9c882032cf6851f625deb151a460d.jpg','[\"0a1aeba1d9126ab0bd2ec5238f09dc32.jpg\",\"3fc04a2a263f1cb5fcb4ba56f9da1b0e.jpg\"]'),(18,'Clash of Clans','clash-of-clans','Clash of Clans is an online multiplayer game in which players form communities called clans, train troops, and attack other players to earn resources. There are four currencies or resources in the game .They can buy gems in this game to buy several things .They can purchase that from us.','d2d78ef5c6241096636b7e12204e3f3c.png','[\"8aee8b10a1dfd740dc9e7683a93b1f50.png\",\"9a4a4ac3d5c265365295fd5066ef1384.png\",\"15c63473a38ff51836e20b74f3a7ea3c.png\",\"975c12cb3ac79afe0c2ff06de33c443d.png\",\"595352dd65032c8034f6582cfa87f2b3.png\",\"1f42d0c5451d4b29aa98b10ec5bef296.png\",\"d52dd896f1419e305280f3808d30b6d2.png\",\"e1117dee2e2ae882bce5b3815569b1f7.png\",\"b7211591341ed0cbcfc2cf53b0fabd95.png\",\"5133b52566eaa5b58563ff6527a7bc57.png\"]'),(19,'Clash Royale','clash-royale','Clash Royale is a real-time multiplayer game starring the Royales, your favourite Clash characters and much, much more. Collect and upgrade dozens of cards featuring the Clash of Clans troops, spells and defenses you know and love, as well as the Royales: Princes, Knights, Baby Dragons and more. Here they also have to buy gems.','900c032dc1ec0edd13f6336ceacc4f1f.png','[\"b27501bc87b3e967a94e304a93d4f1ed.png\",\"82bef30fd6fd96337b2dfefbe949ca54.png\",\"e22d6bbd2548b7748123df2896a0f7e5.jpg\",\"0b65aefec64fc50d5af58b24b00b8009.png\",\"c03f9cbaeb45d523ae4a2278f5d25c21.jpg\",\"eab1da229680ffc7107c282afc1af69c.png\"]'),(20,'PUBG Mobile Lite','pubg-mobile-lite','PUBG Mobile Lite is the toned-down version of PUBG Mobile. The former has been specially designed for low-end devices that can\'t run the latter smoothly. The game is built with Unreal Engine and is compatible with devices having 1GB RAM. Here they can purchase BC and royale pass.','ec525e217e111021705e7a47929a9d88.jpg','[\"ac6ff119081abfa099912b3c3eb0e15a.png\",\"b5a91dbfc6bfecb43a533472751a3012.png\",\"df7daa1ae1374841aa379bba03d32333.png\",\"32b18cc09e350fbc8e41f9d8ae300c2a.png\",\"e132117164c8965378f74e47d23e11db.png\",\"db9122c80299598cf0db186c9b72c589.jpg\",\"05db3a09eac8e03650240bed18eed6f6.png\"]'),(24,'Among Us','among-us','','add7ba5fd23a7833a728ca4c0d4d35ac.png','[\"727205db45917fad7782f80ce73f0d94.jpg\"]');
/*!40000 ALTER TABLE `games` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gpay_credit_requests`
--

DROP TABLE IF EXISTS `gpay_credit_requests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gpay_credit_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razorpay_payment_id` text NOT NULL,
  `razorpay_order_id` text NOT NULL,
  `razorpay_signature` text NOT NULL,
  `payee_customer_email` varchar(500) NOT NULL,
  `payee_customer_name` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `date` text NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (1,'pay_FfdvJTwnhB9lfN','order_FfduXwwo2Ix1UJ','e63907c632b0cfb4e9d5627657718fb88502c53cff357b1c51bfc3b1492dd986','codesevaco@gmail.com','Code Seva',10,'2020-09-25',1.00),(2,'pay_Ffe2U8CN7XyN49','order_Ffe1lBRav0OXuZ','4b438788e4c34444a8698a95361710c3993cdbf4e5e5dc079ce1a069cdc88064','codesevaco@gmail.com','Code Seva',13,'2020-09-25',1.00),(3,'pay_FgLLMvWdfqW8FF','order_FgLKgr7whC0CqI','626d4d661eb479cdd3498e3bd31682d6692c76da36d647d9c4e2c9e0e918105e','rkarbhari23@gmail.com','Ratnesh Karbhari',14,'2020-09-25',2.00),(4,'pay_FjwFOovTBOXo9A','order_FjwEQfUaenk9uv','3d740d2f188ed95afaeaa04f810a0055b14763fabf28c922a180e5263bebee65','rkarbhari23@gmail.com','Ratnesh Karbhari',49,'02-10-2020',1.00),(5,'pay_FjwKMTLW7s2xRr','order_FjwJuvgbKM9C8Q','88f5f2c7c1728a6a24b29ae11d413162fa5589b2d120d758a6cccb9d9becd203','rkarbhari23@gmail.com','Ratnesh Karbhari',49,'02-10-2020',1.00),(6,'pay_FjzGc5M8RITcpI','order_FjzDZBhQ5abpC8','757dab8341836d550e0034d1971f2838226da8650759831a6aad8001ee6ea9ac','vijaypeter786@gmail.com','Vijay Peter',44,'02-10-2020',35.00);
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

-- Dump completed on 2020-10-02 18:44:20
