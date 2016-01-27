<!DOCTYPE html>
<html lang="en" dir="ltr">

<!-- START head -->

<head>
    <!-- Site meta charset -->
    <meta charset="UTF-8">

    <!-- title -->
    <title>Home | Guided Gateway - Authentic Affordable Travel</title>

    <!-- meta description -->
    <meta name="description" content="Authentic Afordable Travel in India" />

    <!-- meta keywords -->
    <meta name="keywords" content="travel guide tourism india" />

    <!-- meta viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="google-site-verification" content="97KdXLMw3XyVYxOKnUXPHKQDz0CTdasQNkgxbkF7KHw" />
    <!-- favicon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

    <!-- bootstrap 3 stylesheets -->
    <link rel="stylesheet" type="text/css" href="bs3/css/bootstrap.css" media="all" />
    <!--
		template stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/styles.css" media="all" />

    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="js/rs-plugin/css/settings.css" media="all" />
    <!--
		responsive stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/responsive.css" media="all" />
    <!-- Load Fonts via
		Google Fonts API -->
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Karla:400,700,
		400italic,700italic" />
    <!-- color scheme -->
    <link rel="stylesheet" type="text/css" href="css/colors/color3.css" title="color3" />

    <link rel="stylesheet" href="css/ideal-image-slider.css">
    <style media="screen">
        #slider {
            max-width: 100%;
            margin: auto;
        }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="js/angular.min.js"></script>
    <script src="js/ideal-image-slider.js"></script>
    <script src="myDestination.js"></script>
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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.3/jquery.min.js"></script>



    <style type="text/css">
        #searchDiv {
            top: 280px;
            position: absolute;
            z-index: 2;
            height: 100px;
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
            font-size: 18px;
        }
        
        .rating .filled {
            color: #ff845e;
        }
        
        div.short-text {
            white-space: nowrap;
            width: 10em;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
    <style>
        #placeMenu:hover {
            background-color: #ffa546;
        }
    </style>

</head>
<!-- END head -->

<!-- START body -->

<body ng-app="myDestinations" ng-controller="MultipleCtrl">

    <!-- START #wrapper -->
    <div id="wrapper">
        <!-- START header -->


        <?php 
			
				include('MasterTopHeader.php'); 
			
			
			?>
            <div>
                <div class="main-contents col-md-6 col-md-offset-3 col-sm-10 col-sm-offset-1" id="searchDiv">
                    <form class="" style="background-color:#f1f1f1;">

                        <div class="row">
                            <br>
                            <div class="col-md-8 col-md-offset-1 input-group">
                                <!--
        <div class="dropdown">
            <button  class="btn btn-default dropdown-toggle" type="button" id="placeMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                From Location
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li ng-repeat="p in places">

                    <a ng-click="placeName(p.Name);">{{p.Name}}</a>

                </li>
                <li role="separator" class="divider"></li>
            </ul>
        </div>
-->
                                <input type="text" class="form-control" style="background-color:white;" ng-model="search" name="fromLocation" id="fromLocation" autocomplete="on" ng-pattern="/^[a-z ,A-Z]+$/" placeholder="Location" onfocusout="GetRoute()" />
                            </div>
                            <!--                        second dropdown list starts-->
<!--
                            <div class="col-md-4  input-group">
                                
        <div class="dropdown">
            <button class="btn btn-default dropdown-toggle" type="button" id="placeMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                To Location
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li ng-repeat="p in places">

                    <a ng-click="placeName(p.Name);">{{p.Name}}</a>

                </li>
                <li role="separator" class="divider"></li>
            </ul>
        </div>

                                <input type="text" class="form-control" style="background-color:white;" name="toLocation" id="toLocation" autocomplete="on" ng-pattern="/^[a-z ,A-Z]+$/" value="" placeholder="To Location" onfocusout="GetRoute()" />
                            </div>
-->

                            <div class="col-md-2 col-sm-2 col-xs-2  input-group">
                                <!--
        <input type="text" class="form-control" style="background-color:white;" ng-model="search" placeholder="To Location if you know or let us guide you" />
       <span class="input-group-addon">
						<a href="search_results.php"> <i class="fa fa-search"></i></a>
						</span>
