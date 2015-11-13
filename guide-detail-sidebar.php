<?php
 if(isset($_GET['id2']))
	{
	$guideid2 = $_GET['id2'];
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
    color: #ffc203;
}

	</style>
        
        <style>
            #bookButton{
			top: 380px;
			position: absolute;
			right: 20px;
		}
        </style>
	
  
	</head>
	<!-- END head -->

	<!-- START body -->
	<body ng-app="myAllGuide" ng-controller="guideControl" >
		<!-- START #wrapper -->
		<div id="wrapper" >

			<!-- START header -->
			<?php 
			
				include('MasterTopHeader.php'); 
			
			
			?>
			
			<!-- START #page-header -->
			<div id="" style="color:#ff845e;">
				
					<div class="container">
						<div class="row col-md-12 col-xs-12">
							
							
							
							
								<h1 class="text-upper">
								    
								<i class="fa fa-user-secret" style="color:black;"></i>&nbsp;&nbsp;{{guidesdetail.name}}&nbsp;&nbsp;
                                    <span style="color:black;" star-rating rating-value=5>
								    
<!--								</span><span star-rating rating-value="tg.ReviewSummary.Star"></span>-->
								    
								</h1>	
							
							
							
							
							
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
			<div class="main-contents" >
				<div class="container">
					<div class="row" >
						<!-- START #page -->
                        <div id="page" class="col-md-8" >
							<!-- START .post-data -->
							<div class="post-data">
								<div class="plan-image">
									<img class="img-responsive" src="{{guidesdetail.cover_photo ==null ? 'img/SAMPLE_TAJ.jpg' : guidesdetail.photo}}" alt="Kolkata, WB"/>
									  
								
                                    
								</div>
								
								<ul class="featured-btm single-ft-btm list-unstyled box-shadow1">
									<li class="author-img"><img class="img-circle img-wt-border" style=height:80px;width:80px; src="{{ guidesdetail.photo ==null ? 'img/userDefaultIcon.png' : guidesdetail.photo}}" alt="Guide" /></li>
									<li class="post-author"><a class="text-upper" >{{guidesdetail.gender}}</a></li>
									<li class="fa fa-map-marker"><a class=""> {{guidesdetail.city}}</a></li>
                                    	<li class="fa fa-hourglass"><a class=""> {{guidesdetail.experiance_in_year}}</a></li>
                                    <li class="fa fa-book"><a class=""> {{guidesdetail.guide_interest}}</a></li>
<!--									<li class="post-date"><span class="alignright" star-rating rating-value="tg.ReviewSummary.Star" ></span></li>-->
									
								</ul>
							</div>
							<!-- END .post-data -->
							 <a id="bookButton" href="booking-form.php#?id1={{guidesdetail.id}}&id2=0"> <input type="submit" name="submit" class="btn btn-md btn-success text-upper marb20" value="Book" /></a>
							<!-- START .post-content -->
							<article class="post-content">
								<p>{{guidesdetail.guide_summary}}Guide is professional. He is trained, examined and registered with the Institute of Tourist Guiding which awards them the highly acclaimed Blue Badge. Have further professional, academic and other specialist qualifications to further illuminate your tour.</p> 
								<p>

He provide a number of example tours on our site, but we can completely customise to suit your needs. We cover many different languages - between them, our guide can speak over 40 different languages.</p>
								<p>
									<img class="alignleft" src="img/feature_detail_tour.jpg" alt="Top Tour" />
									<br>
                                    
								</p>
								
    <div style="padding-left:50px;">
