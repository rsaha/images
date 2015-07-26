-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2015 at 11:58 AM
-- Server version: 5.6.24
-- PHP Version: 5.5.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_guide_database`
--

-- --------------------------------------------------------
--
-- Table structure for table `tbl_guide_detail_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_guide_detail_profile` (
  `guide_detail_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `guide_profile_pic` blob NOT NULL,
  `guide_Cover_pic` blob NOT NULL,
  `nick_name` varchar(100) NOT NULL,
  `license_Image` blob NOT NULL,
  `license_no` varchar(200) NOT NULL,
  `validity` date NOT NULL,
  `guide_summary` text NOT NULL,
  `guide_experience` text NOT NULL,
  `guide_interest` text NOT NULL,
  `guide_facebook_profile` varchar(200) NOT NULL,
  `guide_linkedin_profile` varchar(200) NOT NULL,
  `guide_pinterest_profile` varchar(200) NOT NULL,
  `guide_skype_address` varchar(200) NOT NULL,
  `landline_no` varchar(50) NOT NULL,
  `payment_currency` varchar(100) NOT NULL,
  `payment_terms` varchar(300) NOT NULL,
  `Best_time_for_contact` varchar(100) NOT NULL,
  `Communication_mechanism` varchar(100) NOT NULL,
  `guide_Remarks` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `datecreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Guide Detail Profile data';

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guide_known_languages`
--

