-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2024 at 10:44 AM
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
-- Database: `digicampus`
--

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `name` varchar(50) NOT NULL,
  `roll` int(20) NOT NULL,
  `year` int(50) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `ut1` int(10) NOT NULL,
  `ut2` int(10) NOT NULL,
  `assignment` int(10) NOT NULL,
  `report` int(10) NOT NULL,
  `practicals` int(10) NOT NULL,
  `attendence` double NOT NULL,
  `internalmarks` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marks`
--

INSERT INTO `marks` (`name`, `roll`, `year`, `subject`, `ut1`, `ut2`, `assignment`, `report`, `practicals`, `attendence`, `internalmarks`) VALUES
('Kesar', 2101300105, 1, 'Pharmaceutical Chemistry', 20, 20, 5, 5, 35, 0.02, 50),
('Kesar Bang', 2101300131, 1, 'Pharmaceutics', 19, 19, 5, 4, 38, 0.02, 28);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
