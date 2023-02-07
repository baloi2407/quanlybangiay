-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2023 at 10:07 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tên danh mục',
  `summary` longtext COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tóm tắt danh mục ',
  `parent_id` bigint(20) DEFAULT 0 COMMENT 'Mã danh mục cha',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Hình ảnh đại diện',
  `alias` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO',
  `keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO',
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Mô tả danh mục',
  `image_share` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO',
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO',
  `status` tinyint(4) DEFAULT 1 COMMENT '0.Khóa - 1.Hoạt động',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `summary`, `parent_id`, `image`, `alias`, `keyword`, `description`, `image_share`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nike', '', 0, '', '', '', '', NULL, '', 1, '2023-01-12 16:07:42', '2023-01-12 16:18:52'),
(2, 'Adidas', '', 0, '', '', '', '', NULL, '', 1, '2023-01-12 16:08:24', '2023-01-12 16:08:24'),
(3, 'Lacoste', '', 0, '', '', '', '', NULL, '', 1, '2023-01-12 16:08:47', '2023-01-12 16:08:47'),
(4, 'Puma', '', 0, '', '', '', '', NULL, '', 1, '2023-01-12 16:09:02', '2023-01-12 16:09:02'),
(5, 'New Balance', '', 0, '', '', '', '', NULL, '', 1, '2023-01-12 16:09:16', '2023-01-12 16:09:16'),
(6, 'Asics', '', 0, '', '', '', '', NULL, '', 1, '2023-01-12 16:09:27', '2023-01-12 16:09:27'),
(8, 'Nike Nam', '', 1, '', '', '', '', NULL, '', 1, '2023-01-12 16:37:40', '2023-01-12 16:37:40'),
(9, 'Nike Nữ', '', 1, '', '', '', '', NULL, '', 0, '2023-01-12 16:37:53', '2023-01-12 16:37:53'),
(11, 'Thể Thao', '', 0, '', '', '', '', NULL, '', 0, '2023-01-12 16:39:37', '2023-01-12 16:39:37'),
(12, 'Adidas Nam', '', 2, '', '', '', '', NULL, '', 1, '2023-01-12 23:04:46', '2023-01-12 23:04:46'),
(13, 'Adidas Nữ', '', 2, '', '', '', '', NULL, '', 0, '2023-01-12 23:04:57', '2023-01-12 23:04:57'),
(14, 'Lacoste Nam', '', 3, '', '', '', '', NULL, '', 0, '2023-01-12 23:05:39', '2023-01-12 23:05:39'),
(16, 'Puma Nam', '', 4, '', '', '', '', NULL, '', 1, '2023-01-12 23:06:18', '2023-01-12 23:06:18'),
(17, 'Puma Nữ', '', 4, '', '', '', '', NULL, '', 0, '2023-01-12 23:06:29', '2023-01-12 23:06:29'),
(18, 'New Balance Nam', '', 5, '', '', '', '', NULL, '', 1, '2023-01-12 23:06:49', '2023-01-12 23:06:49'),
(19, 'New Balance Nữ', '', 5, '', '', '', '', NULL, '', 0, '2023-01-12 23:06:58', '2023-01-12 23:06:58'),
(20, 'Thể Thao Nam', '', 11, '', '', '', '', NULL, '', 0, '2023-01-12 23:07:21', '2023-01-12 23:07:21'),
(21, 'Thể Thao Nữ', '', 11, '', '', '', '', NULL, '', 1, '2023-01-12 23:07:32', '2023-01-12 23:07:32'),
(22, 'Asics Nam', '', 6, '', '', '', '', NULL, '', 0, '2023-01-12 23:08:55', '2023-01-12 23:08:55'),
(23, 'Asics Nữ', '', 6, '', '', '', '', NULL, '', 1, '2023-01-12 23:09:07', '2023-01-12 23:09:07');

-- --------------------------------------------------------

--
-- Table structure for table `cate_elements`
--

CREATE TABLE `cate_elements` (
  `category_id` bigint(20) UNSIGNED NOT NULL COMMENT 'ID danh mục',
  `element_id` bigint(20) UNSIGNED NOT NULL COMMENT 'ID thuộc tính'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cate_elements`
--

