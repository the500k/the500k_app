-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2018 at 08:37 AM
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
-- Database: `kmr_pro_sms`
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
('04f5b760ea83b1f214033949362ba5fd597d2f4d', '::1', 1530782038, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738323033383b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a323a223435223b6c6f67696e5f757365725f69647c4e3b6e616d657c733a31323a22564243204469726563746f72223b6c6f67696e5f747970657c733a383a226469726563746f72223b),
('0f0f1c64e15c0123825baa8195d4534721c64636', '::1', 1530782418, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738323133313b7072696e636970616c5f6c6f67696e7c733a313a2231223b7072696e636970616c5f69647c733a323a223332223b6c6f67696e5f757365725f69647c733a323a223332223b6e616d657c733a31303a22446576612062616c616e223b6c6f67696e5f747970657c733a393a227072696e636970616c223b),
('12b68673a24ce43ba8048bfc6054f766eac04d29', '::1', 1530791066, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303739313036363b7072696e636970616c5f6c6f67696e7c733a313a2231223b7072696e636970616c5f69647c733a323a223332223b6c6f67696e5f757365725f69647c733a323a223332223b6e616d657c733a31303a22446576612062616c616e223b6c6f67696e5f747970657c733a393a227072696e636970616c223b),
('1a4e43f6b3ae1bb8f1b43cc446589bfa5f1d6514', '::1', 1530782809, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738323535313b7072696e636970616c5f6c6f67696e7c733a313a2231223b7072696e636970616c5f69647c733a323a223332223b6c6f67696e5f757365725f69647c733a323a223332223b6e616d657c733a31303a22446576612062616c616e223b6c6f67696e5f747970657c733a393a227072696e636970616c223b),
('255936837e49278710a0d58009c5eec6de17df52', '::1', 1530785342, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738353038393b7072696e636970616c5f6c6f67696e7c733a313a2231223b7072696e636970616c5f69647c733a323a223332223b6c6f67696e5f757365725f69647c733a323a223332223b6e616d657c733a31303a22446576612062616c616e223b6c6f67696e5f747970657c733a393a227072696e636970616c223b),
('257a1213a1b38011b97d8dacc8485d722c6638fb', '::1', 1530782298, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738323037393b636f6f7264696e61746f725f6c6f67696e7c733a313a2231223b636f6f7264696e61746f725f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a22496e646972616e69223b6c6f67696e5f747970657c733a31313a22636f6f7264696e61746f72223b),
('2833cb81b537567501320bc81644c4eecfa52540', '::1', 1530779565, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303737393439373b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a323a223435223b6c6f67696e5f757365725f69647c4e3b6e616d657c733a31323a22564243204469726563746f72223b6c6f67696e5f747970657c733a383a226469726563746f72223b),
('314d7c3be78c77b5d0ba7eefe6b295fdd9643856', '::1', 1530785057, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738343738313b7072696e636970616c5f6c6f67696e7c733a313a2231223b7072696e636970616c5f69647c733a323a223332223b6c6f67696e5f757365725f69647c733a323a223332223b6e616d657c733a31303a22446576612062616c616e223b6c6f67696e5f747970657c733a393a227072696e636970616c223b),
('3ab2fbf79e452c1abca96716534d2baacfb64848', '::1', 1530783192, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738333136363b636f6f7264696e61746f725f6c6f67696e7c733a313a2231223b636f6f7264696e61746f725f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a22496e646972616e69223b6c6f67696e5f747970657c733a31313a22636f6f7264696e61746f72223b),
('3b8b30d0d61a24d2402666a658ae9188cdf67829', '::1', 1530786589, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738363434333b7072696e636970616c5f6c6f67696e7c733a313a2231223b7072696e636970616c5f69647c733a323a223332223b6c6f67696e5f757365725f69647c733a323a223332223b6e616d657c733a31303a22446576612062616c616e223b6c6f67696e5f747970657c733a393a227072696e636970616c223b),
('3c6cdad7f180494b0e34df7af1356f8837a384da', '::1', 1530785754, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738353535323b636f6f7264696e61746f725f6c6f67696e7c733a313a2231223b636f6f7264696e61746f725f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a22496e646972616e69223b6c6f67696e5f747970657c733a31313a22636f6f7264696e61746f72223b),
('4641667fbb521a29856609922ef2da1ad1444c8b', '::1', 1530785809, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738353830313b7072696e636970616c5f6c6f67696e7c733a313a2231223b7072696e636970616c5f69647c733a323a223332223b6c6f67696e5f757365725f69647c733a323a223332223b6e616d657c733a31303a22446576612062616c616e223b6c6f67696e5f747970657c733a393a227072696e636970616c223b),
('4ea73414c7d9a5a3acf7bc214cac31a22942b5e1', '::1', 1530787136, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738373130323b7072696e636970616c5f6c6f67696e7c733a313a2231223b7072696e636970616c5f69647c733a323a223332223b6c6f67696e5f757365725f69647c733a323a223332223b6e616d657c733a31303a22446576612062616c616e223b6c6f67696e5f747970657c733a393a227072696e636970616c223b),
('55fc8698cf53a9bb2f02907708af07e245d37ab9', '::1', 1530783941, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738333635353b7072696e636970616c5f6c6f67696e7c733a313a2231223b7072696e636970616c5f69647c733a323a223332223b6c6f67696e5f757365725f69647c733a323a223332223b6e616d657c733a31303a22446576612062616c616e223b6c6f67696e5f747970657c733a393a227072696e636970616c223b),
('56367a1fbfd2c678c038659cc9a89b40f56f61ef', '::1', 1530783373, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738333233313b7072696e636970616c5f6c6f67696e7c733a313a2231223b7072696e636970616c5f69647c733a323a223332223b6c6f67696e5f757365725f69647c733a323a223332223b6e616d657c733a31303a22446576612062616c616e223b6c6f67696e5f747970657c733a393a227072696e636970616c223b),
('6af15abf91e226d593a570bc1544019ec3a624d7', '::1', 1530788196, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738383136303b7072696e636970616c5f6c6f67696e7c733a313a2231223b7072696e636970616c5f69647c733a323a223332223b6c6f67696e5f757365725f69647c733a323a223332223b6e616d657c733a31303a22446576612062616c616e223b6c6f67696e5f747970657c733a393a227072696e636970616c223b),
('71a91c94f7920c05a1de1ac076703ec1acf556b9', '::1', 1530780059, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738303035393b),
('73e4a8e6e4164939bf8f7a17bd1613aa4b850d66', '::1', 1530787676, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738373637363b636f6f7264696e61746f725f6c6f67696e7c733a313a2231223b636f6f7264696e61746f725f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a22496e646972616e69223b6c6f67696e5f747970657c733a31313a22636f6f7264696e61746f72223b),
('850f20aa2e82d83152fd3287aee5199833dede4a', '::1', 1530788036, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738373831373b7072696e636970616c5f6c6f67696e7c733a313a2231223b7072696e636970616c5f69647c733a323a223332223b6c6f67696e5f757365725f69647c733a323a223332223b6e616d657c733a31303a22446576612062616c616e223b6c6f67696e5f747970657c733a393a227072696e636970616c223b),
('8c51daa457073eb5cbaad503d4d9184a91928cb2', '::1', 1530789187, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738393032333b7072696e636970616c5f6c6f67696e7c733a313a2231223b7072696e636970616c5f69647c733a323a223332223b6c6f67696e5f757365725f69647c733a323a223332223b6e616d657c733a31303a22446576612062616c616e223b6c6f67696e5f747970657c733a393a227072696e636970616c223b),
('9479f25ab2be2a6e98ee6d16272489b05d4225db', '::1', 1530789626, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738393337373b7072696e636970616c5f6c6f67696e7c733a313a2231223b7072696e636970616c5f69647c733a323a223332223b6c6f67696e5f757365725f69647c733a323a223332223b6e616d657c733a31303a22446576612062616c616e223b6c6f67696e5f747970657c733a393a227072696e636970616c223b),
('b1a9f2ffd37d2201099e5ae6ba0ad2c80c2568f3', '::1', 1530787678, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738373431363b7072696e636970616c5f6c6f67696e7c733a313a2231223b7072696e636970616c5f69647c733a323a223332223b6c6f67696e5f757365725f69647c733a323a223332223b6e616d657c733a31303a22446576612062616c616e223b6c6f67696e5f747970657c733a393a227072696e636970616c223b),
('b55709dcd3114f62780801fcb98f4da3fcdcc7a5', '::1', 1530786785, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738363738353b7072696e636970616c5f6c6f67696e7c733a313a2231223b7072696e636970616c5f69647c733a323a223332223b6c6f67696e5f757365725f69647c733a323a223332223b6e616d657c733a31303a22446576612062616c616e223b6c6f67696e5f747970657c733a393a227072696e636970616c223b),
('b75c4ebe8090bfe0b9677c31312e9e2948251f88', '::1', 1530786093, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738353939333b636f6f7264696e61746f725f6c6f67696e7c733a313a2231223b636f6f7264696e61746f725f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a22496e646972616e69223b6c6f67696e5f747970657c733a31313a22636f6f7264696e61746f72223b),
('b9a19762eef58d7cd3d1c5bbb8c375a10f3ef819', '::1', 1530784429, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738343134353b7072696e636970616c5f6c6f67696e7c733a313a2231223b7072696e636970616c5f69647c733a323a223332223b6c6f67696e5f757365725f69647c733a323a223332223b6e616d657c733a31303a22446576612062616c616e223b6c6f67696e5f747970657c733a393a227072696e636970616c223b),
('c0caba59ca797414a044d9c779fd939b66668bf9', '::1', 1530788993, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738383639373b7072696e636970616c5f6c6f67696e7c733a313a2231223b7072696e636970616c5f69647c733a323a223332223b6c6f67696e5f757365725f69647c733a323a223332223b6e616d657c733a31303a22446576612062616c616e223b6c6f67696e5f747970657c733a393a227072696e636970616c223b),
('c4884c1165f1ff9afa143874ebb2194fdc98f719', '::1', 1530785710, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738353436373b7072696e636970616c5f6c6f67696e7c733a313a2231223b7072696e636970616c5f69647c733a323a223332223b6c6f67696e5f757365725f69647c733a323a223332223b6e616d657c733a31303a22446576612062616c616e223b6c6f67696e5f747970657c733a393a227072696e636970616c223b),
('cc4135caf6ba5a1a8804cc1d6a31afc8d474404d', '::1', 1530790862, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303739303538303b7072696e636970616c5f6c6f67696e7c733a313a2231223b7072696e636970616c5f69647c733a323a223332223b6c6f67696e5f757365725f69647c733a323a223332223b6e616d657c733a31303a22446576612062616c616e223b6c6f67696e5f747970657c733a393a227072696e636970616c223b),
('cd4a71d1d70238f95883aacac8e0050a08828a25', '::1', 1530791815, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303739313831323b636f6f7264696e61746f725f6c6f67696e7c733a313a2231223b636f6f7264696e61746f725f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a22496e646972616e69223b6c6f67696e5f747970657c733a31313a22636f6f7264696e61746f72223b),
('d9a6b60f0301144391f301f201ec190071610da2', '::1', 1531463429, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533313436333339343b61646d696e5f6c6f67696e7c733a313a2231223b61646d696e5f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a353a224a65657661223b6c6f67696e5f747970657c733a353a2261646d696e223b),
('e975305ac8c0b323df056e36c57e66c7f5bcd73e', '::1', 1530790027, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738393837323b7072696e636970616c5f6c6f67696e7c733a313a2231223b7072696e636970616c5f69647c733a323a223332223b6c6f67696e5f757365725f69647c733a323a223332223b6e616d657c733a31303a22446576612062616c616e223b6c6f67696e5f747970657c733a393a227072696e636970616c223b),
('ea6ba3cb1460da745477807077e7ff1ae01b45ac', '::1', 1530786469, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738363436323b636f6f7264696e61746f725f6c6f67696e7c733a313a2231223b636f6f7264696e61746f725f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a22496e646972616e69223b6c6f67696e5f747970657c733a31313a22636f6f7264696e61746f72223b),
('f1ba9cc23f958e3447de8709d0302cf4e6cafc59', '::1', 1530786415, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738363131393b7072696e636970616c5f6c6f67696e7c733a313a2231223b7072696e636970616c5f69647c733a323a223332223b6c6f67696e5f757365725f69647c733a323a223332223b6e616d657c733a31303a22446576612062616c616e223b6c6f67696e5f747970657c733a393a227072696e636970616c223b),
('f1c143d58020d66b92c055418372a558f37dc592', '::1', 1530791751, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303739313734343b7072696e636970616c5f6c6f67696e7c733a313a2231223b7072696e636970616c5f69647c733a323a223332223b6c6f67696e5f757365725f69647c733a323a223332223b6e616d657c733a31303a22446576612062616c616e223b6c6f67696e5f747970657c733a393a227072696e636970616c223b),
('f71d9ba0e355314a3342aa849984536e2e38845f', '::1', 1530783491, 0x5f5f63695f6c6173745f726567656e65726174657c693a313533303738333439313b636f6f7264696e61746f725f6c6f67696e7c733a313a2231223b636f6f7264696e61746f725f69647c733a313a2231223b6c6f67696e5f757365725f69647c733a313a2231223b6e616d657c733a383a22496e646972616e69223b6c6f67696e5f747970657c733a31313a22636f6f7264696e61746f72223b);

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
(1, 'Grade 1', ''),
(2, 'Grade 2', ''),
(3, 'Grade 3', ''),
(4, 'Grade 4', ''),
(5, 'Grade 5', ''),
(6, 'Grade 6', ''),
(7, 'Grade 7', ''),
(8, 'Grade 8', ''),
(9, 'Grade 9', ''),
(10, 'Grade 10', ''),
(11, 'Grade 11', ''),
(12, 'Grade 12', '');

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
  `username` longtext COLLATE utf8_unicode_ci NOT NULL,
  `school_id` int(11) NOT NULL,
  `compartment_id` int(11) NOT NULL,
  `acd_year_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `coordinator`
--

INSERT INTO `coordinator` (`coordinator_id`, `name`, `birthday`, `sex`, `address`, `phone`, `email`, `password`, `username`, `school_id`, `compartment_id`, `acd_year_id`) VALUES
(1, 'Indirani', '19-12-1985', 'female', 'west str', '963852741', 'indirani19@gmail.com', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', 'indirani', 0, 0, 0),
(2, 'muthuvel', '19-12-1985', 'female', 'west str', '963852741', 'muthuvel@gmail.com', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', 'muthu', 0, 0, 0),
(3, 'saranya', '10-05-1990', 'female', 'wst str', '1236985', '123@gmail.com', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', 'saranya', 0, 0, 0),
(4, 'velmurugan', NULL, 'male', 'vel st', '963852741', 'vel@gmail.com', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', 'vel', 0, 0, 0),
(5, 'Manimegalai', NULL, 'female', 'rose garden,madurai', '9638527410', 'manimegalai@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'manimegalai', 0, 0, 0),
(6, 'Janaki', NULL, 'female', 'jana st', '9638527410', 'janaki@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'janaki', 0, 0, 0),
(7, 'Rajkumar', NULL, 'male', 'south st', '9638527410', 'raj@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'raj', 0, 0, 0),
(8, 'Priya', NULL, 'female', 'st', '963852741', 'priya@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'priya', 0, 0, 0);

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
(5202, 'Notes', '', '', NULL, NULL, NULL, NULL, '');

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
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `username` longtext COLLATE utf8_unicode_ci NOT NULL,
  `school_id` int(11) NOT NULL,
  `acd_year_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `principal`
