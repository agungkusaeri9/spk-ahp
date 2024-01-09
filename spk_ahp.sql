-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 09, 2024 at 09:00 PM
-- Server version: 5.7.40-log
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_ahp`
--

-- --------------------------------------------------------

--
-- Table structure for table `alternatif`
--

CREATE TABLE `alternatif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatif`
--

INSERT INTO `alternatif` (`id`, `uuid`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
(1, '387527df-1a38-4ddf-b4b9-f777db6b49f8', 'A1', 'WAHYU', '2023-12-09 05:23:09', '2023-12-09 05:23:09'),
(2, 'aba349ca-30d3-4786-8524-b158b934638b', 'A2', 'YANI', '2023-12-09 05:31:33', '2023-12-09 05:31:33'),
(3, '33d85858-b494-40f2-a613-06b3c1858a05', 'A3', 'WIN', '2023-12-09 05:42:11', '2023-12-09 05:42:11'),
(4, '13ae201e-84f0-4858-91b3-6b9aa60fa805', 'A4', 'JAMAL', '2023-12-09 05:43:42', '2023-12-09 05:43:42'),
(5, '8390948a-fded-4889-996d-6d9f778cbdba', 'A5', 'UDIN', '2023-12-09 05:45:10', '2023-12-09 05:45:10');

-- --------------------------------------------------------

--
-- Table structure for table `alternatif_kriteria`
--

CREATE TABLE `alternatif_kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `alternatif_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `sub_kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alternatif_kriteria`
--

INSERT INTO `alternatif_kriteria` (`id`, `alternatif_id`, `kriteria_id`, `sub_kriteria_id`, `created_at`, `updated_at`) VALUES
(1, 1, 8, 28, '2023-12-09 05:23:09', '2023-12-09 05:32:02'),
(2, 1, 7, 26, '2023-12-09 05:23:09', '2023-12-09 05:32:02'),
(3, 1, 5, 18, '2023-12-09 05:23:09', '2023-12-09 05:32:02'),
(4, 1, 6, 22, '2023-12-09 05:23:09', '2023-12-09 05:32:02'),
(5, 2, 8, 31, '2023-12-09 05:31:33', '2023-12-09 05:31:33'),
(6, 2, 7, 25, '2023-12-09 05:31:33', '2023-12-09 05:31:33'),
(7, 2, 5, 18, '2023-12-09 05:31:33', '2023-12-09 05:31:33'),
(8, 2, 6, 23, '2023-12-09 05:31:33', '2023-12-09 05:31:33'),
(9, 3, 8, 29, '2023-12-09 05:42:11', '2023-12-09 05:42:11'),
(10, 3, 7, 27, '2023-12-09 05:42:11', '2023-12-09 05:42:11'),
(11, 3, 5, 19, '2023-12-09 05:42:11', '2023-12-09 05:42:11'),
(12, 3, 6, 21, '2023-12-09 05:42:11', '2023-12-09 05:42:11'),
(13, 4, 8, 30, '2023-12-09 05:43:42', '2023-12-09 05:43:42'),
(14, 4, 7, 25, '2023-12-09 05:43:42', '2023-12-09 05:43:42'),
(15, 4, 5, 17, '2023-12-09 05:43:42', '2023-12-09 05:43:42'),
(16, 4, 6, 22, '2023-12-09 05:43:42', '2023-12-09 05:43:42'),
(17, 5, 8, 28, '2023-12-09 05:45:10', '2023-12-09 05:45:10'),
(18, 5, 7, 27, '2023-12-09 05:45:10', '2023-12-09 05:45:10'),
(19, 5, 5, 20, '2023-12-09 05:45:10', '2023-12-09 05:45:10'),
(20, 5, 6, 21, '2023-12-09 05:45:10', '2023-12-09 05:45:10');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `uuid`, `kode`, `nama`, `created_at`, `updated_at`) VALUES
(5, '6d75c584-0526-4181-a316-4f9274bb97ae', 'C1', 'Penghasilan Orang Tua', '2023-12-09 03:03:27', '2023-12-09 03:03:27'),
(6, '04be0843-8de8-41de-97a0-e4ef57efaaca', 'C2', 'Tanggungan Orang tua', '2023-12-09 03:04:50', '2023-12-09 03:04:50'),
(7, '65524496-60fd-4317-84d7-ad8f65109b98', 'C3', 'Pekerjaan Orang Tua', '2023-12-09 03:05:56', '2023-12-09 03:05:56'),
(8, '64983b9f-2b86-4465-854e-d2ff9b53b7f2', 'C4', 'Lulusan Sekolah', '2023-12-09 03:06:11', '2023-12-09 03:06:11');

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
(5, '2023_11_18_095834_create_kriterias_table', 1),
(6, '2023_11_18_101237_create_alternatifs_table', 1),
(7, '2023_11_18_101835_create_nilais_table', 1),
(8, '2023_11_22_114042_create_sub_kriterias_table', 1),
(9, '2023_11_22_140701_create_perbandingan_kriteria_table', 1),
(10, '2023_11_22_183940_create_perbandingan_sub_kriterias_table', 1),
(11, '2023_11_23_033358_create_alterntif_kriterias_table', 1),
(12, '2023_12_01_000024_create_pengaturans_table', 1);

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
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_situs` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pembuat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_pemenang` int(11) NOT NULL DEFAULT '1',
  `keterangan_kesimpulan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama_situs`, `deskripsi`, `pembuat`, `jumlah_pemenang`, `keterangan_kesimpulan`, `created_at`, `updated_at`) VALUES
(1, 'Sistem Pendukung Keputusan Pemilihan Beasiswa', 'Sistem Pendukung Keputusan Pemilihan Beasiswa berbasis web menggunakan laravel', 'Agung Kusaeri', 1, 'Berdasarkan perhitungan menggunakan metode Analytical Hierarchy Process (AHP) pada Sistem Pendukung Keputusan (SPK) untuk pemilihan beasiswa, dapat disimpulkan bahwa pendekatan ini memberikan hasil yang lebih terukur dan objektif. Dengan menetapkan Alternatif <alternatif_pemenang> sebagai pemenangnya', '2023-12-09 02:10:51', '2023-12-09 02:12:51');

-- --------------------------------------------------------

--
-- Table structure for table `perbandingan_kriteria`
--

CREATE TABLE `perbandingan_kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria1_id` bigint(20) UNSIGNED NOT NULL,
  `kriteria2_id` bigint(20) UNSIGNED NOT NULL,
  `pemenang` enum('kriteria1','kriteria2','sama') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skala_nilai_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nilai` double(5,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perbandingan_kriteria`
--

INSERT INTO `perbandingan_kriteria` (`id`, `kriteria1_id`, `kriteria2_id`, `pemenang`, `skala_nilai_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 8, 8, NULL, NULL, 1.000, '2023-12-09 03:29:38', '2023-12-09 03:29:38'),
(2, 8, 7, NULL, NULL, 0.333, '2023-12-09 03:29:38', '2023-12-09 03:29:38'),
(3, 8, 5, NULL, NULL, 0.125, '2023-12-09 03:29:38', '2023-12-09 03:29:38'),
(4, 8, 6, NULL, NULL, 0.200, '2023-12-09 03:29:38', '2023-12-09 03:29:38'),
(5, 7, 8, NULL, NULL, 3.000, '2023-12-09 03:29:38', '2023-12-09 03:29:38'),
(6, 7, 7, NULL, NULL, 1.000, '2023-12-09 03:29:38', '2023-12-09 03:29:38'),
(7, 7, 5, NULL, NULL, 0.167, '2023-12-09 03:29:38', '2023-12-09 03:29:38'),
(8, 7, 6, NULL, NULL, 0.333, '2023-12-09 03:29:38', '2023-12-09 03:29:38'),
(9, 5, 8, NULL, NULL, 8.000, '2023-12-09 03:29:39', '2023-12-09 03:29:39'),
(10, 5, 7, NULL, NULL, 6.000, '2023-12-09 03:29:39', '2023-12-09 03:29:39'),
(11, 5, 5, NULL, NULL, 1.000, '2023-12-09 03:29:39', '2023-12-09 03:29:39'),
(12, 5, 6, NULL, NULL, 3.000, '2023-12-09 03:29:39', '2023-12-09 03:29:39'),
(13, 6, 8, NULL, NULL, 5.000, '2023-12-09 03:29:39', '2023-12-09 03:29:39'),
(14, 6, 7, NULL, NULL, 3.000, '2023-12-09 03:29:39', '2023-12-09 03:29:39'),
(15, 6, 5, NULL, NULL, 0.333, '2023-12-09 03:29:39', '2023-12-09 03:29:39'),
(16, 6, 6, NULL, NULL, 1.000, '2023-12-09 03:29:39', '2023-12-09 03:29:39');

