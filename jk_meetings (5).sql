-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 19, 2020 at 06:25 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jk_meetings`
--

-- --------------------------------------------------------

--
-- Table structure for table `boolean_field`
--

DROP TABLE IF EXISTS `boolean_field`;
CREATE TABLE IF NOT EXISTS `boolean_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `record_id` int(44) NOT NULL,
  `field_id` int(11) NOT NULL,
  `value` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dataset`
--

DROP TABLE IF EXISTS `dataset`;
CREATE TABLE IF NOT EXISTS `dataset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(254) NOT NULL,
  `dataset_name` varchar(254) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataset`
--

INSERT INTO `dataset` (`id`, `user_id`, `dataset_name`) VALUES
(1, 1, 'CureSee'),
(2, 1, 'Dealord');

-- --------------------------------------------------------

--
-- Table structure for table `dataset_fields`
--

DROP TABLE IF EXISTS `dataset_fields`;
CREATE TABLE IF NOT EXISTS `dataset_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dataset_id` int(20) NOT NULL,
  `field_name` varchar(254) NOT NULL,
  `field_char` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dataset_fields`
--

INSERT INTO `dataset_fields` (`id`, `dataset_id`, `field_name`, `field_char`) VALUES
(1, 1, 'Hospital Name', 'text'),
(2, 1, 'Person Name', 'text'),
(3, 1, 'Contact Number', 'text'),
(4, 1, 'Email', 'text'),
(5, 2, 'Name', 'text'),
(6, 2, 'City', 'text'),
(7, 2, 'State', 'text'),
(8, 2, 'Address', 'text'),
(9, 2, 'Category', 'text');

-- --------------------------------------------------------

--
-- Table structure for table `datetime_field`
--

DROP TABLE IF EXISTS `datetime_field`;
CREATE TABLE IF NOT EXISTS `datetime_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `record_id` int(44) NOT NULL,
  `field_id` int(11) NOT NULL,
  `value` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datetime_field`
--

INSERT INTO `datetime_field` (`id`, `record_id`, `field_id`, `value`) VALUES
(1, 1, 4, '2019-12-18 14:00:00'),
(2, 2, 9, '2019-12-18 19:09:00'),
(3, 3, 4, '2019-12-18 21:45:00'),
(4, 4, 4, '2019-12-25 14:14:00'),
(5, 5, 4, '2019-12-28 17:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `decimal_field`
--

DROP TABLE IF EXISTS `decimal_field`;
CREATE TABLE IF NOT EXISTS `decimal_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `record_id` int(44) NOT NULL,
  `field_id` int(11) NOT NULL,
  `value` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `owner_user_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `persmission_user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `records`
--

DROP TABLE IF EXISTS `records`;
CREATE TABLE IF NOT EXISTS `records` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dataset_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `records`
--

INSERT INTO `records` (`id`, `dataset_id`) VALUES
(1, 1),
(2, 2),
(3, 1),
(4, 1),
(5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

DROP TABLE IF EXISTS `status`;
CREATE TABLE IF NOT EXISTS `status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `record_id` int(44) NOT NULL,
  `field_id` int(44) NOT NULL,
  `value` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `record_id`, `field_id`, `value`) VALUES
(1, 1, 4, 'Active'),
(2, 2, 9, 'Active'),
(3, 3, 4, 'Active'),
(4, 4, 4, 'Rescheduled'),
(5, 5, 4, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `text_fields`
--

DROP TABLE IF EXISTS `text_fields`;
CREATE TABLE IF NOT EXISTS `text_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `record_id` int(44) NOT NULL,
  `field_id` int(20) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `text_fields`
--

INSERT INTO `text_fields` (`id`, `record_id`, `field_id`, `value`) VALUES
(1, 1, 1, 'Noble Eye Care'),
(2, 1, 2, 'Dr. Digvijay Singh'),
(3, 1, 3, '87654321234'),
(4, 1, 4, 'drsingh.digvijay@gmail.com'),
(5, 2, 5, 'Naveen'),
(6, 2, 6, 'Gurgaon'),
(7, 2, 7, 'Haryana'),
(8, 2, 8, 'GGN'),
(9, 2, 9, 'Clothes'),
(10, 3, 1, 'JK'),
(11, 3, 2, 'jk'),
(12, 3, 3, '5456787'),
(13, 3, 4, 'gvjjvgcfxdf'),
(14, 4, 1, 'jkhjghf'),
(15, 4, 2, 'qwer'),
(16, 4, 3, 'chgvjhbkjlcxzs'),
(17, 4, 4, 'cvjhbkjnlkc'),
(18, 5, 1, 'Hasnain'),
(19, 5, 2, 'Ali'),
(20, 5, 3, '03485578511'),
(21, 5, 4, 'hasnain01022000@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `titles`
--

DROP TABLE IF EXISTS `titles`;
CREATE TABLE IF NOT EXISTS `titles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `record_id` int(11) NOT NULL,
  `title` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `titles`
--

INSERT INTO `titles` (`id`, `record_id`, `title`) VALUES
(1, 5, 'Hasnain');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(1000) NOT NULL,
  `Email` varchar(500) NOT NULL,
  `Password` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `Name`, `Email`, `Password`) VALUES
(1, 'Admin', 'admin@meet.curesee.com', 'admin'),
(2, 'Test', 'hasnain010220002@gmail.com', 'Hasnainu4');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
