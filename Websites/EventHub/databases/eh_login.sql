-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2015 at 05:00 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `eh_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat_mess`
--

CREATE TABLE IF NOT EXISTS `chat_mess` (
  `USER_ID` int(25) NOT NULL,
  `USER_NAME` text NOT NULL,
  `MESSAGES` text NOT NULL,
  `time` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`time`),
  KEY `USER_ID` (`USER_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `chat_mess`
--

INSERT INTO `chat_mess` (`USER_ID`, `USER_NAME`, `MESSAGES`, `time`) VALUES
(3, '0', 'll', 1),
(3, '0', 'll', 2),
(1, '0', '', 3),
(1, '0', '', 4),
(1, '0', '', 5),
(1, '0', '', 6),
(1, '0', '', 7),
(1, '0', '', 8),
(1, '0', '', 9),
(1, '0', '', 10),
(1, '0', '', 11),
(1, '0', '', 12),
(1, '0', '', 13),
(1, '0', '', 14),
(1, '0', '', 15),
(1, '0', '', 16),
(1, '0', '', 17),
(1, '0', '', 18),
(1, '0', '', 19),
(1, '0', 'dddd', 20),
(1, '0', '', 21),
(1, '0', '', 22),
(1, '0', '', 23),
(1, '0', '', 24),
(1, '0', '', 25),
(1, '0', 'dddd', 26),
(1, '0', 'aaaaaa', 27),
(1, '0', 'asfadf', 28),
(1, '3', 'sssss', 29),
(1, '3gb', 'ddddd', 30),
(1, '3gb', 'ddddd', 31),
(1, '3gb', 'ddddd', 32),
(1, '3gb', 'sdsd', 33),
(1, '3gb', 'dddd', 34),
(1, '3gb', 'adfaff', 35),
(3, 'Reginald', 'yo', 36),
(3, 'Reginald', 'yo', 37),
(1, '3gb', 'ddd', 38),
(3, 'Reginald', 'asasaasasasa', 39),
(3, 'Reginald', 'ddddsdsd', 40),
(3, 'Reginald', 'cha chi', 41),
(1, '3gb', 's', 42);

-- --------------------------------------------------------

--
-- Table structure for table `eventcalendar`
--

CREATE TABLE IF NOT EXISTS `eventcalendar` (
  `ID` int(11) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Detail` varchar(250) NOT NULL,
  `eventDate` varchar(10) NOT NULL,
  `dateAdded` int(11) NOT NULL,
  `Person` varchar(50) NOT NULL,
  KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventcalendar`
--

INSERT INTO `eventcalendar` (`ID`, `Title`, `Detail`, `eventDate`, `dateAdded`, `Person`) VALUES
(3, 'event', 'some stuff', '11/20/2015', 2015, 'reggie');

-- --------------------------------------------------------

--
-- Table structure for table `friends_list`
--

CREATE TABLE IF NOT EXISTS `friends_list` (
  `Id` int(11) NOT NULL,
  `myusername` varchar(250) NOT NULL,
  `myfriend` varchar(250) NOT NULL,
  KEY `Id` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends_list`
--

INSERT INTO `friends_list` (`Id`, `myusername`, `myfriend`) VALUES
(1, 'admin@eventhub.com', 'rtr0036'),
(3, 'rtr0036', 'admin@eventhub.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_pic` varchar(250) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `user_pic`) VALUES
(1, '3gb', '3gb', 'admin@eventhub.com', 'admin@eventhub.com', '63a9f0ea7bb98050796b649e85481845', '3GBgddr5.jpg'),
(3, 'Reginald', 'Randolph', 'todd_ran222@yahoo.com', 'rtr0036', '9d08b4238de1cabd844dabbca2dcccf3', 'Untreritled.png');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat_mess`
--
ALTER TABLE `chat_mess`
  ADD CONSTRAINT `chat_mess_ibfk_1` FOREIGN KEY (`USER_ID`) REFERENCES `users` (`id`);

--
-- Constraints for table `eventcalendar`
--
ALTER TABLE `eventcalendar`
  ADD CONSTRAINT `eventcalendar_ibfk_1` FOREIGN KEY (`ID`) REFERENCES `users` (`id`);

--
-- Constraints for table `friends_list`
--
ALTER TABLE `friends_list`
  ADD CONSTRAINT `friends_list_ibfk_1` FOREIGN KEY (`Id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