-->
                                <a class="btn btn-default btn-md" id="placeMenu" onclick="redirectToSearch();"><i class="fa fa-search"></i></a>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-7 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                                <br>
                                <!--
						<label >Duration </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<label><input class="input-cb"	type="checkbox" name="inc_Tour" checked ng-model="checkboxModel.value1" value=""/> Hours</label>&nbsp;&nbsp;&nbsp;&nbsp;
						<label><input class="input-cb" type="checkbox" name="inc_Guide" value="1" ng-model="checkboxModel.value2" checked /> Single Day</label>&nbsp;&nbsp;&nbsp;&nbsp;
						<label><input class="input-cb" type="checkbox"	name="inc_Destination" value="1" ng-model="checkboxModel.value3" checked /> Multi Day</label>&nbsp;&nbsp; 
-->
                            </div>
                        </div>

                    </form>
                </div>
                <div id="slider">
                    <img data-src="https://storage.googleapis.com/guidedgateway_media/tour_1.jpg" data-src-2x="https://storage.googleapis.com/guidedgateway_media/tour_1.jpg" src="" alt="Slide 1" />
                    <img data-src="https://storage.googleapis.com/guidedgateway_media/tour_2.jpg" data-src-2x="https://storage.googleapis.com/guidedgateway_media/tour_2.jpg" src="" alt="Slide 2" />
                    <img data-src="https://storage.googleapis.com/guidedgateway_media/tour_3.jpg" data-src-2x="https://storage.googleapis.com/guidedgateway_media/tour_3.jpg" src="" alt="Slide 3" />
                </div>
                <script>
                    var slider = new IdealImageSlider.Slider('#slider');
                    slider.start();
                </script>
            </div>





            <!-- START .main-contents -->
            <div class="main-contents">
                <div class="container" id="home-page">
                    <div>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <br/>
                        <!-- START Search Container -->

                        <!-- END Search Container -->
                        <div class="row">
                            <h2 class="ft-heading text-upper col-md-12" ng-show="checkboxModel.value1"><i class="fa fa-trophy"></i>&nbsp;&nbsp; Popular Tours<span class="alignright"> <a class="btn btn-primary" href="top-tours-listview-sidebar.php"><span style="">More&nbsp;<i class="fa fa-angle-double-right"></i></span></a></span></h2>
                        </div>
                        <div class="carousel" ng-show="checkboxModel.value1">
                            <ul class="slides">
                                <li>

                                    <div class="row bom-contents" style="height:380px;">
                                        <div class="col-md-11">
                                            <div class="col-md-3" ng-repeat="x in tours | filter:search" ng-show="$index<4">
                                                <a href="tour_detail_sidebar.php#?id={{x.tour_id}}">
                                                    <div class="ft-item">
                                                        <span class="ft-image">
                                <img style="height:200px;" src="{{x.photo ==null ? 'img/SAMPLE_TAJ.jpg' : x.photo[0]}}"   alt="Popular Tours" /> </span>
                                                        <div class="ft-data" style="height:45px;font-size:11px;">
                                                            <span style="color:black;" class="text-upper fa fa-tag" href="#">{{x.tour_category}}</span>
                                                            <span style="color:black;" class="fa aligncenter wrapword">{{x.tour_title}}</span>
                                                            <span style="color:black;" class="fa text-upper wrapword"><i  style="color:black;" class="fa text-upper" ></i>{{x.tour_Location}}</span>
                                                        </div>
                                                        <div class="ft-foot">
                                                            <h4 class="ft-title text-upper" style="color:#686868">{{x.Guide}}</h4>
                                                            <span class="ft-offer text-upper">Starting&nbsp;&nbsp;{{x.tour_price}}</span>
                                                        </div>
                                                        <div class="ft-foot-ex">
                                                            <span class="fa fa-hourglass text-upper alignleft">{{x.tour_duration}}&nbsp;&nbsp;</span>
                                                            <span star-rating rating-value="x.Reviews.OverallRating" style="margin-left:20px;" class=""></span>
                                                            <span class="alignright">{{x.Reviews.ReviewCount}} reviews</span>

                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-1 alignright" style="padding-top:265px; padding-right:20px;">
                                            <!-- <a class="btn btn-primary" href="top-tours-listview-sidebar.php"><span style="font-weight:bold;">More >></span></a> -->
                                        </div>
                                    </div>
                                </li>
                            </ul>

                        </div>
                        <div class="row">
                            <h2 class="ft-heading text-upper col-md-12" ng-show="checkboxModel.value2"><i class="fa fa-user-secret"></i>&nbsp;&nbsp; Featured Guides<span class="alignright"> <a class="btn btn-primary" href="top-guides-listview.php"><span style="font-weight:bold;">More&nbsp;<i class="fa fa-angle-double-right"></i></span></a></span></h2>
                        </div>
                        <div class="carousel" ng-show="checkboxModel.value2">
                            <ul class="slides">
                                <li>
                                    <div class="row bom-contents" style="height:380px;">
                                        <div class="col-md-11 col-xs-11">
                                            <div class="col-md-3" ng-repeat="y in allguides | filter:search" ng-show="$index<4 ">
                                                <a href="guide-detail-sidebar.php#?id2={{y.id}}" ng-controller="guideIDCtrl" ng-click="setID(y.id)">
                                                    <div class="ft-item">
                                                        <span class="ft-image">
							 <img style="height:200px;" src="{{y.photo==null ? 'img/new_user.png' :y.photo}}" alt="Top Guide" /> 
						  </span>

                                                        <div class="ft-data" style="height:45px;font-size:11px;">
                                                            <span style="color:black;" class="fa fa-registered text-upper">{{y.license_no}}</span>
                                                            <span style="color:black;" class="fa fa-user-times text-upper alignright">{{y.experiance_in_year}}</span>
                                                            <br>
                                                        </div>

                                                        <div class="ft-foot" style="word-wrap:break-word; height:50px;">
                                                            <h4 class="fa fa-location text-upper" style="color:#686868">{{y.name}},&nbsp{{y.guide_territory[0]}}</h4>
                                                        </div>

                                                        <div class="ft-foot-ex">
                                                            <span class="fa fa-trophy text-upper alignleft">{{y.tour.length}} Tours</span>
                                                            <span star-rating rating-value="y.Review.Star" style="margin-left:20px;" class="aligncenter"></span>
                                                            <span class="alignright">{{y.review.Count}} reviews</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-1 alignright" style="padding-top:265px;padding-right:20px;">
                                            <!-- <a class="btn btn-primary" href="top-tours-listview-sidebar.php"><span style="font-weight:bold;">More >></span></a>-->
                                        </div>
                                    </div>

                                </li>
                            </ul>
                        </div>
                        <div class="row">
                            <h2 class="ft-heading text-upper col-md-12" ng-show="checkboxModel.value3"><i class="fa fa-cab"></i>&nbsp;&nbsp;Outstation Cars<span class="alignright"> <a class="btn btn-primary" href="transport_list.php"><span>More&nbsp;<i class="fa fa-angle-double-right"></i></span></a></span></h2>
                        </div>
                        <div class="carousel" ng-show="checkboxModel.value3">
                            <ul class="slides">
                                <li>
                                    <div class="row bom-contents" style="height:380px;">
                                        <div class="col-md-11">
                                            <div class="col-md-3" ng-repeat="z in transList | filter:search" ng-show="$index<4">
                                                <a href="#">
                                                    <div class="ft-item">
                                                        <span class="ft-image">
							 <img style="height:200px;" src="{{'z.Media.Image[0]'=='' ? 'img/custom1.jpg' :z.Media.Image[0]}}" alt="Top Destination" /> 
						  </span>

                                                        <div class="ft-data" style="height:45px;font-size:11px;">
                                                            <span style="color:black;" class="fa fa-calendar-check-o text-upper">{{z.Description}}</span>
                                                        </div>

                                                        <div class="ft-foot" style="word-wrap:break-word; height:50px;">
                                                            <h4 class="fa fa-rupee text-upper" style="color:#686868">{{z.PricePerHour}}/Hour</h4>
                                                            <span class="ft-offer text-upper">{{z.Category}}</span>
                                                        </div>

                                                        <div class="ft-foot-ex">
                                                            <span class="fa fa-rupee text-upper alignleft">{{z.City}}{{z.PricePerKM}}/KM&nbsp;</span>

                                                            <span class="alignright fa fa-life-ring">{{z.PartnerName}}&nbsp;&nbsp;</span>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-1 alignright" style="padding-top:265px;padding-right:20px;">
                                            <!-- <a class="btn btn-primary" href="top-tours-listview-sidebar.php"><span style="font-weight:bold;">More >></span></a> -->
                                        </div>
                                    </div>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END .main-contents -->

            <!-- START .main-contents .bom-contents -->
            <!--
    <div class="main-contents bom-contents"> 
			<div class="container">
					<h2 class="text-center text-upper">THEME BASED TOURS</h2> <p class="headline text-center">Visit Unique Attractions around Special Themes</p>

					     <div class="row"> 
						
						 <section class="col-md-3 fd-column">
  						 <div
					class="featured-dest"> <span class="fd-image"> <img
					class="img-circle" src="http://placehold.it/150x150"
					alt="Featured Destination" /> </span> <h3
					class="text-center text-upper">Beach</h3> <p
					class="text-center">Beach destinations and tour packages in India</p> <span class="btn-center"><a
					class="btn btn-primary text-upper" href="#"
					title="Search">Search</a></span> </div> </section>
					 <section
						class="col-md-3 fd-column"> <div
						class="featured-dest"> <span class="fd-image">
						<img class="img-circle"
						src="http://placehold.it/150x150" alt="Featured
						Destination" /> </span> <h3 class="text-center
						text-upper">Romantic</h3> <p
						class="text-center">Romantic destinations and tour packages in India</p> <span
						class="btn-center"><a class="btn btn-primary
						text-upper" href="#"
						title="Search">Search</a></span> </div>
						</section>  <section
						class="col-md-3 fd-column"> <div
						class="featured-dest"> <span class="fd-image">
						<img class="img-circle"
						src="http://placehold.it/150x150" alt="Featured
						Destination" /> </span> <h3 class="text-center
						text-upper">Adventure</h3> <p
						class="text-center">Adventure tour packages from different parts of India</p> <span
						class="btn-center"><a class="btn btn-primary
						text-upper" href="#"
						title="Search">Search</a></span> </div>
						</section> <section
						class="col-md-3 fd-column"> <div
						class="featured-dest"> <span class="fd-image">
						<img class="img-circle"
						src="http://placehold.it/150x150" alt="Featured
						Destination" /> </span> <h3 class="text-center
						text-upper">Eco</h3> <p
						class="text-center">Ecological tours and destinations from different parts of India</p> <span
						class="btn-center"><a class="btn btn-primary
						text-upper" href="#"
						title="Search">Search</a></span> </div>
						</section> 
						</div> </div> </div>  
