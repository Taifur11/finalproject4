-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2020 at 09:06 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_project4`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Super Admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `phone_no`, `image`, `type`, `created_at`, `updated_at`) VALUES
(2, 'Taifur Ahmed Shovon', 'shovon1432@gmail.com', '$2y$10$2PzwcbJPTT6ZB2JOUFQxoeAkpLTgrC2FWm/XX3M8im.C46DCsevl6', '0175945303135', 'images/admin/1579968693.jpg', 'Super Admin', '2020-01-15 00:03:42', '2020-01-25 10:11:33');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Health', 'health', '2020-01-12 06:39:12', '2020-01-12 06:39:12'),
(2, 'Education', 'education', '2020-01-12 06:39:21', '2020-01-12 06:39:21'),
(3, 'Natural Clameties', 'natural-clameties', '2020-01-12 06:39:31', '2020-01-12 06:39:31'),
(4, 'Religious Program', 'religious-program', '2020-01-12 06:39:40', '2020-01-12 06:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED DEFAULT NULL,
  `donor_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone_no`, `comment`, `created_at`, `updated_at`) VALUES
(2, 'Taifur', 'taifur@gmail.com', '01759453031', 'First Comment.......', '2020-01-24 15:33:14', '2020-01-24 15:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `donors`
--

CREATE TABLE `donors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `phone_no` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donors`
--

INSERT INTO `donors` (`id`, `name`, `email`, `password`, `image`, `phone_no`, `address`, `created_at`, `updated_at`) VALUES
(5, 'Taifur', 'taifur@gmail.com', '1234', 'images/donor/1579663790.jpg', 1759453031, 'Maijdee,Noakhali', '2020-01-21 21:29:50', '2020-01-21 21:29:50'),
(6, 'Shovon', 'shovon@gmail.com', '1234', 'images/donor/1579663828.png', 1620840044, 'Sirajganj,Rajshahi', '2020-01-21 21:30:28', '2020-01-21 21:30:28');

-- --------------------------------------------------------

--
-- Table structure for table `donor_event`
--

CREATE TABLE `donor_event` (
  `id` int(10) UNSIGNED NOT NULL,
  `donor_id` int(10) UNSIGNED NOT NULL,
  `event_id` int(10) UNSIGNED NOT NULL,
  `tk` double(12,2) DEFAULT NULL,
  `tx_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donor_event`
--

INSERT INTO `donor_event` (`id`, `donor_id`, `event_id`, `tk`, `tx_id`, `created_at`, `updated_at`) VALUES
(1, 5, 17, 200.00, '2076b375855e27c348f0de8', NULL, NULL),
(2, 5, 16, 100.00, '4e21c3b1545e2d633c50b2a', NULL, NULL),
(3, 5, 15, 1410.00, 'dbe59c11b85e2ce306034f6', NULL, NULL),
(4, 6, 16, 100.00, 'f63ccb20835e27c39988278', NULL, NULL),
(5, 6, 18, 1000.00, '9c0609a3bc5e27c4bd28a04', NULL, NULL),
(6, 6, 15, 100.00, '3cb4db27a85e27ea8f4e2c2', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(10) UNSIGNED NOT NULL,
  `raiser_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `goal` double(12,2) NOT NULL,
  `raised` double(12,2) NOT NULL DEFAULT 0.00,
  `exdate` date NOT NULL,
  `no_of_expire` int(11) DEFAULT NULL,
  `expire_status` tinyint(1) NOT NULL DEFAULT 0,
  `tx_status` tinyint(1) DEFAULT NULL,
  `tx_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `raiser_id`, `category_id`, `title`, `slug`, `image`, `body`, `goal`, `raised`, `exdate`, `no_of_expire`, `expire_status`, `tx_status`, `tx_id`, `status`, `is_approved`, `created_at`, `updated_at`) VALUES
(1, 12, 1, 'Shovon First Event Title', 'shovon-first-event-title', 'images/event/1580201216.jpg', '<p>First Event Body</p>', 10000.00, 0.00, '2020-01-31', 2, 0, NULL, NULL, 0, 1, '2020-01-28 02:46:56', '2020-01-28 02:59:26'),
(2, 12, 2, 'Shovon Second Event Title', 'shovon-second-event-title', 'images/event/1580201268.jpg', '<p>Shovon Second Event Body</p>', 20000.00, 0.00, '2020-01-30', NULL, 0, NULL, NULL, 1, 1, '2020-01-28 02:47:48', '2020-01-28 02:48:58');

-- --------------------------------------------------------

--
-- Table structure for table `event_histories`
--

CREATE TABLE `event_histories` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_body` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event_goal` double(12,2) NOT NULL DEFAULT 0.00,
  `event_raised` double(12,2) NOT NULL DEFAULT 0.00,
  `event_days` int(11) NOT NULL DEFAULT 0,
  `creator_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `event_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_histories`
--

INSERT INTO `event_histories` (`id`, `event_title`, `event_body`, `event_goal`, `event_raised`, `event_days`, `creator_name`, `creator_email`, `creator_image`, `event_image`, `created_at`, `updated_at`) VALUES
(12, 'fourthh', '<p>fourth boduy</p>', 3765.00, 0.00, 0, 'Taifur', 'shovon@gmail.com', 'images/eventhistory/raiser/15796672611579626983.jpg', 'images/eventhistory/event/15796672611579667157.jpg', '2020-01-21 22:27:41', '2020-01-21 22:27:41'),
(13, 'fifhth', '<p>bidyyf</p>', 6375.00, 0.00, 0, 'Taifur', 'shovon@gmail.com', 'images/eventhistory/raiser/15796672641579626983.jpg', 'images/eventhistory/event/15796672641579667188.jpg', '2020-01-21 22:27:44', '2020-01-21 22:27:44'),
(14, 'Shovon Third Event Title', '<p>Education is the backbone of a nation.</p>', 40000.00, 200.00, 0, 'Taifur', 'shovon@gmail.com', 'images/eventhistory/raiser/15796757711579626983.jpg', 'images/eventhistory/event/15796757711579663905.jpg', '2020-01-22 00:49:31', '2020-01-22 00:49:31');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `infos`
--

