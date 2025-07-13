-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2025 at 11:41 PM
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
-- Database: `v101`
--

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
('laravel_cache_356a192b7913b04c54574d18c28d46e6395428ab', 'i:1;', 1752371348),
('laravel_cache_356a192b7913b04c54574d18c28d46e6395428ab:timer', 'i:1752371348;', 1752371348),
('laravel_cache_fe5dbbcea5ce7e2988b8c69bcfdfde8904aabc1f', 'i:1;', 1752429186),
('laravel_cache_fe5dbbcea5ce7e2988b8c69bcfdfde8904aabc1f:timer', 'i:1752429186;', 1752429186),
('laravel_cache_hanakathleenvitaliz@gmai.com|127.0.0.1', 'i:1;', 1752438613),
('laravel_cache_hanakathleenvitaliz@gmai.com|127.0.0.1:timer', 'i:1752438613;', 1752438613);

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
-- Table structure for table `course_grade`
--

CREATE TABLE `course_grade` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `course_code` varchar(255) NOT NULL,
  `course_name` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_grade`
--

INSERT INTO `course_grade` (`id`, `course_code`, `course_name`, `created_at`, `updated_at`) VALUES
(1, 'BSIT', 'Bachelor\'s of Science in Information Technology', '2025-07-09 06:14:04', '2025-07-09 06:14:04'),
(2, 'BSCS', 'Bachelor of Computer Science', '2025-07-09 12:49:40', '2025-07-09 12:49:40'),
(3, 'BSIS', 'Bachelor\'s of Science in Information System', '2025-07-10 04:26:05', '2025-07-10 04:26:05');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_task_infos`
--

CREATE TABLE `faculty_task_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `grading_code_id` bigint(20) UNSIGNED NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_description` text NOT NULL,
  `deadline` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faculty_task_infos`
--

INSERT INTO `faculty_task_infos` (`id`, `faculty_id`, `student_id`, `grading_code_id`, `task_name`, `task_description`, `deadline`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 1, 'Okay Lang Ba Kayo?', 'Ha ano ano?', '2025-11-12', '2025-07-12 17:17:04', '2025-07-12 17:17:04'),
(2, 4, 8, 2, 'Thesis', 'Mag pass kana loko', '2025-08-02', '2025-07-13 09:51:38', '2025-07-13 09:51:38');

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
(4, '2025_07_08_152726_create_semester_grading_table', 1),
(5, '2025_07_09_120004_create_course_grade_table', 1),
(6, '2025_07_12_143224_fix_students_taking_enrollment_foreign_keys', 2),
(7, '2025_07_13_010523_create_faculty_task_infos_table', 3),
(8, '2025_07_13_013702_create_student_submitted_tasks_table', 4),
(9, '2025_07_13_021154_create_ratings_faculty_tostudents_table', 5);

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
-- Table structure for table `ratings_faculty_tostudents`
--

CREATE TABLE `ratings_faculty_tostudents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `submission_id` bigint(20) UNSIGNED NOT NULL,
  `score` int(10) UNSIGNED NOT NULL,
  `comments` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `semester_grading`
--

CREATE TABLE `semester_grading` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `grading_codes` varchar(255) NOT NULL,
  `grading_description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semester_grading`
--

INSERT INTO `semester_grading` (`id`, `grading_codes`, `grading_description`, `created_at`, `updated_at`) VALUES
(1, '2023-21-13', 'Submit your Class Task today.', '2025-07-09 06:13:12', '2025-07-09 06:13:36'),
(2, '2025-31-14', 'Final Project for this sem is System.', '2025-07-09 07:21:12', '2025-07-10 04:43:15'),
(3, '2023-21-25', 'EME', '2025-07-11 23:50:39', '2025-07-11 23:50:39');

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
('42uv9lVSL3jgyxM38jlBPvXIJOttSSDJaTxakCVo', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZjJRdmVMMjFMTTVKUW1NRXFOeXhad3JDdFhMR0dRa2VINWpiYjhRVCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9zZXR0aW5ncy9wcm9maWxlIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1752441337),
('NDtgeXo7Gp97w8Gus2W1g14EhseNeKWO9bvQzZ1a', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiSUNGSHY5MWVybGtnNFdvMnZrTGw3bzBsUjVZVEk0UHpoZjZpbXl5RyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1752440455);

