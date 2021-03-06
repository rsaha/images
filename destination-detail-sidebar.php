<?php
 if(isset($_GET['id3']))
	{
	$place3 = $_GET['id3'];
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

        <!-- bootstrap 3 stylesheets -->
        <link rel="stylesheet" type="text/css" href="bs3/css/bootstrap.css" media="all" />
        <!-- template stylesheet -->
        <link rel="stylesheet" type="text/css" href="css/styles.css" media="all" />
        <!-- responsive stylesheet -->
        <link rel="stylesheet" type="text/css" href="css/responsive.css" media="all" />
        <!-- Load Fonts via Google Fonts API -->
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Karla:400,700,400italic,700italic" />
        <!-- color scheme -->
        <link rel="stylesheet" type="text/css" href="css/colors/color1.css" title="color1" />

        <script type="text/javascript" src="js/angular.min.js"></script>

        <script type="text/javascript" src="topPlacesDetail.js"></script>
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
        <style>
            #bookButton {
                top: 275px;
                position: absolute;
                right: 20px;
            }
        </style>
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

    <body ng-app="topPlaces" ng-controller="placeDetailCtrl">
        <!-- START #wrapper -->
        <div id="wrapper">
            <!-- START header -->
            <?php 
			
				include('MasterTopHeader.php'); 
			
			
			?>

                <!-- START #page-header -->
                <div id="">
                    <div class="">
                        <div class="container">
                            <div class="row">
                                <section class="col-sm-6">
                                    <h1 class="text-upper"><i class="fa fa-leaf" style="color:black;"></i>&nbsp;&nbsp;{{place.PlaceName}}</h1>
                                </section>

                                <!-- breadcrumbs -->

                            </div>
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
                                <!-- START .post-data -->
                                <div class="post-data">
                                    <div class="plan-image">
                                        <img class="img-responsive" style="width:770px; height:320px;" ng-src="{{place.Media.Image[0]}}" alt="Places Image" />
                                    </div>

                                    <ul class="featured-btm single-ft-btm list-unstyled box-shadow1">
                                        <li class="post-date"><a class="text-upper" ng-href="#">{{place.State}}</a></li>
                                        <li class="post-date"><a class="text-upper" ng-href="#">{{place.Category}}</a></li>
                                        <li class="post-category"><a class="text-upper" ng-href="#">{{place.BestTimeToVisit}}</a></li>
                                        <li class="post-category"><a class="text-upper" ng-href="#">Popularity: {{place.TravelIndex}}</a></li>
                                        <li class="post-author"><a class="text-upper" ng-href="{{place.Wiki}}">Wikipedia</a></li>
                                    </ul>
                                </div>
                                <!-- END .post-data -->
                                <a id="bookButton" onclick="contactForCustomTour();">
                                    <input type="submit" name="submit" class="btn btn-md btn-success text-upper marb20" value="Custom Tour" />
                                </a>
                                <!-- START .post-content -->
                                <article class="post-content">
                                    <p>{{place.Description}}</p>
<!--                                    <h5>Attractions</h5>-->
<!--
                                    <p>
                                        <ul>
                                            <li ng-repeat="y in place.Attractions">{{y}}</li>
                                        </ul>
                                        <p>{{y}}</p>
                                    </p>
-->
                                    <div class="sidebar-widget">
								<!-- Sidebar Contact info -->
								<div class="styled-box ">
                                   
									<h3 class="text-upper">Attractions</h3>
									
									<ul class="contact-info list-unstyled gray">
<!--										<li class="ct-phone">+44 - 123 - 4567890</li>-->
										 <li ng-repeat="y in place.Attractions">{{y}}</li>
									</ul>
								</div>
							</div>
<!--
                                    <p>
                                        <img class="alignleft" style="width:260px;height:168px;" src="{{place.Media.Image[0]}}" alt="Image in Post" />
                                        <h5>Transport Availability</h5>
                                        <ul>
                                            <li ng-repeat="y in place.Transport">{{y}}</li>
                                        </ul>
                                        <p>{{y}}</p>
                                    </p>
