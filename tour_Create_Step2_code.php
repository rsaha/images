<?php
session_start();

	if(isset($_SESSION['userId']))
	{
		if(isset($_POST['userid']) && isset($_POST['tour_duration']) && isset($_POST['tour_id']))
		{
		  $userid=$_POST['userid'];
		  $tour_id=$_POST['tour_id'];
		  $tour_duration=$_POST['tour_duration'];
		}
		if($_SESSION['userId']!=$userid)
		{
			$errormsg="Unauthenticated access to the Guide edit page, Registration Step 1 is not done";
			error_log($errormsg,0);
			include_once("signOut.php");
			header('Location:guide_registration_1.php');
		}
		else
		{
			$flag1=0;
			include_once('db.php');
			$insert = 0;
			
			for($i=1; $i <= $tour_duration; $i++)
			{
				$loopCount=0;
				$a=1;
				$a=$a+1;
				$j=1;
				while(  isset($_POST['tblPets' . $i . '_input' . $a]))
				{
					
					${'tblPets' . $i . '_input' . $a} = $_POST['tblPets' . $i . '_input' . $a];
					//echo "<script type='text/javascript'>alert(" . $i . $a . ");</script>";
					$a=$a+1;
					if($a == (($j*5)+1))
					{
						$a=$a+1;
						$j=$j+1;
					}
					$loopCount=$loopCount+1;
				}
				$k=$loopCount/4;
				$m=1;
				$n=0;
				for($l=1; $l<=$k; $l++)
				{
					if($m == (($n*5)+1))
					{
						$m=$m+1;
						$n++;
					}
					
					$visit = 'Visit'.$l;
					
					$insert = mysql_query("INSERT INTO `tbl_tour_itinerary`(
					`tour_id`, 
					`day`, 
					`intraday`, 
					`description`, 
					`transport`, 
					`tourist_spot`
					) VALUES (
					$tour_id,
					$i,
					'${'tblPets' . $i . '_input' . $m}',
					'${'tblPets' . $i . '_input' . ++$m}',
					'${'tblPets' . $i . '_input' . ++$m}',
					'${'tblPets' . $i . '_input' . ++$m}'
					)");
					$m++;
				}
			}
			
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
			$msg = "Tour created Successfully !!";
			error_log($msg,0);
			echo "<script type='text/javascript'>alert('$msg');</script>";
			header('Location:guide_profile.php?id=' . $userid . '');
			
			} 
			else
			{
				
				$msg="Tour creation failed!";
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
        header('Location:guide_registration_1.php');
	    exit;
	}
?>
