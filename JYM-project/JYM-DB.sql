-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 02, 2023 at 04:56 PM
-- Server version: 8.0.23
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spitel-jym`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `advertisement_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `banner_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customer_id` int NOT NULL,
  `city_id` int DEFAULT NULL,
  `slide_id` int DEFAULT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `to_date` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`id`, `name`, `advertisement_name`, `description`, `banner_url`, `created_at`, `updated_at`, `customer_id`, `city_id`, `slide_id`, `is_approved`, `comment`, `to_date`) VALUES
(3, 'ASHOK', 'FaceBook Marketing', '', '/public/add_banner/940627903blog2.jpg', '2022-11-22 05:17:01', '2023-02-17 14:11:56', 30, 232, 4, 0, NULL, '2023-01-07 14:06:00'),
(5, 'ASHOK', 'Lillith Oliver', '', '/public/add_banner/141153249jayesh_desai.jpeg', '2022-11-23 04:20:37', '2023-02-17 14:11:56', 30, 230, 1, 0, NULL, '2023-01-04 14:05:00'),
(6, 'ASHOK', 'Dustin Waters', '', '/public/add_banner/1498267563blog1.jpg', '2022-11-23 04:20:45', '2023-02-17 14:11:56', 30, 603, 3, 1, NULL, '2023-01-31 16:05:00');

-- --------------------------------------------------------

--
-- Table structure for table `anniversary`
--

