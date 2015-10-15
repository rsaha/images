<?php
include_once('db.php');
$JsonReturn="";
if(isset($_POST["user_id"]))
{
	$user_id=$_POST['user_id'];
	if($user_id=="all")
	{
		try
		{
			$rs = mysql_query("SELECT `user_id`, `user_type_id`, `f_name`, `l_name`, `email`, `mobileNo`, `gender`, `d_o_b`, `street_address`, `city`, `state`, `country`, `guide_profile_pic`, `guide_Cover_pic`, `nick_name`, `license_Image`, `license_no`, `validity`, `guide_summary`, `experiance_in_year`, `other_experience`, `guide_interest`, `guide_territory`, `guide_facebook_profile`, `guide_linkedin_profile`, `guide_pinterest_profile`, `guide_skype_address`, `landline_no`, `payment_currency`, `payment_terms`, `Best_time_for_contact`, `Communication_mechanism`, `guide_Remarks` FROM `user_fulldetail`"); 
		}
		catch (Exception $e)
		{
			
		}
	}
	else
	{
		try
		{
			$rs = mysql_query("SELECT `user_id`, `user_type_id`, `user_password`, `f_name`, `l_name`, `email`, `mobileNo`, `gender`, `d_o_b`, `street_address`, `city`, `state`, `country`, `guide_profile_pic`, `guide_Cover_pic`, `nick_name`, `license_Image`, `license_no`, `validity`, `guide_summary`, `experiance_in_year`, `other_experience`, `guide_interest`, `guide_territory`, `guide_facebook_profile`, `guide_linkedin_profile`, `guide_pinterest_profile`, `guide_skype_address`, `landline_no`, `payment_currency`, `payment_terms`, `Best_time_for_contact`, `Communication_mechanism`, `guide_Remarks` FROM `user_fulldetail` WHERE `user_id` = ".$user_id.""); 
		}
		catch (Exception $e)
		{
			
		}
	}
	
	if(mysql_num_rows($rs) > 0)
	{
		while( $row1 = mysql_fetch_array( $rs ) )
		{
			$rs3 = mysql_query("SELECT `language_id` FROM `tbl_guide_known_languages` WHERE `user_id` = '".$row1[ 'user_id' ]."'");
			if(mysql_num_rows($rs3) > 0)
			{
					while($row3 = mysql_fetch_array( $rs3 ))
					{
						$rs4 = mysql_query("SELECT `lanugage_name` FROM `tbl_languages` WHERE `language_id` = '".$row3[ 'language_id' ]."'");
						if(mysql_num_rows($rs4) == 1)
						{
							$row4 = mysql_fetch_assoc( $rs4 );
							$languageName = $row4[ 'lanugage_name' ];
							$rows3[] = array(
							'lanugage_name'=> $languageName
							);
						}
					}
			}
			else
			{
				$rows3[]=null;
			}
			
			$rs2 = mysql_query("SELECT `tour_id`, `tour_category_id`, `tour_title`, `tour_location`, `tour_territory`, `tour_description`, `tour_duration`, `tour_price`, `start_point`, `end_point`, `inclusive`, `exclusive`, `cancelation_policy`, `restrictions`, `notes` FROM `tbl_tours` WHERE `status` = 1 && `user_id` = '".$row1[ 'user_id' ]."'");
			if(mysql_num_rows($rs2) > 0)
			{
					while($row2 = mysql_fetch_array( $rs2 ))
					{
						
						$rows2[] = array(
						'tour_id'=> $row2[ 'tour_id' ], 
						'tour_category_id' => $row2[ 'tour_category_id' ],             
						'tour_title' => $row2[ 'tour_title' ], 
						'tour_location' => $row2[ 'tour_location' ], 
						'tour_territory' => $row2[ 'tour_territory' ],
						'tour_description'=> $row2[ 'tour_description' ], 
						'tour_duration' => $row2[ 'tour_duration' ],             
						'tour_price' => $row2[ 'tour_price' ], 
						'start_point' => $row2[ 'start_point' ], 
						'end_point' => $row2[ 'end_point' ],
						'inclusive'=> $row2[ 'inclusive' ], 
						'exclusive' => $row2[ 'exclusive' ],             
						'cancelation_policy' => $row2[ 'cancelation_policy' ], 
						'restrictions' => $row2[ 'restrictions' ], 
						'notes' => $row2[ 'notes' ]
						);
					}
			}
			else
			{
				$rows2[]=null;
			}
			
			$rows1[] = array( 
			'id'=> $row1[ 'user_id' ], 
			'user_type_id' => $row1[ 'user_type_id' ],             
			'name' => $row1[ 'f_name' ]." ".$row1[ 'l_name' ], 
			'email'=> $row1[ 'email' ], 
			'mobileNo' => $row1[ 'mobileNo' ], 
			'gender' => $row1[ 'gender' ],
			'd_o_b' => $row1[ 'd_o_b' ], 
			'street_address'=> $row1[ 'street_address' ], 
			'city' => $row1[ 'city' ],             
			'state' => $row1[ 'state' ], 
			'country' => $row1[ 'country' ], 
			'language_known' => $rows3,
			'license_no' => $row1[ 'license_no' ],             
			'validity' => $row1[ 'validity' ], 
			'guide_summary' => $row1[ 'guide_summary' ], 
			'experiance_in_year'=> $row1[ 'experiance_in_year' ], 
			'other_experience' => $row1[ 'other_experience' ], 
			'guide_interest' => $row1[ 'guide_interest' ],
			'guide_territory' => $row1[ 'guide_territory' ], 
			'landline_no' => $row1[ 'landline_no' ], 
			'payment_currency' => $row1[ 'payment_currency' ],
			'payment_terms' => $row1[ 'payment_terms' ], 
			'Best_time_for_contact' => $row1[ 'Best_time_for_contact' ], 
			'Communication_mechanism' => $row1[ 'Communication_mechanism' ],             
			'guide_Remarks' => $row1[ 'guide_Remarks' ], 
			'tour' => $rows2
			);
			unset($rows2);
			unset($rows3);
		}
	}
	else
	{
		$rows1[]=null;
	}

	$return = array( 
	'Guide' => $rows1
	);
	unset($rows1);
	$JsonReturn = json_encode( $return ); 
}
?>

<html>
<head>
<title></title>
<style type="text/css">
	#user_id-form 
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
<div id="user_id-form">
  <center>
  <label for="user_id">Select Guide : 
  <select name="user_id" id="user_id" onchange="this.form.submit();">
  <option value="select">SELECT GUIDE</option>
	<?php 
	$sql = mysql_query("SELECT `user_id`, `f_name`, `l_name` FROM `user_fulldetail`");
	while ($row = mysql_fetch_array($sql)){
	echo '<option value="' . $row['user_id'] . '">id-' . $row['user_id'] . ' / Name-' . $row['f_name'] .' '. $row['l_name'] .'	</option>';
	}
	?>
	<option value="all">ALL GUIDE</option>
	</select>
  </label></center>
</div><br><br>
<span><?php echo $JsonReturn; ?></span>
</form>
</body>
</html>