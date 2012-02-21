-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2012 at 05:09 PM
-- Server version: 5.1.44
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `goldenage`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `subtitle` varchar(255) DEFAULT NULL,
  `body` text,
  `slug` varchar(255) DEFAULT NULL,
  `image_hash` varchar(255) NOT NULL,
  `bitly` varchar(30) DEFAULT NULL,
  `facebook_id` varchar(100) DEFAULT NULL,
  `twitter_id` varchar(100) DEFAULT NULL,
  `facebook_message` text,
  `twitter_message` text,
  `time_create` int(11) DEFAULT NULL,
  `time_publish` int(11) DEFAULT NULL,
  `time_update` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=320 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `category_id`, `title`, `subtitle`, `body`, `slug`, `image_hash`, `bitly`, `facebook_id`, `twitter_id`, `facebook_message`, `twitter_message`, `time_create`, `time_publish`, `time_update`, `status`) VALUES
(300, 57, NULL, 'Test', 'asdfsdaf', 'fsagsfadsfdsafsd', 'test', '', '', '', '', '', '', NULL, 1322377020, NULL, 'a'),
(301, 57, NULL, 'Another Test for ya', 'Hey there', 'fasdfdsfdsafasdf', 'another-test-for-ya', '', '', '100002761321081_159065134195530', '', '', '', 0, 1322375280, NULL, 'a'),
(302, 57, 10, 'whoo ha!', 'this is the shit', 'asdfdsaf', 'whoo-ha', '', '', '', '', '', '', 1322377090, 1322373600, NULL, 'a'),
(303, 57, 9, 'A test post to facebook', 'this is a test', 'gdsagfdsfdsf', 'a-test-post-to-facebook', '', '', '100002761321081_159072884194755', NULL, 'adsf', '"Lorem ipsum dolor sit amet, consectetur adipisicing elit, boogabook s sdas ddasfds dasfdsf', 1323593029, 1323590400, NULL, 'a'),
(304, 57, 9, 'dsafdsf', 'dsagfgasdfdsf', 'dasfsadfsd', 'dsafdsf', '', NULL, NULL, NULL, 'vcvcdsf', 'gfgfgdsb', 1323604562, 1323604080, NULL, 'a'),
(305, 57, NULL, 'this is something i will test', 'dsfsadfsdaf', 'gsadfdsfdsf', 'this-is-something-i-will-test', '', NULL, NULL, NULL, 'fsadfdsaf', 'gdsfgsdfg', 1323604708, 1323601920, NULL, 'a'),
(306, 57, NULL, 'asdfasdg', 'fsagsdfafsda', 'dsfadsaf', 'asdfasdg', '', NULL, NULL, NULL, 'asdfsdf', 'dasf', 1323604750, 1323601260, NULL, 'a'),
(307, 57, NULL, 'Short url test', 'its 7:00 am', 'dsafdsgfgdsfdsa fdsfdsfsd', 'short-url-test', '', NULL, NULL, NULL, 'dasgfgasfg', 'fgdfgasfds', 1323604835, 1323605880, NULL, 'a'),
(308, 57, NULL, 'dsfdsafdfasd ', 'sdfasdfsd', 'sdafasdfdsf', 'dsfdsafdfasd', '', NULL, NULL, NULL, 'dsfasdf', 'sdagdsaf', 1323604888, 1323606000, NULL, 'a'),
(309, 57, NULL, 'a super0big ferase', 'dsafdsf', 'fadsfdasf', 'a-super0big-ferase', '', NULL, NULL, NULL, 'gadsfa', 'dafdsfsdfsd', 1323604968, 1323606120, NULL, 'a'),
(310, 57, NULL, 'dsafasdf', 'dsaf', 'dsafasdf', 'dsafasdf', '', NULL, NULL, NULL, 'dsafsdf', 'gadsfdsf', 1323604997, 1323605220, NULL, 'a'),
(311, 57, NULL, 'anoher ydafdsfdsf', 'sdafdsafd', 'dsafsdaf', 'anoher-ydafdsfdsf', '', NULL, NULL, NULL, 'dsafsdf', 'dsafsdfdsaf', 1323605031, 1323607260, NULL, 'a'),
(312, 57, NULL, 'booga bood', 'dfsadfdsfas', 'dasfsdf', 'booga-bood', '', NULL, NULL, NULL, 'gfsad', 'dsafsdf', 1323605092, 1323607140, NULL, 'a'),
(313, 57, NULL, 'booga bood', 'dfsadfdsfas', 'dasfsdf', 'booga-bood', '', NULL, NULL, NULL, 'gfsad', 'dsafsdf', 1323605122, 1323607140, NULL, 'a'),
(314, 57, NULL, 'adsf', 'dsafsadfdsaf', 'dfasfsd', 'adsf', '', NULL, NULL, NULL, 'dsafsdaf', 'dsaf', 1323605166, 1323608280, NULL, 'a'),
(315, 57, NULL, 'dafdsf', 'fgdsfdasfd', 'dsafdsfdsaf', 'dafdsf', '', 'http://bit.ly/ryC3F3', NULL, '156534663039565824', 'gfdsgfdg', 'dfsdafsadfdsf', 1323605262, 1323606780, NULL, 'a'),
(316, 57, NULL, 'Time to test twitter and bitly integration', 'this is a test!', 'adsfads fdsf adsfdfsdaf', 'time-to-test-twitter-and-bitly-integration', '', 'http://bit.ly/tYiL4R', NULL, '145837792352681985', 'Hello', 'Hey, this is coming from my app', 1323605362, 1323608040, NULL, 'a'),
(317, 57, 9, 'Another attempt with bitly', 'THis will work!', 'dsafdsfdsafadsf', 'another-attempt-with-bitly', '', 'http://bit.ly/uRYZ0P', NULL, '145839156487127040', 'gfadsfdsf', 'A message from the twitter app', 1323605473, 1323607620, NULL, 'a'),
(318, 57, 10, 'A twitter Test', 'Dev it up', 'THis is a test', 'a-twitter-test', 'f22189ded52a4f5791a277b3c03ac6d9', 'http://bit.ly/tG1yKh', NULL, '146003614291345408', '', 'Twitter API TEST', 1323644942, 1323644400, NULL, 'a'),
(319, 57, NULL, 'Facebook Test', 'THis is a test to facebook', 'THis is a teSt!', 'facebook-test', '', 'http://bit.ly/yl3gWf', NULL, NULL, 'Hey Guys', 'Twiiter', 1326155859, 1326154260, NULL, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `article_image_hashes`
--

CREATE TABLE IF NOT EXISTS `article_image_hashes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `image_hash` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_article_image_hashes_articles1` (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=817 ;

--
-- Dumping data for table `article_image_hashes`
--

INSERT INTO `article_image_hashes` (`id`, `article_id`, `image_hash`) VALUES
(814, 318, '2f170a68a6e5ff84627875fcfc3832d7'),
(815, 318, 'acfb10ee46f2b8843d82e0453ebba2b3'),
(816, 318, 'c4f31f2bc3457be35fe9e97f0b399bed');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `status`) VALUES
(9, 'Food', NULL),
(10, 'Drink', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image_crop_id` int(11) NOT NULL,
  `image_hash` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_type` varchar(16) DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `file_w` int(11) DEFAULT NULL,
  `file_h` int(11) DEFAULT NULL,
  `crop_x1` int(11) DEFAULT NULL,
  `crop_y1` int(11) DEFAULT NULL,
  `crop_x2` int(11) DEFAULT NULL,
  `crop_y2` int(11) DEFAULT NULL,
  `time_create` int(11) DEFAULT NULL,
  `time_update` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_images_image_crops1` (`image_crop_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4087 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_crop_id`, `image_hash`, `file_name`, `file_type`, `file_size`, `file_w`, `file_h`, `crop_x1`, `crop_y1`, `crop_x2`, `crop_y2`, `time_create`, `time_update`, `status`) VALUES
(4065, 1, 'f22189ded52a4f5791a277b3c03ac6d9', 'f22189ded52a4f5791a277b3c03ac6d9_original.png', 'png', 1382244, 1280, 717, 0, 0, 0, 0, 1323709685, 1323710674, 'a'),
(4066, 2, 'f22189ded52a4f5791a277b3c03ac6d9', 'f22189ded52a4f5791a277b3c03ac6d9_main.png', 'png', 270637, 600, 150, 50, 73, 1202, 361, 1323709690, 1323710674, 'a'),
(4067, 3, 'f22189ded52a4f5791a277b3c03ac6d9', 'f22189ded52a4f5791a277b3c03ac6d9_thumbnail.png', 'png', 57900, 170, 113, 316, 110, 695, 363, 1323709694, 1323710674, 'a'),
(4068, 1, 'bf67265ddfac3d04048b2bd6cc084266', 'bf67265ddfac3d04048b2bd6cc084266_original.png', 'png', 39505, 366, 297, 0, 0, 0, 0, 1323711438, 1323711438, 'u'),
(4069, 1, 'c4f31f2bc3457be35fe9e97f0b399bed', 'c4f31f2bc3457be35fe9e97f0b399bed_original.jpg', 'jpg', 2547465, 2784, 1856, 0, 0, 0, 0, 1323711455, 1323711478, 'a'),
(4070, 2, 'c4f31f2bc3457be35fe9e97f0b399bed', 'c4f31f2bc3457be35fe9e97f0b399bed_main.jpg', 'jpg', 149024, 600, 394, 36, 36, 2748, 1818, 1323711459, 1323711478, 'a'),
(4071, 3, 'c4f31f2bc3457be35fe9e97f0b399bed', 'c4f31f2bc3457be35fe9e97f0b399bed_thumbnail.jpg', 'jpg', 19022, 170, 113, 246, 419, 1656, 1359, 1323711467, 1323711478, 'a'),
(4072, 1, '5360ab1a54ae63afe4396ce3f58446c5', '5360ab1a54ae63afe4396ce3f58446c5_original.jpg', 'jpg', 79646, 960, 640, 0, 0, 0, 0, 1323711846, 1323711846, 'u'),
(4073, 1, '2086b2f266820af9be4fdf6edfc6aa84', '2086b2f266820af9be4fdf6edfc6aa84_original.png', 'png', 1369856, 1280, 719, 0, 0, 0, 0, 1323712346, 1323712350, 'a'),
(4074, 2, '2086b2f266820af9be4fdf6edfc6aa84', '2086b2f266820af9be4fdf6edfc6aa84_main.png', 'png', 597148, 600, 331, 17, 17, 1264, 704, 1323712348, 1323712350, 'a'),
(4075, 3, '2086b2f266820af9be4fdf6edfc6aa84', '2086b2f266820af9be4fdf6edfc6aa84_thumbnail.png', 'png', 57900, 170, 113, 100, 0, 1177, 718, 1323712349, 1323712350, 'a'),
(4076, 1, 'acfb10ee46f2b8843d82e0453ebba2b3', 'acfb10ee46f2b8843d82e0453ebba2b3_original.png', 'png', 132061, 392, 289, 0, 0, 0, 0, 1323712410, 1323712413, 'a'),
(4077, 2, 'acfb10ee46f2b8843d82e0453ebba2b3', 'acfb10ee46f2b8843d82e0453ebba2b3_main.png', 'png', 782952, 600, 434, 10, 10, 382, 279, 1323712412, 1323712413, 'a'),
(4078, 3, 'acfb10ee46f2b8843d82e0453ebba2b3', 'acfb10ee46f2b8843d82e0453ebba2b3_thumbnail.png', 'png', 57900, 170, 113, 0, 14, 392, 275, 1323712413, 1323712413, 'a'),
(4079, 1, 'af2dd7596e05c59346311d680a98c2f2', 'af2dd7596e05c59346311d680a98c2f2_original.png', 'png', 132061, 392, 289, 0, 0, 0, 0, 1323712656, 1323712656, 'u'),
(4080, 1, '554708acfdb51d3252fa56cdb68efbfb', '554708acfdb51d3252fa56cdb68efbfb_original.png', 'png', 1382244, 1280, 717, 0, 0, 0, 0, 1323712664, 1323712664, 'u'),
(4081, 1, '2f170a68a6e5ff84627875fcfc3832d7', '2f170a68a6e5ff84627875fcfc3832d7_original.png', 'png', 26678, 114, 126, 0, 0, 0, 0, 1323712675, 1323712679, 'a'),
(4082, 2, '2f170a68a6e5ff84627875fcfc3832d7', '2f170a68a6e5ff84627875fcfc3832d7_main.png', 'png', 1221301, 600, 677, 10, 10, 104, 116, 1323712678, 1323712679, 'a'),
(4083, 3, '2f170a68a6e5ff84627875fcfc3832d7', '2f170a68a6e5ff84627875fcfc3832d7_thumbnail.png', 'png', 57900, 170, 113, 0, 25, 114, 101, 1323712679, 1323712679, 'a'),
(4084, 1, '0c2e97f12587791e1120604719770bd6', '0c2e97f12587791e1120604719770bd6_original.png', 'png', 1369856, 1280, 719, 0, 0, 0, 0, 1323712805, 1323712809, 'a'),
(4085, 2, '0c2e97f12587791e1120604719770bd6', '0c2e97f12587791e1120604719770bd6_main.png', 'png', 597148, 600, 331, 17, 17, 1264, 704, 1323712808, 1323712809, 'a'),
(4086, 3, '0c2e97f12587791e1120604719770bd6', '0c2e97f12587791e1120604719770bd6_thumbnail.png', 'png', 57900, 170, 113, 100, 0, 1177, 718, 1323712809, 1323712809, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `image_crops`
--

CREATE TABLE IF NOT EXISTS `image_crops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `aspect_ratio` float DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `image_crops`
--

INSERT INTO `image_crops` (`id`, `name`, `aspect_ratio`, `width`) VALUES
(1, 'original', 0, 0),
(2, 'main', 0, 600),
(3, 'thumbnail', 1.5, 170);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(500) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `bio` text,
  `last_login` int(11) DEFAULT NULL,
  `time_create` int(11) DEFAULT NULL,
  `time_update` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=58 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `bio`, `last_login`, `time_create`, `time_update`, `status`, `type`) VALUES
(57, 'tyler@theyoungastronauts.com', '2e5a5e5846a573f721b5b987d5dcba44', 'Tyler', 'Savery', '', NULL, NULL, NULL, 'a', 7);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article_image_hashes`
--
ALTER TABLE `article_image_hashes`
  ADD CONSTRAINT `fk_article_image_hashes_articles1` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `fk_images_image_crops1` FOREIGN KEY (`image_crop_id`) REFERENCES `image_crops` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
