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

    <!-- Google Analytics -->
    <script>
        (function (i, s, o, g, r, a, m) {
            i['GoogleAnalyticsObject'] = r;
            i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
            a = s.createElement(o),
                m = s.getElementsByTagName(o)[0];
            a.async = 1;
            a.src = g;
            m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');

        ga('create', 'UA-64862528-1', 'auto');
        ga('send', 'pageview');
    </script>

    <script type="text/javascript" src="js/angular.min.js"></script>
    <script type="text/javascript" src="topTourDetail.js"></script>
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
        #bookButton {
            top: 300px;
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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
        <script type='text/javascript'>
            jQuery(document).ready(function ($) {
                $(".urlUnchange").click(function (event) {
                    event.preventDefault();
                });
            });
        </script>
   
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

                            <h1 class="text-upper"><i class="fa fa-plane" style="color:black;"></i>&nbsp;&nbsp; {{tour.tour_title}}</h1>
                        </section>
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
                                        <img class="img-responsive" style="width:770px; height:320px;" ng-src="{{tour.photo ==null ? 'img/SAMPLE_TAJ.jpg' : tour.photo[0]}}" alt="Tour Img" />
                                        <div class="offer-box">
                                            <div class="offer-top">
                                                <span class="fa fa-tag alignright"> {{tour.tour_category}}</span>

                                                <span class="fa fa-location-arrow" style="font-weight:bold;color:white"> {{tour.tour_location}}</span>
                                                <h2 class="featured-cy text-upper"> {{tour.tour_duration}} day(s)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>
                                            </div>

                                            <div class="offer-bottom">
                                                <!--											<span class="featured-stf">Per Person </span>-->
                                                <span class="featured-spe">Rs. {{tour.tour_price}}<span style="font-size:20px"> Per Person</span></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="featured-btm box-shadow1">
                                        <a class="fa fa-map-pin text-upper" style="color:black; font-size:12px; font-weight:bold;" ng-href="#"> {{tour.tour_territory[0]}}</a>
                                        <a class="fa fa-user text-upper" style="color:black; font-size:12px; font-weight:bold;" ng-href="#"> {{tour.guide_id}}</a>
                                        <a class="fa fa-map-marker text-upper" style="color:black; font-size:12px; font-weight:bold;" ng-href="#">Start Point:&nbsp;&nbsp;{{tour.start_point}}&nbsp;&nbsp;-&nbsp;&nbsp;End Point:&nbsp;&nbsp;{{tour.end_point}}</a>
                                    </div>
                                    <a id="bookButton" ng-href="booking-form.php#?id1=0&id2={{tour.tour_id}}" class="alignright">
                                        <input type="submit" name="submit" class="btn btn-success text-upper " value="Book" />
                                    </a>
                                    <h2 class="text-upper">Tour Information</h2>
                                    <p>Description : {{tour.tour_description}}</p>
                                    <p>
                                        <h5>End Point : {{tour.end_point}}</h5></p>
                                    <p>
                                        <h5>Cancellation Policy : {{tour.cancelation_policy}}</h5></p>
                                    <p>
                                        <h5>Restrcitions: {{tour.restrictions}}</h5></p>
                                    <p>Notes &amp; Summary :
                                        <br/>{{tour.notes}}</h5>
                                    </p>

                                </div>
                                <!-- END .tour-plans -->

                                <!-- START TABS -->
                                <ul class="nav nav-tabs text-upper">
                                    <li class="active"><a ng-href="#tourPlan" data-toggle="tab">Tour Plan</a></li>
                                    <li><a ng-href="#flightSchedule" data-toggle="tab">Places Covered</a></li>
                                    <li><a ng-href="#additionalInfo" data-toggle="tab">Reviews</a></li>
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


                            <div class="col-md-12" ng-controller="tourDetailCtrl" id="mapLocation" hello-maps="" latitude="{{latit}}" longitude="{{longit}}" style="width: 100%; height: 300px;">
                            </div>
                        </div>


                        <!-- END #page -->
                        <!-- START #sidebar -->
                        <aside id="sidebar" class="col-md-4">
                            <div class="sidebar-widget">
                                <!-- Sidebar recent popular posts -->
                                <!-- START TABS -->
                                <ul class="nav nav-tabs text-upper">
                                    <li class="active urlUnchange"><a ng-href="#toptours" data-toggle="tab">Tours</a></li>
                                    <li class="urlUnchange"><a ng-href="#topguides" data-toggle="tab">Guides</a></li>
                                    <li class="urlUnchange"><a ng-href="#lodging" data-toggle="tab">Lodging</a></li>
                                    <li class="urlUnchange"><a ng-href="#topreview" data-toggle="tab">Reviews</a></li>
                                </ul>
                                <!-- END TABS -->

                                <!-- START TAB CONTENT -->
                                <div class="tab-content gray box-shadow1 clearfix marb30">
                                    <div class="tab-pane active" style="height:310px;" id="toptours">
                                        <ul class="rc-posts-list list-unstyled">
                                            <li ng-repeat="x in tours" ng-show="$index<3">
                                                <span class="rc-post-image">
                                                    <a ng-href="tour_detail_sidebar.php#?id={{x.tour_id}}"	>	
                                                        <img class="img-responsive"  ng-src="{{x.photo ==null ? 'img/SAMPLE_TAJ.jpg' : x.photo[0]}}" alt="Tour 1" /></a>
												</span>
                                                <h5>{{x.tour_title}}</h5>
                                                <h5>{{x.tour_location}}</h5>
                                                <span class="rc-post-date small">Starting Price&nbsp;{{x.tour_price}}</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- START TAB 2 -->
                                    <div class="tab-pane" style="height:310px;" id="topguides">
                                        <div class="row">
                                            <ul class="list-unstyled">
                                                <br>
                                                <li class="" ng-repeat="z in guides" ng-show="$index<3 ">
                                                    <div class="col-md-11 col-md-offset-1"><span class="rc-post-image">
                                                    <a ng-href="guide-detail-sidebar.php#?id2={{z.id}}" target="_blank">	
                                                        <img class="img-responsive" ng-src="{{z.photo==null ? 'img/new_user.png' :z.photo}}" alt="Recent Post 2" />
                                                    </a>
												</span>
                                                        <h5><a ng-href="#">{{z.name}}</a></h5>
                                                        <h5><a ng-href="#">{{z.guide_territory[0]}}</a></h5>
                                                        <!--												<h5>{{z.Speciality}}<span class="rc-post-date small">Speciality&nbsp;&nbsp;</span></h5>-->
                                                        <span star-rating rating-value="z.review.Star" style="" class=""></span>
                                                        <br>
                                                        <br>
                                                        <!-- a href="booking-form.php#?id1={{z.id}}&id2=0"> <input type="submit" name="submit" class="pull-right btn btn-sm btn-primary  marb20" value="Book Now" /></a-->
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- END TAB 2 -->
                                    <!-- lodging hotels -->
                                    <div class="tab-pane" style="height:310px;" id="lodging">
                                        <ul class="rc-posts-list list-unstyled">
                                            <li ng-repeat="lodge in lodging" ng-show="$index<2 ">
                                                <span class="rc-post-image">
                                                    <a ng-href="">	<img class="img-responsive" ng-src="{{lodge.Media.Image[0]}}" alt="Hotel" /></a>
												</span>
                                                <h5><a href="#">{{lodge.Address}}</a></h5>

                                                <span style="" class="">{{lodge.Description}}</span>
                                                <!--                                                <span  style="" class="" >Coming Soon from our partners</span>-->
                                                <a href="#">
                                                    <input type="submit" name="submit" class="pull-right btn btn-sm btn-primary  marb20" value="Explore" />
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                    <!-- START TAB 4 -->
                                    <div class="tab-pane" id="topreview" style="height:310px;">
                                        <ul class="list-unstyled">
                                            <p>No Reviews Yet
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                            </p>
                                        </ul>
                                    </div>
                                    <!-- END TAB 4 -->
                                </div>
                                <!-- END TAB CONTENT -->

                                <br/>
                                <br/>
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

                                <div class="sidebar-widget" ng-controller="toursCtrl">
                                    <!-- Sidebar Flickr Gallery -->
                                    <h3 class="text-upper">Image Gallery</h3>
                                    <ul class="flickr-gal list-unstyled">
                                        <li ng-repeat="x in tours" ng-show="$index<4">
                                            <img class="img-responsive" ng-src="{{x.photo ==null ? 'img/SAMPLE_TAJ.jpg' : x.photo[0]}}" alt="Tour Img" />

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
