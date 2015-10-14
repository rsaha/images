<?php

	include_once('db.php');
	$rs = mysql_query("SELECT `tour_id`, `user_id`, `tour_category_id`, `tour_title`, `tour_location`, `tour_territory`, `tour_description`, `tour_duration`, `tour_price`, `start_point`, `end_point`, `inclusive`, `exclusive`, `cancelation_policy`, `restrictions`, `notes` FROM `tbl_tours` where `tour_id`=50002"); 
	while( $row1 = mysql_fetch_array( $rs ) )
	{
		$rows1[] = array( 
		'tour_id'=> $row1[ 'tour_id' ], 
		'tour_category_id' => $row1[ 'tour_category_id' ],             
		'tour_title' => $row1[ 'tour_title' ], 
		'tour_location' => $row1[ 'tour_location' ], 
		'tour_territory'=> $row1[ 'tour_territory' ], 
		'tour_description' => $row1[ 'tour_description' ],             
		'tour_price' => $row1[ 'tour_price' ], 
		'start_point'=> $row1[ 'start_point' ], 
		'end_point' => $row1[ 'end_point' ],             
		'inclusive' => $row1[ 'inclusive' ], 
		'exclusive' => $row1[ 'exclusive' ], 
		'cancelation_policy' => $row1[ 'end_point' ],             
		'restrictions' => $row1[ 'inclusive' ], 
		'notes' => $row1[ 'exclusive' ]
	); 

	$rs2 = mysql_query("SELECT `tour_Itinerary_id`, `day`, `intraday`, `description`, `transport`, `tourist_spot` FROM `tbl_tour_itinerary` WHERE `tour_id` = '".$row1['tour_id']."'");

	while( $row2 = mysql_fetch_array( $rs2 ) )
	{ 
		$rows2[] = array( 
		'day'=> $row2[ 'day' ], 
		'intraday' => $row2[ 'intraday' ],             
		'description' => $row2[ 'description' ], 
		'transport' => $row2[ 'transport' ], 
		'tourist_spot' => $row2[ 'tourist_spot' ] 
		);
	}
}	
	$return = array( 
	'Tours' => $rows1, 
	'tour_duration' => $rows2
	);	

	echo json_encode( $return ); 
?>