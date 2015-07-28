<?php
session_start();
if(isset($_SESSION["userReg"]))
{
if(isset($_GET['id']))
{
$userid = $_GET['id'];
}
if($_SESSION["userReg"]!=$userid)
{
	header('Location:guide_registration_1.php');
}
else
{
include('db.php');
$select = mysql_query("SELECT * FROM ` tbl_user_profile` WHERE `user_id` = $userid");
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
			<?php include('MasterHeader.php'); ?>
			
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
								<ul class="nav nav-tabs text-upper">
									<li class="active"><a href="#userinfo" data-toggle="tab">Registration Step 3</a></li>
									<li style="font-size:35px">&nbsp;&nbsp;&nbsp;Welcome <?php echo $firstName ?></li>
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content clearfix marb30">
									<!-- START TAB 1 -->
									<div class="tab-pane active mart20" id="userinfo">
										<form action="guide_Step3.php" method="post">
										<input type="hidden" name="userid" value="<?php echo $userid ?>" />
											<fieldset>
												<ul class="formFields list-unstyled">
													<li class="row">
														<div class="col-md-6">
															<label>Guide Facebook Profile</label>
															<input type="text" class="form-control" name="GuideFacebookProfile" value="" />
														</div>
														<div class="col-md-6">
															<label>Guide Linkedin Profile</label>
															<input type="text" class="form-control" name="GuideLinkedinProfile" value="" />
														</div>
														
													</li>
													<li class="row">
														<div class="col-md-6">
															<label>Guide Pinterest Profile</label>
															<input type="text" class="form-control" name="GuidePinterestProfile" value="" />
														</div>
														<div class="col-md-6">
															<label>Guide Skype Address</label>
															<input type="text" class="form-control" name="GuideSkypeAddress" value="" />
														</div>
													</li>
													
													<li class="row">
														
														<div class="col-md-6">
															<label>Guide Experience</label>
															<textarea class="form-control" name="GuideExperience" ></textarea>
														</div>
														
														<div class="col-md-6">
															<label>Guide Interest</label>
															<textarea class="form-control" name="GuideInterest" ></textarea>
														</div>
														</li>
														<li class="row">
														
														<div class="col-md-12">
															<label>Guide Summary</label>
															<textarea class="form-control" name="GuideSummary" ></textarea>
														</div>
														</li>
														
														<li class="row">
														
														<div class="col-md-12">
															<label>Guide Remark</label>
															<textarea class="form-control" name="GuideRemark" ></textarea>
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
										</form>
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
		window.location.href = "guide_registration_4.php?id="+id;
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