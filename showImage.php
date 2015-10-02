<?php
	$userid=$_GET['id'];
	include_once('db.php');
$select1 = mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
		$row = mysql_fetch_assoc($select1);
		$profile_pic_binary= $row['guide_profile_pic'];
		$profile_pic = base64_decode($profile_pic_binary);
		header('Content-Type: image/png');
		header('Content-Type: image/jpg');
		echo $profile_pic;
?>