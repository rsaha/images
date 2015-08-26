<?php
	$picture_media_id=$_GET['id'];
	include('db.php');
$select1 = mysql_query("SELECT * FROM `tbl_tour_media_pictures` WHERE `picture_media_id` = $picture_media_id");
		while ($row = mysql_fetch_assoc($select1)) 
		{
			$tour_pic_binary= $row['tour_picture'];
			$tour_pic = base64_decode($tour_pic_binary);
        }
		header('Content-Type: image/png');
		header('Content-Type: image/jpg');
		echo $tour_pic;
?>