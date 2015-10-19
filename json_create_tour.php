<?php
include_once('db.php');
 $JsonReturn="";
//==========================================================================
        try
		{
			$rs = mysql_query("SELECT `tour_id`, `user_id`, `tour_category_id`, `tour_title`, `tour_location`, `tour_territory`, `tour_description`, `tour_duration`, `tour_price`, `start_point`, `end_point`, `inclusive`, `exclusive`, `cancelation_policy`, `restrictions`, `notes` FROM `tbl_tours`"); 
		}
		catch (Exception $e)
		{
			
		}
        $JsonReturn=myCode2($rs);
    $fp = fopen("json/tours.json", 'w');
    fwrite($fp, $JsonReturn);
    fclose($fp);
    unset($fp);
        unset($rs);
//=============================================================================
	$sql = mysql_query("SELECT `tour_id`, `tour_title` FROM `tbl_tours` WHERE `status` = 1");
	while ($roww = mysql_fetch_array($sql)){
	$tour_ID=$roww['tour_id'];
	
	try
		{
			$rs = mysql_query("SELECT `tour_id`, `user_id`, `tour_category_id`, `tour_title`, `tour_location`, `tour_territory`, `tour_description`, `tour_duration`, `tour_price`, `start_point`, `end_point`, `inclusive`, `exclusive`, `cancelation_policy`, `restrictions`, `notes` FROM `tbl_tours` WHERE `tour_id` = ".$tour_ID.""); 
		}
		catch (Exception $e)
		{
			
		}
	
        
    $JsonReturn=myCode2($rs);
    $tourName= "json/tour_".$tour_ID.".json";
    $fp = fopen($tourName, 'w');
    fwrite($fp, $JsonReturn);
    fclose($fp);
    unset($tourName);
    unset($fp);
    unset($rs);
	//unset(myCode($rs));
    
}
//==========================================================================
function myCode2($rs)
{
    if(mysql_num_rows($rs) > 0)
	{
while( $row1 = mysql_fetch_array( $rs ) )
	{
		
		$rs2 = mysql_query("SELECT `tour_Itinerary_id`, `day`, `intraday`, `description`, `transport`, `tourist_spot` FROM `tbl_tour_itinerary` WHERE `tour_id` = '".$row1[ 'tour_id' ]."'");

		while($row2 = mysql_fetch_array( $rs2 ))
		{
			
			$rows2[] = array(
			'day'=> $row2[ 'day' ], 
			'intraday' => $row2[ 'intraday' ],             
			'description' => $row2[ 'description' ], 
			'transport' => $row2[ 'transport' ], 
			'tourist_spot' => $row2[ 'tourist_spot' ] 
			);
		}
	
		$rows1[] = array( 
		'tour_id'=> $row1[ 'tour_id' ], 
		'tour_category_id' => $row1[ 'tour_category_id' ],             
		'tour_title' => $row1[ 'tour_title' ], 
		'tour_location' => $row1[ 'tour_location' ], 
		'tour_territory'=> $row1[ 'tour_territory' ], 
		'tour_description' => $row1[ 'tour_description' ], 
		'tour_duration' => $row1[ 'tour_duration' ],
		'tour_itinerary' => $rows2,	
		'tour_price' => $row1[ 'tour_price' ], 
		'start_point'=> $row1[ 'start_point' ], 
		'end_point' => $row1[ 'end_point' ],             
		'inclusive' => $row1[ 'inclusive' ], 
		'exclusive' => $row1[ 'exclusive' ], 
		'cancelation_policy' => $row1[ 'end_point' ],             
		'restrictions' => $row1[ 'inclusive' ], 
		'notes' => $row1[ 'exclusive' ]
		);
		unset($rows2);
	}
    }
    else
    {
        $rows1[]=null;
    }

	$return = array( 
	'Tour' => $rows1
	);
    
	unset($rows1);
	$JsonReturn = json_encode( $return );
    return($JsonReturn);
}
?>