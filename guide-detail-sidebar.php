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
		<link rel="stylesheet" type="text/css" href="bs3/css/bootstrap.css" media="all" /> 
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
			<!-- START header -->
			<?php 
			
				include('MasterTopHeader.php'); 
			
			
			?>
			
			<!-- START #page-header -->
			<div id="" style="color:#ff845e;">
				
					<div class="container">
						<div class="row col-md-12 col-xs-12">
							
							
							
							
								<h1 class="text-upper"><i class="fa fa-user-secret" style="color:black;"></i>&nbsp;&nbsp;{{allguides.name}}&nbsp;&nbsp;<span star-rating rating-value="allguides.ReviewSummary.Star" ></span></h1>	
							
							
							
							
							
							<!-- breadcrumbs -->
						<!-- 	<section class="col-sm-6">
								<ol class="breadcrumb">
									<li class="home"><a href="#">Home</a></li>
									<li><a href="#">Blog</a></li>
									<li class="active">Lorem ipsum dolor sit amet</li>
								</ol>
							</section> -->
						</div>
					</div>
				
			</div>
			<!-- END #page-header -->
			
			<!-- START .main-contents -->
			<div class="main-contents">
				<div class="container">
					<div class="row">
						<!-- START #page -->
						<div id="page" class="col-md-8" ng-controller="guideControl">
							<!-- START .post-data -->
							<div class="post-data">
								<div class="plan-image">
									<img class="img-responsive" src="img/custom3.jpg" alt="Kolkata, WB" />
								</div>
								
								<ul class="featured-btm single-ft-btm list-unstyled box-shadow1">
									<li class="author-img"><img class="img-circle img-wt-border" style=height:80px;width:80px; src="img/featured_guide.jpg" alt="Guide" /></li>
									<li class="post-author"><a class="text-upper" >{{allguides.gender}}</a></li>
									<li class="fa fa-tree"><a class=""> {{allguides.city}}</a></li>
									<li class="post-date"><span class="alignright" star-rating rating-value="allguides.ReviewSummary.Star" ></span></li>
									
								</ul>
							</div>
							<!-- END .post-data -->
							
							<!-- START .post-content -->
							<article class="post-content">
								<p>Augue sed platea sed non porta tincidunt augue? Odio platea, pulvinar habitasse vut! Pulvinar, integer odio. Ac pid! Habitasse montes elementum, et sagittis tincidunt magnis? Sociis! Elementum quis, integer natoque sed auctor nascetur enim parturient ridiculus ut amet porttitor dapibus phasellus tempor, natoque adipiscing aliquam. Amet. Dapibus proin, elit ut!</p> 
								<p>Nec? Mid lundium, turpis sit sagittis, in porttitor augue, magna dis, ultrices vel porttitor dapibus tincidunt, elementum lorem, massa odio porta. Sit ac proin odio, platea adipiscing, tempor sagittis enim a, eros proin.</p>
								<p>
									<img class="alignleft" src="img/feature_detail_tour.jpg" alt="Top Tour" />
									In! Vel magna nisi aliquam, magnis tempor, nunc dapibus sed porta vut porttitor tristique! Lectus turpis massa ridiculus sagittis tincidunt eros lundium etiam nisi non natoque ac arcu auctor elementum vel nunc sociis! Nunc lacus! Dictumst facilisis turpis, integer? Nec nec. Nunc scelerisque diam! Cum sit arcu, mus in, nisi non etiam arcu a magna etiam nisi porttitor turpis! Natoque ac porta pellentesque nunc placerat porttitor sed porta urna, est ut ut adipiscing, tortor montes, massa urna dictumst ac, pellentesque facilisis nisi arcu! Tortor lacus elementum eros, placerat arcu. Adipiscing platea purus sagittis ridiculus turpis, nunc dictumst ac?
								</p>
								
								<!-- BLOCKQUOTE -->
								<blockquote>
									<p><strong>BLOCK QUOTE</strong></p>
									<p>In! Vel magna nisi aliquam, magnis tempor, nunc dapibus sed porta vut porttitor tristique! Lectus turpis massa ridiculus sagittis tincidunt eros lundium etiam nisi non natoque ac arcu auctor elementum vel nunc sociis!</p>
								</blockquote>
								<p>Augue sed platea sed non porta tincidunt augue? Odio platea, pulvinar habitasse vut! Pulvinar, integer odio. Ac pid! Habitasse montes elementum, et sagittis tincidunt magnis? Sociis! Elementum quis, integer natoque sed auctor nascetur enim parturient ridiculus ut amet porttitor dapibus phasellus tempor, natoque adipiscing aliquam.</p>
							</article>
							<!-- END .post-content -->
							
							<!-- START .about-author -->
							<div class="about-author gray box-shadow1">
								<span class="author-image">
									<img src="img/feature_guide_tour.jpg" alt="Reviewed Tour" />
								</span>
								<h5>NICK WILSON <small>Tourist , 2015</small></h5>
								<p>In! Vel magna nisi aliquam, magnis tempor, nunc dapibus sed porta vut porttitor tristique! Lectus turpis massa ridiculus sagittis tincidunt eros lundium etiam nisi non natoque ac arcu auctor elementum vel nunc sociis! Nunc lacus! Dictumst facilisis turpis</p>
								<a href="https://twitter.com/envato" class="twitter-follow-button" data-show-count="false">Follow Nick Wilson</a>
							</div>
							<!-- END .about-author -->
							
							<!-- START #commentForm -->
						<!-- 	<section id="commentForm">
								<h2 class="ft-heading text-upper">Contact Guide</h2>
								<form action="contactGuideMail.php" method="post" ng-controller="validateCtrlNew" name="myForm"  novalidate>
									<fieldset>
										<ul class="formFields list-unstyled">
											<li class="row">
												<div class="col-md-6">
													<label>Name </label>
													<input type="text" class="form-control" name="name" value="name" ng-model="name" required ng-pattern="/^[a-z A-Z]+$/" />
														 <span style="color:red" ng-show="myForm.name.$dirty && myForm.name.$invalid">
											 <span ng-show="myForm.name.$error.required">*Name is required.</span>
											   <span ng-show="myForm.name.$error.pattern">*Invalid Name ...</span>
											  </span>
												</div>
												<div class="col-md-6">
													<label>Email</label>
													<input type="text" class="form-control" name="email" value="email" ng-model="email" required ng-pattern="/^[a-zA-Z0-9._-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,5}(\.[a-zA-Z]{2,5}){0,1}$/" />
												 <span style="color:red" ng-show="myForm.email.$dirty && myForm.email.$invalid">
											 <span ng-show="myForm.email.$error.required">*email is required.</span>
											   <span ng-show="myForm.email.$error.pattern">*Invalid Name ...</span>
											  </span>
												</div>
											</li>
											<li class="row">
												<div class="col-md-12">
													<label>Subject </label>
													<input type="text" class="form-control" name="subject" value="subject" required ng-model="subject" ng-pattern="/^[a-z A-Z]+$/"/>
													 <span style="color:red" ng-show="myForm.subject.$dirty && myForm.subject.$invalid">
											 <span ng-show="myForm.subject.$error.required">*subject is required.</span>
											   <span ng-show="myForm.subject.$error.pattern">*Invalid Name ...</span>
											  </span>
												</div>
											</li>
											<li class="row">
												<div class="col-md-12">
													<label>Message </label>
													<textarea class="form-control" ng-model="Message" value="Message" required ng-pattern="/^[a-z A-Z]+$/"></textarea>
													 <span style="color:red" ng-show="myForm.Message.$dirty && myForm.Message.$invalid">
											 <span ng-show="myForm.Message.$error.required">*Message is required.</span>
											   <span ng-show="myForm.Message.$error.pattern">*Invalid Name ...</span>
											  </span>
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
							</section> -->
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
									<li><a href="#relatedguides" data-toggle="tab">Guides</a></li>
									<li><a href="#toptips" data-toggle="tab">Advices</a></li>
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content gray box-shadow1 clearfix marb30">
									<!-- START TAB 1 -->
									
									<div class="tab-pane active" id="toptours" ng-controller="TourControl">
										<ul class="rc-posts-list list-unstyled">
											<li ng-repeat="x in alltours" ng-show="$index<2">
												<span class="rc-post-image">
													<img class="img-responsive" src="{{x.Media.Image[0]}}" alt="Tour 1" />
												</span>
												<h5><a href="#">{{x.Title}}</a></h5>
												<span class="rc-post-date small">Starting Price&nbsp;{{x.Price}}</span><br/>
                                               <a href="booking-form.html"> <input type="submit" name="submit" class="btn btn-primary text-upper marb20" value="Book" /></a>
											</li>
											
											<li>
												<span class="rc-post-image">
													<img class="img-responsive" src="img/tour_3.jpg" alt="Tour 3" />
												</span>
												<h5><a href="#">Tour 3 </a></h5>
												<span class="rc-post-date small">Starting Price INR 1500</span><br/>
                                               <a href="booking-form.html"> <input type="submit" name="submit" class="btn btn-primary text-upper marb20" value="Book" /> </a>
											</li>
											<li class="last-rc-post">
												<span class="rc-post-image">
													<img class="img-responsive" src="img/tour_4.jpg" alt="Tour 4" />
												</span>
												<h5><a href="#">Tour 4 </a></h5>
												<span class="rc-post-date small">Starting Price INR 1500</span><br/>
                                               <a href="booking-form.php"> <input type="submit" name="submit" class="btn btn-primary text-upper marb20" value="Book" /></a>
											</li>
										</ul>
									</div>
									
									<!-- END TAB 1 -->
									
									<!-- START TAB 2 -->
									<div class="tab-pane active" id="relatedguides" ng-controller="guidescontrol">
										<ul class="list-unstyled">
											<li ng-repeat="z in guides" ng-show="$index<4">
												<span class="rc-post-image">
													<img class="img-responsive" style="height:80px; width:80px;" src="{{z.photo}}" alt="Recent Post 2" />
												</span>
											<h5><a href="#">{{z.name}}</a></h5>
												<h5><a href="#">{{z.guide_territory}}</a></h5>
												<h5>{{z.Speciality}}<span class="rc-post-date small">Speciality&nbsp;&nbsp;</span></h5>
												<span star-rating rating-value="z.Review.Star" style="" class="" ></span>	
											</li>
										
										</ul>
									</div>
									<!-- END TAB 2 -->
									
									<!-- START TAB 3 -->
									<div class="tab-pane" id="toptips">
										<div class="inside-pane">
											<p><br><br><br><br><br><br><br><br></p>
										</div>
									</div>
									<!-- END TAB 3 -->
								</div>
								<!-- END TAB CONTENT -->
							</div>
							
							
							<div class="sidebar-widget">
								<!-- Sidebar Newsletter -->
								<div class="styled-box gray">
									<h3 class="text-upper">Contact Guide for Custom tour</h3>
									<form action="contactGuideMail.php" method="post">
										<label>Email Address</label>
										<input type="text" name="email" class="form-control input-style1 marb20" value="Enter Email Address" onfocus="if (this.value == 'Enter Email Address') { this.value = ''; }" onblur="if (this.value == '') { this.value = 'Enter Email Address'; }" />
										<input type="submit" name="submit" class="btn btn-primary text-upper marb20" value="Send" />
									</form>
								</div>
							</div>
							
								<div class="sidebar-widget">
								<!-- Sidebar Flickr Gallery -->
								<h3 class="text-upper">Guide Gallery</h3>
								<ul class="flickr-gal list-unstyled" ng-controller="TopGuideControl">
									<li ng-repeat="x in TopGuides" ng-show="$index==5||$index==7||$index==12||$index==13" ><img style="height:70px; width:120px;" class="img-responsive" src="{{x.photo}}" alt="Guide" /></li>
								
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