<h3 class="text-upper">Tours From {{guidesdetail.name}}</h3>
<ul class="list-unstyled">
											<li>
												<span class="rc-post-image">
													<img class="img-responsive" src="img/SAMPLE_TOUR.jpg" alt="Tour 1" />
												</span>
												<h5><a href="tour_detail_sidebar.php?id2=50001">Very nice tour of historic Bengal></h5>
												<span class="rc-post-date small">Starting Price</span>INR 1500 per Person<br/>
                                               <a href="booking-form.php?id2=50001"> <input type="submit" name="submit" class="btn btn-primary  marb20" value="Book Now" /></a>
											</li>
										</ul>
									</div>
                                <br><br>
							</article>
							<!-- END .post-content -->
								<div class="styled-box gray">
									<h3 class="text-upper">What people are saying About Guide</h3>
									<form action="contactGuideMail.php" method="post">
										<label></label>
										<input type="text" name="email" class="form-control input-style1 marb20" value="Add comment here.." onfocus="if (this.value == 'Enter Email Address') { this.value = ''; }" onblur="if (this.value == '') { this.value = 'Enter Email Address'; }" />
										<input type="submit" name="submit" class="btn btn-primary text-upper marb20" value="Add comment" />
									</form>
                                    <h5 class="text-upper">No previous reviews available, Be the first</h5>
								</div>
						</div>
						<!-- END #page -->
						
						<!-- START #sidebar -->
						<aside id="sidebar" class="col-md-4">
							<div class="sidebar-widget">
								<!-- Sidebar recent popular posts -->
								<!-- START TABS -->
								<ul class="nav nav-tabs text-upper">
									<li class="active"><a href="#toptours" data-toggle="tab">Tours</a></li>
									<li><a href="#relatedGuides" data-toggle="tab">Guides</a></li>
									<li><a href="#toptips" data-toggle="tab">Advices</a></li>
                                    <li><a href="#topreviews" data-toggle="tab">Reviews</a></li>
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content gray box-shadow1 clearfix marb30">
									<!-- START TAB 1 -->
									
									<div class="tab-pane active" style="height:500px;" id="toptours" ng-controller="TourControl">
                                      
										<ul class="rc-posts-list list-unstyled">
											<li ng-repeat="x in alltours | filter:{ guide_id:idn }"  ng-if="x.guide_id==idn" ng-show="$index<4">
												<span class="rc-post-image">
                                                    <a href="tour_detail_sidebar.php#?id={{x.tour_id}}"	><img class="img-responsive" src="{{x.photo ==null ? 'img/SAMPLE_TAJ.jpg' : x.photo}}" alt="Tour 1" /></a>
												</span>
												<h5><a href="#">{{x.tour_title}}</a></h5>
												<span class="rc-post-date small">Starting Price&nbsp;{{x.tour_price}}</span><br/>
                                               <a href="booking-form.php#?id1=0&&id2={{x.tour_id}}"> <input type="submit" name="submit" class="btn btn-primary  marb20" value="Book Now" /></a>
											</li>
										</ul>
									</div>
									<div class="tab-pane" style="height:500px;" id="relatedGuides" ng-controller="TopGuideControl">
										<ul class="list-unstyled">
											<li ng-repeat="z in TopGuides" ng-show="$index<17 && z.photo!=null">
												<span class="rc-post-image">
                                                    <a href="guide-detail-sidebar.php#?id2={{z.id}}" target="_blank"><img class="img-responsive" style="height:70px; width:60px;" src="{{z.photo==null ? 'img/SAMPLE_TOUR.jpg' :z.photo}}" alt="Guide Image" /></a>
												</span>
											<h5><a href="#">{{z.name}}</a></h5>
												<h5><a href="#">{{z.guide_territory[0]}}</a></h5>
<!--												<h5>{{z.Speciality}}<span class="rc-post-date small">Speciality&nbsp;&nbsp;</span></h5>-->
												<span star-rating rating-value="z.review.Star" style="" class="" ></span>	
                                                 <a href="booking-form.php#?id1={{z.id}}&&id2=0"> <input type="submit" name="submit" class="btn btn-primary  marb20" value="Book Now" /></a>
											</li>
										
										</ul>
									</div>
									<!-- END TAB 1 -->
									
									<!-- START TAB 2 -->
									<div class="tab-pane" style="height:500px;" id="topreviews" ng-controller="TourControl">
										<ul class="list-unstyled">
                                            <p>No Reviews Yet<br><br><br><br><br><br><br><br></p>										
										</ul>
									</div>
									<!-- END TAB 2 -->
									
									<!-- START TAB 3 -->
									<div class="tab-pane" style="height:500px;" id="toptips">
										<div class="inside-pane">
											<p>Coming Soon<br><br><br><br><br><br><br><br></p>
										</div>
									</div>
									<!-- END TAB 3 -->
								</div>
								<!-- END TAB CONTENT -->
							</div>
							<div class="sidebar-widget">
								<!-- Sidebar Newsletter -->
								<div class="styled-box gray">
									<h3 class="text-upper">Contact for Custom tour</h3>
									<form action="contactGuideMail.php" method="post">
                                        <label>Email Address</label>
										<input type="text" name="email" class="form-control input-style1 marb20" value="Enter Email Address.." onfocus="if (this.value == 'Enter Email Address') { this.value = ''; }" onblur="if (this.value == '') { this.value = 'Enter Email Address'; }" />
                                        <label>Name</label>
										<input type="text" name="name" class="form-control input-style1 marb20" value="Enter Full Name.."  />
										<label>Mobile Number</label>
										<input type="text" name="mobile" class="form-control input-style1 marb20" value="Enter Mobile Number.."  />
										<input type="submit" name="submit" class="btn btn-primary text-upper marb20" value="Send" />
									</form>
								</div>
							</div>
							
								<div class="sidebar-widget">
								<!-- Sidebar Flickr Gallery -->
								<h3 class="text-upper">Image Gallery</h3>
								<ul class="flickr-gal list-unstyled" ng-controller="TourControl">
								<li ng-repeat="x in alltours" ng-show="$index<4">
								<img class="img-responsive" src="{{'x.photo' == null ? 'img/SAMPLE_TOUR.jpg' : x.photo}}"           alt="Tour Image" />
								</li>
									
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