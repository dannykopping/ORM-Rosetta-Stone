# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.29)
# Database: ORMTest
# Generation Time: 2013-04-09 19:33:17 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table Category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Category`;

CREATE TABLE `Category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `parentCategoryId` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Category_Category1_idx` (`parentCategoryId`),
  CONSTRAINT `fk_Category_Category1` FOREIGN KEY (`parentCategoryId`) REFERENCES `Category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Category` WRITE;
/*!40000 ALTER TABLE `Category` DISABLE KEYS */;

INSERT INTO `Category` (`id`, `name`, `parentCategoryId`)
VALUES
	(1,'Laptops',NULL),
	(2,'Apple Laptops',1);

/*!40000 ALTER TABLE `Category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Product`;

CREATE TABLE `Product` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `price` double(9,2) NOT NULL DEFAULT '0.00',
  `name` varchar(255) DEFAULT NULL,
  `description` mediumtext,
  `categoryId` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_Product_Category1_idx` (`categoryId`),
  CONSTRAINT `fk_Product_Category1` FOREIGN KEY (`categoryId`) REFERENCES `Category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `Product` WRITE;
/*!40000 ALTER TABLE `Product` DISABLE KEYS */;

INSERT INTO `Product` (`id`, `price`, `name`, `description`, `categoryId`)
VALUES
	(1,12999.99,'MacBook Air 13\'\'','Nice',2);

/*!40000 ALTER TABLE `Product` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table User
# ------------------------------------------------------------

DROP TABLE IF EXISTS `User`;

CREATE TABLE `User` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) DEFAULT NULL,
  `lastName` varchar(255) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL COMMENT 'SHA1 password',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;

INSERT INTO `User` (`id`, `firstName`, `lastName`, `password`)
VALUES
	(1,'Danny','Kopping','1234'),
	(2,'Bob','McGuffin','1234');

/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table UserDetail
# ------------------------------------------------------------

DROP TABLE IF EXISTS `UserDetail`;

CREATE TABLE `UserDetail` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phoneNumber` varchar(20) DEFAULT NULL,
  `address` mediumtext,
  `userId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`userId`),
  KEY `fk_UserDetail_User1_idx` (`userId`),
  CONSTRAINT `fk_UserDetail_User1` FOREIGN KEY (`userId`) REFERENCES `User` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `UserDetail` WRITE;
/*!40000 ALTER TABLE `UserDetail` DISABLE KEYS */;

INSERT INTO `UserDetail` (`id`, `phoneNumber`, `address`, `userId`)
VALUES
	(1,'9797987987','103 Bob Avenue',1);

/*!40000 ALTER TABLE `UserDetail` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table UserProduct
# ------------------------------------------------------------

DROP TABLE IF EXISTS `UserProduct`;

CREATE TABLE `UserProduct` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userId` int(10) unsigned NOT NULL,
  `productId` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`userId`,`productId`),
  KEY `fk_User_has_Product_Product1_idx` (`productId`),
  KEY `fk_User_has_Product_User_idx` (`userId`),
  CONSTRAINT `fk_User_has_Product_User` FOREIGN KEY (`userId`) REFERENCES `User` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_User_has_Product_Product1` FOREIGN KEY (`productId`) REFERENCES `Product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `UserProduct` WRITE;
/*!40000 ALTER TABLE `UserProduct` DISABLE KEYS */;

INSERT INTO `UserProduct` (`id`, `userId`, `productId`)
VALUES
	(1,1,1),
	(3,2,1),
	(4,1,1);

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `OwnedProducts` AS
(select `p`.`name` AS `name`,`p`.`price` AS `price`,concat(`u`.`firstName`,`u`.`lastName`) AS
`fullName`,count(`up`.`id`) AS `amount` from ((`user` `u` join `userproduct` `up`
on((`u`.`id` = `up`.`userId`))) join `product` `p` on((`p`.`id` = `up`.`productId`))) group by `u`.`id`);

/*!40000 ALTER TABLE `UserProduct` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
