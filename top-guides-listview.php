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
    
    div.short-text
        {
            white-space:nowrap; 
            width:10em; 
            overflow:hidden; 
            text-overflow:ellipsis;
        }


	</style>
<script src= "http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
   <script src="guideList.js"></script>
<!--<script type="text/javascript"  src="topTour.js"></script>-->
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
					<div class="row ">
					  <div class="col-md-8">
							<div class="row bom-contents" ng-controller="guideCtrl">
						<div class="col-md-4" ng-repeat="x in allguides" ng-show="$index<18" >
							 <div	class="ft-item"> 
						  <span class="ft-image">
						  <a href="guide-detail-sidebar.php#?id2={{x.id}}">
							 <img style="height:150px;" class="img-responsive"  src="{{x.photo == null ? 'img/userDefaultIcon.png' : x.photo}}" alt="Top Guide" /> </a>
						  </span>
							  <span style="color:black;" class="fa fa-map-marker text-upper">&nbsp;{{x.city}}&nbsp;</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							  <span style="color:black;" class="fa fa-hourglass text-upper" >&nbsp;{{x.experiance_in_year}}&nbsp;</span>
							  <br>
                            <span style=" font-size:11px;color:black;" class="fa fa-book text-upper">&nbsp;{{x.language_known[0][0]}}&nbsp;</span>
								</div> 
					
							<div class="ft-foot">
                                <div class="short-text ft-title text-upper" style="font-size:16px ; color:white;" title="{{x.name}},&nbsp;&nbsp;{{x.gender}}">
                                &nbsp;{{x.name}},&nbsp;&nbsp;{{x.gender}}&nbsp;
                                </div>
<!--							<h4 class="ft-title text-upper" style="color:#686868">&nbsp;{{x.name}},&nbsp;&nbsp;{{x.gender}}&nbsp;</h4> -->
							<!-- <span class="ft-offer text-upper">{{x.Tours.Count}} Tours</span>  -->
							</div> 
					
							<div class="ft-foot-ex"> 
								<span class="fa fa-trophy text-upper alignleft">&nbsp;{{x.Tours.Count}} Tours&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;
								<span star-rating rating-value="x.Review.Star" class="aligncenter"></span>
								<span class="alignright ">&nbsp;{{x.Review.Count}} reviews&nbsp;</span> 							
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
                                    <li><a href="#relatedguides" data-toggle="tab">Guides</a></li>
									<li><a href="#topdestinations" data-toggle="tab">Places</a></li>
									<li><a href="#lodging" data-toggle="tab">Hotels</a></li>
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content gray box-shadow1 clearfix marb30" >
									<!-- START TAB 1 -->
									<div class="tab-pane active"  style="height:600px;" id="toptours"  ng-controller="tourCtrl">
										<ul class="rc-posts-list list-unstyled">
											<li ng-repeat="x in alltours" ng-show="$index<4">
												<span class="rc-post-image">
                                                    <a href="tour_detail_sidebar.php?id={{x.tour_id}}"><img class="img-responsive" src="{{'x.photo' ==''||'x.photo' ? 'img/SAMPLE_TOUR.jpg' : x.photo}}" alt="Tour 1" /></a>
												</span>
												<h5>{{x.tour_title}}</h5>
												<span class="rc-post-date small">Starting Price&nbsp;{{x.tour_price}}</span><br/>
                                               <a href="booking-form.php#?id1=0&&id2={{x.tour_id}}"> <input type="submit" name="submit" class="btn btn-primary  marb20" value="Book Now" /></a><br><br>
											</li>
										</ul>
									</div>
									<!-- END TAB 1 -->
                                    <!-- START TAB 2 -->
									<div class="tab-pane"  id="relatedguides" style="height:500px;" ng-controller="guidescontrol">
										<ul class="list-unstyled">
											<li ng-repeat="z in guides" ng-show="$index<18 && z.photo!=null">
												<span class="rc-post-image">
                                                    <a href="guide-detail-sidebar.php?id2={{z.id}}"	>	<img class="img-responsive" style="height:70px; width:60px;" src="{{z.photo==null ? 'img/SAMPLE_TOUR.jpg' :z.photo}}" alt="Recent Post 2" /></a>
												</span>
											<h5><a href="#">{{z.name}}</a></h5>
												<h5><a href="#">{{z.guide_territory[0]}}</a></h5>
<!--												<h5>{{z.Speciality}}<span class="rc-post-date small">Speciality&nbsp;&nbsp;</span></h5>-->
												<span star-rating rating-value="z.review.rating" style="" class="" ></span>	
                                                 <a href="booking-form.php#?id1={{z.id}}&id2=0"> <input type="submit" name="submit" class="btn btn-primary  marb20" value="Book Now" /></a><br><br>
											</li>
										
										</ul>
									</div>
									<!-- END TAB 2 -->
									<!-- START TAB 3 -->
									<div class="tab-pane" id="topdestinations"  style="height:600px;" ng-controller="placeCtrl">
										<ul class="rc-posts-list list-unstyled">
											<li ng-repeat="k in allplaces" ng-show="$index<4">
												<span class="rc-post-image">
                                                <a href="destination-detail-sidebar.php?id3={{k.ID}}">
													<img class="img-responsive" style="height:80px;width:80px;" src="{{k.Media.Image[0]}}" alt="Tour 1" />
                                                </a>
												</span>
												<h5>{{k.Name}}</h5>
												<span class="rc-post-date small">Best Time to Visit:&nbsp;{{k.BestTimeToVisit}}</span><br/>
                                               <a href="destination-detail-sidebar.php?id3={{k.ID}}"> <input type="submit" name="submit" class="btn btn-primary text-upper marb20" value="Explore" /></a>
											</li>
										</ul>
									</div>
									<!-- END TAB 3 -->
									<!-- START TAB 4 -->
									  <!-- lodging hotels -->
                                    <div class="tab-pane"  id="lodging"  style="height:600px;" ng-controller="hotelControl">
										<ul class="rc-posts-list list-unstyled">
											<li ng-repeat="lodge in lodging" ng-show="$index<4 ">
												<span class="rc-post-image">
                                                    <a href="guide-detail-sidebar.php#?id2={{lodge.id}}">	<img class="img-responsive" style="height:80px; width:65px;" src="{{lodge.Media.Image[0]}}" alt="Hotel" /></a>
												</span>
											<h5><a href="#">{{lodge.Address}}</a></h5>
											
												<span  style="" class="" >{{lodge.Description}}</span>
                                                <span  style="" class="" >{{lodge.PricePerNight}}Per Night</span><br><br>
                                                 <a href="#" style="margin-left:110px;"> <input type="submit" name="submit" class="btn btn-primary  marb20" value="Explore" /></a>
											</li> 
										
										</ul>
									</div>
									<!-- END TAB 4 -->
								</div>
								<!-- END TAB CONTENT -->
							</div>
							
							
<!--
							<div class="sidebar-widget">
								
								<h3 class="text-upper">Guide Gallery</h3>
								<ul class="flickr-gal list-unstyled" ng-controller="guideCtrl">
									<li ng-repeat="x in allguides" ng-show="$index==5||$index==7||$index==12||$index==13" ><img style="height:70px; width:120px;" class="img-responsive" src="{{x.photo}}" alt="Guide" /></li>
								</ul>
							</div>
-->
						</aside>
					</div><br>
					<!-- START .pagination -->
					<ul class="pagination">
						<li><a href="#">&lsaquo;</a></li>
						<li class="active"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#">3</a></li>
						<li><a href="#">&rsaquo;</a></li>
					</ul>
					<!-- END .pagination -->
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