<?php
include_once('db.php');
 $JsonReturn="";
if(isset($_POST["tourid"]))
{
	$tour_ID=$_POST['tourid'];
	if($tour_ID=="all")
	{
		try
		{
			$rs = mysql_query("SELECT `tour_id`, `user_id`, `tour_category_id`, `tour_title`, `tour_location`, `tour_territory`, `tour_description`, `tour_duration`, `tour_price`, `start_point`, `end_point`, `inclusive`, `exclusive`, `cancelation_policy`, `restrictions`, `notes` FROM `tbl_tours`"); 
		}
		catch (Exception $e)
		{
			
		}
	}
	else
	{
		try
		{
			$rs = mysql_query("SELECT `tour_id`, `user_id`, `tour_category_id`, `tour_title`, `tour_location`, `tour_territory`, `tour_description`, `tour_duration`, `tour_price`, `start_point`, `end_point`, `inclusive`, `exclusive`, `cancelation_policy`, `restrictions`, `notes` FROM `tbl_tours` WHERE `tour_id` = ".$tour_ID.""); 
		}
		catch (Exception $e)
		{
			
		}
	}
	
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

	$return = array( 
	'Tour' => $rows1
	);
	unset($rows1);
	$JsonReturn = json_encode( $return ); 
    
    //write to a file 
    //then call rest API to push to the marklogic database as /tour/tour_<tour id>.json
}
?>

<html>
<head>
<title></title>
<style type="text/css">
	#tourid-form 
	{
		background: #FDFDFD;
		width: 80%;
		padding: 20px;
		margin-right: auto;
		margin-left: auto;
		border: 1px solid #E9E9E9;
		border-radius: 10px;
	}
</style>
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>

<head>
<body>
<form id="getTourJson" name="getTourJson" method="POST">
<div id="tourid-form">
  <center>
  <label for="tourid">Select Tour : 
  <select name="tourid" id="tourid" onchange="this.form.submit();">
  <option value="select">SELECT TOUR</option>
	<?php 
	$sql = mysql_query("SELECT `tour_id`, `tour_title` FROM `tbl_tours` WHERE `status` = 1");
	while ($row = mysql_fetch_array($sql)){
	echo '<option value="' . $row['tour_id'] . '">id-' . $row['tour_id'] . ' / Name-' . $row['tour_title'] . '	</option>';
	}
	?>
	<option value="all">ALL TOUR</option>
	</select>
  </label></center>
</div><br><br>
<span><?php echo $JsonReturn; ?></span>
</form>
</body>
</html>