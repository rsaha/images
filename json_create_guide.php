<?php
include_once('db.php');
function multiexplode ($delimiters, $string) {
    
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}


$jsonPath = parse_ini_file('config.ini',true)['jsonFilePath'];
//=============================================================================
        try
        {
            $rs = mysql_query("SELECT `user_id`, `user_type_id`, `f_name`, `l_name`, `email`, `mobileNo`, `gender`, `d_o_b`, `street_address`, `city`, `state`, `country`, `guide_detail_id`, `guide_profile_pic`, `guide_Cover_pic`, `nick_name`, `license_Image`, `license_no`, `validity`, `guide_summary`, `experiance_in_year`, `other_experience`, `guide_interest`, `guide_territory`, `guide_facebook_profile`, `guide_linkedin_profile`, `guide_pinterest_profile`, `guide_skype_address`, `landline_no`, `payment_currency`, `payment_terms`, `Best_time_for_contact`, `Communication_mechanism`, `guide_Remarks`, `status_user_profile`, `status_guide_detail_profile` FROM `user_fulldetail` WHERE `user_type_id` = 1"); 
        }
        catch (Exception $e)
        {

        }
        $_SESSION["tType"]="all";
        $JsonReturn=myCode1($rs);
        $_SESSION["tType"]=null;
        unset($_SESSION['tType']);
        
        $fp = fopen($jsonPath . "guides.json", 'w');
        fwrite($fp, $JsonReturn);
        fclose($fp);
        unset($fp);
        unset($rs);
