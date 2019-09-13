-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2019 at 09:30 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mymvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `modules_id` int(10) NOT NULL,
  `modules_name` varchar(255) NOT NULL,
  `modules_rank` int(10) NOT NULL,
  `modules_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_id_md5` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(20) NOT NULL DEFAULT 'User',
  `user_photo` varchar(255) NOT NULL,
  `user_bio` text NOT NULL,
  `user_designation` int(10) NOT NULL,
  `user_status` int(10) NOT NULL DEFAULT 1,
  `last_login` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_id_md5`, `full_name`, `username`, `password`, `user_type`, `user_photo`, `user_bio`, `user_designation`, `user_status`, `last_login`) VALUES
(1, 'c4ca4238a0b923820dcc509a6f75849b', 'Md Salman Sajib', 'salman', '202cb962ac59075b964b07152d234b70', 'Master Admin', 'salman.jpg', 'Huge fan of HTML, CSS and Javascript. Web design and open source lover. There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', 0, 1, '2019-09-02 10:06:13'),
(2, 'c81e728d9d4c2f636f067f89cc14862c', 'Super Admin', 'superadmin', 'cdcc78f045d273c12e6d367c101f5f56', 'Super Admin', 'salman.jpg', '', 0, 1, '2019-09-06 04:04:08'),
(3, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Only Admin', 'onlyadmin', 'cdcc78f045d273c12e6d367c101f5f56', 'Admin', '', '', 0, 3, '2019-09-06 04:04:08'),
(4, 'a87ff679a2f3e71d9181a67b7542122c', 'User Only', 'useronly', 'cdcc78f045d273c12e6d367c101f5f56', 'User', '', '', 0, 1, '2019-09-06 04:04:08'),
(30, '34173cb38f07f89ddbebc2ac9128303f', 'New Testing', 'newtesting', '123456', 'User', '', '', 0, 3, '2019-09-12 10:01:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`modules_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `modules_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
