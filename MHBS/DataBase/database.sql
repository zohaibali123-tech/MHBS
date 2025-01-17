/*
SQLyog Ultimate v12.5.0 (64 bit)
MySQL - 10.4.32-MariaDB : Database - mhbs
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mhbs` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `mhbs`;

/*Table structure for table `cities` */

DROP TABLE IF EXISTS `cities`;

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) NOT NULL,
  `halls` int(255) NOT NULL,
  PRIMARY KEY (`city_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `hall_bank_detail` */

DROP TABLE IF EXISTS `hall_bank_detail`;

CREATE TABLE `hall_bank_detail` (
  `hall_bank_id` int(11) NOT NULL AUTO_INCREMENT,
  `hall_id` int(11) NOT NULL,
  `hall_bank_name` varchar(255) NOT NULL,
  `hall_bank_title` varchar(255) NOT NULL,
  `hall_acc_no` int(11) NOT NULL,
  `hall_iban` int(11) NOT NULL,
  PRIMARY KEY (`hall_bank_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `hall_booking_records` */

DROP TABLE IF EXISTS `hall_booking_records`;

CREATE TABLE `hall_booking_records` (
  `hall_book_id` int(11) NOT NULL AUTO_INCREMENT,
  `hall_id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no` varchar(13) NOT NULL,
  `guests` int(255) NOT NULL,
  `booking_date` date NOT NULL,
  PRIMARY KEY (`hall_book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `hall_card_image` */

DROP TABLE IF EXISTS `hall_card_image`;

CREATE TABLE `hall_card_image` (
  `hall_card_image_id` int(11) NOT NULL AUTO_INCREMENT,
  `hall_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`hall_card_image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `hall_charges` */

DROP TABLE IF EXISTS `hall_charges`;

CREATE TABLE `hall_charges` (
  `hall_charges_id` int(11) NOT NULL AUTO_INCREMENT,
  `hall_id` int(11) NOT NULL,
  `hall_service_charges` int(11) NOT NULL,
  `hall_lighting` int(11) NOT NULL,
  `hall_DJ` int(11) NOT NULL,
  `hall_tax` int(11) NOT NULL,
  `hall_advance_book` int(11) NOT NULL,
  PRIMARY KEY (`hall_charges_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `hall_contact` */

DROP TABLE IF EXISTS `hall_contact`;

CREATE TABLE `hall_contact` (
  `hall_contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `hall_id` int(11) NOT NULL,
  `hall_phone` varchar(200) NOT NULL,
  `hall_email` varchar(255) NOT NULL,
  `hall_website` varchar(255) NOT NULL,
  `hall_face` varchar(255) NOT NULL,
  `hall_insta` varchar(255) NOT NULL,
  `hall_you` varchar(255) NOT NULL,
  PRIMARY KEY (`hall_contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `hall_images` */

DROP TABLE IF EXISTS `hall_images`;

CREATE TABLE `hall_images` (
  `image_id` int(11) NOT NULL AUTO_INCREMENT,
  `hall_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `hall_main_info` */

DROP TABLE IF EXISTS `hall_main_info`;

CREATE TABLE `hall_main_info` (
  `hall_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hall_name` varchar(255) NOT NULL,
  `hall_city_name` varchar(255) NOT NULL,
  `hall_address` varchar(255) NOT NULL,
  `hall_max_capicity` varchar(255) NOT NULL,
  `hall_facilities` varchar(255) NOT NULL,
  `hall_parking` varchar(255) NOT NULL,
  `hall_desc` varchar(255) NOT NULL,
  PRIMARY KEY (`hall_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `hallcharges` */

DROP TABLE IF EXISTS `hallcharges`;

CREATE TABLE `hallcharges` (
  `hall_charges_id` int(11) NOT NULL AUTO_INCREMENT,
  `hall_id` int(11) NOT NULL,
  `guest_slot` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`hall_charges_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `hall_id` int(11) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `menu_price` int(255) NOT NULL,
  `menu_items` int(255) NOT NULL,
  `menu_image` varchar(255) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `photoservice` */

DROP TABLE IF EXISTS `photoservice`;

CREATE TABLE `photoservice` (
  `photo_service_id` int(11) NOT NULL AUTO_INCREMENT,
  `hall_id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `service` varchar(255) NOT NULL,
  `photo_service_price` int(11) NOT NULL,
  PRIMARY KEY (`photo_service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(13) NOT NULL,
  `password` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
