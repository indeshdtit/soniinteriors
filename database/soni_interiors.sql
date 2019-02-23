-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2019 at 07:58 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `soni_interiors`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_number` int(11) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `pulled_by` varchar(128) DEFAULT NULL,
  `date_written` datetime DEFAULT NULL,
  `origination_id` int(11) DEFAULT NULL,
  `date_picked_up` datetime DEFAULT NULL,
  `order_picked_up_at` int(11) DEFAULT NULL,
  `is_partial_order` tinyint(1) NOT NULL,
  `shipped_by` varchar(128) DEFAULT NULL,
  `checked_by` varchar(128) DEFAULT NULL,
  `notes` longtext,
  `status` int(11) NOT NULL,
  `is_void` tinyint(1) NOT NULL DEFAULT '0',
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_attachments`
--

CREATE TABLE `order_attachments` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `attachment_name` varchar(128) NOT NULL,
  `attachment_path` varchar(1024) NOT NULL,
  `status` int(11) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_edit_history`
--

CREATE TABLE `order_edit_history` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_number` varchar(128) DEFAULT NULL,
  `customer_name` varchar(150) DEFAULT NULL,
  `pulled_by` varchar(128) DEFAULT NULL,
  `date_written` datetime DEFAULT NULL,
  `origination_id` int(11) DEFAULT NULL,
  `date_picked_up` datetime DEFAULT NULL,
  `order_picked_up_at` int(11) DEFAULT NULL,
  `is_partial_order` tinyint(1) DEFAULT NULL,
  `shipped_by` varchar(128) DEFAULT NULL,
  `checked_by` varchar(128) DEFAULT NULL,
  `notes` longtext,
  `status` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `originations`
--

CREATE TABLE `originations` (
  `id` int(11) NOT NULL,
  `origination_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `originations`
--

INSERT INTO `originations` (`id`, `origination_name`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '201 Sanford', 1, NULL, '2019-02-20 00:00:00', NULL),
(2, '1028 ATA', 1, NULL, '2019-02-20 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `picked_up_at`
--

CREATE TABLE `picked_up_at` (
  `id` int(11) NOT NULL,
  `picked_up_at` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `picked_up_at`
--

INSERT INTO `picked_up_at` (`id`, `picked_up_at`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '201 Sanford', 1, NULL, '2019-02-20 00:00:00', NULL),
(2, '1028 ATA', 1, NULL, '2019-02-20 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin Sharma', 'superadmin@gmail.com', NULL, '$2y$10$AIrc.txKfe9v6JVqbjA8c.8ThdncrWxWA/2J6dyM.GT8fdPZyhcUm', 1, 'wPSN9oIUcc5dyzJCKM5rOqveppu3ae66OPvzAKZ2CM5F20e0tdkP57hl8HDI', 1, NULL, '2018-12-17 13:00:00', NULL),
(2, 'Admin Soni', 'admin@gmail.com', NULL, '$2y$10$AIrc.txKfe9v6JVqbjA8c.8ThdncrWxWA/2J6dyM.GT8fdPZyhcUm', 2, '8uZroNo8jBF0x0mHo1BVqKa2AmSU9O0jQkAjf4regbkcTdm33U8sczK6Jcov', 1, NULL, '2018-12-17 13:00:00', '2018-12-18 21:17:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_attachments`
--
ALTER TABLE `order_attachments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_edit_history`
--
ALTER TABLE `order_edit_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `originations`
--
ALTER TABLE `originations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `picked_up_at`
--
ALTER TABLE `picked_up_at`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_attachments`
--
ALTER TABLE `order_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_edit_history`
--
ALTER TABLE `order_edit_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `originations`
--
ALTER TABLE `originations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `picked_up_at`
--
ALTER TABLE `picked_up_at`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