-- --------------------------------------------------------

--
-- Table structure for table `students_taking_enrollment`
--

CREATE TABLE `students_taking_enrollment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `course_grade_id` bigint(20) UNSIGNED NOT NULL,
  `agency_id` bigint(20) UNSIGNED NOT NULL,
  `faculty_id` bigint(20) UNSIGNED NOT NULL,
  `enrollment_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students_taking_enrollment`
--

INSERT INTO `students_taking_enrollment` (`id`, `user_id`, `full_name`, `course_grade_id`, `agency_id`, `faculty_id`, `enrollment_date`, `created_at`, `updated_at`) VALUES
(1, 1, 'Melanie Camano', 3, 3, 4, '2025-07-12 22:57:24', '2025-07-12 06:57:24', '2025-07-12 06:57:24'),
(2, 8, 'PJ Cuepal', 2, 3, 4, '2025-07-13 00:39:28', '2025-07-12 08:39:28', '2025-07-12 08:39:28'),
(3, 9, 'Delete this.', 2, 3, 4, '2025-07-13 07:49:26', '2025-07-12 15:49:26', '2025-07-12 15:49:26'),
(4, 10, 'asd', 1, 3, 4, '2025-07-13 08:34:59', '2025-07-12 16:34:59', '2025-07-12 16:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `student_submitted_tasks`
--

CREATE TABLE `student_submitted_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `comments` text DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_submitted_tasks`
--

INSERT INTO `student_submitted_tasks` (`id`, `task_id`, `student_id`, `file_path`, `comments`, `submitted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'student-submissions/QmNzrEz4tocruCzPCtenvwz1xXE4nBVsYuXFugQW.pdf', 'Donee', '2025-07-13 01:48:16', '2025-07-12 17:48:16', '2025-07-12 17:48:16'),
(2, 2, 8, 'student-submissions/LonbapVeJ3GHCICXLMsmKnRbgfYPpndpi8pfJN5Z.pdf', 'Doen napo', '2025-07-13 17:52:14', '2025-07-13 09:52:14', '2025-07-13 09:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('user','admin','faculty','agency') NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Melanie Camano', 'camanomelanie15@gmail.com', 'user', NULL, '$2y$12$Fpy2wOABtpq8biSKG6EEQez81sOXY1FYxwu0f98FlpISrZQStmCe2', 'N84YLOolaILySFfWj9uygwr4CgP8CLRJNlOpO9BhysxoQRU0OEVXS2t0uABd', '2025-07-09 06:10:15', '2025-07-09 07:07:53'),
(2, 'Jourdel Laluan', 'jourdel0909@gmail.com', 'admin', NULL, '$2y$12$Uj8R2GC.g8LGxu03ZQhjPOOQ8egPy8tqCNlGbyZZpj15XyuJ/d9Fy', '4Zgqh75aZNBaXbas3ze9GEl8soodZZRNndsMqldRD18yfpgmST3xFZc6cAGs', '2025-07-09 06:12:02', '2025-07-09 06:12:02'),
(3, 'Marc Nario', 'marcjoshua@gmail.com', 'agency', NULL, '$2y$12$pLJTVBbdiejcGDySHRwz4uYEb5piXlENqtFOeVcgmKq9LSu2kypT2', 'OZ0wQrcAjXcpNmfspbdx7KSRtIQklrxvrxJDS2oTIg9YIRnulVXOiFeuPNkU', '2025-07-09 06:15:44', '2025-07-09 06:15:44'),
(4, 'Hana Kathleen', 'hanakathleenvitaliz@gmail.com', 'faculty', NULL, '$2y$12$bnF5qeNwnjp9VGCfqzG91eI8puB.7jW.VGJYGXuZx7rlbPcHZwzYi', 'ngSjpEC9hhYpKtSyWOVE02FWB436vZl9pSlgxYat9Wqx9hc6Cmn2Sec5WHie', '2025-07-09 06:15:58', '2025-07-09 07:38:06'),
(8, 'PJ Cuepal', 'pjcuepal10@gmail.com', 'user', NULL, '$2y$12$qOwqmCxAPYb1rYrQmfvAM.v6eSj20Dg.KYA/1Yz1M8qicckdKrV8m', NULL, '2025-07-11 23:40:45', '2025-07-11 23:40:45'),
(9, 'Delete this.', 'magrent2023@gmail.com', 'user', NULL, '$2y$12$TMZH7plws0G9qvt8LXYiQ.AAFjVq38OkubxuUYL.T3rMiEDpbhoWK', NULL, '2025-07-12 15:49:12', '2025-07-12 15:49:12'),
(10, 'asd', 'jclaluddan026@gmail.com', 'user', NULL, '$2y$12$zFBp3zohDFCaRYqCZdCe7O9uP6Br8deqf9K7teb3u5WBMIdNDIMMG', NULL, '2025-07-12 16:34:44', '2025-07-12 16:34:44');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `course_grade`
--
ALTER TABLE `course_grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty_task_infos`
--
ALTER TABLE `faculty_task_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `faculty_task_infos_faculty_id_foreign` (`faculty_id`),
  ADD KEY `faculty_task_infos_student_id_foreign` (`student_id`),
  ADD KEY `faculty_task_infos_grading_code_id_foreign` (`grading_code_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `ratings_faculty_tostudents`
