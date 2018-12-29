-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2018 at 07:43 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_dev_test2`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(9) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_name`, `content`, `created_at`) VALUES
(1, 'test001', 'hello world', '2018-12-28 22:12:31'),
(2, 'test002', 'hello world 002', '2018-12-28 22:12:32'),
(3, 'test003', 'hello world003', '2018-12-29 16:12:11'),
(4, 'test004', 'hello world 004', '2018-12-29 16:12:16'),
(5, 'test005', 'hello world005', '2018-12-29 16:12:21'),
(6, 'test006', 'hello world 006', '2018-12-29 16:12:30'),
(7, 'test007', 'hello world 007', '2018-12-29 16:12:34'),
(8, 'test008', 'hello world 008', '2018-12-29 16:12:39'),
(9, 'test009', 'hello world 009', '2018-12-29 16:12:44'),
(10, 'test010', 'hello world 010', '2018-12-29 16:12:47'),
(11, 'test011', 'hello world 011', '2018-12-29 16:12:52'),
(12, 'test012', 'hello world 013', '2018-12-29 16:12:56'),
(13, 'test013', 'hello world 014', '2018-12-29 16:12:59'),
(14, 'test014', 'hello world 015', '2018-12-29 16:13:02'),
(15, 'test015', 'hello world 016', '2018-12-29 16:13:06'),
(18, 'helolo', '2313asdfadf', '2018-12-29 18:12:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(9) NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `password`) VALUES
(1, 'admin', '123123'),
(2, 'admin1', '123123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
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
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
