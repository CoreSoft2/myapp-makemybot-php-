-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2017 at 05:35 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `makemybot`
--

-- --------------------------------------------------------

--
-- Table structure for table `bot`
--

CREATE TABLE `bot` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(32) CHARACTER SET utf8 NOT NULL DEFAULT 'Chatty',
  `description` varchar(512) DEFAULT NULL,
  `avtaar` varchar(128) NOT NULL DEFAULT '../media/avtaar/avtaar_default.png',
  `brain` varchar(128) DEFAULT '../media/brain/brain_default.rive',
  `chatlog` varchar(128) DEFAULT '../media/chatlog/chatlog_default.txt',
  `views` int(11) NOT NULL DEFAULT '0',
  `greet` tinyint(4) NOT NULL DEFAULT '0',
  `message` varchar(32) DEFAULT 'hello',
  `visible` tinyint(4) NOT NULL DEFAULT '1',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bot`
--

INSERT INTO `bot` (`id`, `user_id`, `name`, `description`, `avtaar`, `brain`, `chatlog`, `views`, `greet`, `message`, `visible`, `modified`, `created`) VALUES
(1, 1, 'Chatty', 'hello', '../media/avtaar/avtaar_default.png', '../media/brain/brain_1.rive', '../media/chatlog/chatlog_1.txt', 40, 0, 'hello', 1, '2017-10-12 12:42:54', '2017-10-13 12:11:30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `lastname` varchar(32) CHARACTER SET utf8 DEFAULT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(128) NOT NULL,
  `verified` tinyint(4) NOT NULL DEFAULT '0',
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `verified`, `modified`, `created`) VALUES
(1, 'Kaushal', 'Meena', 'admin', '$2y$10$X2Q58dq78cwxt1xWbdaWSu0c7M.8PjhLU2A06uWGsguSKUL9XdrCm', 'kaushal.meena1996@gmail.com', 1, '2017-10-12 12:42:54', '2017-10-12 12:44:20');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `bot_create_trigger` AFTER INSERT ON `user` FOR EACH ROW BEGIN
    INSERT INTO bot(user_id, created) VALUES(NEW.id, CURRENT_TIMESTAMP);
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bot`
--
ALTER TABLE `bot`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_index` (`user_id`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`) USING BTREE,
  ADD UNIQUE KEY `username_password_unique` (`username`,`password`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bot`
--
ALTER TABLE `bot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `bot`
--
ALTER TABLE `bot`
  ADD CONSTRAINT `foreign_key_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
