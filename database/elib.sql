-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 10 Des 2024 pada 10.37
-- Versi server: 8.0.30
-- Versi PHP: 8.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elib`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `books`
--

CREATE TABLE `books` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `books`
--

INSERT INTO `books` (`id`, `title`, `author`, `category`, `created_at`, `updated_at`, `image`) VALUES
(1, 'Laskar Pelangi', 'Andrea Hirata', 'Fiksi', '2024-11-27 06:50:36', '2024-11-27 06:50:36', 'book2.jpg'),
(2, 'Laskar Pelangi', 'Tere Liye', 'Fiksi', '2024-11-27 06:50:36', '2024-11-27 06:50:36', 'book1.jpg'),
(3, 'Bumi Manusia', 'Marah Roesli', 'Fiksi', '2024-11-27 06:50:36', '2024-11-27 06:50:36', 'book2.jpg'),
(4, 'Siti Nurbaya', 'Andrea Hirata', 'Fiksi', '2024-11-27 06:50:36', '2024-11-27 06:50:36', 'book4.jpg'),
(5, 'Pulang', 'Dewi Lestari', 'Fiksi', '2024-11-27 06:50:36', '2024-11-27 06:50:36', 'book2.jpg'),
(6, 'Laskar Pelangi', 'Kahlil Gibran', 'Fiksi', '2024-11-27 06:50:36', '2024-11-27 06:50:36', 'book2.jpg'),
(7, 'Bumi Manusia', 'Andrea Hirata', 'Fiksi', '2024-11-27 06:50:36', '2024-11-27 06:50:36', 'book2.jpg'),
(8, 'Kumpulan Cerita Rakyat', 'Habiburrahman El Shirazy', 'Fiksi', '2024-11-27 06:50:36', '2024-11-27 06:50:36', 'book1.jpg'),
(9, 'Kumpulan Cerita Rakyat', 'Marah Roesli', 'Fiksi', '2024-11-27 06:50:36', '2024-11-27 06:50:36', 'book1.jpg'),
(10, 'Pilar-pilar Kekuatan', 'Habiburrahman El Shirazy', 'Fiksi', '2024-11-27 06:50:36', '2024-11-27 06:50:36', 'book4.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('admin@admin.com|127.0.0.1', 'i:1;', 1732734336),
('admin@admin.com|127.0.0.1:timer', 'i:1732734336;', 1732734336);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_10_24_054137_create_books_table', 1),
(5, '2024_10_24_054219_create_transactions_table', 1),
(6, '2024_11_06_160822_add_image_to_books_table', 1),
(7, '2024_11_14_125030_add_role_to_user_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('JZCbaJtzyGpgAOp11VV5scBUv92CQ8XLq0Rmzl5r', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZjNqbE5TM3hHY0tJeWRWZXE5SVh4VG1wbjB2d0EwdFJJdVhBU0JiMiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1732737327),
('kDNHBradcoLFTTvqxKgvmrGTH0YAlSytj434EUO2', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiU0xnbDdIaGg4a0VWWWZjNDQ3eHdWY1B3dnVjTTNzQ2tNcHh3NkRXZSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi91c2Vycz9wYWdlPTMiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1732736517),
('neEjUJeNHrbjq3xKDtxQDB2DhHdqLLymS4NyJPGo', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSlBQMkJmMlY0bXNiZGhNZk92eFhkRjA4WWxmZmpBU25HbGZaUGgxUiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi91c2VycyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1732731341),
('rnJGQ73W4mXCqBdXoFYPnhUmwSirK2YQyATMkCEu', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNWhiNHdQMVJ1dUt1Z1JLaXluU1E4cDZWTkdYMUFtcnBXSHZLQVN1ZiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1732736997),
('z1cTKTSCn50yeLyKQCItqyI0FevKHeZjCjIPhmlo', 7, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiWWdFZ0xoWG05WlFJSzBBTmdLVWRuSkNwZWprYWxoa3J2eEpFMHNJNyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo3O3M6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO319', 1732732871);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `book_id` bigint UNSIGNED NOT NULL,
  `borrow_date` date NOT NULL,
  `return_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`, `role`) VALUES
(1, 'MAHYUDIN', 'admin@gmail.com', '$2y$12$5TzlO7KmZhxHNl1aDUhzlOaeXTiOKfPswjRx7LLb9vTLIYH4fPXji', '2024-11-27 06:51:20', '2024-11-27 12:55:20', 'admin'),
(2, 'Test Edit', 'john.doe@gmail.com', '$2y$12$Nw44q3yD0tggYZHLFxaMR1sFjV97khJtA7yMOzSZ72BcpIu1r33iq', '2024-11-27 07:02:35', '2024-11-27 12:28:02', 'user'),
(3, 'Jane Smith', 'jane.smith@gmail.com', '$2y$12$GH9uQy0d10p02a9Uev8k7M5wgb4pW3wM5B88jLfX5bP8GQQ.Ejlhm', '2024-11-27 07:12:01', '2024-11-27 07:12:01', 'user'),
(4, 'Alice Johnson', 'alice.johnson@gmail.com', '$2y$12$g9mQbxUEb3esqnv9jiBdI8WjKPe5g1KmXtbz7bBd1Iu6g7c4aAXbm', '2024-11-27 07:23:45', '2024-11-27 07:23:45', 'user'),
(5, 'Bob Williams', 'bob.williams@gmail.com', '$2y$12$9y45mbz.o7gV5iEg4yW7iRz02HEhM69KDlNnN1z6q5w0yVd7Xm0Aq', '2024-11-27 07:34:10', '2024-11-27 07:34:10', 'user'),
(6, 'testing', 'ahmad@gmail.com', '$2y$12$ErytIBvt9vPzAS2uiL5us.f0WxJkb1qs0aMVtVDwYhFGVu21HDavS', '2024-11-27 10:35:19', '2024-11-27 10:35:19', 'user'),
(7, 'Chris Lee', 'chris.lee@gmail.com', '$2y$12$eD5tNGBvptPLnHn4JQ5Mk2ZP9hflnT2tnVv0xt3rxePahpwM3rbeO', '2024-11-27 10:50:23', '2024-11-27 10:50:23', 'user'),
(8, 'David Brown', 'david.brown@gmail.com', '$2y$12$DoYQynXeAB5u0OlQ8XzYrIuXw5Yg1ql71g0A4i9pmuMfhw.b8HcUi', '2024-11-27 11:01:01', '2024-11-27 11:01:01', 'user'),
(9, 'Eve Black', 'eve.black@gmail.com', '$2y$12$P4H7cdo5eV3YJHeaUpJzp9lRh8W4suj0yz7uV1tJuq2uhTzCBsOje', '2024-11-27 11:12:39', '2024-11-27 11:12:39', 'user'),
(10, 'Frank White', 'frank.white@gmail.com', '$2y$12$Ak8mOniQxU3yZcd3v3PpzRzrlbmHt7Fwrt2WlrOsZazwHs7G5yFnyW', '2024-11-27 11:23:15', '2024-11-27 11:23:15', 'user'),
(11, 'Grace Green', 'grace.green@gmail.com', '$2y$12$6n6Z.Dt73EXyyNN0EBLRhDhzZ1hgS8RrGmIuNkNV7T6JkXW2kR.Zi', '2024-11-27 11:34:04', '2024-11-27 11:34:04', 'user'),
(12, 'Hank Blue', 'hank.blue@gmail.com', '$2y$12$XDB1k6Z1F38qNYslNKt4h2vHDKtb1IZmYtXzBXy4Eewtn3wIkEvK2', '2024-11-27 11:45:33', '2024-11-27 11:45:33', 'user'),
(13, 'Ivy Gray', 'ivy.gray@gmail.com', '$2y$12$zR7hPVo4fQGb5.nIw1dXnF3DZBsyuOdMyV8ROiMhf2iM2Jlfo2aLi', '2024-11-27 11:56:22', '2024-11-27 11:56:22', 'user'),
(14, 'Jack Scott', 'jack.scott@gmail.com', '$2y$12$aiBQpE.vhZb21ElHZ2ivXmUysfpyIc2/Usbb7phLNr7u4O11L8FcW', '2024-11-27 12:07:41', '2024-11-27 12:07:41', 'user'),
(15, 'Kim White', 'kim.white@gmail.com', '$2y$12$MkXbFkmbWsLRXz1t4.kREoZGygnRIsnEX03lkgST6vhXiHiHGbSdm', '2024-11-27 12:18:30', '2024-11-27 12:18:30', 'user'),
(16, 'Louis King', 'louis.king@gmail.com', '$2y$12$2xlV5thF7gGJ7YBzGht2UwrMRySygPfmUePv9O7brx9v9gic6t21R', '2024-11-27 12:29:18', '2024-11-27 12:29:18', 'user'),
(18, 'Nathan Harris', 'nathan.harris@gmail.com', '$2y$12$OesLxYgxbCpqODdZt5MPQyCpTbN1M11gfqLj99yAYXzoTcrbLw3Pq', '2024-11-27 12:51:00', '2024-11-27 12:51:00', 'user'),
(19, 'Olivia Clark', 'olivia.clark@gmail.com', '$2y$12$5XsmyibGHFOafWlsuX4FyVoS3lK27lYarjj8LPfdSxGFmH2Ll9t92', '2024-11-27 13:02:42', '2024-11-27 13:02:42', 'user'),
(20, 'Peter Lewis', 'peter.lewis@gmail.com', '$2y$12$8ePR04aM4fTfxuKbn7ZET96fvA6JlIAzjGbXKJ.P7J.VkBbsmczHe', '2024-11-27 13:13:35', '2024-11-27 13:13:35', 'user'),
(22, 'Rita Hall', 'rita.hall@gmail.com', '$2y$12$Fi0T5dVXwQTVGyM5eV2.6wGTlyCoGbZfDjsSH2ckbQU5p6Rxp7S3h', '2024-11-27 13:35:01', '2024-11-27 13:35:01', 'user'),
(23, 'Tesssssssss', 'sam.adams@gmail.com', '$2y$12$5SKlTZqBY0dcT8E3zURwgoFlYh2dp56S7aI43PMy1CIBWkA4pqZua', '2024-11-27 13:46:11', '2024-11-27 12:55:04', 'user'),
(24, 'Tina Walker', 'tina.walker@gmail.com', '$2y$12$gyNE7pXGb.JHHUEtv94dSt2R3Ij4sV8ebYoyI9DWhgsOnINzH0pKm', '2024-11-27 13:57:28', '2024-11-27 13:57:28', 'user'),
(25, 'Ursula Carter', 'ursula.carter@gmail.com', '$2y$12$hGo.G8RfmZg6Wy4zUk6Bf9K1dh46EnVyImP3wNcdCWrbrl0E.Jn1a', '2024-11-27 14:08:10', '2024-11-27 14:08:10', 'user'),
(26, 'Vince Moore', 'vince.moore@gmail.com', '$2y$12$AC2Pbb06E7FJ6reJLRLMti8lMKXcK1hJcksl9f0Fq6JtVg6p7wNte', '2024-11-27 14:19:28', '2024-11-27 14:19:28', 'user'),
(27, 'Wendy Green', 'wendy.green@gmail.com', '$2y$12$9V7Lg8u67kG6S5rZKc6sru3JH4WfuJh7bC5r9wFi60Wv0bmEd2TV2', '2024-11-27 14:30:07', '2024-11-27 14:30:07', 'user'),
(28, 'Xander King', 'xander.king@gmail.com', '$2y$12$J7IgbI9zbx8c/PoDAITP.bSk7lqfI1jlvD1gC3eHcF8epS9tMfB7q', '2024-11-27 14:41:05', '2024-11-27 14:41:05', 'user'),
(29, 'Yvonne White', 'yvonne.white@gmail.com', '$2y$12$BodgXU1gj7rOgHddLxyWuK1iXlQUnHNkDZvwyjsb96V5PRy2ptfwq', '2024-11-27 14:52:03', '2024-11-27 14:52:03', 'user'),
(30, 'Zachary Black', 'zachary.black@gmail.com', '$2y$12$Fb5XoHqOWoPjQ5LZYfNXhWB0YsnFLN7Q9m6uknXY0vAfz9mtfrrq.', '2024-11-27 15:03:42', '2024-11-27 15:03:42', 'user'),
(31, 'Aiden Moore', 'aiden.moore@gmail.com', '$2y$12$32TcqV.L2N1GdwM8OZqjLiQ7dzOHbs3A2gkz8w04LfXM1VbskT4gO', '2024-11-27 15:14:19', '2024-11-27 15:14:19', 'user'),
(32, 'Bella Harris', 'bella.harris@gmail.com', '$2y$12$ZDqfw1.YpYrtPRqxqgSkX4Z5VYzlg3Ptx.I89tpxAKg.DYtYo7.Ha', '2024-11-27 15:25:04', '2024-11-27 15:25:04', 'user'),
(33, 'Caleb Allen', 'caleb.allen@gmail.com', '$2y$12$gT9YGLXa7lxlTAN68K4Z6nsHLu2Uqrz1tvBOwncTYs9u66wYoTYiq', '2024-11-27 15:36:13', '2024-11-27 15:36:13', 'user'),
(34, 'Daisy Evans', 'daisy.evans@gmail.com', '$2y$12$Sz7F3uI0ymn1EdG56pIcNTO2mIiGjYHo7UmPOvsZT.TmMz3DdYqV0', '2024-11-27 15:47:30', '2024-11-27 15:47:30', 'user'),
(35, 'Eliot King', 'eliot.king@gmail.com', '$2y$12$AeFhbDD2dYWy.yz4tZGJ6s1UOSdEwSY9.KgLZ8sgWbRs9.pY27H8S', '2024-11-27 15:58:14', '2024-11-27 15:58:14', 'user'),
(36, 'Fiona Lee', 'fiona.lee@gmail.com', '$2y$12$FxjFFUNd.n1dFQkVgT7gk4S3r5sz.xl2BbRVNKnwXh7gHdN8GiVv2', '2024-11-27 16:09:01', '2024-11-27 16:09:01', 'user'),
(37, 'George Young', 'george.young@gmail.com', '$2y$12$ttQ9gDa9Bz9wYw84zOYejJCrgIa.72wQMQilvgctznHedOq0iLg76', '2024-11-27 16:20:47', '2024-11-27 16:20:47', 'user'),
(38, 'Hannah Miller', 'hannah.miller@gmail.com', '$2y$12$ti0wZrFdTPfOa96iVSK9TSvsyZgFml88gTpmY3QnJf47tJKT8rdjw', '2024-11-27 16:31:38', '2024-11-27 16:31:38', 'user'),
(39, 'Ian White', 'ian.white@gmail.com', '$2y$12$8qZsNTThhrmrqbK.EhAYMC8F2WzKdtUNXmjiJ0HeSe72htlpp3Thm', '2024-11-27 16:42:05', '2024-11-27 16:42:05', 'user'),
(40, 'Julia Wilson', 'julia.wilson@gmail.com', '$2y$12$6ccfHpaCI3m5.jbiMl15uErZT8gPHe5jW0VJ7zdsx5Vj9G9MGv.eo', '2024-11-27 16:53:16', '2024-11-27 16:53:16', 'user'),
(41, 'Kevin Scott', 'kevin.scott@gmail.com', '$2y$12$U9oMZjBw85X4DEsfgf6Jh8poKItKb0yzbMjISoKohaxVpdkRrw1Dm', '2024-11-27 17:04:25', '2024-11-27 17:04:25', 'user'),
(42, 'Lily Brown', 'lily.brown@gmail.com', '$2y$12$h5me0uIjWJt9Xna0VnIQPru.Dz8SHtA1Gj1Ir8Wz7of2QTxYyyFQe', '2024-11-27 17:15:11', '2024-11-27 17:15:11', 'user'),
(43, 'Mason Green', 'mason.green@gmail.com', '$2y$12$hsF5y3RdvBgu.sIyfBw4g66PItjEqk18bhxz2KYb5O2N9Ws0IVtmC', '2024-11-27 17:26:08', '2024-11-27 17:26:08', 'user'),
(44, 'Nina Harris', 'nina.harris@gmail.com', '$2y$12$RiYufAA3rHcfTvm3IphXE0xuVsiDbbdyXLKsNxtZl6fxoAKrgTpYa', '2024-11-27 17:37:17', '2024-11-27 17:37:17', 'user'),
(45, 'Oscar Lee', 'oscar.lee@gmail.com', '$2y$12$N5lwp9u88HR1HBB1jy4GnmrTeYm.03D4o7ZQ4z6X0v2WzG1F6mJti', '2024-11-27 17:48:05', '2024-11-27 17:48:05', 'user'),
(46, 'Paul Allen', 'paul.allen@gmail.com', '$2y$12$TGh.ZSxBCRbX8s6n7nd2lR9T1o7rL5yXnMYWfna4ODuT0AWISrysm', '2024-11-27 17:59:04', '2024-11-27 17:59:04', 'user'),
(47, 'Quincy Adams', 'quincy.adams@gmail.com', '$2y$12$zZZmlhHm8LhDbDPjwHs43wGGxJ6cV2dAvlYYVfNq8m71O2.JBdo8q', '2024-11-27 18:10:12', '2024-11-27 18:10:12', 'user'),
(48, 'Rachel Young', 'rachel.young@gmail.com', '$2y$12$US8xF2n0mhmsu9o6Yw9iW0TTHhdDeUvHqZgMUm8votHgYyfNjmBGq', '2024-11-27 18:21:02', '2024-11-27 18:21:02', 'user'),
(49, 'Steve White', 'steve.white@gmail.com', '$2y$12$DgppkpVdITlxGmVGQzmHOSUvg9fATZj.V7KnNV1jiJXXyU9OGYP5u', '2024-11-27 18:32:08', '2024-11-27 18:32:08', 'user'),
(50, 'Tara King', 'tara.king@gmail.com', '$2y$12$Mkh8u00Lmj5XrF17vF4Bvhh8W9OhKFPyGQOdheas8EqPjdRU8Otuq', '2024-11-27 18:43:19', '2024-11-27 18:43:19', 'user'),
(51, 'Uma Thompson', 'uma.thompson@gmail.com', '$2y$12$5k6vL96BSlgyVqFu4N6dWoLlCwUVQpxH0L6Hq.JlPbF3YOzdlRLZK', '2024-11-27 18:54:09', '2024-11-27 18:54:09', 'user'),
(52, 'Victor Roberts', 'victor.roberts@gmail.com', '$2y$12$vhSgxSIZHZn66ozz5wB9oFwWS6wX9thmsOtq0sxg3lsm8Bfw9unFq', '2024-11-27 19:05:12', '2024-11-27 19:05:12', 'user'),
(53, 'Willow Scott', 'willow.scott@gmail.com', '$2y$12$7U8b.mAq9ar2FGnQibdS03ftTGoUpl6AdcngMiQvmPZc5G4ZRt1HK', '2024-11-27 19:16:06', '2024-11-27 19:16:06', 'user'),
(54, 'Xander Harris', 'xander.harris@gmail.com', '$2y$12$OgF0ksEwrVqHzRY5sp9pg.M6F2T1ZlOl12wzm24pOjU4s7ACsiIXX', '2024-11-27 19:27:03', '2024-11-27 19:27:03', 'user'),
(55, 'Yasmin Lee', 'yasmin.lee@gmail.com', '$2y$12$xe.e4lQK3gndN1oQio9sZ1XbeCEcLweMjNGmAiARGo36JYft67xeG', '2024-11-27 19:38:20', '2024-11-27 19:38:20', 'user'),
(56, 'Zane Martin', 'zane.martin@gmail.com', '$2y$12$VRi9JXqVnzDNnlPaL0beYwLPtmkF8l2yVGToVt7uK9LF1oWvxBRzq', '2024-11-27 19:49:13', '2024-11-27 19:49:13', 'user'),
(57, 'Abigail Adams', 'abigail.adams@gmail.com', '$2y$12$zdm.XOUiFfs4EuYt6l9GRpd9aKhFchFXSUnBz5I8w72mN67nqDAqS', '2024-11-27 20:00:08', '2024-11-27 20:00:08', 'user'),
(58, 'Benjamin Taylor', 'benjamin.taylor@gmail.com', '$2y$12$DzDdpx2ChOlMcZK7nNlmi2g8ktdq1DAZKYgz2D6hMQtbRbBzHXV2e', '2024-11-27 20:11:14', '2024-11-27 20:11:14', 'user'),
(59, 'Charlotte Wilson', 'charlotte.wilson@gmail.com', '$2y$12$Fw3l8OgaFY69pKwm.3J2ZlbAqA9qRV5UNmI6q9XBwdYbs6Rm00tYdW', '2024-11-27 20:22:01', '2024-11-27 20:22:01', 'user'),
(60, 'Daniel Thomas', 'daniel.thomas@gmail.com', '$2y$12$wPHwSh1VlmUeFwlJ9RGhu44lTQfe5FqlR46Wh3c1a/wnbbFEvW1HOO', '2024-11-27 20:33:02', '2024-11-27 20:33:02', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_book_id_foreign` (`book_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
