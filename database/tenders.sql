-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 25, 2018 at 01:30 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tenders`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `_id` int(11) NOT NULL,
  `company_reg` varchar(100) NOT NULL,
  `company_pin` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `comany_phone` varchar(100) NOT NULL,
  `company_email` varchar(100) NOT NULL,
  `company_cat` varchar(50) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`_id`, `company_reg`, `company_pin`, `company_name`, `comany_phone`, `company_email`, `company_cat`, `dateadded`) VALUES
(1, 'GHHYWUW2016', 'A00B24356', 'Delink Creations', '0723456790', 'delinkdesigns@gmail.com', 'y', '2018-02-16 19:08:55'),
(2, 'HTOPM/2015', 'A8766B5F99', 'Ngich Inc', '079876543', 'info@ngich.org', 'yw', '2018-02-17 18:35:38');

-- --------------------------------------------------------

--
-- Table structure for table `tenders`
--

CREATE TABLE `tenders` (
  `_id` int(11) NOT NULL,
  `tender_number` varchar(100) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `tender_cat` varchar(50) NOT NULL,
  `tender_type` varchar(50) NOT NULL,
  `tender_security` varchar(50) NOT NULL DEFAULT '0',
  `tender_closing` varchar(100) NOT NULL,
  `tender_desc` text NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `expired` tinyint(1) NOT NULL DEFAULT '0',
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenders`
--

INSERT INTO `tenders` (`_id`, `tender_number`, `company_name`, `tender_cat`, `tender_type`, `tender_security`, `tender_closing`, `tender_desc`, `added_by`, `approved`, `expired`, `dateadded`) VALUES
(1, 'CBK/MOF/OT/040/2017-2018', 'Delink Creations', 'oa', 'Consultancy services', '100000', '2018-02-28', 'Consultancy services for public sector Economic & fiscal policy reform', 'Admin', 1, 0, '2018-02-25 10:29:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nationalId` varchar(10) NOT NULL,
  `company` int(11) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`_id`, `firstname`, `lastname`, `username`, `email`, `nationalId`, `company`, `password`, `dateadded`) VALUES
(1, 'Admin', 'Admin', 'Admin', 'admin@me.com', '3456789', 1, 'admin321', '2018-02-16 18:14:19'),
(3, 'we', 'we', 'dm', 'd@gmail.com', '3687346', 1, 'dcdc123.', '2018-02-17 17:23:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tenders`
--
ALTER TABLE `tenders`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`_id`),
  ADD UNIQUE KEY `NATID` (`nationalId`),
  ADD KEY `COMPANY` (`company`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tenders`
--
ALTER TABLE `tenders`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
