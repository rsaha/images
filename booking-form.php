<?php
    $promoCode = parse_ini_file('config.ini',true)['promoCode'];
?>


    <html lang="en" dir="ltr">

    <!-- START head -->

    <head>
        <!-- Site meta charset -->
        <meta charset="UTF-8">

        <!-- title -->
        <title>Booking Form | Guided Gateway</title>

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
        <!-- responsive stylesheet -->
        <link rel="stylesheet" type="text/css" href="css/responsive.css" media="all" />
        <!-- Load Fonts via Google Fonts API -->
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Karla:400,700,400italic,700italic" />
        <!-- color scheme -->
        <link rel="stylesheet" type="text/css" href="css/colors/color3.css" title="color3" />

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

        <style type="text/css">
            #addExtraService {
                top: 5px;
                height: 29px;
                position: absolute;
                right: 20px;
            }
            
            #registration-form {
                background: #FDFDFD;
                padding: 20px;
                margin-right: auto;
                margin-left: auto;
                border: 1px solid #E9E9E9;
                border-radius: 10px;
            }
            
            div.short-text1 {
                white-space: nowrap;
                width: 12em;
                overflow: hidden;
                text-overflow: ellipsis;
            }
            
            div.short-text2 {
                white-space: nowrap;
                width: 25em;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        </style>
        <script src="js/angular.min.js"></script>
        <script src="booking.js"></script>
        <!--<script type="text/javascript">
            $(document).ready(function () {
                var x_timer;
                $("#email").keyup(function (e) {
                    clearTimeout(x_timer);
                    var email_name = $(this).val();
                    x_timer = setTimeout(function () {
                        check_email_ajax(email_name);
                    }, 1000);
                });

                function check_email_ajax(email) {
                    $("#email-result").html('<img src="img/ajax-loader.gif" />');
                    $.post('email-checker.php', {
                        'email': email
                    }, function (data) {
                        $("#email-result").html(data);
                    });
                }
            });
        </script>-->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
        <script type='text/javascript'>
            jQuery(document).ready(function ($) {
                $(".urlUnchange").click(function (event) {
                    event.preventDefault();
                });
            });
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
                //                var input = document.getElementById('fromLocation');
                //                var autocomplete = new google.maps.places.Autocomplete(input, options);

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
                guideProposalModalShowFun();
                document.getElementById("lcnName").innerHTML = document.getElementById("fromLocation").value; 
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
                        distance = distance.replace(/\,/g, ''); // 1125, but a string, so convert it to number
                        distance = parseInt(distance, 10);
                        var distanceShow = document.getElementById("distanceShow");
                        var distanceShowI = document.getElementById("distanceShowI");
                        distanceShow.innerHTML = "";
                        distanceShow.innerHTML += distance;

                        var transbookprice = document.getElementById("transbookprice").value;

                        var transportPrice = document.getElementById("transportPrice");
                        transportPrice.innerHTML = 1;
                        var transTTL = distance * transbookprice;
                        transportPrice.innerHTML = transTTL;
                        var promovalue = 0;
                        // alert(document.getElementById("promovalue").value);
                        // promovalue += document.getElementById("promovalue").value;
                        var ttl = distance * transbookprice + promovalue;
                        document.getElementById("transPric").value = ttl;
                        document.getElementById("grandtotalvalue").innerHTML = ttl;
                        document.getElementById("grandtotalvalueI").value = ttl;
                        distanceShowI.value = distance;

                        document.getElementById("pickupLocationModal").innerHTML = document.getElementById("pickupLocation").value;
                        document.getElementById("pickuptimeModal").innerHTML = document.getElementById("pickuptime").value;
                        document.getElementById("fromLocationModal").innerHTML = source;
                        document.getElementById("toLocationModal").innerHTML = destination;
                        document.getElementById("promocodedvalueModal").innerHTML = "0";
                        document.getElementById("grandtotalTransModal").innerHTML = transTTL;


                    } else {
                        alert("Unable to find the distance via road.");
                    }
                });
            }

            function guideProposalModalShowFun() {
                $('#guideProposalModal').modal('show');
            }
        </script>
    </head>
    <!-- END head -->

    <!-- START body -->

    <body ng-app="mybookingPage" ng-controller="guides_booking" ng-init="btnvalue=1">




        <!-- START #wrapper -->
        <div id="wrapper">
            <!-- START header -->
            <?php include_once('MasterTopHeader.php'); ?>
                <!-- END header -->
                <!-- END #page-header -->
                <form id="bookingForm" action="booking-form-code.php" ng-submit="bookingForm.$valid" name="bookingForm" method="post" novalidate>
                    <!-- START .main-contents -->
                    <div class="main-contents">
                        <div class="container">
                            <div class="row">

                                <!-- START #page -->
                                <div id="page" class="col-md-8">
                                    <!-- START #contactForm -->
                                    <section id="booking-form">
                                        <h2 class="ft-heading text-upper">Provide Your Booking Information</h2>

                                        <fieldset>
                                            <ul class="formFields list-unstyled">
                                                <li class="row">
                                                    <div class="col-md-12">
                                                        <label>Name <span class="required small">(Required)</span></label>
                                                        <input type="text" class="form-control" required name="tourist_name" ng-model="name" ng-pattern="/^[a-z A-Z]+$/">
                                                        <span style="color:red" ng-show="bookingForm.tourist_name.$dirty && bookingForm.tourist_name.$invalid">
											  <span ng-show="bookingForm.tourist_name.$error.required">*Name is required.</span>
                                                        <span ng-show="bookingForm.tourist_name.$error.pattern">*Invalid Name ...</span>
                                                        </span>
                                                    </div>
                                                </li>
                                                <li class="row">
                                                    <div class="col-md-6">
                                                        <label>Email <span class="required small">(Required)</span></label>
                                                        <input type="text" class="form-control" required name="tourist_email" ng-model="email" ng-pattern="/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9]+\.([a-zA-Z]{2,3}|([a-zA-Z]{2,3}\.[a-zA-Z]{2}))$/" />
                                                        <span style="color:red" ng-show="bookingForm.tourist_email.$dirty && bookingForm.tourist_email.$invalid">
                                                           
											  <span ng-show="bookingForm.tourist_email.$error.required">*Email is required.</span>
                                                        <span ng-show="bookingForm.tourist_email.$error.pattern">*Invalid email address ...</span>
                                                        </span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Contact Number <span class="required small">(Required)</span></label>
                                                        <input type="text" class="form-control" required name="tourist_mobile" ng-model="contact" ng-pattern="/^[7-9]{1}\d{9}$/" />
                                                        <span style="color:red" ng-show="bookingForm.tourist_mobile.$dirty && bookingForm.tourist_mobile.$invalid">
											  <span ng-show="bookingForm.tourist_mobile.$error.required">*Mobile number is required.</span>
                                                        <span ng-show="bookingForm.tourist_mobile.$error.pattern">* Invalid Mobile number ...</span>
                                                        </span>
                                                    </div>
                                                </li>

                                                <li class="row" ng-hide="transportbookValue">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label>ADULT <span class="required small">(12+ YRS)</span></label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon" style="cursor:pointer" ng-click="adultminus(adultValue);"><i style="font-size:12px" class="fa fa-minus"></i></span>
                                                                    <input type="text" id="adult" name="noOfPerson" class="form-control" ng-model="adultValue" readonly>
                                                                    <span class="input-group-addon" style="cursor:pointer" ng-click="adultplus(adultValue);"><i style="font-size:12px" class="fa fa-plus"></i></span>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>CHILD <span class="required small">(0-12 YRS)</span></label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon" style="cursor:pointer" ng-click="childMinus();"><i style="font-size:12px" class="fa fa-minus"></i></span>
                                                                    <input type="text" id="noOfPersonChild" name="noOfPersonChild" class="form-control" ng-model="child" readonly>
                                                                    <span class="input-group-addon" style="cursor:pointer" ng-click="childPlus();"><i style="font-size:12px" class="fa fa-plus"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="row">
                                                    <div class="col-md-6">
                                                        <label>Date of Tour <span class="required small">(Required)</span></label>
                                                        <input type="date" class="form-control" required name="dateOfTour" ng-model="dateOfTour" />
                                                        <span style="color:red" ng-show="bookingForm.dateOfTour.$dirty && bookingForm.dateOfTour.$invalid">
											  <span ng-show="bookingForm.dateOfTour.$error.required">*Date is required.</span>

                                                        </span>
                                                    </div>
                                                    <div ng-hide="transportbookValue">
                                                        <div class="col-md-6" ng-show="{{guideValue}}">
                                                            <label>Tour Duratios [In Days] <span class="required small">(Required)</span></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon" style="cursor:pointer" ng-click="tourdayminus(dayValue);"><i style="font-size:12px" class="fa fa-minus"></i></span>
                                                                <input type="text" id="tourDurationG" id="tourDurationG" name="tourDurationG" class="form-control" ng-model="dayValue">
                                                                <span class="input-group-addon">Days</span>
                                                                <span class="input-group-addon" style="cursor:pointer" ng-click="tourdayplus(dayValue);"><i style="font-size:12px" class="fa fa-plus"></i></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6" ng-show="{{tourValue}}">
                                                            <label>Tour Duratios [In Days] <span class="required small">(Required)</span></label>
                                                            <div class="input-group">
                                                                <span class="input-group-addon" onclick="tourDurationMinus();"></span>
                                                                <input type="text" id="tourDurationT" name="tourDurationT" value="{{tour.tour_duration}}" class="form-control" readonly>
                                                                <span class="input-group-addon">Day(s)</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="row">
                                                    <div class="col-md-6" ng-show="transportbookValue">
                                                        <label>Pick-up Location <span class="required small">(Required)</span></label>
                                                        <input type="text" class="form-control" required id="pickupLocation" name="pickupLocation" />
                                                        <span style="color:red" ng-show="bookingForm.pickupLocation.$dirty && bookingForm.pickupLocation.$invalid">
											  <span ng-show="bookingForm.pickupLocation.$error.required">*Pick-up Location is required.</span>

                                                        </span>
                                                    </div>
                                                    <div class="col-md-6" ng-show="transportbookValue">
                                                        <label>Pick-up Time <span class="required small">(Required)</span></label>
                                                        <input type="time" class="form-control" required id="pickuptime" name="pickuptime" />
                                                        <span style="color:red" ng-show="bookingForm.pickuptime.$dirty && bookingForm.pickuptime.$invalid">
											  <span ng-show="bookingForm.pickuptime.$error.required">*Pick-up Time is required.</span>

                                                        </span>
                                                    </div>
                                                </li>

                                                <input type="hidden" id="distanceShowI" name="distanceShowI" />
                                                <li class="row" ng-show="transportbookValue">
                                                    <div class="col-md-6">
                                                        <label>From Location<span class="required small">(Required)</span></label>

                                                        <input type="text" class="form-control" name="fromLocation" id="fromLocation" autocomplete="on" ng-model="fromLocation" value="" ng-pattern="/^[a-z ,A-Z]+$/" onfocusout="GetRoute()" list="exampleList" />
                                                        <datalist id="exampleList">
                                                            <option ng-repeat="dropdwn in placesforDropdown" value="{{dropdwn}}">
                                                        </datalist>
                                                        <!--
                                                        <span style="color:red" ng-show="bookingForm.yourLocation.$dirty && bookingForm.yourLocation.$invalid">
											  <span ng-show="bookingForm.yourLocation.$error.required">*Location is required.</span>

                                                        </span>
