<?php

	$userid=$_GET['id'];
	include_once('db.php');
$select = mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
		$row = mysql_fetch_assoc($select);
		$profile_cover_binary= $row['guide_Cover_pic'];
		$cover_pic = base64_decode($profile_cover_binary);
		header('Content-Type: image/png');
		header('Content-Type: image/jpg');
		echo $cover_pic;
?>