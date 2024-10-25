-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2024 at 06:46 AM
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
-- Database: `cpe`
--

-- --------------------------------------------------------

--
-- Table structure for table `classroom_usage_records`
--

CREATE TABLE `classroom_usage_records` (
  `id` int(11) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `classroom_id` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classroom_usage_records`
--

INSERT INTO `classroom_usage_records` (`id`, `teacher_name`, `classroom_id`, `start_time`, `end_time`) VALUES
(33, 'Shruti', 1234, '2024-02-19 21:33:00', '2024-02-19 22:34:00'),
(34, 'Shabbir', 1, '2024-10-04 07:30:00', '2024-10-04 08:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `std`
--

CREATE TABLE `std` (
  `person` int(10) DEFAULT NULL,
  `last` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `std`
--

INSERT INTO `std` (`person`, `last`) VALUES
(1, 'Shruti'),
(2, 'kesar'),
(3, 'Radha');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classroom_usage_records`
--
ALTER TABLE `classroom_usage_records`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `classroom_usage_records`
--
ALTER TABLE `classroom_usage_records`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
