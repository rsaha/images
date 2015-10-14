-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 14, 2015 at 04:48 AM
-- Server version: 5.5.43
-- PHP Version: 5.4.41-0+deb7u1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
-- Structure for view `guide_detail`
--

CREATE VIEW `guide_detail` AS select `tbl_user_profile`.`user_id` AS `user_id`,`tbl_user_profile`.`f_name` AS `FirstName`,`tbl_user_profile`.`l_name` AS `LastName`,`tbl_user_profile`.`email` AS `Email`,`tbl_user_profile`.`mobileNo` AS `MobileNo`,`tbl_user_profile`.`gender` AS `Gender`,`tbl_user_profile`.`d_o_b` AS `d_o_b`,`tbl_user_profile`.`street_address` AS `street_address`,`tbl_user_profile`.`city` AS `city`,`tbl_user_profile`.`state` AS `state`,`tbl_user_profile`.`country` AS `country`,`tbl_guide_detail_profile`.`nick_name` AS `nick_name`,`tbl_guide_detail_profile`.`license_no` AS `license_no`,`tbl_guide_detail_profile`.`validity` AS `validity`,`tbl_guide_detail_profile`.`guide_summary` AS `guide_summary`,`tbl_guide_detail_profile`.`experiance_in_year` AS `experiance_in_year`,`tbl_guide_detail_profile`.`other_experience` AS `other_experience`,`tbl_guide_detail_profile`.`guide_interest` AS `guide_interest`,`tbl_guide_detail_profile`.`guide_territory` AS `guide_territory`,`tbl_guide_detail_profile`.`guide_facebook_profile` AS `guide_facebook_profile`,`tbl_guide_detail_profile`.`guide_linkedin_profile` AS `guide_linkedin_profile`,`tbl_guide_detail_profile`.`guide_pinterest_profile` AS `guide_pinterest_profile`,`tbl_guide_detail_profile`.`guide_skype_address` AS `guide_skype_address`,`tbl_guide_detail_profile`.`landline_no` AS `landline_no`,`tbl_guide_detail_profile`.`payment_currency` AS `payment_currency`,`tbl_guide_detail_profile`.`payment_terms` AS `payment_terms` from (`tbl_user_profile` join `tbl_guide_detail_profile` on((`tbl_guide_detail_profile`.`user_id` = `tbl_user_profile`.`user_id`))) where ((`tbl_user_profile`.`status` = 1) and (`tbl_guide_detail_profile`.`status` = 1));

--
-- VIEW  `guide_detail`
-- Data: None
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
