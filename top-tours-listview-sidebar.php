<!DOCTYPE html>
<html lang="en" dir="ltr">

	<!-- START head -->
	<head>
		<!-- Site meta charset -->
		<meta charset="UTF-8">
		
		<title>Tour Details | Guided Gateway - Authentic Affordable Travel</title>

		<!-- meta description --> <meta name="description" content="Authentic Afordable Travel in India" />

		<!-- meta keywords --> <meta name="keywords" content="travel
		guide tourism india" />
		
		<!-- meta viewport -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		
		<!-- favicon -->
		<link rel="icon" href="favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
		
		<!-- bootstrap 3 stylesheets -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
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
 <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script> 
<!--<script type="text/javascript"  src= "js/angular.min.js"></script>-->
<script type="text/javascript"  src="topTour.js"></script>

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
	<body>
		<!-- START #wrapper -->
		<div id="wrapper">
			<!-- START header -->
		<?php 
			
				include('MasterTopHeader.php'); 
			
			
			?>
			
			<!-- START #page-header -->
			<div id="">
				
					<div class="container">
						<div class="row">
							<section class="col-sm-6">
								<h1 class="text-upper"><i class="fa fa-plane" style="color:black;"></i>&nbsp;&nbsp;Top Tours</h1>
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
			
			<!-- START .main-contents -->
			<div class="main-contents">
				<div class="container" ng-app="topTours">
				  
					<div class="row"  ng-controller="toursCtrl">
					<a href="tour_detail_sidebar.php#?id={{x.tour_id}}">
						<div class="col-md-8" >
							<div class="row" ng-repeat="x in tours">
								<div class="col-md-12">
									<div class="tour-plans">
										<div class="plan-image">
                                            <a href="tour_detail_sidebar.php#?id={{x.tour_id}}">
											<img class="img-responsive" style="height:360px;" src="{{x.photo ==null ? 'img/SAMPLE_TAJ.jpg' : x.photo}}" alt="Tour image"/>
                                            </a>
											<div class="offer-box">
												<div class="offer-top">
													<span class="ft-temp alignright">{{x.tour_category}}</span>
													<span class="featured-cr text-upper">{{x.tour_location}}</span>
													<h2 class="featured-cy text-upper">{{x.tour_title}}</h2>
												</div>
												
												<div class="offer-bottom">
													<span class="featured-stf">Starting From </span>
													<span class="featured-spe">{{x.tour_price}}</span>
												</div>
											</div>
										</div>
										<div class="featured-btm box-shadow1">
											<span class="ft-hotel text-upper">{{x.tour_territory[0]}}</span>
											<span class="ft-plane text-upper">{{x.tour_duration}}</span>
											<span class="ft-tea text-upper" star-rating rating-value="5"></span>
											<span class="alignleft fa fa-eye">&nbsp;&nbsp; reviews</span> 
										</div>
										<div class="post-desc">
																						<a class="btn btn-primary marb20" href="tour_detail_sidebar.php?tour_id={{x.tour_id}}">DETAILS</a>
                                             <a id="bookButton" class="alignright" href="booking-form.php#?id1=0&id2={{x.tour_id}}"> <input type="submit" name="submit" class="btn btn-sm btn-success text-upper marb20" value="Book" /></a>
										</div>
									</div>
								</div><br>
							
<!--								<div class="clearfix"></div>-->
							</div>
							
						</div>
						</a>
						<!-- START #sidebar -->
						<aside id="sidebar" class="col-md-4">
							<div class="sidebar-widget">
								<!-- Sidebar recent popular posts -->
								<!-- START TABS -->
								<ul class="nav nav-tabs text-upper">
									<li class="active"><a href="#relatedtours" data-toggle="tab">Tours</a></li>
									<li><a href="#topguides" data-toggle="tab">Guides</a></li>
									<li><a href="#topdestinations" data-toggle="tab">Destinations</a></li>
                                    
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content gray box-shadow1 clearfix marb30">
									<!-- START TAB 1 -->
									<div class="tab-pane active" style="height:500px;" id="relatedtours" ng-controller="toursCtrl">
										<ul class="rc-posts-list list-unstyled">
											<li ng-repeat="x in tours" ng-show="$index<4">
												<span class="rc-post-image">
                                                    <a href="tour_detail_sidebar.php?id={{x.tour_id}}"	>	<img class="img-responsive" src="{{'x.photo' ==''||'x.photo' ? 'img/SAMPLE_TOUR.jpg' : x.photo}}" alt="Tour x" /></a>
												</span>
												<h5><a href="#">{{x.tour_title}}</a></h5>
												<span class="rc-post-date small">Starting Price&nbsp;{{x.tour_price}}</span><br/>
                                               <a href="booking-form.php#?id1=0&id2={{x.tour_id}}"> <input type="submit" name="submit" class="btn btn-primary text-upper marb20" value="Book" /></a>
											</li>
										</ul>
									</div>
									<!-- END TAB 1 -->
									
									<!-- START TAB 2 -->
									<div class="tab-pane"  id="topguides" style="height:500px;" ng-controller="guidescontrol">
										<ul class="list-unstyled">
											<li ng-repeat="z in guides" ng-show="$index<18 && z.photo!=null">
												<span class="rc-post-image">
                                                    <a href="guide-detail-sidebar.php?id2={{z.id}}"	>	<img class="img-responsive" style="height:70px; width:60px;" src="{{z.photo==null ? 'img/SAMPLE_TOUR.jpg' :z.photo}}" alt="Recent Post 2" /></a>
												</span>
											<h5><a href="#">{{z.name}}</a></h5>
												<h5><a href="#">{{z.guide_territory[0]}}</a></h5>
<!--												<h5>{{z.Speciality}}<span class="rc-post-date small">Speciality&nbsp;&nbsp;</span></h5>-->
												<span star-rating rating-value="z.review.rating" style="" class="" ></span>	
                                                 <a href="booking-form.php#?id1={{z.id}}&id2=0"> <input type="submit" name="submit" class="btn btn-primary  marb20" value="Book Now" /></a>
											</li>
										
										</ul>
									</div>
									<!-- END TAB 2 -->
									
									<!-- START TAB 3 -->
									<div class="tab-pane" id="topdestinations" style="height:500px;" ng-controller="placesCtrl">
										<ul class=" list-unstyled">
											<li ng-repeat="k in places" ng-show="$index<4">
												<span class="rc-post-image">
                                                    <a href="destination-detail-sidebar.php?id3={{k.ID}}">	<img class="img-responsive" style="height:80px;width:80px;" src="{{k.Media.Image[0]}}" alt="Tour 1" /></a>
												</span>
												<h5><a href="#">{{k.Name}}</a></h5>
												<span class="rc-post-date small">Best Visit:&nbsp;&nbsp;&nbsp;{{k.BestTimeToVisit}}</span><br/>
                                               <a href="#"> <input type="submit" name="submit" class="btn btn-primary text-upper marb20" value="Explore" /></a>
											</li>
										</ul>
									</div>
									<!-- END TAB 3 -->
								</div>
								<!-- END TAB CONTENT -->
							</div>
							
<!--
							<div class="sidebar-widget">
							
								<h3 class="text-upper">Related Tours</h3>
								<ul class="flickr-gal list-unstyled" ng-controller="toursCtrl">
									<li ng-repeat="tourslist in tours"><img class="img-responsive" src="{{tourslist.photo}}" alt="Tour Photo" /></li>
									
								</ul>
							</div>
-->
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
			<!-- START footer --> <?php include('MasterTopFooter.php'); ?> <!-- END footer -->
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