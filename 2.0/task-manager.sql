-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 24, 2016 at 07:57 PM
-- Server version: 5.5.52-cll-lve
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `task-manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_type` varchar(20) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_timestp` bigint(20) NOT NULL,
  `task_id` int(11) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_type`, `comment`, `comment_timestp`, `task_id`) VALUES
(1, 'note', 'Test 1', 1482625230000, 1),
(2, 'note', 'Test 2', 1482625342000, 1),
(3, 'image', 'conc.PNG', 1482627548000, 1),
(4, 'note', 'Test 3', 1482628920000, 1),
(5, 'note', 'Test 4', 1482629768000, 1),
(6, 'note', 'This is test 5', 1482629901000, 1),
(7, 'note', 'Test 6', 1482630036000, 1),
(8, 'note', 'Test 7', 1482630169000, 1),
(9, 'note', 'Test 8', 1482632676000, 1),
(10, 'note', 'Test 9', 1482633382000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` varchar(500) NOT NULL,
  `due_date` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `desc`, `due_date`, `email`) VALUES
(1, 'This is it', '2016-12-24', 'ayofe.nasir@gmail.com'),
(2, 'Test', '0000-00-00', 'leke4shizzle@gmail.com'),
(3, 'Just another one', 'Sat Dec 31 2016 00:00:00 GMT-0500 (Eastern Standard Time)', 'ayofe.nasir@gmail.com'),
(4, 'Another Task', 'Fri Dec 30 2016 00:00:00 GMT-0500 (Eastern Standard Time)', 'ayofe.nasir@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