CREATE TABLE `infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `infos`
--

INSERT INTO `infos` (`id`, `address`, `phone_no`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Sirajganj,Rajshahi', '01759453031', 'shovon1432@gmail.com', NULL, '2020-01-23 04:11:17');

-- --------------------------------------------------------

--
-- Table structure for table `logos`
--

CREATE TABLE `logos` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logos`
--

INSERT INTO `logos` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(4, NULL, 'images/logo/1579099646.png', '2020-01-15 08:47:26', '2020-01-15 08:47:26');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_24_062329_create_raisers_table', 1),
(4, '2019_12_24_062419_create_categories_table', 1),
(6, '2019_12_25_042207_create_subscribers_table', 1),
(7, '2019_12_25_141402_create_users_table', 1),
(8, '2019_12_25_172647_create_admins_table', 1),
(9, '2019_12_29_075034_create_jobs_table', 1),
(10, '2020_01_04_171800_create_services_table', 1),
(14, '2020_01_12_071942_create_donors_table', 2),
(16, '2020_01_14_174602_create_percentages_table', 3),
(18, '2020_01_12_072029_create_donor_event_table', 4),
(19, '2020_01_04_212742_create_logos_table', 5),
(20, '2020_01_21_180807_create_event_histories_table', 6),
(21, '2020_01_22_150412_create_contacts_table', 7),
(22, '2020_01_22_150544_create_infos_table', 7),
(27, '2020_01_24_183454_create_comments_table', 8),
(28, '2019_12_24_062450_create_events_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `percentages`
--

CREATE TABLE `percentages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `percentage` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `percentages`
--

INSERT INTO `percentages` (`id`, `percentage`, `created_at`, `updated_at`) VALUES
(13, 0.10, '2020-01-21 21:34:05', '2020-01-21 21:34:25');

-- --------------------------------------------------------

--
-- Table structure for table `raisers`
--

CREATE TABLE `raisers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `bkashphone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rocketphone_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `raisers`
--

INSERT INTO `raisers` (`id`, `name`, `username`, `email`, `password`, `image`, `bkashphone_no`, `rocketphone_no`, `address`, `created_at`, `updated_at`) VALUES
(12, 'Taifur Ahmed', 'taifur', 'shovon@gmail.com', '$2y$10$gdEZVcFulBZkf8yhWqIl9edQbZMfMFsnPriqRGUmGnDI05dHvPn1.', 'images/raiser/1579903796.jpg', '01759453031', '0162084004', 'Demra,Dhaka', '2020-01-15 12:26:10', '2020-01-24 16:09:56'),
(13, 'Shovon', 'shovon', 'taifur@gmail.com', '$2y$10$HQhiEVz1.PGuWSEplqVTl.qhfWNPdjX/rFskx5hdx2UqoqorxRYi2', 'images/raiser/1579642543.jpg', '01759453031', '01759453031', 'Demra,Dhaka', '2020-01-21 15:35:43', '2020-01-21 15:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `heading`, `body`, `image`, `created_at`, `updated_at`) VALUES
(1, 'First Bar', 'Give Donation', '<p>Give Donation to make better and peacfull country.Your Donation are safe and secure.</p>', 'images/service/1578832518.png', NULL, '2020-01-12 06:35:18'),
(2, 'Second Bar', 'Large amount of donation', '<p>Any individual or group can collect large amount of money without wasting much money or time.</p>', 'images/service/1578832535.png', NULL, '2020-01-12 06:35:35'),
(3, 'Third Bar', 'Online Donation', '<p>Online payment make the donation easy for donors and event creator or fundraisers.</p>', 'images/service/1578832549.png', NULL, '2020-01-12 06:35:49');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'taifur@gmail.com', '2020-01-15 00:04:18', '2020-01-15 00:04:18'),
(2, 'shovon@gmail.com', '2020-01-15 00:04:27', '2020-01-15 00:04:27'),
(3, 'sakil@gmail.com', '2020-01-15 00:04:36', '2020-01-15 00:04:36'),
(4, 'sagor@gmail.com', '2020-01-15 00:04:44', '2020-01-15 00:04:44'),
(5, 'akib@gmail.com', '2020-01-15 00:04:52', '2020-01-15 00:04:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.png',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donors`
--
ALTER TABLE `donors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `donors_email_unique` (`email`);

--
-- Indexes for table `donor_event`
--
ALTER TABLE `donor_event`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_raiser_id_foreign` (`raiser_id`),
  ADD KEY `events_category_id_foreign` (`category_id`);

--
-- Indexes for table `event_histories`
--
ALTER TABLE `event_histories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `infos`
--
ALTER TABLE `infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logos`
--
ALTER TABLE `logos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `percentages`
--
ALTER TABLE `percentages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `raisers`
--
ALTER TABLE `raisers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `raisers_username_unique` (`username`),
  ADD UNIQUE KEY `raisers_email_unique` (`email`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donors`
--
ALTER TABLE `donors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `donor_event`
--
ALTER TABLE `donor_event`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event_histories`
--
ALTER TABLE `event_histories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `infos`
--
ALTER TABLE `infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `logos`
--
ALTER TABLE `logos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `percentages`
--
ALTER TABLE `percentages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `raisers`
--
ALTER TABLE `raisers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `events_raiser_id_foreign` FOREIGN KEY (`raiser_id`) REFERENCES `raisers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
