-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2021 at 12:04 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Sport'),
(2, 'Nature'),
(3, 'Beauty'),
(4, 'Food'),
(5, 'Drink');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `body`, `created_at`) VALUES
(1, 48, 23, 'Najbolji post', '2021-09-20 10:43:59'),
(2, 48, 23, '', '2021-09-20 10:58:54'),
(3, 48, 23, 'Nov POST', '2021-09-20 10:59:06'),
(4, 48, 27, 'Odlican post, svaka cast :-)', '2021-09-20 11:03:08'),
(5, 49, 27, 'Bravo', '2021-09-20 14:34:54'),
(6, 48, 31, 'Superb', '2021-09-20 19:42:25'),
(7, 48, 27, 'Hahahahaa', '2021-09-20 19:48:25'),
(8, 48, 30, 'Cool post', '2021-09-20 19:50:39'),
(9, 48, 30, '', '2021-09-20 19:50:56'),
(10, 48, 30, '', '2021-09-20 19:56:30'),
(11, 48, 30, '', '2021-09-20 19:57:01'),
(12, 48, 30, '', '2021-09-20 19:57:22'),
(13, 48, 30, '', '2021-09-20 20:00:24'),
(14, 48, 30, '', '2021-09-20 20:00:43'),
(15, 48, 30, '', '2021-09-20 20:00:49'),
(16, 48, 30, '', '2021-09-20 20:01:01'),
(17, 48, 30, '', '2021-09-20 20:01:44'),
(18, 48, 30, '', '2021-09-20 20:02:29'),
(19, 52, 29, 'Espresso is the best', '2021-09-22 21:59:17'),
(20, 52, 34, 'Wow :-)', '2021-09-22 21:59:45');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `user_id`, `post_id`) VALUES
(7, 48, 24),
(8, 48, 23),
(9, 48, 27),
(10, 49, 27),
(11, 48, 31),
(12, 48, 29),
(13, 48, 30),
(14, 52, 29),
(15, 52, 34);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `public` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `image`, `user_id`, `category_id`, `public`, `created_at`, `updated_at`) VALUES
(29, 'Espresso coffe', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1632147549espresso.jpg', 49, 5, 1, '2021-09-20 14:19:09', '2021-09-22 21:21:04'),
(30, 'Nature', 'I work up early the next morning and it was just as I imagined it would be. There is nothing like the stillness of the early morning. There was a gentle, peaceful feeling that enveloped me. It didn’t come from me but seemed to come from the earth and the river and the mountains. Everything was clearer than usual. The mind wasn’t racing here and there the way it normally does. I had never been to this place before but it felt welcoming and familiar. I found a spot to sit quietly. I could hear the faint hum of insects. The air was very still and there was only an occasional gentle breeze. A fly landed on my face. After a moment or two I carefully lifted my hand and gently ushered him away. Then another fly landed on my face. And another. And another. The feeling I had experienced a few moments ago was gone. I endured thirty minutes or so of mild torture that first morning before I admitted defeat and retreated to the farmhouse.', '1632161121thomas-bennie-1jlJrr4XGkU-unsplash.jpg', 49, 2, 1, '2021-09-20 18:05:21', '2021-09-22 21:20:56'),
(34, 'Hamburger', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1632346852the-ultimate-hamburger.jpg', 50, 4, 1, '2021-09-22 21:40:52', NULL),
(37, 'Pepsi', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1632347082pepsi.jpg', 50, 5, 1, '2021-09-22 21:44:42', NULL),
(38, 'Bali', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1632347169Bali.jpg', 50, 2, 1, '2021-09-22 21:46:09', NULL),
(39, 'Football', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1632347305football.jpg', 49, 1, 0, '2021-09-22 21:48:25', NULL),
(40, 'Beauty', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1632347392Human-32.jpg', 51, 3, 1, '2021-09-22 21:49:52', NULL),
(41, 'Wow', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1632347464beauty.jpg', 51, 3, 0, '2021-09-22 21:51:04', NULL),
(42, 'Makeup', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1632347579woman-putting-on-makeup.jpg', 51, 3, 1, '2021-09-22 21:52:59', NULL),
(43, 'Football manager 22', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1632347674FM22_Announce-News-Story_OG.png', 52, 1, 1, '2021-09-22 21:54:34', NULL),
(44, 'Pizza wow', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1632347773pizza.jpg', 52, 4, 1, '2021-09-22 21:56:13', NULL),
(45, 'Venice Italy ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries', '1632347912venezia.jpg', 52, 2, 0, '2021-09-22 21:58:32', NULL),
(46, 'NBA club', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '1632348113chicago-bulls-logo-red-veles.jpg', 52, 1, 1, '2021-09-22 22:01:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `title` varchar(2) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `title`, `first_name`, `last_name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(48, 'mr', 'Filip', 'Jotic', 'filip88ks@gmail.com', '$2y$10$yPeQ0KpTAEPR1xzbjWH2HOg46xQrB0YlZaezqpi7XV.DK9NFJ66Em', 'user', '2021-09-17 19:24:53', NULL),
(49, 'mr', 'Miroslav', 'Jotic', 'jota66@gmail.com', '$2y$10$Qat0u2mIn.g3qTPoIedgFucDLV2FdgZFCbn3MYQ53oNblSxRMhOkC', 'user', '2021-09-17 19:25:30', NULL),
(50, 'mr', 'Marko', 'Markovic', 'mare@gmail.com', '$2y$10$n8SF4LhGt6bcgkVMAcwK6eu8n5LT1Rn7C8y9S6PB6gute/ClNamRu', 'user', '2021-09-20 20:48:20', NULL),
(51, 'ms', 'Mina', 'Nikolic', 'mina@gmail.com', '$2y$10$DO9ZyJhvho.0yjRK51hTneXNff5qaZE6FLxsO.YuHwDnrZQwTNUk6', 'user', '2021-09-22 21:49:35', NULL),
(52, 'mr', 'Filip', 'Jotic', 'filip88ks@gmail.com', '$2y$10$J0.p77BhO4xQwr6q.6Bii.p7W9pj5Ou34W5Ty6SNuVANu/lVld5Ay', 'user', '2021-09-22 21:53:40', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
