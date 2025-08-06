-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2025 at 01:46 PM
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
-- Database: `educode`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `admin_role` int(11) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `admin_role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md Razu Hosssain Raj', 'admin@gmail.com', 0, NULL, '$2y$12$KgvLUjROdoinQ036/xsO.ODTtzF2rmxlvaKxkD8kLCkhU5hYwyRf2', NULL, '2025-08-05 22:41:00', '2025-08-05 22:41:00');

-- --------------------------------------------------------

--
-- Table structure for table `assignment_submissions`
--

CREATE TABLE `assignment_submissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `assignment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `submit_link` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `mark` int(11) DEFAULT NULL,
  `feadback` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_credentials`
--

CREATE TABLE `auth_credentials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `client_id` longtext DEFAULT NULL,
  `client_secret` longtext DEFAULT NULL,
  `redirect_url` longtext DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `batch_allocations`
--

CREATE TABLE `batch_allocations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_batche_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `assign_instructor` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('user1@gmail.com|127.0.0.1', 'i:1;', 1754479356),
('user1@gmail.com|127.0.0.1:timer', 'i:1754479356;', 1754479356);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `category_title` varchar(255) DEFAULT NULL,
  `category_des` text DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `child_categories`
--

CREATE TABLE `child_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `child_category_name` varchar(255) DEFAULT NULL,
  `child_category_title` varchar(255) DEFAULT NULL,
  `child_category_des` text DEFAULT NULL,
  `child_category_url` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `class_assignments`
--

CREATE TABLE `class_assignments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `assignment` longtext DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `is_downloadable` int(11) DEFAULT NULL,
  `download_count` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `copy_rights`
--

CREATE TABLE `copy_rights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `receved_by` varchar(255) DEFAULT NULL,
  `design_by` varchar(255) DEFAULT NULL,
  `receiver_url` varchar(255) DEFAULT NULL,
  `designer_url` varchar(255) DEFAULT NULL,
  `receiver_icon` varchar(255) DEFAULT NULL,
  `designer_icon` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_category_id` bigint(20) UNSIGNED NOT NULL,
  `course_subcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_childcategory_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_name` varchar(255) DEFAULT NULL,
  `course_title` varchar(255) DEFAULT NULL,
  `course_about` longtext DEFAULT NULL,
  `course_des` text DEFAULT NULL,
  `course_long_des` longtext DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `course_language` varchar(255) DEFAULT NULL,
  `course_type` varchar(255) DEFAULT NULL,
  `course_lable` varchar(255) DEFAULT NULL,
  `course_time` varchar(255) DEFAULT NULL,
  `course_image` varchar(255) DEFAULT NULL,
  `label` enum('top','trending','upcoming','free','new','featured','beginner','popular','best_seller','bundle') DEFAULT NULL,
  `sell` int(11) DEFAULT 0,
  `view_count` int(11) DEFAULT 0,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `user_id`, `course_category_id`, `course_subcategory_id`, `course_childcategory_id`, `course_name`, `course_title`, `course_about`, `course_des`, `course_long_des`, `url`, `course_language`, `course_type`, `course_lable`, `course_time`, `course_image`, `label`, `sell`, `view_count`, `slug`, `creator_id`, `editor_id`, `status`, `public_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, NULL, NULL, 'Web Design & Development', 'Web Design & Development', '<p>Web Design &amp; Development&nbsp;</p>', 'Web Design & Development', '<p>Web Design &amp; Development&nbsp;</p>', 'web-design-development', 'Bangle', 'Free', 'Beginners', '1 Month', 'YvZyS5jN93_1754479073.webp', 'new', 0, 7, '20689339e11891a5TOsI4R6C1Wo6JzX9yPD_91046-1754479073', NULL, NULL, 1, 1, '2025-08-06 05:30:17', '2025-08-06 05:42:17', NULL),
(2, 1, 1, NULL, NULL, 'Web Design', 'Web Design', '<p>dfdf</p>', 'fdfd', '<p>fdfdfdf</p>', 'web-design', 'English', 'Free', 'Anyone', '3 Months', 'xVdmJsw4C2_1754479172.webp', 'new', 0, 4, '2068933a4481571crDRRvIsJ6Equ1SKWK6W_63988-1754479172', NULL, NULL, 1, 1, '2025-08-06 05:30:43', '2025-08-06 05:31:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_attchments`
--

CREATE TABLE `course_attchments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `is_downloadable` tinyint(1) NOT NULL DEFAULT 1,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_batches`
--

CREATE TABLE `course_batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `batchid` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `assign_instructor` int(11) DEFAULT NULL,
  `capacity` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_categories`
--

CREATE TABLE `course_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_category_name` varchar(255) DEFAULT NULL,
  `course_category_title` varchar(255) DEFAULT NULL,
  `course_category_des` text DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_categories`
--

INSERT INTO `course_categories` (`id`, `course_category_name`, `course_category_title`, `course_category_des`, `url`, `slug`, `creator_id`, `editor_id`, `status`, `public_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Development', 'Development', 'Development', 'development', '20689339ac9c8f6qNCLYOwRM8y0OP42QNXk_72099-1754479020', 1, NULL, 1, 1, '2025-08-06 05:17:00', '2025-08-06 05:17:09', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_child_categories`
--

CREATE TABLE `course_child_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_sub_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_child_category_name` varchar(255) DEFAULT NULL,
  `course_child_category_title` varchar(255) DEFAULT NULL,
  `course_child_category_des` text DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_enroments`
--

CREATE TABLE `course_enroments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `enrolled_at` timestamp NULL DEFAULT NULL,
  `enrollment_type` enum('free','paid','subscription') NOT NULL DEFAULT 'free',
  `payment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_exames`
--

