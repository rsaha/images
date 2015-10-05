<!DOCTYPE html>
<html lang="en" dir="ltr">

	<!-- START head -->
	<head>
		<!-- Site meta charset -->
		<meta charset="UTF-8">
		
		<!-- title -->
		<title>User Profile | Travel Hub HTML5 Template</title>
		
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
		<link rel="stylesheet" type="text/css" href="css/styles.css" media="all" />
		<!-- responsive stylesheet -->
		<link rel="stylesheet" type="text/css" href="css/responsive.css" media="all" />
		<!-- Load Fonts via Google Fonts API -->
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Karla:400,700,400italic,700italic" />
		<!-- color scheme -->
		<link rel="stylesheet" type="text/css" href="css/colors/color1.css" title="color1" />
		
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
   <script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
   <script src="guide_profile_All.js"></script>
   	<style type="text/css">
	#searchDiv{
	<!-- top: 130px;
	position: absolute;
	left:20px;
	z-index: 2; -->
	}
	
		
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
	</head>
	<!-- END head -->

	<!-- START body -->
	<body ng-app="myAllGuide" ng-controller="guideControl">
		<!-- START #wrapper -->
		<div id="wrapper">
			<?php include_once('MasterHeader.php'); ?>
			<!-- END header -->
				<div class="container">
					
						<div class="row hover img-responsive" style="width:1400px; height:200px; background-image:url(img/Default.jpg)">
							<!--<section class="col-sm-6">
								<h1 class="text-upper">{{allguides.Name}}</h1>
							</section>-->
							
							<!-- breadcrumbs -->
							<!-- <section class="col-sm-6">
								<ol class="breadcrumb">
									<li style="color:blue;" class="home"><a href="#">Home</a></li>
									<li class="active">Contact Us</li>
								</ol>
							</section> -->
							<img class="img-responsive" style="margin-top:50px; margin-left:30px;" src="{{allguides.Media.Photo}}"/>
							
						</div>
						
					</div>
			<!-- START #page-header -->
			<div id="header-banner">
				<!--<div class="banner-overlay">
				
				</div>-->
			</div>
			<!-- END #page-header -->
			
			<!-- START .main-contents -->
			<div class="main-contents">
				<div class="container">
					<div class="row">
						<!-- START #page -->
						<div id="page" class="col-md-8">
							<div class="user-profile">
								<!-- Sidebar recent popular posts -->
								<!-- START TABS -->
								<ul class="nav nav-tabs text-upper" style="background-color:#ff845e;">
									<li class="active"><a href="#userinfo" data-toggle="tab">Profile</a></li>
									<!-- <li><a href="#booking" data-toggle="tab">Tours</a></li> -->
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content clearfix marb30">
									<!-- START TAB 1 -->
									<div class="tab-pane active mart20" id="userinfo" >
										<div class="row">
										 <div class="col-md-12">
											<fieldset>
												<ul class="formFields list-unstyled" >
													<li class="row">
														<div class="col-md-6">
															<label>Name <span class="required small"></span></label>
															<label class="default form-control">{{allguides.Name}}</label>
															<!-- <input type="text" class="form-control" name="name" value="" readonly/> -->
														</div>
														<div class="col-md-6">
															<label>Email <span class="required small"></span></label>
															<label class="default form-control">{{allguides.Email}}</label>
														</div>
													</li>
													<li class="row">
														<div class="col-md-6">
															<label>Gender <span class="required small"></span></label>
															<label class="default form-control">{{allguides.Gender}}</label>
														</div>
														<div class="col-md-6">
															<label>Language Known <span class="required small"></span></label>
															<label class="default form-control"></label>
														</div>
													</li>
													<li class="row">
														<div class="col-md-6">
															<label>Territory<span class="required small"></span></label>
															<label class="default form-control">{{allguides.Territory}}</label>
														</div>
														<div class="col-md-6">
															<label>Speciality <span class="required small"></span></label>
															<label class="default form-control">{{allguides.Speciality}}</label>
														</div>
													</li>
													<li class="row">
														<div class="col-md-6">
															<label>Transport <span class="required small"></span></label>
															<label class="default form-control">{{allguides.Transport}}</label>
													</div>
														<div class="col-md-6">
															<label>Description<span class="required small"></span></label>
															<label class="default form-control">{{allguides.Description}}</label>
														</div>
													</li>
													
												</ul>
											</fieldset>
											</div>
									</div>
										
									</div>
									<!-- END TAB 1 -->
									<ul class="nav nav-tabs text-upper" style="background-color:#ff845e;">
									<!-- <li class="active"><a href="#userinfo" data-toggle="tab">Profile</a></li> -->
									<li class="active"><a href="#booking" data-toggle="tab">Tours</a></li>
								</ul>
									<!-- START TAB 2 -->
									<!-- <div class="tab-pane active mart20" id="booking"> -->
                                    <div id="header-banner">
				<!--<div class="banner-overlay">
				
				</div>-->
			</div>
										<div class="row" >
											
													<div class="col-md-12">
														<div class="row" ng-controller="TourControl">
													<div class="col-md-4" ng-repeat="y in alltours">
														 <div	class="ft-item"> 
													  <span class="ft-image">
													  <a href="tour_detail_sidebar.html">
														 <img class="img-responsive" src="img/custom11.jpg" alt="Top Guide" /> </a>
													  </span>
												  
															<div class="ft-data">
														  <span style="color:black;" class="fa fa-odnoklassniki text-upper">&nbsp;&nbsp;{{y.Title}}</span><br>
														  <span style="color:black;" class="fa fa-book text-upper" >&nbsp;&nbsp;{{y.Price}}</span>&nbsp;&nbsp;&nbsp;&nbsp;
														 <!--  <br><span style=" font-size:11px;color:black;" class="fa fa-plane text-upper" > {{x.LanguageKnown}}</span> -->
															
															</div> 
												
														<div class="ft-foot">
														<h4 class="ft-title text-upper" style="color:#686868">{{y.Location}}&nbsp</h4> 
														<span class="ft-offer text-upper">{{y.Duration}} Tours</span> 
														</div> 
												<div class="ft-foot-ex"> 
								<span class="fa fa-shield text-upper alignleft">&nbsp;&nbsp;{{y.Category}}&nbsp;&nbsp;&nbsp;</span>
								<span star-rating rating-value="y.Reviews.OverallRating" class="aligncenter"></span>
								<span class="alignright fa fa-eye">{{y.Reviews.ReviewCount}} reviews</span> 							
							</div> 
													<!-- 	<div class="ft-foot-ex"> 
															<span class="fa fa-shield text-upper alignleft">&nbsp;&nbsp;{{x.Tours.Count}} Tours&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;
															<span star-rating rating-value="x.Review.Star" class="aligncenter"></span>
															<span class="alignright fa fa-eye">{{x.Review.Count}} reviews</span> 							
														</div>  -->
													   </div>
													</div>
												  </div>
												 </div>
										</div>
								<!-- 	</div> -->
									<!-- END TAB 2 -->
								</div>
								
								<!-- END TAB CONTENT -->
							</div>
						</div>
						<!-- END #page -->
						
						<!-- START #sidebar -->
						<aside id="sidebar" class="col-md-4">
							<div class="sidebar-widget">
								<!-- Sidebar recent popular posts -->
								<!-- START TABS -->
								<ul class="nav nav-tabs text-upper" style="background-color:#ff845e;">
									<li class="active"><a href="#popular-posts" data-toggle="tab">Popular</a></li>
									<li><a href="#recent-posts" data-toggle="tab">Recent</a></li>
									<li><a href="#recent-comments" data-toggle="tab">Comments</a></li>
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
									<li><a class="twitter-tab" href="#twitter-tab" data-toggle="tab">Twitter</a></li>
									<li><a class="share-tab" href="#share-tab" data-toggle="tab">Follow Us</a></li>
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
								<!-- Post Tags -->
								<div class="styled-box gray">
									<h3 class="text-upper">Tags</h3>
									<ul class="post-tags list-unstyled">
										<li><a class="btn btn-primary btn-sm" href="#">aliquet</a></li>
										<li><a class="btn btn-primary btn-sm" href="#">tristique</a></li>
										<li><a class="btn btn-primary btn-sm" href="#">diam</a></li>
										<li><a class="btn btn-primary btn-sm" href="#">egestas</a></li>
										<li><a class="btn btn-primary btn-sm" href="#">montes</a></li>
										<li><a class="btn btn-primary btn-sm" href="#">dapibus</a></li>
										<li><a class="btn btn-primary btn-sm" href="#">turpis</a></li>
										<li><a class="btn btn-primary btn-sm" href="#">tempor</a></li>
										<li><a class="btn btn-primary btn-sm" href="#">cursus</a></li>
										<li><a class="btn btn-primary btn-sm" href="#">enim</a></li>
										<li><a class="btn btn-primary btn-sm" href="#">lectus</a></li>
										<li><a class="btn btn-primary btn-sm" href="#">elementum</a></li>
									</ul>
								</div>
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
								<!-- Sidebar About -->
								<h3 class="text-upper">About Travel Hub</h3>
								<p>Lorem ipsum dolor sit amet,Phasellus ac lectus a leo scelerisque scelerisque. In commodo sollicitudin tempus. Integer orci ante</p>
								<p>Augue sed platea sed non porta tincidunt augue? Odio platea, pulvinar habitasse vut! Pulvinar, integer odio. Ac pid! Habitasse montes elementum, et sagittis tincidunt magnis? Sociis! Elementum quis, integer natoque sed auctor nascetur enim parturient ridiculus ut amet porttitor aliquam.</p>
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
								<h3 class="text-upper">Flickr Gallery</h3>
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
			<?php include_once('MasterFooter.php'); ?>
			<!-- END footer -->
		</div>
		<!-- END #wrapper -->

				<!-- javascripts -->
		<script type="text/javascript" src="js/modernizr.custom.17475.js"></script>

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="bs3/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/check-radio-box.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<!--[if lt IE 9]>
			<script type="text/javascript" src="js/html5shiv.js"></script>
		<![endif]-->

  <!--  <script src="gettours.js"></script> -->
	</body>
</html>