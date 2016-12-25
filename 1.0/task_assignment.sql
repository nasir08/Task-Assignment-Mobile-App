-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2016 at 02:18 PM
-- Server version: 5.5.45-cll-lve
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `task_assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE IF NOT EXISTS `notes` (
  `note_id` int(11) NOT NULL AUTO_INCREMENT,
  `content` varchar(150) NOT NULL,
  `type` varchar(150) NOT NULL,
  `timestp` bigint(20) NOT NULL,
  `task_id` int(11) NOT NULL,
  PRIMARY KEY (`note_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`note_id`, `content`, `type`, `timestp`, `task_id`) VALUES
(1, 'Have You?', 'note', 1458614429000, 1),
(2, 'next.jpg', 'image', 1458614429000, 1),
(20, 'colour.PNG', 'image', 1459123520000, 2),
(21, 'Note1', 'note', 1459124942000, 5),
(22, 'Note2', 'note', 1459124951000, 5),
(23, 'image.jpg', 'image', 1459124968000, 5),
(24, 'Note 3', 'note', 1459125067000, 5),
(25, 'Note4', 'note', 1459125076000, 5),
(26, 'Note5', 'note', 1459125127000, 5),
(27, 'Note6', 'note', 1459125135000, 5),
(28, 'Note 7', 'note', 1459125143000, 5),
(29, 'Note 8', 'note', 1459125152000, 5),
(30, 'Note9', 'note', 1459125162000, 5),
(31, 'Note 10', 'note', 1459125174000, 5),
(32, 'colour.PNG', 'image', 1459125199000, 5),
(33, 'ok', 'note', 1459197266000, 2),
(34, 'colour.PNG', 'image', 1459197298000, 2),
(35, 'image.jpg', 'image', 1459199115000, 5),
(36, 'asd\nasdsad\nas', 'note', 1459200628000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `people`
--

CREATE TABLE IF NOT EXISTS `people` (
  `person_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`person_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`person_id`, `email`) VALUES
(1, 'ayofe.nasir@gmail.com'),
(2, 'iyanuobidele@gmail.com'),
(8, 'brice.muco@gmail.com'),
(7, 'leke4shizzle@gmail.com'),
(14, 'jeffzigman@gmail.com'),
(15, 'asd'),
(16, 'fishisycho@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(150) NOT NULL,
  `due_date` date NOT NULL,
  `person_id` int(11) NOT NULL,
  PRIMARY KEY (`task_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `description`, `due_date`, `person_id`) VALUES
(1, 'Learn intel XDK', '2016-03-18', 1),
(2, 'Grow your hair', '2016-03-18', 2),
(5, 'Test1', '2016-05-31', 14),
(6, 'ad\r\nasd\r\nasd\r\nsad\r\n', '2016-03-17', 8),
(7, 'Risk Document', '2016-04-15', 16);

-- --------------------------------------------------------

--
-- Table structure for table `task_notifications`
--

CREATE TABLE IF NOT EXISTS `task_notifications` (
  `notification_id` int(11) NOT NULL AUTO_INCREMENT,
  `noti_date` date NOT NULL,
  `task_id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  PRIMARY KEY (`notification_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `task_notifications`
--

INSERT INTO `task_notifications` (`notification_id`, `noti_date`, `task_id`, `type`) VALUES
(1, '2016-03-28', 2, 'image'),
(2, '2016-03-28', 5, 'task'),
(3, '2016-03-28', 5, 'note'),
(4, '2016-03-28', 5, 'note'),
(5, '2016-03-28', 5, 'image'),
(6, '2016-03-28', 5, 'note'),
(7, '2016-03-28', 5, 'note'),
(8, '2016-03-28', 5, 'note'),
(9, '2016-03-28', 5, 'note'),
(10, '2016-03-28', 5, 'note'),
(11, '2016-03-28', 5, 'note'),
(12, '2016-03-28', 5, 'note'),
(13, '2016-03-28', 5, 'note'),
(14, '2016-03-28', 5, 'image'),
(15, '2016-03-28', 2, 'note'),
(16, '2016-03-28', 2, 'image'),
(17, '2016-03-28', 5, 'image'),
(18, '2016-03-28', 6, 'task'),
(19, '2016-03-28', 2, 'note'),
(20, '2016-04-08', 7, 'task');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
