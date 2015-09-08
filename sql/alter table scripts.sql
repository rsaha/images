ALTER TABLE `tbl_tours`
ADD COLUMN `tour_location` varchar(100) NULL AFTER `tour_title`,
ADD COLUMN `created_added` bigint(20) NOT NULL DEFAULT '0' AFTER `datecreated`;

ALTER TABLE `tbl_guide_detail_profile`
ADD COLUMN `guide_territory` varchar(100) NULL AFTER `guide_interest`;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_guide_detail_profile`
--
ALTER TABLE `tbl_guide_detail_profile`
  MODIFY `guide_detail_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_referrals`
--
ALTER TABLE `tbl_referrals`
  MODIFY `referral_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_tours`
--
ALTER TABLE `tbl_tours`
  MODIFY `tour_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_tour_category`
--
ALTER TABLE `tbl_tour_category`
  MODIFY `tour_category_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_tour_media_pictures`
--
ALTER TABLE `tbl_tour_media_pictures`
  MODIFY `picture_media_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `tbl_tour_media_videos`
--
ALTER TABLE `tbl_tour_media_videos`
  MODIFY `video_media_id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_user_profile`
--
ALTER TABLE `tbl_user_profile`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `user_type_id` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;