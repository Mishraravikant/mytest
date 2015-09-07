-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 07, 2015 at 06:55 PM
-- Server version: 5.5.41-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `samtt`
--

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE IF NOT EXISTS `device` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `device_id` varchar(50) DEFAULT NULL,
  `device_name` varchar(50) DEFAULT NULL,
  `lat` varchar(20) DEFAULT NULL,
  `long` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `mo`
--

CREATE TABLE IF NOT EXISTS `mo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msisdn` varchar(20) DEFAULT NULL,
  `operatorid` int(11) DEFAULT NULL,
  `shortcodeid` int(11) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `auth_token` varchar(60) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mo`
--

INSERT INTO `mo` (`id`, `msisdn`, `operatorid`, `shortcodeid`, `text`, `auth_token`, `created_at`) VALUES
(1, '60123456789', 3, 8, 'ON GAMES', 'ddyIJfgxC2j1g21g5rs8bJsj', '2015-08-18 16:08:52'),
(2, 'ON GAMES', 3, 8, 'ON GAMES', '_7ie3j2_rDrjlt913fg079Jj', '2015-08-18 16:38:01'),
(3, '60123456789', 3, 8, 'ON GAMES', 'IigcsowzKxz-f3cf0q-yqtz0', '2015-08-18 16:38:43'),
(4, '60123456789', 3, NULL, 'ON GAMES', 'z-riwC7zHcDIwuy_kJoz95iK', '2015-08-18 16:39:22'),
(5, '60123456789', 3, 8, 'ON GAMES', 'ytKwh0vClw6lH7yf9kDbEEgI', '2015-08-18 16:44:14'),
(6, '60123456789', 3, 8, 'ON GAMES', 'om7xzwFib276-3qmwyDJr_td', '2015-08-18 16:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'Ravi', 'ravikant.mishra@sendinblue.com', 'e10adc3949ba59abbe56');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
