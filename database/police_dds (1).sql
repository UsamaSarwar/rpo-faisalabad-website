-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2021 at 03:59 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `police_dds`
--

-- --------------------------------------------------------

--
-- Table structure for table `authority`
--

CREATE TABLE `authority` (
  `id` int(11) NOT NULL,
  `authority_name` varchar(225) NOT NULL,
  `code` varchar(225) NOT NULL,
  `remarks` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authority`
--

INSERT INTO `authority` (`id`, `authority_name`, `code`, `remarks`) VALUES
(1, 'IG', 'IG', 'AUTHORITY'),
(3, 'CM', 'cm', ''),
(4, 'G', 'G', 'g'),
(5, 'D', 'D', 'D'),
(6, 'PM', 'PM', 'PM');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `branch_name` varchar(225) NOT NULL,
  `short_code` varchar(225) NOT NULL,
  `remarks` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branch_name`, `short_code`, `remarks`) VALUES
(1, 'Establishment 1', 'E-1', 'New Branch'),
(2, 'Establishment 2', 'E-2', 'new branch'),
(3, 'Establishment 3', 'E-3', 'E-3'),
(4, 'Development Clerk', 'AC-4', 'AC-4'),
(5, 'Personal Secretary', 'PS', 'PS'),
(6, 'Information Technology Wing', 'ITW', 'ITW'),
(7, 'Crime Analysis Branch', 'AC-3', 'AC-3'),
(8, 'Account Branch ', 'Acct', 'Acct'),
(9, 'Character Roll Certificate', 'CRC', 'CRC'),
(10, 'DSP/Legal', 'DSP/L', 'DSP/L'),
(11, 'SP/Legal', 'SP/L', 'SP/L'),
(12, 'Regional Security Branch ', 'RSB', 'RSB'),
(13, 'Complaint Branch', 'CC', 'CC'),
(14, 'Reader Branch ', 'RB', 'RB'),
(15, 'R.Auditor ', 'RA', 'RA'),
(16, 'PRO', 'PRO', 'PRO'),
(17, 'Asisstant Director ', 'AD', 'AD'),
(18, 'SP RIB', 'SP-RIB', 'SP RIB'),
(19, 'Assistant DIG', 'ADIG', 'ADIG'),
(20, 'Prime Minister Delivery Unit', 'PMDU', 'PMDU'),
(21, 'Regional Monitoring Unit', 'RMU', 'RMU'),
(22, 'Legal Branch ', 'Legal', 'Legal'),
(23, 'Internal Acccountibility Branch', 'IAB', 'IAB'),
(24, 'inspector Vigilance ', 'IV', 'IV');

-- --------------------------------------------------------

--
-- Table structure for table `branch_mark`
--

