<?php 
session_start();

include('db.php');

if (isset($_POST['username']) && isset($_POST['password']))
{

$UName=mysql_real_escape_string($_POST['username']);
		if(preg_match("/^(([a-zA-Z0-9._%+-]+@[a-zA-Z0-9]+\.([a-zA-Z]{2,3}|([a-zA-Z]{2,3}\.[a-zA-Z]{2})))|([7-9]{1}\d{9}))$/i",$UName)){
		    $tbxUsername = $UName ;
			}

$tbxPassword = $_POST['password'];
$check = false;
$result1 = mysql_query("SELECT * FROM `tbl_user_profile` WHERE ((email = '$tbxUsername' || mobileNo = '$tbxUsername')&& user_password = '$tbxPassword')");
$row = mysql_fetch_assoc($result1);
$count = mysql_num_rows($result1);

if ($count==1)
{
	$errormsg="Login successfull";
	error_log($errormsg,0);
		
	$userid=$row["user_id"];
	$_SESSION['userId'] = $userid;
	$_SESSION['phase'] = "signin";
	header('Location: guide_profile.php?id='. $userid .'');
}
else
{	
$errormsg="login fail.";
		error_log($errormsg,0);
	header('location:guide_login.php');
}
}

?>