--
ALTER TABLE `ratings_faculty_tostudents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_faculty_tostudents_faculty_id_foreign` (`faculty_id`),
  ADD KEY `ratings_faculty_tostudents_student_id_foreign` (`student_id`),
  ADD KEY `ratings_faculty_tostudents_task_id_foreign` (`task_id`),
  ADD KEY `ratings_faculty_tostudents_submission_id_foreign` (`submission_id`);

--
-- Indexes for table `semester_grading`
--
ALTER TABLE `semester_grading`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students_taking_enrollment`
--
ALTER TABLE `students_taking_enrollment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_taking_enrollment_user_id_foreign` (`user_id`),
  ADD KEY `students_taking_enrollment_course_grade_id_foreign` (`course_grade_id`),
  ADD KEY `students_taking_enrollment_agency_id_foreign` (`agency_id`),
  ADD KEY `students_taking_enrollment_faculty_id_foreign` (`faculty_id`);

--
-- Indexes for table `student_submitted_tasks`
--
ALTER TABLE `student_submitted_tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_submitted_tasks_task_id_foreign` (`task_id`),
  ADD KEY `student_submitted_tasks_student_id_foreign` (`student_id`);

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
-- AUTO_INCREMENT for table `course_grade`
--
ALTER TABLE `course_grade`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `faculty_task_infos`
--
ALTER TABLE `faculty_task_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ratings_faculty_tostudents`
--
ALTER TABLE `ratings_faculty_tostudents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `semester_grading`
--
ALTER TABLE `semester_grading`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students_taking_enrollment`
--
ALTER TABLE `students_taking_enrollment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `student_submitted_tasks`
--
ALTER TABLE `student_submitted_tasks`
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
-- Constraints for table `faculty_task_infos`
--
ALTER TABLE `faculty_task_infos`
  ADD CONSTRAINT `faculty_task_infos_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `faculty_task_infos_grading_code_id_foreign` FOREIGN KEY (`grading_code_id`) REFERENCES `semester_grading` (`id`),
  ADD CONSTRAINT `faculty_task_infos_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ratings_faculty_tostudents`
--
ALTER TABLE `ratings_faculty_tostudents`
  ADD CONSTRAINT `ratings_faculty_tostudents_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `ratings_faculty_tostudents_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `ratings_faculty_tostudents_submission_id_foreign` FOREIGN KEY (`submission_id`) REFERENCES `student_submitted_tasks` (`id`),
  ADD CONSTRAINT `ratings_faculty_tostudents_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `faculty_task_infos` (`id`);

--
-- Constraints for table `students_taking_enrollment`
--
ALTER TABLE `students_taking_enrollment`
  ADD CONSTRAINT `students_taking_enrollment_agency_id_foreign` FOREIGN KEY (`agency_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_taking_enrollment_course_grade_id_foreign` FOREIGN KEY (`course_grade_id`) REFERENCES `course_grade` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_taking_enrollment_faculty_id_foreign` FOREIGN KEY (`faculty_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_taking_enrollment_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_submitted_tasks`
--
ALTER TABLE `student_submitted_tasks`
  ADD CONSTRAINT `student_submitted_tasks_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `student_submitted_tasks_task_id_foreign` FOREIGN KEY (`task_id`) REFERENCES `faculty_task_infos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
