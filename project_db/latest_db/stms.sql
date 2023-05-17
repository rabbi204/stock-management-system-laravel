-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 01:09 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `register_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `full_name`, `email`, `phone`, `address`, `photo`, `nid`, `birth_date`, `register_date`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Md. Rabbi', 'superadmin@example.com', '01729673492', NULL, NULL, NULL, NULL, NULL, '$2y$10$WbZvBLRJtKLObl6DgiA1.OUTG8lgdb20PrdK379OU0dPRgqbYZJHG', '1', '2022-10-03 03:49:51', '2022-10-03 03:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Andersons', 'At velit repellat aut aperiam delectus dicta exercitationem. Ipsam eius voluptatem molestiae tenetur eos qui nihil. Et voluptatem minima asperiores nihil. Aut officiis tempora magni animi aut.', '2022-10-03 03:49:56', '2022-10-03 03:49:56'),
(2, 'LESCO', 'Accusamus blanditiis aut ut delectus temporibus. Excepturi nemo mollitia eum tenetur quis. Odit eum et reprehenderit repudiandae ut cum adipisci.', '2022-10-03 03:49:56', '2022-10-03 03:49:56'),
(3, 'N-P-K Ratio', 'Rerum qui maxime et et. Numquam atque natus illo commodi. Ea praesentium illo repellendus voluptatem ducimus iure dolor.', '2022-10-03 03:49:56', '2022-10-03 03:49:56'),
(4, 'Ammonium Phosphate', 'Rerum inventore voluptatum aut dolorem id. Temporibus qui deleniti odit et perferendis nihil. Id excepturi natus aspernatur odit doloremque consectetur et.', '2022-10-03 03:49:56', '2022-10-03 03:49:56'),
(5, 'Urea', 'Quos ducimus cum nostrum dolores praesentium nam. Enim eos expedita consequatur quo ea in illo. Delectus voluptatem et facere numquam.', '2022-10-03 03:49:56', '2022-10-03 03:49:56'),
(6, 'Potassium Chloride', 'Quasi ea ab qui consequatur qui. Ut labore deserunt fuga eum. Nesciunt provident placeat molestiae vitae voluptas repellat animi. Itaque eaque quibusdam maiores vero nihil dolor in enim.', '2022-10-03 03:49:56', '2022-10-03 03:49:56'),
(7, 'Inert Ingredients', 'Sint totam aut et eius ipsa. Animi recusandae nostrum facilis quis. Minus delectus non aperiam deleniti fuga minima. Repellendus ea perferendis provident dolor voluptas et.', '2022-10-03 03:49:56', '2022-10-03 03:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Fertilizer', 'Pesticides are chemical compounds that are used to kill pests, including insects, rodents, fungi and unwanted plants (weeds)', '2022-10-03 03:49:56', '2022-10-03 03:49:56'),
(2, 'Pesticides', 'A fertiliser is a natural or artificial substance containing chemical elements (such as Nitrogen (N), Phosphorus (P) and Potassium (K)) that improve growth and productiveness of plants.', '2022-10-03 03:49:56', '2022-10-03 03:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `phone`, `address`, `nid`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Md. Rabbi', NULL, '01729673492', NULL, NULL, NULL, '2022-10-03 04:02:21', '2022-10-03 04:02:21');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exp_cat_id` bigint(20) UNSIGNED NOT NULL,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_note` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2018_12_23_120000_create_shoppingcart_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_08_29_045506_create_permission_tables', 1),
(7, '2022_08_29_050309_create_admins_table', 1),
(8, '2022_09_03_093230_create_expense_categories_table', 1),
(9, '2022_09_04_092411_create_expenses_table', 1),
(10, '2022_09_05_042634_create_categories_table', 1),
(11, '2022_09_05_054249_create_sub_categories_table', 1),
(12, '2022_09_05_081905_create_brands_table', 1),
(13, '2022_09_05_091031_create_units_table', 1),
(14, '2022_09_06_044125_create_suppliers_table', 1),
(15, '2022_09_06_101720_create_purchases_table', 1),
(16, '2022_09_10_051956_create_customers_table', 1),
(17, '2022_09_11_083302_create_products_table', 1),
(18, '2022_09_15_105717_create_orders_table', 1),
(19, '2022_09_15_105739_create_order_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `order_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_products` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `order_date`, `order_status`, `total_products`, `sub_total`, `vat`, `total`, `payment_status`, `pay`, `due`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-10-03', 'Done', '20', '1,600.00', '0.00', '1,600.00', 'HandCash', '1,600.00', '0', '2022-10-03 04:05:48', '2022-10-03 04:05:48'),
(3, 1, '2022-10-03', 'Done', '1', '80.00', '0.00', '80.00', 'HandCash', '60.00', '0', '2022-10-03 04:34:08', '2022-10-03 04:34:08'),
(4, 1, '2022-10-03', 'Done', '300', '18,000.00', '0.00', '18,000.00', 'HandCash', '160', '0', '2022-10-03 04:41:52', '2022-10-03 04:41:52'),
(5, 1, '2022-10-03', 'Done', '106', '5,450.00', '0.00', '5,450.00', 'HandCash', '5000', '0', '2022-10-03 04:59:27', '2022-10-03 04:59:27'),
(6, 1, '2022-10-03', 'Done', '10', '300.00', '0.00', '300.00', 'Partially Due', '250', '50', '2022-10-03 05:02:43', '2022-10-03 05:02:43');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`, `total`, `created_at`, `updated_at`) VALUES
(1, 1, 4, '20', '80', '1600', '2022-10-03 04:05:48', '2022-10-03 04:05:48'),
(3, 3, 3, '1', '80', '80', '2022-10-03 04:34:08', '2022-10-03 04:34:08'),
(4, 4, 1, '200', '50', '10000', '2022-10-03 04:41:52', '2022-10-03 04:41:52'),
(5, 4, 2, '100', '80', '8000', '2022-10-03 04:41:52', '2022-10-03 04:41:52'),
(6, 5, 4, '101', '50', '5050', '2022-10-03 04:59:27', '2022-10-03 04:59:27'),
(7, 5, 3, '5', '80', '400', '2022-10-03 04:59:27', '2022-10-03 04:59:27'),
(8, 6, 1, '10', '30', '300', '2022-10-03 05:02:43', '2022-10-03 05:02:43');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 'admin.dashboard', 'admin', 'dashboard', '2022-10-03 03:49:51', '2022-10-03 03:49:51'),
(2, 'admin.list', 'admin', 'admin', '2022-10-03 03:49:51', '2022-10-03 03:49:51'),
(3, 'admin.create', 'admin', 'admin', '2022-10-03 03:49:51', '2022-10-03 03:49:51'),
(4, 'admin.store', 'admin', 'admin', '2022-10-03 03:49:51', '2022-10-03 03:49:51'),
(5, 'admin.edit', 'admin', 'admin', '2022-10-03 03:49:51', '2022-10-03 03:49:51'),
(6, 'admin.update', 'admin', 'admin', '2022-10-03 03:49:51', '2022-10-03 03:49:51'),
(7, 'admin.delete', 'admin', 'admin', '2022-10-03 03:49:51', '2022-10-03 03:49:51'),
(8, 'admin.details', 'admin', 'admin', '2022-10-03 03:49:51', '2022-10-03 03:49:51'),
(9, 'role.list', 'admin', 'role', '2022-10-03 03:49:51', '2022-10-03 03:49:51'),
(10, 'role.create', 'admin', 'role', '2022-10-03 03:49:51', '2022-10-03 03:49:51'),
(11, 'role.store', 'admin', 'role', '2022-10-03 03:49:52', '2022-10-03 03:49:52'),
(12, 'role.edit', 'admin', 'role', '2022-10-03 03:49:52', '2022-10-03 03:49:52'),
(13, 'role.update', 'admin', 'role', '2022-10-03 03:49:52', '2022-10-03 03:49:52'),
(14, 'role.delete', 'admin', 'role', '2022-10-03 03:49:52', '2022-10-03 03:49:52'),
(15, 'expense.category.list', 'admin', 'expense category', '2022-10-03 03:49:52', '2022-10-03 03:49:52'),
(16, 'expense.category.create', 'admin', 'expense category', '2022-10-03 03:49:52', '2022-10-03 03:49:52'),
(17, 'expense.category.store', 'admin', 'expense category', '2022-10-03 03:49:52', '2022-10-03 03:49:52'),
(18, 'expense.category.edit', 'admin', 'expense category', '2022-10-03 03:49:52', '2022-10-03 03:49:52'),
(19, 'expense.category.update', 'admin', 'expense category', '2022-10-03 03:49:52', '2022-10-03 03:49:52'),
(20, 'expense.category.delete', 'admin', 'expense category', '2022-10-03 03:49:52', '2022-10-03 03:49:52'),
(21, 'expense.list', 'admin', 'expense', '2022-10-03 03:49:52', '2022-10-03 03:49:52'),
(22, 'expense.create', 'admin', 'expense', '2022-10-03 03:49:52', '2022-10-03 03:49:52'),
(23, 'expense.store', 'admin', 'expense', '2022-10-03 03:49:52', '2022-10-03 03:49:52'),
(24, 'expense.edit', 'admin', 'expense', '2022-10-03 03:49:52', '2022-10-03 03:49:52'),
(25, 'expense.update', 'admin', 'expense', '2022-10-03 03:49:52', '2022-10-03 03:49:52'),
(26, 'expense.delete', 'admin', 'expense', '2022-10-03 03:49:52', '2022-10-03 03:49:52'),
(27, 'category.list', 'admin', 'category', '2022-10-03 03:49:52', '2022-10-03 03:49:52'),
(28, 'category.create', 'admin', 'category', '2022-10-03 03:49:52', '2022-10-03 03:49:52'),
(29, 'category.store', 'admin', 'category', '2022-10-03 03:49:52', '2022-10-03 03:49:52'),
(30, 'category.edit', 'admin', 'category', '2022-10-03 03:49:52', '2022-10-03 03:49:52'),
(31, 'category.update', 'admin', 'category', '2022-10-03 03:49:52', '2022-10-03 03:49:52'),
(32, 'category.delete', 'admin', 'category', '2022-10-03 03:49:52', '2022-10-03 03:49:52'),
(33, 'sub.category.list', 'admin', 'sub category', '2022-10-03 03:49:52', '2022-10-03 03:49:52'),
(34, 'sub.category.create', 'admin', 'sub category', '2022-10-03 03:49:53', '2022-10-03 03:49:53'),
(35, 'sub.category.store', 'admin', 'sub category', '2022-10-03 03:49:53', '2022-10-03 03:49:53'),
(36, 'sub.category.edit', 'admin', 'sub category', '2022-10-03 03:49:53', '2022-10-03 03:49:53'),
(37, 'sub.category.update', 'admin', 'sub category', '2022-10-03 03:49:53', '2022-10-03 03:49:53'),
(38, 'sub.category.delete', 'admin', 'sub category', '2022-10-03 03:49:53', '2022-10-03 03:49:53'),
(39, 'brand.list', 'admin', 'brand', '2022-10-03 03:49:53', '2022-10-03 03:49:53'),
(40, 'brand.create', 'admin', 'brand', '2022-10-03 03:49:53', '2022-10-03 03:49:53'),
(41, 'brand.store', 'admin', 'brand', '2022-10-03 03:49:53', '2022-10-03 03:49:53'),
(42, 'brand.edit', 'admin', 'brand', '2022-10-03 03:49:53', '2022-10-03 03:49:53'),
(43, 'brand.update', 'admin', 'brand', '2022-10-03 03:49:53', '2022-10-03 03:49:53'),
(44, 'brand.delete', 'admin', 'brand', '2022-10-03 03:49:53', '2022-10-03 03:49:53'),
(45, 'supplier.list', 'admin', 'supplier', '2022-10-03 03:49:53', '2022-10-03 03:49:53'),
(46, 'supplier.create', 'admin', 'supplier', '2022-10-03 03:49:53', '2022-10-03 03:49:53'),
(47, 'supplier.store', 'admin', 'supplier', '2022-10-03 03:49:53', '2022-10-03 03:49:53'),
(48, 'supplier.edit', 'admin', 'supplier', '2022-10-03 03:49:53', '2022-10-03 03:49:53'),
(49, 'supplier.update', 'admin', 'supplier', '2022-10-03 03:49:53', '2022-10-03 03:49:53'),
(50, 'supplier.delete', 'admin', 'supplier', '2022-10-03 03:49:53', '2022-10-03 03:49:53'),
(51, 'unit.list', 'admin', 'unit', '2022-10-03 03:49:53', '2022-10-03 03:49:53'),
(52, 'unit.create', 'admin', 'unit', '2022-10-03 03:49:53', '2022-10-03 03:49:53'),
(53, 'unit.store', 'admin', 'unit', '2022-10-03 03:49:54', '2022-10-03 03:49:54'),
(54, 'unit.edit', 'admin', 'unit', '2022-10-03 03:49:54', '2022-10-03 03:49:54'),
(55, 'unit.update', 'admin', 'unit', '2022-10-03 03:49:54', '2022-10-03 03:49:54'),
(56, 'unit.delete', 'admin', 'unit', '2022-10-03 03:49:54', '2022-10-03 03:49:54'),
(57, 'purchase.list', 'admin', 'purchase', '2022-10-03 03:49:54', '2022-10-03 03:49:54'),
(58, 'purchase.create', 'admin', 'purchase', '2022-10-03 03:49:54', '2022-10-03 03:49:54'),
(59, 'purchase.store', 'admin', 'purchase', '2022-10-03 03:49:54', '2022-10-03 03:49:54'),
(60, 'purchase.edit', 'admin', 'purchase', '2022-10-03 03:49:54', '2022-10-03 03:49:54'),
(61, 'purchase.update', 'admin', 'purchase', '2022-10-03 03:49:54', '2022-10-03 03:49:54'),
(62, 'purchase.delete', 'admin', 'purchase', '2022-10-03 03:49:54', '2022-10-03 03:49:54'),
(63, 'purchase.details', 'admin', 'purchase', '2022-10-03 03:49:54', '2022-10-03 03:49:54'),
(64, 'customer.list', 'admin', 'customer', '2022-10-03 03:49:54', '2022-10-03 03:49:54'),
(65, 'customer.create', 'admin', 'customer', '2022-10-03 03:49:54', '2022-10-03 03:49:54'),
(66, 'customer.store', 'admin', 'customer', '2022-10-03 03:49:54', '2022-10-03 03:49:54'),
(67, 'customer.edit', 'admin', 'customer', '2022-10-03 03:49:54', '2022-10-03 03:49:54'),
(68, 'customer.update', 'admin', 'customer', '2022-10-03 03:49:55', '2022-10-03 03:49:55'),
(69, 'customer.delete', 'admin', 'customer', '2022-10-03 03:49:55', '2022-10-03 03:49:55'),
(70, 'customer.details', 'admin', 'customer', '2022-10-03 03:49:55', '2022-10-03 03:49:55'),
(71, 'product.list', 'admin', 'product', '2022-10-03 03:49:55', '2022-10-03 03:49:55'),
(72, 'product.create', 'admin', 'product', '2022-10-03 03:49:55', '2022-10-03 03:49:55'),
(73, 'product.store', 'admin', 'product', '2022-10-03 03:49:55', '2022-10-03 03:49:55'),
(74, 'product.edit', 'admin', 'product', '2022-10-03 03:49:55', '2022-10-03 03:49:55'),
(75, 'product.update', 'admin', 'product', '2022-10-03 03:49:55', '2022-10-03 03:49:55'),
(76, 'product.delete', 'admin', 'product', '2022-10-03 03:49:55', '2022-10-03 03:49:55'),
(77, 'product.details', 'admin', 'product', '2022-10-03 03:49:55', '2022-10-03 03:49:55'),
(78, 'sales.list', 'admin', 'sales', '2022-10-03 03:49:55', '2022-10-03 03:49:55'),
(79, 'sales.details', 'admin', 'sales', '2022-10-03 03:49:55', '2022-10-03 03:49:55'),
(80, 'sales.delete', 'admin', 'sales', '2022-10-03 03:49:55', '2022-10-03 03:49:55'),
(81, 'product.stock.list', 'admin', 'stock', '2022-10-03 03:49:55', '2022-10-03 03:49:55'),
(82, 'product.stock.add', 'admin', 'stock', '2022-10-03 03:49:56', '2022-10-03 03:49:56'),
(83, 'product.stock.update', 'admin', 'stock', '2022-10-03 03:49:56', '2022-10-03 03:49:56'),
(84, 'sales.report', 'admin', 'report', '2022-10-03 03:49:56', '2022-10-03 03:49:56'),
(85, 'purchase.report', 'admin', 'report', '2022-10-03 03:49:56', '2022-10-03 03:49:56'),
(86, 'due.report', 'admin', 'report', '2022-10-03 03:49:56', '2022-10-03 03:49:56'),
(87, 'expense.report', 'admin', 'report', '2022-10-03 03:49:56', '2022-10-03 03:49:56'),
(88, 'stock.report', 'admin', 'report', '2022-10-03 03:49:56', '2022-10-03 03:49:56'),
(89, 'system.settings', 'admin', 'settings', '2022-10-03 03:49:56', '2022-10-03 03:49:56');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_packet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `sub_category_id`, `brand_id`, `supplier_id`, `product_name`, `unit_type`, `product_quantity`, `product_weight`, `number_of_packet`, `total_quantity`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 7, 1, 'Acephate', 'Box', '50', '20', '12', '390', '2022-10-03 03:55:52', '2022-10-03 03:55:52'),
(2, 2, 2, 2, 2, 'DDT', 'Box', '30', '30', '12', '260', '2022-10-03 03:56:58', '2022-10-03 03:56:58'),
(3, 1, 4, 1, 2, 'single superphosphate', 'Bag', '50', '50', '1', '2444', '2022-10-03 03:59:41', '2022-10-03 04:00:50'),
(4, 1, 4, 4, 5, 'triple superphosphate (TSP)', 'Bag', '30', '50', '1', '1379', '2022-10-03 04:01:50', '2022-10-03 04:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `purchase_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_weight` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_packet` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'admin', '2022-10-03 03:49:51', '2022-10-03 03:49:51');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 'Insecticides', '', '2022-10-03 03:53:21', '2022-10-03 03:53:21'),
(2, 2, 'Herbicides', '', '2022-10-03 03:53:40', '2022-10-03 03:53:40'),
(3, 1, 'Nitrogenous Fertilizers', '', '2022-10-03 03:54:15', '2022-10-03 03:54:15'),
(4, 1, 'Phosphate Fertilizers', '', '2022-10-03 03:54:30', '2022-10-03 03:54:30'),
(5, 1, 'Potassic Fertilizers', '', '2022-10-03 03:54:45', '2022-10-03 03:54:45');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Miss Cleora Ledner', 'tauer@example.com', '302-770-9884', '5817 Heidenreich Garden\nMuellerborough, ID 64284', '2022-10-03 03:49:56', '2022-10-03 03:49:56'),
(2, 'Vita Runolfsson', 'wehner.louvenia@example.net', '+1-682-851-5484', '5343 Tamia Garden\nMillershire, OK 18015-2181', '2022-10-03 03:49:56', '2022-10-03 03:49:56'),
(3, 'Ramona Bednar', 'vena.tremblay@example.net', '959.940.2053', '868 O\'Conner Flat\nEast Madge, NV 47086', '2022-10-03 03:49:56', '2022-10-03 03:49:56'),
(4, 'Ms. Polly Kozey III', 'unader@example.net', '817-831-4125', '9864 Berry Street\nWest Liliana, NC 29172-7586', '2022-10-03 03:49:56', '2022-10-03 03:49:56'),
(5, 'Margarita Murray', 'muller.chaim@example.net', '(445) 596-0837', '77100 Joshuah Burgs Apt. 174\nNew Vicente, RI 56917-1138', '2022-10-03 03:49:56', '2022-10-03 03:49:56'),
(6, 'Arlie Roberts III', 'judah.okeefe@example.com', '574.827.4549', '48751 Henri Cliffs Suite 899\nAshtynstad, NE 47612', '2022-10-03 03:49:56', '2022-10-03 03:49:56'),
(7, 'Jennyfer Witting', 'lynch.cleve@example.net', '803-890-9679', '9590 Elza Vista Suite 718\nWest Dorrisfurt, ND 18159-1235', '2022-10-03 03:49:56', '2022-10-03 03:49:56'),
(8, 'Ms. Lizzie Wiegand', 'catalina.padberg@example.com', '(463) 554-0403', '62885 Eileen Terrace Apt. 221\nNorth Antonioshire, MA 97548', '2022-10-03 03:49:56', '2022-10-03 03:49:56'),
(9, 'Raven Franecki', 'ygislason@example.com', '817.244.5462', '934 Tatyana Mount Suite 393\nPort Percy, UT 16897', '2022-10-03 03:49:56', '2022-10-03 03:49:56'),
(10, 'Emerald Hickle', 'quitzon.brown@example.com', '678.261.4740', '7344 Heller Canyon Apt. 403\nWest Marquisburgh, WY 27419-7918', '2022-10-03 03:49:56', '2022-10-03 03:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unit_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_short_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit_value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit_name`, `unit_short_name`, `unit_value`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Bag', 'Bag', '50', '50 kg = 1 bag', '2022-10-03 03:49:56', '2022-10-03 03:49:56'),
(2, 'Box', 'Box', '12', '12 packet = 1 box', '2022-10-03 03:49:56', '2022-10-03 03:49:56'),
(3, 'Pieces', 'Pieces', '1', '1 pieces', '2022-10-03 03:49:56', '2022-10-03 03:49:56');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brands_name_unique` (`name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_phone_unique` (`phone`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `expenses_reference_no_unique` (`reference_no`),
  ADD KEY `expenses_exp_cat_id_foreign` (`exp_cat_id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
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
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_order_id_foreign` (`order_id`),
  ADD KEY `order_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

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
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`),
  ADD KEY `products_supplier_id_foreign` (`supplier_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `purchases_reference_no_unique` (`reference_no`),
  ADD KEY `purchases_supplier_id_foreign` (`supplier_id`),
  ADD KEY `purchases_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`identifier`,`instance`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_categories_name_unique` (`name`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `suppliers_email_unique` (`email`),
  ADD UNIQUE KEY `suppliers_phone_unique` (`phone`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `units_unit_name_unique` (`unit_name`),
  ADD UNIQUE KEY `units_unit_short_name_unique` (`unit_short_name`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_exp_cat_id_foreign` FOREIGN KEY (`exp_cat_id`) REFERENCES `expense_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `purchases`
--
ALTER TABLE `purchases`
  ADD CONSTRAINT `purchases_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `purchases_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
