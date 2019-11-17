-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2019 at 07:07 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aquabee`
--
CREATE DATABASE IF NOT EXISTS `aquabee` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `aquabee`;

-- --------------------------------------------------------

--
-- Table structure for table `contrats`
--

DROP TABLE IF EXISTS `contrats`;
CREATE TABLE `contrats` (
  `idcontrat` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `create_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contrats`
--

INSERT INTO `contrats` (`idcontrat`, `user_id`, `description`, `create_at`) VALUES
(1024564241, 1, 'Casa particular', '2019-10-28 20:58:17'),
(2147483647, 1, 'Casa particular', '2019-10-28 20:57:03');

-- --------------------------------------------------------

--
-- Table structure for table `house_information`
--

DROP TABLE IF EXISTS `house_information`;
CREATE TABLE `house_information` (
  `idhouse` int(11) NOT NULL,
  `contrat_id` int(11) NOT NULL,
  `url_model` text DEFAULT NULL,
  `stratum` varchar(3) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `habitants` int(11) DEFAULT NULL,
  `create_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `house_information`
--

INSERT INTO `house_information` (`idhouse`, `contrat_id`, `url_model`, `stratum`, `address`, `habitants`, `create_at`) VALUES
(1, 2147483647, '<iframe src=\"https://3dwarehouse.sketchup.com/embed/b17a8281-9c78-4223-a86f-b7c133a29c9c\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" width=\"580\" height=\"326\" allowfullscreen></iframe>', '2', 'Cll 107 B N 32-26', 4, '2019-10-28 20:57:03'),
(2, 1024564241, '<iframe src=\"https://3dwarehouse.sketchup.com/embed/cfcd5d21-eb71-45a4-8e3a-0dbd20a1791c\" frameborder=\"0\" scrolling=\"no\" marginheight=\"0\" marginwidth=\"0\" width=\"580\" height=\"326\" allowfullscreen></iframe>', '8', 'Cll 107 B N 32-26', 8000, '2019-10-28 20:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `month_to_month_expense`
--

DROP TABLE IF EXISTS `month_to_month_expense`;
CREATE TABLE `month_to_month_expense` (
  `idreport` int(11) NOT NULL,
  `id_contrat` int(11) NOT NULL,
  `consumption_report_actual_month` float DEFAULT NULL,
  `consumption_report_latest_month` float DEFAULT NULL,
  `month_report` text DEFAULT NULL,
  `date_report` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `month_to_month_expense`
--

INSERT INTO `month_to_month_expense` (`idreport`, `id_contrat`, `consumption_report_actual_month`, `consumption_report_latest_month`, `month_report`, `date_report`) VALUES
(1, 2147483647, NULL, NULL, NULL, '2019-10-28 20:57:03'),
(2, 2147483647, 15, 0, 'October', '2019-10-28 20:57:39'),
(3, 2147483647, 11, 15, 'October', '2019-10-28 20:57:56'),
(4, 1024564241, NULL, NULL, NULL, '2019-10-28 20:58:17'),
(5, 1024564241, 14562, 0, 'October', '2019-10-31 16:39:58');

-- --------------------------------------------------------

--
-- Table structure for table `personal_information`
--

DROP TABLE IF EXISTS `personal_information`;
CREATE TABLE `personal_information` (
  `idpersonal_information` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `gender` varchar(45) DEFAULT NULL,
  `age` varchar(45) DEFAULT NULL,
  `create_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `idrol` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `create_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`idrol`, `name`, `create_at`) VALUES
(1, 'Admin', '2019-10-28 20:53:04'),
(2, 'Client', '2019-10-28 20:53:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `role_id` int(11) DEFAULT NULL,
  `document` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `create_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`iduser`, `role_id`, `document`, `password`, `create_at`) VALUES
(1, 2, '1001137897', '$2y$10$HU8UoF.0qUX3Uwi/lHZThO6QNFHwLQyD5sDVK3d1L8uYNPKONaLfy', '2019-10-28 20:56:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contrats`
--
ALTER TABLE `contrats`
  ADD PRIMARY KEY (`idcontrat`),
  ADD KEY `woner_contrat_idx` (`user_id`);

--
-- Indexes for table `house_information`
--
ALTER TABLE `house_information`
  ADD PRIMARY KEY (`idhouse`),
  ADD KEY `house_contrat_idx` (`contrat_id`);

--
-- Indexes for table `month_to_month_expense`
--
ALTER TABLE `month_to_month_expense`
  ADD PRIMARY KEY (`idreport`),
  ADD KEY `contrat_id_idx` (`id_contrat`);

--
-- Indexes for table `personal_information`
--
ALTER TABLE `personal_information`
  ADD PRIMARY KEY (`idpersonal_information`),
  ADD KEY `user_personal_information_idx` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idrol`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`),
  ADD UNIQUE KEY `document_UNIQUE` (`document`),
  ADD KEY `role_user_idx` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contrats`
--
ALTER TABLE `contrats`
  MODIFY `idcontrat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- AUTO_INCREMENT for table `house_information`
--
ALTER TABLE `house_information`
  MODIFY `idhouse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `month_to_month_expense`
--
ALTER TABLE `month_to_month_expense`
  MODIFY `idreport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `idrol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contrats`
--
ALTER TABLE `contrats`
  ADD CONSTRAINT `woner_contrat` FOREIGN KEY (`user_id`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `house_information`
--
ALTER TABLE `house_information`
  ADD CONSTRAINT `house_contrat` FOREIGN KEY (`contrat_id`) REFERENCES `contrats` (`idcontrat`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `month_to_month_expense`
--
ALTER TABLE `month_to_month_expense`
  ADD CONSTRAINT `contrat_id` FOREIGN KEY (`id_contrat`) REFERENCES `contrats` (`idcontrat`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `personal_information`
--
ALTER TABLE `personal_information`
  ADD CONSTRAINT `user_personal_information` FOREIGN KEY (`user_id`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `role_user` FOREIGN KEY (`role_id`) REFERENCES `roles` (`idrol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
