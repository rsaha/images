<?php
session_start();
if(isset($_SESSION['userId']) && ($_SESSION['phase'] == "reg"))
{
	if(isset($_GET['id']))
	{
	$userid = $_GET['id'];
	}
	if($_SESSION['userId']!=$userid)
	{
		header('Location:guide_registration_1.php');
		exit;
	}
	else
	{
	include('db.php');
	$select = mysql_query("SELECT * FROM `tbl_user_profile` WHERE `user_id` = $userid");
	$firstName=mysql_result($select, 0, 3);
	$secondName=mysql_result($select, 0, 4);
	$username =  $firstName . " " . $secondName;
	$emailID = mysql_result($select, 0, 5);
	$mobileNumber = mysql_result($select, 0, 6); 
	}
}
else
{
	header('Location:guide_registration_1.php');
	exit;
}

?>
<html lang="en" dir="ltr">

	<!-- START head -->
	<head>
		<!-- Site meta charset -->
		<meta charset="UTF-8">
		
		<!-- title -->
		<title>User Profile | Travel Hub HTML5 Template</title>
		
		<!-- meta description -->
		<meta name="description" content="YOUR META DESCRIPTION GOES HERE" />
		
		<!-- meta keywords -->
		<meta name="keywords" content="YOUR META KEYWORDS GOES HERE" />
		
		<!-- meta viewport -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		
		<!-- favicon -->
		<link rel="icon" href="favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
		
		<!-- bootstrap 3 stylesheets -->
		<link rel="stylesheet" type="text/css" href="bs3/css/bootstrap.css" media="all" />
		<!-- template stylesheet -->
		<link rel="stylesheet" type="text/css" href="css/styles.css" media="all" />
		<!-- responsive stylesheet -->
		<link rel="stylesheet" type="text/css" href="css/responsive.css" media="all" />
		<!-- Load Fonts via Google Fonts API -->
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Karla:400,700,400italic,700italic" />
		<!-- color scheme -->
		<link rel="stylesheet" type="text/css" href="css/colors/color1.css" title="color1" />
		
		<style type="text/css" >
		
		.hovera a:hover
		{
		opacity:0.5;
		filter:alpha(opacity=50);
		}
		
		.hovera :hover .text
		{
		visibility:visible;
		color:black;
		}
		
		.hovera .text
		{
		position:relative;
		bottom:100px;
		left:55px;
		visibility:hidden;
		}
		
		</style>
	</head>
	<!-- END head -->

	<!-- START body -->
	<body>
		<!-- START #wrapper -->
		<div id="wrapper">
			<?php include('MasterHeaderAfterLogin.php'); ?>
			
			<!-- START #page-header -->
			<div>
					<img src="img/profilepic.jpg" class="hover img-responsive" />
						<br /><br />
					</div>
					
		
			<!-- END #page-header -->
			
			<!-- START .main-contents -->
			<div class="main-contents">
				<div class="container">
					<div class="row">
					<div id="page" class="col-md-2">
					<center>
					<div class="row">
					
					<div style="border: 0px solid black; height:201px">
					<img src="img/userDefaultIcon.png" class="hover img-responsive"  style="max-height:198px; max-width:198px;"/>
					</div>
					
					</div>
					</center>
					<br /><br />
					<div class="row">
					Name - <?php echo $username ?><br /><br />
					Email - <?php echo $emailID ?><br /><br />
					Mobile - <?php echo $mobileNumber ?>
					</div>
					
					</div>
						<!-- START #page -->
						<div id="page" class="col-md-10">
							<div class="user-profile">
								<!-- Sidebar recent popular posts -->
								<!-- START TABS -->
								<ul class="nav nav-tabs text-upper" style="background-color:#ff845e">
									<li class="active"><a data-toggle="tab">Registration Step 4</a></li>
									<li style="color:black; font-size:35px">&nbsp;&nbsp;&nbsp;Welcome <?php echo $firstName ?></li>
								</ul>
								<!-- END TABS --><br>
								
								<div class="">
									<div class="form-group">
								<div class="form-group col-sm-12">
								<input type="email" value="" name="EmailAddress" id="EmailAddress" placeholder="Email Address" class="form-control" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9]+\.([a-zA-Z]{2,3}|([a-zA-Z]{2,3}\.[a-zA-Z]{2}))" required >
								</div>
								</div>
								
								<div class="form-group">
								<div class="form-group col-sm-12">
								<input type="tel" value="" name="MobileNumber" id="MobileNumber" placeholder="Mobile Number" class="form-control" maxlength="10" required pattern="(^[7-9]{1}\d{9}$)">
								</div>
								</div>
								
								
								<div class="form-group">
								<div class="form-group col-sm-6">
								<input type="password" class="form-control" id="Password" maxlength="15" name="Password" placeholder="Password" pattern="(^[a-zA-Z_0-9!@#$%^&* ]{6,15}$)" required >
								</div>
								<div class="form-group col-sm-6">
								<input type="password" class="form-control" id="conformpassword" name="conformpassword" onKeyUp="validate()" placeholder="Conform Password" pattern="(^[a-zA-Z_0-9!@#$%^&* ]{6,15}$)" required  >
								</div>
								</div>
								
								<div class="form-group">
								<div class="col-sm-12 text-center">
								<!-- <input type="checkbox" name="TermsOfService" onclick="agreeCondition()" id="TermsOfService"  > -->
								<strong style="color:#444454;">By clicking Register button, you agree to Guided Gateway's <a target="_blank" id="TosLink" href="#">Terms of Service</a> and <a target="_blank" id="PrivacyLink" href="#">Privacy Policy</a></strong>
								<br /><br />
								<input class="col-md-8 col-md-offset-2 btn btn-warning" name="submitbutton" type="submit" id="registerUser" value="Register" style="font-size:17px; font-weight: bold;" class="form-control"><br><br><br>
								</div>
								</div>
								<div class="text-center">
								<span style="color:gray;">
								Already a member? <a id="LinkSignIn" href="guide_login.php">Sign In</a>
							</div>
							
							<div class="">
							
							</div>
							</div>
						
						</div>
						<!-- END #page -->
					</div>
					<!-- END .row -->
				</div>
			</div>
			<!-- END .main-contents -->
			
			<?php include('MasterFooter.php'); ?>
		</div>
		<!-- END #wrapper -->
		
		<script type="text/javascript" >
 $(function() {
			$( "#LicenceValidtyDatepicker" ).datepicker();
		  });
		  </script>
		  <script>
function myFunction(id) {
	//window.location.href = "guide_profile.php?id="+id;
	window.location.href = "guided_profile.php";
	 return false;
 }
</script>
				<!-- javascripts -->
		<script type="text/javascript" src="js/modernizr.custom.17475.js"></script>

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="bs3/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/check-radio-box.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<!--[if lt IE 9]>
			<script type="text/javascript" src="js/html5shiv.js"></script>
		<![endif]-->

	</body>
</html>