-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 20, 2022 at 10:28 AM
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

INSERT INTO `accessLogs` (`ID`, `IP`, `countryName`, `regionName`, `cityName`, `ZIP`, `Latitude`, `Longitude`, `ISP`, `Organization`, `TimeStamp`) VALUES
(1, '49.36.65.243', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.0276', '72.5871', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Tue 15.03.2022 06:41:50 PM'),
(2, '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:33:19 PM'),
(3, '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:33:37 PM'),
(4, '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:33:50 PM'),
(5, '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:34:28 PM'),
(6, '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:35:07 PM'),
(7, '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:36:16 PM'),
(8, '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:37:24 PM'),
(9, '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:38:28 PM'),
(10, '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:39:13 PM'),
(11, '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:39:47 PM'),
(12, '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:56:42 PM'),
(13, '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:56:56 PM'),
(14, '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:57:30 PM'),
(15, '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 12:58:26 PM'),
(16, '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 01:24:00 PM'),
(17, '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 01:24:40 PM'),
(18, '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 02:22:19 PM'),
(19, '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 02:22:45 PM'),
(20, '49.36.65.71', 'India', 'Gujarat', 'Ahmedabad', '380007', '23.027600', '72.587100', 'Reliance Jio Infocomm Limited', 'RJIL Gujarat FTTX PUBLIC', 'Sun 20.03.2022 02:31:34 PM');

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
  `lastLogin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Email`, `Password`, `saltValue`, `Privileges`, `accessCount`, `lastLogin`) VALUES
(1, 'Rushil Choksi', 'rushil.rc@gmail.com', '55b0d6c8483c5f106b881eca00f48121fbd9de4ae6c311acbc024e2f09e1819b', 'c6be99b9048cdc2cce3a84714bfa3e5a', 'CLIENT', 53, 'Sun 20.03.2022 02:55:31 PM');

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
