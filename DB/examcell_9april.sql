-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2019 at 07:30 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `examcell`
--

-- --------------------------------------------------------

--
-- Table structure for table `academic_settings`
--

CREATE TABLE `academic_settings` (
  `settings_id` int(11) NOT NULL,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `academic_settings`
--

INSERT INTO `academic_settings` (`settings_id`, `type`, `description`) VALUES
(1, 'limit_upload', ''),
(2, 'report_teacher', '1'),
(3, 'minium_mark', '61'),
(22, 'teacher_average', '1'),
(13, 'minium_average', '80'),
(23, 'max_mark', ''),
(24, 'allowed_marks', '1');

-- --------------------------------------------------------

--
-- Table structure for table `academic_syllabus`
--

CREATE TABLE `academic_syllabus` (
  `academic_syllabus_id` int(11) NOT NULL,
  `academic_syllabus_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `uploader_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `uploader_id` int(11) NOT NULL,
  `year` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `subject_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `academic_syllabus`
--

INSERT INTO `academic_syllabus` (`academic_syllabus_id`, `academic_syllabus_code`, `title`, `description`, `class_id`, `uploader_type`, `uploader_id`, `year`, `timestamp`, `file_name`, `subject_id`) VALUES
(8, '9aa5b4b', 'xc', 'cxcx', 23, 'teacher', 27, '2016-2017', '1525250986', 'user.jpg', NULL),
(9, '86d742a', 'cc', 'cc', 23, 'teacher', 27, '2016-2017', '1525251009', 'GANESH.pptx', NULL),
(10, 'fb7186f', 'asas', 'ssd', 23, 'teacher', 27, '2016-2017', '1525251078', '05_ISA Action Plan -what should be there_.pdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `owner_status` int(11) NOT NULL DEFAULT '0' COMMENT '1 owner, 0 not owner',
  `username` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `birthday` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `email`, `password`, `phone`, `address`, `owner_status`, `username`, `status`, `birthday`) VALUES
(1, 'Jeeva', 'jeevaa19@gmail.com', 'd5f12e53a182c062b6bf30c1445153faff12269a', '9994985459', 'nagamalai pudukottai', 1, 'admin', 1, '19-12-1985'),
(45, 'VBC Director', 'jeevaa19@gmail.com', 'd5f12e53a182c062b6bf30c1445153faff12269a', '9994985459', 'nagamalai pudukottai', 1, 'vbcdirector', 1, '19-12-1985');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `aid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `q_option` text NOT NULL,
  `uid` int(11) NOT NULL,
  `score_u` float NOT NULL DEFAULT '0',
  `rid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`aid`, `qid`, `q_option`, `uid`, `score_u`, `rid`) VALUES
(3405, 1, '2', 8, -0.5, 1),
(3406, 2, '2', 8, -0.5, 1),
(3407, 3, '2', 8, -0.5, 1),
(3408, 4, '2', 8, -0.5, 1),
(3409, 5, '2', 8, -0.5, 1),
(3410, 6, '2', 8, -0.5, 1),
(3411, 7, '2', 8, -0.5, 1),
(3412, 8, '2', 8, -0.5, 1),
(3413, 9, '2', 8, 1, 1),
(3414, 10, '2', 8, 1, 1),
(3415, 11, '2', 8, 1, 1),
(3416, 12, '2', 8, 1, 1),
(3417, 13, '2', 8, 1, 1),
(3418, 14, '2', 8, 1, 1),
(3419, 15, '2', 8, 1, 1),
(3420, 16, '2', 8, -0.5, 1),
(3421, 17, '2', 8, -0.5, 1),
(3422, 18, '2', 8, -0.5, 1),
(3423, 19, '2', 8, -0.5, 1),
(3424, 20, '2', 8, -0.5, 1),
(3425, 21, '2', 8, -0.5, 1),
(3426, 22, '2', 8, -0.5, 1),
(3427, 23, '2', 8, -0.5, 1),
(3428, 24, '2', 8, -0.5, 1),
(3429, 25, '2', 8, -0.5, 1),
(3430, 26, '2', 8, -0.5, 1),
(3431, 27, '2', 8, -0.5, 1),
(3432, 28, '2', 8, -0.5, 1),
(3433, 29, '2', 8, -0.5, 1),
(3434, 30, '2', 8, -0.5, 1),
(3435, 31, '2', 8, -0.5, 1),
(3436, 32, '2', 8, -0.5, 1),
(3437, 33, '2', 8, -0.5, 1),
(3438, 34, '2', 8, -0.5, 1),
(3439, 35, '2', 8, -0.5, 1),
(3440, 36, '2', 8, -0.5, 1),
(3441, 37, '2', 8, -0.5, 1),
(3442, 38, '2', 8, 1, 1),
(3443, 40, '2', 8, 1, 1),
(3444, 41, '2', 8, -0.5, 1),
(3445, 42, '2', 8, -0.5, 1),
(3446, 43, '2', 8, -0.5, 1),
(3447, 44, '2', 8, -0.5, 1),
(3448, 45, '2', 8, 1, 1),
(3449, 46, '2', 8, 1, 1),
(3450, 47, '2', 8, 1, 1),
(3451, 48, '2', 8, 1, 1),
(3452, 49, '2', 8, 1, 1),
(3453, 50, '2', 8, 1, 1),
(3454, 51, '2', 8, 1, 1),
(3455, 52, '2', 8, 1, 1),
(3456, 53, '2', 8, 1, 1),
(3457, 54, '2', 8, 1, 1),
(3458, 55, '2', 8, 1, 1),
(3459, 56, '2', 8, 1, 1),
(3460, 57, '2', 8, 1, 1),
(3461, 58, '2', 8, 1, 1),
(3462, 59, '2', 8, 1, 1),
(3463, 60, '4', 8, -0.5, 1),
(3464, 62, '2', 8, -0.5, 1),
(3465, 63, '2', 8, -0.5, 1),
(3466, 64, '2', 8, -0.5, 1),
(3467, 65, '2', 8, -0.5, 1),
(3468, 66, '3', 8, -0.5, 1),
(3469, 67, '3', 8, -0.5, 1),
(3470, 68, '2', 8, -0.5, 1),
(3486, 1, '2', 8, -0.5, 2),
(3487, 2, '2', 8, -0.5, 2),
(3488, 3, '2', 8, -0.5, 2),
(3489, 4, '2', 8, -0.5, 2),
(3490, 5, '2', 8, -0.5, 2),
(3535, 1, '2', 6, -0.5, 3),
(3536, 2, '2', 6, -0.5, 3),
(3537, 3, '2', 6, -0.5, 3),
(3538, 4, '2', 6, -0.5, 3),
(3539, 5, '2', 6, -0.5, 3),
(3540, 6, '2', 6, -0.5, 3),
(3541, 7, '2', 6, -0.5, 3),
(3542, 8, '2', 6, -0.5, 3),
(3570, 1, '1', 6, -0.5, 4),
(3571, 2, '3', 6, 1, 4),
(3572, 3, '2', 6, -0.5, 4),
(3573, 4, '2', 6, -0.5, 4),
(3574, 5, '2', 6, -0.5, 4),
(3575, 6, '2', 6, -0.5, 4),
(3601, 1, '2', 6, -0.5, 5),
(3602, 2, '2', 6, -0.5, 5),
(3603, 2, '3', 6, 1, 5),
(3604, 3, '2', 6, -0.5, 5),
(3605, 4, '2', 6, -0.5, 5),
(3606, 5, '2', 6, -0.5, 5),
(3613, 1, '2', 6, -0.5, 6),
(3653, 1, '2', 6, -0.5, 7),
(3654, 2, '2', 6, -0.5, 7),
(3655, 3, '2', 6, -0.5, 7),
(3656, 4, '2', 6, -0.5, 7),
(3657, 5, '2', 6, -0.5, 7),
(3658, 6, '2', 6, -0.5, 7),
(3660, 1, '2', 6, -0.5, 8),
(3663, 1, '1', 8, -0.5, 9),
(3666, 1, '1', 3, -0.5, 10),
(3673, 1, '1', 6, -0.5, 11),
(3674, 2, '1', 6, -0.5, 11),
(3675, 3, '1', 6, -0.5, 11),
(3682, 1, '3', 6, 1, 12),
(3683, 2, '3', 6, 1, 12),
(3684, 3, '3', 6, 1, 12),
(3700, 1, '1', 8, -0.5, 13),
(3701, 2, '2', 8, -0.5, 13),
(3702, 3, '4', 8, -0.5, 13),
(3703, 4, '2', 8, -0.5, 13),
(3704, 5, '4', 8, -0.5, 13),
(3714, 1, '1', 71, -0.5, 14),
(3715, 2, '3', 71, 1, 14),
(3716, 3, '3', 71, 1, 14);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `year` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0(undefined) 1(present) 2(absent)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `timestamp`, `year`, `class_id`, `section_id`, `student_id`, `status`) VALUES
(1, '1525298400', '2016-2017', 1, 38, 1, 3),
(2, '1525212000', '2016-2017', 1, 38, 1, 2),
(3, '1523829600', '2016-2017', 1, 38, 1, 3),
(4, '1525125600', '2016-2017', 1, 38, 1, 0),
(5, '1522015200', '2016-2017', 1, 38, 1, 0),
(6, '1525298400', '2016-2017', 3, 37, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `attendance_backup`
--

CREATE TABLE `attendance_backup` (
  `attendance_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 undefined , 1 present , 2  absent',
  `student_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `year` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `session` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `book_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `author` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `price` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('4de6d80952980f0c0b38a6dc49a8c3087e937fc6', '::1', 1554786980, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535343738363931343b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a224a65657661223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('5debf67454e62a9cc6436e555d6a8db64d0ce134', '::1', 1554787009, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535343738363939353b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a224a65657661223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('64954f04024dd25c210d1b45804a3a533a9ebebd', '::1', 1554786404, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535343738363339323b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a224a65657661223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('68845cee6c9db727915b3b5820c3ff308575ede5', '::1', 1554787789, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535343738373533303b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a224a65657661223b6c6f67696e5f747970657c733a353a2261646d696e223b72656665727265645f66726f6d7c733a35353a22687474703a2f2f6c6f63616c686f73743a383038302f6578616d63656c6c2f696e6465782e7068702f41646d696e2f73747564656e7473223b),
('6a1d2419e727e0ae7a9ea0ab452ac8993b30d706', '::1', 1554785511, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535343738353333393b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a224a65657661223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('74d8ec9c44a65d579df701797e504a2a41bd5c7b', '::1', 1554787522, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535343738373232383b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a224a65657661223b6c6f67696e5f747970657c733a353a2261646d696e223b72656665727265645f66726f6d7c733a37303a22687474703a2f2f6c6f63616c686f73743a383038302f6578616d63656c6c2f696e6465782e7068702f41646d696e2f73747564656e74732f696d616765732f696d672e6a7067223b),
('90bab1b127cab40f3c17d178ebd564a1813fa57c', '::1', 1554785752, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535343738353634323b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a224a65657661223b6c6f67696e5f747970657c733a353a2261646d696e223b6d6573736167657c733a34373a223c64697620636c6173733d27616c65727420616c6572742d64616e676572273e5155495a20454e44203c2f6469763e223b5f5f63695f766172737c613a313a7b733a373a226d657373616765223b733a333a226f6c64223b7d),
('9dd67842493bf4282cb66991f10929db1ebc0dd6', '::1', 1554785230, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535343738343935363b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a224a65657661223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('9f4887cf71ebac979613e09b084521b97edd231a', '::1', 1554786633, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535343738363531313b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a224a65657661223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('e0f79d99b82724451b54480cd68a32e0c3ab93f8', '::1', 1554786372, 0x5f5f63695f6c6173745f726567656e65726174657c693a313535343738363231393b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a224a65657661223b6c6f67696e5f747970657c733a353a2261646d696e223b);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `class_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `name_numeric` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`class_id`, `name`, `name_numeric`) VALUES
(2, 'Grade 2', 'II'),
(3, 'Grade 3', 'III'),
(4, 'Grade 4', 'IV'),
(5, 'Grade 5', 'V'),
(8, 'Grade 8', 'VIII'),
(11, 'Grade 11', 'XI'),
(12, 'Grade 12', 'XII'),
(13, 'Grade 13', 'XIII');

-- --------------------------------------------------------

--
-- Table structure for table `class_routine`
--

CREATE TABLE `class_routine` (
  `class_routine_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `time_start` int(11) NOT NULL,
  `time_end` int(11) NOT NULL,
  `time_start_min` int(11) NOT NULL,
  `time_end_min` int(11) NOT NULL,
  `day` longtext COLLATE utf8_unicode_ci NOT NULL,
  `year` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `class_routine`
--

INSERT INTO `class_routine` (`class_routine_id`, `class_id`, `section_id`, `subject_id`, `time_start`, `time_end`, `time_start_min`, `time_end_min`, `day`, `year`) VALUES
(1, 1, 38, 1, 17, 18, 30, 30, 'Monday', '2016-2017'),
(2, 1, 38, 3, 18, 20, 0, 30, 'Wednesday', '2016-2017'),
(3, 1, 38, 2, 19, 21, 30, 30, 'sabado', '2016-2017');

-- --------------------------------------------------------

--
-- Table structure for table `common_user`
--

CREATE TABLE `common_user` (
  `common_user_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `owner_status` int(11) NOT NULL DEFAULT '0' COMMENT '1 owner, 0 not owner',
  `username` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `birthday` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `common_user`
--

INSERT INTO `common_user` (`common_user_id`, `name`, `email`, `password`, `phone`, `address`, `owner_status`, `username`, `status`, `birthday`) VALUES
(1, 'Jeeva', 'jeevaa19@gmail.com', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', '9994985459', 'nagamalai pudukottai', 1, 'common_user', 1, '19-12-1985');

-- --------------------------------------------------------

--
-- Table structure for table `compartment`
--

CREATE TABLE `compartment` (
  `compartment_id` bigint(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compartment`
--

INSERT INTO `compartment` (`compartment_id`, `name`, `status`) VALUES
(1, 'Primary', 1),
(2, 'Middle', 1),
(3, 'High School', 1),
(4, 'Higher Secondary', 1),
(5, 'Sr.Secondary', 1),
(6, 'IIT/NEET', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coordinator`
--

CREATE TABLE `coordinator` (
  `coordinator_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birthday` longtext COLLATE utf8_unicode_ci,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password_text` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `username` longtext COLLATE utf8_unicode_ci NOT NULL,
  `school_id` int(11) NOT NULL,
  `compartment_id` int(11) NOT NULL,
  `acd_year_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coordinator`
--

INSERT INTO `coordinator` (`coordinator_id`, `name`, `birthday`, `sex`, `address`, `phone`, `email`, `password`, `password_text`, `username`, `school_id`, `compartment_id`, `acd_year_id`) VALUES
(1, 'HM1_Anupanady', NULL, '', '', '', '', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', 'HM1_Anupanady', 'HM1_Anupanady', 2, 1, 1),
(2, 'HM2_Anupanady', NULL, '', '', '', '', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', 'HM2_Anupanady', 'HM2_Anupanady', 2, 2, 1),
(3, 'HM1_theni', NULL, '', '', '', '', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', '123123123', 'HM1_theni', 1, 1, 1),
(4, 'HM2_theni', NULL, '', '', '', '', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', '123123123', 'HM2_theni', 1, 2, 1),
(5, 'HM1_veeraganoor', NULL, '', '', '', '', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', '123123123', 'HM1_veeraganoor', 3, 1, 1),
(6, 'HM2_veeraganoor', NULL, '', '', '', '', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', '123123123', 'HM2_veeraganoor', 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` bigint(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `class_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `fees` double NOT NULL,
  `schedules` varchar(200) NOT NULL,
  `coaching_type` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `reg_date` date NOT NULL,
  `flag` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `name`, `class_id`, `level_id`, `subject_id`, `fees`, `schedules`, `coaching_type`, `year`, `reg_date`, `flag`, `description`) VALUES
(2, 'Anatomy of the human Body', 11, 4, 5, 700, '1,2,3', 1, 2016, '2018-05-16', 2, 'In this course, you’ll gain an understanding of the basic concepts of anatomy and learn to ‘dissect’ the human body '),
(3, 'demo course', 12, 4, 5, 250, '1,2,3', 3, 2016, '2018-05-16', 0, ''),
(4, 'Functions', 12, 4, 4, 400, '1,2,3,4', 3, 2016, '0000-00-00', 2, 'The course covers everything in Functions and makes difficult concepts easy using Graphs and Figures which will help you understand the real logic in a simple and easy way. '),
(8, 'Circle', 9, 3, 4, 400, '1,3,4', 3, 2016, '0000-00-00', 2, 'In this course, you’ll gain an understanding of the basic concepts of circle'),
(10, 'Algebra', 12, 4, 4, 500, '1,3,6', 3, 2016, '0000-00-00', 2, 'In this course, you’ll gain an understanding of the basic concepts of Algebra'),
(11, 'Packing in solids', 12, 4, 8, 300, '1,4,6', 3, 2016, '0000-00-00', 2, 'In this course, you’ll gain an understanding of the basic concepts of solid');

-- --------------------------------------------------------

--
-- Table structure for table `course_mapping`
--

CREATE TABLE `course_mapping` (
  `ctm_id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `teacher_ids` text NOT NULL,
  `dom` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_mapping`
--

INSERT INTO `course_mapping` (`ctm_id`, `course_id`, `teacher_ids`, `dom`) VALUES
(1, 2, '3,4', '2018-05-18'),
(2, 10, '1', '2018-05-18'),
(3, 8, '5', '2018-05-18'),
(4, 4, '1,5', '2018-05-18'),
(5, 11, '7', '2018-05-26');

-- --------------------------------------------------------

--
-- Table structure for table `course_student_setting`
--

CREATE TABLE `course_student_setting` (
  `mapping_id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `request_flag` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `payment_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_student_setting`
--

INSERT INTO `course_student_setting` (`mapping_id`, `course_id`, `student_id`, `request_flag`, `status`, `payment_status`) VALUES
(1, 1, 8, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `document_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` longtext COLLATE utf8_unicode_ci NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `subject_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`document_id`, `title`, `description`, `file_name`, `file_type`, `class_id`, `teacher_id`, `timestamp`, `subject_id`) VALUES
(12, 'EVS Project', 'sample', '05_ISA Action Plan -what should be there_(2).pdf', 'pdf', '1', 0, '1525331686', 3),
(13, 'Solar System', 'sample', '05_ISA Action Plan -what should be there_(1).pdf', 'pdf', '1', 0, '1525331779', 3);

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `document_id` bigint(20) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`document_id`, `name`) VALUES
(1, 'Notes of Lesson'),
(2, 'Worksheet'),
(3, 'Olympaid'),
(4, 'Question Bank');

-- --------------------------------------------------------

--
-- Table structure for table `dormitory`
--

CREATE TABLE `dormitory` (
  `dormitory_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `number_of_room` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dormitory`
--

INSERT INTO `dormitory` (`dormitory_id`, `name`, `number_of_room`, `description`) VALUES
(21, '1st floor', '1', 'right corner');

-- --------------------------------------------------------

--
-- Table structure for table `enroll`
--

CREATE TABLE `enroll` (
  `enroll_id` int(11) NOT NULL,
  `enroll_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `roll` int(11) NOT NULL DEFAULT '0',
  `date_added` date NOT NULL,
  `year` longtext COLLATE utf8_unicode_ci NOT NULL,
  `request_flag` int(11) DEFAULT NULL,
  `payment_status` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `enroll`
--

INSERT INTO `enroll` (`enroll_id`, `enroll_code`, `student_id`, `class_id`, `course_id`, `roll`, `date_added`, `year`, `request_flag`, `payment_status`, `status`) VALUES
(2, '4e8fb49', 2, 12, 1, 0, '0000-00-00', '2016-2017', NULL, NULL, NULL),
(3, '82afa4d', 3, 11, 2, 0, '2018-05-14', '2016-2017', NULL, NULL, NULL),
(4, 'c06ad18', 4, 7, 2, 0, '2018-05-15', '2016-2017', NULL, NULL, NULL),
(5, '029d8fb', 5, 12, 3, 0, '2018-05-15', '2016-2017', NULL, NULL, NULL),
(6, '7a3a146', 6, 6, 2, 0, '2018-05-18', '2016-2017', NULL, NULL, NULL),
(7, 'dacc0a2', 7, 9, 1, 0, '2018-05-18', '2016-2017', NULL, NULL, NULL),
(8, '54b9ee7', 8, 12, 1, 0, '2018-05-18', '2016-2017', NULL, NULL, NULL),
(9, 'df84ed5', 9, 12, 2, 0, '2018-05-18', '2016-2017', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `title` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `datefrom` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dateto` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `title`, `description`, `datefrom`, `dateto`) VALUES
(1, 'Chidrai Festival holiday', 'Chidrai Festival Holiday<br>', '29-04-2018', '05-05-2018');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `exam_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `year` longtext COLLATE utf8_unicode_ci NOT NULL,
  `comment` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`exam_id`, `name`, `year`, `comment`) VALUES
(1, 'Ist sem', '2016-2017', 'aaa');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `exam_id` int(11) NOT NULL,
  `title` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `availablefrom` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `availableto` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `duration` int(11) NOT NULL,
  `questions` int(11) NOT NULL,
  `pass` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `accesscode` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `exam_code` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exam_question_sets`
--

CREATE TABLE `exam_question_sets` (
  `id` bigint(20) NOT NULL,
  `exam_id` bigint(20) DEFAULT NULL,
  `set_id` bigint(20) DEFAULT NULL,
  `questions` longtext,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `exam_question_sets`
--

INSERT INTO `exam_question_sets` (`id`, `exam_id`, `set_id`, `questions`, `status`) VALUES
(1, 6, 1, '[{\"question_id\":\"13\",\"correctanswer\":\"3\"},{\"question_id\":\"8\",\"correctanswer\":\"2\"},{\"question_id\":\"1\",\"correctanswer\":\"2\"},{\"question_id\":\"9\",\"correctanswer\":\"3\"},{\"question_id\":\"10\",\"correctanswer\":\"4\"},{\"question_id\":\"11\",\"correctanswer\":\"3\"},{\"question_id\":\"14\",\"correctanswer\":\"2\"}]', 1),
(3, 6, 1, '[{\"question_id\":\"14\",\"correctanswer\":\"2\"},{\"question_id\":\"7\",\"correctanswer\":\"1\"}]', 1),
(4, 0, 1, 'null', 1),
(5, 6, 1, '[{\"question_id\":\"7\",\"correctanswer\":\"1\"},{\"question_id\":\"14\",\"correctanswer\":\"2\"},{\"question_id\":\"8\",\"correctanswer\":\"2\"}]', 1),
(6, 7, 1, '[{\"question_id\":\"13\",\"correctanswer\":\"3\"},{\"question_id\":\"14\",\"correctanswer\":\"2\"},{\"question_id\":\"8\",\"correctanswer\":\"2\"},{\"question_id\":\"9\",\"correctanswer\":\"3\"},{\"question_id\":\"10\",\"correctanswer\":\"4\"},{\"question_id\":\"11\",\"correctanswer\":\"3\"}]', 1),
(7, 9, 1, '[{\"question_id\":\"13\",\"correctanswer\":\"3\"},{\"question_id\":\"14\",\"correctanswer\":\"2\"}]', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expense_category`
--

CREATE TABLE `expense_category` (
  `expense_category_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forum`
--

CREATE TABLE `forum` (
  `post_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `timestamp` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `post_code` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `section_id` int(11) NOT NULL,
  `post_status` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `forum_message`
--

CREATE TABLE `forum_message` (
  `message` longtext CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `date` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `message_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_album`
--

CREATE TABLE `gallery_album` (
  `image_id` int(11) NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp_upload` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `photo` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery_category`
--

CREATE TABLE `gallery_category` (
  `category_id` int(11) NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `embed` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `hod_id` bigint(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password_text` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `username` longtext COLLATE utf8_unicode_ci NOT NULL,
  `subject_id` int(11) NOT NULL,
  `acd_year_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`hod_id`, `name`, `email`, `password`, `password_text`, `phone`, `address`, `username`, `subject_id`, `acd_year_id`) VALUES
(1, 'Mrs.Muthuvel', '', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', '123123123', '', '', 'muthu', 6, 1),
(3, 'roshan', '', 'f5efdd2442072948d5e43080601c0ae66e7b0607', 'roshan', '', '', 'roshan', 2, 1),
(4, 'Mrs.roshi', '', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', '123123123', '', '', 'roshi', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `homework`
--

CREATE TABLE `homework` (
  `homework_id` int(11) NOT NULL,
  `homework_code` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `uploader_id` int(11) NOT NULL,
  `homework_status` int(11) NOT NULL DEFAULT '1',
  `time_end` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `section_id` int(11) NOT NULL,
  `uploader_type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `homework`
--

INSERT INTO `homework` (`homework_id`, `homework_code`, `title`, `description`, `class_id`, `subject_id`, `uploader_id`, `homework_status`, `time_end`, `section_id`, `uploader_type`, `file_name`) VALUES
(1, '36f30ccbd2', 'EVS Project', 'Prepare the chart on \"My solor System\"<br>', 1, 3, 1, 1, '18-05-2018', 38, 'teacher', '05_ISA Action Plan -what should be there_(2).pdf'),
(2, '3dc54b8f79', 'Know my planet', 'Know my planet <br>', 1, 3, 1, 1, '01-05-2018', 38, 'teacher', '1-sample_download.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `horarios_examenes`
--

CREATE TABLE `horarios_examenes` (
  `horario_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `time_start` int(11) NOT NULL,
  `time_end` int(11) NOT NULL,
  `time_start_min` int(11) NOT NULL,
  `time_end_min` int(11) NOT NULL,
  `day` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `year` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fecha` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `amount_paid` longtext COLLATE utf8_unicode_ci NOT NULL,
  `due` longtext COLLATE utf8_unicode_ci NOT NULL,
  `creation_timestamp` int(11) NOT NULL,
  `payment_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_details` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'paid or unpaid',
  `year` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `phrase_id` int(11) NOT NULL,
  `phrase` longtext COLLATE utf8_unicode_ci NOT NULL,
  `english` longtext COLLATE utf8_unicode_ci NOT NULL,
  `spanish` longtext COLLATE utf8_unicode_ci NOT NULL,
  `portuguse` longtext COLLATE utf8_unicode_ci,
  `hindi` longtext COLLATE utf8_unicode_ci,
  `french` longtext COLLATE utf8_unicode_ci,
  `serbian` longtext COLLATE utf8_unicode_ci,
  `arabic` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`phrase_id`, `phrase`, `english`, `spanish`, `portuguse`, `hindi`, `french`, `serbian`, `arabic`) VALUES
(386, 'Required', 'Required', 'Obligatorio', 'obrigatório', 'अनिवार्य', 'obligatoire', 'обавезан', 'إلزامي'),
(464, 'Viewing-Report', 'Viewing Report', 'Viendo Reporte', 'visualização de relatórios', 'देखने रिपोर्ट', 'Rapport de visualisation', 'гледање Извештај', 'تقرير عرض'),
(390, 'Admin-Dashboard', 'Admin Dashboard', 'Tablero de Administración', 'Conselho de Administração', 'निदेशक मंडल', 'Conseil d\'administration', 'Управни одбор', 'مجلس الإدارة'),
(391, 'Send-Teacher-Files', 'Send files to teachers', 'Enviar archivos a los Profesores', 'Enviar arquivos para Professores', 'शिक्षकों के लिए फाइल को भेजें', 'Envoyer des fichiers aux enseignants', 'Слање датотека на наставнике', 'إرسال الملفات إلى المعلمين'),
(392, 'New-Student', 'Add Student', 'Agregar nuevo estudiante', 'Adicionar novo aluno', 'नए छात्र जोड़े', 'Ajouter un étudiant', 'Додај нови студент', 'إضافة طالب جديد'),
(393, 'Student-Form', 'Registration Form', 'Formulario de registro', 'Formulário de Inscrição', 'पंजीकरण फार्म', 'Formulaire d\'inscription', 'Образац за регистрацију', 'استمارة التسجيل'),
(394, 'Report-Teacher-List', 'Teachers reported', 'Profesores Reportados', 'Os professores relataram', 'शिक्षकों की सूचना दी', 'enseignants déclarés', 'nastavnici', 'المعلمين المبلغ عنها'),
(465, 'Students', 'Students', 'Estudiantes', 'estudantes', 'छात्रों', 'étudiants', 'студенти', 'الطلاب'),
(450, 'Delete', 'Delete', 'Eliminar', 'remover', 'हटाना', 'supprimer', 'уклонити', 'نقل'),
(466, 'Class', 'Class', 'Grado', 'grau', 'उपाधि', 'degré', 'степен', 'درجة'),
(461, 'Removed', 'Removed successfully', 'Eliminado Correctamente', 'justamente eliminado', 'सफलतापूर्वक हटा', 'Correctement éliminé', 'С правом елиминисан', 'القضاء بحق'),
(460, 'Updated', 'Successfully updated', 'Actualizado correctamente', 'atualizado com sucesso', 'सफलतापूर्वक अद्यतन', 'mis à jour avec succès', 'успешно ажурирана', 'تحديث بنجاح'),
(453, 'Add', 'Add', 'Agregar', 'adicionar', 'जोड़ना', 'ajouter', 'додати', 'إضافة'),
(467, 'Marks-Of', 'Marks of', 'Calificaciones de', 'classificações', 'रेटिंग्स', 'notes', 'рејтинг', 'تصنيفات'),
(468, 'Student-Promotion', 'Student Promotion', 'Promover Estudiantes', 'Os estudantes que promovem', 'को बढ़ावा देने के छात्र', 'promouvoir les étudiants', 'промовишу Студенти', 'طلاب تعزيز'),
(469, 'Manage-Parents', 'Manage Parents', 'Administrar Padres de familia', 'Gerenciar Pais', 'माता-पिता को प्रबंधित', 'Gérer les parents', 'upravljanje Парентс', 'إدارة الآباء'),
(470, 'Manage-Teachers', 'Manage Teachers', 'Administrar Profesores', 'gerenciar Professores', 'शिक्षकों का प्रबंधन', 'gérer enseignants', 'управљати наставнике', 'إدارة المعلمين'),
(471, 'Manage-Subjects', 'Manage Subjects', 'Administrar Cursos', 'gerenciar cursos', 'पाठ्यक्रम प्रबंधन', 'gérer Cours', 'управљају курсеве', 'إدارة الدورات'),
(472, 'Manage-Classes', 'Manage Classes', 'Administrar Grados', 'gerenciar graus', 'ग्रेड का प्रबंधन', 'gérer les qualités', 'управља степени', 'إدارة الصفوف'),
(473, 'Virtual-Library', 'Virtual Library', 'Librería Virtual', 'biblioteca virtual', 'आभासी पुस्तकालय', 'bibliothèque virtuelle', 'виртуелна библиотека', 'المكتبة الافتراضية'),
(474, 'Manage-Sections', 'Manage Sections', 'Administrar Secciones', 'gerenciar Secções', 'धारा का प्रबंधन', 'gérer Sections', 'управља секција', 'إدارة الأقسام'),
(475, 'Select-None', 'Not selected', 'Sin seleccionar', 'não verificado', 'अनियंत्रित', 'incontrôlé', 'није изабрано', 'دون رادع'),
(476, 'Semesters', 'Semesters', 'Semestres', 'semestres', 'सेमेस्टर', 'semestres', 'семестара', 'فصول دراسية'),
(477, 'Upload-Marks', 'Upload Marks', 'Subir Calificaciones', 'Subir Calificaciones', 'रेटिंग', 'up évaluations', 'Уплоад рејтинг', 'يصل التقييمات'),
(478, 'Marks-by-Subject', 'Marks By Subject', 'Calificaciones por curso', 'Classificações por curso', 'पाठ्यक्रम के अनुसार रेटिंग', 'Évaluations par cours', 'оцене по курсу', 'التقييمات لكل دورة'),
(479, 'Exam-Routine', 'Exam Routine', 'Horarios de Exámenes', 'Períodos de teste', 'परीक्षण के समय', 'Temps d\'essai', 'testiranje пута', 'الأوقات العصيبة'),
(480, 'Class-Routine', 'Class Routine', 'Horarios de Clases', 'Tabela de Ramos', 'वर्गों की अनुसूची', 'Horaire des cours', 'Распоред часова', 'الجدول الزمني للفصول'),
(481, 'Attendance', 'Attendance', 'Control de Asistencia', 'atendimento diário', 'नियंत्रण असिस्ट', 'Commande d\'assistance', 'Ассист Цонтрол', 'مساعدة تحكم'),
(482, 'Attendance-Report', 'Attendance Report', 'Reporte de Asistencia', 'Relatório de Frequência', 'उपस्थिति रिपोर्ट', 'Participation Rapport', 'prisustvo Извештај', 'تقرير الحضور'),
(483, 'Details', 'Details', 'Detalles', 'detalhes', 'विवरण', 'détails', 'detalji', 'تفاصيل'),
(484, 'Send-News', 'Send News', 'Enviar Noticias', 'enviar Notícia', 'समाचार प्रस्तुत', 'soumettre Nouvelles', 'субмит Невс', 'تقديم الأخبار'),
(500, 'Documents-Teachers', 'Documents for teachers', 'Documentos para los Profesores', 'Documentos para Professores', 'शिक्षकों के लिए दस्तावेज', 'Documents pour les enseignants', 'Документи за наставнике', 'وثائق للمعلمين'),
(487, 'Semester-Content', 'Contents of the semester', 'Contenidos del Semestre', 'conteúdo Semestre', 'सामग्री सेमेस्टर', 'Contenu Semestre', 'Садржај семестра', 'محتويات الفصل الدراسي'),
(488, 'Students-Payments', 'Student Payments', 'Pagos Mensuales', 'Os pagamentos mensais', 'मासिक भुगतान', 'Les paiements mensuels', 'месечних рата', 'دفعات شهرية'),
(489, 'Expense', 'Expense', 'Egresos', 'despesa', 'व्यय', 'dépense', 'трошак', 'إنفاق'),
(490, 'Expense-Category', 'Expense Category', 'Categorías de Egresos', 'Categorias de despesas', 'व्यय श्रेणियों', 'Catégories de dépenses', 'kategorije трошкова', 'فئات الإنفاق'),
(491, 'Manage-School-Bus', 'Manage School Bus', 'Administrar bus escolar', 'Gerenciar ônibus escolar', 'स्कूल बस का प्रबंधन', 'Gérer les autobus scolaires', 'Управљање школски аутобус', 'إدارة الحافلات المدرسية'),
(492, 'Manage-Classrooms', 'Manage Classrooms', 'Administrar salones de clases', 'Gerenciar salas de aula', 'कक्षाओं की व्यवस्था करें', 'Gérer les salles de classe', 'upravljanje учионице', 'إدارة الفصول الدراسية'),
(493, 'Message-Sent', 'Message sent correctly', 'Mensaje Enviado ', 'Mensagem enviada', 'संदेश भेजा', 'Message envoyé', 'poruka послата', 'رسالة أرسلت'),
(494, 'Private-Messages', 'Private Messages', 'Mensajes Privados', 'mensagens privadas', 'निजी संदेश', 'messages privés', 'приватне поруке', 'رسائل خاصة'),
(495, 'System-Updated', 'System Updated', 'Sistema Actualizado', 'sistema atualizado', 'अद्यतन प्रणाली', 'Mise à jour du système', 'ажуриран систем', 'النظام المحدثة'),
(497, 'System-Settings', 'System Settings', 'Ajustes del Sistema', 'Configurações do sistema', 'सिस्टम सेटिंग्स', 'Paramètres système', 'Систем Сеттингс', 'إعدادات النظام'),
(499, 'Admins', 'Admins', 'Administradores', 'administradores', 'प्रशासकों', 'administrateurs', 'администратори', 'الإداريين'),
(505, 'Password-Error', 'Password Error', 'La contraseña no coincide', 'A senha não corresponde', 'पासवर्ड मेल नहीं खाता', 'Le mot de passe ne correspond pas', 'Лозинка не одговара', 'لا تطابق كلمة المرور'),
(506, 'My-Profile', 'My Profile', 'Mi Perfil', 'Meu perfil', 'मेरी प्रोफाइल', 'Mon profil', 'мој профил', 'الملف الشخصي الخاص بي'),
(507, 'Search-Result', 'Search Result', 'Resultados de la Búsqueda', 'resultados da pesquisa', 'खोज परिणाम', 'Résultats de la recherche', 'Резултати претраге', 'نتائج البحث'),
(508, 'Events', 'Events Calendar', 'Calendario de Eventos', 'Calendário de Eventos', 'घटनाओं का कैलेंडर', 'Calendrier des événements', 'Календар догађаја', 'أجندة الفعاليات'),
(509, 'Welcome', 'Welcome', 'Bienvenido', 'bem-vindo', 'स्वागत', 'bienvenue', 'добродошао', 'ترحيب'),
(511, 'Messages', 'Messages', 'Mensajes', 'mensagens', 'पदों\n', 'messages', 'порука', 'المشاركات'),
(512, 'Profile', 'Profile', 'Perfil', 'perfil', 'प्रोफ़ाइल', 'profil', 'профил', 'البيانات الشخصية'),
(513, 'Exit', 'Logout', 'Salir', 'saída', 'निकास', 'Sortir', 'логоут', 'خروج'),
(514, 'Search-by-name', 'Search Student', 'Buscar estudiante por nombre', 'Pesquisa aluno pelo nome', 'नाम से खोजें छात्र', 'Rechercher étudiant par nom', 'Студента по имену', 'طالب في البحث عن طريق الاسم'),
(520, 'Create-Payment', 'Create Invoice', 'Realizar cobro', 'realizar a coleta', 'संग्रह में प्रदर्शन', 'effectuer la collecte', 'извршити наплату', 'أداء مجموعة'),
(516, 'Dashboard', 'Dashboard', 'Tablero', 'placa', 'बोर्ड', 'conseil', 'табла', 'مجلس'),
(518, 'School-Bus', 'School Bus', 'Bus Escolar', 'Ônibus escolar', 'स्कूल बस', 'Autobus scolaire', 'школски аутобус', 'حافلة مدرسية'),
(521, 'Payments-Sent', 'Invoices', 'Cobros enviados', 'Os rendimentos enviados', 'आय भेजा', 'Produit envoyé', 'prihodi послао', 'عائدات أرسلت'),
(530, 'User-Account', 'Users Accounts', 'Cuentas de Usuarios', 'Contas de usuário', 'उपयोगकर्ता खाते', 'Comptes d\'utilisateurs', 'Усер Аццоунтс', 'حسابات المستخدمين'),
(531, 'Teachers', 'Teachers', 'Profesores', 'professores', 'शिक्षकों', 'enseignants', 'мајстори', 'معلمون'),
(532, 'Parents', 'Parents', 'Padres', 'pais', 'माता-पिता', 'parents', 'родитељи', 'الآباء'),
(533, 'Student-Information', 'Student Information', 'Información de los Estudiantes', 'Informações do estudante', 'छात्र सूचना', 'Information sur les étudiants', 'студент informacije', 'معلومات الطالب'),
(534, 'Teachers-Files', 'Teacher Files', 'Archivos para profesores', 'Arquivos de professores', 'शिक्षक फ़ाइलें', 'Fichiers d\'enseignants', 'Теацхер Бр', 'ملفات المعلم'),
(535, 'Daily-Attendance', 'Daily Attendance', 'Asistencia Diaria', 'atendimento diário', 'दैनिक उपस्थिति', 'présence quotidienne', 'Дневни присуство', 'الحضور اليومي'),
(536, 'Subjects', 'Subjects', 'Cursos', 'cursos', 'पाठ्यक्रम', 'cours', 'курсеви', 'الدورات'),
(537, 'Schedules', 'Schedules', 'Horarios', 'horário', 'समय सारिणी', 'calendrier', 'распоред', 'جدول مواعيد'),
(538, 'Qualifications', 'Marks', 'Calificaciones', 'classificações', 'रेटिंग्स', 'notes', 'рејтинг', 'تصنيفات'),
(539, 'Academic-Files', 'Academic Files', 'Archivos Académicos', 'arquivos acadêmicos', 'एकेडमिक फ़ाइलें', 'fichiers académiques', 'Ацадемиц фајлова', 'ملفات الأكاديمية'),
(540, 'News-Sent', 'Sent News', 'Noticias Enviadas', 'Notícias submetidas', 'प्रस्तुत समाचार', 'Nouvelles Soumis', 'Субмиттед Новости', 'الأخبار المقدمة'),
(541, 'Accounting', 'Accounting', 'Contabilidad', 'contabilidade', 'लेखांकन', 'comptabilité', 'рачуноводство', 'المحاسبة'),
(542, 'Reports', 'Academic Reports', 'Reportes Académicos', 'relatórios académicos', 'एकेडमिक रिपोर्टों', 'rapports académiques', 'Ацадемиц извештаји', 'التقارير الأكاديمية'),
(543, 'Teacher-Report', 'Teacher Report', 'Reportes de Profesores', 'relatórios Professores', 'रिपोर्ट शिक्षक', 'Rapports enseignants', 'Извештаји Наставници', 'المعلمون تقارير'),
(544, 'Student-Report', 'Student Report', 'Reportes de Estudiantes', 'Relatórios de estudante', 'विद्यार्थी रिपोर्ट', 'Rapports d\'étudiants', 'Студент Извештаји', 'تقارير طالب'),
(545, 'News', 'News', 'Noticias', 'notícia', 'समाचार', 'nouvelles', 'новости', 'أخبار'),
(547, 'View-All', 'View All', 'Ver todo', 'ver todos', 'सभी देखते हैं', 'voir tous', 'види све', 'ترى كل'),
(548, 'Go-to-site', 'Go to website', 'Ir al sitio', 'Ir para o site', 'साइट पर जाएं', 'Accéder au site', 'Иди на сајту', 'انتقل إلى موقع'),
(549, 'Login', 'Login', 'Acceder', 'log in', 'लोग इन', 'connectez-vous', 'лог ин', 'تسجيل الدخول'),
(550, 'Password', 'Password', 'Contraseña', 'senha', 'पासवर्ड', 'mot de passe', 'лозинка', 'كلمة المرور'),
(551, 'Username', 'Username', 'Usuario', 'usuário', 'उपयोगकर्ता', 'utilisateur', 'корисник', 'المستخدم'),
(552, 'Close', 'Close', 'Cerrar', 'perto', 'निकट', 'Fermer', 'близу', 'قريب'),
(553, 'Cancel', 'Cancel', 'Cancelar', 'cancelar', 'रद्द करना', 'annuler', 'отказати', 'إلغاء'),
(554, 'Are-you-sure', 'Are you sure you want to do this?', '¿Seguro que quieres hacer esto?', 'Tem certeza de que quer fazer isso?', 'आप ऐसा करना चाहते हैं आप सुनिश्चित हैं?', 'Êtes-vous sûr de vouloir faire ça?', 'Да ли сте сигурни да желите да урадите ово?', 'هل أنت متأكد أنك تريد أن تفعل هذا؟'),
(555, 'Date', 'Date', 'Fecha', 'data', 'तिथि', 'date', 'датум', 'تاريخ'),
(557, 'Name', 'Name', 'Nombre', 'nome', 'नाम', 'nom', 'име', 'اسم'),
(558, 'Description', 'Description', 'Descripción', 'descrição', 'विवरण', 'description', 'опис', 'وصف'),
(559, 'Options', 'Options', 'Opciones', 'opções', 'विकल्प', 'Options', 'opcije', 'خيارات'),
(560, 'Download', 'Download', 'Descargar', 'baixar', 'डाउनलोड', 'télécharger', 'Довнлоад', 'تحميل'),
(561, 'Upload-Files', 'Upload Files', 'Subir Archivos', 'fazer upload de arquivos', 'अपलोड फ़ाइलों', 'Télécharger des fichiers', 'Уплоад фајлова', 'تحميل الملفات'),
(564, 'Subject', 'Subject', 'Curso', 'curso', 'कोर्स', 'Cours', 'курс', 'مسار'),
(563, 'Upload-Book', 'Upload Book', 'Subir Libro', 'up livro', 'बुक', 'up Book', 'уп књига', 'حتى كتاب'),
(565, 'Select', 'Select', 'Seleccione', 'selecionar', 'चुनना', 'sélectionner', 'одабрати', 'اختر'),
(566, 'Title', 'Title', 'Título', 'título', 'शीर्षक', 'titre', 'наслов', 'لقب'),
(567, 'Book', 'Book', 'Libro', 'livro', 'किताब', 'livre', 'књига', 'كتاب'),
(568, 'Autor', 'Author', 'Autor', 'autor', 'लेखक', 'auteur', 'аутор', 'مؤلف'),
(569, 'Search', 'Search', 'Buscar', 'pesquisa', 'खोज', 'recherche', 'претраживање', 'بح'),
(570, 'Day', 'Day', 'Día', 'Dia', 'दिन', 'jour', 'дан', 'يوم'),
(571, 'Sunday', 'Sunday', 'Domingo', 'domingo', 'रविवार', 'dimanche', 'недеља', 'الأحد'),
(572, 'Monday', 'Monday', 'Lunes', 'segunda-feira', 'सोमवार', 'Lundi', 'понедељак', 'الإثنين'),
(573, 'Tuesday', 'Tuesday', 'Martes', 'terça-feira', 'मंगलवार', 'mardi', 'уторак', 'الثلاثاء'),
(574, 'Wednesday', 'Wednesday', 'Miercoles', 'quarta-feira', 'बुधवार', 'mercredi', 'среда', 'الأربعاء'),
(575, 'Thursday', 'Thursday', 'Jueves', 'quinta-feira', 'बृहस्पतिवार', 'jeudi', 'четвртак', 'الخميس'),
(576, 'Friday', 'Friday', 'Viernes', 'sexta-feira', 'शुक्रवार', 'vendredi', 'петак', 'الجمعة'),
(577, 'Saturday', 'Saturday', 'Sabado', 'sábado', 'शनिवार', 'samedi', 'субота', 'السبت'),
(578, 'Start', 'Start', 'Inicio', 'iniciação', 'दीक्षा', 'Début', 'иницирање', 'استهلال'),
(579, 'Hour', 'Hour', 'Hora', 'tempo', 'समय', 'temps', 'време', 'وقت'),
(580, 'Minutes', 'Minutes', 'Minutos', 'atas', 'मिनटों', 'procès-verbal', 'записник', 'دقيقة'),
(581, 'End', 'End', 'Fin', 'final', 'अंत', 'fin', 'крај', 'نهاية'),
(582, 'Email', 'Email', 'Correo', 'correio', 'मेल', 'courrier', 'пошта', 'بريد'),
(583, 'Phone', 'Phone', 'Celular', 'celular', 'सेलुलर', 'cellulaire', 'ћелијски', 'خلوي'),
(584, 'Address', 'Address', 'Dirección', 'endereço', 'पता', 'adresse', 'адреса', 'عنوان'),
(585, 'Type-Account', 'Account Type', 'Tipo de cuenta', 'Tipo de conta', 'खाते का प्रकार', 'Type de compte', 'Тип рачун', 'نوع الحساب'),
(586, 'Photo', 'Photo', 'Fotografía', 'fotografia', 'फोटोग्राफी', 'photographie', 'фотографија', 'تصوير'),
(587, 'Upload', 'Upload', 'Subir', 'carregar', 'अपलोड', 'télécharger', 'отпремање', 'تحميل'),
(588, 'Admin', 'Admin', 'Administrador', 'Gestor', 'प्रशासक', 'administrateur', 'Администратор', 'مدير'),
(589, 'Super-Admin', 'Super Administrator', 'Super Administrador', 'Super Gestor', 'सुपर व्यवस्थापक', 'super administrateur', 'супер Манагер', 'مدير سوبر'),
(590, 'Update', 'Update', 'Actualizar', 'atualizar', 'अद्यतन', 'mettre à jour', 'ажурирање', 'تحديث'),
(591, 'Change', 'Change', 'Cambiar', 'mudança', 'परिवर्तन', 'Changer', 'промена', 'تغيير'),
(592, 'Account-Status', 'Account Status', 'Estado de la cuenta', 'Estado da conta', 'खाते की स्थिति', 'Statut du compte', 'Статус налога', 'حالة الحساب'),
(593, 'Status', 'Status', 'Estado', 'estado', 'राज्य', 'état', 'држава', 'دولة'),
(594, 'Active', 'Active', 'Activa', 'Activa', 'एक्टिवा', 'Activa', 'ацтива', 'نشط'),
(595, 'Inactive', 'Inactive', 'Inactiva', 'inativo', 'निष्क्रिय', 'inactif', 'неактиван', 'غير فعال'),
(596, 'Parent', 'Parent', 'Padre', 'pai', 'पिता', 'père', 'отац', 'الأب'),
(597, 'Section', 'Section', 'Sección', 'seção', 'अनुभाग', 'section', 'одељак', 'قسم'),
(598, 'Select-Class', 'Select Class', 'Primero seleccione el grado', 'Primeiro, selecione a nota', 'पहली कक्षा का चयन', 'Sélectionnez d\'abord la note', 'Прво изаберите разред', 'أولا حدد الصف'),
(599, 'Roll', 'Roll', 'Carné', 'Carné', 'रोल', 'rouleau', 'Карне', 'كارنيه'),
(600, 'Birthday', 'Birthday', 'Cumpleaños', 'aniversário', 'जन्मदिन', 'anniversaire', 'рођендан', 'عيد ميلاد'),
(601, 'Sex', 'Sex', 'Género', 'sexo', 'लिंग', 'sexe', 'секс', 'جنس'),
(602, 'Male', 'Male', 'Masculino ', 'masculino', 'नर', 'Masculin', 'мушки', 'ذكر'),
(603, 'Female', 'Female', 'Femenino', 'feminino', 'महिला', 'Féminin', 'женски', 'أنثى'),
(604, 'Living-Assigned', 'Living Assigned', 'Salón asignado', 'Salão atribuído', 'हॉल सौंपा', 'attribué Salle', 'додељен сала', 'قاعة المخصصة'),
(605, 'View', 'View', 'Ver', 'ver', 'देखना', 'Voir', 'видети', 'شاهد'),
(606, 'Archived', 'Archive', 'Archivar', 'arquivo', 'फ़ाइल', 'fichier', 'фајл', 'ملف'),
(607, 'Unarchived', 'Unarchives', 'Desarchivar', 'desarmazenando', 'गैर अभिलेख', 'désarchivage', 'Опозив архивирања', 'unArchiving'),
(608, 'Add-Event', 'Add event', 'Agregar Evento', 'Adicionar evento', 'घटना जोड़ें', 'Ajouter un événement', 'Додај догађај', 'إضافة حدث'),
(609, 'Color', 'Colour', 'Color del Evento', 'Cor do evento', 'रंग घटना', 'Couleur de l\'événement', 'боја догађаја', 'حدث اللون'),
(610, 'Red', 'Red', 'Rojo', 'vermelho', 'लाल', 'Rouge', 'црвен', 'أحمر'),
(611, 'Orange', 'Orange', 'Naranja', 'laranja', 'नारंगी', 'Orange', 'поморанџа', 'البرتقالي'),
(612, 'Black', 'Black', 'Negro', 'preto', 'काला', 'noir', 'црн', 'أسود'),
(613, 'Blue', 'Blue', 'Azul', 'Azul', 'नीला', 'bleu', 'плава', 'أزرق'),
(614, 'Green', 'Green', 'Verde', 'verde', 'ग्रीन', 'vert', 'зелен', 'أخضر'),
(615, 'Edit', 'Edit', 'Editar', 'editar', 'संपादित', 'éditer', 'уреди', 'تحرير'),
(617, 'Return', 'Return', 'Regresar', 'retorno', 'वापसी', 'retour', 'повратак', 'عودة'),
(618, 'Year', 'Running Year', 'Año en curso', 'Ano', 'साल', 'Année', 'година', 'عام'),
(619, 'Titular-Teacher', 'Titular Teacher', 'Profesor Titular', 'professor de sala', 'प्रोफ़ेसर', 'professeur', 'мајстор Власник', 'أستاذ'),
(620, 'Numeric-Name', 'Numeric Name', 'Nombre Numérico ', 'nome numérico', 'संख्यात्मक नाम', 'nom numérique', 'Бројни име', 'اسم رقمية'),
(622, 'Classes', 'Classes', 'Grados', 'graus', 'ग्रेड', 'grades', 'оцене', 'الدرجات'),
(623, 'New', 'New', 'Nuevo', 'novo', 'नई', 'nouveau', 'нови', 'جديد'),
(624, 'Salons', 'Salons', 'Salones', 'salons', 'सैलून', 'Salons', 'салони', 'صالونات'),
(625, 'Salon', 'Salon', 'Salón', 'salão', 'सैलून', 'salon', 'салон', 'صالون'),
(626, 'Write-Comment', 'Write your comment here', 'Escribe tu comentario aquí', 'Escreva o seu comentário aqui', 'अपनी टिप्पणी यहाँ लिखें', 'Écrivez votre commentaire ici', 'Напишите ваш коментар овде', 'اكتب تعليقك هنا'),
(627, 'Send', 'Send', 'Enviar', 'enviar', 'भेजना', 'envoyer', 'послати', 'إرسال'),
(628, 'Teacher', 'Teacher', 'Profesor', 'mestre', 'प्रोफ़ेसर', 'professeur', 'мајстор', 'أستاذ'),
(629, 'Subject-Activity', 'Subject Activity', 'Actividades del Curso', 'As atividades do curso', 'पाठ्यक्रम गतिविधियों', 'Les activités du cours', 'kurs активности', 'أنشطة بالطبع'),
(630, 'Final-Exam', 'Final Exam', 'Examen Final', 'Exame final', 'अंतिम परीक्षा', 'Examen final', 'Завршни испит', 'إمتحان نهائي'),
(631, 'Prev', 'Previous', 'Anterior', 'anterior', 'पूर्व', 'précédent', 'претходна', 'سابق'),
(632, 'Next', 'Next', 'Siguiente', 'seguinte', 'निम्नलिखित', 'suivante', 'следећи', 'التالي'),
(633, 'Total-Users', 'Total Users', 'Usuarios Totales', 'total de usuários', 'कुल उपयोगकर्ताओं', 'total des utilisateurs', 'total Мемберс', 'إجمالي المستخدمين'),
(634, 'Update-Logo', 'Update Logo', 'Actualizar Logotipo', 'logotipo atualização', 'अद्यतन लोगो', 'mise à jour logo', 'ажурирање лого', 'شعار التحديث'),
(635, 'Logo', 'Logotype', 'Logotipo', 'logotipo', 'लोगो', 'logo', 'лого', 'شعار'),
(636, 'Calendar', 'Calendar', 'Calendario', 'calendário', 'कैलेंडर', 'calendrier', 'календар', 'تقويم'),
(638, 'Documents', 'Documents', 'Documentos', 'documentos', 'दस्तावेजों', 'documents', 'документи', 'وثائق'),
(639, 'File', 'File', 'Archivo', 'arquivo', 'पुरालेख', 'archives', 'Архива', 'أرشيف'),
(640, 'File-Type', 'Type of file', 'Tipo de archivo', 'Tipo de arquivo', 'फाइल प्रकार', 'Type de fichier', 'филе типе', 'نوع الملف'),
(641, 'Pdf', 'PDF', 'PDF', 'PDF', 'पीडीएफ', 'PDF', 'пдф', 'PDF'),
(642, 'Other', 'Other', 'Otro', 'outro', 'अन्य', 'autre', 'други', 'آخر'),
(643, 'Excel', 'Excel', 'Excel', 'sobressair', 'एक्सेल', 'exceller', 'екцел', 'تفوق'),
(646, 'Amount', 'Amount', 'Monto', 'quantidade', 'मात्रा', 'montant', 'износ', 'كمية'),
(645, 'Category', 'Category', 'Categoría', 'categoria', 'श्रेणी', 'catégorie', 'категорија', 'فئة'),
(647, 'Method', 'Method', 'Método', 'método', 'विधि', 'méthode', 'метод', 'طريقة'),
(648, 'Cash', 'Cash', 'Efectivo', 'Dinheiro', 'रोकड़', 'Espèces', 'ефикасан', 'فعال'),
(649, 'Check', 'Check', 'Cheque', 'Cheque bancário', 'बैंक चेक', 'Chèque bancaire', 'проверити', 'تحقق'),
(650, 'Card', 'Credit Card', 'Tarjeta', 'cartão', 'कार्ड', 'carte', 'картица', 'بطاقة'),
(651, 'New-Category', 'New Category', 'Nueva Categoría', 'novo Categoria', 'नई श्रेणी', 'nouvelle catégorie', 'nova категорија', 'جديد الفئة'),
(652, 'New-Expense', 'New Expense', 'Nuevo Egreso', 'nova Exit', 'नई निकलें', 'nouvelle sortie', 'нови излаз', 'خروج جديد'),
(653, 'Income', 'Income', 'Cobros', 'colecções', 'संग्रह', 'collections', 'колекције\n', 'مجموعات'),
(654, 'New-Income', 'New Income', 'Nuevo Cobro', 'nova coleção', 'नया संग्रह', 'nouvelle collection', 'nova колекција', 'مجموعة جديدة'),
(655, 'Report', 'Report', 'Reportes', 'relatórios', 'रिपोर्टों', 'rapports', 'извештаји', 'تقارير'),
(656, 'Update-Password', 'Update Password', 'Cambiar contraseña', 'alteração de senha', 'पासवर्ड बदलें', 'Changer le mot de passe', 'promena лозинке\n', 'تغيير كلمة المرور'),
(657, 'Current-Password', 'Current Password', 'Contraseña actual', 'Senha atual', 'वर्तमान पासवर्ड', 'mot de passe actuel', 'тренутна лозинка', 'كلمة المرور الحالية'),
(658, 'New-Password', 'New Password', 'Nueva contraseña', 'Nova senha', 'नया पासवर्ड', 'nouveau mot de passe', 'нова лозинка', 'كلمة سر جديدة'),
(659, 'Confirm-Password', 'Confirm new Password', 'Repita nueva contraseña', 'Repita nova senha', 'दोहराएँ नया पासवर्ड', 'Répéter nouveau mot de passe', 'Поновите нову лозинку', 'كلمة مرور جديدة كرر'),
(660, 'About', 'About', 'Acerca de mi', 'Sobre mim', 'मेरे बारे में', 'À propos de moi', 'О мени', 'معلومات عني'),
(661, 'Update-Profile', 'Update my Profile', 'Actualizar mi perfil', 'Atualizar o meu perfil', 'अद्यतन मेरा प्रोफ़ाइल', 'Mettre à jour mon profil', 'Упдате Ми Профиле', 'تحديث ملفي الشخصي'),
(662, 'School-Ads', 'Quick School Ads', 'Anuncios del Colegio', 'Anúncios escolares', 'स्कूल घोषणाएँ', 'Annonces scolaires', 'Школски Најаве', 'مدرسة الإعلانات'),
(663, 'Important', 'Important Information', 'Información Importante', 'Informação importante', 'महत्वपूर्ण जानकारी', 'informations importantes', 'Важне информације', 'معلومات هامة'),
(664, 'Go-to-news', 'Go to News', 'Ir a las noticias', 'Ir para notícias', 'खबर के लिए जाओ', 'Aller aux nouvelles', '\nИди на вести', 'انتقل إلى أخبار'),
(665, 'Total', 'Total', 'Total', 'total', 'संपूर्ण', 'total', 'укупан', 'مجموع'),
(667, 'Print-Marks', 'Print', 'Imprimir', 'impressão', 'छाप', 'imprimer', 'штампа', 'طباعة'),
(668, 'Semester', 'Semester', 'Semestre', 'semestre', 'छमाही', 'semestre', 'семестар', 'نصف السنة'),
(669, 'Student', 'Student', 'Estudiante', 'estudante', 'छात्र', 'étudiant', 'ученик', 'طالب'),
(670, 'Total-Marks', 'Total Marks', 'Puntos Acumulados', 'pontos acumulados', 'उपार्जित अंक', 'Les points accumulés', 'Обрачунати бодова', 'نقاط مستحقة'),
(671, 'Select-to-continue', 'Select to continue', 'Seleccione uno para continuar', 'Selecione um para continuar', 'जारी रखने के लिए एक का चयन करें', 'Sélectionnez l\'une pour continuer', 'Изаберите једну за наставак', 'اختر واحدا لمواصلة'),
(672, 'Receiver', 'Receiver', 'Receptor', 'recebedor', 'रिसीवर', 'récepteur', 'пријемник', 'المتلق'),
(673, 'Select-User', 'Select user', 'Seleccione un usuario', 'Selecione um usuário', 'एक उपयोगकर्ता का चयन करें', 'Sélectionnez un utilisateur', 'Изаберите корисника', 'تحديد مستخدم'),
(674, 'Write-Message', 'Write your message', 'Escribe tu mensaje aquí', 'Faça aqui a sua mensagem', 'यहाँ अपना संदेश लिखें', 'Écrivez votre message ici', 'Напишите своју поруку овде', 'اكتب رسالتك هنا'),
(675, 'Reply', 'Reply', 'Responder', 'resposta', 'उत्तर', 'réponse', 'одговор', 'إجابة'),
(685, 'Enrollment-bus', 'Enrollment bus', 'Matrícula del bus', 'Autocarro de matrícula', 'ट्यूशन बस', 'Bus de scolarité', 'Школарина аутобус', 'حافلة الدراسية'),
(686, 'Driver-Name', 'Driver name', 'Nombre del Piloto', 'nome Pilot', 'नाम पायलट', 'Nom Pilot', 'ime пилот', 'اسم الطيار'),
(687, 'Driver-Phone', 'Driver phone', 'Celular', 'celular', 'सेलुलर', 'cellulaire', 'ћелијски', 'خلوي'),
(684, 'Route', 'Route', 'Ruta', 'rota', 'मार्ग', 'route', 'рута', 'طريق'),
(707, 'Save', 'Save', 'Guardar', 'salvar', 'बचाना', 'Garder', 'сачувати', 'حفظ'),
(705, 'Comment', 'Comment', 'Comentar', 'comentário', 'टिप्पणी', 'Commenter', 'коментар', 'تعليق'),
(706, 'Untitle', 'Untitled', 'Sin título ', 'sem título', 'शीर्षकहीन', 'Sans titre', 'Без', 'بدون عنوان'),
(703, 'Running', 'Active', 'Activas', 'ativo', 'सक्रिय', 'actif', 'активан', 'نشط'),
(704, 'Archiveds', 'Archived', 'Archivadas', 'arquivados', 'संग्रहीत', 'archivé', 'архивиране', 'أرشفة'),
(709, 'To-Year', 'Promotion to year', 'Año a promover', 'Ano para promover', 'वर्ष बढ़ावा देने के लिए', 'Année de promouvoir', 'Године да промовише', 'العام لتعزيز'),
(710, 'To-Class', 'Promotion to class', 'Grado a promover', 'Grau de promover', 'बढ़ावा देने के लिए डिग्री', 'Degré de promouvoir', 'Степен да промовише', 'درجة لتعزيز'),
(711, 'Code', 'Code', 'Código', 'código', 'कोड', 'code', 'код', 'قانون'),
(712, 'Priority', 'Priority', 'Prioridad', 'prioridade', 'प्राथमिकता', 'priorité', 'приоритет', 'أفضلية'),
(713, 'Month', 'Month', 'Mes', 'mês', 'महीना', 'mois', 'месец', 'شهر'),
(714, 'January', 'January', 'Enero', 'janeiro', 'जनवरी', 'janvier', 'јануар', 'يناير'),
(715, 'February', 'February', 'Febrero', 'fevereiro', 'फरवरी', 'février', 'фебруар', 'فبراير'),
(716, 'March', 'March', 'Marzo', 'março', 'मार्च', 'mars', 'март', 'مارس'),
(717, 'April', 'April', 'Abril', 'abril', 'अप्रैल', 'avril', 'април', 'أبريل'),
(718, 'May', 'May', 'Mayo', 'maio', 'मई', 'mai', 'мај', 'مايو'),
(719, 'June', 'June', 'Junio', 'Junho', 'जून', 'juin', 'јун', 'يونيو'),
(720, 'July', 'July', 'Julio', 'Julho', 'जुलाई', 'juillet', 'јул', 'يوليو'),
(721, 'August', 'August', 'Agosto', 'Agosto', 'अगस्त', 'août', 'август', 'أغسطس'),
(722, 'October', 'October', 'Octubre', 'outubro', 'अक्टूबर', 'octobre', 'октобар', 'أكتوبر'),
(723, 'November', 'November', 'Noviembre', 'novembro', 'नवंबर', 'novembre', 'новембар', 'تشرين الثاني'),
(724, 'December', 'December', 'Diciembre', 'dezembro', 'दिसंबर', 'décembre', 'децембар', 'ديسمبر'),
(725, 'September', 'September', 'Septiembre', 'setembro', 'सितंबर', 'septembre', 'септембар', 'سبتمبر'),
(726, 'Profession', 'Profession', 'Profesión', 'profissão', 'व्यवसाय', 'profession', 'професија', 'مهنة'),
(727, 'Not-Found', 'Not found', 'Sin resultados', 'nenhum resultado', 'कोई परिणाम नहीं', 'Aucun résultat', 'Нема резултата', 'لا يوجد نتائج'),
(728, 'Nick', 'Nickname', 'Nick', 'entalhe', 'छेद', 'entailler', 'ницк', 'شق'),
(732, 'Payment-Information', 'Payment Information', 'Información del cobro', 'Coleta de informações', 'सूचना संग्रह', 'Collecte d\'informations', 'prikupljanje информација', 'جمع المعلومات'),
(731, 'Information', 'Information', 'Información', 'informação', 'सूचना', 'information', 'информације', 'معلومات'),
(737, 'Promotion-Selected', 'Promote the selected students', 'Promover a los estudiantes seleccionados', 'Promover os alunos selecionados', 'चयनित छात्रों को बढ़ावा देना', 'Promouvoir les étudiants sélectionnés', 'Промовисати изабране студенте', 'تشجيع الطلاب الذين تم اختيارهم'),
(734, 'Promotion-to', 'Promotion to', 'Promover a', 'promover', 'को बढ़ावा देने के', 'promouvoir', 'унапредити', 'تعزيز'),
(736, 'Already', 'Already it promoted', 'Ya se ha promovido', 'Já promoveu', 'पहले से ही यह पदोन्नत', 'Déjà il a encouragé', 'Већ је промовисао', 'بالفعل روجت'),
(738, 'System-Name', 'System name', 'Nombre del Sistema', 'Name System', 'सिस्टम का नाम', 'Name System', 'систем Име', 'اسم النظام'),
(739, 'System-Title', 'System title', 'Título del sistema', 'título Sistema', 'शीर्षक प्रणाली', 'Titre système', 'Наслов систем', 'عناوين النظام'),
(740, 'Minium-Mark', 'Minimum mark', 'Nota minima', 'Nota mínima', 'न्यूनतम नोट', 'minimum Remarque', 'минимална Напомена', 'الحد الأدنى ملاحظة'),
(741, 'Domain', 'Domain name', 'Dominio', 'domínio', 'डोमेन', 'domaine', 'домен', 'Dominio'),
(742, 'Currency', 'Currency', 'Moneda', 'moeda', 'मुद्रा', 'monnaie', 'валута', ''),
(743, 'Slider1', 'Salider 1 - 1920px - 570px', 'Slider 1 - 1920px - 570px', 'Slider 1 - 1920px - 570px', 'Slider 1 - 1920px - 570px', 'Slider 1 - 1920px - 570px', 'клизач 1 - 1920px - 570px', 'Slider 1 - 1920px - 570px'),
(744, 'Slider2', 'Salider 2 - 1920px - 570px', 'Slider 2 - 1920px - 570px', 'Slider 2 - 1920px - 570px', 'Slider 2 - 1920px - 570px', 'Slider 2 - 1920px - 570px', 'клизач 2 - 1920px - 570px', 'Slider 2 - 1920px - 570px'),
(745, 'Slider3', 'Salider 3 - 1920px - 570px', 'Slider 3 - 1920px - 570px', 'Slider 3 - 1920px - 570px', 'Slider 3 - 1920px - 570px', 'Slider 3 - 1920px - 570px', 'клизач 3 - 1920px - 570px', 'Slider 3 - 1920px - 570px'),
(746, 'List', 'List', 'Listado', 'listagem', 'लिस्टिंग', 'inscription', 'списак', 'قائمة'),
(749, 'By', 'By', 'Por', 'por', 'द्वारा', 'Par', 'по', 'بواسطة'),
(748, 'Salary', 'Salary', 'Salario', 'salário', 'वेतन', 'salaire', 'плата', 'أجرة'),
(750, 'Present', 'Present', 'Presente', 'presente', 'वर्तमान', 'présent', 'поклон', 'حاضر'),
(751, 'Absent', 'Absent', 'Ausente', 'ausente', 'अनुपस्थित', 'absent', 'одсутан', 'غائب'),
(752, 'Homework-Of', 'Homework of', 'Tareas de', 'tarefas', 'कार्यों', 'tâches', 'задаци', 'المهام'),
(753, 'Student-Dashboard', 'Student Dashboard', 'Tablero de Estudiante', 'Placa de estudante', 'छात्र बोर्ड', 'Conseil étudiant', 'студент одбор', 'مجلس الطلبة'),
(754, 'Your-Marks', 'these are your marks', 'estas son tus calificaciones', 'estas são as suas notas', 'ये अपने योग्यता हैं', 'ce sont vos qualifications', 'то су ти оцене', 'هذه هي مؤهلاتك'),
(755, 'My-Homework', 'My homework', 'Mis tareas', 'Minhas tarefas', 'मेरा कार्य', 'Mes tâches', 'Моји задаци', 'مهامي'),
(756, 'Teacher-Dashboard', 'Teacher Dashboard', 'Tablero de Profesores', 'professores Board', 'शिक्षक बोर्ड', 'Les enseignants Conseil', 'nastavnici одбор', 'مجلس المعلمين'),
(757, 'Students-Of', 'Students Of', 'Estudiantes de', 'estudantes', 'छात्रों', 'étudiants', 'студенти', 'الطلاب'),
(758, 'Send-Homework', 'Send Homework', 'Enviar Tareas', 'Enviar Tarefas', 'कार्य भेजें', 'Envoyer Tâches', 'Пошаљи Задаци', 'إرسال المهام'),
(759, 'Study-Material', 'Study Material', 'Material de estudio', 'Material de estudo', 'अध्ययन सामग्री', 'Matériaux d\'étude', 'Студи Материјали', 'دراسة المواد'),
(760, 'Homework', 'Homework', 'Tareas', 'tarefas', 'कार्यों', 'tâches', 'задаци', 'المهام'),
(763, 'Low', 'Low', 'Baja', 'cair', 'पड़ना', 'Petit', 'пасти', 'سقط'),
(764, 'Medium', 'Medium', 'Media', 'média', 'औसत', 'moyenne', 'просек', 'متوسط'),
(765, 'High', 'High', 'Alta', 'alto', 'उच्च', 'haut', 'висок', 'ارتفاع'),
(766, 'Why', 'Why report it?', '¿Por qué lo reporta?', 'Por que denunciá-lo?', 'यह रिपोर्ट क्यों?', 'Pourquoi le signaler?', 'Зашто се пријавити?', 'لماذا الإبلاغ عنه؟'),
(767, 'Sents', 'Sent', 'Enviados', 'enviados', 'दूत', 'envoyés', 'изасланици', 'المبعوثون'),
(768, 'My-Marks', 'My Marks', 'Mis calificaciones', 'As minhas notas', 'मेरा ग्रेड', '\nMes qualifications', 'Моје оцене', 'درجاتي'),
(770, 'My-Permissions', 'My Permissions', 'Mis Permisos', 'meus Permissão', 'मेरे अनुमतियां', 'Mes Autorisations', 'Моје Дозволе', 'بلدي ضوابط'),
(771, 'Create', 'Apply', 'Solicitar', 'pedido', 'प्रार्थना', 'Demander', 'захтев', 'طلب'),
(772, 'List-Perm', 'My permissions', 'Mis permisos', 'meus permissões', 'मेरे अनुमतियों', 'mes permissions', 'ми дозволе', 'أذونات بلدي'),
(822, 'News-Only', '', 'Noticias para profesores', 'Notícias para professores', 'शिक्षकों के लिए समाचार', 'Nouvelles pour les enseignants', 'Вести за наставнике', 'أخبار للمعلمين'),
(775, 'End_Date', 'Until', 'Hasta', 'para cima', 'ऊपर', 'en haut', 'горе', 'فوق'),
(776, 'Start_Date', 'From', 'Desde', 'de', 'से', 'Despuis', 'од', 'من'),
(779, 'Pending', 'Pending', 'Pendiente', 'pendente', 'अपूर्ण', 'en attendant', 'нерешен', 'ريثما'),
(778, 'Rejected', 'Rejected', 'Rechazada', 'rejeitados', 'गिरावट आई', 'diminué', 'опао', 'رفض'),
(821, 'Notice-Sent', 'News sent to teachers', 'Noticias enviadas a los profesores', 'Notícia enviada para professores', 'समाचार शिक्षकों को भेजा', 'Nouvelles envoyé aux enseignants', 'Новости послати наставнике', 'أرسلت الخبر إلى المعلمين'),
(780, 'My-Request', 'My applications', 'Mis solicitudes', 'minhas aplicações', 'मेरे अनुप्रयोगों', 'Mes applications', 'Моје пријаве', 'طلباتي'),
(823, 'Student-Bulk', 'Massive students', 'Estudiantes Masivos', 'estudantes maciças', 'बड़े पैमाने पर छात्रों', 'étudiants Massive', 'Массиве студенти', 'طلاب هائل'),
(872, 'Quick-ad', 'Send Quick Ads', 'Enviar Anuncios Rápidos', 'Enviar anúncios rápidos', 'भेजें त्वरित टॉप', 'Envoyer Annonces rapides', 'Сенд Брзи Огласи', 'إرسال إعلانات السريع'),
(873, 'Language', 'Language', 'Idioma', 'idioma', 'भाषा', 'Langue', 'језик', 'لغة'),
(790, 'Lists-Perms', 'Applications for permits', 'Solicitudes de permisos', 'Pedidos de licenças', 'परमिट के लिए आवेदन', 'Les demandes de permis', 'Захтев за издавање дозволе', 'طلبات الحصول على تصاريح'),
(796, 'Reject', 'Refuse', 'Rechazar', 'rejeitar', 'अस्वीकार', 'rejeter', 'одбити', 'رفض'),
(797, 'Accept', 'Accept', 'Aceptar', 'aceitar', 'स्वीकार करना', 'Accepter', 'прихватити', 'استعرض'),
(811, 'No_Options', 'No options', 'Sin opciones', 'não há opções', 'कोई विकल्प', 'Pas d\'options', 'Но оптионс', 'لا توجد خيارات'),
(815, 'Nice', 'Approved', 'Aprobada', 'aprovado', 'अनुमोदित', 'approuvé', 'одобрен', 'وافق'),
(820, 'Teacher-News', 'Send news Professors only', 'Enviar noticia solo a Profesores', 'Enviar somente Professores de notícias', 'केवल समाचार प्रोफेसर भेजें', 'Envoyer uniquement les professeurs de presse', 'Послати само вести Професори', 'إرسال أساتذة الأخبار فقط'),
(838, 'add_a_row', 'Add more', 'Agregar más', 'Adicionar mais', 'जोड़े', 'Ajouter plus', 'Додај више', 'إضافة المزيد'),
(876, 'you-have-until', 'Youi have until', 'Tienes hasta', 'você tem até', 'आप जब तक है', 'vous avez jusqu\'au', 'имате до', 'لديك حتى'),
(877, 'to-deliver-this-task', 'to deliver this task.', 'para entregar esta tarea', 'para entregar esta tarefa', 'इस कार्य को वितरित करने के लिए', 'pour fournir cette tâche', 'да испоручи овог задатка', 'لتقديم هذه المهمة'),
(878, 'Review-File', 'Your file will be sent for review.', 'Tu archivo será enviado para su revisión', 'Seu arquivo será enviado para revisão', 'आपकी फ़ाइल समीक्षा के लिए भेजा जाएगा', 'Votre dossier sera envoyé pour examen', 'Ваша датотека ће бити послат на преглед', 'سيتم إرسال ملف للمراجعة'),
(879, 'on-time', 'On time', 'A tiempo', 'A tempo', 'एक समय', 'À temps', 'vreme', 'زمن'),
(880, 'delayed', 'Delayed', 'Retrasada', 'atrasado', 'विलंबित', 'différé', 'одложен', 'مؤجل'),
(881, 'sent-for-review', 'Sent for review', 'Enviada para su revisión', 'Enviado para revisão', 'समीक्षा के लिए भेजा', 'Envoyés pour examen', 'Упућени на преглед', 'أرسلت للمراجعة'),
(882, 'deliver', 'Deliver', 'Entregar', 'entregar', 'उद्धार', 'livrer', 'доставити', 'نقل'),
(883, 'Last-day-delivery', 'Last day delivery', 'Último día de entrega', 'A entrega do último dia', 'अंतिम दिन वितरण', 'Livraison Dernier jour', 'Последњи дан испоруке', 'آخر يوم تسليم'),
(884, 'Files', 'Deliveries', 'Entregas', 'entregas', 'प्रसव', 'livraisons', 'испоруке', 'التسليم'),
(885, 'Homework-Sent', 'Sent', 'Enviadas', 'você enviou', 'आप भेजा', 'Vous avez envoyé', 'сте послали', 'قمت بإرسالها'),
(2176, 'Payments', 'Create Payment', 'Crear nuevo pago', 'Criar novo pagamento', 'नई भुगतान बनाएं', 'Créer un nouveau paiement', 'Створити нову уплату', 'خلق دفعة جديدة'),
(2098, 'Average', 'Average', 'Promedio ', 'média', 'औसत', 'moyenne', 'просек', 'متوسط'),
(2080, 'Generate', 'Generate Sheet', 'Generar cuadros', 'gerar imagens', 'चित्रों उत्पन्न', 'générer des images', 'генерисање слике', 'توليد الصور'),
(2074, 'Tabulation', 'Tabulation Sheet', 'Cuadros', 'imagens', 'चित्रों', 'photos', 'слике', 'الصور'),
(2073, 'Comments', 'Comment', 'Comentario', 'comentário', 'टिप्पणी', 'commentaire', 'коментар', 'تعليق'),
(2071, 'Sections', 'Sections', 'Secciones', 'seções', 'वर्गों', 'sections', 'профили', 'الأقسام'),
(1904, 'Discussion', 'Discussions', 'Discusiones  ', 'discussões', 'विचार-विमर्श', 'discussions', 'дискусије', 'مناقشات'),
(2068, 'FinalExam', 'Exam', 'Examen', 'exame', 'परीक्षा', 'exam', 'испит', 'امتحان'),
(2066, 'Update-Information', 'Update Profile', 'Actualizar perfil', 'atualizar', 'अद्यतन', 'mettre à jour', 'ажурирање', 'تحديث'),
(2065, 'No', 'No', 'No', 'não', 'नहीं', 'pas', 'не', 'ليس'),
(2064, 'Yes', 'Yes', 'Si', 'se', 'यदि', 'si', 'ако', 'إذا'),
(2063, 'This-Month', 'This month is her birthday', 'Este mes es su cumpleaños', 'Este mês é seu aniversário', 'इस महीने अपने जन्मदिन है', 'Ce mois-ci est votre anniversaire', 'Овог месеца је ваш рођендан', 'هذا الشهر هو عيد ميلادك'),
(2059, 'Class-Assigned', 'Assigned Class', 'Salón Asignado', 'alocados Salão', 'आवंटित हॉल', 'Numéroté Salle', 'издвојила сала', 'قاعة المخصصة'),
(2060, 'Excellent', '\nExcellent Student', 'Alumno Excelente', 'excelente aluno', 'उत्कृष्ट छात्र', 'Excellente élève', 'одличан ученик', 'طالب ممتاز'),
(2026, 'Academic-Settings', 'Academic Settings', 'Ajustes Académicos', 'ambientes acadêmicos', 'शैक्षिक सेटिंग्स', 'paramètres académiques', 'Ацадемиц подешавања', 'إعدادات الأكاديمية'),
(2016, 'Type', 'Type', 'Tipo', 'tipo', 'टाइप', 'Type', 'тип', 'نوع'),
(2017, 'From', 'From', 'Desde', 'de', 'से', 'Despuis', 'од', 'من'),
(2018, 'To', 'To', 'Hasta', 'para cima', 'ऊपर', 'en haut', 'горе', 'فوق'),
(2062, 'Last-News', 'Last News', 'Noticias recientes', 'Notícias recentes', 'हाल ही में खबर', 'Nouvelles récentes', 'nedavno Новости', 'الأخبار الأخيرة'),
(2019, 'Main', 'Navigation', 'Menu', 'menu', 'मेन्यू', 'menu', 'мени', 'قائمة الطعام'),
(2021, 'Students-Information', 'Information', 'Información', 'informação', 'सूचना', 'information', 'информације', 'معلومات'),
(2022, 'Users-Account', 'Users', 'Usuarios', 'usuários', 'उपयोगकर्ताओं', 'utilisateurs', '\nкорисници', 'المستخدمين'),
(2023, 'ManageClassrooms', 'Classrooms', 'Salones de Clase', 'Salas de aula', 'कक्षाओं', 'Les salles de classe', 'učionice', 'الفصول الدراسية'),
(2024, 'SemesterContent', 'Contents', 'Contenidos', 'conteúdo', 'अंतर्वस्तु', 'contenu', 'садржај', 'محتويات'),
(2025, 'Settings', 'Settings', 'Ajustes', 'configurações', 'सेटिंग्स', 'réglages', 'podešavanja', 'إعدادات'),
(2027, 'Library', 'Library', 'Librería', 'livraria', 'किताबों की दुकान', 'librairie', 'књижара', 'مكتبة'),
(2028, 'StudentsReports', 'Students Reports', 'Estudiantes', 'estudantes', 'छात्रों', 'étudiants', 'студенти', 'الطلاب'),
(2029, 'TeacherReports', 'Teachers Reports', 'Profesores', 'professores', 'शिक्षकों', 'enseignants', 'наставници', 'معلمون'),
(2030, 'SchoolReports', 'School Reports', 'Reportes Escolares', 'relatórios escolares', 'स्कूल की रिपोर्ट', 'les bulletins scolaires', 'Школски извештаји', 'التقارير المدرسية'),
(2031, 'TeachersFiles', 'Teachers Files', 'Archivos Profesores', 'arquivos de professores', 'शिक्षक फ़ाइलें', 'fichiers enseignants', 'Наставници фајлова', 'ملفات المعلمين'),
(2032, 'ListsPerms', 'Permissions', 'Permisos', 'permissões', 'अनुमतियों', 'autorisations', 'дозволе', 'أذونات'),
(2033, 'StaticPages', 'Statics Pages', 'Páginas estáticas', 'páginas estáticas', 'स्थैतिक पृष्ठों', 'pages statiques', 'статичке странице', 'صفحات ثابتة'),
(2034, 'ManagePages', 'Manage Pages', 'Administrar Páginas', 'gerenciar páginas', 'पेज का प्रबंधन', 'gérer Pages', 'управљати Пагес', 'إدارة الصفحات'),
(2035, 'NewPage', 'New Page', 'Agregar nueva', 'Adicionar nova', 'नए जोड़े', 'Ajouter un nouveau', 'Додај нови', 'إضافة جديدة'),
(2036, 'Pages', 'Pages', 'Páginas', 'páginas', 'पृष्ठों', 'pages', 'страница', 'الصفحات'),
(2037, 'PersonalInfo', 'Personal Information', 'Información Personal', 'Informação pessoal', 'व्यक्तिगत जानकारी', 'Information personnelle', 'Лични подаци', 'المعلومات الشخصية'),
(2038, 'UpdateProfile', 'Update Information', 'Actualizar Información', 'actualização da informação', 'जानकारी अद्यतन करें', 'mise à jour de l\'information', 'informacije ажурирање', 'تحديث المعلومات'),
(2039, 'Picture', 'Photo', 'Fotografía', 'fotografia', 'फोटोग्राफी', 'photographie', 'фотографија', 'تصوير'),
(2058, 'Registered', 'Registered Since', 'Registrado desde', 'registrado desde', 'के बाद से पंजीकृत', 'enregistré depuis', 'регистрован од', 'مسجل منذ'),
(2057, 'Student-Portal', 'Student Portal', 'Portal de Estudiantes', 'Portal do aluno', 'छात्र पोर्टल', 'Portail étudiant', 'студент портал', 'بوابة الطالب'),
(2056, 'Add-Student', 'Add Student', 'Agregar Estudiante', 'Adicionar Student', 'छात्र जोड़े', 'Ajouter étudiant', 'Додај Студент', 'إضافة طالب'),
(2240, 'Single', 'Single Payment', 'Pago único', 'de pagamento único', 'एकल भुगतान', 'paiement unique', 'једнократно', 'دفعة واحدة'),
(2305, 'Invoice', 'Invoice Details', 'Detalles de la Factura', 'Detalhes da fatura', 'चालान विवरण', 'Détails facture', 'Детаљи рачуна', 'تفاصيل الفاتورة'),
(2338, 'PaymentInfo', 'Payment Information', 'Información del pago', 'Informação de pagamento', 'भुगतान जानकारी', 'Conditions de vente', 'informacije о плаћању', 'معلومات الدفع'),
(2356, 'Payment', 'Payment', 'Cantidad', 'quantidade', 'मात्रा', 'quantité', 'количина', 'كمية'),
(2357, 'PaymentAmount', 'Payment Amount', 'Cantidad del pago', 'Valor do pagamento', 'भुगतान राशि', 'Montant du paiement', 'Износ за плаћање', 'دفع المبلغ'),
(2525, 'Student-Payment', 'Student Payment', 'Pagos de estudiantes', 'Pagamentos estudantes', 'भुगतान के छात्रों', 'Étudiants Paiements', 'Исплате студенти', 'دفعات الطلبة'),
(2526, 'Payment', 'Payment', 'Cantidad', 'pagamento', 'मात्रा', 'quantité', 'количина', 'كمية'),
(2527, 'Paid', 'Paid', 'Pagado', 'pago', 'भुगतान', 'payé', 'плаћен', 'مدفوع'),
(2528, 'Unpaid', 'Unpaid', 'Sin pagar', 'sem pagar', 'भुगतान के बिना', 'Sans payer', 'без плаћања', 'دون دفع'),
(2652, 'StudentPayment', 'Student Payment', 'Pagos de estudiantes', 'Pagamentos estudantes', 'भुगतान के छात्रों', 'Étudiants Paiements', 'Исплате студенти', 'دفعات الطلبة'),
(2653, 'invoices', 'Invoices', 'Facturas', 'facturas', 'चालान', 'factures', 'фактуре', 'الفواتير'),
(2654, 'payment_history', 'Payment History', 'Historial de pagos', 'Histórico de pagamentos', 'भुगतान इतिहास', 'Historique des paiements', 'Историја плаћање', 'تاريخ الدفع'),
(3588, 'Paypal-Email', 'PayPal Email', 'Correo PayPal', 'E PayPal', 'ई पेपैल', 'E PayPal', 'Е ПаиПал', 'E باي بال'),
(3595, 'Price', 'Price', 'Precio', 'preço', 'कीमत', 'prix', 'цена', 'السعر'),
(3607, 'Price', 'Price', 'Precio', 'preço', 'कीमत', 'prix', 'цена', 'السعر'),
(3609, 'Price', 'Price', 'Precio', 'preço', 'कीमत', 'prix', 'цена', 'السعر'),
(3644, 'MarksLimit', 'Date limit to upload marks', 'Fecha límite para subir calificaciones', 'Prazo para carregar pontuações', 'स्कोर को अपलोड करने की समय सीमा', 'Date limite pour télécharger les partitions', 'Рок за отпремање резултате', 'الموعد النهائي لتحميل عشرات'),
(3645, 'Rating', 'Allow students to report to teachers?', '¿Permitir reportes para profesores?', 'Permitir relatórios para os professores?', 'शिक्षकों के लिए रिपोर्ट की अनुमति दें?', 'Autoriser les rapports pour les enseignants?', 'Дозволите извештаје за наставнике?', 'السماح تقارير للمعلمين؟'),
(3646, 'MiniMark', 'Minimum mark to pass a course', 'Nota mínima para aprobar un curso', 'nota mínima para passar por um curso', 'न्यूनतम ग्रेड एक कोर्स पास करने के लिए', 'note minimale de passer un cours', 'минимална оцена да прође курс', 'الحد الأدنى درجة لتمرير دورة'),
(3647, 'AverageMin', 'Minimum average for outstanding student', 'Promedio mínimo para estudiante destacado', 'estudante excepcional média mínima', 'न्यूनतम औसत बकाया छात्र', 'étudiant exceptionnel en moyenne minimum', 'Минимални просечни изузетан ученик', 'متوسط الحد الأدنى الطالب المتميز'),
(3648, 'TeacherAverage', 'Allow teachers to check the tabulation?', '¿Permitir a los profesores consultar los cuadros?', 'Permitir aos professores para ver as fotos?', 'शिक्षकों तस्वीरें देखने के लिए अनुमति दें?', 'Permettre aux enseignants de voir les images?', 'Омогуће наставницима да видимо слике?', 'تمكين المدرسين من رؤية الصور؟'),
(3653, 'ClassForum', 'Class Forum', 'Foro de clases', 'Fórum classe', 'कक्षा फोरम', 'classe Forum', 'цласс форум', 'المنتدى الدرجة'),
(3654, 'CreatePost', 'Create Post', 'Publicar', 'publicar', 'प्रकाशित करना', 'publier', 'објавити', 'نشر'),
(3686, 'Parents-Dashboard', 'Parents Dashboard', 'Tablero de padres', 'Os pais Board', 'माता-पिता को बोर्ड', 'Conseil parents', 'roditelji одбор', 'مجلس أولياء الأمور'),
(3699, 'Students-Dashboard', 'Student Dashboard', 'Tablero de Estudiante', 'Placa de estudante', 'छात्र बोर्ड', 'Conseil étudiant', 'студент одбор', 'مجلس الطلبة'),
(3894, 'Print', 'Print', 'Imprimir', 'impressão', 'छाप', 'imprimer', 'штампа', 'طباعة'),
(3865, 'Gallery', 'Media Gallery', 'Multimedia', 'multimídia', 'मल्टीमीडिया', 'multimédia', 'мултимедијални', 'الوسائط المتعددة'),
(3866, 'GalleryCat', 'Gallery Category', 'Categorías', 'Categorias', 'श्रेणियाँ', 'Catégories', 'Категорије', 'الفئات'),
(3867, 'GalleryPic', 'Gallery', 'Galería', 'galeria', 'गैलरी', 'galerie', 'галерија', 'رواق'),
(3868, 'VideoGallery', 'Video Gallery', 'Videos', 'vídeos', 'वीडियो', 'Vidéos', 'Видео', 'فيديو'),
(3889, 'Unavailab', 'Unavailable', 'No disponible', 'Não disponível', 'उपलब्ध नहीं', 'Non disponible', 'није доступно', 'غير متوفرة'),
(3871, 'embedid', 'URL embed', 'URL embed', 'URL embed', 'ट्वीट यूआरएल', 'URL d\'intégration', 'УРЛ за уграђивање', 'URL ضمن'),
(3872, 'Skin', 'Skin Colour', 'Estilo', 'estilo', 'शैली', 'style', 'стил', 'أسلوب'),
(3873, 'White', 'White', 'Blanco', 'branco', '\nसफेद', 'Blanc', 'бео', 'أبيض'),
(3874, 'Upload-Video', 'Add Video', 'Agregar Video', 'Adicionar vídeo', 'वीडियो जोड़ें', 'Ajouter la vidéo', 'Адд Видео', 'إضافة فيديو'),
(3886, 'Availab', 'Available', 'Disponible', 'disponível', 'उपलब्ध', 'disponible', 'доступан', 'متاح'),
(3883, 'Author', 'Author', 'Autor', 'autor', 'लेखक', 'auteur', 'аутор', 'مؤلف'),
(3930, 'TeacherRequest', 'Teacher Permits', 'Permisos de Profesores', 'professores licenças', 'शिक्षक परमिट', 'enseignants permis', 'Наставници дозволе', 'تصاريح المعلمين'),
(3931, 'StudentRequest', 'Student Permits', 'Permisos de Estudiantes', 'Visto de estudante', 'छात्र परमिट', 'Le permis d\'études', 'Студент дозволе', 'تصاريح طالب'),
(3932, 'Late', 'I\'m late', 'Llegó tarde', 'Estou atrasado', 'यह देर हो चुकी थी', 'Je suis en retard', 'Било је касно', 'أنا في وقت متأخر'),
(3933, 'Allowed', 'Allow to change marks more than twice?', '¿Permitir cambiar calificaciones más de dos veces?', NULL, NULL, NULL, NULL, 'السماح عشرات تغير أكثر من مرتين؟'),
(3934, 'homework', '', '', NULL, NULL, NULL, NULL, ''),
(3935, 'homework', '', '', NULL, NULL, NULL, NULL, ''),
(3936, 'Available', '', '', NULL, NULL, NULL, NULL, ''),
(3937, 'Unavailable', '', '', NULL, NULL, NULL, NULL, ''),
(3938, 'class', '', '', NULL, NULL, NULL, NULL, ''),
(3939, 'students', '', '', NULL, NULL, NULL, NULL, ''),
(3940, 'class', '', '', NULL, NULL, NULL, NULL, ''),
(3941, 'students', '', '', NULL, NULL, NULL, NULL, ''),
(3942, 'class', '', '', NULL, NULL, NULL, NULL, ''),
(3943, 'students', '', '', NULL, NULL, NULL, NULL, ''),
(3944, 'Courses', '', '', NULL, NULL, NULL, NULL, ''),
(3945, 'Manage Courses', '', '', NULL, NULL, NULL, NULL, ''),
(3946, 'Course Name', '', '', NULL, NULL, NULL, NULL, ''),
(3947, 'Levels', '', '', NULL, NULL, NULL, NULL, ''),
(3948, 'Fees', '', '', NULL, NULL, NULL, NULL, ''),
(3949, 'Course Objective', '', '', NULL, NULL, NULL, NULL, ''),
(3950, 'Aim of the Course type here...', '', '', NULL, NULL, NULL, NULL, ''),
(3951, 'schedule', '', '', NULL, NULL, NULL, NULL, ''),
(3952, 'Coaching Type', '', '', NULL, NULL, NULL, NULL, ''),
(3953, 'Fees per Hours', '', '', NULL, NULL, NULL, NULL, ''),
(3954, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3955, 'Level', '', '', NULL, NULL, NULL, NULL, ''),
(3956, 'Fees/Hr', '', '', NULL, NULL, NULL, NULL, ''),
(3957, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3958, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3959, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3960, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3961, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3962, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3963, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3964, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3965, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3966, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3967, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3968, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3969, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3970, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3971, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3972, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3973, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3974, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3975, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3976, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3977, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3978, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3979, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3980, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3981, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3982, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3983, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3984, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3985, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3986, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3987, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3988, 'Course name', '', '', NULL, NULL, NULL, NULL, '');
INSERT INTO `language` (`phrase_id`, `phrase`, `english`, `spanish`, `portuguse`, `hindi`, `french`, `serbian`, `arabic`) VALUES
(3989, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3990, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3991, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3992, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3993, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3994, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3995, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3996, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3997, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3998, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(3999, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4000, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4001, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4002, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4003, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4004, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4005, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4006, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4007, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4008, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4009, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4010, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4011, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4012, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4013, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4014, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4015, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4016, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4017, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4018, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4019, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4020, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4021, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4022, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4023, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4024, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4025, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4026, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4027, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4028, 'Course Details', '', '', NULL, NULL, NULL, NULL, ''),
(4029, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4030, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4031, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4032, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4033, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4034, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4035, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4036, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4037, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4038, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4039, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4040, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4041, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4042, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4043, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4044, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4045, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4046, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4047, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4048, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4049, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4050, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4051, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4052, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4053, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4054, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4055, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4056, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4057, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4058, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4059, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4060, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4061, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4062, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4063, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4064, 'Fees per Hours (in Rupees)', '', '', NULL, NULL, NULL, NULL, ''),
(4065, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4066, 'Fees per Hours(in Rupees)', '', '', NULL, NULL, NULL, NULL, ''),
(4067, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4068, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4069, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4070, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4071, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4072, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4073, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4074, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4075, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4076, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4077, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4078, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4079, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4080, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4081, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4082, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4083, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4084, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4085, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4086, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4087, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4088, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4089, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4090, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4091, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4092, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4093, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4094, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4095, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4096, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4097, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4098, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4099, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4100, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4101, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4102, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4103, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4104, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4105, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4106, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4107, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4108, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4109, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4110, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4111, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4112, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4113, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4114, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4115, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4116, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4117, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4118, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4119, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4120, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4121, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4122, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4123, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4124, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4125, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4126, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4127, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4128, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4129, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4130, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4131, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4132, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4133, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4134, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4135, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4136, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4137, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4138, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4139, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4140, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4141, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4142, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4143, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4144, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4145, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4146, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4147, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4148, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4149, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4150, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4151, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4152, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4153, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4154, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4155, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4156, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4157, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4158, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4159, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4160, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4161, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4162, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4163, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4164, 'Gender', '', '', NULL, NULL, NULL, NULL, ''),
(4165, 'parent', '', '', NULL, NULL, NULL, NULL, ''),
(4166, 'parent', '', '', NULL, NULL, NULL, NULL, ''),
(4167, 'parent', '', '', NULL, NULL, NULL, NULL, ''),
(4168, 'parent', '', '', NULL, NULL, NULL, NULL, ''),
(4169, 'parent', '', '', NULL, NULL, NULL, NULL, ''),
(4170, 'parent', '', '', NULL, NULL, NULL, NULL, ''),
(4171, 'parent', '', '', NULL, NULL, NULL, NULL, ''),
(4172, 'parent', '', '', NULL, NULL, NULL, NULL, ''),
(4173, 'parent', '', '', NULL, NULL, NULL, NULL, ''),
(4174, 'parent', '', '', NULL, NULL, NULL, NULL, ''),
(4175, 'parent', '', '', NULL, NULL, NULL, NULL, ''),
(4176, 'Manage-students', '', '', NULL, NULL, NULL, NULL, ''),
(4177, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4178, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4179, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4180, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4181, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4182, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4183, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4184, 'Course', '', '', NULL, NULL, NULL, NULL, ''),
(4185, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4186, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4187, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4188, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4189, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4190, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4191, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4192, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4193, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4194, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4195, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4196, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4197, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4198, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4199, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4200, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4201, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4202, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4203, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4204, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4205, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4206, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4207, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4208, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4209, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4210, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4211, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4212, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4213, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4214, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4215, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4216, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4217, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4218, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4219, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4220, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4221, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4222, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4223, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4224, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4225, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4226, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4227, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4228, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4229, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4230, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4231, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4232, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4233, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4234, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4235, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4236, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4237, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4238, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4239, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4240, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4241, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4242, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4243, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4244, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4245, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4246, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4247, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4248, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4249, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4250, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4251, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4252, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4253, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4254, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4255, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4256, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4257, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4258, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4259, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4260, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4261, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4262, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4263, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4264, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4265, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4266, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4267, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4268, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4269, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4270, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4271, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4272, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4273, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4274, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4275, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4276, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4277, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4278, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4279, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4280, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4281, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4282, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4283, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4284, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4285, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4286, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4287, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4288, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4289, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4290, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4291, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4292, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4293, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4294, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4295, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4296, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4297, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4298, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4299, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4300, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4301, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4302, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4303, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4304, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4305, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4306, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4307, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4308, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4309, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4310, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4311, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4312, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4313, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4314, 'Mapping', '', '', NULL, NULL, NULL, NULL, ''),
(4315, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4316, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4317, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4318, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4319, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4320, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4321, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4322, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4323, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4324, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4325, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4326, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4327, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4328, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4329, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4330, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4331, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4332, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4333, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4334, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4335, 'Course Mapping', '', '', NULL, NULL, NULL, NULL, ''),
(4336, 'Teacher - Course Mapping', '', '', NULL, NULL, NULL, NULL, ''),
(4337, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4338, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4339, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4340, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4341, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4342, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4343, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4344, 'Expected Pay', '', '', NULL, NULL, NULL, NULL, ''),
(4345, 'Available Slot', '', '', NULL, NULL, NULL, NULL, ''),
(4346, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4347, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4348, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4349, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4350, 'Expected Pay/Hour', '', '', NULL, NULL, NULL, NULL, ''),
(4351, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4352, 'Course-Mapping', '', '', NULL, NULL, NULL, NULL, ''),
(4353, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4354, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4355, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4356, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4357, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4358, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4359, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4360, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4361, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4362, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4363, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4364, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4365, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4366, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4367, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4368, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4369, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4370, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4371, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4372, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4373, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4374, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4375, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4376, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4377, 'Action', '', '', NULL, NULL, NULL, NULL, ''),
(4378, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4379, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4380, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4381, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4382, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4383, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4384, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4385, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4386, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4387, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4388, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4389, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4390, 'Parent Details', '', '', NULL, NULL, NULL, NULL, ''),
(4391, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4392, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4393, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4394, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4395, 'Student Info', '', '', NULL, NULL, NULL, NULL, ''),
(4396, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4397, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4398, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4399, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4400, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4401, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4402, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4403, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4404, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4405, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4406, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4407, 'Parent Name', '', '', NULL, NULL, NULL, NULL, ''),
(4408, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4409, 'Map the Parent', '', '', NULL, NULL, NULL, NULL, ''),
(4410, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4411, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4412, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4413, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4414, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4415, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4416, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4417, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4418, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4419, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4420, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4421, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4422, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4423, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4424, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4425, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4426, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4427, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4428, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4429, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4430, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4431, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4432, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4433, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4434, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4435, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4436, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4437, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4438, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4439, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4440, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4441, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4442, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4443, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4444, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4445, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4446, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4447, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4448, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4449, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4450, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4451, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4452, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4453, 'Course Status', '', '', NULL, NULL, NULL, NULL, ''),
(4454, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4455, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4456, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4457, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4458, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4459, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4460, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4461, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4462, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4463, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4464, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4465, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4466, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4467, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4468, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4469, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4470, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4471, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4472, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4473, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4474, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4475, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4476, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4477, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4478, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4479, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4480, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4481, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4482, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4483, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4484, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4485, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4486, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4487, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4488, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4489, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4490, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4491, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4492, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4493, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4494, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4495, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4496, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4497, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4498, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4499, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4500, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4501, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4502, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4503, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4504, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4505, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4506, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4507, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4508, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4509, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4510, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4511, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4512, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4513, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4514, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4515, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4516, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4517, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4518, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4519, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4520, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4521, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4522, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4523, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4524, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4525, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4526, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4527, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4528, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4529, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4530, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4531, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4532, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4533, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4534, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4535, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4536, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4537, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4538, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4539, 'Needs Approvement', '', '', NULL, NULL, NULL, NULL, ''),
(4540, 'VBC Theni', '', '', NULL, NULL, NULL, NULL, ''),
(4541, 'VBC Anupanadi', '', '', NULL, NULL, NULL, NULL, ''),
(4542, 'VBC Viraganoor', '', '', NULL, NULL, NULL, NULL, ''),
(4543, 'VBC Karur', '', '', NULL, NULL, NULL, NULL, ''),
(4544, 'School-Dashboard', '', '', NULL, NULL, NULL, NULL, ''),
(4545, 'Deadline for Activity', '', '', NULL, NULL, NULL, NULL, ''),
(4546, 'Latest Activity', '', '', NULL, NULL, NULL, NULL, ''),
(4547, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4548, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(4549, 'Common Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4550, 'Activity', '', '', NULL, NULL, NULL, NULL, ''),
(4551, 'Manage notes', '', '', NULL, NULL, NULL, NULL, ''),
(4552, 'notes', '', '', NULL, NULL, NULL, NULL, ''),
(4553, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4554, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4555, 'Worksheet', '', '', NULL, NULL, NULL, NULL, ''),
(4556, 'Olympaid Sheet', '', '', NULL, NULL, NULL, NULL, ''),
(4557, 'Question Bank', '', '', NULL, NULL, NULL, NULL, ''),
(4558, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4559, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4560, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4561, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4562, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4563, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4564, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4565, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4566, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4567, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4568, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4569, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4570, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4571, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4572, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4573, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4574, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4575, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4576, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4577, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4578, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4579, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4580, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4581, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4582, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4583, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4584, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4585, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4586, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4587, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4588, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4589, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4590, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4591, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4592, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4593, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4594, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4595, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4596, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4597, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4598, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4599, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4600, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4601, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4602, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4603, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4604, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4605, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4606, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4607, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4608, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4609, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4610, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4611, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4612, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4613, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4614, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4615, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4616, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4617, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4618, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4619, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4620, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4621, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4622, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4623, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4624, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4625, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4626, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4627, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4628, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4629, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4630, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4631, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4632, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4633, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4634, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4635, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4636, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4637, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4638, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4639, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4640, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4641, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4642, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4643, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4644, 'Document Type', '', '', NULL, NULL, NULL, NULL, ''),
(4645, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4646, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4647, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4648, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4649, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4650, 'Document', '', '', NULL, NULL, NULL, NULL, ''),
(4651, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4652, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4653, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4654, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4655, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4656, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4657, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4658, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4659, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4660, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4661, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4662, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4663, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4664, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4665, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4666, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4667, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4668, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4669, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4670, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4671, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4672, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4673, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4674, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4675, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4676, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4677, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4678, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4679, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4680, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4681, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4682, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4683, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4684, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4685, 'Upload Document', '', '', NULL, NULL, NULL, NULL, ''),
(4686, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4687, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4688, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4689, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4690, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4691, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4692, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4693, 'Closing Date', '', '', NULL, NULL, NULL, NULL, ''),
(4694, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4695, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4696, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4697, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4698, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4699, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4700, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4701, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4702, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4703, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4704, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4705, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4706, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4707, 'Co-ordinator Names', '', '', NULL, NULL, NULL, NULL, ''),
(4708, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4709, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4710, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4711, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4712, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4713, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4714, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4715, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4716, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4717, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4718, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4719, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4720, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4721, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4722, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4723, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4724, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4725, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4726, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4727, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4728, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4729, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4730, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4731, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4732, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4733, 'Option', '', '', NULL, NULL, NULL, NULL, ''),
(4734, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4735, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4736, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4737, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4738, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4739, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4740, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4741, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4742, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4743, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4744, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4745, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4746, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4747, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4748, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4749, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4750, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4751, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4752, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4753, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4754, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4755, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4756, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4757, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4758, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4759, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4760, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4761, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4762, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4763, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4764, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4765, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4766, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4767, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4768, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4769, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4770, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4771, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4772, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4773, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4774, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4775, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4776, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4777, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4778, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4779, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4780, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4781, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4782, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4783, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4784, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4785, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4786, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4787, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4788, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4789, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4790, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4791, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(4792, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4793, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4794, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4795, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4796, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4797, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4798, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4799, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4800, 'Notes Details', '', '', NULL, NULL, NULL, NULL, ''),
(4801, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4802, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4803, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4804, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4805, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4806, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4807, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4808, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4809, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4810, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4811, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4812, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4813, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4814, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4815, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4816, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4817, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4818, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4819, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4820, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4821, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4822, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4823, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4824, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4825, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4826, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4827, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4828, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4829, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4830, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4831, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4832, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4833, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4834, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4835, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4836, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4837, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4838, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4839, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4840, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4841, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4842, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4843, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4844, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4845, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4846, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4847, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4848, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4849, 'Co-Ordinator - Dashboard', '', '', NULL, NULL, NULL, NULL, ''),
(4850, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4851, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4852, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4853, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4854, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4855, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4856, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4857, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4858, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4859, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4860, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4861, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4862, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4863, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4864, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4865, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4866, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4867, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4868, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4869, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4870, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4871, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4872, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4873, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4874, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4875, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4876, 'Notes of Lesson', '', '', NULL, NULL, NULL, NULL, ''),
(4877, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4878, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4879, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4880, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4881, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4882, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4883, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4884, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4885, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4886, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4887, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4888, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4889, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4890, 'Olympaid', '', '', NULL, NULL, NULL, NULL, ''),
(4891, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4892, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4893, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4894, 'Notes', '', '', NULL, NULL, NULL, NULL, '');
INSERT INTO `language` (`phrase_id`, `phrase`, `english`, `spanish`, `portuguse`, `hindi`, `french`, `serbian`, `arabic`) VALUES
(4895, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4896, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4897, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4898, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4899, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4900, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4901, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4902, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4903, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4904, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4905, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4906, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4907, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4908, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4909, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4910, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4911, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4912, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4913, 'Principal-Dashboard', '', '', NULL, NULL, NULL, NULL, ''),
(4914, 'principal-Dashboard', '', '', NULL, NULL, NULL, NULL, ''),
(4915, 'principal-Dashboard', '', '', NULL, NULL, NULL, NULL, ''),
(4916, 'principals', '', '', NULL, NULL, NULL, NULL, ''),
(4917, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4918, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4919, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4920, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4921, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4922, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4923, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4924, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4925, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4926, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4927, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4928, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4929, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4930, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4931, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4932, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4933, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4934, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4935, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4936, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4937, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4938, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4939, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4940, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4941, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4942, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4943, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4944, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4945, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4946, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4947, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4948, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4949, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4950, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4951, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4952, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4953, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4954, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4955, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4956, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4957, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4958, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4959, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4960, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4961, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4962, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4963, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4964, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4965, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4966, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4967, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4968, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4969, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4970, 'director-Dashboard', '', '', NULL, NULL, NULL, NULL, ''),
(4971, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4972, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4973, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4974, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4975, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4976, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4977, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4978, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4979, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4980, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4981, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4982, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4983, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4984, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4985, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4986, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4987, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4988, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4989, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4990, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4991, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4992, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4993, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4994, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4995, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4996, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4997, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4998, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(4999, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5000, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5001, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5002, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5003, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5004, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5005, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5006, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5007, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5008, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5009, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5010, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5011, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5012, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5013, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5014, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5015, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5016, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5017, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5018, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5019, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5020, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5021, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5022, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5023, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5024, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5025, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5026, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5027, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5028, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5029, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5030, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5031, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5032, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5033, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5034, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5035, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5036, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5037, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5038, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5039, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5040, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5041, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5042, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5043, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5044, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5045, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5046, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5047, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5048, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5049, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5050, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5051, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5052, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5053, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5054, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5055, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5056, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5057, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5058, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5059, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5060, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5061, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5062, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5063, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5064, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5065, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5066, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5067, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5068, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5069, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5070, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5071, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5072, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5073, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5074, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5075, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5076, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5077, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5078, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5079, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5080, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5081, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5082, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5083, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5084, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5085, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5086, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5087, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5088, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5089, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5090, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5091, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5092, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5093, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5094, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5095, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5096, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5097, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5098, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5099, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5100, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5101, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5102, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5103, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5104, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5105, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5106, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5107, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5108, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5109, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5110, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5111, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5112, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5113, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5114, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5115, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5116, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5117, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5118, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5119, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5120, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5121, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5122, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5123, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5124, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5125, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5126, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5127, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5128, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5129, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5130, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5131, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5132, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5133, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5134, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5135, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5136, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5137, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5138, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5139, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5140, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5141, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5142, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5143, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5144, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5145, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5146, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5147, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5148, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5149, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5150, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5151, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5152, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5153, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5154, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5155, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5156, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5157, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5158, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5159, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5160, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5161, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5162, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5163, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5164, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5165, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5166, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5167, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5168, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5169, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5170, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5171, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5172, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5173, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5174, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5175, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5176, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5177, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5178, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5179, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5180, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5181, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5182, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5183, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5184, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5185, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5186, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5187, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5188, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5189, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5190, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5191, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5192, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5193, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5194, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5195, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5196, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5197, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5198, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5199, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5200, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5201, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5202, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5203, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5204, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5205, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5206, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5207, 'course Name', '', '', NULL, NULL, NULL, NULL, ''),
(5208, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(5209, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(5210, 'Schools', '', '', NULL, NULL, NULL, NULL, ''),
(5211, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5212, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5213, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5214, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5215, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5216, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5217, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5218, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5219, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5220, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5221, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5222, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5223, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5224, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5225, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5226, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5227, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5228, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5229, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5230, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5231, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5232, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5233, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5234, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5235, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5236, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5237, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5238, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5239, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5240, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5241, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5242, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5243, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5244, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5245, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5246, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5247, 'ID', '', '', NULL, NULL, NULL, NULL, ''),
(5248, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5249, 'PLACE', '', '', NULL, NULL, NULL, NULL, ''),
(5250, 'PRINCIPAL', '', '', NULL, NULL, NULL, NULL, ''),
(5251, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5252, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5253, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5254, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5255, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5256, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5257, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5258, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5259, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5260, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5261, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5262, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5263, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5264, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5265, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5266, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5267, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5268, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5269, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5270, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5271, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5272, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5273, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5274, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5275, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5276, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5277, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5278, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5279, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5280, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5281, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5282, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5283, 'School', '', '', NULL, NULL, NULL, NULL, ''),
(5284, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5285, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5286, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5287, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5288, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5289, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5290, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5291, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5292, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5293, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5294, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5295, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5296, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5297, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5298, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5299, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5300, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5301, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5302, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5303, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5304, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5305, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5306, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5307, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5308, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5309, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5310, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5311, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5312, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5313, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5314, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5315, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5316, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5317, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5318, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5319, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5320, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5321, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5322, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5323, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5324, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5325, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5326, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5327, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5328, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5329, 'User', '', '', NULL, NULL, NULL, NULL, ''),
(5330, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5331, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5332, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5333, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5334, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5335, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5336, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5337, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5338, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5339, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5340, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5341, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5342, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5343, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5344, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5345, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5346, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5347, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5348, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5349, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5350, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5351, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5352, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5353, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5354, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5355, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5356, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5357, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5358, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5359, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5360, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5361, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5362, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5363, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5364, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5365, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5366, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5367, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5368, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5369, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5370, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5371, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5372, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5373, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5374, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5375, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5376, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5377, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5378, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5379, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5380, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5381, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5382, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5383, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5384, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5385, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5386, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5387, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5388, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5389, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5390, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5391, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5392, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5393, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5394, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5395, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5396, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5397, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5398, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5399, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5400, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5401, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5402, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5403, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5404, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5405, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5406, 'User Name', '', '', NULL, NULL, NULL, NULL, ''),
(5407, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5408, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5409, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5410, 'Pass word', '', '', NULL, NULL, NULL, NULL, ''),
(5411, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5412, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5413, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5414, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5415, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5416, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5417, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5418, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5419, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5420, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5421, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5422, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5423, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5424, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5425, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5426, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5427, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5428, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5429, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5430, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5431, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5432, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5433, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5434, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5435, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5436, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5437, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5438, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5439, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5440, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5441, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5442, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5443, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5444, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5445, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5446, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5447, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5448, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5449, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5450, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5451, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5452, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5453, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5454, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5455, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5456, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5457, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5458, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5459, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5460, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5461, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5462, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5463, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5464, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5465, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5466, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5467, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5468, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5469, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5470, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5471, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5472, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5473, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5474, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5475, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5476, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5477, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5478, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5479, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5480, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5481, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5482, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5483, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5484, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5485, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5486, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5487, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5488, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5489, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5490, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5491, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5492, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5493, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5494, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5495, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5496, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5497, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5498, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5499, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5500, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5501, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5502, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5503, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5504, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5505, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5506, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5507, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5508, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5509, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5510, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5511, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5512, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5513, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5514, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5515, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5516, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5517, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5518, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5519, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5520, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5521, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5522, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5523, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5524, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5525, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5526, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5527, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5528, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5529, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5530, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5531, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5532, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5533, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5534, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5535, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5536, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5537, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5538, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5539, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5540, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5541, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5542, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5543, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5544, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5545, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5546, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5547, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5548, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5549, 'principal', '', '', NULL, NULL, NULL, NULL, ''),
(5550, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5551, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5552, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5553, 'principal', '', '', NULL, NULL, NULL, NULL, ''),
(5554, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5555, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5556, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5557, 'principal', '', '', NULL, NULL, NULL, NULL, ''),
(5558, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5559, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5560, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5561, 'principal', '', '', NULL, NULL, NULL, NULL, ''),
(5562, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5563, 'principal', '', '', NULL, NULL, NULL, NULL, ''),
(5564, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5565, 'principal', '', '', NULL, NULL, NULL, NULL, ''),
(5566, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5567, 'principal', '', '', NULL, NULL, NULL, NULL, ''),
(5568, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5569, 'principal', '', '', NULL, NULL, NULL, NULL, ''),
(5570, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5571, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5572, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5573, 'principal', '', '', NULL, NULL, NULL, NULL, ''),
(5574, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5575, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5576, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5577, 'principal', '', '', NULL, NULL, NULL, NULL, ''),
(5578, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5579, 'principal', '', '', NULL, NULL, NULL, NULL, ''),
(5580, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5581, 'principal', '', '', NULL, NULL, NULL, NULL, ''),
(5582, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5583, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5584, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5585, 'principal', '', '', NULL, NULL, NULL, NULL, ''),
(5586, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5587, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5588, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5589, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5590, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5591, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5592, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5593, 'principal', '', '', NULL, NULL, NULL, NULL, ''),
(5594, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5595, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5596, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5597, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5598, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5599, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5600, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5601, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5602, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5603, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5604, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5605, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5606, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5607, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5608, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5609, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5610, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5611, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5612, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5613, 'Coordinator', '', '', NULL, NULL, NULL, NULL, ''),
(5614, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5615, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5616, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5617, 'coordinators', '', '', NULL, NULL, NULL, NULL, ''),
(5618, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5619, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5620, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5621, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5622, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5623, 'Compartment', '', '', NULL, NULL, NULL, NULL, ''),
(5624, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5625, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5626, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5627, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5628, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5629, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5630, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5631, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5632, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5633, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5634, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5635, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5636, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5637, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5638, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5639, 'Namea', '', '', NULL, NULL, NULL, NULL, ''),
(5640, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5641, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5642, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5643, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5644, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5645, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5646, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5647, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5648, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5649, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5650, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5651, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5652, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5653, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5654, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5655, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5656, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5657, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5658, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5659, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5660, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5661, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5662, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5663, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5664, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5665, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5666, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5667, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5668, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5669, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5670, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5671, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5672, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5673, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5674, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5675, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5676, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5677, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5678, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5679, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5680, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5681, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5682, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5683, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5684, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5685, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5686, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5687, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5688, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5689, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5690, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5691, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5692, 'coordinator', '', '', NULL, NULL, NULL, NULL, ''),
(5693, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5694, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5695, 'coordinator', '', '', NULL, NULL, NULL, NULL, ''),
(5696, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5697, 'coordinator', '', '', NULL, NULL, NULL, NULL, ''),
(5698, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5699, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5700, 'coordinator', '', '', NULL, NULL, NULL, NULL, ''),
(5701, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5702, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5703, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5704, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5705, 'coordinator', '', '', NULL, NULL, NULL, NULL, ''),
(5706, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5707, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5708, 'coordinator', '', '', NULL, NULL, NULL, NULL, ''),
(5709, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5710, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5711, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5712, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5713, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5714, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5715, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(5716, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5717, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(5718, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5719, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5720, 'principal', '', '', NULL, NULL, NULL, NULL, ''),
(5721, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5722, 'principal', '', '', NULL, NULL, NULL, NULL, ''),
(5723, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5724, 'principal', '', '', NULL, NULL, NULL, NULL, ''),
(5725, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5726, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5727, 'coordinator', '', '', NULL, NULL, NULL, NULL, ''),
(5728, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5729, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5730, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5731, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5732, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5733, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5734, 'coordinator', '', '', NULL, NULL, NULL, NULL, ''),
(5735, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5736, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5737, 'coordinator', '', '', NULL, NULL, NULL, NULL, ''),
(5738, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5739, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5740, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5741, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5742, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5743, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5744, 'coordinator', '', '', NULL, NULL, NULL, NULL, ''),
(5745, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5746, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5747, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5748, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5749, 'coordinator', '', '', NULL, NULL, NULL, NULL, ''),
(5750, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5751, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5752, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5753, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5754, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5755, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5756, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5757, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5758, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5759, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5760, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5761, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5762, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5763, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5764, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5765, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5766, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5767, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5768, 'coordinator', '', '', NULL, NULL, NULL, NULL, ''),
(5769, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5770, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5771, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5772, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5773, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5774, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5775, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5776, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5777, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5778, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5779, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5780, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5781, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5782, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5783, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5784, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5785, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5786, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5787, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5788, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5789, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5790, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5791, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5792, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5793, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5794, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5795, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5796, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5797, 'HOD', '', '', NULL, NULL, NULL, NULL, ''),
(5798, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5799, 'hods', '', '', NULL, NULL, NULL, NULL, ''),
(5800, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5801, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5802, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5803, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5804, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5805, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5806, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5807, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5808, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5809, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5810, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5811, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5812, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5813, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5814, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5815, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5816, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5817, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5818, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5819, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5820, 'hod', '', '', NULL, NULL, NULL, NULL, ''),
(5821, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5822, 'hod', '', '', NULL, NULL, NULL, NULL, ''),
(5823, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5824, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5825, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5826, 'hod', '', '', NULL, NULL, NULL, NULL, ''),
(5827, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5828, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5829, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5830, 'hod', '', '', NULL, NULL, NULL, NULL, ''),
(5831, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5832, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5833, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5834, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5835, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5836, 'hod', '', '', NULL, NULL, NULL, NULL, ''),
(5837, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5838, 'hod', '', '', NULL, NULL, NULL, NULL, ''),
(5839, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5840, 'hod', '', '', NULL, NULL, NULL, NULL, ''),
(5841, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5842, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5843, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5844, 'hod', '', '', NULL, NULL, NULL, NULL, ''),
(5845, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5846, 'hod', '', '', NULL, NULL, NULL, NULL, ''),
(5847, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5848, 'hod', '', '', NULL, NULL, NULL, NULL, ''),
(5849, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5850, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5851, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5852, 'hod', '', '', NULL, NULL, NULL, NULL, ''),
(5853, 'password', '', '', NULL, NULL, NULL, NULL, '');
INSERT INTO `language` (`phrase_id`, `phrase`, `english`, `spanish`, `portuguse`, `hindi`, `french`, `serbian`, `arabic`) VALUES
(5854, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(5855, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5856, 'hod', '', '', NULL, NULL, NULL, NULL, ''),
(5857, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5858, 'hod-Dashboard', '', '', NULL, NULL, NULL, NULL, ''),
(5859, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5860, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5861, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5862, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5863, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5864, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5865, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5866, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5867, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5868, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5869, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5870, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5871, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5872, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5873, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5874, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5875, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5876, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5877, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5878, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5879, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5880, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5881, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5882, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5883, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5884, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5885, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5886, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5887, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5888, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5889, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5890, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5891, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5892, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5893, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5894, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5895, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5896, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5897, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5898, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5899, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5900, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5901, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5902, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5903, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5904, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5905, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5906, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5907, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5908, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5909, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5910, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5911, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5912, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5913, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5914, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5915, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5916, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5917, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5918, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5919, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5920, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5921, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5922, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5923, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5924, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5925, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5926, 'coordinator', '', '', NULL, NULL, NULL, NULL, ''),
(5927, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5928, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5929, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5930, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5931, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5932, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5933, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5934, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5935, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5936, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5937, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5938, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5939, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5940, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5941, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5942, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5943, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5944, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5945, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5946, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5947, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5948, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5949, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(5950, 'coordinator', '', '', NULL, NULL, NULL, NULL, ''),
(5951, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(5952, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5953, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5954, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5955, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5956, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5957, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5958, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5959, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5960, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5961, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5962, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5963, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5964, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5965, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5966, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5967, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5968, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5969, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5970, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5971, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5972, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5973, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5974, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5975, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5976, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5977, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5978, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5979, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5980, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5981, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5982, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5983, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5984, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5985, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5986, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5987, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5988, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5989, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5990, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5991, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5992, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5993, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5994, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5995, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5996, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5997, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5998, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(5999, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6000, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6001, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6002, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6003, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6004, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6005, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6006, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6007, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6008, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6009, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6010, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6011, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6012, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6013, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6014, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6015, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6016, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6017, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6018, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6019, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6020, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6021, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6022, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6023, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6024, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6025, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6026, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6027, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6028, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6029, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6030, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6031, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6032, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6033, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6034, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6035, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6036, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6037, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6038, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6039, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6040, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6041, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6042, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6043, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6044, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6045, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6046, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6047, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6048, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6049, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6050, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6051, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6052, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6053, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6054, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6055, 'Approve', '', '', NULL, NULL, NULL, NULL, ''),
(6056, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6057, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6058, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6059, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6060, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6061, 'Approve Note', '', '', NULL, NULL, NULL, NULL, ''),
(6062, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6063, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6064, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6065, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6066, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6067, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6068, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6069, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6070, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6071, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6072, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6073, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6074, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6075, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6076, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6077, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6078, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6079, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6080, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6081, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6082, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6083, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6084, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6085, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6086, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6087, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6088, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6089, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6090, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6091, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6092, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6093, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6094, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6095, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6096, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6097, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6098, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6099, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6100, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6101, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6102, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6103, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6104, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6105, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6106, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6107, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6108, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6109, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6110, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6111, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6112, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6113, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6114, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6115, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6116, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6117, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6118, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6119, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6120, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6121, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6122, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6123, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6124, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6125, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6126, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6127, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6128, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6129, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6130, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6131, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6132, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6133, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6134, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6135, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6136, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6137, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6138, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6139, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6140, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6141, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6142, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6143, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6144, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6145, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6146, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6147, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6148, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6149, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6150, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6151, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6152, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6153, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6154, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6155, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6156, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6157, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6158, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6159, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6160, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6161, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6162, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6163, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6164, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6165, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6166, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6167, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6168, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6169, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6170, 'Academic-Report', '', '', NULL, NULL, NULL, NULL, ''),
(6171, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6172, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6173, 'Document-Type', '', '', NULL, NULL, NULL, NULL, ''),
(6174, 'Completed', '', '', NULL, NULL, NULL, NULL, ''),
(6175, 'School Name', '', '', NULL, NULL, NULL, NULL, ''),
(6176, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6177, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6178, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6179, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6180, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6181, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6182, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6183, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6184, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6185, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6186, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6187, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6188, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6189, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6190, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6191, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6192, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6193, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6194, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6195, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6196, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6197, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6198, 'coordinator', '', '', NULL, NULL, NULL, NULL, ''),
(6199, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(6200, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6201, 'coordinator', '', '', NULL, NULL, NULL, NULL, ''),
(6202, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(6203, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6204, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6205, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6206, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6207, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6208, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6209, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6210, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6211, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6212, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6213, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6214, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6215, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6216, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6217, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6218, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6219, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6220, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6221, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6222, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6223, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6224, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6225, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6226, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6227, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6228, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6229, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6230, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6231, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6232, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6233, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6234, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6235, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6236, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6237, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6238, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6239, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6240, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6241, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6242, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6243, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6244, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6245, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6246, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6247, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6248, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6249, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6250, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6251, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6252, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6253, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6254, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6255, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6256, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6257, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6258, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6259, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6260, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6261, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6262, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6263, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6264, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6265, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6266, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6267, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6268, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6269, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6270, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(6271, 'English', '', '', NULL, NULL, NULL, NULL, ''),
(6272, 'II-LAN - Hindi', '', '', NULL, NULL, NULL, NULL, ''),
(6273, 'II-LAN - Tamil', '', '', NULL, NULL, NULL, NULL, ''),
(6274, 'Maths', '', '', NULL, NULL, NULL, NULL, ''),
(6275, 'Scicence', '', '', NULL, NULL, NULL, NULL, ''),
(6276, 'Social', '', '', NULL, NULL, NULL, NULL, ''),
(6277, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(6278, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(6279, 'Course name', '', '', NULL, NULL, NULL, NULL, ''),
(6280, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6281, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6282, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6283, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6284, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6285, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6286, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6287, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6288, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6289, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6290, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6291, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6292, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6293, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6294, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6295, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6296, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6297, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6298, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6299, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6300, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6301, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6302, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6303, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6304, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6305, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6306, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6307, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6308, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6309, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6310, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6311, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6312, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6313, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6314, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6315, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6316, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6317, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6318, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6319, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6320, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6321, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6322, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6323, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6324, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6325, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6326, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6327, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6328, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6329, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6330, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6331, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6332, 'Not yet upload', '', '', NULL, NULL, NULL, NULL, ''),
(6333, 'Under Principal Review', '', '', NULL, NULL, NULL, NULL, ''),
(6334, 'Under Hod', '', '', NULL, NULL, NULL, NULL, ''),
(6335, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6336, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6337, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6338, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6339, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6340, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6341, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6342, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6343, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6344, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6345, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6346, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6347, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6348, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6349, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6350, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6351, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6352, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6353, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6354, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6355, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6356, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6357, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6358, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6359, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6360, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6361, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6362, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6363, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6364, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6365, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6366, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6367, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6368, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6369, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6370, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6371, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6372, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6373, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6374, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6375, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6376, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6377, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6378, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6379, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6380, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6381, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6382, 'School Report', '', '', NULL, NULL, NULL, NULL, ''),
(6383, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6384, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6385, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6386, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6387, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6388, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6389, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6390, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6391, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6392, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6393, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6394, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6395, '<?php echo $school[\"name\"].\",\".$school[\"place\"]; ?>', '', '', NULL, NULL, NULL, NULL, ''),
(6396, '<?php echo $school_name; ?>', '', '', NULL, NULL, NULL, NULL, ''),
(6397, 'VBC,Theni', '', '', NULL, NULL, NULL, NULL, ''),
(6398, 'vbc,Madurai', '', '', NULL, NULL, NULL, NULL, ''),
(6399, 'VBC,Veeraganoor', '', '', NULL, NULL, NULL, NULL, ''),
(6400, 'VBC-Theni', '', '', NULL, NULL, NULL, NULL, ''),
(6401, 'vbc-Madurai', '', '', NULL, NULL, NULL, NULL, ''),
(6402, 'VBC-Veeraganoor', '', '', NULL, NULL, NULL, NULL, ''),
(6403, 'common_user-Dashboard', '', '', NULL, NULL, NULL, NULL, ''),
(6404, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6405, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6406, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6407, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6408, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6409, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6410, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6411, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6412, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6413, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6414, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6415, 'Download materials', '', '', NULL, NULL, NULL, NULL, ''),
(6416, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6417, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6418, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6419, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6420, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6421, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6422, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6423, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6424, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6425, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6426, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6427, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6428, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6429, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6430, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6431, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6432, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6433, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6434, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6435, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6436, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6437, 'Reference Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6438, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6439, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6440, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6441, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6442, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6443, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6444, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6445, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6446, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6447, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6448, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6449, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6450, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6451, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6452, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6453, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6454, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6455, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6456, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6457, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6458, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6459, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6460, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6461, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6462, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6463, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6464, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6465, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6466, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6467, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6468, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6469, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6470, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6471, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6472, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6473, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6474, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6475, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6476, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6477, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6478, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6479, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6480, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6481, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6482, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6483, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6484, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6485, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6486, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6487, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6488, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6489, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6490, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6491, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6492, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6493, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6494, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6495, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6496, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6497, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6498, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6499, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6500, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6501, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6502, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6503, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6504, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6505, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6506, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6507, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6508, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6509, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6510, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6511, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6512, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6513, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6514, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6515, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6516, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6517, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6518, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6519, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6520, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6521, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6522, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6523, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6524, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6525, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6526, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6527, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6528, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6529, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6530, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6531, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6532, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6533, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6534, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6535, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6536, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6537, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6538, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6539, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6540, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6541, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6542, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6543, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6544, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6545, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6546, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6547, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6548, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6549, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6550, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6551, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6552, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6553, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6554, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6555, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6556, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6557, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6558, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6559, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6560, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6561, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6562, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6563, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6564, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6565, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6566, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6567, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6568, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6569, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6570, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6571, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6572, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6573, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6574, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6575, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6576, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6577, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6578, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6579, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6580, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6581, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6582, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6583, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6584, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6585, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6586, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6587, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6588, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6589, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6590, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6591, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6592, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6593, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6594, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6595, 'Reference Name', '', '', NULL, NULL, NULL, NULL, ''),
(6596, 'Reference Materials', '', '', NULL, NULL, NULL, NULL, ''),
(6597, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6598, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6599, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6600, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6601, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6602, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6603, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6604, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(6605, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(6606, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6607, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(6608, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6609, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(6610, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(6611, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6612, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(6613, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6614, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(6615, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(6616, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6617, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(6618, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6619, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(6620, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(6621, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6622, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(6623, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6624, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(6625, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(6626, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6627, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(6628, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6629, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(6630, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(6631, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6632, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(6633, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6634, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(6635, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(6636, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6637, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(6638, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6639, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(6640, 'Dashboarddddd', '', '', NULL, NULL, NULL, NULL, ''),
(6641, 'schools123', '', '', NULL, NULL, NULL, NULL, ''),
(6642, 'Schoolsssss', '', '', NULL, NULL, NULL, NULL, ''),
(6643, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6644, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(6645, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6646, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(6647, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6648, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(6649, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6650, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(6651, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6652, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(6653, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6654, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(6655, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6656, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(6657, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6658, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(6659, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6660, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(6661, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6662, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(6663, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6664, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(6665, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6666, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(6667, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6668, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(6669, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6670, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(6671, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6672, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(6673, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6674, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(6675, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6676, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(6677, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6678, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6679, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6680, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6681, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6682, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6683, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6684, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6685, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6686, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6687, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6688, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6689, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6690, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6691, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6692, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6693, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6694, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6695, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6696, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6697, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6698, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6699, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6700, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6701, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6702, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6703, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6704, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6705, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6706, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6707, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6708, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6709, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6710, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6711, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6712, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6713, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6714, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6715, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6716, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6717, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6718, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6719, 'hod', '', '', NULL, NULL, NULL, NULL, ''),
(6720, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(6721, 'hod', '', '', NULL, NULL, NULL, NULL, ''),
(6722, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(6723, 'hod', '', '', NULL, NULL, NULL, NULL, ''),
(6724, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(6725, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6726, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6727, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6728, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6729, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6730, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6731, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6732, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6733, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6734, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6735, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6736, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6737, 'hod', '', '', NULL, NULL, NULL, NULL, ''),
(6738, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(6739, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6740, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6741, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6742, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6743, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6744, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6745, 'hod', '', '', NULL, NULL, NULL, NULL, ''),
(6746, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(6747, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6748, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(6749, 'schools', '', '', NULL, NULL, NULL, NULL, ''),
(6750, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6751, 'Place', '', '', NULL, NULL, NULL, NULL, ''),
(6752, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6753, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6754, 'hod', '', '', NULL, NULL, NULL, NULL, ''),
(6755, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(6756, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6757, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6758, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6759, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6760, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6761, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6762, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6763, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6764, 'Principal', '', '', NULL, NULL, NULL, NULL, ''),
(6765, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6766, 'principal', '', '', NULL, NULL, NULL, NULL, ''),
(6767, 'password', '', '', NULL, NULL, NULL, NULL, ''),
(6768, 'NAME', '', '', NULL, NULL, NULL, NULL, ''),
(6769, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6770, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6771, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6772, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6773, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6774, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6775, 'Notes', '', '', NULL, NULL, NULL, NULL, ''),
(6776, 'Notes', '', '', NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `libreria`
--

CREATE TABLE `libreria` (
  `libro_id` int(11) NOT NULL,
  `libro_code` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `uploader_type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `uploader_id` int(11) NOT NULL,
  `year` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file_name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `nombre` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `autor` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `mark_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `mark_obtained` int(11) NOT NULL DEFAULT '0',
  `mark_total` int(11) NOT NULL DEFAULT '100',
  `comment` longtext COLLATE utf8_unicode_ci,
  `year` longtext COLLATE utf8_unicode_ci NOT NULL,
  `labuno` int(11) NOT NULL DEFAULT '0',
  `labdos` int(11) NOT NULL DEFAULT '0',
  `labtres` int(11) NOT NULL DEFAULT '0',
  `labcuatro` int(11) NOT NULL DEFAULT '0',
  `labcinco` int(11) NOT NULL DEFAULT '0',
  `labseis` int(11) NOT NULL DEFAULT '0',
  `labsiete` int(11) NOT NULL DEFAULT '0',
  `labocho` int(11) NOT NULL DEFAULT '0',
  `labnueve` int(11) NOT NULL DEFAULT '0',
  `labtotal` int(11) NOT NULL DEFAULT '0',
  `final` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`mark_id`, `student_id`, `subject_id`, `class_id`, `section_id`, `exam_id`, `mark_obtained`, `mark_total`, `comment`, `year`, `labuno`, `labdos`, `labtres`, `labcuatro`, `labcinco`, `labseis`, `labsiete`, `labocho`, `labnueve`, `labtotal`, `final`) VALUES
(1, 1, 1, 1, 38, 1, 10, 100, 'A+', '2016-2017', 1, 0, 10, 10, 10, 10, 10, 0, 5, 66, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mensaje_reporte`
--

CREATE TABLE `mensaje_reporte` (
  `news_message_id` int(11) NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `news_id` int(11) NOT NULL,
  `date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `message_file_name` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `message_id` int(11) NOT NULL,
  `message_thread_code` longtext NOT NULL,
  `message` longtext NOT NULL,
  `sender` longtext NOT NULL,
  `timestamp` longtext NOT NULL,
  `read_status` int(11) NOT NULL DEFAULT '0' COMMENT '0 unread 1 read'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `message_thread_code`, `message`, `sender`, `timestamp`, `read_status`) VALUES
(65, '3130e4eafbbf2a2', 'hi<br>', 'teacher-27', '1525250831', 0),
(66, '27dc1b5fa20c185', 'She is mischievous in the class<br>', 'teacher-1', '1525332010', 1),
(67, '1bbea05a9eff0c3', 'Do the h/w without fail<br>', 'teacher-1', '1525332057', 0),
(68, '27dc1b5fa20c185', 'ok mam i ll take care<br>', 'parent-31', '1525332182', 0),
(69, '5675a36f78d3346', 'ASP<br>', 'parent-31', '1525332207', 1),
(70, '172b905e54901bb', 'hi sir<br>', 'parent-32', '1525332316', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message_thread`
--

CREATE TABLE `message_thread` (
  `message_thread_id` int(11) NOT NULL,
  `message_thread_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sender` longtext COLLATE utf8_unicode_ci NOT NULL,
  `reciever` longtext COLLATE utf8_unicode_ci NOT NULL,
  `last_message_timestamp` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `message_thread`
--

INSERT INTO `message_thread` (`message_thread_id`, `message_thread_code`, `sender`, `reciever`, `last_message_timestamp`) VALUES
(30, '3130e4eafbbf2a2', 'teacher-27', 'parent-28', ''),
(31, '27dc1b5fa20c185', 'teacher-1', 'parent-31', ''),
(32, '1bbea05a9eff0c3', 'teacher-1', 'student-1', ''),
(33, '5675a36f78d3346', 'parent-31', 'admin-1', ''),
(34, '172b905e54901bb', 'parent-32', 'admin-1', '');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `news_status` int(11) NOT NULL DEFAULT '1' COMMENT '1 for running, 0 for archived'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `news_code`, `title`, `description`, `news_status`) VALUES
(44, '3b65af07f1', 'Week end activity', 'sample', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news_teacher`
--

CREATE TABLE `news_teacher` (
  `notice_id` int(11) NOT NULL,
  `notice_code` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `notice_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notice_message`
--

CREATE TABLE `notice_message` (
  `notice_message_id` int(11) NOT NULL,
  `message` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `notice_id` int(11) NOT NULL,
  `date` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `message_file_name` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `online_exam`
--

CREATE TABLE `online_exam` (
  `exam_id` bigint(20) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `class_id` bigint(20) DEFAULT NULL,
  `subject_ids` text,
  `maximum_attempts` int(11) DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `exam_date` date DEFAULT NULL,
  `mark_type` int(11) DEFAULT NULL,
  `pass_percentage` float DEFAULT NULL,
  `correct_score` float DEFAULT NULL,
  `incorrect_score` float DEFAULT NULL,
  `random_question` int(11) DEFAULT NULL,
  `ispublish` int(11) DEFAULT NULL,
  `status` bigint(20) DEFAULT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  `qids` text,
  `noq` int(11) DEFAULT NULL,
  `question_selection` int(11) DEFAULT NULL,
  `start_date` int(11) DEFAULT NULL,
  `end_date` int(11) DEFAULT NULL,
  `ip_address` text,
  `view_answer` int(11) DEFAULT NULL,
  `camera_req` int(11) DEFAULT NULL,
  `gen_certificate` int(11) DEFAULT NULL,
  `certificate_text` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_exam`
--

INSERT INTO `online_exam` (`exam_id`, `name`, `class_id`, `subject_ids`, `maximum_attempts`, `duration`, `exam_date`, `mark_type`, `pass_percentage`, `correct_score`, `incorrect_score`, `random_question`, `ispublish`, `status`, `group_id`, `qids`, `noq`, `question_selection`, `start_date`, `end_date`, `ip_address`, `view_answer`, `camera_req`, `gen_certificate`, `certificate_text`) VALUES
(1, 'Test 1 neet', 12, '7,8,10', 10, 180, '2019-04-10', 1, 33, 1, 0.5, NULL, 1, NULL, 4, '46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,90,91,92,93,94,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180', 179, 0, 1554787535, 1557379535, '123-526-896-356', 1, NULL, NULL, NULL),
(2, 'test 1 IIT', 12, '4,8,9', 1, 120, '2019-04-10', 1, 33, 1, 0.5, NULL, 1, NULL, 5, '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45', 45, 0, 1554787697, 1557379697, '123-526-896-356', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `online_exam_questions`
--

CREATE TABLE `online_exam_questions` (
  `exam_question_id` bigint(20) NOT NULL,
  `exam_id` bigint(20) DEFAULT NULL,
  `question_id` bigint(20) DEFAULT NULL,
  `topic_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `title` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `expense_category_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `payment_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `method` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `amount` longtext COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL,
  `year` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `poa`
--

CREATE TABLE `poa` (
  `id_poa` int(11) NOT NULL,
  `titulo` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `nombre_archivo` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tipo_archivo` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poa`
--

INSERT INTO `poa` (`id_poa`, `titulo`, `descripcion`, `nombre_archivo`, `tipo_archivo`, `timestamp`) VALUES
(1, 'Solar System', 'worksheet', '1-sample_download.pdf', 'pdf', '1525903200');

-- --------------------------------------------------------

--
-- Table structure for table `principal`
--

CREATE TABLE `principal` (
  `principal_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password_text` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `username` longtext COLLATE utf8_unicode_ci NOT NULL,
  `school_id` int(11) NOT NULL,
  `acd_year_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `principal`
--

INSERT INTO `principal` (`principal_id`, `name`, `email`, `password`, `password_text`, `phone`, `address`, `username`, `school_id`, `acd_year_id`) VALUES
(1, 'Sakthivel Murugan', '', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', '123123123', '', '', 'sakthi', 2, 1),
(2, 'Mrs.Selvi', '', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', '123123123', '', '', 'selvi', 1, 1),
(4, 'Mr.Chandra Sekar', '', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', '123123123', '', '', 'sekar', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `qb_id` bigint(11) NOT NULL,
  `question` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `option1` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `option2` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `option3` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `option4` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `correctanswer` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `marks` int(11) NOT NULL,
  `status` bigint(20) DEFAULT NULL,
  `level` bigint(20) DEFAULT NULL,
  `question_order` bigint(20) DEFAULT NULL,
  `upload_flag` int(11) DEFAULT NULL,
  `answer_type` bigint(20) DEFAULT NULL,
  `is_qbulk` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `qb_id`, `question`, `option1`, `option2`, `option3`, `option4`, `correctanswer`, `marks`, `status`, `level`, `question_order`, `upload_flag`, `answer_type`, `is_qbulk`) VALUES
(1, 1, '1.jpg', '', '', '', '', '3', 0, 1, 1, 1, NULL, 1, 1),
(2, 1, '2.jpg', '', '', '', '', '3', 0, 1, 1, 1, NULL, 1, 1),
(3, 1, '3.jpg', '', '', '', '', '3', 0, 1, 1, 1, NULL, 1, 1),
(4, 1, '4.jpg', '', '', '', '', '3', 0, 1, 1, 1, NULL, 1, 1),
(5, 1, '5.jpg', '', '', '', '', '3', 0, 1, 1, 1, NULL, 1, 1),
(6, 1, '6.jpg', '', '', '', '', '1', 0, 1, 1, 2, NULL, 1, 1),
(7, 1, '7.jpg', '', '', '', '', '1', 0, 1, 1, 2, NULL, 1, 1),
(8, 1, '8.jpg', '', '', '', '', '1', 0, 1, 1, 2, NULL, 1, 1),
(9, 1, '9.jpg', '', '', '', '', '2', 0, 1, 1, 3, NULL, 1, 1),
(10, 1, '10.jpg', '', '', '', '', '2', 0, 1, 1, 3, NULL, 1, 1),
(11, 1, '11.jpg', '', '', '', '', '2', 0, 1, 1, 3, NULL, 1, 1),
(12, 1, '12.jpg', '', '', '', '', '2', 0, 1, 1, 3, NULL, 1, 1),
(13, 1, '13.jpg', '', '', '', '', '2', 0, 1, 1, 3, NULL, 1, 1),
(14, 1, '14.jpg', '', '', '', '', '2', 0, 1, 1, 3, NULL, 1, 1),
(15, 1, '15.jpg', '', '', '', '', '2', 0, 1, 1, 3, NULL, 1, 1),
(16, 1, '16.jpg', '', '', '', '', '4', 0, 1, 1, 4, NULL, 1, 1),
(17, 1, '17.jpg', '', '', '', '', '4', 0, 1, 1, 4, NULL, 1, 1),
(18, 1, '18.jpg', '', '', '', '', '4', 0, 1, 1, 4, NULL, 1, 1),
(19, 1, '19.jpg', '', '', '', '', '4', 0, 1, 1, 4, NULL, 1, 1),
(20, 1, '20.jpg', '', '', '', '', '4', 0, 1, 1, 4, NULL, 1, 1),
(21, 1, '21.jpg', '', '', '', '', '4', 0, 1, 1, 5, NULL, 1, 1),
(22, 1, '22.jpg', '', '', '', '', '4', 0, 1, 1, 5, NULL, 1, 1),
(23, 1, '23.jpg', '', '', '', '', '4', 0, 1, 1, 5, NULL, 1, 1),
(24, 1, '24.jpg', '', '', '', '', '3', 0, 1, 1, 6, NULL, 1, 1),
(25, 1, '25.jpg', '', '', '', '', '3', 0, 1, 1, 6, NULL, 1, 1),
(26, 1, '26.jpg', '', '', '', '', '3', 0, 1, 1, 6, NULL, 1, 1),
(27, 1, '27.jpg', '', '', '', '', '3', 0, 1, 1, 6, NULL, 1, 1),
(28, 1, '28.jpg', '', '', '', '', '3', 0, 1, 1, 6, NULL, 1, 1),
(29, 1, '29.jpg', '', '', '', '', '3', 0, 1, 1, 6, NULL, 1, 1),
(30, 1, '30.jpg', '', '', '', '', '3', 0, 1, 1, 6, NULL, 1, 1),
(31, 1, '31.jpg', '', '', '', '', '1', 0, 1, 1, 7, NULL, 1, 1),
(32, 1, '32.jpg', '', '', '', '', '1', 0, 1, 1, 7, NULL, 1, 1),
(33, 1, '33.jpg', '', '', '', '', '1', 0, 1, 1, 7, NULL, 1, 1),
(34, 1, '34.jpg', '', '', '', '', '1', 0, 1, 1, 7, NULL, 1, 1),
(35, 1, '35.jpg', '', '', '', '', '1', 0, 1, 1, 7, NULL, 1, 1),
(36, 1, '36.jpg', '', '', '', '', '1', 0, 1, 1, 7, NULL, 1, 1),
(37, 1, '37.jpg', '', '', '', '', '1', 0, 1, 1, 7, NULL, 1, 1),
(38, 1, '38.jpg', '', '', '', '', '2', 0, 1, 1, 8, NULL, 1, 1),
(39, 1, '39.jpg', '', '', '', '', '2', 0, 1, 1, 8, NULL, 1, 1),
(40, 1, '40.jpg', '', '', '', '', '2', 0, 1, 1, 8, NULL, 1, 1),
(41, 1, '41.jpg', '', '', '', '', '4', 0, 1, 1, 9, NULL, 1, 1),
(42, 1, '42.jpg', '', '', '', '', '4', 0, 1, 1, 9, NULL, 1, 1),
(43, 1, '43.jpg', '', '', '', '', '1', 0, 1, 1, 10, NULL, 1, 1),
(44, 1, '44.jpg', '', '', '', '', '1', 0, 1, 1, 10, NULL, 1, 1),
(45, 1, '45.jpg', '', '', '', '', '2', 0, 1, 1, 11, NULL, 1, 1),
(46, 2, '46.jpg', '', '', '', '', '2', 0, 1, 1, 12, NULL, 1, 1),
(47, 2, '47.jpg', '', '', '', '', '2', 0, 1, 1, 12, NULL, 1, 1),
(48, 2, '48.jpg', '', '', '', '', '2', 0, 1, 1, 12, NULL, 1, 1),
(49, 2, '49.jpg', '', '', '', '', '2', 0, 1, 1, 12, NULL, 1, 1),
(50, 2, '50.jpg', '', '', '', '', '2', 0, 1, 1, 12, NULL, 1, 1),
(51, 2, '51.jpg', '', '', '', '', '2', 0, 1, 1, 12, NULL, 1, 1),
(52, 2, '52.jpg', '', '', '', '', '2', 0, 1, 1, 12, NULL, 1, 1),
(53, 2, '53.jpg', '', '', '', '', '2', 0, 1, 1, 12, NULL, 1, 1),
(54, 2, '54.jpg', '', '', '', '', '2', 0, 1, 1, 12, NULL, 1, 1),
(55, 2, '55.jpg', '', '', '', '', '2', 0, 1, 1, 12, NULL, 1, 1),
(56, 2, '56.jpg', '', '', '', '', '2', 0, 1, 1, 12, NULL, 1, 1),
(57, 2, '57.jpg', '', '', '', '', '2', 0, 1, 1, 12, NULL, 1, 1),
(58, 2, '58.jpg', '', '', '', '', '2', 0, 1, 1, 12, NULL, 1, 1),
(59, 2, '59.jpg', '', '', '', '', '2', 0, 1, 1, 12, NULL, 1, 1),
(60, 2, '60.jpg', '', '', '', '', '2', 0, 1, 1, 12, NULL, 1, 1),
(61, 2, '61.jpg', '', '', '', '', '1', 0, 1, 1, 13, NULL, 1, 1),
(62, 2, '62.jpg', '', '', '', '', '1', 0, 1, 1, 13, NULL, 1, 1),
(63, 2, '63.jpg', '', '', '', '', '1', 0, 1, 1, 13, NULL, 1, 1),
(64, 2, '64.jpg', '', '', '', '', '1', 0, 1, 1, 13, NULL, 1, 1),
(65, 2, '65.jpg', '', '', '', '', '1', 0, 1, 1, 13, NULL, 1, 1),
(66, 2, '66.jpg', '', '', '', '', '1', 0, 1, 1, 13, NULL, 1, 1),
(67, 2, '67.jpg', '', '', '', '', '1', 0, 1, 1, 13, NULL, 1, 1),
(68, 2, '68.jpg', '', '', '', '', '1', 0, 1, 1, 13, NULL, 1, 1),
(69, 2, '69.jpg', '', '', '', '', '4', 0, 1, 1, 14, NULL, 1, 1),
(70, 2, '70.jpg', '', '', '', '', '4', 0, 1, 1, 14, NULL, 1, 1),
(71, 2, '71.jpg', '', '', '', '', '4', 0, 1, 1, 14, NULL, 1, 1),
(72, 2, '72.jpg', '', '', '', '', '4', 0, 1, 1, 14, NULL, 1, 1),
(73, 2, '73.jpg', '', '', '', '', '4', 0, 1, 1, 14, NULL, 1, 1),
(74, 2, '74.jpg', '', '', '', '', '4', 0, 1, 1, 14, NULL, 1, 1),
(75, 2, '75.jpg', '', '', '', '', '4', 0, 1, 1, 14, NULL, 1, 1),
(76, 2, '76.jpg', '', '', '', '', '4', 0, 1, 1, 14, NULL, 1, 1),
(77, 2, '77.jpg', '', '', '', '', '3', 0, 1, 1, 15, NULL, 1, 1),
(78, 2, '78.jpg', '', '', '', '', '3', 0, 1, 1, 15, NULL, 1, 1),
(79, 2, '79.jpg', '', '', '', '', '3', 0, 1, 1, 15, NULL, 1, 1),
(80, 2, '80.jpg', '', '', '', '', '3', 0, 1, 1, 15, NULL, 1, 1),
(81, 2, '81.jpg', '', '', '', '', '3', 0, 1, 1, 15, NULL, 1, 1),
(82, 2, '82.jpg', '', '', '', '', '3', 0, 1, 1, 15, NULL, 1, 1),
(83, 2, '83.jpg', '', '', '', '', '3', 0, 1, 1, 15, NULL, 1, 1),
(84, 2, '84.jpg', '', '', '', '', '3', 0, 1, 1, 15, NULL, 1, 1),
(85, 2, '85.jpg', '', '', '', '', '3', 0, 1, 1, 15, NULL, 1, 1),
(86, 2, '86.jpg', '', '', '', '', '3', 0, 1, 1, 15, NULL, 1, 1),
(87, 2, '87.jpg', '', '', '', '', '3', 0, 1, 1, 15, NULL, 1, 1),
(88, 2, '88.jpg', '', '', '', '', '3', 0, 1, 1, 15, NULL, 1, 1),
(89, 2, '89.jpg', '', '', '', '', '1', 0, 1, 1, 16, NULL, 1, 1),
(90, 3, '90.jpg', '', '', '', '', '2', 0, 1, 1, 17, NULL, 1, 1),
(91, 3, '91.jpg', '', '', '', '', '2', 0, 1, 1, 17, NULL, 1, 1),
(92, 3, '92.jpg', '', '', '', '', '2', 0, 1, 1, 17, NULL, 1, 1),
(93, 3, '93.jpg', '', '', '', '', '2', 0, 1, 1, 17, NULL, 1, 1),
(94, 3, '94.jpg', '', '', '', '', '2', 0, 1, 1, 17, NULL, 1, 1),
(95, 3, '95.jpg', '', '', '', '', '2', 0, 1, 1, 17, NULL, 1, 1),
(96, 3, '96.jpg', '', '', '', '', '2', 0, 1, 1, 17, NULL, 1, 1),
(97, 3, '97.jpg', '', '', '', '', '2', 0, 1, 1, 17, NULL, 1, 1),
(98, 3, '98.jpg', '', '', '', '', '2', 0, 1, 1, 17, NULL, 1, 1),
(99, 3, '99.jpg', '', '', '', '', '2', 0, 1, 1, 17, NULL, 1, 1),
(100, 3, '100.jpg', '', '', '', '', '2', 0, 1, 1, 17, NULL, 1, 1),
(101, 3, '101.jpg', '', '', '', '', '2', 0, 1, 1, 17, NULL, 1, 1),
(102, 3, '102.jpg', '', '', '', '', '2', 0, 1, 1, 17, NULL, 1, 1),
(103, 3, '103.jpg', '', '', '', '', '2', 0, 1, 1, 17, NULL, 1, 1),
(104, 3, '104.jpg', '', '', '', '', '2', 0, 1, 1, 17, NULL, 1, 1),
(105, 3, '105.jpg', '', '', '', '', '2', 0, 1, 1, 17, NULL, 1, 1),
(106, 3, '106.jpg', '', '', '', '', '2', 0, 1, 1, 17, NULL, 1, 1),
(107, 3, '107.jpg', '', '', '', '', '2', 0, 1, 1, 17, NULL, 1, 1),
(108, 3, '108.jpg', '', '', '', '', '2', 0, 1, 1, 17, NULL, 1, 1),
(109, 3, '109.jpg', '', '', '', '', '2', 0, 1, 1, 17, NULL, 1, 1),
(110, 3, '110.jpg', '', '', '', '', '2', 0, 1, 1, 18, NULL, 1, 1),
(111, 3, '111.jpg', '', '', '', '', '2', 0, 1, 1, 18, NULL, 1, 1),
(112, 3, '112.jpg', '', '', '', '', '2', 0, 1, 1, 18, NULL, 1, 1),
(113, 3, '113.jpg', '', '', '', '', '3', 0, 1, 1, 19, NULL, 1, 1),
(114, 3, '114.jpg', '', '', '', '', '3', 0, 1, 1, 19, NULL, 1, 1),
(115, 3, '115.jpg', '', '', '', '', '3', 0, 1, 1, 19, NULL, 1, 1),
(116, 3, '116.jpg', '', '', '', '', '3', 0, 1, 1, 19, NULL, 1, 1),
(117, 3, '117.jpg', '', '', '', '', '3', 0, 1, 1, 19, NULL, 1, 1),
(118, 3, '118.jpg', '', '', '', '', '3', 0, 1, 1, 19, NULL, 1, 1),
(119, 3, '119.jpg', '', '', '', '', '3', 0, 1, 1, 19, NULL, 1, 1),
(120, 3, '120.jpg', '', '', '', '', '3', 0, 1, 1, 19, NULL, 1, 1),
(121, 3, '121.jpg', '', '', '', '', '3', 0, 1, 1, 19, NULL, 1, 1),
(122, 3, '122.jpg', '', '', '', '', '3', 0, 1, 1, 19, NULL, 1, 1),
(123, 3, '123.jpg', '', '', '', '', '3', 0, 1, 1, 19, NULL, 1, 1),
(124, 3, '124.jpg', '', '', '', '', '3', 0, 1, 1, 19, NULL, 1, 1),
(125, 3, '125.jpg', '', '', '', '', '3', 0, 1, 1, 19, NULL, 1, 1),
(126, 3, '126.jpg', '', '', '', '', '3', 0, 1, 1, 19, NULL, 1, 1),
(127, 3, '127.jpg', '', '', '', '', '3', 0, 1, 1, 19, NULL, 1, 1),
(128, 3, '128.jpg', '', '', '', '', '3', 0, 1, 1, 19, NULL, 1, 1),
(129, 3, '129.jpg', '', '', '', '', '3', 0, 1, 1, 19, NULL, 1, 1),
(130, 3, '130.jpg', '', '', '', '', '3', 0, 1, 1, 20, NULL, 1, 1),
(131, 3, '131.jpg', '', '', '', '', '3', 0, 1, 1, 20, NULL, 1, 1),
(132, 3, '132.jpg', '', '', '', '', '3', 0, 1, 1, 20, NULL, 1, 1),
(133, 3, '133.jpg', '', '', '', '', '3', 0, 1, 1, 20, NULL, 1, 1),
(134, 3, '134.jpg', '', '', '', '', '3', 0, 1, 1, 20, NULL, 1, 1),
(135, 3, '135.jpg', '', '', '', '', '3', 0, 1, 1, 20, NULL, 1, 1),
(136, 3, '136.jpg', '', '', '', '', '3', 0, 1, 1, 20, NULL, 1, 1),
(137, 3, '137.jpg', '', '', '', '', '3', 0, 1, 1, 20, NULL, 1, 1),
(138, 3, '138.jpg', '', '', '', '', '3', 0, 1, 1, 20, NULL, 1, 1),
(139, 3, '139.jpg', '', '', '', '', '4', 0, 1, 1, 21, NULL, 1, 1),
(140, 3, '140.jpg', '', '', '', '', '4', 0, 1, 1, 21, NULL, 1, 1),
(141, 3, '141.jpg', '', '', '', '', '4', 0, 1, 1, 21, NULL, 1, 1),
(142, 3, '142.jpg', '', '', '', '', '4', 0, 1, 1, 21, NULL, 1, 1),
(143, 3, '143.jpg', '', '', '', '', '4', 0, 1, 1, 21, NULL, 1, 1),
(144, 3, '144.jpg', '', '', '', '', '4', 0, 1, 1, 21, NULL, 1, 1),
(145, 3, '145.jpg', '', '', '', '', '4', 0, 1, 1, 21, NULL, 1, 1),
(146, 3, '146.jpg', '', '', '', '', '4', 0, 1, 1, 21, NULL, 1, 1),
(147, 3, '147.jpg', '', '', '', '', '4', 0, 1, 1, 21, NULL, 1, 1),
(148, 3, '148.jpg', '', '', '', '', '4', 0, 1, 1, 21, NULL, 1, 1),
(149, 3, '149.jpg', '', '', '', '', '4', 0, 1, 1, 21, NULL, 1, 1),
(150, 3, '150.jpg', '', '', '', '', '4', 0, 1, 1, 21, NULL, 1, 1),
(151, 3, '151.jpg', '', '', '', '', '4', 0, 1, 1, 21, NULL, 1, 1),
(152, 3, '152.jpg', '', '', '', '', '4', 0, 1, 1, 21, NULL, 1, 1),
(153, 3, '153.jpg', '', '', '', '', '4', 0, 1, 1, 21, NULL, 1, 1),
(154, 3, '154.jpg', '', '', '', '', '4', 0, 1, 1, 21, NULL, 1, 1),
(155, 3, '155.jpg', '', '', '', '', '4', 0, 1, 1, 21, NULL, 1, 1),
(156, 3, '156.jpg', '', '', '', '', '4', 0, 1, 1, 21, NULL, 1, 1),
(157, 3, '157.jpg', '', '', '', '', '2', 0, 1, 1, 21, NULL, 1, 1),
(158, 3, '158.jpg', '', '', '', '', '4', 0, 1, 1, 21, NULL, 1, 1),
(160, 3, '160.jpg', '', '', '', '', '4', 0, 1, 1, 22, NULL, 1, 1),
(161, 3, '161.jpg', '', '', '', '', '4', 0, 1, 1, 22, NULL, 1, 1),
(162, 3, '162.jpg', '', '', '', '', '4', 0, 1, 1, 22, NULL, 1, 1),
(163, 3, '163.jpg', '', '', '', '', '4', 0, 1, 1, 22, NULL, 1, 1),
(164, 3, '164.jpg', '', '', '', '', '1', 0, 1, 1, 23, NULL, 1, 1),
(165, 3, '165.jpg', '', '', '', '', '1', 0, 1, 1, 23, NULL, 1, 1),
(166, 3, '166.jpg', '', '', '', '', '1', 0, 1, 1, 23, NULL, 1, 1),
(167, 3, '167.jpg', '', '', '', '', '1', 0, 1, 1, 23, NULL, 1, 1),
(168, 3, '168.jpg', '', '', '', '', '1', 0, 1, 1, 23, NULL, 1, 1),
(169, 3, '169.jpg', '', '', '', '', '1', 0, 1, 1, 23, NULL, 1, 1),
(170, 3, '170.jpg', '', '', '', '', '1', 0, 1, 1, 23, NULL, 1, 1),
(171, 3, '171.jpg', '', '', '', '', '1', 0, 1, 1, 23, NULL, 1, 1),
(172, 3, '172.jpg', '', '', '', '', '1', 0, 1, 1, 23, NULL, 1, 1),
(173, 3, '173.jpg', '', '', '', '', '1', 0, 1, 1, 23, NULL, 1, 1),
(174, 3, '174.jpg', '', '', '', '', '1', 0, 1, 1, 23, NULL, 1, 1),
(175, 3, '175.jpg', '', '', '', '', '1', 0, 1, 1, 23, NULL, 1, 1),
(176, 3, '176.jpg', '', '', '', '', '1', 0, 1, 1, 23, NULL, 1, 1),
(177, 3, '177.jpg', '', '', '', '', '1', 0, 1, 1, 23, NULL, 1, 1),
(178, 3, '178.jpg', '', '', '', '', '1', 0, 1, 1, 23, NULL, 1, 1),
(179, 3, '179.jpg', '', '', '', '', '1', 0, 1, 1, 23, NULL, 1, 1),
(180, 3, '180.jpg', '', '', '', '', '1', 0, 1, 1, 23, NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question_bank`
--

CREATE TABLE `question_bank` (
  `qb_id` bigint(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `sub_topic_id` int(11) DEFAULT NULL,
  `question_type_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_bank`
--

INSERT INTO `question_bank` (`qb_id`, `name`, `sub_topic_id`, `question_type_id`, `status`) VALUES
(1, 'set_29march19', 22, 1, 1),
(2, 'mock test 1', 23, 1, 1),
(3, 'set1', 24, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question_level`
--

CREATE TABLE `question_level` (
  `level_id` bigint(20) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `active_flag` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_level`
--

INSERT INTO `question_level` (`level_id`, `name`, `active_flag`) VALUES
(1, 'HOT', NULL),
(2, 'LOW', NULL),
(4, 'Medium', NULL),
(5, 'Hard', NULL),
(7, 'easy', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `question_type`
--

CREATE TABLE `question_type` (
  `type_id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `active_flag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_type`
--

INSERT INTO `question_type` (`type_id`, `name`, `active_flag`) VALUES
(1, 'Objective Type', NULL),
(2, 'Descriptive Type', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_question`
--

CREATE TABLE `quiz_question` (
  `question_id` bigint(20) NOT NULL,
  `question` text,
  `qb_id` bigint(20) DEFAULT NULL,
  `option1` text,
  `option2` text,
  `option3` text,
  `option4` text,
  `answer_type` int(11) DEFAULT NULL,
  `answers` text,
  `flag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reference_notes`
--

CREATE TABLE `reference_notes` (
  `notes_id` bigint(20) NOT NULL,
  `hod_id` bigint(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `class_id` bigint(20) NOT NULL,
  `date` date NOT NULL,
  `acd_year_id` int(11) NOT NULL,
  `open_flag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reference_notes`
--

INSERT INTO `reference_notes` (`notes_id`, `hod_id`, `name`, `status`, `class_id`, `date`, `acd_year_id`, `open_flag`) VALUES
(12, 1, 'quiz', 4, 5, '2018-08-14', 5, 1),
(13, 1, 'Quiz123', 4, 4, '2018-08-16', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reporte_alumnos`
--

CREATE TABLE `reporte_alumnos` (
  `report_id` int(11) NOT NULL,
  `title` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `report_code` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `priority` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `timestamp` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reporte_mensaje`
--

CREATE TABLE `reporte_mensaje` (
  `report_message_id` int(11) NOT NULL,
  `report_code` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `file` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sender_type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sender_id` int(11) NOT NULL,
  `timestamp` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `request_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `start_date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `end_date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '0 = pending, 1 = accepted, 2 = rejected',
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`request_id`, `teacher_id`, `start_date`, `end_date`, `status`, `description`, `title`) VALUES
(1, 1, '04-05-2018', '05-05-2018', 0, 'sanple', 'Sick leave'),
(2, 1, '17-05-2018', '17-05-2018', 2, 'sample', 'CL');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `rid` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `result_status` varchar(100) NOT NULL DEFAULT 'Open',
  `start_time` int(11) NOT NULL,
  `end_time` int(11) NOT NULL,
  `categories` text NOT NULL,
  `category_range` text NOT NULL,
  `r_qids` text NOT NULL,
  `individual_time` text NOT NULL,
  `total_time` int(11) NOT NULL DEFAULT '0',
  `score_obtained` float NOT NULL DEFAULT '0',
  `percentage_obtained` float NOT NULL DEFAULT '0',
  `attempted_ip` varchar(100) NOT NULL,
  `score_individual` text NOT NULL,
  `photo` varchar(100) NOT NULL,
  `manual_valuation` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `school_id` bigint(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `place` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `name`, `status`, `place`) VALUES
(1, 'VBC', 1, 'Theni'),
(2, 'vbc', 1, 'Madurai'),
(3, 'VBC', 1, 'Veeraganoor');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `name`, `class_id`, `teacher_id`) VALUES
(34, 'A', 23, NULL),
(36, 'A', 2, NULL),
(37, 'A', 3, NULL),
(38, 'A', 1, 2),
(39, 'B', 1, 1),
(40, 'A', 4, NULL),
(41, 'A', 5, NULL),
(42, 'A', 1, NULL),
(43, 'A', 2, NULL),
(44, 'A', 3, NULL),
(45, 'A', 4, NULL),
(46, 'A', 5, NULL),
(47, 'A', 6, NULL),
(48, 'A', 7, NULL),
(49, 'A', 8, NULL),
(50, 'A', 9, NULL),
(51, 'A', 10, NULL),
(52, 'A', 11, NULL),
(53, 'A', 12, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `settings_id` int(11) NOT NULL,
  `type` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`settings_id`, `type`, `description`) VALUES
(1, 'system_name', 'Velstools'),
(2, 'system_title', 'Velstools'),
(3, 'address', 'Velammal Educational Trust'),
(4, 'phone', '360-428-3840'),
(5, 'paypal_email', 'admin@admin.com'),
(6, 'currency', '$'),
(7, 'system_email', 'admin@admin.com'),
(20, 'rtl', ''),
(11, 'language', 'english'),
(13, 'minimark', '50'),
(15, 'ad', ''),
(16, 'skin_colour', 'blue'),
(18, 'domain', 'google.com'),
(21, 'running_year', '2016-2017'),
(22, 'facebook_url', 'https://www.facebook.com/'),
(23, 'twitter_url', 'https://www.twitter.com/'),
(24, 'google_url', 'https://www.google.com/'),
(25, 'instagram_url', 'https://instagram.com/'),
(26, 'linkedin_url', 'https://www.linkedin.com/'),
(27, 'pinterest_url', 'https://pinterest.com/'),
(28, 'dribbble_url', 'https://dribbble.com/'),
(29, 'youtube_url', 'https://youtube.com/');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `adm_no` int(11) DEFAULT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birthday` date DEFAULT NULL,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `student_session` int(11) NOT NULL DEFAULT '1',
  `username` longtext COLLATE utf8_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` bigint(20) DEFAULT NULL,
  `adm_class` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `adm_no`, `name`, `birthday`, `sex`, `address`, `phone`, `email`, `password`, `parent_id`, `student_session`, `username`, `dob`, `gender`, `adm_class`, `group_id`) VALUES
(1, 20194002, 'abinayas', NULL, '', '', '', '', 'bbc90f009ae594064035d7ebda7d584b', NULL, 1, 'abinayas', NULL, NULL, 12, 4),
(2, 20194004, 'asharanim', NULL, '', '', '', '', 'c3cb3fd7e6e00b7de76455bc9d9ed839', NULL, 1, 'asharanim', NULL, NULL, 12, 4),
(3, 20194006, 'bhuvanshreeb', NULL, '', '', '', '', '5901b1eb162d2b290a5ee4922cb23c6e', NULL, 1, 'bhuvanshreeb', NULL, NULL, 12, 4),
(4, 20194008, 'devadharshinic', NULL, '', '', '', '', 'e8e6ef0bb66d0bb412c911e48fed18e3', NULL, 1, 'devadharshinic', NULL, NULL, 12, 4),
(5, 20194010, 'ishwarya', NULL, '', '', '', '', '3abded9b36ea08f17b17fc60a6268531', NULL, 1, 'ishwarya', NULL, NULL, 12, 4),
(6, 20194012, 'jeyavarshneee', NULL, '', '', '', '', '281a218382e41735683f23febb66a9a6', NULL, 1, 'jeyavarshneee', NULL, NULL, 12, 4),
(7, 20194014, 'koushikas', NULL, '', '', '', '', '3506c0948eb3087c5d9327d1a3abe036', NULL, 1, 'koushikas', NULL, NULL, 12, 4),
(8, 20194016, 'nivethinia', NULL, '', '', '', '', '22ab2c8920433bc0f056041499a5410c', NULL, 1, 'nivethinia', NULL, NULL, 12, 4),
(9, 20194018, 'priyadharshinim', NULL, '', '', '', '', '5a0ef43b225a4be5de8bf295ddd82ce2', NULL, 1, 'priyadharshinim', NULL, NULL, 12, 4),
(10, 20194020, 'rosinir', NULL, '', '', '', '', '48b48d3e91dc1bd50eba91863ea8ce35', NULL, 1, 'rosinir', NULL, NULL, 12, 4),
(11, 20194022, 'swethar', NULL, '', '', '', '', 'f700921325811b41f17fd8e87cc394de', NULL, 1, 'swethar', NULL, NULL, 12, 4),
(12, 20194024, 'yogeswari', NULL, '', '', '', '', '32eff5c60f731572ce5525c786fad84d', NULL, 1, 'yogeswari', NULL, NULL, 12, 4),
(13, 20194026, 'elanchezhiyans', NULL, '', '', '', '', 'c15e7f022d4e09d5ddde139657d1346e', NULL, 1, 'elanchezhiyans', NULL, NULL, 12, 4),
(14, 20194028, 'kaniskarr', NULL, '', '', '', '', 'd1ea37888badccc4ff25f19917551e47', NULL, 1, 'kaniskarr', NULL, NULL, 12, 4),
(15, 20194030, 'thangapraveeng', NULL, '', '', '', '', '5669e52a3b810ac8b567702c038fd752', NULL, 1, 'thangapraveeng', NULL, NULL, 12, 4),
(16, 20194032, 'deeksha.r', NULL, '', '', '', '', 'ae73073aa7a0e809a74f5f7c3e99d9cd', NULL, 1, 'deeksha.r', NULL, NULL, 12, 4),
(17, 20194034, 'hrithika', NULL, '', '', '', '', '3c053910e8dbae874b12a7440dddc0f5', NULL, 1, 'hrithika', NULL, NULL, 12, 4),
(18, 20194036, 'jananid', NULL, '', '', '', '', 'd162b3840b4755517f417f109e65dce0', NULL, 1, 'jananid', NULL, NULL, 12, 4),
(19, 20194038, 'nagasri', NULL, '', '', '', '', '0b27a5d45c1529c5ed8dc7793a4b564d', NULL, 1, 'nagasri', NULL, NULL, 12, 4),
(20, 20194040, 'pandimeenakschi', NULL, '', '', '', '', '63076ff4f9c6305567d9f14ff36df896', NULL, 1, 'pandimeenakschi', NULL, NULL, 12, 4),
(21, 20194042, 'renukasri.p', NULL, '', '', '', '', '56033203245c5c07b1d9f6144753183b', NULL, 1, 'renukasri.p', NULL, NULL, 12, 4),
(22, 20194044, 'shruthishivanis', NULL, '', '', '', '', '25e1967e2190f9764e294512c3341ea3', NULL, 1, 'shruthishivanis', NULL, NULL, 12, 4),
(23, 20194046, 'tamilselvi.s', NULL, '', '', '', '', 'ef26884ea0f75f5cb8912f186f27aec8', NULL, 1, 'tamilselvi.s', NULL, NULL, 12, 4),
(24, 20194048, 'akash.m', NULL, '', '', '', '', '7e8bb181d10ce61ba0b4ee04a500e8e9', NULL, 1, 'akash.m', NULL, NULL, 12, 4),
(25, 20194050, 'aswin.j.v', NULL, '', '', '', '', '26821186f6c85278ffab0af5f36099f3', NULL, 1, 'aswin.j.v', NULL, NULL, 12, 4),
(26, 20194052, 'hemanthsivas.m', NULL, '', '', '', '', '838ce86390f39f2e57bf480e1b501f7b', NULL, 1, 'hemanthsivas.m', NULL, NULL, 12, 4),
(27, 20194054, 'kishoreananth.n', NULL, '', '', '', '', '1e16a9e162f4b68c0364e1bcfefdbe5f', NULL, 1, 'kishoreananth.n', NULL, NULL, 12, 4),
(28, 20194056, 'mohanakannan.g', NULL, '', '', '', '', 'e55d8109f7fd7c312e1c3d91e72c5141', NULL, 1, 'mohanakannan.g', NULL, NULL, 12, 4),
(29, 20194058, 'nithishnarayn.k', NULL, '', '', '', '', 'ab65fbc8c9c54f2ceda3ce381b3ba223', NULL, 1, 'nithishnarayn.k', NULL, NULL, 12, 4),
(30, 20194060, 'prabhakar', NULL, '', '', '', '', '64770ef9d54cbba49fe84b0235fe3414', NULL, 1, 'prabhakar', NULL, NULL, 12, 4),
(31, 20194062, 'sakthiponsriramn', NULL, '', '', '', '', '55cbc47be656e24a69d7003970603177', NULL, 1, 'sakthiponsriramn', NULL, NULL, 12, 4),
(32, 20194064, 'sathyamohan.p', NULL, '', '', '', '', 'df78cbdb8de598eea02602ffdb129dcb', NULL, 1, 'sathyamohan.p', NULL, NULL, 12, 4),
(33, 20194066, 'tilak.p', NULL, '', '', '', '', '38bfcb78ed357031ede0f8ed59c9da8f', NULL, 1, 'tilak.p', NULL, NULL, 12, 4),
(34, 20194068, 'anbarasant', NULL, '', '', '', '', '635833fc1bbcafd0d7e73a5cf1416fca', NULL, 1, 'anbarasant', NULL, NULL, 12, 4),
(35, 20194070, 'jananishree.s', NULL, '', '', '', '', '3adf2543edc46511930488913648fdaa', NULL, 1, 'jananishree.s', NULL, NULL, 12, 4),
(36, 20194072, 'ashini.n.r', NULL, '', '', '', '', '859275c67f6c75b1d30aa53284be1916', NULL, 1, 'ashini.n.r', NULL, NULL, 12, 4),
(37, 20194074, 'harikrishna', NULL, '', '', '', '', 'fba1e6c30a3d697655e86fb318b4beee', NULL, 1, 'harikrishna', NULL, NULL, 12, 4),
(38, 20194076, 'nishas', NULL, '', '', '', '', 'f031f83c919b515dc211756417186ed4', NULL, 1, 'nishas', NULL, NULL, 12, 4),
(39, 20194078, 'chellarajathi.a', NULL, '', '', '', '', 'fd4c82f4597329e27e58a73dd414ab21', NULL, 1, 'chellarajathi.a', NULL, NULL, 12, 4),
(40, 20194080, 'hariprashanthr', NULL, '', '', '', '', '53a954729bb5b008554280532a7f358b', NULL, 1, 'hariprashanthr', NULL, NULL, 12, 4),
(41, 20194082, 'dharunchakravarthy.', NULL, '', '', '', '', '571dda11a1081faae80ed6e228b9a7ce', NULL, 1, 'dharunchakravarthy.', NULL, NULL, 12, 4),
(42, 20194084, 'jaiganeshm', NULL, '', '', '', '', '18d395e758ee8220466c4431eea46827', NULL, 1, 'jaiganeshm', NULL, NULL, 12, 4),
(43, 20194086, 'snowsha.m', NULL, '', '', '', '', '542ac7c7fb1d0eebe5eb0baaa05b0ccc', NULL, 1, 'snowsha.m', NULL, NULL, 12, 4),
(44, 20194088, 'sibi', NULL, '', '', '', '', '0f3a677e691c6253dce1f8d9745c887b', NULL, 1, 'sibi', NULL, NULL, 12, 4),
(45, 20194090, 'nandakishore', NULL, '', '', '', '', 'e85228ee121cd3bd3b6fa02adcd46f51', NULL, 1, 'nandakishore', NULL, NULL, 12, 4),
(46, 20194092, 'rahulrajag', NULL, '', '', '', '', '87c5952d9bb905a59add291c1ed21f39', NULL, 1, 'rahulrajag', NULL, NULL, 12, 4),
(47, 20194094, 'yashikaa', NULL, '', '', '', '', 'e59f7924f34db6c83197ace439dc797f', NULL, 1, 'yashikaa', NULL, NULL, 12, 4),
(48, 20194096, 'nithishkumars', NULL, '', '', '', '', '253e210a1b99674d01e9f84c8e37acea', NULL, 1, 'nithishkumars', NULL, NULL, 12, 4),
(49, 20194098, 'mivinganesh.v', NULL, '', '', '', '', '6ec6f55e6dfa12bd3f2d7bebfb1a8dc0', NULL, 1, 'mivinganesh.v', NULL, NULL, 12, 4),
(50, 201940100, 'leghashree.s', NULL, '', '', '', '', '730d09a5be82e67b785ddc57929eff26', NULL, 1, 'leghashree.s', NULL, NULL, 12, 4),
(51, 201940102, 'sanmathit', NULL, '', '', '', '', 'ab01d35bdbcbf4ad321fdc79ad0233bc', NULL, 1, 'sanmathit', NULL, NULL, 12, 4),
(52, 201940104, 'thrisali.s', NULL, '', '', '', '', '87eae0a6b619d128da1092784996008b', NULL, 1, 'thrisali.s', NULL, NULL, 12, 4),
(53, 201940106, 'ragavani.r', NULL, '', '', '', '', '981a66b6d280df6d54bc35d2feced0cf', NULL, 1, 'ragavani.r', NULL, NULL, 12, 4),
(54, 201940108, 'akashselvin', NULL, '', '', '', '', 'cb864a5c040b6c45e463af7ae3814c11', NULL, 1, 'akashselvin', NULL, NULL, 12, 4),
(55, 201940110, 'vaishali', NULL, '', '', '', '', 'b207a4db4d1b521cef7f7eec5507616b', NULL, 1, 'vaishali', NULL, NULL, 12, 4),
(56, 201940112, 'nivethitham', NULL, '', '', '', '', 'ee23bfcfa330fc4c6f3b572604ba3584', NULL, 1, 'nivethitham', NULL, NULL, 12, 4),
(57, 201940114, 'juwairiya.a', NULL, '', '', '', '', 'b4fe240fb10164c0e287b6c8be12632d', NULL, 1, 'juwairiya.a', NULL, NULL, 12, 4),
(58, 201940116, 'mohamedriyazpeer', NULL, '', '', '', '', 'be34bd305d9c5713daf4063190404b98', NULL, 1, 'mohamedriyazpeer', NULL, NULL, 12, 4),
(59, 201940118, 'ragasudha', NULL, '', '', '', '', '148f9e23703265638c25ceed1a17ac36', NULL, 1, 'ragasudha', NULL, NULL, 12, 4),
(60, 201940120, 'naveenkarthicks', NULL, '', '', '', '', '7d76bdf73d742fbd75376cf61ebdfeba', NULL, 1, 'naveenkarthicks', NULL, NULL, 12, 4),
(61, 201940122, 'lasya.s.m', NULL, '', '', '', '', 'f4d7e50b12f32b7d539320da65be70a7', NULL, 1, 'lasya.s.m', NULL, NULL, 12, 4),
(62, 201940124, 'varshanithyashree', NULL, '', '', '', '', '28cbefd04723a1688f9fbbdf9d6a1945', NULL, 1, 'varshanithyashree', NULL, NULL, 12, 4),
(63, 201940126, 'badhriyyam', NULL, '', '', '', '', '7ac2fb4461c9c1c5ec4b0751c539f0a1', NULL, 1, 'badhriyyam', NULL, NULL, 12, 4),
(64, 201940128, 'jebasilva', NULL, '', '', '', '', '2899946b69f69bc1f9f6c63e2f70f708', NULL, 1, 'jebasilva', NULL, NULL, 12, 4),
(65, 201940130, 'nagul.d', NULL, '', '', '', '', '547d0c5d5abe7314d83ebf8ce4c25f5f', NULL, 1, 'nagul.d', NULL, NULL, 12, 4),
(66, 201940132, 'snekhaa', NULL, '', '', '', '', '2bd9dea3cebcb037b5619c685c1a36c5', NULL, 1, 'snekhaa', NULL, NULL, 12, 4),
(67, 201940134, 'snehavathyj', NULL, '', '', '', '', 'e0da68d30344e96d566f8bf30571c329', NULL, 1, 'snehavathyj', NULL, NULL, 12, 4),
(68, 201940136, 'keerthanaa', NULL, '', '', '', '', '97ac1be1eda51da449f13785f643581b', NULL, 1, 'keerthanaa', NULL, NULL, 12, 4),
(69, 201940138, 'ashwinsriram', NULL, '', '', '', '', '93c8a3ebf53683dd485eb60c38694adb', NULL, 1, 'ashwinsriram', NULL, NULL, 12, 4),
(70, 201940140, 'sivabalan', NULL, '', '', '', '', '3e05660fc3f228eaca8afb51191c42f5', NULL, 1, 'sivabalan', NULL, NULL, 12, 4),
(71, 201940142, 'leebitha', NULL, '', '', '', '', '6c17292a03ee47a1e21aaaac6a15c856', NULL, 1, 'leebitha', NULL, NULL, 12, 4),
(72, 201940144, 'rajithar', NULL, '', '', '', '', '1ed081dfab52689cb710f3d8c0484be3', NULL, 1, 'rajithar', NULL, NULL, 12, 4),
(73, 201940146, 'jeyaprabhavathig', NULL, '', '', '', '', '72e10606d44d604f179210b7affdefcf', NULL, 1, 'jeyaprabhavathig', NULL, NULL, 12, 4),
(74, 201940148, 'manoranjani', NULL, '', '', '', '', '6ee6d2b92ef375097f6be91d4f57e9bf', NULL, 1, 'manoranjani', NULL, NULL, 12, 4),
(75, 201940150, 'aroswebeltroy', NULL, '', '', '', '', '92322a638cf7bd77e08a1e0b820b2a0d', NULL, 1, 'aroswebeltroy', NULL, NULL, 12, 4),
(76, 201940152, 'vanthanasp', NULL, '', '', '', '', 'e04cb876a5d7019c9c402c245d0715b6', NULL, 1, 'vanthanasp', NULL, NULL, 12, 4),
(77, 201940154, 'syedsulaiman', NULL, '', '', '', '', '6d7eeec6c25710276441ed3191c7fbd5', NULL, 1, 'syedsulaiman', NULL, NULL, 12, 4),
(78, 201940156, 'deepikab', NULL, '', '', '', '', 'a05ce08b1e98c9ae0c417053c0e1f64d', NULL, 1, 'deepikab', NULL, NULL, 12, 4),
(79, 201940158, 'kanithkumar', NULL, '', '', '', '', 'b5ac2531959bdac5c427fbe8ab91af47', NULL, 1, 'kanithkumar', NULL, NULL, 12, 4),
(80, 201940160, 'madhubalas', NULL, '', '', '', '', 'e892e387989629fff72c9f7ebbf8ad18', NULL, 1, 'madhubalas', NULL, NULL, 12, 4),
(81, 201940162, 'logeshwarana', NULL, '', '', '', '', '0891f7ddeaed90b5f958d5d6f010541b', NULL, 1, 'logeshwarana', NULL, NULL, 12, 4),
(82, 201940164, 'vaishnavim', NULL, '', '', '', '', '2a5483e1a682bcad86533909ad4a8b49', NULL, 1, 'vaishnavim', NULL, NULL, 12, 4),
(83, 201940166, 'saranya', NULL, '', '', '', '', '6172ed3d9495cacb0b529e07b887e55c', NULL, 1, 'saranya', NULL, NULL, 12, 4),
(84, 201940168, 'lonarudhran', NULL, '', '', '', '', 'f97ecb0745b924d527ae835eea4a0aca', NULL, 1, 'lonarudhran', NULL, NULL, 12, 4),
(85, 201940170, 'joyprasanna', NULL, '', '', '', '', '6633ed97ebc93e3f8c17ced72cd738ff', NULL, 1, 'joyprasanna', NULL, NULL, 12, 4),
(86, 201940172, 'rsurya', NULL, '', '', '', '', '202da3580979d60b3b2857f5fc558789', NULL, 1, 'rsurya', NULL, NULL, 12, 4),
(87, 201940174, 'svsriadhithya', NULL, '', '', '', '', 'af5c548639f567b8d3f58dbbc273cec9', NULL, 1, 'svsriadhithya', NULL, NULL, 12, 4),
(88, 201940176, 'sharini', NULL, '', '', '', '', '0c9bbadf66a981b9f74d22211501fd21', NULL, 1, 'sharini', NULL, NULL, 12, 4),
(89, 201940178, 'sabarivenkatk', NULL, '', '', '', '', '60a5e4903bf4342eabda407ac9a778ff', NULL, 1, 'sabarivenkatk', NULL, NULL, 12, 4),
(90, 201940180, 'kkishorekumar', NULL, '', '', '', '', 'e81f3aca9ec70a666b461d6c0d6499f6', NULL, 1, 'kkishorekumar', NULL, NULL, 12, 4),
(91, 201940182, 'mashwan', NULL, '', '', '', '', 'c4b5f7394eed62a5cb080fc6ec298d31', NULL, 1, 'mashwan', NULL, NULL, 12, 4),
(92, 201940184, 'akilanm', NULL, '', '', '', '', '6b409a74d3ad7652c32efecc1a9466d4', NULL, 1, 'akilanm', NULL, NULL, 12, 4),
(93, 201940186, 'sesanb', NULL, '', '', '', '', '9ded8da26cc89cc419870fa125fdf4dd', NULL, 1, 'sesanb', NULL, NULL, 12, 4),
(94, 201940188, 'sibhikrishnak', NULL, '', '', '', '', 'b5c0463a97449dcef3afba65768fdd28', NULL, 1, 'sibhikrishnak', NULL, NULL, 12, 4),
(95, 201940190, 'vinodkumarm', NULL, '', '', '', '', '5f092ab4f7820d1a8610e7429d58de95', NULL, 1, 'vinodkumarm', NULL, NULL, 12, 4),
(96, 201940192, 'harishprasanna', NULL, '', '', '', '', 'aff76caca36582298f6632370df214b3', NULL, 1, 'harishprasanna', NULL, NULL, 12, 4),
(97, 201940194, 'mhariprasana', NULL, '', '', '', '', '9fac23caa16c01e769ee38520a5fb6be', NULL, 1, 'mhariprasana', NULL, NULL, 12, 4),
(98, 201940196, 'promothrajarajeshvar', NULL, '', '', '', '', '11808828a5acf6b5bb9e172f34ca5b4b', NULL, 1, 'promothrajarajeshvar', NULL, NULL, 12, 4),
(99, 201940198, 'gohuls', NULL, '', '', '', '', '15c2f93e48d80d661bea59300e2857d2', NULL, 1, 'gohuls', NULL, NULL, 12, 4),
(100, 201940200, 'jsowbackiyalakshmi', NULL, '', '', '', '', '714e4423986926330f90d91766444975', NULL, 1, 'jsowbackiyalakshmi', NULL, NULL, 12, 4),
(101, 201940202, 'kanupriyadharshini', NULL, '', '', '', '', '02dfb1456aec0d0117af1562724e8e37', NULL, 1, 'kanupriyadharshini', NULL, NULL, 12, 4),
(102, 201940204, 'kshobena', NULL, '', '', '', '', '2a8eba831084ce6a96af0adfe063dca9', NULL, 1, 'kshobena', NULL, NULL, 12, 4),
(103, 201940206, 'sivapooranim', NULL, '', '', '', '', '8206d68efe5aea7d16c41c3c90c6bc41', NULL, 1, 'sivapooranim', NULL, NULL, 12, 4),
(104, 201940208, 'jananic', NULL, '', '', '', '', 'f85a796a6b0d84610f006e69eefae12a', NULL, 1, 'jananic', NULL, NULL, 12, 4),
(105, 201940210, 'harishmar', NULL, '', '', '', '', '780950296c353cd523315198022e6a5f', NULL, 1, 'harishmar', NULL, NULL, 12, 4),
(106, 201940212, 'veeramuthuvinothnini', NULL, '', '', '', '', '3014bcaf11f041fd5a7661e701f2a8e9', NULL, 1, 'veeramuthuvinothnini', NULL, NULL, 12, 4),
(107, 201940214, 'yugeshm', NULL, '', '', '', '', 'febac9255c743276fce41af2e4f7eb57', NULL, 1, 'yugeshm', NULL, NULL, 12, 4),
(108, 201940216, 'dharmam', NULL, '', '', '', '', '8dcfea7d5ab62637dbd361ff2b4d3f74', NULL, 1, 'dharmam', NULL, NULL, 12, 4),
(109, 201940218, 'kiruthikrampp', NULL, '', '', '', '', 'fdb4142810221a412ed3051b317ec239', NULL, 1, 'kiruthikrampp', NULL, NULL, 12, 4),
(110, 201940220, 'himaswadhanthrar', NULL, '', '', '', '', '396f96f1d35105048db2613c133fae7a', NULL, 1, 'himaswadhanthrar', NULL, NULL, 12, 4),
(111, 201940222, 'thriksha', NULL, '', '', '', '', '3d5fbcab6921063e91c40bb13b47de02', NULL, 1, 'thriksha', NULL, NULL, 12, 4),
(112, 20195002, 'adithyanarayanm', NULL, '', '', '', '', '450915a8d227985b773090e9088388cb', NULL, 1, 'adithyanarayanm', NULL, NULL, 12, 5),
(113, 20195004, 'arjuneramkumarm', NULL, '', '', '', '', '39819601f43455e63efc3abe7eb73370', NULL, 1, 'arjuneramkumarm', NULL, NULL, 12, 5),
(114, 20195006, 'balajivaasanv', NULL, '', '', '', '', 'c0511c6ffa2c74b1eeae412091d54e86', NULL, 1, 'balajivaasanv', NULL, NULL, 12, 5),
(115, 20195008, 'dineshkumarp', NULL, '', '', '', '', 'eaf397a83a313ffb07f541481c6f046c', NULL, 1, 'dineshkumarp', NULL, NULL, 12, 5),
(116, 20195010, 'jaisibis', NULL, '', '', '', '', '93d87582c6d38ceaf50c54fa88487330', NULL, 1, 'jaisibis', NULL, NULL, 12, 5),
(117, 20195012, 'krishnasuruthim', NULL, '', '', '', '', '7a2549a1b28f8df6d31d46e2ca66c4e0', NULL, 1, 'krishnasuruthim', NULL, NULL, 12, 5),
(118, 20195014, 'mohamedrifaia', NULL, '', '', '', '', 'ed254388984c5598fb5e8dfe1ad8cb3b', NULL, 1, 'mohamedrifaia', NULL, NULL, 12, 5),
(119, 20195016, 'nareshkumare', NULL, '', '', '', '', 'abbe3891a80dc4f288e4c9d106270d42', NULL, 1, 'nareshkumare', NULL, NULL, 12, 5),
(120, 20195018, 'nethirannt', NULL, '', '', '', '', '5f0774c1941c6a02505e754dc13abf8d', NULL, 1, 'nethirannt', NULL, NULL, 12, 5),
(121, 20195020, 'samjonathd', NULL, '', '', '', '', 'e0329bd36fc98e22e22b824fbad40d37', NULL, 1, 'samjonathd', NULL, NULL, 12, 5),
(122, 20195022, 'sivadharsanb', NULL, '', '', '', '', '1b2ca4b3837ac428e57900bdedda363e', NULL, 1, 'sivadharsanb', NULL, NULL, 12, 5),
(123, 20195024, 'venkataharshavardhanr', NULL, '', '', '', '', '724813618d8c39650b18e76a503d4c96', NULL, 1, 'venkataharshavardhanr', NULL, NULL, 12, 5),
(126, 2019400225, 'sample_student', NULL, '', '', '', '', '77cb1d678c4ef9e5d607cd3527749706', NULL, 1, 'sample_student', '2019-04-09', 2, 12, 4);

-- --------------------------------------------------------

--
-- Table structure for table `students_request`
--

CREATE TABLE `students_request` (
  `request_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `start_date` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `end_date` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_exam`
--

CREATE TABLE `student_exam` (
  `exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `starttime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `endtime` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `correctlyanswered` int(11) NOT NULL DEFAULT '0',
  `status` enum('completed','inprogress') CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'inprogress',
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_group`
--

CREATE TABLE `student_group` (
  `group_id` bigint(20) NOT NULL,
  `name` text,
  `short_name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_group`
--

INSERT INTO `student_group` (`group_id`, `name`, `short_name`) VALUES
(1, 'XI NEET ', 'NEETXIT'),
(3, 'XI IIT', 'IIT11'),
(4, 'XII NEET', 'NEET12'),
(5, 'XII IIT', 'IIT12');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `qb_flag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `name`, `qb_flag`) VALUES
(1, 'English', 0),
(2, 'Tamil', 0),
(3, 'II-LAN -HINDI', 0),
(4, 'Maths', 0),
(7, 'Chemistry', 0),
(8, 'Physics', 0),
(9, 'Computer Science', 0),
(10, 'Biology', 0),
(11, 'Zoology', 0),
(12, 'Botany', 0),
(13, 'Business Maths', 0),
(14, 'social', 0),
(15, 'science', 0),
(16, 'Economic', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_topic`
--

CREATE TABLE `sub_topic` (
  `sub_topic_id` int(11) NOT NULL,
  `name` longtext,
  `topic_id` bigint(20) DEFAULT NULL,
  `teacher_id` bigint(20) DEFAULT NULL,
  `acd_year_id` int(11) DEFAULT NULL,
  `qb_flag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_topic`
--

INSERT INTO `sub_topic` (`sub_topic_id`, `name`, `topic_id`, `teacher_id`, `acd_year_id`, `qb_flag`) VALUES
(1, 'Cells', 10, NULL, NULL, NULL),
(3, 'Operating System ', 9, NULL, NULL, NULL),
(9, 'vfdss', 4, NULL, NULL, NULL),
(11, 'jk', 1, NULL, NULL, NULL),
(12, 'Function of operating system', 3, NULL, NULL, NULL),
(13, 'Types of OS', 3, NULL, NULL, NULL),
(14, 'Word Processing', 5, NULL, NULL, NULL),
(15, 'xxx', 6, NULL, NULL, NULL),
(16, 'Lexical Unit', 9, NULL, NULL, NULL),
(17, 'ipo', 5, NULL, NULL, NULL),
(18, 'overall', 11, NULL, NULL, NULL),
(19, 'overall_test', 12, NULL, NULL, NULL),
(20, 'topic1', 14, NULL, NULL, NULL),
(21, 'overall', 3, NULL, NULL, NULL),
(22, 'basic', 17, NULL, NULL, NULL),
(23, 'overall', 18, NULL, NULL, NULL),
(24, 'full portion', 19, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `title` longtext COLLATE utf8_unicode_ci NOT NULL,
  `ticket_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'opened closed',
  `priority` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'baja media alta',
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `student_id` int(11) NOT NULL,
  `assigned_staff_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_message`
--

CREATE TABLE `ticket_message` (
  `ticket_message_id` int(11) NOT NULL,
  `ticket_code` longtext COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `file` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sender_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `sender_id` int(11) NOT NULL,
  `timestamp` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(11) NOT NULL,
  `name` longtext,
  `subject_id` bigint(20) DEFAULT NULL,
  `teacher_id` bigint(20) DEFAULT NULL,
  `acd_year_id` int(11) DEFAULT NULL,
  `qb_topic` int(11) DEFAULT NULL,
  `class_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `name`, `subject_id`, `teacher_id`, `acd_year_id`, `qb_topic`, `class_id`) VALUES
(1, 'Cells', 10, NULL, NULL, NULL, 11),
(3, 'Operating System ', 9, NULL, NULL, NULL, 12),
(4, 'XX', 10, NULL, NULL, NULL, 2),
(5, 'Common Core', 9, NULL, NULL, NULL, 12),
(6, 'virus', 10, NULL, NULL, NULL, 11),
(7, 'Fundamental Of Computer', 9, NULL, NULL, NULL, 12),
(8, 'Basic of OOP', 9, NULL, NULL, NULL, 12),
(9, 'C++', 9, NULL, NULL, NULL, 12),
(11, 'The Living World', 10, NULL, NULL, NULL, 12),
(12, 'Animal Kingdom', 10, NULL, NULL, NULL, 12),
(14, 'Magnetic Effect of Electric Current ', 8, NULL, NULL, NULL, 12),
(15, 'Laws of Motion', 8, NULL, NULL, NULL, 12),
(16, 'Thermodynamics', 8, NULL, NULL, NULL, 12),
(17, 'Physics NEET FULL PORTION', 8, NULL, NULL, NULL, 12),
(18, 'NEET - CHEMISTRY', 7, NULL, NULL, NULL, 12),
(19, 'BIO - NEET Syllabus', 10, NULL, NULL, NULL, 12);

-- --------------------------------------------------------

--
-- Table structure for table `transport`
--

CREATE TABLE `transport` (
  `transport_id` int(11) NOT NULL,
  `route_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `number_of_vehicle` longtext COLLATE utf8_unicode_ci NOT NULL,
  `route_fare` longtext COLLATE utf8_unicode_ci NOT NULL,
  `driver_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `driver_phone` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transport`
--

INSERT INTO `transport` (`transport_id`, `route_name`, `number_of_vehicle`, `route_fare`, `driver_name`, `driver_phone`) VALUES
(16, '1', 'bus no 1', '15000', 'dhanapandiyan', '7894561230');

-- --------------------------------------------------------

--
-- Table structure for table `vbc_approve_notes`
--

CREATE TABLE `vbc_approve_notes` (
  `approve_id` int(11) NOT NULL,
  `approve_note` text NOT NULL,
  `hod_id` bigint(20) NOT NULL,
  `notes_id` bigint(20) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vbc_approve_notes`
--

INSERT INTO `vbc_approve_notes` (`approve_id`, `approve_note`, `hod_id`, `notes_id`, `date`) VALUES
(1, 'good', 1, 30, '2018-08-02');

-- --------------------------------------------------------

--
-- Table structure for table `vbc_notes`
--

CREATE TABLE `vbc_notes` (
  `notes_id` bigint(20) NOT NULL,
  `coordinator_id` bigint(20) NOT NULL,
  `document_type` bigint(20) NOT NULL,
  `closing_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `class_id` bigint(20) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `principal_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `acd_year_id` int(11) NOT NULL,
  `open_flag` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vbc_notes`
--

INSERT INTO `vbc_notes` (`notes_id`, `coordinator_id`, `document_type`, `closing_date`, `status`, `class_id`, `subject_id`, `principal_id`, `school_id`, `acd_year_id`, `open_flag`) VALUES
(1, 5, 1, '2018-07-30', 1, 1, 1, 4, 3, 5, 1),
(2, 5, 1, '2018-07-30', 1, 1, 2, 4, 3, 5, 1),
(3, 5, 1, '2018-07-30', 1, 1, 3, 4, 3, 5, 1),
(4, 5, 1, '2018-07-30', 1, 1, 4, 4, 3, 5, 1),
(5, 5, 1, '2018-07-30', 1, 1, 5, 4, 3, 5, 1),
(6, 5, 1, '2018-07-30', 1, 1, 6, 4, 3, 5, 1),
(7, 5, 2, '2018-08-30', 1, 1, 1, 4, 3, 5, 1),
(8, 5, 2, '2018-08-30', 1, 1, 2, 4, 3, 5, 1),
(9, 5, 2, '2018-08-30', 1, 1, 3, 4, 3, 5, 1),
(10, 5, 2, '2018-08-30', 1, 1, 4, 4, 3, 5, 1),
(11, 5, 2, '2018-08-30', 1, 1, 5, 4, 3, 5, 1),
(12, 5, 2, '2018-08-30', 1, 1, 6, 4, 3, 5, 1),
(13, 5, 3, '2018-08-31', 1, 1, 1, 4, 3, 5, 1),
(14, 5, 3, '2018-08-31', 1, 1, 2, 4, 3, 5, 1),
(15, 5, 3, '2018-08-31', 1, 1, 3, 4, 3, 5, 1),
(16, 5, 3, '2018-08-31', 1, 1, 4, 4, 3, 5, 1),
(17, 5, 3, '2018-08-31', 1, 1, 5, 4, 3, 5, 1),
(18, 5, 3, '2018-08-31', 1, 1, 6, 4, 3, 5, 1),
(19, 5, 4, '2018-08-30', 1, 1, 1, 4, 3, 5, 1),
(20, 5, 4, '2018-08-30', 1, 1, 2, 4, 3, 5, 1),
(21, 5, 4, '2018-08-30', 1, 1, 3, 4, 3, 5, 1),
(22, 5, 4, '2018-08-30', 1, 1, 4, 4, 3, 5, 1),
(23, 5, 4, '2018-08-30', 1, 1, 5, 4, 3, 5, 1),
(24, 5, 4, '2018-08-30', 1, 1, 6, 4, 3, 5, 1),
(25, 1, 1, '2018-08-31', 3, 5, 1, 1, 2, 5, 2),
(26, 1, 1, '2018-08-31', 3, 5, 2, 1, 2, 5, 2),
(27, 1, 1, '2018-08-31', 3, 5, 3, 1, 2, 5, 2),
(28, 1, 1, '2018-08-31', 3, 5, 4, 1, 2, 5, 2),
(29, 1, 1, '2018-08-31', 3, 5, 5, 1, 2, 5, 2),
(30, 1, 1, '2018-08-31', 4, 5, 6, 1, 2, 5, 2),
(31, 1, 2, '2018-08-31', 1, 5, 1, 1, 2, 5, 1),
(32, 1, 2, '2018-08-31', 1, 5, 2, 1, 2, 5, 1),
(33, 1, 2, '2018-08-31', 1, 5, 3, 1, 2, 5, 1),
(34, 1, 2, '2018-08-31', 1, 5, 4, 1, 2, 5, 1),
(35, 1, 2, '2018-08-31', 1, 5, 5, 1, 2, 5, 1),
(36, 1, 2, '2018-08-31', 1, 5, 6, 1, 2, 5, 1),
(37, 1, 3, '2018-07-31', 3, 5, 1, 1, 2, 5, 2),
(38, 1, 3, '2018-07-31', 2, 5, 2, 1, 2, 5, 1),
(39, 1, 3, '2018-07-31', 2, 5, 3, 1, 2, 5, 1),
(40, 1, 3, '2018-07-31', 2, 5, 4, 1, 2, 5, 1),
(41, 1, 3, '2018-07-31', 1, 5, 5, 1, 2, 5, 1),
(42, 1, 3, '2018-07-31', 1, 5, 6, 1, 2, 5, 1),
(43, 1, 4, '2018-08-31', 1, 5, 1, 1, 2, 5, 1),
(44, 1, 4, '2018-08-31', 1, 5, 2, 1, 2, 5, 1),
(45, 1, 4, '2018-08-31', 1, 5, 3, 1, 2, 5, 1),
(46, 1, 4, '2018-08-31', 1, 5, 4, 1, 2, 5, 1),
(47, 1, 4, '2018-08-31', 1, 5, 5, 1, 2, 5, 1),
(48, 1, 4, '2018-08-31', 1, 5, 6, 1, 2, 5, 1),
(49, 4, 1, '2018-08-31', 3, 7, 1, 2, 1, 5, 2),
(50, 4, 1, '2018-08-31', 3, 7, 2, 2, 1, 5, 2),
(51, 4, 1, '2018-08-31', 3, 7, 3, 2, 1, 5, 2),
(52, 4, 1, '2018-08-31', 3, 7, 4, 2, 1, 5, 2),
(53, 4, 1, '2018-08-31', 2, 7, 5, 2, 1, 5, 1),
(54, 4, 1, '2018-08-31', 3, 7, 6, 2, 1, 5, 2),
(55, 4, 2, '2018-08-31', 2, 7, 1, 2, 1, 5, 1),
(56, 4, 2, '2018-08-31', 1, 7, 2, 2, 1, 5, 1),
(57, 4, 2, '2018-08-31', 1, 7, 3, 2, 1, 5, 1),
(58, 4, 2, '2018-08-31', 1, 7, 4, 2, 1, 5, 1),
(59, 4, 2, '2018-08-31', 1, 7, 5, 2, 1, 5, 1),
(60, 4, 2, '2018-08-31', 1, 7, 6, 2, 1, 5, 1),
(61, 4, 3, '2018-08-31', 2, 7, 1, 2, 1, 5, 0),
(62, 4, 3, '2018-08-31', 1, 7, 2, 2, 1, 5, 1),
(63, 4, 3, '2018-08-31', 1, 7, 3, 2, 1, 5, 1),
(64, 4, 3, '2018-08-31', 1, 7, 4, 2, 1, 5, 1),
(65, 4, 3, '2018-08-31', 1, 7, 5, 2, 1, 5, 1),
(66, 4, 3, '2018-08-31', 3, 7, 6, 2, 1, 5, 2),
(67, 4, 4, '2018-08-31', 2, 7, 1, 2, 1, 5, 0),
(68, 4, 4, '2018-08-31', 1, 7, 2, 2, 1, 5, 1),
(69, 4, 4, '2018-08-31', 1, 7, 3, 2, 1, 5, 1),
(70, 4, 4, '2018-08-31', 1, 7, 4, 2, 1, 5, 1),
(71, 4, 4, '2018-08-31', 1, 7, 5, 2, 1, 5, 1),
(72, 4, 4, '2018-08-31', 1, 7, 6, 2, 1, 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `academic_settings`
--
ALTER TABLE `academic_settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `academic_syllabus`
--
ALTER TABLE `academic_syllabus`
  ADD PRIMARY KEY (`academic_syllabus_id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `attendance_backup`
--
ALTER TABLE `attendance_backup`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`class_id`);

--
-- Indexes for table `class_routine`
--
ALTER TABLE `class_routine`
  ADD PRIMARY KEY (`class_routine_id`);

--
-- Indexes for table `common_user`
--
ALTER TABLE `common_user`
  ADD PRIMARY KEY (`common_user_id`);

--
-- Indexes for table `compartment`
--
ALTER TABLE `compartment`
  ADD PRIMARY KEY (`compartment_id`);

--
-- Indexes for table `coordinator`
--
ALTER TABLE `coordinator`
  ADD PRIMARY KEY (`coordinator_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_mapping`
--
ALTER TABLE `course_mapping`
  ADD PRIMARY KEY (`ctm_id`);

--
-- Indexes for table `course_student_setting`
--
ALTER TABLE `course_student_setting`
  ADD PRIMARY KEY (`mapping_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `dormitory`
--
ALTER TABLE `dormitory`
  ADD PRIMARY KEY (`dormitory_id`);

--
-- Indexes for table `enroll`
--
ALTER TABLE `enroll`
  ADD PRIMARY KEY (`enroll_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `exam_question_sets`
--
ALTER TABLE `exam_question_sets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_category`
--
ALTER TABLE `expense_category`
  ADD PRIMARY KEY (`expense_category_id`);

--
-- Indexes for table `forum`
--
ALTER TABLE `forum`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `forum_message`
--
ALTER TABLE `forum_message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `gallery_album`
--
ALTER TABLE `gallery_album`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `gallery_category`
--
ALTER TABLE `gallery_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `hod`
--
ALTER TABLE `hod`
  ADD PRIMARY KEY (`hod_id`);

--
-- Indexes for table `homework`
--
ALTER TABLE `homework`
  ADD PRIMARY KEY (`homework_id`);

--
-- Indexes for table `horarios_examenes`
--
ALTER TABLE `horarios_examenes`
  ADD PRIMARY KEY (`horario_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`phrase_id`);

--
-- Indexes for table `libreria`
--
ALTER TABLE `libreria`
  ADD PRIMARY KEY (`libro_id`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`mark_id`);

--
-- Indexes for table `mensaje_reporte`
--
ALTER TABLE `mensaje_reporte`
  ADD PRIMARY KEY (`news_message_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `message_thread`
--
ALTER TABLE `message_thread`
  ADD PRIMARY KEY (`message_thread_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `news_teacher`
--
ALTER TABLE `news_teacher`
  ADD PRIMARY KEY (`notice_id`);

--
-- Indexes for table `notice_message`
--
ALTER TABLE `notice_message`
  ADD PRIMARY KEY (`notice_message_id`);

--
-- Indexes for table `online_exam`
--
ALTER TABLE `online_exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `online_exam_questions`
--
ALTER TABLE `online_exam_questions`
  ADD PRIMARY KEY (`exam_question_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `poa`
--
ALTER TABLE `poa`
  ADD PRIMARY KEY (`id_poa`);

--
-- Indexes for table `principal`
--
ALTER TABLE `principal`
  ADD PRIMARY KEY (`principal_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `question_bank`
--
ALTER TABLE `question_bank`
  ADD PRIMARY KEY (`qb_id`);

--
-- Indexes for table `question_level`
--
ALTER TABLE `question_level`
  ADD PRIMARY KEY (`level_id`);

--
-- Indexes for table `question_type`
--
ALTER TABLE `question_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `quiz_question`
--
ALTER TABLE `quiz_question`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `reference_notes`
--
ALTER TABLE `reference_notes`
  ADD PRIMARY KEY (`notes_id`);

--
-- Indexes for table `reporte_alumnos`
--
ALTER TABLE `reporte_alumnos`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `reporte_mensaje`
--
ALTER TABLE `reporte_mensaje`
  ADD PRIMARY KEY (`report_message_id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `students_request`
--
ALTER TABLE `students_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `student_exam`
--
ALTER TABLE `student_exam`
  ADD PRIMARY KEY (`exam_id`);

--
-- Indexes for table `student_group`
--
ALTER TABLE `student_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `sub_topic`
--
ALTER TABLE `sub_topic`
  ADD PRIMARY KEY (`sub_topic_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `ticket_message`
--
ALTER TABLE `ticket_message`
  ADD PRIMARY KEY (`ticket_message_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`transport_id`);

--
-- Indexes for table `vbc_approve_notes`
--
ALTER TABLE `vbc_approve_notes`
  ADD PRIMARY KEY (`approve_id`);

--
-- Indexes for table `vbc_notes`
--
ALTER TABLE `vbc_notes`
  ADD PRIMARY KEY (`notes_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `academic_settings`
--
ALTER TABLE `academic_settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `academic_syllabus`
--
ALTER TABLE `academic_syllabus`
  MODIFY `academic_syllabus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3717;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `attendance_backup`
--
ALTER TABLE `attendance_backup`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `class_routine`
--
ALTER TABLE `class_routine`
  MODIFY `class_routine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `common_user`
--
ALTER TABLE `common_user`
  MODIFY `common_user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `compartment`
--
ALTER TABLE `compartment`
  MODIFY `compartment_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `coordinator`
--
ALTER TABLE `coordinator`
  MODIFY `coordinator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `course_mapping`
--
ALTER TABLE `course_mapping`
  MODIFY `ctm_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course_student_setting`
--
ALTER TABLE `course_student_setting`
  MODIFY `mapping_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `document_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dormitory`
--
ALTER TABLE `dormitory`
  MODIFY `dormitory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `enroll`
--
ALTER TABLE `enroll`
  MODIFY `enroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exam_question_sets`
--
ALTER TABLE `exam_question_sets`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `expense_category`
--
ALTER TABLE `expense_category`
  MODIFY `expense_category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum`
--
ALTER TABLE `forum`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forum_message`
--
ALTER TABLE `forum_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_album`
--
ALTER TABLE `gallery_album`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_category`
--
ALTER TABLE `gallery_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hod`
--
ALTER TABLE `hod`
  MODIFY `hod_id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `homework`
--
ALTER TABLE `homework`
  MODIFY `homework_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `horarios_examenes`
--
ALTER TABLE `horarios_examenes`
  MODIFY `horario_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `phrase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6777;

--
-- AUTO_INCREMENT for table `libreria`
--
ALTER TABLE `libreria`
  MODIFY `libro_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `mark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mensaje_reporte`
--
ALTER TABLE `mensaje_reporte`
  MODIFY `news_message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `message_thread`
--
ALTER TABLE `message_thread`
  MODIFY `message_thread_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `news_teacher`
--
ALTER TABLE `news_teacher`
  MODIFY `notice_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice_message`
--
ALTER TABLE `notice_message`
  MODIFY `notice_message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `online_exam`
--
ALTER TABLE `online_exam`
  MODIFY `exam_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `online_exam_questions`
--
ALTER TABLE `online_exam_questions`
  MODIFY `exam_question_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `poa`
--
ALTER TABLE `poa`
  MODIFY `id_poa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `principal`
--
ALTER TABLE `principal`
  MODIFY `principal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `question_bank`
--
ALTER TABLE `question_bank`
  MODIFY `qb_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `question_level`
--
ALTER TABLE `question_level`
  MODIFY `level_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `question_type`
--
ALTER TABLE `question_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quiz_question`
--
ALTER TABLE `quiz_question`
  MODIFY `question_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reference_notes`
--
ALTER TABLE `reference_notes`
  MODIFY `notes_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reporte_alumnos`
--
ALTER TABLE `reporte_alumnos`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reporte_mensaje`
--
ALTER TABLE `reporte_mensaje`
  MODIFY `report_message_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `school_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `students_request`
--
ALTER TABLE `students_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_exam`
--
ALTER TABLE `student_exam`
  MODIFY `exam_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_group`
--
ALTER TABLE `student_group`
  MODIFY `group_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sub_topic`
--
ALTER TABLE `sub_topic`
  MODIFY `sub_topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ticket_message`
--
ALTER TABLE `ticket_message`
  MODIFY `ticket_message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `transport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vbc_approve_notes`
--
ALTER TABLE `vbc_approve_notes`
  MODIFY `approve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vbc_notes`
--
ALTER TABLE `vbc_notes`
  MODIFY `notes_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
