-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 22, 2018 at 10:53 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `honda`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificates`
--

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `template_file` varchar(250) NOT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `certificates`
--

INSERT INTO `certificates` (`id`, `name`, `description`, `template_file`, `active`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'new Certificate', 'Test', '5a643c81b3cd6.jpg', '1', NULL, NULL, '2018-01-20 20:20:56', '2018-01-21 11:11:46', '2018-01-21 11:01:11'),
(2, 'tdsd', 'dfsd', '5a63a52487175.jpg', '1', NULL, NULL, '2018-01-20 20:23:00', '2018-01-21 11:11:49', '2018-01-21 11:01:11'),
(3, 'Test', 'pdf certificate', '5a64764272fc8', '1', NULL, NULL, '2018-01-21 11:12:14', '2018-01-22 08:22:58', '2018-01-22 08:01:22'),
(4, 'Test', NULL, '5a64762ba18e3', '1', NULL, NULL, '2018-01-21 11:14:51', '2018-01-21 11:15:04', '2018-01-21 11:01:15'),
(5, 'Sample Certificate', 'For Testing', '5a6483ae8f560', '1', NULL, NULL, '2018-01-21 12:12:30', '2018-01-21 12:12:30', NULL),
(6, 'Honda Certificate', 'Sample Certificate of Honda', '5a65a0e46aa3e', '1', NULL, NULL, '2018-01-22 08:29:24', '2018-01-22 08:29:24', NULL),
(7, 'Honda Certificate 123', 'test certificate', '5a65bda36d752', '1', NULL, NULL, '2018-01-22 10:26:40', '2018-01-22 10:32:03', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `active`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, '1', '2016-12-12 06:23:11', '2016-12-12 06:23:11'),
(2, 'Trainer', NULL, '1', '2016-12-12 06:23:12', '2016-12-12 06:23:12'),
(3, 'Trainee', NULL, '1', '2016-12-12 06:23:12', '2016-12-12 06:23:12');

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(250) DEFAULT NULL,
  `training_head` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '1',
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `name`, `description`, `training_head`, `instructor_id`, `start_date`, `end_date`, `address`, `active`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Test training', 'test', 1, 4, '2018-01-01', '2018-01-31', NULL, '1', NULL, NULL, '2018-01-21 06:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `training_batch`
--

CREATE TABLE `training_batch` (
  `id` int(11) NOT NULL,
  `training_id` int(11) NOT NULL,
  `trainee_id` int(11) NOT NULL,
  `grade` int(11) DEFAULT NULL,
  `certificate` varchar(100) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `active` enum('0','1') NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `training_batch`
--

INSERT INTO `training_batch` (`id`, `training_id`, `trainee_id`, `grade`, `certificate`, `created_by`, `updated_by`, `active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 5, NULL, NULL, NULL, NULL, '1', '2018-01-09 02:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `digital_sign` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `active` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `reset_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime(6) NOT NULL,
  `updated_at` datetime(6) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `gender`, `password`, `address`, `digital_sign`, `active`, `reset_token`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin User', 'admin@admin.com', '9898989898', NULL, '$2y$10$CulcSzaDUWVF/lrSwmLdKO.YRHRhAcSOVlzReAcQXbPstvXiPieny', NULL, 'sign1.png', '1', '4U6u3sAUrBwbOQj5yQHigredkPJ9jMRrx68QhkAT13kW0untAMCNQKAlmywF', 0, NULL, '2015-09-18 18:42:54.000000', '2017-05-29 15:56:46.000000', NULL),
(4, 'Test Trainer', 'trainer@gmail.com', '9898989898', NULL, '$2y$10$CulcSzaDUWVF/lrSwmLdKO.YRHRhAcSOVlzReAcQXbPstvXiPieny', NULL, 'sign2.png', '1', NULL, NULL, NULL, '2015-09-18 18:42:54.000000', '2017-05-29 15:56:46.000000', NULL),
(5, 'User Trainee', 'trainee@gmail.com', '9898989898', NULL, '$2y$10$CulcSzaDUWVF/lrSwmLdKO.YRHRhAcSOVlzReAcQXbPstvXiPieny', NULL, NULL, '1', NULL, NULL, NULL, '2015-09-18 18:42:54.000000', '2017-05-29 15:56:46.000000', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_has_roles`
--

CREATE TABLE `user_has_roles` (
  `id` int(11) NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_has_roles`
--

INSERT INTO `user_has_roles` (`id`, `role_id`, `user_id`) VALUES
(1, 1, 1),
(15, 2, 4),
(16, 3, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificates`
--
ALTER TABLE `certificates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `training_head` (`training_head`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- Indexes for table `training_batch`
--
ALTER TABLE `training_batch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `training_id` (`training_id`),
  ADD KEY `trainee_id` (`trainee_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `mobile` (`mobile`);

--
-- Indexes for table `user_has_roles`
--
ALTER TABLE `user_has_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_index` (`role_id`),
  ADD KEY `user_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificates`
--
ALTER TABLE `certificates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `training_batch`
--
ALTER TABLE `training_batch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `user_has_roles`
--
ALTER TABLE `user_has_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
