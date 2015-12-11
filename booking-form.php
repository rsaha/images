<!DOCTYPE html>
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
    <script type="text/javascript" src="anki/jquery-1.10.2.min.js"></script>
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

</head>
<!-- END head -->

<!-- START body -->

<body ng-app="mybookingPage">

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
    <div id="wrapper" ng-controller="guides_booking">
        <!-- START header -->
        <?php include_once('MasterTopHeader.php'); ?>
            <!-- END header -->
            <!-- END #page-header -->

            <!-- START .main-contents -->
            <div class="main-contents">
                <div class="container">
                    <div class="row">

                        <!-- START #page -->
                        <div id="page" class="col-md-8">
                            <!-- START #contactForm -->
                            <section id="booking-form">
                                <h2 class="ft-heading text-upper">Provide Your Booking Information</h2>
                                <!--								<form action="booking-form-code.php" method="post">-->
                                <fieldset>
                                    <ul class="formFields list-unstyled">
                                        <li class="row">
                                            <div class="col-md-12">
                                                <label>Name <span class="required small">(Required)</span></label>
                                                <input type="text" class="form-control" name="name" value="" />


                                            </div>
                                        </li>
                                        <li class="row">
                                            <div class="col-md-6">
                                                <label>Email <span class="required small">(Required)</span></label>
                                                <input type="text" class="form-control" name="email" value="" />
                                            </div>
                                            <div class="col-md-6">
                                                <label>Contact Number <span class="required small">(Required)</span></label>
                                                <input type="text" class="form-control" name="email" value="" />
                                            </div>
                                        </li>

                                        <li class="row">
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>ADULT <span class="required small">(12+ YRS)</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon" style="cursor:pointer" onclick="adultMinus();"><i style="font-size:12px" class="fa fa-minus"></i></span>
                                                            <input type="text" id="adult" name="adult" class="form-control" value="1">
                                                            <span class="input-group-addon" style="cursor:pointer" onclick="adultPlus();"><i style="font-size:12px" class="fa fa-plus"></i></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>CHILD <span class="required small">(0-11 YRS)</span></label>
                                                        <div class="input-group">
                                                            <span class="input-group-addon" style="cursor:pointer" onclick="childMinus();"><i style="font-size:12px" class="fa fa-minus"></i></span>
                                                            <input type="text" id="child" name="child" class="form-control" value="0">
                                                            <span class="input-group-addon" style="cursor:pointer" onclick="childPlus();"><i style="font-size:12px" class="fa fa-plus"></i></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </li>
                                        <li class="row">
                                            <div class="col-md-6">
                                                <label>Date of Tour <span class="required small">(Required)</span></label>
                                                <input type="date" class="form-control" name="zipcode" value="" />
                                            </div>


                                            <div class="col-md-6" ng-controller="Singleguide" ng-show="{{guideValue}}">
                                                <label>Tour Duratios [In Days] <span class="required small">(Required)</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon" style="cursor:pointer" onclick="tourDurationMinus();"><i style="font-size:12px" class="fa fa-minus"></i></span>
                                                    <input type="text" id="tourDuration" name="tourDuration" class="form-control" value="1">
                                                    <span class="input-group-addon">Days</span>
                                                    <span class="input-group-addon" style="cursor:pointer" onclick="tourDurationPlus();"><i style="font-size:12px" class="fa fa-plus"></i></span>
                                                </div>
                                            </div>

                                            <div class="col-md-6" ng-controller="Singletour" ng-show="{{tourValue}}">
                                                <label>Tour Duratios [In Days] <span class="required small">(Required)</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon" onclick="tourDurationMinus();"></span>
                                                    <input type="text" id="tourDuration" name="tourDuration" value="{{tour.tour_duration}}" class="form-control" readonly>
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
                                                                <a class="panel-title collapsed" data-toggle="collapse" href="#collapseOne">
                                                                    Lodging (Coming Soon)
                                                                </a>
                                                            </div>
                                                            <div id="collapseOne" class="panel-collapse collapse">
                                                                <div class="panel-body">
                                                                    <div class="col-md-12" ng-controller="Singletour">
                                                                        <div>

                                                                            <div class="col-md-3" ng-repeat="lodge in lodging | filter:{ City: tour.tour_location} ">
                                                                                <a id="addExtraService" style="height:20px" class="btn btn-xs btn-default" data-toggle="tab" ng-click="lodgeID(lodge.ID);">Add</a>
                                                                                <a style="cursor:pointer" data-value="{{lodge.ID}}" onclick="lodgingDetail();">
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
                                                                <a class="panel-title collapsed" data-toggle="collapse" href="#collapseTwo"> Transport Service (Coming Soon)</a>
                                                            </div>
                                                            <div id="collapseTwo" class="panel-collapse collapse">
                                                                <div class="panel-body">
                                                                    <div class="col-md-12" ng-controller="Singletour">
                                                                        <div>
                                                                           
                                                                            <div class="col-md-3" ng-repeat="trans in transport | filter:{ City: tour.tour_location}">
                                                                                <a id="addExtraService" style="height:20px" class="btn btn-xs btn-default" data-toggle="tab" ng-click="transID(trans.ID);">Add</a>
                                                                                <a style="cursor:pointer" data-value="{{trans.ID}}" onclick="transportDetail();">
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
                                                                <a class="panel-title collapsed" data-toggle="collapse" href="#collapseThree"> Promo Code <span class="small">(If you have)</span></a>
                                                            </div>
                                                            <div id="collapseThree" class="panel-collapse collapse">
                                                                <div class="panel-body">
                                                                    <div class="col-md-6">
                                                                        <div class="input-group">
                                                                            <!--  <span class="input-group-addon" ></span>-->
                                                                            <input type="text" class="form-control" name="promocode" placeholder="Enter Promo Code" value="">
                                                                            <span class="input-group-addon" style="cursor:pointer; color:black; background-color:#979999;" onclick="tourDurationPlus();">Apply</span>
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
                                                <input type="submit" class="btn btn-primary btn-lg text-upper" onclick="bookNowModalShow();" name="booknow" value="Book Now" />
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
                                    <li class="active" ng-controller="Singletour" ng-show="{{tourValue}}">
                                        <a href="#popular-posts" data-toggle="tab">Requested Tour Detail</a></li>
                                    <li ng-controller="Singleguide" class="active" ng-show="{{guideValue}}">
                                        <a href="#popular-posts" data-toggle="tab">Requested Guide Detail</a></li>
                                </ul>
                                <!-- END TABS -->

                                <!-- START TAB CONTENT -->
                                <div class="tab-content gray box-shadow1 clearfix marb30">
                                    <div class="tab-pane active" id="popular-posts">

                                        <div ng-controller="Singletour">
                                            <div ng-show="{{tourValue}}">
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
                                                                    <span class="featured-spe" style="font-size:15px"> {{tour.tour_price}} /-</span>
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
                                                    <h4>Total for Tour: {{tour.tour_price}}</h4>
                                                </div>

                                            </div>
                                        </div>

                                        <div style="text-align:justify; padding:10px 10px 0px 10px;" ng-controller="Singleguide">
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
                                                <hr style="margin: 20px 0; border: 1px solid #808080;">
                                            </div>
                                        </div>

                                        <!-- div style="text-align:justify; padding:10px 10px 10px 10px;">
                                            <div id="toptours" class="row">
                                                <ul class=" list-unstyled">
                                                    <li class="col-md-12">
                                                        <div class="col-md-4">
                                                            <span class="rc-post-image ">
