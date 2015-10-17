<?php
session_start();

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
			include_once("signOut.php");
			header('Location:registration.php');
		}
		else
		{
			$flag1=0;
			include_once('db.php');
            
			$tourType = mysql_real_escape_string($_POST['tourType']);
			$tourLocationTemp = mysql_real_escape_string($_POST['tourLocation']);
			$city = explode(", ", $tourLocationTemp);
			$tourLocation = $city[0];
			$tourName = mysql_real_escape_string($_POST['tourName']);
			$tourTerritory = mysql_real_escape_string($_POST['tourTerritory']);
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
			`tour_location`,
			`tour_territory`,
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
			'$tourLocation',
			'$tourTerritory',
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
				$trId = mysql_insert_id();
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
			header('Location:tour_Create_Step2.php?id1=' . $userid . '&id2='. $trId .'');
			
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
		include_once("signOut.php");
        header('Location:registration.php');
	    exit;
	}
?>
