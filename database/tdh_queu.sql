-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2019 at 07:34 AM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tdh_queu`
--

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE `access` (
  `id` int(10) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `registration` int(11) NOT NULL,
  `card` int(11) NOT NULL,
  `vital` int(11) NOT NULL,
  `pedia` int(11) NOT NULL,
  `im` int(11) NOT NULL,
  `surgery` int(11) NOT NULL,
  `ob` int(11) NOT NULL,
  `dental` int(11) NOT NULL,
  `bite` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `id` int(10) UNSIGNED NOT NULL,
  `patientId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `id` int(10) UNSIGNED NOT NULL,
  `patientId` int(11) NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`id`, `patientId`, `section`, `status`, `created_at`, `updated_at`) VALUES
(8, 10, 'pedia', 0, '2018-09-13 01:47:48', '2018-09-13 01:47:48'),
(9, 8, 'ob', 0, '2018-09-13 02:24:20', '2018-09-13 02:24:20'),
(10, 12, 'pedia', 0, '2018-09-13 02:24:28', '2018-09-13 02:24:28'),
(12, 11, 'surgery', 0, '2018-09-13 06:29:08', '2018-09-13 06:29:08'),
(13, 16, 'bite', 0, '2018-10-10 07:37:27', '2018-10-10 07:37:27'),
(18, 26, 'dental', 0, '2018-10-12 08:22:40', '2018-10-12 08:22:40'),
(19, 20, 'ob', 0, '2018-10-12 08:22:44', '2018-10-12 08:22:44'),
(32, 37, 'pedia', 0, '2018-12-10 07:49:43', '2018-12-10 07:49:43'),
(35, 39, 'pedia', 0, '2018-12-11 07:59:33', '2018-12-11 07:59:33'),
(36, 41, 'ob', 0, '2019-07-15 05:25:10', '2019-07-15 05:25:10'),
(37, 42, 'ob', 0, '2019-07-15 05:25:40', '2019-07-15 05:25:40'),
(38, 40, 'surgery', 0, '2019-07-15 05:25:54', '2019-07-15 05:25:54'),
(39, 43, 'dental', 1, '2019-07-15 05:27:29', '2019-07-15 05:27:46');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE `list` (
  `id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `hospitalNum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `section` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `step` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`id`, `fname`, `lname`, `dob`, `hospitalNum`, `num`, `priority`, `section`, `status`, `step`, `created_at`, `updated_at`) VALUES
