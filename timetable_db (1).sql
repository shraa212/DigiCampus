-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 27, 2024 at 05:09 PM
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
-- Database: `timetable_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `day_of_week` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `faculty_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `department_name`, `day_of_week`, `start_time`, `end_time`, `subject_name`, `faculty_name`) VALUES
(655, 'E&TC', 'Monday', '09:00:00', '10:00:00', 'Digital Electronics', 'Dr. Anderson'),
(656, 'E&TC', 'Monday', '10:00:00', '11:00:00', 'Control Systems', 'Prof. White'),
(657, 'E&TC', 'Monday', '11:00:00', '12:00:00', 'Embedded Systems', 'Dr. Hall'),
(658, 'E&TC', 'Tuesday', '09:00:00', '10:00:00', 'Signal Processing', 'Prof. Green'),
(659, 'E&TC', 'Tuesday', '10:00:00', '11:00:00', 'Digital Communication', 'Dr. Brown'),
(660, 'E&TC', 'Wednesday', '09:00:00', '10:00:00', 'Microprocessors', 'Prof. Black'),
(661, 'E&TC', 'Wednesday', '14:00:00', '15:00:00', 'Digital Electronics', 'Dr. Anderson'),
(662, 'E&TC', 'Thursday', '10:00:00', '11:00:00', 'Control Systems', 'Prof. White'),
(663, 'E&TC', 'Friday', '09:00:00', '10:00:00', 'Embedded Systems', 'Dr. Hall'),
(664, 'E&TC', 'Friday', '10:00:00', '11:00:00', 'Digital Communication', 'Dr. Brown'),
(665, 'CS', 'Monday', '09:00:00', '10:00:00', 'Data Structures', 'Prof. Taylor'),
(666, 'CS', 'Monday', '10:00:00', '11:00:00', 'Algorithms', 'Dr. Smith'),
(667, 'CS', 'Tuesday', '09:00:00', '10:00:00', 'Operating Systems', 'Prof. Johnson'),
(668, 'CS', 'Tuesday', '14:00:00', '15:00:00', 'Database Management', 'Dr. Martinez'),
(669, 'CS', 'Wednesday', '09:00:00', '10:00:00', 'Software Engineering', 'Dr. Davis'),
(670, 'CS', 'Thursday', '10:00:00', '11:00:00', 'Algorithms', 'Dr. Smith'),
(671, 'CS', 'Friday', '09:00:00', '10:00:00', 'Operating Systems', 'Prof. Johnson'),
(672, 'CS', 'Friday', '10:00:00', '11:00:00', 'Database Management', 'Dr. Martinez'),
(673, 'IT', 'Monday', '09:00:00', '10:00:00', 'Cybersecurity', 'Dr. Young'),
(674, 'IT', 'Monday', '10:00:00', '11:00:00', 'Networking', 'Prof. Brown'),
(675, 'IT', 'Tuesday', '09:00:00', '10:00:00', 'Web Development', 'Dr. Green'),
(676, 'IT', 'Wednesday', '10:00:00', '11:00:00', 'Software Testing', 'Prof. Black'),
(677, 'IT', 'Thursday', '09:00:00', '10:00:00', 'Networking', 'Prof. Brown'),
(678, 'IT', 'Friday', '09:00:00', '10:00:00', 'Information Systems', 'Prof. Walker'),
(679, 'CE', 'Monday', '09:00:00', '10:00:00', 'Structural Engineering', 'Dr. King'),
(680, 'CE', 'Tuesday', '10:00:00', '11:00:00', 'Transportation Engineering', 'Prof. Adams'),
(681, 'CE', 'Wednesday', '09:00:00', '10:00:00', 'Fluid Mechanics', 'Prof. Davis'),
(682, 'CE', 'Wednesday', '14:00:00', '15:00:00', 'Geotechnical Engineering', 'Dr. Smith'),
(683, 'CE', 'Thursday', '10:00:00', '11:00:00', 'Environmental Engineering', 'Dr. White'),
(684, 'CE', 'Friday', '09:00:00', '10:00:00', 'Transportation Engineering', 'Prof. Adams'),
(685, 'ME', 'Monday', '09:00:00', '10:00:00', 'Thermodynamics', 'Dr. Anderson'),
(686, 'ME', 'Monday', '10:00:00', '11:00:00', 'Fluid Mechanics', 'Prof. Davis'),
(687, 'ME', 'Tuesday', '09:00:00', '10:00:00', 'Machine Design', 'Dr. Brown'),
(688, 'ME', 'Wednesday', '09:00:00', '10:00:00', 'Thermal Engineering', 'Prof. Black'),
(689, 'ME', 'Thursday', '10:00:00', '11:00:00', 'Manufacturing Processes', 'Prof. White'),
(690, 'ME', 'Friday', '09:00:00', '10:00:00', 'Thermodynamics', 'Dr. Anderson'),
(691, 'EE', 'Monday', '09:00:00', '10:00:00', 'Circuit Analysis', 'Dr. Adams'),
(692, 'EE', 'Tuesday', '09:00:00', '10:00:00', 'Power Systems', 'Prof. Lee'),
(693, 'EE', 'Wednesday', '09:00:00', '10:00:00', 'Digital Circuits', 'Prof. Black'),
(694, 'EE', 'Thursday', '10:00:00', '11:00:00', 'Electromagnetics', 'Dr. Brown'),
(695, 'EE', 'Friday', '09:00:00', '10:00:00', 'Circuit Analysis', 'Dr. Adams'),
(696, 'AIDS', 'Monday', '09:00:00', '10:00:00', 'Healthcare Informatics', 'Dr. White'),
(697, 'AIDS', 'Monday', '10:00:00', '11:00:00', 'Public Health', 'Prof. Green'),
(698, 'AIDS', 'Tuesday', '09:00:00', '10:00:00', 'Epidemiology', 'Dr. Brown'),
(699, 'AIDS', 'Wednesday', '09:00:00', '10:00:00', 'Bioinformatics', 'Dr. Davis'),
(700, 'AIDS', 'Thursday', '10:00:00', '11:00:00', 'Health Policy', 'Prof. Black'),
(701, 'A&R', 'Monday', '09:00:00', '10:00:00', 'Digital Media', 'Dr. Lee'),
(702, 'A&R', 'Tuesday', '09:00:00', '10:00:00', 'Graphic Design', 'Prof. Young'),
(703, 'A&R', 'Wednesday', '09:00:00', '10:00:00', 'Animation', 'Dr. White'),
(704, 'A&R', 'Thursday', '09:00:00', '10:00:00', 'Film Studies', 'Prof. Black'),
(705, 'A&R', 'Friday', '09:00:00', '10:00:00', 'Photography', 'Dr. Green'),
(706, 'E&TC', 'Monday', '14:00:00', '15:00:00', 'Microprocessors', 'Dr. Hall'),
(707, 'E&TC', 'Thursday', '09:00:00', '10:00:00', 'Signal Processing', 'Prof. Green'),
(708, 'CS', 'Wednesday', '14:00:00', '15:00:00', 'Data Structures', 'Prof. Taylor'),
(709, 'IT', 'Thursday', '14:00:00', '15:00:00', 'Web Development', 'Dr. Green'),
(710, 'CE', 'Friday', '10:00:00', '11:00:00', 'Fluid Mechanics', 'Prof. Davis'),
(711, 'ME', 'Tuesday', '14:00:00', '15:00:00', 'Machine Design', 'Dr. Brown'),
(712, 'EE', 'Thursday', '09:00:00', '10:00:00', 'Power Systems', 'Prof. Lee'),
(713, 'AIDS', 'Friday', '14:00:00', '15:00:00', 'Public Health', 'Dr. White'),
(714, 'A&R', 'Tuesday', '14:00:00', '15:00:00', 'Digital Media', 'Dr. Lee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=715;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
