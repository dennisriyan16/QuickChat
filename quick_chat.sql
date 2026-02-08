-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2026 at 07:31 PM
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
-- Database: `quick_chat`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `receiver_id`, `message`, `created_at`) VALUES
(1, 1, 2, 'hi', '2026-02-08 15:42:22'),
(2, 2, 1, 'yes hi', '2026-02-08 15:42:29'),
(3, 1, 2, 'i am ram', '2026-02-08 15:42:39'),
(4, 2, 1, 'yes tell me how can i help you', '2026-02-08 15:42:52'),
(5, 1, 2, 'i need some help related to learning codeIgniter and some other stuff', '2026-02-08 16:18:19'),
(6, 2, 1, 'yes i can help you', '2026-02-08 16:19:18'),
(7, 1, 2, 'what is the latest version of CI', '2026-02-08 16:21:01'),
(8, 2, 1, '4', '2026-02-08 16:21:13'),
(9, 2, 1, 'reply me', '2026-02-08 18:02:28'),
(10, 1, 2, 'yes i am here', '2026-02-08 18:02:38'),
(11, 2, 1, 'okay tell me more', '2026-02-08 18:02:54');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2026-02-08-162959', 'App\\Database\\Migrations\\AddRecoveryFieldsToUsersTable', 'default', 'App', 1770568347, 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `reset_code` varchar(10) DEFAULT NULL,
  `reset_expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `updated_at`, `last_login`, `reset_code`, `reset_expires_at`) VALUES
(1, 'Dennis', 'dennisriyan@gmail.com', '$2y$10$M0LFL1RCt6/2EQIvj3edpODkA9w08VTBciI0j2GP3zCZm11TtcH86', '2026-02-08 15:39:04', NULL, '2026-02-08 18:01:47', NULL, NULL),
(2, 'Ram', 'ram@gmail.com', '$2y$10$bYnk8.4.jp5oB2mkMFtDOO8mudpu7kNl24cp9WmrjFt/wBavJiq7m', '2026-02-08 15:40:54', NULL, '2026-02-08 18:02:17', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
