-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 25, 2023 lúc 08:27 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `project2_huongdan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `sex` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `created_at`, `updated_at`, `name`, `email`, `phone`, `password`, `sex`, `address`, `level`, `isDeleted`) VALUES
(1, '2023-06-29 03:24:54', '2023-06-29 03:24:54', 'Admin', 'admin@gmail.com', '0869737005', '$2a$12$0L.kE25z8C2FdZG3Tr4w1uQx9mPfk7XZOcIa5oHxanyiqhYEfVRTy', 1, 'admin', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `appointment`
--

CREATE TABLE `appointment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `service` int(11) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1,
  `facilities_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `created_at`, `updated_at`, `isDeleted`, `client_id`) VALUES
(2, '2023-10-04 19:01:22', '2023-10-04 19:01:22', 1, 1),
(3, '2023-10-10 18:11:58', '2023-10-10 18:11:58', 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_detail`
--

CREATE TABLE `cart_detail` (
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `product_detail_id` bigint(20) UNSIGNED NOT NULL,
  `quanity` int(11) NOT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nameCate` varchar(255) DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1,
  `staff_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `created_at`, `updated_at`, `nameCate`, `isDeleted`, `staff_id`) VALUES
(1, '2023-09-23 07:57:44', '2023-09-23 07:57:44', 'iPhone', 1, 1),
(2, '2023-09-23 07:58:25', '2023-09-23 08:29:21', 'SamSung', 1, 1),
(3, '2023-09-23 08:03:55', '2023-09-23 08:44:27', 'Oppo', 1, 1),
(4, '2023-09-23 08:04:52', '2023-09-23 08:04:52', 'Xiaomi', 1, 1),
(5, '2023-09-23 08:44:59', '2023-09-23 08:45:48', 'Vivo', 1, 1),
(6, '2023-09-23 08:45:03', '2023-09-23 08:46:15', 'Huawei', 1, 1),
(7, '2023-09-23 08:45:08', '2023-09-23 08:46:22', 'LG', 1, 1),
(8, '2023-09-23 08:45:12', '2023-09-23 08:46:30', 'Realme', 1, 1),
(9, '2023-09-23 08:45:17', '2023-09-23 08:46:40', 'Lenovo', 1, 1),
(10, '2023-09-23 08:45:21', '2023-09-23 08:46:53', 'Sony', 1, 1),
(11, '2023-09-23 08:45:35', '2023-09-23 08:47:03', 'ASUS', 1, 1),
(12, '2023-09-26 19:00:42', '2023-09-26 19:00:42', 'HP', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `client`
--

CREATE TABLE `client` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `sex` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1,
  `admin_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `client`
--

INSERT INTO `client` (`id`, `created_at`, `updated_at`, `name`, `email`, `phone`, `password`, `sex`, `address`, `level`, `isDeleted`, `admin_id`) VALUES
(1, '2023-06-29 03:24:54', '2023-09-28 20:49:10', 'client@gmail.com', 'client@gmail.com', '0869737005', '$2a$12$c4p67XtueOyFQ.hHbrO2v.RLTzT/4vjGv0h4r2Q2RQqT4RVu4EvuO', 1, 'ccc', 3, 1, 1),
(2, '2023-09-28 20:36:05', '2023-09-28 20:53:43', 'Hoàng Anh Vũ', 'linh@gmail.com', '0869737007', '$2y$10$Iq/Rhfvd2NgeuLImloHzT.k/iIy.lxIKqTqYtlx.N2NHCNPLsuyPK', 1, 'Hà Nội', 3, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `content` varchar(255) NOT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1,
  `date` date NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `product_detail_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `created_at`, `updated_at`, `content`, `isDeleted`, `date`, `client_id`, `product_detail_id`) VALUES
