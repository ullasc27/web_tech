-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2020 at 05:56 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `content-portal_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `con_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `con-id` int(11) NOT NULL,
  `title` varchar(350) NOT NULL,
  `notes` mediumtext NOT NULL,
  `addedDate` datetime DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`con-id`, `title`, `notes`, `addedDate`, `user_id`) VALUES
(9, 'The Perks of Being an International Student in Australia', '<figure class=\"image\"><img style=\"width: 774px; height: 516px;\" src=\"https://cdn.pixabay.com/photo/2020/02/28/21/15/space-4888643_960_720.jpg\" alt=\"About Sky\" width=\"960\" height=\"640\" />\r\n<figcaption>Sky beauty</figcaption>\r\n</figure>\r\n<h2>You can run, but you can&rsquo;t hide. The robots are coming.</h2>\r\n<p><em>This post is presented in partnership with&nbsp;<a href=\"http://s-edg.com/change-it\" target=\"_blank\" rel=\"noopener\">Monash University</a>.</em></p>\r\n<p>You can run, but you can&rsquo;t hide. The robots are coming.</p>\r\n<p>We&rsquo;re talking about the&nbsp;<a href=\"https://studentedge.org/article/report-reveals-young-people-without-tertiary-education-face-greatest-risk-of-automation\" target=\"_blank\" rel=\"noopener\">automation of the workforce</a>, which has altered the employment landscape for those training up for (or already skilled at) jobs that can now be done entirely by machines.</p>\r\n<p>But the robots need not be your enemy. Instead, there&rsquo;s a way for you to maintain a mutual respect&mdash;perhaps even a friendship&mdash;with the machines, and still find a satisfying career that won&rsquo;t be at risk of falling to tech advancements.</p>', '2020-09-18 21:38:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `name`, `email`, `password`) VALUES
(1, 'hr', 'hr@gmail.com', 'hr'),
(2, 'user', 'user@gmail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`con-id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `con-id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
