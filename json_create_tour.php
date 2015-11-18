<?php
include_once('db.php');
session_start();

$jsonPath = parse_ini_file('config.ini',true)['jsonFilePath'];
$mediaImagePath = parse_ini_file('config.ini',true)['mediaImagePath'];

 $JsonReturn="";
//==========================================================================
        try
		{
			$rs = mysql_query("SELECT `tbl_tours`.`tour_id`, `tbl_tours`.`tour_category_id`, `tbl_tours`.`user_id`, `tbl_user_type`.`user_type_id`,  `tbl_tours`.`tour_title`, `tbl_tours`.`tour_location`, `tbl_tours`.`tour_territory`, `tbl_tours`.`tour_description`, `tbl_tours`.`tour_duration`, `tbl_tours`.`tour_price`, `tbl_tours`.`start_point`, `tbl_tours`.`end_point`, `tbl_tours`.`inclusive`, `tbl_tours`.`exclusive`, `tbl_tours`.`cancelation_policy`, `tbl_tours`.`restrictions`, `tbl_tours`.`notes`, `tbl_tours`.`created_added` FROM `tbl_tours` JOIN `tbl_user_profile` ON `tbl_user_profile`.`user_id`=`tbl_tours`.`user_id` JOIN `tbl_user_type` ON `tbl_user_type`.`user_type_id`=`tbl_user_profile`.`user_type_id` WHERE `tbl_user_type`.`user_type_id`= 1");
		}
		catch (Exception $e)
		{
			
		}
$_SESSION["tType"]="all";
        $JsonReturn=myCode2($rs);
$_SESSION["tType"]=null;
unset($_SESSION['tType']);
    $fp = fopen($jsonPath . "tours.json", 'w');
    fwrite($fp, $JsonReturn);
    fclose($fp);
    unset($fp);
    unset($rs);
//=============================================================================
	$sql = mysql_query("SELECT `tbl_tours`.`tour_id`, `tbl_tours`.`user_id`, `tbl_user_type`.`user_type_id`,  `tbl_tours`.`tour_title`, `tbl_tours`.`status` FROM `tbl_tours` JOIN `tbl_user_profile` ON `tbl_user_profile`.`user_id`=`tbl_tours`.`user_id` JOIN `tbl_user_type` ON `tbl_user_type`.`user_type_id`=`tbl_user_profile`.`user_type_id` WHERE `tbl_user_type`.`user_type_id`=1 and `tbl_tours`.`status` = 1");
	while ($roww = mysql_fetch_array($sql))
    {
        $tour_ID=$roww['tour_id'];
        $oldStatus=$roww['status'];
            try
            {
                $rs = mysql_query("SELECT `tour_id`, `user_id`, `tour_category_id`, `tour_title`, `tour_location`, `tour_territory`, `tour_description`, `tour_duration`, `tour_price`, `start_point`, `end_point`, `inclusive`, `exclusive`, `cancelation_policy`, `restrictions`, `notes`, `created_added` FROM `tbl_tours` WHERE `tour_id` = ".$tour_ID."");
            }
            catch (Exception $e)
            {

            }


            $_SESSION["tType"]="individual";
            $JsonReturn=myCode2($rs);
            $_SESSION["tType"]=null;
            unset($_SESSION['tType']);

            $tourName= $jsonPath."tour_".$tour_ID.".json";
            $fp = fopen($tourName, 'w');
            fwrite($fp, $JsonReturn);
            fclose($fp);

            $update = mysql_query("UPDATE `tbl_tours` SET `status` = 2 WHERE `tour_id` = $tour_ID");

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
    
            $tourTerritorys = $row1[ 'tour_territory' ];
            $tour_territory = array_map('trim', explode("," , $tourTerritorys));
            if($tour_territory[0] == "")
            {
                $tour_territory = null;
            }
    
    $tour_category_id = $row1[ 'tour_category_id' ];
    $rs5 = mysql_query("SELECT `tour_category_title` FROM `tbl_tour_category` WHERE `tour_category_id` = '".$row1[ 'tour_category_id' ]."'");
    if(mysql_num_rows($rs5) == 1)
    {
        $row5 = mysql_fetch_assoc( $rs5 );
        $tour_category = $row5[ 'tour_category_title' ];
    }
    
    $created_added = $row1['created_added'];
    $mediaImagePath = parse_ini_file('config.ini',true)['mediaImagePath'];
	$cntt=1;
    if($created_added == 0)
    {
        $rs6 = mysql_query("SELECT `picture_media_id`, `tour_picture` FROM `tbl_tour_media_pictures` WHERE `tour_id` = '".$row1[ 'tour_id' ]."'");
    }
    else
    {
        $rs6 = mysql_query("SELECT `tbl_tour_media_pictures`.`picture_media_id`, `tbl_tour_media_pictures`.`tour_id`, `tbl_tour_media_pictures`.`tour_picture`, `tbl_tours`.`created_added` FROM `tbl_tour_media_pictures` JOIN `tbl_tours` ON `tbl_tours`.`tour_id` = '".$row1[ 'tour_id' ]."' WHERE `tbl_tour_media_pictures`.`tour_id` = '".$row1[ 'tour_id' ]."' OR `tbl_tour_media_pictures`.`tour_id` = `tbl_tours`.`created_added`");
    }
    $rows6 = array();
    if(mysql_num_rows($rs6) > 0)
    {
        while($row6 = mysql_fetch_array( $rs6 ))
		{
            $data = base64_decode($row6[ 'tour_picture' ]);
            $mdeaPathToSave = $mediaImagePath . $row1[ 'user_id' ]. '_'.$row1[ 'tour_id' ].'_'.$cntt.'.jpg';
            $mdeaPathToCloud = "https://storage.googleapis.com/guidedgateway_media/" . $row1[ 'tour_id' ].'_Profile_'.$cntt.'.jpg';
            file_put_contents($mdeaPathToSave, $data);
            $cntt=$cntt+1;
            
            array_push($rows6, $mdeaPathToCloud);
        }
    }
    else
    {
        $rows6 = null;
    }
    
		$rows1[] = array( 
		'tour_id' => $row1[ 'tour_id' ], 
        'guide_id' => $row1[ 'user_id' ],
		'tour_category' => $tour_category,             
		'tour_title' => $row1[ 'tour_title' ], 
		'tour_location' => $row1[ 'tour_location' ], 
		'tour_territory' => $tour_territory,
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
		'notes' => $row1[ 'exclusive' ],
        'photo' => $rows6
		);
		unset($rows2);
        unset($rows6);
        unset($tour_territory);
	}
    }
    else
    {
        $rows1[]=null;
    }
    
    if($_SESSION["tType"]=="all")
    {
         $tempAry1[] = array( 
	'Tours' => $rows1
	);
        $return = $tempAry1[0];
    }
    if($_SESSION["tType"]=="individual")
    {
        $return = $rows1[0];
    }
	
    
	unset($rows1);
	$JsonReturn = json_encode($return,JSON_PRETTY_PRINT);
    return($JsonReturn);
}
?>