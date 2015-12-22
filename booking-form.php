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
        <script type="text/javascript">
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
        </script>
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

    <body ng-app="mybookingPage" ng-controller="guides_booking">

        <div class="modal fade" id="bookNowModal" tabindex="-1" role="dialog" aria-labelledby="bookNowModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="bookNowModallLabel">Thank you !</h4>

                    </div>
                    <div class="modal-body">
                        <p>We received your booking request. Our customer service will contact you soon.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>


        <!-- START #wrapper -->
        <div id="wrapper">
            <!-- START header -->
            <?php include_once('MasterTopHeader.php'); ?>
                <!-- END header -->
                <!-- END #page-header -->
                <form id="bookingForm" action="booking-form-code.php" method="post">
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
                                                        <input type="text" class="form-control" name="tourist_name" required />
                                                    </div>
                                                </li>
                                                <li class="row">
                                                    <div class="col-md-6">
                                                        <label>Email <span class="required small">(Required)</span></label>
                                                        <input type="email" class="form-control" name="tourist_email" required />
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>Contact Number <span class="required small">(Required)</span></label>
                                                        <input type="number" min="7000000000" max="9999999999" class="form-control" name="tourist_mobile" required />
                                                    </div>
                                                </li>

                                                <li class="row">
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
                                                                    <span class="input-group-addon" style="cursor:pointer" onclick="childMinus();"><i style="font-size:12px" class="fa fa-minus"></i></span>
                                                                    <input type="text" id="child" name="noOfPersonChild" class="form-control" value="0" readonly>
                                                                    <span class="input-group-addon" style="cursor:pointer" onclick="childPlus();"><i style="font-size:12px" class="fa fa-plus"></i></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="row">
                                                    <div class="col-md-6">
                                                        <label>Date of Tour <span class="required small">(Required)</span></label>
                                                        <input type="date" class="form-control" name="dateOfTour" value="" required />
                                                    </div>

                                                    <div class="col-md-6" ng-show="{{guideValue}}">
                                                        <label>Tour Duratios [In Days] <span class="required small">(Required)</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon" style="cursor:pointer" ng-click="tourdayminus(dayValue);"><i style="font-size:12px" class="fa fa-minus"></i></span>
                                                            <input type="text" id="tourDurationG" name="tourDurationG" value="" class="form-control" ng-model="dayValue" readonly>
                                                            <span class="input-group-addon">Days</span>
                                                            <span class="input-group-addon" style="cursor:pointer" ng-click="tourdayplus(dayValue);"><i style="font-size:12px" class="fa fa-plus"></i></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6" ng-show="{{tourValue}}">
                                                        <label>Tour Duratios [In Days] <span class="required small">(Required)</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon" onclick="tourDurationMinus();"></span>
                                                            <input type="text" id="tourDurationT" name="tourDurationT" value="{{tour.tour_duration}}" class="form-control" readonly>
                                                            <span class="input-group-addon">Days</span>
                                                        </div>
                                                    </div>
                                                </li>

                                                <li class="row">
                                                    <div class="col-md-12">
                                                        <div class="sidebar-widget">
                                                            <!-- Sidebar What We Do -->
                                                            <div class="panel-group" id="accordion">
                                                                <div class="panel panel-default">
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
                                                                <div class="panel panel-default">
                                                                    <div class="panel-heading">
                                                                        <a class="panel-title collapsed urlUnchange" data-toggle="collapse" href="#collapseTwo"> Transport Service</a>
                                                                    </div>
                                                                    <div id="collapseTwo" class="panel-collapse collapse">
                                                                        <div class="panel-body">
                                                                            <div class="col-md-12">
                                                                                <div>
                                                                                    <div class="col-md-3" ng-repeat="trans in transport | filter:{ City: tour.tour_location}">
                                                                                        <a id="addExtraService" style="height:20px" class="btn btn-xs btn-default" data-toggle="tab" ng-click="transID(trans.ID);">Add</a>
                                                                                        <a style="cursor:pointer" data-value="{{trans.ID}}" ng-click="transportModel(trans.ID);">
                                                                                            <div class="ft-item">
                                                                                                <span class="ft-image">
                                                                                                 <img style="" src="{{trans.Media.Image[0]}}" alt="Top Destination" /> 
                                                                                              </span>
                                                                                                <div class="ft-data" style="font-size:11px;">
                                                                                                    <span style="color:black;" class="fa fa-book text-upper">&nbsp;&nbsp;{{trans.Category}}&nbsp;&nbsp;</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                                                    <!-- <span style="color:black;" class="fa fa-book text-upper" >&nbsp;&nbsp;{{x.Speciality}}</span>&nbsp;&nbsp;&nbsp;&nbsp;
							  <span style="color:black;" class="fa fa-plane text-upper" >&nbsp;&nbsp;{{x.LanguageKnown}}</span> -->
                                                                                                </div>
                                                                                                <div class="ft-foot" style="word-wrap:break-word; ">
                                                                                                    <h4 class="ft-title text-upper" style="color:#686868">{{trans.City}}</h4>
                                                                                                    <span class="ft-offer text-upper">{{trans.PriceForDay}}Per Day</span>
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
                                                                                    <input type="text" class="form-control" name="promoCode" placeholder="Enter Promo Code" ng-model="promocode">
                                                                                    <span class="input-group-addon" style="cursor:pointer; color:black; background-color:#979999;" ng-click="comparePromo(promocode,'<?php echo $promoCode; ?>');">Apply</span>
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
                                                        <input type="button" class="btn btn-primary btn-md text-upper" onclick="conformationModal();" name="booknow" value="Book Now" />
                                                        <input type="submit" name="booknow" hidden />
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
                                        </ul>
                                        <!-- END TABS -->

                                        <!-- START TAB CONTENT -->
                                        <div class="tab-content gray box-shadow1 clearfix marb30">
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

                                                        <div class="tour-plans" style="padding:10px 10px 10px 10px;">
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
                                                                    <a class="fa fa-user text-upper" href="tour_detail_sidebar.php#?id1={{tour.tour_id}}">{{tour.tour_id}}</a>
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
                                                            <h4>Min. Tour Charges &nbsp;: {{tourPrice}}</h4>
                                                        </div>
                                                    </div>
                                                </div>

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
                                                        <h4>Guide Charges : {{guidePrice}}</h4>
                                                        <hr style="margin: 20px 0; border: 1px solid #808080;">
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
                                                <input type="hidden" name="transport_id" value="{{transIDnew.ID}}" />
                                                <input type="hidden" name="transport_name" value="{{transIDnew.Description}}" />
                                                <input type="hidden" name="transport_price" value="{{transIDnew.PriceForDay}}" />
                                                <h4>Transport Charges &nbsp;&nbsp;: Rs.&nbsp;{{transIDnew.PriceForDay}}</h4>
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
                                                            <tr>
                                                                <td style="text-align:right">Total&nbsp;: Rs.&nbsp;</td>
                                                                <td style="text-align:right">{{priceTotal}}</td>
                                                                <input type="hidden" name="gTotal" value="{{priceTotal}}" />
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align:right">tax @ 14% &nbsp;: Rs.&nbsp;</td>
                                                                <td style="text-align:right">{{(priceTotal*14)/100}}
                                                                    <input type="hidden" name="serviceTax" value="{{(priceTotal*14)/100}}" />
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align:right">Swachh Bharat tax @ 0.5% &nbsp;: Rs.&nbsp;</td>
                                                                <td style="text-align:right">{{(priceTotal*0.5)/100}}
                                                                    <input type="hidden" name="swachhTax" value="{{(priceTotal*0.5)/100}}" />
                                                                </td>
                                                            </tr>
                                                            <input type="hidden" name="PromoDis" value="{{successValue}}" />
                                                            <tr ng-show="successValue">
                                                                <td style="text-align:right">Promotional Discount &nbsp;: Rs.&nbsp;</td>
                                                                <td style="text-align:right">(-){{successValue}}

                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td style="text-align:right">
                                                                    <h4>Grand total&nbsp;: Rs.&nbsp;</h4></td>
                                                                <td style="text-align:right">
                                                                    <h4>{{(priceTotal+((priceTotal*14)/100)+((priceTotal*0.5)/100)-successValue) | number : 0 }}</h4></td>
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
                    <div class="modal-header" style="padding:35px 50px; background-color: #ff845e; color:white !important; text-align: center; font-size: 30px;">
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
                                            <h3 class="text-upper">{{lodgeIDSelected.City}}</h3> </div>
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
                    <div class="modal-header" style="padding:35px 50px; background-color: #ff845e; color:white !important; text-align: center; font-size: 30px;">
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
                                        <li class="pricing-table ">Description <span style="color:black;">{{transIDSelected.Description}}</span></li>
                                        <!--									<li>Address<span style="color:black;"> {{transIDSelected.Address}}</span></li>-->
                                        <li class="pricing-table ">City <span style="color:black;">{{transIDSelected.City}}</span></li>
                                        <li class="pricing-table ">Category <span style="color:black;">{{transIDSelected.Category}}</span></li>
                                        <li class="pricing-table ">PriceForDay<span style="color:black;">{{transIDSelected.PriceForDay}}</span></li>
                                        <li class="pricing-table ">IncludedInTour <span style="color:black;">{{transIDSelected.IncludedInTour}}</span></li>

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
            <div class="modal-dialog">
                <input type="hidden" id="conformationID" name="conformationID" value="" />
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header" style="padding:35px 50px; background-color: #ff845e; color:white !important; text-align: center; font-size: 30px;">
                        <button type="button" class="close" style="background-color: #ff845e; color:white !important; text-align: center; font-size: 30px;" data-dismiss="modal">&times;</button>
                        <h4 style="background-color: #ff845e; color:white !important; text-align: center; font-size: 30px;"><span class="glyphicon glyphicon-lock"></span>Conform Your Booking</h4>
                    </div>
                    <div class="modal-body" style="padding:20px 50px 0px;">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="sidebar-widget">
                                    <!-- Sidebar Categories -->
                                    <div class="row">
                                        here the data will come
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
                                <button type="submit" id="conformBokingID" style="width:200px; background-color:#ff845e" class="btn btn-default pull-right" data-dismiss="modal">Conform Booking</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div id="bookNowModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="bookNowModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="bookNowModallLabel">Thank you !</h4>

                    </div>
                    <div class="modal-body">
                        <p>We received your booking request. Our customer service will contact you soon.</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
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
            function conformationModal() {
                $('#conformationModal').modal('show');
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
    </body>

    </html>