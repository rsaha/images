
--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`user_type_id`, `user_type_name`, `status`, `datecreated`) VALUES
(1, 'GUIDE', 1, '2015-07-27');
-- ----------------------------------------------------------------------------


--
-- Dumping data for table `tbl_user_profile`
--

INSERT INTO `tbl_user_profile` (`user_id`, `user_type_id`, `user_password`, `f_name`, `l_name`, `email`, `mobileNo`, `gender`, `d_o_b`, `street_address`, `city`, `state`, `country`, `status`, `datecreated`) VALUES
(1, 1, 'ANUPKR', 'ANUP KR', 'SAHA', 'rsaha@xmapledatalab.com', '9234567891', 'Male', '0000-00-00', '', '', '', '', 1, '2015-07-28'),
(2, 1, 'KALLOL', 'KALLOL', 'BOSE', 'kal@xmapledatalab.com', '8234567891', 'Male', '0000-00-00', '', 'Delhi', 'Delhi', 'India', 1, '2015-07-28'),
(3, 1, 'AMITAVA', 'AMITAVA', 'MUKHOPADHYAY', 'amit@xmaple.com', '7234567891', 'Male', '0000-00-00', 'old govind puri', 'Delhi', '', '', 1, '2015-07-28'),
(4, 1, 'Ajay', 'Ajay', 'Sinha', 'ajay@xmaple.com', '7234560091', 'Male', '0000-00-00', '', '', '', 'India', 1, '2015-07-28'),
(5, 1, 'ANINDIT A', 'ANINDIT A', 'SAR', 'annd@xmaple.com', '7234567812', 'Female', '0000-00-00', 'C/o Bholanath Sar, Saktipur, Pathak Para, Hospital More', 'Murshidabad', 'gurgaon', 'india', 1, '2015-07-28'),
(6, 1, 'Bikash', 'Bikash', 'Mehera', 'Bil@xmaple.com', '9334567891', 'Male', '0000-00-00', 'Bidisha Housing, Flat no. A20/14, 134 C.S. Mukherjee Street', 'faridabad', '', '', 1, '2015-07-28'),
(7, 1, 'Bratati ', 'Bratati ', 'Saha', 'brat@maple.com', '7234566491', 'Male', '0000-00-00', 'BRS 81', '', '', '', 1, '2015-07-28'),
(8, 1, 'Champa', 'Champa', 'Sanyal', 'champ@ample.com', '7234567866', 'Female', '0000-00-00', 'AL 207, Salt Lake Sector-2', '', 'Kerala', 'India', 1, '2015-07-29'),
(9, 1, 'Debjani ', 'Debjani ', 'Banerjee', 'Debjani@xmaple.com', '9994567891', 'Male', '0000-00-00', 'Anandam Housing Scheme II , Flat no. 316, 7, KB', 'Sarani', 'Karnataka', 'India', 1, '2015-07-29'),
(10, 1, 'Debjani ', 'Debjani ', 'Mitra', 'Debjaniamit@yah.com', '8234532563', 'Male', '0000-00-00', '', '', 'Delhi', 'India', 1, '2015-07-29'),
(11, 1, 'Dilip ', 'Dilip ', ' Mitra', 'kr@gmal.com', '9856325874', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2015-07-29'),
(12, 1, 'Dilip Kumar ', 'Dilip Kumar ', 'Mukherjee', 'dilipk@jam.com', '9635214789', 'Male', '0000-00-00', '', '', 'Chhattisgarh', 'India', 1, '2015-07-29'),
(13, 1, 'Dipta ', 'Dipta ', 'Mukherjee', 'dip@risji.com', '9325412369', 'Male', '0000-00-00', 'Flat no. A-1, Subarna apt. 73, Aurobindo Road, konnagar,', 'Hoogly', 'Andaman and Nicobar Islands', 'India', 1, '2015-07-29'),
(14, 1, 'Hena ', 'Hena ', 'Kauser', 'Hen1ora@gmail.com', '7532156698', 'Female', '0000-00-00', 'B9/11, ESI Quarter, GB Block, Sector 3, Purbachal, Salt Lake,', 'andra', 'Andhra Pradesh', 'India', 1, '2015-07-29'),
(15, 1, 'Jagabandhu ', 'Jagabandhu ', 'Das', 'Jagabandhu@lol.in', '9632587412', 'Male', '0000-00-00', '13, Vivekananda Road', 'noida', 'Uttar Pradesh', 'India', 1, '2015-07-29'),
(16, 1, 'Krishnendu ', 'Krishnendu ', 'Bhattacharya', 'Krishnendu@lalal.com', '7896236548', 'Male', '0000-00-00', '80,L.N.Road', 'riyala', 'Punjab', 'India', 1, '2015-07-29'),
(17, 1, 'Sekhar ', 'Sekhar ', 'Ghosh', 'Ghosh@sk.com', '9234567222', 'Male', '0000-00-00', '8B-35, CIT Buildings, Old Beliaghata', 'rithala', 'Delhi', 'India', 1, '2015-07-29'),
(18, 1, 'Sudhapallab ', 'Sudhapallab ', 'Dasgupta', 'Dasgupta@xmal.com', '9632587459', 'Male', '0000-00-00', '2, Flat L3/24,KMDA Housing Estates PhaseII Kalyani Express Highway ', 'greaternoida', 'Uttar Pradesh', 'India', 1, '2015-07-29'),
(19, 1, 'vikas', 'vikas', 'alam', 'viki@gmai.com', '8523698523', 'Male', '0000-00-00', '', 'meeru', 'Uttar Pradesh', 'India', 1, '2015-07-29'),
(20, 1, 'yuyu', 'hritik', 'roshan', 'hritik@gmail.com', '9823928382', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2015-07-30'),
(21, 1, 'rishi', 'rishi', 'kapoor', 'rishikapoor@gmail.com', '9321225412', NULL, NULL, NULL, NULL, NULL, NULL, 1, '2015-07-31');

-- --------------------------------------------------------


--
-- Dumping data for table `tbl_guide_detail_profile`
--

INSERT INTO `tbl_guide_detail_profile` (`guide_detail_id`, `user_id`, `guide_profile_pic`, `guide_Cover_pic`, `nick_name`, `license_Image`, `license_no`, `validity`, `guide_summary`, `guide_experience`, `guide_interest`, `guide_facebook_profile`, `guide_linkedin_profile`, `guide_pinterest_profile`, `guide_skype_address`, `landline_no`, `payment_currency`, `payment_terms`, `Best_time_for_contact`, `Communication_mechanism`, `guide_Remarks`, `status`, `datecreated`) VALUES
(1, 1, NULL, NULL, 'ANU', NULL, '12345678', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '2015-07-28'),
(2, 2, NULL, NULL, 'KALL', NULL, '', '0000-00-00', '', '', '', '', 'abx@lin.com', '', '', '', '', '', '', '', '', 1, '2015-07-28'),
(3, 3, NULL, NULL, '', NULL, '12345666', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '..', '', '22', '', NULL, 1, '2015-07-28'),
(4, 4, NULL, NULL, 'aj', NULL, '', '0000-00-00', 'sdadfas', '', '', 'abc@yah.com', '', '', '', '', '', 'credit ', '', 'via mobile phone', 'asdfsa', 1, '2015-07-28'),
(5, 5, NULL, NULL, 'ananana', NULL, '2537895456', '0000-00-00', '', '', '', '@kal@gmao;l.com', 'abx@lin.com', '', '', '', '', '', '', '', '', 1, '2015-07-28'),
(6, 6, NULL, NULL, '', NULL, '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '2015-07-28'),
(7, 7, NULL, NULL, 'brat', NULL, '', '0000-00-00', '', '', '', 'abc@yah.com', '', '', '', '', '', '', '', '', '', 1, '2015-07-28'),
(8, 8, NULL, NULL, 'Champ', NULL, '', '0000-00-00', '', '', '', 'ch@gmaol.com', 'chx@lin.com', '', '', '', '', '', '', '', '', 1, '2015-07-29'),
(9, 9, NULL, NULL, 'Deb', NULL, '', '0000-00-00', '', '', '', 'ch@gmaol.com', 'chx@lin.com', '', '', '', '6333333333', '', '', '', '', 1, '2015-07-29'),
(10, 10, NULL, NULL, '', NULL, '', '0000-00-00', '', '', '', 'ch@gmaol.com', 'chx@lin.com', '', '', '', '', '', '', '', '', 1, '2015-07-29'),
(11, 12, NULL, NULL, 'adaskdjla', NULL, '', '0000-00-00', '', '@@@@@@@@@@', '', 'ch@gmaol.com', 'chx@lin.com', '', '', '', '', '', '', '', '', 1, '2015-07-29'),
(12, 13, NULL, NULL, '', NULL, '', '0000-00-00', '', '', '', 'dip@fb.com', 'aksdm@lin.in', '', '', '', '', '', '25:25', '', '', 1, '2015-07-29'),
(13, 14, NULL, NULL, 'hellan', NULL, '', '0000-00-00', '', '', '', 'ch@gmaol.com', 'chx@lin.com', '', '', '912096314555555', '', '', '', '', '', 1, '2015-07-29'),
(14, 15, NULL, NULL, 'das', NULL, '', '0000-00-00', '', '', '', 'abc@yah.com', 'abx@lin.com', '', '', '', '', '', '', '', '', 1, '2015-07-29'),
(15, 16, NULL, NULL, 'ndu', NULL, '', '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', NULL, 1, '2015-07-29'),
(16, 17, NULL, NULL, 'sekh', NULL, '', '0000-00-00', '', '', '', 'sekh@fb.com', 'sekh@lin.com', '', '', '', '', '', '', '', '', 1, '2015-07-29'),
(17, 18, NULL, NULL, 'pal', NULL, '', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '2015-07-29'),
(18, 19, NULL, NULL, 'alam', NULL, '', '0000-00-00', '', '', '', 'vik@fb.in', 'viki@lin.com', '', '', '', '', '', '', '', '', 1, '2015-07-29');

-- --------------------------------------------------------



--
-- Dumping data for table `tbl_referrals`
--

INSERT INTO `tbl_referrals` (`referral_id`, `referrer_id`, `referral_name`, `referral_email`, `referral_phone`, `referral_status`, `datecreated`) VALUES
(1, 4, '', '1111@gmail.com', '', 1, '2015-07-28'),
(2, 4, '', '222sals33@gmail.com', '', 1, '2015-07-28'),
(3, 4, '', 'sal@yahoo.in', '', 1, '2015-07-28'),
(4, 6, '', 'abc@hjaljsdk.ckj', '', 1, '2015-07-28'),
(5, 6, '', 'sddmfks@zmfkdm.szo', '', 1, '2015-07-28'),
(6, 7, '', 'brajeh@gmail.com', '', 1, '2015-07-28'),
(7, 8, '', 'ashu@gmail.com', '', 1, '2015-07-29'),
(8, 9, '', 'sal@as.in', '', 1, '2015-07-29'),
(9, 10, '', 'debu@gmail.com', '', 1, '2015-07-29'),
(10, 12, '', 'nin@fa.com', '', 1, '2015-07-29'),
(11, 12, '', 'raj@yaho.in', '', 1, '2015-07-29'),
(12, 12, '', 'na@yahoooooo.co', '', 1, '2015-07-29'),
(13, 14, '', 'brajeh@gmail.com', '', 1, '2015-07-29'),
(14, 14, '', '222sals33@gmail.com', '', 1, '2015-07-29'),
(15, 17, '', 'ris@yaj.com', '', 1, '2015-07-29'),
(16, 17, '', 'vikas@code.com', '', 1, '2015-07-29'),
(17, 19, '', 'anuku@gmailo.com', '', 1, '2015-07-29'),
(18, 20, '', 'acewin4u@gmail.com', '', 1, '2015-07-30');

-- --------------------------------------------------------


