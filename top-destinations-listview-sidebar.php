<!DOCTYPE html>
<html lang="en" dir="ltr">

	<!-- START head -->
	<head>
		<!-- Site meta charset -->
		<meta charset="UTF-8">
		
		<!-- title --> 
        <title>Home | Guided Gateway - Authentic Affordable Travel</title>

		<!-- meta description --> <meta name="description" content="Authentic Affordable Travel in India" />

		<!-- meta keywords --> <meta name="keywords" content="travel
		guide tourism india" />
		
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
		<!-- color scheme --> <link
		rel="stylesheet" type="text/css" href="css/colors/color3.css"
		title="color3" />

<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64862528-1', 'auto');
  ga('send', 'pageview');

</script>
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
	<body ng-app="topPlaces" ng-controller="placesCtrl">
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
								<h1 class="text-upper"><i class="fa fa-leaf" style="color:black;"></i>&nbsp;&nbsp;Top Destinations</h1>
							</section>
							
							<!-- breadcrumbs -->
						<!--	<section class="col-sm-6">
								<ol class="breadcrumb">
									<li class="home"><a href="#">Home</a></li>
									<li><a href="#">Top Destinations</a></li>
								</ol>
							</section> -->
						</div>
					</div>
				</div>
			</div>
			<!-- END #page-header -->
			
			<!-- START .main-contents -->
			<div class="main-contents">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
						<a href="destination-detail-sidebar.php">
							<div class="row" ng-repeat="x in places">
								<div class="col-md-12">
									<div class="tour-plans">
										<div class="plan-image">
											<img class="img-responsive" style="height:360px;" src="{{x.Media.Image[0]}}" alt="{{x.Name}}" href="destination-detail-sidebar.html"/>
											<div class="offer-box">
												<div class="offer-top">
													<span class="ft-temp alignright">19&#730;c</span>
													<span class="featured-cr text-upper">{{x.Name}}</span>
													<h2 class="featured-cy text-upper">{{x.State}}</h2>
												</div>
												
												<div class="offer-bottom">
													<span class="featured-stf"></span>
													<span class="featured-spe">{{x.Category}}</span>
												</div>
												<div class="act-date">
													<span class="bold">{{x.BestTimeToVisit}}</span>
													<!-- <span></span> -->
												</div>
											</div>
										</div>
																	
										<div class="featured-btm box-shadow1">
										   <ul style="list-style-type:none;">
											<li class="ft-hotel text-upper" style="float:left;" ng-repeat="y in x.Transport">{{y}}&nbsp&nbsp</li>
											<!-- <a class="ft-plane text-upper" href="#">Return Air Ticket</a>
											<a class="ft-tea text-upper" href="#">Complimentary Break Fast</a> -->
											</ul>
										</div>
										<div class="post-desc">
											<h4>{{x.Description}}</h4>
											 <h5>Attractions</h5>
											<p>
											<ul><li ng-repeat="y in x.Attractions">{{y}}</li>
											</p>
											<a class="btn btn-primary marb20" href="destination-detail-sidebar.html">DETAILS</a>
										</div>
									</div>
								</div>
						<!-- 		<div class="col-md-12">
									<div class="tour-plans">
										<div class="plan-image">
											<img class="img-responsive" src="http://placehold.it/770x210" alt="Kolkata, WB" href="destination-detail-sidebar.html"/>
											<div class="offer-box">
												<div class="offer-top">
													<span class="ft-temp alignright">19&#730;c</span>
													<span class="featured-cr text-upper">Spain</span>
													<h2 class="featured-cy text-upper">Barcelona</h2>
												</div>
												
												<div class="offer-bottom">
													<span class="featured-stf">Starting From </span>
													<span class="featured-spe">250 $</span>
												</div>
												<div class="act-date">
													<span class="bold">25</span>
													<span>Nov</span>
												</div>
											</div>
										</div>
										<div class="featured-btm box-shadow1">
											<a class="ft-hotel text-upper" href="#">6 nights VIP/Luxurious Hotel</a>
											<a class="ft-plane text-upper" href="#">Return Air Ticket</a>
											<a class="ft-tea text-upper" href="#">Complimentary Break Fast</a>
										</div>
										<div class="post-desc">
											<h4>Amet turpis tristique, nec in aliquet dis amet</h4>
											<p>Amet turpis tristique, nec in aliquet dis amet, proin egestas in tempor, cras et dapibus, lectus pellentesque enim odio elementum eu tincidunt diam a et. Dapibus sed cum, aliquam cras egestas enim elit in mattis? Scelerisque, ultrices mid! Lorem. Scelerisque? Pid cras, mattis vel, porta, quis! Porttitor turpis cras, odio ultricies parturient pulvinar tempor, eu turpis enim dapibus diam tristique cursus egestas quis phasellus natoque ac. </p>
											<a class="btn btn-primary marb20" href="#">DETAILS</a>
										</div>
									</div>
								</div> -->
						<!-- 		<div class="col-md-12">
									<div class="tour-plans">
										<div class="plan-image">
											<img class="img-responsive" src="http://placehold.it/770x210" alt="Kolkata, WB" href="destination-detail-sidebar.html"/>
											<div class="offer-box">
												<div class="offer-top">
													<span class="ft-temp alignright">19&#730;c</span>
													<span class="featured-cr text-upper">Spain</span>
													<h2 class="featured-cy text-upper">Barcelona</h2>
												</div>
												
												<div class="offer-bottom">
													<span class="featured-stf">Starting From </span>
													<span class="featured-spe">250 $</span>
												</div>
												<div class="act-date">
													<span class="bold">25</span>
													<span>Nov</span>
												</div>
											</div>
										</div>
										<div class="featured-btm box-shadow1">
											<a class="ft-hotel text-upper" href="#">6 nights VIP/Luxurious Hotel</a>
											<a class="ft-plane text-upper" href="#">Return Air Ticket</a>
											<a class="ft-tea text-upper" href="#">Complimentary Break Fast</a>
										</div>
										<div class="post-desc">
											<h4>Amet turpis tristique, nec in aliquet dis amet</h4>
											<p>Amet turpis tristique, nec in aliquet dis amet, proin egestas in tempor, cras et dapibus, lectus pellentesque enim odio elementum eu tincidunt diam a et. Dapibus sed cum, aliquam cras egestas enim elit in mattis? Scelerisque, ultrices mid! Lorem. Scelerisque? Pid cras, mattis vel, porta, quis! Porttitor turpis cras, odio ultricies parturient pulvinar tempor, eu turpis enim dapibus diam tristique cursus egestas quis phasellus natoque ac. </p>
											<a class="btn btn-primary marb20" href="#">DETAILS</a>
										</div>
									</div>
								</div> -->
								<div class="clearfix"></div>
							</div>
							</a>
						</div>
						<!-- START #sidebar -->
						<aside id="sidebar" class="col-md-4">
							<div class="sidebar-widget">
								<!-- Sidebar recent popular posts -->
								<!-- START TABS -->
								<ul class="nav nav-tabs text-upper">
									<li class="active"><a href="#toptours" data-toggle="tab">Tours</a></li>
									<li><a href="#topguides" data-toggle="tab">Guides</a></li>
									<li><a href="#lodging" data-toggle="tab">Lodging</a></li>
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
                                               <a href="booking-form.html"> <input type="submit" name="submit" class="btn btn-primary text-upper marb20" value="Custom" /></a>
											</li>
										</ul>
									</div>
									<!-- END TAB 1 -->
									
									<!-- START TAB 2 -->
									<div class="tab-pane" id="topguides" ng-controller="guidescontrol">
										<ul class="list-unstyled">
											<li ng-repeat="z in guides" ng-show="$index==5">
												<span class="">
													<img class="img-responsive" style="height:80px; width:80px;" src="{{z.photo}}" alt="Recent Post 2" />
												</span>
											<h5><a href="#">{{z.name}}</a></h5>
												<h5><a href="#">{{z.guide_territory}}</a></h5>
												<h5>{{z.Speciality}}<span class="rc-post-date small">Speciality&nbsp;&nbsp;</span></h5>
												<span star-rating rating-value="z.Review.Star" style="" class="" ></span>	
											</li>
											<li ng-repeat="z in guides" ng-show="$index==7">
												<span class="rc-post-image">
													<img class="img-responsive" style="height:80px; width:80px;" src="{{z.photo}}" alt="Recent Post 2" />
												</span>
											<h5><a href="#">{{z.name}}</a></h5>
												<h5><a href="#">{{z.guide_territory[0]}}</a></h5>
												<h5>{{z.Speciality}}<span class="rc-post-date small">Speciality&nbsp;&nbsp;</span></h5>
												<span star-rating rating-value="z.Review.Star" style="" class="" ></span>	
											</li>
											<li ng-repeat="z in guides" ng-show="$index==12">
												<span class="rc-post-image">
													<img class="img-responsive" style="height:80px; width:80px;" src="{{z.photo}}" alt="Recent Post 2" />
												</span>
											<h5><a href="#">{{z.name}}</a></h5>
												<h5><a href="#">{{z.guide_territory[0]}}</a></h5>
												<h5>{{z.Speciality}}<span class="rc-post-date small">Speciality&nbsp;&nbsp;</span></h5>
												<span star-rating rating-value="z.Review.Star" style="" class="" ></span>	
											</li>
											<li ng-repeat="z in guides"ng-show="$index==13">
												<span class="rc-post-image">
													<img class="img-responsive" style="height:80px; width:80px;" src="{{z.photo}}" alt="Recent Post 2" />
												</span>
											<h5><a href="#">{{z.name}}</a></h5>
												<h5><a href="#">{{z.guide_territory[0]}}</a></h5>
												<h5>{{z.Speciality}}<span class="rc-post-date small">Speciality&nbsp;&nbsp;</span></h5>
												<span star-rating rating-value="z.Review.Star" style="" class="" ></span>	
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
					<!-- END .pagination -->
				</div>
			</div>
			<!-- END .main-contents -->
			
			<!-- START footer -->
			<!-- START footer --> <footer> <!-- START #ft-footer -->
			<div id="ft-footer"> <div class="footer-overlay"> <div
			class="container"> <div class="row"> <!-- testimonials -->
			<section class="col-md-6"> <h3>Testimonials</h3> <p>Tortor
			turpis. Proin. Dolor. Auctor arcu, habitasse mid placerat
			magna? Dis ac, adipiscing? Cras mus dolor sit a? Platea eros
			dictumst ridiculus sed phasellus, rhoncus magnis a
			pellentesque pulvinar duis purus risus tristique ultricies
			natoque, nec! Natoque natoque cum? Nec, placerat sociis! Sit
			ut, scelerisque? placerat sociis! Sit ut, scelerisque? Urna
			ut aliquam duis et scelerisque,</p> <div class="tl-author">
			<span class="tl-author-img"> <img class="img-circle"
			src="http://placehold.it/70x70" alt="Testimonial Author" />
			</span> <span class="tl-author-title">Jassem Elrakesh</span>
			<span class="tl-author-desc">Visited Barcelona
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