
--
-- Dumping data for table `tbl_guide_detail_profile`
--

INSERT INTO `tbl_guide_detail_profile` (`guide_detail_id`, `user_id`, `guide_profile_pic`, `guide_Cover_pic`, `nick_name`, `license_Image`, `license_no`, `validity`, `guide_summary`, `guide_experience`, `guide_interest`, `guide_facebook_profile`, `guide_linkedin_profile`, `guide_pinterest_profile`, `guide_skype_address`, `landline_no`, `payment_currency`, `payment_terms`, `Best_time_for_contact`, `Communication_mechanism`, `guide_Remarks`, `status`, `datecreated`) VALUES
(2, 5, NULL, NULL, 'Anki', '', 'AB12345', '0000-00-00', NULL, '20 year experiance', NULL, 'ankitbhagat.a', 'ankitbhagat', 'ankit_bhagat', 'ankitbhagat.ab', '012198876554321', NULL, 'Still No Terms', '12:00 PM - 04:00 PM', 'Email', 'best of all', 1, '2015-09-03'),
(3, 6, '', '', 'anki', '', 'AB12345', '0000-00-00', NULL, '-', NULL, 'ankitbhagat.a', 'ankitbhagat', 'ankit_bhagat', 'ankitbhagat.ab', '012198876554321', NULL, 'No', '12:00 PM - 04:00 PM', 'Email', '-', 1, '2015-09-03');

-- --------------------------------------------------------

--
-- Dumping data for table `tbl_referrals`
--

INSERT INTO `tbl_referrals` (`referral_id`, `referrer_id`, `referral_name`, `referral_email`, `referral_phone`, `referral_status`, `datecreated`) VALUES
(8, 5, 'ankit bhagat', 'ankitbhagat.ab@gmail.com', '8532859600', 1, '2015-09-03'),
(9, 5, 'vaibhav kumar', 'vaibhav@waltrump.com', '9333333333', 1, '2015-09-03'),
(10, 5, 'ankit', 'ankit@waltrump.com', '9666666666', 1, '2015-09-03'),
(11, 6, 'ankit bhagat', 'ankitbhagat.ab@gmail.com', '8532859600', 1, '2015-09-03'),
(12, 6, 'vaibhav kumar', 'vaibhav@waltrump.com', '9333333333', 1, '2015-09-03'),
(13, 6, 'ankit', 'ankit@waltrump.com', '9666666666', 1, '2015-09-03');

-- --------------------------------------------------------

--
-- Dumping data for table `tbl_tours`
--

INSERT INTO `tbl_tours` (`tour_id`, `user_id`, `tour_category_id`, `tour_title`, `tour_location`, `tour_description`, `tour_duration`, `tour_price`, `start_point`, `end_point`, `inclusive`, `exclusive`, `cancelation_policy`, `restrictions`, `notes`, `status`, `datecreated`) VALUES
(3, 5, 1, 'Delhi To Agra Tour', 'Delhi', 'very intresting tour, everyone must visit', '2 Days', '1200', 'Kashmeri Gate, Delhi', 'Kashmeri Gate, Delhi', 'Breakfast and Dinner', 'All Exclusive except Breakfast and Dinner', 'Once paid payment will not refund', 'no', 'visit and tell us about the facilities', 1, '2015-09-03'),
(4, 6, 2, 'Agra to Delhi Tour', 'Agra', 'Best Tour, You must join', '5 Days', '1000 Rs', 'Agra Fort, Agra', 'Agra Fort, Agra', '3 Times Meal', 'Shoping', 'no', 'no', 'no', 1, '2015-09-03'),
(5, 6, 1, 'Delhi to Mumbai', 'Delhi', 'Must Go', '10 Days', '2500 Rs', 'IGI Airport, Delhi', 'IGI Airport, Delhi', 'Transport, 3 Time Meals', 'Shoping, Drink', 'no', 'no', 'no', 1, '2015-09-03');

-- --------------------------------------------------------

--
-- Dumping data for table `tbl_tour_category`
--

INSERT INTO `tbl_tour_category` (`tour_category_id`, `user_id`, `tour_category_title`, `status`, `datecreated`) VALUES
(1, 4, 'General Tour', 1, '2015-08-20'),
(2, 4, 'Bussiness Tour', 1, '2015-08-20'),
(3, 4, 'Adventure Tour', 1, '2015-08-20'),
(4, 4, 'Relegious Tour', 1, '2015-08-20'),
(5, 4, 'Custom Tour', 1, '2015-08-20');

-- --------------------------------------------------------

--
-- Dumping data for table `tbl_user_profile`
--

INSERT INTO `tbl_user_profile` (`user_id`, `user_type_id`, `user_password`, `f_name`, `l_name`, `email`, `mobileNo`, `gender`, `d_o_b`, `street_address`, `city`, `state`, `country`, `status`, `datecreated`) VALUES
(5, 1, 'ankit123', 'Ankit', 'Bhagat', 'ankitbhagat.ab@gmail.com', '8532859600', 'Male', '0000-00-00', 'Phool Bagh Colony', 'Delhi', '', 'India', 1, '2015-09-03'),
(6, 1, 'ankit123', 'anki', '', 'ankit@waltrump.com', '9027955447', 'Male', '0000-00-00', 'Phool Bagh Colony', 'Meerut', 'Uttar Pradesh', 'India', 1, '2015-09-03');

-- --------------------------------------------------------

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`user_type_id`, `user_type_name`, `status`, `datecreated`) VALUES
(1, 'GUIDE', 1, '2015-07-27'),
(2, 'Agent', 1, '2015-08-19'),
(3, 'Touriest', 1, '2015-08-19'),
(4, 'Admin', 1, '2015-08-19');