<?php
	session_start();
	
	if(isset($_SESSION['userId']))
	{
		if(isset($_GET['id1']) && isset($_GET['id2']))
		{
		$userid = $_GET['id1'];
		$tourID = $_GET['id2'];
		}
		if($_SESSION['userId']!=$userid)
		{
			include("signOut.php");
            header('Location:guide_login.php');
			exit;
		}
		else
		{
			
			$_SESSION['photo'] = array();
			$_SESSION['signinCheck']="signin";
			$_SESSION['phase'] = "signin";
				include('db.php');

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
				
				
				$select3 = mysql_query("SELECT * FROM `tbl_tours` WHERE `tour_id` = $tourID");
				$row33 = mysql_fetch_assoc($select3);
				if(mysql_num_rows($select3) > 0 )
				{
					$oldTourId = $row33["tour_id"];
					$tour_category_id = $row33["tour_category_id"];
					$tour_title = $row33["tour_title"];
					$tour_location = $row33["tour_location"];
					$tour_description = $row33["tour_description"];
					$tour_duration = $row33["tour_duration"];
					$tour_price = $row33["tour_price"];
					$start_point = $row33["start_point"];
					$end_point = $row33["end_point"];
					$inclusive = $row33["inclusive"];
					$exclusive = $row33["exclusive"];
					$cancelation_policy = $row33["cancelation_policy"];
					$restrictions = $row33["restrictions"];
					$notes = $row33["notes"];
				}
				else
				{
				$tour_category_id = "";
				$tour_title = "";
				$tour_location = "";
				$tour_description = "";
				$tour_duration = "";
				$tour_price = "";
				$start_point = "";
				$end_point = "";
				$inclusive = "";
				$exclusive = "";
				$cancelation_policy = "";
				$restrictions = "";
				$notes = "";
				}
		}
	}
	else
	{
		include("signOut.php");
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
		<script type="text/javascript" src="js/angular.min.js"></script>
		<script type="text/javascript" src="js/AngularControler.js"></script>
	</head>
	<!-- END head -->

	<!-- START body -->
	<body>
		<!-- START #wrapper -->
		<div id="wrapper">
			
			<?php include('MasterHeaderAfterLogin.php'); ?>
			
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
					<a href="guide_login.php" style="color:#5a5a5a;" title="">
					<center><u><span style="font-color:black; font-size:18px;font-weight:bold;"><?php echo strtoupper($username) ?></span></u></center>
					</a>
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
									<li class="active"><a href="" data-toggle="tab">Add Existing Tour</a></li>
									<!--<li><a href="#createTour" data-toggle="tab">Create Tour</a></li>-->
									<!--<li><a href="#licenceDetail" data-toggle="tab">Licence Detail</a></li>-->
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content clearfix ">
									
									
									<div class="tab-pane active" id="createTour">
										<div class="booking gray clearfix box-shadow1">
											<form method="post" action="add_Existing_Tour_Code.php">
											<input type="hidden" name="userid" value="<?php echo $userid ?>" />
											<input type="hidden" name="oldTourId" value="<?php echo $oldTourId ?>" />
											<div class="col-sm-3">
											<div class="form-group">
												<strong> Tour Type:</strong>
												<select class="form-control" name="tourType" id="tourType" style="background-color:white">
												<?php 
												$sql = mysql_query("SELECT `tour_category_id`, `tour_category_title` FROM `tbl_tour_category` WHERE `status` = 1");
												while ($row = mysql_fetch_array($sql)){
												echo '<option value="' . $row['tour_category_id'] . '">' . $row['tour_category_title'] . '</option>';
												}
												?>
												</select>
											</div>
											</div>
											<div class="col-sm-3">
											<div class="form-group">
												<strong> Location:</strong>
												<input type="text" class="form-control" value="<?php echo $tour_location; ?>" id="tourLocation" name="tourLocation" style="background-color:white" autocomplete="on" required />
											</div>
											</div>
											
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Tour Name:</strong>
												<input type="text" class="form-control" value="<?php echo $tour_title; ?>" name="tourName" style="background-color:white" required />
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Description:</strong>
												<textarea class="form-control" placeholder="Tour Discription" name="tourDiscription" style="height:115px; background-color:white" required ><?php echo $tour_description; ?></textarea>
												<!--<input type="text" class="form-control" placeholder="tour name" name="tourDiscription" style="background-color:white" />-->
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Duration:</strong>
												<select class="form-control" id="tourDuration" name="tourDuration" style="background-color:white" disabled>
												<option value="1">1 Day</option>
												<option value="2">2 Days</option>
												<option value="3">3 Days</option>
												<option value="4">4 Days</option>
												<option value="5">5 Days</option>
												<option value="6">6 Days</option>
												<option value="7">7 Days</option>
												<option value="8">8 Days</option>
												<option value="9">9 Days</option>
												<option value="10">10 Days</option>
												<option value="11">11 Days</option>
												<option value="12">12 Days</option>
												<option value="13">13 Days</option>
												<option value="14">14 Days</option>
												<option value="15">15 Days</option>
												</select>
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Tour Price:</strong>
												<input type="text" class="form-control" value="<?php echo $tour_price; ?>" placeholder="Tour Price" name="tourPrice" style="background-color:white" required  />
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Start Point:</strong>
												<input type="text" class="form-control" value="<?php echo $start_point; ?>" placeholder="Starting Point" name="startingPoint" style="background-color:white" required  />
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> End Pont:</strong>
												<input type="text" class="form-control" value="<?php echo $end_point; ?>" placeholder="End Point" name="endPoint" style="background-color:white" required  />
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Inclusive:</strong>
												<textarea class="form-control" placeholder="Inclusive" name="inclusive" style="background-color:white" required ><?php echo $inclusive; ?></textarea>
												<!--<input type="text" class="form-control" placeholder="Inclusive" name="inclusive" style="background-color:white" />-->
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Exclusive:</strong>
												<textarea class="form-control" placeholder="Exclusive" name="exclusive" style="background-color:white" required ><?php echo $exclusive; ?></textarea>
												<!--<input type="text" class="form-control" placeholder="Exclusive" name="exclusive" style="background-color:white" />-->
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Cancellation Policy:</strong>
												<textarea class="form-control" placeholder="Cancellation Policy" name="cancellationPolicy" style="background-color:white" required ><?php echo $cancelation_policy; ?></textarea>
												<!--<input type="text" class="form-control" placeholder="Cancellation Policy" name="cancellationPolicy" style="background-color:white" />-->
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Restriction:</strong>
												<textarea class="form-control" placeholder="Restriction" name="restriction" style="background-color:white" required ><?php echo $restrictions; ?></textarea>
												<!--<input type="text" class="form-control" placeholder="Restriction" name="restriction" style="background-color:white" />-->
											</div>
											</div>
											<div class="col-sm-12">
											<div class="form-group">
												<strong> Notes:</strong>
												<textarea class="form-control" placeholder="Notes" name="notes" style="background-color:white" ><?php echo $notes; ?></textarea>
												<!--<input type="text" class="form-control" placeholder="Notes" name="notes" style="background-color:white" />-->
											</div>
											</div>
											
											<div class="col-sm-12">
												<div class="col-sm-3 col-sm-offset-3">
													<?php
												echo '<input type="button" class="btn btn-default form-control" onclick="myFunction(' . $userid. ')" value="Cancel">';
												?>
												</div>
												<div class="col-sm-3">
													<input type="submit" class="form-control btn btn-warning" value="Create Tour"  name="tourNmae" />
												</div>
											</div>
											</form>
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
			
			<?php include('MasterFooter.php'); ?>
			
			<?php
			
			if(isset($_SESSION['notification']))
			{
				echo '<script> alert("' . $_SESSION['notification'] . '"); </script>';
				$_SESSION['notification']="";
				unset($_SESSION['notification']);
			}
			
			?>
		</div>
		<!-- END #wrapper -->
		 
		 <script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
			<script type="text/javascript">
			function initialize() {

			 var options = {
			  types: ['(cities)'],
			  componentRestrictions: {country: "in"}
			 };

			 var input = document.getElementById('tourLocation');
			 var autocomplete = new google.maps.places.Autocomplete(input, options);
			}
			google.maps.event.addDomListener(window, 'load', initialize);
			</script>
			
			<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.wallform.js"></script>
			<script>
				function myFunction(id) 
				{
				window.location.href = "guide_profile.php?id="+id;
				return false;
				}
				
				function mediaManagement(id,id2) 
				{
				window.location.href = "mediaManagement.php?user="+id+"&tour="+id2+"";
				return false;
				}
			</script>
			
			<script>
				document.getElementById("tourType").value = "<?php echo $tour_category_id ?>";
				document.getElementById("tourDuration").value = "<?php echo $tour_duration ?>";
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