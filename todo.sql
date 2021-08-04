-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2021 at 05:13 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `title` char(60) NOT NULL,
  `describtion` char(100) NOT NULL,
  `adder` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `describtion`, `adder`, `created_at`, `updated_at`) VALUES
(6, 'Task one', 'study haaaard', 7, '2021-08-03 20:46:50', '2021-08-03 20:56:27'),
(7, 'Task two', 'study haaaard', 8, '2021-08-03 20:46:50', '2021-08-03 20:56:27'),
(8, 'Task three', 'study haaaardss', 7, '2021-08-03 20:46:50', '2021-08-03 20:56:27'),
(9, 'Task Four', 'Studyyyyy', 15, '2021-08-03 20:46:50', '2021-08-03 20:56:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` char(80) NOT NULL,
  `email` char(80) NOT NULL,
  `password` char(80) NOT NULL,
  `remember_token` char(100) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `type`, `created_at`, `updated_at`) VALUES
(7, 'nader', 'nadersayed001@gmail.com', '$2y$10$GAbvYMVa4S5Tmcck2IJ7BORd.wUgVE3uasZwM0xOpBfYJFSvIxJpO', 'W3h0K7IdIXyT0QMxZqBN9Q0FrmANrXBrqKAbXYpJujnA8AvV9uOttvreQVcG', 1, '2021-08-03 19:06:31', '2021-08-03 19:06:31'),
(8, 'sayed', 'delking99@gmail.com', '$2y$10$bTBTVMYNtEMV97p6/7wZnOJTLSv1y/1xB9T2GIYiYHR9/hwmMJK6i', NULL, 2, '2021-08-03 19:06:51', '2021-08-03 19:06:51'),
(15, 'nadersss', 'delking90@gmail.com', '$2y$10$HvHjA8LYGOK4eS6ZRnaYSeiFGqRz2H1/a.F.7TVCv.sf3sDrFNjoK', NULL, 1, '2021-08-04 08:49:14', '2021-08-04 08:49:14');

-- --------------------------------------------------------

--
-- Table structure for table `userstypes`
--

CREATE TABLE `userstypes` (
  `id` int(11) NOT NULL,
  `type` char(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userstypes`
--

INSERT INTO `userstypes` (`id`, `type`) VALUES
(1, 'Admin'),
(2, 'Standard');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `adder` (`adder`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type` (`type`);

--
-- Indexes for table `userstypes`
--
ALTER TABLE `userstypes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `userstypes`
--
ALTER TABLE `userstypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `task adder` FOREIGN KEY (`adder`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `user type` FOREIGN KEY (`type`) REFERENCES `userstypes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
