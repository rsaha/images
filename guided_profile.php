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
            session_destory();
			header('Location:guide_login.php');
			exit;
		}
		else
		{
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
        session_destroy();
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
		
		</style>
	</head>
	<!-- END head -->

	<!-- START body -->
	<body>
		<!-- START #wrapper -->
		<div id="wrapper">
			
			<?php include('MasterHeaderAfterLogin.php'); ?>
			
			<form action="guide_Step2.php" method="post">
			<!-- START #page-header -->
			<div class="" >
					<img src="img/Default.jpg" class="img-responsive" /><br>
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
							<li><span class="menu-text"> Lic. No. : <a ><?php echo $licenceNumber ?></a><br><br></li>
							<li><span class="menu-text"> Valid upto : <a ><?php echo $licenceValidty ?></a><br><br></li>
							
					    <li><span class="menu-text"> Licence Image : 
						<img src="img/PRcard.jpg" class="img-responsive" style="max-height:127px; max-width:200px;" />
						<br></li>
							<li><span class="menu-text"> Communication Mechanism : <a ><?php echo $communicationMechanism ?></a><br><br></li>
							<li><span class="menu-text"> Best time to contact : <a ><?php echo $bestTimeToContace ?></a><br><br></li>
							<li><span class="menu-text"> Payment Corrency : <a ><?php echo $paymentCurrency ?></a><br><br></li>
							<li><span class="menu-text"> Payment Terms : <a ><?php echo $paymentTerm ?></a><br></li>
							</ul>
						   <?php/*  echo $username */ ?>
						   <?php/*  echo $emailID */ ?>
					   </div>
					    
			      </div>
						<!-- START #page -->
						<div id="page" class="col-md-10">
							<div class="user-profile">
								<!-- START TABS -->
								<ul class="nav nav-tabs text-upper" style="background-color:#FFA98E;">
									<li class="active"><a href="#userinfo" data-toggle="tab">Guide Profile</a></li>
									<li><a href="#tourList" data-toggle="tab">Tours</a></li>
									<li><a href="#createTour" data-toggle="tab">Create Tour</a></li>
									<!--<li><a href="#licenceDetail" data-toggle="tab">Licence Detail</a></li>-->
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content clearfix ">
									<!-- START TAB 1 -->
									<div class="tab-pane active " id="userinfo">
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
													  <label class="col-xs-5 control-label">Birthday:</label>
													  <div class="col-xs-7 controls"><?php echo $birthdaay ?></div>
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
												<hr class="pd-10">
												<div class="row">
												  <div class="col-sm-6">
													<h3 class=" font-semibold"><i class="fa fa-file-text-o mgr-10 profile-icon"></i> EXPERIENCE</h3>
													<div class="content-list content-menu col-sm-11">
													   <span class="menu-text"><?php echo $experiance ?></span>
													</div>
												  </div>
												  <div class="col-sm-6">
													<h3 class=" font-semibold"><i class="fa fa-trophy mgr-10 profile-icon"></i> INTREST</h3>
													<div class="content-list content-menu  col-sm-11">
														<span class="menu-text"><?php echo $intrest ?></span>
													</div>
												  </div>
												</div>
												<!-- row -->
												<hr class="pd-10">
												<div class="row">
												  <div class="col-sm-6">
													<h3 class=" font-semibold"><i class="fa fa-globe mgr-10 profile-icon"></i> REMARK</h3>
													<div class=" col-sm-11">
													  <div class="content-list">
														<div style="overflow: hidden;" class="mCustomScrollbar _mCS_6" data-rel="scroll"><div class="mCustomScrollBox mCS-light" id="mCSB_6" style="position: relative; height: 100%; overflow: hidden; max-width: 100%; max-height: 400px;"><div class="mCSB_container" style="position: relative; top: 0px;">
														  <span class="menu-icon vd_yellow"><?php echo $remark ?></span>
														</div><div class="mCSB_scrollTools" style="position: absolute; display: block; opacity: 0;"><div class="mCSB_draggerContainer"><div class="mCSB_dragger" style="position: absolute; top: 0px; height: 352px;" oncontextmenu="return false;"><div class="mCSB_dragger_bar" style="position: relative; line-height: 352px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div>
													  </div>
													</div>
												  </div>
												 <div class="col-sm-6">
													<h3 class=" font-semibold"><i class="fa fa-flask mgr-10 profile-icon"></i> SUMMARY</h3>
													<div class="col-sm-11">
													 <div class="content-list">
														<div style="overflow: hidden;" class="mCustomScrollbar _mCS_6" data-rel="scroll"><div class="mCustomScrollBox mCS-light" id="mCSB_6" style="position: relative; height: 100%; overflow: hidden; max-width: 100%; max-height: 400px;"><div class="mCSB_container" style="position: relative; top: 0px;">
														  <span class="menu-icon vd_yellow"><?php echo $summery ?></span>
														</div><div class="mCSB_scrollTools" style="position: absolute; display: block; opacity: 0;"><div class="mCSB_draggerContainer"><div class="mCSB_dragger" style="position: absolute; top: 0px; height: 352px;" oncontextmenu="return false;"><div class="mCSB_dragger_bar" style="position: relative; line-height: 352px;"></div></div><div class="mCSB_draggerRail"></div></div></div></div></div>
													  </div>				
												  </div>
												  </div>
												</div>
												<!-- row --> 
												</fieldset>
											</div>
											</div>
											<!-- START TAB 2 -->
									<div class="tab-pane " id="tourList">
										<div class="booking gray clearfix box-shadow1">
											<div class="row">
						<div class="col-md-3">
							<div class="ft-item">
								<span class="ft-image">
									<img alt="featured Scroller" src="img/custom1.jpg" draggable="false">
								</span>
								<div class="ft-data2">
									<a href="#" class="ft-hotel text-upper">Lodging</a>
									<a href="#" class="ft-plane text-upper">History</a>
									<a href="#" class="ft-tea text-upper">Custom</a>
								</div>
								<div class="ft-foot">
									<h4 class="ft-title text-upper"><a href="#">Kolkata, WB</a></h4>
									<span class="ft-offer text-upper">Starting From INR 2500</span>
								</div>
								<div class="ft-foot-ex">
									<span class="ft-date text-upper alignleft">**** 4020 reviews</span>
									<span class="ft-temp alignright">Female</span>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="ft-item">
								<span class="ft-image">
									<img alt="featured Scroller" src="img/custom2.jpg" draggable="false">
								</span>
								<div class="ft-data2">
									<a href="#" class="ft-hotel text-upper">Lodging</a>
									<a href="#" class="ft-plane text-upper">History</a>
									<a href="#" class="ft-tea text-upper">Custom</a>
								</div>
								<div class="ft-foot">
									<h4 class="ft-title text-upper"><a href="#">Konark, OR</a></h4>
									<span class="ft-offer text-upper">Starting From 220 $</span>
								</div>
								<div class="ft-foot-ex">
									<span class="ft-date text-upper alignleft">**** 4020 reviews</span>
									<span class="ft-temp alignright">Female</span>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							
							<div class="ft-item">
								<span class="ft-image">
									<img alt="featured Scroller" src="img/custom4.jpg" draggable="false">
								</span>
								<div class="ft-data2">
									<a href="#" class="ft-hotel text-upper">Lodging</a>
									<a href="#" class="ft-plane text-upper">History</a>
									<a href="#" class="ft-tea text-upper">Custom</a>
								</div>
								<div class="ft-foot">
									<h4 class="ft-title text-upper"><a href="#">Konark, OR</a></h4>
									<span class="ft-offer text-upper">Starting From 220 $</span>
								</div>
								<div class="ft-foot-ex">
									<span class="ft-date text-upper alignleft">**** 4020 reviews</span>
									<span class="ft-temp alignright">Female</span>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="ft-item">
								<span class="ft-image">
									<img alt="featured Scroller" src="img/custom3.jpg" draggable="false">
								</span>
								<div class="ft-data2">
									<a href="#" class="ft-hotel text-upper">Lodging</a>
									<a href="#" class="ft-plane text-upper">History</a>
									<a href="#" class="ft-tea text-upper">Custom</a>
								</div>
								<div class="ft-foot">
									<h4 class="ft-title text-upper"><a href="#">Konark, OR</a></h4>
									<span class="ft-offer text-upper">Starting From 220 $</span>
								</div>
								<div class="ft-foot-ex">
									<span class="ft-date text-upper alignleft">**** 4020 reviews</span>
									<span class="ft-temp alignright">Female</span>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="ft-item">
								<span class="ft-image">
									<img alt="featured Scroller" src="img/custom5.jpg" draggable="false">
								</span>
								<div class="ft-data2">
									<a href="#" class="ft-hotel text-upper">Lodging</a>
									<a href="#" class="ft-plane text-upper">History</a>
									<a href="#" class="ft-tea text-upper">Custom</a>
								</div>
								<div class="ft-foot">
									<h4 class="ft-title text-upper"><a href="#">Konark, OR</a></h4>
									<span class="ft-offer text-upper">Starting From 220 $</span>
								</div>
								<div class="ft-foot-ex">
									<span class="ft-date text-upper alignleft">**** 4020 reviews</span>
									<span class="ft-temp alignright">Female</span>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="ft-item">
								<span class="ft-image">
									<img alt="featured Scroller" src="img/custom6.jpg" draggable="false">
								</span>
								<div class="ft-data2">
									<a href="#" class="ft-hotel text-upper">Lodging</a>
									<a href="#" class="ft-plane text-upper">History</a>
									<a href="#" class="ft-tea text-upper">Custom</a>
								</div>
								<div class="ft-foot">
									<h4 class="ft-title text-upper"><a href="#">Kolkata, WB</a></h4>
									<span class="ft-offer text-upper">Starting From 250 $</span>
								</div>
								<div class="ft-foot-ex">
									<span class="ft-date text-upper alignleft">**** 4020 reviews</span>
									<span class="ft-temp alignright">Female</span>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="ft-item">
								<span class="ft-image">
									<img alt="featured Scroller" src="img/custom7.jpg" draggable="false">
								</span>
								<div class="ft-data2">
									<a href="#" class="ft-hotel text-upper">Lodging</a>
									<a href="#" class="ft-plane text-upper">History</a>
									<a href="#" class="ft-tea text-upper">Custom</a>
								</div>
								<div class="ft-foot">
									<h4 class="ft-title text-upper"><a href="#">Kolkata, WB</a></h4>
									<span class="ft-offer text-upper">Starting From 250 $</span>
								</div>
								<div class="ft-foot-ex">
									<span class="ft-date text-upper alignleft">**** 4020 reviews</span>
									<span class="ft-temp alignright">Female</span>
								</div>
							</div>
						</div>
						<div class="col-md-3">
							<div class="ft-item">
								<span class="ft-image">
									<img alt="featured Scroller" src="img/custom8.jpg" draggable="false">
								</span>
								<div class="ft-data2">
									<a href="#" class="ft-hotel text-upper">Lodging</a>
									<a href="#" class="ft-plane text-upper">History</a>
									<a href="#" class="ft-tea text-upper">Custom</a>
								</div>
								<div class="ft-foot">
									<h4 class="ft-title text-upper"><a href="#">Kolkata, WB</a></h4>
									<span class="ft-offer text-upper">Starting From 250 $</span>
								</div>
								<div class="ft-foot-ex">
									<span class="ft-date text-upper alignleft">**** 4020 reviews</span>
									<span class="ft-temp alignright">Female</span>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>
					<!-- START .pagination -->
					<ul class="pagination">
						<li><a href="#">&lsaquo;</a></li>
						<li class="active"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">4</a></li>
						<li><a href="#">5</a></li>
						<li><a href="#">6</a></li>
						<li><a href="#">7</a></li>
						<li><a href="#">&rsaquo;</a></li>
					</ul>
											
										</div>
									</div>
												<!-- START TAB 3 -->
									<div class="tab-pane" id="createTour">
										<div class="booking gray clearfix box-shadow1">
											<div class="col-sm-6">
												<h2 class="">Set a picture for your tour</h2><br>
												<div class="ft-item">
													<span class="ft-image">
														<img src="img/ft-img-1.jpg" alt="featured Scroller" />
													</span>
													<div class="ft-data">
														<a class="ft-hotel text-upper" href="#">Hotel</a>
														<a class="ft-plane text-upper" href="#">Air Ticket</a>
														<a class="ft-tea text-upper" href="#">Break Fast</a>
													</div>
													<div class="ft-foot">
														<h4 class="ft-title text-upper"><a href="#">Colosseum</a></h4>
														<span class="ft-offer text-upper">Starting From 250 $</span>
													</div>
												</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Tour Name:</strong>
												<input type="text" class="form-control" placeholder="tour name" name="tourNmae" style="background-color:white" />
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Description:</strong>
												<input type="text" class="form-control" placeholder="tour name" name="tourNmae" style="background-color:white" />
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Duration:</strong>
												<input type="text" class="form-control" placeholder="tour name" name="tourNmae" style="background-color:white" />
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Tour Price:</strong>
												<input type="text" class="form-control" placeholder="tour name" name="tourNmae" style="background-color:white" />
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Start Point:</strong>
												<input type="text" class="form-control" placeholder="tour name" name="tourNmae" style="background-color:white" />
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> End Pont:</strong>
												<input type="text" class="form-control" placeholder="tour name" name="tourNmae" style="background-color:white" />
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Inclusive:</strong>
												<input type="text" class="form-control" placeholder="tour name" name="tourNmae" style="background-color:white" />
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Exclusive:</strong>
												<input type="text" class="form-control" placeholder="tour name" name="tourNmae" style="background-color:white" />
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Cancelation Policy:</strong>
												<input type="text" class="form-control" placeholder="tour name" name="tourNmae" style="background-color:white" />
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Restriction:</strong>
												<input type="text" class="form-control" placeholder="tour name" name="tourNmae" style="background-color:white" />
											</div>
											</div>
											<div class="col-sm-6">
											<div class="form-group">
												<strong> Notes:</strong>
												<input type="text" class="form-control" placeholder="tour name" name="tourNmae" style="background-color:white" />
											</div>
											</div>
											<div class="col-sm-12">
											
												<div class="col-sm-4 col-sm-offset-4">
												<input type="submit" class="form-control btn btn-warning"  name="tourNmae" />
											
											</div>
											</div>
										</div>
									</div>
											<!-- START TAB 4 -->
									<div class="tab-pane" id="licenceDetail">
										<div class="booking gray clearfix box-shadow1">
											<div class="selected-deal">
												<h2 class="">Selected Deal</h2>
												<div class="ft-item">
													<span class="ft-image">
														<img src="img/ft-img-1.jpg" alt="featured Scroller" />
													</span>
													<div class="ft-data">
														<a class="ft-hotel text-upper" href="#">Hotel</a>
														<a class="ft-plane text-upper" href="#">Air Ticket</a>
														<a class="ft-tea text-upper" href="#">Break Fast</a>
													</div>
													<div class="ft-foot">
														<h4 class="ft-title text-upper"><a href="#">Colosseum</a></h4>
														<span class="ft-offer text-upper">Starting From 250 $</span>
													</div>
													<div class="ft-foot-ex">
														<span class="ft-date text-upper alignleft">28 December 2013</span>
														<span class="ft-temp alignright">17&#730;c</span>
													</div>
												</div>
											</div>
											<div class="booking-status">
												<h2 class="marb20">Booking Status</h2>
												<p>Amet turpis tristique, nec in aliquet dis amet, proin egestas in tempor, cras et dapibus.</p>
												<span class="checkbox-container">
													<label><input type="radio" name="radio" class="styled"  checked="checked" /> First Choice</label>
													<label><input type="radio" name="radio" class="styled" /> Second Choice</label>
													<label><input type="radio" name="radio" class="styled" /> Third Choice</label>
												</span>
											</div>
											
										</div>
									</div>
									<!-- END TAB 1 -->
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
			
			<script>
				function myFunction(id) 
				{
				window.location.href = "guide_profile_edit.php?id="+id;
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