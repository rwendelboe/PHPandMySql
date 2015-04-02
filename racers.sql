-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2013 at 06:22 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `romankuzmin`
--

-- --------------------------------------------------------

--
-- Table structure for table `racers`
--

CREATE TABLE IF NOT EXISTS `racers` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `first` varchar(24) NOT NULL,
  `last` varchar(24) NOT NULL,
  `cumulative1` decimal(6,2) NOT NULL,
  `cumulative2` decimal(6,2) NOT NULL,
  `cumulative3` decimal(6,2) NOT NULL,
  `cumulative4` decimal(6,2) NOT NULL,
  `cumulative5` decimal(6,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