(1, 'Abby', 'Bacaron', '2018-08-05', '454545', 1, 0, 'pedia', 'ready', 4, '2018-09-12 02:30:36', '2018-09-12 03:27:03'),
(2, 'Rosa', 'Catre', '1992-05-12', '778778', 1, 0, 'dental', 'ready', 4, '2018-09-12 02:34:38', '2018-09-13 07:08:43'),
(3, 'Von', 'Cabiluna', '1990-02-02', '444444', 1, 0, 'im', 'ready', 4, '2018-09-12 03:12:41', '2018-10-12 03:29:19'),
(4, 'Greg', 'Tan', '2001-05-04', '111111', 1, 0, 'surgery', 'ready', 4, '2018-09-12 03:56:26', '2018-09-13 02:30:49'),
(5, 'Sarah', 'Anud', '1990-09-23', '', 1, 0, 'ob', 'ready', 4, '2018-09-12 03:56:39', '2018-10-12 03:29:27'),
(6, 'Allan', 'Bucao', '1995-04-04', '', 1, 0, 'bite', 'ready', 4, '2018-09-12 03:59:32', '2018-09-13 06:56:52'),
(7, 'Roland', 'Lagos', '2018-05-05', '', 2, 0, 'pedia', 'ready', 4, '2018-09-12 04:01:10', '2018-10-12 03:29:16'),
(8, 'Danica', 'Goro', '1992-04-06', '', 2, 1, 'ob', 'ready', 3, '2018-09-12 04:01:39', '2018-09-13 02:24:20'),
(9, 'Von', 'Churva', '1999-04-08', '545454', 2, 1, 'dental', 'ready', 99, '2018-09-12 05:11:36', '2018-10-03 01:06:11'),
(10, 'Roland', 'Bato', '2018-04-08', '787878', 3, 0, 'pedia', 'ready', 3, '2018-09-12 05:12:04', '2018-09-13 01:47:48'),
(11, 'Divine', 'Reaper', '1995-04-08', '545455', 2, 1, 'surgery', 'ready', 3, '2018-09-12 06:30:43', '2018-09-13 06:29:08'),
(12, 'Von', 'Cabiluna', '2018-04-04', '', 1, 0, 'pedia', 'ready', 3, '2018-10-05 00:09:38', '2018-09-13 02:24:28'),
(13, 'Ariel', 'Nocos', '1985-08-08', '', 1, 0, 'surgery', 'ready', 4, '2018-09-30 00:52:59', '2018-10-12 03:29:23'),
(14, 'Washington', 'Dino', '1990-01-01', '121212', 1, 0, 'pedia', 'ready', 99, '2018-10-03 16:00:00', '2018-10-03 01:05:58'),
(15, 'Baron', 'Abby', '1988-02-05', '454545', 1, 0, 'im', 'ready', 0, '2018-10-10 03:39:46', '2018-10-10 03:39:46'),
(16, 'Rolly', 'Villarin', '1978-05-12', '454545', 1, 0, 'bite', 'ready', 3, '2018-10-10 07:37:27', '2018-10-10 07:37:27'),
(17, 'John', 'Doe', '1990-02-02', '545454', 1, 1, 'ob', 'ready', 0, '2018-10-11 08:53:33', '2018-10-11 08:53:33'),
(18, 'Von', 'Cabiluna', '1990-12-12', '123456', 1, 0, 'surgery', 'ready', 4, '2018-10-12 03:29:50', '2018-10-12 08:23:17'),
(19, 'Rose', 'Catre', '1992-02-01', '456789', 1, 0, 'ob', 'ready', 4, '2018-10-12 03:50:43', '2018-10-12 08:23:26'),
(20, 'Carol', 'Banawa', '1995-05-02', '787979', 2, 0, 'ob', 'ready', 3, '2018-10-12 05:12:09', '2018-10-12 08:22:44'),
(21, 'Jane', 'Berna', '1995-09-09', '777777', 3, 0, 'ob', 'ready', 2, '2018-10-12 05:14:12', '2018-10-12 05:14:35'),
(22, 'Grace', 'Divine', '1988-07-08', '787787', 4, 0, 'ob', 'ready', 2, '2018-10-12 05:14:26', '2018-10-12 05:14:40'),
(23, 'Grace', 'Po', '1988-05-09', '444444', 5, 0, 'ob', 'ready', 2, '2018-10-12 05:23:23', '2018-10-12 05:23:32'),
(24, 'Rolly', 'Villarin', '1982-08-09', '787877', 1, 0, 'dental', 'ready', 4, '2018-10-12 05:23:54', '2018-10-12 06:29:49'),
(25, 'Alex', 'Len', '1999-04-05', '121212', 1, 0, 'pedia', 'ready', 4, '2018-10-12 05:32:32', '2018-10-12 06:29:44'),
(26, 'Rose', 'Catre', '1993-07-08', '999999', 2, 0, 'dental', 'ready', 3, '2018-10-12 05:33:03', '2018-10-12 08:22:40'),
(27, 'Jad', 'Lomocso', '2012-06-15', '454545', 1, 0, 'pedia', 'ready', 4, '2018-10-16 08:16:56', '2018-10-16 08:31:06'),
(28, 'Rose', 'Catre', '1992-02-06', '545454', 1, 0, 'dental', 'ready', 4, '2018-10-16 08:19:37', '2018-10-16 08:31:09'),
(29, 'Angie', 'Broc', '1995-04-05', '545454', 2, 0, 'dental', 'ready', 4, '2018-10-16 08:19:55', '2019-07-15 05:27:38'),
(30, 'Rose', 'Catre', '1992-04-05', '454545', 1, 0, 'ob', 'ready', 4, '2018-10-16 08:23:49', '2018-10-16 08:31:04'),
(31, 'Anna', 'Cruz', '1990-07-08', '454545', 2, 0, 'ob', 'ready', 0, '2018-10-16 08:33:21', '2018-10-16 08:33:21'),
(32, 'Dina', 'Cuevas', '1985-08-09', '888888', 3, 1, 'ob', 'ready', 0, '2018-10-16 08:33:38', '2018-10-16 08:33:38'),
(33, 'Von', 'Cabiluna', '2018-02-06', '545455', 1, 0, 'pedia', 'ready', 0, '2018-10-17 05:18:32', '2018-10-17 05:18:32'),
(34, 'Rose', 'Catre', '1990-02-03', '454554', 1, 0, 'dental', 'ready', 0, '2018-10-22 07:28:34', '2018-10-22 07:28:34'),
(35, 'Wairley Von', 'Cabiluna', '1990-12-12', '454554', 1, 0, 'im', 'ready', 0, '2018-11-14 07:50:43', '2018-11-14 07:50:43'),
(36, 'von', 'Cabiluna', '1990-12-12', '121212', 1, 0, 'pedia', 'ready', 0, '2018-12-06 09:00:17', '2018-12-06 09:00:17'),
(37, 'sdfsdf', 'fsdfsdf', '1111-11-11', '231312', 1, 0, 'pedia', 'ready', 3, '2018-12-10 06:28:21', '2018-12-10 07:49:43'),
(38, 'sdfdsf', 'fsdf', '1990-02-02', '232323', 2, 0, 'pedia', 'ready', 4, '2018-12-10 06:29:27', '2018-12-11 08:03:25'),
(39, 'jimmy', 'lomocso', '1990-09-23', '123456', 1, 0, 'pedia', 'ready', 3, '2018-12-11 07:56:33', '2018-12-11 07:59:33'),
(40, 'jhj', 'hjhj', '1990-05-05', '454545', 1, 0, 'surgery', 'ready', 3, '2018-12-11 08:03:43', '2019-07-15 05:25:54'),
(41, 'iui', 'sdfj', '1990-04-05', '454545', 1, 1, 'ob', 'ready', 3, '2018-12-11 08:03:55', '2019-07-15 05:25:10'),
(42, 'Gessa', 'Abano', '1988-06-23', '132131', 1, 0, 'ob', 'ready', 3, '2019-06-21 06:41:14', '2019-07-15 05:25:40'),
(43, 'jimmy', 'lomocso', '1990-09-23', '898998', 1, 0, 'dental', 'ready', 3, '2019-07-15 05:26:31', '2019-07-15 05:27:29');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(10) UNSIGNED NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `content`, `created_at`, `updated_at`) VALUES
(1, 'The quick brown fox jumps over the lazy dog.', '2018-09-26 02:49:30', '2018-09-26 02:49:30');

