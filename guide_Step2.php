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
	$Gender=mysql_real_escape_string($_POST['Gender']);
	
	$DOB=mysql_real_escape_string($_POST['DOB']);
	if($DOB=="")
	{
		$DOB="1987-06-28";
	}
	
	$streetaddress=mysql_real_escape_string($_POST['streetaddress']);
	
	$city=mysql_real_escape_string($_POST['city']);
	
	$state=mysql_real_escape_string($_POST['state']);
	
	$country=mysql_real_escape_string($_POST['country']);
	
	
	
	$nickname=mysql_real_escape_string($_POST['nickname']);
	
	$licencenumber=mysql_real_escape_string($_POST['licencenumber']);
	
	$licenceexpiry=mysql_real_escape_string($_POST['licenceexpiry']);
	if($licenceexpiry=="")
	{
		$licenceexpiry="1991-01-01";
	}
	
	$licenceImage=mysql_real_escape_string($_POST['licenceImage']);
	
	$landlinenumber=mysql_real_escape_string($_POST['landlinenumber']);
	
	$contacttime=mysql_real_escape_string($_POST['contacttime']);
	
	//$paymentcurrency=mysql_real_escape_string($_POST['paymentcurrency']);
	
	$paymentterms=mysql_real_escape_string($_POST['paymentterms']);
	
	$communicationmechanism= mysql_real_escape_string($_POST['communicationmechanism']);
	
	$coverpicture=mysql_real_escape_string($_POST['coverpicture']);
	
	$profilepicture=mysql_real_escape_string($_POST['profilepicture']);
	
	
	include("db.php");
	
	$update = mysql_query("UPDATE `tbl_user_profile` SET `gender`='$Gender', `d_o_b`=$DOB, `street_address`='$streetaddress', `city`='$city', `state`='$state', `country`='$country', `datecreated`=now() WHERE `user_id`=$userid");
	
	$create = mysql_query("INSERT INTO `tbl_guide_detail_profile` (
	`user_id`, 
	`nick_name`, 
	`license_no`, 
	`validity`, 
	`landline_no`, 
	`Best_time_for_contact`,
	`payment_terms`, 
	`Communication_mechanism`,
	`status`, 
	`datecreated`
	) VALUES (
	$userid, 
	'$nickname', 
	'$licencenumber',
	$licenceexpiry,
	'$landlinenumber',
	'$contacttime',
	'$paymentterms',
	'$communicationmechanism',
	1, 
	now()
	)");
	
	
	echo "<script type='text/javascript'>alert('hi');</script>";
		$validextensions = array("jpeg", "jpg", "png");
		$temporary = explode(".", $_FILES["licenceImage"]["name"]);
		$file_extension = end($temporary);

		if ((($_FILES["licenceImage"]["type"] == "image/png") || ($_FILES["licenceImage"]["type"] == "image/jpg") || ($_FILES["licenceImage"]["type"] == "image/jpeg")
		) && ($_FILES["licenceImage"]["size"] < 10000000)//Approx. 100kb files can be uploaded.
		&& in_array($file_extension, $validextensions))
		{
		if ($_FILES["licenceImage"]["error"] > 0)
		{
		echo "Return Code: " . $_FILES["licenceImage"]["error"] . "<br/><br/>";
		} 
		else 
		{

		$newName=date("dmYHms") . "_img." . $file_extension;
		move_uploaded_file($_FILES["licenceImage"]["tmp_name"], "upload/" . $newName);
		$bin_string = file_get_contents( "upload/" . $newName);
		$hex_string = base64_encode($bin_string);
		$imgFullpath = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER["REQUEST_URI"].'?').'/'. "upload/" . $newName;
		include("db.php");
		$upl=0;
		$select=mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
		$count = mysql_num_rows($select);
		if($count==0)
		{
		$insert2 = mysql_query("INSERT INTO `tbl_guide_detail_profile` (`user_id`, `license_Image`, `status`, `datecreated`) VALUES ($userid, '$hex_string', 1, now())");
		if($insert2)
		{
		$upl=1;
		}
		}
		else
		{	
		$update2 = mysql_query("UPDATE `tbl_guide_detail_profile` SET `license_Image` = '$hex_string' WHERE `user_id` = $userid");
		if($update2)
		{
		$upl=1;
		}
		}
		if($upl == 1)
		{
		echo "<script type='text/javascript'>alert('updated');</script>";
		//header('Location:guide_registration_2.php?id=' . $userid .'');
		}
		else
		{
		echo "<script type='text/javascript'>alert('not updated');</script>";
		}
		}
		} 
		else 
		{
		echo "<script type='text/javascript'>alert('not updated');</script>";
		}
	
	
	
	if($update || $create)
	{
		echo "<script type='text/javascript'>alert('created');</script>";
		$_session['login']="true";
		$msg="Successfully Updated!!";
		echo "<script type='text/javascript'>alert('$msg');</script>";
		header('Location:guide_registration_3.php?id=' . $userid . '');
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
        session_destroy();
	header('Location:guide_registration_1.php');	
	}
?>