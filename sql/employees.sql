-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

CREATE DATABASE `codeigniter` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `codeigniter`;

DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `email` varchar(35) NOT NULL,
  `address` varchar(140) NOT NULL,
  `phone_number` bigint(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `employees` (`id`, `name`, `email`, `address`, `phone_number`) VALUES
(7,	'Dhaneesh Kumar',	'ragu3610@gmail.co',	'2/224, veerapathiran kovil st',	8012861102);

-- 2018-09-11 13:00:17
