<!DOCTYPE html>
<html lang="en" dir="ltr">

	<!-- START head -->
	<head>
		<!-- Site meta charset -->
		<meta charset="UTF-8">
		
		<!-- title -->
		<title>Destination-Detail |Guided Gateway - Authentic Affordable Travel</title>
		
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
		
		 <script type="text/javascript"  src= "js/angular.min.js"></script>
        <script type="text/javascript"  src="topPlaces.js"></script>
	</head>
	<!-- END head -->

	<!-- START body -->
	<body ng-app="topPlaces" ng-controller="placeDetailCtrl">
		<!-- START #wrapper -->
		<div id="wrapper">
			<!-- START header -->
			<?php 
			
				include('MasterTopHeader.php'); 
			
			
			?>
			
			<!-- START #page-header -->
			<div id="">
				<div class="">
					<div class="container">
						<div class="row">
							<section class="col-sm-6">
								<h1 class="text-upper">{{place.Name}}, {{place.State}}</h1>
							</section>
							
							<!-- breadcrumbs -->
						
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
							<!-- START .post-data -->
							<div class="post-data">
								<div class="plan-image">
									<img class="img-responsive" style="width:770px; height:320px;" src="{{place.Media.Image[0]}}" alt="Kolkata, WB" />
								</div>
								
								<ul class="featured-btm single-ft-btm list-unstyled box-shadow1">
									<li class="author-img"><img class="img-circle img-wt-border" src="http://placehold.it/80x80" alt="Admin" />{{place.History}}</li>
									<li class="post-date"><a class="text-upper" href="#">{{place.Category}}</a></li>
									<li class="post-category"><a class="text-upper" href="#">{{place.BestTimeToVisit}}</a></li>
									<li class="post-category"><a class="text-upper" href="#">Popularity: {{place.TravelIndex}}</a></li>
									<li class="post-author"><a class="text-upper" href="place.Wikipedia">Follow on Wikipedia</a></li>
								</ul>
							</div>
							<!-- END .post-data -->
							
							<!-- START .post-content -->
							<article class="post-content">
								<p>{{place.Description}}</p> 
								 <h5>Attractions</h5>
											<p>
											<ul><li ng-repeat="y in place.Attractions">{{y}}</li>
											</p>
								<p>
									<img class="alignleft" style="width:260px;height:168px;" src="{{place.Media.Image[0]}}" alt="Image in Post" />
									<h5>Transport Availability</h5>											
											<ul><li ng-repeat="y in place.Transport">{{y}}</li>										
								</p>
								
								<!-- BLOCKQUOTE -->
								<br><br><br><br><blockquote>
									<p><strong>BLOCK QUOTE</strong></p>
									<p>In! Vel magna nisi aliquam, magnis tempor, nunc dapibus sed porta vut porttitor tristique! Lectus turpis massa ridiculus sagittis tincidunt eros lundium etiam nisi non natoque ac arcu auctor elementum vel nunc sociis!</p>
								</blockquote>
								<p>Augue sed platea sed non porta tincidunt augue? Odio platea, pulvinar habitasse vut! Pulvinar, integer odio. Ac pid! Habitasse montes elementum, et sagittis tincidunt magnis? Sociis! Elementum quis, integer natoque sed auctor nascetur enim parturient ridiculus ut amet porttitor dapibus phasellus tempor, natoque adipiscing aliquam.</p>
							</article>
							<!-- END .post-content -->
							
							<!-- START .about-author -->
							<div class="about-author gray box-shadow1">
								<span class="author-image">
									<img src="http://placehold.it/70x70" alt="Author Image" />
								</span>
								<h5>NICK WILSON <small>Admin</small></h5>
								<p>In! Vel magna nisi aliquam, magnis tempor, nunc dapibus sed porta vut porttitor tristique! Lectus turpis massa ridiculus sagittis tincidunt eros lundium etiam nisi non natoque ac arcu auctor elementum vel nunc sociis! Nunc lacus! Dictumst facilisis turpis</p>
								<a href="https://twitter.com/envato" class="twitter-follow-button" data-show-count="false">Follow Nick Wilson</a>
							</div>
							<!-- END .about-author -->
							
							<!-- START #commentForm -->
							<section id="commentForm">
								<h2 class="ft-heading text-upper">Leave Us a Reply</h2>
								<form action="comment.php" method="post">
									<fieldset>
										<ul class="formFields list-unstyled">
											<li class="row">
												<div class="col-md-6">
													<label>Name <span class="required small">(Required)</span></label>
													<input type="text" class="form-control" name="name" value="" />
												</div>
												<div class="col-md-6">
													<label>Email <span class="required small">(Required)</span></label>
													<input type="text" class="form-control" name="email" value="" />
												</div>
											</li>
											<li class="row">
												<div class="col-md-12">
													<label>Subject <span class="required small">(Required)</span></label>
													<input type="text" class="form-control" name="subject" value="" />
												</div>
											</li>
											<li class="row">
												<div class="col-md-12">
													<label>Message <span class="required small">(Required)</span></label>
													<textarea class="form-control"></textarea>
												</div>
											</li>
											<li class="row">
												<div class="col-md-12">
													<input type="submit" class="btn btn-primary btn-lg text-upper" name="submit" value="Submit" />
													<span class="required small">*Your email will never published.</span>
												</div>
											</li>
										</ul>
									</fieldset>
								</form>
							</section>
							<!-- END #commentForm -->
						</div>
						<!-- END #page -->
						
						<!-- START #sidebar -->
						<aside id="sidebar" class="col-md-4">
							<div class="sidebar-widget">
								<!-- Sidebar recent popular posts -->
								<!-- START TABS -->
								<ul class="nav nav-tabs text-upper">
									<li class="active"><a href="#guides" data-toggle="tab">Guides</a></li>
									<li><a href="#recent-posts" data-toggle="tab">Tours</a></li>
									<li><a href="#recent-comments" data-toggle="tab">Hotels</a></li>
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content gray box-shadow1 clearfix marb30">
									<!-- START TAB 1 -->
									<div class="tab-pane active" id="guides">
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
									<div class="tab-pane" id="tours">
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
									<div class="tab-pane" id="hotels">
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
								<!-- Sidebar What We Do -->
								<h3 class="text-upper">What We Do ?</h3>
								<div class="panel-group" id="accordion">
									<div class="panel panel-default">
										<div class="panel-heading">
											<a class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
												Guided Gateway Benefits
											</a>
										</div>
										<div id="collapseOne" class="panel-collapse collapse in">
											<div class="panel-body">
												Provide authentic, affordable Indian travel experience to tourists by connecting them or their travel agents with the guides and tour services through an online marketplace. Our hand-selected tour guides offer unique authentic pre-defined or custom tours at an affordable price. We through with our partners also can offer authentic, local lodiging experience. All tours 
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="sidebar-widget">
								<!-- Sidebar Newsletter -->
								<div class="styled-box gray">
									<h3 class="text-upper">Subscribe Newsletter</h3>
									<form action="#" method="post">
										<label>Email Address</label>
										<input type="text" name="email" class="form-control input-style1 marb20" value="Enter Email Address" onfocus="if (this.value == 'Enter Email Address') { this.value = ''; }" onblur="if (this.value == '') { this.value = 'Enter Email Address'; }" />
										<input type="submit" name="submit" class="btn btn-primary text-upper marb20" value="Subscribe" />
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
			
			<!-- START footer --> <footer> <!-- START #ft-footer -->
			<div id="ft-footer"> <div class="footer-overlay"> <div
			class="container"> <div class="row"> <!-- testimonials -->
			<section class="col-md-6"> <h3>Testimonials</h3> <p>Amazing experience with guided tour. Much authentic and affordable than a "so called" luxury package. A local guide or expert can enable you to connect with local people and culture more than you can do on your own and surely more than visiting just placec. Connecting with culture and learning from it is any way the main purpose of my visit  to place like Jaipur - apart from the awesome foods. Thank you. </p> <div class="tl-author">
			<span class="tl-author-img"> <img class="img-circle"
			src="http://placehold.it/70x70" alt="Testimonial Author" />
			</span> <span class="tl-author-title">Jassem Elrakesh</span>
			<span class="tl-author-desc">Visited Jaipur
			recently</span> </div> </section>

								<!-- twitter --> <section
								class="col-md-6"> <h3
								class="tw-feeds">Pinterest Feeds</h3>
								                <a data-pin-do="embedBoard" href="https://www.pinterest.com/guidedgateway/guided-gateway/"data-pin-scale-width="80" data-pin-scale-height="200" data-pin-board-width="400">Follow Guided Gateway's board on Pinterest.</a><script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>    
                								</section> </div> </div> </div> </div>
								<!-- END #ft-footer -->

				<!-- START #ex-footer --> <div id="#ex-footer"> <div
				class="container"> <div class="row"> <nav
				class="col-md-12"> <ul class="footer-menu"> <li><a
				href="#">Cancellation Policy</a></li> <li><a
				href="#">Careers</a></li> <li><a href="#">Hotel
				Directory</a></li> <li><a href="termofuse.html">Website Terms of
				Use</a></li> <li><a href="privacy.html">Privacy Statement</a></li>
				<li><a href="#">Affiliates</a></li> <li
				class="last-item"><a href="#">Top Destinations</a></li>
				</ul> </nav>

							<div class="foot-boxs"> <div class="foot-box
							col-md-4 text-right"> <span>Stay
							Connected</span> <ul class="social-media
							footer-social"><li><a class="sm-facebook"
	href="#"><span>Facebook</span></a></li> <li><a class="sm-flickr"
	href="#"><span>Pinterest</span></a></li> <li><a class="sm-windows"
	href="#"><span>Youtube</span></a></li> <li><a class="sm-stumble"
	href="#"><span>Twitter</span></a></li>
							</ul> </div> <div class="foot-box
							foot-box-md col-md-4"> <span
							class="contact-email">
							touchus@guidedgateway.com</span> <span
							class="contact-phone"> +1 510 938 2562</span> </div> <div class="foot-box
							col-md-4"> <span class="">&copy; 2015							GuideGateway. All Rights Reserved.</span>
							</div> </div> </div> </div> </div> <!-- END #ex-footer --> 
							</footer> <!-- END footer -->
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