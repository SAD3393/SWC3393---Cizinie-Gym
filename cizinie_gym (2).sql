-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 09:22 AM
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
-- Database: `cizinie_gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `ic_number` varchar(20) NOT NULL,
  `joining_date` date NOT NULL,
  `emergency_contact_person` varchar(255) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `membership_plan` enum('Trial Plan','Basic Plan','VIP Plan') DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `emergency_contact_number` varchar(15) NOT NULL,
  `gender` enum('male','female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `full_name`, `ic_number`, `joining_date`, `emergency_contact_person`, `relationship`, `membership_plan`, `price`, `phone`, `emergency_contact_number`, `gender`) VALUES
(1, 'Liu Yangyang', '000101123443', '2023-11-01', 'Kun', 'Brother', 'Trial Plan', 10.00, '0172354671', '0132675432', 'male'),
(2, 'Adreana Mikhayla Binti Rizky', '010919102444', '2023-11-05', 'Rizky', 'Father', 'Trial Plan', 10.00, '0182314567', '0127843910', 'female'),
(4, 'Aisy Daffa Bin Rafzan Jani', '020103102345', '2023-11-18', 'Rafzan', 'Father', '', 150.00, '0125436745', '01127865940', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `setting_admin`
--

CREATE TABLE `setting_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `setting_admin`
--

INSERT INTO `setting_admin` (`id`, `full_name`, `email`, `password`) VALUES
(1, 'Nur Syamimi', 'admin1@gmail.com', 'e00cf25ad42683b3df678c61f42c6bda'),
(2, 'Intan Sorfina', 'admin2@gmail.com', 'c84258e9c39059a89ab77d846ddab909'),
(3, 'Nur Alya Elisya', 'admin3@gmail.com', '32cacb2f994f6b42183a1300d9a3e8d6'),
(6, 'Nurul Nabillah', '', 'fc1ebc848e31e0a68e868432225e3c82');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `user_type`, `password`) VALUES
(0, 'user1', 'intan.sorfina.sahidan@gmail.com', 'user', '81dc9bdb52d04dc20036dbd8313ed055');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_admin`
--
ALTER TABLE `setting_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `setting_admin`
--
ALTER TABLE `setting_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
