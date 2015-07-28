<?php
session_start();

/* if(isset($_GET['id']))
{
$userid = $_GET['id'];
}
include('db.php');
$select = mysql_query("SELECT * FROM ` tbl_user_profile` WHERE `user_id` = $userid");
$firstName=mysql_result($select, 0, 3);
$secondName=mysql_result($select, 0, 4);
$username =  $firstName . " " . $secondName;
$emailID = mysql_result($select, 0, 5);
$mobileNumber = mysql_result($select, 0, 6);  */
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
			
			<header>
				<!-- START #top-header -->
				<div id="top-header"  style="background-color:#ffe200;">
					<div class="container">
						<div class="row top-row" >
							<div class="col-md-6">
								<div class="left-part alignleft">
									<span class="contact-email small">touchus@travelhub.com</span>
									<span class="contact-phone small">+1 125 496 0999</span>
									<ul class="social-media header-social">
										<li><a class="sm-yahoo" href="#"><span>Yahoo</span></a></li>
										<li><a class="sm-facebook" href="#"><span>Facebook</span></a></li>
										<li><a class="sm-rss" href="#"><span>RSS</span></a></li>
										<li><a class="sm-flickr" href="#"><span>Flicker</span></a></li>
										<li><a class="sm-windows" href="#"><span>Windows</span></a></li>
										<li><a class="sm-stumble" href="#"><span>Stumbleupon</span></a></li>
									</ul>
								</div>
							</div>
							<div class="col-md-6">
								<div class="right-part alignright">
									<form action="#" method="get">
										<fieldset class="alignright">
											<input type="text" name="s" class="search-input" value="Search..." onfocus="if (this.value == 'Search...') { this.value = ''; }" onblur="if (this.value == '') { this.value = 'Search...'; }" />
											<input type="submit" name="submit" class="search-submit" value="" />
										</fieldset>
									</form>
									<span class="top-link small">Tell a Friend</span>
									<span class="top-link small">Bookmark</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END #top-header -->
				
				<!-- START #main-header -->
				<div id="main-header">
					<div class="container">
						<div class="row">
							<div class="col-md-3">
								<a id="site-logo" href="#">
									<img src="img/logo.png" alt="Travel Hub" />
								</a>
							</div>
							<div class="col-md-9">
								<nav class="main-nav">
									<span>MENU</span>
									<ul id="main-menu">
										<li><a href="#" title="">HOME</a>
											<ul>
												<li><a href="index.html" title="">HOME PAGE 1</a></li>
												<li><a href="home.html" title="">HOME PAGE 2</a></li>
											</ul>
										</li>
										<li><a title="">MY PROFILE</a>
											<ul>
												<li><a href="blog.html" title="">BLOG PAGE</a></li>
												<li><a href="blog-sidebar.html" title="">BLOG PAGE WITH SIDEBAR</a></li>
												<li><a href="blog-detail.html" title="">BLOG DETAIL</a></li>
												<li><a href="blog-detail-sidebar.html" title="">BLOG DETAIL SIDEBAR</a></li>
												<li><a href="blog-listview.html" title="">LIST VIEW</a></li>
												<li><a href="blog-listview-sidebar.html" title="">LIST VIEW SIDEBAR</a></li>
												<li><a href="single.html" title="">SINGLE POST</a></li>
											</ul>
										</li>
										
										<li><a title="">TOURS</a>
											<ul>
												<li><a href="gallery.html" title="">GALLERY COLUMNS</a></li>
												<li><a href="gallery-slideshow.html" title="">GALLERY SLIDESHOW</a></li>
											</ul>
										</li>
										<li><a title="">PLACES</a>
											<ul>
												<li><a href="widget.html" title="">WIDGETS</a></li>
												<li><a href="shortcodes.html" title="">SHORTCODES</a></li>
												<li><a href="404page.html" title="">404 ERROR PAGE</a></li>
												<li><a href="booking-form.html" title="">BOOKING FORM</a></li>
												<li><a href="order-confirmation.html" title="">ORDER CONFIRMATION</a></li>
												<li><a href="price-table.html" title="">PRICE TABLES</a></li>
												<li><a href="sign-in.html" title="">SIGN IN</a></li>
												<li><a href="sign-up.html" title="">SIGN UP</a></li>
												<li><a href="tour-plan.html" title="">TOUR PLAN</a></li>
												<li><a href="user-profile.html" title="">USER PROFILE</a></li>
											</ul>
										</li>										
										
										<li><a title="">ACTIVITIES</a>
											<ul>
												<li><a href="top-activities.html" title="">TOP ACTIVITIES</a></li>
												<li><a href="top-activities-sidebar.html" title="">TOP ACTIVITIES WITH SIDEBAR</a></li>
												<li><a href="top-activities-listview.html" title="">LIST VIEW</a></li>
												<li><a href="top-activities-listview-sidebar.html" title="">LIST VIEW SIDEBAR</a></li>
											</ul>
										</li>
										<li><a title="">CONTACT</a>
											<ul>
												<li><a href="contact.html" title="">CONTACT PAGE 1</a></li>
												<li><a href="contact-us.html" title="">CONTACT PAGE 2</a></li>
											</ul>
										</li>
									</ul>
								</nav>
							</div>
						</div>
					</div>
				</div>
				<!-- END #main-header -->
			</header>
			<form action="guide_Step2.php" method="post">
			<!-- START #page-header -->
			<div class="hovera" >
					<input type="file" id="upload" name="coverpicture" style="visibility: hidden; width: 1px; height: 1px"/>
					<a href="" onclick="document.getElementById('upload').click(); return false">
					
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
					<div id="page" class="col-md-2">
					 <center>
					   <div class="row">
					    <div class="hovera" style="border: 0px solid black; height:201px">
					      <input type="file" id="upload" name="profilepicture" style="visibility: hidden; width: 1px; height: 1px"/>
					     <a href="" onclick="document.getElementById('upload').click(); return false">
					
					     <img src="img/aa.jpg" class="hover img-responsive" style="max-height:198px; max-width:198px;" />
						    <p class="text">change image</p>
					    </a>
					     </div>
					   </div>
					</center>
					        <br />
					    <div class="row">
					          Aayushi Sharma <?php/*  echo $username */ ?><br /><br />
					          aayushi89@gmail.com <?php/*  echo $emailID */ ?><br /><br />
					         contact:8459632541 <?php /* echo $mobileNumber */ ?>
					   </div>
					   <hr >
					   <br> <br>
					   
					   <div class="row"> 
					    <div class="hovera" style="border: 0px solid black; height:201px">
					      <input type="file" id="upload" name="profilepicture" style="visibility: hidden; width: 1px; height: 1px"/>
					     <a href="" onclick="document.getElementById('upload').click(); return false">
					
					     <img src="img/PRcard.jpg" class="hover img-responsive" style="max-height:127px; max-width:200px;" />
						    <p class="text">change image</p>
					    </a>
					     </div>
					   </div>
					   
					    <div class="row">
					          Lic. No. 24XR5874 <?php/*  echo $username */ ?><br /><br />
					          Valid upto 24/9/2018 <?php/*  echo $emailID */ ?><br /><br />
					         
					   </div>
			      </div>
						<!-- START #page -->
				  <div id="page" class="col-md-10">
							<div class="user-profile">
								<!-- Sidebar recent popular posts -->
								<!-- START TABS -->
								<ul class="nav nav-tabs text-upper">
									<li class="active"><a href="#userinfo" data-toggle="tab">Guide Profile</a></li>
									<li style="font-size:35px">&nbsp;&nbsp;&nbsp;Welcome <?php/*  echo $firstName */ ?></li>
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content clearfix marb30">
									<!-- START TAB 1 -->
									<div class="tab-pane active mart20" id="userinfo">
										
											<fieldset>
												<ul class="formFields list-unstyled">
													<li class="row">
														<div class="col-md-4">
															<label>First Name</label>
															<input type="text" class="form-control" name="nickname" value="" pattern="[a-z A-Z]+" />
														</div>
														<div class="col-md-4">
															<label>Last Name</label>
															 <select class="form-control" name="Gender">
															  <option value="SELECT">Select</option>
															  <option value="Male">Male</option>
															  <option value="Female">Female</option>
															</select>
														</div>
														<div class="col-md-4">
															<label>Email</label>
															<input type="date" class="form-control" name="DOB" id="DOB" value=""  />
														</div>
													</li>
													<li class="row">
														<div class="col-md-4">
															<label>Mobile Number</label>
															<input type="text" class="form-control" name="nickname" value="" pattern="[a-z A-Z]+" />
														</div>
														<div class="col-md-4">
															<label>Gender</label>
															 <select class="form-control" name="Gender">
															  <option value="SELECT">Select</option>
															  <option value="Male">Male</option>
															  <option value="Female">Female</option>
															</select>
														</div>
														<div class="col-md-4">
															<label>Date Of Birth</label>
															<input type="date" class="form-control" name="DOB" id="DOB" value=""  />
														</div>
													</li>
													<li class="row">
														<div class="col-md-12">
															<label>Street Address</label>
															<input type="text" class="form-control" name="streetaddress" value="" required />
														</div>
														
													</li>
													<li class="row">
														<div class="col-md-4">
															<label>City</label>
															<input type="text" class="form-control" name="city" value="" pattern="[a-z A-Z]+" />
														</div>
														<div class="col-md-4">
															<label>State</label>
															<input type="text" class="form-control" name="state" value="" pattern="[a-z A-Z]+" />
														</div>
														<div class="col-md-4">
															<label>Country</label>
															<input type="text" class="form-control" name="country" value="" pattern="[a-z A-Z]+" />
														</div>
													</li>
													<li class="row">
														<div class="col-md-4">
															<label>Licence Number</label>
															<input type="text" class="form-control" name="licencenumber" maxlength="20" value="" pattern="[a-z0-9A-Z]+" />
														</div>
														<div class="col-md-4">
															<label>Licence Expiry</label>
															<input type="text" id="LicenceExpiry" class="form-control" name="licenceexpiry" value="" />
														</div>
														<div class="col-md-4">
															<label>Licence Image</label>
															<input type="file" class="form-control" name="licenceImage" value="" style="padding:0px 0px " />
														</div>
														</li>
													<li class="row">
														<div class="col-md-3">
															<label>Guide's facebook Profile</label>
															<input type="text" class="form-control" name="licencenumber" maxlength="20" value="" pattern="[a-z0-9A-Z]+" />
														</div>
														<div class="col-md-3">
															<label>Guide's LinkedIn Profile</label>
															<input type="text" id="LicenceExpiry" class="form-control" name="licenceexpiry" value="" />
														</div>
														<div class="col-md-3">
															<label>Guide's PInterest Profile</label>
															<input type="text" class="form-control" name="licenceImage" value="" style="padding:0px 0px " />
														</div>
														<div class="col-md-3">
															<label>Guide's Skype Address</label>
															<input type="text" class="form-control" name="licenceImage" value="" style="padding:0px 0px " />
														</div>
														</li>
													<li class="row">
														<div class="col-md-4">
															<label>Landline Number</label>
															<input type="tel" class="form-control" name="landlinenumber" value="" maxlength="15" pattern="\d{15}"/>
														</div>
														<div class="col-md-4">
															<label>Best Time for Contact</label>
															<input type="text" class="form-control" name="contacttime" value="" />
														</div>
														<div class="col-md-4">
															<label>Payment Currency</label>
															<input type="text " class="form-control" name="paymentcurrency" value="" />
														</div>
														<div class="col-md-4">
															
														</div>
													</li>
													<li class="row">
														
														<div class="col-md-12">
															<label>Payment Terms</label>
															<textarea class="form-control" name="paymentterms" ></textarea>
														</div>
														</li>
														
														<li class="row">
														
														<div class="col-md-12">
															<label>Communication Mechanism</label>
															<textarea class="form-control" name="communicationmechanism" ></textarea>
														</div>
														</li>
														<li class="row">
														
														<div class="col-md-12">
															<label>Guide Summary</label>
															<textarea class="form-control" name="communicationmechanism" ></textarea>
														</div>
														</li>
															<li class="row">
														
														<div class="col-md-12">
															<label>Guide Experience</label>
															<textarea class="form-control" name="communicationmechanism" ></textarea>
														</div>
														</li>
															<li class="row">
														
														<div class="col-md-12">
															<label>Guide Interest</label>
															<textarea class="form-control" name="communicationmechanism" ></textarea>
														</div>
														</li>
															<li class="row">
														
														<div class="col-md-12">
															<label>Guide Remarks</label>
															<textarea class="form-control" name="communicationmechanism" ></textarea>
														</div>
														</li>
														<li class="row">
														
														<div class="form-group">
														<div class="col-md-3 pull-right" >
															<button type="submit" class="btn btn-danger form-control">SAVE</button>
														
														</div>
														<div class="col-md-3 pull-right" >
														<?php
														/* echo '<input type="button" class="btn btn-default form-control" onclick="myFunction(' . $userid. ')" value="Skip">' */
														?>
														</div>
														</div>
														</li>
													
													
												</ul>
											</fieldset>
										
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
			<?php include('MasterFutter.php'); ?>
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
			function myFunction(id) {
			window.location.href = "registration3.php?id="+id;
			return false;
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