<<<<<<< HEAD
                                                        <img class="img-responsive" src="img/lodging.png" alt="Tour 1" />
=======
                                                    <a href="#"><img class="img-responsive" src="img/SAMPLE_TOUR.jpg" alt="Tour 1" /></a>
>>>>>>> 8fb3333913e75cf1caf5c41eaa98b35c2eae1bca
												</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h5><a href="#">Lodging </a></h5>
                                                            <span class="rc-post-date small">{{tour.tour_duration}}</span>
                                                            <br/>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="alignright">
                                                <h4>Lodging charges: Coming Soon</h4></div>
                                            <hr style="margin: 20px 0; border: 1px solid #808080;">
                                        </div>

                                        <div style="text-align:justify; padding:10px 10px 10px 10px;">
                                            <div id="toptours" class="row">
                                                <ul class=" list-unstyled">
                                                    <li class="col-md-12">
                                                        <div class="col-md-4">
                                                            <span class="rc-post-image ">
<<<<<<< HEAD
                                                        <img class="img-responsive" src="img/transport.png" alt="Tour 1" />
=======
                                                    <a href="#">
                                                        <img class="img-responsive" src="img/SAMPLE_TOUR.jpg" alt="Tour 1" />
                                                    </a>
>>>>>>> 8fb3333913e75cf1caf5c41eaa98b35c2eae1bca
												</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h5><a href="#">Transport Service </a></h5>
                                                            <span class="rc-post-date small">Coming soon</span>
                                                            <br/>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="alignright">
                                                <h4>Transport charges: Coming Soon </h4></div>
                                            <hr style="margin: 20px 0; border: 1px solid #808080;">
                                        </div>
                                        <div style="text-align:justify; padding:10px 10px 10px 10px;">
                                            <div id="toptours" class="row">

                                            </div>
                                            <div class="alignright">
                                                <h4>Grand Total: {{tour.tour_price}}</h4></div>
                                        </div -->

                                    </div>
                                </div>

                                  <div style="text-align:justify; padding:0px 10px 0px 10px;" ng-controller="Singleguide">
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
                                <br>
