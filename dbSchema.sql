-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2022 at 02:46 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS dss;
USE dss;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dss`
--

-- --------------------------------------------------------

--
-- Table structure for table `accessLogs`
--

CREATE TABLE `accessLogs` (
  `ID` int(11) NOT NULL,
  `userEmail` text NOT NULL,
  `IP` text NOT NULL,
  `countryName` text NOT NULL,
  `regionName` text NOT NULL,
  `cityName` text NOT NULL,
  `ZIP` text NOT NULL,
  `Latitude` text NOT NULL,
  `Longitude` text NOT NULL,
  `ISP` text NOT NULL,
  `Organization` text NOT NULL,
  `TimeStamp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accessLogs`
--

INSERT INTO `accessLogs` (`ID`, `userEmail`, `IP`, `countryName`, `regionName`, `cityName`, `ZIP`, `Latitude`, `Longitude`, `ISP`, `Organization`, `TimeStamp`) VALUES
(1, 'rushil.rc@gmail.com', '49.36.65.243', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Tue 15.03.2022 06:41:50 PM'),
(2, 'rushil.rc@gmail.com', '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:33:19 PM'),
(3, 'rushil.rc@gmail.com', '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:33:37 PM'),
(4, 'rushil.rc@gmail.com', '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:33:50 PM'),
(5, 'rushil.rc@gmail.com', '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:34:28 PM'),
(6, 'rushil.rc@gmail.com', '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:35:07 PM'),
(7, 'rushil.rc@gmail.com', '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:36:16 PM'),
(8, 'rushil.rc@gmail.com', '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:37:24 PM'),
(9, 'rushil.rc@gmail.com', '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:38:28 PM'),
(10, 'rushil.rc@gmail.com', '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:39:13 PM'),
(11, 'rushil.rc@gmail.com', '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:39:47 PM'),
(12, 'rushil.rc@gmail.com', '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:56:42 PM'),
(13, 'rushil.rc@gmail.com', '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:56:56 PM'),
(14, 'rushil.rc@gmail.com', '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:57:30 PM'),
(15, 'rushil.rc@gmail.com', '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:58:26 PM'),
(16, 'rushil.rc@gmail.com', '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 01:24:00 PM'),
(17, 'rushil.rc@gmail.com', '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 01:24:40 PM'),
(18, 'rushil.rc@gmail.com', '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 02:22:19 PM'),
(19, 'rushil.rc@gmail.com', '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 02:22:45 PM'),
(20, 'rushil.rc@gmail.com', '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 02:31:34 PM'),
(21, 'rushil.rc@gmail.com', '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 03:15:04 PM'),
(22, 'rushil.rc@gmail.com', '202.131.113.234', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Blazenet Pvt Ltd', 'Blazenet Pvt. LTD', 'Mon 21.03.2022 09:36:38 AM'),
(23, 'rushil.rc@gmail.com', '202.131.113.234', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Blazenet Pvt Ltd', 'Blazenet Pvt. LTD', 'Mon 21.03.2022 09:38:10 AM'),
(24, 'rushil.rc@gmail.com', '202.131.113.234', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Blazenet Pvt Ltd', 'Blazenet Pvt. LTD', 'Mon 21.03.2022 10:28:45 AM'),
(25, 'rushil.rc@gmail.com', '202.131.113.234', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Blazenet Pvt Ltd', 'Blazenet Pvt. LTD', 'Tue 22.03.2022 08:34:18 AM'),
(26, 'rushil.rc@gmail.com', '202.131.113.234', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Blazenet Pvt Ltd', 'Blazenet Pvt. LTD', 'Tue 22.03.2022 08:44:58 AM'),
(27, 'rushil.rc@gmail.com', '49.36.67.201', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Tue 22.03.2022 02:16:38 PM'),
(28, 'rushil.rc@gmail.com', '49.36.67.201', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Tue 22.03.2022 02:26:06 PM'),
(29, 'rushil.rc@gmail.com', '49.36.67.201', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Tue 22.03.2022 04:38:39 PM'),
(30, 'rushil.rc@gmail.com', '49.36.67.201', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Tue 22.03.2022 04:38:54 PM'),
(31, 'rushil.rc@gmail.com', '49.36.67.201', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Tue 22.03.2022 04:41:22 PM'),
(32, 'rushil.rc@gmail.com', '49.36.67.201', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Tue 22.03.2022 05:24:34 PM'),
(33, 'rushil.rc@gmail.com', '49.36.67.201', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Tue 22.03.2022 07:10:32 PM'),
(34, 'rushil.rc@gmail.com', '49.36.67.201', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Tue 22.03.2022 07:11:00 PM'),
(35, 'rushil.rc@gmail.com', '49.36.67.201', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Tue 22.03.2022 09:57:34 PM'),
(36, 'rushil.rc@gmail.com', '49.36.67.201', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Tue 22.03.2022 10:00:12 PM'),
(37, 'rushil.rc@gmail.com', '49.36.67.201', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Tue 22.03.2022 10:01:15 PM'),
(38, 'rushil.rc@gmail.com', '49.36.67.201', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Tue 22.03.2022 11:37:09 PM'),
(39, 'rushil.rc@gmail.com', '49.36.67.201', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Tue 22.03.2022 11:37:29 PM'),
(40, 'rushil.rc@gmail.com', '202.131.113.234', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Blazenet Pvt Ltd', 'Blazenet Pvt. LTD', 'Wed 23.03.2022 11:39:30 AM'),
(41, 'rushil.rc@gmail.com', '202.131.113.234', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Blazenet Pvt Ltd', 'Blazenet Pvt. LTD', 'Wed 23.03.2022 11:40:40 AM'),
(42, 'rushil.rc@gmail.com', '49.36.67.13', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 27.03.2022 01:15:05 PM'),
(43, 'rushil.rc@gmail.com', '49.36.67.13', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 27.03.2022 01:33:57 PM'),
(44, 'rushil.rc@gmail.com', '49.36.67.13', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 27.03.2022 01:35:47 PM'),
(45, 'rushil.rc@gmail.com', '49.36.67.13', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 27.03.2022 05:12:59 PM'),
(46, 'rushil.rc@gmail.com', '49.36.67.13', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 27.03.2022 05:13:21 PM'),
(47, 'admin@secureftp.com', '49.36.67.13', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 27.03.2022 05:27:22 PM'),
(48, 'admin@secureftp.com', '202.131.113.234', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Blazenet Pvt Ltd', 'Blazenet Pvt. LTD', 'Mon 28.03.2022 10:29:17 AM'),
(49, 'admin@secureftp.com', '202.131.113.234', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Blazenet Pvt Ltd', 'Blazenet Pvt. LTD', 'Wed 30.03.2022 10:50:54 AM'),
(50, 'nachiketrushil19@gnu.ac.in', '49.36.67.13', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Wed 30.03.2022 04:00:23 PM'),
(51, 'rushil.rc@gmail.com', '49.36.67.13', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Wed 30.03.2022 04:19:59 PM'),
(52, 'rushil.rc@gmail.com', '49.36.67.13', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Wed 30.03.2022 04:21:23 PM'),
(53, 'nachiketrushil19@gnu.ac.in', '49.36.67.13', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Wed 30.03.2022 04:47:36 PM'),
(54, 'rushil.rc@gmail.com', '49.36.67.13', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Wed 30.03.2022 05:13:35 PM'),
(55, 'sanketbaraiya19@gnu.ac.in', '49.36.67.13', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Wed 30.03.2022 05:14:50 PM'),
(56, 'nachiketrushil19@gnu.ac.in', '49.36.67.13', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Wed 30.03.2022 05:18:53 PM'),
(57, 'rushil.rc@gmail.com', '49.36.67.13', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Wed 30.03.2022 05:26:12 PM'),
(58, 'sanketbaraiya19@gnu.ac.in', '49.36.67.13', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Wed 30.03.2022 05:51:30 PM'),
(59, 'sanketbaraiya19@gnu.ac.in', '49.36.67.13', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Wed 30.03.2022 05:52:21 PM'),
(60, 'rushil.rc@gmail.com', '49.36.67.13', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Wed 30.03.2022 05:57:42 PM'),
(61, 'nachiketrushil19@gnu.ac.in', '49.36.67.13', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Wed 30.03.2022 06:05:16 PM'),
(62, 'sanketbaraiya19@gnu.ac.in', '49.36.67.13', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Wed 30.03.2022 06:07:01 PM'),
(63, 'sanketbaraiya19@gnu.ac.in', '49.36.67.13', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Wed 30.03.2022 06:07:46 PM'),
(64, 'sanketbaraiya19@gnu.ac.in', '49.36.67.13', 'India', 'Gujarat', 'Ahmedabad', '380001', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Wed 30.03.2022 06:08:15 PM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` text NOT NULL,
  `saltValue` varchar(255) NOT NULL,
  `Privileges` varchar(255) NOT NULL,
  `accessCount` int(11) NOT NULL DEFAULT 0,
  `Verified` int(11) NOT NULL DEFAULT 0,
  `Directory` text NOT NULL DEFAULT '.',
  `lastLogin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Email`, `Password`, `saltValue`, `Privileges`, `accessCount`, `Verified`, `Directory`, `lastLogin`) VALUES
(1, 'Rushil Choksi', 'rushil.rc@gmail.com', '55b0d6c8483c5f106b881eca00f48121fbd9de4ae6c311acbc024e2f09e1819b', 'c6be99b9048cdc2cce3a84714bfa3e5a', 'CLIENT', 70, 1, '.', 'Wed 30.03.2022 05:57:42 PM'),
(2, 'Administrator', 'nachiketrushil19@gnu.ac.in', 'c6140b6c8046e1f966f05c855435875679f8abd1f7a87978dd2f9a0db4fece0c', 'b3ddf5027b08bec517573b5241eb3238', 'ADMIN', 22, 1, '*', 'Wed 30.03.2022 06:05:16 PM'),
(3, 'Sanket Baraiya', 'sanketbaraiya19@gnu.ac.in', '1fa33622f00b8a5c91481f4175a39bc0dcff153f614e806b51e82bc19ed07f4b', '7cc8c1f88adcf63919c68b9d6829e7a7', 'ADMIN', 6, 1, 'secure', 'Wed 30.03.2022 06:08:15 PM');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accessLogs`
--
ALTER TABLE `accessLogs`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accessLogs`
--
ALTER TABLE `accessLogs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
