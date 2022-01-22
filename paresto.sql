-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Agu 2021 pada 06.13
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `paresto`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id`, `pesanan_id`, `menu_id`, `jumlah`, `created_at`, `updated_at`) VALUES
(8, 9, 1, 2, '2021-08-01 09:45:17', '2021-08-01 09:45:17'),
(9, 9, 2, 2, '2021-08-01 09:45:17', '2021-08-01 09:45:17'),
(10, 9, 3, 2, '2021-08-01 09:45:17', '2021-08-01 09:45:17'),
(59, 28, 1, 3, '2021-08-03 16:06:04', '2021-08-03 16:06:04'),
(60, 28, 4, 2, '2021-08-03 16:06:05', '2021-08-03 16:06:05'),
(83, 37, 1, 3, '2021-08-03 20:40:14', '2021-08-03 20:40:14'),
(84, 37, 3, 3, '2021-08-03 20:40:14', '2021-08-03 20:40:14'),
(85, 37, 4, 3, '2021-08-03 20:40:14', '2021-08-03 20:40:14'),
(86, 38, 1, 3, '2021-08-03 20:42:26', '2021-08-03 20:42:26'),
(87, 38, 2, 3, '2021-08-03 20:42:26', '2021-08-03 20:42:26'),
(88, 38, 4, 3, '2021-08-03 20:42:26', '2021-08-03 20:42:26'),
(89, 39, 1, 2, '2021-08-03 20:48:55', '2021-08-03 20:48:55'),
(90, 39, 3, 2, '2021-08-03 20:48:55', '2021-08-03 20:48:55'),
(91, 39, 5, 2, '2021-08-03 20:48:55', '2021-08-03 20:48:55'),
(92, 40, 1, 1, '2021-08-03 20:52:01', '2021-08-03 20:52:01'),
(93, 40, 3, 1, '2021-08-03 20:52:01', '2021-08-03 20:52:01'),
(94, 40, 4, 2, '2021-08-03 20:52:01', '2021-08-03 20:52:01'),
(95, 41, 1, 3, '2021-08-03 20:54:31', '2021-08-03 20:54:31'),
(96, 41, 3, 3, '2021-08-03 20:54:31', '2021-08-03 20:54:31'),
(97, 41, 5, 3, '2021-08-03 20:54:31', '2021-08-03 20:54:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kd_transaksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi_feedback` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_menu`
--

CREATE TABLE `kategori_menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kategori_menu`
--

INSERT INTO `kategori_menu` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'makanan', NULL, NULL),
(2, 'minuman', NULL, NULL),
(3, 'cemilan', NULL, NULL),
(4, 'tambahan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE `meja` (
  `no_meja` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('dipesan','dipakai','kosong') COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `meja`
--

INSERT INTO `meja` (`no_meja`, `nama`, `status`, `jumlah`, `created_at`, `updated_at`) VALUES
(1, NULL, 'dipakai', 10, NULL, NULL),
(2, NULL, 'kosong', 10, NULL, NULL),
(3, NULL, 'dipesan', 6, NULL, '2021-08-04 19:36:20'),
(4, 'ivan', 'dipesan', 6, NULL, '2021-08-05 20:05:13'),
(5, NULL, 'dipakai', 6, NULL, '2021-08-03 14:33:08'),
(6, NULL, 'dipakai', 6, NULL, '2021-08-03 16:06:04'),
(7, NULL, 'dipakai', 6, NULL, '2021-08-03 16:07:28'),
(8, NULL, 'dipakai', 6, NULL, '2021-08-03 20:42:26'),
(9, NULL, 'kosong', 2, NULL, NULL),
(10, NULL, 'dipakai', 2, NULL, NULL),
(11, NULL, 'kosong', 2, NULL, NULL),
(12, NULL, 'dipakai', 2, NULL, NULL),
(13, NULL, 'dipakai', 2, NULL, NULL),
(14, NULL, 'kosong', 4, NULL, NULL),
(15, NULL, 'dipakai', 4, NULL, NULL),
(16, NULL, 'kosong', 4, NULL, NULL),
(17, NULL, 'dipakai', 4, NULL, NULL),
(18, NULL, 'kosong', 4, NULL, '2021-08-03 06:38:14'),
(19, NULL, 'dipakai', 4, NULL, '2021-08-03 19:42:21'),
(20, NULL, 'dipakai', 4, NULL, '2021-08-03 20:00:07'),
(21, NULL, 'dipakai', 4, NULL, '2021-08-03 20:52:00'),
(22, NULL, 'dipakai', 4, NULL, NULL),
(23, NULL, 'kosong', 4, NULL, NULL),
(24, NULL, 'kosong', 4, NULL, NULL),
(25, NULL, 'dipakai', 4, NULL, NULL),
(26, NULL, 'dipakai', 4, NULL, NULL),
(27, NULL, 'dipakai', 4, NULL, NULL),
(28, NULL, 'dipakai', 4, NULL, NULL),
(29, NULL, 'dipakai', 4, NULL, NULL),
(30, NULL, 'kosong', 4, NULL, NULL),
(31, NULL, 'dipakai', 4, NULL, '2021-08-03 20:48:54'),
(32, NULL, 'dipakai', 4, NULL, NULL),
(33, NULL, 'kosong', 4, NULL, NULL),
(34, NULL, 'dipakai', 4, NULL, NULL),
(35, NULL, 'dipakai', 4, NULL, NULL),
(36, NULL, 'kosong', 4, NULL, NULL),
(37, NULL, 'dipakai', 4, NULL, '2021-08-03 20:54:31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `status` enum('tersedia','habis') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `kategori_id`, `nama`, `gambar`, `harga`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ramen', NULL, 15000, 'tersedia', NULL, '2021-08-03 21:24:23'),
(2, 1, 'Mie Ayam', NULL, 10000, 'habis', NULL, '2021-08-04 19:34:22'),
(3, 1, 'Nasi Goreng Spesial', NULL, 20000, 'tersedia', NULL, '2021-08-02 00:27:42'),
(4, 2, 'Jus Alpukat', NULL, 5000, 'tersedia', NULL, '2021-08-03 21:24:23'),
(5, 2, 'Es Teh', NULL, 3000, 'tersedia', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_06_07_154827_create_meja_table', 1),
(6, '2021_06_07_155329_create_kategori_menu_table', 1),
(7, '2021_06_07_155417_create_menu_table', 1),
(8, '2021_06_07_155525_create_pesanan_table', 1),
(9, '2021_06_07_155855_create_transaksi_table', 1),
(10, '2021_06_07_155944_create_feedback_table', 1),
(11, '2021_06_07_160034_create_detail_pesanan_table', 1),
(12, '2021_06_29_221112_create_pegawai_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `user_id`, `alamat`, `no_telp`, `jk`, `created_at`, `updated_at`) VALUES
(1, 2, 'pekanbaru', '089343456545', 'L', NULL, NULL),
(2, 3, 'kuningan', '089343456545', 'L', NULL, NULL),
(3, 4, 'palembang', '089343456545', 'L', NULL, NULL),
(4, 5, 'palembang', '089343456545', 'L', NULL, '2021-08-04 05:59:26'),
(5, 6, 'padang', '089343456545', 'P', NULL, NULL),
(6, 9, 'caracas, cilimus, kunigan', '089662040250', 'L', '2021-08-05 19:32:06', '2021-08-05 19:32:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `created_at`, `updated_at`) VALUES
(6, 'App\\Models\\User', 1, 'token-name', '0b07f1446704b10a25cba21cfd343c7dec846971b2e98d1151cdf7e4e70027d0', '[\"*\"]', '2021-08-02 06:00:49', '2021-08-02 05:29:31', '2021-08-02 06:00:49'),
(7, 'App\\Models\\User', 1, 'token-name', 'ae34db4e9312e0d2f6a762fab188ebe2639990c868a363160f842dcf59690f01', '[\"*\"]', '2021-08-02 06:02:27', '2021-08-02 06:02:21', '2021-08-02 06:02:27'),
(8, 'App\\Models\\User', 1, 'token-name', 'ae021f9405c8de16d6b00c1e31474ae4461147b99affd0dee08cfa233e8ba539', '[\"*\"]', '2021-08-02 06:03:13', '2021-08-02 06:03:08', '2021-08-02 06:03:13'),
(9, 'App\\Models\\User', 1, 'token-name', '5ed60a780c84e5ecf69e0228f7a26bf813f2b6b60424101909098bbb7a4cb6c8', '[\"*\"]', '2021-08-02 06:04:34', '2021-08-02 06:04:29', '2021-08-02 06:04:34'),
(10, 'App\\Models\\User', 1, 'token-name', '8722bb177d29fe7944d219db9ade288aabd6665271063062496cdc1b549fc604', '[\"*\"]', '2021-08-02 06:06:14', '2021-08-02 06:06:09', '2021-08-02 06:06:14'),
(11, 'App\\Models\\User', 1, 'token-name', '615db9240fba601e3d130d6c9d887ebd66e8c42366e6aa0b4a2eb11e55f25f3d', '[\"*\"]', '2021-08-02 06:07:44', '2021-08-02 06:07:20', '2021-08-02 06:07:44'),
(13, 'App\\Models\\User', 4, 'token-name', 'd5e209438a35a9c5d23030d64108cffe054b8a784d471518e059a9d5437b433d', '[\"*\"]', '2021-08-02 20:08:29', '2021-08-02 19:15:50', '2021-08-02 20:08:29'),
(14, 'App\\Models\\User', 4, 'token-name', '9e29fa3a2c548fc292c1cfa1cc21477def27368c02da6e5b1d22da334fbe4519', '[\"*\"]', '2021-08-02 20:07:18', '2021-08-02 20:05:59', '2021-08-02 20:07:18'),
(15, 'App\\Models\\User', 6, 'token-name', '083f81629b5fe13b90b291e6943b8cffbd7348740fe26f30aaf12c300fd1f2db', '[\"*\"]', '2021-08-02 20:08:49', '2021-08-02 20:07:56', '2021-08-02 20:08:49'),
(17, 'App\\Models\\User', 4, 'token-name', '491f6acec0f6427a9e5b73005174fdd630aa75fa0dd462d41ced07407eb22e67', '[\"*\"]', '2021-08-02 20:09:34', '2021-08-02 20:09:15', '2021-08-02 20:09:34'),
(18, 'App\\Models\\User', 6, 'token-name', '571d59673540752d8572a40e1c6616bbbe64b3a43ecfe528df89994eb6103028', '[\"*\"]', '2021-08-03 09:57:21', '2021-08-03 05:37:04', '2021-08-03 09:57:21'),
(19, 'App\\Models\\User', 6, 'token-name', '6a412cb975bb06f259e765060a607214453f10278ed6730563f39868cd02ba51', '[\"*\"]', '2021-08-03 16:11:50', '2021-08-03 13:33:04', '2021-08-03 16:11:50'),
(24, 'App\\Models\\User', 3, 'token-name', '7d1ffc2a869a937bf3f3af234f7be2be1378bc19c88161e0fe07202ef55d2085', '[\"*\"]', '2021-08-04 00:51:22', '2021-08-03 21:35:24', '2021-08-04 00:51:22'),
(31, 'App\\Models\\User', 4, 'token-name', '0267ff561a70a7b46e00d59ef4c71d4ab61e13337a77536af51f52407a633544', '[\"*\"]', '2021-08-04 19:37:01', '2021-08-04 19:33:39', '2021-08-04 19:37:01'),
(35, 'App\\Models\\User', 1, 'token-name', 'ede3bff8f9af30099d2910a6c018bd8546df4ab6bb585a9b48ce62e1d4e18712', '[\"*\"]', '2021-08-05 10:13:08', '2021-08-04 23:02:45', '2021-08-05 10:13:08'),
(40, 'App\\Models\\User', 3, 'token-name', 'e9c2581a65c99fe2c901d347b02fc1d71b432663cef841b5843171599e275728', '[\"*\"]', '2021-08-05 21:06:54', '2021-08-05 21:06:50', '2021-08-05 21:06:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_meja` bigint(20) UNSIGNED NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `no_antrian` int(11) NOT NULL,
  `status` enum('menunggu','diproses','selesai','habis') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `no_meja`, `pegawai_id`, `no_antrian`, `status`, `created_at`, `updated_at`) VALUES
