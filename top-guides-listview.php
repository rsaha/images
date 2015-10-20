<!DOCTYPE html>
<html lang="en" dir="ltr">

	<!-- START head -->
	<head>
		<!-- Site meta charset -->
		<meta charset="UTF-8">
		
		<!-- title --> 
        <title>Home | Guided Gateway - Authentic Affordable Travel</title>

		<!-- meta description --> <meta name="description" content="Authentic Afordable Travel in India" />

		<!-- meta keywords --> <meta name="keywords" content="travel
		guide tourism india" />
		
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
	</head><!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64862528-1', 'auto');
  ga('send', 'pageview');

</script>
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
    font-size: 14px;
}
.rating .filled {
    color: #ff845e;
}

	</style>
<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
   <script src="guideList.js"></script>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	</head> <!-- END head -->

	<!-- START body --> <body  ng-app="myGuideList"> <!-- START #wrapper --> <div
	id="wrapper"> <!-- START header --> <?php 
			
				include('MasterTopHeader.php'); 
			
			
			?>
			
			<!-- START #page-header -->
				<div id="">
				
					<div class="container">
						<div class="row">
							<section class="col-sm-6">
								<h1 class="text-upper"><i class="fa fa-user-secret" style="color:black;"></i>&nbsp;&nbsp;Top Guides</h1>
							</section>
							
							<!-- breadcrumbs -->
							<!--<section class="col-sm-6">
								<ol class="breadcrumb">
									<li class="home"><a href="#">Home</a></li>
									<li><a href="#">Top Tours</a></li>
								</ol>
							</section> -->
						</div>
					</div>
				
			</div>
			<!-- END #page-header -->
			<!-- <div class="main-contents col-md-8 col-md-offset-2" id="searchDiv">
					<form class="plan-tour">
						<div class="top-fields"><br>
						<div class="row">								
						<div class="col-md-8 col-md-offset-1">
						<input type="text" class="form-control" style="background-color:white;" placeholder="Where to go?" />
						</div> 
						<div class="col-md-2" >
						<input type="submit" class="form-control" style="background-color:#ff845e;" class="btn btn-primary" value="Search" /> 
						</div> 
						</div>
						<div class="row">
						<div class="col-md-7 col-md-offset-1"> <br>
						<label >Search via</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<label><input class="input-cb"	type="checkbox" name="inc_Tour" value="1"	checked="checked" /> Tours</label>&nbsp;&nbsp;&nbsp;&nbsp;
						<label><input class="input-cb" type="checkbox" name="inc_Guide" value="1" checked="checked" /> Guides </label>&nbsp;&nbsp;&nbsp;&nbsp;
						<label><input class="input-cb" type="checkbox"	name="inc_Destination" value="1" checked="checked"/> Destinations</label>&nbsp;&nbsp; 
						</div> 
						</div>
						</div>
					</form>
				</div> -->
			<!-- START .main-contents -->
			<div class="main-contents">
				<div class="container">
					<div class="row">
					  <div class="col-md-8">
							<div class="row" ng-controller="guideCtrl">
						<div class="col-md-4" ng-repeat="x in allguides" ng-show="$index<12" >
							 <div	class="ft-item"> 
						  <span class="ft-image">
						  <a href="guide-detail-sidebar.php">
							 <img style="height:230px;width:180;" class="img-responsive"  src="{{x.photo}}" alt="Top Guide" /> </a>
<!--                               <img style="height:230px;width:180;" class="img-responsive"  src="img/author-img.jpg" alt="Top Guide" /> </a>-->
						  </span>
					  
								<div class="ft-data">
							  <span style="color:black;" class="fa fa-odnoklassniki text-upper">{{x.city}}</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							  <span style="color:black;" class="fa fa-book text-upper" >&nbsp;&nbsp;{{x.experiance_in_year}}</span>
							  <br><span style=" font-size:11px;color:black;" class="fa fa-plane text-upper">{{x.language_known[0]}}</span>
								</div> 
					
							<div class="ft-foot">
							<h4 class="ft-title text-upper" style="color:#686868">{{x.name}},&nbsp{{x.gender}}</h4> 
							<!-- <span class="ft-offer text-upper">{{x.Tours.Count}} Tours</span>  -->
							</div> 
					
							<div class="ft-foot-ex"> 
								<span class="fa fa-shield text-upper alignleft">&nbsp;&nbsp;{{x.Tours.Count}} Tours&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;
								<span star-rating rating-value="x.Review.Star" class="aligncenter"></span>
								<span class="alignright fa fa-eye">{{x.Review.Count}} reviews</span> 							
							</div> 
					       </div>
						</div>
					  </div>
					 </div>
					        <aside id="sidebar" class="col-md-4">
							<div class="sidebar-widget">
								<!-- Sidebar recent popular posts -->
								<!-- START TABS -->
								<ul class="nav nav-tabs text-upper">
									<li class="active"><a href="#toptours" data-toggle="tab">Tours</a></li>
									<li><a href="#topdestinations" data-toggle="tab">Destinations</a></li>
									<li><a href="#toptips" data-toggle="tab">Advices</a></li>
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content gray box-shadow1 clearfix marb30" >
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
									<div class="tab-pane" id="topdestinations"  ng-controller="placeCtrl">
										<ul class=" list-unstyled">
											<li ng-repeat="k in allplaces" ng-show="$index<4">
												<span class="rc-post-image">
													<img class="img-responsive" src="{{k.Media.Image[0]}}" alt="Tour 1" />
												</span>
												<h5><a href="#">{{k.Name}}</a></h5>
												<span class="rc-post-date small">Best Visit:&nbsp;&nbsp;&nbsp;{{k.BestTimeToVisit}}</span><br/>
                                               <a href="booking-form.html"> <input type="submit" name="submit" class="btn btn-primary text-upper marb20" value="Custom" /></a>
											</li>
										</ul>
									</div>
									<!-- END TAB 2 -->
									
									<!-- START TAB 3 -->
									<div class="tab-pane" id="toptips">
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
								<!-- Sidebar Flickr Gallery -->
								<h3 class="text-upper">Guide Gallery</h3>
								<ul class="flickr-gal list-unstyled" ng-controller="guideCtrl">
									<li ng-repeat="x in allguides" ><img style="height:70px; width:120px;" class="img-responsive" src="{{x.photo}}" alt="Guide" /></li>								
								</ul>
							</div>
						</aside>
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
									<span class="contact-email">support@guidedgateway.com</span>
									<span class="contact-phone"> +1 125 496 0999</span>
								</div>
								<div class="foot-box col-md-4">
									<span class="">&copy; 2013 Guided Gateway. All Rights Reserved.</span>
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