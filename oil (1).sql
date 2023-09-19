-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 04:52 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oil`
--

-- --------------------------------------------------------

--
-- Table structure for table `20bar`
--

CREATE TABLE `20bar` (
  `id` int(11) NOT NULL,
  `cid` varchar(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `one` varchar(10) NOT NULL,
  `two` varchar(10) NOT NULL,
  `three` varchar(10) NOT NULL,
  `four` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `30bar`
--

CREATE TABLE `30bar` (
  `id` int(11) NOT NULL,
  `cid` varchar(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `one` varchar(10) NOT NULL,
  `two` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `uname` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`uname`, `pass`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `co`
--

CREATE TABLE `co` (
  `id` int(11) NOT NULL,
  `cid` varchar(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `one` varchar(10) NOT NULL,
  `two` varchar(10) NOT NULL,
  `three` varchar(10) NOT NULL,
  `four` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `id` int(11) NOT NULL,
  `stp` varchar(10) NOT NULL,
  `so` varchar(10) NOT NULL,
  `vco` varchar(10) NOT NULL,
  `co` varchar(10) NOT NULL,
  `mo` varchar(10) NOT NULL,
  `rbo1` varchar(10) NOT NULL,
  `rbo2` varchar(10) NOT NULL,
  `sfo` varchar(10) NOT NULL,
  `20bar` varchar(10) NOT NULL,
  `30bar` varchar(10) NOT NULL,
  `1st` varchar(10) NOT NULL,
  `2nd` varchar(10) NOT NULL,
  `30barp` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`id`, `stp`, `so`, `vco`, `co`, `mo`, `rbo1`, `rbo2`, `sfo`, `20bar`, `30bar`, `1st`, `2nd`, `30barp`) VALUES
(1, '800', '16', '40', '90', '27', '18', '14', '20', '2.4', '100', '105', '140', '60');

-- --------------------------------------------------------

--
-- Table structure for table `etp`
--

CREATE TABLE `etp` (
  `id` int(11) NOT NULL,
  `cid` varchar(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `one` varchar(10) NOT NULL,
  `two` varchar(10) NOT NULL,
  `three` varchar(10) NOT NULL,
  `four` varchar(10) NOT NULL,
  `five` varchar(10) NOT NULL,
  `six` varchar(10) NOT NULL,
  `seven` varchar(10) NOT NULL,
  `eight` varchar(10) NOT NULL,
  `nine` varchar(10) NOT NULL,
  `ten` varchar(10) NOT NULL,
  `eleven` varchar(10) NOT NULL,
  `twelve` varchar(10) NOT NULL,
  `thirteen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mo`
--

CREATE TABLE `mo` (
  `id` int(11) NOT NULL,
  `cid` varchar(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `one` varchar(10) NOT NULL,
  `two` varchar(10) NOT NULL,
  `three` varchar(10) NOT NULL,
  `four` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rbo`
--

CREATE TABLE `rbo` (
  `id` int(11) NOT NULL,
  `cid` varchar(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `one` varchar(10) NOT NULL,
  `two` varchar(10) NOT NULL,
  `three` varchar(10) NOT NULL,
  `four` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sfo`
--

CREATE TABLE `sfo` (
  `id` int(11) NOT NULL,
  `cid` varchar(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `one` varchar(10) NOT NULL,
  `two` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sheaoil`
--

CREATE TABLE `sheaoil` (
  `id` int(11) NOT NULL,
  `cid` varchar(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `one` varchar(10) NOT NULL,
  `two` varchar(10) NOT NULL,
  `three` varchar(10) NOT NULL,
  `four` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stp`
--

CREATE TABLE `stp` (
  `id` int(11) NOT NULL,
  `cid` varchar(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `one` varchar(10) NOT NULL,
  `two` varchar(10) NOT NULL,
  `three` varchar(10) NOT NULL,
  `four` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stp`
--

INSERT INTO `stp` (`id`, `cid`, `name`, `one`, `two`, `three`, `four`) VALUES
(1, '', '', '10', '10000', '24', '416.666666'),
(2, '1', 'gowtham', '10', '10000', '24', '416.666666');

-- --------------------------------------------------------

--
-- Table structure for table `vco`
--

CREATE TABLE `vco` (
  `id` int(11) NOT NULL,
  `cid` varchar(10) NOT NULL,
  `name` varchar(10) NOT NULL,
  `one` varchar(10) NOT NULL,
  `two` varchar(10) NOT NULL,
  `three` varchar(10) NOT NULL,
  `four` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `20bar`
--
ALTER TABLE `20bar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `30bar`
--
ALTER TABLE `30bar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `co`
--
ALTER TABLE `co`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `etp`
--
ALTER TABLE `etp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mo`
--
ALTER TABLE `mo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rbo`
--
ALTER TABLE `rbo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sfo`
--
ALTER TABLE `sfo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sheaoil`
--
ALTER TABLE `sheaoil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stp`
--
ALTER TABLE `stp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vco`
--
ALTER TABLE `vco`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `20bar`
--
ALTER TABLE `20bar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `30bar`
--
ALTER TABLE `30bar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `co`
--
ALTER TABLE `co`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `etp`
--
ALTER TABLE `etp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mo`
--
ALTER TABLE `mo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rbo`
--
ALTER TABLE `rbo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sfo`
--
ALTER TABLE `sfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sheaoil`
--
ALTER TABLE `sheaoil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stp`
--
ALTER TABLE `stp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vco`
--
ALTER TABLE `vco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
