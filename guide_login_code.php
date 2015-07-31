<?php 
session_start();

include('db.php');

if (isset($_POST['username']) and isset($_POST['password']))
{

$tbxUsername = $_POST['username'];
$tbxPassword = $_POST['password'];
$check = false;
$result1 = mysql_query("SELECT * FROM `tbl_user_profile` WHERE ((email = '$tbxUsername' || mobileNo = '$tbxUsername')&& user_password = '$tbxPassword')");

$count = mysql_num_rows($result1);

if ($count==1)
{
	$userid=mysql_result($result1, 0, 0);
	$_SESSION['userId'] = $userid;
	$_SESSION['phase'] = "signin";
	header('Location: guided_profile.php?id='. $userid .'');
}
else
{	
echo "<script type='text/javascript'>alert('1');</script>";
	//header('location:guide_login.php');
}
}

?>