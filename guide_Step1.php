<?php
	session_start();
	
	include("db.php");
	$FirstName=mysql_real_escape_string($_POST['FirstName']);
	   
	$LastName=mysql_real_escape_string($_POST['LastName']);
	
	
	$EA=mysql_real_escape_string($_POST['EmailAddress']);
	     $options =  array("options"=>array("regexp"=>"[a-zA-Z0-9._%+-]+@[a-zA-Z0-9]+\.(([a-zA-Z]{2,3})|([a-zA-Z]{2,3}\.[a-zA-Z]{2}))")); 
		 
	   /*  if (filter_var($EA, FILTER_VALIDATE_REGEXP, $options) != FALSE) {
		    $EmailAddress = $EA ;
			echo "<script type='text/javascript'>alert('$EmailAddress');</script>";
			}*/
	    if(preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9]+\.(([a-zA-Z]{2,3})|([a-zA-Z]{2,3}\.[a-zA-Z]{2}))$/i", $EA)){
                  /*  $errorMsg= 'error : You did not enter a valid email.';
                     $code= "3";*/
					  $EmailAddress = $EA ;
}
        else{}
	 /*$EmailAddress = $EA ;*/
	$MN=mysql_real_escape_string($_POST['MobileNumber']);
	if(preg_match("/^[7-9]{1}\d{9}$/i",$MN)){
	
		/*$options =  array("options"=>array("regexp"=>"(^[7-9]{1}\d{9}$)"));
		     if (filter_var($MN, FILTER_VALIDATE_REGEXP, $options) != FALSE)  {
		    $MobileNumber = $MN ;
			echo "<script type='text/javascript'>alert('$MobileNumber');</script>";
			}
			else{*/
	$MobileNumber = $MN ;
	 }
		   $Pass=mysql_real_escape_string($_POST['Password']);
		   if(preg_match("/^[a-zA-Z_0-9!@#$%^&* ]{6,15}$/i",$MN)){
		    /*  $options =  array("options"=>array("regexp"=>"(^[a-zA-Z_0-9!@#$%^&* ]{6,15}$)"));
		    if(filter_var($Pass, FILTER_VALIDATE_REGEXP,$options))!= FALSE){
             
			 $Password = $Pass ;
			 echo "<script type='text/javascript'>alert('$Password');</script>";
            }
			else{*/
			 $Password = $Pass ;
			 }
		$create = mysql_query("INSERT INTO `tbl_user_profile`(`user_type_id`, `user_password`, `f_name`, `l_name`, `email`, `mobileNo`, `status`, `datecreated`) VALUES (1, 'password($Password)', '$FirstName', '$LastName', '$EmailAddress', '$MobileNumber', 1, now())");
		
echo "<script type='text/javascript'>alert('$create');</script>";

		if($create)
		{
			$select = mysql_query("SELECT * FROM `tbl_user_profile` WHERE `email`='$EmailAddress' && `mobileNo`='$MobileNumber'");
			$userid = mysql_result($select, 0, 0);
            error_log(print_r($userid,true));
			
			$_SESSION["userReg"]=$userid;
			
			$msg="Successfully Updated!!";
            error_log(print_r($msg,true));
			echo "<script type='text/javascript'>alert('$msg');</script>";
			header('Location:guide_registration_2.php?id=' . $userid . '');
            exit;
		}
		else
		{
			$errormsg="User profile creation failed for '$EmailAdress'";
            error_log(print_r($errormsg,true));
			echo "<script type='text/javascript'>alert('$errormsg');</script>";
            session_destroy();
			header('Location:guide_registration_1.php');
            exit;
		}
?>

