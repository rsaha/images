<?php
	session_start();
	
	if(isset($_SESSION['userId']))
	{
		if(isset($_GET['id']))
		{
		$tourID = $_GET['id'];
		}
		include('db.php');

		$select1 = mysql_query("SELECT * FROM `tbl_tours` WHERE `tour_id` = $tourID && `status` = 1");
		$row1 = mysql_fetch_assoc($select1);
		$user_id=$row1["user_id"];
		$tour_category_id = $row1["tour_category_id"];
		$tour_title = $row1["tour_title"];
		$tour_location = $row1["tour_location"];
		$tour_description = $row1["tour_description"];
		$tour_duration = $row1["tour_duration"];
		$tour_price = $row1["tour_price"];
		$start_point = $row1["start_point"];
		$end_point = $row1["end_point"];
		$inclusive = $row1["inclusive"];
		$exclusive = $row1["exclusive"];
		$cancelation_policy = $row1["cancelation_policy"];
		$restrictions = $row1["restrictions"];
		$notes = $row1["notes"];
			
		$select2 = mysql_query("SELECT * FROM `tbl_tour_media_pictures` WHERE `tour_id` = $tourID");
		$row2 = mysql_fetch_assoc($select2);
		if(mysql_num_rows($select2) > 0 )
		{
			$picture_media_id = $row2["picture_media_id"];
			$tour_picture = $row2["tour_picture"];
		}
		
		$select3 = mysql_query("SELECT * FROM `tbl_tour_media_videos` WHERE `tour_id` = $tourID");
		$row3 = mysql_fetch_assoc($select3);
		if(mysql_num_rows($select3) > 0 )
		{
			$video_media_id = $row3["video_media_id"];
			$tour_video = $row3["tour_video"];
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
		<title>Kolkata, WB | Guided Gateway</title>
		
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
		<link rel="stylesheet" type="text/css" href="css/colors/color3.css" title="color3" />
	</head>
	<!-- END head -->

	<!-- START body -->
	<body>
		<!-- START #wrapper -->
		<div id="wrapper">
			<!-- START header -->
			<?php include('MasterHeaderAfterLogin.php'); ?>
			
			<!-- START #page-header -->
			<div id="header-banner">
				<div class="banner-overlay">
					<div class="container">
						<div class="row">
							<section class="col-sm-6">
								<h1 class="text-upper"><?php echo $tour_duration . ' in ' . $tour_title ; ?></h1>
							</section>
							
							<!-- breadcrumbs 
							<section class="col-sm-6">
								<ol class="breadcrumb">
									<li class="home"><a href="#">Home</a></li>
									<li><a href="#">Tour #2</a></li>
									<li class="active">Agra, UP</li>
								</ol>
							</section>-->
						</div>
					</div>
				</div>
			</div>
			<!-- END #page-header -->
			
			<!-- START .main-contents -->
			<div class="main-contents">
				<div class="container">
					<div class="row">
					<div class="row">
						<!-- START #page -->
						<div id="page" class="col-md-8">
							<!-- START .tour-plans -->
							<div class="tour-plans">
								<div class="plan-image">
								<?php
								$select4Tvid = mysql_query("SELECT * FROM `tbl_tour_media_videos` WHERE `tour_id` = $tourID");
								$select4Tpic = mysql_query("SELECT * FROM `tbl_tour_media_pictures` WHERE `tour_id` = $tourID");
								$count4Tpic = mysql_num_rows($select4Tpic);
								if ($count4Tpic==0)
								{
									echo '<img class="img-responsive" alt="featured Scroller" draggable="false" style="width:800px; height:400px;" src="img/custom11.jpg"/>';
								}
								else
								{
									echo '<img class="img-responsive" alt="featured Scroller" draggable="false" style="width:800px; height:400px;" src="showMediaPicture.php?id=' . mysql_result($select4Tpic, 0, 0) . '"/>';
								}
								?>
									<!--<img class="img-responsive" src="img/custom2.jpg" alt="TajMahal" />-->
									<div class="offer-box">
										<div class="offer-top">
											<!--<span class="ft-temp alignright">19&#730;c</span>-->
											<span class="featured-cr text-upper"><?php echo $tour_location ; ?></span>
											<h2 class="featured-cy text-upper"><?php echo $tour_title; ?></h2>
										</div>
										
										<div class="offer-bottom">
											<span class="featured-stf">Per Person </span>
											<span class="featured-spe"><?php echo $tour_price; ?></span>
										</div>
									</div>
								</div>
								
								<div class="featured-btm box-shadow1">
									<a class="ft-hotel text-upper" href="#"><?php echo $tour_duration; ?></a>
									<a class="ft-plane text-upper" href="#"><?php $select2 = mysql_query("SELECT `tour_category_title` FROM `tbl_tour_category` WHERE `tour_category_id` = $tour_category_id && `status` = 1"); echo mysql_result($select2, 0, 0); ?></a>
									<a class="ft-tea text-upper" href="#"><?php echo $inclusive; ?></a>
                                    <a class="ft-tea text-upper" href="booking-form.html">Book the Tour</a>
								</div>
								
							</div>
							<!-- END .tour-plans -->
							
							
						</div>
						<!-- END #page -->
						<!-- START #sidebar -->
						<aside id="sidebar" class="col-md-4">
							
							
							<div class="sidebar-widget">
								<!-- Sidebar Newsletter -->
								<div class="styled-box gray">
									<h3 class="text-upper">Start-End Details</h3>
									<p><b>
									<div class="row">
										<div class="col-md-4 col-md-offset-1">Starting Point:
										</div>
										<div class="col-md-7"><?php echo $start_point; ?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4 col-md-offset-1">Ending Point:
										</div>
										<div class="col-md-7"><?php echo $end_point ?>
										</div>
									</div>
									 </b>	
									</p>
								</div>
							</div>
							
							<div class="sidebar-widget">
								<!-- Sidebar Newsletter -->
								<div class="styled-box gray">
									<h3 class="text-upper">Tour Information</h3>
									<p><?php echo $tour_description; ?></p>
								</div>
							</div>
							<?php
							$select4Tpic2 = mysql_query("SELECT * FROM `tbl_tour_media_pictures` WHERE `tour_id` = $tourID");
							$count4Tpic2 = mysql_num_rows($select4Tpic2);
							?>	
							<div class="sidebar-widget">
								<!-- Sidebar Flickr Gallery -->
								<h3 class="text-upper">Tour Gallery</h3>
								<ul class="flickr-gal list-unstyled">
									<?php
									if($count4Tpic2 > 0)
									{
										while($row1 = mysql_fetch_array($select4Tpic2))
										{
											echo '<li><img style="height:62px; width:85px;" src="showMediaPicture.php?id=' . $row1['picture_media_id'] . '" alt="Flickr Photo" /></li>';
										}
										/* while($row2 = mysql_fetch_array($select4Tvid))
										{
											echo '<li><img class="img-responsive" style="height:62px; width:85px;" src="showMediaPicture.php?id=' . $row2['video_media_id'] . '" alt="Flickr Photo" /></li>';
										} */
									}
									else
									{
										echo '<li><img class="img-responsive" src="http://placehold.it/85x62" alt="Flickr Photo" /></li>';
									}
									?>
									
								</ul>
							</div>
						</aside>
						</div>
						<!-- END #sidebar -->
						<div class="row">
						<!-- START TABS -->
							<ul class="nav nav-tabs text-upper">
								<li class="active"><a href="#tourPlan" data-toggle="tab">Tour Plan</a></li>
								<li><a href="#flightSchedule" data-toggle="tab">Places Covered</a></li>
								<li><a href="#additionalInfo" data-toggle="tab">Additional Information</a></li>
							</ul>
							<!-- END TABS -->
							
							<!-- START TAB CONTENT -->
							<div class="tab-content gray box-shadow1 clearfix marb30">
								<!-- START TAB 1 -->
								<div class="tab-pane active" id="tourPlan">
									<ul class="plans-list list-unstyled">
										<?php
										for($p=1; $p<=$tour_duration; $p++)
										{
											$select5 = mysql_query("SELECT * FROM `tbl_tour_itinerary` WHERE `tour_id` = $tourID and `day` = $p");
											$count5 = mysql_num_rows($select5);
											?>
											<li>
												<img class="img-responsive" src="img/custom2.jpg" alt="Day 1" />
												<div class="plan-info">
													<h4 class="text-upper">Day <?php echo $p; ?></h4>
													<?php
													if($count5 > 0)
													{
														echo "<p>";
														while($row5 = mysql_fetch_array($select5))
														{
															echo $row5["description"].". ";
														}
														echo "</p>";
													}
													else
													{
														echo "<p>Nothing to display</p>";
													}
													?>
												</div>
											</li>
											<?php
										}
										
										?>
										
									</ul>
								</div>
								<!-- END TAB 1 -->
								
								<!-- START TAB 2 -->
								<?php
								$select4 = mysql_query("SELECT * FROM `tbl_tour_itinerary` WHERE `tour_id` = $tourID");
								
								$count4 = mysql_num_rows($select4);
							
									
								?>
								<div class="tab-pane" id="flightSchedule">
									<div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													<th>Place</th>
													<th>Day</th>
													<th>Time</th>
													<th>Description</th>
													<th>Transport</th>
												</tr>
											</thead>
											<tbody>
											<?php
											if($count4 > 0)
									{
										while($row4 = mysql_fetch_array($select4))
										{
											?>
											<tr class="dark-gray">
													<td><?php echo $row4["tourist_spot"]; ?></td>
													<td>Day <?php echo $row4["day"]; ?></td>
													<td><?php echo $row4["intraday"]; ?></td>
													<td><?php echo $row4["description"]; ?></td>
													<td><?php echo $row4["transport"]; ?></td>
												</tr>
										<?php
										}
									}
									else
									{
										?>
										<tr class="dark-gray">
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<?php
									}
									?>
											</tbody>
										</table>
									</div>
								</div>
								<!-- END TAB 2 -->
								
								<!-- START TAB 3 -->
								<div class="tab-pane" id="additionalInfo">
									<div class="inside-pane">
										<p><b>Inclusive : </b> <?php echo $inclusive; ?></p>
										<p><b>Exclusive : </b> <?php echo $exclusive; ?></p>
										<p><b>Cancelation Policy : </b> <?php echo $cancelation_policy; ?></p>
										<p><b>Restriction : </b> <?php echo $restrictions; ?></p>
									</div>
								</div>
								<!-- END TAB 3 -->
							</div>
							<!-- END TAB CONTENT -->
						</div>
					</div>
					<!-- END .row -->
				</div>
			</div>
			<!-- END .main-contents -->
			
			<!-- START footer -->
			<footer>
				<!-- START #ft-footer -->
				<div id="ft-footer">
					<div class="footer-overlay">
						<div class="container">
							<div class="row">
								<!-- testimonials -->
								<section class="col-md-6">
									<h3>Testimonials</h3>
									<p>Tortor turpis. Proin. Dolor. Auctor arcu, habitasse mid placerat magna? Dis ac, adipiscing? Cras mus dolor sit a? Platea eros dictumst ridiculus sed phasellus, rhoncus magnis a pellentesque pulvinar duis purus risus tristique ultricies natoque, nec! Natoque natoque cum? Nec, placerat sociis! Sit ut, scelerisque? placerat sociis! Sit ut, scelerisque? Urna ut aliquam duis et scelerisque,</p>
									<div class="tl-author">
										<span class="tl-author-img">
											<img class="img-circle" src="http://placehold.it/70x70" alt="Testimonial Author" />
										</span>
										<span class="tl-author-title">Jassem Elrakesh</span>
										<span class="tl-author-desc">Visited Barcelona recently</span>
									</div>
								</section>
								
								<!-- twitter -->
								<section class="col-md-6">
									<h3 class="tw-feeds">Twitter Feeds</h3>
									<p>The only netball team that takes a team photo after every game #envato <a href="#">http://instagram.com/p/gXSJNTwBJe/</a></p>
									<p>Very excited that Envato is joining the big-ticket Macaw backers list - <a href="#">http://macaw.co</a>  - very intuitive looking new web design app!</p>
									<p>Remember, you really are your own boss. Sink or swim, but do it like a boss. (10/10) <a href="#">#10BootstrappingTips</a></p>
								</section>
							</div>
						</div>
					</div>
				</div>
				<!-- END #ft-footer -->
				
				<!-- START #ex-footer -->
				<div id="#ex-footer">
					<div class="container">
						<div class="row">
							<nav class="col-md-12">
								<ul class="footer-menu">
									<li><a href="#">Best Rate Guarntee</a></li>
									<li><a href="#">Careers</a></li>
									<li><a href="#">Hotel Directory</a></li>
									<li><a href="#">Website Terms of Use</a></li>
									<li><a href="#">Privacy Statement</a></li>
									<li><a href="#">Affiliates</a></li>
									<li class="last-item"><a href="#">Top Destinations</a></li>
								</ul>
							</nav>
							
							<div class="foot-boxs">
								<div class="foot-box col-md-4 text-right">
									<span>Stay Connected</span>
									<ul class="social-media footer-social">
										<li><a class="sm-yahoo" href="#"><span>Yahoo</span></a></li>
										<li><a class="sm-facebook" href="#"><span>Facebook</span></a></li>
										<li><a class="sm-rss" href="#"><span>RSS</span></a></li>
										<li><a class="sm-flickr" href="#"><span>Flicker</span></a></li>
										<li><a class="sm-windows" href="#"><span>Windows</span></a></li>
										<li><a class="sm-stumble" href="#"><span>Stumbleupon</span></a></li>
									</ul>
								</div>
								<div class="foot-box foot-box-md col-md-4">
									<span class="contact-email"> touchus@travelhub.com</span>
									<span class="contact-phone"> +1 125 496 0999</span>
								</div>
								<div class="foot-box col-md-4">
									<span class="">&copy; 2013 travelhub. All Rights Reserved.</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END #ex-footer -->
			</footer>
			<!-- END footer -->
		</div>
		<!-- END #wrapper -->

		
				<!-- javascripts -->
		<script type="text/javascript" src="js/modernizr.custom.17475.js"></script>

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="bs3/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<!--[if lt IE 9]>
			<script type="text/javascript" src="js/html5shiv.js"></script>
		<![endif]-->

	</body>
</html>