//=============================================================================
	$sql = mysql_query("SELECT `user_id`, `f_name`, `l_name`, `status_user_profile` FROM `user_fulldetail` WHERE `status_user_profile`=1 && `user_type_id` = 1");
	while ($roww = mysql_fetch_array($sql))
    {    
        $user_id=$roww['user_id'];
        $oldStatus=$roww['status_user_profile'];
            try
            {
                $rs = mysql_query("SELECT `user_id`, `user_type_id`, `f_name`, `l_name`, `email`, `mobileNo`, `gender`, `d_o_b`, `street_address`, `city`, `state`, `country`, `guide_detail_id`, `guide_profile_pic`, `guide_Cover_pic`, `nick_name`, `license_Image`, `license_no`, `validity`, `guide_summary`, `experiance_in_year`, `other_experience`, `guide_interest`, `guide_territory`, `guide_facebook_profile`, `guide_linkedin_profile`, `guide_pinterest_profile`, `guide_skype_address`, `landline_no`, `payment_currency`, `payment_terms`, `Best_time_for_contact`, `Communication_mechanism`, `guide_Remarks`, `status_user_profile`, `status_guide_detail_profile` FROM `user_fulldetail` WHERE `status_user_profile` = 1 && `user_id` = ".$user_id."");
            }
            catch (Exception $e)
            {

            }

            $_SESSION["tType"]="individual";
            $JsonReturn=myCode1($rs);
            $_SESSION["tType"]=null;
            unset($_SESSION['tType']);

            $userName= $jsonPath . "guide_".$user_id.".json";
            $fp = fopen($userName, 'w');
            fwrite($fp, $JsonReturn);
            fclose($fp);

            $update = mysql_query("UPDATE `tbl_user_profile` SET `status` = 2 WHERE `user_id` = $user_id");
            $update = mysql_query("UPDATE `tbl_guide_detail_profile` SET `status` = 2 WHERE `user_id` = $user_id");

            unset($userName);
            unset($fp);

            unset($rs);
            //unset(myCode($rs));
        
}
//=============================================================================
function myCode1($rs)
{
    
    $JsonReturn="";
    
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
							$languageName = $row4['lanugage_name'];
						}
						$rows3[] = array(
                            $languageName
                        );
					}
			}
			else
			{
				$rows3[]=null;
			}
			
			$rs2 = mysql_query("SELECT `tour_id`, `tour_category_id`, `tour_title`, `tour_location`, `tour_territory`, `tour_description`, `tour_duration`, `tour_price`, `start_point`, `end_point`, `inclusive`, `exclusive`, `cancelation_policy`, `restrictions`, `notes` FROM `tbl_tours` WHERE `status` != 0 && `user_id` = '".$row1[ 'user_id' ]."'");
			if(mysql_num_rows($rs2) > 0)
			{
					while($row2 = mysql_fetch_array( $rs2 ))
					{
						$tour_category_id = $row2[ 'tour_category_id' ];
						$rs5 = mysql_query("SELECT `tour_category_title` FROM `tbl_tour_category` WHERE `tour_category_id` = '".$row2[ 'tour_category_id' ]."'");
						if(mysql_num_rows($rs5) == 1)
						{
							$row5 = mysql_fetch_assoc( $rs5 );
							$tour_category = $row5[ 'tour_category_title' ];
						}
						
						$rows2[] = array(
						'tour_id'=> $row2[ 'tour_id' ], 
						'tour_category'=> $tour_category,             
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
			$ran = array("He is special guy.","He is fun guy.","He is very knowledgable about History of the places.","He is organized.","She is organized.");
			$randomTopReviewComment = $ran[array_rand($ran, 1)];

			$review[] = array(
				'reviews'=> rand ( 1 , 20 ),
				'rating'=> rand ( 1 , 5 ),
				'TopReviewComment' => $randomTopReviewComment
			  );
            
            
            
           
            
            if($row1['guide_profile_pic']==null)
            {
                $photo = null;
            }
            else
            {
                $photoData = base64_decode($row1['guide_profile_pic']);
                $photoToSave = "tmp/" . $row1[ 'mobileNo' ].'_profile.jpg';
                $photo = "https://storage.googleapis.com/guidedgateway_media/" . $row1[ 'mobileNo' ].'_profile.jpg';
                file_put_contents($photoToSave, $photoData);

                //$photo = "https://storage.googleapis.com/guidedgateway_media/".$row1[ 'mobileNo' ] . "_profile.jpg";
            }
            
             if($row1['guide_Cover_pic']==null)
            {
                $cover = null;
            }
            else
            {
                $coverData = base64_decode($row1['guide_Cover_pic']);
                $coverToSave = "tmp/" . $row1[ 'mobileNo' ].'_cover.jpg';
                $cover = "https://storage.googleapis.com/guidedgateway_media/" . $row1[ 'mobileNo' ].'_cover.jpg';
                file_put_contents($coverToSave, $coverData);
                
                //$photo = "https://storage.googleapis.com/guidedgateway_media/".$row1[ 'mobileNo' ] . "_profile.jpg";
            }
            
             if($row1['license_Image']==null)
            {
                $cover = null;
            }
            else
            {
                $licenceData = base64_decode($row1['license_Image']);
                $licenceToSave = "tmp/" . $row1[ 'mobileNo' ].'_licence.jpg';
                $licence = "https://storage.googleapis.com/guidedgateway_media/" . $row1[ 'mobileNo' ].'_licence.jpg';
                file_put_contents($licenceToSave, $licenceData);
                
                //$photo = "https://storage.googleapis.com/guidedgateway_media/".$row1[ 'mobileNo' ] . "_profile.jpg";
            }
            
            $guideTerritorys = $row1['guide_territory'];
            $guide_territory = array_map('trim', explode("," , $guideTerritorys));
            if($guide_territory[0] == "")
            {
                $guide_territory = null;
            }
            
			$rows1[] = array( 
			'id'=> $row1[ 'user_id' ],             
			'name' => $row1[ 'f_name' ]." ".$row1[ 'l_name' ],
			'photo' => $photo,
            'cover' => $cover,
            'licence' => $licence,
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
			'review' => $review,
			'guide_interest' => $row1[ 'guide_interest' ],
			'guide_territory' => $guide_territory, 
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
			unset($review);
            unset($photo);
            unset($guide_territory);
            unset($randomTopReviewComment);
		}
	}
	else
	{
		$rows1[]=null;
	}
	if($_SESSION["tType"]=="all")
    {
        $tempAry2[] = array( 
	'Guides' => $rows1
	);
        $return = $tempAry2[0];
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