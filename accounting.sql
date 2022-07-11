-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2022 at 09:23 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounting`
--

-- --------------------------------------------------------

--
-- Table structure for table `centers`
--

CREATE TABLE `centers` (
  `id` int(11) NOT NULL,
  `name_center` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name_company` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_expenses`
--

CREATE TABLE `invoice_expenses` (
  `invoice_num` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_amount` int(11) NOT NULL,
  `center` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `statement` text CHARACTER SET utf8mb4 NOT NULL,
  `send_society` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `check_issue` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `check_receipt` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `cash_a_check` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `budget_recording` text CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_revenues`
--

CREATE TABLE `invoice_revenues` (
  `invoice_num` int(11) NOT NULL,
  `invoice_date` date NOT NULL,
  `invoice_amount` int(11) NOT NULL,
  `center` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `company` int(11) NOT NULL,
  `statement` text CHARACTER SET utf8mb4 NOT NULL,
  `send_society` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `check_issue` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `check_receipt` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `cash_a_check` text CHARACTER SET utf8mb4 DEFAULT NULL,
  `budget_recording` text CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `name_section` varchar(100) NOT NULL,
  `id_center` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(16) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`) VALUES
(1, 'saeyd', '25585100', 'السيد جمال الأخرسي'),
(2, 'test', '12345678', 'الغالي');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `centers`
--
ALTER TABLE `centers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_expenses`
--
ALTER TABLE `invoice_expenses`
  ADD PRIMARY KEY (`invoice_num`),
  ADD KEY `center` (`center`),
  ADD KEY `section` (`section`),
  ADD KEY `company` (`company`);

--
-- Indexes for table `invoice_revenues`
--
ALTER TABLE `invoice_revenues`
  ADD PRIMARY KEY (`invoice_num`),
  ADD KEY `center` (`center`),
  ADD KEY `section` (`section`),
  ADD KEY `company` (`company`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_center` (`id_center`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `centers`
--
ALTER TABLE `centers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_expenses`
--
ALTER TABLE `invoice_expenses`
  MODIFY `invoice_num` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoice_revenues`
--
ALTER TABLE `invoice_revenues`
  MODIFY `invoice_num` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice_expenses`
--
ALTER TABLE `invoice_expenses`
  ADD CONSTRAINT `invoice_expenses_ibfk_1` FOREIGN KEY (`center`) REFERENCES `centers` (`id`),
  ADD CONSTRAINT `invoice_expenses_ibfk_2` FOREIGN KEY (`section`) REFERENCES `sections` (`id`),
  ADD CONSTRAINT `invoice_expenses_ibfk_3` FOREIGN KEY (`company`) REFERENCES `companies` (`id`);

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_ibfk_1` FOREIGN KEY (`id_center`) REFERENCES `centers` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
