-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3307
-- Thời gian đã tạo: Th8 05, 2024 lúc 05:04 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `asmlaravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Iphone', NULL, NULL),
(2, 'Samsung', NULL, NULL),
(3, 'Xiaomi', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2024_07_18_133925_create_phones_table', 1),
(12, '2024_07_18_134005_create_categories_table', 1),
(13, '2014_10_12_000000_create_users_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phones`
--

CREATE TABLE `phones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(500) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(300) NOT NULL,
  `cate_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phones`
--

INSERT INTO `phones` (`id`, `title`, `image`, `price`, `quantity`, `description`, `cate_id`, `created_at`, `updated_at`) VALUES
(1, 'Rem non et iusto quasi.', 'avatars/GJguR2fm5Bk4nl02wvu2JtDAP18S11T02WSTk8vR.png', 23810408.44, 363, 'Odit optio exercitationem vitae cum dolor et.', 1, NULL, '2024-08-05 01:07:34'),
(2, 'Et illo quasi veritatis.', 'https://cdn.tgdd.vn/Products/Images/42/305658/iphone-15-pro-max-blue-thumbnew-600x600.jpg', 35694369.61, 638, 'Tempora dicta tempora voluptatem nihil ut.', 3, NULL, NULL),
(3, 'Et ducimus nemo aut.', 'https://cdn.tgdd.vn/Products/Images/42/305658/iphone-15-pro-max-blue-thumbnew-600x600.jpg', 12587934.29, 933, 'Non officia quod quod mollitia eveniet eius.', 1, NULL, NULL),
(4, 'Quos sed ut earum.', 'https://cdn.tgdd.vn/Products/Images/42/305658/iphone-15-pro-max-blue-thumbnew-600x600.jpg', 23308549.78, 606, 'Dolorum ex esse nemo velit libero sed velit.', 2, NULL, NULL),
(5, 'Sit et voluptatibus sed.', 'images/xnSP5bLNeGESLr5OLfGsdmZnFoBTeo3vJF0xPjls.jpg', 13309642.21, 886, 'Laborum voluptatibus sit illum hic.', 1, NULL, '2024-08-04 09:53:04'),
(6, 'Et qui distinctio non.', 'avatars/FUIDYxnMUfu8Ohr68c5gwe7O18dPWtMXkDA4eCVk.jpg', 33115493.43, 979, 'Non omnis nulla aut.', 3, NULL, '2024-08-04 09:56:02'),
(7, 'Id et explicabo quos.', 'images/KMpkExBUNzjuspJvckhEtiOJgModylchb8wuBMHh.jpg', 10824025.77, 689, 'Harum rerum accusantium ullam labore.', 1, NULL, '2024-08-04 09:52:32'),
(8, 'Vitae qui et et illum.', 'https://cdn.tgdd.vn/Products/Images/42/305658/iphone-15-pro-max-blue-thumbnew-600x600.jpg', 39060536.78, 981, 'Enim aut placeat dolores aut deserunt sit qui.', 2, NULL, NULL),
(9, 'Alias et qui et.', 'https://cdn.tgdd.vn/Products/Images/42/305658/iphone-15-pro-max-blue-thumbnew-600x600.jpg', 23596416.85, 731, 'Aut id quod at optio dolorum iure aut.', 1, NULL, NULL),
(10, 'Molestiae est et non.', 'images/QJOJDnPuTg9q9swzHe9UovBtYEbFUkDngxDqZC6b.jpg', 12485030.45, 472, 'Quam sed qui aut fugit.', 3, NULL, '2024-08-04 20:51:26'),
(11, 'iphone 15 pro max 234', 'images/CY6zaUhbAt6WJmrRWQ5nyj2mY5mcAHDnYD4aNJeY.jpg', 123333, 123, 'óhfjahdkjfhahdfjhasd', 1, '2024-08-04 08:59:59', '2024-08-04 20:30:27'),
(13, 'samsung s24 ultra', 'avatars/QYnPfP37mEDuVoLbrD2LFnWDqGJs40ModkbQv8gr.jpg', 23423, 234, 'eqgasgagas', 2, '2024-08-04 22:04:59', '2024-08-05 01:06:19'),
(14, 'ádasdasdadadadasd', 'avatars/BkCqiCFTsurcoXHGMfRMA11sb1kmzi6NmCRJTLkO.jpg', 21313, 123, 'ẻqwerqwrqwrr', 3, '2024-08-05 00:44:42', '2024-08-05 01:05:08');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `email_verified_at`, `password`, `avatar`, `role`, `active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Duy Hoàng', 'Deaths', 'ichigo12012001@gmail.com', NULL, '$2y$12$ZurdQz8cuPPu.6562C3UYOuPXKf8amnGD5NmikJsRIZvOyptOUQxC', 'avatars/ATqor64jIgGGrGqhiXhcOKhdD5UdyhcKW6fEZn2R.jpg', 'admin', 1, NULL, '2024-08-04 06:34:08', '2024-08-04 21:13:50'),
(6, 'Nguyễn Hoàng', 'Hoangph41065', 'hoangndh41065@fpt.edu.vn', NULL, '$2y$12$ysO0bghq7KuSio87Ofouo.V9DzTbKrbaxk0r/DT7WYYguWB3yxq5K', 'avatars/Dtm1p72C4yF559QiZ44vh4KHtNS0Ww1S9q9aFSfj.jpg', 'user', 1, NULL, '2024-08-04 20:28:41', '2024-08-04 21:08:12');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `phones`
--
ALTER TABLE `phones`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `phones`
--
ALTER TABLE `phones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
