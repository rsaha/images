<?php 
session_start();

include('db.php');

if (isset($_POST['username']) and isset($_POST['password']))
{

/* $tbxUsername = $_POST['username']; */
   $UName=mysql_real_escape_string($_POST['username']);
		/*$options =  array("options"=>array("regexp"=>"(([a-zA-Z0-9._%+-]+@[a-zA-Z0-9]+\.([a-zA-Z]{2,3}|([a-zA-Z]{2,3}\.[a-zA-Z]{2})))|([7-9]{1}\d{9}))"));*/
		if(preg_match("/^(([a-zA-Z0-9._%+-]+@[a-zA-Z0-9]+\.([a-zA-Z]{2,3}|([a-zA-Z]{2,3}\.[a-zA-Z]{2})))|([7-9]{1}\d{9}))$/i",$UName)){
		    /* if (filter_var($UName, FILTER_VALIDATE_REGEXP, $options) != FALSE)  {*/
		    $tbxUsername = $UName ;
			/*echo "<script type='text/javascript'>alert('$MobileNumber');</script>";
*/			}

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