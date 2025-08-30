-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2025 at 03:47 AM
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
  `weight` decimal(20,3) NOT NULL,
  `risk_type` varchar(50) NOT NULL,
  `price` int(10) NOT NULL,
  `status_id` int(100) NOT NULL COMMENT '1 = Accepted by courier,\r\n2 = In transit,\r\n3 = Arrived at destination,\r\n4 = Ready for delivery,\r\n5 = Delivered,\r\n6 = Delivery unsuccessful',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parcels`
--

INSERT INTO `parcels` (`id`, `order_id`, `created_by`, `sender_name`, `sender_address`, `sender_contact`, `sender_nid`, `recipient_name`, `recipient_add`, `recipient_contact`, `from_br_id`, `to_br_id`, `weight`, `risk_type`, `price`, `status_id`, `created_at`) VALUES
(1, 'NEX1154', 2, 'Nayeem', 'Lakshmipur', '01744579851', '123 123 1234', 'Osman Goni', 'Barishal', '01797147515', 1, 10, 0.024, 'Low', 125, 2, '2025-08-25 00:07:21'),
(2, 'NEX2212', 9, 'Hares', 'netrokona', '01341235456', '1451251452', 'Osman Goni', 'Dhaka', '01797147515', 9, 8, 1.420, 'Low', 125, 3, '2025-08-25 01:17:27'),
(3, 'NEX1454', 5, 'Hares', 'mandari lakshmipur', '01341235456', '1451251452', 'Osman Goni', 'Dhaka', '01797147515', 5, 7, 0.485, 'Low', 125, 5, '2025-08-25 01:17:46'),
(4, 'NEX304060', 10, 'sajid', 'barisal', '01341235456', '123 123 1234', 'konok', 'netrokona', '01797147515', 10, 9, 0.485, 'Low', 130, 1, '2025-08-29 12:20:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `parcels`
--
ALTER TABLE `parcels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `parcels`
--
ALTER TABLE `parcels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
