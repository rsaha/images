<?php
if(isset($_GET['id']))
{
    $tourID=$_GET['id'];
}
?>
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
		<!-- color scheme -->
		<link rel="stylesheet" type="text/css" href="css/colors/color3.css" title="color3" />
        
      <!--   <script src= "js/angular.min.js"></script>
        <script src="myDestination.js"></script> -->
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
        <script type="text/javascript"  src="topTour.js"></script>
		 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>
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
    font-size: 12px;
}
.rating .filled {
    color: #ff845e;
}
</style>

   <!-- <script src="https://maps.googleapis.com/maps/api/js"></script> -->
	<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<!--<script>
	//https://developers.google.com/maps/tutorials/fundamentals/adding-a-google-map
      function initialize() {
        var mapCanvas = document.getElementById('map');
        var mapOptions = {
          center: new google.maps.LatLng(23.555, 75.999),
          zoom: 8,
          mapTypeId: google.maps.MapTypeId.ROADMAP
        }
        var map = new google.maps.Map(mapCanvas, mapOptions)
      }
      google.maps.event.addDomListener(window, 'load', initialize);
    </script> -->
	</head>
	<!-- END head -->

	<!-- START body -->
	<body ng-app="topTours" ng-controller="tourDetailCtrl">
		<!-- START #wrapper --> 
		<div id="wrapper">
			<!-- START header -->
			<?php 
			
				include('MasterTopHeader.php'); 
			
			
			?>
			<!-- START #page-header -->
			<div id="" style="color:#ff845e;">
				
					<div class="container">
						<div class="row">
							<section class="col-sm-6">
								
								<h1 class="text-upper"><i class="fa fa-plane" style="color:black;"></i>&nbsp;&nbsp;{{tour.Title}}</h1>	
							</section>
							
							<!-- breadcrumbs -->
							<!-- <section class="col-sm-6">
								<ol class="breadcrumb">
									<li class="home"><a href="#"  style="color:black;">Home</a></li>
									<li><a href="#" style="color:black;">Tour #2</a></li>
									<li class="active"><span  style="color:black;">Agra, UP</span></li>
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
						<div id="page" class="col-md-8">
							<!-- START .tour-plans -->
							<div class="col-md-12">
							<div class="tour-plans">
								<div class="plan-image">
									<img class="img-responsive" src="{{tour.photo}}" alt="Tour Image" />
									<div class="offer-box">
										<div class="offer-top">
											<span class="ft-temp alignright">{{x.tour_category_id}}</span>
											<span class="featured-cr text-upper">{{tour.tour_location}}</span>
											<h2 class="featured-cy text-upper">{{tour.tour_duration}}</h2>
										</div>
										
										<div class="offer-bottom">
											<span class="featured-stf">Per Person </span>
											<span class="featured-spe">{{tour.tour_price}}</span>
										</div>
									</div>
								</div>
								
								<div class="featured-btm box-shadow1">
									
									<a class="ft-plane text-upper" style="font-weight:bold;" href="#">{{tour.tour_category_id}}</a>
									<a class="ft-tea text-upper" style="font-weight:bold;" href="#">{{tour.tour_inclusive}}</a>
                                    <a class="ft-hotel text-upper" style="font-weight:bold;" href="booking-form.php">From:&nbsp;&nbsp;{{tour.tour_startpoint}}&nbsp;&nbsp;-&nbsp;&nbsp;To:&nbsp;&nbsp;{{tour.tour_endpoint}}</a>
									
								</div>
								
								<h2 class="text-upper">Tour Information</h2>
								<p>"{{tour.tour_description}}"</p>
								<p><h5>Start Point : {{tour.tour_startPoint}} &nbsp;&nbsp;&nbsp;&nbsp; End Point : {{tour.tour_endPoint}}</h5></p>
								
							</div>
							<!-- END .tour-plans -->
							
							<!-- START TABS -->
							<ul class="nav nav-tabs text-upper">
								<li class="active"><a href="#tourPlan" data-toggle="tab">Tour Plan</a></li>
								<li><a href="#flightSchedule" data-toggle="tab">Places Covered</a></li>
								<li><a href="#additionalInfo" data-toggle="tab">Reviews</a></li>
							</ul>
							<!-- END TABS -->
							
							<!-- START TAB CONTENT -->
							<div class="tab-content gray box-shadow1 clearfix marb30">
								<!-- START TAB 1 -->
								<div class="tab-pane active" id="tourPlan">
									<!-- <ul class="plans-list list-unstyled">
										<li> -->
										<div class="col-md-4" style="padding:15px 15px 15px 15px">
											<div class="plan-info">
												<h4 class="text-upper">{{tour.tour_duration}}</h4>
												<p ng-repeat="x in tour.Itineary.Day.Spots"><span>{{x.Spot}}</span></p>
											    <h5>Lunch&nbsp:&nbsp{{tour.Itineary.Day.Lunch}}</h5>
											</div>
										</div>
										<div class="col-md-6 table-responsive" style="padding:15px 15px 15px 15px">
										<table class="table">
											<thead>
												<tr>
													
													<th>MapLocation</th>
													<th>Duration</th>
													<th>Entry Fees</th>
												</tr>
											</thead>
											<tbody ng-repeat="x in tour.Itineary.Day.Spots">
												<tr class="dark-gray">
													
													<td><a ng-href="#mapLocation" ng-click="getdata(x.MapLocation.Latitude,x.MapLocation.Longitude);">{{x.Spot}}</a></td>
													<td>{{x.Duration}}</td>
													<td>{{x.Entreefees}}</td>
												</tr>
											
											</tbody>
										</table>
									</div>
										
										<!-- </li> -->
										
										<!-- <li>
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
										</li> -->
									
								</div>
								<!-- END TAB 1 -->
								
								<!-- START TAB 2 -->
								<div class="tab-pane" id="flightSchedule">
									<div class="table-responsive">
										<table class="table">
											<thead>
												<tr>
													
													<th>Tour Description</th>
													<th>Spot</th>
													<th>Time Duration</th>
													
												</tr>
											</thead>
											<tbody ng-repeat="x in tour.Itineary.Day.Spots">
												<tr class="dark-gray">
													
													<td>{{x.Description}}</td>
													<td>{{x.Spot}}</td>
													<td>{{x.Duration}}</td>
													
												</tr>
											
											</tbody>
										</table>
									</div>
								</div>
								<!-- END TAB 2 -->
								
								<!-- START TAB 3 -->
								<div class="tab-pane" id="additionalInfo">
									<div class="inside-pane">
										Overall Rating&nbsp:&nbsp<span star-rating rating-value="tour.Reviews.Overall_rating"></span>
										<p>{{tour.Reviews.Overall_rating}}</p>
										
									</div>
								</div>
								<!-- END TAB 3 -->
							</div>
							</div>
							<!-- END TAB CONTENT -->
							<!--{{latit}}-->
							
							<div class="col-md-12" id="mapLocation" hello-maps="" latitude="latit" longitude="longit" style="width: 100%; height: 300px;">
							</div>
						</div>
						<!-- END #page -->
						<!-- START #sidebar -->
						<aside id="sidebar" class="col-md-4">
							<div class="sidebar-widget">
								<!-- Sidebar recent popular posts -->
								<!-- START TABS -->
								<ul class="nav nav-tabs text-upper">
									<li class="active"><a href="#relatedtours" data-toggle="tab">Tours</a></li>
									<li><a href="#topguides" data-toggle="tab">Guides</a></li>
									<li><a href="#lodging" data-toggle="tab">Lodging</a></li>
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content gray box-shadow1 clearfix marb30">
                                    <!-- START TAB 1 -->
									<div class="tab-pane active"  id="relatedtours" ng-controller="toursCtrl">
										<ul class="list-unstyled">
											<li ng-repeat="k in alltours" ng-show="$index<4">
												<span class="rc-post-image">
													<img class="img-responsive" src="{{k.photo}}" alt="Tour 1" />
												</span>
												<h5>{{k.Title}}</h5>
												<span class="rc-post-date small">Starting Price&nbsp;{{k.tour_price}}</span><br/>
                                               <a href="booking-form.php?tour_id={{k.tour_id}}"> <input type="submit" name="submit" class="btn btn-primary text-upper marb20" value="Book" /></a>
											</li>
										
										</ul>
									</div>
									<!-- END TAB 1 -->
									<!-- START TAB 2 -->
									<div class="tab-pane active"  id="topguides" ng-controller="guidescontrol">
										<ul class="list-unstyled">
											<li ng-repeat="z in guides" ng-show="$index<16 && $index==5||$index==7||$index==12||$index==13">
												<span class="rc-post-image">
													<img class="img-responsive" style="height:80px; width:65px;" src="{{z.photo}}" alt="Recent Post 2" />
												</span>
											<h5><a href="#">{{z.name}}</a></h5>
