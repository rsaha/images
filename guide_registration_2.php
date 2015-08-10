<?php
session_start();
if((isset($_SESSION['userId'])) && ($_SESSION['phase'] == "signin"))
{
	$i = $_SESSION['userId'];
	header('Location:guide_profile.php?id='. $i .'');
	exit;
}
else if((isset($_SESSION['userId'])) && ($_SESSION['phase'] == "reg"))
{
	if(isset($_GET['id']))
	{
	$userid = $_GET['id'];
	}
	if($_SESSION['userId']!=$userid)
	{
		include('signOut.php');
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
	include("signOut.php");
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
		
		<link href="style.css" rel="stylesheet">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="script.js"></script>

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
		
		.uploadImg{
		background-color:#ff845e;
		border:1px solid #fff;
		font-weight:700;
		font-size:18px;
		color:#fff;
		width:170px;
		height:30px;
		border-radius:3px;
		padding:0px;
		box-shadow:0 1px 1px 0 #a9a9a9;
		}
		
		</style>
	</head>
	<!-- END head -->

	<!-- START body -->
	<body>
		<!-- START #wrapper -->
		<div id="wrapper">
		
			<?php include('MasterHeaderAfterLogin.php'); ?>
			<center>
						<div class="row">
						<div class="hovera text-center" style="border: 0px solid black;">
						<form action="uploadphp.php" enctype="multipart/form-data" method="post" id="formCover" name="formCover">
							<table>
								<tr>
									<td>
										<a href="" onclick="document.getElementById('file1').click(); return false">
										<?php 
							
							$select4CovPic = mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
							$count4CovPic = mysql_num_rows($select4CovPic);
							if ($count4CovPic == 0)
							{
								echo '<img style="width:1400px; height:200px;" class="hover img-responsive" src="img/Default.jpg" />';
							}
							else
							{
								$CovPicVal = mysql_result($select4CovPic, 0, 3);
								if($CovPicVal == NULL)
								{
									echo '<img style="width:1400px; height:200px;" class="hover img-responsive" src="img/Default.jpg" />';
								}
								else
								{
									echo '<img style="width:1400px; height:200px;" class="hover img-responsive" src="showCover.php?id=' . $userid . '"/>';
								}
							}
							?>
										</a>
									</td>
								</tr>
								
							</table>
							<input type="hidden" name="cover_pic" value="cover_pic" />
							<input type="hidden" name="userid" value="<?php echo $userid; ?>" />
							<input id="file1" name="file1" type="file" style="visibility: hidden;" onchange="formCover.submit();"/>
						</form>
						</div>
						</div>
						</center>
		<input type="hidden" name="userid" value="<?php echo $userid ?>" />
			<!-- END #page-header -->
			
			<!-- START .main-contents -->
			<div class="main-contents">
				<div class="container">
					<div class="row">
					<div id="page" class="col-md-2">
					<center>
						<div class="row">
						<div class="hovera text-center" style="border: 0px solid black;">
						<form action="uploadphp.php" enctype="multipart/form-data" method="post"  id="formProfile" name="formProfile">
							<table >
							<tr style="">
							<td>
							<a href="" onclick="document.getElementById('file2').click(); return false">
							
							<?php 
							
							$select4ProPic = mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
							$count4ProPic = mysql_num_rows($select4ProPic);
							if ($count4ProPic == 0)
							{
								echo '<img style="max-height:200px; max-width:170px;" class="hover img-responsive" src="img/userDefaultIcon.png"/>';
							}
							else
							{
								$ProPicVal = mysql_result($select4ProPic, 0, 2);
								if($ProPicVal == NULL)
								{
									echo '<img style="max-height:200px; max-width:170px;" class="hover img-responsive" src="img/userDefaultIcon.png"/>';
								}
								else
								{
									echo '<img style="height200px; width:170px;" class="hover img-responsive" src="showImage.php?id=' . $userid . '"/>';
								}
							}
							?>
							</a>
							</td>
							</tr>
							
							</table>
							<input type="hidden" name="profile_pic" value="profile_pic" />
							<input type="hidden" name="userid" value="<?php echo $userid; ?>" />
							<input id="file2" name="file2" type="file" style="visibility: hidden;"  onchange="formProfile.submit();"/>
							</form>
							</div>
							</div>
							</center>
					<br />
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
									<li class="active"><a href="#userinfo" data-toggle="tab">Registration Step 2</a></li>
									<li style="font-size:35px">&nbsp;&nbsp;&nbsp;Welcome <?php echo $firstName ?></li>
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content clearfix marb30">
									<form action="guide_Step2.php" enctype="multipart/form-data" method="post">
									<div class="tab-pane active mart20" id="userinfo">
										<input type="hidden" name="userid" value="<?php echo $userid; ?>" />
											<fieldset>
												<ul class="formFields list-unstyled">
													<li class="row">
														<div class="col-md-4">
															<label style="font-size:14px; font-weight:bold">Nick Name</label>
															<input type="text" class="form-control" name="nickname" value="" pattern="[a-z A-Z]+" />
														</div>
														<div class="col-md-4">
															<label style="font-size:14px; font-weight:bold">Gender</label>
															 <select class="form-control" name="Gender">
															  <option value="SELECT">Select</option>
															  <option value="Male">Male</option>
															  <option value="Female">Female</option>
															</select>
														</div>
														<div class="col-md-4">
															<label style="font-size:14px; font-weight:bold">Date Of Birth</label>
															<input type="date" class="form-control" name="DOB" placeholder="yyyy-mm-dd" id="DOB" value=""  />
														</div>
													</li>
													<li class="row">
														<div class="col-md-12">
															<label style="font-size:14px; font-weight:bold">Street Address</label>
															<input type="text" class="form-control" name="streetaddress" pattern="[a-z0-9A-Z -.]+" value="" />
														</div>
														
													</li>
													<li class="row">
														<div class="col-md-4">
															<label style="font-size:14px; font-weight:bold">City</label>
															<input type="text" class="form-control" name="city" value="" pattern="[a-z A-Z]+" />
														</div>
														<div class="col-md-4">
															<label style="font-size:14px; font-weight:bold">State</label>
															<select name="state" id="state" class="form-control"></select>
														</div>
														<div class="col-md-4">
															<label style="font-size:14px; font-weight:bold">Country</label>
															<select id="country" name="country" selected="India" class="form-control"></select>
														</div>
													</li>
													<li class="row">
														<div class="col-md-4">
															<label style="font-size:14px; font-weight:bold">Licence Number</label>
															<input type="text" class="form-control" name="licencenumber" maxlength="20" value="" pattern="[a-z0-9A-Z]+" />
														</div>
														<div class="col-md-4">
															<label style="font-size:14px; font-weight:bold">Licence Expiry</label>
															<input type="date" id="LicenceExpiry" placeholder="yyyy-mm-dd" class="form-control" name="licenceexpiry" value="" />
														</div>
														<div class="col-md-4">
															<label style="font-size:14px; font-weight:bold">Licence Image</label>
															<input type="file" class="form-control" name="licenceImage" value="" style="padding:0px 0px " />
														</div>
														</li>
													<li class="row">
														<div class="col-md-4">
															<label style="font-size:14px; font-weight:bold">Landline Number</label>
															<input type="tel" class="form-control" name="landlinenumber" value="" maxlength="15" pattern="\d{15}"/>
														</div>
														<div class="col-md-4">
														
															<label style="font-size:14px; font-weight:bold">Best Time for Contact</label>
															<select class="form-control" name="contacttime">
															<option value="anytime">ANY TIME</option>
															<option value="08:00 AM - 12:00 PM">08:00 AM - 12:00 PM</option>
															<option value="12:00 PM - 04:00 PM">12:00 PM - 04:00 PM</option>
															<option value="04:00 PM - 08:00 PM">04:00 PM - 08:00 PM</option>
															</select>
														</div>
														<div class="col-md-4">
															<label style="font-size:14px; font-weight:bold">Communication Mechanism</label>
															<select class="form-control" name="communicationmechanism">
															<option value="Mobile">Mobile</option>
															<option value="Email">Email</option>
															</select>
														</div>
														<div class="col-md-4">
															
														</div>
													</li>
													<li class="row">
														
														<div class="col-md-12">
															<label style="font-size:14px; font-weight:bold">Payment Terms</label>
															
															<textarea class="form-control" name="paymentterms" ></textarea>
														</div>
														</li>
														<li class="row">
														
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
									</form>
								</div>
								<!-- END TAB CONTENT -->
							</div>
						</div>
			</div>
			<!-- END .main-contents -->
			
			<?php include('MasterFooter.php'); ?>
		</div>
		<!-- END #wrapper -->
			<script type="text/javascript" src="js/country_state.js"></script>
			<script language="javascript">
				populateCountries("country", "state");
			</script>
		
			<script>
			

			</script>

			<script>
		function myFunction(id) {
		window.location.href = "guide_registration_3.php?id="+id;
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
