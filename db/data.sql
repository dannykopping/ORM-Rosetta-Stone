# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.29)
# Database: ormtest
# Generation Time: 2013-04-11 20:47:49 +0000
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

LOCK TABLES `Category` WRITE;
/*!40000 ALTER TABLE `Category` DISABLE KEYS */;

INSERT INTO `Category` (`id`, `name`, `parentCategoryId`)
VALUES
	(1,'Laptops',NULL),
	(2,'Apple Laptops',1),
	(3,'Misc',1);

/*!40000 ALTER TABLE `Category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table Product
# ------------------------------------------------------------

LOCK TABLES `Product` WRITE;
/*!40000 ALTER TABLE `Product` DISABLE KEYS */;

INSERT INTO `Product` (`id`, `price`, `name`, `description`, `categoryId`)
VALUES
	(1,12999.99,'MacBook Air 13\'\'','Nice',2),
	(2,150.00,'MagSafe 2 Adapter','…',3);

/*!40000 ALTER TABLE `Product` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table User
# ------------------------------------------------------------

LOCK TABLES `User` WRITE;
/*!40000 ALTER TABLE `User` DISABLE KEYS */;

INSERT INTO `User` (`id`, `firstName`, `lastName`, `password`, `createdAt`, `updatedAt`)
VALUES
	(1,'Danny','Kopping','1234',NULL,'2013-04-11 22:39:48'),
	(2,'Bob','McGuffin','1234',NULL,'2013-04-11 22:39:48');

/*!40000 ALTER TABLE `User` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table UserDetail
# ------------------------------------------------------------

LOCK TABLES `UserDetail` WRITE;
/*!40000 ALTER TABLE `UserDetail` DISABLE KEYS */;

INSERT INTO `UserDetail` (`id`, `phoneNumber`, `address`, `userId`)
VALUES
	(1,'9797987987','103 Bob Avenue',1);

/*!40000 ALTER TABLE `UserDetail` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table UserProduct
# ------------------------------------------------------------

LOCK TABLES `UserProduct` WRITE;
/*!40000 ALTER TABLE `UserProduct` DISABLE KEYS */;

INSERT INTO `UserProduct` (`id`, `userId`, `productId`)
VALUES
	(1,1,1),
	(2,1,1),
	(4,1,2),
	(5,2,2),
	(6,2,2);

/*!40000 ALTER TABLE `UserProduct` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