-->
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>To Location<span class="required small">(Required)</span></label>
                                                        <input type="text" class="form-control" name="toLocation" id="toLocation" autocomplete="on" ng-model="toLocation" value="" ng-pattern="/^[a-z ,A-Z]+$/" onfocusout="GetRoute()" />
                                                        <!--
                                                        <span style="color:red" ng-show="bookingForm.yourLocation.$dirty && bookingForm.yourLocation.$invalid">
											  <span ng-show="bookingForm.yourLocation.$error.required">*Location is required.</span>

                                                        </span>
-->
                                                    </div>
                                                </li>
                                                <li class="row">
                                                    <div class="col-md-12">
                                                        <div class="sidebar-widget">
                                                            <!-- Sidebar What We Do -->
                                                            <div class="panel-group" id="accordion">
                                                                <div class="panel panel-default" ng-hide="transportbookValue">
                                                                    <div class="panel-heading">
                                                                        <a class="panel-title collapsed urlUnchange" data-toggle="collapse" href="#collapseOne">
                                                                    Lodging
                                                                </a>
                                                                    </div>
                                                                    <div id="collapseOne" class="panel-collapse collapse">
                                                                        <div class="panel-body">
                                                                            <div class="col-md-12">
                                                                                <div>

                                                                                    <div class="col-md-3" ng-repeat="lodge in lodging | filter:{ City: tour.tour_location} ">
                                                                                        <a id="addExtraService" style="height:20px" class="btn btn-xs btn-default" data-toggle="tab" ng-click="lodgeID(lodge.ID);">Add</a>
                                                                                        <a style="cursor:pointer" data-value="{{lodge.ID}}" ng-click="lodgingModel(lodge.ID);">
                                                                                            <div class="ft-item">
                                                                                                <span class="ft-image">
                                                                                             <img style="" src="{{lodge.Media.Image[0]}}" alt="Top Destination" /> 
                                                                                          </span>
                                                                                                <div class="ft-data" style="font-size:11px;">
                                                                                                    <span style="color:black;" class="fa fa-book text-upper">{{lodge.Address}}</span> &nbsp;&nbsp;&nbsp;&nbsp;
                                                                                                    <!-- <span style="color:black;" class="fa fa-book text-upper" >&nbsp;&nbsp;{{x.Speciality}}</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                             <span style="color:black;" class="fa fa-plane text-upper" >&nbsp;&nbsp;{{x.LanguageKnown}}</span> -->
                                                                                                </div>
                                                                                                <div class="ft-foot" style="word-wrap:break-word; ">
                                                                                                    <h4 class="ft-title text-upper" style="color:#686868">{{lodge.City}}</h4>
                                                                                                    <span class="ft-offer text-upper">{{lodge.PricePerNight}}/Night</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="panel panel-default" ng-hide="transportbookValue">
                                                                    <div class="panel-heading">
                                                                        <a class="panel-title collapsed urlUnchange" data-toggle="collapse" href="#collapseTwo"> Transport Service</a>
                                                                    </div>
                                                                    <div id="collapseTwo" class="panel-collapse collapse">
                                                                        <div class="panel-body">
                                                                            <div class="col-md-12">
                                                                                <div>
                                                                                    <div class="col-md-3" ng-repeat="trans in transport">
                                                                                        <a id="addExtraService" style="height:20px" class="btn btn-xs btn-default" data-toggle="tab" ng-click="transID(trans.ID);">Add</a>
                                                                                        <a style="cursor:pointer" data-value="{{trans.ID}}" ng-click="transportModel(trans.ID);">
                                                                                            <div class="ft-item">
                                                                                                <span class="ft-image">
                                                                                                 <img style="height:80px" src="{{trans.Media.Image[0]}}" alt="Top Destination" /> 
                                                                                              </span>
                                                                                                <div class="ft-data" style="font-size:11px;">
                                                                                                    <span style="color:black;" class="fa fa-book text-upper">&nbsp;&nbsp;{{trans.Category}}&nbsp;&nbsp;</span>
                                                                                                </div>
                                                                                                <div class="ft-foot" style="word-wrap:break-word; ">
                                                                                                    <!-- <span class="ft-offer text-upper">Rs. {{trans.PricePerHour}} / Per Hour</span>-->
                                                                                                    <span class="ft-offer text-upper">Rs. {{trans.PricePerKM}} / Per KM</span>
                                                                                                </div>
                                                                                            </div>
                                                                                        </a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class=" panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <a class="panel-title collapsed urlUnchange" data-toggle="collapse" href="#collapseThree"> Promo Code <span class="small">(If you have)</span></a>
                                                                    </div>
                                                                    <div id="collapseThree" class="panel-collapse collapse">
                                                                        <div class="panel-body">
                                                                            <div class="col-md-6">
                                                                                <div class="input-group">
                                                                                    <!--  <span class="input-group-addon" ></span>-->
                                                                                    <input type="text" class="form-control" name="promoCode" placeholder="Enter Promo Code" ng-model="promocode" id="promocodedvalue">
                                                                                    <span ng-hide="transportbookValue" class="input-group-addon" style="cursor:pointer; color:black; background-color:#979999;" ng-click="comparePromo(promocode,'<?php echo $promoCode; ?>');">Apply</span>
                                                                                    <?php
                                                                                    echo '<span ng-show="transportbookValue" class="input-group-addon" style="cursor:pointer; color:black; background-color:#979999;" onclick="comparePromocode(\''.$promoCode.'\');">Apply</span>';
                                                                                        ?>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="row">
                                                    <div class="col-md-12">
                                                        <input type="button" class="btn btn-primary btn-md text-upper" ng-click="conformationModal();" ng-disabled="bookingForm.$invalid ||
										bookingForm.tourist_name.$dirty && bookingForm.tourist_name.$invalid 
										||bookingForm.tourist_email.$dirty && bookingForm.tourist_email.$invalid	
                                                                            ||bookingForm.tourist_mobile.$dirty && bookingForm.tourist_mobile.$invalid						
                                                                            ||bookingForm.dateOfTour.$dirty && bookingForm.dateOfTour.$invalid ||
                                                                           bookingForm.tourist_name.$error.required||
                                                                            bookingForm.tourist_email.$error.required||
                                                                            bookingForm.tourist_mobile.$error.required ||
                                                                         bookingForm.dateOfTour.$error.required
										" id="booknow2" name="booknow2" value="Request to Book" />
                                                        <input type="submit" id="booknow" name="booknow" hidden />
                                                        <span class="required small">*Your email will never published.</span>
                                                    </div>
                                                </li>

                                            </ul>
                                        </fieldset>
                                        <!--								</form>-->
                                    </section>
                                    <!-- END #contactForm -->
                                </div>
                                <!-- END #page -->
                                <br>
                                <!-- START #sidebar -->
                                <aside id="sidebar" class="col-md-4">
                                    <div class="sidebar-widget">
                                        <!-- START TABS -->
                                        <ul class="nav nav-tabs text-upper" style="background-color:#ff845e;">
                                            <li class="active" ng-show="{{tourValue}}">
                                                <a class="urlUnchange" href="#popular-posts" data-toggle="tab">Requested Tour Detail</a></li>
                                            <li class="active" ng-show="{{guideValue}}">
                                                <a class="urlUnchange" href="#popular-posts" data-toggle="tab">Requested Guide Detail</a></li>
                                            <li class="active" ng-show="transportbookValue">
                                                <a class="urlUnchange" href="#popular-posts" data-toggle="tab">Requested Transport Detail</a></li>
                                        </ul>
                                        <!-- END TABS -->

                                        <!-- START TAB CONTENT -->
                                        <div class="tab-content gray box-shadow1 clearfix">
                                            <div class="tab-pane active" id="popular-posts">

                                                <div>
                                                    <div ng-show="{{tourValue}}">
                                                        <input type="hidden" name="tourID" value="{{tour.tour_id}}" />
                                                        <input type="hidden" name="tourName" value="{{tour.tour_title}}" />
                                                        <input type="hidden" name="tGuideID" value="{{tour.guide_id}}" />
                                                        <input type="hidden" name="tGuideName" value="---" />
                                                        <input type="hidden" name="PickupLocation" value="{{tour.start_point}}" />
                                                        <input type="hidden" name="DropLocation" value="{{tour.end_point}}" />
                                                        <input type="hidden" name="tInclusive" value="{{tour.inclusive}}" />
                                                        <input type="hidden" name="tExclusice" value="{{tour.exclusive}}" />
                                                        <input type="hidden" name="tCancelationPolicy" value="{{tour.cancelation_policy}}" />
                                                        <input type="hidden" name="tRestrictions" value="{{tour.restrictions}}" />

                                                        <div class="tour-plans" style="padding:10px 10px 0px 10px;">
                                                            <div data-model="tour.tour_location">
                                                                <div class="plan-image">
                                                                    <img class="img-responsive" alt="Tour Image Scroller" draggable="false" src="{{tour.photo == null ? 'img/custom11.jpg' : tour.photo[0]}}" />
                                                                    <div class="offer-box">
                                                                        <div class="offer-top">
                                                                            <!--<span class="ft-temp alignright">19&#730;c</span>-->
                                                                            <span class="featured-cr text-upper" style="font-size:15px">{{tour.tour_location}}</span>
                                                                            <span class="featured-cr" style="font-size:10px">ID: {{tour.tour_id}}</span>
                                                                            <div class="short-text1 featured-cy text-upper" style="font-size:15px;" title="{{tour.tour_title}}">{{tour.tour_title}}</div>
                                                                        </div>
                                                                        <div class="offer-bottom">
                                                                            <span class="featured-spe" style="font-size:15px"> {{tour.tour_price}} Per Person</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="featured-btm box-shadow1">
                                                                    <a class="ft-hotel text-upper" href="#">{{tour.tour_duration}} Day Tour</a>
                                                                    <a class="fa fa-user text-upper" href="guide-detail-sidebar.php#?id2={{tour.guide_id}}">{{tour.guide_id}}</a>
                                                                    <a class="ft-tea text-upper" href="#">
                                                                        <div class="short-text2" title="{{tour.inclusive}}">{{tour.inclusive}}</div>
                                                                    </a>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    Exclusive :
                                                                </div>
                                                                <div class="col-md-7">
                                                                    {{tour.exclusive}}
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    Cancelation Policy :
                                                                </div>
                                                                <div class="col-md-7">
                                                                    {{tour.cancelation_policy}}
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="tourPrice" value="{{tourPrice}}" />
                                                            <h4 class="pull-right">Min. Tour Charges (4 persons) &nbsp;: {{tourPrice}}</h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--                                                transport division-->
                                                <div ng-show="transportbookValue">
                                                    <input type="hidden" name="transportBokingF" value="{{transportBook.ID}}" />
                                                    <input type="hidden" name="Category" value="{{transportBook.Category}}" />
                                                    <input type="hidden" name="PartnerName" value="{{transportBook.PartnerName}}" />
                                                    <input type="hidden" name="Description" value="{{transportBook.Description}}" />
                                                    <input type="hidden" name="PricePerKM" value="{{transportBook.PricePerKM}}" />

                                                    <div class="tour-plans" style="padding:10px 10px 0px 10px;">
                                                        <div data-model="tour.tour_location">
                                                            <div class="plan-image">
                                                                <img class="img-responsive" alt="Tour Image Scroller" draggable="false" src="{{transportBook.Media.Image[0] == null ? 'img/custom11.jpg' : transportBook.Media.Image[0]}}" />
                                                                <div class="offer-box">
                                                                    <div class="offer-top">
                                                                        <!--<span class="ft-temp alignright">19&#730;c</span>-->
                                                                        <span class="featured-cr text-upper" style="font-size:15px">{{transportBook.Category}}</span>
                                                                        <span class="featured-cr" style="font-size:10px">{{transportBook.PartnerName}}</span>
                                                                        <div class="short-text1 featured-cy text-upper" style="font-size:15px;" title="{{tour.tour_title}}">{{transportBook.Description}}</div>
                                                                    </div>
                                                                    <div class="offer-bottom">
                                                                        <span class="featured-spe" style="font-size:15px"> {{transportBook.PricePerKM}} Per Kilometer</span>
                                                                        <input type="hidden" id="transbookprice" value="{{transportBook.PricePerKM}}" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--
                                                                <div class="featured-btm box-shadow1">
                                                                    <a class="ft-hotel text-upper" href="#">{{transportBook.tour_duration}} Day Tour</a>
                                                                    <a class="fa fa-user text-upper" href="guide-detail-sidebar.php#?id2={{tour.guide_id}}">{{transportBook.guide_id}}</a>
                                                                    <a class="ft-tea text-upper" href="#">
                                                                        <div class="short-text2" title="{{tour.inclusive}}">{{transportBook.inclusive}}</div>
                                                                    </a>
                                                                </div>
