<?php
session_start();
if((isset($_SESSION['userId'])) && ($_SESSION['phase'] == "reg"))
{
	if(isset($_GET['id']))
	{
	$userid = $_GET['id'];
	}
	if($_SESSION['userId']!=$userid)
	{
		include_once("signOut.php");
		header('Location:registration.php');
		exit;
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
else
{
	include_once("signOut.php");
	header('Location:registration.php');
	exit;
}

?>
<html lang="en" dir="ltr">

	<!-- START head -->
	<head>
		<!-- Site meta charset -->
		<meta charset="UTF-8">
		
		<!-- title -->
		<title>Guide Sign Up | Guided Gateway</title>
		
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
		<script type="text/javascript" src="js/angular.min.js"></script>
			<script type="text/javascript" src="js/AngularControler.js"></script>
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
					<div class="col-md-11">
					<label style="font-size:14px;">Name :</label><br><br />
					<span style="font-size:18px;font-weight:bold;"><?php echo $username ?></span><br />
					<hr>
					<label style="font-size:14px;">Mobile :</label><br><br />
					<span style="font-size:18px;font-weight:bold;"><?php echo $mobileNumber ?></span><br />
					<hr>
					<label style="font-size:14px;">Email :</label><br><br />
					<span style="font-size:14px;font-weight:bold;"><?php echo $emailID ?></span><br /><br />
					
					</div>
					
					</div>
					
					</div>
						<!-- START #page -->
						<div id="page" class="col-md-10">
							<div class="user-profile">
								<!-- Sidebar recent popular posts -->
								<!-- START TABS -->
								<ul class="nav nav-tabs text-upper" style="background-color:#ff845e">
									<li class="active"><a href="#userinfo" data-toggle="tab">Registration Step 3</a></li>
									<li style="font-size:35px">&nbsp;&nbsp;&nbsp;Welcome <?php echo $firstName ?></li>
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content clearfix marb30">
									<!-- START TAB 1 -->
									<div class="tab-pane active mart20" id="userinfo">
										<form action="guide_step3.php" method="post" ng-app="myApp"  ng-controller="validateCtrl3" name="myForm"  novalidate>
										<input type="hidden" name="userid" value="<?php echo $userid ?>" />
											<fieldset>
												<ul class="formFields list-unstyled">
													<li class="row">
														<div class="col-md-6">
															<label style="font-size:14px; font-weight:bold">Facebook Profile</label>
															<input type="text" id="GuideFacebookProfile" class="form-control" name="GuideFacebookProfile" ng-model="GuideFacebookProfile" ng-pattern="/^[a-z0-9A-Z_-.]+$/" />
															<span style="color:red" ng-show="myForm.GuideFacebookProfile.$dirty && myForm.GuideFacebookProfile.$invalid">
											 
											                <span ng-show="myForm.GuideFacebookProfile.$error.pattern">*Invalid Facebook Profile Name ...</span>
											                </span>
														</div>
														<div class="col-md-6">
															<label style="font-size:14px; font-weight:bold">Linkedin Profile</label>
															<input type="text" id="GuideLinkedinProfile" class="form-control" name="GuideLinkedinProfile" ng-model="GuideLinkedinProfile" ng-pattern="/^[a-z0-9A-Z_-.]+$/" />
															<span style="color:red" ng-show="myForm.GuideLinkedinProfile.$dirty && myForm.GuideLinkedinProfile.$invalid">
											 
											   <span ng-show="myForm.GuideLinkedinProfile.$error.pattern">*Invalid Linkedin Profile Name ...</span>
											  </span>
														</div>
														
													</li>
													<li class="row">
														<div class="col-md-6">
															<label style="font-size:14px; font-weight:bold">Pinterest Profile</label>
															<input type="text" id="GuidePinterestProfile" class="form-control" name="GuidePinterestProfile" ng-model="GuidePinterestProfile" ng-pattern="/^[a-z0-9A-Z_-.]+$/" />
															<span style="color:red" ng-show="myForm.GuidePinterestProfile.$dirty && myForm.GuidePinterestProfile.$invalid">
											  
											   <span ng-show="myForm.GuidePinterestProfile.$error.pattern">*Invalid Pinterest Profile Name ...</span>
											  </span>
														</div>
														<div class="col-md-6">
															<label style="font-size:14px; font-weight:bold">Skype Address</label>
															<input type="text" id="GuideSkypeAddress"  class="form-control" name="GuideSkypeAddress" ng-model="GuideSkypeAddress" ng-pattern="/^[a-z0-9A-Z_-.]+$/"/>
															<span style="color:red" ng-show="myForm.GuideSkypeAddress.$dirty && myForm.GuideSkypeAddress.$invalid">
											 
											   <span ng-show="myForm.GuideSkypeAddress.$error.pattern">*Invalid Skype Address ...</span>
											  </span>
														</div>
														
														<div class="col-md-6"><br>
															<label style="font-size:14px; font-weight:bold">Experience in years</label><br><br>
															<div class="input-group">
															  <input type="tel" id="ExperienceInYear"  class="form-control" maxlength="2" name="ExperienceInYear" id="ExperienceInYear" ng-model="ExperienceInYear" value="10" ng-pattern="/^[0-9]+/$" />
															  <span class="input-group-addon" style="background-color:#f7f7f7;" id="basic-addon2">Year(s)</span>
															</div>
															<span style="color:red" ng-show="myForm.ExperienceInYear.$dirty && myForm.ExperienceInYear.$invalid">
															<span ng-show="myForm.ExperienceInYear.$error.pattern">*in numbers only ...</span>
															</span>
														</div>
														
													</li>
													
													<li class="row">
														
														
														
														<div class="col-md-6">
															<label style="font-size:14px; font-weight:bold">Other Experience</label>
															<textarea class="form-control" name="OtherExperience" ></textarea>
														</div>
														
														<div class="col-md-6">
															<label style="font-size:14px; font-weight:bold">Note</label>
															<textarea class="form-control" name="GuideRemark" ></textarea>
														</div>
														</li>
														<li class="row">
														
														<li class="row">
														
														<div class="form-group">
														<div class="col-md-3 pull-right" >
															<button type="submit" class="btn btn-warning form-control" ng-disabled="myForm.GuideFacebookProfile.$dirty && myForm.GuideFacebookProfile.$invalid || myForm.GuideLinkedinProfile.$dirty && myForm.GuideLinkedinProfile.$invalid || myForm.GuidePinterestProfile.$dirty && myForm.GuidePinterestProfile.$invalid || myForm.GuideSkypeAddress.$dirty && myForm.GuideSkypeAddress.$invalid  || myForm.ExperienceInYear.$dirty && myForm.ExperienceInYear.$invalid">Next</button>
														
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
