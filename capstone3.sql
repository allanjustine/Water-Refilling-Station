-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2024 at 11:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone3`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `borrow` varchar(255) DEFAULT NULL,
  `own` varchar(255) DEFAULT NULL,
  `buy` varchar(255) DEFAULT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `borrow`, `own`, `buy`, `quantity`, `created_at`, `updated_at`, `image`) VALUES
(8, 10, 8, '0', '3', '0', 0, '2024-06-06 02:31:21', '2024-06-06 02:31:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` char(36) NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `gcash_details`
--

CREATE TABLE `gcash_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gcash_details`
--

INSERT INTO `gcash_details` (`id`, `user_id`, `account_name`, `account_number`, `created_at`, `updated_at`) VALUES
(1, 7, 'Lyn Salamanca', '09925706696', '2024-06-06 02:35:33', '2024-06-06 02:35:33');

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(255) DEFAULT NULL,
  `invoice_due_date` varchar(255) DEFAULT NULL,
  `invoice_total` varchar(255) DEFAULT NULL,
  `invoice_discount` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_no`, `invoice_due_date`, `invoice_total`, `invoice_discount`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(6, '8633', '2024-07-06 15:51:27', '200', NULL, 'Unpaid', 8, '2024-06-06 07:51:27', '2024-06-06 07:51:27');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_12_16_131122_create_products_table', 1),
(7, '2023_12_16_131123_create_carts_table', 1),
(8, '2023_12_16_131124_create_orders_table', 1),
(9, '2023_12_20_034613_add_approved_to_orders_table', 1),
(10, '2023_12_29_170553_create_order_product_table', 1),
(11, '2024_01_16_125536_add_phone_to_users', 1),
(12, '2024_01_24_095915_add_location_to_users_table', 1),
(13, '2024_01_24_230552_create_invoices_table', 1),
(14, '2024_01_24_999999_add_active_status_to_users', 1),
(15, '2024_01_24_999999_add_avatar_to_users', 1),
(16, '2024_01_24_999999_add_dark_mode_to_users', 1),
(17, '2024_01_24_999999_add_messenger_color_to_users', 1),
(18, '2024_01_24_999999_create_chatify_favorites_table', 1),
(19, '2024_01_24_999999_create_chatify_messages_table', 1),
(20, '2024_05_28_015815_create_gcash_details_table', 1),
(21, '2024_06_05_101800_create_ratings_table', 1),
(22, '2024_06_06_121811_create_notifications_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_quantity` int(11) NOT NULL DEFAULT 1,
  `status` enum('Pending','On Process','For Delivery','Delivered','Paid','Cancelled') NOT NULL DEFAULT 'Pending',
  `image` varchar(255) DEFAULT NULL,
  `borrow` varchar(255) DEFAULT NULL,
  `own` varchar(255) DEFAULT NULL,
  `buy` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `reference_number` varchar(255) DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_status` varchar(255) NOT NULL DEFAULT 'Approve',
  `approved` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `order_quantity`, `status`, `image`, `borrow`, `own`, `buy`, `payment_method`, `reference_number`, `reason`, `created_at`, `updated_at`, `product_status`, `approved`) VALUES
(1, 3, 4, 0, 'Paid', NULL, '0', '2', '0', 'Cash on Delivery', NULL, NULL, '2024-06-05 22:36:30', '2024-06-05 22:36:30', 'Approve', 0),
(2, 3, 3, 0, 'Paid', NULL, '0', '1', '0', 'Cash on Delivery', NULL, NULL, '2024-06-05 22:38:20', '2024-06-05 22:38:20', 'Approve', 0),
(3, 3, 2, 0, 'For Delivery', NULL, '0', '1', '0', 'Cash on Delivery', NULL, NULL, '2024-06-05 23:28:54', '2024-06-05 23:28:54', 'Approve', 0),
(4, 3, 4, 0, 'For Delivery', NULL, '0', '1', '0', 'Cash on Delivery', NULL, NULL, '2024-06-05 22:50:18', '2024-06-05 22:50:18', 'Approve', 0),
(5, 3, 4, 0, 'For Delivery', NULL, '0', '2', '0', 'Cash on Delivery', NULL, NULL, '2024-06-05 23:06:44', '2024-06-05 23:06:44', 'Approve', 0),
(6, 10, 5, 10, 'Paid', NULL, '0', '0', '5', 'Gcash', '13143546587980909', NULL, '2024-06-06 02:39:33', '2024-09-06 05:01:36', 'Approve', 0),
(7, 10, 6, 0, 'Paid', NULL, '0', '5', '0', 'Cash on Delivery', NULL, NULL, '2024-06-06 02:44:42', '2024-06-06 02:44:42', 'Approve', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('sabandonemmar@gmail.com', '$2y$12$xm2uy0OOTNfNsJF9TpmTcOZ8EYMdNDIiNDH9lKublw7k4keYXWlkK', '2024-06-05 21:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `extra` decimal(8,2) NOT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `extra`, `product_quantity`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Round jug', 30.00, 'products/SeXH6ht1hovkozgHaXRG3K1WPVglztEXzftRuChF.webp', 170.00, 50, 4, '2024-06-05 22:00:40', '2024-06-05 22:39:48'),
(3, 'Round Jug', 30.00, 'products/SmXk7u8eTtZVo898coYvXHVk5fOnSPkDbnW4YWCR.webp', 170.00, 50, 2, '2024-06-05 22:09:42', '2024-06-05 22:37:33'),
(4, 'Water Jug', 35.00, 'products/9xPFO0a210FtMSxKJ62BQJJ7o6rmdGb3afLuXDPm.webp', 170.00, 50, 2, '2024-06-05 22:11:19', '2024-06-05 23:06:39'),
(5, 'Round Jug', 30.00, 'products/zPzRAwarLTSglqu136p8a5kTTMddg3BvFVAOHlZ3.webp', 170.00, 45, 7, '2024-06-06 02:08:40', '2024-09-06 05:01:36'),
(6, 'Faucet jug', 30.00, 'products/hkvbKrYihypFMsb6XysILwlKYhUpUe6uapvq0fhp.webp', 200.00, 50, 7, '2024-06-06 02:09:28', '2024-06-06 02:43:21'),
(7, 'Round jug', 30.00, 'products/Qn7CdBogbywXV6zBigLe1B9Accmfostb8wRQo2aV.webp', 170.00, 50, 6, '2024-06-06 02:12:06', '2024-06-06 02:12:06'),
(8, 'Faucet jug', 30.00, 'products/19Q5e3P8PLJDjREywcyk46DDONDWN7neP8ANtdAm.webp', 200.00, 50, 6, '2024-06-06 02:12:30', '2024-06-06 02:12:30'),
(9, 'Round jug', 30.00, 'products/0wqgaQnJ9d7GvfuJLmMobGBQ1sUq6yLFbpAur4jH.webp', 170.00, 50, 8, '2024-06-06 02:26:14', '2024-06-06 02:26:14'),
(10, 'Faucet jug', 30.00, 'products/tniJpBQY1pjsnDSFj1UQX5xBHqoZyq8NK8FmCHu0.webp', 200.00, 50, 8, '2024-06-06 02:26:32', '2024-06-06 02:26:32');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED DEFAULT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_rate` int(11) DEFAULT 0,
  `feedback` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `product_id`, `order_id`, `user_rate`, `feedback`, `created_at`, `updated_at`) VALUES
