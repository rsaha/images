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
									<li><a href="#userinfo" data-toggle="tab">Guide Profile</a></li>
									<li class="active"><a href="#tourList" data-toggle="tab">Tours</a></li>
									<li><a href="#inviteGuide" data-toggle="tab">Invite Guides</a></li>
									<!--<li><a href="#createTour" data-toggle="tab">Create Tour</a></li>-->
									<!--<li><a href="#licenceDetail" data-toggle="tab">Licence Detail</a></li>-->
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content clearfix ">
									<!-- START TAB 1 -->
									<div class="tab-pane" id="userinfo">
										<div class="booking gray clearfix box-shadow1">
											<fieldset>
										<div >
										<?php
										echo '<a class="btn btn-default pull-right" style="background-color:#ffa98e" onclick="myFunction(' . $userid. ')"> 
										<i class="fa fa-pencil"></i> Edit Profile 
										</a>'
										?>	
										</div>      
												<h3 class=" mgtp-10 font-semibold"><i class="icon-user mgr-10 profile-icon"></i> ABOUT</h3>
												<div class="row">
												  <div class="col-sm-6">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Name:</label>
													  <div class="col-xs-7 controls"><?php echo $username ?></div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												  <div class="col-sm-6">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Gender:</label>
													  <div class="col-xs-7 controls"><?php echo $gender ?></div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												  
												   <div class="col-sm-6">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Birthday:</label>
													  <div class="col-xs-7 controls"><?php echo $birthdaay ?></div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												   
												  
												</div>
												
												<h3 class=" mgtp-10 font-semibold"><i class="icon-user mgr-10 profile-icon"></i> ADDREDSS</h3>
												<div class="row">
												<div class="col-sm-6">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Street Address:</label>
													  <div class="col-xs-7 controls"><?php echo $streetAddress ?></div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												  <div class="col-sm-6">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Street Address:</label>
													  <div class="col-xs-7 controls"><?php echo $city ?></div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												  <div class="col-sm-6">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">State</label>
													  <div class="col-xs-7 controls"><?php echo $state ?></div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												  <div class="col-sm-6">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Country:</label>
													  <div class="col-xs-7 controls"><?php echo $country ?></div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												</div>
												
												<h3 class=" mgtp-10 font-semibold"><i class="icon-user mgr-10 profile-icon"></i> CONTACT INFORMATION</h3>
												<div class="row">
												<div class="col-sm-6">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Mobile Number:</label>
													  <div class="col-xs-7 controls"><?php echo $mobileNumber ?></div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												  <div class="col-sm-6">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Email:</label>
													  <div class="col-xs-7 controls"><?php echo $emailID ?></div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												  <div class="col-sm-6">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Landline Phone:</label>
													  <div class="col-xs-7 controls"><?php echo $landLineNumber ?></div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												  <div class="col-sm-6">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Communication Mechanism:</label>
													  <div class="col-xs-7 controls"><?php echo $communicationMechanism ?></div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												  
												  <div class="col-sm-6">
													<div class="row mgbt-xs-0">
													  <label class="col-xs-5 control-label">Best time to contact:</label>
													  <div class="col-xs-7 controls"><?php echo $bestTimeToContace ?></div>
													  <!-- col-sm-10 --> 
													</div>
												  </div>
												</div>
												
												<hr class="pd-10">
												<div class="row">
												 <div class="col-sm-12">
													<h3 class=" font-semibold">PAYMENT TERMS</h3>
													<div class="content-list content-menu col-sm-11">
													   <span class="menu-text"><?php echo $paymentTerm ?></span>
													</div>
												  </div>
												  </div>
												  
												<hr class="pd-10">
												<div class="row">
												  <div class="col-sm-6">
													<h3 class=" font-semibold"><i class="fa fa-file-text-o mgr-10 profile-icon"></i> EXPERIENCE</h3>
													<div class="content-list content-menu col-sm-11">
													   <span class="menu-text"><?php echo $experiance ?></span>
													</div>
												  </div>
												  <div class="col-sm-6">
													<h3 class=" font-semibold"><i class="fa fa-file-text-o mgr-10 profile-icon"></i> NOTE</h3>
													<div class="content-list content-menu col-sm-11">
													   <span class="menu-text"><?php echo $remark ?></span>
													</div>
												  </div>
												</div>
												
												</fieldset>
											</div>
											</div>
									<!-- START TAB 2 -->
									<div class="tab-pane active" id="tourList">
										<div class="booking gray clearfix box-shadow1">
											<div class="row">

											<?php 
											$sql1 = mysql_query("SELECT `tour_id`, `tour_category_id`, `tour_title`, `tour_description`, `tour_duration`, `tour_price`, `start_point`, `end_point`, `inclusive`, `exclusive`, `cancelation_policy`, `restrictions`, `notes`, `status`, `datecreated` FROM `tbl_tours` WHERE (`user_id` = $userid and `status` = 1)");
											if(mysql_num_rows($sql1) < 1)
											{
											?>
												<div class="col-md-3">
													<div class="ft-item">
														<span class="ft-image">
															<img alt="featured Scroller" src="img/custom1.jpg" draggable="false">
														</span>
														<div class="ft-data2">
														<span style="color:white" class="ft-title text-upper">Tour Title</span>
															<span class="ft-offer text-upper">Price (Rs)</span>
														</div>
														<div class="ft-foot">
															<span style="font-size:12px" class="ft-date text-upper alignleft">Tour Duration</span>
															<span style="font-size:11px" class="ft-temp alignright">Start - End</span>
														</div>
													</div>
												</div>
											<?php
											}
											else
											{
											while ($row1 = mysql_fetch_array($sql1))
											{
											?>
											
													<div class="col-md-3">
													<?php
													echo '<a id="editButton" style="height:20px" class="btn btn-xs btn-default" data-toggle="tab" onclick="editTour(' . $userid . ',' . $row1['tour_id'] . ');" >EDIT</a>';
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
																	echo '<img alt="featured Scroller" draggable="false" style="width:207px; height:105px;" src="img/custom1.jpg"/>';
																}
																else
																{
																	echo '<img alt="featured Scroller" draggable="false" style="width:207px; height:105px;" src="showMediaPicture.php?id=' . mysql_result($select4Tpic, 0, 0) . '"/>';
																}
																?>
																
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

						<!-- ############################################################################ -->
						<a style="cursor: pointer;" onclick="createTour(<?php echo $userid; ?>);" >
						<div class="col-md-3">
							<div class="ft-item">
								<span class="ft-image">
									<img alt="featured Scroller" src="img/newTour.jpg" draggable="false">
								</span>
								<div class="ft-data2">
								<span style="color:white" class="ft-title text-upper">Tour Title</span>
									<span class="ft-offer text-upper">Price (Rs)</span>
								</div>
								<div class="ft-foot">
									<span style="font-size:12px" class="ft-date text-upper alignleft">Tour Duration</span>
									<span style="font-size:11px" class="ft-temp alignright">Start - End</span>
								</div>
							</div>
						</div>
						</a>
						<!-- ############################################################################ -->
						
						
						<div class="clearfix"></div>
					</div>
					<!-- START .pagination -->
					<ul class="pagination">
						<li><a href="#">&lsaquo;</a></li>
						<li class="active"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">&rsaquo;</a></li>
					</ul>
											
										</div>
									</div>
									<!-- START TAB 3 -->
									<div class="tab-pane" id="inviteGuide">
										<div class="booking gray clearfix box-shadow1">
									<center><h3>Invite Guide Friends and get some exciting referral rewards when your friend register with us...</h3></center><br />
										<form action="guide_step4.php" method="post" ng-app="myApp"  ng-controller="validateCtrl5" name="myForm"  novalidate>
										<input type="hidden" name="userid" value="<?php echo $userid ?>" />
										
											<div class="col-md-12">
											
											<ul  class="formFields list-unstyled">
											<li class="row">
											<div class="col-md-6">
															<label style="font-size:13px; font-weight:bold">Name of your friend</label>
															<input type="text" class="form-control" name="nameFriend1" value="" ng-model="nameFriend1" style="background-color:#f7f7f7;" ng-pattern="/^[a-z A-Z]+$/" />
															 <span style="color:red" ng-show="myForm.nameFriend1.$dirty && myForm.nameFriend1.$invalid">
											
											   <span ng-show="myForm.nameFriend1.$error.pattern">*Invalid Name ...</span>
											  </span>
														</div>
														</li>
														<li class="row">
														<div class="col-md-6">
															<label style="font-size:13px; font-weight:bold">Email Id of your friend</label>
															<input type="email" class="form-control" name="emailFriend1" value="" ng-model="emailFriend1" style="background-color:#f7f7f7;" ng-pattern="/^[a-zA-Z0-9._-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,5}(\.[a-zA-Z]{2,5}){0,1}$/"/>
														 <span style="color:red" ng-show="myForm.emailFriend1.$dirty && myForm.emailFriend1.$invalid">
											  
											   <span ng-show="myForm.emailFriend1.$error.pattern">*Invalid Email ID ...</span>
											  </span>
														</div>
														</li>
														<li class="row">
														<div class="col-md-6">
															<label style="font-size:13px; font-weight:bold">Mobile Number of your friend</label>
															<input type="tel" class="form-control" name="mobileFeiend1" ng-model="mobileFeiend1" style="background-color:#f7f7f7;" maxlength="10" ng-pattern="/^([7-9]{1})(\d{9})$/" value=""/>
														 <span style="color:red" ng-show="myForm.mobileFeiend1.$dirty && myForm.mobileFeiend1.$invalid">
											
											   <span ng-show="myForm.mobileFeiend1.$error.pattern">*Invalid Mobile Number ...</span>
											  </span>
														</div>
														
													</li>
													
													<li class="row">
													<div class="col-md-3 col-md-offset-3" >
														<button type="submit" class="btn btn-warning form-control">Send Invitation</button>
													</div>
													</li>
													</ul>
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
				
			}
			$_SESSION['notification']="";
				unset($_SESSION['notification']);
			
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