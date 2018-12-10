-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: yelp
-- ------------------------------------------------------
-- Server version	5.7.24-0ubuntu0.18.04.1

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(70) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` int(11) DEFAULT NULL,
  `permissions` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_accessed_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin.username` (`username`),
  KEY `admin.email` (`email`),
  KEY `admin.phone` (`phone`),
  KEY `admin.created_at` (`created_at`),
  KEY `admin.updated_at` (`updated_at`),
  KEY `admin.last_accessed_at` (`last_accessed_at`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'admin','0192023a7bbd73250516f069df18b500','',NULL,NULL,'2018-10-08 09:16:12','2018-10-08 09:16:12',NULL);
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(70) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `revenue` int(11) NOT NULL DEFAULT '0',
  `orders` int(11) NOT NULL DEFAULT '0',
  `products` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `categories.category` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'desserts',NULL,300,3,1),(2,'cakes',1,0,0,0),(3,'main course',NULL,200,1,4),(5,'cheese cake',2,300,3,1),(6,'beverages',NULL,0,0,0),(7,'smoothies',6,0,0,0),(8,'molten lava',2,900,3,1),(9,'death by chocolate',2,0,0,0),(10,'pizza',NULL,0,0,0);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_products`
--

DROP TABLE IF EXISTS `order_products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `comments` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `op.order_id` (`order_id`),
  KEY `op.product_id` (`product_id`),
  KEY `op.quantity` (`quantity`),
  KEY `op.price` (`price`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_products`
--

LOCK TABLES `order_products` WRITE;
/*!40000 ALTER TABLE `order_products` DISABLE KEYS */;
INSERT INTO `order_products` VALUES (1,1,1,'{\"id\":\"1\",\"product\":\"Beautiful molten lava cake\",\"price\":\"100\",\"vendor_id\":\"2\",\"user_id\":\"2\",\"dp\":null,\"categories\":\"[\\\"8\\\"]\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, illo, iste itaque voluptas corrupti ratione ',3,100,''),(2,1,2,'{\"id\":\"2\",\"product\":\"Blueberry Cheese Cake\",\"price\":\"100\",\"vendor_id\":\"1\",\"user_id\":\"1\",\"dp\":null,\"categories\":\"[\\\"5\\\", \\\"1\\\"]\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, illo, iste itaque voluptas corrupti ration',1,100,''),(3,2,1,'{\"id\":\"1\",\"product\":\"Beautiful molten lava cake\",\"price\":\"100\",\"vendor_id\":\"2\",\"user_id\":\"2\",\"dp\":null,\"categories\":\"[\\\"8\\\"]\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, illo, iste itaque voluptas corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores libero voluptas quod perferendis! Voluptate, quod illo rerum? Lorem ipsum dolor sit amet.\",\"preparation_time\":\"30 minutes\",\"ingredients\":\"[\\\"eggs\\\", \\\"chocolate\\\", \\\"sugar\\\"]\",\"ratings\":\"0\",\"orders\":\"1\",\"revenue\":\"300\",\"created_at\":\"2018-10-09 22:44:03\",\"updated_at\":\"2018-10-09 22:44:03\",\"last_accessed_at\":null,\"is_new\":\"1\",\"vendor_name\":\"Rina\'s Kitchennete\",\"quantity\":\"3\",\"comments\":\"\"}',3,100,''),(4,2,2,'{\"id\":\"2\",\"product\":\"Blueberry Cheese Cake\",\"price\":\"100\",\"vendor_id\":\"1\",\"user_id\":\"1\",\"dp\":null,\"categories\":\"[\\\"5\\\", \\\"1\\\"]\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, illo, iste itaque voluptas corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores libero voluptas quod perferendis! Voluptate, quod illo rerum? Lorem ipsum dolor sit amet.\",\"preparation_time\":\"25 minutes\",\"ingredients\":\"[\\\"eggs\\\", \\\"chocolate\\\", \\\"sugar\\\"]\",\"ratings\":\"0\",\"orders\":\"1\",\"revenue\":\"100\",\"created_at\":\"2018-10-09 23:20:43\",\"updated_at\":\"2018-10-09 23:20:43\",\"last_accessed_at\":null,\"is_new\":\"1\",\"vendor_name\":\"user one\",\"quantity\":\"1\",\"comments\":\"\"}',1,100,''),(5,3,1,'{\"id\":\"1\",\"product\":\"Beautiful molten lava cake\",\"price\":\"100\",\"vendor_id\":\"2\",\"user_id\":\"2\",\"dp\":null,\"categories\":\"[\\\"8\\\"]\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, illo, iste itaque voluptas corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores libero voluptas quod perferendis! Voluptate, quod illo rerum? Lorem ipsum dolor sit amet.\",\"preparation_time\":\"30 minutes\",\"ingredients\":\"[\\\"eggs\\\", \\\"chocolate\\\", \\\"sugar\\\"]\",\"ratings\":\"0\",\"orders\":\"2\",\"revenue\":\"600\",\"created_at\":\"2018-10-09 22:44:03\",\"updated_at\":\"2018-10-09 22:44:03\",\"last_accessed_at\":null,\"is_new\":\"1\",\"vendor_name\":\"Rina\'s Kitchennete\",\"quantity\":\"3\",\"comments\":\"\"}',3,100,''),(6,3,2,'{\"id\":\"2\",\"product\":\"Blueberry Cheese Cake\",\"price\":\"100\",\"vendor_id\":\"1\",\"user_id\":\"1\",\"dp\":null,\"categories\":\"[\\\"5\\\", \\\"1\\\"]\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, illo, iste itaque voluptas corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores libero voluptas quod perferendis! Voluptate, quod illo rerum? Lorem ipsum dolor sit amet.\",\"preparation_time\":\"25 minutes\",\"ingredients\":\"[\\\"eggs\\\", \\\"chocolate\\\", \\\"sugar\\\"]\",\"ratings\":\"0\",\"orders\":\"2\",\"revenue\":\"200\",\"created_at\":\"2018-10-09 23:20:43\",\"updated_at\":\"2018-10-09 23:20:43\",\"last_accessed_at\":null,\"is_new\":\"1\",\"vendor_name\":\"user one\",\"quantity\":\"1\",\"comments\":\"\"}',1,100,''),(7,4,7,'{\"id\":\"7\",\"product\":\"Pepperoni\",\"price\":\"100\",\"vendor_id\":\"6\",\"user_id\":\"15\",\"dp\":null,\"categories\":\"[\\\"3\\\"]\",\"description\":\"The best pizza in town !\",\"preparation_time\":\"20 minutes\",\"ingredients\":\"[\\\"mozarella\\\", \\\"Pepperoni\\\", \\\"tomatoes\\\"]\",\"ratings\":\"0\",\"orders\":\"0\",\"revenue\":\"0\",\"created_at\":\"2018-10-11 01:18:17\",\"updated_at\":\"2018-10-11 01:18:17\",\"last_accessed_at\":null,\"is_new\":\"0\",\"quantity\":\"2\",\"comments\":\"\"}',2,100,'');
/*!40000 ALTER TABLE `order_products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `categories` varchar(255) NOT NULL,
  `payment_methods` varchar(255) DEFAULT NULL,
  `products` int(11) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL DEFAULT '0',
  `total` varchar(70) NOT NULL DEFAULT '0.0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_status_change` timestamp NULL DEFAULT NULL,
  `status_changes` varchar(255) NOT NULL,
  `city` varchar(70) DEFAULT NULL,
  `state` varchar(70) DEFAULT NULL,
  `country` varchar(70) DEFAULT NULL,
  `is_new` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `orders.customer_id` (`customer_id`),
  KEY `orders.status` (`status`),
  KEY `orders.products` (`products`),
  KEY `orders.quantity` (`quantity`),
  KEY `orders.total` (`total`),
  KEY `orders.created_at` (`created_at`),
  KEY `orders.last_status_change` (`last_status_change`),
  KEY `orders.city` (`city`),
  KEY `orders.state` (`state`),
  KEY `orders.country` (`country`),
  KEY `orders.vendor_id` (`vendor_id`),
  KEY `orders.categories` (`categories`),
  KEY `orders.payment_methods` (`payment_methods`),
  KEY `orders.is_new` (`is_new`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,1,2,'pending','[8,5,1]',NULL,2,4,'400','2018-10-10 11:03:27',NULL,'','Lahore',NULL,NULL,1),(2,1,2,'pending','[8,5,1]',NULL,2,4,'400','2018-10-10 13:11:50',NULL,'','Lahore',NULL,NULL,0),(3,8,2,'pending','[8,5,1]',NULL,2,4,'400','2018-10-10 13:49:38',NULL,'','Lahore',NULL,NULL,1),(4,10,6,'pending','[3]',NULL,1,2,'200','2018-10-10 20:19:54',NULL,'','Toronto','Ontario','Canada',0);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` varchar(200) NOT NULL,
  `price` varchar(70) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dp` varchar(200) DEFAULT NULL,
  `categories` varchar(200) DEFAULT NULL,
  `description` text NOT NULL,
  `preparation_time` varchar(70) DEFAULT NULL,
  `ingredients` text NOT NULL,
  `ratings` varchar(20) NOT NULL DEFAULT '0',
  `orders` int(11) NOT NULL DEFAULT '0',
  `revenue` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_accessed_at` timestamp NULL DEFAULT NULL,
  `is_new` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `products.vendor_id` (`vendor_id`),
  KEY `products.user_id` (`user_id`),
  KEY `products.price` (`price`),
  KEY `products.is_new` (`is_new`),
  KEY `products.ratings` (`ratings`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Beautiful molten lava cake','100',2,2,NULL,'[\"8\"]','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, illo, iste itaque voluptas corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores libero voluptas quod perferendis! Voluptate, quod illo rerum? Lorem ipsum dolor sit amet.','30 minutes','[\"eggs\", \"chocolate\", \"sugar\"]','0',3,900,'2018-10-09 17:44:03','2018-10-09 17:44:03',NULL,0),(2,'Blueberry Cheese Cake','100',1,1,NULL,'[\"5\", \"1\"]','Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates, illo, iste itaque voluptas corrupti ratione reprehenderit magni similique? Tempore, quos delectus asperiores libero voluptas quod perferendis! Voluptate, quod illo rerum? Lorem ipsum dolor sit amet.','25 minutes','[\"eggs\", \"chocolate\", \"sugar\"]','0',3,300,'2018-10-09 18:20:43','2018-10-09 18:20:43',NULL,0),(7,'Pepperoni','100',6,15,NULL,'[\"3\"]','The best pizza in town !','20 minutes','[\"mozarella\", \"Pepperoni\", \"tomatoes\"]','0',1,200,'2018-10-10 20:18:17','2018-10-10 20:18:17',NULL,0);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(70) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `first_name` varchar(70) NOT NULL,
  `last_name` varchar(70) NOT NULL,
  `gender` varchar(20) NOT NULL DEFAULT 'male',
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `udid` varchar(200) DEFAULT NULL,
  `dp` varchar(200) DEFAULT NULL,
  `fb_id` varchar(200) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  `orders_placed` int(11) NOT NULL DEFAULT '0',
  `expenditure` int(11) DEFAULT '0',
  `reviews` int(11) NOT NULL DEFAULT '0',
  `is_ban` tinyint(1) NOT NULL DEFAULT '0',
  `banned_by` int(11) DEFAULT NULL,
  `ratings` varchar(20) NOT NULL DEFAULT '0',
  `is_vendor` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `last_accessed_at` timestamp NULL DEFAULT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `users.phone` (`phone`),
  KEY `users.udid` (`udid`),
  KEY `users.fb_id` (`fb_id`),
  KEY `users.vendor_id` (`vendor_id`),
  KEY `users.orders_placed` (`orders_placed`),
  KEY `users.expenditure` (`expenditure`),
  KEY `users.reviews` (`reviews`),
  KEY `users.is_ban` (`is_ban`),
  KEY `users.ratings` (`ratings`),
  KEY `users.is_vendor` (`is_vendor`),
  KEY `users.created_at` (`created_at`),
  KEY `users.username` (`username`),
  KEY `users.updated_at` (`updated_at`),
  KEY `users.last_accessed_at` (`last_accessed_at`),
  KEY `users.password` (`password`),
  KEY `users.gender` (`gender`),
  KEY `users.banned_by` (`banned_by`),
  KEY `users.is_new` (`is_new`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'user1',NULL,'user','one','male',NULL,'user1@yelp.com',NULL,NULL,NULL,1,2,800,0,0,NULL,'0',1,'2018-10-08 17:35:03','2018-10-08 17:35:03',NULL,0),(2,'user2',NULL,'user','two','male',NULL,'user2@yelp.com',NULL,NULL,NULL,2,0,0,0,0,NULL,'0',1,'2018-10-08 17:35:54','2018-10-08 17:35:54',NULL,0),(3,'user3',NULL,'user','three','female',NULL,'user3@yelp.com',NULL,NULL,NULL,NULL,0,0,0,0,NULL,'0',0,'2018-10-08 17:36:07','2018-10-08 17:36:07',NULL,0),(4,'user4',NULL,'user','four','male',NULL,'user4@yelp.com',NULL,NULL,NULL,NULL,0,0,0,0,NULL,'0',0,'2018-10-08 17:36:14','2018-10-08 17:36:14',NULL,0),(5,'user5',NULL,'user','five','female',NULL,'user5@yelp.com',NULL,NULL,NULL,NULL,0,0,0,0,NULL,'0',0,'2018-10-08 17:36:23','2018-10-08 17:36:23',NULL,0),(6,'user6',NULL,'user','six','male',NULL,'user6@yelp.com',NULL,NULL,NULL,NULL,0,0,0,0,NULL,'0',0,'2018-10-08 17:36:34','2018-10-08 17:36:34',NULL,0),(7,'user7',NULL,'user','seven','female',NULL,'user7@yelp.com',NULL,NULL,NULL,NULL,0,0,0,0,NULL,'0',0,'2018-10-08 17:36:45','2018-10-08 17:36:45',NULL,0),(8,'user8',NULL,'user','eight','female',NULL,'user8@yelp.com',NULL,NULL,NULL,NULL,1,400,0,0,1,'0',0,'2018-10-08 17:36:54','2018-10-08 17:36:54',NULL,0),(9,'user9',NULL,'user','nine','male',NULL,'user9@yelp.com',NULL,NULL,NULL,NULL,0,0,0,0,NULL,'0',0,'2018-10-08 17:37:04','2018-10-08 17:37:04',NULL,0),(10,'user10',NULL,'user','ten','female',NULL,'user10@yelp.com',NULL,NULL,NULL,NULL,1,200,0,0,NULL,'0',0,'2018-10-08 17:37:20','2018-10-08 17:37:20',NULL,0),(15,'rameex',NULL,'Rameez','Raheel','male','12345678','rameez@yelp.com',NULL,NULL,NULL,6,0,0,0,0,NULL,'0',1,'2018-10-10 20:16:00','2018-10-10 20:16:00',NULL,0);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_name` varchar(200) DEFAULT NULL,
  `payment_methods` text,
  `user_id` int(11) NOT NULL,
  `dp` varchar(200) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `city` varchar(70) DEFAULT NULL,
  `state` varchar(70) DEFAULT NULL,
  `country` varchar(70) DEFAULT NULL,
  `longitude` varchar(70) DEFAULT NULL,
  `latitude` varchar(70) DEFAULT NULL,
  `orders_placed` int(11) NOT NULL DEFAULT '0',
  `products` int(11) NOT NULL DEFAULT '0',
  `reviews` int(11) NOT NULL DEFAULT '0',
  `ratings` varchar(10) NOT NULL DEFAULT '0',
  `revenue` int(11) NOT NULL DEFAULT '0',
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `approved_by` int(11) DEFAULT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `featured_by` int(11) DEFAULT NULL,
  `is_ban` tinyint(1) NOT NULL DEFAULT '0',
  `banned_by` int(11) DEFAULT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_accessed_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `vendors.user_id` (`user_id`),
  KEY `vendors.is_featured` (`is_featured`),
  KEY `vendors.is_ban` (`is_ban`),
  KEY `vendors.is_new` (`is_new`),
  KEY `vendors.created_at` (`created_at`),
  KEY `vendors.updated_at` (`updated_at`),
  KEY `vendors.last_accessed_at` (`last_accessed_at`),
  KEY `is_new` (`is_new`),
  KEY `vendors.is_approved` (`is_approved`),
  KEY `vendors.city` (`city`),
  KEY `vendors.state` (`state`),
  KEY `vendors.country` (`country`),
  KEY `vendors.payment_method` (`payment_methods`(255)),
  KEY `vendors.orders_placed` (`orders_placed`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendors`
--

LOCK TABLES `vendors` WRITE;
/*!40000 ALTER TABLE `vendors` DISABLE KEYS */;
INSERT INTO `vendors` VALUES (1,'user one','[\"cash\", \"credit card\"]',1,NULL,NULL,'Lahore',NULL,NULL,NULL,NULL,0,1,0,'0',0,0,NULL,0,NULL,0,NULL,0,'2018-10-09 15:36:55','2018-10-09 15:36:55',NULL),(2,'Rina\'s Kitchennete','[\"cash\", \"credit card\"]',2,NULL,'923134970007','Lahore',NULL,NULL,NULL,NULL,3,2,0,'0',1200,1,1,1,1,0,1,0,'2018-10-09 15:38:00','2018-10-09 15:38:00',NULL),(6,'Rameez\'s Pizza','[\"cash\", \"credit card\"]',15,NULL,'12345678','Toronto','Ontario','Canada',NULL,NULL,1,1,0,'0',200,1,1,0,NULL,0,NULL,0,'2018-10-10 20:16:48','2018-10-10 20:16:48',NULL);
/*!40000 ALTER TABLE `vendors` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-12-10 10:42:49
