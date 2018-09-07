-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 07, 2018 at 08:56 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.0.26

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
(4, '2018_09_06_025031_create_people_table', 2),
(5, '2018_09_07_014119_create_seminars_table', 3);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `people`
--

INSERT INTO `people` (`id`, `lastname`, `firstname`, `middlename`, `birthday`, `address`, `contact`, `spouse`, `created_at`, `updated_at`) VALUES
(1, 'amador', 'samuel', 'ignacio', '1989-08-27', 'sdsd', '3984', 'kjh', '2018-09-05 20:27:47', '2018-09-05 20:27:47'),
(2, 'sdhj', 'sdf', '123', '1989-12-08', '123', '123', '123', '2018-09-05 20:41:58', '2018-09-05 20:41:58'),
(3, 'sdf', 'kjdkfh', 'kdjf', '1989-01-01', NULL, NULL, NULL, '2018-09-05 20:43:09', '2018-09-05 20:43:09'),
(4, 'asd', 'jsjkh', NULL, '1989-12-12', NULL, NULL, NULL, '2018-09-05 20:44:40', '2018-09-05 20:44:40'),
(5, 'aaksdj', 'kjshdj', 'kjsds', '1989-12-12', NULL, NULL, NULL, '2018-09-05 20:45:11', '2018-09-05 20:45:11'),
(6, 'asd', 'jksjdh', 'as', '1989-12-12', NULL, NULL, NULL, '2018-09-05 20:46:49', '2018-09-05 20:46:49'),
(7, 'asd', 'kjshj', 'ksjk', '1989-12-01', NULL, NULL, NULL, '2018-09-05 20:54:09', '2018-09-05 20:54:09'),
(8, 'asd', 'sjh', 'jsdg', '1989-01-01', NULL, NULL, NULL, '2018-09-05 20:55:20', '2018-09-05 20:55:20'),
(9, 'sdf', 'dfgj', 'hjdg', '1989-08-20', NULL, NULL, NULL, '2018-09-06 03:42:20', '2018-09-06 03:42:20'),
(10, 'sdf', 'jhdg', 'jhgdfh', '1989-12-12', NULL, NULL, NULL, '2018-09-06 03:43:46', '2018-09-06 03:43:46'),
(11, 'sd', 'sdf', 'sdf', '1989-12-12', NULL, NULL, NULL, '2018-09-06 03:44:35', '2018-09-06 03:44:35'),
(12, 'asd', 'sdf', '1989', '1989-12-12', NULL, NULL, NULL, '2018-09-06 03:45:00', '2018-09-06 03:45:00'),
(13, 'sdf', 'sdf', 'sdf', '1989-12-12', NULL, NULL, NULL, '2018-09-06 03:45:35', '2018-09-06 03:45:35'),
(14, 'asdad', 'asd', 'asd', '1989-12-12', NULL, NULL, NULL, '2018-09-06 03:46:33', '2018-09-06 03:46:33'),
(15, 'Amador', 'samuel', 'ignacio', '1989-08-27', NULL, '93874', NULL, '2018-09-06 22:06:54', '2018-09-06 22:06:54'),
(16, 'amador', 'rica', 'test', '1989-12-01', NULL, NULL, NULL, '2018-09-06 22:07:13', '2018-09-06 22:07:13');

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
  `comment` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  `date_ofevent` date NOT NULL,
  `reference` int(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, 'Ablaze 2', 'Bible-based module', '2018-09-06 22:43:54', '2018-09-06 22:43:54');

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
(1, 'admin', 'smzapp2010@gmail.com', '$2y$10$16ax6/XgFnYGyOD0IsElpuiHGycLAmAw/WVmiPDMc98tHeyvCkbdK', 'admin', 'j3j2NhUpjPc502l6xUxQmbThRyPFivkhuShzyGjIF2IEiyKPMqbIrHAu5KBH', '2018-07-02 11:43:55', '2018-07-02 11:43:55'),
(2, 'student1', 'student1@gmail.com', '$2y$10$Unvogq7wAR.VlVQ6BaD2o.IMcEos/99LRj8vb1VXQj/Cm0L2lmoRG', 'student', NULL, '2018-07-02 11:44:18', '2018-07-02 11:44:18'),
(3, 'student2', 'student2@gmail.com', '$2y$10$GQ9ot.yqSVcVjJoLna.hFeBQCxEgVO/1HNovJpcMDFqz.EkoWAKzG', 'student', NULL, '2018-07-02 11:44:34', '2018-07-02 11:44:34'),
(4, 'student3', 'student3@gmail.com', '$2y$10$eXgjKnjMGoBIR1XnWQ0LKut9QHDHKlKcf2dO9WJu3BCIU.gYvzSPO', 'student', NULL, '2018-07-02 11:44:47', '2018-07-02 11:44:47'),
(5, 'teacher', 'teacher@gmail.com', '$2y$10$OPZ/VVug.widifvr46NdSO1oa8ajiZGAt3qHCEmnrmsin6RRadXFe', 'teacher', NULL, '2018-07-04 16:43:34', '2018-07-04 16:43:34');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `people`
--
ALTER TABLE `people`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `seminars`
--
ALTER TABLE `seminars`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tracks`
--
ALTER TABLE `tracks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