-->
                                                        </div>

                                                        <!--
                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    Exclusive :
                                                                </div>
                                                                <div class="col-md-7">
                                                                    {{tour.exclusive}}
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-5">
                                                                    Cancelation Policy :
                                                                </div>
                                                                <div class="col-md-7">
                                                                    {{tour.cancelation_policy}}
                                                                </div>
                                                            </div>
-->

                                                        <h5><table><tr><td>Distance(Estimated)  &nbsp;:</td><td><div id="distanceShow">0</div></td><td> KM</td></tr></table> </h5>
                                                        <h4 class="pull-right">Transport Charges  &nbsp;: <label id="transportPrice"></label></h4>
                                                    </div>
                                                </div>
                                                <!--                                                transport div end-->
                                                <div style="text-align:justify; padding:10px 10px 10px 10px;">
                                                    <div ng-show="{{guideValue}}">
                                                        <input type="hidden" name="guideID" value="{{guide.id}}" />
                                                        <input type="hidden" name="guideName" value="{{guide.name}}" />
                                                        <input type="hidden" name="guideMobileNumber" value="{{guide.mobileNo}}" />
                                                        <input type="hidden" name="guideSummary" value="{{guide.guide_summary}}" />
                                                        <input type="hidden" name="guidePaymentTerm" value="{{guide.payment_terms}}" />

                                                        <div class="row">
                                                            <div class=" col-md-4 col-sm-4 plan-image">
                                                                <img class="hover img-responsive" src="{{ guide.photo == null ? 'img/userDefaultIcon.png' : guide.photo}}" />
                                                            </div>
                                                            <div class="col-md-8 col-sm-8">
                                                                <div class="row">
                                                                    <div class="col-md-3 col-sm-4 col-xs-4">Name:</div>
                                                                    <div class="col-md-8 col-sm-8 col-xs-8 alignright">{{guide.name}} </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4 col-sm-4 col-xs-4">Territory:</div>
                                                                    <div class="col-md-8 col-sm-8 col-xs-8 alignright" ng-repeat="z in guide.guide_territory">{{z}}</div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4 col-sm-4 col-xs-4">City:</div>
                                                                    <div class="col-md-8 col-sm-8 col-xs-8 alignright">{{guide.city}}</div>
                                                                </div>
                                                                <!--
                                                         <div class="row">
                                                            <div class="col-md-4 col-sm-4 col-xs-4">Mobile:</div>
                                                            <div class="col-md-8 col-sm-8 col-xs-8 alignright">{{guide.mobileNo}}</div>
                                                        </div>
