-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 13, 2012 at 12:48 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT=0;
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tifen`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--
-- Creation: Feb 09, 2012 at 01:03 PM
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_booking_made` date DEFAULT NULL,
  `hotel_id` int(11) DEFAULT NULL,
  `booking_status_id` int(11) DEFAULT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `checked_in_date` date DEFAULT NULL,
  `checked_out_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `room_id`, `guest_id`, `user_id`, `date_booking_made`, `hotel_id`, `booking_status_id`, `check_in_date`, `check_out_date`, `checked_in_date`, `checked_out_date`) VALUES
(1, 3, 1, 1, '2012-02-06', 1, 1, '2012-02-09', '2012-02-11', '2012-02-10', '2012-02-11'),
(2, 1, 1, 1, NULL, 1, 1, '2007-01-01', '2007-01-15', NULL, NULL),
(3, 1, 1, 1, NULL, 1, 1, '2007-01-20', '2007-01-31', NULL, NULL),
(4, 1, 1, 1, NULL, 1, 1, '2007-02-10', '2007-02-17', NULL, NULL),
(5, 2, 2, 1, NULL, 1, 1, '2007-01-01', '2007-01-15', NULL, NULL),
(6, 1, 2, 1, NULL, 1, 1, '2007-01-20', '2007-01-31', NULL, NULL),
(7, 3, 2, 1, NULL, 1, 1, '2007-02-10', '2007-02-17', NULL, NULL),
(8, 2, 2, 1, '2012-02-12', 1, 1, '2012-02-29', '2012-03-29', NULL, NULL),
(9, 4, 3, 1, '2012-02-12', 1, 1, '2012-02-16', '2012-02-18', NULL, NULL),
(10, 3, 4, 1, '2012-02-12', NULL, 1, '2012-02-14', '2012-02-15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking_status`
--
-- Creation: Feb 09, 2012 at 01:30 PM
--

DROP TABLE IF EXISTS `booking_status`;
CREATE TABLE IF NOT EXISTS `booking_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `booking_status`
--

INSERT INTO `booking_status` (`id`, `status`) VALUES
(1, 'confirm'),
(2, 'cancelled'),
(3, 'pending'),
(4, 'approved'),
(5, 'not approved');

-- --------------------------------------------------------

--
-- Table structure for table `card`
--
-- Creation: Feb 09, 2012 at 01:08 PM
--

DROP TABLE IF EXISTS `card`;
CREATE TABLE IF NOT EXISTS `card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_type_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `expiration_date` int(11) NOT NULL,
  `card_number` varchar(255) NOT NULL,
  `security_code` varchar(255) NOT NULL,
  `name_on_card` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `card`
--


-- --------------------------------------------------------

--
-- Table structure for table `card_type`
--
-- Creation: Feb 09, 2012 at 01:15 PM
--

DROP TABLE IF EXISTS `card_type`;
CREATE TABLE IF NOT EXISTS `card_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `card_type` varchar(80) NOT NULL,
  `description` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `card_type`
--

INSERT INTO `card_type` (`id`, `card_type`, `description`) VALUES
(1, 'HSBC', 'HSBC'),
(2, 'Citibank', 'citibank');

-- --------------------------------------------------------

--
-- Table structure for table `facility`
--
-- Creation: Feb 09, 2012 at 01:04 PM
--

DROP TABLE IF EXISTS `facility`;
CREATE TABLE IF NOT EXISTS `facility` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `facility`
--

INSERT INTO `facility` (`id`, `name`, `description`) VALUES
(1, 'aircon', 'Condura'),
(2, 'TV ', 'Sony Flatscreen');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--
-- Creation: Feb 09, 2012 at 01:06 PM
--

DROP TABLE IF EXISTS `guest`;
CREATE TABLE IF NOT EXISTS `guest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `phone_number` varchar(80) NOT NULL,
  `address` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`id`, `first_name`, `last_name`, `email_address`, `phone_number`, `address`) VALUES
(1, 'abril jordan', 'casinillo', 'ajc@yahoo.com', '2147483647', 'Gusa, Cagayan de Oro'),
(2, 'asdfsaf', 'asfd', 'sdf@yahoo.com', '123', 'saf'),
(3, 'stephanie', 'canete', 'pixai@yahoo.com', '123', 'davao'),
(4, 'jadel', 'badilla', 'jadel@yahoo.com', '321', 'agusan');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--
-- Creation: Feb 09, 2012 at 01:12 PM
--

