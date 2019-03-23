-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 03, 2019 at 03:23 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `parichar`
--

-- --------------------------------------------------------

--
-- Table structure for table `fork`
--

DROP TABLE IF EXISTS `fork`;
CREATE TABLE IF NOT EXISTS `fork` (
  `fork_id` int(11) NOT NULL AUTO_INCREMENT,
  `problem_id` int(11) NOT NULL,
  `owner` text NOT NULL,
  `forker` text NOT NULL,
  PRIMARY KEY (`fork_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fork`
--

INSERT INTO `fork` (`fork_id`, `problem_id`, `owner`, `forker`) VALUES
(1, 1, 'amankumar', 'navdht'),
(2, 1, 'navdht', 'ajayjain'),
(3, 1, 'navdht', 'ajayjain'),
(4, 1, 'navdht', 'sanjana'),
(5, 1, 'navdht', 'mohit'),
(6, 6, 'navdht', 'navdht'),
(7, 3, 'navdht', 'sanjana');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
