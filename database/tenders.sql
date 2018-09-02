-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 02, 2018 at 09:05 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `bids`
--

CREATE TABLE `bids` (
  `_id` int(11) NOT NULL,
  `tender_id` int(11) NOT NULL,
  `bid_company` int(11) NOT NULL,
  `bid_kra` varchar(100) NOT NULL,
  `bid_amount` int(11) NOT NULL,
  `bid_by` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bids`
--

INSERT INTO `bids` (`_id`, `tender_id`, `bid_company`, `bid_kra`, `bid_amount`, `bid_by`, `date`) VALUES
(1, 1, 1, 'A00B24356', 800000, 1, '2018-08-30 23:34:00'),
(2, 1, 3, 'P0895678YU', 950000, 4, '2018-08-30 23:35:43');

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
(2, 'HTOPM/2015', 'A8766B5F99', 'Ngich Inc', '079876543', 'info@ngich.org', 'yw', '2018-02-17 18:35:38'),
(3, 'XCPM/2016', 'P0895678YU', 'Hen Enterprises', '079877553', 'info@hen.org', 'y', '2018-02-17 18:35:38'),
(4, 'DFXCT-2014/2334', 'A0056778Y', 'Dento Int', '0789654321', 'info@dento.com', 'g', '2018-09-01 23:23:08'),
(5, 'DFXCT-2013/879890', 'A0045167PO', 'Pizza Out', '0722345678', 'order@pizzaout.com', 'g', '2018-09-01 23:33:04');

-- --------------------------------------------------------

--
-- Table structure for table `tenders`
--

CREATE TABLE `tenders` (
  `_id` int(11) NOT NULL,
  `tender_number` varchar(100) NOT NULL,
  `tender_cat` varchar(50) NOT NULL,
  `tender_type` varchar(50) NOT NULL,
  `tender_security` varchar(50) NOT NULL DEFAULT '0',
  `tender_closing` varchar(100) NOT NULL,
  `tender_desc` text NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `tender_bids` int(11) NOT NULL,
  `awarded` tinyint(1) NOT NULL,
  `tender_awarded` varchar(100) DEFAULT NULL,
  `bid_amount` int(11) DEFAULT NULL,
  `expired` tinyint(1) NOT NULL DEFAULT '0',
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenders`
--

INSERT INTO `tenders` (`_id`, `tender_number`, `tender_cat`, `tender_type`, `tender_security`, `tender_closing`, `tender_desc`, `added_by`, `approved`, `tender_bids`, `awarded`, `tender_awarded`, `bid_amount`, `expired`, `dateadded`) VALUES
(1, 'TNT-T/MOF/OT/040/2017-2018', 'oa', 'Consultancy services', '100000', '2018-02-28', 'Consultancy services for public sector Economic & fiscal policy reform', 'Admin', 1, 2, 0, 'Delink Creations', 1300000, 0, '2018-02-25 10:29:26'),
(2, 'TNT-T/2018/H34J45', 'w', 'Cleaning', '20000', '2018-09-20', 'The prices quoted shall be inclusive of out-of-the-pocket expenses. While filling up the \r\n5\r\nprices, the tenderer shall ensure that there are no discrepancy in the prices mentioned in\r\nfigures and words. In case of any discrepancy in the prices, the prices in word in shall be\r\ntaken as final and binding. Failure to quote the prices for all items shall lead to rejection of\r\ntender.', 'Officer', 1, 134, 1, 'New Company', 1500000, 0, '2018-08-29 20:10:03'),
(3, 'TNT-T/2018/XCVT-112', 'm', 'Stationaries', '50000', '2018-09-28', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.', 'Officer', 0, 0, 0, '', 0, 0, '2018-08-30 19:24:27');

-- --------------------------------------------------------

--
-- Table structure for table `tenders_applications`
--

CREATE TABLE `tenders_applications` (
  `_id` int(11) NOT NULL,
  `tender` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `kra` varchar(11) NOT NULL,
  `applyby` int(11) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tenders_applications`
--

INSERT INTO `tenders_applications` (`_id`, `tender`, `company`, `kra`, `applyby`, `dateadded`) VALUES
(1, 1, 5, 'A0045167PO', 4, '2018-09-02 00:02:24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nationalId` varchar(10) NOT NULL,
  `company` int(11) DEFAULT NULL,
  `password` varchar(1000) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`_id`, `firstname`, `lastname`, `username`, `category`, `email`, `nationalId`, `company`, `password`, `dateadded`) VALUES
(1, 'Admin', 'Admin', 'Admin', 'admin', 'admin@me.com', '3456789', NULL, 'admin321', '2018-02-16 18:14:19'),
(3, 'Officer', 'Officer', 'Officer', 'officer', 'officer@gmail.com', '3687346', NULL, 'officer', '2018-02-17 17:23:11'),
(4, 'Supplier', 'Supplier', 'Supplier', 'supplier', 'supplier@gmail.com', '6783423', 5, 'supplier', '2018-02-17 17:23:11'),
(5, 'User', 'User', 'user', 'supplier', 'user@gmail.com', '556778', NULL, 'user321', '2018-09-01 20:40:42'),
(6, 'Officer', 'Officer', 'officer1', 'officer', 'officer1@gmail.com', '6678890', NULL, 'officer', '2018-09-01 22:25:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bids`
--
ALTER TABLE `bids`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `tender_id` (`tender_id`),
  ADD KEY `bid_by` (`bid_by`),
  ADD KEY `company` (`bid_company`) USING BTREE;

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `tenders`
--
ALTER TABLE `tenders`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `awarded` (`awarded`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `tenders_applications`
--
ALTER TABLE `tenders_applications`
  ADD PRIMARY KEY (`_id`),
  ADD KEY `user` (`applyby`),
  ADD KEY `company` (`company`),
  ADD KEY `tender` (`tender`);

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
-- AUTO_INCREMENT for table `bids`
--
ALTER TABLE `bids`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tenders`
--
ALTER TABLE `tenders`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tenders_applications`
--
ALTER TABLE `tenders_applications`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
