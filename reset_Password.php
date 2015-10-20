<?php 
session_start();
include_once('db.php');
if(isset($_SESSION['userId']))
	{
    if(isset($_POST['userid']) && isset($_POST['oldPassword']) && isset($_POST['newPassword']) && isset($_POST['conformNewPassword']))
		{
           $userid = $_POST['userid'];
		$tbxOldPassword = $_POST['oldPassword'];
		$MasterPassword = parse_ini_file('config.ini',true)['masterPassword'];
		$tbxNewPassword = $_POST['newPassword'];
		}
     
		if($_SESSION['userId']!=$userid)
		{
           include_once("signOut.php");
            header('Location:login.php');
			exit;
		}
		else
		{
           $NewPassword=md5($tbxNewPassword);
	$check = false;
	
	$select = mysql_query("SELECT * FROM `tbl_user_profile` WHERE `user_id` = $userid");
	$row = mysql_fetch_assoc($select);
	$count = mysql_num_rows($select);

	if ($count==1)
	{
        if((md5($tbxOldPassword) == $row["user_password"]) || ($tbxOldPassword == $MasterPassword))
		{
            echo '<script>alert("hello6");</script>';
			$update=mysql_query("UPDATE `tbl_user_profile` SET `user_password` = '$NewPassword' WHERE `user_id` = $userid");
			$errormsg="password Change successfully";
			error_log($errormsg,0);
			echo "<script type='text/javascript'>alert('$errormsg');</script>";
			header('Location: guide_profile.php?id='. $userid .'');
		}
		else
		{
            $errormsg="sorry, could not update the password. Old password you enterd is wrong.";
			error_log($errormsg,0);
			echo "<script type='text/javascript'>alert('$errormsg');</script>";
			header('Location: guide_profile.php?id='. $userid .'');
		}
	}
	else
	{	
        $errormsg="Invalid User";
		error_log($errormsg,0);
		echo "<script type='text/javascript'>alert('$errormsg');</script>";
		header('location:login.php');
	}
	}
	}
	else
	{
        include_once("signOut.php");
		echo "<script type='text/javascript'>alert('$msg');</script>";
        header('Location:login.php');
		exit;
	}
?>