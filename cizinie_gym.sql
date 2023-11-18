-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2023 at 12:12 PM
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
-- Database: `cizinie gym`
--

-- --------------------------------------------------------

--
-- Table structure for table `informationform`
--

CREATE TABLE `informationform` (
  `id` int(110) NOT NULL,
  `name` text NOT NULL,
  `gender` text NOT NULL,
  `idoption` text NOT NULL,
  `idnumber` varchar(16) NOT NULL,
  `birthdy` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `addressone` text NOT NULL,
  `addresstwo` text NOT NULL,
  `postcode` int(6) NOT NULL,
  `city` text NOT NULL,
  `country` text NOT NULL DEFAULT 'Malaysia',
  `phone` int(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `informationform`
--

INSERT INTO `informationform` (`id`, `name`, `gender`, `idoption`, `idnumber`, `birthdy`, `email`, `addressone`, `addresstwo`, `postcode`, `city`, `country`, `phone`) VALUES
(1, 'Dheo', 'male', 'NRIC', '980605061211', '1998-06-05', 'user1@gmail.com', 'No4 Jalan Maluri', 'Taman Maluri', 56000, 'Johor', 'Malaysia', 1112222),
(2, 'Intan Sorfina', 'female', 'NRIC', '040404010101', '2004-04-04', 'user5@gmail.com', 'No4 Jalan Maluri', 'Taman Cheras Baru', 56000, 'Kuala Lumpur', 'Malaysia', 1112345678),
(8, 'Mia Adriana', 'female', 'NRIC', '040302011109', '2004-03-02', 'user2@gmail.com', 'no2', 'no3', 80000, 'Johor', 'Malaysia', 123455599),
(10, 'Alexandar', 'female', 'NRIC', '000201146789', '2000-02-01', 'user4@gmail.com', '1002,Blok A,', 'Taman Cheras Baru', 56000, 'Kuala Lumpur', 'Malaysia', 11122333),
(12, 'Amirul Khuzairie', 'male', 'NRIC', '000509010110', '2000-05-09', 'user6@gmail.com', 'No40, Jalan Cempaka Indah', 'Taman Cempaka Indah', 56000, 'Kuala Lumpur', 'Malaysia', 1233455509);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(110) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `ic_number` varchar(20) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `joining_date` date NOT NULL,
  `emergency_contact_person` varchar(255) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `membership_plan` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `emergency_contact_number` varchar(15) NOT NULL,
  `gender` enum('male','female') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `full_name`, `ic_number`, `email`, `joining_date`, `emergency_contact_person`, `relationship`, `membership_plan`, `price`, `phone`, `emergency_contact_number`, `gender`) VALUES
(1, 'Dheo', '980605061211', 'user1@gmail.com', '2023-11-23', '-', '-', 2, 10.00, '1112222', '-', 'male'),
(2, 'Intan Sorfina', '040404010101', 'user5@gmail.com', '2023-11-30', '', '', 2, 150.00, '1112345678', '', 'female'),
(3, 'Adreana Mikhayla Binti Rizky', '010919102444', 'mikhayla@gmail.com', '2023-11-05', 'Rizky', 'Father', 1, 10.00, '0182314567', '0127843910', 'female'),
(4, 'Liu yangyang', '000101123443', 'liuyangyang@gmail.com', '2023-11-01', 'Kun', 'Brother', 1, 10.00, '0172354671', '0132675432', 'male'),
(8, 'Mia Adriana', '040302011109', 'user2@gmail.com', '2023-11-21', '-', '-', 0, 0.00, '123455599', '-', 'female'),
(10, 'Alexandar', '000201146789', 'user4@gmail.com', '2023-11-23', '', '', 2, 150.00, '11122333', '', 'male'),
(12, 'Amirul Khuzairie', '000509010110', 'user6@gmail.com', '2023-12-11', '', '', 1, 10.00, '1233455509', '', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `membership`
--

CREATE TABLE `membership` (
  `member_id` int(11) NOT NULL,
  `membership_plan` int(11) NOT NULL,
  `membership_date` date NOT NULL,
  `membership_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membership`
--

INSERT INTO `membership` (`member_id`, `membership_plan`, `membership_date`, `membership_total`) VALUES
(0, 0, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `membership_plan`
--

CREATE TABLE `membership_plan` (
  `id` int(110) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(110) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membership_plan`
--

INSERT INTO `membership_plan` (`id`, `name`, `price`) VALUES
(1, 'per entry', 10),
(2, 'basic plan', 150),
(3, 'premium plan', 220),
(4, '-', 0);

-- --------------------------------------------------------

--
-- Table structure for table `paymentinformation`
--

CREATE TABLE `paymentinformation` (
  `id` int(255) NOT NULL,
  `memberplan_id` int(11) NOT NULL,
  `membership_total` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `code` int(6) NOT NULL,
  `nameOnCard` varchar(500) NOT NULL,
  `ccNo` int(16) NOT NULL,
  `exp` varchar(5) NOT NULL,
  `cvc` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paymentinformation`
--

INSERT INTO `paymentinformation` (`id`, `memberplan_id`, `membership_total`, `name`, `address`, `city`, `state`, `code`, `nameOnCard`, `ccNo`, `exp`, `cvc`) VALUES
(1, 2, 150, 'Dheo', 'no2, Jalan Maluri', 'Cheras', 'Kuala Lumpur', 56100, 'Dheo Han', 1234, '7', '96'),
(2, 2, 150, 'Intan Sorfina', 'no2, Jalan Maluri', 'cheras', 'Kuala Lumpur', 56000, 'John Deo', 2147483647, '6', '96'),
(10, 2, 150, 'Alexandar', 'no2, Jalan Maluri', 'cheras', 'Kuala Lumpur', 56000, 'Alexandar', 1444, '12', '90'),
(12, 1, 10, 'Amirul Khuzairie', 'No40, Jalan Cempaka Indah, Taman Cempaka Indah', 'Kuala Lumpur', 'Kuala Lumpur', 56000, 'Amirul Khuzairie', 2147483647, '01/24', '012');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `user_type` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `memberplan_id` int(11) NOT NULL,
  `memberplan_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `user_type`, `password`, `memberplan_id`, `memberplan_date`) VALUES
(1, 'user1@gmail.com', 'user', '1234', 2, '2023-11-23'),
(2, 'admin@gmail.com', 'admin', '1234', 2, '0000-00-00'),
(8, 'user2@gmail.com', 'user', '1234', 2, '2023-12-21'),
(9, 'user3@gmail.com', 'user', '81dc9bdb52d04dc20036dbd8313ed055', 4, '0000-00-00'),
(10, 'user4@gmail.com', 'user', '1234', 2, '0000-00-00'),
(11, 'user5@gmail.com', 'user', '1234', 4, '0000-00-00'),
(12, 'user6@gmail.com', 'user', 'user1234@', 1, '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `informationform`
--
ALTER TABLE `informationform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `membership_plan`
--
ALTER TABLE `membership_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentinformation`
--
ALTER TABLE `paymentinformation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `membership_total` (`membership_total`),
  ADD KEY `memberplan_id` (`memberplan_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `memberplan_id` (`memberplan_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(110) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `membership_plan`
--
ALTER TABLE `membership_plan`
  MODIFY `id` int(110) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `informationform`
--
ALTER TABLE `informationform`
  ADD CONSTRAINT `informationform_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

--
-- Constraints for table `paymentinformation`
--
ALTER TABLE `paymentinformation`
  ADD CONSTRAINT `paymentinformation_ibfk_1` FOREIGN KEY (`id`) REFERENCES `informationform` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`memberplan_id`) REFERENCES `membership_plan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
