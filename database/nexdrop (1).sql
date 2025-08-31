-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2025 at 04:01 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nexdrop`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(11) NOT NULL,
  `road` varchar(20) DEFAULT NULL,
  `upazilla` varchar(20) DEFAULT NULL,
  `zilla` varchar(20) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `road`, `upazilla`, `zilla`, `contact`, `created_at`) VALUES
(1, 'uttar station', 'lakshmipur Sadar', 'lakshmipur', '01715052430', '2025-08-19 01:04:23'),
(3, 'high school road', 'raypur', 'lakshmipur', '01718191101', '2025-08-19 01:22:55');

-- --------------------------------------------------------

--
-- Table structure for table `parcels`
--

CREATE TABLE `parcels` (
  `id` int(11) NOT NULL,
  `order_id` varchar(20) NOT NULL,
  `created_by` int(11) NOT NULL,
  `sender_name` varchar(100) NOT NULL,
  `sender_address` varchar(200) NOT NULL,
  `sender_contact` varchar(50) NOT NULL,
  `sender_nid` varchar(20) NOT NULL,
  `recipient_name` varchar(100) NOT NULL,
  `recipient_add` varchar(200) NOT NULL,
  `recipient_contact` varchar(50) NOT NULL,
  `from_br_id` int(10) NOT NULL,
  `to_br_id` int(10) NOT NULL,
  `weight` int(20) NOT NULL,
  `risk_type` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `contact` varchar(15) NOT NULL,
  `role` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `contact`, `role`, `branch_id`, `created_at`) VALUES
(1, 'Mahidul', 'Kabir', 'mahidulkabir8@gmail.com', '123', '01706513542', 1, 0, '2025-08-13 09:24:21'),
(2, 'Osman ', 'Goni', 'Osman@goni.com', '1234', '01718191101', 2, 2, '2025-08-20 01:11:02'),
(3, 'Meshkat ', 'Kabir', 'meshkat@gmail.com', '123', '01718191101', 2, 4, '2025-08-20 01:19:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcels`
--
ALTER TABLE `parcels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `parcels`
--
ALTER TABLE `parcels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