<!--                                division on the click of lodging and transport -->
                                        <div id="" ng-show="lodgevalue" class="gray" style="text-align:justify; padding:10px 10px 10px 10px;">
                                            <div id="close_lodging" class="pull-right"><a style="cursor:pointer" ng-click="closelodge()"><i class="fa fa-times"></i></a></div>

                                            <div id="toptours" class="row">
                                                <ul class=" list-unstyled">
                                                    <li class="col-md-12">
                                                        <div class="col-md-4">
                                                            <span class="rc-post-image ">
                                                        <img class="img-responsive" src="{{lodgeIDnew.Media.Image[0]}}" alt="Tour 1" />
												</span>
                                                        </div>
                                                        <div class="col-md-8">
                                                            <h5>{{lodgeIDnew.City}}</h5>
                                                            <span class="rc-post-date small">{{lodgeIDnew.Address}}</span>
                                                            <br/>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="alignright">
                                                <h4>Lodging charges: Rs.{{lodgeIDnew.PricePerNight}}</h4>
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
                                                            <h5>{{transIDnew.City}} </h5>
                                                            <span class="rc-post-date small">{{transIDnew.Description}}</span>
                                                            <br/>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="alignright">
                                                <h4>Price: Rs.{{transIDnew.PriceForDay}}</h4>
                                            </div>
                                            <hr>
                                        </div>
<!--                                close division -->
                                <br>
                                <div class="gray">
                                    <div class="row">
                                         <div class="col-md-12">
                                             <div class="pull-right">
                                                 <h4>Price: Rs.{{transIDnew.PriceForDay}}</h4>
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

            <!-- START footer -->
            <?php include('MasterTopFooter.php'); ?>
                <!-- END footer -->
    </div>
    <!-- END #wrapper -->

    <div id="lodgingDetailModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="lodgingDetailModalLabel" aria-hidden="true">
        <input type="hidden" id="lodgingID" name="lodgingID" value="" />
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="lodgingDetailModalLabel">Lodging options</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            We will have many more lodging options for you soon...
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div id="transportDetailModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="transportDetailModalLabel" aria-hidden="true">
        <input type="hidden" id="transportID" name="transportID" value="" />
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="transportDetailModalLabel">Transport Services</h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        We will have many more transport service options for you soon...
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
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
        function lodgingDetail() {
            var id = $(this).data('index');
            //var id = $(this).attr('data-value');
            //var id = $(this).data("value");

            document.getElementById("lodgingID").value = id;
            $('#lodgingDetailModal').modal('show');
            //alert("This feature will be available soon......");
        }

        function transportDetail() {
            $('#transportDetailModal').modal('show');
            //alert("This feature will be available soon......");
        }

        function bookNowModalShow() {
            $('#bookNowModal').modal('show');
            //alert("This feature will be available soon......");
        }
    </script>

    <script>
        function adultMinus() {
            var oldValue = document.getElementById("adult").value;
            if (oldValue > 1) {
                var newValue = parseInt(oldValue) - 1;
                document.getElementById("adult").value = newValue;
            }
        }

        function adultPlus() {
            var oldValue = document.getElementById("adult").value;
            var newValue = parseInt(oldValue) + 1;
            document.getElementById("adult").value = newValue;
        }

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

        function tourDurationMinus() {
            var oldValue = document.getElementById("tourDuration").value;
            if (oldValue > 1) {
                var newValue = parseInt(oldValue) - 1;
                document.getElementById("tourDuration").value = newValue;
            }
        }

        function tourDurationPlus() {
            var oldValue = document.getElementById("tourDuration").value;
            var newValue = parseInt(oldValue) + 1;
            document.getElementById("tourDuration").value = newValue;
        }
    </script>

    <!--[if lt IE 9]>
			<script type="text/javascript" src="js/html5shiv.js"></script>
		<![endif]-->

</body>

</html>