-->
 </article>
                                 
							<div class="">
								<!-- Sidebar Contact info -->
								<div class="styled-box  sidebar-widget">
                                    <img class="alignleft" style="width:260px;height:168px;" ng-src="{{place.Media.Image[0]}}" alt="Image in Post" />
									<h3 class="text-upper">Transport Availability</h3>
									
									<ul class="contact-info list-unstyled gray">
<!--										<li class="ct-phone">+44 - 123 - 4567890</li>-->
										 <li ng-repeat="y in place.Transport">{{y}}</li>
									</ul>
                                    
								</div>
							</div>
                                    <!-- BLOCKQUOTE -->
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                               
                                <!-- END .post-content -->
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
                                        <li class="urlUnchange"><a ng-href="#lodging" data-toggle="tab">Hotels</a></li>
                                    </ul>
                                    <!-- END TABS -->

                                    <!-- START TAB CONTENT -->
                                    <div class="tab-content gray box-shadow1 clearfix marb30">
                                        <!-- START TAB 1 -->
                                        <div class="tab-pane active" id="toptours">
                                            <div class="col-md-12">
                                                <ul class=" list-unstyled">
                                                    <li ng-repeat="k in alltours" ng-show="$index<3">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <span class="rc-post-image">
                                                    <a ng-href="tour_detail_sidebar.php#?id={{k.tour_id}}"	>	
                                                        <img class="img-responsive" ng-src="{{'k.photo' == null ? 'img/SAMPLE_TOUR.jpg' : k.photo[0]}}" alt="Tour Image" /></a>
												</span>
                                                                <h5><a ng-href="#">{{k.tour_title}}</a></h5>
                                                                <span class="rc-post-date small">Starting Price&nbsp;{{k.tour_price}}</span>
                                                                <a ng-href="tour_detail_sidebar.php#?id={{k.tour_id}}">
                                                                    <input type="submit" name="submit" class="pull-right btn btn-sm btn-primary text-upper marb20" value="Explore" />
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- END TAB 1 -->

                                        <!-- START TAB 2 -->
                                        <div class="tab-pane" id="topguides" >
                                            <div class="col-md-12">
                                                <ul class="list-unstyled">
                                                    <li ng-repeat="z in guides" ng-show="$index<3">
                                                        <span class="rc-post-image">
                                                    <a ng-href="guide-detail-sidebar.php#?id2={{z.id}}">	
                                                        <img class="img-responsive" style="height:70px; width:60px;" ng-src="{{z.photo==null ? 'img/new_user.png' :z.photo}}" alt="Guide Image" /></a>
												</span>
                                                        <h5><a ng-href="#">{{z.name}}</a></h5>
                                                        <h5><a ng-href="#">{{z.guide_territory[0]}}</a></h5>
                                                        <!--												<h5>{{z.Speciality}}<span class="rc-post-date small">Speciality&nbsp;&nbsp;</span></h5>-->
                                                        <span star-rating rating-value="z.review.rating" style="" class=""></span>
                                                        <a ng-href="booking-form.php#?id1={{z.id}}&&id2=0">
                                                            <input type="submit" name="submit" class="pull-right btn btn-sm btn-primary text-upper marb20" value="Book Now" />
                                                        </a>
                                                        <br>
                                                        <br>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- END TAB 2 -->
                                        <!-- START TAB 3 -->
                                        <!-- lodging hotels -->
                                        <div class="tab-pane" id="lodging">
                                            <div class="col-md-12">
                                                <ul class="list-unstyled">
                                                    <li ng-repeat="lodge in lodging" ng-show="$index<3 ">
                                                        <span class="rc-post-image">
                                                    <a ng-href="guide-detail-sidebar.php#?id2={{lodge.id}}">	<img class="img-responsive" style="height:80px; width:65px;" ng-src="{{lodge.Media.Image[0]}}" alt="Hotel" /></a>
												</span>
                                                        <h5><a ng-href="#">{{lodge.Address}}</a></h5>

                                                        <span style="" class="">{{lodge.Description}}</span>
                                                        <span style="" class="">Coming Soon from our partners</span>
                                                      
                                                        <a ng-href="#" style="margin-left:110px;">
                                                            <input type="submit" name="submit" class="pull-right btn btn-sm btn-primary  marb20" value="Explore" />
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- END TAB 3 -->
                                    </div>
                                    <!-- END TAB CONTENT -->
                                    <div class="row">
    <div class="col-md-4">
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- GG LIst Ad -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-8172692591429277"
     data-ad-slot="1612152742"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
    </div>
