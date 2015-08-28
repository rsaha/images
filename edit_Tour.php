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

				$firstName=mysql_result($select1, 0, 3);
				$secondName=mysql_result($select1, 0, 4);
				$username =  $firstName . " " . $secondName;
				$emailID = mysql_result($select1, 0, 5);
				$mobileNumber = mysql_result($select1, 0, 6);
				$gender = mysql_result($select1, 0, 7);
				$birthdaay = mysql_result($select1, 0, 8);
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
				$LicenceImage = mysql_result($select2, 0, 5);
				$licenceNumber = mysql_result($select2, 0, 6);
				$licenceValidty = mysql_result($select2, 0, 7);
				$summery = mysql_result($select2, 0, 8);
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
				$LicenceImage = "";
				$licenceNumber = "";
				$licenceValidty = "";
				$summery = "";
				$experiance = "";
				$intrest = "";
				$landLineNumber = "";
				$paymentCurrency = "";
				$paymentTerm = "";
				$bestTimeToContace = "";
				$communicationMechanism = "";
				$remark = "";
				}
				
				
				$select3 = mysql_query("SELECT * FROM `tbl_tours` WHERE `user_id` = $userid && `tour_id` = $tourID");
				if(mysql_num_rows($select3) > 0 )
				{
				$tour_category_id = mysql_result($select3, 0, 2);
				$tour_title = mysql_result($select3, 0, 3);
				$tour_description = mysql_result($select3, 0, 4);
				$tour_duration = mysql_result($select3, 0, 5);
				$tour_price = mysql_result($select3, 0, 6);
				$start_point = mysql_result($select3, 0, 7);
				$end_point = mysql_result($select3, 0, 8);
				$inclusive = mysql_result($select3, 0, 9);
				$exclusive = mysql_result($select3, 0, 10);
				$cancelation_policy = mysql_result($select3, 0, 11);
				$restrictions = mysql_result($select3, 0, 12);
				$notes = mysql_result($select3, 0, 13);
				}
				else
				{
				$tour_category_id = "";
				$tour_title = "";
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
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
		
		<script src="App.js"></script>
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
							
							$select4pic = mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
							$count4pic = mysql_num_rows($select4pic);
							if ($count4pic==0)
							{
								echo '<img style="width:1400px; height:200px;" class="hover img-responsive" src="img/Default.jpg"/>';
							}
							else
							{
								$picVal = mysql_result($select4pic, 0, 3);
								if($picVal==null)
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
								echo '<img style="max-height:200px; max-width:170px;" class="hover img-responsive" src="showImage.php?id=' . $userid . '"/>';
							}
						}
							
						?>
						</div>
						 </center>
					
					        <br /><br />
					   <div class="row">
					  <ul class="list-unstyled">
							<li><span class="menu-text"> Licence No. : <a ><?php echo $licenceNumber ?></a><br><br></li>
							<li><span class="menu-text"> Licence Expiry Date : <a ><?php echo $licenceValidty ?></a><br><br></li>
							
					    <li><span class="menu-text"> Licence Image : 
						<?php 
							$select4pic = mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
							$count4pic = mysql_num_rows($select4pic);
							if ($count4pic==0)
							{
								echo '<img style="max-height:127px; max-width:200px;" class="hover img-responsive" src="img/PRcard.jpg"/>';
							}
							else
							{
								$licVal = mysql_result($select4pic, 0, 5);
								if($licVal==null)
								{
									echo '<img style="max-height:127px; max-width:200px;" class="hover img-responsive" src="img/PRcard.jpg"/>';
								}
								else
								{
									echo '<img style="max-height:127px; max-width:200px;" class="hover img-responsive" src="showLicence.php?id=' . $userid . '"/>';
								}
							}
							?>
						<br></li>
							
							</ul>
					   </div>
					    
			      </div>
						<!-- START #page -->
						<div id="page" class="col-md-10">
							<div class="user-profile">
								<!-- START TABS -->
								<ul class="nav nav-tabs text-upper" style="background-color:#FFA98E;">
									<li class="active"><a href="" data-toggle="tab">Tours Edit</a></li>
									<!--<li><a href="#createTour" data-toggle="tab">Create Tour</a></li>-->
									<!--<li><a href="#licenceDetail" data-toggle="tab">Licence Detail</a></li>-->
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content clearfix ">
									
									
									<div class="tab-pane active" id="createTour">
										<div class="booking gray clearfix box-shadow1">
											<div class="col-sm-6">
												<h2 class="">Upload your tour media here</h2><br>
												<?php
												echo '<input type="button" style="background-color:#ffa98e; height:100px" class="btn btn-default form-control" onclick="mediaManagement(' . $userid . ',' . $tourID . ')" value="Click Here">';
												?>
											</div>
											<form method="post" action="update_tour.php">
											<input type="hidden" name="userid" value="<?php echo $userid ?>" />
											<input type="hidden" name="tourID" value="<?php echo $tourID ?>" />
											<div class="col-sm-6">
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
												<input type="text" class="form-control" value="<?php echo $tour_duration; ?>" placeholder="Tour Duration" name="tourDuration" style="background-color:white" required  />
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
													<input type="submit" class="form-control btn btn-warning" value="Update Tour"  name="tourNmae" />
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