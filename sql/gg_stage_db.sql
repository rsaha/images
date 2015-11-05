-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2015 at 01:42 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gg_stage_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guide_detail_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_guide_detail_profile` (
  `guide_detail_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `guide_profile_pic` longblob,
  `guide_Cover_pic` longblob,
  `nick_name` varchar(100) DEFAULT NULL,
  `license_Image` longblob,
  `license_no` varchar(200) DEFAULT NULL,
  `validity` date DEFAULT NULL,
  `guide_summary` text,
  `guide_experience` text,
  `guide_interest` text,
  `guide_territory` varchar(100) DEFAULT NULL,
  `guide_facebook_profile` varchar(200) DEFAULT NULL,
  `guide_linkedin_profile` varchar(200) DEFAULT NULL,
  `guide_pinterest_profile` varchar(200) DEFAULT NULL,
  `guide_skype_address` varchar(200) DEFAULT NULL,
  `landline_no` varchar(50) DEFAULT NULL,
  `payment_currency` varchar(100) DEFAULT NULL,
  `payment_terms` varchar(300) DEFAULT NULL,
  `Best_time_for_contact` varchar(100) DEFAULT NULL,
  `Communication_mechanism` varchar(100) DEFAULT NULL,
  `guide_Remarks` text,
  `status` tinyint(4) NOT NULL,
  `datecreated` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='Guide Detail Profile data';

--
-- Dumping data for table `tbl_guide_detail_profile`
--

