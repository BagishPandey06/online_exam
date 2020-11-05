-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 04, 2020 at 05:40 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `i` int(11) NOT NULL,
  `id` int(255) NOT NULL,
  `sessionid` varchar(5000) NOT NULL,
  `test_id` int(255) NOT NULL,
  `que_id` int(255) NOT NULL,
  `question` varchar(5000) NOT NULL,
  `opt1` varchar(5000) NOT NULL,
  `opt2` varchar(5000) NOT NULL,
  `opt3` varchar(5050) NOT NULL,
  `opt4` varchar(5000) NOT NULL,
  `crtans` varchar(5000) NOT NULL,
  `userans` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`i`, `id`, `sessionid`, `test_id`, `que_id`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `crtans`, `userans`) VALUES
(48, 2, '5f9d6c763e37d', 1, 1, 'import', 'we', 'ea', 'a', 't', '2', '2'),
(51, 2, '5f9d7236cd8d3', 1, 1, 'import', 'we', 'ea', 'a', 't', '2', '1'),
(58, 2, '5f9d9f92618ff', 1, 1, 'import', 'we', 'ea', 'a', 't', '2', '1'),
(59, 2, '5f9d9f92618ff', 1, 1, 'import', 'we', 'ea', 'a', 't', '2', '1'),
(60, 2, '5f9edbe0d9437', 1, 1, 'import', 'we', 'ea', 'a', 't', '2', '0'),
(61, 2, '5f9edc105a496', 1, 1, 'import', 'we', 'ea', 'a', 't', '2', '0'),
(62, 2, '5f9edc105a496', 1, 1, 'import', 'we', 'ea', 'a', 't', '2', '0'),
(63, 2, '5f9edc105a496', 1, 1, 'import', 'we', 'ea', 'a', 't', '2', '0'),
(64, 2, '5f9edc105a496', 1, 1, 'import', 'we', 'ea', 'a', 't', '2', '4'),
(65, 2, '5f9edc105a496', 1, 9, 'Inside which HTML element do we put the JavaScript?', 'ghf', 'fghdg', 'fgh', 'dfh', '3', '4'),
(66, 2, '5f9edc105a496', 1, 1, 'import', 'we', 'ea', 'a', 't', '2', '4'),
(67, 2, '5f9edc105a496', 1, 9, 'Inside which HTML element do we put the JavaScript?', 'ghf', 'fghdg', 'fgh', 'dfh', '3', '4'),
(68, 2, '5f9edc105a496', 1, 10, 'full form of php?', 'php hypertext preproccesor', 'php', 'p', 'h', '3', '4');

-- --------------------------------------------------------

--
-- Table structure for table `ques`
--

CREATE TABLE `ques` (
  `que_id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `question` varchar(5000) NOT NULL,
  `opt1` varchar(5000) NOT NULL,
  `opt2` varchar(5000) NOT NULL,
  `opt3` varchar(5000) NOT NULL,
  `opt4` varchar(5000) NOT NULL,
  `crtans` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ques`
--

INSERT INTO `ques` (`que_id`, `test_id`, `question`, `opt1`, `opt2`, `opt3`, `opt4`, `crtans`) VALUES
(1, 1, 'import', 'we', 'ea', 'a', 't', 2),
(9, 1, 'Inside which HTML element do we put the JavaScript?', 'ghf', 'fghdg', 'fgh', 'dfh', 3),
(10, 1, 'full form of php?', 'php hypertext preproccesor', 'php', 'p', 'h', 3);

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `test_id` int(50) NOT NULL,
  `testname` varchar(5000) CHARACTER SET utf8 NOT NULL,
  `question` int(11) NOT NULL DEFAULT '10'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`test_id`, `testname`, `question`) VALUES
(1, 'java', 10),
(2, 'php', 10),
(3, 'c', 10),
(4, 'c++', 10);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(5000) NOT NULL,
  `password` varchar(5000) NOT NULL,
  `email` varchar(5000) NOT NULL,
  `role` varchar(5000) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `role`) VALUES
(1, 'r', 'e', 'e@gmail.com', 'admin'),
(2, 't', 'r', 't@gmail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`i`),
  ADD KEY `que_id` (`que_id`),
  ADD KEY `test_id` (`test_id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `ques`
--
ALTER TABLE `ques`
  ADD PRIMARY KEY (`que_id`),
  ADD KEY `test_id` (`test_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`test_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `ques`
--
ALTER TABLE `ques`
  MODIFY `que_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `test_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`que_id`) REFERENCES `ques` (`que_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answer_ibfk_2` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answer_ibfk_3` FOREIGN KEY (`id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ques`
--
ALTER TABLE `ques`
  ADD CONSTRAINT `ques_ibfk_1` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