DROP TABLE IF EXISTS `hotel`;
CREATE TABLE IF NOT EXISTS `hotel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`id`, `name`, `email`, `address`, `url`) VALUES
(1, 'Jampason', 'jampason@yahoo.com', 'Jasaan', 'www.jampason.com');

-- --------------------------------------------------------

--
-- Table structure for table `housekeeping`
--
-- Creation: Feb 09, 2012 at 01:14 PM
--

DROP TABLE IF EXISTS `housekeeping`;
CREATE TABLE IF NOT EXISTS `housekeeping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `priority_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `housekeeping`
--

INSERT INTO `housekeeping` (`id`, `user_id`, `description`, `category_id`, `room_id`, `priority_id`, `start_date`, `end_date`, `status_id`) VALUES
(1, 1, 'Plumbing Problem', 1, 1, 1, '2012-02-11', '2012-02-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `housekeeping_category`
--
-- Creation: Feb 09, 2012 at 01:18 PM
--

DROP TABLE IF EXISTS `housekeeping_category`;
CREATE TABLE IF NOT EXISTS `housekeeping_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `housekeeping_category`
--

INSERT INTO `housekeeping_category` (`id`, `description`) VALUES
(1, 'Repair'),
(2, 'Other Task'),
(3, 'Maintenance');

-- --------------------------------------------------------

--
-- Table structure for table `housekeeping_priority`
--
-- Creation: Feb 09, 2012 at 01:18 PM
--

DROP TABLE IF EXISTS `housekeeping_priority`;
CREATE TABLE IF NOT EXISTS `housekeeping_priority` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `housekeeping_priority`
--

INSERT INTO `housekeeping_priority` (`id`, `description`) VALUES
(1, 'High'),
(2, 'Medium'),
(3, 'Low');

-- --------------------------------------------------------

--
-- Table structure for table `housekeeping_status`
--
-- Creation: Feb 09, 2012 at 01:19 PM
--

DROP TABLE IF EXISTS `housekeeping_status`;
CREATE TABLE IF NOT EXISTS `housekeeping_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `housekeeping_status`
--

INSERT INTO `housekeeping_status` (`id`, `description`) VALUES
(1, 'Assigned'),
(2, 'Confirmed'),
(3, 'In Progress');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--
-- Creation: Feb 09, 2012 at 01:21 PM
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guest_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `invoice`
--


-- --------------------------------------------------------

--
-- Table structure for table `invoice_charges`
--
-- Creation: Feb 09, 2012 at 01:25 PM
--

DROP TABLE IF EXISTS `invoice_charges`;
CREATE TABLE IF NOT EXISTS `invoice_charges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `invoice_charges`
--


-- --------------------------------------------------------

--
-- Table structure for table `payment_method`
--
-- Creation: Feb 09, 2012 at 01:26 PM
--

DROP TABLE IF EXISTS `payment_method`;
CREATE TABLE IF NOT EXISTS `payment_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_method` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `payment_method`
--

INSERT INTO `payment_method` (`id`, `payment_method`, `description`) VALUES
(1, 'CASH', 'cash'),
(2, 'check', 'check');

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--
-- Creation: Feb 09, 2012 at 01:23 PM
--

DROP TABLE IF EXISTS `rate`;
CREATE TABLE IF NOT EXISTS `rate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rate` decimal(10,0) NOT NULL,
  `description` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`id`, `rate`, `description`) VALUES
(1, '2340', 'N/A');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--
-- Creation: Feb 09, 2012 at 01:24 PM
--

DROP TABLE IF EXISTS `room`;
CREATE TABLE IF NOT EXISTS `room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_number` varchar(80) NOT NULL,
  `roomtype_id` int(11) NOT NULL,
  `smoking_YN_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`id`, `room_number`, `roomtype_id`, `smoking_YN_id`) VALUES
(1, '101', 1, 1),
(2, '102', 1, 1),
(3, '103', 2, 2),
(4, '104', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--
-- Creation: Feb 09, 2012 at 01:28 PM
--

DROP TABLE IF EXISTS `roomtype`;
CREATE TABLE IF NOT EXISTS `roomtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roomtype` varchar(80) NOT NULL,
  `rate_id` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `roomtype`
--

INSERT INTO `roomtype` (`id`, `roomtype`, `rate_id`, `capacity`, `description`) VALUES
(1, 'single', 1, 1, 'for singles only'),
(2, 'double', 1, 2, 'for couples'),
(3, 'standard', 1, 2, 'breakfast'),
(4, 'deluxe', 1, 2, 'breakfast'),
(5, '', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `roomtype_facilities`
--
-- Creation: Feb 09, 2012 at 04:09 PM
--

DROP TABLE IF EXISTS `roomtype_facilities`;
CREATE TABLE IF NOT EXISTS `roomtype_facilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roomtype_id` int(11) NOT NULL,
  `facility_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `roomtype_facilities`
