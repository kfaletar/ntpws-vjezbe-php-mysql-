-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2025 at 06:22 PM
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
-- Database: `ntpws`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`, `country_id`) VALUES
(11, 'Ivo', 'Ivic', 'ivoivic@123.hr', 'ivooo', '$2y$10$bEChFqPuckvxwxLG4kI35Oyh6H3UgRstC85WUCDAgywmIK0Qux.b6', 3),
(12, 'Marko', 'Maric', 'markomaric@123.gtq', 'marko', '$2y$10$dLvUIewDEuueVrHtJiFjUO5qRAEgY8eEnJq15BG2ZDDyX.U7vicE2', 8),
(13, 'Jan', 'Janic', 'janjanic@123.lo', 'janic', '$2y$10$XQ5x3MvUkGwcUFQhtLLGbumuRRYRmrGe54iflD0wTb3QcBbcxdrVW', 3),
(14, 'Pero', 'Peric', 'pero123@321.mn', 'peroo', '$2y$10$mEtMSy8mGO9Rs.kHbQPLluRYUGFBNPhMp3oVPIhyk9CDtzRMd4aF.', 5),
(15, 'Vinko', 'Vinkić', 'vinko123@ggv.vf', 'vinkec', '$2y$10$lWmsixy/wjU6e51loG5YPOF/P6b2qlMqdfUkp7QPbe4lhLL74YJ6W', 1),
(16, 'Luka', 'Lukić', 'luka.lukic@123.123', 'lukica', '$2y$10$lhcHNHTk0npvLXUppQ5CQOUGksNEvNNCf7Szkktan5OhU0a7nlEhS', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_users_country` (`country_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_country` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
