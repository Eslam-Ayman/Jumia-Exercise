-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2023 at 02:44 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bus_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `seat_id` bigint(20) UNSIGNED NOT NULL,
  `start_station_id` bigint(20) UNSIGNED NOT NULL,
  `end_station_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seats_count` int(10) UNSIGNED NOT NULL DEFAULT 12,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `name`, `seats_count`, `created_at`, `updated_at`) VALUES
(1, 'Bus number 1', 12, NULL, NULL),
(2, 'Bus number 2', 12, NULL, NULL),
(3, 'Bus number 3', 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Alexandria', NULL, NULL),
(2, 'Assiut', NULL, NULL),
(3, 'Aswan', NULL, NULL),
(4, 'Beheira', NULL, NULL),
(5, 'Bani Suef', NULL, NULL),
(6, 'Cairo', NULL, NULL),
(7, 'Daqahliya', NULL, NULL),
(8, 'Damietta', NULL, NULL),
(9, 'Fayyoum', NULL, NULL),
(10, 'Gharbiya', NULL, NULL),
(11, 'Giza', NULL, NULL),
(12, 'Helwan', NULL, NULL),
(13, 'Ismailia', NULL, NULL),
(14, 'Kafr El Sheikh', NULL, NULL),
(15, 'Luxor', NULL, NULL),
(16, 'Marsa Matrouh', NULL, NULL),
(17, 'Minya', NULL, NULL),
(18, 'Monofiya', NULL, NULL),
(19, 'New Valley', NULL, NULL),
(20, 'North Sinai', NULL, NULL),
(21, 'Port Said', NULL, NULL),
(22, 'Qalioubiya', NULL, NULL),
(23, 'Qena', NULL, NULL),
(24, 'Red Sea', NULL, NULL),
(25, 'Sharqiya', NULL, NULL),
(26, 'Sohag', NULL, NULL),
(27, 'South Sinai', NULL, NULL),
(28, 'Suez', NULL, NULL),
(29, 'Tanta', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_08_19_000000_create_failed_jobs_table', 1),
(14, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(15, '2023_02_03_001549_create_cities_table', 1),
(16, '2023_02_03_001715_create_buses_table', 1),
(17, '2023_02_03_001813_create_seats_table', 1),
(18, '2023_02_03_002109_create_trips_table', 1),
(19, '2023_02_03_002307_create_stations_table', 1),
(20, '2023_02_03_002328_create_bookings_table', 1);

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

CREATE TABLE `seats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bus_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `bus_id`, `title`, `created_at`, `updated_at`) VALUES
(1, 1, 'seat 1 of bus 1', NULL, NULL),
(2, 1, 'seat 2 of bus 1', NULL, NULL),
(3, 1, 'seat 3 of bus 1', NULL, NULL),
(4, 1, 'seat 4 of bus 1', NULL, NULL),
(5, 1, 'seat 5 of bus 1', NULL, NULL),
(6, 1, 'seat 6 of bus 1', NULL, NULL),
(7, 1, 'seat 7 of bus 1', NULL, NULL),
(8, 1, 'seat 8 of bus 1', NULL, NULL),
(9, 1, 'seat 9 of bus 1', NULL, NULL),
(10, 1, 'seat 10 of bus 1', NULL, NULL),
(11, 1, 'seat 11 of bus 1', NULL, NULL),
(12, 1, 'seat 12 of bus 1', NULL, NULL),
(13, 2, 'seat 1 of bus 2', NULL, NULL),
(14, 2, 'seat 2 of bus 2', NULL, NULL),
(15, 2, 'seat 3 of bus 2', NULL, NULL),
(16, 2, 'seat 4 of bus 2', NULL, NULL),
(17, 2, 'seat 5 of bus 2', NULL, NULL),
(18, 2, 'seat 6 of bus 2', NULL, NULL),
(19, 2, 'seat 7 of bus 2', NULL, NULL),
(20, 2, 'seat 8 of bus 2', NULL, NULL),
(21, 2, 'seat 9 of bus 2', NULL, NULL),
(22, 2, 'seat 10 of bus 2', NULL, NULL),
(23, 2, 'seat 11 of bus 2', NULL, NULL),
(24, 2, 'seat 12 of bus 2', NULL, NULL),
(25, 3, 'seat 1 of bus 3', NULL, NULL),
(26, 3, 'seat 2 of bus 3', NULL, NULL),
(27, 3, 'seat 3 of bus 3', NULL, NULL),
(28, 3, 'seat 4 of bus 3', NULL, NULL),
(29, 3, 'seat 5 of bus 3', NULL, NULL),
(30, 3, 'seat 6 of bus 3', NULL, NULL),
(31, 3, 'seat 7 of bus 3', NULL, NULL),
(32, 3, 'seat 8 of bus 3', NULL, NULL),
(33, 3, 'seat 9 of bus 3', NULL, NULL),
(34, 3, 'seat 10 of bus 3', NULL, NULL),
(35, 3, 'seat 11 of bus 3', NULL, NULL),
(36, 3, 'seat 12 of bus 3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stations`
--

CREATE TABLE `stations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `trip_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `order_column` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stations`
--

INSERT INTO `stations` (`id`, `trip_id`, `city_id`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 1, 6, 1, '2023-02-04 11:44:04', '2023-02-04 11:44:04'),
(2, 1, 9, 2, '2023-02-04 11:44:04', '2023-02-04 11:44:04'),
(3, 1, 17, 3, '2023-02-04 11:44:04', '2023-02-04 11:44:04'),
(4, 1, 2, 4, '2023-02-04 11:44:04', '2023-02-04 11:44:04'),
(5, 2, 11, 1, '2023-02-04 11:44:04', '2023-02-04 11:44:04'),
(6, 2, 1, 2, '2023-02-04 11:44:04', '2023-02-04 11:44:04'),
(7, 3, 2, 1, '2023-02-04 11:44:04', '2023-02-04 11:44:04'),
(8, 3, 17, 2, '2023-02-04 11:44:04', '2023-02-04 11:44:04'),
(9, 3, 9, 3, '2023-02-04 11:44:04', '2023-02-04 11:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `trips`
--

CREATE TABLE `trips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bus_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departure_at` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trips`
--

INSERT INTO `trips` (`id`, `bus_id`, `title`, `departure_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cairo-Asyut', '2023-02-10 00:00:00', '2023-02-04 11:44:04', '2023-02-04 11:44:04'),
(2, 2, 'Giza-Alex', '2023-02-10 00:00:00', '2023-02-04 11:44:04', '2023-02-04 11:44:04'),
(3, 3, 'Asyut-AlFayyum', '2023-02-10 00:00:00', '2023-02-04 11:44:04', '2023-02-04 11:44:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'User', 'a@b.c', NULL, '$2y$10$GRIMXEqDdx2mtnosMpjxAOVjB/TVq7WQ/TYbEuFUKYj/yPmyHXrJC', NULL, '2023-02-04 11:44:04', '2023-02-04 11:44:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_seat_id_foreign` (`seat_id`),
  ADD KEY `bookings_start_station_id_foreign` (`start_station_id`),
  ADD KEY `bookings_end_station_id_foreign` (`end_station_id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `seats`
--
ALTER TABLE `seats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seats_bus_id_foreign` (`bus_id`);

--
-- Indexes for table `stations`
--
ALTER TABLE `stations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stations_trip_id_foreign` (`trip_id`),
  ADD KEY `stations_city_id_foreign` (`city_id`);

--
-- Indexes for table `trips`
--
ALTER TABLE `trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trips_bus_id_foreign` (`bus_id`);

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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seats`
--
ALTER TABLE `seats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `stations`
--
ALTER TABLE `stations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `trips`
--
ALTER TABLE `trips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_end_station_id_foreign` FOREIGN KEY (`end_station_id`) REFERENCES `stations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_seat_id_foreign` FOREIGN KEY (`seat_id`) REFERENCES `seats` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_start_station_id_foreign` FOREIGN KEY (`start_station_id`) REFERENCES `stations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seats`
--
ALTER TABLE `seats`
  ADD CONSTRAINT `seats_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stations`
--
ALTER TABLE `stations`
  ADD CONSTRAINT `stations_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stations_trip_id_foreign` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trips`
--
ALTER TABLE `trips`
  ADD CONSTRAINT `trips_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
