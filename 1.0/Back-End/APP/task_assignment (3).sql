-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2016 at 11:15 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `note_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(150) NOT NULL,
  `type` varchar(150) NOT NULL,
  `timestp` bigint(20) NOT NULL,
  `task_id` int(11) NOT NULL,
  PRIMARY KEY (`note_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`note_id`, `content`, `type`, `timestp`, `task_id`) VALUES
(1, 'Have You?', 'note', 1458614429000, 1),
(2, 'next.jpg', 'image', 1458614429000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE IF NOT EXISTS `people` (
  `person_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`person_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`person_id`, `email`) VALUES
(1, 'ayofe.nasir@gmail.com'),
(2, 'iyanuobidele@gmail.com'),
(8, 'brice.muco@gmail.com'),
(7, 'leke4shizzle@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(150) NOT NULL,
  `due_date` date NOT NULL,
  `person_id` int(11) NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `description`, `due_date`, `person_id`) VALUES
(1, 'Learn intel XDK', '2016-03-18', 1),
(2, 'Grow your hair', '2016-03-18', 2);

-- --------------------------------------------------------

--
-- Table structure for table `task_notifications`
--

DROP TABLE IF EXISTS `task_notifications`;
CREATE TABLE IF NOT EXISTS `task_notifications` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `noti_date` date NOT NULL,
  `task_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task_notifications`
--

INSERT INTO `task_notifications` (`notification_id`, `noti_date`, `task_id`, `type`) VALUES
(1, '2016-03-27', 2, 'note'),
(2, '2016-03-27', 2, 'image'),
(3, '2016-03-27', 2, 'image'),
(4, '2016-03-27', 2, 'image'),
(5, '2016-03-27', 2, 'image'),
(6, '2016-03-27', 2, 'image');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
