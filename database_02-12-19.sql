-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2019 at 05:29 PM
-- Server version: 5.7.28-0ubuntu0.18.04.4
-- PHP Version: 7.2.24-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gebe_lab_ms`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_analysis`
--

CREATE TABLE `tbl_analysis` (
  `ana_id` int(11) NOT NULL,
  `ana_wa_type_id_fk` int(6) NOT NULL,
  `ana_wa_subtype_id_fk` int(6) NOT NULL,
  `ana_consumer` int(11) NOT NULL,
  `ana_date` date NOT NULL,
  `ana_time` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ana_status` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ana_temp` float DEFAULT NULL,
  `ana_ph` float DEFAULT NULL,
  `ana_cond` mediumint(9) DEFAULT NULL,
  `ana_tds` float DEFAULT NULL,
  `ana_chload` mediumint(9) DEFAULT NULL,
  `ana_talk` mediumint(9) DEFAULT NULL,
  `ana_cahard` mediumint(9) DEFAULT NULL,
  `ana_iron` float DEFAULT NULL,
  `ana_silica` float DEFAULT NULL,
  `ana_alum` float DEFAULT NULL,
  `ana_turb` float DEFAULT NULL,
  `ana_chlone` float DEFAULT NULL,
  `ana_lsi` float DEFAULT NULL,
  `ana_color` mediumint(9) DEFAULT NULL,
  `ana_lead` float DEFAULT NULL,
  `ana_tc` mediumint(9) DEFAULT NULL,
  `ana_ec` mediumint(9) DEFAULT NULL,
  `ana_ent` mediumint(9) DEFAULT NULL,
  `ana_hpc` mediumint(9) DEFAULT NULL,
  `ana_clost` mediumint(9) DEFAULT NULL,
  `ana_leg` mediumint(9) DEFAULT NULL,
  `ana_modified_on` datetime NOT NULL,
  `ana_created_by` int(11) NOT NULL,
  `ana_created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_analysis`
--

INSERT INTO `tbl_analysis` (`ana_id`, `ana_wa_type_id_fk`, `ana_wa_subtype_id_fk`, `ana_consumer`, `ana_date`, `ana_time`, `ana_status`, `ana_temp`, `ana_ph`, `ana_cond`, `ana_tds`, `ana_chload`, `ana_talk`, `ana_cahard`, `ana_iron`, `ana_silica`, `ana_alum`, `ana_turb`, `ana_chlone`, `ana_lsi`, `ana_color`, `ana_lead`, `ana_tc`, `ana_ec`, `ana_ent`, `ana_hpc`, `ana_clost`, `ana_leg`, `ana_modified_on`, `ana_created_by`, `ana_created_on`) VALUES
(47, 0, 0, 26, '2019-10-01', '12:00 PM', 'No Water', 22, 5.5, 5, 2.55, 41, 26, 25, 0.1, 14, 0.15, 3, 0.4, 0.4, 16, -5, -4, -5, -56, -9, -5, -98, '2019-10-31 00:42:31', 1, '2019-10-30 17:38:20'),
(48, 0, 0, 26, '2019-10-01', '12:50 PM', 'No Water', 21, 4.5, 5, 2.55, 41, 25, 14, 0.15, 14, 0.12, 2, 0.45, 0.35, 16, -6, -6, -6, -8, -98, -9, -9, '2019-10-31 00:35:52', 1, '2019-10-30 17:45:32'),
(49, 0, 0, 26, '2019-10-02', '12:00 PM', 'No Water', 23, 4, 5, 2.55, 41, 25, 25, 0.1, 14, 0.15, 3, 0.4, 0.4, 16, -5, -4, -5, -56, -9, -5, -98, '2019-10-31 00:35:23', 1, '2019-10-30 17:38:20'),
(50, 0, 0, 26, '2019-10-02', '12:50 PM', 'No Water', 22, 5.8, 5, 2.55, 41, 25, 14, 0.15, 14, 0.12, 2, 0.45, 0.35, 16, -6.6, -6, -6, -8, -98, -9, -9, '2019-10-31 00:35:57', 1, '2019-10-30 17:45:32'),
(51, 0, 0, 26, '2019-10-03', '2:00 PM', 'No Water', 23, 5.3, 5, 2.55, 41, 25, 25, 0.1, 14, 0.15, 3, 0.4, 0.4, 16, -5, -4, -5, -56, -9, -5, -98, '2019-10-31 00:36:06', 1, '2019-10-30 17:38:20'),
(52, 0, 0, 26, '2019-10-03', '12:50 PM', 'Closed', 21, 5.4, 5, 2.55, 41, 25, 14, 0.15, 14, 0.12, 2, 0.45, 0.35, 16, -6.6, -6, -6, -8, -98, -9, -9, '2019-10-31 00:36:15', 1, '2019-10-30 17:45:32'),
(53, 0, 0, 26, '2019-10-01', '4:00 AM', 'No Water', 20, 5, 5, 2.55, 41, 25, 25, 0.1, 14, 0.15, 3, 0.4, 0.4, 16, -5, -4, -5, -56, -9, -5, -98, '2019-10-31 00:35:37', 1, '2019-10-30 17:38:20'),
(54, 0, 0, 26, '2019-11-13', '11:23 PM', 'No Water', 323, 23, 22, 11.22, NULL, 323, NULL, 23, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-16 21:03:57', 1, '2019-11-16 21:03:54'),
(55, 0, 0, 26, '2019-11-20', '4:23 AM', 'Closed', 32, NULL, 323, 164.73, NULL, 232, NULL, NULL, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-16 21:04:02', 1, '2019-11-16 21:04:00'),
(56, 0, 0, 26, '2019-11-06', '3:43 AM', 'Rain', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17 19:50:44', 1, '2019-11-17 19:50:44'),
(57, 0, 0, 0, '2019-11-26', '6:06 AM', 'No Water', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17 20:13:17', 1, '2019-11-17 20:13:17'),
(58, 3, 1, 0, '2019-11-01', '9:33 PM', 'No Water', 6, 7, 7, 3.57, 5, 7, 8, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17 22:05:03', 1, '2019-11-17 22:04:59'),
(59, 4, 4, 0, '2019-11-06', '3:43 AM', 'No Water', 32, 7, 7, 3.57, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-17 22:10:48', 1, '2019-11-17 22:10:45'),
(60, 1, 8, 0, '2019-11-12', '11:42 PM', 'Closed', 3, 4, 4, 2.04, 4, 4, 4, 4, 4, 2, NULL, 0.4, NULL, NULL, NULL, 1, NULL, NULL, NULL, 0, NULL, '2019-11-18 11:21:25', 1, '2019-11-17 22:49:42'),
(61, 1, 8, 0, '2019-11-12', '3:23 AM', 'No Water', 2, NULL, 33, 16.83, 44, 4, 2, NULL, 2, 3, NULL, 0.7, NULL, NULL, NULL, 4, NULL, NULL, NULL, 0, NULL, '2019-11-18 11:21:21', 1, '2019-11-17 22:49:54'),
(62, 1, 8, 0, '2019-11-11', '12:13 PM', 'No Water', 1, 4, 4, 2.04, 4, 44, 4, 4, 1, 2, 23, 0.7, 0.7, NULL, NULL, 2, NULL, NULL, NULL, 1, NULL, '2019-11-29 13:34:14', 1, '2019-11-17 22:50:05'),
(63, 1, 9, 0, '2019-11-12', '2:32 AM', 'Rain', 6, 7, 6, 3.06, 7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-11-18 10:59:31', 1, '2019-11-18 10:59:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area`
--

CREATE TABLE `tbl_area` (
  `area_id` int(11) NOT NULL,
  `fk_dis_id` int(11) NOT NULL,
  `area_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_area`
--

INSERT INTO `tbl_area` (`area_id`, `fk_dis_id`, `area_name`) VALUES
(0, 0, ' '),
(1, 3, 'Airport'),
(2, 3, 'Almond Grove'),
(3, 3, 'Cay Bay'),
(4, 4, 'Cay Hill'),
(5, 3, 'Cole Bay'),
(6, 5, 'Defiance'),
(7, 5, 'Dutch Quarter'),
(8, 4, 'Ebenezer'),
(9, 5, 'Guana Bay'),
(10, 4, 'Little Bay'),
(11, 5, 'Madame Estate'),
(13, 5, 'Middle Region'),
(14, 5, 'Mnt William'),
(15, 3, 'Mullet Bay'),
(16, 5, 'Over The Pond'),
(17, 5, 'Philipsburg'),
(18, 4, 'Saunders'),
(19, 4, 'South Reward'),
(20, 4, 'St. Johns'),
(21, 4, 'St. Peters'),
(22, 4, 'Suanders'),
(23, 5, 'Sucker Garden'),
(26, 4, 'Concordia'),
(27, 4, 'Weymouth Hill'),
(28, 4, 'Mary\'s Fancy'),
(29, 4, 'Bush Road'),
(30, 5, 'Zagersgut'),
(31, 5, 'Over the Bank'),
(33, 3, 'Simpson Bay'),
(34, 5, 'Arch Road'),
(35, 4, 'Betty\'s Estate'),
(36, 4, 'Belair'),
(37, 4, 'Fort Hill'),
(38, 3, 'Mullet Bay/Maho'),
(39, 3, 'Lowlands'),
(40, 4, 'Cul de sac'),
(41, 3, 'Beacon Hill'),
(43, 3, 'Pelican'),
(44, 3, 'Indigo Bay'),
(45, 5, 'Belvedere'),
(46, 5, 'Red Pond'),
(47, 5, 'Dawn Beach Estate'),
(48, 5, 'Oyster Pond'),
(49, 5, 'Stewart Estate'),
(50, 5, 'Rice Hill Estate'),
(51, 5, 'Union Farm'),
(52, 0, 'Pointe Blanche'),
(53, 0, 'Hope Estate'),
(54, 0, 'Retreat Estate'),
(55, 0, 'A. T. Illige Road'),
(56, 0, 'Coralita Road');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_boilers`
--

CREATE TABLE `tbl_boilers` (
  `boiler_id` int(11) NOT NULL,
  `boiler_id_code` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `boiler_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdDT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_boilers`
--

INSERT INTO `tbl_boilers` (`boiler_id`, `boiler_id_code`, `boiler_name`, `createdBy`, `createdDT`) VALUES
(1, 'B1', 'Boiler 18', 0, NULL),
(2, 'B3', 'Boiler 19', 0, NULL),
(3, 'B2', 'Boiler 20', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_buildings`
--

CREATE TABLE `tbl_buildings` (
  `building_id` int(11) NOT NULL,
  `building_id_code` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `building_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdDT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_buildings`
--

INSERT INTO `tbl_buildings` (`building_id`, `building_id_code`, `building_name`, `createdBy`, `createdDT`) VALUES
(1, '3', 'Building 3', 0, NULL),
(2, '2', 'Building 2', 0, NULL),
(3, '1', 'Building 1', 0, NULL),
(4, '4', 'Building 4', 27, '2019-11-26 19:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_companies`
--

CREATE TABLE `tbl_companies` (
  `com_id` int(11) NOT NULL,
  `com_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_companies`
--

INSERT INTO `tbl_companies` (`com_id`, `com_name`) VALUES
(1, 'N. V. GEBE');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_consumers`
--

CREATE TABLE `tbl_consumers` (
  `con_id` int(11) NOT NULL,
  `con_first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `con_last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `con_email` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_business_phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_primary_phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_mobile_phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_street` int(11) DEFAULT NULL,
  `con_webpage` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_notes` text COLLATE utf8_unicode_ci,
  `con_created_on` datetime NOT NULL,
  `con_modified_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_consumers`
--

INSERT INTO `tbl_consumers` (`con_id`, `con_first_name`, `con_last_name`, `con_email`, `con_business_phone`, `con_primary_phone`, `con_mobile_phone`, `con_street`, `con_webpage`, `con_notes`, `con_created_on`, `con_modified_on`) VALUES
(26, 'Richardson', 'Swinda', '', '', '5442335', '', 0, '', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(27, 'Sutton', 'Walter', '', '5422113', '5443100', '.', 0, '', 'Employee Gebe', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(28, 'Operations', 'N.V. GEBE', '', '', '5995206067', '5995206067', 0, '', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(29, 'Clemencia', 'Sidney', '', '', '0000000', '', 0, '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(30, 'Samuel', 'O', '', '.', '.', '.', 0, '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(31, 'Meyers', 'Angelo', '', '', '9999999', '999999', 0, '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(32, 'Lake', 'Loraine', '', '', '599-553-5009', '553-5009', 0, '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(33, 'Lacle', 'Judith', '', '', '526-6355', '526-6355', 0, '', 'Client', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(34, 'Blyden', 'Grace', '', '', '5240990', '5240990', 0, '', 'Lady Grace PjD2', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(35, 'Fleming', 'Aline', '', '', '5564577', '5564577', 0, '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(36, 'Webster', 'Donald', '', '', 'xt 2204', '5206035', 0, '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(37, 'FirstCaribbean Intl. Bank', '', '', '', '', '', 0, '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(38, 'George', 'Sam', '', '', '0000000', '00000000', 0, '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(39, 'Gumbs', 'Edwin', '', '', '000000000', '', 0, '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(40, 'Arrindel', 'Mavis', '', '', '.', '.', 0, '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(41, 'Deher', 'Christina', 'cdeher@hotmail.com', '.', '721-587-2882', '721-587-2882', 0, '', 'House is not on the Deher Pump it is off the main.', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(42, 'somename', 'somelast', '123456@gmail.com', '9999999999', '8888888888', '7777777777', 0, 'asd.asd.asd', '', '2019-10-12 21:23:28', '2019-10-12 21:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contacts`
--

CREATE TABLE `tbl_contacts` (
  `con_id` int(11) NOT NULL,
  `con_meter_no` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_company` int(11) DEFAULT NULL,
  `con_first_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `con_last_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `con_contact_name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_file_as` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_email` varchar(25) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_business_phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_primary_phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_mobile_phone` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_address` text COLLATE utf8_unicode_ci,
  `con_district_id` int(4) NOT NULL,
  `con_area_id` int(4) NOT NULL,
  `con_street_id` int(4) NOT NULL,
  `con_city` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_country` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_webpage` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `con_notes` text COLLATE utf8_unicode_ci,
  `con_attachments` text COLLATE utf8_unicode_ci,
  `con_created_on` datetime NOT NULL,
  `con_modified_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_contacts`
--

INSERT INTO `tbl_contacts` (`con_id`, `con_meter_no`, `con_company`, `con_first_name`, `con_last_name`, `con_contact_name`, `con_file_as`, `con_email`, `con_business_phone`, `con_primary_phone`, `con_mobile_phone`, `con_address`, `con_district_id`, `con_area_id`, `con_street_id`, `con_city`, `con_country`, `con_webpage`, `con_notes`, `con_attachments`, `con_created_on`, `con_modified_on`) VALUES
(1, '132', 1, 'Leak Detection Team', '', 'Leak Detection Team', 'Leak Detection Team', 'simon.wick@matchpointinc.', '910.509.7225', '9105097225', '1.904.305.0333', '6624 Gordon Road, unit H', 0, 0, 0, 'Wilmington', 'USA', '', '', '', '2019-10-12 20:33:04', '2019-10-12 20:33:04'),
(2, '45475', 1, 'Richardson', 'Carl', NULL, NULL, 'carl.Richardson@nvgebe.co', '59954248110', '5269898', '5879898', '', 0, 0, 0, NULL, NULL, '', '', '', '2019-10-12 20:33:05', '2019-12-01 19:42:45'),
(3, '', 1, 'Christian', 'Julius', 'Christian Julius', 'Christian, Julius', 'julius.christian@nvgebe.c', '2207', '2207', '', '', 0, 0, 0, '', '', '', '', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(4, '14545', 1, 'test', 'Tester', 'test Tester', 'test, Tester', '', '', '9890000', '', '', 0, 0, 0, '', '', '', '', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(5, '45645', 1, 'Hodge', 'Carl', 'Hodge Carl', 'Hodge, Carl', '', '', '789088', '', '', 0, 0, 0, '', '', '', '', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(6, '', 1, 'Dembrook', 'Mauricio', 'Dembrook Mauricio', 'Dembrook, Mauricio', 'mauricio.dembook@nvgebe.c', '', '5995206031', '', '', 0, 0, 0, '', '', '', '', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(7, '', 1, 'Ramirez', 'Keysy', 'Ramirez Keysy', 'Ramirez, Keysy', 'Keysy', '', '5543100', '', '', 0, 0, 0, '', '', '', '', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(8, '456456', 1, 'Doran', 'Eqbert', 'Doran Eqbert', 'Doran, Eqbert', '', '', '2205', '', '', 0, 0, 0, '', '', '', '', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(9, '', 1, 'Air Fin', 'Kevin', 'Air Fin Kevin', 'Air Fin, Kevin', '', '', '7215207916', '5995207916', '', 0, 0, 0, '', '', '', '', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(10, '456456', 1, 'Ruffini', 'Allain', 'Ruffini Allain', 'Ruffini, Allain', '', '', '5995816327', '', 'Simpson Bay', 0, 0, 0, '', '', '', 'Meter No. 6111 1040313 (Person being Contacted is Demitrus Marlin 5816327)', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(11, '456456', 1, 'Hernandez', 'Ramiro', 'Hernandez Ramiro', 'Hernandez, Ramiro', 'ramirohernandez@nvgebe.co', '', '+5995206056', '', '', 0, 0, 0, '', 'St. Maarten', '', '', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(12, '..', 1, 'Abram', 'Eugene', 'Abram Eugene', 'Abram, Eugene', '', '', '5995201572', '', '', 0, 0, 0, 'Philipsburg', 'St. Maarten', '', '', 'CON121575110192-Screenshotfrom2019-11-3009-33-48.png', '2019-10-12 20:33:05', '2019-11-30 16:06:32'),
(13, '456456', 1, 'Lake', 'Francisco', 'Lake Francisco', 'Lake, Francisco', '', '', '5995555208', '5995555208', '', 0, 0, 0, '', '', '', '', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(14, '45645', 1, 'Carty', 'Natacha', 'Carty Natacha', 'Carty, Natacha', '', '', '5995532898', '', 'Airport Road 55, Village', 0, 0, 0, 'Simpson Bay', 'SXM', '', 'Meter Number 4071', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(15, '', 1, 'Plant', 'Power', 'Plant Power', 'Plant, Power', '', '', '5201474', '', '', 0, 0, 0, '', '', '', '', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(16, '16162', 1, 'Wong Pak', 'Lam', 'Wong Pak Lam', 'Wong Pak, Lam', '', '5430182', '5430182', '', 'Rembrandt Plein 5', 0, 0, 0, 'madame estate', 'st. maarten', '', '', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(17, '456456', 1, 'call in', 'call in', 'call in call in', 'call in, call in', '', '', '5422213', '', '', 0, 0, 0, '', '', '', 'customer did not want to leave contact information', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(18, '13352', 1, 'call in 2', 'call in', 'call in 2 call in', 'call in 2, call in', '', '5444210', '5240075', '', 'opel road', 0, 0, 0, 'cole bay #4', 'st. maarten', '', '', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(19, '', 1, 'Richardson', 'Sharon', 'Richardson Sharon', 'Richardson, Sharon', '', '', '5579898', '', '', 0, 0, 0, '', '', '', '', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(20, '456456', 1, 'Simpson Bay', 'GEBE N.V.', 'Simpson Bay GEBE N.V.', 'Simpson Bay, GEBE N.V.', '', '', 'xt4422', '', '', 0, 0, 0, '', '', '', '', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(21, '456456', 1, 'Philips', 'Windell', 'Philips Windell', 'Philips, Windell', '', '', '.', '', 'Union Farm Estate, Monte Video Rd', 0, 0, 0, '', 'SXM', '', '', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(22, '', 1, 'francis', 'debbie', 'francis debbie', 'francis, debbie', '', '', '5467255', '', '', 0, 0, 0, '', '', '', '', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(23, '456456', 1, 'Drijvers', 'Patrick', 'Drijvers Patrick', 'Drijvers, Patrick', '', '', '5995803012', '5995206028', '', 0, 0, 0, '', '', '', '', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(24, '', 1, 'Hecke Van', 'James', 'Hecke Van James', 'Hecke Van, James', '', '', '0000000', '', 'Isis Road', 0, 0, 0, 'Cul de Sac', '', '', '', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(25, '', 1, 'Kranz', 'Wendy', 'Kranz Wendy', 'Kranz, Wendy', '', '', '5995816926', '5995816926', 'Tigris Rd 26,', 0, 0, 0, 'Low Lands', 'St. Maarten', '', 'Gate Property 10 units GEBE Meter inside property Name of Property Parc Lagon Aegean', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(26, '', 1, 'Richardson', 'Swinda', 'Richardson Swinda', 'Richardson, Swinda', '', '', '5442335', '', 'Coconut Palm Drive #2, Orange Grove', 0, 0, 0, 'Cole Bay', 'St. Maarten', '', '', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(27, '', 1, 'Sutton', 'Walter', 'Sutton Walter', 'Sutton, Walter', '', '5422113', '5443100', '.', '', 0, 0, 0, '', '', '', 'Employee Gebe', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(28, '', 1, 'Operations', 'N.V. GEBE', 'Operations N.V. GEBE', 'Operations, N.V. GEBE', '', '', '5995206067', '5995206067', '', 0, 0, 0, '', '', '', '', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(29, '', 1, 'Clemencia', 'Sidney', 'Clemencia Sidney', 'Clemencia, Sidney', '', '', '0000000', '', 'N.V. GEBE', 0, 0, 0, '', '', '', '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(30, '', 1, 'Samuel', 'O', 'Samuel O', 'Samuel, O', '', '.', '.', '.', '', 0, 0, 0, '', '', '', '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(31, '', 1, 'Meyers', 'Angelo', 'Meyers Angelo', 'Meyers, Angelo', '', '', '9999999', '999999', '', 0, 0, 0, '', '', '', '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(32, '', 1, 'Lake', 'Loraine', 'Lake Loraine', 'Lake, Loraine', '', '', '599-553-5009', '553-5009', 'Dominica Rd. #9', 0, 0, 0, 'Madame estate', 'St. Maarten', '', '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(33, '', 1, 'Lacle', 'Judith', 'Lacle Judith', 'Lacle, Judith', '', '', '526-6355', '526-6355', 'Port of Spain Drive #19', 0, 0, 0, 'Mnt. William Hill', 'St. Maarten', '', 'Client', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(34, '', 1, 'Blyden', 'Grace', 'Blyden Grace', 'Blyden, Grace', '', '', '5240990', '5240990', 'Ebenezer Rd #84', 0, 0, 0, '', '', '', 'Lady Grace PjD2', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(35, '', 1, 'Fleming', 'Aline', 'Fleming Aline', 'Fleming, Aline', '', '', '5564577', '5564577', 'LB Scott Rd. #4', 0, 0, 0, 'Cul de Sac', '', '', '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(36, '', 1, 'Webster', 'Donald', 'Webster Donald', 'Webster, Donald', '', '', 'xt 2204', '5206035', 'N.V. GEBE', 0, 0, 0, '', '', '', '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(37, '', 1, 'FirstCaribbean Intl. Bank', '', 'FirstCaribbean Intl. Bank', 'FirstCaribbean Intl. Bank', '', '', '', '', 'Welfare Rd', 0, 0, 0, 'Cole Bay', '', '', '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(38, '', 1, 'George', 'Sam', 'George Sam', 'George, Sam', '', '', '0000000', '00000000', 'GEBE', 0, 0, 0, '', '', '', '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(39, '', 1, 'Gumbs', 'Edwin', 'Gumbs Edwin', 'Gumbs, Edwin', '', '', '000000000', '', '', 0, 0, 0, '', '', '', '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(40, '', 1, 'Arrindel', 'Mavis', 'Arrindel Mavis', 'Arrindel, Mavis', '', '', '.', '.', 'Sucker Garden', 0, 0, 0, '', '', '', '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(41, '', 1, 'Deher', 'Christina', 'Deher Christina', 'Deher, Christina', 'cdeher@hotmail.com', '.', '721-587-2882', '721-587-2882', '54 Guana Bay Road', 0, 0, 0, 'Guana Bay', 'St. Maarten', '', 'House is not on the Deher Pump it is off the main.', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(42, NULL, 1, 'somename', 'somelast', 'contact samepe', 'sapmes comeads', '123456@gmail.com', '9999999999', '8888888888', '7777777777', '', 0, 0, 0, 'nashik', 'india', 'asd.asd.asd', '', '', '2019-10-12 21:23:28', '2019-10-12 21:34:59'),
(44, '123', 1, 'Sample', 'Name', 'Sample Name', 'Sample Name, File', 'some@mail.com', '987654321', '987654321', '987654321', '', 0, 0, 0, '', '', '', '', NULL, '2019-11-08 20:20:31', '2019-11-08 20:20:31'),
(45, '123', 1, 'Sample', 'Name 2', 'sample name 2', 'Sample Name 2, File', '', '', '', '', '', 0, 0, 0, '', '', '', '', NULL, '2019-11-08 20:26:21', '2019-11-08 20:26:21'),
(46, '123', 1, 'Sample', 'Name 3', 'sample name 3', 'Sample Name 3, File', '', '656565656', '56565656', '565656565', '', 0, 0, 0, '', '', '', '', NULL, '2019-11-08 20:27:04', '2019-11-08 20:27:04'),
(47, '123', 1, 'Sample', 'Name  4', 'sample name 3', 'Sample Name 3, File', '', '', '', '', '', 0, 0, 0, '', '', '', '', NULL, '2019-11-08 20:27:31', '2019-11-08 20:27:31'),
(48, '', 1, 'Sample', 'Name 4', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', NULL, '2019-11-08 20:27:52', '2019-11-08 20:27:52'),
(49, '', NULL, 'Sample', 'Name 45', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', NULL, '2019-11-08 20:28:16', '2019-11-08 20:28:16'),
(50, '', 0, 'Sample', 'Name 45', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', NULL, '2019-11-08 20:29:18', '2019-11-08 20:29:18'),
(51, '12345', 1, 'Sample', 'Sample', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', NULL, '2019-11-08 20:29:48', '2019-11-08 20:29:48'),
(52, '123', 1, 'ELECTRICAL ISSUE', 'NAME', '', '', '', '', '', '', '', 0, 0, 0, '', '', '', '', NULL, '2019-11-09 13:21:42', '2019-11-09 13:21:42'),
(53, '1212', 1, 'Sagar', 'Mali', NULL, NULL, 's.d.mali89@gmail.com', '2551223538', '2551223538', '', '240, Shiwaji Chauk, Sinnar', 3, 0, 3, NULL, NULL, '', 'This is test contact added by software developer.', 'CON531575212361-gebe_white4(1).png', '2019-11-22 16:54:21', '2019-12-01 20:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `cust_id` int(11) NOT NULL,
  `cust_full_name` varchar(150) DEFAULT NULL,
  `cust_first_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cust_last_name` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cust_meter_no` varchar(40) DEFAULT NULL,
  `cust_email` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cust_business_phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cust_primary_phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cust_mobile_phone` varchar(15) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cust_street` int(11) DEFAULT NULL,
  `cust_webpage` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `cust_notes` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `cust_created_on` datetime NOT NULL,
  `cust_modified_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`cust_id`, `cust_full_name`, `cust_first_name`, `cust_last_name`, `cust_meter_no`, `cust_email`, `cust_business_phone`, `cust_primary_phone`, `cust_mobile_phone`, `cust_street`, `cust_webpage`, `cust_notes`, `cust_created_on`, `cust_modified_on`) VALUES
(26, NULL, 'Richardson', 'Swinda', '', '', '', '5442335', '', 0, '', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(27, NULL, 'Sutton', 'Walter', '', '', '5422113', '5443100', '.', 0, '', 'Employee Gebe', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(28, NULL, 'Operations', 'N.V. GEBE', '', '', '', '5995206067', '5995206067', 0, '', '', '2019-10-12 20:33:05', '2019-10-12 20:33:05'),
(29, NULL, 'Clemencia', 'Sidney', '', '', '', '0000000', '', 0, '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(30, NULL, 'Samuel', 'O', '', '', '.', '.', '.', 0, '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(31, NULL, 'Meyers', 'Angelo', '', '', '', '9999999', '999999', 0, '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(32, NULL, 'Lake', 'Loraine', '', '', '', '599-553-5009', '553-5009', 0, '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(33, NULL, 'Lacle', 'Judith', '', '', '', '526-6355', '526-6355', 0, '', 'Client', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(34, NULL, 'Blyden', 'Grace', '', '', '', '5240990', '5240990', 0, '', 'Lady Grace PjD2', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(35, NULL, 'Fleming', 'Aline', '', '', '', '5564577', '5564577', 0, '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(36, NULL, 'Webster', 'Donald', '', '', '', 'xt 2204', '5206035', 0, '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(37, NULL, 'FirstCaribbean Intl. Bank', '', '', '', '', '', '', 0, '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(38, NULL, 'George', 'Sam', '', '', '', '0000000', '00000000', 0, '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(39, NULL, 'Gumbs', 'Edwin', '', '', '', '000000000', '', 0, '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(40, NULL, 'Arrindel', 'Mavis', '', '', '', '.', '.', 0, '', '', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(41, NULL, 'Deher', 'Christina', '', 'cdeher@hotmail.com', '.', '721-587-2882', '721-587-2882', 0, '', 'House is not on the Deher Pump it is off the main.', '2019-10-12 20:33:06', '2019-10-12 20:33:06'),
(42, NULL, 'somename', 'somelast', '', '123456@gmail.com', '9999999999', '8888888888', '7777777777', 0, 'asd.asd.asd', '', '2019-10-12 21:23:28', '2019-10-12 21:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `dis_id` int(11) NOT NULL,
  `dis_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`dis_id`, `dis_name`) VALUES
(0, ' '),
(3, 'West'),
(4, 'Middle'),
(5, 'East');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_engines`
--

CREATE TABLE `tbl_engines` (
  `engine_id` int(4) NOT NULL,
  `engine_id_code` varchar(30) NOT NULL,
  `engine_name` varchar(100) NOT NULL,
  `createdBy` int(11) NOT NULL,
  `createdDT` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_engines`
--

INSERT INTO `tbl_engines` (`engine_id`, `engine_id_code`, `engine_name`, `createdBy`, `createdDT`) VALUES
(1, '1', 'Motor 1', 1, '2019-11-18 20:12:30'),
(2, '2', 'Motor 2', 1, '2019-11-25 21:10:34'),
(3, '3', 'Motor 3', 1, '2019-11-25 21:10:42'),
(4, '4', 'Motor 4', 1, '2019-11-25 21:10:49'),
(5, '5', 'Motor 5', 27, '2019-11-26 18:41:15'),
(6, '6', 'Motor 6', 27, '2019-11-26 18:41:24'),
(7, '7', 'Motor 7', 27, '2019-11-26 18:41:34'),
(8, '8', 'Motor 8', 27, '2019-11-26 18:41:44'),
(9, '9', 'Motor 9', 27, '2019-11-26 18:41:53'),
(10, '10', 'Motor 10', 27, '2019-11-26 18:42:01'),
(11, '11', 'Motor 11', 27, '2019-11-26 18:42:10'),
(12, '12', 'Motor 12', 27, '2019-11-26 18:42:19'),
(13, '13', 'Motor 13', 27, '2019-11-26 18:42:27'),
(14, '14', 'Motor 14', 27, '2019-11-26 18:42:35'),
(15, '15', 'Motor 15', 27, '2019-11-26 18:42:43'),
(16, '16', 'Motor 16', 27, '2019-11-26 18:42:50'),
(17, '17', 'Motor 17', 27, '2019-11-26 18:42:59'),
(18, '18', 'Motor 18', 27, '2019-11-26 18:43:28'),
(19, '19', 'Motor 19', 27, '2019-11-26 18:43:37'),
(20, '20', 'Motor 20', 27, '2019-11-26 18:43:46'),
(21, '46', 'Motor 46', 27, '2019-11-26 18:44:19'),
(22, '620', 'Motor 620', 27, '2019-11-26 18:44:36'),
(23, '620 INJ', 'Motor 620 INJ', 27, '2019-11-26 18:44:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_last_login`
--

CREATE TABLE `tbl_last_login` (
  `id` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `sessionData` varchar(2048) NOT NULL,
  `machineIp` varchar(1024) NOT NULL,
  `userAgent` varchar(128) NOT NULL,
  `agentString` varchar(1024) NOT NULL,
  `platform` varchar(128) NOT NULL,
  `createdDtm` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_last_login`
--

INSERT INTO `tbl_last_login` (`id`, `userId`, `sessionData`, `machineIp`, `userAgent`, `agentString`, `platform`, `createdDtm`) VALUES
(1, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.90', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', 'Windows 8.1', '2019-10-10 20:19:17'),
(2, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.90', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', 'Windows 8.1', '2019-10-11 20:49:44'),
(3, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.90', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', 'Windows 8.1', '2019-10-12 09:02:05'),
(4, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.90', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', 'Windows 8.1', '2019-10-12 17:57:07'),
(5, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.90', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', 'Windows 8.1', '2019-10-13 12:43:40'),
(6, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.90', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', 'Windows 8.1', '2019-10-13 18:03:51'),
(7, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.90', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', 'Windows 8.1', '2019-10-14 13:29:48'),
(8, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.90', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', 'Windows 8.1', '2019-10-14 13:52:44'),
(9, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.90', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', 'Windows 8.1', '2019-10-15 19:16:26'),
(10, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Windows 8.1', '2019-10-16 09:30:09'),
(11, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Windows 8.1', '2019-10-16 15:05:54'),
(12, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Windows 8.1', '2019-10-16 18:42:45'),
(13, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Windows 8.1', '2019-10-16 21:40:18'),
(14, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Windows 8.1', '2019-10-17 11:52:31'),
(15, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Windows 8.1', '2019-10-17 22:32:22'),
(16, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Windows 8.1', '2019-10-18 13:20:29'),
(17, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Windows 8.1', '2019-10-18 22:21:21'),
(18, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Windows 8.1', '2019-10-19 18:20:07'),
(19, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Windows 8.1', '2019-10-20 20:59:55'),
(20, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (Windows NT 6.3; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Windows 8.1', '2019-10-21 08:54:43'),
(21, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 78.0.3904.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', 'Windows 10', '2019-10-25 14:33:35'),
(22, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 78.0.3904.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', 'Windows 10', '2019-10-25 16:38:51'),
(23, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 78.0.3904.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', 'Windows 10', '2019-10-26 16:35:51'),
(24, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 78.0.3904.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', 'Windows 10', '2019-10-28 11:51:50'),
(25, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 78.0.3904.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', 'Windows 10', '2019-10-28 18:27:14'),
(26, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 78.0.3904.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', 'Windows 10', '2019-10-29 19:23:41'),
(27, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 78.0.3904.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', 'Windows 10', '2019-10-30 12:54:16'),
(28, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 78.0.3904.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', 'Windows 10', '2019-10-30 16:23:16'),
(29, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 78.0.3904.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', 'Windows 10', '2019-10-30 22:05:02'),
(30, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 78.0.3904.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', 'Windows 10', '2019-10-31 18:46:42'),
(31, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 78.0.3904.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', 'Windows 10', '2019-10-31 22:19:49'),
(32, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 78.0.3904.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', 'Windows 10', '2019-11-01 15:53:01'),
(33, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 78.0.3904.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36', 'Windows 10', '2019-11-01 23:20:14'),
(34, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 78.0.3904.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36', 'Windows 10', '2019-11-02 07:04:35'),
(35, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 78.0.3904.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36', 'Windows 10', '2019-11-02 18:24:37'),
(36, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '106.77.0.86', 'Chrome 78.0.3904.87', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36', 'Windows 10', '2019-11-02 23:39:07'),
(37, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '59.94.222.173', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-11-03 09:22:32'),
(38, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '117.199.49.27', 'Firefox 71.0', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:71.0) Gecko/20100101 Firefox/71.0', 'Windows 10', '2019-11-03 09:30:53'),
(39, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '117.208.8.30', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-11-03 15:06:43'),
(40, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '117.208.8.30', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-11-03 15:08:09'),
(41, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '190.102.11.209', 'Chrome 78.0.3904.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', 'Windows 10', '2019-11-04 00:44:25'),
(42, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '201.220.7.9', 'Chrome 78.0.3904.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', 'Windows 10', '2019-11-04 18:02:59'),
(43, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '200.7.37.230', 'Chrome 78.0.3904.87', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36', 'Windows 10', '2019-11-04 18:55:20'),
(44, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '200.7.37.230', 'Chrome 78.0.3904.70', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.70 Safari/537.36', 'Windows 10', '2019-11-06 00:29:38'),
(45, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '200.7.37.230', 'Chrome 78.0.3904.87', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36', 'Windows 10', '2019-11-06 22:51:46'),
(46, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '200.7.37.230', 'Chrome 78.0.3904.87', 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.87 Safari/537.36', 'Windows 10', '2019-11-06 23:27:20'),
(47, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '49.35.97.232', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-11-07 10:42:14'),
(48, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '117.199.52.82', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-11-10 08:08:53'),
(49, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '117.199.53.82', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-11-11 21:43:37'),
(50, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-11-13 12:57:30'),
(51, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-11-16 15:37:52'),
(52, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-11-16 18:34:03'),
(53, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-11-17 10:21:27'),
(54, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-11-18 10:08:45'),
(55, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-11-18 10:09:41'),
(56, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-11-18 14:33:36'),
(57, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-11-18 17:48:04'),
(58, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-11-19 11:16:37'),
(59, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-11-19 22:38:18'),
(60, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-11-24 12:33:29'),
(61, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-11-25 10:36:05'),
(62, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-11-26 22:07:25'),
(63, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-11-27 10:05:22'),
(64, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-11-27 21:59:23'),
(65, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-11-28 10:25:35'),
(66, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-11-28 17:42:41'),
(67, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-11-29 11:22:30'),
(68, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-11-30 09:40:42'),
(69, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-11-30 18:47:06'),
(70, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-12-01 08:44:07'),
(71, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-12-01 13:53:39'),
(72, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-12-01 17:44:24'),
(73, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-12-02 08:03:44'),
(74, 1, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-12-02 15:27:31'),
(75, 28, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-12-02 17:24:40'),
(76, 28, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-12-02 17:25:10'),
(77, 28, '{\"role\":\"1\",\"roleText\":\"System Administrator\",\"name\":\"System Administrator\"}', '::1', 'Chrome 77.0.3865.120', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.120 Safari/537.36', 'Linux', '2019-12-02 17:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ppcw_boilers`
--

CREATE TABLE `tbl_ppcw_boilers` (
  `ppcwb_id` int(11) NOT NULL,
  `ppcwb_boiler` int(11) NOT NULL,
  `ppcwb_datetime` datetime NOT NULL,
  `ppcwb_sampler` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ppcwb_ph` mediumint(9) DEFAULT NULL,
  `ppcwb_cond` mediumint(9) DEFAULT NULL,
  `ppcwb_chloride` mediumint(9) DEFAULT NULL,
  `ppcwb_palkalinity` mediumint(9) DEFAULT NULL,
  `ppcwb_phosphate` mediumint(9) DEFAULT NULL,
  `ppcwb_sulfite` mediumint(9) DEFAULT NULL,
  `ppcwb_clarity` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ppcwb_created_by` int(11) NOT NULL,
  `ppcwb_created_on` datetime NOT NULL,
  `ppcwb_modified_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_ppcw_boilers`
--

INSERT INTO `tbl_ppcw_boilers` (`ppcwb_id`, `ppcwb_boiler`, `ppcwb_datetime`, `ppcwb_sampler`, `ppcwb_ph`, `ppcwb_cond`, `ppcwb_chloride`, `ppcwb_palkalinity`, `ppcwb_phosphate`, `ppcwb_sulfite`, `ppcwb_clarity`, `ppcwb_created_by`, `ppcwb_created_on`, `ppcwb_modified_on`) VALUES
(4, 1, '2019-11-01 01:00:00', '1:00 AM', 12, 9, 12, 14, 13, 11, 'Turbid', 1, '2019-11-01 20:30:51', '2019-11-02 23:41:30'),
(5, 2, '2019-11-01 01:00:00', '1:00 AM', 14, 10, 11, 10, 14, 14, 'L-Turb', 1, '2019-11-01 20:31:00', '2019-11-02 20:23:50'),
(6, 3, '2019-11-01 01:00:00', '1:00 AM', 11, 11, 9, 11, 14, 12, 'Clear', 1, '2019-11-01 20:31:10', '2019-11-02 20:24:04'),
(7, 1, '2019-11-02 01:00:00', '1:00 AM', 14, 9, 15, 142, 12, 17, 'L-Turb', 1, '2019-11-01 20:31:31', '2019-11-07 10:49:49'),
(8, 2, '2019-11-02 01:00:00', '1:00 AM', 12, 10, 14, 11, 12, 14, 'L-Turb', 1, '2019-11-01 20:31:41', '2019-11-02 20:23:53'),
(9, 3, '2019-11-02 01:00:00', '1:00 AM', 14, 11, 12, 12, 14, 15, 'Clear', 1, '2019-11-01 20:31:52', '2019-11-02 23:40:40'),
(10, 1, '2019-11-03 01:00:00', '2:00 PM', 12, 87, 123, 2, 2, 18, 'Clear', 1, '2019-11-01 20:32:16', '2019-11-03 15:18:02'),
(12, 1, '2019-11-01 10:00:00', '12:00 AM', 12, 9, 13, 14, 12, 12, 'L-Turb', 1, '2019-11-01 23:22:19', '2019-11-02 20:23:40'),
(13, 2, '2019-11-01 10:00:00', '12:00 AM', 14, 10, 12, 11, 14, 15, 'L-Turb', 1, '2019-11-01 23:22:36', '2019-11-02 20:23:51'),
(14, 3, '2019-11-01 10:00:00', '12:00 AM', 12, 11, 10, 12, 14, 12, 'L-Turb', 1, '2019-11-01 23:22:47', '2019-11-02 20:24:05'),
(15, 1, '2019-11-01 12:00:00', '2:00 AM', 14, 9, 14, 14, 85, NULL, 'Clear', 1, '2019-11-02 00:02:38', '2019-11-02 20:23:42'),
(16, 2, '2019-11-01 12:00:00', '2:00 AM', 12, 10, 13, 10, 14, 12, 'L-Turb', 1, '2019-11-02 00:02:42', '2019-11-02 23:40:55'),
(17, 3, '2019-11-01 12:00:00', '2:00 AM', 13, 11, 11, 11, 14, 12, 'Turbid', 1, '2019-11-02 00:02:47', '2019-11-02 23:40:53'),
(18, 2, '2019-11-03 01:00:00', '2:00 PM', 74, 10, 15, 10, NULL, NULL, 'L-Turb', 1, '2019-11-02 18:39:56', '2019-11-03 15:20:00'),
(20, 3, '2019-11-03 01:00:00', '2:00 PM', 13, 12, 12, 14, 12, 11, 'L-Turb', 1, '2019-11-02 23:40:41', '2019-11-02 23:40:49'),
(21, 1, '2019-11-06 12:31:00', '9:21 PM', 12, 3, 4, 5, 3, 565, 'Clear', 1, '2019-11-03 09:23:22', '2019-11-03 15:19:23'),
(22, 1, '2019-11-04 23:34:00', '1:14 AM', 43, 2, 3, 2, 87, 34, 'Turbid', 1, '2019-11-03 09:29:31', '2019-11-03 15:19:20'),
(23, 1, '2019-01-01 06:57:00', '3:20 AM', 7, 7, 2, 2, 1, 8, 'L-Turb', 1, '2019-11-03 15:16:20', '2019-11-03 15:16:24'),
(24, 2, '2019-01-01 06:57:00', '3:20 AM', NULL, 3, 8, NULL, 3, NULL, NULL, 1, '2019-11-03 15:16:27', '2019-11-03 15:17:35'),
(25, 3, '2019-01-01 06:57:00', '3:20 AM', NULL, 6, 3, 3, NULL, NULL, NULL, 1, '2019-11-03 15:16:30', '2019-11-03 15:16:31'),
(26, 1, '2019-11-05 23:00:00', '9:00 PM', 6, 2, 2, 2, 2, 2, 'L-Turb', 1, '2019-11-03 15:16:48', '2019-11-03 15:17:29'),
(27, 2, '2019-11-05 23:00:00', '9:00 PM', 2, 55, 2, 2, 1, NULL, 'L-Turb', 1, '2019-11-03 15:16:51', '2019-11-18 15:16:51'),
(28, 3, '2019-11-05 23:00:00', '9:00 PM', 7, 2, 2, 2, 2, 2, 'L-Turb', 1, '2019-11-03 15:17:20', '2019-11-03 15:17:25'),
(29, 3, '2019-11-04 23:34:00', '1:14 AM', 3, 1, 4, 4, 1, 1, 'L-Turb', 1, '2019-11-03 15:18:22', '2019-11-18 15:17:12'),
(30, 2, '2019-11-06 12:31:00', '9:21 PM', 43, 4, 4, 4, 4, 4, 'Clear', 1, '2019-11-03 15:19:25', '2019-11-03 15:19:31'),
(31, 3, '2019-11-06 12:31:00', '9:21 PM', 2, 2, 3, 3, 3, 3, 'L-Turb', 1, '2019-11-03 15:19:34', '2019-11-18 15:17:08'),
(32, 2, '2019-11-04 23:34:00', '1:14 AM', 3, 3, 3, 4, 4, 4, 'Clear', 1, '2019-11-03 15:19:41', '2019-11-03 15:20:09'),
(33, 1, '2019-11-12 04:22:00', '12:24 AM', 3, 4, 45, 5, 6, 7, 'L-Turb', 1, '2019-11-18 14:59:56', '2019-11-18 15:00:01'),
(34, 2, '2019-11-12 04:22:00', '12:24 AM', 323, 2, 3, 2, 1, NULL, 'L-Turb', 1, '2019-11-18 15:16:52', '2019-11-18 15:16:59'),
(35, 3, '2019-11-12 04:22:00', '12:24 AM', 2, 1, 6, 2, 1, 1, 'Turbid', 1, '2019-11-18 15:17:02', '2019-11-18 15:17:15'),
(36, 1, '2019-11-01 01:00:00', 'sss', 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-11-18 15:29:44', '2019-11-18 15:29:44'),
(37, 1, '2019-11-13 23:23:00', '232321', 2, 2, 33, 212, 123, 13, NULL, 1, '2019-11-18 15:30:38', '2019-11-18 15:30:52'),
(38, 1, '2019-11-20 03:23:00', 'sadsa', 3, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2019-11-25 11:40:48', '2019-11-25 11:40:48'),
(39, 1, '2019-11-01 23:00:00', '232', 32, 2, 2, 2, 2, NULL, 'L-Turb', 1, '2019-11-25 14:59:35', '2019-11-25 14:59:38'),
(40, 2, '2019-11-01 23:00:00', '232', NULL, NULL, 2, 2, NULL, NULL, NULL, 1, '2019-11-25 14:59:37', '2019-11-25 14:59:37'),
(41, 1, '2019-11-01 23:00:00', 'test', 3, 3, 33, 3, 3, 333, NULL, 1, '2019-11-25 15:00:02', '2019-11-25 15:00:03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ppcw_engines`
--

CREATE TABLE `tbl_ppcw_engines` (
  `ppcwe_id` int(11) NOT NULL,
  `ppcwe_datetime` datetime NOT NULL,
  `ppcwe_sampler` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ppcwe_created_on` datetime NOT NULL,
  `ppcwe_created_by` int(11) NOT NULL,
  `ppcwe_modified_on` datetime NOT NULL,
  `ppcwe_modified_by` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ppcw_engines`
--

INSERT INTO `tbl_ppcw_engines` (`ppcwe_id`, `ppcwe_datetime`, `ppcwe_sampler`, `ppcwe_created_on`, `ppcwe_created_by`, `ppcwe_modified_on`, `ppcwe_modified_by`) VALUES
(1, '2019-11-27 23:00:00', 'tsrt', '2019-11-27 23:16:58', 1, '2019-11-27 23:16:58', 1),
(2, '2019-11-27 23:00:00', 'test', '2019-11-27 23:23:55', 1, '2019-11-27 23:23:55', 1),
(3, '2019-11-28 23:00:00', 'test', '2019-11-28 10:32:23', 1, '2019-11-28 10:32:23', 1),
(4, '2019-11-13 04:30:00', 'ttttf', '2019-11-28 18:54:50', 1, '2019-11-28 18:54:50', 1),
(5, '2019-11-29 23:00:00', 'test', '2019-11-29 22:44:47', 27, '2019-11-29 22:44:47', 27),
(6, '2019-11-28 04:00:00', 'test', '2019-11-29 22:45:14', 27, '2019-11-29 22:45:14', 27),
(7, '2019-11-21 02:00:00', 'test', '2019-11-29 22:45:41', 27, '2019-11-29 22:45:41', 27);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ppcw_engines_details`
--

CREATE TABLE `tbl_ppcw_engines_details` (
  `ppcwe_details_id` int(11) NOT NULL,
  `ppcwe_id_fk` int(4) DEFAULT NULL,
  `ppcwe_details_type` varchar(10) NOT NULL,
  `ppcwe_details_type_id` int(4) NOT NULL,
  `ppcwe_details_type_value` varchar(4) NOT NULL,
  `ppcwe_details_created_on` datetime NOT NULL,
  `ppcwe_details_created_by` int(11) NOT NULL,
  `ppcwe_details_modified_on` datetime NOT NULL,
  `ppcwe_details_modified_by` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ppcw_engines_details`
--

INSERT INTO `tbl_ppcw_engines_details` (`ppcwe_details_id`, `ppcwe_id_fk`, `ppcwe_details_type`, `ppcwe_details_type_id`, `ppcwe_details_type_value`, `ppcwe_details_created_on`, `ppcwe_details_created_by`, `ppcwe_details_modified_on`, `ppcwe_details_modified_by`) VALUES
(1, 1, 'engine', 1, '1', '2019-11-27 23:16:58', 0, '2019-11-27 23:16:58', 1),
(2, 2, 'engine', 1, '1', '2019-11-27 23:23:55', 0, '2019-11-27 23:23:55', 1),
(3, 2, 'engine', 2, '2', '2019-11-27 23:23:55', 0, '2019-11-27 23:23:55', 1),
(4, 2, 'engine', 3, '3', '2019-11-27 23:23:57', 0, '2019-11-27 23:23:57', 1),
(5, 2, 'engine', 4, '1', '2019-11-27 23:23:57', 0, '2019-11-27 23:29:02', 1),
(6, 3, 'engine', 1, '1', '2019-11-28 10:32:23', 0, '2019-11-28 10:32:23', 1),
(7, 3, 'engine', 2, '2', '2019-11-28 10:32:24', 0, '2019-11-28 10:32:24', 1),
(8, 3, 'engine', 3, '3', '2019-11-28 10:32:24', 0, '2019-11-28 10:32:24', 1),
(9, 3, 'engine', 5, '4', '2019-11-28 10:32:25', 0, '2019-11-28 10:32:25', 1),
(10, 3, 'engine', 4, '5', '2019-11-28 10:32:25', 0, '2019-11-28 10:32:25', 1),
(11, 3, 'engine', 9, '4', '2019-11-28 10:32:26', 0, '2019-11-28 10:32:26', 1),
(12, 3, 'engine', 13, '33', '2019-11-28 10:32:26', 0, '2019-11-28 10:32:26', 1),
(13, 3, 'engine', 23, '33', '2019-11-28 10:32:27', 0, '2019-11-28 10:32:27', 1),
(14, 3, 'engine', 22, '34', '2019-11-28 10:32:27', 0, '2019-11-28 10:32:27', 1),
(15, 3, 'engine', 20, '1', '2019-11-28 10:32:27', 0, '2019-11-28 10:32:40', 1),
(16, 3, 'engine', 19, '433', '2019-11-28 10:32:28', 0, '2019-11-28 10:32:28', 1),
(17, 3, 'engine', 17, '34', '2019-11-28 10:32:28', 0, '2019-11-28 10:32:28', 1),
(18, 3, 'engine', 16, '344', '2019-11-28 10:32:28', 0, '2019-11-28 10:32:28', 1),
(19, 3, 'engine', 15, '4', '2019-11-28 10:32:28', 0, '2019-11-28 10:32:28', 1),
(20, 3, 'engine', 14, '43', '2019-11-28 10:32:30', 0, '2019-11-28 10:32:30', 1),
(21, 3, 'building', 4, '6', '2019-11-28 11:38:31', 0, '2019-11-28 11:38:31', 1),
(22, 3, 'building', 1, '5', '2019-11-28 11:40:13', 0, '2019-11-28 11:40:13', 1),
(23, 3, 'building', 2, '5', '2019-11-28 11:40:15', 0, '2019-11-28 11:40:20', 1),
(24, 3, 'building', 3, '7', '2019-11-28 11:40:18', 0, '2019-11-28 11:40:18', 1),
(25, 4, 'engine', 1, '7', '2019-11-28 18:54:50', 0, '2019-11-28 18:54:50', 1),
(26, 4, 'engine', 2, '6', '2019-11-28 18:54:50', 0, '2019-11-28 18:54:50', 1),
(27, 4, 'engine', 3, '5', '2019-11-28 18:54:50', 0, '2019-11-28 18:54:50', 1),
(28, 4, 'engine', 4, '67', '2019-11-28 18:54:50', 0, '2019-11-28 18:54:50', 1),
(29, 4, 'engine', 5, '5', '2019-11-28 18:54:51', 0, '2019-11-28 18:54:51', 1),
(30, 4, 'engine', 6, '7', '2019-11-28 18:54:53', 0, '2019-11-28 18:54:53', 1),
(31, 4, 'engine', 8, '2', '2019-11-28 18:55:19', 0, '2019-11-28 18:55:19', 1),
(32, 4, 'engine', 10, '2', '2019-11-28 18:55:20', 0, '2019-11-28 18:55:20', 1),
(33, 4, 'engine', 9, '2', '2019-11-28 18:55:20', 0, '2019-11-28 18:55:20', 1),
(34, 4, 'engine', 12, '2', '2019-11-28 18:55:21', 0, '2019-11-28 18:55:21', 1),
(35, 4, 'engine', 14, '2', '2019-11-28 18:55:21', 0, '2019-11-28 18:55:21', 1),
(36, 4, 'engine', 15, '2', '2019-11-28 18:55:21', 0, '2019-11-28 18:55:21', 1),
(37, 4, 'building', 2, '3', '2019-11-28 18:55:24', 0, '2019-11-28 18:55:24', 1),
(38, 4, 'building', 1, '2', '2019-11-28 18:55:25', 0, '2019-11-28 18:55:25', 1),
(39, 4, 'building', 3, '2', '2019-11-28 18:55:26', 0, '2019-11-28 18:55:26', 1),
(40, 5, 'engine', 1, '1460', '2019-11-29 22:44:47', 0, '2019-11-29 22:44:47', 27),
(41, 5, 'engine', 2, '1200', '2019-11-29 22:44:49', 0, '2019-11-29 22:44:49', 27),
(42, 5, 'engine', 3, '1245', '2019-11-29 22:44:52', 0, '2019-11-29 22:44:52', 27),
(43, 5, 'engine', 4, '1267', '2019-11-29 22:44:55', 0, '2019-11-29 22:44:55', 27),
(44, 5, 'engine', 5, '1123', '2019-11-29 22:44:57', 0, '2019-11-29 22:44:57', 27),
(45, 5, 'engine', 6, '1256', '2019-11-29 22:44:59', 0, '2019-11-29 22:44:59', 27),
(46, 5, 'engine', 7, '1199', '2019-11-29 22:45:01', 0, '2019-11-29 22:45:01', 27),
(47, 5, 'engine', 8, '1000', '2019-11-29 22:45:03', 0, '2019-11-29 22:45:03', 27),
(48, 6, 'engine', 1, '1255', '2019-11-29 22:45:14', 0, '2019-11-29 22:45:14', 27),
(49, 6, 'engine', 2, '1234', '2019-11-29 22:45:16', 0, '2019-11-29 22:45:16', 27),
(50, 6, 'engine', 3, '1300', '2019-11-29 22:45:20', 0, '2019-11-29 22:45:20', 27),
(51, 6, 'engine', 4, '1123', '2019-11-29 22:45:21', 0, '2019-11-29 22:45:21', 27),
(52, 6, 'engine', 5, '1099', '2019-11-29 22:45:24', 0, '2019-11-29 22:45:24', 27),
(53, 6, 'engine', 6, '1123', '2019-11-29 22:45:26', 0, '2019-11-29 22:45:26', 27),
(54, 6, 'engine', 7, '1234', '2019-11-29 22:45:28', 0, '2019-11-29 22:45:28', 27),
(55, 6, 'engine', 8, '1234', '2019-11-29 22:45:30', 0, '2019-11-29 22:45:30', 27),
(56, 7, 'engine', 1, '1233', '2019-11-29 22:45:41', 0, '2019-11-29 22:45:41', 27),
(57, 7, 'engine', 2, '1600', '2019-11-29 22:45:47', 0, '2019-11-29 22:45:47', 27),
(58, 7, 'engine', 3, '1456', '2019-11-29 22:45:49', 0, '2019-11-29 22:45:49', 27),
(59, 7, 'engine', 4, '1234', '2019-11-29 22:45:51', 0, '2019-11-29 22:45:51', 27),
(60, 7, 'engine', 5, '1543', '2019-11-29 22:45:55', 0, '2019-11-29 22:45:55', 27),
(61, 7, 'engine', 6, '1432', '2019-11-29 22:45:57', 0, '2019-11-29 22:45:57', 27),
(62, 7, 'engine', 7, '1235', '2019-11-29 22:46:00', 0, '2019-11-29 22:46:00', 27),
(63, 7, 'engine', 8, '1600', '2019-11-29 22:46:03', 0, '2019-11-29 22:46:03', 27);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reset_password`
--

CREATE TABLE `tbl_reset_password` (
  `id` bigint(20) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activation_id` varchar(32) NOT NULL,
  `agent` varchar(512) NOT NULL,
  `client_ip` varchar(32) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` bigint(20) NOT NULL DEFAULT '1',
  `createdDtm` datetime NOT NULL,
  `updatedBy` bigint(20) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `roleId` tinyint(4) NOT NULL COMMENT 'role id',
  `role` varchar(50) NOT NULL COMMENT 'role text'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_roles`
--

INSERT INTO `tbl_roles` (`roleId`, `role`) VALUES
(1, 'System Administrator'),
(2, 'Manager'),
(3, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_street`
--

CREATE TABLE `tbl_street` (
  `str_id` int(11) NOT NULL,
  `fk_area_id` int(11) NOT NULL,
  `str_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `street_no` varchar(15) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_street`
--

INSERT INTO `tbl_street` (`str_id`, `fk_area_id`, `str_name`, `street_no`) VALUES
(1, 13, 'A.J. Richardson Drive', '122'),
(2, 5, 'A.J.C. Brouwer Road', ''),
(3, 3, 'A.J.C. Brouwer Road', ''),
(4, 17, 'A.T. Illidge Road', ''),
(5, 16, 'A.T. Illidge Road', ''),
(6, 11, 'A.T. Illidge Road', ''),
(7, 14, 'A.T. Illidge Road', ''),
(8, 7, 'A.T. Illidge Road', ''),
(9, 3, 'Aaron Jacbo\'s Drive', ''),
(11, 18, 'Arbutus Road', ''),
(20, 8, 'Lionel Alexander Richardson Road', ''),
(22, 7, 'Algiers Drive', ''),
(25, 2, 'Almond Grove Road', ''),
(26, 18, 'Amarantus Road', ''),
(28, 28, 'Amaryllis Road', ''),
(30, 38, 'Amazone Road', ''),
(34, 51, 'Amsterdam Road', ''),
(36, 17, 'Andros Island Drive', ''),
(38, 4, 'Anise Drive', ''),
(39, 45, 'Anna Hoop Estate Road', ''),
(43, 4, 'Antilope Drive', ''),
(45, 17, 'Apotheek Steeg', ''),
(46, 21, 'Apricot Road', ''),
(47, 33, 'Aquamarine Drive', ''),
(50, 11, 'Arch Road', ''),
(51, 5, 'Archimedes Street', ''),
(52, 9, 'Ark Shell Road', ''),
(53, 3, 'Arlet Peters Rd.', ''),
(54, 17, 'Armenhuis Steeg', ''),
(57, 13, 'S.E. Arrindell Dr.', ''),
(58, 19, 'Arrow Root Road', ''),
(67, 0, 'B. Richardson Rd.', ''),
(69, 17, 'Back street', ''),
(70, 0, 'Bahamas Drive', ''),
(71, 0, 'Bahamia drive', ''),
(72, 0, 'Bahoe Drive', ''),
(73, 0, 'Ball Cactus Drive', ''),
(74, 0, 'Balsam Drive', ''),
(75, 0, 'Banana Road', ''),
(76, 0, 'Banjo Drive', ''),
(77, 0, 'Baracuda road', ''),
(78, 0, 'Barbados Drive', ''),
(79, 0, 'Barbanson Road', ''),
(80, 0, 'Barbuda Drive', ''),
(81, 0, 'Barrel Drive', ''),
(82, 0, 'Barringtonia Tree Drive', ''),
(83, 0, 'Barry Jacobus Road', ''),
(84, 0, 'Basket Clam Rd.', ''),
(85, 13, 'Basseterre Road', ''),
(86, 0, 'Bay Leaf Tree Drive', ''),
(87, 48, 'Bay Scallop Road', ''),
(88, 0, 'beach front villa', ''),
(89, 41, 'Beachcomber Dr.', ''),
(90, 41, 'Beacon Hill Road', ''),
(91, 46, 'Bean Clam Rd.', ''),
(92, 0, 'Bearded Fig Tree Drive', ''),
(93, 0, 'Bearded Fig Tree Road', ''),
(94, 0, 'Beaujon H. St.', ''),
(96, 0, 'Beet Road', ''),
(97, 4, 'Beethoven L. Van Road', ''),
(99, 28, 'Begonia Drive', ''),
(100, 17, 'Begroeide Steeg', ''),
(101, 0, 'behemia Dr', ''),
(102, 0, 'Bell Cactus Drive', ''),
(103, 0, 'Belle Tree Drive', ''),
(104, 0, 'Belverdere Dr.', ''),
(105, 45, 'Belverdere Est. Rd.', ''),
(106, 0, 'Ben T. Est. Dr.', ''),
(107, 50, 'Benny Goodman Drive', ''),
(108, 0, 'Bequia Drive', ''),
(109, 0, 'Bergamot Road', ''),
(110, 7, 'Berlin Drive', ''),
(111, 0, 'Bermuda Drive', ''),
(112, 7, 'Bern Drive', ''),
(113, 8, 'Beryl Richardson Road', ''),
(114, 35, 'Betty\'s Estate Road', ''),
(116, 5, 'Bill-Bill Drive', ''),
(117, 43, 'Billy Folly Road', ''),
(118, 13, 'Bimini Rd.', ''),
(119, 0, 'Birch Tree Drive', ''),
(120, 7, 'Bishop Hill Road', ''),
(121, 0, 'Bison Drive', ''),
(122, 0, 'Blackberry Rd.', ''),
(123, 0, 'Blanket Herb Drive', ''),
(124, 0, 'Blanquilla Drive', ''),
(125, 0, 'Bleeding Heart Road', ''),
(126, 0, 'Blidjen Drive', ''),
(127, 0, 'Blolly Tree Road', ''),
(128, 28, 'Bluebell Drive', ''),
(129, 0, 'blue jay dr', ''),
(130, 0, 'Blueberry Road', ''),
(132, 29, 'Blyden\'s Drive', ''),
(134, 0, 'Bonaire Drive', ''),
(135, 0, 'Bottle Tree Drive', ''),
(136, 0, 'Bougainville Road', ''),
(137, 19, 'Boulanger Road', ''),
(138, 45, 'Bow Estate Rd.', ''),
(139, 51, 'Brasillia Road', ''),
(140, 14, 'Bridgetown Drive', ''),
(141, 0, 'Brill\'s Drive', ''),
(142, 0, 'Brimstone Hill Road', ''),
(143, 0, 'Brine Drive', ''),
(144, 0, 'Brownea Tree Drive', ''),
(145, 13, 'Brown Drive', ''),
(146, 14, 'Bryson\'s Drive', ''),
(147, 45, 'Buck Hole Estate road', ''),
(148, 0, 'Buncamper Road', ''),
(149, 0, 'Bunny Ears Cactus Drive', ''),
(150, 0, 'Burlap Drive', ''),
(151, 0, 'Bush Road', ''),
(152, 18, 'Buttercup Road', ''),
(153, 0, 'by 1234 &more', ''),
(154, 0, 'c. island cotton drive', ''),
(155, 17, 'C.A. Cannegieter Street', ''),
(156, 9, 'Canoe Shell Road', ''),
(157, 5, 'Cabbage Palm Drive', ''),
(158, 19, 'Cabbage Road', ''),
(159, 7, 'Caines\' Drive', ''),
(160, 0, 'Calabash Drive', ''),
(161, 0, 'Calabash Road', ''),
(162, 36, 'Camel Road', ''),
(163, 35, 'Carmelia Road', ''),
(164, 0, 'Candelabra Cactus Drive', ''),
(165, 0, 'Candle Tree Road', ''),
(166, 0, 'Canilian drive', ''),
(167, 0, 'Cankerberry Road', ''),
(168, 0, 'Cannigieter Drive', ''),
(169, 0, 'Cannonball Tree Drive', ''),
(170, 0, 'Cantalope Road', ''),
(171, 7, 'Caracus Drive', ''),
(172, 45, 'Careta Est. Rd.', ''),
(173, 0, 'Cariacou Drive', ''),
(174, 0, 'Caribou Dr', ''),
(175, 4, 'Caribou Drive', ''),
(176, 18, 'Carnation Road', ''),
(177, 19, 'Carrot Road', ''),
(178, 9, 'Carved Star Shell Road', ''),
(179, 0, 'Cashew Tree Road', ''),
(180, 0, 'Cassava Drive', ''),
(181, 0, 'Cassava Road', ''),
(182, 13, 'Castries Drive', ''),
(183, 0, 'Catapult Drive', ''),
(184, 3, 'Cay Bay Road', ''),
(185, 51, 'Cayenne Road', ''),
(186, 0, 'Cedar Grove Drive', ''),
(187, 0, 'Cedar Ln.', ''),
(188, 0, 'Celsius Street', ''),
(189, 13, 'Cerus Cactus Dr.', ''),
(190, 51, 'CH. Maccow Road', ''),
(191, 0, 'CH.E.W Voges Steeg', ''),
(193, 0, 'Charity Drive', ''),
(194, 0, 'Charlestown Rd.', ''),
(195, 0, 'cherry hill drive', ''),
(196, 0, 'Cherry Pond Estate', ''),
(198, 9, 'Chesnut Turban Shell Road', ''),
(199, 0, 'Chin Cactus Road', ''),
(200, 0, 'Chin Cherry Road', ''),
(201, 0, 'Christiansted Drive', ''),
(202, 0, 'Christmas Cactus Drive', ''),
(203, 0, 'christopher moccow street', ''),
(204, 23, 'Cinnamon Cactus Road', ''),
(205, 0, 'Cinnamon Drive', ''),
(206, 0, 'Cinnamon Grove', ''),
(207, 0, 'Citrine Drive', ''),
(208, 0, 'Citrine Road', ''),
(209, 0, 'clam shell drive', ''),
(210, 0, 'Clammy Cherry Drive', ''),
(211, 0, 'Clammy Cherry Road', ''),
(212, 3, 'Clarinet Drive', ''),
(213, 0, 'Clark\'s Drive', ''),
(214, 0, 'Claw Cactus Road', ''),
(215, 0, 'Clem Labega Square', ''),
(216, 0, 'Clement de Weever Drive', ''),
(217, 0, 'Clemmie\'s Drive', ''),
(218, 0, 'Clove Drive', ''),
(219, 0, 'co', ''),
(220, 0, 'Coal Pot Drive', ''),
(221, 0, 'Cob Cactus Drive', ''),
(222, 0, 'Cockspur Tree Drive', ''),
(223, 0, 'Coco Plum Road', ''),
(224, 0, 'Coconut Palm Dr', ''),
(225, 0, 'Coconut Plum Drive', ''),
(226, 0, 'Codvill Webster', ''),
(227, 0, 'Column Cactus Drive', ''),
(228, 0, 'copenhagen drive', ''),
(229, 0, 'Coral Road', ''),
(230, 30, 'Coralita Road', ''),
(231, 0, 'Cordia Drive', ''),
(232, 0, 'Coretta Estate', ''),
(233, 0, 'Corilita Road', ''),
(234, 0, 'Cork Tree Drive', ''),
(235, 17, 'Cornelius M. Vlaun Straat', ''),
(236, 0, 'Corner Road', ''),
(237, 0, 'Cosha Tree Drive', ''),
(238, 0, 'Cote D\'Azur', ''),
(239, 0, 'Cougar Dr', ''),
(240, 4, 'Cougar Road', ''),
(241, 13, 'Crafted Cactus Dr.', ''),
(242, 0, 'Crawn Cactus Dr.', ''),
(243, 0, 'Crawn Cactus Rd.', ''),
(245, 29, 'Crocus Road', ''),
(246, 34, 'Crown Cactus Road', ''),
(247, 0, 'Cuba Drive', ''),
(248, 19, 'Cucumber Road', ''),
(249, 0, 'Culebar Drive', ''),
(250, 0, 'Cupecoy', ''),
(251, 0, 'Cupper Drive', ''),
(252, 0, 'Curacao Drive', ''),
(253, 0, 'cusha Tree Dr.', ''),
(254, 0, 'Cyrus W. Wathey Square', ''),
(255, 17, 'D.A. Peterson Street', ''),
(256, 17, 'D.C. Steeg', ''),
(257, 7, 'Dacca Road', ''),
(258, 0, 'Dafede road', ''),
(259, 0, 'Daffodil Drive', ''),
(260, 0, 'Dahlia Road', ''),
(261, 29, 'Daisy Road', ''),
(262, 17, 'Dam Steeg', ''),
(263, 0, 'Dancing Lady Road', ''),
(264, 0, 'Daniel\'s Dr.', ''),
(265, 0, 'Danube Dr.', ''),
(266, 0, 'Date Musle Road', ''),
(267, 13, 'Davis Drive', ''),
(268, 0, 'Dawn beach Estate', ''),
(269, 0, 'de weever road', ''),
(270, 0, 'Debrot N. St.', ''),
(271, 0, 'Defiance Road', ''),
(272, 45, 'Delight Estate Road', ''),
(273, 0, 'Demi-John Drive', ''),
(274, 0, 'Diamond Dr.', ''),
(275, 0, 'Diamond Estate Road', ''),
(276, 0, 'Diamond Rd.', ''),
(277, 8, 'Diedrick Mathew Road', ''),
(278, 0, 'Divi-Divi Rd.', ''),
(279, 0, 'Divi-Divi Tree Drive', ''),
(280, 0, 'Dollison\'s Drive', ''),
(281, 0, 'Dolphin road', ''),
(282, 0, 'Dombey Tree Dr.', ''),
(283, 0, 'Dominica Dr.', ''),
(284, 16, 'Dominica Road', ''),
(285, 0, 'Doodle Doo Cactus Drive', ''),
(286, 0, 'Dorothy Lisa Wathey Road', ''),
(287, 0, 'Dr. C.A Levendag Street', ''),
(288, 0, 'Dr. C.A Shaw Street', ''),
(289, 0, 'Dr. Da La Fuenta Street', ''),
(290, 0, 'Dr. H.C. Tjon-Sie-Fat-Street', ''),
(291, 0, 'Dr. J.H. De La Fuente Street', ''),
(292, 0, 'Dr. L.A.G.O Lashley Road', ''),
(293, 0, 'Dr. Lago Lashley Street', ''),
(294, 0, 'Dr. Margareth Bruce\'s Drive', ''),
(295, 17, 'Drukker Steeg', ''),
(296, 0, 'Duck Drive', ''),
(297, 0, 'Duke Dr.', ''),
(298, 0, 'Durat Road', ''),
(299, 0, 'dutch quarter main road', ''),
(300, 17, 'E. Camille Richardson Street', ''),
(301, 31, 'Eagle Road', ''),
(302, 0, 'Easter Cactus Drive', ''),
(303, 0, 'Ebenezer  Estate', ''),
(304, 8, 'Ebenezer Road', ''),
(305, 0, 'EGRET ROAD', ''),
(306, 0, 'Elder Drive', ''),
(307, 13, 'Ellis Rd.', ''),
(308, 0, 'Eluthra Dr.', ''),
(309, 0, 'Emancipation Drive', ''),
(310, 48, 'Emerald Merit Road', ''),
(311, 17, 'Emma Plein', ''),
(312, 0, 'Evergreen Tree Road', ''),
(314, 9, 'Experiment Estate Drive', ''),
(315, 0, 'F. Chopin Road', ''),
(316, 0, 'Fahrenheit Drive', ''),
(317, 0, 'Fahrenheit Road', ''),
(318, 31, 'Falcon Road', ''),
(319, 41, 'Fan Coral Road', ''),
(320, 51, 'Felix Marlin Road', ''),
(321, 0, 'Fero Cactus Drive', ''),
(322, 9, 'Fig Shell Drive', ''),
(323, 0, 'Fisherman Rod Drive', ''),
(324, 0, 'fisherman warf', ''),
(325, 18, 'Flamboyant Road', ''),
(326, 0, 'Flute Dr.', ''),
(327, 45, 'Foga Estate Rd.', ''),
(328, 0, 'Fort Belair Road', ''),
(329, 0, 'Fort Hill', ''),
(330, 0, 'Fort Hill Drive', ''),
(331, 0, 'Fort Hill Road', ''),
(332, 0, 'Fort Oranje Drive', ''),
(333, 37, 'Fort Willem Drive', ''),
(334, 37, 'Fort Willem Road', ''),
(335, 0, 'Fr. Alfie Heilleger Drive', ''),
(336, 0, 'Frangipani Drive', ''),
(337, 0, 'Frans Hals Straat', ''),
(338, 0, 'FREDRICK O. HUGES', ''),
(339, 0, 'FREDRICK O. HUGES OLIVE', ''),
(340, 45, 'Freeland Estate Rd.', ''),
(341, 13, 'Freeport Drive', ''),
(342, 0, 'Friendly Island Boulevard', ''),
(343, 0, 'Fringe Drive', ''),
(344, 0, 'Frits Drive', ''),
(345, 17, 'Front Street', ''),
(346, 0, 'Fussy Drive', ''),
(347, 0, 'G. Alexis Arnell Boulevard', ''),
(348, 0, 'G. Verdi Road', ''),
(349, 7, 'Garden of Eden Drive', ''),
(350, 0, 'Gardenia Drive', ''),
(351, 35, 'Gardenia Road', ''),
(352, 0, 'Garnet Drive', ''),
(353, 0, 'Gaston Haddocks Drive', ''),
(354, 0, 'Gaudeloupe Road', ''),
(355, 0, 'Gauna Bay Road', ''),
(356, 0, 'Gauvaberry Road', ''),
(357, 0, 'Gayenne road', ''),
(358, 4, 'Gazelle Drive', ''),
(359, 0, 'Genip Road', ''),
(360, 51, 'George Clement de Weever Road', ''),
(361, 14, 'Georgetown Drive', ''),
(362, 0, 'Georgetown Road', ''),
(363, 0, 'Geranium Road', ''),
(364, 17, 'Gevangenis Straat', ''),
(365, 0, 'Gibb\'s J. Road', ''),
(366, 0, 'Ginger Road', ''),
(367, 0, 'Giraffe Drive', ''),
(368, 28, 'Gladiola Drive', ''),
(369, 28, 'Gladiola Road', ''),
(370, 0, 'Goglet Drive', ''),
(372, 0, 'Gold Finger Road', ''),
(373, 0, 'Golden Apple Road', ''),
(374, 0, 'Golden Barrel Cactus Drive', ''),
(375, 45, 'Golden Grove Estate Road', ''),
(376, 0, 'Golden Rain Tree Drive', ''),
(377, 0, 'Golden Road', ''),
(379, 0, 'Goldfinch Road', ''),
(380, 0, 'Goose Berry Drive', ''),
(381, 0, 'Goose Drive', ''),
(382, 0, 'Grand Caicos drive', ''),
(383, 45, 'Grand Fond Road', ''),
(384, 0, 'Grapefruit Road', ''),
(385, 0, 'Great Bay Road', ''),
(386, 0, 'Great Blue Herron Drive', ''),
(388, 11, 'Grenada Road', ''),
(390, 45, 'Griesel Road', ''),
(391, 0, 'Groene Steeg', ''),
(392, 0, 'Groensteeg', ''),
(393, 0, 'Ground Dove Road', ''),
(394, 11, 'Guadeloupe Rd.', ''),
(395, 0, 'Guana Bay Estate', ''),
(397, 3, 'Guiro Road', ''),
(398, 0, 'Guitar Road', ''),
(399, 48, 'Gulf scallop Drive', ''),
(400, 0, 'Gulf scalop road', ''),
(401, 0, 'Gullin Road', ''),
(402, 0, 'Gum Tree Drive', ''),
(404, 13, 'Gumbs Drive', ''),
(405, 9, 'Guy\'s Estate Road', ''),
(406, 33, 'Halley\'s Drive', ''),
(408, 45, 'Happy Estate road', ''),
(409, 0, 'harbor view', ''),
(410, 0, 'Harbour view', ''),
(411, 0, 'Harmonica Drive', ''),
(412, 0, 'Hassel P. Rd.', ''),
(413, 0, 'Hedge Hog Cactus Rd.', ''),
(414, 0, 'Helsinki Drive', ''),
(415, 0, 'Helsinky drive', ''),
(416, 17, 'Hendrikstraat', ''),
(417, 0, 'Hybiscus Road', ''),
(418, 0, 'Hispaniola road', ''),
(419, 7, 'Hodge Lane', ''),
(420, 0, 'Honduras Road', ''),
(421, 0, 'hondurous road', ''),
(422, 0, 'Honey Dew Road', ''),
(423, 0, 'Honney dew road', ''),
(424, 0, 'Hope Cactus Drive', ''),
(425, 0, 'Hope Estate', ''),
(426, 0, 'Hope Estate Road', ''),
(427, 17, 'Hotel Steeg', ''),
(428, 6, 'Hulda B. Richardson Road', ''),
(429, 0, 'Hummingbird road', ''),
(431, 0, 'hyssop Dr', ''),
(432, 0, 'Hyssop Road', ''),
(433, 14, 'Illidge Drive', ''),
(435, 0, 'Illis Drive', ''),
(436, 0, 'Illuthera Drive', ''),
(438, 4, 'Impalla Road', ''),
(439, 0, 'Imperial Shell Dr', ''),
(440, 0, 'Inagua Isl. Dr.', ''),
(441, 0, 'Independence Drive', ''),
(442, 0, 'Industrial Center', ''),
(443, 40, 'Industrie Dr.', ''),
(445, 0, 'Isis Road', ''),
(446, 9, 'Ivory Shell Road', ''),
(447, 0, 'J. Adelaide Richardson\'s Drive', ''),
(448, 51, 'J. D. Meiners Road', ''),
(449, 0, 'J. de la Fuente Street', ''),
(450, 0, 'J. Elias Richardson Street', ''),
(451, 17, 'J.A. Walter Nisbeth Road', ''),
(453, 43, 'Jade road', ''),
(454, 4, 'Jaguar Road', ''),
(455, 0, 'James \"Tucker\" Samuel Dr.', ''),
(456, 11, 'Jan Steen Straat', ''),
(457, 0, 'Jasmin Road', ''),
(458, 0, 'jim tucker dr', ''),
(459, 11, 'Johan Vermeer Straat', ''),
(460, 8, 'Johannes C. Paap Road', ''),
(461, 0, 'John Larmonie Road', ''),
(462, 51, 'John Philips Road', ''),
(463, 0, 'John Slinge Drive', ''),
(464, 0, 'John Solomons Gibbs Road', ''),
(465, 39, 'Jordan Drive', ''),
(466, 39, 'Jordan Road', ''),
(467, 8, 'Jose Lake Sr. Road', ''),
(468, 0, 'Josephine Edwards Square', ''),
(469, 0, 'Juancho Yrasquin Boulevard', ''),
(470, 23, 'Jumping Cholla Cactus Road', ''),
(471, 0, 'kalabash Road', ''),
(472, 17, 'Kanaal Steeg', ''),
(473, 36, 'Kangaroo Road', ''),
(474, 17, 'Kerkhofstraat', ''),
(475, 17, 'Kerk Steeg', ''),
(476, 0, 'keys lane', ''),
(477, 0, 'Killebran Drive', ''),
(478, 47, 'King Helmet Road', ''),
(479, 0, 'King of the Sea Dr.', ''),
(480, 0, 'King of the Sea Road', ''),
(481, 0, 'Kingston Drive', ''),
(482, 0, 'Kinshasha Road', ''),
(483, 0, 'Kiwi Drive', ''),
(484, 17, 'Korte Steeg', ''),
(485, 0, 'Krekhoff Straat', ''),
(486, 17, 'Kruythof Steeg', ''),
(487, 4, 'Kudu drive', ''),
(488, 0, 'L.B Scot Road', ''),
(489, 0, 'L.B.Scot Road', ''),
(490, 7, 'Lambert\'s Drive', ''),
(491, 0, 'lamper Road', ''),
(492, 0, 'Laughing bird road', ''),
(493, 29, 'Lavender Drive', ''),
(494, 0, 'Leaf Cactus Drive', ''),
(495, 0, 'Lemon Grass Dr', ''),
(496, 0, 'Lemon Road', ''),
(497, 0, 'Leopard Rd', ''),
(498, 4, 'Leopard Road', ''),
(499, 19, 'Lettuce Drive', ''),
(500, 0, 'Lilly Road', ''),
(501, 0, 'Lily Road', ''),
(502, 7, 'Lima Drive', ''),
(503, 0, 'Lime Road', ''),
(504, 48, 'Limpet Road', ''),
(507, 8, 'Conner Road', ''),
(508, 0, 'LITTLE BAY', ''),
(509, 10, 'Little Bay Road', ''),
(510, 0, 'Llama Drive', ''),
(511, 0, 'Lobelia Drive', ''),
(512, 0, 'Locas Tree Drive', ''),
(513, 0, 'Locus Tree Drive', ''),
(514, 17, 'Longwall Road', ''),
(515, 0, 'Loodgietersteeg', ''),
(516, 17, 'Loods Steeg', ''),
(517, 45, 'Lottery rd.', ''),
(518, 8, 'Louis Hazel Road', ''),
(519, 45, 'Low Estate Road', ''),
(521, 0, 'Lusaka Road', ''),
(522, 0, 'Madame\'s estate', ''),
(523, 0, 'Madame\'s Estate Drive', ''),
(524, 11, 'Madame\'s Estate Road', ''),
(525, 0, 'Madeline\'s Road', ''),
(526, 0, 'Madrid Drive Lane 1', ''),
(527, 0, 'Madrid Drive Lane 2', ''),
(528, 0, 'Madrid Road', ''),
(529, 0, 'Magnolia Drive', ''),
(530, 0, 'Mahoe Tree Drive', ''),
(531, 0, 'main road', ''),
(532, 0, 'Mami Tree Drive', ''),
(533, 0, 'Man Jack Drive', ''),
(534, 0, 'Manbey Drive', ''),
(535, 0, 'Manchineel Tree Road', ''),
(536, 0, 'Manella Drive', ''),
(537, 0, 'Manilla Drive', ''),
(538, 0, 'Maracas Drive', ''),
(539, 0, 'Marconi Road', ''),
(540, 0, 'Marianne\'s Estate Drive', ''),
(541, 0, 'Marie Galante Drive', ''),
(542, 0, 'Marigot Hill Road', ''),
(543, 0, 'Marigot Hill Road Lane  3', ''),
(544, 0, 'Marigot Hill Road Lane 1', ''),
(545, 0, 'Marigot Hill Road Lane 2', ''),
(546, 0, 'Marimba Road', ''),
(547, 0, 'Marius de Pree Road', ''),
(548, 0, 'Marshmallow Drive', ''),
(549, 0, 'Martinique Road', ''),
(550, 0, 'Mary\'s Fancy', ''),
(551, 0, 'Masked Booby Road', ''),
(552, 28, 'Match-Me Drive', ''),
(553, 0, 'Matthew\'s Lane', ''),
(555, 14, 'Mayaguana Drive', ''),
(556, 0, 'Maypole Drive', ''),
(557, 0, 'Meadowlands Drive', ''),
(558, 6, 'Melford Hazel Road', ''),
(559, 0, 'Merlin Road', ''),
(560, 9, 'Merite Shell Road', ''),
(561, 0, 'Messapple Drive', ''),
(562, 0, 'Messapple Road', ''),
(563, 13, 'Middle Region Road', ''),
(564, 8, 'Mildrum Road', ''),
(565, 8, 'Milton Peters Road', ''),
(566, 7, 'Milton\'s Drive', ''),
(567, 0, 'Miracle Drive', ''),
(568, 38, 'Mississippi Drive', ''),
(569, 0, 'Mnt. Repose', ''),
(570, 0, 'Mnt. Repose Drive Lane 1', ''),
(571, 0, 'Mockingbird Road', ''),
(572, 0, 'Mohagany Tree Drive', ''),
(573, 51, 'Monrovia Road', ''),
(574, 0, 'Monte Vista Road', ''),
(575, 51, 'Montevideo Road', ''),
(577, 0, 'monti vista', ''),
(578, 0, 'Morning Glory Drive', ''),
(579, 0, 'Morning Glory Road', ''),
(580, 0, 'Mortar Drive', ''),
(581, 0, 'Mount Pele Road', ''),
(582, 0, 'Mount Scenery Road', ''),
(583, 0, 'Mount Souffriere Road', ''),
(584, 0, 'Mount Wiiliam Garden Lane 2', ''),
(585, 14, 'Mount William Drive', ''),
(586, 0, 'Mount William Garden', ''),
(587, 0, 'Mount William Garden Lane 1', ''),
(588, 0, 'Mount william Hill', ''),
(589, 0, 'Mountain Ebony Rd', ''),
(590, 0, 'Mountaindove Road', ''),
(591, 4, 'Mozart Road', ''),
(592, 0, 'Muggy\'s Drive', ''),
(593, 0, 'mullet bay', ''),
(594, 0, 'Mustard Drive', ''),
(595, 13, 'Mustique Isl. Rd', ''),
(596, 17, 'N. Debrot Street', ''),
(597, 0, 'Nacked boy drive', ''),
(598, 0, 'Nairobi Drive', ''),
(599, 0, 'Naked Boy Hill Drive', ''),
(600, 0, 'Narrow Drive', ''),
(601, 0, 'Nazareth Drive', ''),
(602, 51, 'Nazareth Road', ''),
(603, 0, 'Netle Dr.', ''),
(604, 0, 'Nettle Drive', ''),
(605, 14, 'Nevis Drive', ''),
(606, 7, 'Nick Spring Drive', ''),
(607, 0, 'Niger Road', ''),
(608, 0, 'Niger Road/Sardine road', ''),
(609, 38, 'Nile Drive', ''),
(610, 38, 'Nile Road', ''),
(611, 0, 'Niple Cactus Drive', ''),
(612, 0, 'Niple Cactus Road', ''),
(613, 0, 'Nisbethsteeg', ''),
(614, 0, 'Nutmeg Drive', ''),
(616, 17, 'O\' Nasha Jones Straat', ''),
(617, 0, 'Oak Tree Drive', ''),
(618, 0, 'Ocean View Terrace', ''),
(619, 0, 'Octavia Richardson road', ''),
(620, 0, 'Okra Drive', ''),
(621, 0, 'Okra Road', ''),
(622, 13, 'Old Man Cactus Drive', ''),
(623, 13, 'Old Man Cactus Rd.', ''),
(624, 0, 'Old Road Simpsonbay', ''),
(625, 0, 'Old road to dawn beach', ''),
(626, 0, 'Oleander Road', ''),
(627, 0, 'Olive Drive', ''),
(628, 7, 'One Hoe Lane', ''),
(629, 0, 'Onyx Road', ''),
(630, 43, 'Opal Road', ''),
(631, 0, 'Opunta Cactus Rd.', ''),
(632, 0, 'Orange Grove Rd', ''),
(633, 0, 'Orange Grove Road', ''),
(634, 0, 'Oranjestad Drive', ''),
(635, 0, 'Orchid Drive', ''),
(636, 35, 'Orchid Road', ''),
(637, 0, 'Oregano Drive', ''),
(638, 0, 'Organ Pipe Cactus Drive', ''),
(639, 0, 'Organ Pipe Cactus Road', ''),
(640, 0, 'Orinoco drive', ''),
(641, 0, 'Oryx Drive', ''),
(642, 7, 'Oslo Road', ''),
(643, 0, 'Osprey Dr.', ''),
(644, 0, 'Ostritch Drive', ''),
(645, 36, 'Otter Drive', ''),
(646, 36, 'Otter Road', ''),
(647, 0, 'Over the Bank', ''),
(648, 0, 'Over the Bank Lane 1', ''),
(649, 0, 'Over the Bank Lane 1, by caribbbean l.q.', ''),
(650, 0, 'Over the Bank Lane 2', ''),
(651, 0, 'Over the bank section', ''),
(652, 0, 'Over the Pond', ''),
(653, 0, 'Oxry Drive', ''),
(654, 0, 'Oyster Pond Bay Road', ''),
(655, 48, 'Oyster Pond Road', ''),
(656, 51, 'Panama Road', ''),
(658, 4, 'Panther Road', ''),
(659, 0, 'Pantophlet Drive', ''),
(660, 0, 'Pantophlet Street', ''),
(661, 0, 'Papaw Road', ''),
(662, 0, 'Paradise Hill Road', ''),
(663, 11, 'Paradise Island Road', ''),
(664, 7, 'Paramaribo Drive', ''),
(665, 7, 'Paris Drive', ''),
(666, 0, 'Parra-Grass Drive', ''),
(667, 0, 'Passion Flower Drive', ''),
(668, 35, 'Passion Flower Road', ''),
(669, 0, 'passion fruit road  retreat estate', ''),
(670, 0, 'passion fruit road 3, retreat estate', ''),
(671, 0, 'passion fruit road, retreat estate', ''),
(672, 0, 'Passionfruit Road', ''),
(673, 17, 'Pastorie Steeg', ''),
(674, 19, 'Peach Road', ''),
(675, 0, 'Peacock Rd', ''),
(676, 0, 'peacock road', ''),
(677, 13, 'Peanut Cactus Dr.', ''),
(678, 19, 'Pear Road', ''),
(679, 43, 'Pearl Drive', ''),
(680, 0, 'pegion Road', ''),
(681, 0, 'pelican cove', ''),
(682, 0, 'Pelican Road', ''),
(683, 9, 'Pen Shell Road', ''),
(684, 0, 'Pendant Cactus Road', ''),
(685, 0, 'Peppermint Drive', ''),
(686, 0, 'Peridot Road', ''),
(687, 0, 'Pero Cactus Drive', ''),
(688, 0, 'Perry Winkle Drive', ''),
(689, 0, 'Perrywinkle Drive', ''),
(690, 0, 'Pessle Drive', ''),
(691, 0, 'Peter John Road', ''),
(692, 33, 'Peterson\'s Drive', ''),
(693, 0, 'Petral drive', ''),
(694, 0, 'Petthel drive', ''),
(695, 0, 'Philips Drive', ''),
(696, 0, 'philips lane', ''),
(697, 0, 'Philipsburg', ''),
(698, 0, 'Pierre\'s Drive', ''),
(699, 8, 'Pieter Hassel Drive', ''),
(700, 0, 'Pigeon Pea Dr.', ''),
(701, 19, 'Pigeon Pea Rd.', ''),
(702, 0, 'Pigeon Rd.', ''),
(703, 0, 'Pin Cuschion Cactus Drive', ''),
(704, 0, 'pin shell road', ''),
(705, 0, 'Pineapple Road', ''),
(706, 0, 'Pinel Key Island Dr.', ''),
(707, 0, 'Pinel road', ''),
(708, 19, 'Plantain Road', ''),
(709, 0, 'Plough Drive', ''),
(710, 0, 'Plum Tree Drive', ''),
(711, 0, 'Plymouth Drive', ''),
(712, 0, 'Poinsetta Drive', ''),
(713, 35, 'Poinsetta Road', ''),
(714, 0, 'Point Petite', ''),
(715, 0, 'Point Piourette', ''),
(716, 0, 'Point Venesia', ''),
(717, 0, 'Pomgranate Drive', ''),
(718, 17, 'Pomp Steeg', ''),
(719, 0, 'Pomserette Road', ''),
(720, 0, 'Pond Island', ''),
(721, 0, 'Ponnum Drive', ''),
(722, 0, 'Pope Cactus', ''),
(723, 14, 'Port of Spain Drive', ''),
(724, 0, 'Port Road', ''),
(725, 0, 'Potato Road', ''),
(726, 0, 'Potatoe road', ''),
(727, 17, 'Praktizijn Steeg', ''),
(728, 0, 'Prickle Pear Road', ''),
(730, 45, 'Prospect Estate Road', ''),
(731, 4, 'Puma Road', ''),
(732, 0, 'Pumpkin Drive', ''),
(733, 0, 'Pumpkin Road', ''),
(734, 9, 'Queen Conch Road', ''),
(736, 18, 'Queen of Flowers Road', ''),
(737, 0, 'Queen Palm Drive', ''),
(738, 7, 'Quilletor Drive', ''),
(739, 0, 'Quito Road', ''),
(740, 8, 'R.S. Nicholson Road', ''),
(741, 0, 'Rabbit Hill Drive', ''),
(742, 0, 'rabbit hill road', ''),
(743, 19, 'Radish Road', ''),
(744, 0, 'Rancho drive', ''),
(745, 0, 'Raspberry Drive', ''),
(746, 0, 'Raspberry Road', ''),
(747, 0, 'Red Cedar Tree Drive', ''),
(748, 0, 'Red Rose Drive', ''),
(749, 0, 'Red Rose Road', ''),
(750, 11, 'Rembrand Plein', ''),
(751, 0, 'Rendeer Drive', ''),
(752, 0, 'Retreat Estate Road', ''),
(753, 0, 'Reward Drive', ''),
(754, 0, 'Reward Road', ''),
(755, 38, 'Rhine Drive', ''),
(756, 38, 'Rhine Road', ''),
(758, 50, 'Rice Hill Estate Road', ''),
(759, 0, 'Richards drive', ''),
(760, 0, 'Richard\'s Drive', ''),
(761, 7, 'Richardson Drive', ''),
(762, 0, 'Richmond Drive', ''),
(763, 0, 'Richrds drive', ''),
(764, 17, 'Rink Steeg', ''),
(765, 0, 'Rio de Janeiro Drive', ''),
(766, 33, 'Roberts\' Drive', ''),
(767, 0, 'Rock Salt Drive', ''),
(768, 0, 'Rock Salt Road', ''),
(769, 45, 'Rockland Est. Rd.', ''),
(770, 0, 'Romeo\'s Drive', ''),
(771, 0, 'Roseau Drive', ''),
(772, 30, 'Roses Road', ''),
(773, 0, 'Round Hill Garden', ''),
(774, 0, 'Royal Palm Drive', ''),
(775, 0, 'royal tern road', ''),
(776, 0, 'Royal turn road', ''),
(777, 0, 'Rubber Tree Drive', ''),
(778, 17, 'Ruben R. Panto Straat', ''),
(779, 43, 'Ruby Drive', ''),
(780, 0, 'S. Quamina Drive', ''),
(781, 14, 'Saba Drive', ''),
(782, 14, 'Saba Road', ''),
(784, 29, 'Sage Drive', ''),
(785, 0, 'San Juan Drive', ''),
(786, 0, 'Sand  piper road', ''),
(787, 0, 'sand coral road', ''),
(788, 0, 'Sand piper drive', ''),
(789, 0, 'Sandbox Tree Road', ''),
(790, 0, 'Sandpiper Drive', ''),
(791, 0, 'Saphire Drive', ''),
(792, 43, 'Sapphire Rd.', ''),
(793, 0, 'Sarsapilla Drive', ''),
(794, 0, 'Sarsapilla Road', ''),
(795, 0, 'Savana Drive', ''),
(796, 48, 'Scallop Shell  Road', ''),
(797, 0, 'scallop shell road', ''),
(798, 17, 'Scheepsbouw Steeg', ''),
(800, 17, 'Schoolsteeg', ''),
(801, 0, 'Schrijnwerkersteeg', ''),
(802, 0, 'Schuinsteeg', ''),
(803, 0, 'Sea Grape Tree Drive', ''),
(804, 0, 'Sea Island Cotton Drive', ''),
(805, 0, 'Sea Island Cotton Road', ''),
(806, 41, 'Sea Urchin Road', ''),
(807, 17, 'Secretaris Steeg', ''),
(808, 0, 'Sedums Cactus Drive', ''),
(809, 0, 'Sena Drive', ''),
(810, 0, 'Senna Drive', ''),
(811, 0, 'Sequoia Drive', ''),
(812, 0, 'shack shack Tree Drive', ''),
(813, 0, 'Sidney Drive', ''),
(814, 0, 'Silk Tree Drive', ''),
(815, 0, 'Silver Cactus Drive', ''),
(816, 0, 'Silver Torch Cactus Drive', ''),
(817, 33, 'Simpson Bay Road', ''),
(818, 17, 'Sint Jan Steeg', ''),
(819, 17, 'Sisal Steeg', ''),
(820, 0, 'sister agnes drive', ''),
(821, 0, 'Sister Basensia Road', ''),
(822, 0, 'Sister Clara Drive', ''),
(823, 0, 'Sister Jose Lake Road', ''),
(824, 33, 'Sister Modesta Road', ''),
(825, 0, 'Sister Pastientia Road', ''),
(826, 33, 'Sister Regina Road', ''),
(827, 17, 'Smalle Steeg', ''),
(828, 17, 'Smid Steeg', ''),
(829, 0, 'Smoked Tree Drive', ''),
(830, 0, 'Soa Paolo Road', ''),
(831, 0, 'Sombrero Drive', ''),
(832, 7, 'Sophia Dr.', ''),
(833, 0, 'Sorrel Drive', ''),
(834, 17, 'Soualiga Rd', ''),
(835, 0, 'Soualuiga Drive', ''),
(836, 0, 'Soualuiga Road', ''),
(837, 0, 'Soursap Road', ''),
(838, 0, 'South Reward', ''),
(839, 0, 'Spanish Fort Drive', ''),
(840, 0, 'spanish fort hill', ''),
(841, 10, 'Spanish Fort Road', ''),
(842, 29, 'Sparell Drive', ''),
(843, 0, 'Sparrow Drive', ''),
(844, 0, 'Sparrow Road', ''),
(845, 0, 'Speejens Arcade', ''),
(846, 0, 'Speelsteeg', ''),
(847, 0, 'Sphene Rd', ''),
(848, 0, 'Spinel Road', ''),
(849, 0, 'Spring Garden Drive', ''),
(850, 0, 'Squirrel Road', ''),
(851, 33, 'Sr Agnes Drive', ''),
(852, 33, 'Sr. Clara Dr', ''),
(853, 13, 'St. Barth\'s Drive', ''),
(854, 17, 'Hensy Beaujon  Steeg', ''),
(855, 0, 'St. Claire\'s Drive', ''),
(856, 0, 'St. Georges Road', ''),
(857, 23, 'St. James Estate Road', ''),
(858, 23, 'St. James Road', ''),
(859, 0, 'St. Jan Steeg', ''),
(860, 0, 'St. John\'s Drive', ''),
(861, 0, 'St. Johns Estate Road', ''),
(862, 0, 'St. Peters Drive', ''),
(863, 21, 'St. Peters Road', ''),
(864, 0, 'St. Rose Lane', ''),
(865, 41, 'Staghorn Coral Road', ''),
(866, 13, 'Statia Rd.', ''),
(867, 17, 'Stille Steeg', ''),
(868, 0, 'stiluallan Drive', ''),
(869, 0, 'Stilwalker Drive', ''),
(870, 7, 'Stockholm Dr.', ''),
(871, 0, 'stone oven drive', ''),
(872, 0, 'stone over drive', ''),
(873, 0, 'Strawberry Road', ''),
(874, 23, 'sucker Garden Dr.', ''),
(875, 0, 'Sucker garden keys lane', ''),
(876, 23, 'Sucker Garden Road', ''),
(877, 0, 'Sugar Hill Dr.', ''),
(878, 0, 'Sugar Mill', ''),
(879, 45, 'Sugar Mill Estate road', ''),
(880, 0, 'Sugarapple Road', ''),
(881, 0, 'Sugarhill Drive', ''),
(882, 0, 'Sun Cactus Drive', ''),
(883, 18, 'Sunflower Road', ''),
(884, 0, 'Sunset Cactus Road', ''),
(885, 0, 'SXM BAY ROAD', ''),
(886, 46, 'Tamarind Hill Road', ''),
(887, 0, 'Tamarind Tree Drive', ''),
(888, 17, 'Tamarinde Steeg', ''),
(889, 0, 'Tamaring Hill Estate', ''),
(890, 0, 'Tangerine Road', ''),
(891, 0, 'Tania road', ''),
(893, 29, 'Tansy Drive', ''),
(894, 30, 'Tassel Drive', ''),
(896, 30, 'Tassel Road', ''),
(897, 0, 'Teak Tree Drive', ''),
(898, 17, 'Terpentijn Steeg', ''),
(899, 38, 'Thames Road', ''),
(900, 0, 'Thanksgiving Cactus Drive', ''),
(901, 0, 'The Bottom Drive', ''),
(902, 43, 'The Corner Road', ''),
(903, 0, 'The Cottage Drive', ''),
(904, 0, 'The Keys Road', ''),
(905, 0, 'The keys Road Lane 1', ''),
(906, 0, 'The keys Road Lane 2', ''),
(907, 0, 'The keys Road Lane 3', ''),
(908, 0, 'The Quill Road', ''),
(909, 13, 'The Valley Drive', ''),
(910, 8, 'Thomas Aertsen Road', ''),
(911, 0, 'THOMAS H. KRUYTHOFF  DRIVE', ''),
(912, 0, 'Threadmill Drive', ''),
(914, 29, 'Thyme Drive', ''),
(915, 0, 'Ties Tree Drive', ''),
(917, 39, 'Tigris road', ''),
(918, 0, 'Timple Tree Drive', ''),
(919, 0, 'Tintamare Drive', ''),
(920, 0, 'Tjon Sie Fat Road', ''),
(921, 0, 'Tobago Road', ''),
(922, 0, 'Tokyo Drive', ''),
(923, 0, 'Tom Ben\'s Estate Drive', ''),
(924, 19, 'Tomato Road', ''),
(925, 43, 'Topaz Drive', ''),
(926, 43, 'Topaz Rd', ''),
(927, 0, 'Torricelli Road', ''),
(928, 13, 'Tortola Drive', ''),
(929, 0, 'Touch-Me-Not Drive', ''),
(930, 0, 'Touch-Me-Not Road', ''),
(931, 0, 'Tourmaline Drive', ''),
(932, 0, 'Tray Drive', ''),
(933, 13, 'Trinidad  Drive', ''),
(935, 0, 'Tripoli Drive', ''),
(936, 48, 'Trivia Road', ''),
(937, 47, 'Trumpet Shell Drive', ''),
(938, 47, 'Trumpet Shell Road', ''),
(939, 0, 'TRUSH ROAD', ''),
(940, 0, 'Tryton shell road', ''),
(941, 28, 'Tulip Drive', ''),
(942, 0, 'Tunis Drive', ''),
(943, 0, 'Turnstone road', ''),
(944, 0, 'Turquoise Drive', ''),
(945, 47, 'Tusk Shell Road', ''),
(946, 0, 'Tygris Road', ''),
(947, 0, 'Tygris Road/Industal road', ''),
(948, 0, 'Tygris Road/Industral road', ''),
(949, 0, 'Umbrella Cactus Drive', ''),
(950, 0, 'Union Road', ''),
(951, 0, 'University Boulevard', ''),
(952, 0, 'upper princess quarter road', ''),
(953, 0, 'Uxbridge Drive', ''),
(954, 0, 'Van Buren Drive', ''),
(956, 17, 'Van Romondt Steeg', ''),
(957, 0, 'Venus Road', ''),
(958, 13, 'Viequis Drive', ''),
(959, 45, 'Villa Road', ''),
(960, 0, 'Vine Cactus Drive', ''),
(961, 0, 'Virgin Gorda Drive', ''),
(962, 17, 'Visser Steeg', ''),
(963, 0, 'vista verde', ''),
(964, 33, 'Vlaun\'s Drive', ''),
(965, 17, 'Voges straat', ''),
(966, 0, 'W. Percy .M. Labega Street', ''),
(968, 8, 'W.B. Peterson Road', ''),
(969, 8, 'W.F.M Lampe Road', ''),
(970, 31, 'W.G. Buncamper Road', ''),
(971, 0, 'W.J.A. Nisbeth Rd', ''),
(973, 8, 'W.R Plantz Road', ''),
(974, 0, 'Waiveyclamy road', ''),
(975, 0, 'Warsau Drive', ''),
(976, 0, 'Washington Street', ''),
(977, 0, 'Water fall road', ''),
(978, 0, 'Waterfront Road', ''),
(979, 0, 'Watermelon Road', ''),
(980, 0, 'Waterrock Lane', ''),
(981, 0, 'Watersteeg', ''),
(982, 11, 'Watling Island Road', ''),
(983, 0, 'Waymouth Hills', ''),
(984, 17, 'Weduwen Steeg', ''),
(986, 5, 'Welfare Road', ''),
(988, 4, 'Welgelegen Lane', ''),
(990, 0, 'Well Road', ''),
(991, 0, 'Wellington Road', ''),
(992, 0, 'Wellsburg Street', ''),
(993, 0, 'Wesley Lane', ''),
(994, 0, 'Wesley Street', ''),
(995, 23, 'Westerband Dr.', ''),
(996, 0, 'Westunion Street', ''),
(997, 0, 'Weymouth Hill Road', ''),
(998, 41, 'White Sands Road', ''),
(999, 17, 'Wilheminastraat', ''),
(1000, 0, 'Willemstad Drive', ''),
(1001, 33, 'Williams\' Drive', ''),
(1002, 0, 'Willow Tree Drive', ''),
(1003, 0, 'Windmill Street', ''),
(1004, 0, 'Windsor lane', ''),
(1005, 3, 'Windsor Road', ''),
(1006, 0, 'Winnepeg Street', ''),
(1007, 0, 'Wintel drive', ''),
(1008, 0, 'winter road', ''),
(1009, 29, 'Wintergreen Dr', ''),
(1010, 0, 'Winward Street', ''),
(1011, 29, 'Wobble Vine Road', ''),
(1012, 0, 'Wolf Road', ''),
(1013, 14, 'Wood\'s Drive', ''),
(1014, 0, 'Wrigley Street', ''),
(1015, 0, 'Wyoming Street', ''),
(1016, 0, 'Yellow Bird road', ''),
(1017, 0, 'Yellow Sage Drive', ''),
(1018, 0, 'yrasquin blvd', ''),
(1019, 0, 'Zagersgut Lane', ''),
(1020, 30, 'Zagersgut road', ''),
(1021, 0, 'Zagreb Drive', ''),
(1024, 43, 'Zircon Road', ''),
(1025, 0, 'Zo Zo Moran Road', ''),
(1027, 7, 'Zorg en Rust Road', ''),
(1028, 17, 'Zout Steeg', ''),
(1029, 4, 'Beaver Drive', ''),
(1030, 4, 'Zebra  Drive', ''),
(1031, 4, 'Puma Drive', ''),
(1032, 4, 'Rhino Drive', ''),
(1033, 4, 'Welgelegen Road', ''),
(1034, 4, 'Welgelegen Drive', ''),
(1035, 4, 'Bobcat Road', ''),
(1036, 4, 'Jackal Road', ''),
(1037, 4, 'Hamster Drive', ''),
(1038, 4, 'G.A. Arnell Blvd', ''),
(1039, 4, 'Chameleon Drive', ''),
(1040, 4, 'Hyena Road', ''),
(1041, 4, 'Lion Road', ''),
(1042, 4, 'Tiger Road', ''),
(1043, 19, 'Cherrynut Road', ''),
(1044, 30, 'Abolition Drive', ''),
(1045, 8, 'Abraham Heyliger Road', ''),
(1046, 6, 'Acklin Island Drive', ''),
(1047, 17, 'Afloop Steeg', ''),
(1048, 33, 'Airport Road', ''),
(1049, 13, 'St. Lucia Drive', ''),
(1050, 19, 'Peach Drive', ''),
(1051, 19, 'Arrowroot Road', ''),
(1052, 8, 'Melford A. Hazel Road', ''),
(1053, 8, 'J. Salomon Gibbes Road', ''),
(1054, 16, 'Anguilla Road', ''),
(1055, 11, 'Van Gogh Street', ''),
(1056, 4, 'Liama Drive', ''),
(1057, 4, 'Octavius L. Richardson Road', ''),
(1058, 36, 'Camel Drive', ''),
(1059, 36, 'Rabbit  Rd', ''),
(1060, 36, 'Tamarindelaan ', ''),
(1061, 17, 'Philet Straat', ''),
(1062, 17, 'Manzanilla Steeg', ''),
(1063, 17, 'Speetjens Steeg', ''),
(1064, 31, 'Tropial Road', ''),
(1065, 39, 'University Drive', ''),
(1066, 39, 'Hudson Drive', ''),
(1067, 39, 'Indus Drive', ''),
(1068, 39, 'Tisza Drive', ''),
(1069, 41, 'White Sands Drive', ''),
(1070, 33, 'F. Alfie Heileger Drive', ''),
(1071, 33, 'Sr. Patientia Road', ''),
(1072, 3, 'Cannegieter Drive', ''),
(1073, 3, 'Lane 1', ''),
(1074, 3, 'Lane 2', ''),
(1075, 3, 'Lane 3', ''),
(1076, 3, 'Lane 4', ''),
(1077, 3, 'Lane 5', ''),
(1078, 3, 'Lane 6', ''),
(1079, 3, 'Lane 7', ''),
(1080, 3, 'Ocean Drive', ''),
(1081, 44, 'Ocean Terrace', ''),
(1082, 44, 'Indigo Bay Blvd', ''),
(1083, 44, 'Lakeside Drive', ''),
(1084, 44, 'Marina Terrace', ''),
(1085, 44, 'Indigon Bay Drive', ''),
(1086, 44, 'Island View Lane', ''),
(1087, 44, 'Sunset Drive', ''),
(1088, 44, 'Skyline Drive ', ''),
(1089, 14, 'Illidge Drive', ''),
(1090, 14, 'Rd Town Drive', ''),
(1091, 7, 'Gibs Drive', ''),
(1092, 9, 'Guana Bay Road', ''),
(1093, 9, 'The Hope Estate Road', ''),
(1094, 9, 'Triton Shell Road', ''),
(1095, 9, 'Guana Bay Drive', ''),
(1096, 9, 'Wavy Clam Road', ''),
(1097, 46, 'Wavy Clam Road', ''),
(1098, 46, 'Razor Clam Road', ''),
(1099, 46, 'Sun Ray Clam Road', ''),
(1100, 46, 'March Clam Road', ''),
(1101, 47, 'Green Star Shell Road', ''),
(1102, 47, 'Green Star Shell Drive', ''),
(1103, 47, 'King Helmet Road', ''),
(1104, 48, 'Wentel Drive', ''),
(1105, 48, 'Surf Clam Road', ''),
(1106, 50, 'Rice Hill Estate Drive', ''),
(1107, 50, 'Louis Armstrong Drive', ''),
(1108, 51, 'Union Farm Road', ''),
(1109, 51, 'Sao Paulo Road', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `userId` int(11) NOT NULL,
  `email` varchar(128) NOT NULL COMMENT 'login email',
  `password` varchar(128) NOT NULL COMMENT 'hashed login password',
  `name` varchar(128) DEFAULT NULL COMMENT 'full name of user',
  `mobile` varchar(20) DEFAULT NULL,
  `roleId` tinyint(4) NOT NULL,
  `isDeleted` tinyint(4) NOT NULL DEFAULT '0',
  `createdBy` int(11) NOT NULL,
  `createdDtm` datetime NOT NULL,
  `updatedBy` int(11) DEFAULT NULL,
  `updatedDtm` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`userId`, `email`, `password`, `name`, `mobile`, `roleId`, `isDeleted`, `createdBy`, `createdDtm`, `updatedBy`, `updatedDtm`) VALUES
(1, 'admin@itsea.in', '$2y$10$0YyXmOG9NOLYLljTzIhWtuu6jqPRoixlE9RXPVm.cTRRiSgQGZ/Bm', 'System Administrator', '9890098900', 1, 0, 0, '2015-07-01 18:56:49', 1, '2019-10-16 18:43:01'),
(27, 'test@test.com', '$2y$10$b/7Fr7Tx0i3jRFy/RovXOuAsUM6PYfll2ogv7zFq4rBEdIYkrH6QW', 'Test User', '9876543210', 3, 0, 1, '2019-10-25 11:50:45', NULL, NULL),
(28, 'labadmin@nvgebe.com', '$2y$10$ZoGO/AZ3I2bHdsGGZ5RZme3ySri/HzW6XJzwL1Pm4mrWNtlq/tBi.', 'System Administrator', '1234567890', 1, 0, 0, '2015-07-01 18:56:49', 28, '2019-12-02 17:24:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_water_analysis_customer`
--

CREATE TABLE `tbl_water_analysis_customer` (
  `ana_id` int(11) NOT NULL,
  `ana_customer_id` int(6) NOT NULL,
  `ana_date` date NOT NULL,
  `ana_time` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ana_status` varchar(10) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `ana_temp` float DEFAULT NULL,
  `ana_ph` float DEFAULT NULL,
  `ana_cond` mediumint(9) DEFAULT NULL,
  `ana_tds` float DEFAULT NULL,
  `ana_chload` mediumint(9) DEFAULT NULL,
  `ana_talk` mediumint(9) DEFAULT NULL,
  `ana_cahard` mediumint(9) DEFAULT NULL,
  `ana_iron` float DEFAULT NULL,
  `ana_silica` float DEFAULT NULL,
  `ana_alum` float DEFAULT NULL,
  `ana_turb` float DEFAULT NULL,
  `ana_chlone` float DEFAULT NULL,
  `ana_lsi` float DEFAULT NULL,
  `ana_color` mediumint(9) DEFAULT NULL,
  `ana_lead` float DEFAULT NULL,
  `ana_tc` mediumint(9) DEFAULT NULL,
  `ana_ec` mediumint(9) DEFAULT NULL,
  `ana_ent` mediumint(9) DEFAULT NULL,
  `ana_hpc` mediumint(9) DEFAULT NULL,
  `ana_clost` mediumint(9) DEFAULT NULL,
  `ana_leg` mediumint(9) DEFAULT NULL,
  `ana_modified_on` datetime NOT NULL,
  `ana_created_by` int(11) NOT NULL,
  `ana_created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_water_analysis_customer`
--

INSERT INTO `tbl_water_analysis_customer` (`ana_id`, `ana_customer_id`, `ana_date`, `ana_time`, `ana_status`, `ana_temp`, `ana_ph`, `ana_cond`, `ana_tds`, `ana_chload`, `ana_talk`, `ana_cahard`, `ana_iron`, `ana_silica`, `ana_alum`, `ana_turb`, `ana_chlone`, `ana_lsi`, `ana_color`, `ana_lead`, `ana_tc`, `ana_ec`, `ana_ent`, `ana_hpc`, `ana_clost`, `ana_leg`, `ana_modified_on`, `ana_created_by`, `ana_created_on`) VALUES
(1, 2, '2019-12-01', '11:00 PM', 'Closed', 6, 5, 54, 27.54, 4, 4, 4, 4, 4, 4, 5, 5, 5, NULL, NULL, NULL, NULL, NULL, NULL, 5, 5, '2019-12-01 19:27:00', 1, '2019-12-01 19:24:23'),
(2, 1, '2019-12-01', '11:00 PM', 'Closed', NULL, 5, 4, 2.04, 3, 3, 4, 5, 6, NULL, 7, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-12-01 19:38:39', 1, '2019-12-01 19:38:18');

-- --------------------------------------------------------

--
-- Table structure for table `wa_subtypes`
--

CREATE TABLE `wa_subtypes` (
  `wa_subtype_id` int(11) NOT NULL,
  `wa_type_id_fk` int(11) NOT NULL,
  `id_code` varchar(60) NOT NULL,
  `wa_subtype_name` varchar(150) NOT NULL,
  `wa_subtype_location_id_fk` int(11) NOT NULL,
  `createdDT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wa_subtypes`
--

INSERT INTO `wa_subtypes` (`wa_subtype_id`, `wa_type_id_fk`, `id_code`, `wa_subtype_name`, `wa_subtype_location_id_fk`, `createdDT`) VALUES
(1, 3, 'T-1', 'Cay Bay', 3, '2019-12-01 23:02:29'),
(2, 3, 'T-2', 'Cay Bay', 3, '2019-12-01 23:02:48'),
(3, 3, 'T-3', 'Cay Hill', 4, '2019-12-01 23:03:15'),
(4, 3, 'T-4', 'Cay Hill', 4, '2019-12-01 23:03:28'),
(5, 3, 'T-5', 'Mount William Hill', 14, '2019-12-01 23:03:56'),
(6, 3, 'T-7', 'South Reward', 19, '2019-12-01 23:04:25'),
(7, 3, 'T-8', 'Pointe Blanche', 52, '2019-12-02 12:21:53'),
(8, 3, 'T-9', 'Pointe Blanche	', 52, '2019-12-02 12:22:15'),
(9, 3, 'T-12', 'Mullet Bay ', 0, '2019-12-02 12:22:47'),
(10, 3, 'T-14', 'Pointe Blanche', 52, '2019-12-02 12:32:00'),
(11, 3, 'T-15', 'Concordia', 26, '2019-12-02 12:32:50'),
(12, 3, 'T-16', 'Pelican', 43, '2019-12-02 12:33:13'),
(13, 3, 'T-17', 'Monte Vista', 0, '2019-12-02 12:34:26'),
(14, 3, 'T-18', 'Guana Bay', 9, '2019-12-02 12:34:53'),
(15, 3, 'T-19', 'Almond Grove', 2, '2019-12-02 12:38:46'),
(16, 3, 'T-20', 'Waymouth Hill', 27, '2019-12-02 12:56:00'),
(17, 2, 'DST-1', 'Tank 1', 0, '2019-12-02 12:57:17'),
(18, 2, 'DST-2', 'Tank 2', 0, '2019-12-02 12:57:33'),
(19, 2, 'DST-8', 'Tank 8', 0, '2019-12-02 12:57:53'),
(20, 2, 'DST-9', 'Tank 9', 0, '2019-12-02 12:58:07'),
(21, 2, 'DST-12', 'Tank 12', 0, '2019-12-02 12:58:22'),
(22, 5, 'PH-1', 'Belair Pumphouse', 36, '2019-12-02 13:02:05'),
(23, 5, 'PH-2', 'Sherril Pumphouse', 4, '2019-12-02 13:02:26'),
(24, 5, 'PH-3', 'Mary\'s Fancy Pumphouse', 28, '2019-12-02 13:02:59'),
(25, 5, 'PH-4', 'Valley Estate Pumphouse', 19, '2019-12-02 13:03:29'),
(26, 5, 'PH-5', 'Madame Estate Pumnphouse', 11, '2019-12-02 13:03:57'),
(27, 5, 'PH-6', 'Ocean View Pumphouse', 48, '2019-12-02 13:04:31'),
(28, 5, 'PH-7', 'FPT Pumphouse', 8, '2019-12-02 13:05:40'),
(29, 6, 'HR-1', 'Cole Bay Border', 5, '2019-12-02 15:28:02'),
(30, 6, 'HR-2', 'Sister Basilia Center', 20, '2019-12-02 15:28:20'),
(31, 6, 'HR-3', 'SXM Medical Center', 4, '2019-12-02 15:29:07'),
(32, 1, 'C-1', 'Safe Cargo', 52, '2019-12-02 15:43:14'),
(33, 1, 'C-2', 'G.E.B.E. Distribuiton BLD.', 17, '2019-12-02 15:43:46'),
(34, 1, 'C-3 temp', 'Monte Vista Security', 52, '2019-12-02 15:44:09'),
(35, 1, 'C-4', 'Real Auto', 17, '2019-12-02 15:44:25'),
(36, 1, 'C-5', 'Winair Manifold', 33, '2019-12-02 15:44:50'),
(37, 1, 'C-6', 'The Towes Hotel ', 39, '2019-12-02 15:45:22'),
(38, 1, 'C-7 temp', 'Steve\'s Bar - opposite bakery', 13, '2019-12-02 15:45:46'),
(39, 1, 'C-8', 'AAA Car Rental', 41, '2019-12-02 15:46:08'),
(40, 1, 'C-9', 'Over Value 2 ', 23, '2019-12-02 15:46:40'),
(41, 1, 'C-10', 'G.E.B.E. Warehouse', 23, '2019-12-02 15:46:58'),
(42, 1, 'C-11 temp', 'Prison Bathroom', 52, '2019-12-02 15:47:38'),
(43, 1, 'C-12', 'M. G. De Weever School', 53, '2019-12-02 15:49:00'),
(44, 1, 'C-13', 'Ana Gibbs', 5, '2019-12-02 16:09:55'),
(45, 1, 'C-14', 'Caribbean Auto Sales', 5, '2019-12-02 16:10:15'),
(46, 1, 'C-15', 'Medical Center Laboratory', 5, '2019-12-02 16:10:31'),
(47, 1, 'C-16', 'Li\'s Supermarket', 5, '2019-12-02 16:10:50'),
(48, 1, 'C-17', 'Sr. Marie Laurance School', 13, '2019-12-02 16:44:23'),
(49, 1, 'C-18', 'Wing Li Supermarket ', 13, '2019-12-02 16:44:41'),
(50, 1, 'C-19', 'Oyster Bay Hotel ', 47, '2019-12-02 16:44:58'),
(51, 1, 'C-20', 'SXM Housing Foundation', 45, '2019-12-02 16:45:24'),
(52, 1, 'C-21', 'La Vista Hotel', 43, '2019-12-02 16:45:43'),
(53, 1, 'C-22', 'Corner Bar', 3, '2019-12-02 16:46:15'),
(54, 1, 'C-23', 'Lionel Conner School', 3, '2019-12-02 16:46:36'),
(55, 1, 'C-24', 'G.E.B.E. Office', 33, '2019-12-02 16:46:56'),
(56, 1, 'C-25', 'Martin L. King School', 7, '2019-12-02 16:47:16'),
(57, 1, 'C-26', 'K.PM.G.', 11, '2019-12-02 16:47:35'),
(58, 1, 'C-27', 'The Daily Herald', 40, '2019-12-02 16:48:17'),
(59, 1, 'C-28', 'B & C Beverages', 4, '2019-12-02 16:48:41'),
(60, 1, 'C-29', 'Spencer Medical Clinic', 18, '2019-12-02 16:49:03'),
(61, 1, 'C-30', 'Venda Baker', 28, '2019-12-02 16:49:24'),
(62, 1, 'C-31', 'Cost-U-Less', 40, '2019-12-02 16:49:55'),
(63, 1, 'C-32', 'Milton Peters College ', 19, '2019-12-02 16:54:05'),
(64, 1, 'C-33', 'Hillside Christian School', 21, '2019-12-02 16:54:37'),
(65, 1, 'C-34', 'Ruby Labega School', 54, '2019-12-02 16:55:43'),
(66, 1, 'C-35', 'M.A.C. School', 20, '2019-12-02 16:59:09'),
(67, 1, 'C-36', 'Ace Home Center', 4, '2019-12-02 16:59:34'),
(68, 1, 'C-37', 'New Government Building', 17, '2019-12-02 17:00:54'),
(69, 1, 'C-38', 'Vineyard Building', 17, '2019-12-02 17:01:12'),
(70, 1, 'C-39', 'SXM University', 17, '2019-12-02 17:01:31'),
(71, 1, 'C-40', 'SZV Building', 17, '2019-12-02 17:01:49'),
(72, 1, 'C-41', 'Sundial School ', 17, '2019-12-02 17:02:12'),
(73, 1, 'C-42', 'Belair Hotel', 36, '2019-12-02 17:02:38'),
(74, 1, 'C-43', 'Checkmate Security', 55, '2019-12-02 17:03:32'),
(75, 1, 'C-44', 'Bute Hotel', 55, '2019-12-02 17:04:02'),
(76, 1, 'C-45', '', 0, '2019-12-02 17:04:13'),
(77, 1, 'C-46', 'Kenny\'s Korner Bar', 55, '2019-12-02 17:04:34'),
(78, 1, 'C-47', 'Oasis Restaurant', 55, '2019-12-02 17:05:18'),
(79, 1, 'C-48', 'Belvedere School', 45, '2019-12-02 17:05:39'),
(80, 1, 'C-49', '', 0, '2019-12-02 17:05:57'),
(81, 1, 'C-50', 'Dutch Quarter Clinic', 7, '2019-12-02 17:06:18'),
(82, 1, 'C-51', 'Union Farm Supermarket', 7, '2019-12-02 17:06:29'),
(83, 1, 'C-52', 'Sister Regina School ', 33, '2019-12-02 17:06:44'),
(84, 1, 'C-53', 'Travel Inn', 33, '2019-12-02 17:07:03'),
(85, 1, 'C-54', '', 0, '2019-12-02 17:07:18'),
(86, 1, 'C-55', 'Mary\'s Boon', 33, '2019-12-02 17:07:27'),
(87, 1, 'C-56', 'Sherriff Security', 56, '2019-12-02 17:08:31'),
(88, 1, 'C-57', 'Academy PSVE', 8, '2019-12-02 17:08:56'),
(89, 1, 'C-58', 'Academy', 21, '2019-12-02 17:09:20'),
(90, 1, 'C-59', '', 0, '2019-12-02 17:09:28'),
(91, 1, 'C-60', 'Sucker Garden Comm. Center', 23, '2019-12-02 17:09:44');

-- --------------------------------------------------------

--
-- Table structure for table `wa_types`
--

CREATE TABLE `wa_types` (
  `wa_id` int(3) NOT NULL,
  `wa_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wa_types`
--

INSERT INTO `wa_types` (`wa_id`, `wa_name`) VALUES
(1, 'Consumer'),
(2, 'Daily Storage Tank'),
(3, 'Storage Tank'),
(4, 'Water Plant'),
(5, 'Pump House'),
(6, 'High Risk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `tbl_analysis`
--
ALTER TABLE `tbl_analysis`
  ADD PRIMARY KEY (`ana_id`);

--
-- Indexes for table `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`area_id`);

--
-- Indexes for table `tbl_boilers`
--
ALTER TABLE `tbl_boilers`
  ADD PRIMARY KEY (`boiler_id`);

--
-- Indexes for table `tbl_buildings`
--
ALTER TABLE `tbl_buildings`
  ADD PRIMARY KEY (`building_id`);

--
-- Indexes for table `tbl_companies`
--
ALTER TABLE `tbl_companies`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `tbl_consumers`
--
ALTER TABLE `tbl_consumers`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  ADD PRIMARY KEY (`con_id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`dis_id`);

--
-- Indexes for table `tbl_engines`
--
ALTER TABLE `tbl_engines`
  ADD PRIMARY KEY (`engine_id`);

--
-- Indexes for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ppcw_boilers`
--
ALTER TABLE `tbl_ppcw_boilers`
  ADD PRIMARY KEY (`ppcwb_id`);

--
-- Indexes for table `tbl_ppcw_engines`
--
ALTER TABLE `tbl_ppcw_engines`
  ADD PRIMARY KEY (`ppcwe_id`);

--
-- Indexes for table `tbl_ppcw_engines_details`
--
ALTER TABLE `tbl_ppcw_engines_details`
  ADD PRIMARY KEY (`ppcwe_details_id`);

--
-- Indexes for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `tbl_street`
--
ALTER TABLE `tbl_street`
  ADD PRIMARY KEY (`str_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_water_analysis_customer`
--
ALTER TABLE `tbl_water_analysis_customer`
  ADD PRIMARY KEY (`ana_id`);

--
-- Indexes for table `wa_subtypes`
--
ALTER TABLE `wa_subtypes`
  ADD PRIMARY KEY (`wa_subtype_id`);

--
-- Indexes for table `wa_types`
--
ALTER TABLE `wa_types`
  ADD PRIMARY KEY (`wa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_analysis`
--
ALTER TABLE `tbl_analysis`
  MODIFY `ana_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `tbl_area`
--
ALTER TABLE `tbl_area`
  MODIFY `area_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;
--
-- AUTO_INCREMENT for table `tbl_boilers`
--
ALTER TABLE `tbl_boilers`
  MODIFY `boiler_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_buildings`
--
ALTER TABLE `tbl_buildings`
  MODIFY `building_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_companies`
--
ALTER TABLE `tbl_companies`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_consumers`
--
ALTER TABLE `tbl_consumers`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  MODIFY `con_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `dis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_engines`
--
ALTER TABLE `tbl_engines`
  MODIFY `engine_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_last_login`
--
ALTER TABLE `tbl_last_login`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `tbl_ppcw_boilers`
--
ALTER TABLE `tbl_ppcw_boilers`
  MODIFY `ppcwb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `tbl_ppcw_engines`
--
ALTER TABLE `tbl_ppcw_engines`
  MODIFY `ppcwe_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_ppcw_engines_details`
--
ALTER TABLE `tbl_ppcw_engines_details`
  MODIFY `ppcwe_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `tbl_reset_password`
--
ALTER TABLE `tbl_reset_password`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  MODIFY `roleId` tinyint(4) NOT NULL AUTO_INCREMENT COMMENT 'role id', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_street`
--
ALTER TABLE `tbl_street`
  MODIFY `str_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1110;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `tbl_water_analysis_customer`
--
ALTER TABLE `tbl_water_analysis_customer`
  MODIFY `ana_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `wa_subtypes`
--
ALTER TABLE `wa_subtypes`
  MODIFY `wa_subtype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
--
-- AUTO_INCREMENT for table `wa_types`
--
ALTER TABLE `wa_types`
  MODIFY `wa_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