</div>
                                </div>



                                <!-- div class="sidebar-widget">
								<!-- Sidebar Newsletter >
								<div class="styled-box gray">
									<h3 class="text-upper">Contact for Custom Tour</h3>
									<form action="#" method="post">
										<label>Email Address</label>
										<input type="text" name="email" class="form-control input-style1 marb20" value="Enter Email Address" onfocus="if (this.value == 'Enter Email Address') { this.value = ''; }" onblur="if (this.value == '') { this.value = 'Enter Email Address'; }" />
										<input type="submit" name="submit" class="btn btn-primary text-upper marb20" value="Submit" />
									</form>
								</div>
							</div -->

                                <!-- div class="sidebar-widget" ng-controller="placesCtrl">
								<h3 class="text-upper">Destination Gallery</h3>
								<ul class="flickr-gal list-unstyled">
									<li ng-repeat="z in places"><img style="height:70px; width:120px;" class="img-responsive" src="{{z.Media.Image[0]}}" alt="image" /></li>
									
								</ul>
							</div -->
                                <div class="sidebar-widget" ng-controller="placesCtrl">
                                    <!-- Sidebar Flickr Gallery -->
                                    <h3 class="text-upper">Pinterest Gallery</h3>
                                    <a data-pin-do="embedBoard" data-pin-board-width="400" data-pin-scale-height="240" data-pin-scale-width="80" ng-href="https://www.pinterest.com/guidedgateway/northern-region/"></a>
                                    </ul>
                                </div>
                            
                                 <div class="col-md-12 sidebar-widget gray" >
                                <h4 class="modal-title" id="contactForCustomTourModalLabel">Contact For Custom Tour</h4>
                                    <!-- Sidebar Newsletter -->
                                    <div class="">
                                        <form action="contactForCustomTourMail.php" method="post">
                                            <label>Email Address</label>
                                            <input type="text" name="email" class="form-control input-style1 marb20" value="Enter Email Address.." onfocus="if (this.value == 'Enter Email Address') { this.value = ''; }" onblur="if (this.value == '') { this.value = 'Enter Email Address'; }" />
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control input-style1 marb20" placeholder="Enter Full Name.." />
                                            <label>Mobile Number</label>
                                            <input type="text" name="mobile" class="form-control input-style1 marb20" placeholder="Enter Mobile Number.." />
                                            <input type="submit" name="submit" class="btn btn-primary text-upper marb20" placeholder="Send" />
                                        </form>
                                    </div>
                               
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


        <div id="contactForCustomTourModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="contactForCustomTourModalLabel" aria-hidden="true">
            <input type="hidden" id="contactForCustomTourID" name="contactForCustomTourID" value="" />
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="contactForCustomTourModalLabel">Contact For Custom Tour</h4>
                    </div>
                    <div class="modal-body gray">
                            <div class="col-md-12 gray" >
                               
                                    <!-- Sidebar Newsletter -->
                                    <div class="gray">
                                        <form action="contactForCustomTourMail.php" method="post">
                                            <label>Email Address</label>
                                            <input type="text" name="email" class="form-control input-style1 marb20" value="Enter Email Address.." onfocus="if (this.value == 'Enter Email Address') { this.value = ''; }" onblur="if (this.value == '') { this.value = 'Enter Email Address'; }" />
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control input-style1 marb20" placeholder="Enter Full Name.." />
                                            <label>Mobile Number</label>
                                            <input type="text" name="mobile" class="form-control input-style1 marb20" placeholder="Enter Mobile Number.." />
                                            <input type="submit" name="submit" class="btn btn-primary text-upper marb20" placeholder="Send" />
                                        </form>
                                    </div>
                               
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function contactForCustomTour() {
                $('#contactForCustomTourModal').modal('show');
            }
        </script>
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
