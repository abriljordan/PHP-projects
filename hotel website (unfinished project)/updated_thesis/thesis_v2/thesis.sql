-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 28, 2011 at 10:41 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `thesis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `first_name` varchar(80) NOT NULL,
  `middle_name` varchar(80) NOT NULL,
  `last_name` varchar(80) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `username`, `password`, `first_name`, `middle_name`, `last_name`) VALUES
(1, 'pixai', 'pixai', 'abril jordan ', 'cila', 'casinillo');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE IF NOT EXISTS `tbl_customers` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(80) NOT NULL,
  `last_name` varchar(80) NOT NULL,
  `email_address` varchar(80) NOT NULL,
  `phone_number` int(11) NOT NULL,
  `cell_phone_number` int(11) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_customers`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_facilities`
--

CREATE TABLE IF NOT EXISTS `tbl_facilities` (
  `facility_id` int(11) NOT NULL AUTO_INCREMENT,
  `facility_name` varchar(80) NOT NULL,
  `facility_price` decimal(10,0) NOT NULL,
  `facility_description` varchar(80) NOT NULL,
  PRIMARY KEY (`facility_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_facilities`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_photographs`
--

CREATE TABLE IF NOT EXISTS `tbl_photographs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(80) NOT NULL,
  `type` varchar(80) NOT NULL,
  `size` int(11) NOT NULL,
  `caption` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_photographs`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE IF NOT EXISTS `tbl_staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `nickname` varchar(80) NOT NULL,
  `first_name` varchar(80) NOT NULL,
  `middle_name` varchar(80) NOT NULL,
  `last_name` varchar(80) NOT NULL,
  `date_of_birth` date NOT NULL,
  `date_joined_staff` date NOT NULL,
  `date_left_staff` date NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_staff`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_type_of_rooms`
--

CREATE TABLE IF NOT EXISTS `tbl_type_of_rooms` (
  `type_of_room_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_of_room` varchar(20) NOT NULL,
  `description` varchar(80) NOT NULL,
  PRIMARY KEY (`type_of_room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_type_of_rooms`
--

INSERT INTO `tbl_type_of_rooms` (`type_of_room_id`, `type_of_room`, `description`) VALUES
(1, 'Single', ''),
(2, 'Double', '');