(1, 3, 4, 1, 4, 'Goods', '2024-06-05 22:37:23', '2024-06-05 22:37:23'),
(2, 3, 3, 2, 5, 'good', '2024-06-05 23:44:55', '2024-06-05 23:44:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `type` tinyint(1) DEFAULT 0,
  `avatar` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `billings` decimal(10,2) DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `subscription_type` enum('infinite','1_month','1_year') NOT NULL DEFAULT '1_month',
  `phone` varchar(255) DEFAULT NULL,
  `municipality` varchar(255) DEFAULT NULL,
  `station` varchar(255) DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `avatar`, `address`, `bio`, `billings`, `created_at`, `updated_at`, `subscription_type`, `phone`, `municipality`, `station`, `active_status`, `dark_mode`, `messenger_color`) VALUES
(1, 'Administrator', 'admin@gmail.com', '2024-06-05 17:27:24', '$2y$12$4iF5bioQjSyqnudh9V32YekwCz.s/44ZdghoxyG6q.WrRZxdws6y6', 1, NULL, NULL, NULL, 0.00, '2024-06-05 17:27:24', '2024-06-05 17:27:24', 'infinite', '09123451231', 'Abuyog', NULL, 0, 0, NULL),
(2, 'George Dimiao', 'george@gmail.com', NULL, '$2y$12$..w0DDzmzr/hM8MpGsO6iOwCctIHenrRht0Mux8zvx29vEZMDGb.e', 2, 'users-avatar/users-avatar/pKdnrfIRSneuU4FotKOaeQ7bmRPQFDGGZtfKVZ9a.jpg', 'Doña Margarita Subdivision Brgy. Guintagbucan', NULL, 200.00, '2024-06-06 06:53:59', '2024-06-06 06:53:59', '1_month', '+639925706696', 'Abuyog', 'Weps Water Refilling Station', 0, 0, NULL),
(3, 'Nemmar Campos', 'sabandonemmar@gmail.com', NULL, '$2y$12$u0u./EDAAquCRHHuVz/EUuyIwQI6JgHYYArzmUN6CvDenif19FT1K', 0, NULL, 'Brgy. Guintagbucan, Doña Margarita Subdivision', NULL, 0.00, '2024-06-05 21:00:54', '2024-06-05 21:00:54', '1_month', '+639925706696', 'Abuyog', NULL, 0, 0, NULL),
(4, 'Rich Martini Absin', 'rich@gmail.com', NULL, '$2y$12$jHtWEvBL8dPT.ir5gebiLeBP7UAD8fRf2aEOT2CQwBbl.bEbPiyCm', 2, 'users-avatar/users-avatar/X0jPnZMxzmTLPyHZOdm0ExYQjHjbFNYz8OHlsUug.jpg', 'Brgy. Bito', NULL, 200.00, '2024-06-06 03:53:10', '2024-06-06 03:53:10', '1_month', '+639925705234', 'Abuyog', 'Aquapoint Water Refilling Station', 0, 0, NULL),
(5, 'Michael Jackson', 'michael@gmail.com', NULL, '$2y$12$/XUmAmCtZl/HNhOh1FG66emMt6M2G3QlAIOzw53u9UF.VFUMM8jGO', 0, NULL, 'South China Sea', NULL, 0.00, '2024-06-05 23:26:27', '2024-06-05 23:27:31', '1_month', '+639759237124', 'Macarthur', NULL, 0, 0, NULL),
(6, 'Mark Castanas', 'castanas@gmail.com', NULL, '$2y$12$J2FfLrwrcUdEJq.vCpkPLO.eGJacg2LXhVDY2AE/LvA.tRwMl6ZoS', 2, NULL, 'Brgy. Guintagbucan', NULL, 200.00, '2024-06-06 03:53:14', '2024-06-06 03:53:14', '1_month', '+639934572874', 'Abuyog', 'Castanas Water Refilling Station', 0, 0, NULL),
(7, 'Lyn Salamanca', 'lyn@gmail.com', NULL, '$2y$12$h1BA5oTsUARa/QiZMME3kuI0PV9oNHl8p7CfTTovWPKhPpGNARkn.', 2, 'users-avatar/users-avatar/sNXdHGiGz3tfzQPreXAepLoE0lCJYReJOokA4NJr.jpg', 'Brgy. Guintagbucan', NULL, 500.00, '2024-06-06 06:56:22', '2024-06-06 06:56:22', '1_year', '+639987482374', 'Abuyog', 'Lyn Water Refilling Station', 0, 0, NULL),
(8, 'Franco Salamanca', 'franco@gmail.com', NULL, '$2y$12$86oHAkgl27aTmPqRB/WeQOTGSwXo8Y7mY/SSHdWNoTFOTWmYLSQku', 2, NULL, 'Brgy. batug', NULL, 200.00, '2024-06-06 07:51:27', '2024-06-06 07:51:27', '1_month', '+639925705234', 'Javier', 'Franco Water Refilling Station', 0, 0, NULL),
(9, 'Petere luis', 'petere@gmail.com', NULL, '$2y$12$oNx5q.4hBCgRr3E9iB/ul.Tux1FMj1O8jHdQ8SNTGszGTuUHTqOmC', 0, NULL, 'Brgy. picas', NULL, 0.00, '2024-06-06 02:27:29', '2024-06-06 02:27:29', '1_month', '+639925705234', 'Javier', NULL, 0, 0, NULL),
(10, 'Balagasay', 'balagasay@gmail.com', NULL, '$2y$12$54Hmr7fyc654pxPdnwJxlOyG65uzoND4IHjTlxvpVU3wi0JYq5wgi', 0, NULL, 'Brgy. Sto. Nino', NULL, 0.00, '2024-06-06 02:28:26', '2024-06-06 02:28:26', '1_month', '+639925706696', 'Abuyog', NULL, 0, 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gcash_details`
--
ALTER TABLE `gcash_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gcash_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoices_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_product_id_foreign` (`product_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_user_id_foreign` (`user_id`),
  ADD KEY `ratings_product_id_foreign` (`product_id`),
  ADD KEY `ratings_order_id_foreign` (`order_id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gcash_details`
--
ALTER TABLE `gcash_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `gcash_details`
--
ALTER TABLE `gcash_details`
  ADD CONSTRAINT `gcash_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `invoices`
--
ALTER TABLE `invoices`
  ADD CONSTRAINT `invoices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
