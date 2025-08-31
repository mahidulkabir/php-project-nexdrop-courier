-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2025 at 04:02 AM
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
  `br_name` varchar(100) NOT NULL,
  `road` varchar(20) DEFAULT NULL,
  `upazilla` varchar(20) DEFAULT NULL,
  `zilla` varchar(20) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `br_name`, `road`, `upazilla`, `zilla`, `contact`, `created_at`) VALUES
(1, 'lakshmipur sadar main', 'uttar station, rahim', 'lakshmipur Sadar', 'lakshmipur', '01718191101', '2025-08-25 11:47:08'),
(3, 'raypur lakshmipur', 'high school road', 'raypur', 'lakshmipur', '01718191101', '2025-08-25 11:47:35'),
(5, 'mandari lakshmipur', 'main road', 'lakshmipur Sadar', 'lakshmipur', '01635894852', '2025-08-25 16:53:49'),
(6, 'ctg main', 'barek building', 'anderkilla', 'chattogram', '01725365986', '2025-08-25 16:59:17'),
(7, 'comilla main', 'bokul market', 'comilla sadar', 'comilla', '01856425888', '2025-08-25 17:00:07'),
(8, 'dhaka main', 'Ratul plaza', 'gulshan', 'dhaka', '01718191101', '2025-08-25 17:02:31'),
(9, 'netrokona main', 'bus station road', 'netrokona sadar', 'netrokona', '01564123366', '2025-08-27 05:06:10'),
(10, 'barishal main', 'rupatoli', 'barishal sadar', 'barishal', '01526447884', '2025-08-27 05:06:57');

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
(2, 'NEX2212', 9, 'Hares', 'netrokona', '01341235456', '1451251452', 'Osman Goni', 'Dhaka', '01797147515', 9, 8, 1.420, 'Low', 125, 6, '2025-08-25 01:17:27'),
(3, 'NEX1454', 5, 'Hares', 'mandari lakshmipur', '01341235456', '1451251452', 'Osman Goni', 'Dhaka', '01797147515', 5, 7, 0.485, 'Low', 125, 5, '2025-08-25 01:17:46'),
(4, 'NEX304060', 10, 'sajid', 'barisal', '01341235456', '123 123 1234', 'konok', 'netrokona', '01797147515', 10, 9, 0.485, 'Low', 130, 3, '2025-08-29 12:20:00'),
(9, 'NEX656202', 0, 'Masum Kabir', 'Rehan uddin bhuiyan Road, Lakshmipur sadar, lakshmipur.', '01715052430', '458 457 3636', 'Shifat Kabir', 'dhanmondi, Dhaka', '01548123666', 1, 8, 0.480, 'high', 170, 3, '2025-08-30 23:59:52'),
(10, 'NEX553078', 0, 'Nishat', 'Lakshmipur sadar', '01744579851', '458 457 3636', 'Shifat Kabir', 'comilla sadar', '01797147515', 1, 7, 1.800, 'low', 170, 4, '2025-08-31 00:55:59');

-- --------------------------------------------------------

--
-- Table structure for table `parcel_status`
--

CREATE TABLE `parcel_status` (
  `id` int(11) NOT NULL,
  `status_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parcel_status`
--

INSERT INTO `parcel_status` (`id`, `status_name`) VALUES
(1, 'Accepted By Courier'),
(2, 'In Transit'),
(3, 'Arrived at Destination'),
(4, 'Ready for Delivery'),
(5, 'Delivered'),
(6, 'Delivery Unsuccessful');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `emp_id` varchar(20) NOT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(15) DEFAULT NULL,
  `contact` varchar(15) NOT NULL,
  `role` int(11) NOT NULL COMMENT '1 = admin, 2=employee',
  `branch_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `emp_id`, `first_name`, `last_name`, `email`, `password`, `contact`, `role`, `branch_id`, `created_at`) VALUES
(1, 'admin', 'Mahidul', 'Kabir', 'admin@nexdrop.com', '123', '01706513542', 1, 0, '2025-08-30 10:54:41'),
(2, 'nexemp001', 'Osman ', 'Goni', 'osman@nexdrop.com', '123', '01718191101', 2, 1, '2025-08-30 10:54:41'),
(3, 'nexemp002', 'Meshkat ', 'Kabir', 'meshkat@nexdrop.com', '123', '01718191101', 2, 3, '2025-08-30 10:54:41'),
(5, 'nexemp003', 'casio', 'marma', 'casio@nexdrop.com', '123', '0195124856', 2, 5, '2025-08-30 10:54:41'),
(6, 'nexemp004', 'junayed', 'siddique', 'junayed@nexdrop.com', '123', '01658452236', 2, 6, '2025-08-30 10:54:41'),
(7, 'nexemp005', 'bilashi', 'banu', 'bilashi@nexdrop.com', '123', '01365458595', 2, 7, '2025-08-30 10:54:41'),
(8, 'nexemp006', 'saiful', 'islam', 'saiful@nexdrop.com', '123', '01426663314', 2, 8, '2025-08-30 10:54:41'),
(9, 'nexemp009', 'shoriful ', 'hoq', 'shoriful@nexdrop.com', '123', '01456778887', 2, 9, '2025-08-30 10:54:41'),
(10, 'nexemp010', 'miraj ', 'billah', 'miraj@nexdrop.com', '123', '01645232344', 2, 10, '2025-08-30 10:54:41');

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
-- Indexes for table `parcel_status`
--
ALTER TABLE `parcel_status`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `parcels`
--
ALTER TABLE `parcels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `parcel_status`
--
ALTER TABLE `parcel_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
