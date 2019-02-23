-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 22, 2019 at 11:11 PM
-- Server version: 5.6.39-cll-lve
-- PHP Version: 5.6.30

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

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `customer_name`, `pulled_by`, `date_written`, `origination_id`, `date_picked_up`, `order_picked_up_at`, `is_partial_order`, `shipped_by`, `checked_by`, `notes`, `status`, `is_void`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 10000, 'Indesh Prinja', NULL, '2019-02-12 00:00:00', NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, 0, NULL, '2019-02-22 08:12:19', '2019-02-22 08:12:19'),
(2, 10001, 'Naveen Saini', 'Puller 2', '2019-02-28 00:00:00', 2, '2019-02-27 00:00:00', 1, 0, 'Shipper 2', 'Checker 2', 'This is updated notes.', 1, 0, NULL, '2019-02-22 09:25:15', '2019-02-22 11:31:17'),
(3, 100000, 'Sumit Sharma', 'Singh', '2019-02-24 00:00:00', 1, '2019-02-09 00:00:00', 2, 0, 'Harinder Singh', 'Indesh Prinja', 'This is updated notes.', 1, 0, NULL, '2019-02-22 11:32:47', '2019-02-22 11:34:35'),
(4, 121212, 'Naveen Saini', NULL, '2019-02-12 00:00:00', NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, 0, NULL, '2019-02-22 11:44:09', '2019-02-22 11:44:09'),
(5, 141414, 'Sakshi', NULL, '2019-02-20 00:00:00', NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, 0, NULL, '2019-02-22 11:45:08', '2019-02-22 11:45:08'),
(6, 1212, '121', 'Puller', '2019-02-12 00:00:00', 1, '2019-02-20 00:00:00', 1, 1, 'Shipper', 'Checker', 'This is a note for order.', 1, 0, NULL, '2019-02-22 11:47:03', '2019-02-22 11:47:03'),
(7, 12, 'asa', NULL, '2019-02-18 00:00:00', NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, 0, NULL, '2019-02-22 11:49:00', '2019-02-22 11:49:00'),
(8, 2222, '11232', NULL, '2019-02-11 00:00:00', NULL, NULL, NULL, 1, NULL, NULL, 'Updated Notes', 1, 1, NULL, '2019-02-22 11:52:07', '2019-02-23 05:53:33'),
(9, 868779, 'Loja investments', 'Milton', NULL, 1, NULL, 2, 1, 'Jose to altamonte', 'Amit', NULL, 2, 0, NULL, '2019-02-22 18:03:10', '2019-02-22 22:31:02'),
(10, 296, '2641 wembley', 'Amit', '2019-02-22 00:00:00', 2, '2019-02-23 00:00:00', 1, 1, 'Pu', 'Judy', 'Customer complain that two pieces were damaged we said we would give him two replacement pieces just in case he will see', 2, 0, NULL, '2019-02-22 22:26:23', '2019-02-22 22:26:23'),
(11, 110011, 'Impulse', 'Puller', '2019-02-27 00:00:00', 1, '2019-02-28 00:00:00', 2, 1, 'Shipper', 'Checker', 'This is my notes', 1, 1, NULL, '2019-02-23 04:30:46', '2019-02-23 05:02:45'),
(12, 5557, 'Loch haven', 'Amit', '2019-02-21 00:00:00', 1, '2019-02-22 00:00:00', 2, 0, NULL, NULL, 'Written in altsmonte to be licked in Sanford', 2, 0, NULL, '2019-02-23 05:33:05', '2019-02-23 05:36:42'),
(13, 5558, 'Dollar floor', 'Milton', '2019-02-21 00:00:00', 2, '2019-02-22 00:00:00', 1, 0, 'Jose', 'Amit', 'Picked up in altsmonte by missing 3 doors', 2, 0, NULL, '2019-02-23 05:38:39', '2019-02-23 05:42:45'),
(14, 332211, 'Niraj saini', 'Puller', '2019-02-19 00:00:00', NULL, NULL, NULL, 1, NULL, NULL, NULL, 1, 0, NULL, '2019-02-23 05:55:00', '2019-02-23 05:55:52');

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

--
-- Dumping data for table `order_attachments`
--

