-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 10, 2024 at 04:30 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(1, 'News', 1),
(2, 'Movies', 4),
(3, 'Football', 5),
(5, 'Songs', 4),
(6, 'Fitness', 4);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(1, '1 Lorem ipsum dolor sit amet consectetur', 'Lorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consectetur.', '2', '11 Jun, 2023', 56, 'post_1.jpg'),
(2, '2 Lorem ipsum dolor sit amet consectetur', 'Lorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consectetur', '3', '11 Jun, 2023', 56, 'post-format.jpg'),
(3, '3 Lorem ipsum dolor sit amet consectetur', 'Lorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consectetur', '6', '11 Jun, 2023', 55, 'post_1.jpg'),
(4, '4 Lorem ipsum dolor sit amet consectetur', 'Lorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consecteturLorem ipsum dolor sit amet consectetur', '5', '11 Jun, 2023', 55, 'post-format.jpg'),
(5, '1st Post', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos nihil atque porro neque dolor quae quo. Placeat nesciunt nam deserunt perferendis veniam incidunt ratione ad tempora aliquam amet, minima quam.', '2', '12 Jun, 2023', 55, 'post_1.jpg'),
(6, '2nd Post', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos nihil atque porro neque dolor quae quo. Placeat nesciunt nam deserunt perferendis veniam incidunt ratione ad tempora aliquam amet, minima quam.', '3', '12 Jun, 2023', 55, 'post-format.jpg'),
(7, '3rd Post', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos nihil atque porro neque dolor quae quo. Placeat nesciunt nam deserunt perferendis veniam incidunt ratione ad tempora aliquam amet, minima quam.', '5', '12 Jun, 2023', 55, 'post_1.jpg'),
(8, '4th Post', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos nihil atque porro neque dolor quae quo. Placeat nesciunt nam deserunt perferendis veniam incidunt ratione ad tempora aliquam amet, minima quam.', '6', '12 Jun, 2023', 55, 'post-format.jpg'),
(9, '5th Post', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos nihil atque porro neque dolor quae quo. Placeat nesciunt nam deserunt perferendis veniam incidunt ratione ad tempora aliquam amet, minima This post is related to Fitness.                                ', '6', '12 Jun, 2023', 56, 'post_1.jpg'),
(10, '6th Post', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos nihil atque porro neque dolor quae quo. Placeat nesciunt nam deserunt perferendis veniam incidunt ratione ad tempora aliquam amet, minima quam.                m Mujahid                                ', '2', '12 Jun, 2023', 56, 'post-format.jpg'),
(11, '7th Post', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos nihil atque porro neque dolor quae quo. Placeat nesciunt nam deserunt perferendis veniam incidunt ratione ad tempora aliquam amet, minima quam.               mujahid                                              ', '3', '12 Jun, 2023', 56, 'post_1.jpg'),
(12, '8th Post', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quos nihil atque porro neque dolor quae quo. Placeat nesciunt nam deserunt perferendis veniam incidunt ratione ad tempora aliquam amet, minima quam.                website develment                ', '5', '12 Jun, 2023', 56, 'post-format.jpg'),
(16, 'New Post Half Website Complete', '                New Post Half Website Complete.New Post Half Website CompleteNew Post Half Website CompleteNew Post Half Website CompleteNew Post Half Website CompleteNew Post Half Website CompleteNew Post Half Website CompleteNew Post Half Website CompleteNew Post Half Website Complete.                ', '1', '11 Jul, 2023', 55, 'post-format.jpg'),
(15, '12th Post With fetch function', '                12th Post With fetch function.12th Post With fetch function.12th Post With fetch function.12th Post With fetch function.12th Post With fetch function.12th Post With fetch function.12th Post With fetch function.                ', '3', '10 Jul, 2023', 56, 'post_1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `websitename` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `footerdesc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `websitename`, `logo`, `footerdesc`) VALUES
(1, 'News', 'news.jpg', '© Copyright 2019 News | Powered by MMK');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(30, 'M', 'Mujahid', 'mujahid191', '37bfb70767b285817822252c63231a83', 0),
(61, 'Muhammad', 'Mujahid', 'mujahid11', '698d51a19d8a121ce581499d7b701668', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