INSERT INTO `tbl_guide_detail_profile` (`guide_detail_id`, `user_id`, `guide_profile_pic`, `guide_Cover_pic`, `nick_name`, `license_Image`, `license_no`, `validity`, `guide_summary`, `guide_experience`, `guide_interest`, `guide_territory`, `guide_facebook_profile`, `guide_linkedin_profile`, `guide_pinterest_profile`, `guide_skype_address`, `landline_no`, `payment_currency`, `payment_terms`, `Best_time_for_contact`, `Communication_mechanism`, `guide_Remarks`, `status`, `datecreated`) VALUES
(1, 10000, NULL, NULL, 'Admin', NULL, '[DE/01/2015/R]', '2017-02-22', NULL, 'ADMIN', NULL, 'All India', 'ADMIN', 'ADMIN', 'ADMIN', 'ADMIN', '01219999999', NULL, 'ADMIN', 'ANY TIME', 'Mobile & Email', 'ADMIN', 1, '2015-09-22'),
(2, 10001, NULL, NULL, 'Anki', NULL, '[UC/01/2014/R]', '2017-02-22', NULL, '10 Year Experiance in Guiding', NULL, 'UP, MP, WB, HP, DELHI', 'ankitbhagat.ab@gmail.com', 'ankitbhagat.ab@gmail.com', 'ankitbhagat.ab@gmail.com', 'ankitbhagat.ab@gmail.com', '01219999999', NULL, 'NO', '04:00 PM - 08:00 PM', 'Email', 'Best Of All', 1, '2015-09-22'),
(3, 10002, NULL, NULL, 'Vaibhi', '', '[TI/21/GOD/28]', '2018-12-31', NULL, 'Lots Of', NULL, NULL, 'www.facebook.com/vaibhav', 'https://in.linkedin.com/pub/vaibhav/65/6b0/958', 'vaibhav@gmail.com', 'vaibhav', '012187236788', NULL, 'no terms yer', '08:00 AM - 12:00 PM', 'Mobile', 'no', 1, '2015-09-22'),
(4, 10003, NULL, NULL, 'Sallu', '', '[RE/343/DSJ]', '2020-12-31', NULL, 'Lots of Experiance', NULL, 'Uttar Pradesh, Himachal Pradesh, Punjab', 'salman@gmail.com', 'salman@gmail.com', 'salman@gmail.com', 'salman@gmail.com', '012187236788', NULL, 'no', '08:00 AM - 12:00 PM', 'Mobile & Email', 'No', 1, '2015-09-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guide_known_languages`
--

CREATE TABLE IF NOT EXISTS `tbl_guide_known_languages` (
  `guide_known_language_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_guide_known_languages`
--

INSERT INTO `tbl_guide_known_languages` (`guide_known_language_id`, `user_id`, `language_id`) VALUES
(16, 10000, 2),
(17, 10000, 4),
(19, 10002, 2),
(20, 10003, 2),
(24, 10001, 2),
(25, 10001, 5),
(26, 10001, 3);

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
-- Table structure for table `tbl_languages`
--

CREATE TABLE IF NOT EXISTS `tbl_languages` (
  `language_id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `lanugage_name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `datecreated` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Language Master Table';

--
-- Dumping data for table `tbl_languages`
--

INSERT INTO `tbl_languages` (`language_id`, `user_id`, `lanugage_name`, `status`, `datecreated`) VALUES
(1, 10000, 'Hindi', 1, '2015-09-22'),
(2, 10000, 'English', 1, '2015-09-22'),
(3, 10000, 'Spanish', 1, '2015-09-22'),
(4, 10000, 'Germen', 1, '2015-09-22'),
(5, 10000, 'Franch', 1, '2015-09-22');

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
-- Table structure for table `tbl_referrals`
--

CREATE TABLE IF NOT EXISTS `tbl_referrals` (
  `referral_id` bigint(20) NOT NULL,
  `referrer_id` bigint(20) NOT NULL,
  `referral_name` varchar(20) DEFAULT NULL,
  `referral_email` varchar(50) NOT NULL,
  `referral_phone` varchar(50) DEFAULT NULL,
  `referral_status` int(11) NOT NULL,
  `datecreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tours`
--

CREATE TABLE IF NOT EXISTS `tbl_tours` (
  `tour_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `tour_category_id` int(11) NOT NULL,
  `tour_title` varchar(100) NOT NULL,
  `tour_location` varchar(100) NOT NULL,
  `tour_territory` varchar(500) DEFAULT NULL,
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
  `datecreated` date NOT NULL,
  `created_added` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tour Master repository';

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tours_location`
--

CREATE TABLE IF NOT EXISTS `tbl_tours_location` (
  `tour_location_id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `location_name` varchar(200) NOT NULL,
  `location_address` varchar(300) DEFAULT NULL,
  `location_description` text,
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Tour Category Master Table';

--
-- Dumping data for table `tbl_tour_category`
--

INSERT INTO `tbl_tour_category` (`tour_category_id`, `user_id`, `tour_category_title`, `status`, `datecreated`) VALUES
(1, 4, 'General', 1, '2015-08-20'),
(2, 4, 'Adventure', 1, '2015-08-20'),
(3, 4, 'Religious', 1, '2015-08-20'),
(4, 4, 'Art', 1, '2015-08-20'),
(5, 4, 'History', 1, '2015-08-20'),
(6, 4, 'Custom', 1, '2015-08-20');

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
-- Table structure for table `tbl_tour_itinerary`
--

CREATE TABLE IF NOT EXISTS `tbl_tour_itinerary` (
  `tour_Itinerary_id` bigint(20) NOT NULL,
  `tour_id` bigint(20) NOT NULL,
  `day` int(10) NOT NULL,
  `intraday` varchar(20) DEFAULT NULL,
  `description` text,
  `transport` varchar(100) DEFAULT NULL,
  `tourist_spot` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tour_media_pictures`
--

CREATE TABLE IF NOT EXISTS `tbl_tour_media_pictures` (
  `picture_media_id` bigint(20) NOT NULL,
  `tour_id` bigint(20) NOT NULL,
  `tour_picture` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tour_media_videos`
--

CREATE TABLE IF NOT EXISTS `tbl_tour_media_videos` (
  `video_media_id` bigint(20) NOT NULL,
  `tour_id` bigint(20) NOT NULL,
  `tour_video` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tour Video repository';

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_profile`
--

CREATE TABLE IF NOT EXISTS `tbl_user_profile` (
  `user_id` bigint(20) NOT NULL,
  `user_type_id` tinyint(4) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobileNo` varchar(50) NOT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `d_o_b` date DEFAULT NULL,
  `street_address` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `datecreated` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10004 DEFAULT CHARSET=utf8 COMMENT='Users Basic Profile';

--
-- Dumping data for table `tbl_user_profile`
--

INSERT INTO `tbl_user_profile` (`user_id`, `user_type_id`, `user_password`, `f_name`, `l_name`, `email`, `mobileNo`, `gender`, `d_o_b`, `street_address`, `city`, `state`, `country`, `status`, `datecreated`) VALUES
(10000, 4, '21232f297a57a5a743894a0e4a801fc3', 'Administrator', '', 'admin@admin.com', '9999999999', 'Male', '1987-06-28', 'Phool bagh Colony', 'Meerut', 'Uttar Pradesh', 'India', 1, '2015-09-22'),
(10001, 1, 'a70ca1454267d4e4fc0bf2f130ba1a74', 'Ankit', 'Bhagat', 'ankit@waltrump.com', '8532859600', 'Male', '1987-06-28', 'Phool bagh Colony', 'Meerut', 'Uttar Pradesh', 'India', 1, '2015-09-22'),
(10002, 1, '310a87565a48526e9d096f917007dbfe', 'Vaibhav', 'Kumar', 'vaibhav@waltrump.com', '9888888888', 'Male', '1985-12-31', 'Shastri Nagar', 'Meerut', 'Uttar Pradesh', 'India', 1, '2015-09-22'),
(10003, 1, '03346657feea0490a4d4f677faa0583d', 'Salman', 'Ahmad', 'salman@gmail.com', '9777777777', 'Male', '1988-12-31', 'Shastri Nagar', 'Meerut', 'Uttar Pradesh', 'India', 1, '2015-09-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE IF NOT EXISTS `tbl_user_type` (
  `user_type_id` tinyint(4) NOT NULL,
  `user_type_name` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `datecreated` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='User Type Master Table';

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`user_type_id`, `user_type_name`, `status`, `datecreated`) VALUES
(1, 'GUIDE', 1, '2015-08-20'),
(2, 'AGENT', 1, '2015-08-20'),
(3, 'TOURIST', 1, '2015-08-20'),
(4, 'ADMIN', 1, '2015-08-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_guide_detail_profile`
--
ALTER TABLE `tbl_guide_detail_profile`
  ADD PRIMARY KEY (`guide_detail_id`), ADD UNIQUE KEY `user_id` (`user_id`);

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
-- Indexes for table `tbl_referrals`
--
ALTER TABLE `tbl_referrals`
  ADD PRIMARY KEY (`referral_id`);

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
-- Indexes for table `tbl_tour_itinerary`
--
ALTER TABLE `tbl_tour_itinerary`
  ADD PRIMARY KEY (`tour_Itinerary_id`);

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
-- Indexes for table `tbl_user_profile`
--
ALTER TABLE `tbl_user_profile`
  ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `ui_Email` (`email`), ADD UNIQUE KEY `ui_mobileNo` (`mobileNo`), ADD KEY `user_type_id` (`user_type_id`), ADD KEY `user_type_id_2` (`user_type_id`), ADD KEY `user_type_id_3` (`user_type_id`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_guide_detail_profile`
--
ALTER TABLE `tbl_guide_detail_profile`
  MODIFY `guide_detail_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_guide_known_languages`
--
ALTER TABLE `tbl_guide_known_languages`
  MODIFY `guide_known_language_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tbl_guide_tour_locations`
--
ALTER TABLE `tbl_guide_tour_locations`
  MODIFY `guide_tour_location_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_languages`
--
ALTER TABLE `tbl_languages`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  MODIFY `message_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_referrals`
--
ALTER TABLE `tbl_referrals`
  MODIFY `referral_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_tours`
--
ALTER TABLE `tbl_tours`
  MODIFY `tour_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_tours_location`
--
ALTER TABLE `tbl_tours_location`
  MODIFY `tour_location_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_tour_booking`
--
ALTER TABLE `tbl_tour_booking`
  MODIFY `tour_booking_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_tour_category`
--
ALTER TABLE `tbl_tour_category`
  MODIFY `tour_category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_tour_experiences`
--
ALTER TABLE `tbl_tour_experiences`
  MODIFY `experience_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_tour_itinerary`
--
ALTER TABLE `tbl_tour_itinerary`
  MODIFY `tour_Itinerary_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_tour_media_pictures`
--
ALTER TABLE `tbl_tour_media_pictures`
  MODIFY `picture_media_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_tour_media_videos`
--
ALTER TABLE `tbl_tour_media_videos`
  MODIFY `video_media_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user_profile`
--
ALTER TABLE `tbl_user_profile`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10004;
--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `user_type_id` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