CREATE TABLE `course_exames` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_exame_qustion_ans`
--

CREATE TABLE `course_exame_qustion_ans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_liveclasses`
--

CREATE TABLE `course_liveclasses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_modules`
--

CREATE TABLE `course_modules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_prices`
--

CREATE TABLE `course_prices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `original_price` decimal(8,2) NOT NULL,
  `discounted_price` decimal(8,2) DEFAULT NULL,
  `currency` varchar(255) NOT NULL DEFAULT 'BDT',
  `pricing_type` enum('one_time','subscription') NOT NULL DEFAULT 'one_time',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_prices`
--

INSERT INTO `course_prices` (`id`, `course_id`, `user_id`, `original_price`, `discounted_price`, `currency`, `pricing_type`, `start_date`, `end_date`, `slug`, `creator_id`, `editor_id`, `status`, `public_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 500.00, NULL, 'BDT', 'one_time', NULL, NULL, '2068933a96e436eiAd1GToroVMpo9jfDZ6s_16593-1754479254', NULL, NULL, 1, 1, '2025-08-06 05:20:54', '2025-08-06 05:20:54', NULL),
(2, 2, 1, 600.00, NULL, 'BDT', 'one_time', NULL, NULL, '2068933aa4d0b1dvhs7284qkrg0tINmJ5Go_88207-1754479268', NULL, NULL, 1, 1, '2025-08-06 05:21:08', '2025-08-06 05:21:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_progress`
--

CREATE TABLE `course_progress` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_quizes`
--

CREATE TABLE `course_quizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `quize_time` varchar(255) DEFAULT NULL,
  `pass_mark` int(11) DEFAULT NULL,
  `start_at` datetime DEFAULT NULL,
  `end_at` datetime DEFAULT NULL,
  `is_downloadable` int(11) DEFAULT NULL,
  `user_count` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_quiz_questions`
--

CREATE TABLE `course_quiz_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quize_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `question` text DEFAULT NULL,
  `option1` varchar(255) DEFAULT NULL,
  `option2` varchar(255) DEFAULT NULL,
  `option3` varchar(255) DEFAULT NULL,
  `option4` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `is_downloadable` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_reviews`
--

CREATE TABLE `course_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `rating` decimal(2,1) DEFAULT NULL,
  `review` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_reviews`
--

INSERT INTO `course_reviews` (`id`, `course_id`, `user_id`, `title`, `rating`, `review`, `slug`, `creator_id`, `editor_id`, `status`, `public_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, NULL, NULL, 'This course exceeded my expectations!', 5.0, '<p>I joined just to learn the basics, but the content, instructor, and structure were far more advanced and helpful than I imagined.</p>', '2068931e2870149Ai2Hz44VEF5E7uXQQyqw_77929-1754471976', 1, NULL, 1, 1, '2025-08-06 03:19:36', '2025-08-06 03:21:26', NULL),
(3, NULL, NULL, 'Perfect for beginners – explained in simple language!', 5.0, '<p>I was nervous to start, but every lesson made me more confident. Highly recommended for anyone new to this field.</p>', '2068931e4121a73WpqD5esTqrARAMC7K4p3_69267-1754472001', 1, NULL, 1, 1, '2025-08-06 03:20:01', '2025-08-06 03:21:26', NULL),
(4, NULL, NULL, 'Real-world examples made all the difference.', 5.0, '<p>What I loved most was how the instructor tied theory to practical use cases &mdash; it felt like I was learning for the real world, not just for a certificate.</p>', '2068931e5482e1ai32tpD3aBhRXkrN8Ey2H_29464-1754472020', 1, NULL, 1, 1, '2025-08-06 03:20:20', '2025-08-06 03:21:26', NULL),
(5, NULL, NULL, 'Clear, concise, and career-focused.', 5.0, '<p>I&rsquo;ve done many online courses before, but this one stood out because of its laser focus on industry skills that matter.</p>', '2068931e6a83721g9SwXTDmORqjkZGritfB_43524-1754472042', 1, NULL, 1, 1, '2025-08-06 03:20:42', '2025-08-06 03:21:26', NULL),
(6, NULL, NULL, 'Amazing support and well-structured lessons.', 5.0, '<p>Whenever I got stuck, help was just a message away. The course flow was logical, and I always knew what to expect next.</p>', '2068931e813ffcaZCVybpjb9lJCmhpxlhlS_79192-1754472065', 1, NULL, 1, 1, '2025-08-06 03:21:05', '2025-08-06 03:21:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_shedules`
--

CREATE TABLE `course_shedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `days_of_week` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`days_of_week`)),
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `class_type` enum('live','recorded') NOT NULL DEFAULT 'live',
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_statistics`
--

CREATE TABLE `course_statistics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_sub_categories`
--

CREATE TABLE `course_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `course_sub_category_name` varchar(255) DEFAULT NULL,
  `course_sub_category_title` varchar(255) DEFAULT NULL,
  `course_sub_category_des` text DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_topics`
--

CREATE TABLE `course_topics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `position` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_topic_videos`
--

CREATE TABLE `course_topic_videos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `topic_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `video_url` varchar(255) NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `video_type` enum('file','youtube','vimeo','external') NOT NULL DEFAULT 'file',
  `position` int(11) NOT NULL DEFAULT 0,
  `is_preview` tinyint(1) NOT NULL DEFAULT 0,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_csses`
--

CREATE TABLE `custom_csses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `css_note` varchar(255) DEFAULT NULL,
  `custom_css` longtext DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_scripts`
--

CREATE TABLE `custom_scripts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `script_note` varchar(255) DEFAULT NULL,
  `custom_script` longtext DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `date_time_formates`
--

CREATE TABLE `date_time_formates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date_formate` varchar(255) DEFAULT NULL,
  `time_formate` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discount_coupons`
--

CREATE TABLE `discount_coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `code` varchar(255) NOT NULL,
  `type` enum('course','subscription','global') NOT NULL DEFAULT 'course',
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subscription_plan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `discount_type` enum('percentage','fixed') NOT NULL DEFAULT 'fixed',
  `discount_amount` decimal(8,2) NOT NULL,
  `max_usage` int(10) UNSIGNED DEFAULT NULL,
  `used` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emailattchements`
--

CREATE TABLE `emailattchements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `send_email_id` bigint(20) UNSIGNED NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_setups`
--

CREATE TABLE `email_setups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mail_mailer` varchar(255) DEFAULT NULL,
  `mail_host` varchar(255) DEFAULT NULL,
  `mail_port` varchar(255) DEFAULT NULL,
  `mail_username` varchar(255) DEFAULT NULL,
  `mail_password` varchar(255) DEFAULT NULL,
  `mail_encryption` varchar(255) NOT NULL DEFAULT 'tls',
  `mail_from_address` varchar(255) NOT NULL DEFAULT 'tls',
  `mail_from_name` varchar(255) NOT NULL DEFAULT 'tls',
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `embed_maps`
--

CREATE TABLE `embed_maps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address_line1` varchar(255) DEFAULT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `postal_code` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `latitude` decimal(10,8) DEFAULT NULL,
  `longitude` decimal(11,8) DEFAULT NULL,
  `static_map` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `user_id`, `title`, `question`, `answer`, `slug`, `creator_id`, `editor_id`, `status`, `public_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, NULL, 'How do I enroll in a course ?', '<p>To enroll, simply create an account, browse available courses, and click the &ldquo;Enroll Now&rdquo; button. You&rsquo;ll be guided through a secure payment (if applicable), and then you&rsquo;ll get instant access to course content.</p>', '206893104bbadf0baV8RPQm8KZ5QWj1e8bg_21261-1754468427', 1, NULL, 1, 1, '2025-08-06 02:20:27', '2025-08-06 02:21:47', NULL),
