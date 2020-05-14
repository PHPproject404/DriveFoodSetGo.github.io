/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.4.8-MariaDB : Database - dbfood
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbfood` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `dbfood`;

/*Table structure for table `tbadmin` */

DROP TABLE IF EXISTS `tbadmin`;

CREATE TABLE `tbadmin` (
  `fld_id` int(10) NOT NULL AUTO_INCREMENT,
  `fld_username` varchar(30) NOT NULL,
  `fld_password` varchar(30) NOT NULL,
  PRIMARY KEY (`fld_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbadmin` */

insert  into `tbadmin`(`fld_id`,`fld_username`,`fld_password`) values 
(1,'admin','admin');

/*Table structure for table `tbfood` */

DROP TABLE IF EXISTS `tbfood`;

CREATE TABLE `tbfood` (
  `food_id` int(11) NOT NULL AUTO_INCREMENT,
  `fldvendor_id` int(11) NOT NULL,
  `foodname` varchar(100) NOT NULL,
  `cost` bigint(15) NOT NULL,
  `cuisines` varchar(50) NOT NULL,
  `paymentmode` varchar(50) NOT NULL,
  `fldimage` varchar(1000) NOT NULL,
  PRIMARY KEY (`food_id`),
  KEY `fldvendor_id` (`fldvendor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `tbfood` */

insert  into `tbfood`(`food_id`,`fldvendor_id`,`foodname`,`cost`,`cuisines`,`paymentmode`,`fldimage`) values 
(1,24,'PM1',99,'Paa with Rice','COD','PM1.jpg'),
(2,25,'C1',109,'1pc. Chickenjoy with Jolly Spaghetti','COD,Online Payment','C1.jpg'),
(3,26,'Pork Chao Fan',72,'Moist light brown stir-fried rice mixed with visib','COD,Online Payment','PCF.jpg'),
(4,27,'New York Classic',315,'Our take on a true New York favorite featuring edg','COD,Online Payment','NYC.jpg'),
(5,28,'Black Forest Cake',620,'Layers of rich chocolate cake and creamy cherry fi','COD','Gold.png'),
(6,29,'Classic Pancake',159,'The homey goodness of plain golden pancakes served','COD','CP.jpg');

/*Table structure for table `tblcart` */

DROP TABLE IF EXISTS `tblcart`;

CREATE TABLE `tblcart` (
  `fld_cart_id` int(11) NOT NULL AUTO_INCREMENT,
  `fld_product_id` bigint(11) NOT NULL,
  `fld_customer_id` varchar(50) NOT NULL,
  PRIMARY KEY (`fld_cart_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblcart` */

/*Table structure for table `tblcustomer` */

DROP TABLE IF EXISTS `tblcustomer`;

CREATE TABLE `tblcustomer` (
  `fld_cust_id` int(10) NOT NULL AUTO_INCREMENT,
  `fld_name` varchar(30) NOT NULL,
  `fld_email` varchar(30) NOT NULL,
  `fld_mobile` bigint(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  PRIMARY KEY (`fld_cust_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tblcustomer` */

insert  into `tblcustomer`(`fld_cust_id`,`fld_name`,`fld_email`,`fld_mobile`,`password`) values 
(1,'Sweet Bangloy','bangloy@gmail.com',9361282973,'sweet');

/*Table structure for table `tblorder` */

DROP TABLE IF EXISTS `tblorder`;

CREATE TABLE `tblorder` (
  `fld_order_id` int(10) NOT NULL AUTO_INCREMENT,
  `fld_cart_id` bigint(10) NOT NULL,
  `fldvendor_id` bigint(10) DEFAULT NULL,
  `fld_food_id` bigint(10) DEFAULT NULL,
  `fld_email_id` varchar(50) DEFAULT NULL,
  `fld_payment` varchar(20) DEFAULT NULL,
  `fldstatus` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`fld_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblorder` */

/*Table structure for table `tblvendor` */

DROP TABLE IF EXISTS `tblvendor`;

CREATE TABLE `tblvendor` (
  `fldvendor_id` int(10) NOT NULL AUTO_INCREMENT,
  `fld_name` varchar(30) NOT NULL,
  `fld_email` varchar(50) NOT NULL,
  `fld_password` varchar(50) NOT NULL,
  `fld_mob` bigint(10) NOT NULL,
  `fld_tin` bigint(10) NOT NULL,
  `fld_address` varchar(50) NOT NULL,
  `fld_logo` varchar(250) NOT NULL,
  PRIMARY KEY (`fldvendor_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

/*Data for the table `tblvendor` */

insert  into `tblvendor`(`fldvendor_id`,`fld_name`,`fld_email`,`fld_password`,`fld_mob`,`fld_tin`,`fld_address`,`fld_logo`) values 
(24,'Mang Inasal','manginasal@gmail.com','manginasal',9986485921,135536000,'Torres St, Santiago, Isabela','Mang_inasal_logo.png'),
(25,'Jollibee','jollibee@gmail.com','jollibee',9645819732,135536001,'Lino C. Barrera St., Santiago City, Isabela','Jollibee_logo.png'),
(26,'Chowking','chowking@gmail.com','chowking',9125489637,135536002,'Santiago Commercial Center, Level 1, Maharlika Hig','Chowking_logo.png'),
(27,'Yellow Cab','yellowcab@gmail.com','yellowcab',9865987544,135536003,'6th Floor Abarquez Bldg, City Road, Santiago, Isab','yellowcab_logo.png'),
(28,'Goldilocks','goldilocks@gmail.com','goldilocks',9458596362,135536004,'Pan-Philippine Hwy, Santiago, Isabela','goldilocks.png'),
(29,'Pancake House','pancake@gmail.com','pancake',9478569584,135536005,'Dacon Building, 2281 Chino Roces Ave, Makati, Metr','pancake.png');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
