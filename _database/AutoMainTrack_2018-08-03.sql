# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 10.1.9-MariaDB)
# Database: AutoMainTrack
# Generation Time: 2018-08-03 15:36:49 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table automobile_makes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `automobile_makes`;

CREATE TABLE `automobile_makes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `automobile_makes` WRITE;
/*!40000 ALTER TABLE `automobile_makes` DISABLE KEYS */;

INSERT INTO `automobile_makes` (`id`, `name`)
VALUES
	(1,'Audi'),
	(2,'BMW'),
	(3,'Chevrolet'),
	(4,'Dodge'),
	(5,'Honda'),
	(6,'Mazda'),
	(7,'Subaru'),
	(8,'Tesla'),
	(9,'Toyota'),
	(10,'Volkswagen');

/*!40000 ALTER TABLE `automobile_makes` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table automobile_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `automobile_types`;

CREATE TABLE `automobile_types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `automobile_types` WRITE;
/*!40000 ALTER TABLE `automobile_types` DISABLE KEYS */;

INSERT INTO `automobile_types` (`id`, `name`)
VALUES
	(1,'gas'),
	(2,'diesel'),
	(3,'electric');

/*!40000 ALTER TABLE `automobile_types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table automobiles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `automobiles`;

CREATE TABLE `automobiles` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `automobile_make_id` int(11) DEFAULT NULL,
  `automobile_type_id` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `odometer` int(11) DEFAULT NULL,
  `colour` varchar(255) DEFAULT NULL,
  `plate` varchar(255) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `automobiles` WRITE;
/*!40000 ALTER TABLE `automobiles` DISABLE KEYS */;

INSERT INTO `automobiles` (`id`, `automobile_make_id`, `automobile_type_id`, `model`, `year`, `odometer`, `colour`, `plate`, `date_created`, `date_modified`)
VALUES
	(1,6,1,'3 Sedan',2017,10000,'blue','MAZ000','2018-08-02 18:00:00','2018-08-03 00:48:58'),
	(2,10,2,'TDI',2010,100000,'grey','VOL000','2018-08-02 18:01:00','0000-00-00 00:00:00'),
	(3,8,3,'Model S',2018,1000,'red','TES000','2018-08-02 18:02:00','0000-00-00 00:00:00'),
	(4,1,1,'R8 GT',2018,1000,'silver','AUD000','2018-08-03 00:49:32','2018-08-03 08:15:23'),
	(5,2,1,'Z4',2018,1000,'black','BMW000','2018-08-03 08:30:16','2018-08-03 08:30:30');

/*!40000 ALTER TABLE `automobiles` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table order_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `order_types`;

CREATE TABLE `order_types` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `order_types` WRITE;
/*!40000 ALTER TABLE `order_types` DISABLE KEYS */;

INSERT INTO `order_types` (`id`, `name`)
VALUES
	(1,'oil change'),
	(2,'tire rotation'),
	(3,'fluid check'),
	(4,'filter change'),
	(5,'engine service');

/*!40000 ALTER TABLE `order_types` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `automobile_id` int(11) DEFAULT NULL,
  `order_type_id` int(11) DEFAULT NULL,
  `notes` text,
  `odometer` int(11) DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `date_modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;

INSERT INTO `orders` (`id`, `automobile_id`, `order_type_id`, `notes`, `odometer`, `date_created`, `date_modified`)
VALUES
	(1,1,2,'lorem ipsum dolor sit amet',11000,'2018-08-02 16:55:00','0000-00-00 00:00:00'),
	(2,1,1,'lorem ipsum dolor sit amet',12000,'2018-08-02 17:51:17','0000-00-00 00:00:00'),
	(3,2,1,'lorem ipsum dolor sit amet',120000,'2018-08-02 20:50:14','0000-00-00 00:00:00'),
	(4,3,3,'lorem ipsum dolor sit amet',1500,'2018-08-02 22:30:24','0000-00-00 00:00:00'),
	(5,3,3,'lorem ipsum dolor sit amet',2000,'2018-08-02 22:30:24','0000-00-00 00:00:00'),
	(6,3,3,'lorem ipsum dolor sit amet',2500,'2018-08-02 22:30:24','0000-00-00 00:00:00'),
	(7,3,3,'lorem ipsum dolor sit amet',3000,'2018-08-02 22:30:24','0000-00-00 00:00:00'),
	(8,3,3,'lorem ipsum dolor sit amet',3500,'2018-08-02 22:30:24','0000-00-00 00:00:00'),
	(9,3,3,'lorem ipsum dolor sit amet',4000,'2018-08-02 22:30:24','0000-00-00 00:00:00'),
	(10,3,3,'lorem ipsum dolor sit amet',4500,'2018-08-02 22:30:24','0000-00-00 00:00:00'),
	(11,1,1,'lorem ipsum dolor sit amet',13000,'2018-08-03 00:25:14','0000-00-00 00:00:00'),
	(12,4,5,'lorem ipsum dolor sit amet',2000,'2018-08-03 00:55:57','0000-00-00 00:00:00'),
	(13,5,3,'lorem ipsum dolor sit amet',2000,'2018-08-03 08:30:57','2018-08-03 08:31:14');

/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