(2, NULL, NULL, 'Can I access courses from mobile devices?', '<p>Yes! Our LMS is fully responsive and mobile-friendly. You can learn on the go using your smartphone or tablet without compromising experience.</p>', '206893105a249addC59DftITgi0vjtnBm9X_30297-1754468442', 1, NULL, 1, 1, '2025-08-06 02:20:42', '2025-08-06 02:21:47', NULL),
(3, NULL, NULL, 'Are there any free courses available?', '<p>Absolutely. We offer a range of free courses in different categories. You can filter by &ldquo;Free&rdquo; in the course list to explore all free learning options.</p>', '206893106a21c983YgjhS2UP4o9EqKciArS_74491-1754468458', 1, NULL, 1, 1, '2025-08-06 02:20:58', '2025-08-06 02:21:47', NULL),
(4, NULL, NULL, 'Will I get a certificate after completing a course?', '<p>Yes, once you complete a course and pass the final assessment, you&rsquo;ll receive a digitally verifiable certificate that you can download or share on LinkedIn.</p>', '206893107a3450fd1T6uWf8vFDmyrGdJSsy_19664-1754468474', 1, NULL, 1, 1, '2025-08-06 02:21:14', '2025-08-06 02:21:47', NULL),
(5, NULL, NULL, 'Can I contact instructors if I have questions?', '<p>Yes, our messaging system allows you to connect directly with course instructors. You can ask questions, request feedback, and get support whenever you need.</p>', '2068931088e2c2cHvO2MpKOZD4zO44y8bud_91089-1754468488', 1, NULL, 1, 1, '2025-08-06 02:21:28', '2025-08-06 02:21:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `google_tag_managers`
--

CREATE TABLE `google_tag_managers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_manager_id` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homebanners`
--

CREATE TABLE `homebanners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_name` varchar(255) DEFAULT NULL,
  `banner_title` varchar(255) DEFAULT NULL,
  `banner_heading` varchar(255) DEFAULT NULL,
  `banner_caption` text DEFAULT NULL,
  `banner_button1` varchar(255) DEFAULT NULL,
  `banner_button2` varchar(255) DEFAULT NULL,
  `button1_url` varchar(255) DEFAULT NULL,
  `button2_url` varchar(255) DEFAULT NULL,
  `banner_image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `homebanners`
--

INSERT INTO `homebanners` (`id`, `page_name`, `banner_title`, `banner_heading`, `banner_caption`, `banner_button1`, `banner_button2`, `button1_url`, `button2_url`, `banner_image`, `slug`, `creator_id`, `editor_id`, `status`, `public_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Unlock Your Future with Expert-Led Courses', 'Learn Anytime, Anywhere', 'Join thousands of learners mastering new skills from top instructors. Learn at your own pace, from anywhere in the world.', NULL, NULL, NULL, NULL, 'uploads/banner/1754458664_16628.webp', '206892ea28ad364COnlbbxI2uffbW5hcPeL_65612-1754458664', 1, NULL, 1, 1, '2025-08-05 23:37:44', '2025-08-05 23:41:19', NULL),
(2, NULL, 'Build Skills for Tomorrow', 'Empower Your Career with Practical Learning', 'Get hands-on knowledge through real-world projects and professional guidance. Start your journey to excellence today!', NULL, NULL, NULL, NULL, 'uploads/banner/1754459946_86668.webp', '206892ef2a01edbdA2fud6uxaRsBXPvcC1m_96180-1754459946', 1, NULL, 1, 1, '2025-08-05 23:59:06', '2025-08-06 00:00:06', NULL),
(3, NULL, 'Education That Fits Your Life', 'Flexible Learning for Ambitious Minds', 'Choose from hundreds of courses tailored for your goals. Whether you\'re a beginner or a pro, we\'ve got you covered.', NULL, NULL, NULL, NULL, 'uploads/banner/1754459982_46812.webp', '206892ef4e2d7cdhi9SZ5as1zf0ScjZobsD_31585-1754459982', 1, NULL, 1, 1, '2025-08-05 23:59:42', '2025-08-06 00:00:06', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `home_abouts`
--

CREATE TABLE `home_abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `heading` varchar(255) DEFAULT NULL,
  `caption` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `icon_mangements`
--

CREATE TABLE `icon_mangements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icons` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructore_requests`
--

CREATE TABLE `instructore_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `sourcing` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `last_education` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `daily_available_hours` varchar(255) DEFAULT NULL,
  `has_teaching_experience` varchar(255) DEFAULT NULL,
  `experience_year` text DEFAULT NULL,
  `preferred_student_level` varchar(255) DEFAULT NULL,
  `can_create_thumbnail` varchar(255) DEFAULT NULL,
  `can_create_promo_video` varchar(255) DEFAULT NULL,
  `has_course_module` varchar(255) DEFAULT NULL,
  `has_course_video_upload` varchar(255) DEFAULT NULL,
  `can_create_assignments` varchar(255) DEFAULT NULL,
  `able_tolive_class` varchar(255) DEFAULT NULL,
  `has_webcam` varchar(255) DEFAULT NULL,
  `can_use_video_call_tools` varchar(255) DEFAULT NULL,
  `can_reply_within_24h` varchar(255) DEFAULT NULL,
  `can_participate_community` varchar(255) DEFAULT NULL,
  `available_for_live_qa` varchar(255) DEFAULT NULL,
  `no_copyright_violation` varchar(255) DEFAULT NULL,
  `accepts_review_policy` varchar(255) DEFAULT NULL,
  `willing_to_promote_course` varchar(255) DEFAULT NULL,
  `interested_in_affiliate` varchar(255) DEFAULT NULL,
  `plans_more_courses` varchar(255) DEFAULT NULL,
  `why_become_instructor` text DEFAULT NULL,
  `future_contribution_plan` text DEFAULT NULL,
  `what_makes_you_unique` text DEFAULT NULL,
  `agrees_to_terms` varchar(255) DEFAULT NULL,
  `approval_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `live_class_attendences`
--

CREATE TABLE `live_class_attendences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance_modes`
--

CREATE TABLE `maintenance_modes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `caption` text DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 0,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sender_id` bigint(20) UNSIGNED NOT NULL,
  `receiver_id` bigint(20) UNSIGNED NOT NULL,
  `text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_03_18_071044_create_admins_table', 1),
(5, '2025_04_02_125820_create_categories_table', 1),
(6, '2025_04_03_234322_create_seos_table', 1),
(7, '2025_04_04_212747_create_seo_images_table', 1),
(8, '2025_04_17_215146_create_sub_categories_table', 1),
(9, '2025_04_19_231059_create_child_categories_table', 1),
(10, '2025_04_25_002542_create_course_categories_table', 1),
(11, '2025_04_25_002543_create_course_sub_categories_table', 1),
(12, '2025_04_25_002544_create_course_child_categories_table', 1),
(13, '2025_04_25_164507_create_courses_table', 1),
(14, '2025_04_26_055245_create_maintenance_modes_table', 1),
(15, '2025_04_28_064947_create_copy_rights_table', 1),
(16, '2025_04_29_044725_create_site_emails_table', 1),
(17, '2025_04_29_073904_create_site_phones_table', 1),
(18, '2025_04_29_093126_create_site_addresses_table', 1),
(19, '2025_04_29_111530_create_embed_maps_table', 1),
(20, '2025_04_30_053206_create_date_time_formates_table', 1),
(21, '2025_04_30_063253_create_time_zone_logs_table', 1),
(22, '2025_05_04_044646_create_custom_csses_table', 1),
(23, '2025_05_04_044657_create_custom_scripts_table', 1),
(24, '2025_05_04_075244_create_preloaders_table', 1),
(25, '2025_05_06_053849_create_siteinformations_table', 1),
(26, '2025_05_06_101844_create_icon_mangements_table', 1),
(27, '2025_05_07_004802_create_userotps_table', 1),
(28, '2025_05_07_071402_create_site_scoials_table', 1),
(29, '2025_05_07_200227_create_instructore_requests_table', 1),
(30, '2025_05_08_064350_create_google_tag_managers_table', 1),
(31, '2025_05_12_050355_create_auth_credentials_table', 1),
(32, '2025_05_13_234058_create_user_supporting_documents_table', 1),
(33, '2025_05_13_234112_create_user_socials_table', 1),
(34, '2025_05_14_064020_create_payment_gateways_table', 1),
(35, '2025_05_15_054138_create_email_setups_table', 1),
(36, '2025_05_15_072307_create_site_admin_mails_table', 1),
(37, '2025_05_15_083600_create_send_emails_table', 1),
(38, '2025_05_15_102123_create_emailattchements_table', 1),
(39, '2025_05_27_103344_create_subscription_plans_table', 1),
(40, '2025_05_27_103403_create_subscriptions_table', 1),
(41, '2025_05_28_074750_create_payments_table', 1),
(42, '2025_06_29_000149_create_course_prices_table', 1),
(43, '2025_06_29_001039_create_course_reviews_table', 1),
(44, '2025_06_29_002020_create_course_topics_table', 1),
(45, '2025_06_29_002210_create_course_topic_videos_table', 1),
(46, '2025_07_02_052510_create_course_modules_table', 1),
(47, '2025_07_02_052531_create_course_attchments_table', 1),
(48, '2025_07_02_052602_create_course_shedules_table', 1),
(49, '2025_07_02_052710_create_course_enroments_table', 1),
(50, '2025_07_02_052832_create_course_batches_table', 1),
(51, '2025_07_02_052853_create_batch_allocations_table', 1),
(52, '2025_07_02_053000_create_course_progress_table', 1),
(53, '2025_07_02_053024_create_course_statistics_table', 1),
(54, '2025_07_02_053055_create_course_exames_table', 1),
(55, '2025_07_02_053129_create_course_exame_qustion_ans_table', 1),
(56, '2025_07_02_053200_create_course_liveclasses_table', 1),
(57, '2025_07_02_053221_create_live_class_attendences_table', 1),
(58, '2025_07_02_053459_create_class_assignments_table', 1),
(59, '2025_07_02_053541_create_assignment_submissions_table', 1),
(60, '2025_07_09_054749_create_discount_coupons_table', 1),
(61, '2025_07_16_072214_create_course_quizes_table', 1),
(62, '2025_07_16_074353_create_quize_results_table', 1),
(63, '2025_07_19_060943_create_messages_table', 1),
(64, '2025_08_03_081529_create_course_quiz_questions_table', 1),
(65, '2025_08_03_081530_create_quize_answers_table', 1),
(66, '2025_08_05_103400_create_homebanners_table', 1),
(67, '2025_08_05_104318_create_posts_table', 1),
(68, '2025_08_05_104343_create_post_comments_table', 1),
(69, '2025_08_05_104416_create_home_abouts_table', 1),
(70, '2025_08_05_104525_create_faqs_table', 1);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_gateway` varchar(255) DEFAULT NULL,
  `payment_id` varchar(255) DEFAULT NULL,
  `tran_id` varchar(255) DEFAULT NULL,
  `val_id` varchar(255) DEFAULT NULL,
  `invoice_id` varchar(255) DEFAULT NULL,
  `currency` varchar(10) NOT NULL DEFAULT 'BDT',
  `amount` decimal(10,2) NOT NULL,
  `store_amount` decimal(10,2) DEFAULT NULL,
  `payment_status` enum('PENDING','VALID','FAILED','CANCELLED') NOT NULL DEFAULT 'PENDING',
  `payment_mode` enum('online','offline','wallet') NOT NULL DEFAULT 'online',
  `card_type` varchar(255) DEFAULT NULL,
  `card_brand` varchar(255) DEFAULT NULL,
  `card_issuer` varchar(255) DEFAULT NULL,
  `card_no` varchar(255) DEFAULT NULL,
  `bank_tran_id` varchar(255) DEFAULT NULL,
  `verify_sign` longtext DEFAULT NULL,
  `verify_sign_sha2` longtext DEFAULT NULL,
  `verify_key` longtext DEFAULT NULL,
  `risk_title` varchar(255) DEFAULT NULL,
  `risk_level` varchar(255) DEFAULT NULL,
  `is_refunded` tinyint(1) NOT NULL DEFAULT 0,
  `refunded_amount` decimal(10,2) DEFAULT NULL,
  `refund_date` timestamp NULL DEFAULT NULL,
  `payment_date` timestamp NULL DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `payload` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `phone` varchar(255) DEFAULT NULL,
  `division` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `course_id`, `user_id`, `payment_gateway`, `payment_id`, `tran_id`, `val_id`, `invoice_id`, `currency`, `amount`, `store_amount`, `payment_status`, `payment_mode`, `card_type`, `card_brand`, `card_issuer`, `card_no`, `bank_tran_id`, `verify_sign`, `verify_sign_sha2`, `verify_key`, `risk_title`, `risk_level`, `is_refunded`, `refunded_amount`, `refund_date`, `payment_date`, `ip_address`, `user_agent`, `payload`, `status`, `public_status`, `phone`, `division`, `city`, `country`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 8, NULL, NULL, 'Trans175447965691399954', NULL, 'AQ7286510', 'BDT', 600.00, 600.00, 'PENDING', 'online', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, '01787204898', 'Dhaka', 'Dhaka', 'Bangladesh', '2025-08-06 05:27:36', '2025-08-06 05:27:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateways`
--

CREATE TABLE `payment_gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gateway_type` varchar(255) DEFAULT NULL,
  `gateway_name` varchar(255) DEFAULT NULL,
  `api_key` longtext DEFAULT NULL,
  `api_secret` longtext DEFAULT NULL,
  `client_id` longtext DEFAULT NULL,
  `client_secret` longtext DEFAULT NULL,
  `webhook_secret` longtext DEFAULT NULL,
  `merchant_id` longtext DEFAULT NULL,
  `username` longtext DEFAULT NULL,
  `password` longtext DEFAULT NULL,
  `store_id` longtext DEFAULT NULL,
  `store_password` longtext DEFAULT NULL,
  `access_token` longtext DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` bigint(20) UNSIGNED DEFAULT NULL,
  `editor_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `public_status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `short_des` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `short_des`, `description`, `image`, `slug`, `creator_id`, `editor_id`, `status`, `public_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'Top 10 Skills You Need to Succeed in 2025', 'In today’s fast-changing job market, technical knowledge alone isn’t enough', '<p>In today&rsquo;s fast-changing job market, technical knowledge alone isn&rsquo;t enough. Learn about the most in-demand skills &mdash; from critical thinking to cloud computing &mdash; and how you can build them efficiently through our expert-led courses.</p>', 'uploads/post/1754469317_90679.webp', '20689313c589d7eK8HYLh7rWbnhBcT33bWX_97240-1754469317', 1, NULL, 1, 1, '2025-08-06 02:35:17', '2025-08-06 02:38:01', NULL),
(2, NULL, 'Why Self-Paced Learning is the Future of Education', 'Flexibility and control are key to modern learning. Self-paced courses empower learners to progress on their', '<p data-start=\"692\" data-end=\"971\">Flexibility and control are key to modern learning. Self-paced courses empower learners to progress on their own time, revisit lessons, and truly understand concepts instead of rushing to meet deadlines. Discover how our platform supports this learning revolution.</p>', 'uploads/post/1754469356_21422.webp', '20689313ec802baKbtY0HVMzhQco2n2XuKW_95944-1754469356', 1, NULL, 1, 1, '2025-08-06 02:35:56', '2025-08-06 02:38:01', NULL),
(3, NULL, 'How to Learn Effectively Using Just Your Smartphone', 'You don’t need a fancy setup to gain knowledge anymore. With our fully mobile-optimized platform,', '<p>You don&rsquo;t need a fancy setup to gain knowledge anymore. With our fully mobile-optimized platform, you can take full courses, join discussions, and even submit assignments from the palm of your hand &mdash; whether you&rsquo;re on a break or on a bus.</p>', 'uploads/post/1754469390_98920.webp', '206893140e79246jK8xvFo7RJY8Bt30u3qD_80801-1754469390', 1, NULL, 1, 1, '2025-08-06 02:36:30', '2025-08-06 02:38:01', NULL),
(4, NULL, 'Build Real-World Projects That Impress Employers', 'Theory is great, but real skills come from building. That’s why our courses are designed with hands-on', '<p>Theory is great, but real skills come from building. That&rsquo;s why our courses are designed with hands-on projects that simulate real-world challenges. Whether it&rsquo;s a portfolio website or a data dashboard, your work will speak for itself in interviews.</p>', 'uploads/post/1754469431_33896.webp', '206893143747526R3s2ZChYldrRDVm4nt51_29982-1754469431', 1, NULL, 1, 1, '2025-08-06 02:37:11', '2025-08-06 02:38:01', NULL),
(5, NULL, 'Become a Global Freelancer Through Our LMS', 'Freelancing is more accessible than ever — if you have the right skills. Our platform offers targeted courses', '<p>Freelancing is more accessible than ever &mdash; if you have the right skills. Our platform offers targeted courses that prepare you for freelancing marketplaces, teach you how to communicate with clients, manage payments, and build a brand that gets you hired internationally.</p>', 'uploads/post/1754469465_78303.webp', '2068931459caa04squi0n8HYEexlPsSOhFw_36951-1754469465', 1, NULL, 1, 1, '2025-08-06 02:37:45', '2025-08-06 02:38:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `question` text DEFAULT NULL,
  `answer` text DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `preloaders`
--

CREATE TABLE `preloaders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `text` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quize_answers`
--

CREATE TABLE `quize_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `qustion` text DEFAULT NULL,
  `student_answer` varchar(255) DEFAULT NULL,
  `instructor_answer` varchar(255) DEFAULT NULL,
  `mark` int(11) DEFAULT NULL,
  `is_downloadable` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quize_results`
--

CREATE TABLE `quize_results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `quize_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_mark` int(11) DEFAULT NULL,
  `is_downloadable` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `send_emails`
--

CREATE TABLE `send_emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mail_to` varchar(255) DEFAULT NULL,
  `mail_subject` varchar(255) DEFAULT NULL,
  `mail_body` longtext DEFAULT NULL,
  `mail_attachment` longtext DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `unique_id` bigint(20) UNSIGNED DEFAULT NULL,
  `model_type` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` text DEFAULT NULL,
  `meta_keywords` text DEFAULT NULL,
  `meta_robots` varchar(255) DEFAULT 'index, follow',
  `canonical_url` varchar(255) DEFAULT NULL,
  `hreflang_tags` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`hreflang_tags`)),
  `structured_data` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`structured_data`)),
  `og_title` varchar(255) DEFAULT NULL,
  `og_description` text DEFAULT NULL,
  `og_url` varchar(255) DEFAULT NULL,
  `og_type` varchar(255) DEFAULT 'website',
  `og_locale` varchar(255) DEFAULT 'en_US',
  `twitter_card` varchar(255) DEFAULT 'summary_large_image',
  `twitter_title` varchar(255) DEFAULT NULL,
  `twitter_description` text DEFAULT NULL,
  `twitter_site` varchar(255) DEFAULT NULL,
  `pinterest_description` text DEFAULT NULL,
  `pinterest_rich_pin` varchar(255) DEFAULT 'article',
  `whatsapp_title` varchar(255) DEFAULT NULL,
  `whatsapp_description` text DEFAULT NULL,
  `seo_image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `user_id`, `unique_id`, `model_type`, `meta_title`, `meta_description`, `meta_keywords`, `meta_robots`, `canonical_url`, `hreflang_tags`, `structured_data`, `og_title`, `og_description`, `og_url`, `og_type`, `og_locale`, `twitter_card`, `twitter_title`, `twitter_description`, `twitter_site`, `pinterest_description`, `pinterest_rich_pin`, `whatsapp_title`, `whatsapp_description`, `seo_image`, `slug`, `creator_id`, `editor_id`, `status`, `public_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 1, 'App\\Models\\CourseCategory', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20689339ac9c8f6qNCLYOwRM8y0OP42QNXk_72099-1754479020', 1, NULL, 1, 0, '2025-08-06 05:17:01', '2025-08-06 05:17:01', NULL),
