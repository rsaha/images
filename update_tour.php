<?php
session_start();
$upload_dir = "img/";
	if(isset($_SESSION['userId']))
	{
		if(isset($_POST['userid']) && isset($_POST['tourID']))
		{
		  $userid=$_POST['userid'];
		  $tourID=$_POST['tourID'];
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
			
			$update = mysql_query("UPDATE `tbl_tours` SET 
			`tour_category_id`=1,
			`tour_title`='$tourName',
			`tour_description`='$tourDiscription',
			`tour_duration`='$tourDuration',
			`tour_price`='$tourPrice',
			`start_point`='$startingPoint',
			`end_point`='$endPoint',
			`inclusive`='$inclusive',
			`exclusive`='$exclusive',
			`cancelation_policy`='$cancellationPolicy',
			`restrictions`='$restriction',
			`notes`='$notes',
			`datecreated`=now()
			WHERE `tour_id`=$tourID && `user_id`=$userid");
			
			if($update)
			{
				$flag1 = 1;
			}
			else
			{
				$flag1 = 0;
			}
			
			if($flag1 == 1)
			{
				$msg = "Tour '$tourName' updated Successfully !!";
			error_log($msg,0);
			echo "<script type='text/javascript'>alert('$msg');</script>";
			header('Location:guide_profile.php?id=' . $userid . '');
			
			}
			else
			{
				$msg="Tour '$tourName' creation failed!";
				echo "<script type='text/javascript'>alert('$msg');</script>";
				error_log($msg, 0);
				//header('Location:guide_profile.php?id=' . $userid . '');
			}
		}
	}
	else
	{
		echo "<script type='text/javascript'>alert('7');</script>";
		$errormsg="Unauthenticated access to the Guide edit page, Registration Step 1 is not done";
		error_log($errormsg,0);
		include("signOut.php");
        header('Location:guide_registration_1.php');
	    exit;
	}
?>
