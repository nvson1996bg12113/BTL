-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 24, 2019 lúc 03:12 PM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avata` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `avata`, `cover`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@shop.com', NULL, '$2y$10$8RgEy1Z8bCoojfbv7iNS7.eyAFa2QoYqkNaqSQuuCsAV644z4IRXC', NULL, NULL, NULL, 'NLsnK13ZNUQZ8KDYSeI6OKDTt3wp0izxkgE6BFZVuv2Lpcz6YacKunmPfOJY', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `orders_id` int(10) UNSIGNED NOT NULL,
  `customers_id` int(10) UNSIGNED NOT NULL,
  `total` float DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `orders_id`, `customers_id`, `total`, `created_at`, `updated_at`) VALUES
(2, 6, 1, 0, '2019-03-23 21:44:01', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categorys`
--

CREATE TABLE `categorys` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categorys`
--

INSERT INTO `categorys` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(101, 'Quần Âu', '<p>Quần &acirc;u gi&aacute; rẻ</p>', NULL, NULL),
(102, 'Thời trang nữ', '<p>thời trang nữ</p>', NULL, NULL),
(103, 'Váy', '<p>V&aacute;y</p>', NULL, NULL),
(104, 'Túi xách', '<p>T&uacute;i x&aacute;ch</p>', NULL, NULL),
(105, 'Đồng hồ', '<p>Đồng hồ</p>', NULL, NULL),
(107, 'Áo sơ mi', '<p>&Aacute;o sơ mi</p>', NULL, NULL),
(108, 'Áo T-shirt', '<p>&Aacute;o T-shirt</p>', NULL, NULL),
(109, 'Giày dép', '<p>gi&agrave;y d&eacute;p</p>', NULL, NULL),
(110, 'vest', '<p>v&eacute;t</p>', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `address`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Thị Bích', 'Tuyên Quang', '0904162697', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `queue` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` int(10) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `media`
--

CREATE TABLE `media` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `media`
--

