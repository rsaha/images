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
				include_once('db.php');

				$select1 = mysql_query("SELECT * FROM `tbl_user_profile` WHERE `user_id` = $userid");
				$row11 = mysql_fetch_assoc($select1);
				$firstName=$row11["f_name"];
				$lastName=$row11["l_name"];
				$username =  $firstName . " " . $lastName;
				$emailID = $row11["email"];
				$mobileNumber = $row11["mobileNo"];
				$gender = $row11["gender"];
				$birthday = $row11["d_o_b"];
				$streetAddress = $row11["street_address"];
				$city = $row11["city"];
				$state = $row11["state"];
				$country = $row11["country"];

				$select2 = mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
				$row22 = mysql_fetch_assoc($select2);
				if(mysql_num_rows($select2) > 0 )
				{
				$profilePicture = $row22["guide_profile_pic"];
				$coverPicture = $row22["guide_Cover_pic"];
				$nickName = $row22["nick_name"];
				$LicenceImage = $row22["license_Image"];
				$licenceNumber = $row22["license_no"];
				$licenceValidty = $row22["validity"];
				$guideTerritory = $row22["guide_territory"];
				$summery = $row22["guide_summary"];
				$otherExperiance = $row22["other_experience"];
				$experianceInYear = $row22["experiance_in_year"];
				$intrest = $row22["guide_interest"];
				$landLineNumber = $row22["landline_no"];
				$paymentCurrency = $row22["payment_currency"];
				$paymentTerm = $row22["payment_terms"];
				$bestTimeToContact = $row22["Best_time_for_contact"];
				$communicationMechanism = $row22["Communication_mechanism"];
				$remark = $row22["guide_Remarks"];
				}
				else
				{
				$nickName = "";
				$licenceNumber = "";
				$licenceValidty = "";
				$guideTerritory = "";
				$summery = "";
				$otherExperiance = "";
				$experianceInYear = "";
				$intrest = "";
				$landLineNumber = "";
				$paymentCurrency = "";
				$paymentTerm = "";
				$bestTimeToContact = "";
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
			
			
			<?php include_once('MasterHeaderAfterLogin.php'); ?>
			
			
			
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
											$count4pic = mysql_num_rows($select2);
											if ($count4pic==0)
											{
												echo '<img class="hover img-responsive" src="img/Default.jpg"/>';
											}
											else
											{
												if($coverPicture==null)
												{
													echo '<img class="hover img-responsive" src="img/Default.jpg"/>';
												}
												else
												{
													echo '<img class="hover img-responsive" src="showCover.php?id=' . $userid . '"/>';
												}
											}
											?><br>
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
						<div class="col-md-11">
						<div class="hovera text-center" style="border: 0px solid black;">
						<form action="uploadphp.php" enctype="multipart/form-data" method="post"  id="formProfile" name="formProfile">
							
							<a href="" onclick="document.getElementById('file2').click(); return false">
							
							<?php 
						$count4pic = mysql_num_rows($select2);
						if ($count4pic==0)
						{
							echo '<img class="hover img-responsive" src="img/userDefaultIcon.png"/>';
						}
						else
						{
							if($profilePicture==null)
							{
								echo '<img class="hover img-responsive" src="img/userDefaultIcon.png"/>';
							}
							else
							{
								echo '<img class="hover img-responsive" src="showImage.php?id=' . $userid . '"/>';
							}
						}
							
						?>
							</a>
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
					   <div class="col-md-11">
					   <a href="guide_login.php" style="color:#5a5a5a;" title=""><center><u><span style="font-size:18px;font-weight:bold;"><?php echo strtoupper($username) ?></span></u></center></a>
					<br /><br />
					<label style="font-size:14px;">Licence Number. :</label><br><br />
					<input name="licenceNumber" class="form-control" type="text" value="<?php echo $licenceNumber ?>" /><br />
					  <hr>
					<label style="font-size:14px;">Licence Expiry Date :</label><br><br />
					<input name="licenceValidty" class="form-control" min="2015-01-01" type="date" value="<?php echo $licenceValidty ?>" />
					<hr>
					<label style="font-size:14px;">Licence Image :</label><br><br />
							
					    <div class="hovera text-center" style="border: 0px solid black;">
						<table >
							<tr style="">
							<td>
							<a href="" onclick="document.getElementById('licenceImage').click(); return false">
							
							<?php 
							$count4pic = mysql_num_rows($select2);
							if ($count4pic==0)
							{
								echo '<img class="hover img-responsive" src="img/PRcard.jpg"/>';
							}
							else
							{
								if($LicenceImage==null)
								{
									echo '<img class="hover img-responsive" src="img/PRcard.jpg"/>';
								}
								else
								{
									echo '<img class="hover img-responsive" src="showLicence.php?id=' . $userid . '"/>';
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
							
					   </div>
					    </div>
			      </div>
						<!-- START #page -->
						<div id="page" class="col-md-10 col-sm-12 col-xs-12">
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
					
<button type="submit" class="btn btn-default pull-right" style="background-color:#ffa98e"> 
					<i class="fa fa-save"></i> Save Details	
					</button>
					
					<?php
					echo '<button type="button" onclick="myFunction(' . $userid. ')" class="btn btn-default pull-right" style="background-color:#ffa98e"> 
					<i class="fa fa-times-circle"></i> Cancel
					</button>';
						?>				
										</div> <br> 
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
													  <div class="col-xs-7 controls"><input name="birthday" class="form-control" type="date" max="1999-12-31" style="background-color:#f7f7f7;" value="<?php echo $birthday ?>" /></div>
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
													  <div class="col-xs-7 controls">
													  <input name="city" class="form-control" type="text" id="guideCity" style="background-color:#f7f7f7;" value="<?php echo $city ?>"  autocomplete="on"/>
													  </div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												  <div class="col-sm-6 form-group">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">State</label>
													  
													  <div class="col-xs-7 controls">
													  <select name="state" id="state" class="form-control" style="background-color:#f7f7f7;">
													  <?php include_once('state.php'); ?>
														</select>
													  </div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												  <div class="col-sm-6 form-group">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Country:</label>
													  
													  <div class="col-xs-7 controls">
													  <select id="country" name="country" class="form-control" style="background-color:#f7f7f7;" >
													  <option value="India" selected>India</option>
													  </select>
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
													  <div class="col-xs-7 controls"><input name="mobileNumber" class="form-control" type="text" style="background-color:#f7f7f7;" value="<?php echo $mobileNumber ?>" readonly/></div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												  <div class="col-sm-6 form-group">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Email:</label>
													  <div class="col-xs-7 controls"><input name="emailID" class="form-control" type="text" style="background-color:#f7f7f7;" value="<?php echo $emailID ?>" readonly/></div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												  
												   <div class="col-sm-6 form-group">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Alternate Number:</label>
													  <div class="col-xs-7 controls"><input name="landLineNumber" class="form-control" type="tel" maxlength="15" style="background-color:#f7f7f7;" value="<?php echo $landLineNumber ?>" /></div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												   <div class="col-sm-6 form-group">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Communication Mechanism:</label>
													  <div class="col-xs-7 controls">
													  <select class="form-control"  style="background-color:#f7f7f7;" name="communicationMechanism" id="communicationMechanism">
														<option value="Mobile & Email">Mobile &amp; Email</option>
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
													  <select class="form-control" style="background-color:#f7f7f7;" name="bestTimeToContact" id="bestTimeToContact">
															<option value="ANY TIME">ANY TIME</option>
															<option value="08:00 AM - 12:00 PM">08:00 AM - 12:00 PM</option>
															<option value="12:00 PM - 04:00 PM">12:00 PM - 04:00 PM</option>
															<option value="04:00 PM - 08:00 PM">04:00 PM - 08:00 PM</option>
															</select>
													  </div>
													  <!-- col-sm-10 --> 
													</div>
												  </div> 
												  
												  <div class="col-sm-6 form-group">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Language Known:</label>
													  <div class="col-xs-7 controls">
													  
													  <select class="form-control" multiple name="languageKnown[]" id="languageKnown" style="background-color:#f7f7f7;">
															<?php 
														  $select3 = mysql_query("SELECT * FROM `tbl_languages` WHERE `status` = 1 ORDER BY `lanugage_name`");
														  while($row33 = mysql_fetch_array($select3))
															{
																$fish=0;
																$select4 = mysql_query("SELECT tl.language_id, tl.lanugage_name FROM tbl_guide_known_languages AS gkl INNER JOIN tbl_languages AS tl ON gkl.language_id=tl.language_id WHERE gkl.user_id = $userid");
																	while($row44 = mysql_fetch_array($select4))
																	{
																		if($row33['language_id'] == $row44['language_id'])
																		{
																			echo '<option selected value="' . $row33['language_id'] . '">' . $row33["lanugage_name"] . '</option>';
																			$fish=1;
																		}
																	}
																	if($fish==0)
																	{
																		echo '<option value="' . $row33['language_id'] . '">' . $row33["lanugage_name"] . '</option>';
																		
																	}
															}
															?>
															</select>
													  </div>
													  <!-- col-sm-10 --> 
													</div>
												  </div> 
												  
												  <div class="col-sm-6 form-group">
													<div class="row mgbt-xs-0">
													<label class="col-xs-5 control-label">Experiance (in years) :</label>
													  <div class="col-xs-7 controls">
													 <div class="input-group">
													  <input type="tel" maxlength="2" class="form-control" style="background-color:#f7f7f7;" value="<?php echo $experianceInYear; ?>" name="experianceInYear" id="experianceInYear">
													  <span class="input-group-addon" style="background-color:#f7f7f7;" id="basic-addon2">Years</span>
													</div>
													  </div>
													  <!-- col-sm-10 --> 
													</div>
												  </div> 
												  
												  
												</div>
												
												<h3 class=" mgtp-10 font-semibold"><i class="icon-user mgr-10 profile-icon"></i>GUIDE TERRITORY</h3>
												<div class="row">
												<div class="col-sm-12">
												<textarea name="guideTerritory" class="form-control" style="background-color:#f7f7f7;" rows="2" style="width:100%;" ><?php echo $guideTerritory ?></textarea>
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
												 <h3 class=" font-semibold"><i class="fa fa-file-text-o mgr-10 profile-icon"></i> OTHER EXPERIENCE</h3>
													
													<div class="content-list content-menu col-sm-12">
													   <span class="menu-text"><textarea name="otherExperiance" class="form-control" rows="5" style="width:100%; background-color:#f7f7f7;"><?php echo $otherExperiance ?></textarea></span>
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
			
			<?php include_once('MasterFooter.php'); ?>
		</div>
		<!-- END #wrapper -->
			<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
			<script type="text/javascript">
			function initialize() {

			 var options = {
			  types: ['(cities)'],
			  componentRestrictions: {country: "in"}
			 };

			 var input = document.getElementById('guideCity');
			 var autocomplete = new google.maps.places.Autocomplete(input, options);
			}
			google.maps.event.addDomListener(window, 'load', initialize);
			</script>
			
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
				document.getElementById("bestTimeToContact").value = "<?php echo $bestTimeToContact ?>";
				document.getElementById("communicationMechanism").value = "<?php echo $communicationMechanism ?>";
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