--

INSERT INTO `principal` (`principal_id`, `name`, `email`, `password`, `phone`, `address`, `username`, `school_id`, `acd_year_id`) VALUES
(31, 'Jaya prakash', 'dummy@gmail.com', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', '9999895698', 'south street', 'jayaprakash', 0, 0),
(32, 'Deva balan', 'deva@gmail.com', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', '9638527410', 'south street', 'deva', 0, 0),
(33, 'sam', 'sam@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '963852741', 'north st', 'sam', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `exam_id` int(11) NOT NULL,
  `question` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `optiona` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `optionb` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `optionc` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `optiond` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `correctanswer` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `marks` int(11) NOT NULL,
  `exam_code` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `birthday` longtext COLLATE utf8_unicode_ci,
  `sex` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `phone` longtext COLLATE utf8_unicode_ci NOT NULL,
  `email` longtext COLLATE utf8_unicode_ci NOT NULL,
  `password` longtext COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `student_session` int(11) NOT NULL DEFAULT '1',
  `username` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` longtext COLLATE utf8_unicode_ci NOT NULL,
  `student_code` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `birthday`, `sex`, `address`, `phone`, `email`, `password`, `parent_id`, `student_session`, `username`, `date`, `student_code`) VALUES
(2, 'radha', '28-02-2001', 'female', 'rose garden', '9997896563', 'radharose@gmail.com', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', 33, 1, 'radha', '1526321880', ''),
(3, 'Bharathi', '16-07-2009', 'female', 'rose gardens', '99966569896', 'bharathi@gmail.com', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', 31, 1, 'bharathi', '1526667480', ''),
(4, 'Jothy', '03-04-1999', '', 'west street,Nagamalai Pudukottai', '9994985459', 'jeevaa19@gmail.com', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', 31, 1, 'jothi', '1526408280', ''),
(5, 'Sam Selin', '03-04-2009', 'female', 'North gate,Madurai', '9874563210', 'selin@gmail.com', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 31, 2, 'selin', '1526408280', ''),
(6, 'Jeeva niranchan', '02-05-2008', 'male', 'rose garden', '9998965211', 'jeevu@gmail.com', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', NULL, 1, 'jeevaniranchan', '1526667480', ''),
(7, 'Deepha', '27-01-2004', 'female', 'west street,Nagamalai Pudukottai', '9638527410', 'deepa@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', NULL, 1, 'deepa', '1526667480', ''),
(8, 'Palani', '05-04-2002', 'male', 'north st', '7896541230', 'palani@gmail.com', '88ea39439e74fa27c09a4fc0bc8ebe6d00978392', NULL, 1, 'palani', '1526667480', ''),
(9, 'Pavidra', '03-05-2006', 'female', 'rose gardens', '9998956895', 'pavidra@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 33, 1, 'pavidra', '1526667480', '');

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
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `name` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `name`) VALUES
(1, 'English'),
(2, 'Tamil'),
(3, 'II-LAN -HINDI'),
(4, 'Maths'),
(5, 'Science'),
(6, 'Social'),
(7, 'Chemistry'),
(8, 'Physics'),
(9, 'Computer Science'),
(10, 'Biology'),
(11, 'Zoology'),
(12, 'Botany'),
(13, 'Business Maths');

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
(1, 2, 1, '2018-10-16', 1, 10, 1, 1, 1, 5, 0),
(3, 3, 1, '2018-07-31', 2, 2, 1, 1, 1, 5, 0),
(5, 3, 2, '2018-07-27', 2, 11, 9, 1, 1, 5, 1),
(7, 3, 3, '2018-07-28', 2, 11, 9, 1, 1, 5, 1),
(8, 2, 3, '2018-09-15', 1, 10, 4, 1, 1, 5, 1),
(9, 1, 4, '2018-09-29', 1, 11, 9, 1, 1, 5, 1),
(10, 1, 4, '2018-09-29', 1, 12, 9, 1, 1, 5, 1),
(11, 1, 2, '2018-08-31', 2, 9, 6, 1, 1, 5, 0),
(12, 1, 2, '2018-08-31', 1, 10, 6, 1, 1, 5, 1),
(13, 3, 4, '2018-07-18', 1, 1, 2, 1, 1, 5, 1),
(14, 1, 1, '2018-08-04', 2, 1, 3, 1, 1, 5, 0),
(15, 1, 2, '2018-08-04', 1, 1, 3, 1, 1, 5, 1),
(16, 1, 3, '2018-08-04', 1, 1, 3, 1, 1, 5, 1),
(17, 1, 4, '2018-07-19', 1, 1, 3, 1, 1, 5, 1),
(18, 1, 1, '2018-08-30', 1, 3, 1, 1, 1, 5, 1),
(19, 1, 1, '2018-08-30', 1, 3, 2, 1, 1, 5, 1),
(20, 1, 1, '2018-08-30', 1, 3, 3, 1, 1, 5, 1),
(21, 1, 1, '2018-08-30', 1, 3, 5, 1, 1, 5, 1),
(22, 1, 1, '2018-08-30', 1, 3, 6, 1, 1, 5, 1),
(23, 1, 1, '2018-08-30', 1, 3, 7, 1, 1, 5, 1),
(24, 1, 1, '2018-08-30', 1, 4, 1, 1, 1, 5, 1),
(25, 1, 1, '2018-08-30', 1, 4, 2, 1, 1, 5, 1),
(26, 1, 1, '2018-08-30', 1, 4, 3, 1, 1, 5, 1),
(27, 1, 1, '2018-08-30', 1, 4, 5, 1, 1, 5, 1),
(28, 1, 1, '2018-08-30', 1, 4, 6, 1, 1, 5, 1),
(29, 1, 1, '2018-08-30', 1, 4, 7, 1, 1, 5, 1),
(30, 1, 1, '2018-08-30', 1, 5, 1, 1, 1, 5, 1),
(31, 1, 1, '2018-08-30', 1, 5, 2, 1, 1, 5, 1),
(32, 1, 1, '2018-08-30', 1, 5, 3, 1, 1, 5, 1),
(33, 1, 1, '2018-08-30', 1, 5, 5, 1, 1, 5, 1),
(34, 1, 1, '2018-08-30', 1, 5, 6, 1, 1, 5, 1),
(35, 1, 1, '2018-08-30', 1, 5, 7, 1, 1, 5, 1),
(36, 1, 1, '2018-08-30', 1, 6, 1, 1, 1, 5, 1),
(37, 1, 1, '2018-08-30', 1, 6, 2, 1, 1, 5, 1),
(38, 1, 1, '2018-08-30', 1, 6, 3, 1, 1, 5, 1),
(39, 1, 1, '2018-08-30', 1, 6, 5, 1, 1, 5, 1),
(40, 1, 1, '2018-08-30', 1, 6, 6, 1, 1, 5, 1),
(41, 1, 1, '2018-08-30', 1, 6, 7, 1, 1, 5, 1),
(42, 1, 1, '2018-08-30', 1, 7, 1, 1, 1, 5, 1),
(43, 1, 1, '2018-08-30', 1, 7, 2, 1, 1, 5, 1),
(44, 1, 1, '2018-08-30', 1, 7, 3, 1, 1, 5, 1),
(45, 1, 1, '2018-08-30', 1, 7, 5, 1, 1, 5, 1),
(46, 1, 1, '2018-08-30', 1, 7, 6, 1, 1, 5, 1),
(47, 1, 1, '2018-08-30', 1, 7, 7, 1, 1, 5, 1);

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
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`);

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
-- Indexes for table `transport`
--
ALTER TABLE `transport`
  ADD PRIMARY KEY (`transport_id`);

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
  MODIFY `class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `class_routine`
--
ALTER TABLE `class_routine`
  MODIFY `class_routine_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `coordinator`
--
ALTER TABLE `coordinator`
  MODIFY `coordinator_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `phrase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5203;

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
  MODIFY `principal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

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
-- AUTO_INCREMENT for table `transport`
--
ALTER TABLE `transport`
  MODIFY `transport_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vbc_notes`
--
ALTER TABLE `vbc_notes`
  MODIFY `notes_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
