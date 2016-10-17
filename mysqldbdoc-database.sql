/*
SQLyog Ultimate v12.08 (64 bit)
MySQL - 5.5.16 : Database - mysqldbdoc
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mysqldbdoc` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_general_ci */;

USE `mysqldbdoc`;

/*Table structure for table `dbcomments` */

DROP TABLE IF EXISTS `dbcomments`;

CREATE TABLE `dbcomments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id da tabela',
  `objeto` varchar(255) COLLATE latin1_general_ci NOT NULL COMMENT 'objeto que recebeu o comentário',
  `comentario` text COLLATE latin1_general_ci COMMENT 'texto do comentário',
  `tags` text COLLATE latin1_general_ci COMMENT 'tags',
  PRIMARY KEY (`id`,`objeto`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;


/*Table structure for table `dbconnections` */
DROP TABLE IF EXISTS `dbconnections`;

CREATE TABLE `dbconnections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(255) COLLATE latin1_general_ci DEFAULT NULL,
  `hostname` varchar(20) COLLATE latin1_general_ci DEFAULT NULL,
  `port` int(11) DEFAULT NULL,
  `username` varchar(16) COLLATE latin1_general_ci DEFAULT NULL,
  `password` varchar(16) COLLATE latin1_general_ci DEFAULT NULL,
  `database` varchar(64) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
