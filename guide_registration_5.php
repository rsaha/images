<?php
session_start();
/*
if((isset($_SESSION['userId'])) && ($_SESSION['phase'] == "reg"))
{
if(isset($_SESSION['userId']))
{
if(isset($_GET['id']))
{
$userid = $_GET['id'];
}
if($_SESSION['userId']!=$userid)
{
	include_once("signOut.php");
	header('Location:registration.php');
}
else
{ 
include_once('db.php');
$select = mysql_query("SELECT * FROM `tbl_user_profile` WHERE `user_id` = $userid");
$row = mysql_fetch_assoc($select);
$firstName =  $row["f_name"];
$lastName =  $row["l_name"];
$username =  $firstName . " " . $lastName;
$emailID=$row["email"];
$mobileNumber = $row["mobileNo"];
}
}
}
else
{
	include_once("signOut.php");
	header('Location:registration.php');
}*/
?>
<html lang="en" dir="ltr">

	<!-- START head -->
	<head>
		<!-- Site meta charset -->
		<meta charset="UTF-8">
		
		<!-- title -->
		<title>Guide Profile | Guided Gateway</title>
		
		<!-- meta description -->
		<meta name="description" content="Guided Gateway" />
		
		<!-- meta keywords -->
		<meta name="keywords" content="Travel India Tourist Guide" />
		
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
			<?php include_once('MasterHeaderAfterLogin.php'); ?>
			
			<!-- START #page-header -->
			<div>
					<?php 
							
							$select4pic = mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
							$count4pic = mysql_num_rows($select4pic);
							if ($count4pic==0)
							{
								echo '<img class="hover img-responsive" src="img/Default.jpg"/>';
							}
							else
							{
								$picVal = mysql_result($select4pic, 0, 3);
								if($picVal==null)
								{
									echo '<img class="hover img-responsive" src="img/Default.jpg"/>';
								}
								else
								{
									echo '<img class="hover img-responsive" src="showCover.php?id=' . $userid . '"/>';
								}
							}
							?><br><br />
					</div>
					
		
			<!-- END #page-header -->
			
			<!-- START .main-contents -->
			<div class="main-contents">
				<div class="container">
					<div class="row">
					<div id="page" class="col-md-2">
					<center>
					<div class="row">
					
					<?php 
						$select4pic = mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
						$count4pic = mysql_num_rows($select4pic);
						if ($count4pic==0)
						{
							echo '<img class="hover img-responsive" src="img/userDefaultIcon.png"/>';
						}
						else
						{
							$picVal = mysql_result($select4pic, 0, 2);
							if($picVal==null)
							{
								echo '<img class="hover img-responsive" src="img/userDefaultIcon.png"/>';
							}
							else
							{
								echo '<img class="hover img-responsive" src="showImage.php?id=' . $userid . '"/>';
							}
						}
							
						?>
					
					</div>
					</center>
					<br /><br />
					<div class="row">
					Name - <?php echo " ";/* $username */ ?><br /><br />
					Email - <?php echo " ";/* $emailID */ ?><br /><br />
					Mobile - <?php echo " ";/* $mobileNumber */ ?>
					</div>
					
					</div>
						<!-- START #page -->
						<div id="page" class="col-md-10">
							<div class="user-profile">
								<!-- Sidebar recent popular posts -->
								<!-- START TABS -->
								<ul class="nav nav-tabs text-upper" style="background-color:#ff845e">
									<li class="active"><a data-toggle="tab">Registration Step 4</a></li>
									<li style="color:black; font-size:35px">&nbsp;&nbsp;&nbsp;Welcome <?php " ";/* echo $firstName */ ?></li>
								</ul>
								<!-- END TABS --><br>
								
								<div class="">
								<!-- START TAB CONTENT -->
								<div class="tab-content clearfix marb30">
									<!-- START TAB 1 -->
									<div class="tab-pane active mart20" id="inviteGuide">
									<center><h3>Invite your 3 touriest to plan their tour by their email id and get some exciting offers...</h3></center><br />
										<form action="guide_step4.php" method="post">
										<input type="hidden" name="userid" value="<?php echo $userid ?>" />
										
											<div class="col-md-12">
											
											<ul  class="formFields list-unstyled">
											<li class="row">
											<div class="col-md-4">
															<label>Name of your 1st friend</label>
															<input type="text" class="form-control" name="nameFriend1" value=""  pattern="[a-z A-Z]+" />
														</div>
														<div class="col-md-4">
															<label>Email Id of your 1st friend</label>
															<input type="email" class="form-control" name="emailFriend1" value=""  pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,5}(\.[a-zA-Z]{2,5}){0,1}"/>
														</div>
														<div class="col-md-4">
															<label>Mobile Number of your 1st friend</label>
															<input type="tel" class="form-control" name="mobileFeiend1" maxlength="10" required pattern="([7-9]{1})(\d{9})" value=""/>
														</div>
														
													</li>
													<hr>
													<li class="row">
														<div class="col-md-4">
															<label>Name of your 2nd friend</label>
															<input type="text" class="form-control" name="nameFriend2" value=""  pattern="[a-z A-Z]+" />
														</div>
														<div class="col-md-4">
															<label>Email Id of your 2nd friend</label>
															<input type="email" class="form-control" name="emailFriend2" value=""  pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,5}(\.[a-zA-Z]{2,5}){0,1}"/>
														</div>
														<div class="col-md-4">
															<label>Mobile Number of your 2nd friend</label>
															<input type="tel" class="form-control" name="mobileFeiend2" maxlength="10" required pattern="([7-9]{1})(\d{9})" value="" />
														</div>
														
													</li>
													<hr>
													<li class="row">
														<div class="col-md-4">
															<label>Name of your 3rd friend</label>
															<input type="text" class="form-control" name="nameFriend3" value=""  pattern="[a-z A-Z]+"/>
														</div>
														<div class="col-md-4">
															<label>Email Id of your 3rd friend</label>
															<input type="email" class="form-control" name="emailFriend3" value="" pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,5}(\.[a-zA-Z]{2,5}){0,1}"/>
														</div>
														<div class="col-md-4">
															<label>Mobile Number of your 3rd friend</label>
															<input type="tel" class="form-control" name="mobileFeiend3" value="" maxlength="10" required pattern="([7-9]{1})(\d{9})" value="" />
														</div>
														
													</li>
													<li class="row">
													<div class="col-md-4 pull-right" >
														<button type="submit" class="btn btn-warning form-control">Send Invitation</button>
													</div>
													<div class="col-md-4 pull-right" >
														<?php
														echo '<input type="button" class="btn btn-default form-control" onclick="myFunction()" value="Skip">'
														?>
													</div>
													</li>
													</ul>
													
											</div>
													
									</form>
									</div>
									<!-- END TAB 1 -->
								</div>
								<!-- END TAB CONTENT -->
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
			
			<?php include_once('MasterFooter.php'); ?>
		</div>
		<!-- END #wrapper -->
		
		<script type="text/javascript" >
 $(function() {
			$( "#LicenceValidtyDatepicker" ).datepicker();
		  });
		  </script>
		  <script>
function myFunction(id) {
	window.location.href = "guide_profile.php?id="+id;
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