CREATE TABLE `anniversary` (
  `id` int NOT NULL,
  `banner_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customer_id` int NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `anniversary`
--

INSERT INTO `anniversary` (`id`, `banner_url`, `name`, `mobile_no`, `date`, `created_at`, `updated_at`, `customer_id`, `is_approved`, `comment`) VALUES
(2, '/public/anniversary_banner/649042507barakObama.jpeg', 'Viral Ghodadara', '7600742473', '2022-11-22', '2022-11-22 06:50:47', '2023-02-17 14:11:56', 0, 0, NULL),
(3, '/public/anniversary_banner/1534187477lavji_badshah.jpeg', 'Drake Wilkinson edit', '+1 (823) 235-3097', '1973-10-18', '2022-11-23 04:21:23', '2023-02-17 14:11:56', 2, 0, NULL),
(4, '/public/anniversary_banner/222842228wallpaper.jpg', 'Anniversary', '9856523252', '2022-11-25', '2022-11-25 05:55:44', '2023-02-17 14:11:56', 14, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `birthday`
--

CREATE TABLE `birthday` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `banner_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customer_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `birthday`
--

INSERT INTO `birthday` (`id`, `name`, `mobile_no`, `date`, `banner_url`, `created_at`, `updated_at`, `customer_id`) VALUES
(2, 'Lavji Badshah edit', '8980326413', '2022-11-22', '/public/birthday_banner/1902520338lavji_badshah.jpeg', '2022-11-22 06:23:08', '2023-02-17 14:11:56', 0),
(3, 'Jorden Brewer', '+1 (872) 805-4881', '2006-12-23', '/public/birthday_banner/1544897763lavji_badshah.jpeg', '2022-11-23 04:21:02', '2023-02-17 14:11:56', 2);

-- --------------------------------------------------------

--
-- Table structure for table `blood_group`
--

CREATE TABLE `blood_group` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `blood_group`
--

INSERT INTO `blood_group` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'B+', '2022-12-14 04:36:39', '2023-02-17 14:11:56'),
(4, 'A+', '2022-12-14 04:43:54', '2023-02-17 14:11:56'),
(5, 'A-', '2022-12-14 04:44:42', '2023-02-17 14:11:56'),
(6, 'B-', '2022-12-17 08:46:23', '2023-02-17 14:11:56'),
(7, 'O+', '2022-12-17 08:46:38', '2023-02-17 14:11:56'),
(8, 'O-', '2022-12-17 08:46:44', '2023-02-17 14:11:56'),
(9, 'AB+', '2022-12-17 08:47:04', '2023-02-17 14:11:56'),
(10, 'AB-', '2022-12-17 08:47:10', '2023-02-17 14:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `business_category`
--

CREATE TABLE `business_category` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `business_category`
--

INSERT INTO `business_category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'READYMADE GARMENTS', '2022-12-17 06:53:49', '2023-02-17 14:11:56'),
(6, 'TEXTILES', '2022-12-17 06:54:00', '2023-02-17 14:11:56'),
(7, 'HOSIERY/HANDLOOM', '2022-12-17 06:54:16', '2023-02-17 14:11:56'),
(8, 'SAREE DRESS METERIAL', '2022-12-17 06:54:23', '2023-02-17 14:11:56'),
(9, 'KIRANA', '2022-12-17 06:54:33', '2023-02-17 14:11:56'),
(10, 'STATIONARY', '2022-12-17 06:54:41', '2023-02-17 14:11:56'),
(11, 'MEDICAL', '2022-12-17 06:54:50', '2023-02-17 14:11:56'),
(12, 'ELECTRICALS', '2022-12-17 06:55:00', '2023-02-17 14:11:56'),
(13, 'ELECTRONICS', '2022-12-17 06:55:08', '2023-02-17 14:11:56'),
(14, 'PAINTS', '2022-12-17 06:55:16', '2023-02-17 14:11:56'),
(15, 'DRY FRUITS', '2022-12-17 06:55:46', '2023-02-17 14:11:56'),
(16, 'STEELS', '2022-12-17 06:56:08', '2023-02-17 14:11:56'),
(17, 'STEELS HOME APLIENCE', '2022-12-17 06:56:18', '2023-02-17 14:11:56'),
(18, 'HARDWARE', '2022-12-17 06:56:38', '2023-02-17 14:11:56'),
(19, 'GOLD & SILVER', '2022-12-17 06:56:45', '2023-02-17 14:11:56'),
(20, 'MOBILES ASSESSRIES', '2022-12-17 06:56:54', '2023-02-17 14:11:56'),
(21, 'PAPERS', '2022-12-17 06:57:01', '2023-02-17 14:11:56'),
(22, 'INVITATION CARD', '2022-12-17 06:57:17', '2023-02-17 14:11:56'),
(23, 'TOYS', '2022-12-17 06:57:25', '2023-02-17 14:11:56'),
(24, 'FINANCE', '2022-12-17 06:58:18', '2023-02-17 14:11:56'),
(25, 'BUILDERS', '2022-12-17 06:58:27', '2023-02-17 14:11:56'),
(26, 'STUDENTS', '2022-12-17 06:58:36', '2023-02-17 14:11:56'),
(27, 'House wife', '2022-12-17 06:58:45', '2023-02-17 14:11:56'),
(28, 'TEA', '2022-12-17 06:59:00', '2023-02-17 14:11:56'),
(29, 'FOOD PRODUCT', '2022-12-17 06:59:08', '2023-02-17 14:11:56'),
(30, 'LACE & EMBROIDERY', '2022-12-17 06:59:23', '2023-02-17 14:11:56'),
(31, 'GIFTS AND DECORATIONS', '2022-12-17 06:59:33', '2023-02-17 14:11:56'),
(32, 'GENRAL MERCHENT & COMMISION AHENT', '2022-12-17 07:00:14', '2023-02-17 14:11:56'),
(33, 'SUMERSIBLE PUMPSET', '2022-12-17 07:00:24', '2023-02-17 14:11:56'),
(34, 'AUTOMOBILE PARTS', '2022-12-17 07:00:36', '2023-02-17 14:11:56'),
(35, 'MEDICAL', '2022-12-17 07:00:47', '2023-02-17 14:11:56'),
(36, 'STICKERS', '2022-12-17 07:01:08', '2023-02-17 14:11:56'),
(37, 'COMPUTERS & SOFTWARE', '2022-12-17 07:01:41', '2023-02-17 14:11:56'),
(38, 'OPTICALS', '2022-12-17 07:01:49', '2023-02-17 14:11:56'),
(39, 'POWDER COTTING', '2022-12-17 07:01:58', '2023-02-17 14:11:56'),
(40, 'ACCOUNTING SERVICES', '2022-12-17 07:02:06', '2023-02-17 14:11:56'),
(41, 'JOB', '2022-12-17 07:02:15', '2023-02-17 14:11:56'),
(42, 'GENRAL MERCHENTS', '2022-12-17 07:02:25', '2023-02-17 14:11:56'),
(43, 'CHOCOLATE', '2022-12-17 07:02:33', '2023-02-17 14:11:56'),
(44, 'CATERING', '2022-12-17 07:02:41', '2023-02-17 14:11:56'),
(45, 'MONEY LANDING', '2022-12-17 07:02:51', '2023-02-17 14:11:56'),
(46, 'CHILLI POWDER', '2022-12-17 07:02:59', '2023-02-17 14:11:56'),
(47, 'COMMISSION AGENT', '2022-12-17 07:03:06', '2023-02-17 14:11:56'),
(48, 'MUNIMAJI', '2022-12-17 07:03:18', '2023-02-17 14:11:56'),
(49, 'GRANITE & MARBAL', '2022-12-17 07:03:26', '2023-02-17 14:11:56'),
(50, 'HOME APPLIANCES', '2022-12-17 07:03:35', '2023-02-17 14:11:56'),
(51, 'COTTON', '2022-12-17 07:03:47', '2023-02-17 14:11:56'),
(52, 'COSMETICS', '2022-12-17 07:03:58', '2023-02-17 14:11:56'),
(53, 'IMITATION JWELLARY', '2022-12-17 07:04:12', '2023-02-17 14:11:56'),
(54, 'TRAVEL & SCHOOLS BAGS', '2022-12-17 07:04:27', '2023-02-17 14:11:56'),
(55, 'TOUR & TRAVELS AGENCIES', '2022-12-17 07:04:36', '2023-02-17 14:11:56'),
(56, 'CANFECSNRY', '2022-12-17 07:04:45', '2023-02-17 14:11:56'),
(57, 'PACKING MATERIALS & DISPOSABLE', '2022-12-17 07:05:08', '2023-02-17 14:11:56'),
(58, 'CURTAINS & HOME FURNISHING', '2022-12-17 07:05:51', '2023-02-17 14:11:56'),
(59, 'WEDDING CARD', '2022-12-17 07:06:05', '2023-02-17 14:11:56'),
(60, 'AGENCY', '2022-12-17 07:06:15', '2023-02-17 14:11:56'),
(61, 'PLYWOODS', '2022-12-17 07:06:27', '2023-02-17 14:11:56'),
(62, 'CHARTED ACCOUNTANTS', '2022-12-17 07:06:35', '2023-02-17 14:11:56'),
(63, 'REALSTATE', '2022-12-17 07:06:44', '2023-02-17 14:11:56'),
(64, 'FOOTWEAR', '2022-12-17 07:06:53', '2023-02-17 14:11:56'),
(65, 'IRON & STEELS', '2022-12-17 07:07:02', '2023-02-17 14:11:56'),
(66, 'ESSENCE', '2022-12-17 07:07:14', '2023-02-17 14:11:56'),
(67, 'AGRICULTHURAL PRODUCT', '2022-12-17 07:07:23', '2023-02-17 14:11:56'),
(68, 'ADVERTISING AGENCY', '2022-12-17 07:07:39', '2023-02-17 14:11:56'),
(69, 'SPORTS', '2022-12-17 07:07:55', '2023-02-17 14:11:56'),
(70, 'FOOD GRAINS & PULSES', '2022-12-17 07:08:03', '2023-02-17 14:11:56'),
(71, 'SANITARY', '2022-12-17 07:08:11', '2023-02-17 14:11:56'),
(72, 'MOTOR AND PUMPS', '2022-12-17 07:08:21', '2023-02-17 14:11:56'),
(73, 'CABLES', '2022-12-17 07:13:21', '2023-02-17 14:11:56'),
(74, 'METAL', '2022-12-17 07:13:29', '2023-02-17 14:11:56'),
(75, 'FURNISHINGS', '2022-12-17 07:13:37', '2023-02-17 14:11:56'),
(76, 'AGARBATIE & PERFUMENS', '2022-12-17 07:13:46', '2023-02-17 14:11:56'),
(77, 'TAILORING METERIALES', '2022-12-17 07:14:04', '2023-02-17 14:11:56'),
(78, 'BORN BABY PRODUCTS', '2022-12-17 07:14:37', '2023-02-17 14:11:56'),
(79, 'UMBRELLA', '2022-12-17 07:14:44', '2023-02-17 14:11:56'),
(80, 'B.E.CIVILCONSULTING ENGINEER', '2022-12-17 07:14:53', '2023-02-17 14:11:56'),
(81, 'LIGHTING &HOME DECOR', '2022-12-17 07:15:01', '2023-02-17 14:11:56'),
(82, 'SWEETS', '2022-12-17 07:15:10', '2023-02-17 14:11:56'),
(83, 'SCHOOL STATIONERY', '2022-12-17 07:15:18', '2023-02-17 14:11:56'),
(84, 'TIELS & SENITARY', '2022-12-17 07:15:26', '2023-02-17 14:11:56'),
(85, 'DISTRIBUTORES-C&F STOCKIST', '2022-12-17 07:15:36', '2023-02-17 14:11:56'),
(86, 'SHEET METAL FABRICATS', '2022-12-17 07:15:44', '2023-02-17 14:11:56'),
(87, 'CEMENT', '2022-12-17 07:15:53', '2023-02-17 14:11:56'),
(88, 'MACHINERY PART', '2022-12-17 07:16:02', '2023-02-17 14:11:56'),
(89, 'ALUMINIUM SECTION', '2022-12-17 07:16:15', '2023-02-17 14:11:56'),
(90, 'PLASTICS PRODUCT', '2022-12-17 07:16:23', '2023-02-17 14:11:56'),
(91, 'IMPORT EXPORT', '2022-12-17 07:16:31', '2023-02-17 14:11:56'),
(92, 'BANGLES', '2022-12-17 07:16:39', '2023-02-17 14:11:56'),
(93, 'PLUMBING & AGRI FITTING', '2022-12-17 07:16:50', '2023-02-17 14:11:56'),
(94, 'DOCTORS', '2022-12-17 07:17:02', '2023-02-17 14:11:56'),
(95, 'GLASS', '2022-12-17 07:17:13', '2023-02-17 14:11:56'),
(96, 'GROCERY', '2022-12-17 07:17:20', '2023-02-17 14:11:56'),
(97, 'STOCK & SHARE BROKERS', '2022-12-17 07:17:32', '2023-02-17 14:11:56'),
(98, 'PROVISSION STORE', '2022-12-17 07:17:42', '2023-02-17 14:11:56'),
(99, '3D GRAPHICS DESIGNER', '2023-01-11 03:04:37', '2023-02-17 14:11:56'),
(100, 'ADVOCATE', '2023-01-11 03:05:13', '2023-02-17 14:11:56'),
(101, 'AIR CONDITIONER', '2023-01-11 03:05:37', '2023-02-17 14:11:56'),
(102, 'ANIMATION', '2023-01-11 03:06:38', '2023-02-17 14:11:56'),
(103, 'ARCHITECT', '2023-01-11 03:07:01', '2023-02-17 14:11:56'),
(104, 'ASTROLOGER/JYOTIS', '2023-01-11 03:07:44', '2023-02-17 14:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `calendars`
--

CREATE TABLE `calendars` (
  `id` int NOT NULL,
  `eventDate` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `eventDateHindi` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `eventDayHindi` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thought` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `veer_sanwat` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khartar_sanwat` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vikram_sanwat` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isavi_sanwat` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shubh_day_time` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chanchal_day_time` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `laabh_day_time` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amrit_day_time` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shubh_night_time` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `chanchal_night_time` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `laabh_night_time` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amrit_night_time` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_1` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunrise_1` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunset_1` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_2` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunrise_2` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunset_2` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_3` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunrise_3` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunset_3` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_4` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunrise_4` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunset_4` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_5` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunrise_5` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunset_5` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_6` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunrise_6` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunset_6` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jain_month` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jain_month_no` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calendars`
--

INSERT INTO `calendars` (`id`, `eventDate`, `eventDateHindi`, `eventDayHindi`, `thought`, `veer_sanwat`, `khartar_sanwat`, `vikram_sanwat`, `isavi_sanwat`, `shubh_day_time`, `chanchal_day_time`, `laabh_day_time`, `amrit_day_time`, `shubh_night_time`, `chanchal_night_time`, `laabh_night_time`, `amrit_night_time`, `city_1`, `sunrise_1`, `sunset_1`, `city_2`, `sunrise_2`, `sunset_2`, `city_3`, `sunrise_3`, `sunset_3`, `city_4`, `sunrise_4`, `sunset_4`, `city_5`, `sunrise_5`, `sunset_5`, `city_6`, `sunrise_6`, `sunset_6`, `event`, `jain_month`, `jain_month_no`, `date`, `created_at`, `updated_at`) VALUES
(21, '22 February, 2023', '22 फरवरी 2023', 'बुधवार', 'Good Thought of the Day!', '2023', '2023', '2023', '2023', '6:00-8:00 am', '8:00-10:00 am', '10:00-11:00 am', '4:00-6:00 pm', '6:00-8:00 pm', '8:00-10:00 pm', '10:00-11:00 pm', '4:00-5:00 pm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Event of the day', NULL, NULL, '2023-02-22', '2023-02-21 16:01:15', '2023-02-22 04:35:55'),
(22, '02 March, 2023', '2 मार्च 2023', 'गुरुवार', 'New thought of the day!', '2575', '2075', '1007', '2023', '6-8 am', '8-10 am', '10-11 am', '10-11 am', '6-8 pm', '8-10 pm', '10-11 pm', '4:6 pm', 'Kolkata', '06:03 am', '05:37 pm', 'New Delhi', '06:53 am', '06:16 pm', 'Ahmedabad', '07:18 am', '06:47 pm', 'Hyderabad', '06:38 am', '06:27 pm', 'Mumbai', '07:02 am', '07:02 am', 'Bangalore', '06:38 am', '06:29 pm', 'Any Event', 'माघ', '१५', '2023-03-02', '2023-02-22 04:29:30', '2023-02-24 11:31:52');

-- --------------------------------------------------------

--
-- Table structure for table `calendar_jain_years`
--

CREATE TABLE `calendar_jain_years` (
  `id` int NOT NULL,
  `veer_sanwat` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `khartar_sanwat` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vikram_sanwat` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `isavi_sanwat` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_1` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunrise_1` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunset_1` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_2` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunrise_2` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunset_2` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_3` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunrise_3` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunset_3` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_4` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunrise_4` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunset_4` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_5` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunrise_5` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunset_5` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_6` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunrise_6` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sunset_6` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jain_month` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `calendar_jain_years`
--

INSERT INTO `calendar_jain_years` (`id`, `veer_sanwat`, `khartar_sanwat`, `vikram_sanwat`, `isavi_sanwat`, `city_1`, `sunrise_1`, `sunset_1`, `city_2`, `sunrise_2`, `sunset_2`, `city_3`, `sunrise_3`, `sunset_3`, `city_4`, `sunrise_4`, `sunset_4`, `city_5`, `sunrise_5`, `sunset_5`, `city_6`, `sunrise_6`, `sunset_6`, `jain_month`, `created_at`, `updated_at`) VALUES
(1, '२५४९', '१००४', '२०७९', '2023', 'Kolkata', '06:03 am', '05:37 pm', 'New Delhi', '06:53 am', '06:16 pm', 'Ahmedabad', '07:18 am', '06:47 pm', 'Hyderabad', '06:38 am', '06:27 pm', 'Chennai', '06:38 am', '06:27 pm', 'Bangalore', '06:38 am', '06:29 pm', 'माघ', '2023-02-22 04:29:30', '2023-03-02 15:35:40');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int NOT NULL,
  `city` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `state_id` int NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`, `state_id`, `updated_at`, `created_at`) VALUES
(1, 'North and Middle Andaman', 32, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(2, 'South Andaman', 32, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(3, 'Nicobar', 32, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(4, 'Adilabad', 1, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(5, 'Anantapur', 1, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(6, 'Chittoor', 1, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(7, 'East Godavari', 1, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(8, 'Guntur', 1, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(9, 'Hyderabad', 1, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(10, 'Kadapa', 1, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(11, 'Karimnagar', 1, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(12, 'Khammam', 1, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(13, 'Krishna', 1, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(14, 'Kurnool', 1, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(15, 'Mahbubnagar', 1, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(16, 'Medak', 1, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(17, 'Nalgonda', 1, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(18, 'Nellore', 1, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(19, 'Nizamabad', 1, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(20, 'Prakasam', 1, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(21, 'Rangareddi', 1, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(22, 'Srikakulam', 1, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(23, 'Vishakhapatnam', 1, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(24, 'Vizianagaram', 1, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(25, 'Warangal', 1, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(26, 'West Godavari', 1, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(27, 'Anjaw', 3, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(28, 'Changlang', 3, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(29, 'East Kameng', 3, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(30, 'Lohit', 3, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(31, 'Lower Subansiri', 3, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(32, 'Papum Pare', 3, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(33, 'Tirap', 3, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(34, 'Dibang Valley', 3, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(35, 'Upper Subansiri', 3, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(36, 'West Kameng', 3, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(37, 'Barpeta', 2, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(38, 'Bongaigaon', 2, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(39, 'Cachar', 2, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(40, 'Darrang', 2, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(41, 'Dhemaji', 2, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(42, 'Dhubri', 2, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(43, 'Dibrugarh', 2, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(44, 'Goalpara', 2, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(45, 'Golaghat', 2, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(46, 'Hailakandi', 2, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(47, 'Jorhat', 2, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(48, 'Karbi Anglong', 2, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(49, 'Karimganj', 2, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(50, 'Kokrajhar', 2, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(51, 'Lakhimpur', 2, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(52, 'Marigaon', 2, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(53, 'Nagaon', 2, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(54, 'Nalbari', 2, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(55, 'North Cachar Hills', 2, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(56, 'Sibsagar', 2, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(57, 'Sonitpur', 2, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(58, 'Tinsukia', 2, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(59, 'Araria', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(60, 'Aurangabad', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(61, 'Banka', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(62, 'Begusarai', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(63, 'Bhagalpur', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(64, 'Bhojpur', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(65, 'Buxar', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(66, 'Darbhanga', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(67, 'Purba Champaran', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(68, 'Gaya', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(69, 'Gopalganj', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(70, 'Jamui', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(71, 'Jehanabad', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(72, 'Khagaria', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(73, 'Kishanganj', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(74, 'Kaimur', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(75, 'Katihar', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(76, 'Lakhisarai', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(77, 'Madhubani', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(78, 'Munger', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(79, 'Madhepura', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(80, 'Muzaffarpur', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(81, 'Nalanda', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(82, 'Nawada', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(83, 'Patna', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(84, 'Purnia', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(85, 'Rohtas', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(86, 'Saharsa', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(87, 'Samastipur', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(88, 'Sheohar', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(89, 'Sheikhpura', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(90, 'Saran', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(91, 'Sitamarhi', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(92, 'Supaul', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(93, 'Siwan', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(94, 'Vaishali', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(95, 'Pashchim Champaran', 4, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(96, 'Bastar', 36, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(97, 'Bilaspur', 36, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(98, 'Dantewada', 36, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(99, 'Dhamtari', 36, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(100, 'Durg', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(101, 'Jashpur', 36, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(102, 'Janjgir-Champa', 36, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(103, 'Korba', 36, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(104, 'Koriya', 36, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(105, 'Kanker', 36, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(106, 'Kawardha', 36, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(107, 'MUNDARGI', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(108, 'Raigarh', 36, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(109, 'Rajnandgaon', 36, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(110, 'Raipur', 36, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(111, 'Surguja', 36, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(112, 'Diu', 29, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(113, 'Daman', 29, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(114, 'Central Delhi', 25, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(115, 'East Delhi', 25, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(116, 'New Delhi', 25, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(117, 'North Delhi', 25, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(118, 'North East Delhi', 25, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(119, 'North West Delhi', 25, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(120, 'South Delhi', 25, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(121, 'South West Delhi', 25, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(122, 'West Delhi', 25, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(123, 'North Goa', 26, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(124, 'South Goa', 26, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(125, 'Ahmedabad', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(126, 'Amreli District', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(127, 'Anand', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(128, 'Banaskantha', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(129, 'Bharuch', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(130, 'Bhavnagar', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(131, 'Dahod', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(132, 'The Dangs', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(133, 'Gandhinagar', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(134, 'Jamnagar', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(135, 'Junagadh', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(136, 'Kutch', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(137, 'Kheda', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(138, 'Mehsana', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(139, 'Narmada', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(140, 'Navsari', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(141, 'Patan', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(142, 'Panchmahal', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(143, 'Porbandar', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(144, 'Rajkot', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(145, 'Sabarkantha', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(146, 'Surendranagar', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(147, 'Surat', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(148, 'BARODA(VADODaRA)', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(149, 'Valsad', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(150, 'Ambala', 6, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(151, 'Bhiwani', 6, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(152, 'Faridabad', 6, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(153, 'Fatehabad', 6, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(154, 'Gurgaon', 6, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(155, 'Hissar', 6, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(156, 'Jhajjar', 6, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(157, 'Jind', 6, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(158, 'Karnal', 6, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(159, 'Kaithal', 6, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(160, 'Kurukshetra', 6, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(161, 'Mahendragarh', 6, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(162, 'Mewat', 6, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(163, 'Panchkula', 6, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(164, 'Panipat', 6, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(165, 'Rewari', 6, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(166, 'Rohtak', 6, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(167, 'Sirsa', 6, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(168, 'Sonepat', 6, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(169, 'Yamuna Nagar', 6, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(170, 'Palwal', 6, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(171, 'Bilaspur', 7, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(172, 'Chamba', 7, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(173, 'Hamirpur', 7, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(174, 'Kangra', 7, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(175, 'Kinnaur', 7, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(176, 'Kulu', 7, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(177, 'Lahaul and Spiti', 7, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(178, 'Mandi', 7, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(179, 'Shimla', 7, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(180, 'Sirmaur', 7, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(181, 'Solan', 7, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(182, 'Una', 7, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(183, 'Anantnag', 8, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(184, 'Badgam', 8, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(185, 'Bandipore', 8, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(186, 'Baramula', 8, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(187, 'Doda', 8, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(188, 'Jammu', 8, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(189, 'Kargil', 8, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(190, 'Kathua', 8, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(191, 'Kupwara', 8, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(192, 'Leh', 8, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(193, 'Poonch', 8, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(194, 'Pulwama', 8, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(195, 'Rajauri', 8, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(196, 'Srinagar', 8, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(197, 'Samba', 8, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(198, 'Udhampur', 8, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(199, 'Bokaro', 34, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(200, 'Chatra', 34, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(201, 'Deoghar', 34, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(202, 'Dhanbad', 34, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(203, 'Dumka', 34, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(204, 'Purba Singhbhum', 34, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(205, 'Garhwa', 34, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(206, 'Giridih', 34, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(207, 'Godda', 34, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(208, 'Gumla', 34, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(209, 'Hazaribagh', 34, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(210, 'Koderma', 34, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(211, 'Lohardaga', 34, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(212, 'Pakur', 34, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(213, 'Palamu', 34, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(214, 'Ranchi', 34, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(215, 'Sahibganj', 34, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(216, 'Seraikela and Kharsawan', 34, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(217, 'Pashchim Singhbhum', 34, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(218, 'Ramgarh', 34, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(219, 'Bidar', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(220, 'Belgaum', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(221, 'BIJAPUR (VIJAYAPUR)', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(222, 'Bagalkot', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(223, 'Bellary', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(224, 'Bangalore Rural District', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(225, 'Bangalore Urban District', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(226, 'Chamarajnagar', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(227, 'Chikmagalur', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(228, 'Chitradurga', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(229, 'DAVANGARE', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(230, 'Dharwad', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(231, 'Dakshina Kannada', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(232, 'Gadag', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(233, 'Gulbarga', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(234, 'Hassan', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(235, 'Haveri', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(236, 'Kodagu', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(237, 'Kolar', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(238, 'Koppal', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(239, 'Mandya', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(240, 'Mysore', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(241, 'Raichur', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(242, 'Shimoga', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(243, 'Tumkur', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(244, 'Udupi', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(245, 'Uttara Kannada', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(246, 'Ramanagara', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(247, 'Chikballapur', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(248, 'Yadagiri', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(249, 'Alappuzha', 10, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(250, 'Ernakulam', 10, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(251, 'Idukki', 10, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(252, 'Kollam', 10, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(253, 'Kannur', 10, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(254, 'Kasaragod', 10, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(255, 'Kottayam', 10, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(256, 'Kozhikode', 10, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(257, 'Malappuram', 10, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(258, 'Palakkad', 10, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(259, 'Pathanamthitta', 10, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(260, 'Thrissur', 10, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(261, 'Thiruvananthapuram', 10, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(262, 'Wayanad', 10, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(263, 'Alirajpur', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(264, 'Anuppur', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(265, 'Ashok Nagar', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(266, 'Balaghat', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(267, 'Barwani', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(268, 'Betul', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(269, 'Bhind', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(270, 'Bhopal', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(271, 'Burhanpur', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(272, 'Chhatarpur', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(273, 'Chhindwara', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(274, 'Damoh', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(275, 'Datia', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(276, 'Dewas', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(277, 'Dhar', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(278, 'Dindori', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(279, 'Guna', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(280, 'Gwalior', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(281, 'Harda', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(282, 'Hoshangabad', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(283, 'Indore', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(284, 'Jabalpur', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(285, 'Jhabua', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(286, 'Katni', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(287, 'Khandwa', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(288, 'Khargone', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(289, 'Mandla', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(290, 'Mandsaur', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(291, 'Morena', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(292, 'Narsinghpur', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(293, 'Neemuch', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(294, 'Panna', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(295, 'Rewa', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(296, 'Rajgarh', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(297, 'Ratlam', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(298, 'Raisen', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(299, 'Sagar', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(300, 'Satna', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(301, 'Sehore', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(302, 'Seoni', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(303, 'Shahdol', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(304, 'Shajapur', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(305, 'Sheopur', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(306, 'Shivpuri', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(307, 'Sidhi', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(308, 'Singrauli', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(309, 'Tikamgarh', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(310, 'Ujjain', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(311, 'Umaria', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(312, 'Vidisha', 11, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(313, 'Ahmednagar', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(314, 'Akola', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(315, 'Amrawati', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(316, 'Aurangabad', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(317, 'Bhandara', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(318, 'Beed', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(319, 'Buldhana', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(320, 'Chandrapur', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(321, 'Dhule', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(322, 'Gadchiroli', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(323, 'Gondiya', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(324, 'Hingoli', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(325, 'Jalgaon', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(326, 'Jalna', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(327, 'Kolhapur', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(328, 'Latur', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(329, 'BOMBAY CITY', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(330, 'Mumbai suburban', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(331, 'Nandurbar', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(332, 'Nanded', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(333, 'Nagpur', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(334, 'Nashik', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(335, 'Osmanabad', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(336, 'Parbhani', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(337, 'Pune', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(338, 'Raigad', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(339, 'Ratnagiri', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(340, 'Sindhudurg', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(341, 'Sangli', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(342, 'Solapur', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(343, 'Satara', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(344, 'THANE-(BOMBAY)', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(345, 'Wardha', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(346, 'Washim', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(347, 'Yavatmal', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(348, 'Bishnupur', 13, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(349, 'Churachandpur', 13, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(350, 'Chandel', 13, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(351, 'Imphal East', 13, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(352, 'Senapati', 13, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(353, 'Tamenglong', 13, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(354, 'Thoubal', 13, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(355, 'Ukhrul', 13, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(356, 'Imphal West', 13, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(357, 'East Garo Hills', 14, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(358, 'East Khasi Hills', 14, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(359, 'Jaintia Hills', 14, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(360, 'Ri-Bhoi', 14, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(361, 'South Garo Hills', 14, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(362, 'West Garo Hills', 14, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(363, 'West Khasi Hills', 14, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(364, 'Aizawl', 15, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(365, 'Champhai', 15, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(366, 'Kolasib', 15, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(367, 'Lawngtlai', 15, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(368, 'Lunglei', 15, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(369, 'Mamit', 15, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(370, 'Saiha', 15, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(371, 'Serchhip', 15, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(372, 'Dimapur', 16, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(373, 'Kohima', 16, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(374, 'Mokokchung', 16, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(375, 'Mon', 16, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(376, 'Phek', 16, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(377, 'Tuensang', 16, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(378, 'Wokha', 16, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(379, 'Zunheboto', 16, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(380, 'Angul', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(381, 'Boudh', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(382, 'Bhadrak', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(383, 'Bolangir', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(384, 'Bargarh', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(385, 'Baleswar', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(386, 'Cuttack', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(387, 'Debagarh', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(388, 'Dhenkanal', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(389, 'Ganjam', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(390, 'Gajapati', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(391, 'Jharsuguda', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(392, 'Jajapur', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(393, 'Jagatsinghpur', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(394, 'Khordha', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(395, 'Kendujhar', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(396, 'Kalahandi', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(397, 'Kandhamal', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(398, 'Koraput', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(399, 'Kendrapara', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(400, 'Malkangiri', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(401, 'Mayurbhanj', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(402, 'Nabarangpur', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(403, 'Nuapada', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(404, 'Nayagarh', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(405, 'Puri', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(406, 'Rayagada', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(407, 'Sambalpur', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(408, 'Subarnapur', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(409, 'Sundargarh', 17, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(410, 'Karaikal', 27, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(411, 'Mahe', 27, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(412, 'Puducherry', 27, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(413, 'Yanam', 27, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(414, 'Amritsar', 18, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(415, 'Bathinda', 18, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(416, 'Firozpur', 18, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(417, 'Faridkot', 18, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(418, 'Fatehgarh Sahib', 18, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(419, 'Gurdaspur', 18, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(420, 'Hoshiarpur', 18, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(421, 'Jalandhar', 18, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(422, 'Kapurthala', 18, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(423, 'Ludhiana', 18, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(424, 'Mansa', 18, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(425, 'Moga', 18, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(426, 'Mukatsar', 18, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(427, 'Nawan Shehar', 18, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(428, 'Patiala', 18, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(429, 'Rupnagar', 18, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(430, 'Sangrur', 18, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(431, 'Ajmer', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(432, 'Alwar', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(433, 'BIKANER', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(434, 'Barmer', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(435, 'Banswara', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(436, 'Bharatpur', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(437, 'Baran', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(438, 'Bundi', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(439, 'Bhilwara', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(440, 'Churu', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(441, 'Chittorgarh', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(442, 'Dausa', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(443, 'Dholpur', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(444, 'Dungapur', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(445, 'Ganganagar', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(446, 'Hanumangarh', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(447, 'Juhnjhunun', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(449, 'Jodhpur', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(450, 'Jaipur', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(451, 'Jaisalmer', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(452, 'Jhalawar', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(453, 'Karauli', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(454, 'Kota', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(455, 'Nagaur', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(456, 'PALI MARWAR', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(457, 'Pratapgarh', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(458, 'Rajsamand', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(459, 'Sikar', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(460, 'Sawai Madhopur', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(461, 'Sirohi', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(462, 'Tonk', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(463, 'Udaipur', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(464, 'East Sikkim', 20, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(465, 'North Sikkim', 20, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(466, 'South Sikkim', 20, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(467, 'West Sikkim', 20, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(468, 'Ariyalur', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(469, 'Chennai', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(470, 'Coimbatore', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(471, 'Cuddalore', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(472, 'Dharmapuri', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(473, 'Dindigul', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(474, 'Erode', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(475, 'Kanchipuram', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(476, 'Kanyakumari', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(477, 'Karur', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(478, 'Madurai', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(479, 'Nagapattinam', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(480, 'The Nilgiris', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(481, 'Namakkal', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(482, 'Perambalur', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(483, 'Pudukkottai', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(484, 'Ramanathapuram', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(485, 'Salem', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(486, 'Sivagangai', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(487, 'Tiruppur', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(488, 'Tiruchirappalli', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(489, 'Theni', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(490, 'Tirunelveli', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(491, 'Thanjavur', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(492, 'Thoothukudi', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(493, 'Thiruvallur', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(494, 'Thiruvarur', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(495, 'Tiruvannamalai', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(496, 'Vellore', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(497, 'Villupuram', 21, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(498, 'Dhalai', 22, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(499, 'North Tripura', 22, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(500, 'South Tripura', 22, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(501, 'West Tripura', 22, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(502, 'Almora', 33, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(503, 'Bageshwar', 33, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(504, 'Chamoli', 33, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(505, 'Champawat', 33, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(506, 'Dehradun', 33, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(507, 'Haridwar', 33, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(508, 'Nainital', 33, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(509, 'Pauri Garhwal', 33, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(510, 'Pithoragharh', 33, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(511, 'Rudraprayag', 33, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(512, 'Tehri Garhwal', 33, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(513, 'Udham Singh Nagar', 33, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(514, 'Uttarkashi', 33, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(515, 'Agra', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(516, 'Allahabad', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(517, 'Aligarh', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(518, 'Ambedkar Nagar', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(519, 'Auraiya', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(520, 'Azamgarh', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(521, 'Barabanki', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(522, 'Badaun', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(523, 'Bagpat', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(524, 'Bahraich', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(525, 'Bijnor', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(526, 'Ballia', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(527, 'Banda', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(528, 'Balrampur', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(529, 'Bareilly', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(530, 'Basti', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(531, 'Bulandshahr', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(532, 'Chandauli', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(533, 'Chitrakoot', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(534, 'Deoria', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(535, 'Etah', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(536, 'Kanshiram Nagar', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(537, 'Etawah', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(538, 'Firozabad', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(539, 'Farrukhabad', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(540, 'Fatehpur', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(541, 'Faizabad', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(542, 'Gautam Buddha Nagar', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(543, 'Gonda', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(544, 'Ghazipur', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(545, 'Gorkakhpur', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(546, 'Ghaziabad', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(547, 'Hamirpur', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(548, 'Hardoi', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(549, 'Mahamaya Nagar', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(550, 'Jhansi', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(551, 'Jalaun', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(552, 'Jyotiba Phule Nagar', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(553, 'Jaunpur District', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(554, 'Kanpur Dehat', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(555, 'Kannauj', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(556, 'Kanpur Nagar', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(557, 'Kaushambi', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(558, 'Kushinagar', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(559, 'Lalitpur', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(560, 'Lakhimpur Kheri', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(561, 'Lucknow', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(562, 'Mau', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(563, 'Meerut', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(564, 'Maharajganj', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(565, 'Mahoba', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(566, 'Mirzapur', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(567, 'Moradabad', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(568, 'Mainpuri', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(569, 'Mathura', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(570, 'Muzaffarnagar', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(571, 'Pilibhit', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(572, 'Pratapgarh', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(573, 'Rampur', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(574, 'Rae Bareli', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(575, 'Saharanpur', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(576, 'Sitapur', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(577, 'Shahjahanpur', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(578, 'Sant Kabir Nagar', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(579, 'Siddharthnagar', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(580, 'Sonbhadra', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(581, 'Sant Ravidas Nagar', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(582, 'Sultanpur', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(583, 'Shravasti', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(584, 'Unnao', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(585, 'Varanasi', 23, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(586, 'Birbhum', 24, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(587, 'Bankura', 24, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(588, 'Bardhaman', 24, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(589, 'Darjeeling', 24, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(590, 'Dakshin Dinajpur', 24, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(591, 'Hooghly', 24, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(592, 'Howrah', 24, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(593, 'Jalpaiguri', 24, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(594, 'Cooch Behar', 24, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(595, 'Kolkata', 24, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(596, 'Malda', 24, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(597, 'Midnapore', 24, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(598, 'Murshidabad', 24, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(599, 'Nadia', 24, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(600, 'North 24 Parganas', 24, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(601, 'South 24 Parganas', 24, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(602, 'Purulia', 24, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(603, 'HUBLI', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(604, 'SIWANA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(605, 'HOSPET', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(606, 'KOTTUR', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(607, 'GANGAVATTI', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(608, 'KAMPLI', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(609, 'SOUNDATTI', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(610, 'MUDIGERE', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(611, 'HAGARIBOMMANHALLI', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(612, 'HADAGALI', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(613, 'AHEMDABAD', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(614, 'KUKNOOR', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(615, 'BANKAPUR', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(616, 'LAXMESHWER', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(617, 'BELLATTI', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(618, 'ANNIGERI', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(619, 'GUDGERI', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(620, 'HIRIYUR', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(621, 'NAVALGUND', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(622, 'NARGUND', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(623, 'BHADRAVATTI', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(624, 'CHHALLAKERE', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(625, 'HUVINA HADAGALI', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(626, 'HARIHAR', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(627, 'HARPANHALLI', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(628, 'HOLAL', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(629, 'MALLEBENNUR', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(630, 'RANEBENNUR', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(631, 'SAGAR', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(632, 'SHIKARIPUR', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(633, 'SHIRHATTI', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(634, 'SINDHANUR', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(635, 'BHAYANDARE(bombay )', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(636, 'BANGLORE', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(637, 'VIJAYAWADA', 1, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(638, 'VAPI', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(639, 'MUDHOL', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(640, 'kalyan-(bombay )', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(641, 'KHANAPUR', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(642, 'CHIKODI', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(643, 'HANGAL', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(644, 'ANKLESHWER', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(645, 'BHUJ', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(646, 'GANDHIDHAM', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(647, 'BHESWARA', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(648, 'BALOTRA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(649, 'DESURI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(650, 'SETRAVA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(651, 'AHORE', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(652, 'REODAR', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(653, 'AKKALKUWA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(654, 'SHAHADA', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(655, 'TALODA', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(656, 'DAUND', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(657, 'MALAD-(BOMBAY)', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(658, 'GOREGAV-(BOMBAY)', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(659, 'BORIWALI-(BOMBAY)', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(660, 'VASAI-(BOMBAY)', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(661, 'RATANAGIRI', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(662, 'HATKANGALA', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(663, 'MIRAJ', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(664, 'SANGALI', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(665, 'MADHAVNAGAR', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(666, 'AHEMADNAGAR', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(667, 'SINDKHEDA', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(668, 'CHANDERPUR', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(669, 'maysoru', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(670, 'BARDOLI', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(671, 'HALOL', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(672, 'ICHALKARANJI', 12, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(673, 'MARAMHNALLI', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(674, 'BAILONGAL', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(675, 'PALITANA', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(676, 'SIRA', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(678, 'MOKALSAR', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(680, 'KANANA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(681, 'SANCHORE', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(682, 'AMLARI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(683, 'BAYTU', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(684, 'ULLAI(GANGAPUR)', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(685, 'DATARAI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(686, 'POSITRA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(687, 'MANDAWLA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(688, 'BADMER', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(689, 'MADWARIYA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(690, 'DHUNDHADA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(691, 'SANDEROA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(692, 'PADRU', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(693, 'CHORAU', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(694, 'RAMNIYA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(695, 'REWATRA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(696, 'BALI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(697, 'KARMAVAS', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(698, 'POSALIYA', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(699, 'CHANCHORI', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(700, 'RANAVAS', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(701, 'TAPARA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(702, 'SAYALA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(703, 'BOPARI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(704, 'GANGASAHAR', 9, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(705, 'KHUDALA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(706, 'JIWANA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(707, 'BHANWARI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(708, 'ARTHWADA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(709, 'AJIT', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(710, 'BIJOVA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(711, 'JETHANTARI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(712, 'POSANA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(713, 'SANDERAO', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(714, 'SHIVGANJ', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(715, 'POMAVA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(716, 'MUNDARA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(717, 'REVATADA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(718, 'SAMDARI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(719, 'KAILASH NAGAR', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(720, 'DAYLANA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(721, 'BARLUT', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(722, 'HARJI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(723, 'SHEOGANJ', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(724, 'KALYANPUR', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(725, 'ASOTRA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(726, 'TAPRA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(727, 'TAKHATGARH', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(728, 'ANADARA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(729, 'ASADA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(730, 'DESURI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(731, 'SARAN', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(732, 'DUNDADA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(733, 'LUNAVA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(734, 'KOTH', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(735, 'KOTH BALIYAN', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(736, 'AGAWARI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(737, 'JOJAWER', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(738, 'SADADI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(739, 'SOJAT CITY', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(740, 'KOSHLAV', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(741, 'JALOR', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(742, 'NOVHI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(743, 'PATHEDI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(744, 'NIMAZ', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(745, 'JAWAL', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(746, 'EEDAWA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(747, 'RAJALDESAR', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(748, 'BEDANA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(749, 'NOKHMANDI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15');
INSERT INTO `cities` (`id`, `city`, `state_id`, `updated_at`, `created_at`) VALUES
(750, 'KUCHERA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(751, 'DANTARAI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(752, 'JUNA JOGAPURA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(753, 'UMEDABAD', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(754, 'RANDHA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(755, 'VAYATU', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(756, 'PACHAPADARA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(757, 'JABH', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(758, 'DHORIBANA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(759, 'GULABPURA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(760, 'BUSHI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(761, 'PLASANI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(762, 'PITAWALA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(763, 'SIYANA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(764, 'BAGAD', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(765, 'BARAR', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(766, 'VARADA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(767, 'SARAT', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(768, 'PADIV', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(769, 'KHANDAP', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(770, 'VADAGAO', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(771, 'GATAWAR', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(772, 'SUMERPUR', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(773, 'SIROHI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(774, 'NOKHA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(775, 'VOPARI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(776, 'SEWARDI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(777, 'SURANA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(778, 'BHANWARI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(779, 'BARANI KHURDA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(780, 'MALSABAVADI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(781, 'PARALU', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(782, 'BHINMAL', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(783, 'BHALRON KA WADA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(784, 'LAPOD', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(785, 'MANIHARI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(786, 'GUDA BALOTRA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(787, 'VAYAD', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(788, 'ASSADA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(789, 'NOKHA CHANDAVAT', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(790, 'BADGOUM', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(791, 'CHURA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(792, 'OTWALA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(793, 'BUCHETI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(794, 'VADI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(795, 'PIPAD CITY', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(796, 'RAMSIN', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(797, 'KHIVANDI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(798, 'JAVALI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(799, 'KRUSHNGANJ', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(800, 'UADH', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(801, 'SANWADA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(802, 'KALANDRI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(803, 'SIRODI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(804, 'DASPA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(805, 'KORANA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(806, 'DHONSA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(807, 'VALBHIPURAM', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(808, 'DESHNOK', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(809, 'BALESHER', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(810, 'RAKHI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(811, 'SOJAT ROAD', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(812, 'PARLU', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(813, 'BITHODA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(814, 'RANIDASIPURA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(815, 'SALAWAS', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(816, 'kuship', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(817, 'AKOLI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(818, 'TEST', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(819, 'JASOL', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(820, 'NADOL', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(821, 'BIDASAR', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(822, 'BHAVRANI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(823, 'DHINDAS', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(824, 'DHUMBDIYA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(825, 'JASVANTPURA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(826, 'FALODI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(827, 'RAITHAL', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(828, 'RAMA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(829, 'GHANERAO', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(830, 'AAUWA DEOLI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(831, 'AALASAN', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(832, 'ELANA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(833, 'PADARLI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(834, 'FALNA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(835, 'MANDAR', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(837, 'PACHHEGAM', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(838, 'BHAVNAGAR', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(839, 'DATA', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(840, 'MEHSHANA', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(841, 'KHARVA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(842, 'MANDANI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(843, 'AAGLOD', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(844, 'THARA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(845, 'GODAN', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(846, 'THUMBA', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(847, 'PACHEGAM', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(848, 'PAMERA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(849, 'UMEDPUR', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(850, 'BHESWADA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(851, 'CHANDARAI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(852, 'BANKALI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(853, 'DHNAPURA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(854, 'VADANWADI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(855, 'BADGOUV', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(856, 'THALI RNWADA', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(857, 'NANDASAN', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(858, 'DADESH', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(859, 'DHORAJI', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(860, 'MOTIPANELI', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(861, 'SANATALI', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(862, 'RAJKOT', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(863, 'PACHOD', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(864, 'BHOLGANDHA', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(865, 'KACH', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(866, 'AAGWARI', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(867, 'KHED BRAMHA', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(868, 'MANDAVI', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(870, 'CHANSAMA', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(871, 'DAGAM', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(872, 'KHEDABRAMA', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(873, 'PILVAI', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(874, 'AAGLODE', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(875, 'GUDHA BALOTAN', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(876, 'khimel', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(877, 'NAGORE', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(878, 'CHAMONDERI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(879, 'PAVATA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(880, 'SHRI RAMSEN', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(881, 'MEDATA CITY', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(882, 'AAU', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(883, 'DEWGAD', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(884, 'BAGARA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(885, 'RASISAR', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(886, 'DHAWA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(887, 'LASANI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(888, 'BAGAWAS', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(889, 'SIRYARI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(890, 'GUDA RAMSINGH', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(891, 'KHINWARA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(892, 'PICHAWA', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(893, 'SUJANGARH', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(894, 'MORSHIM', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(895, 'MAJHAL', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(896, 'BHADRAJUN', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(897, 'AGOLAI', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(898, 'BIJAYNAGAR', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(899, 'VAPI', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(900, 'SURAT', 5, '2023-02-17 15:14:32', '2023-02-17 15:09:15'),
(901, 'ABU ROAD', 19, '2023-02-17 15:14:32', '2023-02-17 15:09:15');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int NOT NULL,
  `name` varchar(45) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `created_at`) VALUES
(1, 'Andorra', '2023-02-17 15:09:40'),
(2, 'United Arab Emirates', '2023-02-17 15:09:40'),
(3, 'Afghanistan', '2023-02-17 15:09:40'),
(4, 'Antigua and Barbuda', '2023-02-17 15:09:40'),
(5, 'Anguilla', '2023-02-17 15:09:40'),
(6, 'Albania', '2023-02-17 15:09:40'),
(7, 'Armenia', '2023-02-17 15:09:40'),
(8, 'Angola', '2023-02-17 15:09:40'),
(9, 'Antarctica', '2023-02-17 15:09:40'),
(10, 'Argentina', '2023-02-17 15:09:40'),
(11, 'American Samoa', '2023-02-17 15:09:40'),
(12, 'Austria', '2023-02-17 15:09:40'),
(13, 'Australia', '2023-02-17 15:09:40'),
(14, 'Aruba', '2023-02-17 15:09:40'),
(15, 'Åland', '2023-02-17 15:09:40'),
(16, 'Azerbaijan', '2023-02-17 15:09:40'),
(17, 'Bosnia and Herzegovina', '2023-02-17 15:09:40'),
(18, 'Barbados', '2023-02-17 15:09:40'),
(19, 'Bangladesh', '2023-02-17 15:09:40'),
(20, 'Belgium', '2023-02-17 15:09:40'),
(21, 'Burkina Faso', '2023-02-17 15:09:40'),
(22, 'Bulgaria', '2023-02-17 15:09:40'),
(23, 'Bahrain', '2023-02-17 15:09:40'),
(24, 'Burundi', '2023-02-17 15:09:40'),
(25, 'Benin', '2023-02-17 15:09:40'),
(26, 'Saint Barthélemy', '2023-02-17 15:09:40'),
(27, 'Bermuda', '2023-02-17 15:09:40'),
(28, 'Brunei', '2023-02-17 15:09:40'),
(29, 'Bolivia', '2023-02-17 15:09:40'),
(30, 'Bonaire', '2023-02-17 15:09:40'),
(31, 'Brazil', '2023-02-17 15:09:40'),
(32, 'Bahamas', '2023-02-17 15:09:40'),
(33, 'Bhutan', '2023-02-17 15:09:40'),
(34, 'Bouvet Island', '2023-02-17 15:09:40'),
(35, 'Botswana', '2023-02-17 15:09:40'),
(36, 'Belarus', '2023-02-17 15:09:40'),
(37, 'Belize', '2023-02-17 15:09:40'),
(38, 'Canada', '2023-02-17 15:09:40'),
(39, 'Cocos [Keeling] Islands', '2023-02-17 15:09:40'),
(40, 'Democratic Republic of the Congo', '2023-02-17 15:09:40'),
(41, 'Central African Republic', '2023-02-17 15:09:40'),
(42, 'Republic of the Congo', '2023-02-17 15:09:40'),
(43, 'Switzerland', '2023-02-17 15:09:40'),
(45, 'Cook Islands', '2023-02-17 15:09:40'),
(46, 'Chile', '2023-02-17 15:09:40'),
(47, 'Cameroon', '2023-02-17 15:09:40'),
(48, 'China', '2023-02-17 15:09:40'),
(49, 'Colombia', '2023-02-17 15:09:40'),
(50, 'Costa Rica', '2023-02-17 15:09:40'),
(51, 'Cuba', '2023-02-17 15:09:40'),
(52, 'Cape Verde', '2023-02-17 15:09:40'),
(53, 'Curacao', '2023-02-17 15:09:40'),
(54, 'Christmas Island', '2023-02-17 15:09:40'),
(55, 'Cyprus', '2023-02-17 15:09:40'),
(56, 'Czech Republic', '2023-02-17 15:09:40'),
(57, 'Germany', '2023-02-17 15:09:40'),
(58, 'Djibouti', '2023-02-17 15:09:40'),
(59, 'Denmark', '2023-02-17 15:09:40'),
(60, 'Dominica', '2023-02-17 15:09:40'),
(61, 'Dominican Republic', '2023-02-17 15:09:40'),
(62, 'Algeria', '2023-02-17 15:09:40'),
(63, 'Ecuador', '2023-02-17 15:09:40'),
(64, 'Estonia', '2023-02-17 15:09:40'),
(65, 'Egypt', '2023-02-17 15:09:40'),
(66, 'Western Sahara', '2023-02-17 15:09:40'),
(67, 'Eritrea', '2023-02-17 15:09:40'),
(68, 'Spain', '2023-02-17 15:09:40'),
(69, 'Ethiopia', '2023-02-17 15:09:40'),
(70, 'Finland', '2023-02-17 15:09:40'),
(71, 'Fiji', '2023-02-17 15:09:40'),
(72, 'Falkland Islands', '2023-02-17 15:09:40'),
(73, 'Micronesia', '2023-02-17 15:09:40'),
(74, 'Faroe Islands', '2023-02-17 15:09:40'),
(75, 'France', '2023-02-17 15:09:40'),
(76, 'Gabon', '2023-02-17 15:09:40'),
(77, 'United Kingdom', '2023-02-17 15:09:40'),
(78, 'Grenada', '2023-02-17 15:09:40'),
(79, 'Georgia', '2023-02-17 15:09:40'),
(80, 'French Guiana', '2023-02-17 15:09:40'),
(81, 'Guernsey', '2023-02-17 15:09:40'),
(82, 'Ghana', '2023-02-17 15:09:40'),
(83, 'Gibraltar', '2023-02-17 15:09:40'),
(84, 'Greenland', '2023-02-17 15:09:40'),
(85, 'Gambia', '2023-02-17 15:09:40'),
(86, 'Guinea', '2023-02-17 15:09:40'),
(87, 'Guadeloupe', '2023-02-17 15:09:40'),
(88, 'Equatorial Guinea', '2023-02-17 15:09:40'),
(89, 'Greece', '2023-02-17 15:09:40'),
(90, 'South Georgia and the South Sandwich Islands', '2023-02-17 15:09:40'),
(91, 'Guatemala', '2023-02-17 15:09:40'),
(92, 'Guam', '2023-02-17 15:09:40'),
(93, 'Guinea-Bissau', '2023-02-17 15:09:40'),
(94, 'Guyana', '2023-02-17 15:09:40'),
(95, 'Hong Kong', '2023-02-17 15:09:40'),
(96, 'Heard Island and McDonald Islands', '2023-02-17 15:09:40'),
(97, 'Honduras', '2023-02-17 15:09:40'),
(98, 'Croatia', '2023-02-17 15:09:40'),
(99, 'Haiti', '2023-02-17 15:09:40'),
(100, 'Hungary', '2023-02-17 15:09:40'),
(105, 'India', '2023-02-17 15:09:40'),
(106, 'British Indian Ocean Territory', '2023-02-17 15:09:40'),
(109, 'Iceland', '2023-02-17 15:09:40'),
(111, 'Jersey', '2023-02-17 15:09:40'),
(112, 'Jamaica', '2023-02-17 15:09:40'),
(113, 'Jordan', '2023-02-17 15:09:40'),
(114, 'Japan', '2023-02-17 15:09:40'),
(115, 'Kenya', '2023-02-17 15:09:40'),
(116, 'Kyrgyzstan', '2023-02-17 15:09:40'),
(117, 'Cambodia', '2023-02-17 15:09:40'),
(118, 'Kiribati', '2023-02-17 15:09:40'),
(119, 'Comoros', '2023-02-17 15:09:40'),
(120, 'Saint Kitts and Nevis', '2023-02-17 15:09:40'),
(121, 'North Korea', '2023-02-17 15:09:40'),
(122, 'South Korea', '2023-02-17 15:09:40'),
(123, 'Kuwait', '2023-02-17 15:09:40'),
(124, 'Cayman Islands', '2023-02-17 15:09:40'),
(125, 'Kazakhstan', '2023-02-17 15:09:40'),
(126, 'Laos', '2023-02-17 15:09:40'),
(127, 'Lebanon', '2023-02-17 15:09:40'),
(128, 'Saint Lucia', '2023-02-17 15:09:40'),
(129, 'Liechtenstein', '2023-02-17 15:09:40'),
(130, 'Sri Lanka', '2023-02-17 15:09:40'),
(131, 'Liberia', '2023-02-17 15:09:40'),
(132, 'Lesotho', '2023-02-17 15:09:40'),
(133, 'Lithuania', '2023-02-17 15:09:40'),
(134, 'Luxembourg', '2023-02-17 15:09:40'),
(135, 'Latvia', '2023-02-17 15:09:40'),
(136, 'Libya', '2023-02-17 15:09:40'),
(137, 'Morocco', '2023-02-17 15:09:40'),
(138, 'Monaco', '2023-02-17 15:09:40'),
(139, 'Moldova', '2023-02-17 15:09:40'),
(140, 'Montenegro', '2023-02-17 15:09:40'),
(141, 'Saint Martin', '2023-02-17 15:09:40'),
(143, 'Marshall Islands', '2023-02-17 15:09:40'),
(144, 'Macedonia', '2023-02-17 15:09:40'),
(145, 'Mali', '2023-02-17 15:09:40'),
(146, 'Myanmar [Burma]', '2023-02-17 15:09:40'),
(147, 'Mongolia', '2023-02-17 15:09:40'),
(148, 'Macao', '2023-02-17 15:09:40'),
(149, 'Northern Mariana Islands', '2023-02-17 15:09:40'),
(150, 'Martinique', '2023-02-17 15:09:40'),
(151, 'Mauritania', '2023-02-17 15:09:40'),
(152, 'Montserrat', '2023-02-17 15:09:40'),
(153, 'Malta', '2023-02-17 15:09:40'),
(154, 'Mauritius', '2023-02-17 15:09:40'),
(155, 'Maldives', '2023-02-17 15:09:40'),
(156, 'Malawi', '2023-02-17 15:09:40'),
(157, 'Mexico', '2023-02-17 15:09:40'),
(158, 'Malaysia', '2023-02-17 15:09:40'),
(159, 'Mozambique', '2023-02-17 15:09:40'),
(160, 'Namibia', '2023-02-17 15:09:40'),
(161, 'New Caledonia', '2023-02-17 15:09:40'),
(162, 'Niger', '2023-02-17 15:09:40'),
(163, 'Norfolk Island', '2023-02-17 15:09:40'),
(164, 'Nigeria', '2023-02-17 15:09:40'),
(165, 'Nicaragua', '2023-02-17 15:09:40'),
(166, 'Netherlands', '2023-02-17 15:09:40'),
(167, 'Norway', '2023-02-17 15:09:40'),
(168, 'Nepal', '2023-02-17 15:09:40'),
(169, 'Nauru', '2023-02-17 15:09:40'),
(170, 'Niue', '2023-02-17 15:09:40'),
(171, 'New Zealand', '2023-02-17 15:09:40'),
(172, 'Oman', '2023-02-17 15:09:40'),
(173, 'Panama', '2023-02-17 15:09:40'),
(174, 'Peru', '2023-02-17 15:09:40'),
(175, 'French Polynesia', '2023-02-17 15:09:40'),
(176, 'Papua New Guinea', '2023-02-17 15:09:40'),
(177, 'Philippines', '2023-02-17 15:09:40'),
(178, 'Pakistan', '2023-02-17 15:09:40'),
(179, 'Poland', '2023-02-17 15:09:40'),
(180, 'Saint Pierre and Miquelon', '2023-02-17 15:09:40'),
(181, 'Pitcairn Islands', '2023-02-17 15:09:40'),
(182, 'Puerto Rico', '2023-02-17 15:09:40'),
(183, 'Palestine', '2023-02-17 15:09:40'),
(184, 'Portugal', '2023-02-17 15:09:40'),
(185, 'Palau', '2023-02-17 15:09:40'),
(186, 'Paraguay', '2023-02-17 15:09:40'),
(187, 'Qatar', '2023-02-17 15:09:40'),
(188, 'Réunion', '2023-02-17 15:09:40'),
(189, 'Romania', '2023-02-17 15:09:40'),
(190, 'Serbia', '2023-02-17 15:09:40'),
(191, 'Russia', '2023-02-17 15:09:40'),
(192, 'Rwanda', '2023-02-17 15:09:40'),
(193, 'Saudi Arabia', '2023-02-17 15:09:40'),
(194, 'Solomon Islands', '2023-02-17 15:09:40'),
(195, 'Seychelles', '2023-02-17 15:09:40'),
(196, 'Sudan', '2023-02-17 15:09:40'),
(197, 'Sweden', '2023-02-17 15:09:40'),
(198, 'Singapore', '2023-02-17 15:09:40'),
(199, 'Saint Helena', '2023-02-17 15:09:40'),
(200, 'Slovenia', '2023-02-17 15:09:40'),
(201, 'Svalbard and Jan Mayen', '2023-02-17 15:09:40'),
(202, 'Slovakia', '2023-02-17 15:09:40'),
(203, 'Sierra Leone', '2023-02-17 15:09:40'),
(204, 'San Marino', '2023-02-17 15:09:40'),
(205, 'Senegal', '2023-02-17 15:09:40'),
(206, 'Somalia', '2023-02-17 15:09:40'),
(207, 'Suriname', '2023-02-17 15:09:40'),
(208, 'South Sudan', '2023-02-17 15:09:40'),
(209, 'São Tomé and Príncipe', '2023-02-17 15:09:40'),
(210, 'El Salvador', '2023-02-17 15:09:40'),
(211, 'Sint Maarten', '2023-02-17 15:09:40'),
(212, 'Syria', '2023-02-17 15:09:40'),
(213, 'Swaziland', '2023-02-17 15:09:40'),
(214, 'Turks and Caicos Islands', '2023-02-17 15:09:40'),
(215, 'Chad', '2023-02-17 15:09:40'),
(216, 'French Southern Territories', '2023-02-17 15:09:40'),
(217, 'Togo', '2023-02-17 15:09:40'),
(218, 'Thailand', '2023-02-17 15:09:40'),
(219, 'Tajikistan', '2023-02-17 15:09:40'),
(220, 'Tokelau', '2023-02-17 15:09:40'),
(221, 'East Timor', '2023-02-17 15:09:40'),
(222, 'Turkmenistan', '2023-02-17 15:09:40'),
(223, 'Tunisia', '2023-02-17 15:09:40'),
(224, 'Tonga', '2023-02-17 15:09:40'),
(225, 'Turkey', '2023-02-17 15:09:40'),
(226, 'Trinidad and Tobago', '2023-02-17 15:09:40'),
(227, 'Tuvalu', '2023-02-17 15:09:40'),
(228, 'Taiwan', '2023-02-17 15:09:40'),
(229, 'Tanzania', '2023-02-17 15:09:40'),
(230, 'Ukraine', '2023-02-17 15:09:40'),
(231, 'Uganda', '2023-02-17 15:09:40'),
(232, 'U.S. Minor Outlying Islands', '2023-02-17 15:09:40'),
(233, 'United States', '2023-02-17 15:09:40'),
(234, 'Uruguay', '2023-02-17 15:09:40'),
(235, 'Uzbekistan', '2023-02-17 15:09:40'),
(236, 'Vatican City', '2023-02-17 15:09:40');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int NOT NULL,
  `avtar_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `father_husband_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname_id` int DEFAULT NULL,
  `panth_id` int DEFAULT NULL,
  `patti_id` int DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` tinyint DEFAULT NULL COMMENT '1 for male, 2 for female',
  `phone_no` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `alt_phone_no` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_id` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `blood_group_id` int DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_id` int DEFAULT NULL,
  `state_id` int DEFAULT NULL,
  `status` tinyint DEFAULT NULL COMMENT '1 for merried, 2 for unmerried, 3 for expired, 4 for divorce',
  `time_of_birth` time DEFAULT NULL,
  `birth_place` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_anniversary` date DEFAULT NULL COMMENT 'if status is married then required',
  `sasural_gautra_id` int DEFAULT NULL COMMENT 'if status is married then required',
  `date_of_expired` date DEFAULT NULL COMMENT 'if status is expired then required',
  `education` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `native_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `native_pincode` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `native_state_id` int DEFAULT NULL,
  `native_city_id` int DEFAULT NULL,
  `business_category_id` int DEFAULT NULL,
  `company_firm_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `business_designation` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `business_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `business_pincode` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `business_state_id` int DEFAULT NULL,
  `business_city_id` int DEFAULT NULL,
  `system_status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 for pending, 1 for approved, 2 for reject',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `otp` int DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `avtar_url`, `first_name`, `father_husband_name`, `surname_id`, `panth_id`, `patti_id`, `date_of_birth`, `gender`, `phone_no`, `alt_phone_no`, `email_id`, `blood_group_id`, `address`, `pincode`, `city_id`, `state_id`, `status`, `time_of_birth`, `birth_place`, `date_of_anniversary`, `sasural_gautra_id`, `date_of_expired`, `education`, `native_address`, `native_pincode`, `native_state_id`, `native_city_id`, `business_category_id`, `company_firm_name`, `business_designation`, `business_address`, `business_pincode`, `business_state_id`, `business_city_id`, `system_status`, `comment`, `otp`, `token`, `start`, `end`, `created_at`, `updated_at`) VALUES
(39, '/public/avtar/438424480prakashji himatmalji shah.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '04UJrAhalT', NULL, NULL, '2023-01-09 09:34:41', '2023-02-17 14:11:57'),
(40, '/public/avtar/avtar_1677157168.jpg', 'KUNAL', 'PRAKASHJI', 137, 8, 4, '1990-07-01', 1, '9448823465', NULL, NULL, 4, 'SHANTINAGAR', '580020', 603, 9, 3, NULL, NULL, NULL, NULL, '2023-01-09', NULL, NULL, NULL, 19, 714, NULL, 'EYE SHEWER', 'PROP', 'DESPANDE NAGAR', NULL, 9, 603, 1, NULL, NULL, 'zZ1CCJhR1k', '2023-01-09', '2024-01-08', '2023-01-09 09:43:07', '2023-02-23 13:01:29'),
(17, '/public/avtar/671637844laravel.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'LGwMddofRy', NULL, NULL, '2022-12-14 23:38:21', '2023-02-17 14:11:57'),
(18, '/public/avtar/1334756028laravel.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'MtULnEb3bp', NULL, NULL, '2022-12-14 23:56:23', '2023-02-17 14:11:57'),
(19, '/public/avtar/818688653caneda2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'PLu9WDjkjl', NULL, NULL, '2022-12-15 00:07:13', '2023-02-17 14:11:57'),
(20, '/public/avtar/951689234caneda2.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'kEYv2KOFlr', NULL, NULL, '2022-12-15 00:10:03', '2023-02-17 14:11:57'),
(21, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'yHzLzCufIn', NULL, NULL, '2022-12-15 00:11:08', '2023-02-17 14:11:57'),
(22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'yHzLzCufIn', NULL, NULL, '2022-12-15 00:12:13', '2023-02-17 14:11:57'),
(32, NULL, 'BABULALJI', 'RAMESHJI', 62, 11, 2, '1970-01-01', 1, '9480885872', NULL, NULL, 2, NULL, NULL, 232, 9, 1, NULL, NULL, '1970-01-01', 51, NULL, NULL, NULL, NULL, 19, 604, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 'VSy0v6WEpg', '2023-01-03', '2024-01-02', '2023-01-03 08:02:42', '2023-02-17 14:11:57'),
(33, NULL, 'BHARAT', 'RAVINDERKUMAR', 47, 11, 2, '1987-06-05', 1, '9374912424', '9426889188', NULL, NULL, NULL, NULL, 638, 5, 1, NULL, NULL, '2012-01-15', 51, NULL, 'B.COM', NULL, NULL, 19, 604, 12, 'R.K.ELECTRICAL', 'PROP', 'SHOP NO 1 PREM NIVAS\r\nNEAR GAYTRY HARDWEAR', '396195', 5, 638, 1, NULL, NULL, 'g7WoezmVK6', '2023-01-03', '2024-01-02', '2023-01-03 08:10:41', '2023-02-17 14:11:57'),
(34, '/public/avtar/avtar_1677157974.jpg', 'ASHISH', 'HASTIMALJI', 134, 12, 4, '1987-11-11', 1, '9448267050', NULL, NULL, NULL, NULL, NULL, 603, 9, 1, NULL, NULL, '2000-11-11', 3, NULL, NULL, NULL, NULL, 19, 691, 21, 'HIND BOOK MANUFACTORE', 'PROP', 'KANCHAGAR GALLI', '580028', 9, 603, 1, NULL, NULL, 'EtSNdPYUNM', '2023-01-03', '2024-01-02', '2023-01-03 08:23:31', '2023-02-23 13:12:54'),
(26, NULL, NULL, NULL, NULL, 1, NULL, '2022-12-16', 1, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, 2, NULL, NULL, NULL, NULL, NULL, 'BA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'bJ68AE5zAQ', NULL, NULL, '2022-12-15 23:41:06', '2023-02-17 14:11:57'),
(31, NULL, 'LALITH', 'MOHANLALJI', 121, 8, 2, '1973-02-05', 1, '9448866569', NULL, 'lalitguleccha@gmail.com', 7, 'S-1 2ND FLOOR RAJENDRA RESIDENCY MANGALWAR PETH', '580028', 603, 9, 1, NULL, NULL, '1998-06-18', 101, NULL, 'D.FARMA', 'PADARU KI WAS', NULL, 19, 604, 12, 'JAI BHARAT ELECTRICS', 'PROP', 'MAIDAR ONI', '580028', 9, 603, 1, NULL, NULL, 'Hst7AboZKJ', '2022-12-25', '2023-12-24', '2022-12-25 00:04:08', '2023-02-23 12:45:15'),
(30, '/public/avtar/avtar_1677157946.jpg', 'ASHOK', 'GIRDHARILALJI', 8, 8, 2, '1971-11-01', 1, '9448368046', '08364255300', 'ABCHUBLI2003@GMAIL.COM', 7, 'ARLIKATTI ONI', '580028', 249, 10, 1, NULL, NULL, '1994-05-12', 47, NULL, 'B.COM', 'ARLIKATTI ONI', '580028', 19, NULL, 5, 'NAVKAR GARMENT', 'PROP', 'ARLIKATTI ONI', '580028', 9, 603, 1, NULL, NULL, 'Zjvdt91aIj', '2022-12-24', '2023-12-23', '2022-12-24 04:59:22', '2023-02-23 13:12:26');

-- --------------------------------------------------------

--
-- Table structure for table `family_member`
--

CREATE TABLE `family_member` (
  `id` int NOT NULL,
  `cust_id` int NOT NULL,
  `avtar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint DEFAULT NULL COMMENT '1 for male and 2 for female',
  `phone_no` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `relationship_id` int DEFAULT NULL,
  `status` int DEFAULT NULL COMMENT '1 for merried, 2 for unmerried, 3 for expired, 4 for divorce',
  `time_of_birth` time DEFAULT NULL,
  `birth_place` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_of_anniversary` date DEFAULT NULL COMMENT 'if status is 1',
  `date_of_expire` date DEFAULT NULL COMMENT 'if status is 3',
  `date_of_time` time DEFAULT NULL COMMENT '!married || !expired',
  `date_of_place` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '!married || !expired',
  `about` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `education` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `blood_group_id` int DEFAULT NULL,
  `panth_id` int DEFAULT NULL,
  `allow_matrimony` tinyint NOT NULL DEFAULT '0',
  `naniyal_gautra_id` int DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `family_member`
--

INSERT INTO `family_member` (`id`, `cust_id`, `avtar`, `name`, `gender`, `phone_no`, `relationship_id`, `status`, `time_of_birth`, `birth_place`, `date_of_anniversary`, `date_of_expire`, `date_of_time`, `date_of_place`, `about`, `education`, `blood_group_id`, `panth_id`, `allow_matrimony`, `naniyal_gautra_id`, `date_of_birth`, `token`, `created_at`, `updated_at`) VALUES
(2, 24, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'JNMaAiLxf0', '2022-12-15 23:28:12', '2023-02-17 14:11:57'),
(4, 25, '/public/avtar/654423531profile.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '6ERFHTHwVq', '2022-12-16 03:45:03', '2023-02-17 14:11:57'),
(6, 24, '/public/avtar/1538296076laravel.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '7Q7OuqMApm', '2022-12-16 04:10:10', '2023-02-17 14:11:57'),
(20, 34, '/public/avtar/2056574878UMEDMALJI  SAKARIYA.jpg', 'स्व,श्री उमेदमलजी मेघराजजी साकरिया (सांडेराव -हुबली )', 1, NULL, 2, 3, NULL, NULL, NULL, '2016-01-03', NULL, NULL, 'श्रद्धावन्त परिवार:-श्रीमती सायर बाई पुत्र भरत-कुसुम विमल-अलका पुत्री उषा - रेणुका पोता - शौर्य हरसिल एवं समस्त साकरिया परिवार फर्म गैलेक्सी अपैरल हुबली', NULL, NULL, 5, 0, NULL, '1940-01-01', 'qVtD7t2kFg', '2023-01-03 08:46:28', '2023-02-17 14:11:57'),
(19, 34, '/public/avtar/581740036FULCHANDJI SAKARIYA.jpg', NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '0YfUIpufYQ', '2023-01-03 08:23:58', '2023-02-17 14:11:57'),
(11, 1, 'यह एक हिंदी पाठ है', 'यह एक हिंदी पाठ है', 1, 'यह एक हिंदी पाठ है', 1, 1, NULL, NULL, '2022-12-08', '2022-12-08', NULL, NULL, 'यह एक हिंदी पाठ है', 'यह एक हिंदी पाठ है', 1, 1, 1, NULL, '2022-12-17', 'यह एक हिंदी पाठ है', '2022-12-17 11:34:20', '2023-02-17 14:11:57'),
(12, 28, '/public/avtar/687880693profile.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'XpJ65Ia66y', '2022-12-19 22:41:12', '2023-02-17 14:11:57'),
(23, 29, NULL, 'khusbu mahenderji bafna', 2, NULL, 14, 2, '10:05:00', 'gadag', NULL, NULL, NULL, NULL, NULL, 'bba', NULL, 11, 1, 4, '2000-01-05', 'IYPHl21aea', '2023-01-05 00:02:15', '2023-02-17 14:11:57'),
(14, 28, '/public/avtar/1117870236profile.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '1HjneWxwpv', '2022-12-19 22:43:12', '2023-02-17 14:11:57'),
(15, 25, '/public/avtar/1433729968caneda2.jpg', 'Person is expired (family member)', 1, '9858545547', 1, 3, NULL, NULL, NULL, '2022-12-24', NULL, NULL, 'This is a about of sradhanjli', NULL, NULL, NULL, 0, NULL, '2022-12-24', '9cL5ftqeGE', '2022-12-23 20:58:46', '2023-02-17 14:11:57'),
(17, 31, '/public/avtar/318690816rohinidevi golecha hubli.jpg', NULL, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 'MBPZfSjCgp', '2022-12-25 00:08:12', '2023-02-17 14:11:57'),
(18, 31, '/public/avtar/1563106827rohinidevi golecha hubli.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '4ruxo0gCw8', '2022-12-25 00:12:43', '2023-02-17 14:11:57'),
(25, 40, '/public/avtar/avtar_1677163637.jpg', 'ABc', 1, '56454', 1, 1, NULL, NULL, '2023-02-21', NULL, NULL, NULL, 'jhghgf', 'hg', 6, 2, 0, NULL, NULL, 'eomQOxz24J', '2023-02-23 14:47:17', '2023-02-23 14:47:34');

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

CREATE TABLE `group` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'TEST', '2023-02-17 14:11:57', '2023-02-17 14:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `matrimony`
--

CREATE TABLE `matrimony` (
  `id` int NOT NULL,
  `avtar_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gautra` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nanihal_gautra` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_of_birth` date NOT NULL,
  `birth_time` time NOT NULL,
  `birth_place` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `blood_group` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `education` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `designation` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `company` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `office_no` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `city_id` int NOT NULL,
  `state_id` int NOT NULL,
  `father_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mother_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sister_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `brother_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customer_id` int NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `matrimony`
--

INSERT INTO `matrimony` (`id`, `avtar_url`, `full_name`, `gautra`, `nanihal_gautra`, `date_of_birth`, `birth_time`, `birth_place`, `blood_group`, `education`, `designation`, `company`, `office_no`, `address`, `city_id`, `state_id`, `father_name`, `mother_name`, `sister_name`, `brother_name`, `created_at`, `updated_at`, `customer_id`, `is_approved`, `comment`) VALUES
(2, '/public/matrimony_profile/138879134013353lavji_badshah.jpeg', 'sandeep surti', 'surti', 'surti', '2022-11-10', '13:42:00', 'Surat', 'A+', 'PHD', 'Software engineer', 'Narola Infotech', '9652325623', 'This is a helllo test address', 147, 5, 'Himat bhai', 'Premila ben', 'niharika', 'bhavesh', '2022-11-23 02:42:52', '2023-02-17 14:11:57', 0, 0, NULL),
(3, '/public/matrimony_profile/1365632972.jpeg', 'Scott Kennedy edit', 'Quisquam magni ipsum', 'Aliquip duis amet r', '1989-05-05', '16:09:00', 'Incididunt voluptas', 'Aut adipisci ab volu', 'Porro fugiat consect', 'Omnis incididunt et', 'Clarke Oneil Co', 'Qui natus dolore qui', 'Molestiae exercitati', 147, 5, 'Donna Preston', 'Camille Delaney', 'Joelle Petersen', 'Lois Simpson', '2022-11-23 04:22:11', '2023-02-17 14:11:57', 2, 0, NULL),
(4, '/public/matrimony_profile/2128999145agent1.jpg', 'Hello Test edit', 'Patel edit', 'Patel', '2022-11-25', '17:14:00', 'Incididunt voluptas', 'A+', 'BCA', 'Software engineer', 'Narola Infotech', '9652325623', 'This is a helllo test address', 147, 5, 'Himat bhai', 'Premila ben', 'niharika', 'bhavesh', '2022-11-25 06:15:09', '2023-02-17 14:11:57', 14, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `native_place`
--

CREATE TABLE `native_place` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `native_place`
--

INSERT INTO `native_place` (`id`, `name`, `created_at`, `updated_at`) VALUES
(7, 'MOKALSAR (RAJ)', '2022-12-17 07:28:18', '2023-02-17 14:11:57'),
(8, 'SIWANA', '2022-12-17 07:32:02', '2023-02-17 14:11:57'),
(9, 'KANANA (RAJ)', '2022-12-17 07:33:11', '2023-02-17 14:11:57'),
(10, 'SANCHORE (RAJ)', '2022-12-17 07:33:24', '2023-02-17 14:11:57'),
(11, 'AMLARI (RAJ)', '2022-12-17 07:33:35', '2023-02-17 14:11:57'),
(12, 'AHOR (RAJ)', '2022-12-17 07:33:52', '2023-02-17 14:11:57'),
(13, 'ULLAI(GANGAPUR)', '2022-12-17 07:34:05', '2023-02-17 14:11:57'),
(14, 'DATARAI', '2022-12-17 07:34:17', '2023-02-17 14:11:57'),
(15, 'POSITRA', '2022-12-17 07:34:30', '2023-02-17 14:11:57'),
(16, 'AMALARI', '2022-12-17 07:34:41', '2023-02-17 14:11:57'),
(17, 'MANDAWLA', '2022-12-17 07:34:53', '2023-02-17 14:11:57'),
(18, 'BADMER', '2022-12-17 07:35:08', '2023-02-17 14:11:57'),
(19, 'MADWARIYA', '2022-12-17 07:35:18', '2023-02-17 14:11:57'),
(20, 'JODHPUR', '2022-12-17 07:35:30', '2023-02-17 14:11:57'),
(21, 'DHUNDHADA', '2022-12-17 07:35:40', '2023-02-17 14:11:57'),
(22, 'SANDEROA', '2022-12-17 07:35:53', '2023-02-17 14:11:57'),
(23, 'BHANWARI', '2022-12-17 07:36:04', '2023-02-17 14:11:57'),
(24, 'PADRU', '2022-12-17 07:36:14', '2023-02-17 14:11:57'),
(25, 'CHORAU', '2022-12-17 07:36:25', '2023-02-17 14:11:57'),
(26, 'RAMNIYA', '2022-12-17 07:36:35', '2023-02-17 14:11:57'),
(27, 'REWATRA', '2022-12-17 07:36:50', '2023-02-17 14:11:57'),
(28, 'BALI', '2022-12-17 07:37:06', '2023-02-17 14:11:57'),
(29, 'KARMAVAS', '2022-12-17 07:37:21', '2023-02-17 14:11:57'),
(30, 'POSALIYA', '2022-12-17 07:37:37', '2023-02-17 14:11:57'),
(31, 'CHANCHORI', '2022-12-17 07:37:56', '2023-02-17 14:11:57'),
(32, 'RANAVAS', '2022-12-17 07:38:08', '2023-02-17 14:11:57'),
(35, 'TAPARA', '2022-12-17 07:39:19', '2023-02-17 14:11:57'),
(36, 'SAYALA', '2022-12-17 07:39:31', '2023-02-17 14:11:57'),
(37, 'BALOTRA', '2022-12-17 07:39:45', '2023-02-17 14:11:57'),
(38, 'BOPARI', '2022-12-17 07:40:02', '2023-02-17 14:11:57'),
(39, 'GANGASAHAR', '2022-12-17 07:40:15', '2023-02-17 14:11:57'),
(40, 'KHUDALA', '2022-12-17 07:40:29', '2023-02-17 14:11:57'),
(41, 'JIWANA', '2022-12-17 07:40:44', '2023-02-17 14:11:57'),
(42, 'ARTHWADA', '2022-12-17 07:40:56', '2023-02-17 14:11:57'),
(43, 'AJIT', '2022-12-17 07:41:10', '2023-02-17 14:11:57'),
(44, 'BIJOVA', '2022-12-17 07:41:21', '2023-02-17 14:11:57'),
(45, 'JETHANTARI', '2022-12-17 07:41:32', '2023-02-17 14:11:57'),
(46, 'BIKANER', '2022-12-17 07:41:49', '2023-02-17 14:11:57'),
(47, 'POSANA', '2022-12-17 07:42:04', '2023-02-17 14:11:57'),
(48, 'SANDERAO', '2022-12-17 07:42:22', '2023-02-17 14:11:57'),
(49, 'SHIVGANJ', '2022-12-17 07:42:35', '2023-02-17 14:11:57'),
(50, 'POMAVA', '2022-12-17 07:42:47', '2023-02-17 14:11:57'),
(51, 'MUNDARA', '2022-12-17 07:42:59', '2023-02-17 14:11:57'),
(52, 'REVATADA', '2022-12-17 07:43:13', '2023-02-17 14:11:57'),
(53, 'SAMDARI', '2022-12-17 07:43:26', '2023-02-17 14:11:57'),
(54, 'KAILASH NAGAR', '2022-12-17 07:43:40', '2023-02-17 14:11:57'),
(55, 'DAYLANA', '2022-12-17 07:43:54', '2023-02-17 14:11:57'),
(56, 'BARLUT', '2022-12-17 07:44:12', '2023-02-17 14:11:57'),
(57, 'HARJI', '2022-12-17 07:44:22', '2023-02-17 14:11:57'),
(58, 'SHEOGANJ', '2022-12-17 07:44:33', '2023-02-17 14:11:57'),
(59, 'KALYANPUR', '2022-12-17 07:44:45', '2023-02-17 14:11:57'),
(60, 'ASOTRA', '2022-12-17 07:44:54', '2023-02-17 14:11:57'),
(61, 'TAPRA', '2022-12-17 07:45:07', '2023-02-17 14:11:57'),
(62, 'TAKHATGARH', '2022-12-17 07:45:18', '2023-02-17 14:11:57'),
(63, 'ANADARA', '2022-12-17 07:45:27', '2023-02-17 14:11:57'),
(64, 'ASADA', '2022-12-17 07:45:36', '2023-02-17 14:11:57'),
(65, 'DESURI', '2022-12-17 07:45:45', '2023-02-17 14:11:57'),
(66, 'SARAN', '2022-12-17 07:46:00', '2023-02-17 14:11:57'),
(67, 'DUNDADA', '2022-12-17 07:46:08', '2023-02-17 14:11:57'),
(68, 'LUNAVA', '2022-12-17 07:46:17', '2023-02-17 14:11:57'),
(69, 'PALI- MARWAD', '2022-12-17 07:46:26', '2023-02-17 14:11:57'),
(70, 'KOTH', '2022-12-17 07:46:35', '2023-02-17 14:11:57'),
(71, 'KOTH BALIYAN', '2022-12-17 07:46:47', '2023-02-17 14:11:57'),
(72, 'AGAWARI', '2022-12-17 07:46:56', '2023-02-17 14:11:57'),
(73, 'JOJAWER', '2022-12-17 07:47:10', '2023-02-17 14:11:57'),
(74, 'SADADI', '2022-12-17 07:47:21', '2023-02-17 14:11:57'),
(75, 'SOJAT CITY', '2022-12-17 07:47:30', '2023-02-17 14:11:57'),
(76, 'KOSHLAV', '2022-12-17 07:47:39', '2023-02-17 14:11:57'),
(77, 'JALOR', '2022-12-17 07:47:49', '2023-02-17 14:11:57'),
(78, 'NOVHI', '2022-12-17 07:48:03', '2023-02-17 14:11:57'),
(79, 'PATHEDI', '2022-12-17 07:48:16', '2023-02-17 14:11:57'),
(80, 'NIMAZ', '2022-12-17 07:48:26', '2023-02-17 14:11:57'),
(81, 'JAWAL', '2022-12-17 07:48:35', '2023-02-17 14:11:57'),
(82, 'EEDAWA', '2022-12-17 07:49:18', '2023-02-17 14:11:57'),
(83, 'RAJALDESAR', '2022-12-17 07:49:28', '2023-02-17 14:11:57'),
(84, 'BEDANA', '2022-12-17 07:49:38', '2023-02-17 14:11:57'),
(85, 'NOKHMANDI', '2022-12-17 07:49:47', '2023-02-17 14:11:57'),
(86, 'KUCHERA', '2022-12-17 07:50:02', '2023-02-17 14:11:57'),
(87, 'DANTARAI', '2022-12-17 07:50:42', '2023-02-17 14:11:57'),
(88, 'JUNA JOGAPURA', '2022-12-17 07:50:56', '2023-02-17 14:11:57'),
(89, 'BARMER', '2022-12-17 07:51:10', '2023-02-17 14:11:57'),
(90, 'UMEDABAD', '2022-12-17 07:51:26', '2023-02-17 14:11:57'),
(91, 'RANDHA', '2022-12-17 07:51:42', '2023-02-17 14:11:57'),
(92, 'VAYATU', '2022-12-17 07:51:51', '2023-02-17 14:11:57'),
(93, 'PACHAPADARA', '2022-12-17 07:52:00', '2023-02-17 14:11:57'),
(94, 'JABH', '2022-12-17 07:52:13', '2023-02-17 14:11:57'),
(95, 'DHORIBANA', '2022-12-17 07:52:32', '2023-02-17 14:11:57'),
(96, 'GULABPURA', '2022-12-17 07:52:45', '2023-02-17 14:11:57'),
(97, 'BUSHI', '2022-12-17 07:52:54', '2023-02-17 14:11:57'),
(98, 'PLASANI', '2022-12-17 07:53:04', '2023-02-17 14:11:57'),
(99, 'PITAWALA', '2022-12-17 07:53:13', '2023-02-17 14:11:57'),
(100, 'SIYANA', '2022-12-17 07:53:23', '2023-02-17 14:11:57'),
(101, 'BAGAD', '2022-12-17 07:53:38', '2023-02-17 14:11:57'),
(102, 'BARAR', '2022-12-17 07:53:48', '2023-02-17 14:11:57'),
(103, 'VARADA', '2022-12-17 07:54:00', '2023-02-17 14:11:57'),
(104, 'SARAT', '2022-12-17 07:54:13', '2023-02-17 14:11:57'),
(105, 'PADIV', '2022-12-17 07:54:29', '2023-02-17 14:11:57'),
(106, 'KHANDAP', '2022-12-17 07:54:47', '2023-02-17 14:11:57'),
(107, 'VADAGAO', '2022-12-17 07:54:59', '2023-02-17 14:11:57'),
(108, 'GATAWAR', '2022-12-17 07:55:10', '2023-02-17 14:11:57'),
(109, 'SUMERPUR', '2022-12-17 07:55:19', '2023-02-17 14:11:57'),
(110, 'SIROHI', '2022-12-17 07:55:35', '2023-02-17 14:11:57'),
(111, 'NOKHA', '2022-12-17 07:55:45', '2023-02-17 14:11:57'),
(112, 'VOPARI', '2022-12-17 07:55:56', '2023-02-17 14:11:57'),
(113, 'SEWARDI', '2022-12-17 07:56:10', '2023-02-17 14:11:57'),
(114, 'SURANA', '2022-12-17 07:56:22', '2023-02-17 14:11:57'),
(115, 'BHANWARI', '2022-12-17 07:56:32', '2023-02-17 14:11:57'),
(116, 'BARANI KHURDA', '2022-12-17 07:56:43', '2023-02-17 14:11:57'),
(117, 'MALSABAVADI', '2022-12-17 07:56:53', '2023-02-17 14:11:57'),
(118, 'PARLU', '2022-12-17 07:57:06', '2023-02-17 14:11:57'),
(119, 'BHINMAL', '2022-12-17 07:57:18', '2023-02-17 14:11:57'),
(120, 'BHALRON KA WADA', '2022-12-17 07:57:31', '2023-02-17 14:11:57'),
(121, 'LAPOD', '2022-12-17 07:57:42', '2023-02-17 14:11:57'),
(122, 'MANIHARI', '2022-12-17 07:57:52', '2023-02-17 14:11:57'),
(123, 'GUDA BALOTRA', '2022-12-17 07:58:05', '2023-02-17 14:11:57'),
(124, 'VAYAD', '2022-12-17 07:58:16', '2023-02-17 14:11:57'),
(125, 'ASSADA', '2022-12-17 07:58:33', '2023-02-17 14:11:57'),
(126, 'NOKHA CHANDAVAT', '2022-12-17 07:58:48', '2023-02-17 14:11:57'),
(127, 'BADGOUM', '2022-12-17 07:58:57', '2023-02-17 14:11:57'),
(128, 'CHURA', '2022-12-17 07:59:09', '2023-02-17 14:11:57'),
(129, 'OTWALA', '2022-12-17 07:59:25', '2023-02-17 14:11:57'),
(130, 'BUCHETI', '2022-12-17 07:59:34', '2023-02-17 14:11:57'),
(131, 'VADI', '2022-12-17 07:59:44', '2023-02-17 14:11:57'),
(132, 'KHOD', '2022-12-17 08:00:02', '2023-02-17 14:11:57'),
(133, 'PIPAD CITY', '2022-12-17 08:00:32', '2023-02-17 14:11:57'),
(134, 'RAMSIN', '2022-12-17 08:00:50', '2023-02-17 14:11:57'),
(135, 'KHIVANDI', '2022-12-17 08:00:59', '2023-02-17 14:11:57'),
(136, 'JAVALI', '2022-12-17 08:01:11', '2023-02-17 14:11:57'),
(137, 'KRUSHNGANJ', '2022-12-17 08:01:20', '2023-02-17 14:11:57'),
(138, 'UADH', '2022-12-17 08:01:28', '2023-02-17 14:11:57'),
(139, 'SANWADA', '2022-12-17 08:01:39', '2023-02-17 14:11:57'),
(140, 'KALANDRI', '2022-12-17 08:01:52', '2023-02-17 14:11:57'),
(141, 'SIRODI', '2022-12-17 08:08:35', '2023-02-17 14:11:57'),
(142, 'DASPA', '2022-12-17 08:08:45', '2023-02-17 14:11:57'),
(143, 'KORANA', '2022-12-17 08:09:21', '2023-02-17 14:11:57'),
(144, 'DHONSA', '2022-12-17 08:09:34', '2023-02-17 14:11:57'),
(145, 'VALBHIPURAM', '2022-12-17 08:09:47', '2023-02-17 14:11:57'),
(146, 'DESHNOK', '2022-12-17 08:09:56', '2023-02-17 14:11:57'),
(147, 'BALESHER', '2022-12-17 08:10:08', '2023-02-17 14:11:57'),
(148, 'RAKHI', '2022-12-17 08:10:18', '2023-02-17 14:11:57'),
(149, 'SOJAT ROAD', '2022-12-17 08:10:32', '2023-02-17 14:11:57'),
(150, 'BITHODA', '2022-12-17 08:11:18', '2023-02-17 14:11:57'),
(151, 'RANIDASIPURA', '2022-12-17 08:11:28', '2023-02-17 14:11:57'),
(152, 'SALAWAS', '2022-12-17 08:11:37', '2023-02-17 14:11:57'),
(153, 'kuship', '2022-12-17 08:11:49', '2023-02-17 14:11:57'),
(154, 'test', '2022-12-17 08:12:00', '2023-02-17 14:11:57'),
(155, 'AKOLI', '2022-12-17 08:12:11', '2023-02-17 14:11:57'),
(156, 'JASOL', '2022-12-17 08:12:22', '2023-02-17 14:11:57'),
(157, 'NADOL', '2022-12-17 08:12:31', '2023-02-17 14:11:57'),
(158, 'BIDASAR', '2022-12-17 08:12:40', '2023-02-17 14:11:57'),
(159, 'BHAVRANI', '2022-12-17 08:12:57', '2023-02-17 14:11:57'),
(160, 'DHINDAS', '2022-12-17 08:13:07', '2023-02-17 14:11:57'),
(161, 'DHUMBDIYA', '2022-12-17 08:13:22', '2023-02-17 14:11:57'),
(162, 'JASVANTPURA', '2022-12-17 08:13:32', '2023-02-17 14:11:57'),
(163, 'FALODI', '2022-12-17 08:13:41', '2023-02-17 14:11:57'),
(164, 'RAITHAL', '2022-12-17 08:13:51', '2023-02-17 14:11:57'),
(165, 'rama', '2022-12-17 08:14:01', '2023-02-17 14:11:57'),
(166, 'GHANERAO', '2022-12-17 08:14:12', '2023-02-17 14:11:57'),
(167, 'AAUWA DEOLI', '2022-12-17 08:14:31', '2023-02-17 14:11:57'),
(168, 'AALASAN', '2022-12-17 08:14:40', '2023-02-17 14:11:57'),
(169, 'ELANA', '2022-12-17 08:14:49', '2023-02-17 14:11:57'),
(170, 'PADARLI', '2022-12-17 08:14:57', '2023-02-17 14:11:57'),
(171, 'FALNA', '2022-12-17 08:15:06', '2023-02-17 14:11:57'),
(172, 'MANDAR', '2022-12-17 08:15:17', '2023-02-17 14:11:57'),
(173, 'PATAN', '2022-12-17 08:15:32', '2023-02-17 14:11:57'),
(174, 'PACHHEGAM', '2022-12-17 08:15:41', '2023-02-17 14:11:57'),
(175, 'BHAVNAGAR', '2022-12-17 08:15:50', '2023-02-17 14:11:57'),
(176, 'DATA', '2022-12-17 08:15:59', '2023-02-17 14:11:57'),
(177, 'MEHSHANA (GUJ)', '2022-12-17 08:16:11', '2023-02-17 14:11:57'),
(178, 'KHARVA', '2022-12-17 08:16:20', '2023-02-17 14:11:57'),
(179, 'MANDANI', '2022-12-17 08:16:28', '2023-02-17 14:11:57'),
(180, 'AAGLOD', '2022-12-17 08:16:38', '2023-02-17 14:11:57'),
(181, 'THARA', '2022-12-17 08:16:47', '2023-02-17 14:11:57'),
(182, 'GODAN', '2022-12-17 08:17:00', '2023-02-17 14:11:57'),
(183, 'THUMBA', '2022-12-17 08:17:11', '2023-02-17 14:11:57'),
(184, 'PACHEGAM', '2022-12-17 08:17:21', '2023-02-17 14:11:57'),
(185, 'PAMERA', '2022-12-17 08:17:31', '2023-02-17 14:11:57'),
(186, 'UMEDPUR', '2022-12-17 08:17:57', '2023-02-17 14:11:57'),
(187, 'BHESWADA', '2022-12-17 08:18:07', '2023-02-17 14:11:57'),
(188, 'CHANDARAI', '2022-12-17 08:18:42', '2023-02-17 14:11:57'),
(189, 'BANKALI', '2022-12-17 08:18:52', '2023-02-17 14:11:57'),
(190, 'DHNAPURA', '2022-12-17 08:19:02', '2023-02-17 14:11:57'),
(191, 'VADANWADI', '2022-12-17 08:19:13', '2023-02-17 14:11:57'),
(192, 'BADGOUV', '2022-12-17 08:19:23', '2023-02-17 14:11:57'),
(193, 'THALI RNWADA (GUJ)', '2022-12-17 08:19:35', '2023-02-17 14:11:57'),
(194, 'NANDASAN(GUJ)', '2022-12-17 08:19:48', '2023-02-17 14:11:57'),
(195, 'DADESH (GUJ)', '2022-12-17 08:19:58', '2023-02-17 14:11:57'),
(196, 'DHORAJI (GUJ)', '2022-12-17 08:20:09', '2023-02-17 14:11:57'),
(197, 'MOTIPANELI (GUJ)', '2022-12-17 08:20:19', '2023-02-17 14:11:57'),
(198, 'SANATALI (GUJ)', '2022-12-17 08:20:28', '2023-02-17 14:11:57'),
(199, 'RAJKOT (GUJ)', '2022-12-17 08:20:38', '2023-02-17 14:11:57'),
(200, 'PACHOD (GUJ)', '2022-12-17 08:20:52', '2023-02-17 14:11:57'),
(201, 'BHOLGANDHA ( GUJ)', '2022-12-17 08:21:02', '2023-02-17 14:11:57'),
(202, 'KACH (GUJ)', '2022-12-17 08:21:13', '2023-02-17 14:11:57'),
(203, 'AAGWARI (GUJ)', '2022-12-17 08:21:23', '2023-02-17 14:11:57'),
(204, 'KHED BRAMHA ( GUJ)', '2022-12-17 08:21:33', '2023-02-17 14:11:57'),
(205, 'MANDAVI ( GUJ)', '2022-12-17 08:21:43', '2023-02-17 14:11:57'),
(206, 'ANAND (GUJ)', '2022-12-17 08:21:56', '2023-02-17 14:11:57'),
(207, 'CHANSAMA(GUJ)', '2022-12-17 08:22:07', '2023-02-17 14:11:57'),
(208, 'DAGAM (GUJ)', '2022-12-17 08:22:17', '2023-02-17 14:11:57'),
(209, 'KHEDABRAMA (GUJ)', '2022-12-17 08:22:37', '2023-02-17 14:11:57'),
(210, 'PILVAI (GUJ)', '2022-12-17 08:22:47', '2023-02-17 14:11:57'),
(211, 'PATAN (GUJ)', '2022-12-17 08:22:56', '2023-02-17 14:11:57'),
(212, 'AAGLODE (GUJ )', '2022-12-17 08:23:06', '2023-02-17 14:11:57'),
(213, 'GUDHA BALOTAN', '2022-12-17 08:23:16', '2023-02-17 14:11:57'),
(214, 'khimel', '2022-12-17 08:23:29', '2023-02-17 14:11:57'),
(215, 'NAGORE', '2022-12-17 08:23:38', '2023-02-17 14:11:57'),
(216, 'CHAMONDERI', '2022-12-17 08:23:50', '2023-02-17 14:11:57'),
(217, 'PAVATA', '2022-12-17 08:24:00', '2023-02-17 14:11:57'),
(218, 'SHRI RAMSEN', '2022-12-17 08:25:04', '2023-02-17 14:11:57'),
(219, 'MEDATA CITY (RAJ)', '2022-12-17 08:25:23', '2023-02-17 14:11:57'),
(220, 'AKOLA (MAHARASTRA)', '2022-12-17 08:25:31', '2023-02-17 14:11:57'),
(221, 'AAU', '2022-12-17 08:25:42', '2023-02-17 14:11:57'),
(222, 'DEWGAD', '2022-12-17 08:25:55', '2023-02-17 14:11:57'),
(223, 'BAGARA', '2022-12-17 08:26:04', '2023-02-17 14:11:57'),
(224, 'RASISAR', '2022-12-17 08:26:14', '2023-02-17 14:11:57'),
(225, 'DHAWA (RAJ)', '2022-12-17 08:26:24', '2023-02-17 14:11:57'),
(226, 'LASANI', '2022-12-17 08:26:33', '2023-02-17 14:11:57'),
(227, 'BAGAWAS', '2022-12-17 08:26:49', '2023-02-17 14:11:57'),
(228, 'SIRYARI', '2022-12-17 08:27:06', '2023-02-17 14:11:57'),
(229, 'GUDA RAMSINGH', '2022-12-17 08:27:21', '2023-02-17 14:11:57'),
(230, 'KHINWARA ( RAJ )', '2022-12-17 08:27:30', '2023-02-17 14:11:57'),
(231, 'PICHAWA', '2022-12-17 08:27:39', '2023-02-17 14:11:57'),
(232, 'SUJANGARH', '2022-12-17 08:27:48', '2023-02-17 14:11:57'),
(233, 'MORSHIM ( RAJ)', '2022-12-17 08:28:00', '2023-02-17 14:11:57'),
(234, 'MAJHAL', '2022-12-17 08:28:10', '2023-02-17 14:11:57'),
(235, 'BHADRAJUN', '2022-12-17 08:28:20', '2023-02-17 14:11:57'),
(236, 'AGOLAI', '2022-12-17 08:28:30', '2023-02-17 14:11:57'),
(237, 'BIJAYNAGAR', '2022-12-17 08:28:38', '2023-02-17 14:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int NOT NULL,
  `category_id` int NOT NULL,
  `sub_category_id` int NOT NULL,
  `banner_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customer_id` int NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_id` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `category_id`, `sub_category_id`, `banner_url`, `name`, `date`, `description`, `created_at`, `updated_at`, `customer_id`, `is_approved`, `comment`, `city_id`) VALUES
(2, 0, 0, '/public/news_banner/1225400295lavji_badshah.jpeg', 'Viral Ghodadara', '2022-11-19', 'This is a my descriptionThis is a my descriptionThis is a my descriptionThis is a my description', '2022-11-22 07:48:50', '2023-02-17 14:11:57', 0, 1, NULL, 0),
(3, 0, 0, '/public/news_banner/1337039697barakObama.jpeg', 'Wade Knowles edit', '1997-11-18', 'Qui illum perspicia', '2022-11-23 04:21:42', '2023-02-17 14:11:57', 2, 1, NULL, 0),
(4, 7, 5, '/public/news_banner/24885981401352.jpeg', 'Deborah Mcguire', '1970-04-26', 'Est nihil laborum v', '2022-11-24 05:06:38', '2023-02-17 14:11:57', 13, 1, NULL, 0),
(5, 7, 5, '/public/news_banner/143579855613353lavji_badshah.jpeg', 'Viral', '2022-11-24', 'आपने अंग्रेजी से हिंदी कनवर्टर के साथ जो टाइप किया है वह यूनिकोड फ़ॉन्ट में है, इसलिए यह बहुत पोर्टेबल है जिसका मतलब है कि आप डिजिटल दुनिया में कहीं भी इस हिंदी पाठ का उपयोग कर सकते हैं। आप यहां से कॉपी करके फेसबुक, व्हाट्सएप, ट्विटर, ब्लॉग्स, किसी भी साइट के कमेंट सेक्शन में पेस्ट कर सकते हैं। आप हिंदी पाठ को या तो नोटपैड फ़ाइल (.txt प्रारूप) या दस्तावेज़ फ़ाइल (एमएस वर्ड) के रूप में डाउनलोड कर सकते हैं।  यदि आप अपनी टाइप की गई सामग्री का फ़ॉन्ट बदलना चाहते हैं तो दो विकल्प हैं। सबसे पहले आप अपने हिंदी टेक्स्ट को एएनएसआई हिंदी फॉन्ट जैसे \"कृतिदेव\" या \"डेविल्स\" में यूनिकोड से क्रुतिदेव कन्वर्टर टूल में बदल सकते हैं। दूसरा विकल्प आप अपने सिस्टम में डाउनलोड करने के बाद फॉन्ट बदल सकते हैं। डाउनलोड करने के बाद एमएस वर्ड या नोटपैड के साथ हिंदी टेक्स्ट खोलें और फॉन्ट परिवार बदलें। आप हमारी वेबसाइट के डाउनलोड मेन्यू से हिंदी यूनिकोड फोन्ट डाउनलोड कर सकते हैं।', '2022-11-24 05:41:52', '2023-02-17 14:11:57', 5, 1, NULL, 0),
(6, 5, 3, '/public/news_banner/437538875jayesh_desai.jpeg', 'obamani news che', '2022-11-25', 'This is a my descriptionThis is a my descriptionThis is a my descriptionThis is a my description', '2022-11-25 06:03:22', '2023-02-17 14:11:57', 14, 0, NULL, 0),
(10, 10, 9, '/public/news_banner/news_banner_1677086076.jpg', 'Person is expired (family member)', '2022-12-24', 'This is a about of sradhanjli', '2022-12-23 20:59:38', '2023-02-22 11:44:36', 33, 0, NULL, 147),
(32, 8, 17, '/public/news_banner/news_banner_1677085874.jpg', 'हार्दिक शुभकामनाएं', '2023-01-13', 'Hello', '2023-01-13 08:53:42', '2023-02-22 11:43:20', 40, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news-category`
--

CREATE TABLE `news-category` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news-category`
--

INSERT INTO `news-category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, 'Unde quasi consequat', '2022-11-24 04:42:33', '2022-11-24 04:42:33'),
(3, 'India news', '2022-11-24 04:05:52', '2022-11-24 04:05:52'),
(5, 'Velit magna aliquip', '2022-11-24 04:42:36', '2022-11-24 04:42:36'),
(7, 'संघ समाचार', '2022-11-24 04:42:43', '2022-12-20 04:13:17'),
(8, 'ACHIVMENT', '2022-11-24 04:42:46', '2022-12-19 09:59:32'),
(9, 'शोक संदेश', '2022-12-08 04:31:24', '2022-12-20 04:05:08'),
(10, 'श्रद्धांजलि', '2022-12-20 03:35:53', '2022-12-20 03:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `news_sub_category`
--

CREATE TABLE `news_sub_category` (
  `id` int NOT NULL,
  `parent_category_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news_sub_category`
--

INSERT INTO `news_sub_category` (`id`, `parent_category_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 3, 'mill dying', '2022-11-24 04:29:27', '2023-02-17 14:11:57'),
(3, 9, 'बैठक समाचा', '2022-11-24 04:47:28', '2023-02-17 14:11:57'),
(4, 7, 'आमंत्रण', '2022-11-24 04:47:32', '2023-02-17 14:11:57'),
(5, 9, 'कालधर्म समाचार', '2022-11-24 04:47:35', '2023-02-17 14:11:57'),
(6, 9, 'दुःखद समाचार', '2022-12-08 04:31:34', '2023-02-17 14:11:57'),
(9, 10, 'श्रद्धांजलि', '2022-12-22 07:17:17', '2023-02-17 14:11:57'),
(8, 9, 'उठावना समाचार', '2022-12-20 04:10:57', '2023-02-17 14:11:57'),
(17, 8, 'हार्दिक शुभकामनाएं', '2023-01-10 04:00:50', '2023-02-17 14:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `panths`
--

CREATE TABLE `panths` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `panths`
--

INSERT INTO `panths` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'MURTI PUJAK (ACHALGACH )', '2022-12-14 06:56:24', '2023-02-17 14:11:57'),
(2, 'MURTI PUJAK (TRISTUTIK )', '2022-12-14 06:56:33', '2023-02-17 14:11:57'),
(5, 'STHANAKWASI (SAMRAN SANGH)', '2022-12-17 08:04:52', '2023-02-17 14:11:57'),
(6, 'JAIN', '2022-12-17 08:05:15', '2023-02-17 14:11:57'),
(7, 'DIGAMBER', '2022-12-17 08:05:28', '2023-02-17 14:11:57'),
(8, 'MURTI PUJAK (KHARTERGACH)', '2022-12-17 08:05:51', '2023-02-17 14:11:57'),
(9, 'KUTCHI DASA OSWAL', '2022-12-17 08:06:10', '2023-02-17 14:11:57'),
(10, 'TERAPANTH', '2022-12-17 08:06:28', '2023-02-17 14:11:57'),
(11, 'MURTI PUJAK (TAPAGACH )', '2022-12-17 08:07:11', '2023-02-17 14:11:57'),
(12, 'STHANAKWASI (GAYANGACH)', '2022-12-17 08:07:30', '2023-02-17 14:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `patti`
--

CREATE TABLE `patti` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `patti`
--

INSERT INTO `patti` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'SIWANCHI PATTI JAIN SANGH', '2022-12-14 04:45:46', '2023-02-17 14:11:57'),
(3, 'DIYAVAT PATTI JAIN SANGH', '2022-12-17 05:15:12', '2023-02-17 14:11:57'),
(4, 'ABUGODE PATTI JAIN SANGH', '2022-12-17 05:15:26', '2023-02-17 14:11:57'),
(5, 'MALANI PATTI JAIN SANGH', '2022-12-17 05:15:42', '2023-02-17 14:11:57'),
(6, 'HAVELI PATTI JAIN SANGH', '2022-12-17 05:15:54', '2023-02-17 14:11:57'),
(7, 'DANDHAR PATTI JAIN SANGH', '2022-12-17 05:16:09', '2023-02-17 14:11:57'),
(8, 'JOHARA PATTI JAIN SANGH', '2022-12-17 05:16:24', '2023-02-17 14:11:57'),
(9, 'JODHPUR PATTI JAIN SANGH', '2022-12-17 05:16:41', '2023-02-17 14:11:57'),
(10, '27 PATTI JAIN SANGH', '2022-12-17 05:16:54', '2023-02-17 14:11:57'),
(11, 'JALORE(TALSAR) PATTI JAIN SANGH', '2022-12-17 05:17:10', '2023-02-17 14:11:57'),
(12, 'MEWAD PATTI JAIN SANGH', '2022-12-17 05:17:21', '2023-02-17 14:11:57'),
(13, 'BARMER PATTI JAIN SANGH', '2022-12-17 05:17:33', '2023-02-17 14:11:57'),
(14, 'KHANTA PRANT PATTI JAIN SANGH', '2022-12-17 05:17:45', '2023-02-17 14:11:57'),
(15, 'GODWAD PATTI JAIN SANGH', '2022-12-17 05:17:57', '2023-02-17 14:11:57'),
(16, 'CHURU PATTI JAIN SANGH', '2022-12-17 05:18:10', '2023-02-17 14:11:57'),
(17, 'NOKHA BIKANER PATTI JAIN SANGH', '2022-12-17 05:18:23', '2023-02-17 14:11:57'),
(18, 'CHORAI PATTI JAIN SANGH', '2022-12-17 05:18:35', '2023-02-17 14:11:57'),
(19, '48,PATTI JAIN SANGH', '2022-12-17 05:18:51', '2023-02-17 14:11:57'),
(20, 'TALSAR PATTI JAIN SANGH', '2022-12-17 05:19:03', '2023-02-17 14:11:57'),
(21, 'THALLI PATTI JAIN SANGH', '2022-12-17 05:19:13', '2023-02-17 14:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Customer', 16, 'customer_login', '2df22fdc91072003deaf8eb738a2fc0bf19653d106175e89ef4816f8983bad21', '[\"*\"]', '2022-12-08 01:42:40', '2022-12-08 01:14:51', '2022-12-08 01:42:40'),
(2, 'App\\Models\\Customer', 35, 'customer_login', 'd05189bd8b02f75a24296255206b30cb5ab4fa979be6c0dbcc48210a3bd4e023', '[\"*\"]', '2023-01-09 01:34:19', '2023-01-09 01:32:14', '2023-01-09 01:34:19');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int NOT NULL,
  `post_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` tinyint DEFAULT NULL COMMENT '1 for photos and 2 for videos',
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_active` tinyint NOT NULL DEFAULT '1',
  `customer_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post_url`, `type`, `description`, `is_approved`, `comment`, `is_active`, `customer_id`, `created_at`, `updated_at`) VALUES
(22, '/public/post/post_file_1677091552.jpg', 1, 'रोहित गांधी सुपौत्र स्व.श्री मघराजजी मांगीबाई गांधी धारवाड(राणावास)ने CA फाइनल प्रथम बार में ही अच्छे अंको से उतीण कर पूरे कांठा प्रांत और परिवार का नाम रोशन किया हैं ,इसके लिये बहुत-बहुत बधाई और शुभकामनाएं', 0, NULL, 1, 30, '2023-01-10 03:32:05', '2023-02-22 13:15:52'),
(25, '/public/post/post_file_1677091541.jpg', 1, 'रोहित गांधी सुपौत्र स्व.श्री मघराजजी मांगीबाई गांधी धारवाड(राणावास)ने CA फाइनल प्रथम बार में ही अच्छे अंको से उतीण कर पूरे कांठा प्रांत और परिवार का नाम रोशन किया हैं ,इसके लिये बहुत-बहुत बधाई और शुभकामनाएं रोहित गांधी सुपौत्र स्व.श्री मघराजजी मांगीबाई गांधी धारवाड(राणावास)ने CA फाइनल प्रथम बार में ही अच्छे अंको से उतीण कर पूरे कांठा प्रांत और परिवार का नाम रोशन किया हैं ,इसके लिये बहुत-बहुत बधाई और शुभकामनाएं', 0, NULL, 1, 40, '2023-01-10 04:07:55', '2023-02-22 13:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `id` int NOT NULL,
  `avtar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mobile_no` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customer_id` int NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `avtar`, `name`, `mobile_no`, `email`, `created_at`, `updated_at`, `customer_id`, `is_approved`, `comment`) VALUES
(2, '/public/profile/31598779013353lavji_badshah.jpeg', 'Hello Test edit', '09656523658', 'viralghodadra37@gmail.com', '2023-02-17 14:11:57', '2023-02-17 14:11:57', 0, 0, NULL),
(3, '/public/profile/1732709744401352.jpeg', 'Jacob Stone', '335', 'cupuzipulo@mailinator.com', '2023-02-17 14:11:57', '2023-02-17 14:11:57', 2, 0, NULL),
(4, '/public/profile/297844432401352.jpeg', 'Hello Test', '09656523658', 'vora007mayur@gmail.com', '2023-02-17 14:11:57', '2023-02-17 14:11:57', 14, 1, NULL),
(5, '/public/profile/1048186883393690.jpg', 'Ashok Girdharilal jain', '9448368046', 'ABCHUBLI2003@GMAIL.COM', '2023-02-17 14:11:57', '2023-02-17 14:11:57', 25, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE `relationship` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `relationship`
--

INSERT INTO `relationship` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Brother', '2022-12-14 07:07:12', '2023-02-17 14:11:57'),
(2, 'Father', '2022-12-14 07:07:21', '2023-02-17 14:11:57'),
(3, 'Sister', '2022-12-14 07:07:30', '2023-02-17 14:11:57'),
(5, 'Son', '2022-12-17 05:28:56', '2023-02-17 14:11:57'),
(7, 'Mother', '2022-12-17 08:31:59', '2023-02-17 14:11:57'),
(8, 'Wife', '2022-12-17 08:32:41', '2023-02-17 14:11:57'),
(9, 'Husband', '2022-12-17 08:33:11', '2023-02-17 14:11:57'),
(10, 'Uncle', '2022-12-17 08:33:24', '2023-02-17 14:11:57'),
(11, 'Aunty', '2022-12-17 08:33:46', '2023-02-17 14:11:57'),
(12, 'Grand Father', '2022-12-17 08:34:41', '2023-02-17 14:11:57'),
(13, 'Grand Mother', '2022-12-17 08:34:53', '2023-02-17 14:11:57'),
(14, 'Doughter', '2022-12-17 08:35:45', '2023-02-17 14:11:57'),
(15, 'Father in Law', '2022-12-17 08:36:12', '2023-02-17 14:11:57'),
(16, 'Mother in Law', '2022-12-17 08:36:23', '2023-02-17 14:11:57'),
(17, 'Brother in Law', '2022-12-17 08:36:51', '2023-02-17 14:11:57'),
(18, 'Sister in Law', '2022-12-17 08:37:01', '2023-02-17 14:11:57'),
(19, 'Doughter in Law', '2022-12-17 08:37:52', '2023-02-17 14:11:57'),
(20, 'Son in Law', '2022-12-17 08:38:13', '2023-02-17 14:11:57'),
(21, 'Grand son', '2022-12-17 08:38:49', '2023-02-17 14:11:57'),
(22, 'Grand Doughter', '2022-12-17 08:39:22', '2023-02-17 14:11:57'),
(23, 'Nephew', '2022-12-17 08:39:43', '2023-02-17 14:11:57'),
(24, 'Niece', '2022-12-17 08:39:59', '2023-02-17 14:11:57'),
(25, 'Brother\'s Son', '2022-12-17 08:40:33', '2023-02-17 14:11:57'),
(26, 'Brother\'s Doughter', '2022-12-17 08:40:49', '2023-02-17 14:11:57'),
(27, 'Husband\'s Sister', '2022-12-17 08:41:16', '2023-02-17 14:11:57'),
(28, 'Bhabi', '2022-12-17 08:42:09', '2023-02-17 14:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `slides`
--

CREATE TABLE `slides` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `slides`
--

INSERT INTO `slides` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Slide 1', '2022-12-23 13:22:05', '2023-02-17 14:11:57'),
(3, 'Slide 2', '2023-01-03 08:33:58', '2023-02-17 14:11:57'),
(4, 'Slide 3', '2023-01-03 08:34:09', '2023-02-17 14:11:57'),
(5, 'Slide 4', '2023-01-03 08:34:18', '2023-02-17 14:11:57'),
(6, 'Slide 5', '2023-01-03 08:34:27', '2023-02-17 14:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `name`, `country_id`) VALUES
(1, 'ANDHRA PRADESH', 105),
(2, 'ASSAM', 105),
(3, 'ARUNACHAL PRADESH', 105),
(4, 'GUJRAT', 105),
(5, 'BIHAR', 105),
(6, 'HARYANA', 105),
(7, 'HIMACHAL PRADESH', 105),
(8, 'JAMMU & KASHMIR', 105),
(9, 'KARNATAKA', 105),
(10, 'KERALA', 105),
(11, 'MADHYA PRADESH', 105),
(12, 'MAHARASHTRA', 105),
(13, 'Telangana', 105),
(14, 'MANIPUR', 105),
(15, 'MEGHALAYA', 105),
(16, 'MIZORAM', 105),
(17, 'NAGALAND', 105),
(18, 'ORISSA', 105),
(19, 'PUNJAB', 105),
(20, 'RAJASTHAN', 105),
(21, 'SIKKIM', 105),
(22, 'TAMIL NADU', 105),
(23, 'TRIPURA', 105),
(24, 'UTTAR PRADESH', 105),
(25, 'WEST BENGAL', 105),
(26, 'GOA', 105),
(27, 'PONDICHERY', 105),
(28, 'LAKSHDWEEP', 105),
(29, 'DAMAN & DIU', 105),
(30, 'DADRA & NAGAR', 105),
(31, 'CHANDIGARH', 105),
(32, 'ANDAMAN & NICOBAR', 105),
(33, 'UTTARANCHAL', 105),
(34, 'JHARKHAND', 105),
(35, 'CHATTISGARH', 105),
(36, 'ASSAM', 105);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `country_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
(1, 'ANDHRA PRADESH', 105),
(2, 'ASSAM', 105),
(3, 'ARUNACHAL PRADESH', 105),
(4, 'BIHAR', 105),
(5, 'GUJARAT', 105),
(6, 'HARYANA', 105),
(7, 'HIMACHAL PRADESH', 105),
(8, 'JAMMU & KASHMIR', 105),
(9, 'KARNATAKA', 105),
(10, 'KERALA', 105),
(11, 'MADHYA PRADESH', 105),
(12, 'MAHARASHTRA', 105),
(13, 'MANIPUR', 105),
(14, 'MEGHALAYA', 105),
(15, 'MIZORAM', 105),
(16, 'NAGALAND', 105),
(17, 'ORISSA', 105),
(18, 'PUNJAB', 105),
(19, 'RAJASTHAN', 105),
(20, 'SIKKIM', 105),
(21, 'TAMIL NADU', 105),
(22, 'TRIPURA', 105),
(23, 'UTTAR PRADESH', 105),
(24, 'WEST BENGAL', 105),
(25, 'DELHI', 105),
(26, 'GOA', 105),
(27, 'PONDICHERY', 105),
(28, 'LAKSHDWEEP', 105),
(29, 'DAMAN & DIU', 105),
(30, 'DADRA & NAGAR', 105),
(31, 'CHANDIGARH', 105),
(32, 'ANDAMAN & NICOBAR', 105),
(33, 'UTTARANCHAL', 105),
(34, 'JHARKHAND', 105),
(35, 'CHATTISGARH', 1);

-- --------------------------------------------------------

--
-- Table structure for table `surname`
--

CREATE TABLE `surname` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `surname`
--

INSERT INTO `surname` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'BAGMAR', '2022-12-14 09:16:40', '2023-02-17 14:11:57'),
(3, 'MALLU', '2022-12-14 03:56:52', '2023-02-17 14:11:57'),
(4, 'BADERA', '2022-12-14 03:56:58', '2023-02-17 14:11:57'),
(5, 'PARMAR', '2022-12-14 03:57:02', '2023-02-17 14:11:57'),
(6, 'BAVHAWAT', '2022-12-14 03:57:05', '2023-02-17 14:11:57'),
(7, 'POONAMIYA', '2022-12-14 03:57:12', '2023-02-17 14:11:57'),
(8, 'CHHAJED', '2022-12-14 11:12:12', '2023-02-17 14:11:57'),
(9, 'BAGRECHA', '2022-12-17 05:42:38', '2023-02-17 14:11:57'),
(10, 'BAGRECHA (JINANI)', '2022-12-17 05:42:51', '2023-02-17 14:11:57'),
(11, 'BALAR', '2022-12-17 05:43:05', '2023-02-17 14:11:57'),
(12, 'BANDA MUTHA', '2022-12-17 05:43:19', '2023-02-17 14:11:57'),
(13, 'BHANDARI', '2022-12-17 05:43:31', '2023-02-17 14:11:57'),
(14, 'BHANSALI', '2022-12-17 05:43:47', '2023-02-17 14:11:57'),
(15, 'BHOJANI', '2022-12-17 05:43:52', '2023-02-17 14:11:57'),
(16, 'BHURAT', '2022-12-17 05:44:25', '2023-02-17 14:11:57'),
(17, 'BURAD', '2022-12-17 05:44:36', '2023-02-17 14:11:57'),
(18, 'BHOJANI BAGRECHA', '2022-12-17 05:44:47', '2023-02-17 14:11:57'),
(19, 'BOKARIYA', '2022-12-17 05:44:59', '2023-02-17 14:11:57'),
(20, 'BOHARA', '2022-12-17 05:45:14', '2023-02-17 14:11:57'),
(21, 'DAGA', '2022-12-17 05:45:29', '2023-02-17 14:11:57'),
(22, 'CHOUDHARY', '2022-12-17 05:45:40', '2023-02-17 14:11:57'),
(23, 'CHOPRA', '2022-12-17 05:45:51', '2023-02-17 14:11:57'),
(24, 'CHORADIYA', '2022-12-17 05:46:09', '2023-02-17 14:11:57'),
(25, 'DATEWADIA', '2022-12-17 05:46:19', '2023-02-17 14:11:57'),
(26, 'DEVADA', '2022-12-17 05:46:34', '2023-02-17 14:11:57'),
(27, 'DEVDA DHOKA', '2022-12-17 05:46:45', '2023-02-17 14:11:57'),
(28, 'DHANESHA', '2022-12-17 05:46:57', '2023-02-17 14:11:57'),
(29, 'DHARIWAL', '2022-12-17 05:47:31', '2023-02-17 14:11:57'),
(30, 'DHELARIYA', '2022-12-17 05:47:42', '2023-02-17 14:11:57'),
(31, 'LUNKER', '2022-12-17 05:47:52', '2023-02-17 14:11:57'),
(32, 'DHELARIYA MEHTHA', '2022-12-17 05:48:03', '2023-02-17 14:11:57'),
(33, 'DHOKA', '2022-12-17 05:48:13', '2023-02-17 14:11:57'),
(34, 'DOSHI', '2022-12-17 05:48:31', '2023-02-17 14:11:57'),
(35, 'DOSHI CHOPRA', '2022-12-17 05:49:18', '2023-02-17 14:11:57'),
(36, 'PORWAL', '2022-12-17 05:49:29', '2023-02-17 14:11:57'),
(37, 'DOSHI MUTHA', '2022-12-17 05:49:40', '2023-02-17 14:11:57'),
(38, 'FOLA MUTHA', '2022-12-17 05:49:52', '2023-02-17 14:11:57'),
(39, 'GADHIYA', '2022-12-17 05:50:06', '2023-02-17 14:11:57'),
(40, 'GANDHAR COPRA', '2022-12-17 05:50:17', '2023-02-17 14:11:57'),
(41, 'GANDHI MEHTA', '2022-12-17 05:50:28', '2023-02-17 14:11:57'),
(42, 'GOGAD', '2022-12-17 05:50:46', '2023-02-17 14:11:57'),
(43, 'GOGAD MUTHA', '2022-12-17 05:50:56', '2023-02-17 14:11:57'),
(44, 'GOTTI', '2022-12-17 05:51:06', '2023-02-17 14:11:57'),
(45, 'GUNDECHA', '2022-12-17 05:51:17', '2023-02-17 14:11:57'),
(46, 'HUNDIA', '2022-12-17 05:51:29', '2023-02-17 14:11:57'),
(47, 'JIRAWALA', '2022-12-17 05:51:40', '2023-02-17 14:11:57'),
(48, 'JINNANI', '2022-12-17 05:54:29', '2023-02-17 14:11:57'),
(49, 'KANKARIYA', '2022-12-17 05:55:00', '2023-02-17 14:11:57'),
(50, 'KATARIA', '2022-12-17 05:55:18', '2023-02-17 14:11:57'),
(51, 'JAIN', '2022-12-17 05:55:35', '2023-02-17 14:11:57'),
(52, 'KANUNGA', '2022-12-17 05:55:45', '2023-02-17 14:11:57'),
(53, 'KAWAD', '2022-12-17 05:55:57', '2023-02-17 14:11:57'),
(54, 'KOTHARI', '2022-12-17 05:56:13', '2023-02-17 14:11:57'),
(55, 'KOTHARI LUNAWAT', '2022-12-17 05:56:30', '2023-02-17 14:11:57'),
(56, 'KUNKU CHOPRA', '2022-12-17 05:57:42', '2023-02-17 14:11:57'),
(57, 'KHANTER', '2022-12-17 05:57:55', '2023-02-17 14:11:57'),
(58, 'KHIVESARA', '2022-12-17 05:58:06', '2023-02-17 14:11:57'),
(59, 'LALWANI', '2022-12-17 05:58:20', '2023-02-17 14:11:57'),
(60, 'LALANGOTRA', '2022-12-17 05:58:32', '2023-02-17 14:11:57'),
(61, 'LUNIYA', '2022-12-17 06:02:22', '2023-02-17 14:11:57'),
(62, 'LUNKAD', '2022-12-17 06:02:36', '2023-02-17 14:11:57'),
(63, 'LODHA', '2022-12-17 06:02:48', '2023-02-17 14:11:57'),
(64, 'MALANI', '2022-12-17 06:03:04', '2023-02-17 14:11:57'),
(65, 'BINAKIYA', '2022-12-17 06:03:19', '2023-02-17 14:11:57'),
(66, 'MANDOTAR', '2022-12-17 06:03:31', '2023-02-17 14:11:57'),
(67, 'DANK', '2022-12-17 06:04:15', '2023-02-17 14:11:57'),
(68, 'MEHTA', '2022-12-17 06:04:32', '2023-02-17 14:11:57'),
(69, 'PALGOTA CHOUHAN', '2022-12-17 06:04:46', '2023-02-17 14:11:57'),
(70, 'GANDHI', '2022-12-17 06:05:01', '2023-02-17 14:11:57'),
(71, 'MUNOTH', '2022-12-17 06:05:16', '2023-02-17 14:11:57'),
(72, 'MUTHA', '2022-12-17 06:05:29', '2023-02-17 14:11:57'),
(73, 'NAHATA', '2022-12-17 06:05:42', '2023-02-17 14:11:57'),
(74, 'NETHANI', '2022-12-17 06:05:53', '2023-02-17 14:11:57'),
(75, 'NAGOTRA SOLANKI', '2022-12-17 06:06:08', '2023-02-17 14:11:57'),
(76, 'OSTWAL', '2022-12-17 06:06:19', '2023-02-17 14:11:57'),
(77, 'PALGOTA', '2022-12-17 06:06:31', '2023-02-17 14:11:57'),
(78, 'PALRECHA', '2022-12-17 06:06:41', '2023-02-17 14:11:57'),
(79, 'PATWA', '2022-12-17 06:07:04', '2023-02-17 14:11:57'),
(80, 'PATWARI', '2022-12-17 06:07:14', '2023-02-17 14:11:57'),
(81, 'POMANI', '2022-12-17 06:07:25', '2023-02-17 14:11:57'),
(82, 'PAGARIA', '2022-12-17 06:07:37', '2023-02-17 14:11:57'),
(83, 'PAREKH', '2022-12-17 06:07:48', '2023-02-17 14:11:57'),
(84, 'VAKIYATRA', '2022-12-17 06:08:01', '2023-02-17 14:11:57'),
(85, 'POMANI BAGRECHA', '2022-12-17 06:08:14', '2023-02-17 14:11:57'),
(86, 'RASONI', '2022-12-17 06:08:27', '2023-02-17 14:11:57'),
(87, 'RANKA', '2022-12-17 06:08:37', '2023-02-17 14:11:57'),
(88, 'SALECHA', '2022-12-17 06:08:47', '2023-02-17 14:11:57'),
(89, 'SANCHETI', '2022-12-17 06:09:01', '2023-02-17 14:11:57'),
(90, 'SANCHETI MEHTA', '2022-12-17 06:09:27', '2023-02-17 14:11:57'),
(91, 'SANGHVI', '2022-12-17 06:09:38', '2023-02-17 14:11:57'),
(92, 'SAND', '2022-12-17 06:09:51', '2023-02-17 14:11:57'),
(93, 'SINGHVI', '2022-12-17 06:10:01', '2023-02-17 14:11:57'),
(94, 'SANGHVI KATARIA', '2022-12-17 06:10:12', '2023-02-17 14:11:57'),
(95, 'SANKLECHA', '2022-12-17 06:10:24', '2023-02-17 14:11:57'),
(96, 'SHAKHLA', '2022-12-17 06:10:35', '2023-02-17 14:11:57'),
(97, 'SETHIYA', '2022-12-17 06:10:49', '2023-02-17 14:11:57'),
(98, 'SOLANKI', '2022-12-17 06:12:12', '2023-02-17 14:11:57'),
(99, 'SRIMAL', '2022-12-17 06:12:24', '2023-02-17 14:11:57'),
(100, 'SRI SRI SRIMAL', '2022-12-17 06:12:35', '2023-02-17 14:11:57'),
(101, 'SRI SRIMAL', '2022-12-17 06:12:46', '2023-02-17 14:11:57'),
(102, 'SURANA', '2022-12-17 06:13:00', '2023-02-17 14:11:57'),
(103, 'SONWADIA', '2022-12-17 06:13:10', '2023-02-17 14:11:57'),
(104, 'BABEL', '2022-12-17 06:13:20', '2023-02-17 14:11:57'),
(105, 'TATIA', '2022-12-17 06:13:35', '2023-02-17 14:11:57'),
(106, 'TALESARA', '2022-12-17 06:14:54', '2023-02-17 14:11:57'),
(107, 'TALESARA SOLANKI', '2022-12-17 06:15:11', '2023-02-17 14:11:57'),
(108, 'TIMRECHA', '2022-12-17 06:15:28', '2023-02-17 14:11:57'),
(109, 'VAID', '2022-12-17 06:15:41', '2023-02-17 14:11:57'),
(110, 'VAID MUTHA', '2022-12-17 06:15:54', '2023-02-17 14:11:57'),
(111, 'CHATRAGOTA', '2022-12-17 06:16:14', '2023-02-17 14:11:57'),
(112, 'VADERA', '2022-12-17 06:16:25', '2023-02-17 14:11:57'),
(113, 'VADODIYA BOHRA', '2022-12-17 06:16:38', '2023-02-17 14:11:57'),
(114, 'BHILOSA VOHRA', '2022-12-17 06:16:53', '2023-02-17 14:11:57'),
(115, 'VINAYAKIYA', '2022-12-17 06:17:09', '2023-02-17 14:11:57'),
(116, 'BANTHIA', '2022-12-17 06:17:31', '2023-02-17 14:11:57'),
(117, 'KANKARLIYA', '2022-12-17 06:17:45', '2023-02-17 14:11:57'),
(118, 'DESARLA', '2022-12-17 06:18:21', '2023-02-17 14:11:57'),
(119, 'WALDARIA', '2022-12-17 06:18:42', '2023-02-17 14:11:57'),
(120, 'PARAKH', '2022-12-17 06:18:55', '2023-02-17 14:11:57'),
(121, 'GOLCHHA', '2022-12-17 06:19:12', '2023-02-17 14:11:57'),
(122, 'PHOPHALIA', '2022-12-17 06:19:21', '2023-02-17 14:11:57'),
(123, 'GOLECHA', '2022-12-17 06:19:32', '2023-02-17 14:11:57'),
(124, 'BHALGATH', '2022-12-17 06:19:42', '2023-02-17 14:11:57'),
(125, 'SHRI SHRIMAL SETHIYA', '2022-12-17 06:19:58', '2023-02-17 14:11:57'),
(126, 'MANDOT', '2022-12-17 06:20:14', '2023-02-17 14:11:57'),
(212, 'SATIYA', '2023-02-17 06:24:22', '2023-02-17 14:11:57'),
(128, 'SANGHVI BAGRECHA', '2022-12-17 06:20:39', '2023-02-17 14:11:57'),
(129, 'KANTED', '2022-12-17 06:20:50', '2023-02-17 14:11:57'),
(130, 'SHETH', '2022-12-17 06:20:59', '2023-02-17 14:11:57'),
(131, 'RATHORE', '2022-12-17 06:21:10', '2023-02-17 14:11:57'),
(132, 'AMBANI', '2022-12-17 06:21:20', '2023-02-17 14:11:57'),
(133, 'KANGRECHA', '2022-12-17 06:21:30', '2023-02-17 14:11:57'),
(134, 'SAKARIYA', '2022-12-17 06:21:43', '2023-02-17 14:11:57'),
(135, 'OSTAWAL', '2022-12-17 06:21:55', '2023-02-17 14:11:57'),
(136, 'BAID', '2022-12-17 06:22:40', '2023-02-17 14:11:57'),
(137, 'SHAH', '2022-12-17 06:22:49', '2023-02-17 14:11:57'),
(138, 'OBANI', '2022-12-17 06:22:57', '2023-02-17 14:11:57'),
(139, 'DUMAVATH', '2022-12-17 06:23:08', '2023-02-17 14:11:57'),
(141, 'BAFNA', '2022-12-17 06:23:53', '2023-02-17 14:11:57'),
(142, 'GANDHI MUTHA', '2022-12-17 06:24:03', '2023-02-17 14:11:57'),
(143, 'TATED', '2022-12-17 06:24:11', '2023-02-17 14:11:57'),
(144, 'DERASARIYA', '2022-12-17 06:24:21', '2023-02-17 14:11:57'),
(145, 'BANGH', '2022-12-17 06:24:29', '2023-02-17 14:11:57'),
(146, 'DANNI', '2022-12-17 06:24:36', '2023-02-17 14:11:57'),
(147, 'SHIROHIYA', '2022-12-17 06:24:50', '2023-02-17 14:11:57'),
(148, 'BETALA', '2022-12-17 06:24:58', '2023-02-17 14:11:57'),
(149, 'NAHAR', '2022-12-17 06:25:06', '2023-02-17 14:11:57'),
(150, 'MODI', '2022-12-17 06:25:17', '2023-02-17 14:11:57'),
(151, 'LUNAVATH', '2022-12-17 06:25:31', '2023-02-17 14:11:57'),
(152, 'SINGHI', '2022-12-17 06:27:02', '2023-02-17 14:11:57'),
(153, 'CHOWAN', '2022-12-17 06:27:10', '2023-02-17 14:11:57'),
(154, 'SATAVAT', '2022-12-17 06:27:20', '2023-02-17 14:11:57'),
(155, 'TALAWATH', '2022-12-17 06:27:27', '2023-02-17 14:11:57'),
(156, 'VANIGOTHA', '2022-12-17 06:27:35', '2023-02-17 14:11:57'),
(157, 'CHANODIYA', '2022-12-17 06:27:46', '2023-02-17 14:11:57'),
(158, 'KARNAVAT', '2022-12-17 06:27:53', '2023-02-17 14:11:57'),
(159, 'PAVECHA', '2022-12-17 06:28:03', '2023-02-17 14:11:57'),
(160, 'BOTHARA', '2022-12-17 06:28:12', '2023-02-17 14:11:57'),
(161, 'KABADHI', '2022-12-17 06:28:22', '2023-02-17 14:11:57'),
(162, 'BHATEVRA', '2022-12-17 06:28:31', '2023-02-17 14:11:57'),
(163, 'SUNDESHA MUTHA', '2022-12-17 06:28:40', '2023-02-17 14:11:57'),
(164, 'GULECHHA', '2022-12-17 06:28:50', '2023-02-17 14:11:57'),
(165, 'SHRI SHRIMAL JOHTA', '2022-12-17 06:28:58', '2023-02-17 14:11:57'),
(166, 'MUTHALYA', '2022-12-17 06:29:13', '2023-02-17 14:11:57'),
(167, 'HINGER', '2022-12-17 06:29:50', '2023-02-17 14:11:57'),
(168, 'RUNWAL', '2022-12-17 06:30:02', '2023-02-17 14:11:57'),
(169, 'BAGCHAR', '2022-12-17 06:30:19', '2023-02-17 14:11:57'),
(170, 'CHATR GOTA', '2022-12-17 06:30:29', '2023-02-17 14:11:57'),
(171, 'PITANI', '2022-12-17 06:31:21', '2023-02-17 14:11:57'),
(172, 'MERATWAL PAGARIYA', '2022-12-17 06:31:31', '2023-02-17 14:11:57'),
(173, 'MOBAN PARMAR', '2022-12-17 06:31:42', '2023-02-17 14:11:57'),
(174, 'GUGAIYA', '2022-12-17 06:33:19', '2023-02-17 14:11:57'),
(175, 'FAGANIA', '2022-12-17 06:33:42', '2023-02-17 14:11:57'),
(176, 'NIBJIYA', '2022-12-17 06:33:52', '2023-02-17 14:11:57'),
(177, 'MANDLESHA', '2022-12-17 06:34:01', '2023-02-17 14:11:57'),
(178, 'CHOUHAN', '2022-12-17 06:34:11', '2023-02-17 14:11:57'),
(179, 'BAMBOLI', '2022-12-17 06:34:27', '2023-02-17 14:11:57'),
(180, 'GOL GOTRA', '2022-12-17 06:34:36', '2023-02-17 14:11:57'),
(181, 'test', '2022-12-17 06:34:47', '2023-02-17 14:11:57'),
(182, 'DIWANSA', '2022-12-17 06:35:10', '2023-02-17 14:11:57'),
(183, 'SEHLOT', '2022-12-17 06:35:18', '2023-02-17 14:11:57'),
(184, 'DUNGARWAL', '2022-12-17 06:35:28', '2023-02-17 14:11:57'),
(185, 'MANAVATH', '2022-12-17 06:35:38', '2023-02-17 14:11:57'),
(186, 'LAMB GOTRA CHAUHAN', '2022-12-17 06:35:47', '2023-02-17 14:11:57'),
(187, 'MUTHIYAN', '2022-12-17 06:35:54', '2023-02-17 14:11:57'),
(188, 'DANTI', '2022-12-17 06:36:04', '2023-02-17 14:11:57'),
(189, 'FOFALIYA', '2022-12-17 06:36:18', '2023-02-17 14:11:57'),
(190, 'MADWARIYA CHUVAN', '2022-12-17 06:37:42', '2023-02-17 14:11:57'),
(191, 'SEMLANI', '2022-12-17 06:37:51', '2023-02-17 14:11:57'),
(192, 'POONAMI', '2022-12-17 06:38:00', '2023-02-17 14:11:57'),
(193, 'KANKALIYA', '2022-12-17 06:38:11', '2023-02-17 14:11:57'),
(194, 'GOEARDHAN GOTRA CHOUDHARI', '2022-12-17 06:38:21', '2023-02-17 14:11:57'),
(195, 'MAKANA', '2022-12-17 06:38:34', '2023-02-17 14:11:57'),
(196, 'KOCHAR', '2022-12-17 06:38:43', '2023-02-17 14:11:57'),
(197, 'KHICHA', '2022-12-17 06:38:53', '2023-02-17 14:11:57'),
(198, 'KHODA', '2022-12-17 06:39:20', '2023-02-17 14:11:57'),
(199, 'ANDONI', '2022-12-17 06:39:30', '2023-02-17 14:11:57'),
(200, 'RANAWAT', '2022-12-17 06:39:43', '2023-02-17 14:11:57'),
(201, 'VOHRA', '2022-12-17 06:39:52', '2023-02-17 14:11:57'),
(202, 'OSWAL', '2022-12-17 06:40:02', '2023-02-17 14:11:57'),
(203, 'GEMAWAT', '2022-12-17 06:40:10', '2023-02-17 14:11:57'),
(204, 'PARAKH RATHOD', '2022-12-17 06:40:21', '2023-02-17 14:11:57'),
(205, 'BACHAWAT MEHTA', '2022-12-17 06:40:34', '2023-02-17 14:11:57'),
(206, 'SEHLOT', '2022-12-17 06:40:45', '2023-02-17 14:11:57'),
(207, 'CHORDIA', '2022-12-17 06:40:54', '2023-02-17 14:11:57'),
(208, 'BADOLA', '2022-12-17 06:41:02', '2023-02-17 14:11:57'),
(209, 'KHOTED', '2022-12-17 06:41:12', '2023-02-17 14:11:57'),
(210, 'KAMAL GOTRA', '2022-12-17 06:41:20', '2023-02-17 14:11:57'),
(211, 'Dev Test Surname', '2022-12-19 08:32:05', '2023-02-17 14:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `thoughts`
--

CREATE TABLE `thoughts` (
  `id` int NOT NULL,
  `event` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `eventDate` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thoughts`
--

INSERT INTO `thoughts` (`id`, `event`, `date`, `eventDate`, `created_at`, `updated_at`) VALUES
(1, 'hjgfdh hi..............hhhhhhhhhh', '2023-02-19', '19 February, 2023', '2023-02-17 18:50:09', '2023-02-17 18:56:04'),
(2, 'hello.........', '2023-02-18', '18 February, 2023', '2023-02-17 18:50:40', '2023-02-17 19:07:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone_no` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_insert` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `is_update` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `is_delete` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `is_view` tinyint(1) NOT NULL DEFAULT '0',
  `role` tinyint NOT NULL COMMENT '1 for admin and 2 form sub admin',
  `remember_token` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `otp` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone_no`, `is_insert`, `is_update`, `is_delete`, `is_view`, `role`, `remember_token`, `otp`, `created_at`, `updated_at`) VALUES
(2, 'Admin', NULL, NULL, '$2y$10$/xar.y0fzgc6EnqQz8xZ2.L2.NyD2cKCRf7nog1uOx70inDp2Ay5e', '123456', '1', '1', '1', 1, 1, NULL, NULL, '2022-11-23 01:20:16', '2023-02-22 10:21:28'),
(3, 'ji', NULL, NULL, '$2y$10$MZyL2AkX4vcr3YJs0UA/9uAbHWojcHSvjpNCZUJXN9QN7EvoDsHse', '9898565856', '1', '1', '1', 0, 1, NULL, NULL, '2022-11-23 04:23:26', '2023-02-22 10:22:47'),
(4, 'Ajay', NULL, NULL, '$2y$10$hBZeR8afL2NX2EYGVqCRU.xIHkR5kNzTyJj128Q873XkISLETskUu', '7892059939', '1', '1', '1', 1, 1, NULL, NULL, '2022-12-17 04:42:39', '2022-12-17 04:42:39'),
(6, 'fgfg', NULL, NULL, '$2y$10$fdMblv5dg7HKdkG5vJXzX.NNzaqNe35M2SXWB8BDpgaLEHnWIcJ7e', '122222222', '1', '1', '1', 1, 1, NULL, NULL, '2023-02-22 09:50:32', '2023-02-22 09:50:32'),
(7, 'hi', NULL, NULL, '$2y$10$roXgH2lXC7Vb4xLUveALouE50oIY1Z2aU0w6Ps16w2/t8mVG62jKu', '2121212', '1', '1', '1', 1, 2, NULL, NULL, '2023-02-22 09:57:59', '2023-02-22 10:25:38');

-- --------------------------------------------------------

--
-- Table structure for table `utilites`
--

CREATE TABLE `utilites` (
  `id` int NOT NULL,
  `banner_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `phone_no` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `office_no` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customer_id` int NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0',
  `comment` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `other_file` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `sub_category_id` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `utilites`
--

INSERT INTO `utilites` (`id`, `banner_url`, `name`, `phone_no`, `office_no`, `address`, `country`, `state`, `city`, `description`, `created_at`, `updated_at`, `customer_id`, `is_approved`, `comment`, `other_file`, `category_id`, `sub_category_id`) VALUES
(1, '/public/utilites_banner/banner_1677084639.jpg', 'hello', '767676767', 'ABC-123', 'New Street', 'India', 'K', 'Banglore', NULL, '2023-02-22 11:20:39', '2023-02-22 11:20:39', 40, 0, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `utilities_categories`
--

CREATE TABLE `utilities_categories` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `utilities_categories`
--

INSERT INTO `utilities_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(16, 'DECORATION', '2022-12-24 07:41:07', '2023-02-17 14:11:57'),
(28, 'BLOOD GROUPS', '2022-12-24 08:36:11', '2023-02-17 14:11:57'),
(9, 'ASTROGER', '2022-12-24 05:25:34', '2023-02-17 14:11:57'),
(11, 'CORIERS', '2022-12-24 05:26:18', '2023-02-17 14:11:57'),
(12, 'CREMATORIUM-मुक्तिधाम', '2022-12-24 05:26:52', '2023-02-17 14:11:57'),
(13, 'DOCTORS', '2022-12-24 05:27:10', '2023-02-17 14:11:57'),
(14, 'EDUCATION', '2022-12-24 05:27:24', '2023-02-17 14:11:57'),
(15, 'JAIN INFORMATION', '2022-12-24 05:27:46', '2023-02-17 14:11:57'),
(17, 'GAUSALA-गौशाला', '2022-12-24 07:41:46', '2023-02-17 14:11:57'),
(18, 'CORPORATION', '2022-12-24 07:43:06', '2023-02-17 14:11:57'),
(19, 'HOSPITAL', '2022-12-24 07:43:17', '2023-02-17 14:11:57'),
(20, 'MARRIAGE HALL', '2022-12-24 07:44:08', '2023-02-17 14:11:57'),
(21, 'ASHRAM', '2022-12-24 07:44:57', '2023-02-17 14:11:57'),
(22, 'MUSICIANS', '2022-12-24 07:45:15', '2023-02-17 14:11:57'),
(23, 'SECURITY', '2022-12-24 07:46:58', '2023-02-17 14:11:57'),
(24, 'POST OFFICE', '2022-12-24 07:47:13', '2023-02-17 14:11:57'),
(25, 'MEDIA', '2022-12-24 08:12:48', '2023-02-17 14:11:57'),
(26, 'TRANSPORT', '2022-12-24 08:13:02', '2023-02-17 14:11:57'),
(27, 'MARRIGE SERVICE', '2022-12-24 08:13:23', '2023-02-17 14:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `utilities_sub_category`
--

CREATE TABLE `utilities_sub_category` (
  `id` int NOT NULL,
  `parent_id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `utilities_sub_category`
--

INSERT INTO `utilities_sub_category` (`id`, `parent_id`, `name`, `created_at`, `updated_at`) VALUES
(7, 26, 'LORRY TRANSPORTS', '2022-12-24 02:31:16', '2023-02-17 14:11:57'),
(8, 26, 'TRAVELS SERVICE', '2022-12-24 02:31:26', '2023-02-17 14:11:57'),
(9, 15, 'TEMPLE', '2022-12-24 02:31:33', '2023-02-17 14:11:57'),
(10, 15, 'SOCIAL GROUPS', '2022-12-24 05:29:10', '2023-02-17 14:11:57'),
(11, 26, 'RAILWAY', '2022-12-24 08:15:36', '2023-02-17 14:11:57'),
(12, 26, 'AIRPORTS', '2022-12-24 08:16:40', '2023-02-17 14:11:57'),
(13, 23, 'POLICE STATIONS', '2022-12-24 08:17:21', '2023-02-17 14:11:57'),
(14, 23, 'SECURITY GUARD SERVICE', '2022-12-24 08:17:55', '2023-02-17 14:11:57'),
(15, 16, 'SAMIYANA SERVICE', '2022-12-24 08:18:49', '2023-02-17 14:11:57'),
(16, 27, 'SAFA(PAGADI)', '2022-12-24 08:19:32', '2023-02-17 14:11:57'),
(17, 25, 'NEWS PAPER', '2022-12-24 08:20:11', '2023-02-17 14:11:57'),
(18, 25, 'TV MEDIA', '2022-12-24 08:20:36', '2023-02-17 14:11:57'),
(19, 25, 'REPOTER', '2022-12-24 08:20:50', '2023-02-17 14:11:57'),
(20, 21, 'OLD AGE HOME', '2022-12-24 08:22:07', '2023-02-17 14:11:57'),
(21, 22, 'BAND', '2022-12-24 08:22:50', '2023-02-17 14:11:57'),
(22, 22, 'SOUND SYSTEM', '2022-12-24 08:23:23', '2023-02-17 14:11:57'),
(23, 21, 'ANATH ASHRAM', '2022-12-24 08:24:07', '2023-02-17 14:11:57'),
(24, 21, 'HANDICAP ASHRAM', '2022-12-24 08:25:27', '2023-02-17 14:11:57'),
(25, 21, 'MENTALLY ASHRAM', '2022-12-24 08:25:59', '2023-02-17 14:11:57'),
(26, 27, 'MARRIAGE HALL', '2022-12-24 08:26:18', '2023-02-17 14:11:57'),
(27, 15, 'JAIN THIRTH', '2022-12-24 08:27:12', '2023-02-17 14:11:57'),
(28, 15, 'TERAPANTH BHAVAN', '2022-12-24 08:27:32', '2023-02-17 14:11:57'),
(29, 15, 'STHANAK BHAVAN', '2022-12-24 08:27:52', '2023-02-17 14:11:57'),
(30, 15, 'JAIN TRUST', '2022-12-24 08:28:11', '2023-02-17 14:11:57'),
(31, 15, 'SADHU SADHAVI', '2022-12-24 08:28:35', '2023-02-17 14:11:57'),
(32, 15, 'JAIN RAILWAY TIFFAN', '2022-12-24 08:28:58', '2023-02-17 14:11:57'),
(33, 15, 'GOTRA AND KULDEVI', '2022-12-24 08:29:29', '2023-02-17 14:11:57'),
(34, 15, 'TIRTHANKAR PRICHAY', '2022-12-24 08:29:56', '2023-02-17 14:11:57'),
(35, 15, 'PACHAKKAN', '2022-12-24 08:30:17', '2023-02-17 14:11:57'),
(36, 15, 'JAIN SANGEETKAR', '2022-12-24 08:31:14', '2023-02-17 14:11:57'),
(37, 15, 'JAIN GURUKUL', '2022-12-24 08:31:38', '2023-02-17 14:11:57'),
(38, 15, 'DADAWADI', '2022-12-24 08:31:53', '2023-02-17 14:11:57'),
(39, 15, 'BHOJANSALA', '2022-12-24 08:32:08', '2023-02-17 14:11:57'),
(40, 15, 'GAUSALA-गौशाला', '2022-12-24 08:32:30', '2023-02-17 14:11:57'),
(41, 27, 'EVENTS SERVICE', '2022-12-24 08:32:51', '2023-02-17 14:11:57'),
(42, 27, 'COOK AND CATTERERS', '2022-12-24 08:33:40', '2023-02-17 14:11:57'),
(43, 19, 'AMBULANCE', '2022-12-24 08:35:18', '2023-02-17 14:11:57'),
(44, 19, 'BLOOD BANK', '2022-12-24 08:35:44', '2023-02-17 14:11:57'),
(45, 28, 'BLOOD DONNERS', '2022-12-24 08:36:36', '2023-02-17 14:11:57'),
(46, 19, 'GENRAL HOSPITAL', '2022-12-24 08:37:50', '2023-02-17 14:11:57'),
(47, 19, 'AURVEDIC HOSPITAL', '2022-12-24 08:38:16', '2023-02-17 14:11:57'),
(48, 19, 'EYE BANK', '2022-12-24 08:38:40', '2023-02-17 14:11:57'),
(49, 19, 'HEALTH HEAL SERVICE', '2022-12-24 08:39:57', '2023-02-17 14:11:57'),
(50, 19, 'RADIOLOGIST (X-RAY)', '2022-12-24 08:40:29', '2023-02-17 14:11:57'),
(51, 19, 'SCAN CENTRE', '2022-12-24 08:40:51', '2023-02-17 14:11:57'),
(52, 13, 'ACCU PUNTURE', '2022-12-24 08:41:35', '2023-02-17 14:11:57'),
(53, 13, 'ANEASTHETIST', '2022-12-24 08:42:02', '2023-02-17 14:11:57'),
(54, 13, 'AYRVEDIC', '2022-12-24 08:42:55', '2023-02-17 14:11:57'),
(55, 13, 'CHEST PHYSICAN', '2022-12-24 08:43:17', '2023-02-17 14:11:57'),
(56, 13, 'CORDIOLOGIST', '2022-12-24 08:43:40', '2023-02-17 14:11:57'),
(57, 13, 'CONSULTIONT &FAMILY PHYSICIAN', '2022-12-24 08:44:27', '2023-02-17 14:11:57'),
(58, 13, 'DENTIEST', '2022-12-24 08:45:00', '2023-02-17 14:11:57'),
(59, 13, 'DENTO ORAL SURGEON', '2022-12-24 08:45:28', '2023-02-17 14:11:57'),
(60, 13, 'DERMATOLOGIST SKIN SPL', '2022-12-24 08:46:08', '2023-02-17 14:11:57'),
(61, 13, 'DIABETOLOGIST/THYROID', '2022-12-24 08:47:01', '2023-02-17 14:11:57'),
(62, 13, 'ENDOCRONOLOGIST', '2022-12-24 08:47:26', '2023-02-17 14:11:57'),
(63, 13, 'ENDOSCOPIST &PROTOLOGIST SURGEON', '2022-12-24 08:48:12', '2023-02-17 14:11:57'),
(64, 13, 'ENT SURGEON', '2022-12-24 08:48:34', '2023-02-17 14:11:57'),
(65, 13, 'FAMILY PHYSICAN', '2022-12-24 08:48:58', '2023-02-17 14:11:57'),
(66, 13, 'GENRAL PRACTITIONER', '2022-12-25 00:25:03', '2023-02-17 14:11:57'),
(67, 13, 'GENRAL SURGEON', '2022-12-25 00:25:38', '2023-02-17 14:11:57'),
(68, 13, 'GESTRO ENTOLOGIST', '2022-12-25 00:26:17', '2023-02-17 14:11:57'),
(69, 13, 'GYNAECOLOGIST', '2022-12-25 00:28:40', '2023-02-17 14:11:57'),
(70, 13, 'HOMEOPATHIC', '2022-12-25 00:29:17', '2023-02-17 14:11:57'),
(71, 13, 'KNEE REPLACEMENTS', '2022-12-25 00:30:47', '2023-02-17 14:11:57'),
(72, 13, 'MD.PHYSIAN', '2022-12-25 00:31:13', '2023-02-17 14:11:57'),
(73, 13, 'NEPHROLOGIST', '2022-12-25 00:31:36', '2023-02-17 14:11:57'),
(74, 13, 'NEURO PSYCHIATRIST', '2022-12-25 00:32:06', '2023-02-17 14:11:57'),
(75, 13, 'NEURO PHYSICAN', '2022-12-25 00:32:27', '2023-02-17 14:11:57'),
(76, 13, 'NEURO SURGEON', '2022-12-25 00:33:03', '2023-02-17 14:11:57'),
(77, 13, 'ONCO PHYSICIAN', '2022-12-25 00:33:31', '2023-02-17 14:11:57'),
(78, 13, 'ORTHOPAEDIC SURGEON', '2022-12-25 00:34:07', '2023-02-17 14:11:57'),
(79, 13, 'ORTHALMOLOGIST (EYE)', '2022-12-25 00:34:24', '2023-02-17 14:11:57'),
(80, 13, 'PARLYSIS', '2022-12-25 00:35:10', '2023-02-17 14:11:57'),
(81, 13, 'PEDEATRIC ACCU PUNTURE', '2022-12-25 00:36:13', '2023-02-17 14:11:57'),
(82, 13, 'PEDEATRIC NEUROPHYSICIAN', '2022-12-25 00:36:47', '2023-02-17 14:11:57'),
(83, 13, 'PEDEATRICIAN (CHILDRES SPL)', '2022-12-25 00:37:12', '2023-02-17 14:11:57'),
(84, 13, 'PHYSIOTHERAPIST', '2022-12-25 00:37:55', '2023-02-17 14:11:57'),
(85, 13, 'PLASTIC SURGEON', '2022-12-25 00:38:24', '2023-02-17 14:11:57'),
(86, 13, 'REKHI HILLING CENTRE', '2022-12-25 00:39:27', '2023-02-17 14:11:57'),
(87, 13, 'RHEUMATOLOGIST COUNSULTANT', '2022-12-25 00:40:04', '2023-02-17 14:11:57'),
(88, 13, 'SURGEON', '2022-12-25 00:40:31', '2023-02-17 14:11:57'),
(89, 13, 'UROLOGIST', '2022-12-25 00:40:51', '2023-02-17 14:11:57'),
(90, 13, 'VASCULAR SURGEON', '2022-12-25 00:41:16', '2023-02-17 14:11:57'),
(91, 14, 'COLLEGE', '2022-12-25 00:41:49', '2023-02-17 14:11:57'),
(92, 14, 'SCHOOLS', '2022-12-25 00:42:04', '2023-02-17 14:11:57'),
(93, 14, 'PLAY HOME', '2022-12-25 00:42:26', '2023-02-17 14:11:57'),
(94, 15, 'JAIN DHARMSALA', '2023-01-11 02:39:01', '2023-02-17 14:11:57'),
(95, 13, 'SKIN specialist', '2023-01-14 07:33:10', '2023-02-17 14:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int NOT NULL,
  `video_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `customer_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `video_url`, `description`, `created_at`, `updated_at`, `customer_id`) VALUES
(17, 'https://www.youtube.com/embed/800ykZfmaWw', 'jain stuti', '2023-01-04 01:31:17', '2023-02-17 14:11:57', 0),
(19, 'https://www.youtube.com/embed/Dxm-viufz4Q', 'terapanth ro bhayvidhata-', '2023-01-04 01:33:46', '2023-02-17 14:11:57', 0),
(20, 'https://www.youtube.com/embed/6LVZUdg4PFI', 'chaloji nakoda', '2023-01-04 01:34:19', '2023-02-17 14:11:57', 0),
(18, 'https://www.youtube.com/embed/Zj_JLVdwwP4', 'gurudev teri dunia', '2023-01-04 01:32:05', '2023-02-17 14:11:57', 0),
(21, 'https://www.youtube.com/embed/A5UXn0AXLKQ', 'badi santhi', '2023-01-04 01:34:51', '2023-02-17 14:11:57', 0),
(22, 'https://www.youtube.com/embed/WvIbbVu1HpI', 'ratnakar pachisi', '2023-01-04 01:35:23', '2023-02-17 14:11:57', 0),
(23, 'https://www.youtube.com/embed/l9Px4e0AiAM', 'bhaktamber hindi', '2023-01-04 01:35:49', '2023-02-17 14:11:57', 0),
(24, 'https://www.youtube.com/embed/D63j3hamK9A', 'sankatmochan mangalik', '2023-01-04 01:36:33', '2023-02-17 14:11:57', 0),
(25, 'https://youtu.be/7D4hGAO__b8', 'dadagurudev ektisha', '2023-01-15 08:57:20', '2023-02-17 14:11:57', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `anniversary`
--
ALTER TABLE `anniversary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `birthday`
--
ALTER TABLE `birthday`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_group`
--
ALTER TABLE `blood_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `business_category`
--
ALTER TABLE `business_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendars`
--
ALTER TABLE `calendars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `calendar_jain_years`
--
ALTER TABLE `calendar_jain_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `family_member`
--
ALTER TABLE `family_member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group`
--
ALTER TABLE `group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matrimony`
--
ALTER TABLE `matrimony`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `native_place`
--
ALTER TABLE `native_place`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news-category`
--
ALTER TABLE `news-category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_sub_category`
--
ALTER TABLE `news_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `panths`
--
ALTER TABLE `panths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patti`
--
ALTER TABLE `patti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relationship`
--
ALTER TABLE `relationship`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slides`
--
ALTER TABLE `slides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `surname`
--
ALTER TABLE `surname`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `thoughts`
--
ALTER TABLE `thoughts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilites`
--
ALTER TABLE `utilites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilities_categories`
--
ALTER TABLE `utilities_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilities_sub_category`
--
ALTER TABLE `utilities_sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `anniversary`
--
ALTER TABLE `anniversary`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `birthday`
--
ALTER TABLE `birthday`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blood_group`
--
ALTER TABLE `blood_group`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `business_category`
--
ALTER TABLE `business_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `calendars`
--
ALTER TABLE `calendars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `calendar_jain_years`
--
ALTER TABLE `calendar_jain_years`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=902;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `family_member`
--
ALTER TABLE `family_member`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `group`
--
ALTER TABLE `group`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `matrimony`
--
ALTER TABLE `matrimony`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `native_place`
--
ALTER TABLE `native_place`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `news-category`
--
ALTER TABLE `news-category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `news_sub_category`
--
ALTER TABLE `news_sub_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `panths`
--
ALTER TABLE `panths`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `patti`
--
ALTER TABLE `patti`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `relationship`
--
ALTER TABLE `relationship`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `slides`
--
ALTER TABLE `slides`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `surname`
--
ALTER TABLE `surname`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `thoughts`
--
ALTER TABLE `thoughts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `utilites`
--
ALTER TABLE `utilites`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `utilities_categories`
--
ALTER TABLE `utilities_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `utilities_sub_category`
--
ALTER TABLE `utilities_sub_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
