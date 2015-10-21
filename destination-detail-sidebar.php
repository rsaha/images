<!DOCTYPE html>
<html lang="en" dir="ltr">

	<!-- START head -->
	<head>
		<!-- Site meta charset -->
		<meta charset="UTF-8">
		
		<!-- title -->
		<title>Home | Guided Gateway - Authentic Affordable Travel</title>
		
		<!-- meta description -->
		<meta name="description" content="Guided Gateway" />
		
		<!-- meta keywords -->
		<meta name="keywords" content="Travel India Tourist Guide" />
		
		<!-- meta viewport -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		
		<!-- favicon -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
        <style type="text/css">
.rating {
    color: #a9a9a9;
    margin: 0;
    padding: 0;
}
ul.rating {
    display: inline-block;
}
.rating li {
    list-style-type: none;
    display: inline-block;
    padding: 0px;
    text-align: center;
    font-weight: bold;
    cursor: pointer;
	margin-top: -6px;
    font-size: 16px;
}
.rating .filled {
    color: #292c2f;
}
</style>
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
								<h1 class="text-upper"><i class="fa fa-leaf" style="color:black;"></i>&nbsp;&nbsp;{{place.Name}}, {{place.State}}</h1>
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
<!--									<li class="author-img"><img class="img-circle img-wt-border" src="http://placehold.it/80x80" alt="Admin" />{{place.History}}</li>-->
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
<!--
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
-->
							<!-- END #commentForm -->
						</div>
						<!-- END #page -->
						
						<!-- START #sidebar -->
						<aside id="sidebar" class="col-md-4">
							<div class="sidebar-widget">
								<!-- Sidebar recent popular posts -->
								<!-- START TABS -->
								<ul class="nav nav-tabs text-upper">
									<li class="active"><a href="#toptours" data-toggle="tab">Tours</a></li>
									<li><a href="#topguides" data-toggle="tab">Guides</a></li>
									<li><a href="#lodging" data-toggle="tab">Hotels</a></li>
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content gray box-shadow1 clearfix marb30">
									<!-- START TAB 1 -->
									<div class="tab-pane active" id="toptours"  ng-controller="tourCtrl">
										<ul class=" list-unstyled">
											<li ng-repeat="k in alltours" ng-show="$index<4">
												<span class="rc-post-image">
													<img class="img-responsive" src="{{k.Media.Image[0]}}" alt="Tour 1" />
												</span>
												<h5><a href="#">{{k.Title}}</a></h5>
												<span class="rc-post-date small">Starting Price&nbsp;{{k.Price}}</span><br/>
                                               <a href="booking-form.php"> <input type="submit" name="submit" class="btn btn-primary text-upper marb20" value="Book" /></a>
											</li>
										</ul>
									</div>
									<!-- END TAB 1 -->
									
									<!-- START TAB 2 -->
									<div class="tab-pane" id="topguides" ng-controller="guidescontrol">
										<ul class="list-unstyled">
											<li ng-repeat="z in guides" ng-show="$index<16 && $index==5||$index==7||$index==12||$index==13">
												<span class="rc-post-image">
													<img class="img-responsive" style="height:80px; width:65px;" src="{{z.photo}}" alt="Recent Post 2" />
												</span>
											<h5><a href="#">{{z.name}}</a></h5>
<!--												<h5><a href="#">{{z.guide_territory}}</a></h5>-->
<!--												<h5>{{z.Speciality}}<span class="rc-post-date small">Speciality&nbsp;&nbsp;</span></h5>-->
												<span star-rating rating-value="z.review.Star" style="" class="" ></span>
                                                  <a href="booking-form.php"> <input type="submit" name="submit" class="btn btn-primary text-upper marb20" value="Book" /></a><br><br><br>
											</li>
										</ul>
									</div>
									<!-- END TAB 2 -->
									
									<!-- START TAB 3 -->
									<div class="tab-pane" id="lodging">
										<ul class="rc-posts-list list-unstyled">
                                            <br><br><br><br><br><br><br><br><br>
<!--
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
-->
										</ul>
									</div>
									<!-- END TAB 3 -->
								</div>
								<!-- END TAB CONTENT -->
							</div>
							
							
							
							<div class="sidebar-widget">
								<!-- Sidebar Newsletter -->
								<div class="styled-box gray">
									<h3 class="text-upper">Contact for Custom Tour</h3>
									<form action="#" method="post">
										<label>Email Address</label>
										<input type="text" name="email" class="form-control input-style1 marb20" value="Enter Email Address" onfocus="if (this.value == 'Enter Email Address') { this.value = ''; }" onblur="if (this.value == '') { this.value = 'Enter Email Address'; }" />
										<input type="submit" name="submit" class="btn btn-primary text-upper marb20" value="Submit" />
									</form>
								</div>
							</div>
							
								<div class="sidebar-widget" ng-controller="placesCtrl">
								<!-- Sidebar Flickr Gallery -->
								<h3 class="text-upper">Destination Gallery</h3>
								<ul class="flickr-gal list-unstyled">
									<li ng-repeat="z in places"><img style="height:70px; width:120px;" class="img-responsive" src="{{z.Media.Image[0]}}" alt="image" /></li>
									
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
			<?php include('MasterTopFooter.php'); ?>
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