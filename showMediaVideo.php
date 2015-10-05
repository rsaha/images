<?php
	$video_media_id=$_GET['id'];
	include_once('db.php');
$select1 = mysql_query("SELECT * FROM `tbl_tour_media_videos` WHERE `video_media_id` = $video_media_id");
		while ($row = mysql_fetch_assoc($select1)) 
		{
			$tour_vid_binary= $row['tour_video'];
			$tour_vid = base64_decode($tour_vid_binary);
        }
		header('Content-Type: image/png');
		header('Content-Type: image/jpg');
		echo $tour_vid;
?>