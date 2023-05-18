-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 28, 2023 at 09:21 PM
-- Server version: 10.7.3-MariaDB-log
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sql_hustler_vx88`
--

-- --------------------------------------------------------

--
-- Table structure for table `card_list`
--

CREATE TABLE `card_list` (
  `id` int(11) NOT NULL,
  `image` varchar(100) DEFAULT '',
  `cvv` varchar(20) DEFAULT '',
  `exp_date` date DEFAULT NULL,
  `category` varchar(200) DEFAULT '',
  `price` float(5,2) DEFAULT 0.00,
  `name` varchar(50) DEFAULT '',
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `card_number` varchar(25) DEFAULT '',
  `card_address` varchar(100) DEFAULT '',
  `country` varchar(50) DEFAULT '',
  `state` varchar(50) DEFAULT '',
  `city` varchar(50) DEFAULT '',
  `zip` varchar(10) DEFAULT '',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `is_purchased` tinyint(1) DEFAULT 0,
  `is_del` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card_list`
--

INSERT INTO `card_list` (`id`, `image`, `cvv`, `exp_date`, `category`, `price`, `name`, `email`, `phone`, `card_number`, `card_address`, `country`, `state`, `city`, `zip`, `created_at`, `updated_at`, `is_purchased`, `is_del`) VALUES
(1, '', '5184460', '2029-01-28', 'BLACK MARKET VR 89% NoRef', 1.00, '', NULL, NULL, '3147400233155292', '3323 Kings Highway 3B', 'UNITED STATE', 'NEW YORK', 'Brooklyn', '', '2023-01-27 22:58:37', '2023-02-05 13:40:32', 1, 0),
(2, '', '5184461', '2023-01-16', 'BLACK MARKET VR 89% NoRef', 1.50, '', NULL, NULL, '3147400233155293', '', 'UNITED STATE', 'WASHITON', '', '', '2023-01-27 22:58:37', '2023-02-28 06:13:41', 0, 1),
(3, '', '5184462', '2027-01-29', 'BLACK MARKET VR 89% NoRef', 1.00, 'asdf', 'dsaf@as.com', '123123', '3147400233155291', 'United States', 'CANADA', 'OTAWA', 'Brooklyn', '11234', '2023-01-27 22:58:37', '2023-02-05 13:40:32', 1, 0),
(4, '', '5184463', '2023-02-16', 'BLACK MARKET VR 89% NoRef', 1.00, 'Aleksandr Karasik', 'royal.dragon811@gmail.com', '5859783147', '5147400233155296', 'United States', 'UNITED STATE', 'CALIFONIA', 'Brooklyn', '11234', '2023-01-27 22:58:37', '2023-02-28 06:13:41', 1, 1),
(5, '', '5184464', '2023-01-18', 'BLACK MARKET VR 89% NoRef', 1.00, '', NULL, NULL, '3147400233155297', '', 'MEXICO', 'MEXICO1', '', '', '2023-01-27 22:58:37', '2023-02-28 06:13:41', 0, 1),
(6, '', '5184465', '2029-12-29', 'BLACK MARKET VR 89% NoRef', 1.00, '', NULL, NULL, '6147400233152235', '', 'INDIA', 'NEWDELI', '', '', '2023-01-27 22:58:37', '2023-01-27 22:58:37', 0, 0),
(7, '', '5184466', '2023-01-11', 'BLACK MARKET VR 89% NoRef', 1.00, '', NULL, NULL, '3147400133156543', '', 'RUSSIA', 'MOSCOW', '', '', '2023-01-27 22:58:37', '2023-02-28 06:13:41', 0, 1),
(117, '', '123', '2025-02-01', '123123', 2.00, 'Aleksandr Karasik', 'royal.dragon811@gmail.com', '5859783147', '4147400233151195', 'United States', 'SWISS', 'WSSW', 'Brooklyn', '11234', '2023-02-01 22:09:30', '2023-02-05 13:35:30', 1, 0),
(118, '', '047', '1970-01-01', 'WHITE MARKET VR 89% NoRef', 1.50, 'Frederic Wiggins', '(910) 610-3541 wigginsfred55@gmail.com', '', '4389590061233758', '152 Oxendine Circle', 'UNITED ARAB EMIRATES    ', '', 'Lumberton', '28360', '2023-02-05 06:12:44', '2023-02-28 06:13:41', 0, 1),
(119, '', '354', '1970-01-01', 'WHITE MARKET VR 89% NoRef', 1.50, 'Bob Thomason', '(864) 340-1197 thomasor001@gmail.com', '', '4389590061098920', '202B SAMARITAN DR', 'UNITED ARAB EMIRATES    ', '', 'LAURENS', '29360', '2023-02-05 06:12:44', '2023-02-28 06:13:41', 0, 1),
(120, '', '076', '1970-01-01', 'WHITE MARKET VR 89% NoRef', 1.50, 'Shirley Jones', '(205) 665-1427 shirleyjones861@gmail.com', '', '4389590061189422', '225 Jones Road', 'UNITED ARAB EMIRATES   ', '', 'Montevallo', '35115', '2023-02-05 06:12:44', '2023-02-28 06:13:41', 0, 1),
(121, '', '560', '1970-01-01', 'WHITE MARKET VR 89% NoRef', 1.50, 'Judie Thompson', '(812) 431-6143 judiethompson.0386@gmail.com', '', '4389590061073865', '601 Concord Blvd', 'UNITED ARAB EMIRATES  ', '', 'Evansville', '47710', '2023-02-05 06:12:44', '2023-02-28 06:13:41', 0, 1),
(122, '', '038', '1970-01-01', 'WHITE MARKET VR 89% NoRef', 1.50, 'Norman Poole', '(864) 288-5464 npfc88@aol.com', '', '4389590000230253', '1128 Wembley Road', 'UNITED ARAB EMIRATES  ', '', 'Greenville', '29607', '2023-02-05 06:12:44', '2023-02-28 06:13:41', 0, 1),
(123, '', '509', '1970-01-01', 'WHITE MARKET VR 89% NoRef', 1.50, 'Thomas Sullivan', '', '', '4119720010319526', '825 White Sand Court', 'ROMANIA   ', '', 'Murrells Inlet', '8646149066', '2023-02-05 06:12:44', '2023-02-28 06:13:41', 0, 1),
(124, '', '539', '1970-01-01', 'WHITE MARKET VR 89% NoRef', 1.50, 'James Blair', '(253) 525-0824 jbcrete67@gmail.com', '', '4119720010803826', '1020 34th ave. NW', 'ROMANIA   ', '', 'Gig Harbor', '98335', '2023-02-05 06:12:44', '2023-02-28 06:13:41', 0, 1),
(125, '', '391', '1970-01-01', 'WHITE MARKET VR 89% NoRef', 1.50, 'Lynn Hughes', '', '', '4147400258468378', '401 W Fork Rd', 'UNITED STATES	', '', 'Durango', '81303', '2023-02-05 06:14:08', '2023-02-28 06:13:41', 0, 1),
(126, '', '498', '1970-01-01', 'WHITE MARKET VR 89% NoRef', 1.50, 'Elisabet Hiatt', '', '', '4147400223775139', '250 Western States Rd', 'UNITED STATES	', '', 'Felton', '95018', '2023-02-05 06:14:08', '2023-02-28 06:13:41', 0, 1),
(127, '', '622', '1970-01-01', 'WHITE MARKET VR 89% NoRef', 1.50, 'Fran A Toll', '', '', '4147400257655454', '1032 Camas Drive', 'UNITED STATES	', '', 'Philadelphia', '19115', '2023-02-05 06:14:08', '2023-02-28 06:13:41', 0, 1),
(128, '', '742', '1970-01-01', 'WHITE MARKET VR 89% NoRef', 1.50, 'Lynda Richard', '', '', '4147400152188718', '2702 Line Lexington Rd', 'UNITED STATES	', '', 'Hatfield', '19440', '2023-02-05 06:14:08', '2023-02-28 06:13:41', 0, 1),
(129, '', '864', '1970-01-01', 'WHITE MARKET VR 89% NoRef', 1.50, 'Donna Bartley', '', '', '4147400258875721', '9676 Evanston St NW', 'UNITED STATES	', '', 'Concord', '28027', '2023-02-05 06:14:08', '2023-02-28 06:13:41', 0, 1),
(130, '', '452', '1970-01-01', 'WHITE MARKET VR 89% NoRef', 1.50, 'Tracy V Mertens', '', '', '4147400259434130', '6830 NORTH 13TH STREET', 'UNITED STATES	', '', 'PHOENIX', '85014', '2023-02-05 06:14:08', '2023-02-28 06:13:41', 0, 1),
(131, '', '188', '1970-01-01', 'WHITE MARKET VR 89% NoRef', 1.50, 'Sarah Worrall', '', '', '4147400221627506', '5601 charter oak drive', 'UNITED STATES', '', 'Chesterfield', '23832', '2023-02-05 06:14:08', '2023-02-28 06:13:41', 0, 1),
(132, '', '112', '1970-01-01', 'WHITE MARKET VR 89% NoRef', 1.50, 'Donald G Labaj', '', '', '4147400138842032', '295 Austin St.', 'UNITED STATES', '', 'Berea', '44017', '2023-02-05 06:14:08', '2023-02-28 06:13:41', 0, 1),
(133, '', '857', '1970-01-01', 'WHITE MARKET VR 89% NoRef', 1.50, 'Bethany Orosz', '', '', '4147400251750525', '35299 Snickersvile Turnpike', 'UNITED STATES', '', 'Round Hill', '20141', '2023-02-05 06:14:08', '2023-02-28 06:13:41', 0, 1),
(134, '', '391', '2026-03-01', 'BLACK MARKET VR 92% NoRef', 1.00, 'Lynn Hughes', 'john@gmail.com', '', '4147400258468378', '401 W Fork Rd', 'UNITED STATES	', '', 'Durango', '81303', '2023-02-05 06:21:48', '2023-02-05 13:34:55', 1, 0),
(135, '', '498', '2023-06-01', 'BLACK MARKET VR 92% NoRef', 1.00, 'Elisabet Hiatt', '', '', '4147400223775139', '250 Western States Rd', 'UNITED STATES	', '', 'Felton', '95018', '2023-02-05 06:21:48', '2023-02-05 13:34:55', 1, 0),
(136, '', '622', '2024-03-01', 'BLACK MARKET VR 92% NoRef', 1.00, 'Fran A Toll', '', '', '4147400257655454', '1032 Camas Drive', 'UNITED STATES	', '', 'Philadelphia', '19115', '2023-02-05 06:21:48', '2023-02-05 13:35:31', 1, 0),
(137, '', '742', '2023-02-01', 'BLACK MARKET VR 92% NoRef', 1.00, 'Lynda Richard', '', '', '4147400152188718', '2702 Line Lexington Rd', 'UNITED STATES	', '', 'Hatfield', '19440', '2023-02-05 06:21:48', '2023-02-28 06:13:41', 0, 1),
(138, '', '864', '2024-03-01', 'BLACK MARKET VR 92% NoRef', 1.00, 'Donna Bartley', '', '', '4147400258875721', '9676 Evanston St NW', 'UNITED STATES	', '', 'Concord', '28027', '2023-02-05 06:21:48', '2023-02-05 13:35:31', 1, 0),
(139, '', '452', '2024-03-01', 'BLACK MARKET VR 92% NoRef', 1.00, 'Tracy V Mertens', '', '', '4147400259434130', '6830 NORTH 13TH STREET', 'UNITED STATES	', '', 'PHOENIX', '85014', '2023-02-05 06:21:48', '2023-02-05 13:35:31', 1, 0),
(140, '', '188', '2023-05-01', 'BLACK MARKET VR 92% NoRef', 1.00, 'Sarah Worrall', '', '', '4147400221627506', '5601 charter oak drive', 'UNITED STATES', '', 'Chesterfield', '23832', '2023-02-05 06:21:48', '2023-02-05 13:35:31', 1, 0),
(141, '', '112', '2025-12-01', 'BLACK MARKET VR 92% NoRef', 1.00, 'Donald G Labaj', '', '', '4147400138842032', '295 Austin St.', 'UNITED STATES', '', 'Berea', '44017', '2023-02-05 06:21:48', '2023-02-05 13:35:31', 1, 0),
(142, '', '857', '2023-12-01', 'BLACK MARKET VR 92% NoRef', 1.00, 'Bethany Orosz', '', '', '4147400251750525', '35299 Snickersvile Turnpike', 'UNITED STATES', 'BOSTON', 'Round Hill', '20141', '2023-02-05 06:21:48', '2023-02-05 13:35:31', 1, 0),
(143, '', '801', '2024-08-01', 'Admin', 10.00, 'John C Hickey', '', '', '4147400274108800', '2304 Oxford Rd', 'UNITED STATES', '', 'Lawrence', '66049', '2023-02-07 02:13:32', '2023-02-15 07:47:38', 1, 0),
(144, '', '284', '2024-06-01', 'Admin', 10.00, 'Daniel R Zavala', '', '', '4147400266262888', '35100 West Eclipse rd', 'UNITED STATES', '', 'Stanfield', '85172', '2023-02-07 02:13:32', '2023-02-15 07:47:04', 1, 0),
(145, '', '534', '2024-07-01', 'Admin', 10.00, 'Timothy Potter', '', '', '4147400271332015', '806 N Knudson St', 'UNITED STATES', '', 'Liberty Lake', '99019', '2023-02-07 02:13:32', '2023-02-15 08:50:51', 1, 0),
(146, '', '364', '2026-08-01', 'Admin', 10.00, 'Megan Beutel', '', '', '4147404107548257', '155 Wright Street', 'UNITED STATES', '', 'Arlington', '02474', '2023-02-07 02:13:32', '2023-02-15 08:51:14', 1, 0),
(147, '', '488', '2025-11-01', 'Admin', 10.00, 'Alexander R Hill', '', '', '4147400293896179', '6642 Muirlands Dr', 'UNITED STATES', '', 'La Jolla', '92037', '2023-02-07 02:13:32', '2023-02-15 09:44:35', 1, 0),
(148, '', '195', '2023-12-01', 'Admin', 10.00, 'Amy M MacNeill', '', '', '4147400224497329', '39 Pauline St', 'UNITED STATES', '', 'N Dartmouth', '02747', '2023-02-07 02:13:32', '2023-02-07 02:13:32', 0, 0),
(149, '', '638', '2025-08-01', 'Admin', 10.00, 'Scott Kidder', '', '', '4147404105714885', '5 E 22nd St Apt 30S', 'UNITED STATES', '', 'New York', '10010', '2023-02-07 02:13:32', '2023-02-07 02:13:32', 0, 0),
(150, '', '801', '2026-02-01', 'Admin', 10.00, 'Ruben Lacap', '', '', '4147400302474810', '12130 Tower Forest', 'UNITED STATES', '', 'San Antonio', '78253', '2023-02-07 02:13:32', '2023-02-07 02:13:32', 0, 0),
(151, '', '827', '2026-02-01', 'Admin', 10.00, 'Yu Chen', '', '', '4147400302461270', '9307 Deer Creek Dr', 'UNITED STATES', '', 'Tampa', '33647', '2023-02-07 02:13:32', '2023-02-07 02:13:32', 0, 0),
(152, '', '689', '2023-12-01', 'Admin', 10.00, 'Kristina Mukda', '', '', '4147400138596158', '154 Farm Hill Road', 'UNITED STATES', '', 'Leominster', '01453', '2023-02-07 02:13:32', '2023-02-15 09:48:32', 1, 0),
(153, '', '284', '2024-04-01', 'test', 10.00, '', '', '', '4147400261490757', '', '', '', '', '', '2023-02-28 10:56:15', '2023-02-28 03:57:03', 1, 0),
(159, '', '763', '2024-08-01', 'test', 10.00, '', '', '', '4147400168116802', '', '', '', '', '', '2023-02-28 10:56:15', '2023-02-28 10:56:15', 0, 0),
(160, '', '046', '2023-12-01', 'test', 10.00, '', '', '', '4147400248954099', '', '', '', '', '', '2023-02-28 10:56:15', '2023-02-28 10:56:15', 0, 0),
(161, '', '996', '2023-03-01', 'test', 10.00, '', '', '', '4147400215055268', '', '', '', '', '', '2023-02-28 11:11:54', '2023-02-28 11:11:54', 0, 0),
(162, '', '851', '2024-02-01', 'test', 10.00, '', '', '', '4147400122621970', '', '', '', '', '', '2023-02-28 11:11:54', '2023-02-28 04:49:51', 1, 0),
(163, '', '949', '2024-03-01', 'test', 10.00, '', '', '', '4147400258285848', '', '', '', '', '', '2023-02-28 11:11:54', '2023-02-28 04:50:16', 0, 1),
(164, '', '935', '2025-10-01', 'test', 10.00, '', '', '', '4147400290726288', '', '', '', '', '', '2023-02-28 11:11:54', '2023-02-28 11:11:54', 0, 0),
(165, '', '446', '2024-06-01', 'test', 10.00, '', '', '', '4147400269801401', '', '', '', '', '', '2023-02-28 11:11:54', '2023-02-28 11:11:54', 0, 0),
(166, '', '683', '2023-09-01', 'test', 10.00, '', '', '', '4147400228887038', '', '', '', '', '', '2023-02-28 11:11:54', '2023-02-28 11:11:54', 0, 0),
(167, '', '151', '2025-01-01', 'test', 10.00, '', '', '', '4147400182732527', '', '', '', '', '', '2023-02-28 11:11:54', '2023-02-28 11:11:54', 0, 0),
(168, '', '687', '2025-10-01', 'test', 10.00, '', '', '', '4147400292330758', '', '', '', '', '', '2023-02-28 11:11:54', '2023-02-28 11:11:54', 0, 0),
(169, '', '947', '2025-07-01', 'test', 10.00, '', '', '', '4222400285634265', '', '', '', '', '', '2023-02-28 11:21:50', '2023-02-28 11:21:50', 0, 0),
(170, '', '720', '2024-03-01', 'test2', 10.00, '', '', '', '4147400140249721', '', '', '', '', '', '2023-02-28 11:54:03', '2023-02-28 04:54:38', 0, 1),
(171, '', '901', '2024-07-01', 'test2', 10.00, '', '', '', '4147400271678607', '', '', '', '', '', '2023-02-28 11:54:03', '2023-02-28 04:54:44', 0, 1),
(172, '', '657', '2024-04-01', 'test2', 10.00, '', '', '', '4147400160757025', '', '', '', '', '', '2023-02-28 11:54:03', '2023-02-28 04:55:09', 0, 1),
(173, '', '689', '2023-05-01', 'test2', 10.00, '', '', '', '4147400220429227', '', '', '', '', '', '2023-02-28 11:54:03', '2023-02-28 04:55:11', 1, 0),
(174, '', '658', '2023-10-01', 'test2', 10.00, '', '', '', '4147400246428948', '', '', '', '', '', '2023-02-28 11:54:03', '2023-02-28 04:56:57', 0, 1),
(175, '', '152', '2023-07-01', 'test2', 10.00, '', '', '', '4147400150971792', '', '', '', '', '', '2023-02-28 11:54:03', '2023-02-28 04:57:06', 0, 1),
(176, '', '027', '2024-09-01', 'test2', 10.00, '', '', '', '4147400275645669', '', '', '', '', '', '2023-02-28 11:54:03', '2023-02-28 04:57:17', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `card_sell_list`
--

CREATE TABLE `card_sell_list` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `card_id` bigint(20) NOT NULL,
  `cur_price` float(5,2) DEFAULT 0.00,
  `info` blob DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_del` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `card_sell_list`
--

INSERT INTO `card_sell_list` (`id`, `user_id`, `card_id`, `cur_price`, `info`, `created_at`, `updated_at`, `is_del`) VALUES
(1, 2, 134, 1.00, 0x343134373430303235383436383337387c332f323032367c3339317c7c343031205720466f726b2052647c447572616e676f7c7c38313330337c7c6a6f686e40676d61696c2e636f6d7c554e495445442053544154455309, '2023-02-05 13:34:55', '2023-02-05 13:34:55', 0),
(2, 2, 135, 1.00, 0x343134373430303232333737353133397c362f323032337c3439387c7c323530205765737465726e205374617465732052647c46656c746f6e7c7c39353031387c7c7c554e495445442053544154455309, '2023-02-05 13:34:55', '2023-02-05 13:34:55', 0),
(3, 2, 117, 2.00, 0x343134373430303233333135313139357c322f323032357c3132337c7c556e69746564205374617465737c42726f6f6b6c796e7c575353577c31313233347c353835393738333134377c726f79616c2e647261676f6e38313140676d61696c2e636f6d7c5357495353, '2023-02-05 13:35:30', '2023-02-05 13:35:30', 0),
(4, 2, 136, 1.00, 0x343134373430303235373635353435347c332f323032347c3632327c7c313033322043616d61732044726976657c5068696c6164656c706869617c7c31393131357c7c7c554e495445442053544154455309, '2023-02-05 13:35:31', '2023-02-05 13:35:31', 0),
(5, 2, 138, 1.00, 0x343134373430303235383837353732317c332f323032347c3836347c7c39363736204576616e73746f6e205374204e577c436f6e636f72647c7c32383032377c7c7c554e495445442053544154455309, '2023-02-05 13:35:31', '2023-02-05 13:35:31', 0),
(6, 2, 139, 1.00, 0x343134373430303235393433343133307c332f323032347c3435327c7c36383330204e4f5254482031335448205354524545547c50484f454e49587c7c38353031347c7c7c554e495445442053544154455309, '2023-02-05 13:35:31', '2023-02-05 13:35:31', 0),
(7, 2, 140, 1.00, 0x343134373430303232313632373530367c352f323032337c3138387c7c353630312063686172746572206f616b2064726976657c436865737465726669656c647c7c32333833327c7c7c554e4954454420535441544553, '2023-02-05 13:35:31', '2023-02-05 13:35:31', 0),
(8, 2, 141, 1.00, 0x343134373430303133383834323033327c31322f323032357c3131327c7c3239352041757374696e2053742e7c42657265617c7c34343031377c7c7c554e4954454420535441544553, '2023-02-05 13:35:31', '2023-02-05 13:35:31', 0),
(9, 2, 118, 1.00, 0x343134373430303235313735303532357c31322f323032337c3835377c7c333532393920536e69636b65727376696c65205475726e70696b657c526f756e642048696c6c7c424f53544f4e7c32303134317c7c7c554e4954454420535441544553, '2023-02-05 08:52:16', '2023-02-05 13:35:31', 0),
(10, 2, 1, 1.00, 0x333134373430303233333135353239327c312f323032397c353138343436307c7c33333233204b696e677320486967687761792033427c42726f6f6b6c796e7c4e455720594f524b7c7c7c7c554e49544544205354415445, '2023-02-05 13:40:32', '2023-02-05 13:40:32', 0),
(11, 2, 3, 1.00, 0x333134373430303233333135353239317c312f323032377c353138343436327c7c556e69746564205374617465737c42726f6f6b6c796e7c4f544157417c31313233347c3132333132337c647361664061732e636f6d7c43414e414441, '2023-02-05 13:40:32', '2023-02-05 13:40:32', 0),
(12, 15, 144, 10.00, 0x343134373430303236363236323838387c362f323032347c3238347c7c333531303020576573742045636c697073652072647c5374616e6669656c647c7c38353137327c7c7c554e4954454420535441544553, '2023-02-15 07:47:04', '2023-02-15 07:47:04', 0),
(13, 15, 143, 10.00, 0x343134373430303237343130383830307c382f323032347c3830317c7c32333034204f78666f72642052647c4c617772656e63657c7c36363034397c7c7c554e4954454420535441544553, '2023-02-15 07:47:38', '2023-02-15 07:47:38', 0),
(14, 2, 145, 10.00, 0x343134373430303237313333323031357c372f323032347c3533347c7c383036204e204b6e7564736f6e2053747c4c696265727479204c616b657c7c39393031397c7c7c554e4954454420535441544553, '2023-02-15 08:50:51', '2023-02-15 08:50:51', 0),
(15, 2, 146, 10.00, 0x343134373430343130373534383235377c382f323032367c3336347c7c31353520577269676874205374726565747c41726c696e67746f6e7c7c30323437347c7c7c554e4954454420535441544553, '2023-02-15 08:51:14', '2023-02-15 08:51:14', 0),
(16, 2, 147, 10.00, 0x343134373430303239333839363137397c31312f323032357c3438387c7c36363432204d7569726c616e64732044727c4c61204a6f6c6c617c7c39323033377c7c7c554e4954454420535441544553, '2023-02-15 09:44:35', '2023-02-15 09:44:35', 0),
(17, 2, 153, 10.00, 0x343134373430303133383539363135387c31322f323032337c3638397c7c313534204661726d2048696c6c20526f61647c4c656f6d696e737465727c7c30313435337c7c7c554e4954454420535441544553, '2023-02-27 08:56:11', '2023-02-15 09:48:32', 0),
(18, 2, 4, 1.00, 0x353134373430303233333135353239367c322f323032337c353138343436337c7c556e69746564205374617465737c42726f6f6b6c796e7c43414c49464f4e49417c31313233347c353835393738333134377c726f79616c2e647261676f6e38313140676d61696c2e636f6d7c554e49544544205354415445, '2023-02-15 09:48:49', '2023-02-15 09:48:49', 0),
(19, 2, 148, 5.00, 0x343134373430303232343439373332397c31322f323032337c3139357c7c3339205061756c696e652053747c4e20446172746d6f7574687c7c30323734377c7c7c554e4954454420535441544553, '2023-02-22 23:59:33', '2023-02-22 23:59:33', 0),
(20, 2, 149, 5.00, 0x343134373430343130353731343838357c382f323032357c3633387c7c3520452032326e6420537420417074203330537c4e657720596f726b7c7c31303031307c7c7c554e4954454420535441544553, '2023-02-24 04:33:48', '2023-02-24 04:33:48', 0),
(24, 2, 153, 5.00, 0x343134373430303236313439303735377c342f323032347c3238347c7c7c7c7c7c7c7c, '2023-02-28 03:57:03', '2023-02-28 03:57:03', 0),
(25, 2, 162, 10.00, 0x343134373430303132323632313937307c322f323032347c3835317c7c7c7c7c7c7c7c, '2023-02-28 04:49:51', '2023-02-28 04:49:51', 0),
(26, 2, 173, 10.00, 0x343134373430303232303432393232377c352f323032337c3638397c7c7c7c7c7c7c7c, '2023-02-28 04:55:11', '2023-02-28 04:55:11', 0),
(27, 2, 176, 10.00, 0x343134373430303237353634353636397c392f323032347c3032377c7c7c7c7c7c7c7c, '2023-02-28 04:57:17', '2023-02-28 04:57:17', 0);

-- --------------------------------------------------------

--
-- Table structure for table `country_list`
--

CREATE TABLE `country_list` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb3_unicode_ci DEFAULT '',
  `is_use` tinyint(4) DEFAULT 1,
  `is_del` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `country_list`
--

INSERT INTO `country_list` (`id`, `name`, `is_use`, `is_del`) VALUES
(1, 'UNITED STATE', 1, 0),
(2, 'UNITED KINGDOM', 1, 0),
(3, 'CANADA', 1, 0),
(4, 'ARGENTINA', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `credit_list`
--

CREATE TABLE `credit_list` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `coin_type` enum('BTC','LTC','DOGE') DEFAULT NULL,
  `coin_price` double DEFAULT 0,
  `coin_fee` float(5,2) DEFAULT 0.00,
  `wallet_address` varchar(50) DEFAULT NULL,
  `amount` float(8,2) DEFAULT 0.00,
  `status` enum('OPENED','CLOSED','PAID') DEFAULT 'OPENED',
  `callback_info` blob DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_del` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `credit_list`
--

INSERT INTO `credit_list` (`id`, `user_id`, `coin_type`, `coin_price`, `coin_fee`, `wallet_address`, `amount`, `status`, `callback_info`, `created_at`, `updated_at`, `is_del`) VALUES
(3, 2, 'LTC', 0, 0.00, 'sssss', 30000.00, 'PAID', NULL, '2023-01-30 07:52:16', '2023-02-05 05:41:50', 0),
(4, 2, 'DOGE', 0, 0.00, 'sssss', 0.00, 'OPENED', NULL, '2023-01-30 07:52:23', '2023-01-30 07:52:23', 0),
(5, 2, 'BTC', 0, 0.00, 'sssss', 0.00, 'OPENED', NULL, '2023-01-30 08:14:09', '2023-01-30 08:14:09', 0),
(6, 2, 'BTC', 0, 0.00, 'sssss', 0.00, 'OPENED', NULL, '2023-01-30 08:14:54', '2023-01-30 08:14:54', 0),
(7, 2, 'BTC', 0, 0.00, 'sssss', 0.00, 'OPENED', NULL, '2023-01-30 08:15:42', '2023-01-30 08:15:42', 0),
(8, 2, 'BTC', 0, 0.00, 'sssss', 0.00, 'OPENED', NULL, '2023-01-30 08:18:12', '2023-01-30 08:18:12', 0),
(9, 2, 'LTC', 100, 10.00, 'sssss', 0.00, 'OPENED', NULL, '2023-01-30 08:19:41', '2023-01-30 08:19:41', 0),
(10, 2, 'BTC', 0, 0.00, 'sssss', 0.00, 'OPENED', NULL, '2023-01-30 08:20:11', '2023-01-30 08:20:11', 0),
(11, 2, 'DOGE', 100, 10.00, 'sssss', 0.00, 'OPENED', NULL, '2023-01-30 08:20:46', '2023-01-30 08:20:46', 0),
(12, 2, 'BTC', 100, 10.00, 'sssss', 0.00, 'OPENED', NULL, '2023-01-30 09:46:01', '2023-01-30 09:46:01', 0),
(13, 2, 'LTC', 100, 10.00, 'sssss', 0.00, 'OPENED', NULL, '2023-02-01 04:18:03', '2023-02-01 04:18:03', 0),
(14, 2, 'BTC', 100, 10.00, 'sssss', 0.00, 'OPENED', NULL, '2023-02-01 04:19:12', '2023-02-01 04:19:12', 0),
(15, 2, 'BTC', 100, 10.00, 'sssss', 0.00, 'OPENED', NULL, '2023-02-01 04:33:41', '2023-02-01 04:33:41', 0),
(16, 2, 'LTC', 100, 10.00, 'sssss', 0.00, 'OPENED', NULL, '2023-02-01 04:33:48', '2023-02-01 04:33:48', 0),
(17, 2, 'BTC', 100, 10.00, 'sssss', 0.00, 'OPENED', NULL, '2023-02-01 04:35:22', '2023-02-01 04:35:22', 0),
(18, 2, 'BTC', 100, 10.00, 'sssss', 0.00, 'OPENED', NULL, '2023-02-01 04:36:07', '2023-02-01 04:36:07', 0),
(19, 2, 'LTC', 100, 10.00, 'sssss', 0.00, 'OPENED', NULL, '2023-02-01 04:37:10', '2023-02-01 04:37:10', 0),
(20, 2, 'BTC', 100, 10.00, 'sssss', 0.00, 'OPENED', NULL, '2023-02-01 04:38:46', '2023-02-01 04:38:46', 0),
(21, 2, 'LTC', 100, 10.00, 'sssss', 0.00, 'OPENED', NULL, '2023-02-01 04:41:22', '2023-02-01 04:41:22', 0),
(22, 2, 'DOGE', 100, 10.00, 'sssss', 0.00, 'OPENED', NULL, '2023-02-01 04:41:45', '2023-02-01 04:41:45', 0),
(23, 2, 'BTC', 100, 10.00, 'sssss', 0.00, 'OPENED', NULL, '2023-02-01 04:41:51', '2023-02-01 04:41:51', 0),
(24, 2, 'BTC', 100, 10.00, 'sssss', 0.00, 'OPENED', NULL, '2023-02-01 04:43:05', '2023-02-01 04:43:05', 0),
(25, 2, 'LTC', 100, 10.00, 'sssss', 0.00, 'OPENED', NULL, '2023-02-01 04:45:14', '2023-02-01 04:45:14', 0),
(26, 2, 'LTC', 94.2609, 10.00, 'LWo9o6EpWfwWBEcLkdn7vYhChNQALB', 0.00, 'OPENED', NULL, '2023-02-01 05:41:27', '2023-02-01 05:41:27', 0),
(27, 2, 'DOGE', 0.0967, 10.00, 'DQMwyUpB3byL8FcdZgJmt59XdhkZyE', 0.00, 'OPENED', NULL, '2023-02-01 05:41:55', '2023-02-01 05:41:55', 0),
(28, 2, 'BTC', 23161.097, 10.00, '36H7rpwHvuznCtamkEQ5cKVp4tHkpT', 50.00, 'PAID', NULL, '2023-02-01 05:42:19', '2023-01-31 22:44:01', 0),
(31, 2, 'BTC', 22980.6542, 10.00, '3Bp3PsLX7cKyj2umGzkD4bMboEkHrjLRjj', 0.00, 'OPENED', NULL, '2023-02-06 12:09:01', '2023-02-06 12:09:03', 0),
(32, 2, 'BTC', 22970.6576, 10.00, '36bsugVc8Tnh9N5ztFG8NKWxTSSw6sBQQy', 0.00, 'OPENED', NULL, '2023-02-07 07:11:40', '2023-02-07 07:11:42', 0),
(33, 2, 'LTC', 97.5326, 10.00, 'Li4Frw9soS5hoHjnRWLUUC5zv3rHaw5ksD', 0.00, 'OPENED', NULL, '2023-02-07 07:12:08', '2023-02-07 07:12:10', 0),
(34, 2, 'BTC', 22141.8273, 10.00, '33Kci3hUfQsw516x2RSL4B8Hxud3WwfpuB', 0.00, 'OPENED', NULL, '2023-02-15 16:07:12', '2023-02-15 16:07:13', 0),
(35, 15, 'BTC', 22147.637, 10.00, '3MA2N1r6c4rX8bfANHMB4AJQaKM7Nst33E', 13546.00, 'PAID', NULL, '2023-02-15 16:36:20', '2023-02-15 07:42:09', 0),
(36, 15, 'LTC', 96.4978, 10.00, 'LS5QHFvuwfXgZ6p4vfrdrqSvrmZ7kWLoXh', 1000000.00, 'PAID', NULL, '2023-02-15 16:37:43', '2023-02-15 07:42:10', 0),
(37, 15, 'DOGE', 0.0862, 10.00, 'DGXBEsozwoYP23J9Ksjz3tFT5maBJWrApP', 1000000.00, 'PAID', NULL, '2023-02-15 16:38:25', '2023-02-15 07:40:50', 0),
(38, 2, 'BTC', 22119.3228, 10.00, '3FPBzU1ooziegZaTkA4Fq7SmcxYds1DiDK', 0.00, 'OPENED', NULL, '2023-02-15 18:02:26', '2023-02-15 18:02:27', 0),
(39, 2, 'DOGE', 0.0864, 10.00, 'DMofmaGV9JN5cAq4FudYthDDVHHuGkopHk', 0.00, 'OPENED', NULL, '2023-02-15 19:02:48', '2023-02-15 19:02:49', 0),
(40, 2, 'LTC', 96.2116, 10.00, 'LbVamBTs1QacgRYj4dUS491KrE3mkrKGMa', 0.00, 'OPENED', NULL, '2023-02-15 19:02:49', '2023-02-15 19:02:50', 0),
(41, 2, 'BTC', 22136.9224, 10.00, '3NSwkstA3oehRK9wFPRpoQkLNXAgnRMz9N', 0.00, 'OPENED', NULL, '2023-02-15 19:02:50', '2023-02-15 19:02:51', 0),
(42, 2, 'BTC', 23875.0908, 10.00, '37Z8WNqCC9hbme9tQu1CMwVLQu6bPkPEaL', 0.00, 'OPENED', NULL, '2023-02-24 13:37:58', '2023-02-24 13:38:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq_list`
--

CREATE TABLE `faq_list` (
  `id` bigint(20) NOT NULL,
  `question` blob DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `answer` blob DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_del` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq_list`
--

INSERT INTO `faq_list` (`id`, `question`, `created_at`, `answer`, `updated_at`, `is_del`) VALUES
(12, 0x486f7720746f20637265617465206e6577206163636f756e74, '2022-07-07 15:40:47', 0x596f752063616e20646f2074686973, '2022-07-14 11:19:03', 0),
(14, 0x57686174, '2022-07-12 15:49:55', 0x54686520616161, '2022-07-12 16:30:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `message_list`
--

CREATE TABLE `message_list` (
  `id` bigint(20) NOT NULL,
  `sender_id` bigint(20) NOT NULL,
  `sender_name` varchar(100) DEFAULT NULL,
  `receiver_id` bigint(20) DEFAULT NULL,
  `receiver_name` varchar(100) DEFAULT NULL,
  `subject` varchar(255) DEFAULT '',
  `content` blob DEFAULT NULL,
  `send_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_read` tinyint(1) DEFAULT 0,
  `read_date` timestamp NULL DEFAULT NULL,
  `is_del` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message_list`
--

INSERT INTO `message_list` (`id`, `sender_id`, `sender_name`, `receiver_id`, `receiver_name`, `subject`, `content`, `send_date`, `is_read`, `read_date`, `is_del`) VALUES
(10, 1, 'alks', 5, 'Aleksanser Asanov', '123123', 0x31323331333133, '2022-07-12 14:30:37', 0, NULL, 0),
(11, 1, 'alks', 6, 'asdf', '123123', 0x31323331333133, '2022-07-12 14:30:37', 0, NULL, 0),
(12, 1, 'alks', 9, 'alska', '123123', 0x31323331333133, '2022-07-12 14:30:37', 0, NULL, 0),
(14, 1, 'admin', 5, 'Aleksanser Asanov', 'test1', 0x73737373, '2022-07-12 14:31:48', 0, NULL, 0),
(15, 1, 'admin', 6, 'asdf', 'test2', 0x73616466, '2022-07-12 14:31:48', 0, NULL, 0),
(16, 1, 'admin', 9, 'alska', 'test3', 0x6376626667, '2022-07-12 14:31:48', 0, NULL, 0),
(17, 1, '관리자', 5, 'Aleksanser Asanov', 'test4', 0x67676767, '2022-07-14 11:20:21', 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2014_10_12_200000_add_two_factor_columns_to_users_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `notice_list`
--

CREATE TABLE `notice_list` (
  `id` int(11) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `content` blob DEFAULT NULL,
  `is_popup` tinyint(1) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_del` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notice_list`
--

INSERT INTO `notice_list` (`id`, `user_id`, `subject`, `content`, `is_popup`, `created_at`, `updated_at`, `is_del`) VALUES
(4, NULL, 'What happened? I can not find you on website.', NULL, 0, '2023-02-13 15:22:57', '2023-02-13 15:22:57', 0);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('alks.asanov@gmail.com', '$2y$10$wCnV6WUwNFZah3Qvv5LPyOlZ6F5qBSgWx6ZODklhSZFOG5wcg1pni', '2022-07-08 09:35:23');

-- --------------------------------------------------------

--
-- Table structure for table `qna_list`
--

CREATE TABLE `qna_list` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `subject` varchar(255) DEFAULT '',
  `content` blob DEFAULT NULL,
  `requested_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `answer` blob DEFAULT NULL,
  `is_answer` tinyint(1) DEFAULT 0,
  `answered_date` timestamp NULL DEFAULT NULL,
  `type` tinyint(4) DEFAULT 0 COMMENT '0:일반 1:계좌문의',
  `is_del` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qna_list`
--

INSERT INTO `qna_list` (`id`, `user_id`, `user_name`, `subject`, `content`, `requested_date`, `answer`, `is_answer`, `answered_date`, `type`, `is_del`) VALUES
(1, 1, 'alks', '문이', 0x3c6469763eec9588eb8595ed9599ec84b8ec9a943c68313eebacb4ec8aa8eb9cbbec9db4ec9790ec9a943c2f68313e3c2f6469763e, '2022-07-07 05:56:38', 0xec958ceab2a0ec8ab5eb8b88eb8ba4, 1, '2022-07-14 11:19:13', 0, 0),
(12, 1, 'alks', '계좌문의', 0xeab384eca28cebb288ed98b8eba5bc20ebacb8ec9d98ed95a9eb8b88eb8ba42e, '2022-07-07 15:40:47', 0xec988820ed858cec8aa4ed8ab8ec9e85eb8b88eb8ba4, 1, '2022-07-14 11:19:03', 1, 0),
(14, 1, '관리자', '안녕하게1', 0xe38587e38581e38581e38581, '2022-07-12 15:49:55', 0xeb8bb5ebb380eb82a0eca79c, 1, '2022-07-12 16:30:49', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `app_name` varchar(200) DEFAULT NULL,
  `apirone_account` varchar(255) DEFAULT NULL,
  `apirone_trans_key` varchar(255) DEFAULT NULL,
  `guide` blob DEFAULT NULL,
  `service_pause_msg` blob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `app_name`, `apirone_account`, `apirone_trans_key`, `guide`, `service_pause_msg`) VALUES
(1, NULL, 'apr-981e90565fff83a804edb75e4b71a897', 'Cvl1odzHLRHuQcnhKkfGUkwzKk9oMoCm', 0x3c70726520636c6173733d226c616e672d6a7320732d636f64652d626c6f636b223e3c636f646520636c6173733d22686c6a73206c616e67756167652d6a617661736372697074223e0d0a3c2f636f64653e3c2f7072653e, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `name`, `value`) VALUES
(1, 'checker_price', 'a:2:{s:13:\"check_buycard\";a:10:{s:13:\"chk_cards_buy\";s:4:\"0.57\";s:19:\"checkcc_ru_auth_buy\";s:1:\"1\";s:19:\"checkcc_ru_sale_buy\";s:1:\"1\";s:18:\"checkcc_ru_avs_buy\";s:1:\"1\";s:21:\"checkcc_ru_charge_buy\";s:1:\"1\";s:18:\"chk_cards_buy_dead\";s:4:\"0.25\";s:24:\"checkcc_ru_auth_buy_dead\";N;s:24:\"checkcc_ru_sale_buy_dead\";s:3:\"0.5\";s:23:\"checkcc_ru_avs_buy_dead\";s:3:\"0.5\";s:26:\"checkcc_ru_charge_buy_dead\";s:3:\"0.5\";}s:11:\"check_cards\";a:10:{s:9:\"chk_cards\";s:4:\"4.20\";s:15:\"checkcc_ru_auth\";s:3:\"1.5\";s:15:\"checkcc_ru_sale\";s:3:\"1.5\";s:14:\"checkcc_ru_avs\";s:3:\"1.5\";s:17:\"checkcc_ru_charge\";s:3:\"1.5\";s:14:\"chk_cards_dead\";s:4:\"0.55\";s:20:\"checkcc_ru_auth_dead\";s:4:\"0.75\";s:20:\"checkcc_ru_sale_dead\";s:4:\"0.75\";s:19:\"checkcc_ru_avs_dead\";s:4:\"0.75\";s:22:\"checkcc_ru_charge_dead\";s:4:\"0.75\";}}'),
(3, 'checker_key', 'a:2:{s:13:\"chk_cards_key\";s:40:\"02d2d1d0b75b8f0abc23331456f2f9db82710035\";s:14:\"checkcc_ru_key\";s:32:\"a80577526003dac6b973a74b2644286c\";}');

-- --------------------------------------------------------

--
-- Table structure for table `state_list`
--

CREATE TABLE `state_list` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) DEFAULT '',
  `country_id` bigint(20) DEFAULT NULL,
  `is_use` tinyint(1) DEFAULT 0,
  `is_del` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state_list`
--

INSERT INTO `state_list` (`id`, `name`, `country_id`, `is_use`, `is_del`) VALUES
(1, 'NEW YORK', 1, 1, 0),
(2, 'QUBEC', 3, 1, 0),
(3, 'LONDON', 2, 1, 0),
(4, 'OTAWA', 3, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `trading_schedule`
--

CREATE TABLE `trading_schedule` (
  `id` int(11) NOT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `calculate_time` time DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `is_use` tinyint(1) DEFAULT NULL,
  `is_del` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trading_schedule`
--

INSERT INTO `trading_schedule` (`id`, `start_time`, `end_time`, `calculate_time`, `created_at`, `updated_at`, `is_use`, `is_del`) VALUES
(1, '08:00:00', '10:00:00', '12:00:00', '2022-06-24 22:15:48', '2022-06-24 22:15:53', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `str_id` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` int(11) DEFAULT 1,
  `type` enum('ADMIN','MANAGER','USER') COLLATE utf8mb4_unicode_ci DEFAULT 'USER',
  `is_use` tinyint(4) DEFAULT 1 COMMENT '0:미사용 1:사용 2:신규',
  `is_del` tinyint(1) DEFAULT 0 COMMENT '0:미삭제 1:삭제',
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `bank_user` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `money` decimal(13,2) NOT NULL DEFAULT 0.00,
  `deposit_sum` bigint(20) DEFAULT 0,
  `withdraw_sum` bigint(20) DEFAULT 0,
  `buy_sum` bigint(20) DEFAULT 0,
  `profit_sum` bigint(20) DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `referer` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `memo` blob DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `nickname`, `email`, `str_id`, `level`, `type`, `is_use`, `is_del`, `phone`, `bank_id`, `bank_user`, `bank_account`, `money`, `deposit_sum`, `withdraw_sum`, `buy_sum`, `profit_sum`, `email_verified_at`, `password`, `referer`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `memo`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'administrator', 'admin@gmail.com', 'administrator', 1, 'ADMIN', 1, 0, '01012313453', 1, 'lu', '1231231', '0.00', 0, 0, 0, 0, NULL, '$2y$10$s7skha2JxFjWJTHGdo50y.2RiDN7iOGlARYoA5gIvZaS9jV5gsWhi', '', NULL, NULL, 'C3yKf9sRRbHybzwDFXRIfAGSJEmCCFSdpx2EFLrmyU8lXitsBZGaFJen5s57', NULL, '2022-06-15 03:04:53', '2023-02-12 02:01:36'),
(2, 'test', '테스터', 'test@test.com', 'test', 2, 'USER', 1, 0, '101010191343', 2, 'as', '12313123', '31234.18', 0, 0, 0, 0, NULL, '$2y$10$9OyQEKiYUXMtVjLgDQH.keOythVtzBWIjuAzLuXYORahn9IJECsG2', NULL, NULL, NULL, NULL, NULL, '2022-06-22 20:24:17', '2023-02-28 04:57:17'),
(5, 'Aleksanser Asanov', '아리아', 'adminadsf@adf.com', 'aleksa', 1, 'USER', 1, 1, '+15857707195', 17, 'ar', '1230111', '0.00', 0, 0, 0, 0, NULL, '$2y$10$WtlLAhQszer7WrzqiZp8B.bbEz3ZDVCeE0DRVXeBi22NpX8zYHUcq', NULL, NULL, NULL, NULL, NULL, '2022-07-09 16:13:50', '2023-01-30 23:22:02'),
(6, 'asdf', 'sdf', 'baoyu0222@naver.com', 'asd', 1, 'USER', 1, 1, '123123123', 14, 'qwe', 'asd123', '0.00', 0, 0, 0, 0, NULL, '$2y$10$mLHtxRA44l/0NHXaxn0tguyjJI8sPeOP/UML53xiQ7ZPQ7Pvuvsc6', '1aa', NULL, NULL, NULL, NULL, '2022-07-11 04:10:13', '2023-01-30 23:17:40'),
(12, 'drg', NULL, 'ac2f24621938093b@mail.com', 'ac2f24621938093b', 1, 'USER', 1, 0, NULL, NULL, NULL, NULL, '120.00', 0, 0, 0, 0, NULL, '$2y$10$BnVli7Ad9d.qV/XQ/VJc3OA0oqkXcmX7AIvCtfiFEnvFfiG9g1apS', '', NULL, NULL, NULL, NULL, '2023-01-30 12:59:51', '2023-01-30 23:19:25'),
(13, '', NULL, '1a4135852b6986b3@mail.com', '1a4135852b6986b3', 1, 'USER', 1, 0, NULL, NULL, NULL, NULL, '0.00', 0, 0, 0, 0, NULL, '$2y$10$WFTIaD0.NNe7k7Q4WWDUBe4IH/PoguGkkg9vKOhIlUyZm5ybMPBfm', '', NULL, NULL, NULL, NULL, '2023-02-15 07:21:25', '2023-02-15 07:21:25'),
(14, '', NULL, '2f0fd724493f762e@mail.com', '2f0fd724493f762e', 1, 'USER', 1, 0, NULL, NULL, NULL, NULL, '0.00', 0, 0, 0, 0, NULL, '$2y$10$BUd.2kvr2inG.Y4bozv6f.zY4QTsXlqJ7d3581V5YMdKuhWd0ObnS', '', NULL, NULL, NULL, NULL, '2023-02-15 07:21:34', '2023-02-15 07:21:34'),
(15, '', NULL, 'dfae8d9dce08a152@mail.com', 'dfae8d9dce08a152', 1, 'USER', 1, 0, NULL, NULL, NULL, NULL, '3487135836.00', 0, 0, 0, 0, NULL, '$2y$10$Pvp.G90ODK9MrWeGXYxo/uWg7f.mdO06ljkp2dlct3PXRWN30JAyi', '', NULL, NULL, NULL, NULL, '2023-02-15 07:35:49', '2023-02-15 07:47:38');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `id` int(11) NOT NULL,
  `level` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT '',
  `pay_percent` float(6,3) DEFAULT NULL,
  `levelup_amount` bigint(20) DEFAULT NULL,
  `min_limit` bigint(20) DEFAULT NULL,
  `max_limit` bigint(20) DEFAULT NULL,
  `can_buy` tinyint(1) DEFAULT 1 COMMENT '0:구매불가 1:구매가능',
  `image` varchar(255) DEFAULT NULL,
  `is_use` tinyint(1) DEFAULT 1 COMMENT '0:사용불가 1:사용가능',
  `is_del` tinyint(1) DEFAULT 0 COMMENT '0:미삭제 1:삭제'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`id`, `level`, `name`, `pay_percent`, `levelup_amount`, `min_limit`, `max_limit`, `can_buy`, `image`, `is_use`, `is_del`) VALUES
(1, 1, '브론즈', 10.005, 300, 1, 150, 1, NULL, 1, 0),
(2, 2, '실버', 0.000, 1500, 150, 500, 1, NULL, 1, 0),
(3, 3, '골드', 0.000, 9000, 1000, 3000, 1, NULL, 1, 0),
(4, 4, 'VIP', 0.000, 9999999999, 5000, 10000, 1, NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_live_cards`
--

CREATE TABLE `user_live_cards` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `card_info` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `user_live_cards`
--

INSERT INTO `user_live_cards` (`id`, `user_id`, `card_info`, `created_at`, `updated_at`) VALUES
(5, 2, '4147400256870575|02|2024|954', '2023-02-24 05:29:53', '2023-02-24 05:29:53'),
(6, 2, '4147400251683767|12|23|810', '2023-02-28 03:53:42', '2023-02-28 03:53:42'),
(7, 2, '4147400251683767|12|23|810', '2023-02-28 03:55:51', '2023-02-28 03:55:51'),
(8, 2, '4147400251683767/12/23/810', '2023-02-28 03:58:26', '2023-02-28 03:58:26'),
(9, 2, '4147400242293809|07|2023|293', '2023-02-28 04:16:09', '2023-02-28 04:16:09'),
(10, 2, '4147400113345191|07|2023|153', '2023-02-28 04:16:28', '2023-02-28 04:16:28'),
(11, 2, '4147400251683767|12|23|810', '2023-02-28 04:17:07', '2023-02-28 04:17:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card_list`
--
ALTER TABLE `card_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card_sell_list`
--
ALTER TABLE `card_sell_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country_list`
--
ALTER TABLE `country_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_list`
--
ALTER TABLE `credit_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_list`
--
ALTER TABLE `faq_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_list`
--
ALTER TABLE `message_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice_list`
--
ALTER TABLE `notice_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `qna_list`
--
ALTER TABLE `qna_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state_list`
--
ALTER TABLE `state_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trading_schedule`
--
ALTER TABLE `trading_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_live_cards`
--
ALTER TABLE `user_live_cards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card_list`
--
ALTER TABLE `card_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `card_sell_list`
--
ALTER TABLE `card_sell_list`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `country_list`
--
ALTER TABLE `country_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `credit_list`
--
ALTER TABLE `credit_list`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq_list`
--
ALTER TABLE `faq_list`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `message_list`
--
ALTER TABLE `message_list`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notice_list`
--
ALTER TABLE `notice_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `qna_list`
--
ALTER TABLE `qna_list`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `state_list`
--
ALTER TABLE `state_list`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trading_schedule`
--
ALTER TABLE `trading_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_live_cards`
--
ALTER TABLE `user_live_cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
