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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="js/angular.min.js"></script>
    <script src="searchResult.js"></script>
    <!-- <script src="myGuideDetail.js"></script> -->
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
            <div class="row">
                <div class="main-contents col-md-4 col-md-offset-1 col-sm-10 col-sm-offset-1 pull-left" style="margin-top:20px;">
                    <form class="">
                        <div class="row">
                            <br>
                            <div class="col-md-10 col-sm-10 col-sm-offset-1 col-md-offset-1 col-xs-10 col-xs-offset-1 input-group">
                                <input type="text" class="form-control" style="background-color:white; border:1px #cccccc solid" ng-model="searchID" placeholder="Location" />
                                <span class="input-group-addon">
						<i class="fa fa-search"></i>
						</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-md-offset-1 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
                                <br>
                                <label> Search By </label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <label>
                                    <input class="input-cb" type="checkbox" name="inc_Destination" value="1" ng-model="checkboxModel.value3" checked />&nbsp;Destinations</label>&nbsp;&nbsp;
                                <label>
                                    <input class="input-cb" type="checkbox" name="inc_Guide" value="1" ng-model="checkboxModel.value2" checked />&nbsp;Guides</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                <label>
                                    <input class="input-cb" type="checkbox" name="inc_Tour" checked ng-model="checkboxModel.value1" value="" />&nbsp;Tours</label>&nbsp;&nbsp;&nbsp;&nbsp;

                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!--
      <div class="main-contents pull-left" id="">

                <div class="container">
                    <div class="row">
                        <section class="col-sm-6 col-md-offset-1">
                            <h1 class="text-upper"><i class="fa fa-hourglass-end" style="color:black;"></i>&nbsp;&nbsp;Search Result For {{searchID}}</h1>
                        </section>
                    </div>
                </div>

            </div>
