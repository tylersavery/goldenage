-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 20, 2012 at 10:40 PM
-- Server version: 5.5.9
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `goldenage`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=327 ;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` VALUES(320, 57, 9, 'The 10 Greatest B-52''s Songs1', 'While we would like to contrive some sort of cosmic reason for compiling this list today, we confess: We got ‰ÛÏMesopotamia‰Û? stuck in our heads yesterday, while walking into the office kitchen, and that was motivation enough.', 'All of these tunes are available on 2002‰Ûªs excellent two-disc Rhino set Nude On The Moon: The B-52‰Ûªs anthology. Put it on, have a flaming volcano and enjoy.', 'the-10-greatest-b-52s-songs1', 'e02c17d41b9c9c03f41f72bb4ab57913', 'http://bit.ly/zpj9tu', NULL, NULL, '', '', 1330981303, 1330977600, NULL, 'a');
INSERT INTO `articles` VALUES(321, 57, 9, 'The Beatles Land in New York City', 'The Beatles arrived in America on February 7, 1964, ', '<p>The Beatles arrived in America on February 7, 1964,&nbsp;and made the first of three consecutive appearances on the "Ed Sullivan Show" two days later. The Ed Sullivan Theater, at 1697 Broadway, is now the Late Show with David Letterman Theater. The Beatles stayed at the upscale Plaza Hotel, where their comings &amp; goings were marked by screams from frantic teenagers (to the horror of the hotel staff). The Plaza is on Central Park South at Fifth Avenue.</p>', 'the-beatles-land-in-new-york-city', '874b921e9fd5eecf295ed201bcaf4321', 'http://bit.ly/wsKgZ0', NULL, NULL, '', '', 1330987872, 1334905200, NULL, 'a');
INSERT INTO `articles` VALUES(322, 57, 11, 'Mission', 'Hiya,\r\n\r\nMy name is Jesse Markowitz, I am 27 years of age, I hail from Toronto, Ontario, Canada, and I am the president and founder of the brand new music management and consulting company, Golden Age.', '<p>Up until a year ago, I worked for three years at A440 Entertainment and Mascot Music, assisting the management team of Nikki Yanofsky, and several other artists. While there, I learned a great deal about the overwhelming amount of blood, sweat and tears that go into bringing music to the people. In April of 2011, I decided I wanted to go my own way. I left my position at A440/Mascot and have spent the last year doing a lot of soul searching.</p><p>Several months ago, what solidified in my head was the notion that even though much of the music which I hold closest to my heart is made by people who are deceased, now is a time to celebrate the simple fact that creativity and profundity thrive if one knows where to listen. Many of my favourite artists, both young and old, will release new music this year. Several nights a week, I have to decide which Toronto venue I will set foot in to hear some of the most life-affirming music imaginable. My goal is simple, which is to inform the world of the arts'' ability to teach empathy, and improve everyday life, regardless of circumstance.</p><p>The consulting aspect of Golden Age will be freelance to all those who require help in the areas of new media promotion, marketing plans, grant writing, A&amp;R, the creation of promotional tools such as bios and one sheets, and album liner note writing. Details of these services can be found here (link to Services page).</p><p>In the last several months, I have flirted with and discussed the prospect of my managing several artists to the extent that it feels like I''m a bachelor engaging in a version of dating that has only a slightly more acceptable level of polyamory than the real thing. The management aspect of Golden Age, right now, consists of one artist, and I plan on taking this artist to the top, Jerry Maguire-style. That artist is the most extraordinary composer and pianist in all of Canada, David Braid. I first met David when I was 16 at the now defunct Toronto jazz mecca, Top O'' The Senator, and I became an immediate devotee. I have been given advice by industry vets that to make it in this business, one must forego all tendencies towards fandom, and I am here to flush that notion straight down the shitter. I love David Braid''s music. I would not be caught dead saying that he is the most extraordinary pianist and composer in all of Canada if I didn''t truly mean it, and I won''t rest until he is recognized as such. Canada has a rich heritage of pianist whose genius is so pure that their music is recognized both in the halls of high musical scholarship, as well as in the ears and hearts of everyday Canadians. Oscar Peterson and Glenn Gould are the pioneers, and David Braid is the torchbearer. Last week, David received his second Juno Award, in the Traditional Jazz Album Of The Year category, for his solo piano record entitled "Verge".</p><p>Lastly, the aspect of Golden Age that will be most inclusive will be the blog component. From the time I started my first blog "Jesse Croons For Lovers", I have noticed that I have a way with words. For the last several years, people have been telling me that the things I write on Facebook brighten their day, make them think and make them laugh. I begun to notice about a year ago that I would run into people I had not seen in quite some time, and they would be completely up to date on my endeavours, as though they were worth following. The last straw was when I started to notice people unknowingly quoting my own words back to me. Modesty must inherently have its own breaking point, and I am being forthright when I say that I have made grown men cry with my writing. This blog will contain concert and record reviews, interviews, essays in the Christopher Hitchens style, and general musings on the state of music, and the music industry. I won''t limit it to just music, as I will likely throw in some thoughts on current news stories, movies and television, the gong show of American politics, etc. Since everything these days is a food blog, I will also put my George Brown College culinary school diploma to good use and blog about the stuff I cook.</p><p>To conclude, the age of social media has made everyone and their mother a promoter, which has resulted in people''s indifference to the bombardment of information being flung at them. I am not here to beg you to read my site, like my page, comment on my status, pay for my services, poke me, or to listen to my artist''s music. I am here to inform you that if you like brilliantly composed and executed jazz and classical music, David Braid''s music will make you happy every single time you listen to it. I am here to tell you that if you are a musician in possession of a good product but not the wherewithal to bring that product to the people, pay me some money, and I will make it worth your while. I am here to tell you that if insightful opinion on the state of music interests you, my blog will be a good read.</p><p>With Golden Age, I am staring down the stark reality of a crumbling industry, and saying, "Let''s dance." Consider this my "Wayne''s World 2" rite du passage. Consider this my attempt to gracefully overthrow the 1%. Consider this my "Born To Run", my "We Gotta Get Out Of This Place", my Newport 1956 "Diminuendo And Crescendo In Blue". It''s about damn time.</p><p>Thank you to Melodie Hebscher, Tom Markowitz and Jen Markowitz for helping me along every step of the way. Thank you to Scott Morin for teaching me. Thank you to Branford Marsalis for leading by example. Thank you to Tyler Savery and Nev Todorovic @ The Young Astronauts for executing my vision so beautifully. Thank you to David Braid both for believing in me and for enabling me to start out with my head held high. Last but not least, thank you to the music for giving me freedom and purpose. I won''t let you down.</p><p>Regards,</p><p>Jesse</p>', 'mission', '', NULL, NULL, NULL, '', '', 1334771224, 1334768400, NULL, 'a');
INSERT INTO `articles` VALUES(323, 57, 11, 'Services', '', '<p><span style="text-decoration: underline;">Grant Writing</span></p><p>I have written grant applications that have generated over 120 thousand dollars for artists such as Nikki Yanofsky, Molly Johnson, Matt Dusk and David Braid, including grants offered by Radio Starmaker Fund, FACTOR, Canada Council For The Arts and Ontario Arts Council.</p><p><span style="text-decoration: underline;">A&amp;R (Artists &amp; Repertoire)</span></p><p>I have consulted on projects ranging from the smallest indie records to major label releases in collaboration with iconic producer Phil Ramone. For the last two years, I have served on several boards and committees related to the Juno Awards. I possess a music library consisting of more than sixteen thousand records, covering the worlds of jazz, pop, classic rock, soul, gospel, R&amp;B, classical, country, bluegrass, and more.</p><p><span style="text-decoration: underline;">New Media Promotion</span></p><p>While at my last job, I oversaw the new media promotion of Nikki Yanofsky as she went from a relatively unknown artist to having a #1 quadruple platinum record. New media promotion covers Facebook, Twitter, Myspace, Bandcamp, Soundcloud, as well as my own brand of guerilla promotion in blogs and messageboards.&nbsp;</p><p><span style="text-decoration: underline;">Digital Content Manager</span></p><p>I have created and utilized an online database system for handling of all media related to my artists, eg, audio, video, press, photos, promotional documents, etc., with easy and quick access being a unique feature.</p><p><span style="text-decoration: underline;">Promotional Tools</span></p><p>I have written bios and created one sheet promotional flyers for many artists. Email me for examples. Additionally, I wrote the liner notes for acclaimed jazz pianist Robi Botos&rsquo; 2011 record <em>Place To Place</em>.</p>', 'services', '', NULL, NULL, NULL, '', '', 1334775577, 1334775540, NULL, 'a');
INSERT INTO `articles` VALUES(324, 57, 11, 'Roster', '', '<p><img src="/images/uploads/eda14b7fe0f07cf086361d3c484a5362_main.jpg?time=1334776217" path="eda14b7fe0f07cf086361d3c484a5362&gt;\r\n	&lt;span class=" /></p><p class="p1">David Braid</p><p class="p1"><span class="s1"><a href="http://www.davidbraid.com/">www.davidbraid.com</a></span><span class="s2">&nbsp;</span></p><p class="p1">Checkout our SoundCloud:</p><p class="p1"><span class="s1"><a href="http://soundcloud.com/golden-age-management">http://soundcloud.com/golden-age-management</a></span></p>', 'roster', '', NULL, NULL, NULL, '', '', 1334775874, 1334775600, NULL, 'a');
INSERT INTO `articles` VALUES(325, 57, 11, 'Contact', '', '<p><a href="mailto:jesse@thegoldenage.ca">jesse@thegoldenage.ca</a></p>', 'contact', '', NULL, NULL, NULL, '', '', 1334775994, 1334778660, NULL, 'a');
INSERT INTO `articles` VALUES(326, 57, 11, 'Homepage', '', '<ul><li><img src="/images/uploads/fb37a1f390597cc8ea14044d05320913_main.jpg?time=1334983019" path="fb37a1f390597cc8ea14044d05320913&gt;\r\n	&lt;span class=" /></li><li><img src="/images/uploads/fb37a1f390597cc8ea14044d05320913_main.jpg?time=1334983034" path="fb37a1f390597cc8ea14044d05320913&gt;\r\n	&lt;span class=" /></li><li><img src="/images/uploads/29dc0570cc3769fe468f653ad4d4fe62_main.jpg?time=1334983220" path="29dc0570cc3769fe468f653ad4d4fe62&gt;\r\n	&lt;span class=" /></li></ul>', 'homepage', '', NULL, NULL, NULL, '', '', 1334982861, 1334905200, NULL, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `article_image_hashes`
--

CREATE TABLE `article_image_hashes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `image_hash` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_article_image_hashes_articles1` (`article_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `article_image_hashes`
--