-- --------------------------------------------------------

--
-- Table structure for table `perbandingan_sub_kriteria`
--

CREATE TABLE `perbandingan_sub_kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `sub_kriteria1_id` bigint(20) UNSIGNED NOT NULL,
  `sub_kriteria2_id` bigint(20) UNSIGNED NOT NULL,
  `pemenang` enum('sub_kriteria1','sub_kriteria2','sama') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skala_nilai_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nilai` double(5,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `perbandingan_sub_kriteria`
--

INSERT INTO `perbandingan_sub_kriteria` (`id`, `kriteria_id`, `sub_kriteria1_id`, `sub_kriteria2_id`, `pemenang`, `skala_nilai_id`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 5, 17, 17, NULL, NULL, 1.000, '2023-12-09 03:48:33', '2023-12-09 03:48:33'),
(2, 5, 17, 18, NULL, NULL, 3.000, '2023-12-09 03:48:33', '2023-12-09 03:48:33'),
(3, 5, 17, 19, NULL, NULL, 5.000, '2023-12-09 03:48:33', '2023-12-09 03:48:33'),
(4, 5, 17, 20, NULL, NULL, 7.000, '2023-12-09 03:48:33', '2023-12-09 03:48:33'),
(5, 5, 18, 17, NULL, NULL, 0.333, '2023-12-09 03:48:33', '2023-12-09 03:48:33'),
(6, 5, 18, 18, NULL, NULL, 1.000, '2023-12-09 03:48:33', '2023-12-09 03:48:33'),
(7, 5, 18, 19, NULL, NULL, 3.000, '2023-12-09 03:48:33', '2023-12-09 03:48:33'),
(8, 5, 18, 20, NULL, NULL, 5.000, '2023-12-09 03:48:33', '2023-12-09 03:48:33'),
(9, 5, 19, 17, NULL, NULL, 0.200, '2023-12-09 03:48:33', '2023-12-09 03:48:33'),
(10, 5, 19, 18, NULL, NULL, 0.333, '2023-12-09 03:48:33', '2023-12-09 03:48:33'),
(11, 5, 19, 19, NULL, NULL, 1.000, '2023-12-09 03:48:33', '2023-12-09 03:48:33'),
(12, 5, 19, 20, NULL, NULL, 3.000, '2023-12-09 03:48:33', '2023-12-09 03:48:33'),
(13, 5, 20, 17, NULL, NULL, 0.143, '2023-12-09 03:48:33', '2023-12-09 03:48:33'),
(14, 5, 20, 18, NULL, NULL, 0.200, '2023-12-09 03:48:33', '2023-12-09 03:48:33'),
(15, 5, 20, 19, NULL, NULL, 0.333, '2023-12-09 03:48:33', '2023-12-09 03:48:33'),
(16, 5, 20, 20, NULL, NULL, 1.000, '2023-12-09 03:48:33', '2023-12-09 03:48:33'),
(17, 6, 21, 21, NULL, NULL, 1.000, '2023-12-09 04:05:29', '2023-12-09 04:05:29'),
(18, 6, 21, 22, NULL, NULL, 2.000, '2023-12-09 04:05:29', '2023-12-09 04:05:29'),
(19, 6, 21, 23, NULL, NULL, 3.000, '2023-12-09 04:05:29', '2023-12-09 04:05:29'),
(20, 6, 21, 24, NULL, NULL, 4.000, '2023-12-09 04:05:29', '2023-12-09 04:05:29'),
(21, 6, 22, 21, NULL, NULL, 0.500, '2023-12-09 04:05:29', '2023-12-09 04:05:29'),
(22, 6, 22, 22, NULL, NULL, 1.000, '2023-12-09 04:05:29', '2023-12-09 04:05:29'),
(23, 6, 22, 23, NULL, NULL, 2.000, '2023-12-09 04:05:29', '2023-12-09 04:05:29'),
(24, 6, 22, 24, NULL, NULL, 3.000, '2023-12-09 04:05:29', '2023-12-09 04:05:29'),
(25, 6, 23, 21, NULL, NULL, 0.333, '2023-12-09 04:05:29', '2023-12-09 04:05:29'),
(26, 6, 23, 22, NULL, NULL, 0.500, '2023-12-09 04:05:29', '2023-12-09 04:05:29'),
(27, 6, 23, 23, NULL, NULL, 1.000, '2023-12-09 04:05:29', '2023-12-09 04:05:29'),
(28, 6, 23, 24, NULL, NULL, 2.000, '2023-12-09 04:05:29', '2023-12-09 04:05:29'),
(29, 6, 24, 21, NULL, NULL, 0.250, '2023-12-09 04:05:29', '2023-12-09 04:05:29'),
(30, 6, 24, 22, NULL, NULL, 0.333, '2023-12-09 04:05:29', '2023-12-09 04:05:29'),
(31, 6, 24, 23, NULL, NULL, 0.500, '2023-12-09 04:05:29', '2023-12-09 04:05:29'),
(32, 6, 24, 24, NULL, NULL, 1.000, '2023-12-09 04:05:29', '2023-12-09 04:05:29'),
(33, 7, 25, 25, NULL, NULL, 1.000, '2023-12-09 04:40:12', '2023-12-09 04:40:12'),
(34, 7, 25, 26, NULL, NULL, 2.000, '2023-12-09 04:40:12', '2023-12-09 04:40:12'),
(35, 7, 25, 27, NULL, NULL, 4.000, '2023-12-09 04:40:12', '2023-12-09 04:40:12'),
(36, 7, 26, 25, NULL, NULL, 0.500, '2023-12-09 04:40:12', '2023-12-09 04:40:12'),
(37, 7, 26, 26, NULL, NULL, 1.000, '2023-12-09 04:40:12', '2023-12-09 04:40:12'),
(38, 7, 26, 27, NULL, NULL, 3.000, '2023-12-09 04:40:12', '2023-12-09 04:40:12'),
(39, 7, 27, 25, NULL, NULL, 0.250, '2023-12-09 04:40:12', '2023-12-09 04:40:12'),
(40, 7, 27, 26, NULL, NULL, 0.333, '2023-12-09 04:40:12', '2023-12-09 04:40:12'),
(41, 7, 27, 27, NULL, NULL, 1.000, '2023-12-09 04:40:12', '2023-12-09 04:40:12'),
(42, 8, 28, 28, NULL, NULL, 1.000, '2023-12-09 04:47:53', '2023-12-09 04:47:53'),
(43, 8, 28, 29, NULL, NULL, 4.000, '2023-12-09 04:47:53', '2023-12-09 04:47:53'),
(44, 8, 28, 30, NULL, NULL, 6.000, '2023-12-09 04:47:53', '2023-12-09 04:47:53'),
(45, 8, 28, 31, NULL, NULL, 7.000, '2023-12-09 04:47:53', '2023-12-09 04:47:53'),
(46, 8, 29, 28, NULL, NULL, 0.250, '2023-12-09 04:47:53', '2023-12-09 04:47:53'),
(47, 8, 29, 29, NULL, NULL, 1.000, '2023-12-09 04:47:53', '2023-12-09 04:47:53'),
(48, 8, 29, 30, NULL, NULL, 3.000, '2023-12-09 04:47:53', '2023-12-09 04:47:53'),
(49, 8, 29, 31, NULL, NULL, 4.000, '2023-12-09 04:47:53', '2023-12-09 04:47:53'),
(50, 8, 30, 28, NULL, NULL, 0.167, '2023-12-09 04:47:53', '2023-12-09 04:47:53'),
(51, 8, 30, 29, NULL, NULL, 0.333, '2023-12-09 04:47:53', '2023-12-09 04:47:53'),
(52, 8, 30, 30, NULL, NULL, 1.000, '2023-12-09 04:47:53', '2023-12-09 04:47:53'),
(53, 8, 30, 31, NULL, NULL, 2.000, '2023-12-09 04:47:53', '2023-12-09 04:47:53'),
(54, 8, 31, 28, NULL, NULL, 0.143, '2023-12-09 04:47:53', '2023-12-09 04:47:53'),
(55, 8, 31, 29, NULL, NULL, 0.250, '2023-12-09 04:47:53', '2023-12-09 04:47:53'),
(56, 8, 31, 30, NULL, NULL, 0.500, '2023-12-09 04:47:53', '2023-12-09 04:47:53'),
(57, 8, 31, 31, NULL, NULL, 1.000, '2023-12-09 04:47:53', '2023-12-09 04:47:53');

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
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skala_nilai`
--

CREATE TABLE `skala_nilai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nilai` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skala_nilai`
--

INSERT INTO `skala_nilai` (`id`, `nilai`, `nama`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sama pentingnya', '2023-12-09 02:10:51', '2023-12-11 12:18:01'),
(2, 2, 'Antara 1 dan 3', '2023-12-09 02:10:51', '2023-12-09 02:10:51'),
(3, 3, 'Agak penting', '2023-12-09 02:10:51', '2023-12-11 12:18:26'),
(4, 4, 'Antara 3 dan 5', '2023-12-09 02:10:51', '2023-12-09 02:10:51'),
(5, 5, 'Cukup Penting', '2023-12-09 02:10:51', '2023-12-09 02:10:51'),
(6, 6, 'Antara 5 dan 7', '2023-12-09 02:10:51', '2023-12-09 02:10:51'),
(7, 7, 'Lebih Penting', '2023-12-09 02:10:51', '2023-12-11 12:18:46'),
(8, 8, 'Antara 7 dan 9', '2023-12-09 02:10:51', '2023-12-09 02:10:51'),
(9, 9, 'Sangat Penting', '2023-12-09 02:10:51', '2023-12-09 02:10:51');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kriteria`
--

CREATE TABLE `sub_kriteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kriteria_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_kriteria`
--

INSERT INTO `sub_kriteria` (`id`, `uuid`, `kriteria_id`, `nama`, `keterangan`, `created_at`, `updated_at`) VALUES
(17, 'd74096d1-7466-4420-8baf-2fb0cde0d2d3', 5, '<2.000.000', '-', '2023-12-09 03:06:40', '2023-12-11 12:21:24'),
(18, 'f3c86a19-6812-4d13-aec6-7939d8cc2afb', 5, '>= 2.000.000', '-', '2023-12-09 03:07:21', '2023-12-14 12:07:42'),
(19, '24dd71a0-fbeb-4d33-ad08-fef7f3fc1df8', 5, '>= 3.000.000', '-', '2023-12-09 03:08:04', '2023-12-14 12:07:16'),
(20, 'cbbcdd1b-bff2-4f3f-a306-02e4181a96ce', 5, '>= 4.000.000', '-', '2023-12-09 03:08:29', '2023-12-14 12:08:20'),
(21, 'ec4494c4-06e7-4a37-a80e-b95f305b7b39', 6, '> 4', '-', '2023-12-09 03:09:45', '2023-12-11 12:21:36'),
(22, 'd9fc92dd-0430-4b17-a55a-ea5a3a50aae8', 6, '3', '-', '2023-12-09 03:10:11', '2023-12-11 12:22:09'),
(23, 'd49db565-6ec8-464c-99e5-d5055524f87c', 6, '2', '-', '2023-12-09 03:10:42', '2023-12-11 12:22:44'),
(24, '1c708b2f-cf2c-4331-85f1-4771a5f64043', 6, '1', '-', '2023-12-09 03:10:59', '2023-12-11 12:23:30'),
(25, '7791692a-7c8a-4863-9f0d-e5683dff68c5', 7, 'BURUH', '-', '2023-12-09 03:18:00', '2024-01-09 01:31:02'),
(26, '7dfd891d-0cec-4e4e-9b3b-6240f24b576b', 7, 'PEDAGANG', '-', '2023-12-09 03:22:27', '2024-01-09 01:31:26'),
(27, '8b4693ce-9467-4b79-a104-8b5af24cee30', 7, 'PNS', '-', '2023-12-09 03:22:56', '2023-12-11 12:22:55'),
(28, 'e991d390-a1a2-4b30-87a0-396fa8f02bb5', 8, 'SMK', '-', '2023-12-09 03:23:40', '2023-12-11 12:21:09'),
(29, '41b04ae6-7e8c-471f-9941-ff5288b077ed', 8, 'SMA', '-', '2023-12-09 03:23:58', '2023-12-11 12:22:25'),
(30, 'dad25712-cdff-417b-8e94-41413bd240c6', 8, 'MADRASAH', '-', '2023-12-09 03:24:24', '2023-12-11 12:23:07'),
(31, '5c2a3006-d037-4c69-84d4-4e1e9102a0be', 8, 'PAKET C', '-', '2023-12-09 03:24:50', '2023-12-11 12:23:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `status`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$7hfV52FbMwUoqQK49PCB6OS8JIhszxPWS700aIKWffefYXu8JkVT6', 0, NULL, 'owCWQNmi8WPudvHAGOep0SB5KTkx8uvL78CP1yCZu824mYWo7bQZOGtYJffm', '2023-12-09 02:10:51', '2023-12-09 02:10:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternatif`
--
ALTER TABLE `alternatif`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alternatif_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `alternatif_kode_unique` (`kode`),
  ADD UNIQUE KEY `alternatif_nama_unique` (`nama`);

--
-- Indexes for table `alternatif_kriteria`
--
ALTER TABLE `alternatif_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `alternatif_kriteria_alternatif_id_foreign` (`alternatif_id`),
  ADD KEY `alternatif_kriteria_kriteria_id_foreign` (`kriteria_id`),
  ADD KEY `alternatif_kriteria_sub_kriteria_id_foreign` (`sub_kriteria_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kriteria_uuid_unique` (`uuid`),
  ADD UNIQUE KEY `kriteria_kode_unique` (`kode`),
  ADD UNIQUE KEY `kriteria_nama_unique` (`nama`);

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
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perbandingan_kriteria_kriteria1_id_foreign` (`kriteria1_id`),
  ADD KEY `perbandingan_kriteria_kriteria2_id_foreign` (`kriteria2_id`),
  ADD KEY `perbandingan_kriteria_skala_nilai_id_foreign` (`skala_nilai_id`);

--
-- Indexes for table `perbandingan_sub_kriteria`
--
ALTER TABLE `perbandingan_sub_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `perbandingan_sub_kriteria_kriteria_id_foreign` (`kriteria_id`),
  ADD KEY `perbandingan_sub_kriteria_sub_kriteria1_id_foreign` (`sub_kriteria1_id`),
  ADD KEY `perbandingan_sub_kriteria_sub_kriteria2_id_foreign` (`sub_kriteria2_id`),
  ADD KEY `perbandingan_sub_kriteria_skala_nilai_id_foreign` (`skala_nilai_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `skala_nilai`
--
ALTER TABLE `skala_nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_kriteria_uuid_unique` (`uuid`),
  ADD KEY `sub_kriteria_kriteria_id_foreign` (`kriteria_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alternatif`
--
ALTER TABLE `alternatif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `alternatif_kriteria`
--
ALTER TABLE `alternatif_kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `perbandingan_sub_kriteria`
--
ALTER TABLE `perbandingan_sub_kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skala_nilai`
--
ALTER TABLE `skala_nilai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternatif_kriteria`
--
ALTER TABLE `alternatif_kriteria`
  ADD CONSTRAINT `alternatif_kriteria_alternatif_id_foreign` FOREIGN KEY (`alternatif_id`) REFERENCES `alternatif` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alternatif_kriteria_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alternatif_kriteria_sub_kriteria_id_foreign` FOREIGN KEY (`sub_kriteria_id`) REFERENCES `sub_kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `perbandingan_kriteria`
--
ALTER TABLE `perbandingan_kriteria`
  ADD CONSTRAINT `perbandingan_kriteria_kriteria1_id_foreign` FOREIGN KEY (`kriteria1_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `perbandingan_kriteria_kriteria2_id_foreign` FOREIGN KEY (`kriteria2_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `perbandingan_kriteria_skala_nilai_id_foreign` FOREIGN KEY (`skala_nilai_id`) REFERENCES `skala_nilai` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `perbandingan_sub_kriteria`
--
ALTER TABLE `perbandingan_sub_kriteria`
  ADD CONSTRAINT `perbandingan_sub_kriteria_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `perbandingan_sub_kriteria_skala_nilai_id_foreign` FOREIGN KEY (`skala_nilai_id`) REFERENCES `skala_nilai` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `perbandingan_sub_kriteria_sub_kriteria1_id_foreign` FOREIGN KEY (`sub_kriteria1_id`) REFERENCES `sub_kriteria` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `perbandingan_sub_kriteria_sub_kriteria2_id_foreign` FOREIGN KEY (`sub_kriteria2_id`) REFERENCES `sub_kriteria` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_kriteria`
--
ALTER TABLE `sub_kriteria`
  ADD CONSTRAINT `sub_kriteria_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
