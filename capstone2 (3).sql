-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2024 at 04:57 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `capstone2`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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

--
-- Dumping data for table `ch_favorites`
--

INSERT INTO `ch_favorites` (`id`, `user_id`, `favorite_id`, `created_at`, `updated_at`) VALUES
('3ee82b2a-ddd0-4ccd-907c-b7ce46f77f8e', 7, 3, '2024-01-29 03:02:34', '2024-01-29 03:02:34'),
('6b6f517d-4860-4b60-872a-7268200a3da6', 7, 6, '2024-01-29 03:05:43', '2024-01-29 03:05:43'),
('71cbad33-f527-47d7-aae4-a81e6622d4ca', 7, 5, '2024-01-29 03:02:47', '2024-01-29 03:02:47'),
('8a66ffd4-eda9-4e62-bdea-768d96a5a9ce', 7, 4, '2024-01-29 03:05:33', '2024-01-29 03:05:33'),
('e368b5c3-7889-4800-b777-e788906c1c44', 7, 1, '2024-01-29 03:02:11', '2024-01-29 03:02:11'),
('e715de47-6fd5-4a80-82e1-d4abc076ee53', 7, 2, '2024-01-29 03:02:26', '2024-01-29 03:02:26');

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

--
-- Dumping data for table `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
('00fca9c6-6f72-4952-9579-36449017aebb', 1, 7, 'wala jud hahaha sa akoa kay naa lage', NULL, 1, '2024-01-29 03:18:18', '2024-01-29 02:44:36'),
('0ed541a6-576f-41b1-b986-a729f9b49a91', 2, 7, 'sheshh', NULL, 1, '2024-01-30 06:59:18', '2024-01-30 06:59:20'),
('2102e096-2bc3-473b-ad6b-69543fcd3e19', 1, 7, 'basin pud4', NULL, 1, '2024-01-29 03:18:40', '2024-01-29 02:44:36'),
('2fe58146-3158-4e47-b634-5ad40b129dd1', 7, 2, 'order ko boss 2 ka book', NULL, 1, '2024-01-29 02:44:58', '2024-01-30 06:57:57'),
('335d0b6e-1d7d-48cc-8e76-f800e54d5da1', 1, 7, '', '{\"new_name\":\"528b3b8f-68ae-4b27-8804-523f31f8fdba.jpg\",\"old_name\":\"5-gallon-bottle.jpg\"}', 1, '2024-01-28 05:50:54', '2024-01-28 05:50:59'),
('3c5b8306-ff06-4e0b-a72f-736151ee2d70', 7, 2, 'halo habibi', NULL, 1, '2024-01-30 06:58:59', '2024-01-30 06:59:01'),
('41a55abd-3049-4e3f-8095-887ef1f95f3d', 2, 7, 'saho haim', NULL, 1, '2024-01-30 06:59:47', '2024-01-30 06:59:49'),
('433d2705-9678-4b44-aaed-6f4f818493cc', 1, 7, 'asdasd', NULL, 1, '2024-01-29 03:12:01', '2024-01-29 03:14:13'),
('51e94de3-b767-47cb-9e11-e6c778c0e6a8', 7, 1, 'test1', NULL, 1, '2024-01-28 05:41:09', '2024-01-28 05:41:10'),
('5bf252fd-8aee-4f12-8d4b-444391748d75', 3, 1, 'a', NULL, 0, '2024-01-29 03:17:56', '2024-01-29 03:17:56'),
('70ffcd41-f62f-4309-8411-a138a835acaf', 7, 2, 'roygwaps', NULL, 1, '2024-01-30 06:59:14', '2024-01-30 06:59:16'),
('7376ebf9-d126-463c-9243-d4c099452f64', 7, 1, 'test', NULL, 1, '2024-01-29 03:06:43', '2024-01-29 03:07:51'),
('89094f2e-b347-42c8-b00a-5a37e7af3026', 1, 7, 'test', NULL, 1, '2024-01-29 03:08:23', '2024-01-29 03:08:28'),
('8955e4bd-6153-453b-8a13-8326e81ed266', 14, 13, 'papalita ko og lima ka jug', NULL, 1, '2024-02-28 02:29:07', '2024-02-28 02:29:48'),
('968c68a2-0a5b-45da-8f5f-b4dcb654a087', 2, 7, 'giatayy', NULL, 1, '2024-01-30 06:59:06', '2024-01-30 06:59:08'),
('9bec99bd-315d-4ed8-9290-17d845a1793a', 3, 1, 'a', NULL, 0, '2024-01-29 03:17:46', '2024-01-29 03:17:46'),
('a2ed5b70-4374-4508-ade6-7e600ef140bd', 1, 7, 'asasas', NULL, 1, '2024-01-29 03:13:35', '2024-01-29 03:14:13'),
('a81453a0-a2a4-48da-b6d8-c5ea99567b92', 2, 7, 'testingggggggggggggggg', NULL, 1, '2024-01-30 06:58:27', '2024-01-30 06:58:52'),
('abf41dec-9e4e-4bc0-bc0f-23012cb966df', 7, 1, 'Test', NULL, 1, '2024-01-29 03:15:35', '2024-01-29 03:16:25'),
('c6af307f-d7f8-47e8-908a-e98e5cc34e73', 7, 1, 'testttttttttt', NULL, 1, '2024-01-29 03:56:52', '2024-02-28 02:27:04'),
('ce4b9552-91a4-4022-85ff-6e236983ac92', 7, 2, 'pa order ak ma lima', NULL, 1, '2024-01-30 06:59:33', '2024-01-30 06:59:37'),
('f04f96ae-a7bf-4cf5-976b-d4eee8359540', 1, 7, 'test', NULL, 1, '2024-01-29 03:16:27', '2024-01-29 02:44:36');

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
(2, '2', '2024-01-29', '1000', '5', 'Unpaid', 2, '2024-01-29 04:06:47', '2024-01-29 04:06:47');

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
(8, '2023_12_16_131123_create_orders_table', 1),
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
(19, '2024_01_24_999999_create_chatify_messages_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_quantity` int(11) NOT NULL DEFAULT 1,
  `status` enum('Pending','On Process','For Delivery','Delivered','Paid') NOT NULL DEFAULT 'Pending',
  `image` varchar(255) DEFAULT NULL,
  `jug_status` varchar(255) DEFAULT NULL,
  `payment_method` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_status` varchar(255) NOT NULL DEFAULT 'Approve',
  `approved` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `product_id`, `order_quantity`, `status`, `image`, `jug_status`, `payment_method`, `created_at`, `updated_at`, `product_status`, `approved`) VALUES
(2, 7, 1, 1, 'Paid', NULL, 'Sold', 'Gcash', '2024-01-29 06:55:54', '2024-01-29 06:55:54', 'Approve', 0),
(3, 14, 11, 10, 'Paid', NULL, 'Sold', 'Cash on Delivery', '2024-01-30 06:07:45', '2024-01-30 06:07:45', 'Approve', 0),
(4, 14, 11, 5, 'Paid', NULL, 'Sold', 'Cash on Delivery', '2024-01-30 06:15:11', '2024-01-30 06:15:11', 'Approve', 0),
(5, 14, 11, 15, 'Paid', NULL, 'Borrow', 'Cash on Delivery', '2024-01-30 06:20:21', '2024-01-30 06:20:21', 'Approve', 0),
(6, 7, 1, 2, 'Paid', NULL, 'Sold', 'Cash on Delivery', '2024-01-30 06:56:53', '2024-01-30 06:56:53', 'Approve', 0);

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
  `product_quantity` int(11) NOT NULL DEFAULT 0,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `product_quantity`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Gallon round', 35.00, 'products/LaLvAtFlUgsbNUg1HgqQkbEqMAXJFENygpwvJcTj.webp', 57, 2, '2024-01-28 04:22:17', '2024-01-30 06:55:51'),
(2, 'Slim jug w/faucet', 35.00, 'products/2QDVL05wGJvPsSdjUpkpYVL8NVfQgEqPmuuMss6K.webp', 60, 6, '2024-01-28 04:24:11', '2024-01-30 06:14:26'),
(3, 'Nature spring distilled water 10L', 90.00, 'products/J7554j5ZH4rOeMrJdSZZQTHsxSCkyJ1h3feqBkR7.webp', 60, 3, '2024-01-28 04:27:19', '2024-01-30 06:14:26'),
(4, 'Nature\'s Spring Purified Water 500mL', 10.00, 'products/XWZyqQatbrZD9WA3VNGDHyuWP89TZSgbFQSsy1w3.webp', 110, 5, '2024-01-28 04:29:48', '2024-01-30 06:14:26'),
(5, 'Water Gallon', 35.00, 'products/h4iLmb2o9V5piKWEBCpfe5v5wJ7jjwKyqI7TpWFI.jpg', 60, 4, '2024-01-28 04:31:36', '2024-01-30 06:14:26'),
(7, 'Round Gallon', 35.00, 'products/f3cihusK4mDbw8dyO6O0LOLkZh7KDX9euACpOO8u.jpg', 110, 12, '2024-01-30 04:37:21', '2024-01-30 06:14:26'),
(8, 'Round Gallon', 35.00, 'products/DBDidmrKu4WdRwmzz1l161MqvbH0eD37muTYSXNd.jpg', 110, 13, '2024-01-30 05:44:21', '2024-01-30 06:14:26'),
(9, 'Slim jug w/faucet', 50.00, 'products/gcyYWR3Wwgv0y6Rlk6yh28HntP3KOZDXdvMV99pR.webp', 110, 13, '2024-01-30 05:45:11', '2024-01-30 06:14:26'),
(10, '500ML water', 20.00, 'products/aGczWJpnu7Gb7Yuzg7ArmoZUfo7chQk5hwZ80nfC.webp', 60, 13, '2024-01-30 05:47:47', '2024-01-30 06:14:26'),
(11, 'Round Gallon', 35.00, 'products/UV2tfhpS7jXGYbFfBHxKWPfEt52GMqTUT1iw3PSw.jpg', 80, 15, '2024-01-30 06:01:36', '2024-01-30 06:17:55');

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
  `subscription_type` enum('1_month','1_year') NOT NULL DEFAULT '1_month',
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
(1, 'Administrator', 'admin@gmail.com', '2024-01-28 04:11:01', '$2y$12$vY.8WStbXFaz4kFMfmCEEu0AWh5tzqaqI2ohgvIdoYAu/9VaiPN6a', 1, 'users-avatar/W5KeKVW5srfgxXwY3tNW2adsEwktShdqW1P0fYgF.jpg', 'Brgy. Bito, Abuyog, Leyte', NULL, 0.00, '2024-01-28 04:11:01', '2024-01-29 03:21:17', '1_month', '09123451231', 'Abuyog', 'ADMIN', 0, 0, NULL),
(2, 'Aqua', 'aqua@gmail.com', NULL, '$2y$12$CyfC/v/RVHKfcMcjbIaoZObbBiuhAPFA8SrqucZ0utxkZe/DJ63GC', 2, 'users-avatar/cqw0k2J3MigbVM8pIrRAhDf76e1x0Xp4bPXGLiMH.jpg', 'Brgy. Bito, Abuyog, Leyte', NULL, 1000.00, '2024-01-30 04:51:49', '2024-01-30 07:00:03', '1_month', '123', 'Abuyog', 'Aquapoint Water Refilling Station', 0, 0, NULL),
(3, 'zaza', 'zaza@gmail.com', NULL, '$2y$12$tuyei0aUxEqsjNsiqYtyRe.ILjrso3SI/Yk60t99tMcFBEps1l02q', 2, NULL, 'Brgy. Batug, Javier, Leyte', NULL, 1000.00, '2024-01-28 04:20:14', '2024-01-29 03:20:12', '1_month', '123', 'Javier', 'Zaza Water Refilling Station', 1, 0, NULL),
(4, 'gibertas', 'gibertas@gmail.com', NULL, '$2y$12$TJ3fhq.ZaEcBcZtDMawqZuJpskrJL442Lwza6aOCBf2Hehm67iZtq', 2, NULL, 'Brgy. Hilusig, Mahaplag, Leyte', NULL, 1000.00, '2024-01-28 04:20:18', '2024-01-28 04:20:18', '1_month', '123', 'Mahaplag', 'Gibertas purified water station', 0, 0, NULL),
(5, 'mac', 'mac@gmail.com', NULL, '$2y$12$DVvJP4NLT5tLQ.T9usAaKuKTnZPiNNXsaeBkARbBTHMHIhfFAoc9.', 2, NULL, 'Brgy. Bito, Abuyog, Leyte', NULL, 1000.00, '2024-01-28 04:20:21', '2024-01-28 04:20:21', '1_month', '123', 'Macarthur', 'Mac-ice water refilling Station & Services', 0, 0, NULL),
(6, 'jbp', 'jbp@gmail.com', NULL, '$2y$12$.zuXZ5L3GbXxhmvzMRTgneB4CA0FXsuW8yiILV8qmAtoaT.YQ9kFm', 4, NULL, 'Brgy. Bito, Abuyog, Leyte', NULL, 0.00, '2024-02-28 02:25:48', '2024-02-28 02:25:48', '1_month', '123', 'Abuyog', 'JBP Water Station - Purified Drinking Water', 0, 0, NULL),
(7, 'Nemmar', 'nemmar@gmail.com', NULL, '$2y$12$6HufOehOqHo9GZ4QayJlheupoRezX0XA1GhpBIeUs9NR8wF2L6L6q', 0, 'users-avatar/5qBUr6u30WZtPiDM3NZalg6xHJwhCuyJ2qzU1onY.png', 'Brgy. Guintagbucan, Abuyog, Leyte', NULL, 0.00, '2024-01-28 04:18:55', '2024-01-29 02:45:30', '1_month', '09925706696', NULL, 'null', 0, 0, NULL),
(12, 'Darwin Lacaros', 'darwin@gmail.com', NULL, '$2y$12$lh6Ip7WaDB.5Ijn2vpPnyuKNEjlA99d7XgK0RBVOptFtvx4vYHwBe', 2, NULL, 'Brgy. Balocawehay, Abuyog, Leyte', NULL, 1000.00, '2024-01-30 04:36:35', '2024-01-30 04:36:35', '1_month', '123', 'Abuyog', 'Living Water', 0, 0, NULL),
(13, 'franco salamanca', 'franco@gmail.com', NULL, '$2y$12$KIMzqyVHyDPpf7MACtxZQeXSJFFmlku.fBA5qYrJj3QT7VtOl1cHS', 2, NULL, 'Brgy, Balocawehay, Abuyog, Leyte', NULL, 1000.00, '2024-01-30 05:42:18', '2024-02-28 02:30:42', '1_month', '09925706612', 'Abuyog', 'Franco Water Station', 1, 0, NULL),
(14, 'Lyn Salamanca', 'lyn@gmail.cm', NULL, '$2y$12$SldxkkJVOpg03X0y6KuQxOfsuYP4ooMznsYXLQ.9CoRG58BLMpwPC', 0, NULL, 'Brgy, Balocawehay, Abuyog, Leyte', NULL, 0.00, '2024-01-30 05:49:17', '2024-02-28 02:31:05', '1_month', '9925706695', NULL, NULL, 0, 0, NULL),
(15, 'Mark Castanas', 'castanas@gmail.com', NULL, '$2y$12$iTGxIB9P.cza9CYFCS2.YuW7RCfzx0K2F58pMN4Zlj.FHn6Fa6I3S', 2, NULL, 'Brgy. Barayong', NULL, 1000.00, '2024-01-30 06:00:50', '2024-01-30 06:00:50', '1_month', '09925706696', 'Javier', 'Maccoy Water Station', 0, 0, NULL);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
