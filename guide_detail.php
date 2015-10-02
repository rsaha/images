<?php
	session_start();
	
	if(isset($_GET['id']))
		{
			$userid = $_GET['id'];
			$_SESSION['photo'] = array();
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
				$bestTimeToContace = $row22["Best_time_for_contact"];
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
				$bestTimeToContace = "";
				$communicationMechanism = "";
				$remark = "";
				}
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
		
		<link rel="stylesheet" type="text/css" href="css/quiker1.js" media="all" />
		
		<!-- Load Fonts via Google Fonts API -->
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Karla:400,700,400italic,700italic" />
		<!-- color scheme -->
		<link rel="stylesheet" type="text/css" href="css/colors/color1.css" title="color1" />
		
		

			<style>

			body
			{
			font-family:arial;
			}
			.preview
			{
			width:92%;
			height:92%;
			border:solid 1px #dedede;
			padding:5px;
			}
			#preview
			{
			color:#cc0000;
			font-size:12px
			}
			</style>
		
		<style type="text/css" >
		
		#editButton{
			top: 5px;     
			height: 29px;
			position: absolute;
			right: 20px;
		}
 
		
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
		
		
		a.my-tool-tip, a.my-tool-tip:hover, a.my-tool-tip:visited {

    color: black;
}
		
		</style>
		
		
	</head>
	<!-- END head -->

	<!-- START body -->
	<body>
		<!-- START #wrapper -->
		<div id="wrapper">
			
			<?php include_once('MasterHeader.php'); ?>
			
			<!-- START #page-header -->
			<div class="" >
			<?php 		
			$count4pic = mysql_num_rows($select2);
			if ($count4pic==0)
			{
				echo '<img style="width:1400px; height:200px;" class="hover img-responsive" src="img/Default.jpg"/>';
			}
			else
			{
				if($coverPicture==null)
				{
					echo '<img style="width:1400px; height:200px;" class="hover img-responsive" src="img/Default.jpg"/>';
				}
				else
				{
					echo '<img style="width:1400px; height:200px;" class="hover img-responsive" src="showCover.php?id=' . $userid . '"/>';
				}
			}
			?><br>
					</div>
					
		<input type="hidden" name="userid" value="<?php echo $userid ?>" />
			<!-- END #page-header -->
			
			<!-- START .main-contents -->
			<div class="main-contents">
				<div class="container">
				<div class="row">
					<div id="page" class="col-md-2 col-sm-12">
					 
					   <center>
					    <div class="row">
						<?php 
						$count4pic = mysql_num_rows($select2);
						if ($count4pic==0)
						{
							echo '<img style="max-height:200px; max-width:170px;" class="hover img-responsive" src="img/userDefaultIcon.png"/>';
						}
						else
						{
							if($profilePicture==null)
							{
								echo '<img style="max-height:200px; max-width:170px;" class="hover img-responsive" src="img/userDefaultIcon.png"/>';
							}
							else
							{
								echo '<img style="max-height:200px; max-width:170px;" class="hover img-responsive" src="showImage.php?id=' . $userid . '"/>';
							}
						}
							
						?>
						</div>
						 </center>
					
					        <br /><br />
					   <div class="row">
					<div class="col-md-11">
					<a href="guide_login.php" style="color:#5a5a5a;" title=""><center><u><span style="font-size:18px;font-weight:bold;"><?php echo strtoupper($username) ?></span></u></center></a>
					<br /><br />
					<label style="font-size:14px;">Licence Number. :</label><br><br />
					<span style="font-size:18px;font-weight:bold;"><?php echo $licenceNumber ?></span><br />
					<hr>
					<label style="font-size:14px;">Licence Expiry Date :</label><br><br />
					<span style="font-size:18px;font-weight:bold;"><?php echo $licenceValidty ?></span><br />
					<hr>
					<label style="font-size:14px;">Licence Image :</label><br><br />
					<?php 
							$count4pic = mysql_num_rows($select2);
							if ($count4pic==0)
							{
								echo '<img style="max-height:127px; max-width:200px;" class="hover img-responsive" src="img/PRcard.jpg"/>';
							}
							else
							{
								if($LicenceImage==null)
								{
									echo '<img style="max-height:127px; max-width:200px;" class="hover img-responsive" src="img/PRcard.jpg"/>';
								}
								else
								{
									echo '<img style="max-height:127px; max-width:200px;" class="hover img-responsive" src="showLicence.php?id=' . $userid . '"/>';
								}
							}
							?>
						<br>
					
					</div>
					
					</div>
					  
					    
			      </div>
						<!-- START #page -->
						<div id="page" class="col-md-10 col-sm-12 col-xs-12">
							<div class="user-profile">
								<!-- START TABS -->
								<ul class="nav nav-tabs text-upper" style="background-color:#FFA98E;">
									<li class="active"><a href="#userinfo" data-toggle="tab">Guide Profile</a></li>
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content clearfix ">
									<!-- START TAB 1 -->
									<div class="tab-pane active" id="userinfo">
										<div class="booking gray clearfix box-shadow1">
											<fieldset>
										<div >
										<?php
										echo '<a class="btn-lg btn-default pull-right" style="background-color:#ffa98e; cursor: pointer;" onclick="bookGuide(' . $userid. ',0)"> 
										<i class="fa fa-pencil"></i> Book This Guide 
										</a>'
										?>	
										</div>      <br>
												<h3 class="font-semibold"><i class="icon-user profile-icon"></i> ABOUT</h3>
												<div class="row">
												  <div class="col-sm-6 col-xs-12">
													  <div class="form-group">
													  <label class="col-md-5 control-label" style="font-size:14px; font-weight:bold">Name:</label>
													  <div class="col-md-7 controls"><?php echo $username ?></div>
													  </div>
													  <!-- col-sm-10 --> 
												  </div>
												  <div class="col-sm-6 col-xs-12">
													  <div class="form-group">
													  <label class="col-md-5 control-label" style="font-size:14px; font-weight:bold">Gender:</label>
													  <div class="col-md-7 controls"><?php echo $gender ?></div>
												  </div>
													  <!-- col-sm-10 --> 
												  </div>
												  
												   <div class="col-sm-6 col-xs-12">
													  <div class="form-group">
													  <label class="col-md-5 control-label" style="font-size:14px; font-weight:bold">Birthday:</label>
													  <div class="col-md-7 controls"><?php echo $birthday ?></div>
												  </div>
													  <!-- col-sm-10 --> 
												  </div>
												   
												  
												</div>
												
												<h3 class=" mgtp-10 font-semibold"><i class="icon-user mgr-10 profile-icon"></i> ADDREDSS</h3>
												<div class="row">
												<div class="col-sm-6 col-xs-12">
													  <div class="form-group">
													  <label class="col-md-5 control-label" style="font-size:14px; font-weight:bold">Street Address:</label>
													  <div class="col-md-7 controls"><?php echo $streetAddress ?></div>
												  </div>
													  <!-- col-sm-10 --> 
												  </div>
												  <div class="col-sm-6 col-xs-12">
													  <div class="form-group">
													  <label class="col-md-5 control-label" style="font-size:14px; font-weight:bold">City:</label>
													  <div class="col-md-7 controls"><?php echo $city ?></div>
												  </div>
													  <!-- col-sm-10 --> 
												  </div>
												  <div class="col-sm-6 col-xs-12">
													  <div class="form-group">
													  <label class="col-md-5 control-label" style="font-size:14px; font-weight:bold">State</label>
													  <div class="col-md-7 controls"><?php echo $state ?></div>
												  </div>
													  <!-- col-sm-10 --> 
												  </div>
												  <div class="col-sm-6 col-xs-12">
													  <div class="form-group">
													  <label class="col-md-5 control-label" style="font-size:14px; font-weight:bold">Country:</label>
													  <div class="col-md-7 controls"><?php echo $country ?></div>
												  </div>
													  <!-- col-sm-10 --> 
												  </div>
												</div>
												
												<h3 class=" mgtp-10 font-semibold"><i class="icon-user mgr-10 profile-icon"></i> CONTACT INFORMATION</h3>
												<div class="row">
												<div class="col-sm-6 col-xs-12">
													  <div class="form-group">
													  <label class="col-md-5 control-label" style="font-size:14px; font-weight:bold">Mobile Number:</label>
													  <div class="col-md-7 controls"><?php echo $mobileNumber ?></div>
												  </div>
													  <!-- col-sm-10 --> 
												  </div>
												  <div class="col-sm-6 col-xs-12">
													  <div class="form-group">
													  <label class="col-md-5 control-label" style="font-size:14px; font-weight:bold">Email:</label>
													  <div class="col-md-7 controls"><?php echo $emailID ?></div>
												  </div>
													  <!-- col-sm-10 --> 
												  </div>
												  <div class="col-sm-6 col-xs-12">
													  <div class="form-group">
													  <label class="col-md-5 control-label" style="font-size:14px; font-weight:bold">Alternate Number:</label>
													  <div class="col-md-7 controls"><?php echo $landLineNumber ?></div>
												  </div>
													  <!-- col-sm-10 --> 
												  </div>
												  <div class="col-sm-6 col-xs-12">
													  <div class="form-group">
													  <label class="col-md-5 control-label" style="font-size:14px; font-weight:bold">Communication Mechanism:</label>
													  <div class="col-md-7 controls"><?php echo $communicationMechanism ?></div>
												  </div>
													  <!-- col-sm-10 --> 
												  </div>
												  
												  <div class="col-sm-6 col-xs-12">
													  <div class="form-group">
													  <label class="col-md-5 control-label" style="font-size:14px; font-weight:bold">Best time to contact:</label>
													  <div class="col-md-7 controls"><?php echo $bestTimeToContace ?></div>
												  </div>
													  <!-- col-sm-10 --> 
												  </div>
												  
												  <div class="col-sm-6 col-xs-12">
												<?php
												$select3 = mysql_query("SELECT tl.lanugage_name FROM tbl_guide_known_languages AS gkl INNER JOIN tbl_languages AS tl ON gkl.language_id=tl.language_id WHERE gkl.user_id = $userid");
												$count4Lan = mysql_num_rows($select3);
												?>
				
											  <div class="form-group">
											  <label class="col-md-5 control-label" style="font-size:14px; font-weight:bold">Language Known:</label>
											  <div class="col-md-7 controls">
											  <?php 
											 $cnt=1;
														while($row33 = mysql_fetch_array($select3))
														{
															if($count4Lan==$cnt)
															{
															echo $row33["lanugage_name"];
															}
															else
															{
																echo $row33["lanugage_name"].", ";
															}
															$cnt=$cnt+1;
														}
												?>
												</div>
												  </div>
													  <!-- col-sm-10 --> 
												  </div>
												  
												</div>
												
												<hr class="pd-10">
												<div class="row">
												 <div class="col-sm-12 col-xs-12">
													<div class="form-group">
													  <h3 class=" font-semibold">GUIDE TERRITORY</h3>
													<div class="content-list content-menu col-sm-11">
													   <span class="menu-text"><?php echo $guideTerritory ?></span>
													</div>
												  </div>
												  </div>
												  </div>
												  
												  
												<hr class="pd-10">
												<div class="row">
												 <div class="col-sm-12 col-xs-12">
													<div class="form-group">
													  <h3 class=" font-semibold">PAYMENT TERMS</h3>
													<div class="content-list content-menu col-sm-11">
													   <span class="menu-text"><?php echo $paymentTerm ?></span>
													</div>
												  </div>
												  </div>
												  </div>
												  
												<hr class="pd-10">
												<div class="row">
												  <div class="col-sm-6 col-xs-12">
													<div class="form-group">
													  <h3 class=" font-semibold"><i class="fa fa-file-text-o mgr-10 profile-icon"></i> EXPERIENCE</h3>
													<div class="content-list content-menu col-sm-11">
													   <span class="menu-text"><?php echo $experianceInYear . " Years experiance, <br>" . $otherExperiance ?></span>
													</div>
												  </div>
												  </div>
												  <div class="col-sm-6 col-xs-12">
													<div class="form-group">
													  <h3 class=" font-semibold"><i class="fa fa-file-text-o mgr-10 profile-icon"></i> NOTE</h3>
													<div class="content-list content-menu col-sm-11">
													   <span class="menu-text"><?php echo $remark ?></span>
													</div>
												  </div>
												  </div>
												</div>
												
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
					<div class="row">
					<div class="user-profile">
								<!-- START TABS -->
								<ul class="nav nav-tabs text-upper" style="background-color:#FFA98E;">
									<li class="active"><a href="#userinfo" data-toggle="tab">Tours By this Guide</a></li>
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content clearfix ">
									<!-- START TAB 1 -->
									<div class="tab-pane active" id="userinfo">
										<div class="row">

											<?php 
											include_once('db.php');
											$sql1 = mysql_query("SELECT * FROM `tbl_tours` WHERE `user_id`=$userid");
											if(mysql_num_rows($sql1) < 1)
											{
											?>
											<center><h1>No Tours By This Guide</h1></center>
												<!--div class="col-lg-3 col-md-4 col-sm-6 col-xs-10">
													<div class="ft-item">
														<span class="ft-image">
															<img alt="featured Scroller" class="img-responsive" src="img/custom1.jpg" draggable="false">
														</span>
														<div class="ft-data2">
														<span style="color:white" class="ft-title text-upper">Tour Title</span>
															<span class="ft-offer text-upper">Price (Rs)</span>
														</div>
														<div class="ft-foot">
															<span style="font-size:12px" class="ft-date text-upper alignleft">Location</span>
															<span style="font-size:11px" class="ft-temp alignright">Tour Duration</span>
														</div>
													</div>
												</div-->
											<?php
											}
											else
											{
												echo "<br>";
												while ($row1 = mysql_fetch_array($sql1))
											{
											?>
													<div class="col-lg-3 col-md-4 col-sm-6 col-xs-10">
													<?php
													echo '<a style="cursor: pointer;" onclick="detailTour(' . $row1['tour_id'] . ');" >';
														$tour_id = $row1['tour_id'];
														?>
														<input type="hidden" name="tourid" id="tourid" value=" <?php echo $row1['tour_id'] ?> " />
														<div class="ft-item">
														
															<span class="ft-image">
																<?php
																$select4Tpic = mysql_query("SELECT * FROM `tbl_tour_media_pictures` WHERE `tour_id` = $tour_id");
																$count4Tpic = mysql_num_rows($select4Tpic);
																if ($count4Tpic==0)
																{
																	echo '<img alt="featured Scroller" class="img-responsive" draggable="false" src="img/custom11.jpg"/>';
																}
																else
																{
																	echo '<img alt="featured Scroller" class="img-responsive" draggable="false" style="width:207px; height:105px;" src="showMediaPicture.php?id=' . mysql_result($select4Tpic, 0, 0) . '"/>';
																}
																?>
																
															</span>
															<div class="ft-data2">
																<span style="color:white" class="ft-title text-upper"><?php echo $row1['tour_title'] ?></span>
																<span class="ft-offer text-upper"><?php echo $row1['tour_price'] ?></span>
															</div>
															<div class="ft-foot">
																<span class="ft-date text-upper alignleft"><?php echo $row1['tour_location'] ?></span>
																<span class="ft-temp alignright"><?php echo $row1['tour_duration'] ?> Days</span>
															</div>
														</div>
														<?php echo '</a>'; ?>
													</div>
													
												<?php 
											}
											}
											?>
						
						
						<div class="clearfix"></div>
					</div>
											</div>
								</div>
								<!-- END TAB CONTENT -->
							</div>
					</div>
				</div>
			</div>
			<!-- END .main-contents -->
			
			<?php include_once('MasterFooter.php'); ?>
			
			<?php
			
			if(isset($_SESSION['notification']))
			{
				echo '<script> alert("' . $_SESSION['notification'] . '"); </script>';
				
			}
			$_SESSION['notification']="";
				unset($_SESSION['notification']);
			
			?>
		</div>
		<!-- END #wrapper -->
		 
		<!-- javascripts -->
		<script type="text/javascript" src="js/angular.min.js"></script>
		<script type="text/javascript" src="js/AngularControler.js"></script>
		
		<script>

			$(function () {
			  $('[data-toggle="popover"]').popover();
			});
			
				function editProfile(id) 
				{
					window.location.href = "guide_profile_edit.php?id="+id;
					return false;
				}
				
				function createTour(id) 
				{
					window.location.href = "tour_Create.php?id="+id+"";
					return false;
				}
				
				function editTour(id1,id2) 
				{
					window.location.href = "edit_Tour.php?id1="+id1+"&id2="+id2+"";
					return false;
				}
				
				function detailTour(id) 
				{
					window.location.href = "tour_detail_sidebar.php?id="+id+"";
					return false;
				}
				
				function bookGuide(guide,tour) 
				{
					window.location.href = "booking-form.php?id1="+guide+"&id2="+tour;
					return false;
				}
		</script>

				
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