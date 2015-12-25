CREATE TABLE IF NOT EXISTS `tbl_booking` (
  `booking_id` bigint(20) NOT NULL,
  `user_id` bigint(20) DEFAULT NULL,
  `booking_number` varchar(20) NOT NULL,
  `book_reff_id` bigint(20) NOT NULL,
  `booking_type` varchar(10) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `no_of_person` bigint(20) NOT NULL,
  `date_of_tour` date NOT NULL,
  `tour_duration` bigint(20) NOT NULL,
  `lodging_id` bigint(20) DEFAULT NULL,
  `transport_id` bigint(20) DEFAULT NULL,
  `promoCode` text,
  `promoCodeAmount` decimal(5,2) DEFAULT NULL,
  `total_price` int(20) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='Booking tour and guide table';


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
  `experiance_in_year` int(2) NOT NULL DEFAULT '0',
  `other_experience` text,
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Guide Detail Profile data';


CREATE TABLE IF NOT EXISTS `tbl_guide_known_languages` (
  `guide_known_language_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `language_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=278 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tbl_guide_tour_locations` (
  `guide_tour_location_id` bigint(20) NOT NULL,
  `guide_detail_id` bigint(20) NOT NULL,
  `tour_location_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tbl_languages` (
  `language_id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `lanugage_name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `datecreated` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='Language Master Table';

CREATE TABLE IF NOT EXISTS `tbl_messages` (
  `message_id` bigint(20) NOT NULL,
  `sender_user_id` bigint(20) NOT NULL,
  `receiver_user_id` bigint(20) NOT NULL,
  `message_body` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `datecreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Message Repository table';

CREATE TABLE IF NOT EXISTS `tbl_partner_service_booking_detail` (
  `partner_service_booking_id` bigint(20) NOT NULL,
  `category` varchar(50) NOT NULL,
  `partner_id` bigint(11) NOT NULL,
  `partner_name` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `included_tour` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='partner service detail';

CREATE TABLE IF NOT EXISTS `tbl_referrals` (
  `referral_id` bigint(20) NOT NULL,
  `referrer_id` bigint(20) NOT NULL,
  `referral_name` varchar(20) DEFAULT NULL,
  `referral_email` varchar(50) NOT NULL,
  `referral_phone` varchar(50) DEFAULT NULL,
  `referral_status` int(11) NOT NULL,
  `datecreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=50006 DEFAULT CHARSET=utf8 COMMENT='Tour Master repository';

CREATE TABLE IF NOT EXISTS `tbl_tours_location` (
  `tour_location_id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `location_name` varchar(200) NOT NULL,
  `location_address` varchar(300) DEFAULT NULL,
  `location_description` text,
  `status` tinyint(4) NOT NULL,
  `datecreated` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Location Master Table';

CREATE TABLE IF NOT EXISTS `tbl_tour_category` (
  `tour_category_id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `tour_category_title` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `datecreated` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='Tour Category Master Table';

CREATE TABLE IF NOT EXISTS `tbl_tour_experiences` (
  `experience_id` bigint(20) NOT NULL,
  `tour_id` bigint(20) NOT NULL,
  `tour_experience` text NOT NULL,
  `tour_booking_id` bigint(20) NOT NULL,
  `star_ratings` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tour Experiences table';

CREATE TABLE IF NOT EXISTS `tbl_tour_itinerary` (
  `tour_Itinerary_id` bigint(20) NOT NULL,
  `tour_id` bigint(20) NOT NULL,
  `day` int(10) NOT NULL,
  `intraday` varchar(20) DEFAULT NULL,
  `description` text,
  `transport` varchar(100) DEFAULT NULL,
  `tourist_spot` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tbl_tour_media_pictures` (
  `picture_media_id` bigint(20) NOT NULL,
  `tour_id` bigint(20) NOT NULL,
  `tour_picture` longblob NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `tbl_tour_media_videos` (
  `video_media_id` bigint(20) NOT NULL,
  `tour_id` bigint(20) NOT NULL,
  `tour_video` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Tour Video repository';

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
) ENGINE=InnoDB AUTO_INCREMENT=10007 DEFAULT CHARSET=utf8 COMMENT='Users Basic Profile';

CREATE TABLE IF NOT EXISTS `tbl_user_type` (
  `user_type_id` tinyint(4) NOT NULL,
  `user_type_name` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `datecreated` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='User Type Master Table';


CREATE TABLE IF NOT EXISTS `tour_fulldetail` (
`tour_id` bigint(20)
,`user_id` bigint(20)
,`tour_category_id` int(11)
,`tour_title` varchar(100)
,`tour_location` varchar(100)
,`tour_territory` varchar(500)
,`tour_description` varchar(500)
,`tour_duration` varchar(100)
,`tour_price` varchar(100)
,`start_point` varchar(200)
,`end_point` varchar(200)
,`inclusive` varchar(200)
,`exclusive` varchar(200)
,`cancelation_policy` varchar(300)
,`restrictions` varchar(300)
,`notes` text
,`day` int(10)
,`intraday` varchar(20)
,`description` text
,`transport` varchar(100)
,`tourist_spot` varchar(100)
);


CREATE TABLE IF NOT EXISTS `user_fulldetail` (
`user_id` bigint(20)
,`user_type_id` tinyint(4)
,`f_name` varchar(50)
,`l_name` varchar(50)
,`email` varchar(50)
,`mobileNo` varchar(50)
,`gender` varchar(20)
,`d_o_b` date
,`street_address` varchar(100)
,`city` varchar(100)
,`state` varchar(100)
,`country` varchar(100)
,`guide_detail_id` bigint(20)
,`guide_profile_pic` longblob
,`guide_Cover_pic` longblob
,`nick_name` varchar(100)
,`license_Image` longblob
,`license_no` varchar(200)
,`validity` date
,`guide_summary` text
,`experiance_in_year` int(2)
,`other_experience` text
,`guide_interest` text
,`guide_territory` varchar(100)
,`guide_facebook_profile` varchar(200)
,`guide_linkedin_profile` varchar(200)
,`guide_pinterest_profile` varchar(200)
,`guide_skype_address` varchar(200)
,`landline_no` varchar(50)
,`payment_currency` varchar(100)
,`payment_terms` varchar(300)
,`Best_time_for_contact` varchar(100)
,`Communication_mechanism` varchar(100)
,`guide_Remarks` text
,`status_user_profile` tinyint(4)
,`status_guide_detail_profile` tinyint(4)
);


DROP TABLE IF EXISTS `tour_fulldetail`;


CREATE VIEW `tour_fulldetail` AS select `tbl_tours`.`tour_id` AS `tour_id`,`tbl_tours`.`user_id` AS `user_id`,`tbl_tours`.`tour_category_id` AS `tour_category_id`,`tbl_tours`.`tour_title` AS `tour_title`,`tbl_tours`.`tour_location` AS `tour_location`,`tbl_tours`.`tour_territory` AS `tour_territory`,`tbl_tours`.`tour_description` AS `tour_description`,`tbl_tours`.`tour_duration` AS `tour_duration`,`tbl_tours`.`tour_price` AS `tour_price`,`tbl_tours`.`start_point` AS `start_point`,`tbl_tours`.`end_point` AS `end_point`,`tbl_tours`.`inclusive` AS `inclusive`,`tbl_tours`.`exclusive` AS `exclusive`,`tbl_tours`.`cancelation_policy` AS `cancelation_policy`,`tbl_tours`.`restrictions` AS `restrictions`,`tbl_tours`.`notes` AS `notes`,`tbl_tour_itinerary`.`day` AS `day`,`tbl_tour_itinerary`.`intraday` AS `intraday`,`tbl_tour_itinerary`.`description` AS `description`,`tbl_tour_itinerary`.`transport` AS `transport`,`tbl_tour_itinerary`.`tourist_spot` AS `tourist_spot` from (`tbl_tours` join `tbl_tour_itinerary` on((`tbl_tour_itinerary`.`tour_id` = `tbl_tours`.`tour_id`))) where (`tbl_tours`.`status` = 1);

-- --------------------------------------------------------

--
-- Structure for view `user_fulldetail`
--
DROP TABLE IF EXISTS `user_fulldetail`;

CREATE VIEW `user_fulldetail` AS select `tbl_user_profile`.`user_id` AS `user_id`,`tbl_user_profile`.`user_type_id` AS `user_type_id`,`tbl_user_profile`.`f_name` AS `f_name`,`tbl_user_profile`.`l_name` AS `l_name`,`tbl_user_profile`.`email` AS `email`,`tbl_user_profile`.`mobileNo` AS `mobileNo`,`tbl_user_profile`.`gender` AS `gender`,`tbl_user_profile`.`d_o_b` AS `d_o_b`,`tbl_user_profile`.`street_address` AS `street_address`,`tbl_user_profile`.`city` AS `city`,`tbl_user_profile`.`state` AS `state`,`tbl_user_profile`.`country` AS `country`,`tbl_guide_detail_profile`.`guide_detail_id` AS `guide_detail_id`,`tbl_guide_detail_profile`.`guide_profile_pic` AS `guide_profile_pic`,`tbl_guide_detail_profile`.`guide_Cover_pic` AS `guide_Cover_pic`,`tbl_guide_detail_profile`.`nick_name` AS `nick_name`,`tbl_guide_detail_profile`.`license_Image` AS `license_Image`,`tbl_guide_detail_profile`.`license_no` AS `license_no`,`tbl_guide_detail_profile`.`validity` AS `validity`,`tbl_guide_detail_profile`.`guide_summary` AS `guide_summary`,`tbl_guide_detail_profile`.`experiance_in_year` AS `experiance_in_year`,`tbl_guide_detail_profile`.`other_experience` AS `other_experience`,`tbl_guide_detail_profile`.`guide_interest` AS `guide_interest`,`tbl_guide_detail_profile`.`guide_territory` AS `guide_territory`,`tbl_guide_detail_profile`.`guide_facebook_profile` AS `guide_facebook_profile`,`tbl_guide_detail_profile`.`guide_linkedin_profile` AS `guide_linkedin_profile`,`tbl_guide_detail_profile`.`guide_pinterest_profile` AS `guide_pinterest_profile`,`tbl_guide_detail_profile`.`guide_skype_address` AS `guide_skype_address`,`tbl_guide_detail_profile`.`landline_no` AS `landline_no`,`tbl_guide_detail_profile`.`payment_currency` AS `payment_currency`,`tbl_guide_detail_profile`.`payment_terms` AS `payment_terms`,`tbl_guide_detail_profile`.`Best_time_for_contact` AS `Best_time_for_contact`,`tbl_guide_detail_profile`.`Communication_mechanism` AS `Communication_mechanism`,`tbl_guide_detail_profile`.`guide_Remarks` AS `guide_Remarks`,`tbl_user_profile`.`status` AS `status_user_profile`,`tbl_guide_detail_profile`.`status` AS `status_guide_detail_profile` from (`tbl_user_profile` left join `tbl_guide_detail_profile` on((`tbl_guide_detail_profile`.`user_id` = `tbl_user_profile`.`user_id`)));

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_guide_detail_profile`
--
ALTER TABLE `tbl_guide_detail_profile`
  ADD PRIMARY KEY (`guide_detail_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

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
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `ui_Email` (`email`),
  ADD UNIQUE KEY `ui_mobileNo` (`mobileNo`),
  ADD KEY `user_type_id` (`user_type_id`),
  ADD KEY `user_type_id_2` (`user_type_id`),
  ADD KEY `user_type_id_3` (`user_type_id`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`user_type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_guide_detail_profile`
--
ALTER TABLE `tbl_guide_detail_profile`
  MODIFY `guide_detail_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_guide_known_languages`
--
ALTER TABLE `tbl_guide_known_languages`
  MODIFY `guide_known_language_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=278;
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
  MODIFY `tour_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50006;
--
-- AUTO_INCREMENT for table `tbl_tours_location`
--
ALTER TABLE `tbl_tours_location`
  MODIFY `tour_location_id` int(11) NOT NULL AUTO_INCREMENT;
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
  MODIFY `tour_Itinerary_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `tbl_tour_media_pictures`
--
ALTER TABLE `tbl_tour_media_pictures`
  MODIFY `picture_media_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_tour_media_videos`
--
ALTER TABLE `tbl_tour_media_videos`
  MODIFY `video_media_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user_profile`
--
ALTER TABLE `tbl_user_profile`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10007;
--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `user_type_id` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;