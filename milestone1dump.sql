-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2015 at 04:11 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cs418`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `q_id` int(100) NOT NULL,
  `answer_num` int(100) NOT NULL,
  `answer_text` text NOT NULL,
  `answerer_id` int(100) NOT NULL,
  `date` date NOT NULL,
  `up_vote` int(11) DEFAULT NULL,
  `down_vote` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`q_id`, `answer_num`, `answer_text`, `answerer_id`, `date`, `up_vote`, `down_vote`) VALUES
(1, 1, 'the door is over there', 3, '2015-02-10', 0, 0),
(9, 1, 'Answer this question', 0, '2015-02-11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
`q_id` int(100) NOT NULL,
  `question_title` text NOT NULL,
  `question_text` text NOT NULL,
  `date` date NOT NULL,
  `asker_id` int(100) NOT NULL,
  `resolved` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`q_id`, `question_title`, `question_text`, `date`, `asker_id`, `resolved`) VALUES
(1, 'where am i?', 'I cant find my way out', '2015-02-09', 3, 0),
(2, 'where am i?', 'i cant find my way out of here', '2015-02-10', 2, 0),
(3, 'Afff', 'ffff', '2015-02-10', 3, 0),
(4, 'Ok but there so much more to do.', 'how am I doing?', '2015-02-10', 3, 0),
(5, 'hopefully it is', 'IS this better?', '2015-02-10', 3, 0),
(6, '?', '!', '2015-02-10', 3, 0),
(7, 'nope?', 'yes!', '2015-02-10', 3, 0),
(8, 'Am I done?', 'When will this semester be over?', '2015-02-10', 3, 0),
(9, 'New user?', 'is the session user changed?', '2015-02-11', 1, 0),
(10, 'Hey everyone!', 'What is your names?', '2015-02-11', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `user_name` varchar(25) CHARACTER SET ascii NOT NULL,
  `password` varchar(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`) VALUES
(1, 'pallen', 'm$ftw'),
(2, 'tblee', '0mGth3Web!'),
(3, 'bourne', 'bash_$'),
(4, 'edsger', 'st1ll1l11lG0'),
(5, 'wgates', '5il3M4X_m$4L'),
(6, 'hopper', 'im4usn'),
(7, 'dknuth', 'tek!tex!'),
(8, 'ada', 'wtf15b4b'),
(9, 'cmoore', 'moreM00R3!'),
(10, 'jresig', 'In0JS'),
(11, 'atanen', 'minix!minix'),
(12, 'linus', 'ilUvP3nGu1n5'),
(13, 'aturing', '1nfin1t3TAp3'),
(14, 'lwall', 'oysters&came'),
(15, 'thewoz', '4daK1d5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
 ADD PRIMARY KEY (`q_id`,`answer_num`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
 ADD PRIMARY KEY (`q_id`,`asker_id`), ADD UNIQUE KEY `q_id` (`q_id`), ADD KEY `asker_id` (`asker_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
MODIFY `q_id` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`q_id`) REFERENCES `questions` (`q_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`asker_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