-->
            <!-- START .main-contents -->
            <div class="main-contents ">
                <div class="container">
                    <br>
                    <div class="row" ng-repeat="f in places | filter:searchID" ng-show="$index<1">
                        <h3><label  style="color:grey">You search for :</label> {{searchID}}</h3>
                        <h4><u>{{searchID}}</u> : </h4> <label style="text-align:justify; text-justify: inter-word;">{{f.Description}}</label>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            
                            <br/>
                            <!-- START Search Container -->

                            <!-- END Search Container -->
                            <div class="row">
                                <h2 class="ft-heading text-upper col-md-12" ng-show="checkboxModel.value3"><i class="fa fa-leaf"></i>&nbsp;&nbsp;Top Destinations<span class="alignright"> <a class="btn btn-primary" href="top-destinations-listview-sidebar.php"><span>More&nbsp;<i class="fa fa-angle-double-right"></i></span></a></span></h2>
                            </div>
                            <div class="carousel" ng-show="checkboxModel.value3">
                                <ul class="slides">
                                    <li>
                                        <div class="row bom-contents" style="height:380px;">
                                            <div class="col-md-11">
                                                <div class="col-md-4" ng-repeat="z in places | filter:searchID" ng-show="$index<3">
                                                    <a href="destination-detail-sidebar.php#?id3={{z.ID}}">
                                                        <div class="ft-item">
                                                            <span class="ft-image">
							 <img style="height:200px;" src="{{'z.Media.Image[0]'=='' ? 'img/custom1.jpg' :z.Media.Image[0]}}" alt="Top Destination" /> 
						  </span>

                                                            <div class="ft-data" style="height:45px;font-size:11px;">
                                                                <span style="color:black;" class="fa fa-calendar-check-o text-upper">{{z.BestTimeToVisit}}</span>
                                                            </div>

                                                            <div class="ft-foot" style="word-wrap:break-word; height:50px;">
                                                                <h4 class="ft-title text-upper" style="color:#686868">{{z.Name}}</h4>
                                                                <span class="ft-offer text-upper">{{z.Category}}</span>
                                                            </div>

                                                            <div class="ft-foot-ex">
                                                                <span class="fa fa-trophy text-upper alignleft">{{z.TourCount}}&nbsp;&nbsp;Tours</span>

                                                                <span class="alignright fa fa-life-ring">{{z.GuideCount}}&nbsp;&nbsp;Guides</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-md-1 alignright" style="padding-top:265px;padding-right:20px;">
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
                                                <div class="col-md-4" ng-repeat="y in allguides | filter:searchID" ng-show="$index<3 ">
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
                                            </div>
                                        </div>

                                    </li>
                                </ul>
                            </div>

                            <div class="row">
                                <h2 class="ft-heading text-upper col-md-12" ng-show="checkboxModel.value1"><i class="fa fa-trophy"></i>&nbsp;&nbsp; Popular Tours<span class="alignright"> <a class="btn btn-primary" href="top-tours-listview-sidebar.php"><span style="">More&nbsp;<i class="fa fa-angle-double-right"></i></span></a></span></h2>
                            </div>
                            <div class="carousel" ng-show="checkboxModel.value1">
                                <ul class="slides">
                                    <li>

                                        <div class="row bom-contents" style="height:380px;">
                                            <div class="col-md-11">
                                                <div class="col-md-4" ng-repeat="x in tours | filter:searchID" ng-show="$index<3">
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

                        </div>

                        <!-- START #sidebar -->
                        <aside id="sidebar" class="col-md-4" style="margin-top:148px;">
                            <div class="sidebar-widget">
                                <!-- Sidebar recent popular posts -->
                                <!-- START TABS -->
                                <ul class="nav nav-tabs text-upper">
                                    <li class="active urlUnchange"><a ng-href="#topdestinations" data-toggle="tab">Places</a></li>
                                    <li class="urlUnchange"><a ng-href="#topguides" data-toggle="tab">Guides</a></li>
                                    <li class="urlUnchange"><a ng-href="#lodging" data-toggle="tab">Lodging</a></li>
                                </ul>
                                <!-- END TABS -->

                                <!-- START TAB CONTENT -->
                                <div class="tab-content gray box-shadow1 clearfix marb30">
                                    <!-- START TAB 2 -->
                                    <div class="tab-pane" id="topguides" style="height:310px;">
                                        <div class="col-md-12">
                                            <ul class="list-unstyled">
                                                <li ng-repeat="z in guides" ng-show="$index<3">
                                                    <span class="rc-post-image">
                                                    <a ng-href="guide-detail-sidebar.php#?id2={{z.id}}" target="_blank">	
                                                        <img class="img-responsive" style="height:70px; width:60px;" ng-src="{{z.photo==null ? 'img/new_user.png' :z.photo}}" alt="Recent Post 2" /></a>
												</span>
                                                    <h5><a ng-href="#">{{z.name}}</a></h5>
                                                    <h5><a ng-href="#">{{z.guide_territory[0]}}</a></h5>
                                                    <!--												<h5>{{z.Speciality}}<span class="rc-post-date small">Speciality&nbsp;&nbsp;</span></h5>-->
                                                    <span star-rating rating-value="z.review.rating" style="" class=""></span>
                                                    <!-- a href="booking-form.php#?id1={{z.id}}&id2=0"> <input type="submit" name="submit" class="pull-right btn btn-sm btn-primary  marb20" value="Book Now" /></a -->
                                                    <br>
                                                    <br>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- END TAB 2 -->

                                    <!-- START TAB 3 -->
                                    <div class="tab-pane active" id="topdestinations" style="height:310px;">
                                        <ul class="rc-posts-list list-unstyled">
                                            <li ng-repeat="k in places" ng-show="$index<3">
                                                <span class="rc-post-image">
                                                    <a ng-href="destination-detail-sidebar.php#?id3={{k.ID}}">	<img class="img-responsive"  ng-src="{{k.Media.Image[0]}}" alt="Tour 1" /></a>
												</span>
                                                <h5><a ng-href="#">{{k.Name}}</a></h5>
                                                <span class="rc-post-date small">Best Visit:&nbsp;&nbsp;&nbsp;{{k.BestTimeToVisit}}</span>
                                                <br/>
                                                <!-- a href="#"> <input type="submit" name="submit" class="pull-right btn btn-sm  btn-primary text-upper marb20" value="Explore" /></a-->
                                                <br>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- END TAB 3 -->
                                    <!-- lodging hotels -->
                                    <div class="tab-pane" id="lodging" style="height:310px;">
                                        <div class="col-md-12">
                                            <ul class="list-unstyled">
                                                <li ng-repeat="lodge in lodging" ng-show="$index<3 ">
                                                    <span class="rc-post-image">
                                                    <a href="">	<img class="img-responsive" ng-src="{{lodge.Media.Image[0]}}" alt="Hotel" /></a>
												</span>
                                                    <h5><a ng-href="#">{{lodge.Address}}</a></h5>
                                                    <span style="" class="">Coming Soon from our partners</span>
                                                    <br>
                                                    <a ng-href="#" style="margin-left:110px;">
                                                        <input type="submit" name="submit" class="pull-right btn btn-sm btn-primary  marb20" value="Coming Soon" />
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- END TAB CONTENT -->
                            </div>
                        </aside>
                        <!-- END #sidebar -->
                    </div>
                </div>
            </div>
            <!-- END .main-contents -->
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

</body>

</html>