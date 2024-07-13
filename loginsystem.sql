-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Dec 12, 2022 at 09:41 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_Firstname` varchar(255) NOT NULL,
  `user_Lastname` varchar(1000) NOT NULL,
  `user_email` varchar(1000) NOT NULL,
  `user_uid` varchar(1000) NOT NULL,
  `user_password` varchar(1000) NOT NULL,
  `userType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_Firstname`, `user_Lastname`, `user_email`, `user_uid`, `user_password`, `userType`) VALUES
(62, 'Christian', 'Luna', 'salveraboy143@gmail.com', 'ruth', '123', 'admin'),
(66, 'Salve', 'Mendoza', 'christiandodong000@gmail.com', 'christian', '123', 'user'),
(67, 'Alyysa', 'Mancia', 'c.mendoza0083@student.tsu.edu.ph', 'Alyysa', '123', 'admin'),
(69, ' Neil', 'Cayabyab', 'christiandodong143@yahoo.com', 'NEIL', '123', 'user'),
(70, 'Salve', 'Raboy', 'salveraboy143@gmail.com', 'salve', '12345', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
