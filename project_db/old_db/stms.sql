-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2022 at 01:44 PM
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
(1, 'Md. Rabbi', 'superadmin@example.com', '01729673492', NULL, NULL, NULL, NULL, NULL, '$2y$10$H0i3erM89dfu9HjBuOfrueerK77E8.Qi0i.EOhLYSJ95C5RTRN/Ty', '1', '2022-09-15 01:04:16', '2022-09-15 01:04:16'),
(2, 'Mr. Manager', 'manager@example.com', '01329673492', 'Khulna, Bangladesh', NULL, '124569872', '10/12/2000', '10/11/2022', '$2y$10$E/Z9ZDlgok37adyJjbgJPOyh1VJdXFONutSLTRXhO0wjRF4v4gWk.', '1', '2022-10-01 04:43:22', '2022-10-01 04:43:22');

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
(1, 'Andersons', 'Quia et aut placeat. Perferendis vel laudantium quia nihil et. Quam eius autem non inventore qui mollitia pariatur soluta. Eum natus natus veritatis libero.', '2022-09-15 01:04:18', '2022-09-15 01:04:18'),
(2, 'LESCO', 'Laborum neque esse maiores. Culpa quasi eum repellendus modi quidem nobis. Corrupti dolorem culpa quo enim quis adipisci. Recusandae corporis ut saepe vel adipisci soluta.', '2022-09-15 01:04:18', '2022-09-15 01:04:18'),
(3, 'N-P-K Ratio', 'Molestias non mollitia amet. Libero modi aut rerum natus perferendis. Consequatur facere eum nobis voluptatem. Aut rem iste adipisci dolor. Id doloribus doloribus assumenda est voluptatibus qui.', '2022-09-15 01:04:18', '2022-09-15 01:04:18'),
(4, 'Ammonium Phosphate', 'Dolor accusamus fugit unde quos necessitatibus quisquam. Ipsum accusamus et aut necessitatibus eos velit. Et ducimus enim similique id occaecati. Beatae quis sunt repellendus molestiae dolor.', '2022-09-15 01:04:18', '2022-09-15 01:04:18'),
(5, 'Urea', 'Repellat dolor laboriosam dolor veritatis a ipsum. In odio debitis est sapiente. Illo asperiores illo architecto sint.', '2022-09-15 01:04:18', '2022-09-15 01:04:18'),
(6, 'Potassium Chloride', 'Voluptas eum praesentium quidem qui. Provident odit nesciunt blanditiis doloremque nemo. Dolores voluptatem animi est dolores. Praesentium nihil sapiente suscipit quaerat.', '2022-09-15 01:04:18', '2022-09-15 01:04:18'),
(7, 'Inert Ingredients', 'Dignissimos dignissimos dolore tempora aut aut eius esse. Tenetur rem quidem nemo dolore error voluptas et. Autem quae aperiam voluptatem praesentium sed.', '2022-09-15 01:04:18', '2022-09-15 01:04:18');

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
(1, 'Pesticides', '', '2022-09-15 01:08:55', '2022-09-15 01:08:55'),
(2, 'Fertilizer', '', '2022-09-15 01:09:11', '2022-09-15 01:09:11');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, 'Md. Rabbi', 'rabbi@gmail.com', '01729673492', 'dhaka', '1512167964', NULL, '2022-09-15 03:35:30', '2022-09-15 03:35:30'),
(2, 'zia', 'zia@gmail.com', '01910597276', 'kolakopa', '1512167946', NULL, '2022-09-15 03:48:45', '2022-09-15 03:48:45');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exp_cat_id` tinyint(4) NOT NULL,
  `reference_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_note` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attachment` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `expense_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `exp_cat_id`, `reference_no`, `expense_title`, `amount`, `expense_note`, `attachment`, `expense_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ref101', 'Employee salary', '50000', '<p>dddddd test kkk&nbsp;</p>', NULL, '09/19/2022', '2022-09-29 00:36:12', '2022-09-29 00:36:12'),