INSERT INTO `article_image_hashes` VALUES(1, 324, 'eda14b7fe0f07cf086361d3c484a5362');
INSERT INTO `article_image_hashes` VALUES(2, 326, 'fb37a1f390597cc8ea14044d05320913');
INSERT INTO `article_image_hashes` VALUES(3, 326, '29dc0570cc3769fe468f653ad4d4fe62');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` VALUES(9, 'Food', NULL);
INSERT INTO `categories` VALUES(10, 'Drink', NULL);
INSERT INTO `categories` VALUES(11, 'Static', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_comment` text NOT NULL,
  `user_webiste` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `entry_datetime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` VALUES(1, 300, 'Tyler Savery', 'tyler@theyoungastronauts.com', 'sdfadsf gfgfadfsadfdjskfjdsklhsdahf jsdafjdsdsh fjkdh jsdhfjsdhf ', 'www.google.com', '', 1330969941);
INSERT INTO `comments` VALUES(2, 300, 'Bobby Savery', 'tyler@theyoungastronauts.com', 'sdfadsf gfgfadfsadfdjskfjdsklhsdahf jsdafjdsdsh fjkdh jsdhfjsdhf das f dsfasdfds', 'www.google1.com', '', 1330969991);
INSERT INTO `comments` VALUES(3, 300, 'Billy Bob', 'bob@dfadf.com', 'sdfdsafdsa safgfd gdsaf asd', 'www.hotmail.com', '1', 1330970800);
INSERT INTO `comments` VALUES(4, 300, 'Something', 'dfds@dfsd.com', 'dfdsaf', 'dfdsfdsaf', '1', 1330970830);
INSERT INTO `comments` VALUES(5, 300, 'fsdg', 'sdfg', 'fdsgsfgsadf', 'fsdgfd', '1', 1330970912);
INSERT INTO `comments` VALUES(6, 315, 'Tyler Savery', 'tyler@theyoungastronauts.com', 'dfadsf dsfdsaf dsafdsafsdf', 'www.hotmail.com', '1', 1330971499);
INSERT INTO `comments` VALUES(7, 319, 'Tyler Savery', 'tyler@theyoungastronauts.com', 'Hello there beautiful', 'www.hotmail.com', NULL, 1330980561);
INSERT INTO `comments` VALUES(8, 319, 'Image Test', 'tyler@theyoungastronauts.com', 'dag ds fdsafvsdaf sdav', 'dsfsdafs', '1330980688.jpeg', 1330980697);
INSERT INTO `comments` VALUES(9, 320, 'Tyler Savery', 'tyler@theyoungastronauts.com', 'hello', 'www.theyoungastronauts.com', '1330982843.jpg', 1330982857);
INSERT INTO `comments` VALUES(10, 321, 'Tyler Savery', 'tyler@theyoungastronauts.com', 'fasdf ds fgfsdfsddsf dsfsfbfdgdsfdsgdsfads dasfdsfadf dsaf dsfdsf', 'www.hotmail.com', '1330987935.jpeg', 1330987962);
INSERT INTO `comments` VALUES(11, 321, 'bobby', 'tyler@hotmail.com', 'dsfsdafadsfds f ds', 'dsfdsaf', '', 1334775319);
INSERT INTO `comments` VALUES(12, 322, 'Tyler Savery', 'tyler@hotmail.com', 'Hey there!', 'www.google.com', '', 1334775405);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4135 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` VALUES(4065, 1, 'f22189ded52a4f5791a277b3c03ac6d9', 'f22189ded52a4f5791a277b3c03ac6d9_original.png', 'png', 1382244, 1280, 717, 0, 0, 0, 0, 1323709685, 1323710674, 'a');
INSERT INTO `images` VALUES(4066, 2, 'f22189ded52a4f5791a277b3c03ac6d9', 'f22189ded52a4f5791a277b3c03ac6d9_main.png', 'png', 270637, 600, 150, 50, 73, 1202, 361, 1323709690, 1323710674, 'a');
INSERT INTO `images` VALUES(4067, 3, 'f22189ded52a4f5791a277b3c03ac6d9', 'f22189ded52a4f5791a277b3c03ac6d9_thumbnail.png', 'png', 57900, 170, 113, 316, 110, 695, 363, 1323709694, 1323710674, 'a');
INSERT INTO `images` VALUES(4068, 1, 'bf67265ddfac3d04048b2bd6cc084266', 'bf67265ddfac3d04048b2bd6cc084266_original.png', 'png', 39505, 366, 297, 0, 0, 0, 0, 1323711438, 1323711438, 'u');
INSERT INTO `images` VALUES(4069, 1, 'c4f31f2bc3457be35fe9e97f0b399bed', 'c4f31f2bc3457be35fe9e97f0b399bed_original.jpg', 'jpg', 2547465, 2784, 1856, 0, 0, 0, 0, 1323711455, 1323711478, 'a');
INSERT INTO `images` VALUES(4070, 2, 'c4f31f2bc3457be35fe9e97f0b399bed', 'c4f31f2bc3457be35fe9e97f0b399bed_main.jpg', 'jpg', 149024, 600, 394, 36, 36, 2748, 1818, 1323711459, 1323711478, 'a');
INSERT INTO `images` VALUES(4071, 3, 'c4f31f2bc3457be35fe9e97f0b399bed', 'c4f31f2bc3457be35fe9e97f0b399bed_thumbnail.jpg', 'jpg', 19022, 170, 113, 246, 419, 1656, 1359, 1323711467, 1323711478, 'a');
INSERT INTO `images` VALUES(4072, 1, '5360ab1a54ae63afe4396ce3f58446c5', '5360ab1a54ae63afe4396ce3f58446c5_original.jpg', 'jpg', 79646, 960, 640, 0, 0, 0, 0, 1323711846, 1323711846, 'u');
INSERT INTO `images` VALUES(4073, 1, '2086b2f266820af9be4fdf6edfc6aa84', '2086b2f266820af9be4fdf6edfc6aa84_original.png', 'png', 1369856, 1280, 719, 0, 0, 0, 0, 1323712346, 1329850412, 'a');
INSERT INTO `images` VALUES(4074, 2, '2086b2f266820af9be4fdf6edfc6aa84', '2086b2f266820af9be4fdf6edfc6aa84_main.png', 'png', 490718, 600, 272, 2, 83, 1280, 663, 1323712348, 1334982888, 'a');
INSERT INTO `images` VALUES(4075, 3, '2086b2f266820af9be4fdf6edfc6aa84', '2086b2f266820af9be4fdf6edfc6aa84_thumbnail.png', 'png', 265952, 340, 260, 153, 0, 1092, 718, 1323712349, 1334982889, 'a');
INSERT INTO `images` VALUES(4076, 1, 'acfb10ee46f2b8843d82e0453ebba2b3', 'acfb10ee46f2b8843d82e0453ebba2b3_original.png', 'png', 132061, 392, 289, 0, 0, 0, 0, 1323712410, 1323712413, 'a');
INSERT INTO `images` VALUES(4077, 2, 'acfb10ee46f2b8843d82e0453ebba2b3', 'acfb10ee46f2b8843d82e0453ebba2b3_main.png', 'png', 782952, 600, 434, 10, 10, 382, 279, 1323712412, 1323712413, 'a');
INSERT INTO `images` VALUES(4078, 3, 'acfb10ee46f2b8843d82e0453ebba2b3', 'acfb10ee46f2b8843d82e0453ebba2b3_thumbnail.png', 'png', 57900, 170, 113, 0, 14, 392, 275, 1323712413, 1323712413, 'a');
INSERT INTO `images` VALUES(4079, 1, 'af2dd7596e05c59346311d680a98c2f2', 'af2dd7596e05c59346311d680a98c2f2_original.png', 'png', 132061, 392, 289, 0, 0, 0, 0, 1323712656, 1323712656, 'u');
INSERT INTO `images` VALUES(4080, 1, '554708acfdb51d3252fa56cdb68efbfb', '554708acfdb51d3252fa56cdb68efbfb_original.png', 'png', 1382244, 1280, 717, 0, 0, 0, 0, 1323712664, 1323712664, 'u');
INSERT INTO `images` VALUES(4081, 1, '2f170a68a6e5ff84627875fcfc3832d7', '2f170a68a6e5ff84627875fcfc3832d7_original.png', 'png', 26678, 114, 126, 0, 0, 0, 0, 1323712675, 1330983682, 'a');
INSERT INTO `images` VALUES(4082, 2, '2f170a68a6e5ff84627875fcfc3832d7', '2f170a68a6e5ff84627875fcfc3832d7_main.png', 'png', 1221301, 600, 677, 10, 10, 104, 116, 1323712678, 1330983682, 'a');
INSERT INTO `images` VALUES(4083, 3, '2f170a68a6e5ff84627875fcfc3832d7', '2f170a68a6e5ff84627875fcfc3832d7_thumbnail.png', 'png', 264931, 340, 259, 0, 25, 114, 112, 1323712679, 1330983682, 'a');
INSERT INTO `images` VALUES(4084, 1, '0c2e97f12587791e1120604719770bd6', '0c2e97f12587791e1120604719770bd6_original.png', 'png', 1369856, 1280, 719, 0, 0, 0, 0, 1323712805, 1323712809, 'a');
INSERT INTO `images` VALUES(4085, 2, '0c2e97f12587791e1120604719770bd6', '0c2e97f12587791e1120604719770bd6_main.png', 'png', 597148, 600, 331, 17, 17, 1264, 704, 1323712808, 1323712809, 'a');
INSERT INTO `images` VALUES(4086, 3, '0c2e97f12587791e1120604719770bd6', '0c2e97f12587791e1120604719770bd6_thumbnail.png', 'png', 57900, 170, 113, 100, 0, 1177, 718, 1323712809, 1323712809, 'a');
INSERT INTO `images` VALUES(4087, 1, '38cef36f41c99f50a890714410fe98c1', '38cef36f41c99f50a890714410fe98c1_original.jpg', 'jpg', 28769, 300, 300, 0, 0, 0, 0, 1329847134, 1329847209, 'a');
INSERT INTO `images` VALUES(4088, 2, '38cef36f41c99f50a890714410fe98c1', '38cef36f41c99f50a890714410fe98c1_main.jpg', 'jpg', 100782, 600, 429, 10, 10, 290, 210, 1329847141, 1329847209, 'a');
INSERT INTO `images` VALUES(4089, 3, '38cef36f41c99f50a890714410fe98c1', '38cef36f41c99f50a890714410fe98c1_thumbnail.jpg', 'jpg', 13734, 170, 113, 7, 21, 294, 212, 1329847209, 1329847209, 'a');
INSERT INTO `images` VALUES(4090, 1, '326de4325d391694e4b85afba3e05241', '326de4325d391694e4b85afba3e05241_original.jpg', 'jpg', 45098, 638, 425, 0, 0, 0, 0, 1329930423, 1329930439, 'a');
INSERT INTO `images` VALUES(4091, 2, '326de4325d391694e4b85afba3e05241', '326de4325d391694e4b85afba3e05241_main.jpg', 'jpg', 132818, 600, 438, 253, 28, 561, 253, 1329930429, 1329930439, 'a');
INSERT INTO `images` VALUES(4092, 3, '326de4325d391694e4b85afba3e05241', '326de4325d391694e4b85afba3e05241_thumbnail.jpg', 'jpg', 17099, 170, 113, 265, 42, 574, 248, 1329930439, 1329930439, 'a');
INSERT INTO `images` VALUES(4093, 1, '0192760b2a0f7cb7a499c8be97c8292e', '0192760b2a0f7cb7a499c8be97c8292e_original.jpg', 'jpg', 226066, 1127, 651, 0, 0, 0, 0, 1330116131, 1330116141, 'a');
INSERT INTO `images` VALUES(4094, 2, '0192760b2a0f7cb7a499c8be97c8292e', '0192760b2a0f7cb7a499c8be97c8292e_main.jpg', 'jpg', 202662, 600, 516, 189, 19, 912, 641, 1330116136, 1330116141, 'a');
INSERT INTO `images` VALUES(4095, 3, '0192760b2a0f7cb7a499c8be97c8292e', '0192760b2a0f7cb7a499c8be97c8292e_thumbnail.jpg', 'jpg', 18020, 170, 113, 174, 126, 736, 501, 1330116141, 1330116141, 'a');
INSERT INTO `images` VALUES(4096, 1, 'b82b737dc12f3611a455522c7f29cea0', 'b82b737dc12f3611a455522c7f29cea0_original.jpg', 'jpg', 226066, 1127, 651, 0, 0, 0, 0, 1330116159, 1330116188, 'a');
INSERT INTO `images` VALUES(4097, 2, 'b82b737dc12f3611a455522c7f29cea0', 'b82b737dc12f3611a455522c7f29cea0_main.jpg', 'jpg', 134687, 600, 331, 177, 111, 872, 494, 1330116169, 1330116188, 'a');
INSERT INTO `images` VALUES(4098, 3, 'b82b737dc12f3611a455522c7f29cea0', 'b82b737dc12f3611a455522c7f29cea0_thumbnail.jpg', 'jpg', 18862, 170, 113, 69, 132, 679, 539, 1330116188, 1330116188, 'a');
INSERT INTO `images` VALUES(4099, 1, '6f3259bebdfa97cdd078dbf27a41426d', '6f3259bebdfa97cdd078dbf27a41426d_original.jpeg', 'jpeg', 37799, 300, 300, 0, 0, 0, 0, 1330981347, 1330981354, 'a');
INSERT INTO `images` VALUES(4100, 2, '6f3259bebdfa97cdd078dbf27a41426d', '6f3259bebdfa97cdd078dbf27a41426d_main.jpeg', 'jpeg', 213298, 600, 600, 10, 10, 290, 290, 1330981350, 1330981354, 'a');
INSERT INTO `images` VALUES(4101, 3, '6f3259bebdfa97cdd078dbf27a41426d', '6f3259bebdfa97cdd078dbf27a41426d_thumbnail.jpeg', 'jpeg', 18339, 170, 113, 0, 6, 300, 206, 1330981354, 1330981354, 'a');
INSERT INTO `images` VALUES(4102, 1, '0dfb4372f52073517897774c3e14c0df', '0dfb4372f52073517897774c3e14c0df_original.jpeg', 'jpeg', 37799, 300, 300, 0, 0, 0, 0, 1330981908, 1330981966, 'a');
INSERT INTO `images` VALUES(4103, 2, '0dfb4372f52073517897774c3e14c0df', '0dfb4372f52073517897774c3e14c0df_main.jpeg', 'jpeg', 213298, 600, 600, 10, 10, 290, 290, 1330981909, 1330981966, 'a');
INSERT INTO `images` VALUES(4104, 3, '0dfb4372f52073517897774c3e14c0df', '0dfb4372f52073517897774c3e14c0df_thumbnail.jpeg', 'jpeg', 52191, 340, 227, 0, 0, 300, 200, 1330981913, 1330981966, 'a');
INSERT INTO `images` VALUES(4105, 1, '7832192f99652e03932344bd5a8e7e1c', '7832192f99652e03932344bd5a8e7e1c_original.jpeg', 'jpeg', 37799, 300, 300, 0, 0, 0, 0, 1330982047, 1330982053, 'a');
INSERT INTO `images` VALUES(4106, 2, '7832192f99652e03932344bd5a8e7e1c', '7832192f99652e03932344bd5a8e7e1c_main.jpeg', 'jpeg', 213298, 600, 600, 10, 10, 290, 290, 1330982049, 1330982053, 'a');
INSERT INTO `images` VALUES(4107, 3, '7832192f99652e03932344bd5a8e7e1c', '7832192f99652e03932344bd5a8e7e1c_thumbnail.jpeg', 'jpeg', 67129, 340, 261, 0, 28, 300, 258, 1330982053, 1330982053, 'a');
INSERT INTO `images` VALUES(4108, 1, '4cd20c951dd405a15775192236e27562', '4cd20c951dd405a15775192236e27562_original.jpeg', 'jpeg', 37799, 300, 300, 0, 0, 0, 0, 1330983091, 1330983106, 'a');
INSERT INTO `images` VALUES(4109, 2, '4cd20c951dd405a15775192236e27562', '4cd20c951dd405a15775192236e27562_main.jpeg', 'jpeg', 213298, 600, 600, 10, 10, 290, 290, 1330983093, 1330983106, 'a');
INSERT INTO `images` VALUES(4110, 3, '4cd20c951dd405a15775192236e27562', '4cd20c951dd405a15775192236e27562_thumbnail.jpeg', 'jpeg', 67225, 340, 261, 0, 29, 300, 259, 1330983096, 1330983106, 'a');
INSERT INTO `images` VALUES(4111, 4, '4cd20c951dd405a15775192236e27562', '4cd20c951dd405a15775192236e27562_slider.jpeg', 'jpeg', 184781, 940, 298, 0, 152, 300, 247, 1330983106, 1330983106, 'a');
INSERT INTO `images` VALUES(4112, 4, '2f170a68a6e5ff84627875fcfc3832d7', '2f170a68a6e5ff84627875fcfc3832d7_slider.png', 'png', 2025977, 940, 717, 0, 25, 114, 112, 1330983682, 1330983682, 'a');
INSERT INTO `images` VALUES(4113, 1, 'e02c17d41b9c9c03f41f72bb4ab57913', 'e02c17d41b9c9c03f41f72bb4ab57913_original.jpeg', 'jpeg', 37799, 300, 300, 0, 0, 0, 0, 1330984292, 1330984298, 'a');
INSERT INTO `images` VALUES(4114, 2, 'e02c17d41b9c9c03f41f72bb4ab57913', 'e02c17d41b9c9c03f41f72bb4ab57913_main.jpeg', 'jpeg', 213298, 600, 600, 10, 10, 290, 290, 1330984294, 1330984298, 'a');
INSERT INTO `images` VALUES(4115, 3, 'e02c17d41b9c9c03f41f72bb4ab57913', 'e02c17d41b9c9c03f41f72bb4ab57913_thumbnail.jpeg', 'jpeg', 67841, 340, 261, 0, 35, 300, 265, 1330984295, 1330984298, 'a');
INSERT INTO `images` VALUES(4116, 4, 'e02c17d41b9c9c03f41f72bb4ab57913', 'e02c17d41b9c9c03f41f72bb4ab57913_slider.jpeg', 'jpeg', 125286, 940, 298, 0, 72, 300, 167, 1330984298, 1330984298, 'a');
INSERT INTO `images` VALUES(4117, 1, '874b921e9fd5eecf295ed201bcaf4321', '874b921e9fd5eecf295ed201bcaf4321_original.jpg', 'jpg', 130878, 1024, 768, 0, 0, 0, 0, 1330987817, 1330987866, 'a');
INSERT INTO `images` VALUES(4118, 2, '874b921e9fd5eecf295ed201bcaf4321', '874b921e9fd5eecf295ed201bcaf4321_main.jpg', 'jpg', 188157, 600, 447, 13, 13, 1010, 755, 1330987822, 1330987866, 'a');
INSERT INTO `images` VALUES(4119, 3, '874b921e9fd5eecf295ed201bcaf4321', '874b921e9fd5eecf295ed201bcaf4321_thumbnail.jpg', 'jpg', 71331, 340, 260, 37, 23, 987, 749, 1330987853, 1330987866, 'a');
INSERT INTO `images` VALUES(4120, 4, '874b921e9fd5eecf295ed201bcaf4321', '874b921e9fd5eecf295ed201bcaf4321_slider.jpg', 'jpg', 172775, 940, 299, 0, 125, 1024, 451, 1330987866, 1330987866, 'a');
INSERT INTO `images` VALUES(4121, 1, 'eda14b7fe0f07cf086361d3c484a5362', 'eda14b7fe0f07cf086361d3c484a5362_original.jpg', 'jpg', 63010, 350, 233, 0, 0, 0, 0, 1334776201, 1334776205, 'a');
INSERT INTO `images` VALUES(4122, 2, 'eda14b7fe0f07cf086361d3c484a5362', 'eda14b7fe0f07cf086361d3c484a5362_main.jpg', 'jpg', 147461, 600, 387, 10, 10, 340, 223, 1334776202, 1334776205, 'a');
INSERT INTO `images` VALUES(4123, 3, 'eda14b7fe0f07cf086361d3c484a5362', 'eda14b7fe0f07cf086361d3c484a5362_thumbnail.jpg', 'jpg', 69338, 340, 260, 23, 0, 328, 233, 1334776203, 1334776205, 'a');
INSERT INTO `images` VALUES(4124, 4, 'eda14b7fe0f07cf086361d3c484a5362', 'eda14b7fe0f07cf086361d3c484a5362_slider.jpg', 'jpg', 167575, 940, 298, 0, 61, 350, 172, 1334776205, 1334776205, 'a');
INSERT INTO `images` VALUES(4125, 1, 'fb37a1f390597cc8ea14044d05320913', 'fb37a1f390597cc8ea14044d05320913_original.jpg', 'jpg', 73150, 940, 275, 0, 0, 0, 0, 1334982997, 1334983019, 'a');
INSERT INTO `images` VALUES(4126, 2, 'fb37a1f390597cc8ea14044d05320913', 'fb37a1f390597cc8ea14044d05320913_main.jpg', 'jpg', 69993, 600, 166, 12, 12, 932, 266, 1334983007, 1334983019, 'a');
INSERT INTO `images` VALUES(4127, 3, 'fb37a1f390597cc8ea14044d05320913', 'fb37a1f390597cc8ea14044d05320913_thumbnail.jpg', 'jpg', 61621, 340, 260, 448, 0, 807, 275, 1334983011, 1334983019, 'a');
INSERT INTO `images` VALUES(4128, 4, 'fb37a1f390597cc8ea14044d05320913', 'fb37a1f390597cc8ea14044d05320913_slider.jpg', 'jpg', 153220, 940, 299, 40, 0, 904, 275, 1334983019, 1334983019, 'a');
INSERT INTO `images` VALUES(4129, 1, '29dc0570cc3769fe468f653ad4d4fe62', '29dc0570cc3769fe468f653ad4d4fe62_original.jpg', 'jpg', 330012, 1200, 400, 0, 0, 0, 0, 1334983212, 1334983220, 'a');
INSERT INTO `images` VALUES(4130, 2, '29dc0570cc3769fe468f653ad4d4fe62', '29dc0570cc3769fe468f653ad4d4fe62_main.jpg', 'jpg', 77579, 600, 189, 16, 16, 1185, 385, 1334983214, 1334983220, 'a');
INSERT INTO `images` VALUES(4131, 3, '29dc0570cc3769fe468f653ad4d4fe62', '29dc0570cc3769fe468f653ad4d4fe62_thumbnail.jpg', 'jpg', 51223, 340, 260, 0, 0, 524, 401, 1334983217, 1334983220, 'a');
INSERT INTO `images` VALUES(4132, 4, '29dc0570cc3769fe468f653ad4d4fe62', '29dc0570cc3769fe468f653ad4d4fe62_slider.jpg', 'jpg', 170905, 940, 299, 0, 9, 1200, 391, 1334983220, 1334983220, 'a');
INSERT INTO `images` VALUES(4133, 1, '7ce1314be13988d8afc4ab8e408ebd31', '7ce1314be13988d8afc4ab8e408ebd31_original.jpg', 'jpg', 71210, 640, 426, 0, 0, 0, 0, 1334984046, 1334984046, 'u');
INSERT INTO `images` VALUES(4134, 1, '1d9e9c6c8fcaa6ac15d29a7933853e4f', '1d9e9c6c8fcaa6ac15d29a7933853e4f_original.jpg', 'jpg', 71210, 640, 426, 0, 0, 0, 0, 1334984088, 1334984088, 'u');

-- --------------------------------------------------------

--
-- Table structure for table `image_crops`
--

CREATE TABLE `image_crops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `aspect_ratio` float DEFAULT NULL,
  `width` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `image_crops`
--

INSERT INTO `image_crops` VALUES(1, 'original', 0, 0);
INSERT INTO `image_crops` VALUES(2, 'main', 0, 600);
INSERT INTO `image_crops` VALUES(3, 'thumbnail', 1.307, 340);
INSERT INTO `image_crops` VALUES(4, 'slider', 3.148, 940);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
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

INSERT INTO `users` VALUES(57, 'tyler@theyoungastronauts.com', '2e5a5e5846a573f721b5b987d5dcba44', 'Jesse', 'Markowitz', '', NULL, NULL, NULL, 'a', 7);

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
