-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 20, 2016 at 10:32 PM
-- Server version: 5.6.28
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `webdev5`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `timestamp`, `user_id`, `image_id`, `text`) VALUES
(1, '2016-10-20 20:28:24', 1, 4, 'They are so badass!'),
(2, '2016-10-20 20:28:24', 2, 4, 'I named my kid Kirk Hetfield!'),
(3, '2016-10-20 20:29:09', 3, 4, 'That\'s way weird!!'),
(4, '2016-10-20 20:29:25', 2, 4, 'You\'re weird!!'),
(5, '2016-10-20 20:29:48', 1, 4, 'Whatever, you\'re both weird. Hell, we\'re all weird!');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `uploaded_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `url`, `uploaded_on`, `title`, `description`, `user_id`) VALUES
(9, 'http://funny-gag.com/wp-content/cache/thumbnails/2016/09/615663_mqdefault-300x200-c.jpg', '2016-10-19 03:51:50', '25 years ago', 'Hey, Lars had hair then!', 1),
(10, 'http://www.adrianobrien.com/wp-content/uploads/galleries/post-356/thumbnails/Metallica12-2-08%20099.jpg', '2016-10-19 03:54:31', 'Lonely, dude', 'Derrrr,Hello?!', 2),
(11, 'http://www.erikacarrillophotography.com/wp-content/uploads/galleries/post-73/thumbnails/Metallica,%20James%20Hetfield%202007.jpg', '2016-10-19 03:54:31', 'Yahayyaaa!', 'Oooooo yayhaahhh!!\\m/', 3),
(12, 'http://t05.deviantart.net/_qbIBORkeqQmU0NL-hu7Riwtc94=/300x200/filters:fixed_height(100,100):origin()/pre00/df7b/th/pre/f/2010/080/a/b/james_hetfield___metallica_by_rodriguesteixeira.jpg', '2016-10-19 03:57:01', 'Tunin\'', 'I can\'t tune a guitar but I can tuna fish!', 4),
(13, 'https://www.google.com/search?q=metallica+thumbnails&biw=1290&bih=672&tbs=isz:ex,iszw:300,iszh:200&tbm=isch&source=lnt#imgrc=n2eG9mYi4Waf1M%3A', '2016-10-19 03:59:26', 'S&M', 'Not that kind!', 5),
(14, 'http://t14.deviantart.net/9w-rFLdCwLRyOJadgjfM9mYC4hU=/300x200/filters:fixed_height(100,100):origin()/pre06/3f83/th/pre/f/2010/334/7/0/metallica_evil_dude_by_natechuck-d33z71m.jpg', '2016-10-19 04:00:41', 'Dedication', 'I go to all their shows...like ALL of them. I\'m homeless. ', 6),
(15, 'https://s-media-cache-ak0.pinimg.com/236x/85/c7/ee/85c7eeae340b52b88ee7c54ee35a8451.jpg', '2016-10-19 04:02:44', 'James tatoo', 'Yayhayaa!!', 7),
(16, 'http://loudwire.com/files/2016/06/Robert-Trujillo-James-Hetfield-Metallica.jpg?w=300&h=200&zc=1&s=0&a=t&q=89', '2016-10-19 04:03:29', 'Trujillo and James', 'At the Philmore East.', 8),
(17, 'http://t00.deviantart.net/yqixjG6t5G4Yij9Q9fIPyn6JvE0=/300x200/filters:fixed_height(100,100):origin()/pre12/616a/th/pre/f/2008/178/d/8/metallica_tattoo__by_the_blackparade.jpg', '2016-10-19 04:06:45', 'One Lyrics', 'dum, dum, dum, dum...', 9),
(18, 'https://www.walldevil.com/wallpapers/w05/thumb/metallica-album-covers-heavy-metal-thrash-metal-metal-music.jpg', '2016-10-19 04:07:35', 'Best record', 'Blackened is the end!!!', 10),
(19, 'https://www.walldevil.com/wallpapers/w05/thumb/metallica-lars-ulrich-james-hetfield-long-hair-black-hair-heavy-metal-thrash-metal-beards-black-leather-jeans-kirk-hammett-jason-newsted-metal-music.jpg', '2016-10-19 04:09:00', 'Black Album days', 'Back when we needed the money..', 11),
(20, 'http://www.udiscovermusic.com/wp-content/uploads/2014/04/metallica3.jpg', '2016-10-19 04:10:38', 'Farewell!!', 'Dark continent...we love you!', 12);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `user_registered`) VALUES
(1, 'ProtienMan88', 'MaxPower88@gmail.com', 'ilovepuppies88', '2016-10-19 01:04:41'),
(2, 'TidyHouse69', 'mommydearest69@gmail.com', 'ilovebabies69', '2016-10-19 01:05:23'),
(3, 'LookAtMe33', 'lookatme33@gmail.com', 'lookingatyou33', '2016-10-19 01:05:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_fk0` (`user_id`),
  ADD KEY `comment_fk1` (`image_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `image_fk0` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;