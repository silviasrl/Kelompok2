-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2022 at 07:30 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sippktp`
--

-- --------------------------------------------------------

--
-- Table structure for table `conditions`
--

CREATE TABLE `conditions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `conditions`
--

INSERT INTO `conditions` (`id`, `title`, `body`) VALUES
(1, 'Syarat Pendaftaran Pembuatan KTP', '<ol><li>Berusia 17 tahun.</li><li>Warga Negara Indonesia (WNI).</li><li>Scan foto Kartu Keluarga.</li><li>Scan foto Akta Kelahiran.</li><li>Surat pengantar dari pihak RT/RW.</li></ol>');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_05_18_043408_create_news_table', 1),
(6, '2022_05_18_043614_create_registers_table', 1),
(7, '2022_05_18_085114_create_conditions_table', 1),
(8, '2022_05_22_032058_add_reason_to_registers_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumbnail` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `body`, `thumbnail`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Kabupaten Samosir', 'Samosir Island', 'news/dVVLN2nAjiAoJfLBRkeolU136AG1nZwfSAW0iMYL.jpg', 1, '2022-06-14 23:14:37', '2022-06-24 09:15:28'),
(2, 'Heboh Wakapolres Samosir Marahi Pastor, Berujung Restorative Justice', 'Wakapolres Samosir Kompol Tongap M Lumban Tobing, terlibat perselisihan dengan Pastor bernama Sabat Nababan. Peristiwa tersebut terjadi di Desa Wisata Tomok, Kecamatan Simanindo, Kabupaten Samosir, Sumatera Utara, Kamis (16/6).', 'news/wxNmCOqFb0tPynN0i4cdUa2sr2GYAGzbU9MJn5YP.jpg', 1, '2022-06-17 08:04:30', '2022-06-23 10:27:58'),
(3, 'Main-mainlah ke Bukit Holbung Samosir Lokasi Film Ngeri-ngeri Sedap', 'Film Ngeri-ngeri Sedap yang disutradarai dan ditulis oleh Bene Dion Rajagukguk berhasil menyita hati para penonton tanah air, khususnya yang berasal dari Sumatra Utara. Salah satu lokasi syuting film ini di Bukit Holbung, Samosir. Seperti apa keistimewaan Bukit Holbung tersebut?', 'news/oIBJLYPWwmhkpqyrPKsSNix5GfbUC96rzeEA2IPk.jpg', 1, '2022-06-17 08:06:45', '2022-06-23 10:29:19'),
(4, 'Pemkab Samosir Ikuti Penilaian Verifikasi Lapangan Hybrid (VLH) Evaluasi Kabupaten Layak Anak Tahun 2022', 'Pemerintah Kabupaten Samosir mengikuti penilaian Verifikasi Lapangan Hybrid (VLH) evaluasi Kabupaten Layak Anak (KLA) Tahun 2022 yang diselenggarakan secara hybrid (virtual dan tatap muka) di Aula Kantor dan Lobi lt. 2 Kantor Kantor Bupati Samosir, Pangururan, Jumat (17/6).', 'news/KHFkl3OGeZRcJTOrdgxVA1jOPXkKYPMxNZyxnrNH.jpg', 1, '2022-06-17 08:07:03', '2022-06-23 10:31:14');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE `registers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `akta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `st` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `verified_by` int(11) NOT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registers`
--

INSERT INTO `registers` (`id`, `nik`, `name`, `phone`, `kk`, `akta`, `st`, `reason`, `created_by`, `verified_by`, `verified_at`, `created_at`, `updated_at`) VALUES
(1, '1212015701020002', 'Silvia Sari', '081262264055', 'register/zxDUxpECXpmOZXcjavnAxED91HkwCZ4O20fQQIGo.jpg', 'register/5FmLId7jW8aju8zc4TPelUbAGyq7LfAZ6TCz8YTB.png', 'permohonan selesai', '', 2, 1, NULL, '2022-06-23 10:53:47', '2022-06-23 10:57:47');

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
  `role` enum('a','u') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'u',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$z0XMEW8ySnzdJg.HWTdlXe5D2JetRBFXtqPbnkletzH3nGAyVp38G', 'a', NULL, '2022-06-06 23:34:21', '2022-06-06 23:34:21'),
(2, 'Silvia', 'silvialubis14@gmail.com', NULL, '$2y$10$hh7Xu6QxT8ZeDi16Y1fS3O7FuKjVHDPH2JyOzOjqy94QAGS593H9y', 'u', NULL, '2022-06-06 23:35:15', '2022-06-06 23:35:15'),
(3, 'Rosani', 'rosani@gmail.com', NULL, '$2y$10$c1fBBT5Q9W5kSv1WiE3e8.OVrWRrxT1EYUZSBPSdpfvwTpbVNPT4i', 'u', NULL, '2022-06-22 20:52:57', '2022-06-22 20:52:57'),
(4, 'Easter', 'easter@gmail.com', NULL, '$2y$10$lRWa77h.9e5FXb.1p5k99uOk5XntNfeLVB3r01g8Z6z4P6HT73C6y', 'u', NULL, '2022-06-22 20:54:45', '2022-06-22 20:54:45'),
(5, 'Laksamana', 'laksa@gmail.com', NULL, '$2y$10$qL/WPGk9o.1hkavqgBl2VelbKt2c8gBQFC2wIViVDQFXGmSS1vQfe', 'u', NULL, '2022-06-22 20:55:55', '2022-06-22 20:55:55'),
(6, 'Simon', 'simon@gmail.com', NULL, '$2y$10$tZ51xablDK5zdCCKQFVC6.0V2yvr3ploDfpdgCzK6nQe0EEb447H2', 'u', NULL, '2022-06-22 20:56:48', '2022-06-22 20:56:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conditions`
--
ALTER TABLE `conditions`
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
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `registers`
--
ALTER TABLE `registers`
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
-- AUTO_INCREMENT for table `conditions`
--
ALTER TABLE `conditions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registers`
--
ALTER TABLE `registers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
