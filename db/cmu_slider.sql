-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 07, 2016 at 12:14 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cmu_slider`
--

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE IF NOT EXISTS `keys` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `salt` text COLLATE utf8_unicode_ci NOT NULL,
  `key` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `salt`, `key`) VALUES
(2, 'b23e66118ff4a5d874e1a5807e71de71', 'a9f8980426b7aa6200eba1f15a8741a3b399b4f9a2e68da03c7bb2db8274b901');

-- --------------------------------------------------------

--
-- Table structure for table `Permissions`
--

CREATE TABLE IF NOT EXISTS `Permissions` (
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`type`),
  KEY `Permissions_idx_1` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Permissions`
--

INSERT INTO `Permissions` (`type`) VALUES
('admin'),
('moderator'),
('superuser');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE IF NOT EXISTS `slide` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `startDate` date NOT NULL,
  `endDate` date NOT NULL,
  `enabled` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `title`, `content`, `image`, `url`, `startDate`, `endDate`, `enabled`) VALUES
(1, '3D Printing Seminar', '<p>3:30pm March 29 Wubben 120</p>\r\n', '', '', '2016-04-01', '2016-04-30', NULL),
(3, 'Lettuce Lemur', '<p>A tribute to the world''s greatest web app Pickle Cat!</p>\r\n', '', 'http://scriptingaway.com', '2016-04-21', '2016-04-22', 1),
(10, 'This is Taylor Swift', '<p>She is my hero</p>\r\n', 'img/bigmachine.png', '', '2016-04-18', '2016-04-29', 1),
(11, 'It''s a Unix system!', '<p>I know this!</p>\r\n', 'img/unix.gif', '', '2016-04-21', '2016-05-31', NULL),
(12, 'OS Schedule', '<p>Watch the slider slde away</p>\r\n', '', 'https://docs.google.com/document/d/1TDxaY4Cl0yDBor1kkLfsmEAlO80MJLx9dNTp9vvnNMY/edit', '2016-04-01', '2016-04-20', 1),
(13, 'This is a Title', '<p>This is some</p>\r\n\r\n<p>Content!!</p>\r\n', 'img/beyonce.png', '', '2016-04-21', '2016-04-30', 1),
(14, 'UPE Induction Ceremony', '<p>Mesa Innovation center @3:30 pm</p>\r\n', '', '', '2016-04-22', '2016-04-25', 1),
(15, 'This is a Title', '<p>This is some</p>\r\n\r\n<p>Content yeah</p>\r\n', '', '', '2016-04-21', '2016-04-30', NULL),
(16, 'This is CNN', '<p>Â </p>\r\n\r\n<p>It is neat</p>\r\n\r\n<p>asd</p>\r\n', '', 'http://cnn.com', '2016-04-01', '2016-04-30', 1),
(17, 'ASDFASD', '', '', 'http://att.com', '0000-00-00', '0000-00-00', 1),
(18, 'things', '<p>and stuff</p>\r\n', '', 'http://saruwatari.tk/pickle_cat_tribute/topgun.html', '2016-04-30', '2016-05-31', 1),
(21, 'Ubuntu', '<p>I like this OS it seems nice</p>\r\n', 'img/swirly-ubuntu-wallpaper.jpg', '', '2016-04-01', '2016-04-30', 1),
(22, 'This is a Title', '<p>This is</p>\r\n\r\n<p>some content </p>\r\n', 'img/ubuntu-05161.jpg', '', '2016-04-28', '2016-05-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `slideid` int(10) NOT NULL,
  `username` text NOT NULL,
  `type` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `slidename` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`slideid`, `username`, `type`, `date`, `slidename`) VALUES
(1, 'lsaruwat', 'edit', '2016-04-22 19:35:17', ''),
(1, 'lsaruwat', 'edit', '2016-04-22 19:35:31', ''),
(13, 'lsaruwat', 'insert', '2016-04-23 01:44:06', ''),
(3, 'lsaruwat', 'edit', '2016-04-23 01:44:24', ''),
(16, 'lsaruwat', 'insert', '2016-04-24 19:51:36', ''),
(17, 'lsaruwat', 'insert', '2016-04-24 19:51:44', ''),
(18, 'lsaruwat', 'insert', '2016-04-24 19:54:20', ''),
(19, 'lsaruwat', 'insert', '2016-04-24 19:54:20', ''),
(20, 'lsaruwat', 'insert', '2016-04-24 19:59:43', ''),
(20, 'lsaruwat', 'delete', '2016-04-24 20:00:25', ''),
(19, 'lsaruwat', 'delete', '2016-04-24 20:00:32', ''),
(18, 'lsaruwat', 'delete', '2016-04-24 20:00:38', ''),
(17, 'lsaruwat', 'delete', '2016-04-24 20:00:44', ''),
(14, 'lsaruwat', 'edit', '2016-04-24 20:03:33', ''),
(16, 'lsaruwat', 'edit', '2016-04-24 20:03:47', ''),
(17, 'lsaruwat', 'insert', '2016-04-25 04:08:27', ''),
(18, 'lsaruwat', 'insert', '2016-04-25 05:46:59', ''),
(10, 'lsaruwat', 'edit', '2016-04-26 14:25:52', ''),
(16, 'lsaruwat', 'edit', '2016-04-26 15:03:48', ''),
(22, 'lsaruwat', 'edit', '2016-05-07 18:13:35', 'This is a Title');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE IF NOT EXISTS `Users` (
  `username` varchar(255) NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `salt` text NOT NULL,
  `permissions` varchar(255) NOT NULL,
  `groupName` text NOT NULL,
  PRIMARY KEY (`username`),
  KEY `Permissions_Users` (`permissions`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`username`, `fname`, `lname`, `email`, `password`, `salt`, `permissions`, `groupName`) VALUES
('jdoe', 'John ', 'Doe', 'johndoe@email.com', '01b8fdbdcc3a4c23269c6dd9409cbd3f15b487a37b13479caee0b3d39149b3bb', '1e21dbd83286d94456ef3e860a33fc2c', 'admin', 'CSCI'),
('lsaruwat', 'Logan', 'Saruwatari', 'lsaruwatari@gmail.com', '81c3032ae1f74083084adfa1282a958814bc30537c1b38b026f2ed3505a08441', '6fe10dfe03f8dda252b474953068affd', 'superuser', 'ACM'),
('ronda', 'Ronda', 'McDonald', 'rmcdonald@coloradomesa.edu', '2d102a0627ffc7a4f747c15287091f1fdb947db7b91deed58327e1028cbbe8f6', 'c82fc443d38300004817819847745c7c', 'admin', 'Faculty'),
('testing', 'Testing', 'Testing', 'test@test.com', 'dd6fdf6b696d61cdbe20f7729cc0106e4128f3759189be3ecab28e3fd4163880', '294948febafa89bbb1096da1ed98db22', 'admin', 'ACM'),
('wmacevoy', 'Warren', 'MacEvoy', 'wmacevoy@coloradomesa.edu', 'ae84b7e0a8dc6782f76d7f22bbdbf6557239274fb2d89f1f5f552bbf60ffb9a6', '777b809588fed8805e79df0dcd157eab', 'admin', 'faculty');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `Permissions_Users` FOREIGN KEY (`permissions`) REFERENCES `Permissions` (`type`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
