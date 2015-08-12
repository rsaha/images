<?php
	session_start();
	if(isset($_SESSION['userId']))
	{
		if(isset($_GET['id']))
		{
		$userid = $_GET['id'];
		}
		if($_SESSION['userId']!=$userid)
		{
			header('Location:guide_login.php');
			exit;
		}
		else
		{
			$_SESSION["signinCheck"]="signin";
				include('db.php');

				$select1 = mysql_query("SELECT * FROM `tbl_user_profile` WHERE `user_id` = $userid");

				$firstName=mysql_result($select1, 0, 3);
				$lastName=mysql_result($select1, 0, 4);
				$username =  $firstName . " " . $lastName;
				$emailID = mysql_result($select1, 0, 5);
				$mobileNumber = mysql_result($select1, 0, 6);
				$gender = mysql_result($select1, 0, 7);
				$birthday = mysql_result($select1, 0, 8);
				$streetAddress = mysql_result($select1, 0, 9);
				$city = mysql_result($select1, 0, 10);
				$state = mysql_result($select1, 0, 11);
				$country = mysql_result($select1, 0, 12);

				$select2 = mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
				if(mysql_num_rows($select2) > 0 )
				{
				$profilePicture = mysql_result($select2, 0, 2);
				$coverPicture = mysql_result($select2, 0, 3);
				$nickName = mysql_result($select2, 0, 4);
				$licenceImage = mysql_result($select2, 0, 5);
				$licenceNumber = mysql_result($select2, 0, 6);
				$licenceValidty = mysql_result($select2, 0, 7);
				$summary = mysql_result($select2, 0, 8);
				$experiance = mysql_result($select2, 0, 9);
				$intrest = mysql_result($select2, 0, 10);
				$landLineNumber = mysql_result($select2, 0, 15);
				$paymentCurrency = mysql_result($select2, 0, 16);
				$paymentTerm = mysql_result($select2, 0, 17);
				$bestTimeToContace = mysql_result($select2, 0, 18);
				$communicationMechanism = mysql_result($select2, 0, 19);
				$remark = mysql_result($select2, 0, 20);
				}
				else
				{
				$profilePicture = "";
				$coverPicture = "";
				$nickName = "";
				$licenceImage = "";
				$licenceNumber = "";
				$licenceValidty = "";
				$summary = "";
				$experiance = "";
				$intrest = "";
				$landLineNumber = "";
				$paymentCurrency = "";
				$paymentTerm = "";
				$bestTimeToContace = "";
				$communicationMechanism = "";
				$remark = "";
				}
		}
	}
	else
	{
		header('Location:guide_login.php');
		exit;
	}
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
			
			
			
			 <div class="row">
					   <center>
						<div class="row">
						<div class="hovera text-center" style="border: 0px solid black;">
						<form action="uploadphp.php" enctype="multipart/form-data" method="post" id="formCover" name="formCover">
							<table>
								<tr>
									<td>
										<a href="" onclick="document.getElementById('file1').click(); return false">
										<?php 
							
							$select4pic = mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
							$count4pic = mysql_num_rows($select4pic);
							if ($count4pic==0)
							{
								echo '<img style="width:1400px; height:200px;" class="hover img-responsive" src="img/Default.jpg"/>';
							}
							else
							{
								$picVal = mysql_result($select4pic, 0, 2);
								if($picVal==null)
								{
									echo '<img style="width:1400px; height:200px;" class="hover img-responsive" src="img/Default.jpg"/>';
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
					   </div>
			
			<!-- END #page-header -->
			
			<!-- START .main-contents -->
			<div class="main-contents">
				<div class="container">
				<div class="row">
					<div id="page" class="col-md-2 col-sm-12">
					 
					   <div class="row">
					   
					   <center>
						<div class="row">
						<div class="hovera text-center" style="border: 0px solid black;">
						<form action="uploadphp.php" enctype="multipart/form-data" method="post"  id="formProfile" name="formProfile">
							<table >
							<tr style="">
							<td>
							<a href="" onclick="document.getElementById('file2').click(); return false">
							
							<?php 
							
							$select4pic = mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
							$count4pic = mysql_num_rows($select4pic);
							if ($count4pic==0)
							{
								echo '<img style="max-height:200px; max-width:170px;" class="hover img-responsive" src="img/userDefaultIcon.png"/>';
							}
							else
							{
								$picVal = mysql_result($select4pic, 0, 2);
								if($picVal==null)
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
						   </div>
					
					        <br /><br />
				<form action="guide_profile_update.php" enctype="multipart/form-data" method="post">
					   <div class="row">
					  <ul class="list-unstyled">
							<li><span class="menu-text"> Lic. No. : <br><input name="licenceNumber" class="form-control" type="text" value="<?php echo $licenceNumber ?>" /><br><br></li>
							<li><span class="menu-text"> Valid upto : <br><input name="licenceValidty" class="form-control" type="text" value="<?php echo $licenceValidty ?>" /><br><br></li>
							
					    <li><span class="menu-text"> Licence Image : <br>
						
						<div class="hovera text-center" style="border: 0px solid black;">
						<table >
							<tr style="">
							<td>
							<a href="" onclick="document.getElementById('licenceImage').click(); return false">
							
							<?php 
							
							$select4pic = mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
							$count4pic = mysql_num_rows($select4pic);
							if ($count4pic==0)
							{
								echo '<img style="max-height:127px; max-width:200px;" class="hover img-responsive" src="img/PRcard.jpg"/>';
							}
							else
							{
								$picVal = mysql_result($select4pic, 0, 5);
								if($picVal==null)
								{
									echo '<img style="max-height:127px; max-width:200px;" class="hover img-responsive" src="img/PRcard.jpg"/>';
								}
								else
								{
									echo '<img style="max-height:127px; max-width:200px;" class="hover img-responsive" src="showLicence.php?id=' . $userid . '"/>';
								}
							}
							?>
							</a>
							</td>
							</tr>
							</table>
							<input id="licenceImage" name="licenceImage" type="file" style="visibility: hidden;"/>
							</div>
							
						<br>
						</li>
							</ul>
					   </div>
					    
			      </div>
						<!-- START #page -->
						<div id="page" class="col-md-10">
							<div class="user-profile">
								<!-- START TABS -->
								<ul class="nav nav-tabs text-upper" style="background-color:#FFA98E;">
									<li class="active"><?php echo '<a href="guide_profile.php?id=' . $userid . '" data-toggle="tab">Guide Profile</a>' ?></li>
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content clearfix ">
									<!-- START TAB 1 -->
									<div class="tab-pane active " id="userinfo">
										<div class="booking gray clearfix box-shadow1">
											<fieldset>
												
										<div >
					
<button type="submit " class="btn btn-default pull-right" style="background-color:#ffa98e"> 
					<i class="fa fa-save"></i> Save Details	
					</button>
					
					<?php
					echo '<button type="button" onclick="myFunction(' . $userid. ')" class="btn btn-default pull-right" style="background-color:#ffa98e"> 
					<i class="fa fa-times-circle"></i> Cancel
					</button>';
						?>				
										</div>   
											<input type="hidden" name="userid" value="<?php echo $userid; ?>" />										
												<h3 class=" mgtp-10 font-semibold"><i class="icon-user mgr-10 profile-icon"></i> ABOUT</h3>
												<div class="row">
												  <div class="col-sm-6 form-group">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">First Name:</label>
													  <div class="col-xs-7 controls"><input name="firstName" class="form-control" type="text" style="background-color:#f7f7f7;" value="<?php echo $firstName ?>" /></div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												   <div class="col-sm-6 form-group">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Last Name:</label>
													  <div class="col-xs-7 controls"><input name="lastName" class="form-control" type="text" style="background-color:#f7f7f7;" value="<?php echo $lastName ?>" /></div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												  <div class="col-sm-6 form-group">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Gender:</label>
													  
													  <div class="col-xs-7 controls">
													  <select class="form-control" id="gender" name="gender" style="background-color:#f7f7f7;">
														  <option value="SELECT">Select</option>
														  <option value="Male">Male</option>
														  <option value="Female">Female</option>
														</select>
													  </div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												   <div class="col-sm-6 form-group">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Birthday:</label>
													  <div class="col-xs-7 controls"><input name="birthday" class="form-control" type="text" style="background-color:#f7f7f7;" value="<?php echo $birthday ?>" /></div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												  
												  
												</div>
												
												<h3 class=" mgtp-10 font-semibold"><i class="icon-user mgr-10 profile-icon"></i> ADDRESS</h3>
												<div class="row">
												<div class="col-sm-6 form-group">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Street Address:</label>
													  <div class="col-xs-7 controls"><input name="streetAddress" class="form-control" type="text" style="background-color:#f7f7f7;" value="<?php echo $streetAddress ?>" /></div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												  <div class="col-sm-6 form-group">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">City:</label>
													  <div class="col-xs-7 controls"><input name="city" class="form-control" type="text" style="background-color:#f7f7f7;" value="<?php echo $city ?>" /></div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												  <div class="col-sm-6 form-group">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">State</label>
													  
													  <div class="col-xs-7 controls">
													  <select name="state" id="state" class="form-control" style="background-color:#f7f7f7;"></select>
													  </div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												  <div class="col-sm-6 form-group">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Country:</label>
													  
													  <div class="col-xs-7 controls">
													  <select id="country" name="country" selected="India" class="form-control" style="background-color:#f7f7f7;" ></select>
													  </div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												</div>
												
												<h3 class=" mgtp-10 font-semibold"><i class="icon-user mgr-10 profile-icon"></i> CONTACT INFORMATION</h3>
												<div class="row">
												<div class="col-sm-6 form-group">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Mobile Number:</label>
													  <div class="col-xs-7 controls"><input name="mobileNumber" class="form-control" type="text" style="background-color:#f7f7f7;" value="<?php echo $mobileNumber ?>" /></div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												  <div class="col-sm-6 form-group">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Email:</label>
													  <div class="col-xs-7 controls"><input name="emailID" class="form-control" type="text" style="background-color:#f7f7f7;" value="<?php echo $emailID ?>" /></div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												  
												   <div class="col-sm-6 form-group">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Landline Phone:</label>
													  <div class="col-xs-7 controls"><input name="landLineNumber" class="form-control" type="text" style="background-color:#f7f7f7;" value="<?php echo $landLineNumber ?>" /></div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												   <div class="col-sm-6 form-group">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Communication Mechanism:</label>
													  <div class="col-xs-7 controls">
													  <select class="form-control"  style="background-color:#f7f7f7;" name="communicationMechanism" id="communicationMechanism">
														<option value="Mobile">Mobile</option>
														<option value="Email">Email</option>
														</select>
													  </div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												   <div class="col-sm-6 form-group">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Best time to contact:</label>
													  <div class="col-xs-7 controls">
													  <select class="form-control" style="background-color:#f7f7f7;" name="bestTimeToContace" id="bestTimeToContace">
															<option value="anytime">ANY TIME</option>
															<option value="08:00 AM - 12:00 PM">08:00 AM - 12:00 PM</option>
															<option value="12:00 PM - 04:00 PM">12:00 PM - 04:00 PM</option>
															<option value="04:00 PM - 08:00 PM">04:00 PM - 08:00 PM</option>
															</select>
													  </div>
													  <!-- col-sm-10 --> 
													</div>
												  </div> 
												</div>

												<h3 class=" mgtp-10 font-semibold"><i class="icon-user mgr-10 profile-icon"></i> PAYMENT TERMS</h3>
												<div class="row">
												<div class="col-sm-12">
												<textarea name="paymentTerm" class="form-control" style="background-color:#f7f7f7;" rows="2" style="width:100%;" ><?php echo $paymentTerm ?></textarea>
												</div>
												</div>
												<hr class="pd-10">
												<div class="row">
												  <div class="col-sm-6">
													<h3 class=" font-semibold"><i class="fa fa-file-text-o mgr-10 profile-icon"></i> EXPERIENCE</h3>
													<div class="content-list content-menu col-sm-12">
													   <span class="menu-text"><textarea name="experiance" class="form-control" rows="5" style="width:100%; background-color:#f7f7f7;"><?php echo $experiance ?></textarea></span>
													</div>
												  </div>
												  <div class="col-sm-6">
													<h3 class=" font-semibold"><i class="fa fa-trophy mgr-10 profile-icon"></i> NOTE</h3>
													<div class="content-list content-menu  col-sm-12">
														<span class="menu-text"><textarea name="remark" class="form-control" rows="5" style="width:100%; background-color:#f7f7f7;"><?php echo $remark ?></textarea></span>
													</div>
												  </div>
												</div>
												
												<!-- row --> 
												</fieldset>
											</div>
											</div>
											
					
								</div>
								<!-- END TAB CONTENT -->
							</div>
						</div>
						<!-- END #page -->
						</form>
					</div>
					<!-- END .row -->
				</div>
			</div>
			<!-- END .main-contents -->
			
			<?php include('MasterFooter.php'); ?>
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
				document.getElementById("gender").value = "<?php echo $gender ?>";
				document.getElementById("state").value = "<?php echo $state ?>";
				document.getElementById("country").value = "India";
				document.getElementById("bestTimeToContace").value = "<?php echo $bestTimeToContace ?>";
				document.getElementById("communicationMechanism").value = "<?php echo $communicationMechanism ?>";
			</script>
			<script type="text/javascript" src="js/country_state.js"></script>
			<script language="javascript">
				populateCountries("country", "state");
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