CREATE TABLE IF NOT EXISTS `tbl_guide_known_languages` (
  `guide_known_language_id` bigint(20) NOT NULL,
  `guide_detail_id` bigint(20) NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guide_tour_locations`
--

CREATE TABLE IF NOT EXISTS `tbl_guide_tour_locations` (
  `guide_tour_location_id` bigint(20) NOT NULL,
  `guide_detail_id` bigint(20) NOT NULL,
  `tour_location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Table structure for table `tbl_referrals`
--

CREATE TABLE IF NOT EXISTS `tbl_referrals` (
  `referral_id` bigint(20) NOT NULL,
  `referrer_id` bigint(20) NOT NULL,
  `referral_name` int(11) NOT NULL,
  `referral_email` varchar(50) ,
  `referral_phone` varchar(50) ,
  `referral_status` int(11) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_languages`
--

CREATE TABLE IF NOT EXISTS `tbl_languages` (
  `language_id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `lanugage_name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `datecreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Language Master Table';

-- --------------------------------------------------------

--
-- Table structure for table `tbl_messages`
--

CREATE TABLE IF NOT EXISTS `tbl_messages` (
  `message_id` bigint(20) NOT NULL,
  `sender_user_id` bigint(20) NOT NULL,
  `receiver_user_id` bigint(20) NOT NULL,
  `message_body` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `datecreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Message Repository table';

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tours`
--

CREATE TABLE IF NOT EXISTS `tbl_tours` (
  `tour_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `tour_category_id` int(11) NOT NULL,
  `tour_title` varchar(100) NOT NULL,
  `tour_description` varchar(500) NOT NULL,
  `tour_duration` varchar(100) NOT NULL,
  `tour_price` varchar(100) NOT NULL,
  `start_point` varchar(200) NOT NULL,
  `end_point` varchar(200) NOT NULL,
  `inclusive` varchar(200) NOT NULL,
  `exclusive` varchar(200) NOT NULL,
  `cancelation_policy` varchar(300) NOT NULL,
  `restrictions` varchar(300) NOT NULL,
  `notes` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `datecreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tour Master repository';

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tours_location`
--

CREATE TABLE IF NOT EXISTS `tbl_tours_location` (
  `tour_location_id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `location_name` varchar(200) NOT NULL,
  `location_address` varchar(300) NOT NULL,
  `location_description` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `datecreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Location Master Table';

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tour_booking`
--

CREATE TABLE IF NOT EXISTS `tbl_tour_booking` (
  `tour_booking_id` bigint(20) NOT NULL,
  `guide_user_id` bigint(20) NOT NULL,
  `tourist_user_id` bigint(20) NOT NULL,
  `booking_status` varchar(100) NOT NULL,
  `tour_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Booking tour table';

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tour_category`
--

CREATE TABLE IF NOT EXISTS `tbl_tour_category` (
  `tour_category_id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `tour_category_title` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `datecreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tour Category Master Table';

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tour_experiences`
--

CREATE TABLE IF NOT EXISTS `tbl_tour_experiences` (
  `experience_id` bigint(20) NOT NULL,
  `tour_id` bigint(20) NOT NULL,
  `tour_experience` text NOT NULL,
  `tour_booking_id` bigint(20) NOT NULL,
  `star_ratings` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tour Experiences table';

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tour_media_pictures`
--

CREATE TABLE IF NOT EXISTS `tbl_tour_media_pictures` (
  `picture_media_id` bigint(20) NOT NULL,
  `tour_id` bigint(20) NOT NULL,
  `tour_picture` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tour_media_videos`
--

CREATE TABLE IF NOT EXISTS `tbl_tour_media_videos` (
  `video_media_id` bigint(20) NOT NULL,
  `tour_id` bigint(20) NOT NULL,
  `tour_video` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tour Video repository';

-- --------------------------------------------------------

--
-- Table structure for table ` tbl_user_profile`
--

CREATE TABLE IF NOT EXISTS ` tbl_user_profile` (
  `user_id` bigint(20) NOT NULL,
  `user_type_id` tinyint(4) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobileNo` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `d_o_b` date NOT NULL,
  `street_address` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `datecreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Users Basic Profile';

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE IF NOT EXISTS `tbl_user_type` (
  `user_type_id` tinyint(4) NOT NULL,
  `user_type_name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `datecreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='User Type Master Table';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_guide_detail_profile`
--
ALTER TABLE `tbl_guide_detail_profile`
  ADD PRIMARY KEY (`guide_detail_id`);

--
-- Indexes for table `tbl_guide_known_languages`
--
ALTER TABLE `tbl_guide_known_languages`
  ADD PRIMARY KEY (`guide_known_language_id`);

--
-- Indexes for table `tbl_guide_tour_locations`
--
ALTER TABLE `tbl_guide_tour_locations`
  ADD PRIMARY KEY (`guide_tour_location_id`);

--
-- Indexes for table `tbl_languages`
--
ALTER TABLE `tbl_languages`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `tbl_tours`
--
ALTER TABLE `tbl_tours`
  ADD PRIMARY KEY (`tour_id`);

--
-- Indexes for table `tbl_tours_location`
--
ALTER TABLE `tbl_tours_location`
  ADD PRIMARY KEY (`tour_location_id`);

--
-- Indexes for table `tbl_tour_booking`
--
ALTER TABLE `tbl_tour_booking`
  ADD PRIMARY KEY (`tour_booking_id`);

--
-- Indexes for table `tbl_tour_category`
--
ALTER TABLE `tbl_tour_category`
  ADD PRIMARY KEY (`tour_category_id`);

--
-- Indexes for table `tbl_tour_experiences`
--
ALTER TABLE `tbl_tour_experiences`
  ADD PRIMARY KEY (`experience_id`);

--
-- Indexes for table `tbl_tour_media_pictures`
--
ALTER TABLE `tbl_tour_media_pictures`
  ADD PRIMARY KEY (`picture_media_id`);

--
-- Indexes for table `tbl_tour_media_videos`
--
ALTER TABLE `tbl_tour_media_videos`
  ADD PRIMARY KEY (`video_media_id`);

--
-- Indexes for table ` tbl_user_profile`
--
ALTER TABLE ` tbl_user_profile`
  ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `ui_Email` (`email`), ADD UNIQUE KEY `ui_mobileNo` (`mobileNo`), ADD KEY `user_type_id` (`user_type_id`), ADD KEY `user_type_id_2` (`user_type_id`), ADD KEY `user_type_id_3` (`user_type_id`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`user_type_id`), ADD UNIQUE KEY `ui_user_type` (`user_type_name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table ` tbl_user_profile`
--
ALTER TABLE ` tbl_user_profile`
ADD CONSTRAINT ` tbl_user_profile_ibfk_1` FOREIGN KEY (`user_type_id`) REFERENCES `tbl_user_type` (`user_type_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
