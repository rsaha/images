<?php
session_start();

if(isset($_GET['id']))
{
$userid = $_GET['id'];
}
include('db.php');
$select = mysql_query("SELECT * FROM ` tbl_user_profile` WHERE `user_id` = $userid");
$firstName=mysql_result($select, 0, 3);
$secondName=mysql_result($select, 0, 4);
$username =  $firstName . " " . $secondName;
$emailID = mysql_result($select, 0, 5);
$mobileNumber = mysql_result($select, 0, 6); 
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
		left:0px;
		visibility:hidden;
		}
		
		</style>
	</head>
	<!-- END head -->

	<!-- START body -->
	<body>
		<!-- START #wrapper -->
		<div id="wrapper">
			<?php include('MasterHeader.php'); ?>
			<form action="guide_Step2.php" method="post">
			<!-- START #page-header -->
			<div class="hovera" >
					<input type="file" id="upload" name="coverpicture" style="visibility: hidden; width: 1px; height: 1px"/>
					<a href="" onclick="document.getElementById('upload').click(); return false">
					
					<img src="img/profilepic.jpg" class="hover img-responsive" />
						<p class="text">change image</p>
					</a>
					</div>
					
		<input type="hidden" name="userid" value="<?php echo $userid ?>" />
			<!-- END #page-header -->
			
			<!-- START .main-contents -->
			<div class="main-contents">
				<div class="container">
					<div class="row">
					<div id="page" class="col-md-2">
					<center>
					<div class="row">
					<div class="hovera" style="border: 0px solid black; height:201px">
					<input type="file" id="upload" name="profilepicture" style="visibility: hidden; width: 1px; height: 1px"/>
					<a href="" onclick="document.getElementById('upload').click(); return false">
					
					<img src="img/userDefaultIcon.png" class="hover img-responsive" style="max-height:198px; max-width:198px;" />
						<p class="text">change image</p>
					</a>
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
								<ul class="nav nav-tabs text-upper">
									<li class="active"><a href="#userinfo" data-toggle="tab">Registration Step 2</a></li>
									<li style="font-size:35px">&nbsp;&nbsp;&nbsp;Welcome <?php echo $firstName ?></li>
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content clearfix marb30">
									<!-- START TAB 1 -->
									<div class="tab-pane active mart20" id="userinfo">
										
											<fieldset>
												<ul class="formFields list-unstyled">
													<li class="row">
														<div class="col-md-4">
															<label>Nick Name</label>
															<input type="text" class="form-control" name="nickname" value="" pattern="[a-z A-Z]+" />
														</div>
														<div class="col-md-4">
															<label>Gender</label>
															 <select class="form-control" name="Gender">
															  <option value="SELECT">Select</option>
															  <option value="Male">Male</option>
															  <option value="Female">Female</option>
															</select>
														</div>
														<div class="col-md-4">
															<label>Date Of Birth</label>
															<input type="date" class="form-control" name="DOB" id="DOB" value=""  />
														</div>
													</li>
													<li class="row">
														<div class="col-md-12">
															<label>Street Address</label>
															<input type="text" class="form-control" name="streetaddress" value="" required />
														</div>
														
													</li>
													<li class="row">
														<div class="col-md-4">
															<label>City</label>
															<input type="text" class="form-control" name="city" value="" pattern="[a-z A-Z]+" />
														</div>
														<div class="col-md-4">
															<label>State</label>
															<input type="text" class="form-control" name="state" value="" pattern="[a-z A-Z]+" />
														</div>
														<div class="col-md-4">
															<label>Country</label>
															<input type="text" class="form-control" name="country" value="" pattern="[a-z A-Z]+" />
														</div>
													</li>
													<li class="row">
														<div class="col-md-4">
															<label>Licence Number</label>
															<input type="text" class="form-control" name="licencenumber" maxlength="20" value="" pattern="[a-z0-9A-Z]+" />
														</div>
														<div class="col-md-4">
															<label>Licence Expiry</label>
															<input type="text" id="LicenceExpiry" class="form-control" name="licenceexpiry" value="" />
														</div>
														<div class="col-md-4">
															<label>Licence Image</label>
															<input type="file" class="form-control" name="licenceImage" value="" style="padding:0px 0px " />
														</div>
														</li>
													<li class="row">
														<div class="col-md-4">
															<label>Landline Number</label>
															<input type="tel" class="form-control" name="landlinenumber" value="" maxlength="15" pattern="\d{15}"/>
														</div>
														<div class="col-md-4">
															<label>Best Time for Contact</label>
															<input type="text" class="form-control" name="contacttime" value="" />
														</div>
														<div class="col-md-4">
															<label>Payment Currency</label>
															<input type="text " class="form-control" name="paymentcurrency" value="" />
														</div>
														<div class="col-md-4">
															
														</div>
													</li>
													<li class="row">
														
														<div class="col-md-12">
															<label>Payment Terms</label>
															<textarea class="form-control" name="paymentterms" ></textarea>
														</div>
														</li>
														<li class="row">
														
														<div class="col-md-12">
															<label>Communication Mechanism</label>
															<textarea class="form-control" name="communicationmechanism" ></textarea>
														</div>
														</li>
														
														<li class="row">
														
														<div class="form-group">
														<div class="col-md-3 pull-right" >
															<button type="submit" class="btn btn-warning form-control">Next</button>
														
														</div>
														<div class="col-md-3 pull-right" >
														<?php
														echo '<input type="button" class="btn btn-default form-control" onclick="myFunction(' . $userid. ')" value="Skip">'
														?>
														</div>
														</div>
														</li>
													
													
												</ul>
											</fieldset>
										
									</div>
									<!-- END TAB 1 -->
								</div>
								<!-- END TAB CONTENT -->
							</div>
						</div>
						<!-- END #page -->
					</div>
					<!-- END .row -->
				</div>
			</div>
			<!-- END .main-contents -->
			</form>
			<?php include('MasterFutter.php'); ?>
		</div>
		<!-- END #wrapper -->
			
			<script>
			$(function() {
			$('#DOB').datepicker({
			numberOfMonths: 3,
			showButtonPanel: true
			});
			$('#LicenceExpiry').datepicker({
			numberOfMonths: 3,
			showButtonPanel: true
			});
			});

			</script>

			<script>
			function myFunction(id) {
			window.location.href = "registration3.php?id="+id;
			return false;
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