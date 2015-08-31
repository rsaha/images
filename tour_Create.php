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
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Tour Type:</strong><a class="pull-right" tabindex="0" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content="Please select tour type.">
																<i class='fa fa-info-circle' style="color:gray"></i>
															</a>
												<select class="form-control" name="tourType" style="background-color:white">
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
												<strong> Tour Name:</strong><a class="pull-right" tabindex="0" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content="Enter your name here">
																<i class='fa fa-info-circle' style="color:gray"></i>
															</a>
												<input type="text" class="form-control" placeholder="Attractive tour name. ex. 2 days in Agra" name="tourName" style="background-color:white" required />
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Description:</strong><a class="pull-right" tabindex="0" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content="Short description of the tour in 10 sentences">
																<i class='fa fa-info-circle' style="color:gray"></i>
															</a>
												<textarea class="form-control" placeholder="Short description of the tour in 10 sentences" name="tourDiscription" style="height:115px; background-color:white" ></textarea>
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Duration:</strong><a class="pull-right" tabindex="0" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content="Duration. ex. 2 days">
																<i class='fa fa-info-circle' style="color:gray"></i>
															</a>
												<input type="text" class="form-control" placeholder="Duration. ex. 2 days" name="tourDuration" style="background-color:white" required  />
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Tour Price:</strong><a class="pull-right" tabindex="0" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content="Price per person or tail price. ex. INR 1500 per person">
																<i class='fa fa-info-circle' style="color:gray"></i>
															</a>
												<input type="text" class="form-control" placeholder="Price per person or tail price. ex. INR 1500 per person" name="tourPrice" style="background-color:white" required  />
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Pickup Point:</strong><a class="pull-right" tabindex="0" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content="Pickup Point. i.e. Delhi Airport">
																<i class='fa fa-info-circle' style="color:gray"></i>
															</a>
												<input type="text" class="form-control" placeholder="Pickup Point. i.e. Delhi Airport" name="startingPoint" style="background-color:white" required  />
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> End Pont:</strong><a class="pull-right" tabindex="0" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content="Drop Off. i.e. Delhi Central">
																<i class='fa fa-info-circle' style="color:gray"></i>
															</a>
												<input type="text" class="form-control" placeholder="Drop Off. i.e. Delhi Central" name="endPoint" style="background-color:white" required  />
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Inclusive:</strong><a class="pull-right" tabindex="0" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content="Tour price includes. ex. Transport , All meals, entree fees">
																<i class='fa fa-info-circle' style="color:gray"></i>
															</a>
												<textarea class="form-control" placeholder="Tour price includes. ex. Transport , All meals, entree fees" name="inclusive" style="background-color:white" required ></textarea>
												<!--<input type="text" class="form-control" placeholder="Inclusive" name="inclusive" style="background-color:white" />-->
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Exclusive:</strong><a class="pull-right" tabindex="0" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content="Tour prices excludes ex. shopping, drinks">
																<i class='fa fa-info-circle' style="color:gray"></i>
															</a>
												<textarea class="form-control" placeholder="Tour prices excludes ex. shopping, drinks" name="exclusive" style="background-color:white" ></textarea>
												<!--<input type="text" class="form-control" placeholder="Exclusive" name="exclusive" style="background-color:white" />-->
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Cancellation Policy:</strong><a class="pull-right" tabindex="0" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content="Cancellation Policy. ex. full-refund if cancelled 7 days before tour begins">
																<i class='fa fa-info-circle' style="color:gray"></i>
															</a>
												<textarea class="form-control" placeholder="Cancellation Policy. ex. full-refund if cancelled 7 days before tour begins" name="cancellationPolicy" style="background-color:white" required></textarea>
												<!--<input type="text" class="form-control" placeholder="Cancellation Policy" name="cancellationPolicy" style="background-color:white" />-->
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Restriction:</strong><a class="pull-right" tabindex="0" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content="Mention Restriction if any.">
																<i class='fa fa-info-circle' style="color:gray"></i>
															</a>
												<textarea class="form-control" placeholder="Restriction" name="restriction" style="background-color:white" ></textarea>
												<!--<input type="text" class="form-control" placeholder="Restriction" name="restriction" style="background-color:white" />-->
											</div>
											</div>
											<div class="col-sm-12">
											<div class="form-group">
												<strong> Notes:</strong><a class="pull-right" tabindex="0" data-toggle="popover"  data-placement="bottom" data-trigger="focus" data-content="Any other special notes">
																<i class='fa fa-info-circle' style="color:gray"></i>
															</a>
												<textarea class="form-control" placeholder="Any other special notes" name="notes" style="background-color:white" ></textarea>
												<!--<input type="text" class="form-control" placeholder="Notes" name="notes" style="background-color:white" />-->
											</div>
											</div>
											
											
											
											<div class="col-sm-12">
												<div class="col-sm-3 col-sm-offset-3">
													<a onclick="myFunction(<?php echo $userid; ?>)"><button class="form-control btn btn-default">Cancel</button></a>
												</div>
												<div class="col-sm-3">
													<input type="submit" class="form-control btn btn-warning" value="Create Tour"  name="tourNmae" />
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
											$sql1 = mysql_query("SELECT `tour_id`, `tour_category_id`, `tour_title`, `tour_description`, `tour_duration`, `tour_price`, `start_point`, `end_point`,
											`inclusive`, `exclusive`, `cancelation_policy`, `restrictions`, `notes`, `status`, `datecreated` 
											FROM `tbl_tours` WHERE (`user_id` != $userid and `status` = 1)");
											if(mysql_num_rows($sql1) >= 1)
											{
											while ($row1 = mysql_fetch_array($sql1))
											{
											?>
											
													<div class="col-md-3">
													<?php
													echo '<a id="editButton" style="height:20px" class="btn btn-xs btn-default" data-toggle="tab" onclick="addTour(' . $userid . ',' . $row1['tour_id'] . ');" >ADD</a>';
														echo '<a style="cursor: pointer;" onclick="detailTour(' . $row1['tour_id'] . ');" >';
														?>
														<input type="hidden" name="tourid" id="tourid" value=" <?php echo $row1['tour_id'] ?> " />
														<div class="ft-item">
														
															<span class="ft-image">
																<img alt="featured Scroller" src="img/custom1.jpg" draggable="false">
															</span>
															<div class="ft-data2">
																<span style="color:white" class="ft-title text-upper"><?php echo $row1['tour_title'] ?></span>
																<span class="ft-offer text-upper"><?php echo $row1['tour_price'] ?></span>
															</div>
															<div class="ft-foot">
																<span class="ft-date text-upper alignleft"><?php echo $row1['tour_duration'] ?></span>
																<span class="ft-temp alignright"><?php echo $row1['start_point'] . " - " . $row1['end_point'] ?></span>
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
													<a onclick="myFunction(<?php echo $userid; ?>)"><button class="form-control btn btn-default">Cancel</button></a>
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
			
 
			$(function () {
			  $('[data-toggle="tooltip"]').tooltip();
			});
			
			$(function () {
			  $('[data-toggle="popover"]').popover();
			});
			
			$("a.my-tool-tip").tooltip();
			
				function myFunction(id) 
				{
					window.location.href = "guide_profile.php?id="+id;
					return false;
				}
				
				function addTour(id,id2) 
				{
					alert("hi");
					//window.location.href = "edit_Tour.php?id1="+id+"&id2="+id2+"";
					return false;
				}
				
				function detailTour(id) 
				{
					window.location.href = "tour_detail_sidebar.php?id="+id+"";
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