(2, 2, 'Ref102', 'others dddds', '10000', '<p>rrrrr hgfdd khfgtt khdf</p>', NULL, '09/13/2022', '2022-09-29 00:38:02', '2022-09-29 00:38:02');

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

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Salary', '2022-09-29 00:30:51', '2022-09-29 00:30:51'),
(2, 'Others', '2022-09-29 00:31:05', '2022-09-29 00:31:05'),
(3, 'Accesories', '2022-09-29 00:31:28', '2022-09-29 00:31:28');

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
(121, '2014_10_12_000000_create_users_table', 1),
(122, '2014_10_12_100000_create_password_resets_table', 1),
(123, '2019_08_19_000000_create_failed_jobs_table', 1),
(124, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(126, '2022_08_29_050309_create_admins_table', 1),
(127, '2022_09_03_093230_create_expense_categories_table', 1),
(128, '2022_09_04_092411_create_expenses_table', 1),
(129, '2022_09_05_042634_create_categories_table', 1),
(130, '2022_09_05_054249_create_sub_categories_table', 1),
(131, '2022_09_05_081905_create_brands_table', 1),
(132, '2022_09_05_091031_create_units_table', 1),
(133, '2022_09_06_044125_create_suppliers_table', 1),
(134, '2022_09_06_101720_create_purchases_table', 1),
(135, '2022_09_10_051956_create_customers_table', 1),
(136, '2022_09_11_083302_create_products_table', 2),
(137, '2018_12_23_120000_create_shoppingcart_table', 3),
(142, '2022_09_15_105717_create_orders_table', 4),
(143, '2022_09_15_105739_create_order_details_table', 4),
(147, '2022_08_29_045506_create_permission_tables', 5);

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
(1, 'App\\Models\\Admin', 1),
(2, 'App\\Models\\Admin', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
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
(1, 2, '09/15/2022', 'Done', '50', '5,000.00', '1,050.00', '6,050.00', 'HandCash', '6000', '50', NULL, NULL),
(2, 1, '09/17/2022', 'Done', '50', '5,000.00', '1,050.00', '6,050.00', 'HandCash', '6000', '50', NULL, NULL),
(3, 1, '09/10/2022', 'Done', '5', '500.00', '105.00', '605.00', 'HandCash', '600', '5', NULL, NULL),
(4, 1, '09/25/2022', 'Done', '5', '900.00', '0.00', '900.00', 'HandCash', '800', '100', NULL, NULL),
(5, 2, '09/29/2022', 'Done', '15', '1,500.00', '0.00', '1,500.00', 'HandCash', '1500', '0', NULL, NULL),
(6, 2, '09/29/2022', 'Done', '55', '3,575.00', '0.00', '3,575.00', 'HandCash', '3500', '75', NULL, NULL),
(7, 1, '10/01/2022', 'Done', '3', '190.00', '0.00', '190.00', 'HandCash', '180', '10', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
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
(1, 1, 3, '50', '100', '6050', NULL, NULL),
(2, 2, 3, '50', '100', '6050', NULL, NULL),
(3, 3, 3, '5', '100', '605', NULL, NULL),
(4, 4, 3, '5', '180', '900', NULL, NULL),
(5, 5, 1, '15', '100', '1500', NULL, NULL),
(6, 6, 2, '55', '65', '3575', NULL, NULL),
(7, 7, 3, '1', '100', '100', NULL, NULL),
(8, 7, 2, '1', '50', '50', NULL, NULL),
(9, 7, 1, '1', '40', '40', NULL, NULL);

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
(1, 'admin.dashboard', 'admin', 'dashboard', '2022-09-30 23:11:18', '2022-09-30 23:11:18'),
(2, 'admin.list', 'admin', 'admin', '2022-09-30 23:11:18', '2022-09-30 23:11:18'),
(3, 'admin.create', 'admin', 'admin', '2022-09-30 23:11:18', '2022-09-30 23:11:18'),
(4, 'admin.store', 'admin', 'admin', '2022-09-30 23:11:18', '2022-09-30 23:11:18'),
(5, 'admin.edit', 'admin', 'admin', '2022-09-30 23:11:18', '2022-09-30 23:11:18'),
(6, 'admin.update', 'admin', 'admin', '2022-09-30 23:11:18', '2022-09-30 23:11:18'),
(7, 'admin.delete', 'admin', 'admin', '2022-09-30 23:11:18', '2022-09-30 23:11:18'),
(8, 'admin.details', 'admin', 'admin', '2022-09-30 23:11:18', '2022-09-30 23:11:18'),
(9, 'role.list', 'admin', 'role', '2022-09-30 23:11:18', '2022-09-30 23:11:18'),
(10, 'role.create', 'admin', 'role', '2022-09-30 23:11:18', '2022-09-30 23:11:18'),
(11, 'role.store', 'admin', 'role', '2022-09-30 23:11:18', '2022-09-30 23:11:18'),
(12, 'role.edit', 'admin', 'role', '2022-09-30 23:11:18', '2022-09-30 23:11:18'),
(13, 'role.update', 'admin', 'role', '2022-09-30 23:11:18', '2022-09-30 23:11:18'),
(14, 'role.delete', 'admin', 'role', '2022-09-30 23:11:18', '2022-09-30 23:11:18'),
(15, 'expense.category.list', 'admin', 'expense category', '2022-09-30 23:11:18', '2022-09-30 23:11:18'),
(16, 'expense.category.create', 'admin', 'expense category', '2022-09-30 23:11:18', '2022-09-30 23:11:18'),
(17, 'expense.category.store', 'admin', 'expense category', '2022-09-30 23:11:18', '2022-09-30 23:11:18'),
(18, 'expense.category.edit', 'admin', 'expense category', '2022-09-30 23:11:18', '2022-09-30 23:11:18'),
(19, 'expense.category.update', 'admin', 'expense category', '2022-09-30 23:11:18', '2022-09-30 23:11:18'),
(20, 'expense.category.delete', 'admin', 'expense category', '2022-09-30 23:11:18', '2022-09-30 23:11:18'),
(21, 'expense.list', 'admin', 'expense', '2022-09-30 23:11:19', '2022-09-30 23:11:19'),
(22, 'expense.create', 'admin', 'expense', '2022-09-30 23:11:19', '2022-09-30 23:11:19'),
(23, 'expense.store', 'admin', 'expense', '2022-09-30 23:11:19', '2022-09-30 23:11:19'),
(24, 'expense.edit', 'admin', 'expense', '2022-09-30 23:11:19', '2022-09-30 23:11:19'),
(25, 'expense.update', 'admin', 'expense', '2022-09-30 23:11:19', '2022-09-30 23:11:19'),
(26, 'expense.delete', 'admin', 'expense', '2022-09-30 23:11:19', '2022-09-30 23:11:19'),
(27, 'category.list', 'admin', 'category', '2022-09-30 23:11:19', '2022-09-30 23:11:19'),
(28, 'category.create', 'admin', 'category', '2022-09-30 23:11:19', '2022-09-30 23:11:19'),
(29, 'category.store', 'admin', 'category', '2022-09-30 23:11:19', '2022-09-30 23:11:19'),
(30, 'category.edit', 'admin', 'category', '2022-09-30 23:11:19', '2022-09-30 23:11:19'),
(31, 'category.update', 'admin', 'category', '2022-09-30 23:11:19', '2022-09-30 23:11:19'),
(32, 'category.delete', 'admin', 'category', '2022-09-30 23:11:19', '2022-09-30 23:11:19'),
(33, 'sub.category.list', 'admin', 'sub category', '2022-09-30 23:11:19', '2022-09-30 23:11:19'),
(34, 'sub.category.create', 'admin', 'sub category', '2022-09-30 23:11:19', '2022-09-30 23:11:19'),
(35, 'sub.category.store', 'admin', 'sub category', '2022-09-30 23:11:19', '2022-09-30 23:11:19'),
(36, 'sub.category.edit', 'admin', 'sub category', '2022-09-30 23:11:19', '2022-09-30 23:11:19'),
(37, 'sub.category.update', 'admin', 'sub category', '2022-09-30 23:11:19', '2022-09-30 23:11:19'),
(38, 'sub.category.delete', 'admin', 'sub category', '2022-09-30 23:11:19', '2022-09-30 23:11:19'),
(39, 'brand.list', 'admin', 'brand', '2022-09-30 23:11:19', '2022-09-30 23:11:19'),
(40, 'brand.create', 'admin', 'brand', '2022-09-30 23:11:19', '2022-09-30 23:11:19'),
(41, 'brand.store', 'admin', 'brand', '2022-09-30 23:11:19', '2022-09-30 23:11:19'),
(42, 'brand.edit', 'admin', 'brand', '2022-09-30 23:11:19', '2022-09-30 23:11:19'),
(43, 'brand.update', 'admin', 'brand', '2022-09-30 23:11:20', '2022-09-30 23:11:20'),
(44, 'brand.delete', 'admin', 'brand', '2022-09-30 23:11:20', '2022-09-30 23:11:20'),
(45, 'supplier.list', 'admin', 'supplier', '2022-09-30 23:11:20', '2022-09-30 23:11:20'),
(46, 'supplier.create', 'admin', 'supplier', '2022-09-30 23:11:20', '2022-09-30 23:11:20'),
(47, 'supplier.store', 'admin', 'supplier', '2022-09-30 23:11:20', '2022-09-30 23:11:20'),
(48, 'supplier.edit', 'admin', 'supplier', '2022-09-30 23:11:20', '2022-09-30 23:11:20'),
(49, 'supplier.update', 'admin', 'supplier', '2022-09-30 23:11:20', '2022-09-30 23:11:20'),
(50, 'supplier.delete', 'admin', 'supplier', '2022-09-30 23:11:20', '2022-09-30 23:11:20'),
(51, 'unit.list', 'admin', 'unit', '2022-09-30 23:11:20', '2022-09-30 23:11:20'),
(52, 'unit.create', 'admin', 'unit', '2022-09-30 23:11:20', '2022-09-30 23:11:20'),
(53, 'unit.store', 'admin', 'unit', '2022-09-30 23:11:20', '2022-09-30 23:11:20'),
(54, 'unit.edit', 'admin', 'unit', '2022-09-30 23:11:20', '2022-09-30 23:11:20'),
(55, 'unit.update', 'admin', 'unit', '2022-09-30 23:11:20', '2022-09-30 23:11:20'),
(56, 'unit.delete', 'admin', 'unit', '2022-09-30 23:11:20', '2022-09-30 23:11:20'),
(57, 'purchase.list', 'admin', 'purchase', '2022-09-30 23:11:20', '2022-09-30 23:11:20'),
(58, 'purchase.create', 'admin', 'purchase', '2022-09-30 23:11:20', '2022-09-30 23:11:20'),
(59, 'purchase.store', 'admin', 'purchase', '2022-09-30 23:11:20', '2022-09-30 23:11:20'),
(60, 'purchase.edit', 'admin', 'purchase', '2022-09-30 23:11:20', '2022-09-30 23:11:20'),
(61, 'purchase.update', 'admin', 'purchase', '2022-09-30 23:11:21', '2022-09-30 23:11:21'),
(62, 'purchase.delete', 'admin', 'purchase', '2022-09-30 23:11:21', '2022-09-30 23:11:21'),
(63, 'purchase.details', 'admin', 'purchase', '2022-09-30 23:11:21', '2022-09-30 23:11:21'),
(64, 'customer.list', 'admin', 'customer', '2022-09-30 23:11:21', '2022-09-30 23:11:21'),
(65, 'customer.create', 'admin', 'customer', '2022-09-30 23:11:21', '2022-09-30 23:11:21'),
(66, 'customer.store', 'admin', 'customer', '2022-09-30 23:11:21', '2022-09-30 23:11:21'),
(67, 'customer.edit', 'admin', 'customer', '2022-09-30 23:11:21', '2022-09-30 23:11:21'),
(68, 'customer.update', 'admin', 'customer', '2022-09-30 23:11:21', '2022-09-30 23:11:21'),
(69, 'customer.delete', 'admin', 'customer', '2022-09-30 23:11:21', '2022-09-30 23:11:21'),
(70, 'customer.details', 'admin', 'customer', '2022-09-30 23:11:21', '2022-09-30 23:11:21'),
(71, 'product.list', 'admin', 'product', '2022-09-30 23:11:21', '2022-09-30 23:11:21'),
(72, 'product.create', 'admin', 'product', '2022-09-30 23:11:21', '2022-09-30 23:11:21'),
(73, 'product.store', 'admin', 'product', '2022-09-30 23:11:21', '2022-09-30 23:11:21'),
(74, 'product.edit', 'admin', 'product', '2022-09-30 23:11:21', '2022-09-30 23:11:21'),
(75, 'product.update', 'admin', 'product', '2022-09-30 23:11:21', '2022-09-30 23:11:21'),
(76, 'product.delete', 'admin', 'product', '2022-09-30 23:11:22', '2022-09-30 23:11:22'),
(77, 'product.details', 'admin', 'product', '2022-09-30 23:11:22', '2022-09-30 23:11:22'),
(78, 'sales.list', 'admin', 'sales', '2022-09-30 23:11:22', '2022-09-30 23:11:22'),
(79, 'sales.details', 'admin', 'sales', '2022-09-30 23:11:22', '2022-09-30 23:11:22'),
(80, 'sales.delete', 'admin', 'sales', '2022-09-30 23:11:22', '2022-09-30 23:11:22'),
(81, 'product.stock.list', 'admin', 'stock', '2022-09-30 23:11:22', '2022-09-30 23:11:22'),
(82, 'product.stock.add', 'admin', 'stock', '2022-09-30 23:11:22', '2022-09-30 23:11:22'),
(83, 'product.stock.update', 'admin', 'stock', '2022-09-30 23:11:22', '2022-09-30 23:11:22'),
(84, 'sales.report', 'admin', 'report', '2022-09-30 23:11:22', '2022-09-30 23:11:22'),
(85, 'purchase.report', 'admin', 'report', '2022-09-30 23:11:22', '2022-09-30 23:11:22'),
(86, 'due.report', 'admin', 'report', '2022-09-30 23:11:22', '2022-09-30 23:11:22'),
(87, 'expense.report', 'admin', 'report', '2022-09-30 23:11:22', '2022-09-30 23:11:22'),
(88, 'stock.report', 'admin', 'report', '2022-09-30 23:11:23', '2022-09-30 23:11:23'),
(89, 'system.settings', 'admin', 'settings', '2022-09-30 23:11:23', '2022-09-30 23:11:23');

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
(1, 2, 12, 1, 1, 'product1', 'Pieces', '5', '50', '1', '9', '2022-09-15 01:27:34', '2022-09-18 04:24:34'),
(2, 1, 11, 3, 8, 'product2', 'Box', '5', '100', '12', '504', '2022-09-15 01:28:16', '2022-09-29 05:45:29'),
(3, 2, 2, 5, 9, 'product3', 'Bag', '-40', '25', '1', '5', '2022-09-15 01:29:19', '2022-09-20 23:08:20');

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

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `reference_no`, `purchase_date`, `product_name`, `unit_type`, `product_quantity`, `product_weight`, `number_of_packet`, `total_quantity`, `supplier_id`, `brand_id`, `created_at`, `updated_at`) VALUES
(3, 'PU101', '09/13/2022', 'potasium', 'Bag', '100', '1000', '1', '100', 6, 4, '2022-09-29 00:27:41', '2022-09-29 00:27:41'),
(4, 'PU102', '09/21/2022', 'Kitnashok', 'Box', '12', '150', '12', '144', 3, 6, '2022-09-29 00:28:53', '2022-09-29 00:28:53');

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
(1, 'SuperAdmin', 'admin', '2022-09-30 23:11:18', '2022-09-30 23:11:18'),
(2, 'Manager', 'admin', '2022-10-01 04:39:39', '2022-10-01 04:39:39');

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
(1, 2),
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
(15, 2),
(16, 1),
(16, 2),
(17, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 2),
(20, 1),
(21, 1),
(21, 2),
(22, 1),
(22, 2),
(23, 1),
(23, 2),
(24, 1),
(24, 2),
(25, 1),
(25, 2),
(26, 1),
(27, 1),
(27, 2),
(28, 1),
(28, 2),
(29, 1),
(29, 2),
(30, 1),
(30, 2),
(31, 1),
(31, 2),
(32, 1),
(33, 1),
(33, 2),
(34, 1),
(34, 2),
(35, 1),
(35, 2),
(36, 1),
(36, 2),
(37, 1),
(37, 2),
(38, 1),
(39, 1),
(39, 2),
(40, 1),
(40, 2),
(41, 1),
(41, 2),
(42, 1),
(42, 2),
(43, 1),
(43, 2),
(44, 1),
(45, 1),
(45, 2),
(46, 1),
(46, 2),
(47, 1),
(47, 2),
(48, 1),
(48, 2),
(49, 1),
(49, 2),
(50, 1),
(51, 1),
(51, 2),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(57, 2),
(58, 1),
(58, 2),
(59, 1),
(59, 2),
(60, 1),
(60, 2),
(61, 1),
(61, 2),
(62, 1),
(63, 1),
(63, 2),
(64, 1),
(64, 2),
(65, 1),
(65, 2),
(66, 1),
(66, 2),
(67, 1),
(67, 2),
(68, 1),
(68, 2),
(69, 1),
(70, 1),
(70, 2),
(71, 1),
(71, 2),
(72, 1),
(72, 2),
(73, 1),
(73, 2),
(74, 1),
(74, 2),
(75, 1),
(75, 2),
(76, 1),
(77, 1),
(77, 2),
(78, 1),
(78, 2),
(79, 1),
(79, 2),
(80, 1),
(81, 1),
(81, 2),
(82, 1),
(82, 2),
(83, 1),
(83, 2),
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
  `category_id` tinyint(4) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 'Nitrogen', '', '2022-09-15 01:09:56', '2022-09-15 01:09:56'),
(2, 2, 'Phosphorus', '', '2022-09-15 01:10:07', '2022-09-15 01:10:07'),
(3, 2, 'Potassium', '', '2022-09-15 01:10:17', '2022-09-15 01:10:17'),
(4, 2, 'Urea', '', '2022-09-15 01:10:28', '2022-09-15 01:10:28'),
(5, 2, 'Phosphate', '', '2022-09-15 01:10:38', '2022-09-15 01:10:38'),
(6, 2, 'Glyphosate', '', '2022-09-15 01:10:50', '2022-09-15 01:10:50'),
(7, 1, 'Malathion', '', '2022-09-15 01:11:05', '2022-09-15 01:11:05'),
(8, 1, 'DDT', '', '2022-09-15 01:11:15', '2022-09-15 01:11:15'),
(9, 1, 'Dursban', '', '2022-09-15 01:11:25', '2022-09-15 01:11:25'),
(10, 1, 'Diazinon', '', '2022-09-15 01:11:40', '2022-09-15 01:11:40'),
(11, 1, 'Boric Acid', '', '2022-09-15 01:11:49', '2022-09-15 01:11:49'),
(12, 1, 'Metaldehyde', '', '2022-09-15 01:12:00', '2022-09-15 01:12:00');

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
(1, 'Yadira Heaney', 'kshlerin.johanna@example.com', '469.357.9326', '532 Lynch Trail\nSouth Rodrigo, AK 81620', '2022-09-15 01:04:18', '2022-09-15 01:04:18'),
(2, 'Prof. Elyssa Champlin PhD', 'elemke@example.net', '903.655.9666', '32543 Prohaska Valleys\nDavinview, NY 30193', '2022-09-15 01:04:18', '2022-09-15 01:04:18'),
(3, 'Francisca Parker III', 'jgreen@example.net', '341-887-0905', '37252 Stevie Mill\nLoniestad, AR 82088', '2022-09-15 01:04:18', '2022-09-15 01:04:18'),
(4, 'Madaline Rolfson', 'hal61@example.net', '714-652-2393', '5168 Heaney Lodge\nSouth Jaydonside, DE 38399-7681', '2022-09-15 01:04:18', '2022-09-15 01:04:18'),
(5, 'Christopher Shields', 'zframi@example.com', '+1 (816) 746-1588', '81042 Conroy Mills\nLake Kale, OK 36645-5277', '2022-09-15 01:04:18', '2022-09-15 01:04:18'),
(6, 'Miss Earlene Von PhD', 'bklocko@example.net', '602-260-1192', '6801 Keith Path\nEast Maddisonstad, IN 34468', '2022-09-15 01:04:18', '2022-09-15 01:04:18'),
(7, 'Prof. Karianne Kirlin', 'madie.graham@example.net', '+18282161337', '259 Miller Rapids Suite 686\nRogahnmouth, SC 11091-9950', '2022-09-15 01:04:18', '2022-09-15 01:04:18'),
(8, 'Cynthia Schiller IV', 'chand@example.com', '1-347-864-4544', '705 Dino Ville\nSouth Desmond, NY 91821', '2022-09-15 01:04:18', '2022-09-15 01:04:18'),
(9, 'Annamae Mills II', 'dare.duane@example.com', '1-234-238-8882', '430 Joanny Forges\nChristianaberg, FL 74699', '2022-09-15 01:04:18', '2022-09-15 01:04:18'),
(10, 'Dr. Royce Barton', 'stehr.keyshawn@example.org', '+1 (616) 555-4400', '7010 Hahn Road\nPort Raeganland, NC 89616', '2022-09-15 01:04:18', '2022-09-15 01:04:18');

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
(1, 'Bag', 'Bag', '50', '50 kg = 1 bag', '2022-09-15 01:13:14', '2022-09-15 01:13:14'),
(2, 'Box', 'Box', '12', '12 packet = 1 box', '2022-09-15 01:13:37', '2022-09-15 01:13:37'),
(3, 'Pieces', 'Pieces', '1', '1 pieces', '2022-09-15 01:14:02', '2022-09-15 01:14:02');

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
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_phone_unique` (`phone`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `expenses_reference_no_unique` (`reference_no`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `sub_categories_name_unique` (`name`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
  ADD CONSTRAINT `purchases_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `purchases_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
