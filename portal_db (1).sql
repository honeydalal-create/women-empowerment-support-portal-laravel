-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306:3306
-- Generation Time: Apr 24, 2026 at 08:00 AM
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
-- Database: `portal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `profile_photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `full_name`, `email`, `password`, `contact_no`, `address`, `city`, `state`, `profile_photo`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$12$DbqbCcW7HeZjUv8qHWXNXucTVDZ48pUSlXd/gxOE2l33txhbkTQKi', '5689742369', 'Mumbai Head Office', 'Mumbai', 'Maharashtra', 'admin_profiles/h0af31pqseMgUK3SuK37WNslbXMmYrsWAPCK4urj.png', '2025-12-29 08:17:44', '2026-03-11 20:40:24');

-- --------------------------------------------------------

--
-- Table structure for table `admin_password_resets`
--

CREATE TABLE `admin_password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `category` varchar(50) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `email`, `phone`, `address`, `logo`, `password`, `created_at`, `updated_at`) VALUES
(1, 'EmpowerHer Inc', 'company@gmail.com', '5689741236', '124 Main Street, surat', 'storage/company_logos/0lkHzWC7kVEsVSUnhxxBdFHDG7K3PSHF1K8U45xk.png', '$2y$12$fXmmLrWd1j9QZ532ACWTyuU1/uMCH0GARsKsuwIZeGa2gfG1NRFDK', '2024-01-01 08:41:16', '2026-02-16 07:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `admin_reply` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `user_id`, `name`, `email`, `phone`, `subject`, `message`, `status`, `admin_reply`, `created_at`, `updated_at`) VALUES
(1, 1, 'ketki ketanbhai patel', 'ketki@gmail.com', '2356897412', 'Delay in Training Certificate', 'I have applied for my certificate, but it has not been issued yet.\r\nKindly look into the matter and provide the certificate at the earliest.', 'replied', 'Thank you for contacting us.  \r\nYour certificate request is under process and will be issued soon.  \r\nWe appreciate your patience.', '2025-12-29 09:06:48', '2025-12-29 23:33:27'),
(4, 2, 'tisha rajkumar mehta', 'tisha@gmail.com', '5689741236', 'Delay in application approval', 'Hello Support Team,\r\n\r\nI have submitted my application on the portal,\r\nbut the status is still pending for a long time.\r\nKindly check and update me regarding the same.\r\n\r\nThank you.', 'replied', 'Your application is under process.\r\nWe will update you shortly.\r\nThank you for your patience.', '2026-01-06 03:07:27', '2026-01-06 03:12:09'),
(5, 2, 'tisha rajkumar mehta', 'tisha@gmail.com', '5689741236', 'Delay in application approval', 'ghjkl;', 'pending', NULL, '2026-03-09 21:27:36', '2026-03-09 21:27:36');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `admin_reply` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `mobile`, `message`, `admin_reply`, `created_at`, `updated_at`) VALUES
(1, 'ketki ketanbhai patel', 'ketki@gmail.com', '2356897412', 'I need information about women safety helpline services.', 'For women safety support, please call 181 or 112 in emergency situations.\r\nWe are here to help.', '2025-12-30 00:03:58', '2025-12-30 00:24:08'),
(2, 'mira mahesh petal', 'mira@gmail.com', '5689741236', 'I want information about training and registration.', 'Thank you for your interest.\r\nPlease register on our portal to view and apply for available training programs.', '2025-12-30 00:40:16', '2025-12-30 00:40:47');

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
-- Table structure for table `female_users`
--

CREATE TABLE `female_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL DEFAULT '1',
  `gender` enum('Female','Other') NOT NULL DEFAULT 'Female',
  `date_of_birth` date NOT NULL DEFAULT '2000-01-01',
  `city` varchar(50) NOT NULL DEFAULT '1',
  `state` varchar(50) NOT NULL DEFAULT '1',
  `occupation` varchar(100) NOT NULL DEFAULT '1',
  `address` text NOT NULL DEFAULT '1',
  `profile_photo` varchar(255) NOT NULL DEFAULT '1',
  `password` varchar(255) NOT NULL,
  `role` enum('Visitor','User','Admin') NOT NULL DEFAULT 'Visitor',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `female_users`
