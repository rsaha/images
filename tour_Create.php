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
			include_once("signOut.php");
            header('Location:guide_login.php');
			exit;
		}
		else
		{
			
			$_SESSION['photo'] = array();
			$_SESSION['signinCheck']="signin";
			$_SESSION['phase'] = "signin";
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
                $guide_territory = $row22["guide_territory"];
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
		}
	}
	else
	{
		include_once("signOut.php");
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
			<div class="" >
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
						</div>
						 </center>
					
					        <br /><br />
					   <div class="row">
					<div class="col-md-11">
					<a href="guide_login.php" style="color:#5a5a5a;" title="">
					<center><u><span style="font-size:18px;font-weight:bold;"><?php echo strtoupper($username) ?></span></u></center>
					</a> 
					<br /><br />
					<label style="font-size:14px;">Licence Number. :</label><br><br />
					<span style="font-size:18px;font-weight:bold;"><?php echo $licenceNumber ?></span><br />
					<hr>
					<label style="font-size:14px;">Licence Expiry Date :</label><br><br />
					<span style="font-size:18px;font-weight:bold;"><?php echo $licenceValidty ?></span><br />
					<hr>
					<label style="font-size:14px;">Licence Image :</label><br><br />
					<div style="max-height: 180px; max-width: 250px;">
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
									<li class="active"><a href="#createTour" data-toggle="tab">Create Tours</a></li>
									<li><a href="#existingTour" data-toggle="tab">Add Existing Tour</a></li>
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content clearfix ">
									
									<!-- START TAB 1 -->
									<div class="tab-pane active" id="createTour">
										<div class="booking gray clearfix box-shadow1">
											
											<form method="post" action="tour_Create_Code.php">
											<input type="hidden" name="userid" value="<?php echo $userid ?>" />
											<div class="col-sm-4">
											<div class="form-group">
												<strong> Tour Type:</strong><a class="pull-right" tabindex="0" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content="Please select tour type.">
																<i class='fa fa-info-circle' style="color:gray"></i>
															</a>
												<select class="form-control"  tabindex="1" name="tourType" style="background-color:white">
												<?php 
												$sql = mysql_query("SELECT `tour_category_id`, `tour_category_title` FROM `tbl_tour_category` WHERE `status` = 1");
												while ($row = mysql_fetch_array($sql)){
												echo '<option value="' . $row['tour_category_id'] . '">' . $row['tour_category_title'] . '</option>';
												}
												?>
												</select>
											</div>
											</div>
											<div class="col-sm-4">
											<div class="form-group">
												<strong> Location:</strong><a class="pull-right" tabindex="0" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content="Location">
																<i class='fa fa-info-circle' style="color:gray"></i>
															</a>
												<input id="tourLocation" tabindex="2" type="text" class="form-control" placeholder="Tour Location" name="tourLocation" style="background-color:white" autocomplete="on" required />
												
											</div>
											</div>
											<div class="col-sm-4">
											<div class="form-group">
												<strong> Tour Name:</strong><a class="pull-right" tabindex="0" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content="Enter Tour name here">
																<i class='fa fa-info-circle' style="color:gray"></i>
															</a>
												<input type="text" tabindex="3" class="form-control" placeholder="Attractive tour name. ex. 2 days in Agra" name="tourName" style="background-color:white" required />
											</div>
											</div>
											
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Description:</strong><a class="pull-right" tabindex="0" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content="Short description of the tour in 10 sentences">
																<i class='fa fa-info-circle' style="color:gray"></i>
															</a>
												<textarea class="form-control" tabindex="4" placeholder="Short description of the tour in 10 sentences" name="tourDiscription" style="height:115px; background-color:white" ></textarea>
											</div>
											</div>
											<div class="col-sm-4">
											<div class="form-group">
												<strong> Tour Territory:</strong><a class="pull-right" tabindex="0" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content="Enter your name here">
																<i class='fa fa-info-circle' style="color:gray"></i>
															</a>
												<input type="text" tabindex="5" class="form-control" placeholder="Tour Territory" name="tourTerritory" style="background-color:white" required />
											</div>
											</div>
											<div class="col-sm-2">
											<div class="form-group">
												<strong> Duration:</strong><a class="pull-right" tabindex="0" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content="Duration. ex. 2 days">
																<i class='fa fa-info-circle' style="color:gray"></i>
															</a>
												<select tabindex="6" class="form-control" name="tourDuration" style="background-color:white">
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
												<strong> Tour Price:</strong><a class="pull-right" tabindex="0" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content="Price per person or tail price. ex. INR 1500 per person">
																<i class='fa fa-info-circle' style="color:gray"></i>
															</a>
												<input type="text" tabindex="7" class="form-control" placeholder="Price per person or tail price. ex. INR 1500 per person" name="tourPrice" style="background-color:white" required  />
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Pickup Point:</strong><a class="pull-right" tabindex="0" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content="Pickup Point. i.e. Delhi Airport">
																<i class='fa fa-info-circle' style="color:gray"></i>
															</a>
												<input type="text" tabindex="8" class="form-control" placeholder="Pickup Point. i.e. Delhi Airport" name="startingPoint" style="background-color:white" required  />
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> End Pont:</strong><a class="pull-right" tabindex="0" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content="Drop Off. i.e. Delhi Central">
																<i class='fa fa-info-circle' style="color:gray"></i>
															</a>
												<input type="text" tabindex="9" class="form-control" placeholder="Drop Off. i.e. Delhi Central" name="endPoint" style="background-color:white" required  />
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Inclusive:</strong><a class="pull-right" tabindex="0" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content="Tour price includes. ex. Transport , All meals, entree fees">
																<i class='fa fa-info-circle' style="color:gray"></i>
															</a>
												<textarea class="form-control" tabindex="10" placeholder="Tour price includes. ex. Transport , All meals, entree fees" name="inclusive" style="background-color:white" required ></textarea>
												<!--<input type="text" class="form-control" placeholder="Inclusive" name="inclusive" style="background-color:white" />-->
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Exclusive:</strong><a class="pull-right" tabindex="0" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content="Tour prices excludes ex. shopping, drinks">
																<i class='fa fa-info-circle' style="color:gray"></i>
															</a>
												<textarea class="form-control" tabindex="11" placeholder="Tour prices excludes ex. shopping, drinks" name="exclusive" style="background-color:white" ></textarea>
												<!--<input type="text" class="form-control" placeholder="Exclusive" name="exclusive" style="background-color:white" />-->
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Cancellation Policy:</strong><a class="pull-right" tabindex="0" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content="Cancellation Policy. ex. full-refund if cancelled 7 days before tour begins">
																<i class='fa fa-info-circle' style="color:gray"></i>
															</a>
												<textarea class="form-control" tabindex="12" placeholder="Cancellation Policy. ex. full-refund if cancelled 7 days before tour begins" name="cancellationPolicy" style="background-color:white" required></textarea>
												<!--<input type="text" class="form-control" placeholder="Cancellation Policy" name="cancellationPolicy" style="background-color:white" />-->
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Restriction:</strong><a class="pull-right" tabindex="0" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content="Mention Restriction if any.">
																<i class='fa fa-info-circle' style="color:gray"></i>
															</a>
												<textarea class="form-control" tabindex="13" placeholder="Restriction" name="restriction" style="background-color:white" ></textarea>
												<!--<input type="text" class="form-control" placeholder="Restriction" name="restriction" style="background-color:white" />-->
											</div>
											</div>
											<div class="col-sm-12">
											<div class="form-group">
												<strong> Notes:</strong><a class="pull-right" tabindex="0" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content="Any other special notes">
																<i class='fa fa-info-circle' style="color:gray"></i>
															</a>
												<textarea class="form-control" tabindex="14" placeholder="Any other special notes" name="notes" style="background-color:white" ></textarea>
												<!--<input type="text" class="form-control" placeholder="Notes" name="notes" style="background-color:white" />-->
											</div>
											</div>
											
											
											
											<div class="col-sm-12">
												<div class="col-sm-3 col-sm-offset-3">
													<a onclick="backtoProfile(<?php echo $userid; ?>)"><button tabindex="16" class="form-control btn btn-default">Cancel</button></a>
												</div>
												<div class="col-sm-3">
													<input type="submit" tabindex="15" class="form-control btn btn-warning" value="Next"  name="tourNmae" />
												</div>
											</div>
											
											
											</form>
											
										</div>
									</div>

								<!-- START TAB 2 -->
									<div class="tab-pane" id="existingTour">
										<div class="booking gray clearfix box-shadow1">
											<div class="row">

											<?php 
											$sql2 = mysql_query("SELECT `street_address`, `city`, `state`, `country` FROM `tbl_user_profile` WHERE (`user_id` = $userid and `status` = 1)");
											//$roww = mysql_fetch_assoc($sql2)
											$guideCity = mysql_result($sql2, 0, 1);
											
											$sql1 = mysql_query("SELECT * FROM `tbl_tours` WHERE `user_id` = 10000 and `tour_territory` = '$guideTerritory' and `status` = 1");
											
										  //$sql1 = mysql_query("SELECT * FROM `tbl_tours` WHERE ( `user_id` != $userid AND (`tour_id` NOT IN (select `created_added` from `tbl_tours` WHERE `user_id`= $userid and `created_added` != 0)) and `tour_location` = '$guideCity' and `status` = 1 )");
											if(mysql_num_rows($sql1) >= 1)
											{
											while ($row1 = mysql_fetch_array($sql1))
											{
											?>
											
													<div class="col-lg-3 col-md-4 col-sm-6 col-xs-10">
													<?php
													$tour_id = $row1['tour_id'];
													echo '<a id="editButton" style="height:20px" class="btn btn-xs btn-default" data-toggle="tab" onclick="addTour(' . $userid . ',' . $tour_id . ');" >ADD</a>';
														echo '<a style="cursor: pointer;" onclick="detailTour(' . $tour_id . ');" >';
														?>
														<input type="hidden" name="tourid" id="tourid" value=" <?php echo $tour_id; ?> " />
														<div class="ft-item">
														
															<span class="ft-image">
																<?php
																$select4Tpic = mysql_query("SELECT * FROM `tbl_tour_media_pictures` WHERE `tour_id` = $tour_id");
																$count4Tpic = mysql_num_rows($select4Tpic);
																if ($count4Tpic==0)
																{
																	echo '<img alt="featured Scroller" draggable="false"  class="img-responsive" src="img/custom11.jpg"/>';
																}
																else
																{
																	echo '<img alt="featured Scroller" draggable="false"  class="img-responsive" src="showMediaPicture.php?id=' . mysql_result($select4Tpic, 0, 0) . '"/>';
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
											<!-- START .pagination -->
											<ul class="pagination">
												<li><a href="#">&lsaquo;</a></li>
												<li class="active"><a href="#">1</a></li>
												<li><a href="#">2</a></li>
												<li><a href="#">&rsaquo;</a></li>
											</ul>
											<div class="col-sm-12">
												<div class="col-sm-4 col-sm-offset-4">
													<a onclick="backtoProfile(<?php echo $userid; ?>)"><button class="form-control btn btn-default">Cancel</button></a>
												</div>
											</div>
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
			<?php include_once('MasterFooter.php'); ?>
			
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
			<script>
			$(function () {
			  $('[data-toggle="popover"]').popover();
			});
			
				function backtoProfile(id) 
				{
					window.location.href = "guide_profile.php?id="+id;
					return false;
				}
				
				function editProfile(id) 
				{
					window.location.href = "guide_profile_edit.php?id="+id;
					return false;
				}
				
				function addTour(id,id2) 
				{
					window.location.href = "add_Existing_Tour.php?id1="+id+"&id2="+id2+"";
					return false;
				}
				
				function detailTour(id) 
				{
					window.location.href = "tour_detail_sidebar.php?id="+id+"";
					return false;
				}
			</script>

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