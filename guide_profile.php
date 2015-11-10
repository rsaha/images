<?php
	session_start();
if($_SESSION['phase']=="reg")
{
$_SESSION['notification']="Congratulation! Welcome to Guided Gateway, you are now member of #1 online marketplace for tour guides.";
}
	if(isset($_SESSION['userId']))
	{
		if(isset($_GET['id']))
		{
		$userid = $_GET['id'];
		}
		if($_SESSION['userId']!=$userid)
		{
			include_once("signOut.php");
            header('Location:login.php');
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
				}
				else
				{
				$nickName = "";
				$licenceNumber = "";
				$licenceValidty = "";
				$guideTerritory = "";
				$summery = "";
                $experianceInYear = "";
				$otherExperiance = "";
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
        header('Location:login.php');
		exit;
	}
?>
<html lang="en" dir="ltr">

	<!-- START head -->
	<head>
		<!-- Site meta charset -->
		<meta charset="UTF-8">
		
		<!-- title -->
		<title>Profile | Guided Gateway</title>
		
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
		
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="bs3/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="bs3/css/bootstrap.css" media="all" />

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
            
        div.short-text
        {
            white-space:nowrap; 
            width:10em; 
            overflow:hidden; 
            text-overflow:ellipsis;
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
        
        <div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                 <h4 class="modal-title" id="memberModalLabel">Hurry ! Congratulations.</h4>

            </div>
            <div class="modal-body">
                <p>Welcome to Guided Gateway.
                    <BR>Thanks to be part of our family,</p>
                <p>Have a wonderfull growth in our network.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
        
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
					<a href="login.php" style="color:#5a5a5a;" title=""><center><u><span style="font-size:18px;font-weight:bold;"><?php echo strtoupper($username) ?></span></u></center></a>
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
									<li class="active"><a href="#userinfo" data-toggle="tab">My Profile</a></li>
									<li><a href="#tourList" data-toggle="tab">Tours</a></li>
									<li><a href="#inviteGuide" data-toggle="tab">Invite Guides</a></li>
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
										echo '<a class="btn btn-default pull-right" style="background-color:#ffa98e" onclick="editProfile(' . $userid. ')"> 
										<i class="fa fa-pencil"></i> Edit Profile 
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
													  <h3 class=" font-semibold">TERRITORY</h3>
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
													   <span class="menu-text">
													   <?php 
													   if($experianceInYear!= NULL || $experianceInYear!= "" || $experianceInYear != 0)
													   {
														   $exper = $experianceInYear . " Year Experiace in Guiding.<br>"; 
													   } 
													   else 
													   { 
															$exper = ""; 
													   } 
														echo $exper . "" . $otherExperiance 
													   ?>
													   </span>
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
									<!-- START TAB 2 -->
									<div class="tab-pane" id="tourList">
										<div class="booking gray clearfix box-shadow1">
											<div class="row">

											<?php 
											$sql1 = mysql_query("SELECT `tour_id`, `tour_category_id`, `tour_title`, `tour_location`, `tour_description`, `tour_duration`, `tour_price`, `start_point`, `end_point`, `inclusive`, `exclusive`, `cancelation_policy`, `restrictions`, `notes`, `status`, `datecreated`,`created_added` FROM `tbl_tours` WHERE (`user_id` = $userid and `status` != 0)");
											if(mysql_num_rows($sql1) < 1)
											{
											?>
												<div class="col-lg-3 col-md-4 col-sm-4 col-xs-10">
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
												</div>
											<?php
											}
											else
											{
											while ($row1 = mysql_fetch_array($sql1))
											{
											?>
													<div class="col-lg-3 col-md-4 col-sm-4 col-xs-10">
													<?php
													echo '<a id="editButton" style="height:20px" class="btn btn-xs btn-default" data-toggle="tab" onclick="editTour(' . $userid . ',' . $row1['tour_id'] . ');" >EDIT</a>';
														echo '<a style="cursor: pointer;" onclick="detailTour(' . $row1['tour_id'] . ');" >';
														$tour_id = $row1['tour_id'];
                                                        $created_added = $row['created_added'];
														?>
														<input type="hidden" name="tourid" id="tourid" value=" <?php echo $row1['tour_id'] ?> " />
														<div class="ft-item">
														
															<span class="ft-image">
																<?php
																$select4Tpic = mysql_query("SELECT * FROM `tbl_tour_media_pictures` WHERE `tour_id` = $tour_id or `tour_id` = $created_added");
																$count4Tpic = mysql_num_rows($select4Tpic);
																if ($count4Tpic==0)
																{
																	echo '<img alt="featured Scroller" class="img-responsive" draggable="false" src="img/custom11.jpg"/>';
																}
																else
																{
																	echo '<img alt="featured Scroller" class="img-responsive" draggable="false" src="showMediaPicture.php?id=' . mysql_result($select4Tpic, 0, 0) . '"/>';
																}
																?>
																
															</span>
															<div class="ft-data2">
																<span style="color:white" class="ft-title text-upper"><div class="short-text"" title="<?php echo $row1['tour_title'] ?>"><?php echo $row1['tour_title'] ?></div></span>
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

						<!-- ############################################################################ -->
						<a style="cursor: pointer;" onclick="createTour(<?php echo $userid; ?>);" >
						<div class="col-lg-3 col-md-4 col-sm-4 col-xs-10">
							<div class="ft-item">
								<span class="ft-image">
									<img alt="featured Scroller" class="img-responsive" src="img/newTour.jpg" draggable="false">
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
									<center><h3>Invite Your Friends and get some exciting referral rewards when your friend register with us...</h3></center><br />
										<form action="guide_step4.php" method="post" ng-app="myApp"  ng-controller="validateCtrl5" name="myForm"  novalidate>
										<input type="hidden" name="userid" value="<?php echo $userid ?>" />
										
											<div class="col-md-12">
											
											<ul  class="formFields list-unstyled">
											<li class="row">
											<div class="col-md-6">
												<label style="font-size:13px; font-weight:bold">Name of your friend</label>
												<input type="text" class="form-control" id="nameFriend1" name="nameFriend1" value="" ng-model="nameFriend1" style="background-color:#f7f7f7;" ng-pattern="/^[a-z A-Z]+$/" required />
												 <span style="color:red" ng-show="myForm.nameFriend1.$dirty && myForm.nameFriend1.$invalid">
												<span ng-show="myForm.nameFriend1.$error.required">*Friend's Name is required.</span>
												   <span ng-show="myForm.nameFriend1.$error.pattern">*Invalid Name ...</span>
												  </span>
											</div>
											</li>
											<li class="row">
											<div class="col-md-6">
												<label style="font-size:13px; font-weight:bold">Email Id of your friend</label>
												<input type="email" class="form-control" id="emailFriend1" name="emailFriend1" value="" ng-model="emailFriend1" style="background-color:#f7f7f7;" ng-pattern="/^[a-zA-Z0-9._-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,5}(\.[a-zA-Z]{2,5}){0,1}$/" required />
											 <span style="color:red" ng-show="myForm.emailFriend1.$dirty && myForm.emailFriend1.$invalid">
											  <span ng-show="myForm.emailFriend1.$error.required">*Friend's Email ID is required.</span>
											   <span ng-show="myForm.emailFriend1.$error.pattern">*Invalid Email ID ...</span>
											  </span>
											</div>
											</li>
											<li class="row">
											<div class="col-md-6">
												<label style="font-size:13px; font-weight:bold">Mobile Number of your friend</label>
												<input type="tel" class="form-control" id="mobileFeiend1" name="mobileFeiend1" ng-model="mobileFeiend1" style="background-color:#f7f7f7;" maxlength="10" ng-pattern="/^([7-9]{1})(\d{9})$/" value="" />
											 <span style="color:red" ng-show="myForm.mobileFeiend1.$dirty && myForm.mobileFeiend1.$invalid">
												<span ng-show="myForm.mobileFeiend1.$error.pattern">*Invalid Mobile Number ...</span>
											  </span>
														</div>
														
													</li>
													<li class="row">
													<div class="col-md-3 col-md-offset-3" >
														<button type="submit" class="btn btn-warning form-control"  ng-disabled="myForm.nameFriend1.$dirty && myForm.nameFriend1.$invalid || myForm.emailFriend1.$dirty && myForm.emailFriend1.$invalid ">Send Invitation</button>
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
			
			<?php include_once('MasterFooter.php'); ?>
			
             <?php

            if(isset($_SESSION['notification']))
                {
                //echo '<script> alert("' . $_SESSION['notification'] . '"); </script>';
                ?>
            <script>
                    $(document).ready(function () {
                        $('#memberModal').modal('show');
                    });
                    </script>
            <?php
                    $_SESSION['notification']="";
                    unset($_SESSION['notification']);

                }
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
					window.location.href = "tour_detail_sidebar_for_guide.php?id="+id+"";
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