INSERT INTO `cate_elements` (`category_id`, `element_id`) VALUES
(6, 1),
(11, 1),
(11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tên thành phố',
  `code` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Mã thành phố',
  `status` tinyint(4) DEFAULT 1 COMMENT '0.Khóa - 1.Hoạt động',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `product_id` bigint(20) UNSIGNED NOT NULL COMMENT 'ID sản phẩm',
  `color_id` bigint(20) UNSIGNED NOT NULL COMMENT 'ID màu sắc'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `configs`
--

CREATE TABLE `configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `value` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '''text''',
  `summary` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0.Khóa - 1.Hoạt động',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `configs`
--

INSERT INTO `configs` (`id`, `key`, `value`, `type`, `summary`, `status`, `created_at`, `updated_at`) VALUES
(1, 'logo', '/upload/users/file_1640178921.png', 'image', 'Logo admin', 0, '2022-03-27 02:09:00', '2022-03-27 03:16:35'),
(2, 'title', 'My website', 'text', 'title admin', 0, '2022-03-27 02:09:00', '2022-03-27 03:16:35'),
(3, 'description', 'Web', 'textarea', 'Description', 0, '2022-03-27 02:56:57', '2022-03-27 03:16:35'),
(4, 'tcontent', 'ghjgjghjgh', 'editor', 'content', 0, '2022-03-27 02:56:57', '2022-03-27 03:16:35'),
(5, 'logofrontend', '/upload/users/file_1640175774.png', 'image', 'Logo admin', 0, '2022-03-27 02:09:00', '2022-03-27 03:16:35');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) NOT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tên gọi của khách hàng',
  `lastname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Họ của khách hàng',
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'email khách hàng',
  `password` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Mật khẩu tài khoản khách hàng',
  `phone` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'số điện thoại khách hàng',
  `address` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'địa chỉ khách hàng',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình ảnh đại diện khách hàng',
  `note` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ghi chú',
  `status` tinyint(4) DEFAULT 1 COMMENT '0.Khóa - 1.Hoạt động',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `firstname`, `lastname`, `username`, `email`, `password`, `phone`, `address`, `image`, `note`, `status`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'nguyen', 'hieu', 'nguyenhieu', 'nguyenhieu@gmail.com', '74be16979710d4c4e7c6647856088456', '9876543111', 'aa', 'file_1674732753.jpg', '', 1, '2022-04-06 20:16:33', '2023-02-02 01:29:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tên quận',
  `summary` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Mô tả của quận',
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Mã quận',
  `city_id` bigint(20) DEFAULT NULL COMMENT 'ID thành phố',
  `status` tinyint(4) DEFAULT NULL COMMENT '0.Khóa - 1.Hoạt động',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `functions`
--

CREATE TABLE `functions` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tên function',
  `icon` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL COMMENT 'Mã function cha',
  `show_menu` tinyint(1) DEFAULT 1,
  `allow` tinyint(1) NOT NULL DEFAULT 0,
  `pos` int(11) NOT NULL DEFAULT 1,
  `route` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '0.Khóa - 1.Hoạt động',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tên group',
  `parent_id` bigint(20) NOT NULL DEFAULT 0 COMMENT 'Mã group cha',
  `summary` longtext COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tóm tắt group',
  `status` tinyint(4) DEFAULT NULL COMMENT '0.Khóa - 1.Hoạt động',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `parent_id`, `summary`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Manager', 0, '', 1, '2023-02-04 15:04:36', '2023-02-04 15:04:36'),
(2, 'Creator', 0, '', 1, '2023-02-04 15:05:44', '2023-02-05 06:41:37'),
(4, 'Visitor', 0, '', 1, '2023-02-04 15:08:41', '2023-02-05 20:06:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_19_000000_create_failed_jobs_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_03_27_084151_create_configs_table', 1),
(4, '2022_03_27_095300_add_type_configs_table', 2),
(6, '2022_03_27_101951_create_tests_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `mods`
--

CREATE TABLE `mods` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tên ',
  `summary` longtext COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tóm tắt ',
  `status` tinyint(4) DEFAULT NULL COMMENT '0.Khóa - 1.Hoạt động',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mods`
--

INSERT INTO `mods` (`id`, `name`, `summary`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Users', '', 1, '2023-02-04 15:36:24', '2023-02-04 15:38:49'),
(2, 'Customers', '', 1, '2023-02-04 15:36:43', '2023-02-04 15:38:53'),
(3, 'News', '', 1, '2023-02-04 15:36:54', '2023-02-04 15:36:54'),
(4, 'Products', '', 1, '2023-02-04 15:37:30', '2023-02-04 15:37:30'),
(5, 'Categories', '', 1, '2023-02-04 15:37:49', '2023-02-04 15:37:49'),
(6, 'News Categories', '', 1, '2023-02-04 15:38:12', '2023-02-04 15:38:12'),
(7, 'Orders', '', 1, '2023-02-04 15:39:19', '2023-02-04 15:39:19'),
(8, 'Suppliers', '', 1, '2023-02-04 15:39:29', '2023-02-04 15:39:29'),
(9, 'Report', '', 1, '2023-02-04 15:40:11', '2023-02-04 15:40:11'),
(10, 'Groups', '', 1, '2023-02-04 15:40:22', '2023-02-04 15:40:22'),
(11, 'Mod', '', 1, '2023-02-04 15:40:29', '2023-02-04 15:40:29');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tên tin tức',
  `category_id` bigint(20) NOT NULL,
  `summary` longtext COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tóm tắt tin tức',
  `content` longtext COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Nội dung tin tức',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Hình ảnh',
  `alias` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO',
  `keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO',
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO',
  `image_share` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO',
  `title` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO',
  `status` tinyint(4) DEFAULT NULL COMMENT '0.Khóa - 1.Hoạt động',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `category_id`, `summary`, `content`, `image`, `alias`, `keyword`, `description`, `image_share`, `title`, `status`, `created_at`, `updated_at`) VALUES
(8, 'Tin Giày số 1', 3, '', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'file_1675238605.jpg', '', '', '', '', '', 0, '2023-02-01 15:03:25', '2023-02-01 15:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `news_categories`
--

CREATE TABLE `news_categories` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tên danh mục',
  `summary` longtext COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tóm tắt danh mục',
  `parent_id` bigint(20) NOT NULL DEFAULT 0 COMMENT 'Mã danh mục cha',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Hình ảnh',
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO',
  `keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO',
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO',
  `image_share` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO',
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO',
  `status` tinyint(4) DEFAULT NULL COMMENT '0.Khóa - 1.Hoạt động',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `news_categories`
--

INSERT INTO `news_categories` (`id`, `name`, `summary`, `parent_id`, `image`, `alias`, `keyword`, `description`, `image_share`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Tin Hot', '', 0, 'file_1674801780.jpg', '', '', '', NULL, '', 1, '2023-01-27 13:39:11', '2023-01-27 13:43:00'),
(3, 'Tin Hot Giày', '', 1, '', '', '', '', NULL, '', 1, '2023-01-27 13:44:11', '2023-01-27 13:44:11');

-- --------------------------------------------------------

--
-- Table structure for table `news_images`
--

CREATE TABLE `news_images` (
  `news_id` bigint(20) UNSIGNED NOT NULL COMMENT 'ID tin tức',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT ' hình ảnh',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_images`
--

INSERT INTO `news_images` (`news_id`, `image`, `created_at`, `updated_at`) VALUES
(6, 'file_0_1675071411.jpg', '2023-01-30 16:36:51', '2023-01-30 16:36:51'),
(6, 'file_1_1675071411.jpg', '2023-01-30 16:36:51', '2023-01-30 16:36:51'),
(6, 'file_2_1675071411.jpg', '2023-01-30 16:36:51', '2023-01-30 16:36:51'),
(6, 'file_3_1675071411.jpg', '2023-01-30 16:36:51', '2023-01-30 16:36:51'),
(7, 'file_0_1675072203.jpg', '2023-01-30 16:50:03', '2023-01-30 16:50:03'),
(7, 'file_1_1675072203.jpg', '2023-01-30 16:50:03', '2023-01-30 16:50:03'),
(7, 'file_2_1675072203.jpg', '2023-01-30 16:50:03', '2023-01-30 16:50:03'),
(7, 'file_3_1675072203.jpg', '2023-01-30 16:50:04', '2023-01-30 16:50:04'),
(8, 'file_0_1675238605.jpg', '2023-02-01 15:03:25', '2023-02-01 15:03:25'),
(8, 'file_1_1675238605.jpg', '2023-02-01 15:03:26', '2023-02-01 15:03:26'),
(8, 'file_2_1675238605.jpg', '2023-02-01 15:03:26', '2023-02-01 15:03:26'),
(8, 'file_3_1675238605.jpg', '2023-02-01 15:03:26', '2023-02-01 15:03:26');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Mã đơn hàng',
  `customer_id` bigint(20) DEFAULT NULL COMMENT 'ID khách hàng',
  `coupon` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Mã giảm giá',
  `total_amount` bigint(20) DEFAULT NULL COMMENT 'Tổng tiền',
  `order_date` datetime DEFAULT current_timestamp(),
  `order_status` int(11) DEFAULT NULL COMMENT '1. Mới đặt\r\n2. Đã xác nhận\r\n3. Đang đóng gói\r\n4. Chuyển cho shipper\r\n5. Đang giao\r\n6. Đã Giao\r\n7. Giao thất bại\r\n8. Hủy Đơn',
  `payment_method` tinyint(4) NOT NULL DEFAULT 1 COMMENT 'Thanh toán tiền mặt',
  `notes` text COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Ghi chú',
  `status` int(11) DEFAULT 1 COMMENT '0.Khóa - 1.Hoạt động',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code`, `customer_id`, `coupon`, `total_amount`, `order_date`, `order_status`, `payment_method`, `notes`, `status`, `created_at`, `updated_at`) VALUES
(29, '1675355468', 1, NULL, 6570000, '2023-02-02 23:31:08', 1, 1, '', 1, '2023-02-02 23:31:08', '2023-02-03 22:22:16'),
(28, '1675355111', 1, NULL, 2490000, '2023-02-02 23:25:11', 1, 1, '', 1, '2023-02-02 23:25:11', '2023-02-02 23:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` bigint(20) NOT NULL,
  `order_id` bigint(20) NOT NULL COMMENT 'ID đơn hàng',
  `product_id` bigint(20) NOT NULL COMMENT 'ID sản phẩm',
  `size` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `qty` bigint(20) DEFAULT NULL COMMENT 'số lượng',
  `price` bigint(20) DEFAULT NULL COMMENT 'giá sản phẩm',
  `note` longtext COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'ghi chú',
  `status` tinyint(4) DEFAULT 1 COMMENT '0.Khóa - 1.Hoạt động',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `size`, `qty`, `price`, `note`, `status`, `created_at`, `updated_at`) VALUES
(28, 29, 5, '40', 1, 2390000, NULL, 1, '2023-02-02 23:31:08', '2023-02-02 23:31:08'),
(27, 29, 7, '40', 1, 1690000, NULL, 1, '2023-02-02 23:31:08', '2023-02-02 23:31:08'),
(26, 29, 1, '42', 1, 2490000, NULL, 1, '2023-02-02 23:31:08', '2023-02-02 23:31:08'),
(25, 28, 1, '42', 1, 2490000, NULL, 1, '2023-02-02 23:25:11', '2023-02-02 23:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tên phương thức thanh toán',
  `summary` longtext COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tóm tắt',
  `status` tinyint(4) DEFAULT NULL COMMENT '0.Khóa - 1.Hoạt động',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tên sản phẩm',
  `category_id` bigint(20) DEFAULT NULL COMMENT 'ID danh mục',
  `supplier_id` bigint(20) DEFAULT NULL COMMENT 'ID nhà cung cấp',
  `sku` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` bigint(20) DEFAULT 0 COMMENT 'Giá nhập',
  `promo` int(11) NOT NULL COMMENT 'Giá bán',
  `summary` longtext COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tóm tắt sản phẩm',
  `content` longtext COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Nội dung sản phẩm',
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'product-2.jpg' COMMENT 'Hình ảnh',
  `images` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Các hình ảnh liên quan',
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO',
  `keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO',
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO',
  `image_share` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO',
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO',
  `bestseller` tinyint(4) NOT NULL COMMENT '1: Bán chạy; \r\n0: Không bán chạy',
  `newarrival` tinyint(4) NOT NULL COMMENT '1: Hàng mới về\r\n0: Cũ',
  `status` tinyint(4) DEFAULT NULL COMMENT '0.Khóa - 1.Hoạt động',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `supplier_id`, `sku`, `price`, `promo`, `summary`, `content`, `image`, `images`, `alias`, `keyword`, `description`, `image_share`, `title`, `bestseller`, `newarrival`, `status`, `created_at`, `updated_at`) VALUES
(1, 'GIÀY NIKE AIR MAX SC LEA NAM- ĐEN', 8, 2, 'MSN1011', 2490000, 0, 'Giày Nike Air Max SC Lea mang nét huyền thoại của Nike, với bộ đệm Air Max trứ danh đây là mẫu giày có thể kết hợp với bất cứ trang phục nào mà bạn vẫn hoàn toàn tự tin trong mọi hoàn cảnh.', '', 'file_1674814944.jpg', NULL, '', '', '', 'file_1674814944.jpg', '', 0, 0, 1, '2023-01-10 14:44:40', '2023-01-31 16:35:42'),
(2, 'GIÀY NIKE AIR MAX SC NỮ - ĐEN TRẮNG', 8, 2, 'MSN1010', 2390000, 0, 'Giày Nike Air Max SC mang nét huyền thoại của Nike, với bộ đệm Air Max trứ danh đây là mẫu giày có thể kết hợp với bất cứ trang phục nào mà bạn vẫn hoàn toàn tự tin trong mọi hoàn cảnh.', '', 'file_1674786877.jpg', NULL, '', '', '', NULL, '', 0, 0, 1, '2023-01-10 14:45:31', '2023-01-31 16:35:38'),
(3, 'GIÀY ADIDAS DURAMO SL 2.0 NAM - TRẮNG ĐEN', 5, 1, 'MSA534', 1590000, 0, 'Giày adidas Duramo SL 2.0 là phiên bản nâng cấp của mẫu adidas Duramo SL được rất nhiều người yêu thích.Với công nghệ đế LightMotion giúp bạn luôn di chuyển thật thoải mái để nâng cao sức khỏe.\r\n\r\nVới adidas Duramo SL 2.0 bạn có thể sử dụng trong mọi hoạt động hàng ngày từ chạy bộ, tập gym, đi chơi, đi làm đều rất tiện lợi. Đặc biệt với mức giá vô cùng hợp lý, đây là mẫu giày adidas cực HOT trong năm nay.', '', 'file_1674787020.jpg', NULL, '', '', '', NULL, '', 0, 0, 1, '2023-01-10 14:45:31', '2023-01-31 16:37:03'),
(4, 'GIÀY ADIDAS X9000L1 NAM - XANH NAVY', 12, 1, 'MSA482', 1690000, 0, 'Giày adidas X9000L1 có thiết kế đẹp, khỏe khắn và năng động. Với công nghệ đế Bounce nổi tiếng giúp đôi giày cực kỳ êm và đàn hồi trợ lực rất tốt cho bàn chân. Đặc biệt hơn lớp lót giày làm từ tảo giúp làm sạch môi trường nước bị ô nhiễm.', '', 'file_1674787112.jpg', NULL, '', '', '', NULL, '', 0, 0, 1, '2023-01-10 14:44:40', '2023-01-31 16:37:45'),
(5, 'GIÀY ADIDAS BREAKNET NỮ - TRẮNG HỒNG', 12, 1, 'DV4024-002', 1590000, 0, '', '', 'file_1674787191.jpg', NULL, '', '', '', NULL, '', 0, 0, 1, '2023-01-10 14:45:31', '2023-01-31 16:37:48'),
(6, 'GIÀY ADIDAS GALAXY 6 NAM - ĐEN XANH NEON', 12, 1, 'MSA527', 1490000, 0, 'Giày adidas Galaxy 6  có thiết kế thể thao đẹp mắt, đây là mẫu giày có thể sử dụng trong mọi hoạt động hàng ngày. adidas Galaxy 6 có nhiều cải tiến so với adidas Galaxy 5 giúp đôi giày ngày càng hoàn hảo.\r\n\r\nCông nghệ đế CloudFoam của Adidas chưa bao giờ làm Fan hâm mộ của họ thất vọng. Với cảm giác trải nghiệm giống như đi trên \'\'Mây\'\' đấy là những gì được người dùng chia sẻ lại. Form dáng thiết kế trẻ trung, khỏe khoắn nên đây sẽ là mẫu giày không thể thiếu cho những hoạt động vui chơi, thể thao. Ngoài ra, adidas Galaxy 6 sử dụng hơn 50% vật liệu tái chế thân thiện với môi trường.', '', 'file_1674787272.jpg', NULL, '', '', '', NULL, '', 0, 0, 1, '2023-01-10 14:45:31', '2023-01-31 16:37:51'),
(7, 'GIÀY LACOSTE L001 321 NAM - TRẮNG', 14, 15, 'MSL366', 2990000, 0, 'Giày Lacoste L001 321 là một trong những mẫu giày HOT nhất của Lacoste hiện nay. Lacoste L001 321 có thiết kế cổ điển truyền thống của Lacoste nhưng lại có hơi hướng hiện đại rất hấp dẫn.\r\n\r\nGiày Lacoste L001 321 được làm từ chất liệu da cực kỳ cao cấp của Lacoste, phần đế giày chất liệu cao su bền đẹp với thời gian.', '', 'file_1674787441.jpg', NULL, '', '', '', '', '', 0, 0, 1, '2023-01-19 15:34:38', '2023-01-31 16:38:40'),
(15, 'GIÀY LACOSTE L005 222 NAM - TRẮNG', 14, 15, 'MSL365', 3290000, 0, 'Giày Lacoste L005 222 là một trong những mẫu giày mới nhất của Lacoste hiện nay. Lacoste L005 222 có thiết kế theo hướng hiện đại rất hấp dẫn. Đây là mẫu giày được rất nhiều tín đồ của Lacoste săn đón.\r\n\r\nGiày Lacoste L005 222 được làm từ chất liệu da cực kỳ cao cấp của Lacoste, phần đế giày chất liệu cao su bền đẹp với thời gian.', '', 'file_1674787531.jpg', NULL, '', '', '', '', '', 0, 0, 1, '2023-01-21 15:15:00', '2023-01-31 16:38:42'),
(9, 'GIÀY LACOSTE L005 222 NAM - ĐEN', 14, 15, 'MSL364', 3290000, 0, 'Giày Lacoste L005 222 là một trong những mẫu giày mới nhất của Lacoste hiện nay. Lacoste L005 222 có thiết kế theo hướng hiện đại rất hấp dẫn. Đây là mẫu giày được rất nhiều tín đồ của Lacoste săn đón.\r\n\r\nGiày Lacoste L005 222 được làm từ chất liệu da cực kỳ cao cấp của Lacoste, phần đế giày chất liệu cao su bền đẹp với thời gian.', '', 'file_1674787626.jpg', NULL, '', '', '', '', '', 0, 0, 1, '2023-01-20 17:00:03', '2023-01-31 16:38:45'),
(10, 'GIÀY LACOSTE ANGULAR TEXTILE POPPED HEEL NAM - NÂU', 14, 15, 'MSL363', 3390000, 0, 'Giày Lacoste Angular Textile Popped Heel có thiết kế đẳng cấp đặc trưng của Lacoste, với sự kết hợp hoàn hảo các chất liệu da thật, da lộn, vải mesh mang đến vẻ đẹp sang trọng khó có thể chối từ.\r\n\r\nPhần đế giữa với bộ đệm êm ái, đế ngoài làm bằng chất liệu cao su đặc biệt bền đẹp. Angular Textile Popped Heel là mẫu giày tuyệt vời mà Lacoste muốn mang đến cho tín đồ của mình.', '', 'file_1674787699.jpg', NULL, '', '', '', '', '', 0, 0, 1, '2023-01-20 17:02:31', '2023-01-31 16:38:48'),
(11, 'GIÀY PUMA SMASH CAT PERF FS SL NAM NỮ - TRẮNG GOLD', 16, 3, 'MSP259', 1190000, 0, 'Giày Puma Smash Cat Perf FS SL mẫu giày có thiết kế cổ điển mà tinh tế. Chất liệu da cao cấp và đế cao su bền bỉ chắc chắn sẽ làm hài lòng những khách hàng khó tính nhất. Bạn sẽ luôn yên tâm rằng nó không bao giờ bị lỗi mốt.', '', 'file_1674787908.jpg', NULL, '', '', '', '', '', 0, 0, 1, '2023-01-20 17:02:37', '2023-01-31 16:39:22'),
(12, 'GIÀY PUMA SMASH CAT PERF FS SL NAM NỮ - TRẮNG XANH', 16, 3, 'wuiay7800212012', 1190000, 0, 'Giày Puma Smash Cat Perf FS SL mẫu giày có thiết kế cổ điển mà tinh tế. Chất liệu da cao cấp và đế cao su bền bỉ chắc chắn sẽ làm hài lòng những khách hàng khó tính nhất. Bạn sẽ luôn yên tâm rằng nó không bao giờ bị lỗi mốt.', '', 'file_1674794386.jpg', NULL, '', '', '', '', '', 0, 0, 1, '2023-01-20 17:03:29', '2023-01-31 16:39:25'),
(13, 'GIÀY PUMA SMASH BUCK NAM - NÂU', 17, 3, 'MSP257', 1290000, 0, 'Giày Puma Smash Buck  mẫu giày có thiết kế đơn giản mà đẹp mắt. Chất liệu da lộn cao cấp làm hài lòng cả những khách hàng khó tính nhất.', '', 'file_1674794526.jpg', NULL, '', '', '', '', '', 0, 0, 1, '2023-01-20 20:43:12', '2023-01-31 16:39:27'),
(14, 'GIÀY PUMA SMASH CAT L NAM NỮ - TRẮNG XANH', 17, 3, 'MSP256', 1790000, 0, '', '', 'file_1674794608.jpg', NULL, '', '', '', '', '', 0, 0, 1, '2023-01-20 21:08:26', '2023-01-31 16:39:30'),
(16, 'GIÀY NEW BALANCE 373 NAM - VÀNG NÂU', 18, 16, 'MSE212', 1890000, 0, 'Giày New Balance 373 là mẫu giày thời trang được thiết kế với phong cách cổ điển đặc trưng của thương hiệu trứ danh đến từ Mỹ. Đây là một dòng sản phẩm không bao giờ lỗi mốt và luôn được các tín đồ thời trang săn đón.\r\n\r\nNew Balance 373 có phần upper được làm từ chất liệu mesh kết hợp với da lộn cao cấp, phần đế giày với bộ đệm cực kỳ êm ái giúp bạn có thể di chuyển cả ngày dài mà không gặp bất cứ sự khó chịu nào cả. New Balance 373 có thể sử dụng trong mọi hoạt động hàng ngày.', '', 'file_1674794739.jpg', NULL, '', '', '', NULL, '', 0, 0, 1, '2023-01-22 13:21:21', '2023-01-31 16:40:12'),
(17, 'GIÀY NEW BALANCE VIAZA NAM - XANH LAM', 18, 16, 'MSE210', 1390000, 0, 'Giày New Balance Viaza mẫu giày thể thao được thiết kế rất đẹp, với công nghệ đế FRESH FOAM độc quyền của New Balance giúp cho đôi giày trở lên cực kỳ êm và nhẹ nhàng khi di chuyển.\r\n\r\nNew Balance Viaza có phần upper được làm từ chất liệu vải mesh thoáng khí giúp bạn vận động cả ngày dài. Đây cũng là mẫu giày chạy bộ, tập gym, chơi thể thao rất tốt.', '', 'file_1674794823.jpg', NULL, '', '', '', NULL, '', 1, 1, 1, '2023-01-22 13:22:20', '2023-01-31 16:40:15'),
(18, 'GIÀY NEW BALANCE VIAZA NAM - ĐEN', 18, 16, 'MSE209', 1390000, 0, 'Giày New Balance Viaza mẫu giày thể thao được thiết kế rất đẹp, với công nghệ đế FRESH FOAM độc quyền của New Balance giúp cho đôi giày trở lên cực kỳ êm và nhẹ nhàng khi di chuyển.\r\n\r\nNew Balance Viaza có phần upper được làm từ chất liệu vải mesh thoáng khí giúp bạn vận động cả ngày dài. Đây cũng là mẫu giày chạy bộ, tập gym, chơi thể thao rất tốt.', '', 'file_1674794906.jpg', NULL, '', '', '', '', '', 0, 0, 1, '2023-01-22 13:33:07', '2023-01-31 16:40:19'),
(19, 'GIÀY NEW BALANCE M FLASH NAM - ĐEN ĐỎ', 18, 16, 'MSE208', 1590000, 0, 'Giày New Balance M Flash mẫu giày thể thao được thiết kế rất đẹp, chất liệu cực nhẹ và êm giúp bạn vận động đi lại cả ngày mà không mỏi mệt.\r\n\r\nNew Balance M Flash có phần upper được làm từ chất liệu vải mesh thoáng khí, đế giữa với công nghệ DYNASOFT độc quyền của New Blance cho độ êm và nhẹ tuyệt vời. Đây là mẫu giày không thể thiếu trong tủ giày của bạn.', '', 'file_1674795003.jpg', NULL, '', '', '', '', '', 0, 0, 1, '2023-01-22 13:35:11', '2023-01-31 16:40:22'),
(20, 'GIÀY ASICS TIGER RUNNER NAM - TRẮNG XANH', 22, 17, 'MSS165', 1790000, 0, 'Giày Asics Tiger Runner có thiết kể cổ điển lấy cảm hứng từ thập niên 80, một mẫu giày thời trang không bao giờ lỗi mốt được Asics chế tạo từ những chất liệu cao cấp giúp đôi giày bền đẹp với thời gian.', '', 'file_1674795317.jpg', NULL, '', '', '', '', '', 0, 0, 1, '2023-01-22 13:36:35', '2023-01-31 16:40:38'),
(21, 'GIÀY ASICS TRAIL SCOUT 2 NAM - ĐEN', 22, 17, 'MSS164', 1590000, 0, 'Giày Asics Trail Scout 2 với thiết kế đẹp, khỏe khoắn năng động cùng với công nghệ đỉnh cao của Asics Nhật Bản mang đến cho người sử dụng một đôi giày trail tuyệt vời.\r\n\r\nThiết kế ôm gọn bàn chân khiến người dùng thật dễ chịu khi di chuyển. Phần upper của giày được làm chất liệu mesh thoáng khí. Phần đế ngoài với cao su định hình cực kỳ bền và bám đường giúp bạn dễ dàng vượt qua những địa hình khó khăn nhất. Asics Trail Scout 2 mang đến một cảm giác tự do thoải mái khi vận động.', '', 'file_1674795389.jpg', NULL, '', '', '', '', '', 0, 0, 1, '2023-01-22 13:37:37', '2023-01-31 16:40:41'),
(25, 'GIÀY NIKE QUEST 4 NAM- ĐEN ĐỎ', 8, 2, 'MSN1014', 2190000, 0, 'Giày Giày Nike Quest 4 là mẫu giày được thiết kế cực kỳ đẹp và tinh tế với đặc điểm rất thoáng khí, êm và rất nhẹ. Đây là mẫu giày có thể sử dụng trong mọi hoạt động hàng ngày.\r\n\r\nVới phần upper làm bằng chất liệu vải mesh mềm mại và thoáng giúp vận động thoải mái. Phần đế giữa bằng vật liệu siêu nhẹ khiến cho Nike Quest 4 là mẫu giày rất được yêu thích.', '', 'file_1674541331.jpg', NULL, '', '', '', 'file_1674541331.jpg', '', 0, 0, 1, '2023-01-24 13:22:11', '2023-01-24 14:51:50'),
(26, 'GIÀY NIKE AIR MAX AP NAM - XÁM TRẮNG', 8, 2, 'MSN1012', 2590000, 0, 'Giày Nike Air Max AP là mẫu giày với thiết kế vô cùng thời trang của Nike với sự kết hợp hài hòa giữa quá khứ và hiện đại. Phần đế giữa của Nike Air Max AP được thiết kế rất hợp lý mềm mại với công nghệ tiên tiến nhất của Nike.\r\n\r\nChắc chắn đây là mẫu giày mà bất cứ fan Sneaker không thể bỏ qua.', '', 'file_1674786378.jpg', NULL, '', '', '', 'file_1674546911.jpg', '', 0, 0, 1, '2023-01-24 14:55:11', '2023-01-27 09:26:18'),
(28, 'GIÀY ASICS CLASSIC CT NAM - TRẮNG XANH LÁ', 22, 17, 'MSS163', 1490000, 0, 'Giày Asics Classic CT được người yêu giày trên toàn thế giới nhắc đến như là một mẫu sneaker kinh điển mà bạn không thể bỏ qua. Asics Classic CT có thiết kế cổ điển với những đường nét tinh tế, chất liệu cao cấp và cực kỳ bền bỉ với thời gian.', '', 'file_1674795538.png', NULL, '', '', '', '', '', 0, 0, 1, '2023-01-27 11:58:58', '2023-01-27 11:58:58'),
(30, 'GIÀY ASICS GLIDERIDE 2 NAM - XANH', 23, 17, 'MSS162', 3490000, 0, 'Giày Asics GlideRide 2 là siêu phẩm chạy bộ tốt của Asics, tập trung vào việc tiết kiệm năng lượng tối đa cho người sử dụng. Ngoài ra, Asics GlideRide 2 sử dụng những công nghệ tiên tiến nhất  và có thiết kế rất đẹp có thể sử dụng đi lại hàng ngày.\r\n\r\nGiày Asics GlideRide 2 có nhiều cải tiến so với phiên bản đầu tiên, trọng lượng nhẹ hơn và độ êm tốt hơn hẳn. Phần upper chất liệu mesh co giãn đa chiều cùng với công nghệ in 3D giúp bàn chân thoải mái khi di chuyển.\r\n\r\nĐế giữa với công nghệ GUIDESOLE và FLYTE FOAM tạo đàn hồi cực tốt, giúp di chuyển cực kỳ nhẹ nhàng êm ái tiết kiệm năng lượng.\r\n\r\nĐế ngoài với công nghệ AHARPLUS giúp cải thiện độ bền và giúp giày có tuổi thọ cao hơn. Đây thật sự là một mẫu giày chạy bộ không thể bỏ qua.', '', 'file_1674795859.jpg', NULL, '', '', '', '', '', 0, 0, 1, '2023-01-27 12:02:06', '2023-01-31 16:33:50');

-- --------------------------------------------------------

--
-- Table structure for table `pro_categories`
--

CREATE TABLE `pro_categories` (
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pro_categories`
--

INSERT INTO `pro_categories` (`product_id`, `category_id`, `status`, `created_at`, `updated_at`) VALUES
('1', 8, 1, '2023-01-20 17:03:29', '2023-01-20 17:03:29'),
('1', 9, 1, '2023-01-20 17:03:30', '2023-01-20 17:03:30'),
('0', 8, 1, '2023-01-20 20:43:12', '2023-01-20 20:43:12'),
('0', 8, 1, '2023-01-20 21:08:26', '2023-01-20 21:08:26'),
('0', 8, 1, '2023-01-20 21:13:46', '2023-01-20 21:13:46'),
('0', 9, 1, '2023-01-20 21:13:46', '2023-01-20 21:13:46'),
('0', 8, 1, '2023-01-20 21:14:06', '2023-01-20 21:14:06'),
('0', 9, 1, '2023-01-20 21:14:06', '2023-01-20 21:14:06'),
('asic123', 22, 1, '2023-01-21 15:15:00', '2023-01-21 15:15:00'),
('nike3939392', 8, 1, '2023-01-22 13:33:07', '2023-01-22 13:33:07'),
('nike39393921', 8, 1, '2023-01-22 13:35:11', '2023-01-22 13:35:11'),
('nike393939212', 8, 1, '2023-01-22 13:36:35', '2023-01-22 13:36:35'),
('nike3939392123344', 8, 1, '2023-01-22 13:39:07', '2023-01-22 13:39:07');

-- --------------------------------------------------------

--
-- Table structure for table `pro_elements`
--

CREATE TABLE `pro_elements` (
  `product_id` bigint(20) NOT NULL COMMENT 'ID sản phẩm',
  `size` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'thông số size sản phẩm',
  `quantity` int(11) DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `element_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pro_elements`
--

INSERT INTO `pro_elements` (`product_id`, `size`, `quantity`, `note`, `status`, `created_at`, `updated_at`, `element_id`) VALUES
(1, '42', 5, '', 1, '2023-01-19 21:32:17', '2023-01-31 17:13:13', 1),
(22, '42', 12, '', 0, '2023-01-22 15:06:16', '2023-01-22 15:06:16', 2),
(1, '40', 10, '', 1, '2023-01-27 09:30:25', '2023-01-27 09:30:25', 3),
(2, '42', 10, '', 1, '2023-01-27 13:10:48', '2023-01-27 13:10:48', 4),
(2, '40', 10, '', 1, '2023-01-27 13:11:46', '2023-01-27 13:11:46', 5),
(3, '42', 20, '', 1, '2023-01-27 13:12:51', '2023-01-27 13:12:51', 6),
(4, '40', 10, '', 1, '2023-01-27 13:16:52', '2023-01-27 13:16:52', 7),
(5, '42', 10, '', 1, '2023-01-27 13:20:43', '2023-01-27 13:20:43', 8),
(6, '40', 20, '', 1, '2023-01-29 20:10:16', '2023-01-29 20:10:16', 9),
(7, '40', 20, '', 1, '2023-01-29 20:10:42', '2023-01-29 20:10:42', 10),
(15, '40', 20, '', 1, '2023-01-29 20:11:00', '2023-01-29 20:11:00', 11),
(9, '42', 10, '', 1, '2023-01-29 20:11:13', '2023-01-29 20:11:13', 12),
(10, '42', 20, '', 1, '2023-01-29 20:11:27', '2023-01-29 20:11:27', 13),
(11, '42', 10, '', 1, '2023-01-29 20:12:08', '2023-01-29 20:12:08', 14),
(12, '42', 20, '', 1, '2023-01-29 20:12:31', '2023-01-29 20:12:31', 15),
(14, '40', 20, '', 1, '2023-01-29 20:14:49', '2023-01-29 20:14:49', 16),
(16, '40', 20, '', 1, '2023-01-29 20:15:13', '2023-01-29 20:15:13', 17),
(17, '40', 20, '', 1, '2023-01-29 20:15:32', '2023-01-29 20:15:32', 18),
(18, '40', 20, '', 1, '2023-01-29 20:15:51', '2023-01-29 20:15:51', 19),
(19, '40', 20, '', 1, '2023-01-29 20:16:09', '2023-01-29 20:16:09', 20),
(20, '42', 20, '', 1, '2023-01-29 20:16:29', '2023-01-29 20:16:29', 21),
(21, '40', 20, '', 1, '2023-01-29 20:16:42', '2023-01-29 20:16:42', 22),
(25, '40', 20, '', 1, '2023-01-29 20:17:03', '2023-01-29 20:17:03', 23),
(26, '40', 12, '', 1, '2023-01-29 20:17:32', '2023-01-29 20:17:32', 24),
(28, '40', 20, '', 1, '2023-01-29 20:17:54', '2023-01-29 20:17:54', 25),
(30, '40', 20, '', 1, '2023-01-29 20:18:07', '2023-01-29 20:18:07', 26);

-- --------------------------------------------------------

--
-- Table structure for table `pro_images`
--

CREATE TABLE `pro_images` (
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pro_images`
--

INSERT INTO `pro_images` (`product_id`, `image`, `status`, `created_at`, `updated_at`) VALUES
('nikemax', '', 0, '2023-01-20 20:43:12', '2023-01-20 20:43:12'),
('nikemax', '', 0, '2023-01-20 20:43:12', '2023-01-20 20:43:12'),
('loinike', 'prod-3.jpg', 0, '2023-01-20 21:08:26', '2023-01-20 21:08:26'),
('loinike', 'prod-4.jpg', 0, '2023-01-20 21:08:26', '2023-01-20 21:08:26'),
('asic123', 'prod-3.jpg', 0, '2023-01-21 15:15:00', '2023-01-21 15:15:00'),
('asic123', 'prod-4.jpg', 0, '2023-01-21 15:15:00', '2023-01-21 15:15:00'),
('nike3939392', '', 0, '2023-01-22 13:33:07', '2023-01-22 13:33:07'),
('nike39393921', '', 0, '2023-01-22 13:35:11', '2023-01-22 13:35:11'),
('nike393939212', '', 0, '2023-01-22 13:36:35', '2023-01-22 13:36:35'),
('nike3939392123344', '', 0, '2023-01-22 13:39:07', '2023-01-22 13:39:07'),
('25', 'giay-nike-quest-4-nam-den-do-01-80x80.jpg', 0, '2023-01-24 13:22:11', '2023-01-24 13:22:11'),
('25', 'giay-nike-quest-4-nam-den-do-02-80x80.jpg', 0, '2023-01-24 13:22:12', '2023-01-24 13:22:12'),
('25', 'giay-nike-quest-4-nam-den-do-03-80x80.jpg', 0, '2023-01-24 13:22:12', '2023-01-24 13:22:12'),
('25', 'giay-nike-quest-4-nam-den-do-04-80x80.jpg', 0, '2023-01-24 13:22:12', '2023-01-24 13:22:12'),
('26', '', 0, '2023-01-24 14:55:11', '2023-01-24 14:55:11'),
('26', '', 0, '2023-01-24 14:55:11', '2023-01-24 14:55:11'),
('26', '', 0, '2023-01-24 14:55:11', '2023-01-24 14:55:11'),
('26', '', 0, '2023-01-24 14:55:11', '2023-01-24 14:55:11'),
('26', 'file_0_1674552497.jpg', 0, '2023-01-24 16:28:17', '2023-01-24 16:28:17'),
('26', '', 0, '2023-01-24 16:28:17', '2023-01-24 16:28:17'),
('26', '', 0, '2023-01-24 16:28:17', '2023-01-24 16:28:17'),
('26', '', 0, '2023-01-24 16:28:17', '2023-01-24 16:28:17'),
('26', 'file_0_1674552734.jpg', 0, '2023-01-24 16:32:14', '2023-01-24 16:32:14'),
('26', '', 0, '2023-01-24 16:32:14', '2023-01-24 16:32:14'),
('26', '', 0, '2023-01-24 16:32:14', '2023-01-24 16:32:14'),
('26', '', 0, '2023-01-24 16:32:14', '2023-01-24 16:32:14'),
('26', 'file_0_1674552747.jpg', 0, '2023-01-24 16:32:27', '2023-01-24 16:32:27'),
('26', 'file_0_1674552759.jpg', 0, '2023-01-24 16:32:39', '2023-01-24 16:32:39'),
('26', 'file_0_1674552949.jpg', 0, '2023-01-24 16:35:49', '2023-01-24 16:35:49'),
('26', '', 0, '2023-01-24 16:35:49', '2023-01-24 16:35:49'),
('26', '', 0, '2023-01-24 16:35:49', '2023-01-24 16:35:49'),
('26', '', 0, '2023-01-24 16:35:49', '2023-01-24 16:35:49'),
('26', '', 0, '2023-01-24 16:35:49', '2023-01-24 16:35:49'),
('26', 'file_0_1674552961.jpg', 0, '2023-01-24 16:36:01', '2023-01-24 16:36:01'),
('26', '', 0, '2023-01-24 16:36:01', '2023-01-24 16:36:01'),
('26', '', 0, '2023-01-24 16:36:01', '2023-01-24 16:36:01'),
('26', '', 0, '2023-01-24 16:36:01', '2023-01-24 16:36:01'),
('27', 'file_0_1674553020.jpg', 0, '2023-01-24 16:37:00', '2023-01-24 16:37:00'),
('27', '', 0, '2023-01-24 16:37:00', '2023-01-24 16:37:00'),
('27', '', 0, '2023-01-24 16:37:00', '2023-01-24 16:37:00'),
('27', '', 0, '2023-01-24 16:37:00', '2023-01-24 16:37:00'),
('27', 'giay-nike-air-max-ap-nam-xam-01-80x80.jpg', 0, '2023-01-24 16:39:40', '2023-01-24 16:39:40'),
('27', 'giay-nike-air-max-ap-nam-xam-01-550x550.jpg', 0, '2023-01-24 16:39:40', '2023-01-24 16:39:40'),
('27', 'giay-nike-air-max-ap-nam-xam-02-80x80.jpg', 0, '2023-01-24 16:39:40', '2023-01-24 16:39:40'),
('27', 'giay-nike-air-max-ap-nam-xam-03-80x80.jpg', 0, '2023-01-24 16:39:40', '2023-01-24 16:39:40'),
('26', 'file_0_1674786378.jpg', 0, '2023-01-27 09:26:18', '2023-01-27 09:26:18'),
('26', 'file_1_1674786378.jpg', 0, '2023-01-27 09:26:18', '2023-01-27 09:26:18'),
('26', 'file_2_1674786378.jpg', 0, '2023-01-27 09:26:18', '2023-01-27 09:26:18'),
('26', 'file_3_1674786378.jpg', 0, '2023-01-27 09:26:18', '2023-01-27 09:26:18'),
('2', 'file_0_1674786877.jpg', 0, '2023-01-27 09:34:37', '2023-01-27 09:34:37'),
('2', 'file_1_1674786877.jpg', 0, '2023-01-27 09:34:37', '2023-01-27 09:34:37'),
('2', 'file_2_1674786877.jpg', 0, '2023-01-27 09:34:37', '2023-01-27 09:34:37'),
('2', 'file_3_1674786877.jpg', 0, '2023-01-27 09:34:37', '2023-01-27 09:34:37'),
('3', 'file_0_1674787020.jpg', 0, '2023-01-27 09:37:00', '2023-01-27 09:37:00'),
('3', 'file_1_1674787020.jpg', 0, '2023-01-27 09:37:01', '2023-01-27 09:37:01'),
('3', 'file_2_1674787020.jpg', 0, '2023-01-27 09:37:01', '2023-01-27 09:37:01'),
('3', 'file_3_1674787020.jpg', 0, '2023-01-27 09:37:01', '2023-01-27 09:37:01'),
('4', 'file_0_1674787112.jpg', 0, '2023-01-27 09:38:32', '2023-01-27 09:38:32'),
('4', 'file_1_1674787112.jpg', 0, '2023-01-27 09:38:33', '2023-01-27 09:38:33'),
('4', 'file_2_1674787112.jpg', 0, '2023-01-27 09:38:33', '2023-01-27 09:38:33'),
('4', 'file_3_1674787112.jpg', 0, '2023-01-27 09:38:33', '2023-01-27 09:38:33'),
('5', 'file_0_1674787191.jpg', 0, '2023-01-27 09:39:51', '2023-01-27 09:39:51'),
('5', 'file_1_1674787191.jpg', 0, '2023-01-27 09:39:51', '2023-01-27 09:39:51'),
('5', 'file_2_1674787191.jpg', 0, '2023-01-27 09:39:51', '2023-01-27 09:39:51'),
('5', 'file_3_1674787191.jpg', 0, '2023-01-27 09:39:51', '2023-01-27 09:39:51'),
('6', 'file_0_1674787272.jpg', 0, '2023-01-27 09:41:12', '2023-01-27 09:41:12'),
('6', 'file_1_1674787272.jpg', 0, '2023-01-27 09:41:12', '2023-01-27 09:41:12'),
('6', 'file_2_1674787272.jpg', 0, '2023-01-27 09:41:12', '2023-01-27 09:41:12'),
('6', 'file_3_1674787272.jpg', 0, '2023-01-27 09:41:12', '2023-01-27 09:41:12'),
('7', 'file_0_1674787441.jpg', 0, '2023-01-27 09:44:01', '2023-01-27 09:44:01'),
('7', 'file_1_1674787441.jpg', 0, '2023-01-27 09:44:01', '2023-01-27 09:44:01'),
('7', 'file_2_1674787441.jpg', 0, '2023-01-27 09:44:01', '2023-01-27 09:44:01'),
('7', 'file_3_1674787441.jpg', 0, '2023-01-27 09:44:01', '2023-01-27 09:44:01'),
('15', 'file_0_1674787531.jpg', 0, '2023-01-27 09:45:31', '2023-01-27 09:45:31'),
('15', 'file_1_1674787531.jpg', 0, '2023-01-27 09:45:31', '2023-01-27 09:45:31'),
('15', 'file_2_1674787531.jpg', 0, '2023-01-27 09:45:31', '2023-01-27 09:45:31'),
('15', 'file_3_1674787531.jpg', 0, '2023-01-27 09:45:31', '2023-01-27 09:45:31'),
('9', 'file_0_1674787626.jpg', 0, '2023-01-27 09:47:06', '2023-01-27 09:47:06'),
('9', 'file_1_1674787626.jpg', 0, '2023-01-27 09:47:07', '2023-01-27 09:47:07'),
('9', 'file_2_1674787626.jpg', 0, '2023-01-27 09:47:07', '2023-01-27 09:47:07'),
('9', 'file_3_1674787626.jpg', 0, '2023-01-27 09:47:07', '2023-01-27 09:47:07'),
('10', 'file_0_1674787699.jpg', 0, '2023-01-27 09:48:19', '2023-01-27 09:48:19'),
('10', 'file_1_1674787699.jpg', 0, '2023-01-27 09:48:19', '2023-01-27 09:48:19'),
('10', 'file_2_1674787699.jpg', 0, '2023-01-27 09:48:19', '2023-01-27 09:48:19'),
('10', 'file_3_1674787699.jpg', 0, '2023-01-27 09:48:19', '2023-01-27 09:48:19'),
('11', 'file_0_1674787908.jpg', 0, '2023-01-27 09:51:48', '2023-01-27 09:51:48'),
('11', 'file_1_1674787908.jpg', 0, '2023-01-27 09:51:48', '2023-01-27 09:51:48'),
('11', 'file_2_1674787908.jpg', 0, '2023-01-27 09:51:49', '2023-01-27 09:51:49'),
('11', 'file_3_1674787908.jpg', 0, '2023-01-27 09:51:49', '2023-01-27 09:51:49'),
('12', 'file_0_1674794386.jpg', 0, '2023-01-27 11:39:46', '2023-01-27 11:39:46'),
('12', 'file_1_1674794386.jpg', 0, '2023-01-27 11:39:46', '2023-01-27 11:39:46'),
('12', 'file_2_1674794386.jpg', 0, '2023-01-27 11:39:46', '2023-01-27 11:39:46'),
('12', 'file_3_1674794386.jpg', 0, '2023-01-27 11:39:46', '2023-01-27 11:39:46'),
('13', 'file_0_1674794526.jpg', 0, '2023-01-27 11:42:06', '2023-01-27 11:42:06'),
('13', 'file_1_1674794526.jpg', 0, '2023-01-27 11:42:06', '2023-01-27 11:42:06'),
('13', 'file_2_1674794526.jpg', 0, '2023-01-27 11:42:06', '2023-01-27 11:42:06'),
('13', 'file_3_1674794526.jpg', 0, '2023-01-27 11:42:07', '2023-01-27 11:42:07'),
('14', 'file_0_1674794608.jpg', 0, '2023-01-27 11:43:28', '2023-01-27 11:43:28'),
('14', 'file_1_1674794608.jpg', 0, '2023-01-27 11:43:28', '2023-01-27 11:43:28'),
('14', 'file_2_1674794608.jpg', 0, '2023-01-27 11:43:28', '2023-01-27 11:43:28'),
('14', 'file_3_1674794608.jpg', 0, '2023-01-27 11:43:28', '2023-01-27 11:43:28'),
('16', 'file_0_1674794739.jpg', 0, '2023-01-27 11:45:39', '2023-01-27 11:45:39'),
('16', 'file_1_1674794739.jpg', 0, '2023-01-27 11:45:40', '2023-01-27 11:45:40'),
('16', 'file_2_1674794739.jpg', 0, '2023-01-27 11:45:40', '2023-01-27 11:45:40'),
('16', 'file_3_1674794739.jpg', 0, '2023-01-27 11:45:40', '2023-01-27 11:45:40'),
('17', 'file_0_1674794823.jpg', 0, '2023-01-27 11:47:03', '2023-01-27 11:47:03'),
('17', 'file_1_1674794823.jpg', 0, '2023-01-27 11:47:03', '2023-01-27 11:47:03'),
('17', 'file_2_1674794823.jpg', 0, '2023-01-27 11:47:03', '2023-01-27 11:47:03'),
('17', 'file_3_1674794823.jpg', 0, '2023-01-27 11:47:03', '2023-01-27 11:47:03'),
('18', 'file_0_1674794906.jpg', 0, '2023-01-27 11:48:26', '2023-01-27 11:48:26'),
('18', 'file_1_1674794906.jpg', 0, '2023-01-27 11:48:27', '2023-01-27 11:48:27'),
('18', 'file_2_1674794906.jpg', 0, '2023-01-27 11:48:27', '2023-01-27 11:48:27'),
('18', 'file_3_1674794906.jpg', 0, '2023-01-27 11:48:27', '2023-01-27 11:48:27'),
('19', 'file_0_1674795003.jpg', 0, '2023-01-27 11:50:03', '2023-01-27 11:50:03'),
('19', 'file_1_1674795003.jpg', 0, '2023-01-27 11:50:03', '2023-01-27 11:50:03'),
('19', 'file_2_1674795003.jpg', 0, '2023-01-27 11:50:03', '2023-01-27 11:50:03'),
('19', 'file_3_1674795003.jpg', 0, '2023-01-27 11:50:03', '2023-01-27 11:50:03'),
('20', 'file_0_1674795317.jpg', 0, '2023-01-27 11:55:17', '2023-01-27 11:55:17'),
('20', 'file_1_1674795317.jpg', 0, '2023-01-27 11:55:18', '2023-01-27 11:55:18'),
('20', 'file_2_1674795317.jpg', 0, '2023-01-27 11:55:18', '2023-01-27 11:55:18'),
('20', 'file_3_1674795317.jpg', 0, '2023-01-27 11:55:18', '2023-01-27 11:55:18'),
('21', 'file_0_1674795389.jpg', 0, '2023-01-27 11:56:29', '2023-01-27 11:56:29'),
('21', 'file_1_1674795389.jpg', 0, '2023-01-27 11:56:29', '2023-01-27 11:56:29'),
('21', 'file_2_1674795389.jpg', 0, '2023-01-27 11:56:29', '2023-01-27 11:56:29'),
('21', 'file_3_1674795389.jpg', 0, '2023-01-27 11:56:29', '2023-01-27 11:56:29'),
('28', 'file_0_1674795538.png', 0, '2023-01-27 11:58:58', '2023-01-27 11:58:58'),
('28', '', 0, '2023-01-27 11:58:59', '2023-01-27 11:58:59'),
('28', '', 0, '2023-01-27 11:58:59', '2023-01-27 11:58:59'),
('28', '', 0, '2023-01-27 11:58:59', '2023-01-27 11:58:59'),
('29', 'file_0_1674795634.jpg', 0, '2023-01-27 12:00:34', '2023-01-27 12:00:34'),
('29', '', 0, '2023-01-27 12:00:34', '2023-01-27 12:00:34'),
('29', '', 0, '2023-01-27 12:00:34', '2023-01-27 12:00:34'),
('29', '', 0, '2023-01-27 12:00:34', '2023-01-27 12:00:34'),
('30', 'file_0_1674795726.jpg', 0, '2023-01-27 12:02:06', '2023-01-27 12:02:06'),
('30', '', 0, '2023-01-27 12:02:06', '2023-01-27 12:02:06'),
('30', '', 0, '2023-01-27 12:02:06', '2023-01-27 12:02:06'),
('30', '', 0, '2023-01-27 12:02:06', '2023-01-27 12:02:06'),
('30', 'file_0_1674795859.jpg', 0, '2023-01-27 12:04:19', '2023-01-27 12:04:19'),
('30', 'file_1_1674795859.jpg', 0, '2023-01-27 12:04:19', '2023-01-27 12:04:19'),
('30', 'file_2_1674795859.jpg', 0, '2023-01-27 12:04:19', '2023-01-27 12:04:19'),
('30', 'file_3_1674795859.jpg', 0, '2023-01-27 12:04:19', '2023-01-27 12:04:19'),
('1', 'file_0_1674814944.jpg', 0, '2023-01-27 17:22:24', '2023-01-27 17:22:24'),
('1', 'file_1_1674814944.jpg', 0, '2023-01-27 17:22:24', '2023-01-27 17:22:24'),
('1', 'file_2_1674814944.jpg', 0, '2023-01-27 17:22:24', '2023-01-27 17:22:24'),
('1', 'file_3_1674814944.jpg', 0, '2023-01-27 17:22:24', '2023-01-27 17:22:24');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `user_id` bigint(20) NOT NULL,
  `func_id` bigint(20) NOT NULL,
  `status` tinyint(4) DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`user_id`, `func_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 13, 1, '2022-04-03 08:21:23', '2022-11-11 15:17:57'),
(1, 19, 1, '2022-04-03 08:21:23', '2022-11-11 15:17:57'),
(1, 12, 1, '2022-04-03 08:21:23', '2022-11-11 15:17:57'),
(1, 14, 1, '2022-04-03 08:21:23', '2022-11-11 15:17:57'),
(1, 15, 1, '2022-04-03 08:21:23', '2022-11-11 15:17:57'),
(1, 16, 1, '2022-04-03 08:21:23', '2022-11-11 15:17:57'),
(1, 20, 1, '2022-04-03 08:21:23', '2022-11-11 15:17:57'),
(1, 17, 1, '2022-04-03 08:21:23', '2022-11-11 15:17:57'),
(1, 18, 1, '2022-04-03 08:21:23', '2022-11-11 15:17:57');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tên cách thức vận chuyển',
  `summary` longtext COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tóm tắt',
  `status` tinyint(4) DEFAULT 1 COMMENT '0.Khóa - 1.Hoạt động',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tên nhà cung cấp',
  `summary` longtext COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Tóm tắt',
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Email nhà cung cấp',
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Số điện thoại nhà cung cấp',
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Địa chỉ nhà cung cấp',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Hình ảnh',
  `alias` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO',
  `keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO',
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO',
  `image_share` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO',
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'SEO',
  `status` tinyint(4) DEFAULT 1 COMMENT '0.Khóa - 1.Hoạt động',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `summary`, `email`, `phone`, `address`, `image`, `alias`, `keyword`, `description`, `image_share`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Adidas', '', 'adidas@email.com', '12073912637', 'tầng 8, Tòa nhà Deutsches Haus, số 33 đường Lê Duẩn, Phường Bến Nghé, Quận 1, TP Hồ Chí Minh', 'file_1674785816.jpg', '', '', '', '', '', 1, '2022-01-12 18:05:12', '2023-01-27 09:16:56'),
(2, 'Nike', '', 'nikevn@email.com', '02838235241', 'Tầng 12, Tòa Nhà Metropolitan, 235 Đường Đồng Khởi, Phường Bến Nghé, Quận 1, Thành Phố Hồ Chí Minh, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh', 'file_1674785909.jpg', '', '', '', '', '', 1, '2022-09-30 15:22:48', '2023-01-27 09:18:29'),
(3, 'Puma', '', 'pumavn@email.com', '02838210621', 'L3 - 28, Tầng 3, Saigon Centre, 65 Lê Lợi, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh', 'file_1674786084.jpg', '', '', '', '', '', 1, '2022-09-30 15:24:26', '2023-01-27 09:21:24'),
(17, 'Asics', '', 'asics@email.com', '09375453722', 'ASICS Saigon Centre. Tầng 4, L4-08, Tòa nhà Saigon Centre, Số 65 Lê Lợi, Bến Nghé, Quận 1, TP. Hồ Chí Minh', 'file_1674795237.jpg', '', '', '', '', '', 1, '2023-01-27 11:53:57', '2023-01-27 11:53:57'),
(16, 'New Balance', '', 'newbalance@email.com', '098765432', '30 Đ. Nguyễn Trãi, Phường Phạm Ngũ Lão, Quận 1, Thành phố Hồ Chí Minh, Việt Nam', 'file_1674786283.jpg', '', '', '', '', '', 1, '2023-01-27 09:24:43', '2023-01-27 09:24:43'),
(15, 'Lacoste', '', 'lascoste@email.com', '02838226865', '58 Đồng Khởi, Bến Nghé, Quận 1, Thành phố Hồ Chí Minh', 'file_1674786022.jpg', '', '', '', '', '', 1, '2023-01-27 09:20:22', '2023-01-27 09:20:22');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `firstname`, `lastname`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Palma Wisoky MD', 'Dr. Ova Walker DDS', 'considine.johnathon@beahan.org', '(669) 910-8358', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(2, 'Mrs. Caleigh Pouros Jr.', 'Amely Hackett', 'purdy.ezequiel@west.biz', '575-901-2568', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(3, 'Lelia Schmeler', 'Alia Herzog PhD', 'gsawayn@gmail.com', '979-913-0838', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(4, 'Mr. Adrian Hauck', 'Stephany Kuphal', 'ratke.irving@hotmail.com', '+1 (432) 454-6903', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(5, 'Jermey Wolff', 'Eulalia Monahan', 'leta54@yahoo.com', '(385) 282-8574', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(6, 'Xzavier Harber', 'Prof. Verona Bogan', 'dax.boyle@yahoo.com', '+1 (262) 361-0141', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(7, 'Zita Aufderhar II', 'Dr. Elinor Bayer PhD', 'teresa32@yahoo.com', '270-475-5741', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(8, 'Gabrielle O\'Kon PhD', 'Kara Bednar', 'rau.henderson@gmail.com', '+1 (279) 829-1497', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(9, 'Leland Rutherford', 'Amya Cartwright', 'bins.kaia@koepp.com', '+15405429138', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(10, 'Dr. Stanley Maggio V', 'Vernon Klein', 'alberto.collins@yahoo.com', '551-898-3838', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(11, 'Letitia Wolff', 'Elenor Stark', 'fisher.alexandre@lueilwitz.com', '312-809-1256', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(12, 'Janae Breitenberg', 'Ms. Marina Hickle V', 'courtney58@koch.com', '+1 (660) 982-1663', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(13, 'Keegan Leffler', 'Sibyl Mante', 'blick.asia@gmail.com', '(832) 706-5081', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(14, 'Noah Russel II', 'Raoul Emard Jr.', 'hnolan@gleichner.net', '+1.910.780.0656', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(15, 'Noe Green', 'Jude Konopelski', 'angelica35@hotmail.com', '660-908-4429', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(16, 'Kaitlyn Keeling', 'Prof. Norbert Reichel', 'spencer.trisha@boehm.net', '+1-520-921-8149', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(17, 'Micheal Beatty', 'Esmeralda Block', 'sarina60@gmail.com', '1-323-472-6409', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(18, 'Brent Block', 'Jamie Streich', 'daphne14@ritchie.com', '(718) 464-7251', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(19, 'Dr. Lelah Kunze DDS', 'Melany Klocko', 'vkassulke@hotmail.com', '330.371.9360', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(20, 'Carol Williamson', 'Mallory Kirlin', 'qoreilly@yahoo.com', '607-510-6981', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(21, 'Mireya Kihn', 'Mr. Antwan Glover II', 'jshanahan@gmail.com', '+1 (564) 978-8047', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(22, 'Ari Bednar', 'Mervin Keebler', 'kayley.sanford@gmail.com', '(512) 968-3591', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(23, 'Dr. Lillie Murazik', 'Mr. Tevin Ernser Jr.', 'ckihn@yahoo.com', '(938) 796-4120', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(24, 'Sadye Bechtelar', 'Celine Abbott', 'maverick34@balistreri.com', '718.705.4297', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(25, 'Prof. Madison Weissnat III', 'Dr. Toby Larkin', 'kunde.maurice@hotmail.com', '731-201-9458', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(26, 'Randall Gorczany', 'Wilfredo Powlowski', 'qrogahn@bashirian.net', '817-785-6105', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(27, 'Prof. Anya Schultz', 'Amari Eichmann', 'abdul.torphy@hammes.biz', '1-870-643-5959', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(28, 'Sylvia Grady', 'Mrs. Mariam Murazik', 'hayes.urban@metz.net', '914-316-1269', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(29, 'Dr. Wilton McClure III', 'Dr. Terrill Kerluke III', 'pollich.darion@yahoo.com', '1-509-614-7457', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(30, 'Jules Wyman', 'Josephine Rath', 'schimmel.kyle@dare.com', '256.800.2527', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(31, 'Mr. Hillard Runolfsson', 'Rahsaan Predovic II', 'harvey.marques@walker.com', '+19548884315', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(32, 'Liam Bosco', 'Ms. Casandra Effertz II', 'dovie.schmitt@upton.com', '1-848-658-1836', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(33, 'Dr. Hortense Wilderman PhD', 'Delbert Sporer', 'hoyt.murazik@gmail.com', '971.201.9192', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(34, 'Dr. Roberto Fay III', 'Emmet D\'Amore', 'schroeder.kaycee@gmail.com', '308-504-6143', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(35, 'Granville Schaefer', 'Andreanne Waters', 'sporer.sofia@hotmail.com', '(989) 750-4079', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(36, 'Mr. Domenico Trantow', 'Dillan Gutkowski Jr.', 'margaretta.kirlin@yahoo.com', '220-789-0362', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(37, 'Onie Bartell', 'Golda Hammes', 'aric55@haag.org', '580-233-9613', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(38, 'Prof. Murl Cartwright', 'Foster Volkman', 'gene36@moore.com', '(754) 591-4553', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(39, 'Wayne Bednar', 'Cayla Klocko', 'block.estrella@boehm.com', '1-517-414-1181', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(40, 'Lindsay Ullrich III', 'Bria Kling IV', 'vrosenbaum@casper.com', '+1-424-914-1765', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(41, 'Cleo Schmidt', 'Ms. Ana Jacobi V', 'stone78@frami.com', '732-996-6856', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(42, 'Davon Erdman II', 'Fabian Hyatt', 'delia.greenfelder@hotmail.com', '+1.267.210.9460', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(43, 'Prof. Kiel Hill PhD', 'Jedediah McKenzie', 'adolfo00@yahoo.com', '(458) 661-5817', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(44, 'Prof. Brook Maggio', 'Amos Boyle', 'wendell.hand@schimmel.info', '1-267-733-1128', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(45, 'Destiney Kunde', 'Brant Jenkins', 'hveum@toy.net', '352.427.7131', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(46, 'Freeda Jast V', 'Werner Purdy PhD', 'qpadberg@von.com', '830-997-0786', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(47, 'Braeden Gerhold', 'Prof. Christine Russel', 'carol61@botsford.net', '503.343.2359', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(48, 'Mr. Keshaun Lebsack', 'Yoshiko Hintz', 'xcronin@hotmail.com', '952.262.2147', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(49, 'Lyla Bayer', 'Uriah Hirthe', 'dusty91@hotmail.com', '470.344.5945', '2022-03-27 03:31:45', '2022-03-27 03:31:45'),
(50, 'Brent Armstrong', 'Minerva Waelchi Sr.', 'yolanda.harber@jakubowski.info', '(423) 508-7121', '2022-03-27 03:31:45', '2022-03-27 03:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'tên gọi',
  `lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'họ',
  `dob` date NOT NULL COMMENT 'ngày sinh',
  `gender` tinyint(4) NOT NULL COMMENT '1: Nam;\r\n0: Nữ',
  `address` varchar(150) COLLATE utf8_unicode_ci NOT NULL COMMENT 'địa chỉ',
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'tên đăng nhập',
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'mật khẩu',
  `position` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'vị trí',
  `division` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT 'phan khúc',
  `timelife` datetime DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'email',
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'số điện thoại',
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình ảnh đại diện',
  `group_id` bigint(20) DEFAULT NULL COMMENT 'mã group',
  `reset_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` datetime NOT NULL,
  `status` tinyint(4) DEFAULT 1 COMMENT '0.Khóa - 1.Hoạt động',
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remember_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `dob`, `gender`, `address`, `username`, `password`, `position`, `division`, `timelife`, `email`, `phone`, `image`, `group_id`, `reset_token`, `email_verified_at`, `status`, `created_at`, `updated_at`, `remember_token`) VALUES
(1, 'baloi', 'nguyen', '2023-01-19', 1, '', 'nguyenbaloi', 'ca8cb5dd4c461743fb116fe359d202a8', 'Manager', 'Manager', NULL, 'nguyenbaloi2407@gmail.com', '0192345678', 'file_1671610938.jpg', 1, '', '2022-09-20 14:17:19', 1, '2022-03-20 08:59:17', '2023-02-05 20:40:00', ''),
(28, 'loi', 'nguyen', '2023-02-14', 1, '273 An D. Vương, Phường 3, Quận 5', 'loinguyen1234', 'c87157c65386218e9957e99bf31aa88d', 'Creator', 'Creator', NULL, 'nguyen123@email.com', '02838235241', '', 2, '', '0000-00-00 00:00:00', 1, '2023-02-05 20:21:40', '2023-02-05 20:21:40', ''),
(29, 'ab', 'nguye', '2023-02-16', 1, '273 An D. Vương, Phường 3, Quận 5', 'xinchao123', '7f79c3b53895168e8b988e4e983d3b42', 'Visitor', 'Visitor', NULL, 'ab@email.com', '09376453722', '', 4, '', '0000-00-00 00:00:00', 1, '2023-02-05 20:39:45', '2023-02-05 20:39:45', ''),
(30, 'nguyen', 'mobilestore', '2023-02-10', 2, '', 'laptop', 'cd9c026884c8785bbd733e36ed1387ec', '', '', NULL, 'nguyenbdwqdqwdqaloi2407@gmail.com', '09376453722', 'file_1675678092.jpg', 4, '', '0000-00-00 00:00:00', 1, '2023-02-06 15:03:24', '2023-02-06 17:08:12', ''),
(31, 'nguyen', 'mobilestore', '2023-02-10', 2, '', 'laptop123', 'c87157c65386218e9957e99bf31aa88d', '', '', NULL, 'nguyenbwdqaloi2407@gmail.com', '09376453722', NULL, 4, '', '0000-00-00 00:00:00', 1, '2023-02-06 15:04:28', '2023-02-06 15:04:28', ''),
(32, 'nguyen', 'mobilestore', '2023-02-10', 2, '', 'laptop12333', 'c87157c65386218e9957e99bf31aa88d', '', '', NULL, 'nguyenbwdqalo3i2407@gmail.com', '09376453722', NULL, 4, '', '0000-00-00 00:00:00', 1, '2023-02-06 15:05:41', '2023-02-06 15:05:41', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'ID user',
  `group_id` bigint(20) UNSIGNED NOT NULL COMMENT 'ID group',
  `summary` longtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mô tả',
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0.Khóa - 1.Hoạt động',
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `configs_key_unique` (`key`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `functions`
--
ALTER TABLE `functions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mods`
--
ALTER TABLE `mods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_categories`
--
ALTER TABLE `news_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_id` (`order_id`,`product_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pro_elements`
--
ALTER TABLE `pro_elements`
  ADD PRIMARY KEY (`element_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`user_id`,`func_id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `functions`
--
ALTER TABLE `functions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mods`
--
ALTER TABLE `mods`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `news_categories`
--
ALTER TABLE `news_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pro_elements`
--
ALTER TABLE `pro_elements`
  MODIFY `element_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