INSERT INTO `media` (`id`, `name`, `path`, `created_at`, `updated_at`) VALUES
(7, '201_images_04_58_45_pm_04_03_19_index_0.png', 'images/products/201', NULL, NULL),
(8, '202_images_12_33_01_am_05_03_19_index_0.png', 'images/products/202', NULL, NULL),
(9, '202_images_12_33_12_am_05_03_19_index_0.png', 'images/products/202', NULL, NULL),
(10, '202_images_12_33_12_am_05_03_19_index_1.png', 'images/products/202', NULL, NULL),
(11, '203_images_12_37_51_am_05_03_19_index_0.png', 'images/products/203', NULL, NULL),
(12, '204_images_12_39_41_am_05_03_19_index_0.png', 'images/products/204', NULL, NULL),
(13, '205_images_04_56_16_am_05_03_19_index_0.png', 'images/products/205', NULL, NULL),
(14, '205_images_04_56_17_am_05_03_19_index_1.png', 'images/products/205', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(33, '2014_10_12_000000_create_users_table', 1),
(34, '2018_11_07_080237_create_categorys_table', 1),
(35, '2018_11_07_080259_create_vendors_table', 1),
(36, '2018_11_07_081128_create_products_table', 1),
(37, '2018_11_07_081716_create_media_table', 1),
(38, '2018_11_07_082702_create_products_media_table', 1),
(39, '2018_11_07_083038_create_customers_table', 1),
(40, '2018_11_07_083223_create_users_customers_table', 1),
(41, '2018_11_07_083439_create_orders_table', 1),
(42, '2018_11_07_090424_create_orders_detail_table', 1),
(43, '2018_11_07_091354_create_posts_table', 1),
(44, '2018_11_07_091743_create_comments_table', 1),
(45, '2018_11_07_091824_create_posts_media_table', 1),
(46, '2018_11_09_012425_create_users_products_table', 1),
(47, '2018_11_18_161130_create_jobs_table', 1),
(48, '2018_12_22_155231_create_admins_table', 1),
(49, '2019_01_13_033157_create_bills_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `users_id`, `status`, `created_at`, `updated_at`) VALUES
(6, 1, 1, NULL, '2019-03-23 21:44:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `products_id` int(10) UNSIGNED NOT NULL,
  `orders_id` int(10) UNSIGNED NOT NULL,
  `number` int(11) NOT NULL,
  `total_price` double(8,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `products_id`, `orders_id`, `number`, `total_price`, `created_at`, `updated_at`) VALUES
(6, 201, 6, 1, 0.00, NULL, NULL),
(7, 202, 6, 1, 0.00, NULL, NULL),
(8, 203, 6, 5, 0.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(10) UNSIGNED DEFAULT NULL,
  `products_id` int(10) UNSIGNED NOT NULL,
  `ip` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `vote` float NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `users_id`, `products_id`, `ip`, `content`, `vote`, `created_at`, `updated_at`) VALUES
(15, 1, 202, '::1', NULL, 5, NULL, NULL),
(16, 1, 203, '::1', NULL, 4, NULL, NULL),
(17, 1, 201, '::1', NULL, 3, NULL, NULL),
(18, 1, 205, '::1', NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts_media`
--

CREATE TABLE `posts_media` (
  `posts_id` int(10) UNSIGNED NOT NULL,
  `media_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL DEFAULT '0',
  `import_price` double NOT NULL DEFAULT '0',
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `categorys_id` int(10) UNSIGNED NOT NULL,
  `vendors_id` int(10) UNSIGNED NOT NULL,
  `sale` int(11) NOT NULL DEFAULT '0',
  `viewer` int(11) NOT NULL DEFAULT '0',
  `inventory` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `import_price`, `description`, `categorys_id`, `vendors_id`, `sale`, `viewer`, `inventory`, `created_at`, `updated_at`) VALUES
(201, 'Váy Ngắn', 200000, 150000, '<p>Thời trang năm 2019</p>', 103, 101, 0, 25, 10, NULL, '2019-03-23 23:41:27'),
(202, 'giày balenciaga', 1780000, 1450000, '<ul class=\"\">\r\n<li class=\"\">&bull; Gi&agrave;y l&agrave; h&agrave;ng REP+</li>\r\n<li class=\"\">&bull; Cam kết fullbox</li>\r\n<li class=\"\">&bull; H&agrave;ng đủ size cho c&aacute;c bạn lựa chọn , c&aacute;c bạn để y&ecirc;u cầu size dưới c&acirc;u hỏi</li>\r\n</ul>', 109, 104, 0, 25, 300, NULL, '2019-03-24 01:21:44'),
(203, 'giày gucci', 1890000, 1700000, NULL, 109, 105, 0, 7, 25, NULL, '2019-03-23 21:43:51'),
(204, 'vest nam 2018', 2750000, 2500000, '<p>Brioni nổi tiếng l&agrave; một trong những nơi sản xuất ra những bộ vest chất lượng nhất thế giới. B&iacute; quyết đằng sau đẳng cấp về chất lượng của Brioni nằm ở hệ thống kiểm so&aacute;t chất lượng cực kỳ chặt chẽ. Kh&ocirc;ng chỉ vậy, kể cả những con cừu cho ra sợi len l&agrave;m n&ecirc;n c&aacute;c bộ vest cao cấp đ&oacute; cũng được chăm s&oacute;c trong m&ocirc;i trường c&oacute; cảnh quan tự nhi&ecirc;n v&agrave; điều kiện tốt nhất. Hơn nữa, kỹ nghệ thủ c&ocirc;ng của người &Yacute; v&agrave; c&aacute;ch cắt vải l&agrave; một yếu tố rất lớn tạo n&ecirc;n vẻ đẹp của Brioni. V&igrave; vậy, cho d&ugrave; gi&aacute; của những bộ suit của Brioni c&oacute; thể rất cao, nhưng bất kỳ ai chịu đầu tư cho một bộ vest &ldquo;để đời&rdquo; sẽ kh&ocirc;ng bao giờ phải hối hận về quyết định của m&igrave;nh.</p>', 110, 107, 0, 1, 100, NULL, '2019-03-23 21:43:23'),
(205, 'Áo sơ mi hàn quốc', 250000, 180000, '<ul class=\"\">\r\n<li class=\"\">✔ Chất lụa trơn, kh&ocirc;ng nhăn, kh&ocirc;ng x&ugrave;, kh&ocirc;ng bai, kh&ocirc;ng phai m&agrave;u.</li>\r\n<li class=\"\">✔ Form body H&agrave;n Quốc, dễ kết hợp với c&aacute;c loại quần.</li>\r\n<li class=\"\">✔ Made in Việt Nam.</li>\r\n<li class=\"\">✔ Size: M, L, XL,XXL,3XL</li>\r\n</ul>', 107, 103, 0, 2, 15, NULL, '2019-03-23 21:43:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products_media`
--

CREATE TABLE `products_media` (
  `products_id` int(10) UNSIGNED NOT NULL,
  `media_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products_media`
--

INSERT INTO `products_media` (`products_id`, `media_id`, `created_at`, `updated_at`) VALUES
(201, 7, NULL, NULL),
(202, 8, NULL, NULL),
(202, 9, NULL, NULL),
(202, 10, NULL, NULL),
(203, 11, NULL, NULL),
(204, 12, NULL, NULL),
(205, 13, NULL, NULL),
(205, 14, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avata` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cover` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `avata`, `cover`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user 1', 'user1@shop.com', NULL, '$2y$10$iDK2O1d3tv0lh634mxlNieJW6T4/YttmR6qj3DKSmFIGlltm2ZuW.', NULL, NULL, NULL, 'MNHoahkIS9Z5DPIa4ePeQ76hbu3CmMBIi7BDm7uKhi8vQBRTsOl6eA6v8H8w', '2019-01-11 00:25:50', '2019-01-11 00:25:50'),
(2, 'Tran Van Loc', 'user2@shop.com', NULL, '$2y$10$Kfv8eolc4UISMJdWL2EMmOTTh947X0p.yiCWs0dP2CdpDfKM1/yzS', NULL, NULL, NULL, 'ikMeTAth9dTMGzTgoh2Uv5XhGDQgcepgJPjYbyeNzB4v9iurPaL6r8qkoziD', '2019-02-23 09:17:53', '2019-02-23 09:17:53'),
(3, 'Pham Thi My Duyen', 'user3@shop.com', NULL, '$2y$10$N5HPcZsG7YgofoIqnHFequ1/Be.FocnhpkM3JU1Q3ZlkOFqNHVNM2', NULL, NULL, NULL, 'R2b6gQCAAtrDoOZGNUMOHeHa76RcjXXkROk7r4VOm4EcXrX6LLWdyu5ywfUU', '2019-02-23 09:18:38', '2019-02-23 09:18:38'),
(4, 'Phan Manh Quynh', 'user4@shop.com', NULL, '$2y$10$u6m0XbVcTjnN7ioH1e6W/.YCJ4pyfs2gYrAesjAfwFbeE58oGmojm', NULL, NULL, NULL, NULL, '2019-02-23 09:28:22', '2019-02-23 09:28:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users_customers`
--

CREATE TABLE `users_customers` (
  `users_id` int(10) UNSIGNED NOT NULL,
  `customers_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users_customers`
--

INSERT INTO `users_customers` (`users_id`, `customers_id`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vendors`
--

CREATE TABLE `vendors` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vendors`
--

INSERT INTO `vendors` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(101, 'Bencino', '<p>nh&atilde;n h&agrave;ng thời trang ch&acirc;u &acirc;u</p>', NULL, NULL),
(102, 'Louis Vuitton', '<h2><strong>Louis Vuitton</strong></h2>', NULL, NULL),
(103, 'CHANEL', '<h2><strong>CHANEL</strong></h2>', NULL, NULL),
(104, 'Balenciaga', '<p>H&atilde;ng gi&agrave;y balenciaga</p>', NULL, NULL),
(105, 'Gucci', '<p>Gucci</p>', NULL, NULL),
(106, 'CANALI', '<p><strong>CANALI</strong></p>', NULL, NULL),
(107, 'BRIONI', '<p><strong>BRIONI</strong></p>', NULL, NULL),
(108, 'ZEGNA', '<p><strong>ZEGNA</strong></p>', NULL, NULL),
(109, 'Adidas', '<p>Adidas</p>', NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categorys`
--
ALTER TABLE `categorys`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_users_id_foreign` (`users_id`);

--
-- Chỉ mục cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_detail_orders_id_foreign` (`orders_id`),
  ADD KEY `orders_detail_products_id_foreign` (`products_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_users_id_foreign` (`users_id`),
  ADD KEY `posts_products_id_foreign` (`products_id`);

--
-- Chỉ mục cho bảng `posts_media`
--
ALTER TABLE `posts_media`
  ADD PRIMARY KEY (`posts_id`,`media_id`),
  ADD KEY `posts_media_media_id_foreign` (`media_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_categorys_id_foreign` (`categorys_id`),
  ADD KEY `products_vendors_id_foreign` (`vendors_id`);

--
-- Chỉ mục cho bảng `products_media`
--
ALTER TABLE `products_media`
  ADD PRIMARY KEY (`products_id`,`media_id`),
  ADD KEY `products_media_media_id_foreign` (`media_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Chỉ mục cho bảng `users_customers`
--
ALTER TABLE `users_customers`
  ADD PRIMARY KEY (`users_id`,`customers_id`),
  ADD KEY `users_customers_customers_id_foreign` (`customers_id`);

--
-- Chỉ mục cho bảng `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `categorys`
--
ALTER TABLE `categorys`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `media`
--
ALTER TABLE `media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `orders_detail_orders_id_foreign` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `orders_detail_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `posts_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `posts_media`
--
ALTER TABLE `posts_media`
  ADD CONSTRAINT `posts_media_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`),
  ADD CONSTRAINT `posts_media_posts_id_foreign` FOREIGN KEY (`posts_id`) REFERENCES `posts` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_categorys_id_foreign` FOREIGN KEY (`categorys_id`) REFERENCES `categorys` (`id`),
  ADD CONSTRAINT `products_vendors_id_foreign` FOREIGN KEY (`vendors_id`) REFERENCES `vendors` (`id`);

--
-- Các ràng buộc cho bảng `products_media`
--
ALTER TABLE `products_media`
  ADD CONSTRAINT `products_media_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`),
  ADD CONSTRAINT `products_media_products_id_foreign` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `users_customers`
--
ALTER TABLE `users_customers`
  ADD CONSTRAINT `users_customers_customers_id_foreign` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `users_customers_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
