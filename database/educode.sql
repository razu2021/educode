-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2025 at 01:44 PM
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
(1, 'Md Razu Hosssain Raj', 'admin@gmail.com', 0, NULL, '$2y$12$GQJL5ghFQwO.bOtb1tLdQu38QRVRN/9DgEKKqRzNM85OgqDad0bkW', NULL, '2025-08-01 23:18:22', '2025-08-01 23:18:22');

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

--
-- Dumping data for table `class_assignments`
--

INSERT INTO `class_assignments` (`id`, `course_id`, `user_id`, `title`, `description`, `assignment`, `submission_date`, `is_downloadable`, `download_count`, `file`, `slug`, `creator_id`, `editor_id`, `status`, `public_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Introduction to Chemistry & Its Branches', 'Introduction to Chemistry & Its Branches', NULL, NULL, 0, 125, 'uploads/instructor/1754115341-43642.pdf', '20688dad0d474eet010Y1PxvXMswSegl73m_66589-1754115341', NULL, NULL, 1, 1, '2025-08-02 00:15:41', '2025-08-02 00:15:41', NULL),
(2, 1, 1, 'Atomic Structure & Discovery of Subatomic Particles', 'Atomic Structure & Discovery of Subatomic Particles', NULL, NULL, 1, 248, 'uploads/instructor/1754115359-57426.pdf', '20688dad1f956bbcSHJB4SjMFC1RZlQYL56_92953-1754115359', NULL, NULL, 1, 1, '2025-08-02 00:15:59', '2025-08-02 00:15:59', NULL),
(3, 1, 1, 'Mole Concept and Stoichiometry', 'Mole Concept and Stoichiometry', NULL, NULL, 1, 458, 'uploads/instructor/1754115371-42060.pdf', '20688dad2bb9b35KQCHKn4tn551mDGshPrU_78566-1754115371', NULL, NULL, 1, 1, '2025-08-02 00:16:11', '2025-08-02 00:16:11', NULL),
(4, 1, 1, 'Chemical Calculations: Moles, Mass, Volume', 'Chemical Calculations: Moles, Mass, Volume', NULL, NULL, 0, NULL, 'uploads/instructor/1754115391-41200.pdf', '20688dad3fadc11dsnR0vlbIvNfd6E7fGOh_91169-1754115391', NULL, NULL, 1, 1, '2025-08-02 00:16:31', '2025-08-02 00:16:31', NULL);

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
(1, 1, 1, 1, 1, 'Chemistry 2026', 'Chemistry', '<p data-start=\"291\" data-end=\"768\">Chemistry 2026 is a foundational course designed to introduce students to the core principles of chemical science. It builds a strong conceptual understanding of atomic structure, periodic behavior, chemical reactions, bonding, and the physical and chemical properties of matter. The course also touches on key areas like thermochemistry, acids and bases, and basic organic chemistry, making it an essential stepping stone for any science-related academic or professional path.</p>\r\n<p data-start=\"770\" data-end=\"995\">Whether you\'re preparing for advanced studies in chemistry, engineering, health sciences, or simply aiming to understand the chemical world around you, Chemistry 2026 provides the tools and thinking skills needed for success.</p>', 'Chemistry', '<p data-start=\"1033\" data-end=\"1361\">This course explores the fundamental concepts of chemistry, beginning with the structure of atoms and progressing through chemical bonding, reactions, stoichiometry, thermodynamics, and solutions. Students will learn to apply quantitative and qualitative reasoning to solve problems and understand real-world chemical phenomena.</p>\r\n<p data-start=\"1363\" data-end=\"1597\">The course is structured to build a solid theoretical foundation with practical examples and applications. Emphasis is placed on developing scientific thinking, precision in measurement, and problem-solving skills. Key topics include:</p>\r\n<ul data-start=\"1599\" data-end=\"1907\">\r\n<li data-start=\"1599\" data-end=\"1636\">\r\n<p data-start=\"1601\" data-end=\"1636\">Atomic theory and periodic trends</p>\r\n</li>\r\n<li data-start=\"1637\" data-end=\"1681\">\r\n<p data-start=\"1639\" data-end=\"1681\">Chemical bonding and molecular structure</p>\r\n</li>\r\n<li data-start=\"1682\" data-end=\"1733\">\r\n<p data-start=\"1684\" data-end=\"1733\">Types of chemical reactions and their balancing</p>\r\n</li>\r\n<li data-start=\"1734\" data-end=\"1787\">\r\n<p data-start=\"1736\" data-end=\"1787\">Gas laws, solution chemistry, and thermochemistry</p>\r\n</li>\r\n<li data-start=\"1788\" data-end=\"1821\">\r\n<p data-start=\"1790\" data-end=\"1821\">Acids, bases, and pH concepts</p>\r\n</li>\r\n<li data-start=\"1822\" data-end=\"1856\">\r\n<p data-start=\"1824\" data-end=\"1856\">Introductory organic chemistry</p>\r\n</li>\r\n<li data-start=\"1857\" data-end=\"1907\">\r\n<p data-start=\"1859\" data-end=\"1907\">Basics of electrochemistry and chemical kinetics</p>\r\n</li>\r\n</ul>\r\n<p data-start=\"1909\" data-end=\"2088\">By the end of the course, students will be equipped with essential chemical knowledge and problem-solving abilities to support further studies in chemistry or related disciplines.</p>', 'chemistry-2026', 'Bangle', 'Paid', 'Anyone', '6 Months', 'Qi8PlebBYS_1754122536.webp', 'new', 0, 96, '20688da42fb497dpN9fXeI8dwiCbiKtjQ3R_60744-1754113071', NULL, NULL, 1, 1, '2025-08-02 02:29:40', '2025-08-02 05:36:42', NULL),
(2, 1, 1, 1, 1, 'Physic', 'Physic', NULL, 'Physic', '<p>Physic</p>', 'physic', 'Bangle', 'Paid', 'Anyone', '6 Months', 'i3GRAVpHaK_1754113120.webp', 'new', 0, 11, '20688da46057d55TzJVyyCIc03BPx6j9OPj_54687-1754113120', NULL, NULL, 1, 1, '2025-08-01 23:38:40', '2025-08-02 05:00:02', NULL),
(3, 1, 1, 1, 1, 'Biology', 'Biology', NULL, 'Biology', '<p>Biology&nbsp;</p>', 'biology', 'Bangle', 'Paid', 'Anyone', '6 Months', 'prjmtle8NC_1754113167.webp', 'new', 0, 1, '20688da48fa7230SKeK0suqrNZaBgGX3LGs_33725-1754113167', NULL, NULL, 1, 1, '2025-08-01 23:39:27', '2025-08-02 05:00:19', NULL),
(4, 1, 1, 1, 1, 'Higher Math', 'Higher Math', NULL, 'Higher Math', '<p>Higher Math&nbsp;</p>', 'higher-math', 'Bangle', 'Paid', 'Anyone', '1 Year', 'hvfKYcHMpa_1754113205.webp', 'new', 0, 0, '20688da4b5cf3b8uJVYrOlHTyqYefbjQFJr_10227-1754113205', NULL, NULL, 1, 1, '2025-08-01 23:40:05', '2025-08-01 23:46:46', NULL),
(5, 1, 1, 2, NULL, 'All Subject', 'All Subject', NULL, 'All Subject', '<p>All Subject&nbsp;</p>', 'all-subject', 'Bangle', 'Paid', 'Anyone', '1 Year', 'sKIqUAKXpl_1754113252.webp', 'new', 0, 0, '20688da4e45514bXTXpdRJj4YyeS45zWHKT_87832-1754113252', NULL, NULL, 1, 1, '2025-08-01 23:40:52', '2025-08-01 23:46:46', NULL),
(6, 1, 2, 5, NULL, 'Learn Machen Learning', 'Learn Machen Learning', NULL, 'Learn Machen Learning', '<p>Learn Machen Learning&nbsp;</p>', 'learn-machen-learning', 'Bangle', 'Paid', 'Anyone', '1 Month', 'sDf7kcabMM_1754113310.webp', 'new', 0, 0, '20688da51e0a246U1R2FZVYB9vkmORmAJeX_12463-1754113310', NULL, NULL, 1, 1, '2025-08-01 23:41:50', '2025-08-01 23:46:46', NULL),
(7, 1, 3, 10, NULL, 'C#', 'Best C# Sharp Course in 2026', NULL, 'Best C# Sharp Course in 2026', '<p>Best C# Sharp Course in 2026</p>', 'c', 'Bangle', 'Paid', 'Anyone', '1 Month', 'PnwkghR3WT_1754113383.webp', 'new', 0, 0, '20688da567d734cRs3eq6z9JizP6OLszdQY_34385-1754113383', NULL, NULL, 1, 1, '2025-08-01 23:43:03', '2025-08-01 23:46:46', NULL),
(8, 1, 4, 13, NULL, 'Graphics Design', 'Graphics Design', NULL, 'Graphics Design', '<p>Graphics Design&nbsp;</p>', 'graphics-design', 'Bangle', 'Paid', 'Anyone', '6 Months', '6PV2Tubez5_1754113589.webp', 'new', 0, 0, '20688da635d7ee6rfTwCN7jt2GhHLtz2230_44923-1754113589', NULL, NULL, 1, 1, '2025-08-01 23:46:29', '2025-08-01 23:46:46', NULL);

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

--
-- Dumping data for table `course_attchments`
--

INSERT INTO `course_attchments` (`id`, `course_id`, `user_id`, `title`, `file`, `sort_order`, `is_downloadable`, `slug`, `creator_id`, `editor_id`, `status`, `public_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Attachment 1: Fundamentals of Chemistry', 'uploads/instructor/1754115224-34287.pdf', 1, 1, '20688dac989420a3rMLmq9nlc37cEBknzW0_48695-1754115224', NULL, NULL, 1, 1, '2025-08-02 00:13:44', '2025-08-02 00:13:44', NULL),
(2, 1, 1, 'Attachment 2: Structure of Atom and Periodic Table', 'uploads/instructor/1754115258-16507.pdf', 2, 1, '20688dacba5660fd40iiE2vFUlRt6hLyd45_46531-1754115258', NULL, NULL, 1, 1, '2025-08-02 00:14:18', '2025-08-02 00:14:18', NULL),
(3, 1, 1, 'Attachment 3: Organic & Inorganic Chemistry Basics', 'uploads/instructor/1754128418-52541.pdf', 3, 1, '20688de022ca969bGw2AzmFQ2IbUAfoQFuh_57672-1754128418', NULL, NULL, 1, 1, '2025-08-02 03:53:38', '2025-08-02 03:53:39', NULL),
(4, 1, 1, 'Attachment 4: Structure of Atom and Periodic Table', 'uploads/instructor/1754129179-14262.pdf', 4, 0, '20688de31bd1f11Sxig7VVhwf2cRWVRORlO_68493-1754129179', NULL, NULL, 1, 1, '2025-08-02 04:06:19', '2025-08-02 04:06:19', NULL);

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
(1, 'Academic Course', 'Academic', 'Academic', 'academic-course', '20688d9fbf2326etMEgrPUOzyiDMRPq15VA_29118-1754111935', 1, NULL, 1, 1, '2025-08-01 23:18:56', '2025-08-01 23:21:07', NULL),
(2, 'Development', 'Development', 'Development', 'development', '20688d9fcb547e0yewg4LCMpLNyskLtdDFh_42550-1754111947', 1, NULL, 1, 1, '2025-08-01 23:19:07', '2025-08-01 23:21:07', NULL),
(3, 'Programing', 'Programing', 'Programing', 'programing', '20688d9fd82f635XU7dvXcacyFWK9BYCi9S_60588-1754111960', 1, NULL, 1, 1, '2025-08-01 23:19:20', '2025-08-01 23:21:07', NULL),
(4, 'Design', 'Design', 'Design', 'design', '20688d9fe98c5b0VtMjYQ3rWiNeN9LE3ZzL_63018-1754111977', 1, NULL, 1, 1, '2025-08-01 23:19:37', '2025-08-01 23:21:07', NULL),
(5, 'Personal Development', 'Personal Development', 'Personal Development', 'personal-development', '20688d9ffb48c50OjaHl0VOQH5rxvTFW5CZ_85085-1754111995', 1, NULL, 1, 1, '2025-08-01 23:19:55', '2025-08-01 23:21:07', NULL),
(6, 'Life Style', 'Life Style', 'Life Style', 'life-style', '20688da01b7e7ebz8BbjaJhsfHHfCpREzvn_28128-1754112027', 1, NULL, 1, 1, '2025-08-01 23:20:27', '2025-08-01 23:21:07', NULL),
(7, 'E-book', 'E-book', 'Ebook', 'ebook', '20688da0364bee5yybKLJbQKT2SKY5AGa4v_90528-1754112054', 1, NULL, 1, 1, '2025-08-01 23:20:54', '2025-08-01 23:21:07', NULL);

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

--
-- Dumping data for table `course_child_categories`
--

INSERT INTO `course_child_categories` (`id`, `course_category_id`, `course_sub_category_id`, `course_child_category_name`, `course_child_category_title`, `course_child_category_des`, `url`, `slug`, `creator_id`, `editor_id`, `status`, `public_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Science', 'Science', 'Science', 'science', '20688da25c14c8eWlovfW663382rM9lBpPU_69582-1754112604', 1, NULL, 1, 1, '2025-08-01 23:30:04', '2025-08-01 23:31:16', NULL),
(2, 1, 1, 'Commerce', 'Commerce', 'Commerce', 'commerce', '20688da26cd8921Hj4oCTPgKeurbp80FVqN_37923-1754112620', 1, NULL, 1, 1, '2025-08-01 23:30:20', '2025-08-01 23:31:16', NULL),
(3, 1, 1, 'Huminites', 'Huminites', 'Huminites', 'huminites', '20688da289be29a4Ww9IxXSe7dsB51iRxYC_21121-1754112649', 1, NULL, 1, 1, '2025-08-01 23:30:49', '2025-08-01 23:31:16', NULL);

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

--
-- Dumping data for table `course_enroments`
--

INSERT INTO `course_enroments` (`id`, `course_id`, `user_id`, `enrolled_at`, `enrollment_type`, `payment_id`, `slug`, `creator_id`, `editor_id`, `status`, `public_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, '2025-08-01 23:53:10', 'paid', 1, '20688da7c5b87a9GgfmTFST6X7eJYj5vcBL_35925-1754113989', NULL, NULL, 1, 0, '2025-08-01 23:53:10', '2025-08-01 23:53:10', NULL);

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

--
-- Dumping data for table `course_modules`
--

INSERT INTO `course_modules` (`id`, `course_id`, `user_id`, `title`, `description`, `sort_order`, `slug`, `creator_id`, `editor_id`, `status`, `public_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Chemistry 2026 – Course Module', '<h3 data-start=\"277\" data-end=\"318\"><strong data-start=\"284\" data-end=\"318\">Chemistry 2026 &ndash; Course Module</strong></h3>\r\n<h4 data-start=\"320\" data-end=\"367\">🔹 <strong data-start=\"328\" data-end=\"367\">Module 1: Fundamentals of Chemistry</strong></h4>\r\n<ol data-start=\"368\" data-end=\"588\">\r\n<li data-start=\"368\" data-end=\"413\">\r\n<p data-start=\"371\" data-end=\"413\">Introduction to Chemistry &amp; Its Branches</p>\r\n</li>\r\n<li data-start=\"414\" data-end=\"470\">\r\n<p data-start=\"417\" data-end=\"470\">Atomic Structure &amp; Discovery of Subatomic Particles</p>\r\n</li>\r\n<li data-start=\"471\" data-end=\"506\">\r\n<p data-start=\"474\" data-end=\"506\">Mole Concept and Stoichiometry</p>\r\n</li>\r\n<li data-start=\"507\" data-end=\"554\">\r\n<p data-start=\"510\" data-end=\"554\">Chemical Calculations: Moles, Mass, Volume</p>\r\n</li>\r\n<li data-start=\"555\" data-end=\"588\">\r\n<p data-start=\"558\" data-end=\"588\">Laws of Chemical Combination</p>\r\n</li>\r\n</ol>\r\n<hr data-start=\"590\" data-end=\"593\">\r\n<h4 data-start=\"595\" data-end=\"653\">🔹 <strong data-start=\"603\" data-end=\"653\">Module 2: Structure of Atom and Periodic Table</strong></h4>\r\n<ol data-start=\"654\" data-end=\"882\">\r\n<li data-start=\"654\" data-end=\"703\">\r\n<p data-start=\"657\" data-end=\"703\">Electronic Configuration and Quantum Numbers</p>\r\n</li>\r\n<li data-start=\"704\" data-end=\"751\">\r\n<p data-start=\"707\" data-end=\"751\">Periodic Table and Periodicity of Elements</p>\r\n</li>\r\n<li data-start=\"752\" data-end=\"776\">\r\n<p data-start=\"755\" data-end=\"776\">Modern Periodic Law</p>\r\n</li>\r\n<li data-start=\"777\" data-end=\"841\">\r\n<p data-start=\"780\" data-end=\"841\">Trends: Ionization Energy, Electronegativity, Atomic Radius</p>\r\n</li>\r\n<li data-start=\"842\" data-end=\"882\">\r\n<p data-start=\"845\" data-end=\"882\">Applications of Periodic Properties</p>\r\n</li>\r\n</ol>\r\n<hr data-start=\"884\" data-end=\"887\">\r\n<h4 data-start=\"889\" data-end=\"951\">🔹 <strong data-start=\"897\" data-end=\"951\">Module 3: Chemical Bonding and Molecular Structure</strong></h4>\r\n<ol data-start=\"952\" data-end=\"1155\">\r\n<li data-start=\"952\" data-end=\"981\">\r\n<p data-start=\"955\" data-end=\"981\">Ionic and Covalent Bonds</p>\r\n</li>\r\n<li data-start=\"982\" data-end=\"1018\">\r\n<p data-start=\"985\" data-end=\"1018\">Lewis Structures and Octet Rule</p>\r\n</li>\r\n<li data-start=\"1019\" data-end=\"1059\">\r\n<p data-start=\"1022\" data-end=\"1059\">VSEPR Theory and Molecular Geometry</p>\r\n</li>\r\n<li data-start=\"1060\" data-end=\"1107\">\r\n<p data-start=\"1063\" data-end=\"1107\">Hybridization and Molecular Orbital Theory</p>\r\n</li>\r\n<li data-start=\"1108\" data-end=\"1155\">\r\n<p data-start=\"1111\" data-end=\"1155\">Intermolecular Forces and Hydrogen Bonding</p>\r\n</li>\r\n</ol>\r\n<hr data-start=\"1157\" data-end=\"1160\">\r\n<h4 data-start=\"1162\" data-end=\"1217\">🔹 <strong data-start=\"1170\" data-end=\"1217\">Module 4: States of Matter &amp; Thermodynamics</strong></h4>\r\n<ol data-start=\"1218\" data-end=\"1423\">\r\n<li data-start=\"1218\" data-end=\"1255\">\r\n<p data-start=\"1221\" data-end=\"1255\">Gaseous State and Ideal Gas Laws</p>\r\n</li>\r\n<li data-start=\"1256\" data-end=\"1298\">\r\n<p data-start=\"1259\" data-end=\"1298\">Real Gases and van der Waals Equation</p>\r\n</li>\r\n<li data-start=\"1299\" data-end=\"1347\">\r\n<p data-start=\"1302\" data-end=\"1347\">Liquid State and Surface Tension, Viscosity</p>\r\n</li>\r\n<li data-start=\"1348\" data-end=\"1377\">\r\n<p data-start=\"1351\" data-end=\"1377\">Basics of Thermodynamics</p>\r\n</li>\r\n<li data-start=\"1378\" data-end=\"1423\">\r\n<p data-start=\"1381\" data-end=\"1423\">Enthalpy, Entropy, and Gibbs Free Energy</p>\r\n</li>\r\n</ol>\r\n<hr data-start=\"1425\" data-end=\"1428\">\r\n<h4 data-start=\"1430\" data-end=\"1483\">🔹 <strong data-start=\"1438\" data-end=\"1483\">Module 5: Chemical Kinetics &amp; Equilibrium</strong></h4>\r\n<ol data-start=\"1484\" data-end=\"1714\">\r\n<li data-start=\"1484\" data-end=\"1532\">\r\n<p data-start=\"1487\" data-end=\"1532\">Rate of Reaction and Factors Affecting Rate</p>\r\n</li>\r\n<li data-start=\"1533\" data-end=\"1570\">\r\n<p data-start=\"1536\" data-end=\"1570\">Rate Laws and Order of Reactions</p>\r\n</li>\r\n<li data-start=\"1571\" data-end=\"1616\">\r\n<p data-start=\"1574\" data-end=\"1616\">Activation Energy and Arrhenius Equation</p>\r\n</li>\r\n<li data-start=\"1617\" data-end=\"1671\">\r\n<p data-start=\"1620\" data-end=\"1671\">Chemical Equilibrium and Le Chatelier&rsquo;s Principle</p>\r\n</li>\r\n<li data-start=\"1672\" data-end=\"1714\">\r\n<p data-start=\"1675\" data-end=\"1714\">Ionic Equilibrium and pH Calculations</p>\r\n</li>\r\n</ol>\r\n<hr data-start=\"1716\" data-end=\"1719\">\r\n<h4 data-start=\"1721\" data-end=\"1779\">🔹 <strong data-start=\"1729\" data-end=\"1779\">Module 6: Organic &amp; Inorganic Chemistry Basics</strong></h4>\r\n<ol data-start=\"1780\" data-end=\"2027\">\r\n<li data-start=\"1780\" data-end=\"1835\">\r\n<p data-start=\"1783\" data-end=\"1835\">Introduction to Organic Chemistry and Nomenclature</p>\r\n</li>\r\n<li data-start=\"1836\" data-end=\"1880\">\r\n<p data-start=\"1839\" data-end=\"1880\">Hydrocarbons: Alkanes, Alkenes, Alkynes</p>\r\n</li>\r\n<li data-start=\"1881\" data-end=\"1922\">\r\n<p data-start=\"1884\" data-end=\"1922\">Functional Groups and Reaction Types</p>\r\n</li>\r\n<li data-start=\"1923\" data-end=\"1969\">\r\n<p data-start=\"1926\" data-end=\"1969\">General Principles of Inorganic Chemistry</p>\r\n</li>\r\n<li data-start=\"1970\" data-end=\"2027\">\r\n<p data-start=\"1973\" data-end=\"2027\">Group Chemistry: Alkali, Halogens, Transition Metals</p>\r\n</li>\r\n</ol>\r\n<hr data-start=\"2029\" data-end=\"2032\">\r\n<p data-start=\"2034\" data-end=\"2065\">✅ <strong data-start=\"2036\" data-end=\"2063\">Extras (Optional/Bonus)</strong></p>\r\n<ul data-start=\"2066\" data-end=\"2227\">\r\n<li data-start=\"2066\" data-end=\"2101\">\r\n<p data-start=\"2068\" data-end=\"2101\">Lab Safety and Practical Skills</p>\r\n</li>\r\n<li data-start=\"2102\" data-end=\"2129\">\r\n<p data-start=\"2104\" data-end=\"2129\">Environmental Chemistry</p>\r\n</li>\r\n<li data-start=\"2130\" data-end=\"2162\">\r\n<p data-start=\"2132\" data-end=\"2162\">Introduction to Biochemistry</p>\r\n</li>\r\n<li data-start=\"2163\" data-end=\"2227\">\r\n<p data-start=\"2165\" data-end=\"2227\">Chemistry in Industry (Fertilizers, Polymers, Pharmaceuticals)</p>\r\n</li>\r\n</ul>', 0, '20688da8de2bd3fNqFUWfQizoN7vHo2RzKc_67098-1754114270', NULL, NULL, 1, 1, '2025-08-01 23:57:50', '2025-08-01 23:57:50', NULL);

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
(1, 1, 1, 3000.00, NULL, 'BDT', 'one_time', NULL, NULL, '20688da6eeefd3fcZGkQdVgEWp0lMk1m3KG_14669-1754113774', NULL, NULL, 1, 1, '2025-08-01 23:49:34', '2025-08-01 23:49:34', NULL),
(2, 2, 1, 3000.00, NULL, 'BDT', 'one_time', NULL, NULL, '20688da7006a6fbKX52NAC1mCnrbIxy7Ntt_58765-1754113792', NULL, NULL, 1, 1, '2025-08-01 23:49:52', '2025-08-01 23:49:52', NULL),
(3, 3, 1, 3500.00, NULL, 'BDT', 'one_time', NULL, NULL, '20688da7136fd3fBo7MerpmukNm1wwxnBHN_38123-1754113811', NULL, NULL, 1, 1, '2025-08-01 23:50:11', '2025-08-01 23:50:11', NULL),
(4, 4, 1, 2000.00, NULL, 'BDT', 'one_time', NULL, NULL, '20688da72234376zhLYvzxbVxIlwyDaQ2pG_58798-1754113826', NULL, NULL, 1, 1, '2025-08-01 23:50:26', '2025-08-01 23:50:26', NULL),
(5, 5, 1, 6000.00, NULL, 'BDT', 'one_time', NULL, NULL, '20688da734d2394TrkvrwAJ7dgtJ2TZaBAu_65620-1754113844', NULL, NULL, 1, 1, '2025-08-01 23:50:44', '2025-08-01 23:50:44', NULL),
(6, 6, 1, 8000.00, NULL, 'BDT', 'one_time', NULL, NULL, '20688da747a0b9eS6siCtIr0JokFtDxaScD_46189-1754113863', NULL, NULL, 1, 1, '2025-08-01 23:51:03', '2025-08-01 23:51:03', NULL);

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
  `user_count` int(11) DEFAULT NULL,
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
-- Dumping data for table `course_quizes`
--

INSERT INTO `course_quizes` (`id`, `course_id`, `user_id`, `title`, `description`, `quize_time`, `pass_mark`, `start_at`, `end_at`, `is_downloadable`, `user_count`, `slug`, `creator_id`, `editor_id`, `status`, `public_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Fundamentals of Chemistry', 'Fundamentals of Chemistry', '40', 25, NULL, NULL, 0, NULL, '20688dad68dbb21tpB5VF2P0Rr2Rdii75Ka_11869-1754115432', NULL, NULL, 1, 1, '2025-08-02 00:17:12', '2025-08-02 00:17:12', NULL),
(2, 1, 1, 'Structure of Atom and Periodic Table', 'Structure of Atom and Periodic Table', '40', 25, NULL, NULL, 1, NULL, '20688dad7a08537u3zVSm6o9vvqm9KqDZ0I_62464-1754115450', NULL, NULL, 1, 1, '2025-08-02 00:17:30', '2025-08-02 00:17:30', NULL),
(3, 1, 1, 'Chemical Bonding and Molecular Structure', 'Chemical Bonding and Molecular Structure', '40', 25, NULL, NULL, 1, NULL, '20688dad8864f7eMNCEUeVWy1K33X8v1rY1_43256-1754115464', NULL, NULL, 1, 1, '2025-08-02 00:17:44', '2025-08-02 00:17:44', NULL),
(4, 1, 1, 'States of Matter & Thermodynamics', 'States of Matter & Thermodynamics', '40', 25, NULL, NULL, 1, NULL, '20688dad966a662YuoZITJnlafCODOFhl7u_89834-1754115478', NULL, NULL, 1, 1, '2025-08-02 00:17:58', '2025-08-02 00:17:58', NULL),
(5, 1, 1, 'Chemical Kinetics & Equilibrium', 'Chemical Kinetics & Equilibrium', '40', 25, NULL, NULL, 1, NULL, '20688dada6b3552sEb3oJ0hqCsaX0RW7beZ_33479-1754115494', NULL, NULL, 1, 1, '2025-08-02 00:18:14', '2025-08-02 00:18:14', NULL),
(6, 1, 1, 'Organic & Inorganic Chemistry Basics', 'Organic & Inorganic Chemistry Basics', '40', 25, NULL, NULL, 1, NULL, '20688dadb519629A8mbgFCXd2ywhKOB7sZj_41365-1754115509', NULL, NULL, 1, 1, '2025-08-02 00:18:29', '2025-08-02 00:18:29', NULL),
(7, 1, 1, 'Extras (Optional/Bonus)', 'Extras (Optional/Bonus)', '40', 25, NULL, NULL, 1, NULL, '20688dadc2398dfGBFsyALMFn8CvdZRDMmj_67838-1754115522', NULL, NULL, 1, 1, '2025-08-02 00:18:42', '2025-08-02 00:18:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `course_quize_qustions`
--

CREATE TABLE `course_quize_qustions` (
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
  `course_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rating` tinyint(4) NOT NULL COMMENT '1 to 5',
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

--
-- Dumping data for table `course_sub_categories`
--

INSERT INTO `course_sub_categories` (`id`, `course_category_id`, `course_sub_category_name`, `course_sub_category_title`, `course_sub_category_des`, `url`, `slug`, `creator_id`, `editor_id`, `status`, `public_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'SSC New Batch', 'SSC New Batch', 'SSC New Batch', 'ssc-new-batch', '20688da09852f67a0ts3fJCgPQWeH2rAbZx_73763-1754112152', 1, NULL, 1, 1, '2025-08-01 23:22:32', '2025-08-01 23:27:53', NULL),
(2, 1, 'JSC/JDC Preparation', 'JSC/JDC Preparation', 'JSC/JDC Preparation', 'jscjdc-preparation', '20688da0ad43d3bEiDXPzxy0uJWK0xZ5T8m_30507-1754112173', 1, NULL, 1, 1, '2025-08-01 23:22:53', '2025-08-01 23:27:53', NULL),
(3, 1, 'Job Preparation', 'Job Preparation', 'Job Preparation', 'job-preparation', '20688da0d62af303cqcY9t05lWTq7CL0ohq_86780-1754112214', 1, NULL, 1, 1, '2025-08-01 23:23:34', '2025-08-01 23:27:53', NULL),
(4, 1, 'Admission Preparation', 'Admission Preparation', 'Admission Preparation', 'admission-preparation', '20688da111b471eE7nvjT0JRJ4r5apU6v5a_10173-1754112273', 1, NULL, 1, 1, '2025-08-01 23:24:33', '2025-08-01 23:27:53', NULL),
(5, 2, 'Machen Learning', 'Machen Learning', 'Machen Learning', 'machen-learning', '20688da129c4ac9Uj43mRg6WEx4zCrDbi8I_59051-1754112297', 1, NULL, 1, 1, '2025-08-01 23:24:57', '2025-08-01 23:27:53', NULL),
(6, 2, 'Data Science', 'Data Science', 'Data Science', 'data-science', '20688da138b2555U9ILE99uXTP7O6Xl9cES_68108-1754112312', 1, NULL, 1, 1, '2025-08-01 23:25:12', '2025-08-01 23:27:53', NULL),
(7, 2, 'Algorithm', 'Algorithm', 'Algorithm', 'algorithm', '20688da14bc2f90QRoDIs4HgmPQehF8vnYe_61386-1754112331', 1, NULL, 1, 1, '2025-08-01 23:25:31', '2025-08-01 23:27:53', NULL),
(8, 2, 'Personality Development', 'Personality Development', 'Personality Development', 'personality-development', '20688da1624fafemfirmvM81vLB0elIpXSa_85810-1754112354', 1, NULL, 1, 1, '2025-08-01 23:25:54', '2025-08-01 23:27:53', NULL),
(9, 2, 'Business Development', 'Business Development', 'Business Development', 'business-development', '20688da17943656ahXRopKF0sTQk1Cny73S_42610-1754112377', 1, NULL, 1, 1, '2025-08-01 23:26:17', '2025-08-01 23:28:08', NULL),
(10, 3, 'C#', 'C#', 'C#', 'c', '20688da189e53bdIC7Tnuk10X1np4cHeI3H_30522-1754112393', 1, NULL, 1, 1, '2025-08-01 23:26:33', '2025-08-01 23:28:08', NULL),
(11, 3, 'Python', 'python', 'python', 'python', '20688da19d70e59rODTrtB6e3EtZmDLK3z3_56501-1754112413', 1, NULL, 1, 1, '2025-08-01 23:26:53', '2025-08-01 23:28:08', NULL),
(12, 3, '.NET', '.NET', '.NET', 'net', '20688da1a9e1f8aRIlJ8rA2ItxDosSFq3Cl_58189-1754112425', 1, NULL, 1, 1, '2025-08-01 23:27:05', '2025-08-01 23:28:08', NULL),
(13, 4, 'Graphics Design', 'Graphics Design', 'Graphics Design', 'graphics-design', '20688da1c449f60Ynw0XEoBPNHugvXu3NUg_82138-1754112452', 1, NULL, 1, 1, '2025-08-01 23:27:32', '2025-08-01 23:28:08', NULL);

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

--
-- Dumping data for table `course_topics`
--

INSERT INTO `course_topics` (`id`, `course_id`, `user_id`, `title`, `description`, `position`, `slug`, `creator_id`, `editor_id`, `status`, `public_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Class 01 :  Fundamentals of Chemistry', '<p>What is the Fundamentals of Chemistry&nbsp;</p>', 0, '20688da92eb7f5eX41GB3D7I2prTqOXlLAR_18461-1754114350', NULL, NULL, 1, 1, '2025-08-01 23:59:10', '2025-08-01 23:59:10', NULL),
(2, 1, 1, 'Structure of Atom and Periodic Table', '<p>What is the Structure of Atom and Periodic Table</p>', 0, '20688da944e15a9b8tfIgzNlKPDmHL2Xw2A_94306-1754114372', NULL, NULL, 1, 1, '2025-08-01 23:59:32', '2025-08-01 23:59:32', NULL),
(3, 1, 1, 'Chemical Bonding and Molecular Structure', '<p>Chemical Bonding and Molecular Structure</p>', 0, '20688da9536b6derhnsSwo4xY58SZtohGl1_94762-1754114387', NULL, NULL, 1, 1, '2025-08-01 23:59:47', '2025-08-01 23:59:47', NULL),
(4, 1, 1, 'States of Matter & Thermodynamics', '<p>States of Matter &amp; Thermodynamics</p>', 0, '20688da96545ff3Xo3FOSdRuXjFd9R1L3Ws_52208-1754114405', NULL, NULL, 1, 1, '2025-08-02 00:00:05', '2025-08-02 00:00:05', NULL),
(5, 1, 1, 'Chemical Kinetics & Equilibrium', '<p>&nbsp;Chemical Kinetics &amp; Equilibrium</p>', 0, '20688da972e988dBbpiL9RjQrQvCqgIU0dd_82439-1754114418', NULL, NULL, 1, 1, '2025-08-02 00:00:18', '2025-08-02 00:00:18', NULL),
(6, 1, 1, 'Organic & Inorganic Chemistry Basics', '<p>&nbsp;Organic &amp; Inorganic Chemistry Basics</p>', 0, '20688da97eb05eeh27ppGV3y63L2G9yU2jC_64598-1754114430', NULL, NULL, 1, 1, '2025-08-02 00:00:30', '2025-08-02 00:00:30', NULL),
(7, 1, 1, 'Extras (Optional/Bonus)', '<p>Extras (Optional/Bonus)</p>', 0, '20688da98cf19b6oxxqMo04lOha6uMH6KkH_60930-1754114444', NULL, NULL, 1, 1, '2025-08-02 00:00:44', '2025-08-02 00:00:44', NULL);

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

--
-- Dumping data for table `course_topic_videos`
--

INSERT INTO `course_topic_videos` (`id`, `topic_id`, `user_id`, `title`, `description`, `video_url`, `duration`, `video_type`, `position`, `is_preview`, `slug`, `creator_id`, `editor_id`, `status`, `public_status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 1, 'Introduction to Chemistry & Its Branches', '<p>Introduction to Chemistry &amp; Its Branches</p>', 'EGb_sedgppM', 130, 'youtube', 1, 1, '20688daa4ec3404DShMZmN3u36AfPDAqVjv_18265-1754114638', NULL, NULL, 1, 1, '2025-08-02 00:03:58', '2025-08-02 00:03:58', NULL),
(2, 1, 1, 'Atomic Structure & Discovery of Subatomic Particles', '<p>Atomic Structure &amp; Discovery of Subatomic Particles</p>', 'EGb_sedgppM', 130, 'youtube', 2, 0, '20688daac6411c2ywE3sFcECLK7K8FObCbE_56204-1754114758', NULL, NULL, 1, 1, '2025-08-02 00:05:58', '2025-08-02 00:05:58', NULL),
(3, 1, 1, 'Mole Concept and Stoichiometry', '<p>Mole Concept and Stoichiometry</p>', 'EGb_sedgppM', 130, 'youtube', 3, 0, '20688dab0c7fe39BYbIHKLazhXOPuqHNouZ_68361-1754114828', NULL, NULL, 1, 1, '2025-08-02 00:07:08', '2025-08-02 00:07:08', NULL),
(4, 1, 1, 'Chemical Calculations: Moles, Mass, Volume', '<p>Chemical Calculations: Moles, Mass, Volume</p>', 'EGb_sedgppM', 130, 'youtube', 4, 0, '20688dab2b1009eNwHhCrQKuv9YMHUCwwAr_75572-1754114859', NULL, NULL, 1, 1, '2025-08-02 00:07:39', '2025-08-02 00:07:39', NULL),
(5, 1, 1, 'Laws of Chemical Combination', '<p>Laws of Chemical Combination</p>', 'EGb_sedgppM', 130, 'youtube', 6, 0, '20688dab493fd3dbRNkgbFj1k9P3NGE3wWB_44062-1754114889', NULL, NULL, 1, 1, '2025-08-02 00:08:09', '2025-08-02 00:08:09', NULL),
(6, 2, 1, 'Electronic Configuration and Quantum Numbers', '<p>Electronic Configuration and Quantum Numbers</p>', 'EGb_sedgppM', 5, 'youtube', 5, 0, '20688dabb95ba5cCHyGmsk5Na2v4CyddyJk_92279-1754115001', NULL, NULL, 1, 1, '2025-08-02 00:10:01', '2025-08-02 00:10:01', NULL),
(7, 2, 1, 'Periodic Table and Periodicity of Elements', '<p>Periodic Table and Periodicity of Elements</p>', 'EGb_sedgppM', 5, 'youtube', 6, 0, '20688dabd4718d0zkSSzoaWCyLWnf7LqqM0_80370-1754115028', NULL, NULL, 1, 1, '2025-08-02 00:10:28', '2025-08-02 00:10:28', NULL),
(8, 2, 1, 'Modern Periodic Law', '<p>Modern Periodic Law</p>', 'EGb_sedgppM', NULL, 'youtube', 4, 0, '20688dabf0719d1Zj8ybtIXGFDxEhGnNnbB_43133-1754115056', NULL, NULL, 1, 1, '2025-08-02 00:10:56', '2025-08-02 00:10:56', NULL),
(9, 2, 1, 'Trends: Ionization Energy, Electronegativity, Atomic Radius', '<p>Trends: Ionization Energy, Electronegativity, Atomic Radius</p>', 'EGb_sedgppM', 5, 'youtube', 8, 0, '20688dac07f3bdaWQgKwEtfejF8jrZxZC6Z_97266-1754115079', NULL, NULL, 1, 1, '2025-08-02 00:11:19', '2025-08-02 00:11:19', NULL),
(10, 2, 1, 'Applications of Periodic Properties', '<p>Applications of Periodic Properties</p>', 'EGb_sedgppM', 130, 'youtube', 2, 1, '20688dac1e4c808IFsrF4sRarlv3ZCyCx7q_26236-1754115102', NULL, NULL, 1, 1, '2025-08-02 00:11:42', '2025-08-02 00:11:42', NULL),
(11, 3, 1, 'Ionic and Covalent Bonds', '<p>Ionic and Covalent Bonds</p>', 'EGb_sedgppM', 5, 'youtube', 10, 0, '20688dac4114f2ek9OAGWnFsPWln3WtzYi3_92306-1754115137', NULL, NULL, 1, 1, '2025-08-02 00:12:17', '2025-08-02 00:12:17', NULL);

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
(62, '2025_07_16_072251_create_course_quize_qustions_table', 1),
(63, '2025_07_16_074231_create_quize_answers_table', 1),
(64, '2025_07_16_074353_create_quize_results_table', 1),
(65, '2025_07_19_060943_create_messages_table', 1);

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
(1, 1, 1, 'SSLCommerz', NULL, 'Trans175411397856547261', '2508021153081yIFsYOhsLBKqVU', 'YSXR73139', 'BDT', 3000.00, 2925.00, 'VALID', 'online', 'BKASH-BKash', 'MOBILEBANKING', 'BKash Mobile Banking', NULL, '2508021153081FSelIyPgdRhxIO', '71c8f6349d543ac3be98672541171bf9', 'ff115522a1ef58fb4d04e3041564933edfc743da4113ad922846e81a273d304d', 'amount,bank_tran_id,base_fair,card_brand,card_issuer,card_issuer_country,card_issuer_country_code,card_no,card_sub_brand,card_type,currency,currency_amount,currency_rate,currency_type,error,risk_level,risk_title,status,store_amount,store_id,tran_date,tran_id,val_id,value_a,value_b,value_c,value_d', 'Safe', '0', 0, NULL, NULL, '2025-08-01 23:53:10', '127.0.0.1', NULL, '{\"amount\":\"3000.00\",\"bank_tran_id\":\"2508021153081FSelIyPgdRhxIO\",\"base_fair\":\"0.00\",\"card_brand\":\"MOBILEBANKING\",\"card_issuer\":\"BKash Mobile Banking\",\"card_issuer_country\":\"Bangladesh\",\"card_issuer_country_code\":\"BD\",\"card_no\":null,\"card_sub_brand\":\"Classic\",\"card_type\":\"BKASH-BKash\",\"currency\":\"BDT\",\"currency_amount\":\"3000.00\",\"currency_rate\":\"1.0000\",\"currency_type\":\"BDT\",\"error\":null,\"risk_level\":\"0\",\"risk_title\":\"Safe\",\"status\":\"VALID\",\"store_amount\":\"2925.00\",\"store_id\":\"ngo683aab7718d99\",\"tran_date\":\"2025-08-02 11:53:00\",\"tran_id\":\"Trans175411397856547261\",\"val_id\":\"2508021153081yIFsYOhsLBKqVU\",\"value_a\":null,\"value_b\":null,\"value_c\":null,\"value_d\":null,\"verify_sign\":\"71c8f6349d543ac3be98672541171bf9\",\"verify_sign_sha2\":\"ff115522a1ef58fb4d04e3041564933edfc743da4113ad922846e81a273d304d\",\"verify_key\":\"amount,bank_tran_id,base_fair,card_brand,card_issuer,card_issuer_country,card_issuer_country_code,card_no,card_sub_brand,card_type,currency,currency_amount,currency_rate,currency_type,error,risk_level,risk_title,status,store_amount,store_id,tran_date,tran_id,val_id,value_a,value_b,value_c,value_d\"}', 1, 1, '01787204898', 'Dhaka', 'Dhaka', 'Bangladesh', '2025-08-01 23:52:58', '2025-08-01 23:53:10', NULL);

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
  `answer_id` bigint(20) UNSIGNED NOT NULL,
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
(1, NULL, 1, 'App\\Models\\CourseCategory', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688d9fbf2326etMEgrPUOzyiDMRPq15VA_29118-1754111935', 1, NULL, 1, 0, '2025-08-01 23:18:56', '2025-08-01 23:18:56', NULL),
(2, NULL, 2, 'App\\Models\\CourseCategory', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688d9fcb547e0yewg4LCMpLNyskLtdDFh_42550-1754111947', 1, NULL, 1, 0, '2025-08-01 23:19:07', '2025-08-01 23:19:07', NULL),
(3, NULL, 3, 'App\\Models\\CourseCategory', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688d9fd82f635XU7dvXcacyFWK9BYCi9S_60588-1754111960', 1, NULL, 1, 0, '2025-08-01 23:19:20', '2025-08-01 23:19:20', NULL),
(4, NULL, 4, 'App\\Models\\CourseCategory', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688d9fe98c5b0VtMjYQ3rWiNeN9LE3ZzL_63018-1754111977', 1, NULL, 1, 0, '2025-08-01 23:19:37', '2025-08-01 23:19:37', NULL),
(5, NULL, 5, 'App\\Models\\CourseCategory', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688d9ffb48c50OjaHl0VOQH5rxvTFW5CZ_85085-1754111995', 1, NULL, 1, 0, '2025-08-01 23:19:55', '2025-08-01 23:19:55', NULL),
(6, NULL, 6, 'App\\Models\\CourseCategory', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688da01b7e7ebz8BbjaJhsfHHfCpREzvn_28128-1754112027', 1, NULL, 1, 0, '2025-08-01 23:20:27', '2025-08-01 23:20:27', NULL),
(7, NULL, 7, 'App\\Models\\CourseCategory', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688da0364bee5yybKLJbQKT2SKY5AGa4v_90528-1754112054', 1, NULL, 1, 0, '2025-08-01 23:20:54', '2025-08-01 23:20:54', NULL),
(8, NULL, 1, 'App\\Models\\CourseSubCategory', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688da09852f67a0ts3fJCgPQWeH2rAbZx_73763-1754112152', 1, NULL, 1, 0, '2025-08-01 23:22:32', '2025-08-01 23:22:32', NULL),
(9, NULL, 2, 'App\\Models\\CourseSubCategory', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688da0ad43d3bEiDXPzxy0uJWK0xZ5T8m_30507-1754112173', 1, NULL, 1, 0, '2025-08-01 23:22:53', '2025-08-01 23:22:53', NULL),
(10, NULL, 3, 'App\\Models\\CourseSubCategory', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688da0d62af303cqcY9t05lWTq7CL0ohq_86780-1754112214', 1, NULL, 1, 0, '2025-08-01 23:23:35', '2025-08-01 23:23:35', NULL),
(11, NULL, 4, 'App\\Models\\CourseSubCategory', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688da111b471eE7nvjT0JRJ4r5apU6v5a_10173-1754112273', 1, NULL, 1, 0, '2025-08-01 23:24:33', '2025-08-01 23:24:33', NULL),
(12, NULL, 5, 'App\\Models\\CourseSubCategory', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688da129c4ac9Uj43mRg6WEx4zCrDbi8I_59051-1754112297', 1, NULL, 1, 0, '2025-08-01 23:24:57', '2025-08-01 23:24:57', NULL),
(13, NULL, 6, 'App\\Models\\CourseSubCategory', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688da138b2555U9ILE99uXTP7O6Xl9cES_68108-1754112312', 1, NULL, 1, 0, '2025-08-01 23:25:12', '2025-08-01 23:25:12', NULL),
(14, NULL, 7, 'App\\Models\\CourseSubCategory', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688da14bc2f90QRoDIs4HgmPQehF8vnYe_61386-1754112331', 1, NULL, 1, 0, '2025-08-01 23:25:31', '2025-08-01 23:25:31', NULL),
(15, NULL, 8, 'App\\Models\\CourseSubCategory', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688da1624fafemfirmvM81vLB0elIpXSa_85810-1754112354', 1, NULL, 1, 0, '2025-08-01 23:25:54', '2025-08-01 23:25:54', NULL),
(16, NULL, 9, 'App\\Models\\CourseSubCategory', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688da17943656ahXRopKF0sTQk1Cny73S_42610-1754112377', 1, NULL, 1, 0, '2025-08-01 23:26:17', '2025-08-01 23:26:17', NULL),
(17, NULL, 10, 'App\\Models\\CourseSubCategory', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688da189e53bdIC7Tnuk10X1np4cHeI3H_30522-1754112393', 1, NULL, 1, 0, '2025-08-01 23:26:33', '2025-08-01 23:26:33', NULL),
(18, NULL, 11, 'App\\Models\\CourseSubCategory', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688da19d70e59rODTrtB6e3EtZmDLK3z3_56501-1754112413', 1, NULL, 1, 0, '2025-08-01 23:26:53', '2025-08-01 23:26:53', NULL),
(19, NULL, 12, 'App\\Models\\CourseSubCategory', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688da1a9e1f8aRIlJ8rA2ItxDosSFq3Cl_58189-1754112425', 1, NULL, 1, 0, '2025-08-01 23:27:05', '2025-08-01 23:27:05', NULL),
(20, NULL, 13, 'App\\Models\\CourseSubCategory', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688da1c449f60Ynw0XEoBPNHugvXu3NUg_82138-1754112452', 1, NULL, 1, 0, '2025-08-01 23:27:32', '2025-08-01 23:27:32', NULL),
(21, NULL, 1, 'App\\Models\\CourseChildCategory', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688da25c14c8eWlovfW663382rM9lBpPU_69582-1754112604', 1, NULL, 1, 0, '2025-08-01 23:30:04', '2025-08-01 23:30:04', NULL),
(22, NULL, 2, 'App\\Models\\CourseChildCategory', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688da26cd8921Hj4oCTPgKeurbp80FVqN_37923-1754112620', 1, NULL, 1, 0, '2025-08-01 23:30:20', '2025-08-01 23:30:20', NULL),
(23, NULL, 3, 'App\\Models\\CourseChildCategory', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688da289be29a4Ww9IxXSe7dsB51iRxYC_21121-1754112649', 1, NULL, 1, 0, '2025-08-01 23:30:49', '2025-08-01 23:30:49', NULL),
(24, 1, 1, 'App\\Models\\Course', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688da42fb497dpN9fXeI8dwiCbiKtjQ3R_60744-1754113071', NULL, NULL, 1, 0, '2025-08-01 23:38:06', '2025-08-01 23:38:06', NULL),
(25, 1, 2, 'App\\Models\\Course', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688da46057d55TzJVyyCIc03BPx6j9OPj_54687-1754113120', NULL, NULL, 1, 0, '2025-08-01 23:38:41', '2025-08-01 23:38:41', NULL),
(26, 1, 3, 'App\\Models\\Course', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688da48fa7230SKeK0suqrNZaBgGX3LGs_33725-1754113167', NULL, NULL, 1, 0, '2025-08-01 23:39:29', '2025-08-01 23:39:29', NULL),
(27, 1, 4, 'App\\Models\\Course', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688da4b5cf3b8uJVYrOlHTyqYefbjQFJr_10227-1754113205', NULL, NULL, 1, 0, '2025-08-01 23:40:07', '2025-08-01 23:40:07', NULL),
(28, 1, 5, 'App\\Models\\Course', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688da4e45514bXTXpdRJj4YyeS45zWHKT_87832-1754113252', NULL, NULL, 1, 0, '2025-08-01 23:40:55', '2025-08-01 23:40:55', NULL),
(29, 1, 6, 'App\\Models\\Course', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688da51e0a246U1R2FZVYB9vkmORmAJeX_12463-1754113310', NULL, NULL, 1, 0, '2025-08-01 23:41:51', '2025-08-01 23:41:51', NULL),
(30, 1, 7, 'App\\Models\\Course', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688da567d734cRs3eq6z9JizP6OLszdQY_34385-1754113383', NULL, NULL, 1, 0, '2025-08-01 23:43:05', '2025-08-01 23:43:05', NULL),
(31, 1, 8, 'App\\Models\\Course', NULL, NULL, NULL, 'index, follow', NULL, NULL, NULL, NULL, NULL, NULL, 'website', 'en_US', 'summary_large_image', NULL, NULL, NULL, NULL, 'article', NULL, NULL, NULL, '20688da635d7ee6rfTwCN7jt2GhHLtz2230_44923-1754113589', NULL, NULL, 1, 0, '2025-08-01 23:46:31', '2025-08-01 23:46:31', NULL);

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
(1, 'Md Razu Hosssain Raj', 'razu@gmail.com', NULL, '$2y$12$Y4jXPs3a7I8cjFwqEhDyruDaZU2.K3vm1GDZRFtgvLaRbBQfOo57S', 1, 'regular', NULL, NULL, '2025-08-01 23:16:57', '2025-08-01 23:16:57');

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
-- Indexes for table `course_quize_qustions`
--
ALTER TABLE `course_quize_qustions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_quize_qustions_quize_id_foreign` (`quize_id`),
  ADD KEY `course_quize_qustions_user_id_foreign` (`user_id`);

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
-- Indexes for table `google_tag_managers`
--
ALTER TABLE `google_tag_managers`
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
-- Indexes for table `preloaders`
--
ALTER TABLE `preloaders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quize_answers`
--
ALTER TABLE `quize_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quize_answers_answer_id_foreign` (`answer_id`),
  ADD KEY `quize_answers_user_id_foreign` (`user_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `copy_rights`
--
ALTER TABLE `copy_rights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course_attchments`
--
ALTER TABLE `course_attchments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_batches`
--
ALTER TABLE `course_batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_categories`
--
ALTER TABLE `course_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_child_categories`
--
ALTER TABLE `course_child_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_enroments`
--
ALTER TABLE `course_enroments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `course_prices`
--
ALTER TABLE `course_prices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `course_progress`
--
ALTER TABLE `course_progress`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_quizes`
--
ALTER TABLE `course_quizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_quize_qustions`
--
ALTER TABLE `course_quize_qustions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_reviews`
--
ALTER TABLE `course_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `course_topics`
--
ALTER TABLE `course_topics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `course_topic_videos`
--
ALTER TABLE `course_topic_videos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
-- AUTO_INCREMENT for table `google_tag_managers`
--
ALTER TABLE `google_tag_managers`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints for table `course_quize_qustions`
--
ALTER TABLE `course_quize_qustions`
  ADD CONSTRAINT `course_quize_qustions_quize_id_foreign` FOREIGN KEY (`quize_id`) REFERENCES `course_quizes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_quize_qustions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `quize_answers`
--
ALTER TABLE `quize_answers`
  ADD CONSTRAINT `quize_answers_answer_id_foreign` FOREIGN KEY (`answer_id`) REFERENCES `course_quize_qustions` (`id`) ON DELETE CASCADE,
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