--

INSERT INTO `female_users` (`id`, `name`, `email`, `phone`, `gender`, `date_of_birth`, `city`, `state`, `occupation`, `address`, `profile_photo`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'ketki ketanbhai patel', 'ketki@gmail.com', '2356897412', 'Female', '1994-12-25', 'jaipur', 'rajsthan', 'house-wife', 'dfghj', 'photos/1q7cQkBoXP8FFyPwOBUHyPGxHyB7LhKoR0XQBOWH.jpg', '$2y$12$zrLL/hlWjocVGr2ofymUP.XdaT3tT8k4dd5Rc5XSQZye82oa7Nszq', 'User', '2025-12-29 08:22:15', '2026-02-18 08:01:09'),
(2, 'tisha rajkumar mehta', 'tisha@gmail.com', '5689741236', 'Female', '1999-06-27', 'surat', 'gujart', 'bussness', 'mani park', 'photos/xh5kmOApZHnp2cJRdecxVP3jGPf8WiPQLwnmO9CP.jpg', '$2y$12$KI7C0zlKmiw7D5wDdE8aVOtxgZK5dV9zxMRWedTbJrkHHE2EegtTG', 'User', '2025-12-29 23:27:53', '2026-02-18 08:03:15'),
(4, 'Maya kiran mehta', 'maya@gmail.com', '7896321456', 'Female', '2000-02-05', 'Mumbai', 'Maharashtra', 'bussness', 'kran prak', 'profile_photos/J6mWQfSJ9LxiwokP2zEn3tAmVsIFUMMSvYQdACyU.png', '$2y$12$sURIHsYs6IHKW.Evu4EkFOXwm5vFv3WbXZ0Vx3VPetrMjKtHJwBJm', 'User', '2026-01-01 06:20:17', '2026-02-18 08:04:50'),
(5, 'riya rajubhai Verma', 'riya@gmail.com', '01234567890', 'Female', '2001-12-12', 'surat', 'gujarat', 'house-wife', 'dsfghukl', 'profile_photos/iRtTXDJ7hP2h1iRl6q1IgVuDy0YyWLLsgvIEZpG0.jpg', '$2y$12$LLamhih2vDaUvccdmlqcr.n5h0kczV4nl53uqp24wuk2o0XPI.BMC', 'User', '2026-03-16 20:40:42', '2026-03-16 20:40:42'),
(6, 'riya rajubhai Verma', 'riya@example.com', '01234567890', 'Female', '2001-12-12', 'surat', 'gujarat', 'house-wife', 'dsfghukl', 'profile_photos/sNbHV3CTDdi3GzqSBWNhnHGIHwy5PtiHdj3AZXMg.jpg', '$2y$12$Ag59cfs5in8Tgxhr52OYMev7TpeHRoyEWoxlbO4tM25cxJZD29dSq', 'User', '2026-03-16 20:41:23', '2026-03-16 20:41:23');

-- --------------------------------------------------------

--
-- Table structure for table `helpline_numbers`
--

