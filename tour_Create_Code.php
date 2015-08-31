<?php
session_start();
$upload_dir = "img/";
	if(isset($_SESSION['userId']))
	{
		if(isset($_POST['userid']))
		{
		  $userid=$_POST['userid'];
		}
		if($_SESSION['userId']!=$userid)
		{
			$errormsg="Unauthenticated access to the Guide edit page, Registration Step 1 is not done";
			error_log($errormsg,0);
			include("signOut.php");
			header('Location:guide_registration_1.php');
		}
		else
		{
			$flag1=0;
			include('db.php');
            
			$tourType = mysql_real_escape_string($_POST['tourType']);
			$tourName = mysql_real_escape_string($_POST['tourName']);
			$tourDiscription = mysql_real_escape_string($_POST['tourDiscription']);
			$tourDuration = mysql_real_escape_string($_POST['tourDuration']);
			$tourPrice = mysql_real_escape_string($_POST['tourPrice']);
			$startingPoint = mysql_real_escape_string($_POST['startingPoint']);
			$endPoint = mysql_real_escape_string($_POST['endPoint']);
			$inclusive = mysql_real_escape_string($_POST['inclusive']);
			$exclusive = mysql_real_escape_string($_POST['exclusive']);
			$cancellationPolicy = mysql_real_escape_string($_POST['cancellationPolicy']);
			$restriction = mysql_real_escape_string($_POST['restriction']);
			$notes = mysql_real_escape_string($_POST['notes']);
			
			
			$insert = mysql_query("INSERT INTO `tbl_tours`(
			`user_id`, 
			`tour_category_id`, 
			`tour_title`, 
			`tour_description`, 
			`tour_duration`, 
			`tour_price`, 
			`start_point`, 
			`end_point`, 
			`inclusive`, 
			`exclusive`, 
			`cancelation_policy`, 
			`restrictions`, 
			`notes`, 
			`status`, 
			`datecreated`
			) VALUES (
			$userid,
			$tourType,
			'$tourName',
			'$tourDiscription',
			'$tourDuration',
			'$tourPrice',
			'$startingPoint',
			'$endPoint',
			'$inclusive',
			'$exclusive',
			'$cancellationPolicy',
			'$restriction',
			'$notes',
			1,
			now()
			)");
			if($insert)
			{
				$flag1 = 1;
			}
			else
			{
				$flag1 = 0;
			}
			
			if($flag1 == 1)
			{
			$msg = "Tour '$tourName' created Successfully !!";
			error_log($msg,0);
			echo "<script type='text/javascript'>alert('$msg');</script>";
			header('Location:guide_profile.php?id=' . $userid . '');
			
			} 
			else
			{
				
				$msg="Tour '$tourName' creation failed!";
				echo "<script type='text/javascript'>alert('$msg');</script>";
				error_log($msg, 0);
				header('Location:guide_profile.php?id=' . $userid . '');
			}
		}
	}
	else
	{
		$errormsg="Unauthenticated access to the Guide edit page, Registration Step 1 is not done";
		error_log($errormsg,0);
		include("signOut.php");
        header('Location:guide_registration_1.php');
	    exit;
	}
?>