(1, '2023-10-21 03:33:01', '2023-10-21 03:33:01', 'Sản phẩm như cc', 1, '2023-10-21', 1, 1),
(2, '2023-10-20 20:56:19', '2023-10-20 20:56:19', 'Sản phẩm xịn quá', 1, '2023-10-21', 1, 2),
(3, '2023-10-24 06:17:48', '2023-10-24 06:17:48', 'Sản phẩm đẹp', 1, '2023-10-24', 1, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `discount_code`
--

CREATE TABLE `discount_code` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `money` int(11) DEFAULT NULL,
  `percent` int(11) DEFAULT NULL,
  `quanity` int(11) DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1,
  `staff_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `discount_code`
--

INSERT INTO `discount_code` (`id`, `created_at`, `updated_at`, `code`, `money`, `percent`, `quanity`, `isDeleted`, `staff_id`) VALUES
(1, '2023-10-12 15:33:41', '2023-10-22 09:09:21', 'HOANG', 100000, 0, 0, 1, 1),
(2, '2023-10-14 15:33:41', '2023-10-24 06:15:02', '50%DH', 0, 50, 3, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `facilities`
--

CREATE TABLE `facilities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1,
  `admin_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `facilities`
--

INSERT INTO `facilities` (`id`, `created_at`, `updated_at`, `name`, `address`, `isDeleted`, `admin_id`) VALUES
(1, '2023-06-29 03:24:54', '2023-10-23 06:23:30', 'Cơ sở 1', 'Số 35, Phố Hồng Tiến, Long Biên, Hà Nội', 1, 1),
(2, '2023-09-25 10:24:13', '2023-10-23 06:23:54', 'Cơ sở 2', 'Số 39, Phúc Đồng, Long biên, Hà Nội', 1, 1),
(3, '2023-09-27 07:33:46', '2023-10-23 06:24:34', 'Cơ sở 3', 'Đình làng Đồng Dầu, Dục Tú, Đông Anh, Hà Nội', 1, 1);

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
-- Cấu trúc bảng cho bảng `like`
--

CREATE TABLE `like` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `product_detail_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `like`
--

INSERT INTO `like` (`id`, `created_at`, `updated_at`, `isDeleted`, `client_id`, `product_detail_id`) VALUES
(5, '2023-10-02 20:05:59', '2023-10-02 20:05:59', 1, 2, 3);

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_09_17_164518_create_admin_table', 1),
(6, '2023_09_17_165142_create_facilities_table', 1),
(7, '2023_09_17_165755_create_staff_table', 1),
(8, '2023_09_17_165949_create_category_table', 1),
(9, '2023_09_17_170311_create_product_table', 1),
(10, '2023_09_17_170858_create_appointment_table', 1),
(11, '2023_09_17_170925_create_product_detail_table', 1),
(12, '2023_09_17_172826_create_discount_code_table', 1),
(13, '2023_09_17_173257_create_quyen_han_table', 1),
(14, '2023_09_17_173724_create_post_table', 1),
(15, '2023_09_17_174027_create_client_table', 1),
(16, '2023_09_17_174144_create_cart_table', 1),
(17, '2023_09_17_174538_create_cart_detail_table', 1),
(18, '2023_09_17_175513_create_comment_table', 1),
(19, '2023_09_17_175943_create_receiver_table', 1),
(20, '2023_09_17_180014_create_like_table', 1),
(21, '2023_09_17_180046_create_payment_methods_table', 1),
(22, '2023_09_17_180426_create_order_table', 1),
(23, '2023_09_17_181016_create_order_detail_table', 1),
(24, '2023_09_17_181310_create_new_staff_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `new_staff`
--

CREATE TABLE `new_staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sum` int(11) DEFAULT NULL,
  `date_order` date NOT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `pay_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `created_at`, `updated_at`, `sum`, `date_order`, `isDeleted`, `status`, `detail`, `client_id`, `receiver_id`, `pay_id`) VALUES
(23, '2023-10-11 20:47:49', '2023-10-17 20:14:59', 5190000, '2023-10-12', 1, 1, '1', 1, 30, 2),
(36, '2023-10-17 14:22:23', '2023-10-17 20:20:55', 1320000, '2023-10-17', 1, 1, '1', 1, 43, 2),
(37, '2023-10-17 14:26:35', '2023-10-17 14:26:35', 1320000, '2023-10-17', 0, 1, '1', 1, 44, 2),
(38, '2023-10-17 20:22:07', '2023-10-17 20:24:11', 1320000, '2023-10-18', 1, 3, '1', 1, 45, 2),
(39, '2023-10-19 01:07:56', '2023-10-19 01:13:11', 1320000, '2023-10-19', 1, 2, '1', 1, 46, 2),
(40, '2023-10-21 02:40:41', '2023-10-21 02:40:41', 1320000, '2023-10-21', 1, 1, '2', 2, 47, 1),
(41, '2023-10-21 02:41:10', '2023-10-21 02:41:10', 1320000, '2023-10-21', 1, 1, '2', 2, 48, 1),
(42, '2023-10-21 02:42:03', '2023-10-21 02:42:03', 1320000, '2023-10-21', 1, 1, '2', 2, 49, 1),
(43, '2023-10-21 02:42:43', '2023-10-21 02:42:43', 1320000, '2023-10-21', 1, 1, '2', 2, 50, 1),
(44, '2023-10-21 02:42:49', '2023-10-21 02:42:49', 1320000, '2023-10-21', 1, 1, '2', 2, 51, 1),
(45, '2023-10-21 02:47:14', '2023-10-21 02:47:14', 1320000, '2023-10-21', 1, 1, '2', 2, 52, 1),
(46, '2023-10-21 02:51:11', '2023-10-21 02:51:11', 1320000, '2023-10-21', 1, 1, '2', 2, 53, 1),
(47, '2023-10-21 02:56:50', '2023-10-21 02:56:50', 1320000, '2023-10-21', 1, 1, '2', 2, 54, 1),
(48, '2023-10-21 02:57:57', '2023-10-21 02:57:57', 1320000, '2023-10-21', 1, 1, '2', 2, 55, 1),
(49, '2023-10-21 02:58:27', '2023-10-21 02:58:27', 1320000, '2023-10-21', 1, 1, '2', 2, 56, 1),
(50, '2023-10-21 03:00:29', '2023-10-21 03:00:29', 1320000, '2023-10-21', 1, 1, '2', 2, 57, 1),
(51, '2023-10-21 03:21:45', '2023-10-21 03:21:45', 6480000, '2023-10-21', 1, 1, '2', 1, 58, 1),
(52, '2023-10-21 03:24:22', '2023-10-21 03:24:22', 1320000, '2023-10-21', 1, 1, '2', 1, 59, 1),
(53, '2023-10-22 08:57:33', '2023-10-22 08:57:33', 675000, '2023-10-22', 1, 1, '1', 1, 60, 2),
(54, '2023-10-22 09:09:21', '2023-10-22 09:09:21', 1220000, '2023-10-22', 1, 1, '1', 1, 61, 2),
(55, '2023-10-23 01:48:12', '2023-10-23 01:48:12', 1320000, '2023-10-23', 1, 1, '2', 1, 62, 1),
(56, '2023-10-23 06:31:57', '2023-10-23 06:31:57', 675000, '2023-10-23', 1, 1, '2', 1, 63, 1),
(57, '2023-10-24 06:15:02', '2023-10-24 06:16:27', 1320000, '2023-10-24', 1, 2, '2', 1, 64, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `quanity` int(11) NOT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`created_at`, `updated_at`, `product_id`, `order_id`, `price`, `quanity`, `isDeleted`) VALUES
('2023-10-11 20:47:49', '2023-10-11 20:47:49', 1, 23, 1290000, 1, 1),
('2023-10-17 14:22:23', '2023-10-17 14:22:23', 1, 36, 1290000, 4, 1),
('2023-10-17 20:22:07', '2023-10-17 20:22:07', 1, 38, 1290000, 1, 1),
('2023-10-19 01:07:56', '2023-10-19 01:07:56', 1, 39, 1290000, 1, 1),
('2023-10-21 02:40:41', '2023-10-21 02:40:41', 1, 40, 1290000, 1, 1),
('2023-10-24 06:15:02', '2023-10-24 06:15:02', 1, 57, 1290000, 1, 1),
('2023-10-11 20:47:49', '2023-10-11 20:47:49', 2, 23, 1290000, 1, 1),
('2023-10-21 03:24:22', '2023-10-21 03:24:22', 2, 52, 1290000, 1, 1),
('2023-10-23 06:31:57', '2023-10-23 06:31:57', 2, 56, 1290000, 1, 1),
('2023-10-24 06:15:02', '2023-10-24 06:15:02', 2, 57, 1290000, 1, 1),
('2023-10-11 20:47:49', '2023-10-11 20:47:49', 3, 23, 1290000, 1, 1),
('2023-10-21 03:21:45', '2023-10-21 03:21:45', 3, 51, 1290000, 1, 1),
('2023-10-22 08:57:33', '2023-10-22 08:57:33', 3, 53, 1290000, 1, 1),
('2023-10-22 09:09:21', '2023-10-22 09:09:21', 3, 54, 1290000, 1, 1),
('2023-10-23 01:48:12', '2023-10-23 01:48:12', 3, 55, 1290000, 1, 1),
('2023-10-11 20:47:49', '2023-10-11 20:47:49', 4, 23, 1290000, 1, 1),
('2023-10-21 03:21:45', '2023-10-21 03:21:45', 4, 51, 1290000, 4, 1);

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
-- Cấu trúc bảng cho bảng `payment_methods`
--

CREATE TABLE `payment_methods` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `namePay` varchar(255) DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `payment_methods`
--

INSERT INTO `payment_methods` (`id`, `created_at`, `updated_at`, `namePay`, `isDeleted`) VALUES
(1, '2023-10-12 02:08:36', '2023-10-12 02:08:36', 'Chuyển khoản', 1),
(2, '2023-10-12 02:08:36', '2023-10-12 02:08:36', 'Trả Sau', 1);

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
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tieude1` varchar(255) NOT NULL,
  `tieude2` varchar(255) NOT NULL,
  `noidung1` varchar(3000) NOT NULL,
  `noidung2` varchar(3000) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `img3` varchar(255) NOT NULL,
  `img4` varchar(255) NOT NULL,
  `img5` varchar(255) NOT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1,
  `postNumber` int(11) NOT NULL,
  `staff_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id`, `created_at`, `updated_at`, `tieude1`, `tieude2`, `noidung1`, `noidung2`, `img1`, `img2`, `img3`, `img4`, `img5`, `isDeleted`, `postNumber`, `staff_id`) VALUES
(1, '2023-10-23 20:57:57', '2023-10-23 20:57:57', 'sản phẩm mới', '', 'Sản phẩm đẹp lắm', 'Sản phẩm 10 đ', '1698119877.png', '1698119877.png', '', '', '', 0, 1, 1),
(2, '2023-10-23 21:01:28', '2023-10-23 21:01:28', 'sản phẩm mới', 'test 2', 'test 1', 'Test 2', '1698120088.png', '1698120088.png', '1698120088.png', '1698120088.png', '1698120088.png', 0, 2, 1),
(3, '2023-10-23 21:54:28', '2023-10-23 21:54:28', 'Treatment Informations', 'Treatment Details', 'Most designers set their type arbitrarily, either by pulling values out of the sky or by adhering to a baseline grid. The former case isn’t worth discussing here, but the latter requires a closer look.', 'As you might have guessed, most designers choose this unit arbitrarily. The problem with this approach is that the resulting baseline grid unit is not directly related to the primary font size, which is the most fundamental design element on the page.', '1698123268.jpg', '1698123268.png', '1698123268.jpg', '1698123268.jpg', '1698123268.jpg', 0, 2, 1),
(4, '2023-10-23 22:02:19', '2023-10-23 22:02:19', 'Treatment Informations', 'Treatment Details', 'Most designers set their type arbitrarily, either by pulling values out of the sky or by adhering to a baseline grid. The former case isn’t worth discussing here, but the latter requires a closer look.', 'As you might have guessed, most designers choose this unit arbitrarily. The problem with this approach is that the resulting baseline grid unit is not directly related to the primary font size, which is the most fundamental design element on the page.', 'dtd6xsOZYk.jpg', 'dtd6xsOZYk.png', 'dtd6xsOZYk.jpg', 'dtd6xsOZYk.jpg', 'dtd6xsOZYk.jpg', 0, 2, 1),
(5, '2023-10-23 22:05:41', '2023-10-23 22:05:41', 'Treatment Informations', 'Treatment Details', 'Most designers set their type arbitrarily, either by pulling values out of the sky or by adhering to a baseline grid. The former case isn’t worth discussing here, but the latter requires a closer look.', 'As you might have guessed, most designers choose this unit arbitrarily. The problem with this approach is that the resulting baseline grid unit is not directly related to the primary font size, which is the most fundamental design element on the page. As it turns out, the golden ratio provides us with a guide—a formula—for prop er typesetting. Because of this, we can now set our type with absolute certainty in any situation! Better still, we can use this information about typography...', 'Ui5PhLASMi.jpg', 'Ui5PhLASMi.png', 'Ui5PhLASMi.jpg', 'Ui5PhLASMi.jpg', 'Ui5PhLASMi.jpg', 0, 2, 1),
(6, '2023-10-23 22:14:30', '2023-10-23 22:14:30', 'Treatment Informations', 'Treatment Details', 'Most designers set their type arbitrarily, either by pulling values out of the sky or by adhering to a baseline grid. The former case isn’t worth discussing here, but the latter requires a closer look.', 'As you might have guessed, most designers choose this unit arbitrarily. The problem with this approach is that the resulting baseline grid unit is not directly related to the primary font size, which is the most fundamental design element on the page.\r\n\r\nInstead of relying on arbitrary selection, wouldn’t it be nice if there were a way to determine the perfect typography settings based on a given context?\r\n\r\nAs it turns out, the golden ratio provides us with a guide—a formula—for prop er typesetting. Because of this, we can now set our type with absolute certainty in any situation! Better still, we can use this information about typography...', '1698124470_img1.jpg', '1698124470_img2.png', '1698124470_img3.jpg', '1698124470_img4.jpg', '1698124470_img5.jpg', 1, 2, 1),
(7, '2023-10-23 22:15:43', '2023-10-23 22:15:43', 'As you might have guessed, most designers choose this unit arbitrarily.', '', 'As you might have guessed, most designers choose this unit arbitrarily. The problem with this approach is that the resulting baseline grid unit is not directly related to the primary font size, which is the most fundamental design element on the page.\r\n\r\nInstead of relying on arbitrary selection, wouldn’t it be nice if there were a way to determine the perfect typography settings based on a given context?\r\n\r\nAs it turns out, the golden ratio provides us with a guide—a formula—for proper typesetting. Because of this, we can now set our type with absolute certainty in any situation! Better still, we can use this information about typography to make more informed decisions about all the spatial aspects of our designs, such as:', 'As you might have guessed, most designers choose this unit arbitrarily. The problem with this approach is that the resulting baseline grid unit is not directly related to the primary font size, which is the most fundamental design element on the page.\r\n\r\nInstead of relying on arbitrary selection, wouldn’t it be nice if there were a way to determine the perfect typography settings based on a given context?\r\n\r\nAs you might have guessed, most designers choose this unit arbitrarily. The problem with this approach is that the resulting baseline grid unit is not directly related to the primary font size, which is the most fundamental design element on the page.', 'AJfvNIq8SI.jpg', 'AJfvNIq8SI.jpg', '', '', '', 0, 1, 1),
(8, '2023-10-23 22:19:17', '2023-10-23 22:19:17', 'As you might have guessed, most designers choose this unit arbitrarily.', '', 'As you might have guessed, most designers choose this unit arbitrarily. The problem with this approach is that the resulting baseline grid unit is not directly related to the primary font size, which is the most fundamental design element on the page.\r\n\r\nInstead of relying on arbitrary selection, wouldn’t it be nice if there were a way to determine the perfect typography settings based on a given context?\r\n\r\nAs it turns out, the golden ratio provides us with a guide—a formula—for proper typesetting. Because of this, we can now set our type with absolute certainty in any situation! Better still, we can use this information about typography to make more informed decisions about all the spatial aspects of our designs, such as:', 'As you might have guessed, most designers choose this unit arbitrarily. The problem with this approach is that the resulting baseline grid unit is not directly related to the primary font size, which is the most fundamental design element on the page.\r\n\r\nInstead of relying on arbitrary selection, wouldn’t it be nice if there were a way to determine the perfect typography settings based on a given context?\r\n\r\nAs you might have guessed, most designers choose this unit arbitrarily. The problem with this approach is that the resulting baseline grid unit is not directly related to the primary font size, which is the most fundamental design element on the page.', '1698124757_img1.jpg', '1698124757_img2.png', '', '', '', 1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `namePro` varchar(255) DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1,
  `staff_id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `created_at`, `updated_at`, `namePro`, `isDeleted`, `staff_id`, `cat_id`) VALUES
(1, '2023-09-25 03:10:18', '2023-09-25 03:10:18', 'iPhone 6 Plus', 1, 1, 1),
(3, '2023-09-25 03:21:04', '2023-09-25 04:19:11', 'iPhone 11', 1, 1, 1),
(4, '2023-09-25 03:56:54', '2023-09-25 03:56:54', 'SamSung Galaxy S22 Utral', 1, 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_detail`
--

CREATE TABLE `product_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `quanity` int(11) NOT NULL,
  `color` varchar(255) DEFAULT NULL,
  `detail` varchar(255) NOT NULL,
  `isSoid` int(11) DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_detail`
--

INSERT INTO `product_detail` (`id`, `created_at`, `updated_at`, `img`, `price`, `quanity`, `color`, `detail`, `isSoid`, `isDeleted`, `product_id`) VALUES
(1, '2023-09-26 20:04:04', '2023-10-24 06:15:02', '1695783844.png', 1290000, 119, 'Đỏ', '121', 2, 1, 1),
(2, '2023-09-26 20:13:25', '2023-10-24 06:15:02', '1695787099.png', 1290000, 110, 'Tím', 'San pham nhu cc', 2, 1, 1),
(3, '2023-10-02 18:07:15', '2023-10-23 01:48:12', '1696295235.png', 1290000, 95, 'Đỏ', 'San Pham qua dep', 2, 1, 3),
(4, '2023-10-02 18:08:16', '2023-10-21 03:21:45', '1696295296.png', 1290000, 0, 'Đỏ', 'san pham dep va chat luong', 0, 1, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quyen_han`
--

CREATE TABLE `quyen_han` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ql_binhluan` int(11) NOT NULL,
  `ql_sanpham` int(11) NOT NULL,
  `ql_donhang` int(11) NOT NULL,
  `ql_lichdattruoc` int(11) NOT NULL,
  `ql_tuyendung` int(11) NOT NULL,
  `ql_khachhang` int(11) NOT NULL,
  `ql_baiviet` int(11) NOT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1,
  `staff_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quyen_han`
--

INSERT INTO `quyen_han` (`id`, `created_at`, `updated_at`, `ql_binhluan`, `ql_sanpham`, `ql_donhang`, `ql_lichdattruoc`, `ql_tuyendung`, `ql_khachhang`, `ql_baiviet`, `isDeleted`, `staff_id`) VALUES
(1, '2023-06-29 03:24:54', '2023-10-24 06:12:17', 0, 0, 0, 0, 0, 0, 0, 1, 1),
(2, '2023-09-13 02:21:50', '2023-09-28 22:08:30', 1, 1, 1, 0, 1, 1, 1, 1, 2),
(3, '2023-09-28 21:54:31', '2023-09-28 22:08:51', 1, 0, 0, 1, 0, 0, 1, 1, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `receiver`
--

CREATE TABLE `receiver` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `sex` int(11) NOT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1,
  `client_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `receiver`
--

INSERT INTO `receiver` (`id`, `created_at`, `updated_at`, `name`, `phone`, `address`, `sex`, `isDeleted`, `client_id`) VALUES
(30, '2023-10-11 20:47:49', '2023-10-11 20:47:49', 'client@gmail.com', '0869737005', 'ccc', 1, 1, 1),
(43, '2023-10-17 14:22:23', '2023-10-17 14:22:23', 'client@gmail.com', '0869737005', 'ccc', 1, 1, 1),
(44, '2023-10-17 14:26:35', '2023-10-17 14:26:35', 'client@gmail.com', '0869737005', 'ccc', 1, 1, 1),
(45, '2023-10-17 20:22:07', '2023-10-17 20:22:07', 'client@gmail.com', '0869737005', 'ccc', 1, 1, 1),
(46, '2023-10-19 01:07:56', '2023-10-19 01:07:56', 'client@gmail.com', '0869737005', 'ccc', 1, 1, 1),
(47, '2023-10-21 02:40:41', '2023-10-21 02:40:41', 'Hoàng Anh Vũ', '0869737007', 'Hà Nội', 1, 1, 2),
(48, '2023-10-21 02:41:10', '2023-10-21 02:41:10', 'Hoàng Anh Vũ', '0869737007', 'Hà Nội', 1, 1, 2),
(49, '2023-10-21 02:42:03', '2023-10-21 02:42:03', 'Hoàng Anh Vũ', '0869737007', 'Hà Nội', 1, 1, 2),
(50, '2023-10-21 02:42:43', '2023-10-21 02:42:43', 'Hoàng Anh Vũ', '0869737007', 'Hà Nội', 1, 1, 2),
(51, '2023-10-21 02:42:49', '2023-10-21 02:42:49', 'Hoàng Anh Vũ', '0869737007', 'Hà Nội', 1, 1, 2),
(52, '2023-10-21 02:47:14', '2023-10-21 02:47:14', 'Hoàng Anh Vũ', '0869737007', 'Hà Nội', 1, 1, 2),
(53, '2023-10-21 02:51:11', '2023-10-21 02:51:11', 'Hoàng Anh Vũ', '0869737007', 'Hà Nội', 1, 1, 2),
(54, '2023-10-21 02:56:50', '2023-10-21 02:56:50', 'Hoàng Anh Vũ', '0869737007', 'Hà Nội', 1, 1, 2),
(55, '2023-10-21 02:57:57', '2023-10-21 02:57:57', 'Hoàng Anh Vũ', '0869737007', 'Hà Nội', 1, 1, 2),
(56, '2023-10-21 02:58:27', '2023-10-21 02:58:27', 'Hoàng Anh Vũ', '0869737007', 'Hà Nội', 1, 1, 2),
(57, '2023-10-21 03:00:29', '2023-10-21 03:00:29', 'Hoàng Anh Vũ', '0869737007', 'Hà Nội', 1, 1, 2),
(58, '2023-10-21 03:21:45', '2023-10-21 03:21:45', 'client@gmail.com', '0869737005', 'ccc', 1, 1, 1),
(59, '2023-10-21 03:24:22', '2023-10-21 03:24:22', 'client@gmail.com', '0869737005', 'ccc', 1, 1, 1),
(60, '2023-10-22 08:57:33', '2023-10-22 08:57:33', 'client@gmail.com', '0869737005', 'ccc', 1, 1, 1),
(61, '2023-10-22 09:09:21', '2023-10-22 09:09:21', 'client@gmail.com', '0869737005', 'ccc', 1, 1, 1),
(62, '2023-10-23 01:48:12', '2023-10-23 01:48:12', 'client@gmail.com', '0869737005', 'ccc', 1, 1, 1),
(63, '2023-10-23 06:31:57', '2023-10-23 06:31:57', 'client@gmail.com', '0869737005', 'ccc', 1, 1, 1),
(64, '2023-10-24 06:15:02', '2023-10-24 06:15:02', 'client@gmail.com', '0869737005', 'ccc', 1, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `staff`
--

CREATE TABLE `staff` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `sex` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `isDeleted` int(11) NOT NULL DEFAULT 1,
  `facilities_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `staff`
--

INSERT INTO `staff` (`id`, `created_at`, `updated_at`, `name`, `email`, `phone`, `password`, `sex`, `address`, `level`, `isDeleted`, `facilities_id`) VALUES
(1, '2023-06-29 03:24:54', '2023-09-28 20:18:49', 'staff@gmail.com', 'staff@gmail.com', '0869737005', '$2y$10$PWnPG.Sz9ptyDFmYS5DYP.umowBxcSRalk6OAA5rChN8R/JLtSIgm', 1, 'hong tien', 2, 1, 1),
(2, '2023-09-13 02:19:19', '2023-09-22 02:19:19', 'Staff co so 2', 'staff2@gmail.com', '123456789', '$2a$12$tGqGiUzFQ5urE2WBfgqa0O8NtHeXEmPYnrND.qsQ8CWgVD3Hu4UnC', 1, 'asgihas', 2, 1, 2),
(3, '2023-09-28 19:16:20', '2023-09-28 20:55:29', 'Hoàng Anh Vũ', 'hoanganhkhonghoc@gmail.com', '0869737006', '$2y$10$dMjegt9o4nM4qHwXhsmLdONLzJ4ZSq6YnaC2TU2SMQlKIXG8c1n8W', 1, 'Hà Nội', 2, 1, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`),
  ADD UNIQUE KEY `admin_phone_unique` (`phone`);

--
-- Chỉ mục cho bảng `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointment_facilities_id_foreign` (`facilities_id`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cart_client_id_unique` (`client_id`);

--
-- Chỉ mục cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD PRIMARY KEY (`cart_id`,`product_detail_id`),
  ADD KEY `cart_detail_product_detail_id_foreign` (`product_detail_id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_staff_id_foreign` (`staff_id`);

--
-- Chỉ mục cho bảng `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `client_email_unique` (`email`),
  ADD UNIQUE KEY `client_phone_unique` (`phone`),
  ADD KEY `client_admin_id_foreign` (`admin_id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_client_id_foreign` (`client_id`),
  ADD KEY `comment_product_detail_id_foreign` (`product_detail_id`);

--
-- Chỉ mục cho bảng `discount_code`
--
ALTER TABLE `discount_code`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discount_code_staff_id_foreign` (`staff_id`);

--
-- Chỉ mục cho bảng `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `facilities_address_unique` (`address`),
  ADD KEY `facilities_admin_id_foreign` (`admin_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `like`
--
ALTER TABLE `like`
  ADD PRIMARY KEY (`id`),
  ADD KEY `like_client_id_foreign` (`client_id`),
  ADD KEY `like_product_detail_id_foreign` (`product_detail_id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `new_staff`
--
ALTER TABLE `new_staff`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_client_id_foreign` (`client_id`),
  ADD KEY `order_receiver_id_foreign` (`receiver_id`),
  ADD KEY `order_pay_id_foreign` (`pay_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`product_id`,`order_id`),
  ADD KEY `order_detail_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `payment_methods`
--
ALTER TABLE `payment_methods`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payment_methods_namepay_unique` (`namePay`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_staff_id_foreign` (`staff_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_namepro_unique` (`namePro`),
  ADD KEY `product_staff_id_foreign` (`staff_id`),
  ADD KEY `product_cat_id_foreign` (`cat_id`);

--
-- Chỉ mục cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_detail_product_id_foreign` (`product_id`);

--
-- Chỉ mục cho bảng `quyen_han`
--
ALTER TABLE `quyen_han`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quyen_han_staff_id_foreign` (`staff_id`);

--
-- Chỉ mục cho bảng `receiver`
--
ALTER TABLE `receiver`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receiver_client_id_foreign` (`client_id`);

--
-- Chỉ mục cho bảng `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staff_email_unique` (`email`),
  ADD UNIQUE KEY `staff_phone_unique` (`phone`),
  ADD KEY `staff_facilities_id_foreign` (`facilities_id`);

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
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `client`
--
ALTER TABLE `client`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `discount_code`
--
ALTER TABLE `discount_code`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `like`
--
ALTER TABLE `like`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `new_staff`
--
ALTER TABLE `new_staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT cho bảng `payment_methods`
--
ALTER TABLE `payment_methods`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `quyen_han`
--
ALTER TABLE `quyen_han`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `receiver`
--
ALTER TABLE `receiver`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `staff`
--
ALTER TABLE `staff`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_facilities_id_foreign` FOREIGN KEY (`facilities_id`) REFERENCES `facilities` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Các ràng buộc cho bảng `cart_detail`
--
ALTER TABLE `cart_detail`
  ADD CONSTRAINT `cart_detail_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`),
  ADD CONSTRAINT `cart_detail_product_detail_id_foreign` FOREIGN KEY (`product_detail_id`) REFERENCES `product_detail` (`id`);

--
-- Các ràng buộc cho bảng `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);

--
-- Các ràng buộc cho bảng `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `client_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `comment_product_detail_id_foreign` FOREIGN KEY (`product_detail_id`) REFERENCES `product_detail` (`id`);

--
-- Các ràng buộc cho bảng `discount_code`
--
ALTER TABLE `discount_code`
  ADD CONSTRAINT `discount_code_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);

--
-- Các ràng buộc cho bảng `facilities`
--
ALTER TABLE `facilities`
  ADD CONSTRAINT `facilities_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`);

--
-- Các ràng buộc cho bảng `like`
--
ALTER TABLE `like`
  ADD CONSTRAINT `like_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `like_product_detail_id_foreign` FOREIGN KEY (`product_detail_id`) REFERENCES `product_detail` (`id`);

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`),
  ADD CONSTRAINT `order_pay_id_foreign` FOREIGN KEY (`pay_id`) REFERENCES `payment_methods` (`id`),
  ADD CONSTRAINT `order_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `receiver` (`id`);

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `order_detail_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product_detail` (`id`);

--
-- Các ràng buộc cho bảng `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_cat_id_foreign` FOREIGN KEY (`cat_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `product_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);

--
-- Các ràng buộc cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `product_detail_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `quyen_han`
--
ALTER TABLE `quyen_han`
  ADD CONSTRAINT `quyen_han_staff_id_foreign` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`);

--
-- Các ràng buộc cho bảng `receiver`
--
ALTER TABLE `receiver`
  ADD CONSTRAINT `receiver_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `client` (`id`);

--
-- Các ràng buộc cho bảng `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_facilities_id_foreign` FOREIGN KEY (`facilities_id`) REFERENCES `facilities` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