CREATE TABLE `helpline_numbers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(20) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `helpline_numbers`
--

INSERT INTO `helpline_numbers` (`id`, `name`, `number`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Women Helpline', '1091', 'Support for women in danger or distress', '2026-01-01 04:57:52', '2026-01-01 04:57:52'),
(2, 'Domestic Violence', '181', 'Support for domestic abuse victims', '2026-01-01 05:09:17', '2026-01-01 05:09:17'),
(3, 'Child Helpline', '1098', 'Support for children in danger or abuse cases', '2026-01-01 05:09:49', '2026-01-01 05:09:49'),
(4, 'Police Emergency', '100', '24x7 helpline for instant police help in emergencies.', '2026-01-01 05:10:19', '2026-01-01 05:10:19'),
(5, 'Ambulance', '108', 'Medical emergency ambulance service', '2026-01-01 05:10:48', '2026-01-01 05:10:48'),
(6, 'Cyber Crime', '1930', 'Report cyber harassment and online fraud', '2026-01-01 05:11:18', '2026-01-01 05:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `salary` varchar(100) DEFAULT NULL,
  `skills` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `company`, `location`, `salary`, `skills`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Front-End Web Developer', 'EmpowerHer Inc', 'Mumbai', '₹20,000 - ₹40,000 per month', 'HTML  CSS  JavaScript  React', 'Responsible for developing user-friendly web interfaces using HTML, CSS, JavaScript, and modern frameworks like React. Collaborate with designers and backend developers to create responsive web applications.', 'active', '2025-12-30 07:43:44', '2026-01-04 08:08:47'),
(2, 'Digital Marketing Assistant', 'EmpowerHer Inc', 'Mumbai', '₹25,000 - ₹40,000 per month', 'Communication, Organization, MS Office, Scheduling, Documentation', 'Assist in planning and executing digital marketing campaigns, manage social media content, track analytics, and support SEO/SEM strategies to increase brand presence online.', 'active', '2025-12-30 08:20:54', '2026-01-04 08:08:34'),
(3, 'Office Executive', 'EmpowerHer Inc', 'Mumbai', '15,000 – ₹22,000 per month', 'Communication, Organization, MS Office, Scheduling, Documentation', 'Handle daily office operations including documentation, scheduling meetings, managing correspondence, and supporting administrative tasks to ensure smooth workflow.', 'active', '2025-12-30 08:55:37', '2026-01-04 08:08:26'),
(4, 'Fashion Designer (Fresher)', 'EmpowerHer Inc', 'Mumbai', '₹18,000 - ₹30,000 per month', 'Tailoring,Creativity,Sketching', '**More short version:**\r\n\r\nWe need a creative Fashion Designer (Fresher) with an interest in fashion trends, basic designing skills, and a passion for clothing design.', 'active', '2025-12-30 09:11:16', '2026-01-04 08:08:18'),
(7, 'Online Tutor (English/Maths/Computer)', 'EmpowerHer Inc', 'Work from Home', '₹10,000 – ₹30,000 per month', 'Teaching, Communication, Patience, Subject Knowledge', 'Conduct online classes for students in your preferred subject. Flexible timings to balance home responsibilities.', 'active', '2026-01-04 08:07:45', '2026-01-04 08:07:45'),
(8, 'Content Writer', 'EmpowerHer Inc', 'Work from Home', '₹15,000 – ₹25,000 per month', 'Creative Writing, Blogging, SEO, Microsoft Word', 'Write articles, blogs, and web content on various topics. Flexible hours, can work from home.', 'active', '2026-01-04 08:10:06', '2026-01-04 08:11:57');

-- --------------------------------------------------------

--
-- Table structure for table `job_applications`
--

CREATE TABLE `job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `job_title` varchar(255) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text DEFAULT NULL,
  `resume` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_applications`
--

INSERT INTO `job_applications` (`id`, `user_id`, `name`, `job_title`, `company_name`, `phone`, `email`, `message`, `resume`, `status`, `created_at`, `updated_at`) VALUES
(16, 1, 'ketki ketanbhai patel', 'Content Writer', 'EmpowerHer Inc', '2356897412', 'ketki@gmail.com', 'I am interested in the Content Writer position.\r\nI have basic writing skills and passion for content creation.\r\nPlease check my resume.', 'resumes/XDL8JXwTlH4DyccC4SQP5ba4K8jTyXhk4GLCfMoT.docx', 'Hired', '2025-03-05 00:26:01', '2026-01-05 00:26:47'),
(17, 4, 'Maya kiran mehta', 'Front-End Web Developer', 'EmpowerHer Inc', '7896321456', 'maya@gmail.com', 'I am interested in the Front-End Web Developer role.\r\nI have basic knowledge of HTML, CSS, and JavaScript.\r\nPlease review my resume.', 'resumes/zUMjrpVXJxDLrZraYmm46qO0GOteCUkci9mjjwQq.docx', 'Rejected', '2025-07-11 00:28:15', '2026-01-05 00:32:39'),
(18, 4, 'Maya kiran mehta', 'Digital Marketing Assistant', 'EmpowerHer Inc', '7896321456', 'maya@gmail.com', 'I am a fresher and interested in Digital Marketing.\r\nI am familiar with social media platforms and eager to learn.', 'resumes/zdd0K8nE1adfCnpHYPpXPtigFyZk5gSl1UTkyjJ6.docx', 'Hired', '2025-01-05 01:17:54', '2025-01-05 01:18:07'),
(19, 2, 'tisha rajkumar mehta', 'Office Executive', 'EmpowerHer Inc', '5689741236', 'tisha@gmail.com', 'Hello Sir/Madam,\r\nI am applying for the Office Executive position.\r\nI have good communication skills and basic computer knowledge.\r\nKindly consider my application.\r\nThank you.', 'resumes/RDQVIGouKwLCzTSOlpeGCluomzq6CsehsQCVlaed.docx', 'Hired', '2026-01-06 03:05:53', '2026-01-06 03:08:57'),
(20, 6, 'riya rajubhai Verma', 'Fashion Designer (Fresher)', 'EmpowerHer Inc', '01234567890', 'riya@example.com', 'VCVBN', 'resumes/KoizcmEOBfSOze4aOgt6U0RiBxQhyQDsZe11O8CA.docx', 'Hired', '2026-03-16 20:42:52', '2026-03-16 20:46:55');

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
-- Table structure for table `job_listings`
--

CREATE TABLE `job_listings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(150) NOT NULL,
  `company` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `salary` varchar(50) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
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
(4, '2025_12_21_052450_create_job_listings_table', 1),
(5, '2025_12_21_052639_create_articles_table', 1),
(6, '2025_12_21_053240_create_user_job_applications_table', 1),
(7, '2025_12_21_053421_create_helpline_numbers_table', 1),
(8, '2025_12_21_062900_create_female_users_table', 1),
(9, '2025_12_22_133155_create_training_applications_table', 1),
(10, '2025_12_22_161149_create_training_certificates_table', 1),
(11, '2025_12_23_151242_create_job_applications_table', 1),
(12, '2025_12_24_125357_create_complaints_table', 1),
(13, '2025_12_25_040254_create_resumes_table', 1),
(14, '2025_12_26_071022_create_admins_table', 1),
(15, '2025_12_27_062928_create_admin_password_resets_table', 1),
(16, '2025_12_29_044155_reate_trainings_table', 1),
(17, '2025_12_29_122740_add_status_to_training_applications_table', 1),
(18, '2025_12_29_132510_create_training_certificates_table', 2),
(19, '2025_12_29_141723_create_training_applications_table', 3),
(20, '2025_12_29_142422_create_training_certificates_table', 4),
(21, '2025_12_30_052818_create_contacts_table', 5),
(22, '2025_12_30_123307_create_jobs_table', 6),
(23, '2025_12_30_150443_add_status_to_job_applications_table', 7),
(24, '2026_01_01_061216_create_safety_tips_table', 8),
(25, '2026_01_01_101916_create_helpline_numbers_table', 9),
(26, '2026_01_02_134128_create_companies__table', 10),
(27, '2026_01_03_141258_create_training_applications_table', 11);

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
-- Table structure for table `resumes`
--

