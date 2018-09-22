-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2018 at 07:00 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.0.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cc8db`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `dept_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dept_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Kids', 'Kids', NULL, NULL),
(2, 'High School', 'High School', NULL, NULL),
(3, 'College', 'College', NULL, NULL),
(5, 'Young Prof/Working', 'Young Prof/Working', NULL, NULL),
(6, 'Couples', 'Couples', NULL, NULL);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_04_032133_create_tracks_table', 1),
(5, '2018_09_07_014119_create_seminars_table', 3),
(6, '2018_09_06_025031_create_people_table', 4),
(7, '2018_09_22_040952_create_departments_table', 5);

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
-- Table structure for table `people`
--

CREATE TABLE `people` (
  `id` int(10) UNSIGNED NOT NULL,
  `lastname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date NOT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_kids` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mentor` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `lastname`, `firstname`, `middlename`, `birthday`, `address`, `contact`, `spouse`, `total_kids`, `department`, `mentor`, `work`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Amador', 'Samuel', 'Ignacio', '2018-08-27', '!@$%^&*( akshdkajd', '0234839', '!@#$%^&*()', '!@#', '5', 'Dada Havz Alorro', 'IT teacher', 'Active', '2018-09-21 19:57:12', '2018-09-21 20:45:53'),
(2, 'fds', 'jfd', 'jgfd', '1989-08-27', '3423', 'hgfh', 'spouse', '54', NULL, 'gfd', 'gdgf', 'InActive', '2018-09-21 20:41:38', '2018-09-21 20:41:38'),
(3, 'asd', 'ajdshg', 'shdgj', '1989-08-27', 'ksj', 'sdkfjh', 'dksfjh', '234', '2', 'sdfh', 'jhfgdj', 'Active', '2018-09-21 20:42:58', '2018-09-21 20:45:42');

-- --------------------------------------------------------

--
-- Table structure for table `seminars`
--

CREATE TABLE `seminars` (
  `id` int(10) UNSIGNED NOT NULL,
  `people_id` int(11) NOT NULL,
  `track_id` int(11) NOT NULL,
  `tag` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'first_timer',
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'incomplete',
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batch` int(11) DEFAULT NULL,
  `date_ofevent` date NOT NULL,
  `reference` int(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seminars`
--

INSERT INTO `seminars` (`id`, `people_id`, `track_id`, `tag`, `status`, `comment`, `batch`, `date_ofevent`, `reference`, `created_at`, `updated_at`) VALUES
(1, 17, 1, 'first_timer', 'completed', NULL, NULL, '1989-12-02', 1212, '2018-09-06 23:32:08', '2018-09-06 23:32:08'),
(4, 17, 1, 'first_timer', 'completed', 'test', NULL, '1989-12-12', 12, '2018-09-07 02:11:47', '2018-09-07 02:11:47'),
(5, 17, 1, 'first_timer', 'completed', 'test', 12, '1989-12-12', 12, '2018-09-07 02:12:38', '2018-09-07 02:12:38'),
(6, 15, 2, 'first_timer', 'completed', 'qbatch', 12, '1989-12-21', 112, '2018-09-07 02:13:49', '2018-09-07 02:13:49');

-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE `tracks` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Ablaze 1', 'Salvation Module', '2018-09-06 22:43:14', '2018-09-06 22:43:14'),
(2, 'Ablaze 2', 'Bible-based module', '2018-09-06 22:43:54', '2018-09-06 22:43:54'),
(3, 'CAFE1', 'Adamic Covenant', '2018-09-07 18:51:27', '2018-09-07 18:51:27'),
(4, 'CAFE2', 'Noahic covenant', '2018-09-07 18:51:42', '2018-09-07 18:51:42');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'smzapp2010@gmail.com', '$2y$10$16ax6/XgFnYGyOD0IsElpuiHGycLAmAw/WVmiPDMc98tHeyvCkbdK', 'admin', 'PU1Inwof0TESsQleXWCdjjYB0532ATvXmmHu3Kr33Ah6DTldKHsOjwRMF6hG', '2018-07-02 11:43:55', '2018-07-02 11:43:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
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
-- Indexes for table `people`
--
ALTER TABLE `people`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seminars`
--
ALTER TABLE `seminars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tracks`
--
ALTER TABLE `tracks`
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
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `seminars`
--
ALTER TABLE `seminars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tracks`
--
ALTER TABLE `tracks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
