-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 18, 2011 at 11:12 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pixai`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `advertisements`
--
CREATE TABLE IF NOT EXISTS `advertisements` (
`title` varchar(255)
,`body` varchar(255)
,`price` int(11)
,`contact` varchar(255)
,`date_added` datetime
,`caption` varchar(255)
,`filename` varchar(255)
,`first_name` varchar(255)
,`category_name` varchar(255)
,`cat_id` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `tbl_ad`
--

CREATE TABLE IF NOT EXISTS `tbl_ad` (
  `ad_id` int(11) NOT NULL AUTO_INCREMENT,
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `caption` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`ad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_ad`
--

INSERT INTO `tbl_ad` (`ad_id`, `id`, `cat_id`, `title`, `body`, `price`, `caption`, `filename`, `contact`, `date_added`) VALUES
(1, 1, 1, 'Nokia 2630', 'Cellphone', 1500, 'awesome!', '1.jpg', '123', '2011-10-18 17:24:27'),
(2, 1, 1, 'Toshiba', 'Laptop', 23456, 'tsada ha oi1', '4.jpg', '123', '2011-10-05 03:22:36'),
(3, 5, 2, 'Mineral Water', 'Nature''s Spring', 45, 'water', '3.jpg', '432', '2011-10-12 03:10:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'pixai', 'tifen');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `category_name`) VALUES
(1, 'Category 1'),
(2, 'Category 2'),
(3, 'Category 3'),
(4, 'Category 4'),
(5, 'Category 5'),
(6, 'Category 6'),
(7, 'Category 7'),
(8, 'Category 8'),
(9, 'Category 9'),
(10, 'Category 10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `username`, `password`, `first_name`, `last_name`, `email`, `contact`) VALUES
(1, 'lemuel', '123', 'lemuel', 'aduca', '', ''),
(2, 'jordan', '123', 'abril', 'casinillo', '', ''),
(3, 'tifen', '12345', 'stephanie', 'canete', 'tifen_pixai@yahoo.com', ''),
(5, 'kimberly', '12345', 'kimberly', 'canete', 'kimberly@yahoo.com', ''),
(6, 'kimberly', '12345', 'kimberly', 'canete', 'kimberly@yahoo.com', ''),
(7, 'pixai', '12345', 'stephanie', 'canete', 'pixai@yahoo.com', ''),
(8, 'melai', '12345', 'melanie', 'atienza', 'melai@yahoo.com', '');

-- --------------------------------------------------------

--
-- Structure for view `advertisements`
--
DROP TABLE IF EXISTS `advertisements`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `advertisements` AS select `tbl_ad`.`title` AS `title`,`tbl_ad`.`body` AS `body`,`tbl_ad`.`price` AS `price`,`tbl_user`.`contact` AS `contact`,`tbl_ad`.`date_added` AS `date_added`,`tbl_ad`.`caption` AS `caption`,`tbl_ad`.`filename` AS `filename`,`tbl_user`.`first_name` AS `first_name`,`tbl_category`.`category_name` AS `category_name`,`tbl_category`.`cat_id` AS `cat_id` from ((`tbl_user` join `tbl_ad` on((`tbl_user`.`id` = `tbl_ad`.`id`))) join `tbl_category` on((`tbl_ad`.`cat_id` = `tbl_category`.`cat_id`)));