INSERT INTO `order_attachments` (`id`, `order_id`, `attachment_name`, `attachment_path`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 8, 'DuckTalt-IT-Recruitment.png', 'uploads/OrderAttachments/1550836327__DuckTaltITRecruitment.png', 1, NULL, '2019-02-22 11:52:07', '2019-02-22 11:52:07'),
(2, 8, 'goog.png', 'uploads/OrderAttachments/1550836327__goog.png', 1, NULL, '2019-02-22 11:52:07', '2019-02-22 11:52:07'),
(3, 9, 'image.jpg', 'uploads/OrderAttachments/1550862982__image.jpg', 1, NULL, '2019-02-22 19:16:25', '2019-02-22 19:16:25'),
(4, 10, 'image.jpg', 'uploads/OrderAttachments/1550874383__image.jpg', 1, NULL, '2019-02-22 22:26:25', '2019-02-22 22:26:25'),
(5, 11, '15508962157995029089961948069765.jpg', 'uploads/OrderAttachments/1550896246__15508962157995029089961948069765.jpg', 1, NULL, '2019-02-23 04:30:49', '2019-02-23 04:30:49'),
(6, 12, '7B3890E1-C376-4C1C-88F5-C7F6EB6EEA4B.jpeg', 'uploads/OrderAttachments/1550899985__7B3890E1C3764C1C88F5C7F6EB6EEA4B.jpeg', 1, NULL, '2019-02-23 05:33:05', '2019-02-23 05:33:05'),
(7, 13, 'B9B03414-47BD-47A2-BDC5-7BCD7C69F68C.jpeg', 'uploads/OrderAttachments/1550900565__B9B0341447BD47A2BDC57BCD7C69F68C.jpeg', 1, NULL, '2019-02-23 05:42:45', '2019-02-23 05:42:45'),
(8, 8, 'image.jpg', 'uploads/OrderAttachments/1550901213__image.jpg', 1, NULL, '2019-02-23 05:53:33', '2019-02-23 05:53:33'),
(9, 14, 'image.jpg', 'uploads/OrderAttachments/1550901300__image.jpg', 1, NULL, '2019-02-23 05:55:00', '2019-02-23 05:55:00');

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
  `is_void` tinyint(1) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_edit_history`
--

INSERT INTO `order_edit_history` (`id`, `order_id`, `order_number`, `customer_name`, `pulled_by`, `date_written`, `origination_id`, `date_picked_up`, `order_picked_up_at`, `is_partial_order`, `shipped_by`, `checked_by`, `notes`, `status`, `is_void`, `deleted_at`, `created_at`, `updated_at`) VALUES
(3, 2, NULL, 'Indesh Prinja', 'Puller 1', '2019-02-21 00:00:00', 1, '2019-02-28 00:00:00', 2, 1, 'Shipper 1', 'Checker 1', 'This is notes', NULL, NULL, NULL, '2019-02-22 11:27:31', '2019-02-22 11:27:31'),
(4, 3, NULL, 'Sumit', 'Harry', '2019-02-12 00:00:00', 2, '2019-02-18 00:00:00', 1, 1, 'Harinder', 'Indesh', 'This is notes', NULL, NULL, NULL, '2019-02-22 11:34:35', '2019-02-22 11:34:35'),
(5, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-22 12:05:22', '2019-02-22 12:05:22'),
(6, 8, NULL, '112', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-22 15:38:20', '2019-02-22 15:38:20'),
(7, 8, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-22 15:45:07', '2019-02-22 15:45:07'),
(8, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Amit checked and shipped doors with Jose to Sanford', NULL, NULL, NULL, '2019-02-22 19:18:01', '2019-02-22 19:18:01'),
(9, 9, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2019-02-22 22:31:02', '2019-02-22 22:31:02'),
(10, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-23 04:31:46', '2019-02-23 04:31:46'),
(11, 11, NULL, 'Impu', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-23 04:32:22', '2019-02-23 04:32:22'),
(12, 11, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, '2019-02-23 05:02:45', '2019-02-23 05:02:45'),
(13, 12, NULL, NULL, NULL, '2019-02-22 00:00:00', NULL, '2019-02-23 00:00:00', NULL, NULL, NULL, NULL, 'Written in altsmonte to be licked in Sanford', NULL, NULL, NULL, '2019-02-23 05:35:11', '2019-02-23 05:35:11'),
(14, 12, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Pu', 'Amit', 'Test to see change in noted', 1, NULL, NULL, '2019-02-23 05:36:07', '2019-02-23 05:36:07'),
(15, 13, NULL, NULL, NULL, '2019-02-23 00:00:00', NULL, '2019-02-24 00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-23 05:40:05', '2019-02-23 05:40:05'),
(16, 13, NULL, NULL, NULL, '2019-02-22 00:00:00', NULL, '2019-02-23 00:00:00', NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2019-02-23 05:42:45', '2019-02-23 05:42:45'),
(17, 14, NULL, 'Niraj', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-02-23 05:55:52', '2019-02-23 05:55:52');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `order_attachments`
--
ALTER TABLE `order_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order_edit_history`
--
ALTER TABLE `order_edit_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `originations`
--
ALTER TABLE `originations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `picked_up_at`
--
ALTER TABLE `picked_up_at`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
