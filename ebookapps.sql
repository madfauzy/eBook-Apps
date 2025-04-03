-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 1, 2023 at 00:00 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebookapps`
--

-- --------------------------------------------------------

--
-- Table structure for table `ebooks`
--

CREATE TABLE `ebooks` (
  `id` int(11) NOT NULL,
  `added_by` varchar(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `category` enum('Artificial Intelligence','Computer Science','Cyber Security','Data Science','Design','Development','IT and Software','Machine Learning','Network and Security','Operating System','Programming Languages','Others') NOT NULL,
  `type` enum('Free','Paid') NOT NULL,
  `link` varchar(255) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `status` enum('Verified','Unverified') NOT NULL DEFAULT 'Unverified',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ebooks`
--

INSERT INTO `ebooks` (`id`, `added_by`, `title`, `author`, `category`, `type`, `link`, `cover`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Modern Cybersecurity Practices', 'Pascal Ackerman', 'Cyber Security', 'Paid', 'https://www.tutorialspoint.com/ebook/modern_cybersecurity_practices/index.asp', 'IMG-01012023-EA001.jpg', 'Verified', '2023-01-01 00:00:00', '2023-01-01 00:00:00'),
(2, 'admin', 'Docker Tutorial', 'Tutorialspoint', 'IT and Software', 'Paid', 'https://www.tutorialspoint.com/ebook/docker_tutorial/index.asp', 'IMG-01012023-EA002.jpg', 'Verified', '2023-01-01 00:00:00', '2023-01-01 00:00:00'),
(3, 'admin', 'Arduino Tutorial', 'Tutorialspoint', 'IT and Software', 'Paid', 'https://www.tutorialspoint.com/ebook/arduino_tutorial/index.asp', 'IMG-01012023-EA003.jpg', 'Verified', '2023-01-01 00:00:00', '2023-01-01 00:00:00'),
(4, 'admin', 'Operating System Tutorial', 'Tutorialspoint', 'IT and Software', 'Paid', 'https://www.tutorialspoint.com/ebook/operating_system_tutorial/index.asp', 'IMG-01012023-EA004.jpg', 'Verified', '2023-01-01 00:00:00', '2023-01-01 00:00:00'),
(5, 'admin', 'Kali Linux Tutorial', 'Tutorialspoint', 'IT and Software', 'Paid', 'https://www.tutorialspoint.com/ebook/kali_linux_tutorial/index.asp', 'IMG-01012023-EA005.jpg', 'Verified', '2023-01-01 00:00:00', '2023-01-01 00:00:00'),
(6, 'admin', 'Fundamentals of Information Security', 'Sanil Nadkarni', 'Cyber Security', 'Paid', 'https://www.tutorialspoint.com/ebook/fundamentals_of_information_security/index.asp', 'IMG-01012023-EA006.jpg', 'Verified', '2023-01-01 00:00:00', '2023-01-01 00:00:00'),
(7, 'admin', 'C++ Tutorial', 'Tutorialspoint', 'Programming Languages', 'Paid', 'https://www.tutorialspoint.com/ebook/cplusplus-tutorial/index.asp', 'IMG-01012023-EA007.jpg', 'Verified', '2023-01-01 00:00:00', '2023-01-01 00:00:00'),
(8, 'admin', 'Laravel Tutorial', 'Tutorialspoint', 'Programming Languages', 'Paid', 'https://www.tutorialspoint.com/ebook/laravel_tutorial/index.asp', 'IMG-01012023-EA008.jpg', 'Verified', '2023-01-01 00:00:00', '2023-01-01 00:00:00'),
(9, 'admin', 'Learning Go Programming', 'Shubhangi Agarwal', 'Programming Languages', 'Paid', 'https://www.tutorialspoint.com/ebook/learning_go_programming/index.asp', 'IMG-01012023-EA009.jpg', 'Verified', '2023-01-01 00:00:00', '2023-01-01 00:00:00'),
(10, 'admin', 'CSS Tutorial', 'Tutorialspoint', 'Development', 'Paid', 'https://www.tutorialspoint.com/ebook/css_tutorial/index.asp', 'IMG-01012023-EA010.jpg', 'Verified', '2023-01-01 00:00:00', '2023-01-01 00:00:00'),
(11, 'admin', 'Mastering Blockchain Second Edition', 'Imran Bashir', 'Machine Learning', 'Paid', 'https://www.tutorialspoint.com/ebook/mastering_blockchain_second_edition/index.asp', 'IMG-01012023-EA011.jpg', 'Verified', '2023-01-01 00:00:00', '2023-01-01 00:00:00'),
(12, 'admin', 'C++ High Performance Second Edition', 'Björn Andrist', 'Programming Languages', 'Paid', 'https://www.tutorialspoint.com/ebook/cplusplus_high_performance_second_edition/index.asp', 'IMG-01012023-EA012.jpg', 'Verified', '2023-01-01 00:00:00', '2023-01-01 00:00:00'),
(13, 'admin', 'Modern Cybersecurity Strategies for Enterprises', 'Ashish Mishra', 'IT and Software', 'Paid', 'https://www.tutorialspoint.com/ebook/modern-cybersecurity-strategies-for-enterprises/index.asp', 'IMG-01012023-EA013.jpg', 'Verified', '2023-01-01 00:00:00', '2023-01-01 00:00:00'),
(14, 'admin', 'Mastering PHP Design Patterns', 'Junade Ali', 'Programming Languages', 'Paid', 'https://www.tutorialspoint.com/ebook/mastering_php_design_patterns/index.asp', 'IMG-01012023-EA014.jpg', 'Verified', '2023-01-01 00:00:00', '2023-01-01 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','member') NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$xTef0WFu1Z/SgWjzdwcwnu4J5xoBT3UAJSrPkZG06wO0WrOBYVlPy', 'admin'),
(2, 'member', '$2y$10$LkvpELIhyEPsvNbxrQ5OjOpLpUyPtcS89Hl99hbkVleP03saU9AEq', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ebooks`
--
ALTER TABLE `ebooks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `added_by` (`added_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ebooks`
--
ALTER TABLE `ebooks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ebooks`
--
ALTER TABLE `ebooks`
  ADD CONSTRAINT `ebooks_ibfk_1` FOREIGN KEY (`added_by`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