CREATE TABLE `resumes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `female_user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resumes`
--

INSERT INTO `resumes` (`id`, `female_user_id`, `name`, `email`, `resume`, `created_at`, `updated_at`) VALUES
(1, 1, 'ketki ketanbhai patel', 'ketki@gmail.com', 'resumes/Xso17G239xjDvG00e5cx3iBnBgBxKlEsJ7OPr1WG.docx', '2025-12-29 08:57:22', '2025-12-31 06:59:24'),
(2, 2, 'tisha rajkumar mehta', 'tisha@gmail.com', 'resumes/rcNLWLuZ5TFzmT5LqB0fnQjexVXRRdbuHdW0xK0w.docx', '2025-12-29 23:30:41', '2025-12-29 23:30:41');

-- --------------------------------------------------------

--
-- Table structure for table `safety_tips`
--

CREATE TABLE `safety_tips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `safety_tips`
--

INSERT INTO `safety_tips` (`id`, `title`, `description`, `photo`, `created_at`, `updated_at`) VALUES
(1, 'Stay Alert', 'Avoid earphones when walking alone.', 'safety_tips/ylkkaypt6OkssXQNIm4om8QLDug59g2y9QZjlAWo.jpg', '2026-01-01 00:46:53', '2026-01-01 04:07:26'),
(2, 'Use Safety Apps', 'Enable SOS apps to alert family instantly', 'safety_tips/Qxvu8ao2s7XxZqBakESqwkyBCo66GIh3MMBWoPv3.jpg', '2026-01-01 03:39:26', '2026-01-01 04:21:45'),
(3, 'Safe Routes', 'Choose crowded, well-lit streets.', 'safety_tips/JIHmiOwTMnUZiwikfsiEduhJvZL1KOUSKdRv5cA6.jpg', '2026-01-01 03:41:12', '2026-01-01 04:18:20'),
(4, 'Share Travel Details', 'Share cab details with a trusted friend.', 'safety_tips/e5IocAkA2yrAC1MLlrH890HiF6FiGOKfRBvu67Uj.jpg', '2026-01-01 03:41:43', '2026-01-01 04:20:42'),
(5, 'Carry Tools', 'Carry pepper spray or a whistle.', 'safety_tips/3R5h4ghi6ls63YYGRp0rtAZVCt5Wx69UHbbYkWum.jpg', '2026-01-01 04:05:12', '2026-01-01 04:30:05'),
(6, 'Emergency Numbers', '100 – Police  |  1091 – Women Helpline', 'safety_tips/G39lggHCN1IynIXdBdkil8be8uccnXC6TJucpQNY.jpg', '2026-01-01 04:06:03', '2026-01-01 04:24:42');

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

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('hy6BP7uPnM3QB9pE6PxwE1ClbfjKoa3SphiN4W16', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36 Edg/147.0.0.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSUFJWWdqMlNlTXNkYVl6NG1XVUFobFJRVTkxckk0cTNNaUJURkFBRCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jb21wYW55L2xvZ2luIjtzOjU6InJvdXRlIjtzOjEzOiJjb21wYW55LmxvZ2luIjt9fQ==', 1776491866);

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `trainings`
--

INSERT INTO `trainings` (`id`, `title`, `duration`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Basic Computer Training', '2  week', 'Learn MS Office, Email,Internet Skills & Basic Operations', 'trainings/mJvHZ5cXRC1bdYsRv6jWvjHkq9uPbFc7hzs3inxc.png', '2025-12-29 09:09:04', '2026-01-03 07:34:31'),
(2, 'Soft Skills & Communication', '1 month', 'Improve Confidence,Speaking Skills Personality', 'trainings/HMPTb31iMHt7katv29VN5WzIUE2Z3RE4QWUWqC6V.jpg', '2025-12-30 23:44:29', '2025-12-30 23:44:29'),
(3, 'Tailoring & Stitching', '6 month', 'learn fashion basics, stitching techniques S boutique setup', 'trainings/878aJUOJfXOCdhBz5jcpchGTEQL00tvjbZy46T6A.jpg', '2025-12-30 23:48:33', '2025-12-30 23:48:33'),
(4, 'Beauty & Wellness', '4 month', 'Makeup, groomning, skincore & salon techniques', 'trainings/tDXb9vYT7AxUZPAGtxLupBEaY68OUar66VF71Gyb.jpg', '2025-12-30 23:49:42', '2025-12-30 23:49:42'),
(5, 'Digital Marketing', '6 month', 'SEO, social redia marketing, brandling & online growth', 'trainings/UyAbb94hjUU8RsoVXBGYnA8eE8NVqBfmpxNtmXWk.jpg', '2025-12-30 23:51:13', '2025-12-30 23:51:13'),
(6, 'Cooking &Baking', '2 month', 'Learn bakery basics, food preparction S presentation', 'trainings/Y7JGSfpDTrfwKwjKFC3BcXIWbOyMEo2hkuegHuNl.jpg', '2025-12-30 23:51:53', '2025-12-30 23:51:53'),
(7, 'Handicrafts & Art', '1 month', 'DrY crofts, painting hondrade products & creativity', 'trainings/kUQZZG2UCvaChjjAfzBibSXOwHiG70CGE2wdL6Vt.jpg', '2025-12-30 23:52:34', '2025-12-30 23:52:34'),
(8, 'Entrepreneurship Training', '4 month', 'startup bosics, finonciol literacy & business plonning.', 'trainings/tfmjTItHEBi4N7x41az9O2rTrVxgTfyw86vrmRWg.jpg', '2025-12-30 23:53:27', '2025-12-30 23:53:27'),
(9, 'Self-Defense Training', '2  week', 'Karate moves, sotety techniques & contidence building', 'trainings/5H1jJ6iTG9Q3JovKw7NM00Cy6inBA6L8jctAkQxx.jpg', '2025-12-30 23:54:09', '2026-01-03 07:35:50');

-- --------------------------------------------------------

--
-- Table structure for table `training_applications`
--

CREATE TABLE `training_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `training_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `payment_mode` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training_applications`
--

INSERT INTO `training_applications` (`id`, `user_id`, `training_id`, `name`, `email`, `phone`, `payment_mode`, `status`, `created_at`, `updated_at`) VALUES
(4, 1, 3, 'ketki ketanbhai patel', 'ketki@gmail.com', '2356897412', 'Cash', 'approved', '2026-01-04 08:14:14', '2026-01-05 00:15:02'),
(5, 4, 5, 'Maya kiran mehta', 'maya@gmail.com', '7896321456', 'Cash', 'rejected', '2026-01-05 01:40:55', '2026-01-05 01:41:04'),
(6, 2, 2, 'tisha rajkumar mehta', 'tisha@gmail.com', '5689741236', 'Cash', 'approved', '2026-01-06 03:00:39', '2026-01-06 03:08:17'),
(7, 2, 2, 'tisha rajkumar mehta', 'tisha@gmail.com', '5689741236', 'Cash', 'approved', '2026-01-06 10:16:46', '2026-01-06 10:19:52'),
(8, 6, 2, 'riya rajubhai Verma', 'riya@example.com', '01234567890', 'Cash', 'approved', '2026-03-16 20:41:52', '2026-03-16 20:45:31'),
(9, 2, 2, 'tisha rajkumar mehta', 'tisha@gmail.com', '5689741236', 'Cash', 'approved', '2026-04-17 05:53:54', '2026-04-17 05:56:44');

-- --------------------------------------------------------

--
-- Table structure for table `training_certificates`
--

CREATE TABLE `training_certificates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `training_program` varchar(255) NOT NULL,
  `certificate_file` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `training_certificates`
--

INSERT INTO `training_certificates` (`id`, `application_id`, `user_id`, `training_program`, `certificate_file`, `created_at`, `updated_at`) VALUES
(12, 4, 1, 'Tailoring & Stitching', '1767591923_HONEYDALAL HallTicket.pdf', '2026-01-05 00:15:23', '2026-01-05 00:15:23'),
(13, 6, 2, 'Soft Skills & Communication', '1767688717_HONEYDALAL HallTicket.pdf', '2026-01-06 03:08:37', '2026-01-06 03:08:37'),
(14, 7, 2, 'Soft Skills & Communication', '1767714619_HARVIDALAL HallTicket.pdf', '2026-01-06 10:20:19', '2026-01-06 10:20:19'),
(15, 8, 6, 'Soft Skills & Communication', '1773713779_INTERNSHIP DOCUMENTATION 1.pdf', '2026-03-16 20:46:19', '2026-03-16 20:46:19');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_job_applications`
--

CREATE TABLE `user_job_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `job_id` bigint(20) UNSIGNED NOT NULL,
  `resume_file` varchar(255) NOT NULL,
  `status` enum('Applied','Shortlisted','Rejected','Hired') NOT NULL DEFAULT 'Applied',
  `photo` varchar(255) DEFAULT NULL,
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
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_email_unique` (`email`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `complaints_user_id_foreign` (`user_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `female_users`
--
ALTER TABLE `female_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `female_users_email_unique` (`email`);

--
-- Indexes for table `helpline_numbers`
--
ALTER TABLE `helpline_numbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_applications_user_id_foreign` (`user_id`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job_listings`
--
ALTER TABLE `job_listings`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `resumes`
--
ALTER TABLE `resumes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `resumes_female_user_id_foreign` (`female_user_id`);

--
-- Indexes for table `safety_tips`
--
ALTER TABLE `safety_tips`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training_applications`
--
ALTER TABLE `training_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `training_applications_user_id_foreign` (`user_id`),
  ADD KEY `training_applications_training_id_foreign` (`training_id`);

--
-- Indexes for table `training_certificates`
--
ALTER TABLE `training_certificates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `training_certificates_application_id_foreign` (`application_id`),
  ADD KEY `training_certificates_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_job_applications`
--
ALTER TABLE `user_job_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_job_applications_user_id_foreign` (`user_id`),
  ADD KEY `user_job_applications_job_id_foreign` (`job_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_password_resets`
--
ALTER TABLE `admin_password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `female_users`
--
ALTER TABLE `female_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `helpline_numbers`
--
ALTER TABLE `helpline_numbers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `job_applications`
--
ALTER TABLE `job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `job_listings`
--
ALTER TABLE `job_listings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `resumes`
--
ALTER TABLE `resumes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `safety_tips`
--
ALTER TABLE `safety_tips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `training_applications`
--
ALTER TABLE `training_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `training_certificates`
--
ALTER TABLE `training_certificates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_job_applications`
--
ALTER TABLE `user_job_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `complaints_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `female_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `job_applications`
--
ALTER TABLE `job_applications`
  ADD CONSTRAINT `job_applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `female_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `resumes`
--
ALTER TABLE `resumes`
  ADD CONSTRAINT `resumes_female_user_id_foreign` FOREIGN KEY (`female_user_id`) REFERENCES `female_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `training_applications`
--
ALTER TABLE `training_applications`
  ADD CONSTRAINT `training_applications_training_id_foreign` FOREIGN KEY (`training_id`) REFERENCES `trainings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `training_applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `female_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `training_certificates`
--
ALTER TABLE `training_certificates`
  ADD CONSTRAINT `training_certificates_application_id_foreign` FOREIGN KEY (`application_id`) REFERENCES `training_applications` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `training_certificates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `female_users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_job_applications`
--
ALTER TABLE `user_job_applications`
  ADD CONSTRAINT `user_job_applications_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `job_listings` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_job_applications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
