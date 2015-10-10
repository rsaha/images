<!DOCTYPE html>
<html lang="en" dir="ltr">

	<!-- START head -->
	<head>
		<!-- Site meta charset -->
		<meta charset="UTF-8">
		
		<!-- title --> <title>Home | Guided Gateway - Authentic
		Affordable Travel</title>

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

	<!-- START body --> <body> <!-- START #wrapper --> <div
	id="wrapper"> <!-- START header --> <?php 
			
				include('MasterTopHeader.php'); 
			
			
			?>
			
			<!-- START #page-header -->
			<div id="header-banner">
				<div class="top-header">
					<div class="container">
						<div class="row">
							<!-- <section class="col-sm-6">
								<h1 class="text-upper">Your Guides</h1>
							</section> -->
							
							<!-- breadcrumbs -->
							<!-- <section class="col-sm-6">
								<ol class="breadcrumb">
									<li class="home"><a href="index.html">Home</a></li>
									<li><a href="#">Guides</a></li>
									
								</ol>
							</section> -->
							
						</div>
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
					  <div class="col-md-8" ng-app="myGuideList">
							<div class="row" ng-controller="guideCtrl">
						<div class="col-md-4" ng-repeat="x in allguides" >
							 <div	class="ft-item"> 
						  <span class="ft-image">
						  <a href="guide-detail-sidebar.php">
							 <img style="height:230px;width:180;" class="img-responsive" src="{{x.Photo}}" alt="Top Guide" /> </a>
						  </span>
					  
								<div class="ft-data">
							  <span style="color:black;" class="fa fa-odnoklassniki text-upper">&nbsp;&nbsp;{{x.Gender}}</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							  <span style="color:black;" class="fa fa-book text-upper" >&nbsp;&nbsp;{{x.Speciality}}</span>&nbsp;&nbsp;&nbsp;&nbsp;
							  <br><span style=" font-size:11px;color:black;" class="fa fa-plane text-upper" > {{x.LanguageKnown}}</span>
								
								</div> 
					
							<div class="ft-foot">
							<h4 class="ft-title text-upper" style="color:#686868">{{x.Name}},&nbsp{{x.Territory}}</h4> 
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
									<li class="active"><a href="#salestours" data-toggle="tab">Tours on Sale</a></li>
									<li><a href="#newtours" data-toggle="tab">Newly Added</a></li>
									<li><a href="#" data-toggle="tab"></a></li>
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
								<!-- Sidebar facebook widget -->
								<!-- START TABS -->
								<ul class="nav nav-tabs social-tabs text-upper">
									<li class="active"><a class="facebook-tab" href="#facebook-tab" data-toggle="tab">Facebook</a></li>
									<li><a class="twitter-tab" href="#pinterest-tab" data-toggle="tab">Pinterest</a></li>
									<li><a class="share-tab" href="#share-tab" data-toggle="tab">Like Us</a></li>
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content clearfix marb30">
									<!-- START TAB 1 -->
									<div class="tab-pane active" id="facebook-tab">
										<div id="fb-widget">
											<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FFacebookDevelopers&amp;width&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:290px;" allowTransparency="true"></iframe>
										</div>
									</div>
									<!-- END TAB 1 -->
									
									<!-- START TAB 2 -->
									<div class="tab-pane" id="twitter-tab">
										
									</div>
									<!-- END TAB 2 -->
									
									<!-- START TAB 3 -->
									<div class="tab-pane" id="share-tab">
										
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
												A Simple Heading for Accordion
											</a>
										</div>
										<div id="collapseOne" class="panel-collapse collapse in">
											<div class="panel-body">
												Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading">
											<a class="panel-title collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
												Another Example of Accordion
											</a>
										</div>
										<div id="collapseTwo" class="panel-collapse collapse">
											<div class="panel-body">
												Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading">
											<a class="panel-title collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
												This is The Last Test Item
											</a>
										</div>
										<div id="collapseThree" class="panel-collapse collapse">
											<div class="panel-body">
												Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<div class="sidebar-widget">
								<!-- Sidebar Flickr Gallery -->
								<h3 class="text-upper">Pinterest Board</h3>
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