-->
            <!--    END .main-contents-->
            <!--						.bom-contents -->
            <br>
            <!-- START footer -->
            <?php include('MasterTopFooter.php'); ?>
                <!-- END footer -->
    </div>
    <!-- END #wrapper -->




    <!-- javascripts -->
    <script type="text/javascript" src="js/modernizr.custom.17475.js"></script>

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="bs3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.flexslider-min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/jquery.minimalect.min.js" type="text/javascript"></script>

    <script src="js/styleswitcher.js"></script>

    <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
    <script type="text/javascript" src="js/rs-plugin/js/jquery.plugins.min.js"></script>
    <script type="text/javascript" src="js/rs-plugin/js/jquery.revolution.min.js"></script>

    <!--[if lt IE 9]> <script type="text/javascript"
		src="js/html5shiv.js"></script> <![endif]-->


    <script type="text/javascript">
        $(document).ready(function () {
            // revolution slider
            revapi = $("#content-slider").revolution({
                delay: 15000,
                startwidth: 1170,
                startheight: 920,
                hideThumbs: 10,
                fullWidth: "on",
                fullScreen: "off",
                fullScreenOffsetContainer: "",
                navigationVOffset: 320
            });
        }
        // initilize datepicker
        $(".date-picker").datepicker();
        });
        }
        }
        }
        $(window).load(function () {
            $('.carousel').flexslider({
                animation: "fade",
                animationLoop: true,
                controlNav: false,
                maxItems: 1,
                pausePlay: false,
                mousewheel: true,
                start: function (slider) {
                    $('body').removeClass('loading');
                }
            });
        });
        }
        }
        }
    </script>

    <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
    <script type="text/javascript">
        var source, destination;
        var directionsDisplay;
        var directionsService = new google.maps.DirectionsService();



        google.maps.event.addDomListener(window, 'load', function () {
            var options = {
                types: ['(cities)'],
                componentRestrictions: {
                    country: "in"
                }
            };

            var input = document.getElementById('fromLocation');
            var autocomplete = new google.maps.places.Autocomplete(input, options);

            var input = document.getElementById('toLocation');
            var autocomplete = new google.maps.places.Autocomplete(input, options);

            new google.maps.places.SearchBox(autocomplete);
            new google.maps.places.SearchBox(document.getElementById('fromLocation'));
            new google.maps.places.SearchBox(document.getElementById('toLocation'));
            directionsDisplay = new google.maps.DirectionsRenderer({
                'draggable': false
            });
        });

        function GetRoute() {
            var mumbai = new google.maps.LatLng(18.9750, 72.8258);
            var mapOptions = {
                zoom: 7,
                center: mumbai
            };
            //map = new google.maps.Map(document.getElementById('dvMap'), mapOptions);
            //directionsDisplay.setMap(map);
            //directionsDisplay.setPanel(document.getElementById('dvPanel'));

            //*********DIRECTIONS AND ROUTE**********************//
            source = document.getElementById("fromLocation").value;
            destination = document.getElementById("toLocation").value;

            var request = {
                origin: source,
                destination: destination,
                travelMode: google.maps.TravelMode.DRIVING
            };
            directionsService.route(request, function (response, status) {
                if (status == google.maps.DirectionsStatus.OK) {
                    directionsDisplay.setDirections(response);
                }
            });

            //*********DISTANCE AND DURATION**********************//
            var service = new google.maps.DistanceMatrixService();
            service.getDistanceMatrix({
                origins: [source],
                destinations: [destination],
                travelMode: google.maps.TravelMode.DRIVING,
                unitSystem: google.maps.UnitSystem.METRIC,
                avoidHighways: false,
                avoidTolls: false
            }, function (response, status) {
                if (status == google.maps.DistanceMatrixStatus.OK && response.rows[0].elements[0].status != "ZERO_RESULTS") {
                    var distanceKM = response.rows[0].elements[0].distance.text;
                    var distanceParts = distanceKM.split(" ");
                    var distance = distanceParts[0];
                    //                    var duration = response.rows[0].elements[0].duration.text;
                    var dvDistance = document.getElementById("dvDistance");
                    dvDistance.innerHTML = "";
                    dvDistance.innerHTML += distance;
                } else {
                    alert("Unable to find the distance via road.");
                }
            });
        }
    </script>
    <script>
        function redirectToSearch() {
            var toLocationValF = document.getElementById("fromLocation").value;
            var toLocationValPart = toLocationValF.split(",");
            var toLocationVal = toLocationValPart[0];
            window.location.href="search_results.php#?id=" + toLocationVal;
        }
    </script>

    <!--- SELECT BOX -->
    <!-- <script type="text/javascript">
   		$(function() {    	
                
					$('span.stars').stars();	
		});

		$.fn.stars = function() {
			return $(this).each(function() {
				$(this).html($('<span />').width(Math.max(0, (Math.min(5, parseFloat($(this).html())))) * 8));
			});
		}
	  </script> -->

    <!-- <span class="stars alignleft">1</span> -->

</body>

</html>