(2, 1, 1, 'App\\Models\\Course', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20689339e11891a5TOsI4R6C1Wo6JzX9yPD_91046-1754479073', NULL, NULL, 1, 0, '2025-08-06 05:17:55', '2025-08-06 05:17:55', NULL),
(3, 1, 2, 'App\\Models\\Course', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '2068933a4481571crDRRvIsJ6Equ1SKWK6W_63988-1754479172', NULL, NULL, 1, 0, '2025-08-06 05:19:35', '2025-08-06 05:19:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seo_images`
--

CREATE TABLE `seo_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `seo_id` bigint(20) UNSIGNED DEFAULT NULL,
  `model_type` varchar(255) DEFAULT NULL,
  `image_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `siteinformations`
--

CREATE TABLE `siteinformations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_name` varchar(255) DEFAULT NULL,
  `site_title` varchar(255) DEFAULT NULL,
  `site_slogan` varchar(255) DEFAULT NULL,
  `site_description` text DEFAULT NULL,
  `site_logo` varchar(255) DEFAULT NULL,
  `site_faveicon` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_addresses`
--

CREATE TABLE `site_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_admin_mails`
--

CREATE TABLE `site_admin_mails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mail_user` varchar(255) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_emails`
--

CREATE TABLE `site_emails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email_type` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_phones`
--

CREATE TABLE `site_phones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone_type` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_scoials`
--

CREATE TABLE `site_scoials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `starts_at` timestamp NULL DEFAULT NULL,
  `ends_at` timestamp NULL DEFAULT NULL,
  `payment_status` varchar(255) NOT NULL DEFAULT 'pending',
  `payment_method` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_plans`
--

CREATE TABLE `subscription_plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_for` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `usd_price` decimal(8,2) DEFAULT NULL,
  `features` longtext DEFAULT NULL,
  `interval` varchar(255) NOT NULL DEFAULT 'monthly',
  `course_limit` int(11) NOT NULL DEFAULT 1,
  `plan_type` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sub_category_name` varchar(255) DEFAULT NULL,
  `sub_category_title` varchar(255) DEFAULT NULL,
  `sub_category_des` text DEFAULT NULL,
  `sub_category_url` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `creator_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `time_zone_logs`
--

CREATE TABLE `time_zone_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `timezone` varchar(255) DEFAULT NULL,
  `login_at` timestamp NULL DEFAULT NULL,
  `logout_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userotps`
--

CREATE TABLE `userotps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `otp` varchar(255) NOT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `role` int(11) NOT NULL,
  `badge` enum('bestseller','new_seller','top_rated','verified','regular') NOT NULL DEFAULT 'regular',
  `avater` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `badge`, `avater`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md Razu Hosssain Raj', 'mdrazuhossainraj@gmail.com', NULL, '$2y$12$1LgQAfCIvb40KZ13/kNw5uxf5MtBdrKITc8GYN5h6v1DoDgodLJQm', 1, 'regular', NULL, NULL, '2025-08-06 04:21:10', '2025-08-06 04:21:10'),
(2, 'M. Rashiduzzaman Lhan', 'rashiduzzaman@gmail.com', NULL, '$2y$12$kp/eOnPNC6ypJaqduj7Oe.hIlHIb9qPvMjRG/1KXlucbLJwcNXVzS', 1, 'regular', NULL, NULL, '2025-08-06 04:22:08', '2025-08-06 04:22:08'),
(3, 'RH Kamruzzaman', 'kamrul2345@gmail.com', NULL, '$2y$12$Jzm4iNZMi3N3N.XOjkXe9eeCTK42fbm8mQJ544R0ysr4YTWNWp25q', 1, 'regular', NULL, NULL, '2025-08-06 04:23:13', '2025-08-06 04:23:13'),
(4, 'Roni Mahmud', 'roni@gmail.com', NULL, '$2y$12$HXO3sJMptAtLv/ixPCqRqeM3AHCx/GV0WixvLATaUsOTVouHi.pmi', 1, 'regular', NULL, NULL, '2025-08-06 04:23:56', '2025-08-06 04:23:56'),
(5, 'user 1', 'user1@gmail.com', NULL, '$2y$12$D.NUp5HCDT62qLQwHOMKbefltOqnfcu7ww5c3Mhpc4dWkqFFc4aGe', 0, 'regular', NULL, NULL, '2025-08-06 05:22:11', '2025-08-06 05:22:11'),
(6, 'user 2', 'user2@gmail.com', NULL, '$2y$12$2E./08BPy2XB7h46zYeDJ.sbsdUWqZ96rx9l8FQxMlAITRnQoa0.e', 0, 'regular', NULL, NULL, '2025-08-06 05:22:56', '2025-08-06 05:22:56'),
(7, 'user 3', 'user3@gmail.com', NULL, '$2y$12$BAYir.5JPk2NAdK/EKRbueGIw8X.dvYemJ8nDaYjRcDmIDG1XNcQm', 0, 'regular', NULL, NULL, '2025-08-06 05:23:37', '2025-08-06 05:23:37'),
(8, 'user 4', 'user4@gmail.com', NULL, '$2y$12$piSC4KvMK4Dr7ElixghFz.anP0nLipVk0UlMQHB64KVpFS.OjQ2vi', 0, 'regular', NULL, NULL, '2025-08-06 05:24:12', '2025-08-06 05:24:12');

-- --------------------------------------------------------

--
-- Table structure for table `user_socials`
--

CREATE TABLE `user_socials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `github` varchar(255) DEFAULT NULL,
  `verify` int(11) NOT NULL DEFAULT 0,
  `verify_note` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_supporting_documents`
--

CREATE TABLE `user_supporting_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `certificate` varchar(255) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `verify` int(11) NOT NULL DEFAULT 0,
  `verify_note` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `public_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `assignment_submissions`
--
ALTER TABLE `assignment_submissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `assignment_submissions_user_id_foreign` (`user_id`),
  ADD KEY `assignment_submissions_assignment_id_foreign` (`assignment_id`);

--
-- Indexes for table `auth_credentials`
--
ALTER TABLE `auth_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batch_allocations`
--
ALTER TABLE `batch_allocations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `batch_allocations_course_id_foreign` (`course_id`),
  ADD KEY `batch_allocations_user_id_foreign` (`user_id`),
  ADD KEY `batch_allocations_course_batche_id_foreign` (`course_batche_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_categories`
--
ALTER TABLE `child_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `child_categories_category_id_foreign` (`category_id`),
  ADD KEY `child_categories_subcategory_id_foreign` (`subcategory_id`);

--
-- Indexes for table `class_assignments`
--
ALTER TABLE `class_assignments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_assignments_course_id_foreign` (`course_id`),
  ADD KEY `class_assignments_user_id_foreign` (`user_id`);

--
-- Indexes for table `copy_rights`
--
ALTER TABLE `copy_rights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `courses_user_id_foreign` (`user_id`),
  ADD KEY `courses_course_category_id_foreign` (`course_category_id`),
  ADD KEY `courses_course_subcategory_id_foreign` (`course_subcategory_id`),
  ADD KEY `courses_course_childcategory_id_foreign` (`course_childcategory_id`);

--
-- Indexes for table `course_attchments`
--
ALTER TABLE `course_attchments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_attchments_course_id_foreign` (`course_id`),
  ADD KEY `course_attchments_user_id_foreign` (`user_id`);

--
-- Indexes for table `course_batches`
--
ALTER TABLE `course_batches`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_batches_course_id_foreign` (`course_id`),
  ADD KEY `course_batches_user_id_foreign` (`user_id`);

--
-- Indexes for table `course_categories`
--
ALTER TABLE `course_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_child_categories`
--
ALTER TABLE `course_child_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_child_categories_course_sub_category_id_foreign` (`course_sub_category_id`);

--
-- Indexes for table `course_enroments`
--
ALTER TABLE `course_enroments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_enroments_course_id_foreign` (`course_id`),
  ADD KEY `course_enroments_user_id_foreign` (`user_id`),
  ADD KEY `course_enroments_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `course_exames`
--
ALTER TABLE `course_exames`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_exame_qustion_ans`
--
ALTER TABLE `course_exame_qustion_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_liveclasses`
--
ALTER TABLE `course_liveclasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_modules`
--
ALTER TABLE `course_modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_modules_course_id_foreign` (`course_id`),
  ADD KEY `course_modules_user_id_foreign` (`user_id`);

--
-- Indexes for table `course_prices`
--
ALTER TABLE `course_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_prices_user_id_foreign` (`user_id`),
  ADD KEY `course_prices_course_id_foreign` (`course_id`);

--
-- Indexes for table `course_progress`
--
ALTER TABLE `course_progress`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_quizes`
--
ALTER TABLE `course_quizes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_quizes_course_id_foreign` (`course_id`),
  ADD KEY `course_quizes_user_id_foreign` (`user_id`);

--
-- Indexes for table `course_quiz_questions`
--
ALTER TABLE `course_quiz_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_quiz_questions_quize_id_foreign` (`quize_id`),
  ADD KEY `course_quiz_questions_user_id_foreign` (`user_id`);

--
-- Indexes for table `course_reviews`
--
ALTER TABLE `course_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_reviews_course_id_foreign` (`course_id`),
  ADD KEY `course_reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `course_shedules`
--
ALTER TABLE `course_shedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_shedules_course_id_foreign` (`course_id`),
  ADD KEY `course_shedules_user_id_foreign` (`user_id`);

--
-- Indexes for table `course_statistics`
--
ALTER TABLE `course_statistics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_sub_categories`
--
ALTER TABLE `course_sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_sub_categories_course_category_id_foreign` (`course_category_id`);

--
-- Indexes for table `course_topics`
--
ALTER TABLE `course_topics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_topics_course_id_foreign` (`course_id`),
  ADD KEY `course_topics_user_id_foreign` (`user_id`);

--
-- Indexes for table `course_topic_videos`
--
ALTER TABLE `course_topic_videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_topic_videos_topic_id_foreign` (`topic_id`),
  ADD KEY `course_topic_videos_user_id_foreign` (`user_id`);

--
-- Indexes for table `custom_csses`
--
ALTER TABLE `custom_csses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_scripts`
--
ALTER TABLE `custom_scripts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `date_time_formates`
--
ALTER TABLE `date_time_formates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_coupons`
--
ALTER TABLE `discount_coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `discount_coupons_code_unique` (`code`),
  ADD KEY `discount_coupons_user_id_foreign` (`user_id`),
  ADD KEY `discount_coupons_course_id_foreign` (`course_id`),
  ADD KEY `discount_coupons_subscription_plan_id_foreign` (`subscription_plan_id`);

--
-- Indexes for table `emailattchements`
--
ALTER TABLE `emailattchements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `emailattchements_send_email_id_foreign` (`send_email_id`);

--
-- Indexes for table `email_setups`
--
ALTER TABLE `email_setups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `embed_maps`
--
ALTER TABLE `embed_maps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faqs_user_id_foreign` (`user_id`);

--
-- Indexes for table `google_tag_managers`
--
ALTER TABLE `google_tag_managers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homebanners`
--
ALTER TABLE `homebanners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_abouts`
--
ALTER TABLE `home_abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `icon_mangements`
--
ALTER TABLE `icon_mangements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructore_requests`
--
ALTER TABLE `instructore_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `instructore_requests_user_id_foreign` (`user_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_class_attendences`
--
ALTER TABLE `live_class_attendences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance_modes`
--
ALTER TABLE `maintenance_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `messages_sender_id_foreign` (`sender_id`),
  ADD KEY `messages_receiver_id_foreign` (`receiver_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_course_id_foreign` (`course_id`),
  ADD KEY `payments_user_id_foreign` (`user_id`);

--
-- Indexes for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_user_id_foreign` (`user_id`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_comments_user_id_foreign` (`user_id`),
  ADD KEY `post_comments_post_id_foreign` (`post_id`);

--
-- Indexes for table `preloaders`
--
ALTER TABLE `preloaders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quize_answers`
--
ALTER TABLE `quize_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quize_answers_user_id_foreign` (`user_id`),
  ADD KEY `quize_answers_quiz_id_foreign` (`quiz_id`),
  ADD KEY `quize_answers_question_id_foreign` (`question_id`);

--
-- Indexes for table `quize_results`
--
ALTER TABLE `quize_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quize_results_course_id_foreign` (`course_id`),
  ADD KEY `quize_results_quize_id_foreign` (`quize_id`),
  ADD KEY `quize_results_user_id_foreign` (`user_id`);

--
-- Indexes for table `send_emails`
--
ALTER TABLE `send_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seos_user_id_foreign` (`user_id`);

--
-- Indexes for table `seo_images`
--
ALTER TABLE `seo_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seo_images_seo_id_foreign` (`seo_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `siteinformations`
--
ALTER TABLE `siteinformations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_addresses`
--
ALTER TABLE `site_addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_admin_mails`
--
ALTER TABLE `site_admin_mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_emails`
--
ALTER TABLE `site_emails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_phones`
--
ALTER TABLE `site_phones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_scoials`
--
ALTER TABLE `site_scoials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_plan_id_foreign` (`plan_id`),
  ADD KEY `subscriptions_user_id_foreign` (`user_id`);

--
-- Indexes for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `time_zone_logs`
--
ALTER TABLE `time_zone_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `time_zone_logs_user_id_foreign` (`user_id`);

--
-- Indexes for table `userotps`
--
ALTER TABLE `userotps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userotps_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_socials`
--
ALTER TABLE `user_socials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_socials_user_id_foreign` (`user_id`);

--
-- Indexes for table `user_supporting_documents`
--
ALTER TABLE `user_supporting_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_supporting_documents_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignment_submissions`
--
ALTER TABLE `assignment_submissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `auth_credentials`
--
ALTER TABLE `auth_credentials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `batch_allocations`
--
ALTER TABLE `batch_allocations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `child_categories`
--
ALTER TABLE `child_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `class_assignments`
--
ALTER TABLE `class_assignments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `copy_rights`
--
ALTER TABLE `copy_rights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_attchments`
--
ALTER TABLE `course_attchments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_batches`
--
ALTER TABLE `course_batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_categories`
--
ALTER TABLE `course_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_child_categories`
--
ALTER TABLE `course_child_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_enroments`
--
ALTER TABLE `course_enroments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_exames`
--
ALTER TABLE `course_exames`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_exame_qustion_ans`
--
ALTER TABLE `course_exame_qustion_ans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_liveclasses`
--
ALTER TABLE `course_liveclasses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_modules`
--
ALTER TABLE `course_modules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_prices`
--
ALTER TABLE `course_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `course_progress`
--
ALTER TABLE `course_progress`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_quizes`
--
ALTER TABLE `course_quizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_quiz_questions`
--
ALTER TABLE `course_quiz_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_reviews`
--
ALTER TABLE `course_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_shedules`
--
ALTER TABLE `course_shedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_statistics`
--
ALTER TABLE `course_statistics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_sub_categories`
--
ALTER TABLE `course_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_topics`
--
ALTER TABLE `course_topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_topic_videos`
--
ALTER TABLE `course_topic_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_csses`
--
ALTER TABLE `custom_csses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_scripts`
--
ALTER TABLE `custom_scripts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `date_time_formates`
--
ALTER TABLE `date_time_formates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discount_coupons`
--
ALTER TABLE `discount_coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `emailattchements`
--
ALTER TABLE `emailattchements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_setups`
--
ALTER TABLE `email_setups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `embed_maps`
--
ALTER TABLE `embed_maps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `google_tag_managers`
--
ALTER TABLE `google_tag_managers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homebanners`
--
ALTER TABLE `homebanners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `home_abouts`
--
ALTER TABLE `home_abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `icon_mangements`
--
ALTER TABLE `icon_mangements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructore_requests`
--
ALTER TABLE `instructore_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `live_class_attendences`
--
ALTER TABLE `live_class_attendences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maintenance_modes`
--
ALTER TABLE `maintenance_modes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `preloaders`
--
ALTER TABLE `preloaders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quize_answers`
--
ALTER TABLE `quize_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `quize_results`
--
ALTER TABLE `quize_results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `send_emails`
--
ALTER TABLE `send_emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `seo_images`
--
ALTER TABLE `seo_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `siteinformations`
--
ALTER TABLE `siteinformations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_addresses`
--
ALTER TABLE `site_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_admin_mails`
--
ALTER TABLE `site_admin_mails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_emails`
--
ALTER TABLE `site_emails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_phones`
--
ALTER TABLE `site_phones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_scoials`
--
ALTER TABLE `site_scoials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_plans`
--
ALTER TABLE `subscription_plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_zone_logs`
--
ALTER TABLE `time_zone_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userotps`
--
ALTER TABLE `userotps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_socials`
--
ALTER TABLE `user_socials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_supporting_documents`
--
ALTER TABLE `user_supporting_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment_submissions`
--
ALTER TABLE `assignment_submissions`
  ADD CONSTRAINT `assignment_submissions_assignment_id_foreign` FOREIGN KEY (`assignment_id`) REFERENCES `class_assignments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `assignment_submissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `batch_allocations`
--
ALTER TABLE `batch_allocations`
  ADD CONSTRAINT `batch_allocations_course_batche_id_foreign` FOREIGN KEY (`course_batche_id`) REFERENCES `course_batches` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `batch_allocations_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `batch_allocations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `child_categories`
--
ALTER TABLE `child_categories`
  ADD CONSTRAINT `child_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `child_categories_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `class_assignments`
--
ALTER TABLE `class_assignments`
  ADD CONSTRAINT `class_assignments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `class_assignments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_course_category_id_foreign` FOREIGN KEY (`course_category_id`) REFERENCES `course_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_course_childcategory_id_foreign` FOREIGN KEY (`course_childcategory_id`) REFERENCES `course_child_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_course_subcategory_id_foreign` FOREIGN KEY (`course_subcategory_id`) REFERENCES `course_sub_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `courses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_attchments`
--
ALTER TABLE `course_attchments`
  ADD CONSTRAINT `course_attchments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_attchments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_batches`
--
ALTER TABLE `course_batches`
  ADD CONSTRAINT `course_batches_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_batches_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_child_categories`
--
ALTER TABLE `course_child_categories`
  ADD CONSTRAINT `course_child_categories_course_sub_category_id_foreign` FOREIGN KEY (`course_sub_category_id`) REFERENCES `course_sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_enroments`
--
ALTER TABLE `course_enroments`
  ADD CONSTRAINT `course_enroments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_enroments_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_enroments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_modules`
--
ALTER TABLE `course_modules`
  ADD CONSTRAINT `course_modules_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_modules_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_prices`
--
ALTER TABLE `course_prices`
  ADD CONSTRAINT `course_prices_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_prices_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_quizes`
--
ALTER TABLE `course_quizes`
  ADD CONSTRAINT `course_quizes_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_quizes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_quiz_questions`
--
ALTER TABLE `course_quiz_questions`
  ADD CONSTRAINT `course_quiz_questions_quize_id_foreign` FOREIGN KEY (`quize_id`) REFERENCES `course_quizes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_quiz_questions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_reviews`
--
ALTER TABLE `course_reviews`
  ADD CONSTRAINT `course_reviews_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_shedules`
--
ALTER TABLE `course_shedules`
  ADD CONSTRAINT `course_shedules_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_shedules_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_sub_categories`
--
ALTER TABLE `course_sub_categories`
  ADD CONSTRAINT `course_sub_categories_course_category_id_foreign` FOREIGN KEY (`course_category_id`) REFERENCES `course_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_topics`
--
ALTER TABLE `course_topics`
  ADD CONSTRAINT `course_topics_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_topics_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `course_topic_videos`
--
ALTER TABLE `course_topic_videos`
  ADD CONSTRAINT `course_topic_videos_topic_id_foreign` FOREIGN KEY (`topic_id`) REFERENCES `course_topics` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_topic_videos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `discount_coupons`
--
ALTER TABLE `discount_coupons`
  ADD CONSTRAINT `discount_coupons_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `discount_coupons_subscription_plan_id_foreign` FOREIGN KEY (`subscription_plan_id`) REFERENCES `subscription_plans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `discount_coupons_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `emailattchements`
--
ALTER TABLE `emailattchements`
  ADD CONSTRAINT `emailattchements_send_email_id_foreign` FOREIGN KEY (`send_email_id`) REFERENCES `send_emails` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `faqs`
--
ALTER TABLE `faqs`
  ADD CONSTRAINT `faqs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `instructore_requests`
--
ALTER TABLE `instructore_requests`
  ADD CONSTRAINT `instructore_requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `post_comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `post_comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quize_answers`
--
ALTER TABLE `quize_answers`
  ADD CONSTRAINT `quize_answers_question_id_foreign` FOREIGN KEY (`question_id`) REFERENCES `course_quiz_questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quize_answers_quiz_id_foreign` FOREIGN KEY (`quiz_id`) REFERENCES `course_quizes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quize_answers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quize_results`
--
ALTER TABLE `quize_results`
  ADD CONSTRAINT `quize_results_course_id_foreign` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quize_results_quize_id_foreign` FOREIGN KEY (`quize_id`) REFERENCES `course_quizes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quize_results_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seos`
--
ALTER TABLE `seos`
  ADD CONSTRAINT `seos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `seo_images`
--
ALTER TABLE `seo_images`
  ADD CONSTRAINT `seo_images_seo_id_foreign` FOREIGN KEY (`seo_id`) REFERENCES `seos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD CONSTRAINT `subscriptions_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `subscription_plans` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `time_zone_logs`
--
ALTER TABLE `time_zone_logs`
  ADD CONSTRAINT `time_zone_logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `userotps`
--
ALTER TABLE `userotps`
  ADD CONSTRAINT `userotps_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_socials`
--
ALTER TABLE `user_socials`
  ADD CONSTRAINT `user_socials_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_supporting_documents`
--
ALTER TABLE `user_supporting_documents`
  ADD CONSTRAINT `user_supporting_documents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