-- --------------------------------------------------------

--
-- Table structure for table `number`
--

CREATE TABLE `number` (
  `id` int(10) UNSIGNED NOT NULL,
  `section` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num` int(11) NOT NULL,
  `patientId` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `number`
--

INSERT INTO `number` (`id`, `section`, `num`, `patientId`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'card', 0, 0, 0, NULL, '2019-07-15 05:27:05'),
(2, 'vital1', 0, 0, 0, NULL, '2019-07-15 05:25:54'),
(3, 'vital2', 0, 0, 0, NULL, '2019-07-15 05:27:29'),
(4, 'vital3', 0, 0, 0, NULL, '2019-07-15 05:25:40'),
(5, 'pedia', 0, 0, 0, NULL, '2018-12-11 08:03:25'),
(6, 'im', 0, 0, 0, NULL, '2018-10-12 03:29:19'),
(7, 'surgery', 0, 0, 0, NULL, '2018-10-12 08:23:17'),
(8, 'ob', 0, 0, 0, NULL, '2018-10-16 08:31:04'),
(9, 'dental', 1, 43, 0, NULL, '2019-07-15 05:27:46'),
(10, 'bite', 0, 0, 0, NULL, '2018-09-13 06:56:52');

-- --------------------------------------------------------

--
-- Table structure for table `parameters`
--

CREATE TABLE `parameters` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parameters`
--

INSERT INTO `parameters` (`id`, `description`, `value`, `created_at`, `updated_at`) VALUES
(1, 'socket', 'ws://localhost:5001', NULL, '2019-07-15 05:20:49');

-- --------------------------------------------------------

--
-- Table structure for table `pending`
--

CREATE TABLE `pending` (
  `id` int(10) UNSIGNED NOT NULL,
  `patientId` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `step` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pending`
--

INSERT INTO `pending` (`id`, `patientId`, `num`, `step`, `created_at`, `updated_at`) VALUES
(1, 13, 1, 1, '2018-09-13 01:08:11', '2018-09-13 01:08:11'),
(2, 12, 1, 1, '2018-09-13 01:44:08', '2018-09-13 01:44:08'),
(3, 9, 2, 2, '2018-09-13 01:52:24', '2018-09-13 01:52:24'),
(4, 12, 1, 2, '2018-09-13 02:00:29', '2018-09-13 02:00:29'),
(5, 12, 1, 99, '2018-09-13 02:04:51', '2018-09-13 02:04:51'),
(6, 13, 1, 2, '2018-09-13 02:12:39', '2018-09-13 02:12:39'),
(7, 14, 1, 2, '2018-10-03 01:05:58', '2018-10-03 01:05:58'),
(8, 9, 2, 2, '2018-10-03 01:06:11', '2018-10-03 01:06:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `profession` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `profession`, `fname`, `lname`, `access`, `username`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'programmer', 'Jimmy', 'Lomocso', 'admin', 'admin', '$2y$10$CJJGl85OcX4x1xJSt/nDfuT3Ed2rnvC8dsaWQ6FeBZsD30Ej4ef0C', 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vital`
--

CREATE TABLE `vital` (
  `id` int(10) UNSIGNED NOT NULL,
  `patientId` int(11) NOT NULL,
  `station` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vital`
--

INSERT INTO `vital` (`id`, `patientId`, `station`, `created_at`, `updated_at`) VALUES
(4, 21, 0, '2018-10-12 05:14:35', '2018-10-12 05:14:35'),
(5, 22, 0, '2018-10-12 05:14:40', '2018-10-12 05:14:40'),
(6, 23, 0, '2018-10-12 05:23:32', '2018-10-12 05:23:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access`
--
ALTER TABLE `access`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `number`
--
ALTER TABLE `number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parameters`
--
ALTER TABLE `parameters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pending`
--
ALTER TABLE `pending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vital`
--
ALTER TABLE `vital`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `access`
--
ALTER TABLE `access`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `consultation`
--
ALTER TABLE `consultation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `list`
--
ALTER TABLE `list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `number`
--
ALTER TABLE `number`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `parameters`
--
ALTER TABLE `parameters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pending`
--
ALTER TABLE `pending`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vital`
--
ALTER TABLE `vital`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
