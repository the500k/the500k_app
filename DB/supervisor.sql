-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 09:58 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bharathiyardb`
--

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `supervisor_id` bigint(20) NOT NULL,
  `fname` varchar(200) DEFAULT NULL,
  `middlename` varchar(200) DEFAULT NULL,
  `surename` varchar(200) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `fstatus` smallint(6) DEFAULT NULL,
  `depent` int(11) DEFAULT NULL,
  `phone_num` bigint(20) DEFAULT NULL,
  `alt_phone_num` bigint(20) DEFAULT NULL,
  `is_whatsapp_available` smallint(6) DEFAULT NULL,
  `aadhar_number` bigint(20) DEFAULT NULL,
  `state_id` smallint(6) DEFAULT NULL,
  `district_id` smallint(6) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `mp_id` int(11) DEFAULT NULL,
  `mrid` varchar(100) DEFAULT NULL,
  `avg_TA` double DEFAULT NULL,
  `nom` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`supervisor_id`, `fname`, `middlename`, `surename`, `dob`, `fstatus`, `depent`, `phone_num`, `alt_phone_num`, `is_whatsapp_available`, `aadhar_number`, `state_id`, `district_id`, `status`, `submission_date`, `photo`, `mp_id`, `mrid`, `avg_TA`, `nom`) VALUES
(1, 'Kondalu ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 9, 1, '2020-12-07', NULL, 2, 'JLSD3AP1', 200, 8),
(2, 'Ramamurthy ', NULL, 'Naik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 9, 1, '2020-12-07', NULL, 2, 'JLS3KAP2', 200, 5),
(3, 'Yesulu ', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 9, 1, '2020-12-07', NULL, 2, 'JLSDDAP3', 200, 6),
(4, 'Solomon', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 9, 1, '2020-12-07', NULL, 2, 'JLSTAAP4', 200, 3),
(5, 'Samuel Ranjit ', NULL, 'Kumar ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 9, 1, '2020-12-07', NULL, 2, 'JLSJ2AP5', 200, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`supervisor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `supervisor`
--
ALTER TABLE `supervisor`
  MODIFY `supervisor_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