CREATE TABLE `branch_mark` (
  `id` int(11) NOT NULL,
  `diary_number` varchar(225) NOT NULL,
  `branch_dispatch_no` varchar(225) NOT NULL,
  `dispatch_date` varchar(225) NOT NULL,
  `marked_to` int(11) NOT NULL,
  `officer_name` varchar(225) NOT NULL,
  `due_date` varchar(225) NOT NULL,
  `file` varchar(225) NOT NULL,
  `current_status` varchar(225) NOT NULL,
  `remarks` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch_mark`
--

INSERT INTO `branch_mark` (`id`, `diary_number`, `branch_dispatch_no`, `dispatch_date`, `marked_to`, `officer_name`, `due_date`, `file`, `current_status`, `remarks`) VALUES
(7, '2145', '2548', '2021-10-05', 1, 'ahmad', '2021-10-20', '1890437.jpg', 'Pending', 'data');

-- --------------------------------------------------------

--
-- Table structure for table `distric`
--

CREATE TABLE `distric` (
  `id` int(11) NOT NULL,
  `division_name` varchar(225) NOT NULL,
  `distric` varchar(225) NOT NULL,
  `remarks` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `distric`
--

INSERT INTO `distric` (`id`, `division_name`, `distric`, `remarks`) VALUES
(1, 'Faisalabad', 'Faisalabad', 'New Distric'),
(2, 'Faisalabad', 'Chiniot', 'new district'),
(3, 'Faisalabad', 'Jhang', ''),
(4, 'Faisalabad', 'Toba Tek Singh', 'Toba Tek Singh');

-- --------------------------------------------------------

--
-- Table structure for table `main_letter`
--

CREATE TABLE `main_letter` (
  `id` int(11) NOT NULL,
  `dairy_number` varchar(225) NOT NULL,
  `dispatch_no` varchar(225) NOT NULL,
  `received_date` varchar(225) NOT NULL,
  `received_time` varchar(225) NOT NULL,
  `received_from` varchar(225) NOT NULL,
  `diary_source` varchar(225) NOT NULL,
  `dispatch_date` varchar(225) NOT NULL,
  `due_date` varchar(225) NOT NULL,
  `marked_to` int(11) NOT NULL,
  `status` varchar(225) NOT NULL,
  `file` varchar(225) NOT NULL,
  `remarks` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_letter`
--

INSERT INTO `main_letter` (`id`, `dairy_number`, `dispatch_no`, `received_date`, `received_time`, `received_from`, `diary_source`, `dispatch_date`, `due_date`, `marked_to`, `status`, `file`, `remarks`) VALUES
(1, '2595', 'DG-154', '2021-10-05', '03:37:16', '1', 'By Hand', '2021-10-05', '2021-10-20', 1, 'Pending', '', 'DEMO'),
(2, '2545', 'ID-548', '2021-10-05', '03:39:11', '1', 'By Hand', '2021-10-05', '2021-10-19', 1, 'Pending', '', 'DEMO'),
(3, '2145', 'IG2145', '2021-10-05', '03:40:12', '1', 'By Hand', '2021-10-05', '2021-10-21', 1, 'Pending', '1890437.jpg', 'demo'),
(4, '2345', '3454', '2021-10-05', '11:24:23', '1', 'By Hand', '2021-10-05', '2021-10-14', 1, 'Pending', '', 'Remarks');

-- --------------------------------------------------------

--
-- Table structure for table `main_user`
--

CREATE TABLE `main_user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `re_password` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `type` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_user`
--

INSERT INTO `main_user` (`id`, `user_name`, `password`, `re_password`, `email`, `type`) VALUES
(1, 'usamasarwar', 'usama@@sarwar', 'usama@@sarwar', 'contact@usama.dev', 'main');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(225) NOT NULL,
  `cnic_number` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `re_password` varchar(225) NOT NULL,
  `number` varchar(225) NOT NULL,
  `user_type` varchar(225) NOT NULL,
  `department` varchar(225) NOT NULL,
  `remarks` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `cnic_number`, `password`, `re_password`, `number`, `user_type`, `department`, `remarks`) VALUES
(1, 'usamasarwar', '38103-4513937-7', 'usama@@sarwar', 'usama@@sarwar', '03100007773', 'branch', '6', 'ITW'),
(2, 'aliafzal', '33102-2376618-8', 'Ali@1234', 'Ali@1234', '03036290045', 'district', '3', 'JHG'),

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `type_name` varchar(225) NOT NULL,
  `type_value` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `type_name`, `type_value`) VALUES
(1, 'Branch', 'branch'),
(2, 'District', 'district'),
(3, 'Rpo Office', 'rpo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authority`
--
ALTER TABLE `authority`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch_mark`
--
ALTER TABLE `branch_mark`
  ADD PRIMARY KEY (`id`,`marked_to`);

--
-- Indexes for table `distric`
--
ALTER TABLE `distric`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_letter`
--
ALTER TABLE `main_letter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `marked_to` (`marked_to`);

--
-- Indexes for table `main_user`
--
ALTER TABLE `main_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authority`
--
ALTER TABLE `authority`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `branch_mark`
--
ALTER TABLE `branch_mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `distric`
--
ALTER TABLE `distric`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `main_letter`
--
ALTER TABLE `main_letter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `main_user`
--
ALTER TABLE `main_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
