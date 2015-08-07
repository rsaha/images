<?php
	session_start();
	include("db.php");

	if(isset($_SESSION['userId']))
	{
	if(isset($_POST['userid']))
	{
	$userid=mysql_real_escape_string($_POST['userid']);
	}
	if($_SESSION['userId']!=$userid)
	{
		session_destroy();
        header('Location:guide_registration_1.php');
	}
	else
	{
		
		$GuideFacebookProfile=mysql_real_escape_string($_POST['GuideFacebookProfile']);
		$GuideLinkedinProfile=mysql_real_escape_string($_POST['GuideLinkedinProfile']);
		$GuidePinterestProfile=mysql_real_escape_string($_POST['GuidePinterestProfile']);
		$GuideSkypeAddress=mysql_real_escape_string($_POST['GuideSkypeAddress']);
		$GuideExperience=mysql_real_escape_string($_POST['GuideExperience']);
		$GuideRemark=mysql_real_escape_string($_POST['GuideRemark']);
		
		include("db.php");
			$select4exval = mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
			$count4exval = mysql_num_rows($select4exval);
			if ($count4exval==0)
			{
				$insert = mysql_query("INSERT INTO `tbl_guide_detail_profile` (
				`user_id`, 
				`guide_facebook_profile`, 
				`guide_linkedin_profile`, 
				`guide_pinterest_profile`, 
				`guide_skype_address`,
				`guide_Remarks`,
				`guide_experience`,
				`status`, 
				`datecreated`
				) VALUES (
				$userid, 
				'$GuideFacebookProfile',
				$GuideLinkedinProfile,
				'$GuidePinterestProfile',
				'$GuideSkypeAddress',
				'$GuideRemark',
				'$GuideExperience',
				1, 
				now()
				)");
			}
			else
			{
		$update = mysql_query("UPDATE `tbl_guide_detail_profile` SET `guide_facebook_profile`='$GuideFacebookProfile', 
		`guide_linkedin_profile`='$GuideLinkedinProfile', `guide_pinterest_profile`='$GuidePinterestProfile', 
		`guide_skype_address`='$GuideSkypeAddress', `guide_experience`='$GuideExperience', `guide_Remarks`='$GuideRemark', 
		`datecreated`=now() WHERE `user_id`=$userid");
			}
		if($insert || $update)
		{
			$_session['login']="true";
			$msg="Successfully Updated!!";
			echo "<script type='text/javascript'>alert('$msg');</script>";
			header('Location:guide_registration_4.php?id=' . $userid . '');
		}
		else
		{
			$errormsg="Something went wrong, Try again";
			echo "<script type='text/javascript'>alert('$errormsg');</script>";
		}
		}
	}
	else
	{
	header('Location:guide_registration_1.php');	
	}
?>