(2, 7, 4, 2, 'selesai', NULL, NULL),
(9, 5, 3, 4, 'selesai', '2021-07-31 20:18:29', '2021-08-02 00:50:37'),
(28, 6, 5, 1, 'selesai', '2021-08-03 16:06:04', '2021-08-03 21:28:30'),
(37, 8, 5, 1, 'selesai', '2021-08-03 20:40:14', '2021-08-03 22:35:00'),
(38, 8, 5, 1, 'selesai', '2021-08-03 20:42:26', '2021-08-04 19:34:57'),
(39, 31, 5, 1, 'diproses', '2021-08-03 20:48:55', '2021-08-03 22:29:06'),
(40, 21, 5, 1, 'selesai', '2021-08-03 20:52:01', '2021-08-03 22:33:08'),
(41, 37, 5, 1, 'selesai', '2021-08-03 20:54:31', '2021-08-03 22:33:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `kd_transaksi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `pesanan_id` bigint(20) UNSIGNED NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`kd_transaksi`, `pegawai_id`, `pesanan_id`, `total_bayar`, `created_at`, `updated_at`) VALUES
('tr020821100001', 2, 9, 100000, '2021-08-02 03:20:29', '2021-08-02 03:20:29'),
('tr020821100002', 2, 2, 1, '2021-08-02 03:22:11', '2021-08-02 03:22:11'),
('tr040821060001', 2, 28, 55000, '2021-08-03 23:57:24', '2021-08-03 23:57:24'),
('tr050821020001', 2, 37, 200000, '2021-08-04 19:32:16', '2021-08-04 19:32:16'),
('tr0508210200010002', 2, 40, 50000, '2021-08-04 19:32:43', '2021-08-04 19:32:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` enum('admin','koki','kasir','pelayan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `foto`, `email`, `email_verified_at`, `username`, `password`, `roles`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, 'admin@localhost.com', NULL, 'admin', '$2y$10$bIbKAEY63j8botQyEps23.S9olxXKmswRrT1jS0oH0E7c9Ctsflt.', 'admin', NULL, NULL, NULL),
(2, 'aras', NULL, 'aras@localhost.com', NULL, 'aras', '$2y$10$XrmbHdHkx.pvgeP/L.eAquSSfKS4h.v1VCtKtQPKMhpAhb/rvdqsS', 'koki', NULL, NULL, NULL),
(3, 'ivan', NULL, 'ivan@localhost.com', NULL, 'ivan', '$2y$10$uIDdCGI.nZv6IurI4V763OpjxOgKIDFeuQA/k7pDJzv.Q3lTANS0W', 'kasir', NULL, NULL, NULL),
(4, 'argya', NULL, 'argya@localhost.com', NULL, 'argya', '$2y$10$CzZVBcY1Y6NJePIjU4ue5.E3CFVXmHPQuhUi33OuraoyLpe6XMt/S', 'pelayan', NULL, NULL, NULL),
(5, 'tommy', NULL, 'tommy@localhost.com', NULL, 'tommy', '$2y$10$7zfAA6uqEf0zTctEchEWVuLV05yySer7WDNE9GbV7IrfXpD9GrYH6', 'kasir', NULL, NULL, NULL),
(6, 'fiona', NULL, 'fiona@localhost.com', NULL, 'fiona', '$2y$10$HLXNrK7FUgmQetQRA6IixeoefNClKQX0vdf75SJ6l5/KxFV.aAiCq', 'pelayan', NULL, NULL, NULL),
(9, 'Ivan Faathirza', '8nzXExnf9kIm9iscYpyEpSAyOFExbWWVhIrfVXBi.png', 'ivanfaathirza@gmail.com', NULL, 'ivan1', '$2y$10$TWQ0qRHZQaZkL7/2cxpl4uMEIOjJAcYz.16EAHjIziohrBYGxZVhS', 'admin', NULL, '2021-08-05 19:32:06', '2021-08-05 19:32:06');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detail_pesanan_menu_id_foreign` (`menu_id`),
  ADD KEY `detail_pesanan_pesanan_id_foreign` (`pesanan_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feedback_kd_transaksi_foreign` (`kd_transaksi`);

--
-- Indeks untuk tabel `kategori_menu`
--
ALTER TABLE `kategori_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`no_meja`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_kategori_id_foreign` (`kategori_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanan_no_meja_foreign` (`no_meja`),
  ADD KEY `pesanan_pegawai_id_foreign` (`pegawai_id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kd_transaksi`),
  ADD KEY `transaksi_pegawai_id_foreign` (`pegawai_id`),
  ADD KEY `transaksi_pesanan_id_foreign` (`pesanan_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori_menu`
--
ALTER TABLE `kategori_menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `meja`
--
ALTER TABLE `meja`
  MODIFY `no_meja` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pesanan_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_kd_transaksi_foreign` FOREIGN KEY (`kd_transaksi`) REFERENCES `transaksi` (`kd_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori_menu` (`id`);

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_no_meja_foreign` FOREIGN KEY (`no_meja`) REFERENCES `meja` (`no_meja`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanan_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_pesanan_id_foreign` FOREIGN KEY (`pesanan_id`) REFERENCES `pesanan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
