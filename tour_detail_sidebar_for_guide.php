<?php
	session_start();
	
	/* if(isset($_SESSION['userId']))
	{ */
		if(isset($_GET['id']))
		{
		$tourID = $_GET['id'];
		}
		include_once('db.php');

		$select1 = mysql_query("SELECT * FROM `tbl_tours` WHERE `tour_id` = $tourID && `status` != 0");
		$row1 = mysql_fetch_assoc($select1);
		$user_id=$row1["user_id"];
		$tour_category_id = $row1["tour_category_id"];
		$tour_title = $row1["tour_title"];
		$tour_location = $row1["tour_location"];
		$tour_description = $row1["tour_description"];
		$tour_duration = $row1["tour_duration"];
		$tour_price = $row1["tour_price"];
		$start_point = $row1["start_point"];
		$end_point = $row1["end_point"];
		$inclusive = $row1["inclusive"];
		$exclusive = $row1["exclusive"];
		$cancelation_policy = $row1["cancelation_policy"];
		$restrictions = $row1["restrictions"];
		$notes = $row1["notes"];
			
		$select2 = mysql_query("SELECT * FROM `tbl_tour_media_pictures` WHERE `tour_id` = $tourID");
		$row2 = mysql_fetch_assoc($select2);
		if(mysql_num_rows($select2) > 0 )
		{
			$picture_media_id = $row2["picture_media_id"];
			$tour_picture = $row2["tour_picture"];
		}
		
		$select3 = mysql_query("SELECT * FROM `tbl_tour_media_videos` WHERE `tour_id` = $tourID");
		$row3 = mysql_fetch_assoc($select3);
		if(mysql_num_rows($select3) > 0 )
		{
			$video_media_id = $row3["video_media_id"];
			$tour_video = $row3["tour_video"];
		}
		
	/* }
	else
	{
		include_once("signOut.php");
        header('Location:login.php');
		exit;
	} */
?>

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
         <style>
           #editButton{
			top: 20px;     
			height: 29px;
			position: absolute;
			right: 20px;
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
		<div id="wrapper" >
			<!-- START header -->
			<?php 
			
				include('MasterTopHeader.php'); 
			
			
			?>
			<!-- START #page-header -->
			<div id="" style="color:#ff845e;">
				
					<div class="container">
						<div class="row">
							<section class="col-sm-6">
								
								<h1 class="text-upper"><i class="fa fa-plane" style="color:black;"></i>&nbsp;&nbsp;<?php echo $tour_title; ?></h1>	
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
									<img class="img-responsive" src="{{'tour.photo'=='' ? 'tour.photo' :'img/SAMPLE_TAJ.jpg'}}" alt="TajMahal" />
									<div class="offer-box">
										<div class="offer-top">
											<span class="fa fa-tag alignright"> <?php echo $tour_category_id; ?> </span>
											
                                        <span class="fa fa-location-arrow" style="font-weight:bold;color:white"> <?php echo $tour_location; ?> </span>
                                        <h2 class="featured-cy text-upper"> <?php echo $tour_duration; ?> day(s)</h2>
										</div>
										
										<div class="offer-bottom">
<!--											<span class="featured-stf">Per Person </span>-->
											<span class="featured-spe"> <?php echo $tour_price; ?></span>
										</div>
									</div>
								</div>
								
								<div class="featured-btm box-shadow1">									
									<a class="fa fa-map-pin text-upper" style="color:black; font-size:12px; font-weight:bold;" href="#"> #### </a>
									<a class="fa fa-user text-upper" style="color:black; font-size:12px; font-weight:bold;" href="#"> <?php echo $user_id; ?> </a>
                                    <a class="fa fa-map-marker text-upper" style="color:black; font-size:12px; font-weight:bold;" href="#"> Start Point:&nbsp;&nbsp;<?php echo $start_point ?>&nbsp;&nbsp;-&nbsp;&nbsp; End Point:&nbsp;&nbsp;<?php echo $end_point; ?></a>
																	</div>
								<?php echo '<a id="editButton" onclick="editTour(' . $user_id . ',' . $row1['tour_id'] . ');" class="alignright"> <input type="submit" name="submit" class="btn btn-success text-upper " value="Edit" /></a>'; ?>
								
								
							</div>
							<!-- END .tour-plans -->
							<br><br><br>
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
												<p ng-repeat="x in tour.tour_itinerary"><span>{{x.tourist_spot}}</span></p>
											    <h5>Lunch&nbsp:&nbsp{{tour.tour_itinerary.Day.Lunch}}</h5>
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
											<tbody ng-repeat="x in tour.tour_itinerary">
												<tr class="dark-gray">
													
													<td><a ng-href="#mapLocation" ng-click="getdata(x.MapLocation.Latitude,x.MapLocation.Longitude);">{{x.tourist_spot}}</a></td>
													<td>{{x.intraday}}</td>
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
											<tbody ng-repeat="x in tour.tour_itinerary">
												<tr class="dark-gray">
													
													<td>{{x.description}}</td>
													<td>{{x.tourist_spot}}</td>
													<td>{{x.intraday}}</td>
													
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
							
                        
						</div>
                    
                    
						<!-- END #page -->
						<!-- START #sidebar -->
						<aside id="sidebar" class="col-md-4">
							<div class="sidebar-widget">
								<!-- Sidebar recent popular posts -->
								<!-- START TABS -->
								<ul class="nav nav-tabs text-upper">
									<li class="active"><a data-toggle="tab">Tour Information</a></li>
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content gray box-shadow1 clearfix marb30">
									<!-- START TAB 1 -->
									<div class="tab-pane active" style="height:600px;" id="topguides" ng-controller="guidescontrol">
										<br>
                                        <div class="col-md-12">
                                <p>Description : <?php echo $tour_description; ?></p>
                                <p><h5>Start Point : <?php echo $start_point; ?></h5></p>
                                <p><h5>End Point : <?php echo $end_point; ?></h5></p>
                               <p><h5>Cancellation Policy : <?php echo $cancelation_policy; ?></h5></p>
                               <p><h5>Restrcitions: <?php echo $restrictions; ?></h5></p>
                               <p>Notes &amp; Summary : <br/><?php echo $notes; ?></h5></p>
                        </div>
                </div>
								</div>
								<!-- END TAB CONTENT -->
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
<script>
function editTour(id1,id2) 
				{
					window.location.href = "edit_Tour.php?id1="+id1+"&id2="+id2+"";
					return false;
				}
</script>
		<!--[if lt IE 9]>
			<script type="text/javascript" src="js/html5shiv.js"></script>
		<![endif]-->

	</body>
</html>