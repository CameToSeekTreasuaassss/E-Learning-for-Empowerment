-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2026 at 04:21 AM
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
-- Database: `als`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `faculty_role` varchar(50) NOT NULL DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `subject_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`subject_id`, `subject_name`, `level`, `teacher_id`, `user_id`) VALUES
(1, 'Pagdaragdag at Pagbabawas', 1, NULL, NULL),
(2, 'Pagpaparami at Paghahati 1', 1, NULL, NULL),
(3, 'Pagpaparami at Paghahati 2', 1, NULL, NULL),
(4, 'Pagdaragdag at Pagbabawas sa Pang-araw-araw na Buhay', 1, NULL, NULL),
(5, 'Pagdaragdag at Pagbabawas ng mga Desimals', 1, NULL, NULL),
(6, 'Ang Elektrisidad at ang mga Gamit Nito', 1, NULL, NULL),
(7, 'Mga Heometrikong Hugis', 1, NULL, NULL),
(8, 'Ito’y Tungkol sa Oras', 0, NULL, NULL),
(9, 'Pagkilala sa mga Praksiyon', 0, NULL, NULL),
(10, 'Pagsukat ng Haba', 0, NULL, NULL),
(11, 'Pagsukat ng Volume', 0, NULL, NULL),
(12, 'Pagsukat ng Timbang 1', 0, NULL, NULL),
(13, 'Pagpaparami at Paghahati sa Pang-araw araw na Buhay', 0, NULL, NULL),
(14, 'Pagpaparami at Paghahati ng mga Desimals', 0, NULL, NULL),
(15, 'Mga Porsiyento at Peresentahe', 0, NULL, NULL),
(16, 'Panumbasan at Proporsiyon', 0, NULL, NULL),
(17, 'Paglutas ng Pang-araw-araw na Suliranin', 0, NULL, NULL),
(18, 'Oras', 0, NULL, NULL),
(19, 'Pagdaragdag at Pagbabawas ng Praksiyon', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quizzes`
--

CREATE TABLE `quizzes` (
  `quiz_id` int(11) NOT NULL,
  `quiz_name` varchar(255) NOT NULL,
  `latest_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_profile`
--

CREATE TABLE `student_profile` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lrn` varchar(255) NOT NULL,
  `level` enum('elementary','juniorhigh','seniorhigh') NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `gender` enum('Male','Female') NOT NULL,
  `contact` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `last_modified_by_admin_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_profile`
--

INSERT INTO `student_profile` (`student_id`, `student_name`, `password`, `lrn`, `level`, `email`, `birthday`, `gender`, `contact`, `address`, `last_modified_by_admin_id`, `user_id`) VALUES
(7, 'Jacob Acabal', '', '117488080003', 'juniorhigh', 'jacobacabal@gmail.com', '2021-09-01', 'Male', '12345678', 'Timalan Balsahan', NULL, 6),
(8, 'Bren Anglo', '12345678', '111111111111', 'seniorhigh', 'brenanglo123@gmail.com', '2025-12-17', 'Male', '11111111', '11111', NULL, NULL),
(9, 'Eisen', '12345678', '222222222222', 'seniorhigh', 'brenanglo41@gmail.com', '2025-12-12', 'Male', '2222222222', '123', NULL, NULL),
(11, 'Erazer', '12345678', '555555555555', 'elementary', 'erazer@gmail.com', '2026-01-14', 'Male', '123', 'Lenovo', NULL, NULL),
(12, 'Edgar Gamboa', '12345678', '777777777777', 'elementary', 'edgargamboa@gmail.com', '2011-02-23', 'Male', '09999999999', 'Timalan Balsahan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_scores`
--

CREATE TABLE `student_scores` (
  `score_id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `faculty_role` varchar(50) NOT NULL DEFAULT 'teacher',
  `confirmed_by_admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `teacher_name`, `contact`, `email`, `password`, `faculty_role`, `confirmed_by_admin_id`) VALUES
(7, 'Anglo Bren', '22222', 'brenanglo009@gmail.com', '12345678', 'Teacher', NULL),
(8, 'Lenard', '11111111', 'anglobren@gmail.com', '12345678', 'Admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `lrn` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('elementary','juniorhigh','seniorhigh') NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `admin_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `lrn`, `password`, `level`, `profile_pic`, `admin_id`) VALUES
(6, 'Jacob Acabal', 'jacobacabal@gmail.com', '117488080003', '$2y$10$lQASSXRw3SZ0PfC1fUPFEuLtq.h5ZI64igHIXO5J1R8IUUF06BE/W', 'juniorhigh', 'http://localhost/als/front/uploads/profiles/6_1761553549.jpg', NULL),
(23, 'Bren Anglo', 'brenanglo123@gmail.com', '111111111111', '12345678', 'seniorhigh', '', NULL),
(24, 'Anglo Bren', 'brenanglo009@gmail.com', '', '12345678', '', '', NULL),
(25, 'Lenard', 'anglobren@gmail.com', '', '12345678', '', '', NULL),
(26, 'Eisen', 'brenanglo41@gmail.com', '222222222222', '12345678', 'seniorhigh', '', NULL),
(28, 'Erazer', 'erazer@gmail.com', '555555555555', '12345678', 'elementary', '', NULL),
(29, 'Edgar Gamboa', 'edgargamboa@gmail.com', '777777777777', '12345678', 'elementary', '', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `fk_teacher_modules` (`teacher_id`);

--
-- Indexes for table `quizzes`
--
ALTER TABLE `quizzes`
  ADD PRIMARY KEY (`quiz_id`);

--
-- Indexes for table `student_profile`
--
ALTER TABLE `student_profile`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `fk_admin_modifier` (`last_modified_by_admin_id`);

--
-- Indexes for table `student_scores`
--
ALTER TABLE `student_scores`
  ADD PRIMARY KEY (`score_id`),
  ADD KEY `quiz_id` (`quiz_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `fk_teacher_confirmed_by_admin` (`confirmed_by_admin_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_admin` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `quizzes`
--
ALTER TABLE `quizzes`
  MODIFY `quiz_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `student_profile`
--
ALTER TABLE `student_profile`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `student_scores`
--
ALTER TABLE `student_scores`
  MODIFY `score_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `fk_teacher_modules` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE;

--
-- Constraints for table `student_profile`
--
ALTER TABLE `student_profile`
  ADD CONSTRAINT `fk_admin_modifier` FOREIGN KEY (`last_modified_by_admin_id`) REFERENCES `admin` (`admin_id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `student_scores`
--
ALTER TABLE `student_scores`
  ADD CONSTRAINT `student_scores_ibfk_1` FOREIGN KEY (`quiz_id`) REFERENCES `quizzes` (`quiz_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `fk_teacher_confirmed_by_admin` FOREIGN KEY (`confirmed_by_admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_admin` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`admin_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
