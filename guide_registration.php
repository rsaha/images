<link href="assets/css/bootstrap.min.css" rel="stylesheet">

<script type="text/javascript" src="assets/js/functions.js"></script>

<?php 
session_start();
include("db.php");
  
  
  
  
  
  $update=true;
//mysql_query("");
  
  if($update)
  {
      $msg="Successfully Updated!!";
      echo "<script type='text/javascript'>alert('$msg');</script>";
      header('Location:index.php');
  }
  else
  {
     $errormsg="Something went wrong, Try again";
      echo "<script type='text/javascript'>alert('$errormsg');</script>";
  }
?>