-->
                                                                <div class="row">
                                                                    <div class="col-md-4 col-sm-4 col-xs-4">Email:</div>
                                                                    <div class="col-md-8 col-sm-8 col-xs-8 alignright">{{guide.email}}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="guidePrice" value="{{guidePrice}}" />
                                                        <br>
                                                        <h4 class="pull-right">Guide Charges : Rs. {{guidePrice}}</h4>
                                                        <!--                                                        <hr style="margin: 20px 0; border: 1px solid #808080;">-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--
                                  <div style="text-align:justify; padding:0px 10px 0px 10px;">
                                            <div ng-show="{{guideValue}}">
                                                <div class="row">
                                                    <div class=" col-md-4 col-sm-4 plan-image">
                                                        <img class="hover img-responsive" src="{{ guide.photo == null ? 'img/userDefaultIcon.png' : guide.photo}}" />
                                                    </div>
                                                    <div class="col-md-8 col-sm-8">
                                                        <div class="row">
                                                            <div class="col-md-3 col-sm-4 col-xs-4">Name:</div>
                                                            <div class="col-md-8 col-sm-8 col-xs-8 alignright">{{guide.name}} </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4 col-sm-4 col-xs-4">Territory:</div>
                                                            <div class="col-md-8 col-sm-8 col-xs-8 alignright" ng-repeat="z in guide.guide_territory">{{z}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h4>Total for Guide: Pricing varies</h4>
                                                <hr>
                                            </div>
                                        </div>
-->
                                        <br>
                                        <!--                                division on the click of lodging and transport -->
                                        <div id="" ng-show="lodgevalue" class="gray" style="text-align:justify; padding:10px 10px 10px 10px;">
                                            <div id="close_lodging" class="pull-right">
                                                <a style="cursor:pointer" ng-click="closelodge()"><i class="fa fa-times"></i></a>
                                            </div>

                                            <div id="toptours" class="row">
                                                <ul class=" list-unstyled">
                                                    <li class="col-md-12">
                                                        <div class="col-md-4">
                                                            <span class="rc-post-image ">
                                                        <img class="img-responsive" src="{{lodgeIDnew.Media.Image[0]}}" alt="Tour 1" />
												</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h5>{{lodgeIDnew.Address}}</h5>
                                                            <span class="rc-post-date small">{{lodgeIDnew.City}}</span>
                                                            <br/>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="alignright">
                                                <input type="hidden" name="lodging_value" value="{{lodgevalue}}" />
                                                <input type="hidden" name="lodging_id" value="{{lodgeIDnew.ID}}" />
                                                <input type="hidden" name="lodging_name" value="{{lodgeIDnew.Address}}" />
                                                <input type="hidden" name="lodging_price" value="{{lodgeIDnew.PricePerNight}}" />
                                                <h4>Lodging Charges &nbsp;&nbsp;&nbsp;: Rs.&nbsp;{{lodgeIDnew.PricePerNight}}</h4>
                                            </div>
                                            <hr>
                                        </div>
                                        <br>
                                        <div id="" class="gray" ng-show="transvalue" style="text-align:justify; padding:10px 10px 10px 10px;">
                                            <div id="close_lodging" class="pull-right"><a style="cursor:pointer" ng-click="closetrans()"><i class="fa fa-times"></i></a></div>
                                            <div id="toptours" class="row">
                                                <ul class=" list-unstyled">
                                                    <li class="col-md-12">
                                                        <div class="col-md-4">
                                                            <span class="rc-post-image ">
                                                        <img class="img-responsive" src="{{transIDnew.Media.Image[0]}}" alt="Tour 1" />
												</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h5>{{transIDnew.Description}} </h5>
                                                            <span class="rc-post-date small">{{transIDnew.City}}</span>
                                                            <br/>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="alignright">
                                                <input type="hidden" name="transport_value" value="{{transvalue}}" />
                                                <input type="hidden" name="transport_id" value="{{transIDnew.ID}}" />
                                                <input type="hidden" name="transport_name" value="{{transIDnew.Description}}" />
                                                <input type="hidden" name="transport_price" value="{{transIDnew.PricePerKM}}" />
                                                <span style="font-weight:bold;font-size:17px">Transport will be charged @ Rs.&nbsp;{{transIDnew.PricePerKM}} / KM.</span>
                                            </div>
                                            <hr>
                                        </div>
                                        <!--                                close division -->
                                        <br>
                                        <div class="gray">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="pull-right">

                                                        <table>
                                                            <tr ng-hide="transportbookValue">
                                                                <td style="text-align:right">Total&nbsp;: Rs.&nbsp;</td>
                                                                <td style="text-align:right">{{priceTotal}}</td>
                                                                <input type="hidden" name="gTotal" value="{{priceTotal}}" />
                                                            </tr>
                                                            <tr ng-hide="transportbookValue">
                                                                <td style="text-align:right">tax @ 14% &nbsp;: Rs.&nbsp;</td>
                                                                <td style="text-align:right">{{(priceTotal*14)/100 | number:0}}
                                                                    <input type="hidden" name="serviceTax" value="{{(priceTotal*14)/100 | number:0}}" />
                                                                </td>
                                                            </tr>
                                                            <tr ng-hide="transportbookValue">
                                                                <td style="text-align:right">Swachh Bharat tax @ 0.5% &nbsp;: Rs.&nbsp;</td>
                                                                <td style="text-align:right">{{(priceTotal*0.5)/100 | number:0}}
                                                                    <input type="hidden" name="swachhTax" value="{{(priceTotal*0.5)/100 | number:0}}" />
                                                                </td>
                                                            </tr>
                                                            <input type="hidden" name="PromoDis" value="{{successValue}}" id="promovalue" />
                                                            <tr ng-show="successValue">
                                                                <td style="text-align:right">Promotional Discount &nbsp;: Rs.&nbsp;</td>
                                                                <td style="text-align:right">(-){{successValue}} </td>
                                                            </tr>
                                                            <tr id="promotional" style="display:none;">
                                                                <td style="text-align:right">Promotional Discount &nbsp;: Rs.&nbsp;</td>
                                                                <td style="text-align:right">(-)500 </td>
                                                            </tr>
                                                            <tr ng-hide="transportbookValue">
                                                                <td style="text-align:right">
                                                                    <h4>Grand total&nbsp;: Rs.&nbsp;</h4></td>
                                                                <td style="text-align:right">
                                                                    <h4>{{(priceTotal+((priceTotal*14)/100)+((priceTotal*0.5)/100)-successValue) | number : 0 }}</h4></td>
                                                            </tr>
                                                            <tr ng-show="transportbookValue">
                                                                <td style="text-align:right">
                                                                    <h4>Grand total&nbsp;: Rs.&nbsp;</h4>
                                                                </td>
                                                                <td style="text-align:right">
                                                                    <input type="hidden" value="" id="grandtotalvalueI" name="grandtotalvalueI">
                                                                    <input type="hidden" value="" id="transPric" name="transPric">
                                                                    <h4><label id="grandtotalvalue" name="grandtotalvalue"/></h4>
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <input type="hidden" name="grandTotal" value="{{(priceTotal+((priceTotal*14)/100)+((priceTotal*0.5)/100)-successValue) | number : 0 }}" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </aside>
                                <!-- END #sidebar -->
                            </div>
                            <!-- END .row -->

                        </div>
                    </div>
                    <!-- END .main-contents -->
                </form>
                <!-- START footer -->
                <?php include('MasterTopFooter.php'); ?>
                    <!-- END footer -->
        </div>
        <!-- END #wrapper -->


        <div class="modal fade" id="lodgingDetailModal" role="dialog" aria-labelledby="lodgingDetailModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <input type="hidden" id="lodgingID" name="lodgingID" value="" />
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="padding:20px 50px; background-color: #ff845e; color:white !important; text-align: center; font-size: 30px;">
                        <button type="button" class="close" style="background-color: #ff845e; color:white !important; text-align: center; font-size: 30px;" data-dismiss="modal">&times;</button>
                        <h4 style="background-color: #ff845e; color:white !important; text-align: center; font-size: 30px;"><span class="glyphicon glyphicon-lock"></span>Lodging Detail</h4>
                    </div>
                    <div class="modal-body" style="padding:20px 50px 0px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="sidebar-widget">
                                    <!-- Sidebar Categories -->
                                    <div class="row">
                                        <div class="col-md-4"><img class="img-responsive" src="{{lodgeIDSelected.Media.Image[0]}}" alt="Lodge" /></div>
                                        <div class="col-md-6">
                                            <h4 class="text-upper">{{lodgeIDSelected.Description}}</h4> </div>
                                    </div>
                                    <br>
                                    <ul class="cats-list list-unstyled">
                                        <li>Description <span style="color:black;">{{lodgeIDSelected.Description}}</span></li>
                                        <li>Address<span style="color:black;"> {{lodgeIDSelected.Address}}</span></li>
                                        <li>City <span style="color:black;">{{lodgeIDSelected.City}}</span></li>
                                        <li>Category <span style="color:black;">{{lodgeIDSelected.Category}}</span></li>
                                        <li>PricePerNight<span style="color:black;">{{lodgeIDSelected.PricePerNight}}</span></li>
                                        <li>IncludedInTour <span style="color:black;">{{lodgeIDSelected.IncludedInTour}}</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="background-color: #f9f9f9;">
                        <button type="submit" style="background-color:#ff845e" class="btn btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="transportDetailModal" role="dialog" aria-labelledby="transportDetailModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <input type="hidden" id="lodgingID" name="lodgingID" value="" />
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="padding:20px 50px; background-color: #ff845e; color:white !important; text-align: center; font-size: 30px;">
                        <button type="button" class="close" style="background-color: #ff845e; color:white !important; text-align: center; font-size: 30px;" data-dismiss="modal">&times;</button>
                        <h4 style="background-color: #ff845e; color:white !important; text-align: center; font-size: 30px;"><span class="glyphicon glyphicon-lock"></span>Transport Services</h4>
                    </div>
                    <div class="modal-body" style="padding:20px 50px 0px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pricing-tables pricing-tables-1 sidebar-widget">
                                    <!-- Sidebar Categories -->
                                    <div class="row">
                                        <div class="col-md-4"><img class="img-responsive" src="{{transIDSelected.Media.Image[0]}}" alt="Transport" /></div>
                                        <div class="col-md-6">
                                            <h3 class="text-upper">{{transIDSelected.Description}}</h3> </div>
                                    </div>
                                    <br>
                                    <ul class="cats-list list-unstyled">
                                        <li>Description <span style="color:black;">{{transIDSelected.Description}}</span></li>
                                        <!--									<li>Address<span style="color:black;"> {{transIDSelected.Address}}</span></li>-->
                                        <li>City <span style="color:black;">{{transIDSelected.City}}</span></li>
                                        <li>Category <span style="color:black;">{{transIDSelected.Category}}</span></li>
                                        <li>PriceForDay<span style="color:black;">{{transIDSelected.PriceForDay}}</span></li>
                                        <li>IncludedInTour <span style="color:black;">{{transIDSelected.IncludedInTour}}</span></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="background-color: #f9f9f9;">
                        <button type="submit" style="background-color:#ff845e" class="btn btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="conformationModal" role="dialog" aria-labelledby="conformationModalModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <input type="hidden" id="conformationID" name="conformationID" value="" />
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="padding:15px 50px; background-color: #ff845e; color:white !important; text-align: center; font-size: 30px;">
                        <button type="button" class="close" style="background-color: #ff845e; color:white !important; text-align: center; font-size: 30px;" data-dismiss="modal">&times;</button>
                        <h4 style="background-color: #ff845e; color:white !important; text-align: center; font-size: 30px;"><span class="glyphicon glyphicon-lock"></span>Confirm Booking Request</h4>
                    </div>
                    <div class="modal-body" style="padding:20px 50px 0px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="sidebar-widget">
                                    <!-- Sidebar Categories -->
                                    <div class="row">
                                        <div class="pricing-tables pricing-tables-1 sidebar-widget">
                                            <!-- Sidebar Categories -->
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <img ng-show="{{guideValue}}" class="hover img-responsive" src="{{ guide.photo == null ? 'img/userDefaultIcon.png' : guide.photo}}" />
                                                    <img ng-show="{{tourValue}}" class="img-responsive" alt="Tour Image Scroller" draggable="false" src="{{tour.photo == null ? 'img/custom11.jpg' : tour.photo[0]}}" />
                                                </div>
                                                <div class="col-md-8">
                                                    <h3 ng-show="{{tourValue}}" class="text-upper">{{tour.tour_title}}</h3>
                                                    <h3 ng-show="{{guideValue}}" class="text-upper">{{guide.name}}</h3>
                                                    <div ng-show="{{tourValue}}">
                                                        <div class="row">
                                                            <div class="col-md-3">Location</div>
                                                            <div class="col-md-9">{{tour.tour_location}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3">Included</div>
                                                            <div class="col-md-9">{{tour.inclusive}}</div>
                                                        </div>
                                                    </div>
                                                    <div ng-show="{{guideValue}}">
                                                        <div class="row">
                                                            <div class="col-md-3">City</div>
                                                            <div class="col-md-9">{{guide.city}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3">Mobile</div>
                                                            <div class="col-md-9">{{guide.mobileNo}}</div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-3">Email</div>
                                                            <div class="col-md-9">{{guide.email}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <ul class=" list-unstyled">
                                                <li class="pricing-table ">Full Name <span style="color:black;" class="pull-right">{{name}}</span></li>
                                                <li class="pricing-table ">Email <span style="color:black;" class="pull-right">{{email}}</span></li>
                                                <li class="pricing-table "> Contact<span style="color:black;" class="pull-right">{{contact}}</span></li>
                                                <li class="pricing-table " ng-hide="transportbookValue">No. of Persons <span style="color:black;" class="pull-right">{{adultValue}} Adult(s) , {{child}} Child</span></li>
                                                <li class="pricing-table ">Date of Tour <span style="color:black;" class="pull-right">{{dateOfTour | date:'dd-MM-yyyy'}}</span></li>
                                                <li class="pricing-table " ng-show="{{tourValue}}">Tour Duration <span style="color:black;" class="pull-right">{{tour.tour_duration}} Day(s)</span></li>
                                                <li class="pricing-table " ng-show="{{guideValue}}">Tour Duration<span style="color:black;" class="pull-right"> {{dayValue}} Day(s)</span></li>

                                                <li class="pricing-table " ng-show="{{tourValue}}">Tour Price&nbsp;&nbsp;({{adultValue}}&nbsp;Person*{{tour.tour_duration}}&nbsp;Days)<span style="color:black;" class="pull-right">Rs.&nbsp;{{tourPrice}}</span></li>
                                                <li class="pricing-table " ng-show="{{guideValue}}">Guide's Booking Price&nbsp;&nbsp;({{adultValue}}&nbsp;Person*{{dayValue}}&nbsp;Days)<span style="color:black;" class="pull-right">Rs.&nbsp;{{guidePrice}}</span></li>

                                                <li class="pricing-table " ng-show="transportbookValue">Pickup Location<span style="color:black;" id="pickupLocationModal" class="pull-right"></span></li>
                                                <li class="pricing-table " ng-show="transportbookValue">Pickup Time<span style="color:black;" id="pickuptimeModal" class="pull-right"></span></li>
                                                <li class="pricing-table " ng-show="transportbookValue">Source Location<span style="color:black;" id="fromLocationModal" class="pull-right"></span></li>
                                                <li class="pricing-table " ng-show="transportbookValue">Distance Location<span style="color:black;" id="toLocationModal" class="pull-right"></span></li>
                                                <li class="pricing-table " ng-show="transportbookValue">Promotional Discont<span style="color:black;" id="promocodedvalueModal" class="pull-right"> (-)</span></li>

                                                <li class="pricing-table " ng-show="lodgevalue">Lodging Price<span style="color:black;" class="pull-right">Rs.&nbsp;{{lodgeIDnew.PricePerNight}}</span></li>

                                                <li class="pricing-table " ng-hide="transportbookValue">Total Price(Excluding Tax) <span style="color:black;" class="pull-right">Rs.&nbsp;{{priceTotal}}</span></li>
                                                <li class="pricing-table " ng-show="successValue">Promotional Discount <span style="color:black;" class="pull-right">Rs.&nbsp;(-){{successValue}}</span></li>
                                                <li class="pricing-table " ng-hide="transportbookValue">Amount Payable(Including Tax) <span style="color:black;" class="pull-right">Rs.&nbsp;{{(priceTotal+((priceTotal*14)/100)+((priceTotal*0.5)/100)-successValue) | number : 0 }}</span></li>
                                                <li class="pricing-table " ng-show="transportbookValue">Amount Payable (Aprox.) <span style="color:black;" class="pull-right">Rs.&nbsp;<span id="grandtotalTransModal"></span></span>
                                                </li>
                                                <br>
                                                <li class="pricing-table " ng-show="transvalue">Transport Price Extra <span style="color:black;" class="pull-right">@ Rs.&nbsp;{{transIDnew.PricePerKM}} / Km</span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="background-color: #f9f9f9;">
                        <div class="row">
                            <div class="col-md-6">
                                <button style="width:200px; background-color:#ff845e" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" id="conformBokingID" style="width:200px; background-color:#ff845e" class="btn btn-default pull-right" data-dismiss="modal">Confirm Booking</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        
        <div class="modal fade" id="guideProposalModal" role="dialog" aria-labelledby="guideProposalModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <input type="hidden" id="conformationID" name="conformationID" value="" />
                <div class="modal-content">
                    <div class="modal-header" style="padding:15px 50px; background-color: #ff845e; color:white !important; text-align: center; font-size: 30px;">
                        <button type="button" class="close" style="background-color: #ff845e; color:white !important; text-align: center; font-size: 30px;" data-dismiss="modal">&times;</button>
                        <h4 style="background-color: #ff845e; color:white !important; text-align: center; font-size: 30px;"><span class="glyphicon glyphicon-lock"></span>Guide Proposal</h4>
                    </div>
                    <div class="modal-body" style="padding:20px 50px 0px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="sidebar-widget">
                                    <div class="row">
                                        <div class="pricing-tables pricing-tables-1 sidebar-widget">
                                            <div class="row">
                                                <center>We also offer guided tours or guides for hire. If are intrested to book a guide with your transport <span id="lcnName"></span>.<br>
                                                then click "OK" to book guide and select your transport with guide. 
                                                Many pakcaged guided tour already includes car.<br</center>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="background-color: #f9f9f9;">
                        <div class="row">
                            <div class="col-md-6">
                                <button style="width:200px; background-color:#ff845e" class="btn btn-default pull-left" data-dismiss="modal">Cancel</button>
                            </div>
                            <div class="col-md-6">
                                <button type="button" style="width:200px; background-color:#ff845e" onclick="red2search();" class="btn btn-default pull-right" data-dismiss="modal">OK</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <!-- javascripts -->
        <script type="text/javascript" src="js/modernizr.custom.17475.js"></script>

        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="bs3/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/check-radio-box.js"></script>
        <script type="text/javascript" src="js/script.js"></script>
        <script type="text/javascript" src="js/styleswitcher.js"></script>

        <script>

            function bookNowModalShow() {
                $('#bookNowModal').modal('show');
                //alert("This feature will be available soon......");
            }


            function conformationModal() {
                var $myForm = $('#bookingForm')
                if ($myForm[0].checkValidity()) {
                    $('#conformationModal').modal('show');
                } else {
                    //                     alert("Please Fill the required field.");
                    $('#conformationModal').modal('show');
                }
            }


            $(document).ready(function () {
                $("#conformBokingID").click(function () {
                    $("#bookingForm").submit();
                });
            });
        </script>

        <script>
            function childMinus() {
                var oldValue = document.getElementById("child").value;
                if (oldValue > 0) {
                    var newValue = parseInt(oldValue) - 1;
                    document.getElementById("child").value = newValue;
                }
            }

            function childPlus() {
                var oldValue = document.getElementById("child").value;
                var newValue = parseInt(oldValue) + 1;
                document.getElementById("child").value = newValue;
            }
        </script>
        <script>
            function comparePromocode(Ovalue) {

                var Nvalue = document.getElementById("promocodedvalue").value;
                if (Ovalue == Nvalue) {
                    document.getElementById("grandtotalvalue").innerHTML = document.getElementById("grandtotalvalue").innerHTML - 500;
                    var zz = document.getElementById("grandtotalvalue").innerHTML;
                    document.getElementById("grandtotalvalueI").value = zz;
                    // alert(zz);
                    var pcode = document.getElementById("promotional");
                    pcode.style.display = "table-row";

                    document.getElementById("promocodedvalueModal").innerHTML = "500";
                    document.getElementById("grandtotalTransModal").innerHTML = zz;
                    comparePromocode = function (a) {};
                }
                //alert("Ovalue = "+Ovalue);
            }
        </script>
        <script>
        function red2search()
        {
            var place = document.getElementById("fromLocation").value;
            window.location='search_results.php#?id='+place;
        }
        </script>
    </body>

    </html>