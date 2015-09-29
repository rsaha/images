<?php
	session_start();
	include("db.php");

	if((isset($_SESSION['userId'])) && ($_SESSION['phase'] == "signin"))
	{
		$i = $_SESSION['userId'];
		header('Location:guide_profile.php?id='. $i .'');
		exit;
	}
	else if((isset($_SESSION['userId'])) && ($_SESSION['phase'] == "reg"))
	{
	if(isset($_POST['userid']))
	{
	$userid=mysql_real_escape_string($_POST['userid']);
	}
	if($_SESSION['userId']!=$userid)
	{
		$errormsg="Unauthenticated access to the step 3 page, Registration Step 1 is not done";
				error_log($errormsg,0);
		include("signOut.php");
		header('Location:guide_registration_1.php');
		exit;
	}
	else
	{
		
		$GuideFacebookProfile=mysql_real_escape_string($_POST['GuideFacebookProfile']);
		$GuideLinkedinProfile=mysql_real_escape_string($_POST['GuideLinkedinProfile']);
		$GuidePinterestProfile=mysql_real_escape_string($_POST['GuidePinterestProfile']);
		$GuideSkypeAddress=mysql_real_escape_string($_POST['GuideSkypeAddress']);
		$ExperienceInYear=mysql_real_escape_string($_POST['ExperienceInYear']);
		$OtherExperience=mysql_real_escape_string($_POST['OtherExperience']);
		$GuideRemark=mysql_real_escape_string($_POST['GuideRemark']);
		
		include_once("db.php");
		$insert = 0;
		$update = 0;
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
				`experiance_in_year`,
				`other_experience`,
				`status`, 
				`datecreated`
				) VALUES (
				$userid, 
				'$GuideFacebookProfile',
				$GuideLinkedinProfile,
				'$GuidePinterestProfile',
				'$GuideSkypeAddress',
				'$GuideRemark',
				'$ExperienceInYear',
				'$OtherExperience',
				1, 
				now()
				)");
			}
			else
			{
		$update = mysql_query("UPDATE `tbl_guide_detail_profile` SET `guide_facebook_profile`='$GuideFacebookProfile', 
		`guide_linkedin_profile`='$GuideLinkedinProfile', `guide_pinterest_profile`='$GuidePinterestProfile', 
		`guide_skype_address`='$GuideSkypeAddress', `experiance_in_year`='$ExperienceInYear', `other_experience`='$OtherExperience', `guide_Remarks`='$GuideRemark', 
		`datecreated`=now() WHERE `user_id`=$userid");
			}
		if($insert || $update)
		{
			$errormsg="Registration Step 3 completed.";
			error_log($errormsg,0);
			$_session['login']="true";
			$msg="Successfully Updated!!";
			echo "<script type='text/javascript'>alert('$msg');</script>";
			header('Location:guide_registration_4.php?id=' . $userid . '');
		}
		else
		{
			$errormsg="Something went wrong in registration step 3, Try again";
				error_log($errormsg,0);
			$msg="Something went wrong!!";
			echo "<script type='text/javascript'>alert('$msg');</script>";
		}
		}
	}
	else
	{
		$errormsg="Unauthenticated access to the step 3 page, Registration Step 1 is not done";
		error_log($errormsg,0);
		include("signOut.php");
	header('Location:guide_registration_1.php');
exit;	
	}
?>