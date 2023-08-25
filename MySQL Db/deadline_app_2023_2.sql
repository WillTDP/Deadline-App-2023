-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 25, 2023 at 10:40 AM
-- Server version: 5.7.24
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deadline_app_2023`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` varchar(655) COLLATE utf8mb4_unicode_ci NOT NULL,
  `todo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `text`, `todo_id`) VALUES
(1, 'aa', 2),
(2, 'aa', 2),
(3, 'aa', 3),
(4, 'aa', 4),
(5, 'aaaa', 7),
(6, 'aaaa', 7),
(7, 'aaa', 10),
(8, 'aa', 2),
(9, 'aa', 92),
(10, 'aaaa', 92),
(11, 'aaa', 121);

-- --------------------------------------------------------

--
-- Table structure for table `done`
--

CREATE TABLE `done` (
  `id` int(11) NOT NULL,
  `todo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `done`
--

INSERT INTO `done` (`id`, `todo_id`) VALUES
(1, 92),
(2, 118);

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`id`, `name`) VALUES
(1, 'Test'),
(2, 'Test2'),
(36, 'Test3'),
(43, 'test5');

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `name` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `list_id` int(11) DEFAULT NULL,
  `done` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id`, `name`, `description`, `deadline`, `list_id`, `done`) VALUES
(2, 'Eat', 'Eat', '2023-08-16', 1, 0),
(3, 'Eat', 'Eat', '2023-08-16', 1, 0),
(4, 'Eat', 'Eat', '2023-08-16', 1, 0),
(5, 'Eat', 'Eat', '2023-08-16', 2, 0),
(7, 'Testing Ground', 'test', '2023-09-01', 36, 0),
(8, 'Testing Ground', 'test', '2023-09-01', 36, 0),
(9, 'Testing Ground', 'test', '2023-09-01', 36, 0),
(10, 'Testing Ground', 'test', '2023-09-01', 36, 0),
(11, 'Testing Ground', 'test', '2023-09-01', 36, 0),
(13, 'still testing', 'test', '2023-08-27', 43, 0),
(14, 'still testing', 'test', '2023-08-27', 43, 0),
(34, 'aaaaa', 'aaaa', '2023-08-01', 36, 0),
(68, NULL, NULL, NULL, NULL, 0),
(69, NULL, NULL, NULL, NULL, 0),
(70, NULL, NULL, NULL, NULL, 0),
(71, NULL, NULL, NULL, NULL, 0),
(72, NULL, NULL, NULL, NULL, 0),
(73, NULL, NULL, NULL, NULL, 0),
(74, NULL, NULL, NULL, NULL, 0),
(75, NULL, NULL, NULL, NULL, 0),
(76, NULL, NULL, NULL, NULL, 0),
(77, NULL, NULL, NULL, NULL, 0),
(78, NULL, NULL, NULL, NULL, 0),
(79, NULL, NULL, NULL, NULL, 0),
(81, NULL, NULL, NULL, NULL, 0),
(82, NULL, NULL, NULL, NULL, 0),
(92, 'todo', 'test', '2023-01-03', 1, 0),
(99, NULL, NULL, NULL, NULL, 0),
(100, NULL, NULL, NULL, NULL, 0),
(101, NULL, NULL, NULL, NULL, 0),
(102, NULL, NULL, NULL, NULL, 0),
(103, NULL, NULL, NULL, NULL, 0),
(104, NULL, NULL, NULL, NULL, 0),
(105, NULL, NULL, NULL, NULL, 0),
(106, NULL, NULL, NULL, NULL, 0),
(107, NULL, NULL, NULL, NULL, 0),
(108, NULL, NULL, NULL, NULL, 0),
(109, NULL, NULL, NULL, NULL, 0),
(110, NULL, NULL, NULL, NULL, 0),
(111, NULL, NULL, NULL, NULL, 0),
(112, NULL, NULL, NULL, NULL, 0),
(113, NULL, NULL, NULL, NULL, 0),
(114, NULL, NULL, NULL, NULL, 0),
(115, NULL, NULL, NULL, NULL, 0),
(116, NULL, NULL, NULL, NULL, 0),
(117, NULL, NULL, NULL, NULL, 0),
(118, 'very early', 'literaly 2021', '2021-07-26', 2, 0),
(121, 'very early', 'literaly 2021', '2021-07-26', 2, 0),
(122, 'very early', 'literaly 2021', '2021-07-26', 2, 0),
(125, 'very early', 'literaly 2021', '2021-07-26', 2, 0),
(128, NULL, NULL, NULL, NULL, 0),
(129, NULL, NULL, NULL, NULL, 0),
(130, NULL, NULL, NULL, NULL, 0),
(131, NULL, NULL, NULL, NULL, 0),
(132, NULL, NULL, NULL, NULL, 0),
(133, NULL, NULL, NULL, NULL, 0),
(134, NULL, NULL, NULL, NULL, 0),
(135, NULL, NULL, NULL, NULL, 0),
(136, NULL, NULL, NULL, NULL, 0),
(137, NULL, NULL, NULL, NULL, 0),
(138, NULL, NULL, NULL, NULL, 0),
(139, NULL, NULL, NULL, NULL, 0),
(140, NULL, NULL, NULL, NULL, 0),
(141, 'aa', 'aaa', '2023-09-01', 1, 0),
(142, 'errortest', 'errortest', '2023-10-19', 1, 0),
(143, 'errortest', 'errortest', '2023-10-19', 1, 0),
(144, 'errortest', 'errortest', '2023-10-19', 1, 0),
(145, 'bbbbbbbbbbbbbbbb', 'bbbbbbbbbbbbbb', '2023-08-01', 36, 0),
(146, 'bbbbbbbbbbbbbbbb', 'bbbbbbbbbbbbbb', '2023-08-01', 36, 0),
(147, 'bbbbbbbbbbbbbbbb', 'bbbbbbbbbbbbbb', '2023-08-01', 36, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(1, 'test@test.com', '$2y$10$0eAbFWDWYEr4jpgtayFtLuUS7t61N1LGLGRGzaOT5QLuXpa8n1FUG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `done`
--
ALTER TABLE `done`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `done`
--
ALTER TABLE `done`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
