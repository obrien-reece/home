-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 22, 2023 at 07:07 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `home`
--

-- --------------------------------------------------------

--
-- Table structure for table `home_comments`
--

CREATE TABLE `home_comments` (
  `id` int(255) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_comments`
--

INSERT INTO `home_comments` (`id`, `comments`, `email`) VALUES
(1, 'I have posted a comment to the code below\r\n', 'test@gmail.com'),
(2, 'Another comment posted successfully', 'test@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `home_users`
--

CREATE TABLE `home_users` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `home_users`
--

INSERT INTO `home_users` (`id`, `fname`, `lname`, `username`, `email`, `password`) VALUES
(1, 'Reece', 'James', 'thatboy Reece', 'test@gmail.com', '$2y$10$4ymDDmXf6LXn5iUGsM3yq.ObYx5KtIk7U806SPpitof/WMaz.r.QC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `home_comments`
--
ALTER TABLE `home_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_users`
--
ALTER TABLE `home_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `home_comments`
--
ALTER TABLE `home_comments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `home_users`
--
ALTER TABLE `home_users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