<!--												<h5><a href="#">{{z.guide_territory}}</a></h5>-->
<!--												<h5>{{z.Speciality}}<span class="rc-post-date small">Speciality&nbsp;&nbsp;</span></h5>-->
												<span star-rating rating-value="z.review.Star" style="" class="" ></span>	<br><br><br>
											</li>
										
										</ul>
									</div>
									<!-- END TAB 2 -->
									<!-- START TAB 3 -->
									<div class="tab-pane" id="lodging">
										<div class="inside-pane">
											<p>Coming Soon</p>
                                            <br><br><br><br><br><br><br><br><br><br>
										</div>
									</div>
									<!-- END TAB 3 -->
								</div>
								<!-- END TAB CONTENT -->
							</div>
							
							  <div class="col-sm-6 sidebar-widget">
                    <h3 class="column-title">Video Intro</h3>
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
					<iframe width="360" height="315" src="https://www.youtube.com/embed/0ohZyqgIyQI?autoplay=0" frameborder="0" allowfullscreen webkitallowfullscreen mozallowfullscreen></iframe>
					
                    </div>
                </div>
							<div class="sidebar-widget">
								<!-- Sidebar Newsletter -->
								<div class="styled-box gray">
									<h3 class="text-upper">Mail Us for Custom Tour</h3>
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
									<li><img class="img-responsive" src="{{tour.Media.Image[0]}}" alt="Flickr Photo" /></li>
									<li><img class="img-responsive" src="{{tour.Media.Image[1]}}" alt="Flickr Photo" /></li>
									
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