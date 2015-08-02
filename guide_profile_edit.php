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
			
			<?php include('MasterHeaderAfterLogin.php'); ?>
			
			<form action="guide_profile_update.php" method="post">
			<!-- START #page-header -->
			<div class="hovera" >
					<input type="file" id="upload" name="coverpicture" style="visibility: hidden; width: 1px; height: 1px"/>
					<a href="" onClick="document.getElementById('upload').click(); return false">
					
					<img src="img/Default.jpg" class="hover img-responsive" />
						<p class="text">change image</p>
					</a>
					</div>
					
		<input type="hidden" name="userid" value="<?php echo $userid ?>" />
			<!-- END #page-header -->
			
			<!-- START .main-contents -->
			<div class="main-contents">
				<div class="container">
				<div class="row">
					<div id="page" class="col-md-2 col-sm-12">
					 
					   <div class="row">
					   
					   <center>
					    <div class="hovera" style="border: 0px solid black; height:250px">
					      <input type="file" id="upload" name="profilepicture" style="visibility: hidden; width: 1px; height: 1px"/>
					     <a href="" onClick="document.getElementById('upload').click(); return false">
					     <img src="img/aa.jpg" class="hover img-responsive" style="max-height:250px"/>
						    <p class="text">change image</p>
					    </a>
					     </div>
						 </center>
					   </div>
					
					        <br /><br />
					   <div class="row">
					  <ul class="list-unstyled">
							<li><span class="menu-text"> Lic. No. : <input name="licenceNumber" class="form-control" type="text" value="<?php echo $licenceNumber ?>" /><br><br></li>
							<li><span class="menu-text"> Valid upto : <input name="licenceValidty" class="form-control" type="text" value="<?php echo $licenceValidty ?>" /><br><br></li>
							
					    <li><span class="menu-text"> Licence Image : 
						<input type="file" id="upload" name="licenceImage" style="visibility: hidden; width: 1px; height: 1px"/>
						<a href="" onClick="document.getElementById('upload').click(); return false">
						<img src="img/PRcard.jpg" class="hover img-responsive" style="max-height:127px; max-width:200px;" />
						<p class="text">change image</p>
					    </a>
						<br></li>
							<li><span class="menu-text"> Communication Mechanism : <input name="communicationMechanism" class="form-control" type="text" value="<?php echo $communicationMechanism ?>" /><br><br></li>
							<li><span class="menu-text"> Best time to contact : <input name="bestTimeToContace" class="form-control" type="text" value="<?php echo $bestTimeToContace ?>" /><br><br></li>
							<li><span class="menu-text"> Payment Corrency : <input name="paymentCurrency" class="form-control" type="text" value="<?php echo $paymentCurrency ?>" /><br><br></li>
							<li><span class="menu-text"> Payment Terms : <textarea name="paymentTerm" class="form-control" rows="3" style="width:100%;" ><?php echo $paymentTerm ?></textarea><br></li>
							</ul>
					   </div>
					    
			      </div>
						<!-- START #page -->
						<div id="page" class="col-md-10">
							<div class="user-profile">
								<!-- START TABS -->
								<ul class="nav nav-tabs text-upper" style="background-color:#FFA98E;">
									<li class="active"><a href="#userinfo" data-toggle="tab">Guide Profile</a></li>
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
										
										</div>      
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
													  <div class="col-xs-7 controls"><input name="gender" class="form-control" type="text" style="background-color:#f7f7f7;" value="<?php echo $gender ?>" /></div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
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
													  <label class="col-xs-5 control-label">Birthday:</label>
													  <div class="col-xs-7 controls"><input name="birthday" class="form-control" type="text" style="background-color:#f7f7f7;" value="<?php echo $birthday ?>" /></div>
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
													  <div class="col-xs-7 controls"><input name="state" class="form-control" type="text" style="background-color:#f7f7f7;" value="<?php echo $state ?>" /></div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												  <div class="col-sm-6 form-group">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Country:</label>
													  <div class="col-xs-7 controls"><input name="country" class="form-control" type="text" style="background-color:#f7f7f7;" value="<?php echo $country ?>" /></div>
													  <!-- col-sm-10 --> 
													</div>
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
													<h3 class=" font-semibold"><i class="fa fa-trophy mgr-10 profile-icon"></i> INTREST</h3>
													<div class="content-list content-menu  col-sm-12">
														<span class="menu-text"><textarea name="intrest" class="form-control" rows="5" style="width:100%; background-color:#f7f7f7;"><?php echo $intrest ?></textarea></span>
													</div>
												  </div>
												</div>
												<!-- row -->
												<hr class="pd-10">
												<div class="row">
												  <div class="col-sm-6">
													<h3 class=" font-semibold"><i class="fa fa-globe mgr-10 profile-icon"></i> REMARK</h3>
													<div class=" col-sm-12">
													  <div class="content-list">
														<div style="overflow: hidden;" class="mCustomScrollbar _mCS_6" data-rel="scroll"><div class="mCustomScrollBox mCS-light" id="mCSB_6" style="position: relative; height: 100%; overflow: hidden; max-width: 100%; max-height: 400px;"><div class="mCSB_container" style="position: relative; top: 0px;">
														  <span class="menu-icon vd_yellow"><textarea name="remark" class="form-control" rows="5" style="width:100%; background-color:#f7f7f7;"><?php echo $remark ?> </textarea></span>
														</div><div class="mCSB_scrollTools" style="position: absolute; display: block; opacity: 0;"><div class="mCSB_draggerContainer"><div class="mCSB_dragger" style="position: absolute; top: 0px; height: 352px;" oncontextmenu="return false;"><div class="mCSB_dragger_bar" style="position: relative; line-height: 352px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div>
													  </div>
													</div>
												  </div>
												 <div class="col-sm-6">
													<h3 class=" font-semibold"><i class="fa fa-flask mgr-10 profile-icon"></i> SUMMARY</h3>
													<div class="col-sm-12">
													 <div class="content-list">
														<div style="overflow: hidden;" class="mCustomScrollbar _mCS_6" data-rel="scroll"><div class="mCustomScrollBox mCS-light" id="mCSB_6" style="position: relative; height: 100%; overflow: hidden; max-width: 100%; max-height: 400px;"><div class="mCSB_container" style="position: relative; top: 0px;">
														  <span class="menu-icon vd_yellow"><textarea name="summary" class="form-control" rows="5" style="width:100%; background-color:#f7f7f7;"><?php echo $summary ?></textarea></span>
														</div><div class="mCSB_scrollTools" style="position: absolute; display: block; opacity: 0;"><div class="mCSB_draggerContainer"><div class="mCSB_dragger" style="position: absolute; top: 0px; height: 352px;" oncontextmenu="return false;"><div class="mCSB_dragger_bar" style="position: relative; line-height: 352px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div>
													  </div>				
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
					</div>
					<!-- END .row -->
				</div>
			</div>
			<!-- END .main-contents -->
			</form>
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