<?php
	session_start();
    include_once("db.php");
	
	
	$result= mysql_query("SELECT tour_title,tour_price,start_point,end_point FROM `tbl_tours` WHERE `user_id` = 6");
		
	$data = array();

while ($row = mysql_fetch_array($result)) {
  $data[] = $row;
}


    print json_encode($data);

	/* 	$tour_title=mysql_result($select, 0, 0);
	$tour_price=mysql_result($select, 0, 1);
	$start_point = mysql_result($select, 0, 2);
	$end_point = mysql_result($select, 0, 3); 

	echo $tour_title;
	echo $tour_price;
	echo $start_point;
	echo $start_point; */
	
?>