--

INSERT INTO `roomtype_facilities` (`id`, `roomtype_id`, `facility_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `smoking_yn`
--
-- Creation: Feb 09, 2012 at 01:29 PM
--

DROP TABLE IF EXISTS `smoking_yn`;
CREATE TABLE IF NOT EXISTS `smoking_yn` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `smoking_yn`
--

INSERT INTO `smoking_yn` (`id`, `description`) VALUES
(1, 'YES'),
(2, 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `test_table`
--
-- Creation: Feb 12, 2012 at 02:37 AM
--

DROP TABLE IF EXISTS `test_table`;
CREATE TABLE IF NOT EXISTS `test_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `test_table`
--

INSERT INTO `test_table` (`id`, `test`) VALUES
(1, 'test me'),
(14, 'qwerty'),
(15, 'sfdsaf'),
(16, 'zxvc'),
(17, 'xvxz'),
(18, 'gjffgjf'),
(19, '21');

-- --------------------------------------------------------

--
-- Table structure for table `tmp_transact_charges_tbl`
--
-- Creation: Feb 11, 2012 at 03:24 AM
--

DROP TABLE IF EXISTS `tmp_transact_charges_tbl`;
CREATE TABLE IF NOT EXISTS `tmp_transact_charges_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guest_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tmp_transact_charges_tbl`
--

INSERT INTO `tmp_transact_charges_tbl` (`id`, `guest_id`, `description`, `amount`) VALUES
(1, 1, '', 0),
(2, 1, '', 250),
(3, 1, 'breakfast', 100),
(4, 1, 'dinner', 250),
(5, 1, 'supper', 230);

-- --------------------------------------------------------

--
-- Table structure for table `tmp_transact_payments_tbl`
--
-- Creation: Feb 11, 2012 at 02:48 PM
--

DROP TABLE IF EXISTS `tmp_transact_payments_tbl`;
CREATE TABLE IF NOT EXISTS `tmp_transact_payments_tbl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guest_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `tmp_transact_payments_tbl`
--

INSERT INTO `tmp_transact_payments_tbl` (`id`, `guest_id`, `amount`, `description`) VALUES
(1, 1, 2000, '0');

-- --------------------------------------------------------

--
-- Stand-in structure for view `total_payments`
--
DROP VIEW IF EXISTS `total_payments`;
CREATE TABLE IF NOT EXISTS `total_payments` (
`room` varchar(162)
,`guestname` varchar(511)
,`check_in_date` date
,`check_out_date` date
,`total_payments` decimal(32,0)
);
-- --------------------------------------------------------

--
-- Table structure for table `userlevel`
--
-- Creation: Feb 09, 2012 at 01:31 PM
--

DROP TABLE IF EXISTS `userlevel`;
CREATE TABLE IF NOT EXISTS `userlevel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `userlevel`
--

INSERT INTO `userlevel` (`id`, `description`) VALUES
(1, 'admin'),
(2, 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Feb 09, 2012 at 01:33 PM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `userlevel_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `nickname`, `userlevel_id`, `username`, `password`) VALUES
(1, 'abril jordan ', 'casinillo', 'jordan ', 1, 'pixai', 'pixai'),
(2, 'stephanie', 'canete', 'tifen', 2, 'tifen', 'tifen'),
(20, 'elaine joy', 'sepulvida', 'ej', 1, 'ej', '123'),
(21, 'kim', 'kim', 'kim', 1, 'kim', 'kim');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_balance`
--
DROP VIEW IF EXISTS `view_balance`;
CREATE TABLE IF NOT EXISTS `view_balance` (
`guestname` varchar(511)
,`check_in_date` date
,`check_out_date` date
,`room` varchar(162)
,`balance` double
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_booked_periods`
--
DROP VIEW IF EXISTS `view_booked_periods`;
CREATE TABLE IF NOT EXISTS `view_booked_periods` (
`room` varchar(162)
,`booked from` date
,`booked to` date
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_final_balance`
--
DROP VIEW IF EXISTS `view_final_balance`;
CREATE TABLE IF NOT EXISTS `view_final_balance` (
`room` varchar(162)
,`guestname` varchar(511)
,`check_in_date` date
,`check_out_date` date
,`total_charges` double
,`total_payments` decimal(32,0)
,`balance` double
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_housekeeping`
--
DROP VIEW IF EXISTS `view_housekeeping`;
CREATE TABLE IF NOT EXISTS `view_housekeeping` (
`work_order` varchar(255)
,`category` varchar(255)
,`room_number` varchar(80)
,`priority` varchar(255)
,`start_date` date
,`end_date` date
,`nickname` varchar(255)
,`status` varchar(255)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_reservationlists`
--
DROP VIEW IF EXISTS `view_reservationlists`;
CREATE TABLE IF NOT EXISTS `view_reservationlists` (
`arrival` date
,`dept` date
,`guestname` varchar(511)
,`room_number` varchar(80)
,`roomtype` varchar(80)
,`user` varchar(80)
,`bookingstatus` varchar(80)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_rooms`
--
DROP VIEW IF EXISTS `view_rooms`;
CREATE TABLE IF NOT EXISTS `view_rooms` (
`room_number` varchar(80)
,`roomtype` varchar(80)
,`smoking` varchar(10)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_roomtype`
--
DROP VIEW IF EXISTS `view_roomtype`;
CREATE TABLE IF NOT EXISTS `view_roomtype` (
`roomtype` varchar(80)
,`roomtype_description` varchar(255)
,`roomtype_capacity` int(11)
,`rate` decimal(10,0)
,`rate_description` varchar(80)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_roomtypefacilities`
--
DROP VIEW IF EXISTS `view_roomtypefacilities`;
CREATE TABLE IF NOT EXISTS `view_roomtypefacilities` (
`roomtype` varchar(80)
,`facility_name` varchar(255)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_room_availability_periods`
--
DROP VIEW IF EXISTS `view_room_availability_periods`;
CREATE TABLE IF NOT EXISTS `view_room_availability_periods` (
`room` varchar(162)
,`available from` date
,`available to` date
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_room_roomtype`
--
DROP VIEW IF EXISTS `view_room_roomtype`;
CREATE TABLE IF NOT EXISTS `view_room_roomtype` (
`room_id` int(11)
,`roomtype_number` int(11)
,`room` varchar(162)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_total_charges`
--
DROP VIEW IF EXISTS `view_total_charges`;
CREATE TABLE IF NOT EXISTS `view_total_charges` (
`room` varchar(162)
,`guestname` varchar(511)
,`check_in_date` date
,`check_out_date` date
,`total_charges` double
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `view_total_payments`
--
DROP VIEW IF EXISTS `view_total_payments`;
CREATE TABLE IF NOT EXISTS `view_total_payments` (
`room` varchar(162)
,`guestname` varchar(511)
,`check_in_date` date
,`check_out_date` date
,`total_payments` decimal(32,0)
);
-- --------------------------------------------------------

--
-- Table structure for table `view_transact`
--

DROP TABLE IF EXISTS `view_transact`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tifen`.`view_transact` AS select concat(`tifen`.`room`.`room_number`,'--',`tifen`.`roomtype`.`roomtype`) AS `room`,concat(`tifen`.`guest`.`first_name`,convert(repeat(' ',1) using latin1),`tifen`.`guest`.`last_name`) AS `guestname`,`tifen`.`booking`.`check_in_date` AS `check_in_date`,`tifen`.`booking`.`check_out_date` AS `check_out_date`,((((`tifen`.`booking`.`check_out_date` - `tifen`.`booking`.`check_in_date`) + 1) * `tifen`.`rate`.`rate`) + sum(`tifen`.`tmp_transact_tbl`.`amount`)) AS `total` from (((((`tifen`.`booking` join `tifen`.`guest` on((`tifen`.`booking`.`guest_id` = `tifen`.`guest`.`id`))) join `tifen`.`tmp_transact_tbl` on((`tifen`.`guest`.`id` = `tifen`.`tmp_transact_tbl`.`guest_id`))) join `tifen`.`room` on((`tifen`.`room`.`id` = `tifen`.`booking`.`room_id`))) join `tifen`.`roomtype` on((`tifen`.`roomtype`.`id` = `tifen`.`room`.`roomtype_id`))) join `tifen`.`rate` on((`tifen`.`roomtype`.`rate_id` = `tifen`.`rate`.`id`))) group by concat(`tifen`.`room`.`room_number`,'--',`tifen`.`roomtype`.`roomtype`),`tifen`.`guest`.`first_name`,`tifen`.`guest`.`last_name`,`tifen`.`booking`.`check_in_date`,`tifen`.`booking`.`check_out_date`,`tifen`.`rate`.`rate`;

--
-- Dumping data for table `view_transact`
--
-- in use (#1356 - View 'tifen.view_transact' references invalid table(s) or column(s) or function(s) or definer/invoker of view lack rights to use them)

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_users`
--
DROP VIEW IF EXISTS `view_users`;
CREATE TABLE IF NOT EXISTS `view_users` (
`first_name` varchar(255)
,`last_name` varchar(255)
,`nickname` varchar(255)
,`username` varchar(255)
,`password` varchar(255)
,`description` varchar(80)
);
-- --------------------------------------------------------

--
-- Structure for view `total_payments`
--
DROP TABLE IF EXISTS `total_payments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `total_payments` AS select concat(`roomtype`.`roomtype`,convert(repeat(' ',2) using latin1),`room`.`room_number`) AS `room`,concat(`guest`.`first_name`,convert(repeat(' ',1) using latin1),`guest`.`last_name`) AS `guestname`,`booking`.`check_in_date` AS `check_in_date`,`booking`.`check_out_date` AS `check_out_date`,sum(`tmp_transact_payments_tbl`.`amount`) AS `total_payments` from (((((`tmp_transact_payments_tbl` join `guest` on((`guest`.`id` = `tmp_transact_payments_tbl`.`guest_id`))) join `booking` on((`booking`.`guest_id` = `guest`.`id`))) join `room` on((`room`.`id` = `booking`.`room_id`))) join `roomtype` on((`roomtype`.`id` = `room`.`roomtype_id`))) join `rate` on((`rate`.`id` = `roomtype`.`rate_id`))) group by `rate`.`rate`,`roomtype`.`roomtype`,`room`.`room_number`,`guest`.`first_name`,`guest`.`last_name`,`booking`.`check_out_date`,`booking`.`check_in_date`,`guest`.`id` order by `guest`.`id`;

-- --------------------------------------------------------

--
-- Structure for view `view_balance`
--
DROP TABLE IF EXISTS `view_balance`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_balance` AS select `view_total_payments`.`guestname` AS `guestname`,`view_total_charges`.`check_in_date` AS `check_in_date`,`view_total_charges`.`check_out_date` AS `check_out_date`,`view_total_payments`.`room` AS `room`,(`view_total_charges`.`total_charges` - `view_total_payments`.`total_payments`) AS `balance` from (`view_total_payments` join `view_total_charges` on((`view_total_payments`.`guestname` = `view_total_charges`.`guestname`)));

-- --------------------------------------------------------

--
-- Structure for view `view_booked_periods`
--
DROP TABLE IF EXISTS `view_booked_periods`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_booked_periods` AS select concat(`room`.`room_number`,'--',`roomtype`.`roomtype`) AS `room`,`booking`.`check_in_date` AS `booked from`,`booking`.`check_out_date` AS `booked to` from ((`booking` join `room` on((`room`.`id` = `booking`.`room_id`))) join `roomtype` on((`roomtype`.`id` = `room`.`roomtype_id`))) order by `room`.`id`;

-- --------------------------------------------------------

--
-- Structure for view `view_final_balance`
--
DROP TABLE IF EXISTS `view_final_balance`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_final_balance` AS select `view_balance`.`room` AS `room`,`view_balance`.`guestname` AS `guestname`,`view_balance`.`check_in_date` AS `check_in_date`,`view_balance`.`check_out_date` AS `check_out_date`,`view_total_charges`.`total_charges` AS `total_charges`,`view_total_payments`.`total_payments` AS `total_payments`,`view_balance`.`balance` AS `balance` from ((`view_balance` join `view_total_charges`) join `view_total_payments`) where ((`view_total_charges`.`guestname` = `view_total_payments`.`guestname`) and (`view_total_charges`.`room` = `view_total_payments`.`room`) and (`view_total_charges`.`check_in_date` = `view_total_payments`.`check_in_date`) and (`view_total_charges`.`check_out_date` = `view_total_payments`.`check_out_date`) and (`view_total_payments`.`guestname` = `view_balance`.`guestname`) and (`view_total_payments`.`room` = `view_balance`.`room`) and (`view_total_payments`.`check_in_date` = `view_balance`.`check_in_date`) and (`view_total_payments`.`check_out_date` = `view_balance`.`check_out_date`));

-- --------------------------------------------------------

--
-- Structure for view `view_housekeeping`
--
DROP TABLE IF EXISTS `view_housekeeping`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_housekeeping` AS select `housekeeping`.`description` AS `work_order`,`housekeeping_category`.`description` AS `category`,`room`.`room_number` AS `room_number`,`housekeeping_priority`.`description` AS `priority`,`housekeeping`.`start_date` AS `start_date`,`housekeeping`.`end_date` AS `end_date`,`users`.`nickname` AS `nickname`,`housekeeping_status`.`description` AS `status` from (((((`housekeeping` join `housekeeping_category` on((`housekeeping`.`category_id` = `housekeeping_category`.`id`))) join `housekeeping_priority` on((`housekeeping`.`priority_id` = `housekeeping_priority`.`id`))) join `housekeeping_status` on((`housekeeping_status`.`id` = `housekeeping`.`status_id`))) join `room` on((`room`.`id` = `housekeeping`.`room_id`))) join `users` on((`housekeeping`.`user_id` = `users`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_reservationlists`
--
DROP TABLE IF EXISTS `view_reservationlists`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_reservationlists` AS select `booking`.`check_in_date` AS `arrival`,`booking`.`check_out_date` AS `dept`,concat(`guest`.`first_name`,convert(repeat(' ',1) using latin1),`guest`.`last_name`) AS `guestname`,`room`.`room_number` AS `room_number`,`roomtype`.`roomtype` AS `roomtype`,`userlevel`.`description` AS `user`,`booking_status`.`status` AS `bookingstatus` from ((((((`booking` join `room` on((`room`.`id` = `booking`.`room_id`))) join `roomtype` on((`roomtype`.`id` = `room`.`roomtype_id`))) join `booking_status` on((`booking`.`booking_status_id` = `booking_status`.`id`))) join `guest` on((`guest`.`id` = `booking`.`guest_id`))) join `users` on((`booking`.`user_id` = `users`.`id`))) join `userlevel` on((`users`.`userlevel_id` = `userlevel`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_rooms`
--
DROP TABLE IF EXISTS `view_rooms`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_rooms` AS select `room`.`room_number` AS `room_number`,`roomtype`.`roomtype` AS `roomtype`,`smoking_yn`.`description` AS `smoking` from ((`room` join `roomtype` on((`room`.`roomtype_id` = `roomtype`.`id`))) join `smoking_yn` on((`smoking_yn`.`id` = `room`.`smoking_YN_id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_roomtype`
--
DROP TABLE IF EXISTS `view_roomtype`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_roomtype` AS select `roomtype`.`roomtype` AS `roomtype`,`roomtype`.`description` AS `roomtype_description`,`roomtype`.`capacity` AS `roomtype_capacity`,`rate`.`rate` AS `rate`,`rate`.`description` AS `rate_description` from (`roomtype` join `rate` on((`roomtype`.`rate_id` = `rate`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_roomtypefacilities`
--
DROP TABLE IF EXISTS `view_roomtypefacilities`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_roomtypefacilities` AS select `roomtype`.`roomtype` AS `roomtype`,`facility`.`name` AS `facility_name` from ((`roomtype_facilities` join `roomtype` on((`roomtype`.`id` = `roomtype_facilities`.`roomtype_id`))) join `facility` on((`roomtype_facilities`.`facility_id` = `facility`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `view_room_availability_periods`
--
DROP TABLE IF EXISTS `view_room_availability_periods`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_room_availability_periods` AS select concat(`room`.`room_number`,'--',`roomtype`.`roomtype`) AS `room`,`a`.`check_out_date` AS `available from`,min(`b`.`check_in_date`) AS `available to` from (((`booking` `a` join `booking` `b` on(((`a`.`room_id` = `b`.`room_id`) and (`a`.`check_out_date` < `b`.`check_in_date`)))) join `room` on((`a`.`room_id` = `room`.`id`))) join `roomtype` on((`room`.`roomtype_id` = `roomtype`.`id`))) group by `a`.`check_out_date`,`a`.`room_id`,`room`.`room_number`,`roomtype`.`roomtype` having (`a`.`check_out_date` < min(`b`.`check_in_date`)) order by `a`.`room_id`;

-- --------------------------------------------------------

--
-- Structure for view `view_room_roomtype`
--
DROP TABLE IF EXISTS `view_room_roomtype`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_room_roomtype` AS select `room`.`id` AS `room_id`,`room`.`roomtype_id` AS `roomtype_number`,concat(`room`.`room_number`,'--',`roomtype`.`roomtype`) AS `room` from (`room` join `roomtype` on((`roomtype`.`id` = `room`.`roomtype_id`))) where (`roomtype`.`id` = `room`.`roomtype_id`);

-- --------------------------------------------------------

--
-- Structure for view `view_total_charges`
--
DROP TABLE IF EXISTS `view_total_charges`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_total_charges` AS select concat(`roomtype`.`roomtype`,convert(repeat(' ',2) using latin1),`room`.`room_number`) AS `room`,concat(`guest`.`first_name`,convert(repeat(' ',1) using latin1),`guest`.`last_name`) AS `guestname`,`booking`.`check_in_date` AS `check_in_date`,`booking`.`check_out_date` AS `check_out_date`,((((`booking`.`check_out_date` - `booking`.`check_in_date`) + 1) * `rate`.`rate`) + sum(`tmp_transact_charges_tbl`.`amount`)) AS `total_charges` from (((((`tmp_transact_charges_tbl` join `guest` on((`guest`.`id` = `tmp_transact_charges_tbl`.`guest_id`))) join `booking` on((`booking`.`guest_id` = `guest`.`id`))) join `room` on((`room`.`id` = `booking`.`room_id`))) join `roomtype` on((`roomtype`.`id` = `room`.`roomtype_id`))) join `rate` on((`rate`.`id` = `roomtype`.`rate_id`))) group by `rate`.`rate`,`roomtype`.`roomtype`,`room`.`room_number`,`guest`.`first_name`,`guest`.`last_name`,`booking`.`check_out_date`,`booking`.`check_in_date`,`guest`.`id` order by `guest`.`id`;

-- --------------------------------------------------------

--
-- Structure for view `view_total_payments`
--
DROP TABLE IF EXISTS `view_total_payments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_total_payments` AS select concat(`roomtype`.`roomtype`,convert(repeat(' ',2) using latin1),`room`.`room_number`) AS `room`,concat(`guest`.`first_name`,convert(repeat(' ',1) using latin1),`guest`.`last_name`) AS `guestname`,`booking`.`check_in_date` AS `check_in_date`,`booking`.`check_out_date` AS `check_out_date`,sum(`tmp_transact_payments_tbl`.`amount`) AS `total_payments` from (((((`tmp_transact_payments_tbl` join `guest` on((`guest`.`id` = `tmp_transact_payments_tbl`.`guest_id`))) join `booking` on((`booking`.`guest_id` = `guest`.`id`))) join `room` on((`room`.`id` = `booking`.`room_id`))) join `roomtype` on((`roomtype`.`id` = `room`.`roomtype_id`))) join `rate` on((`rate`.`id` = `roomtype`.`rate_id`))) group by `rate`.`rate`,`roomtype`.`roomtype`,`room`.`room_number`,`guest`.`first_name`,`guest`.`last_name`,`booking`.`check_out_date`,`booking`.`check_in_date`,`guest`.`id` order by `guest`.`id`;

-- --------------------------------------------------------

--
-- Structure for view `view_users`
--
DROP TABLE IF EXISTS `view_users`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_users` AS select `users`.`first_name` AS `first_name`,`users`.`last_name` AS `last_name`,`users`.`nickname` AS `nickname`,`users`.`username` AS `username`,`users`.`password` AS `password`,`userlevel`.`description` AS `description` from (`users` join `userlevel` on((`users`.`userlevel_id` = `userlevel`.`id`)));
COMMIT;
