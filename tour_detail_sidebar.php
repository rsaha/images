<?php
	session_start();
	
	if(isset($_SESSION['userId']))
	{
		if(isset($_GET['tour']))
		{
		$tourID = $_GET['tour'];
		}
		include('db.php');

		$select1 = mysql_query("SELECT * FROM `tbl_tours` WHERE `tour_id` = $tourID && `status` = 1");
		$user_id=mysql_result($select1, 0, 1);
		$tour_category_id=mysql_result($select1, 0, 2);
		$tour_title=mysql_result($select1, 0, 3);
		$tour_description = mysql_result($select1, 0, 4);
		$tour_duration = mysql_result($select1, 0, 5);
		$tour_price = mysql_result($select1, 0, 6);
		$start_point = mysql_result($select1, 0, 7);
		$end_point = mysql_result($select1, 0, 8);
		$inclusive = mysql_result($select1, 0, 9);
		$exclusive = mysql_result($select1, 0, 10);
		$cancelation_policy = mysql_result($select1, 0, 11);
		$restrictions = mysql_result($select1, 0, 12);
		$notes = mysql_result($select1, 0, 13);

		$select2 = mysql_query("SELECT * FROM `tbl_tour_media_pictures` WHERE `tour_id` = $tourID");
		if(mysql_num_rows($select2) > 0 )
		{
			$picture_media_id = mysql_result($select2, 0, 0);
			$tour_picture = mysql_result($select2, 0, 2);
		}
		
		$select3 = mysql_query("SELECT * FROM `tbl_tour_media_videos` WHERE `tour_id` = $tourID");
		if(mysql_num_rows($select3) > 0 )
		{
			$video_media_id = mysql_result($select2, 0, 0);
			$tour_video = mysql_result($select2, 0, 2);
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
			<header>
				<!-- START #top-header -->
				<div id="top-header">
					<div class="container">
						<div class="row top-row">
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
				
				<!-- START #main-header --> <div id="main-header"> <div
				class="container"> <div class="row"> <div
				class="col-md-3"> <a id="site-logo" href="#"> <img
				src="img/logo.png" alt="Guided Gateway" /> </a> </div> <div
				class="col-md-9"> <nav class="main-nav">
				<span>MENU</span> <ul id="main-menu"> <li><a href="index.html"
				title="">HOME</a> <!-- ul> <li><a href="index.html"
				title="">HOME PAGE 1</a></li> <li><a href="home.html"
				title="">HOME PAGE 2</a></li> </ul --> </li> <li><a
				href="guides.html" title="">Guides</a> <!-- ul> <li><a
				href="deals.html" title="">DEALS PAGE</a></li> <li><a
				href="deals-sidebar.html" title="">DEALS PAGE WITH
				SIDEBAR</a></li> <li><a href="deals-detail.html"
				title="">DEALS DETAIL</a></li> <li><a
				href="deals-detail-sidebar.html" title="">DEALS DETAIL
				SIDEBAR</a></li> <li><a href="deals-listview.html"
				title="">LIST VIEW</a></li> <li><a
				href="deals-listview-sidebar.html" title="">LIST VIEW
				SIDEBAR</a></li> </ul--> </li> <li><a
				href="top-destinations-listview-sidebar.html" title="">Destinations</a> </li>
                <li><a
				href="#" title="">Themed Tours</a> </li>
		
									</ul> </nav> </div> </div> </div>
									</div> <!-- END #main-header -->
			</header>
			<!-- END header -->
			
			<!-- START #page-header -->
			<div id="header-banner">
				<div class="banner-overlay">
					<div class="container">
						<div class="row">
							<section class="col-sm-6">
								<h1 class="text-upper">Three days in Historic Agra</h1>
							</section>
							
							<!-- breadcrumbs -->
							<section class="col-sm-6">
								<ol class="breadcrumb">
									<li class="home"><a href="#">Home</a></li>
									<li><a href="#">Tour #2</a></li>
									<li class="active">Agra, UP</li>
								</ol>
							</section>
						</div>
					</div>
				</div>
			</div>
			<!-- END #page-header -->
			
			<!-- START .main-contents -->
			<div class="main-contents">
				<div class="container">
					<div class="row">
						<!-- START #page -->
						<div id="page" class="col-md-8">
							<!-- START .tour-plans -->
							<div class="tour-plans">
								<div class="plan-image">
									<img class="img-responsive" src="img/custom2.jpg" alt="TajMahal" />
									<div class="offer-box">
										<div class="offer-top">
											<span class="ft-temp alignright">19&#730;c</span>
											<span class="featured-cr text-upper">Agra</span>
											<h2 class="featured-cy text-upper">UP</h2>
										</div>
										
										<div class="offer-bottom">
											<span class="featured-stf">Per Person </span>
											<span class="featured-spe">INR 15000</span>
										</div>
									</div>
								</div>
								
								<div class="featured-btm box-shadow1">
									<a class="ft-hotel text-upper" href="#">2 days</a>
									<a class="ft-plane text-upper" href="#">Historic</a>
									<a class="ft-tea text-upper" href="#">Complimentary Break Fast</a>
                                    <a class="ft-tea text-upper" href="booking-form.html">Book the Tour</a>
								</div>
								
								<h2 class="text-upper">Tour Information</h2>
								<p>Amet turpis tristique, nec in aliquet dis amet, proin egestas in tempor, cras et dapibus, lectus pellentesque enim odio elementum eu tincidunt diam a et. Dapibus sed cum, aliquam cras egestas enim elit in mattis? Scelerisque, ultrices mid! Lorem. Scelerisque? Pid cras, mattis vel, porta, quis! Porttitor turpis cras, odio ultricies parturient pulvinar tempor, eu turpis enim dapibus diam tristique cursus egestas quis phasellus montes! Parturient porta purus quis scelerisque? Vel proin, ac odio cras penatibus magnis non? Aliquam elementum, dis? Elementum ac.</p>
							</div>
							<!-- END .tour-plans -->
							
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
										<li>
											<img class="img-responsive" src="img/custom2.jpg" alt="Day 1" />
											<div class="plan-info">
												<h4 class="text-upper">Day 1</h4>
												<p>Amet turpis tristique, nec in aliquet dis amet, proin egestas in tempor, cras et dapibus.</p>
											</div>
										</li>
										
										<li>
											<img class="img-responsive" src="img/custom2.jpg" alt="Day 2" />
											<div class="plan-info">
												<h4 class="text-upper">Day 2</h4>
												<p>Amet turpis tristique, nec in aliquet dis amet, proin egestas in tempor, cras et dapibus.</p>
											</div>
										</li>
										
										<li>
											<img class="img-responsive" src="img/custom2.jpg" alt="Day 3" />
											<div class="plan-info">
												<h4 class="text-upper">Day 3</h4>
												<p>Amet turpis tristique, nec in aliquet dis amet, proin egestas in tempor, cras et dapibus.</p>
											</div>
										</li>
									</ul>
								</div>
								<!-- END TAB 1 -->
								
								<!-- START TAB 2 -->
								<div class="tab-pane" id="flightSchedule">
									<div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													<th>Place</th>
													<th>Type</th>
													<th>DATE</th>
													<th>DEPARTS</th>
													<th>ARRIVES</th>
												</tr>
											</thead>
											<tbody>
												<tr class="dark-gray">
													<td>Taj Mahal</td>
													<td>Monument</td>
													<td>20 DEC 2013</td>
													<td>10:00</td>
													<td>12:00</td>
												</tr>
												<tr>
													<td>Yamuna River</td>
													<td>Nature</td>
													<td>21 DEC 2013</td>
													<td>09:00</td>
													<td>10:00</td>
												</tr>
												<tr class="dark-gray">
													<td>Kabob Corner</td>
													<td>Food</td>
													<td>22 DEC 2013</td>
													<td>05:00</td>
													<td>06:30</td>
												</tr>
												<tr>
													<td>Taj Mahal Garden</td>
													<td>Romance</td>
													<td>23 DEC 2013</td>
													<td>08:15</td>
													<td>09:30</td>
												</tr>
												<tr class="dark-gray">
													<td>Rafting</td>
													<td>Adventure</td>
													<td>24 DEC 2013</td>
													<td>10:00</td>
													<td>03:40</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
								<!-- END TAB 2 -->
								
								<!-- START TAB 3 -->
								<div class="tab-pane" id="additionalInfo">
									<div class="inside-pane">
										<p>Amet turpis tristique, nec in aliquet dis amet, proin egestas in tempor, cras et dapibus, lectus pellentesque enim odio elementum eu tincidunt diam a et. Dapibus sed cum, aliquam cras egestas enim elit in mattis? Scelerisque, ultrices mid! Lorem. Scelerisque? Pid cras, mattis vel, porta, quis! Porttitor turpis cras, odio ultricies parturient pulvinar tempor.</p>
										<p>eu turpis enim dapibus diam tristique cursus egestas quis phasellus montes! Parturient porta purus quis scelerisque? Vel proin, ac odio cras penatibus magnis non? Aliquam elementum, dis? Elementum ac.</p>
									</div>
								</div>
								<!-- END TAB 3 -->
							</div>
							<!-- END TAB CONTENT -->
						</div>
						<!-- END #page -->
						<!-- START #sidebar -->
						<aside id="sidebar" class="col-md-4">
							<div class="sidebar-widget">
								<!-- Sidebar recent popular posts -->
								<!-- START TABS -->
								<ul class="nav nav-tabs text-upper">
									<li class="active"><a href="#popular-posts" data-toggle="tab">Guides</a></li>
									<li><a href="#recent-posts" data-toggle="tab">Reviws</a></li>
									<li><a href="#recent-comments" data-toggle="tab">Tips</a></li>
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content gray box-shadow1 clearfix marb30">
									<!-- START TAB 1 -->
									<div class="tab-pane active" id="popular-posts">
										<ul class="rc-posts-list list-unstyled">
											<li>
												<span class="rc-post-image">
													<img class="img-responsive" src="http://placehold.it/80x65" alt="Recent Post 2" />
												</span>
												<h5><a href="#">Limbaugh: Does 'Dark Knight Rise have it Bomb Found...</a></h5>
												<span class="rc-post-date small">January 18, 2014</span>
											</li>
											<li>
												<span class="rc-post-image">
													<img class="img-responsive" src="http://placehold.it/80x65" alt="Recent Post 4" />
												</span>
												<h5><a href="#">Shares suspende am Bankiaid 'Gloomy Forecast'</a></h5>
												<span class="rc-post-date small">January 11, 2014</span>
											</li>
											<li>
												<span class="rc-post-image">
													<img class="img-responsive" src="http://placehold.it/80x65" alt="Recent Post 3" />
												</span>
												<h5><a href="#">Shares suspende am Bankiaid 'Gloomy Forecast'</a></h5>
												<span class="rc-post-date small">January 15, 2014</span>
											</li>
											<li class="last-rc-post">
												<span class="rc-post-image">
													<img class="img-responsive" src="http://placehold.it/80x65" alt="Recent Post 1" />
												</span>
												<h5><a href="#">Apple Fails to Fix iPhone Daylight Saving Time Alarm Bug</a></h5>
												<span class="rc-post-date small">January 20, 2014</span>
											</li>
										</ul>
									</div>
									<!-- END TAB 1 -->
									
									<!-- START TAB 2 -->
									<div class="tab-pane" id="recent-posts">
										<ul class="rc-posts-list list-unstyled">
											<li>
												<span class="rc-post-image">
													<img class="img-responsive" src="http://placehold.it/80x65" alt="Recent Post 1" />
												</span>
												<h5><a href="#">Apple Fails to Fix iPhone Daylight Saving Time Alarm Bug</a></h5>
												<span class="rc-post-date small">January 20, 2014</span>
											</li>
											<li>
												<span class="rc-post-image">
													<img class="img-responsive" src="http://placehold.it/80x65" alt="Recent Post 2" />
												</span>
												<h5><a href="#">Limbaugh: Does 'Dark Knight Rise have it Bomb Found...</a></h5>
												<span class="rc-post-date small">January 18, 2014</span>
											</li>
											<li>
												<span class="rc-post-image">
													<img class="img-responsive" src="http://placehold.it/80x65" alt="Recent Post 3" />
												</span>
												<h5><a href="#">Shares suspende am Bankiaid 'Gloomy Forecast'</a></h5>
												<span class="rc-post-date small">January 15, 2014</span>
											</li>
											<li class="last-rc-post">
												<span class="rc-post-image">
													<img class="img-responsive" src="http://placehold.it/80x65" alt="Recent Post 4" />
												</span>
												<h5><a href="#">Shares suspende am Bankiaid 'Gloomy Forecast'</a></h5>
												<span class="rc-post-date small">January 11, 2014</span>
											</li>
										</ul>
									</div>
									<!-- END TAB 2 -->
									
									<!-- START TAB 3 -->
									<div class="tab-pane" id="recent-comments">
										<div class="inside-pane">
											<p>Amet turpis tristique, nec in aliquet dis amet, proin egestas in tempor, cras et dapibus, lectus pellentesque enim odio elementum eu tincidunt diam a et. Dapibus sed cum, aliquam cras egestas enim elit in mattis? Scelerisque, ultrices mid! Lorem. Scelerisque? Pid cras, mattis vel, porta, quis! Porttitor turpis cras, odio ultricies parturient pulvinar tempor.</p>
											<p>eu turpis enim dapibus diam tristique cursus egestas quis phasellus montes! Parturient porta purus quis scelerisque? Vel proin, ac odio cras penatibus magnis non? Aliquam elementum, dis? Elementum ac.</p>
										</div>
									</div>
									<!-- END TAB 3 -->
								</div>
								<!-- END TAB CONTENT -->
							</div>
							
							
							<div class="sidebar-widget">
								<!-- Sidebar Newsletter -->
								<div class="styled-box gray">
									<h3 class="text-upper">Broadcast for Custom Price</h3>
									<form action="#" method="post">
										<label>Email Address</label>
										<input type="text" name="email" class="form-control input-style1 marb20" value="Enter Email Address" onfocus="if (this.value == 'Enter Email Address') { this.value = ''; }" onblur="if (this.value == '') { this.value = 'Enter Email Address'; }" />
										<input type="submit" name="submit" class="btn btn-primary text-upper marb20" value="Send" />
									</form>
								</div>
							</div>
							
							<div class="sidebar-widget">
								<!-- Sidebar Flickr Gallery -->
								<h3 class="text-upper">Tour Gallery</h3>
								<ul class="flickr-gal list-unstyled">
									<li><img class="img-responsive" src="http://placehold.it/85x62" alt="Flickr Photo" /></li>
									<li><img class="img-responsive" src="http://placehold.it/85x62" alt="Flickr Photo" /></li>
									<li><img class="img-responsive" src="http://placehold.it/85x62" alt="Flickr Photo" /></li>
									<li><img class="img-responsive" src="http://placehold.it/85x62" alt="Flickr Photo" /></li>
									<li><img class="img-responsive" src="http://placehold.it/85x62" alt="Flickr Photo" /></li>
									<li><img class="img-responsive" src="http://placehold.it/85x62" alt="Flickr Photo" /></li>
									<li><img class="img-responsive" src="http://placehold.it/85x62" alt="Flickr Photo" /></li>
									<li><img class="img-responsive" src="http://placehold.it/85x62" alt="Flickr Photo" /></li>
									<li><img class="img-responsive" src="http://placehold.it/85x62" alt="Flickr Photo" /></li>
									<li><img class="img-responsive" src="http://placehold.it/85x62" alt="Flickr Photo" /></li>
									<li><img class="img-responsive" src="http://placehold.it/85x62" alt="Flickr Photo" /></li>
									<li><img class="img-responsive" src="http://placehold.it/85x62" alt="Flickr Photo" /></li>
								</ul>
							</div>
						</aside>
						<!-- END #sidebar -->
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