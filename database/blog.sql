-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 30, 2021 at 08:17 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Music'),
(2, 'Sport');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` varchar(500) NOT NULL,
  `post_id` int(10) UNSIGNED DEFAULT NULL,
  `author_id` int(10) UNSIGNED DEFAULT NULL,
  `author_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `post_id`, `author_id`, `author_name`) VALUES
(1, 'eyerhe', 3, 8, 'aaa'),
(2, '5ytehehe', 2, 8, 'aaa'),
(3, 'hgdfhdfhd', 9, 6, 'admin'),
(4, 'rgtsrdgsdg', 9, 6, 'admin'),
(5, 'reyreuyethfgbdfsgrew', 10, 6, 'admin'),
(6, 'test', 10, 9, 'Test 01');

-- --------------------------------------------------------

--
-- Table structure for table `conversations`
--

CREATE TABLE `conversations` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversations`
--

INSERT INTO `conversations` (`id`, `type`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `conversation_content`
--

CREATE TABLE `conversation_content` (
  `conversation_id` int(10) UNSIGNED DEFAULT NULL,
  `text` text,
  `sender` int(10) UNSIGNED DEFAULT NULL,
  `time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversation_content`
--

INSERT INTO `conversation_content` (`conversation_id`, `text`, `sender`, `time`) VALUES
(3, 'thtuteueu', 6, 0),
(4, 'sdfdsfxcsdgwdgregfdsbv', 8, 0),
(4, 'sdfdsfxcsdgwdgregfdsbv', 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `conversation_group`
--

CREATE TABLE `conversation_group` (
  `conversation_id` int(10) UNSIGNED DEFAULT NULL,
  `text_sender` int(10) UNSIGNED DEFAULT NULL,
  `text_receiver` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conversation_group`
--

INSERT INTO `conversation_group` (`conversation_id`, `text_sender`, `text_receiver`) VALUES
(1, 1, 2),
(1, 2, 1),
(2, 2, 3),
(2, 3, 2),
(3, 6, 4),
(3, 4, 6),
(4, 8, 6),
(4, 6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `cat_id` int(10) UNSIGNED DEFAULT NULL,
  `sub_cat_id` int(10) UNSIGNED DEFAULT NULL,
  `author_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) DEFAULT NULL,
  `content` varchar(1000) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `cat_id`, `sub_cat_id`, `author_id`, `title`, `image`, `content`, `status`) VALUES
(2, 1, 2, 2, 'Javascript 1', 'http://localhost/Blog/uploads/image/my.jpg', 'JavaScript, often abbreviated as JS, is a high-level, interpreted programming language that conforms to the ECMAScript specification. It is a programming language that is characterized as dynamic, weakly typed, prototype-based and multi-paradigm', 'D'),
(3, 1, 1, 8, 'qqq', 'http://localhost/Blog/uploads/image/my2.jpg', 'dqwefrefeqfgeqf', 'D'),
(6, 1, NULL, 7, 'ttt', 'http://localhost/Blog/uploads/image/my.jpg', 'fgsgsgs', 'D'),
(9, 2, NULL, 6, 'ppp3333333', 'http://localhost/Blog/uploads/image/image_(11).png', 'jfjgfncvbfdsgdsfgvdqqqq3333333333333333', 'D'),
(10, 1, NULL, 6, 'test', 'http://localhost/Blog/uploads/image/music1.png', 'music', 'C'),
(12, 2, NULL, 9, 'football', 'http://localhost/Blog/uploads/image/sport2.jpg', 'Foot Ball', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `name`, `parent_id`) VALUES
(1, 'c++', 1),
(2, 'Javascript', 1),
(3, 'E-bay', 2),
(4, 'Amazon', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_log_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `pro_pic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `password`, `last_log_date`, `pro_pic`) VALUES
(1, 'am', 'AM', 'am@gmail.com', '12', '2021-08-27 16:47:00', ''),
(2, 'dm', 'DM', 'dm@gmail.com', '123', '2021-08-27 16:47:00', ''),
(3, 'cm', 'CM', 'cm@gmail.com', '123', '2021-08-27 16:47:00', ''),
(4, 'dileep', 'Dileep Prabath', 'dileeepprabath@gmail.com', 'dileep', '2021-08-27 16:47:00', ''),
(6, 'admin', 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', '2021-08-30 02:39:49', 'http://localhost/Blog/uploads/pro_pic/my5.jpg'),
(7, 'ccc', 'ccc', 'ccc@gmail.com', '9df62e693988eb4e1e1444ece0578579', '2021-08-27 02:04:19', ''),
(8, 'aaa', 'aaa', 'aaa@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808', '2021-08-30 00:10:33', ''),
(9, 'Test', 'Test 01', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6', '2021-08-30 02:38:40', 'http://localhost/Blog/uploads/pro_pic/man2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversation_content`
--
ALTER TABLE `conversation_content`
  ADD KEY `conversation_id` (`conversation_id`),
  ADD KEY `sender` (`sender`);

--
-- Indexes for table `conversation_group`
--
ALTER TABLE `conversation_group`
  ADD KEY `conversation_id` (`conversation_id`),
  ADD KEY `text_sender` (`text_sender`),
  ADD KEY `text_receiver` (`text_receiver`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `sub_cat_id` (`sub_cat_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `conversation_content`
--
ALTER TABLE `conversation_content`
  ADD CONSTRAINT `conversation_content_ibfk_1` FOREIGN KEY (`conversation_id`) REFERENCES `conversations` (`id`),
  ADD CONSTRAINT `conversation_content_ibfk_2` FOREIGN KEY (`sender`) REFERENCES `users` (`id`);

--
-- Constraints for table `conversation_group`
--
ALTER TABLE `conversation_group`
  ADD CONSTRAINT `conversation_group_ibfk_1` FOREIGN KEY (`conversation_id`) REFERENCES `conversations` (`id`),
  ADD CONSTRAINT `conversation_group_ibfk_2` FOREIGN KEY (`text_sender`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `conversation_group_ibfk_3` FOREIGN KEY (`text_receiver`) REFERENCES `users` (`id`);

--
-- Constraints for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD CONSTRAINT `subcategories_ibfk_1` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
