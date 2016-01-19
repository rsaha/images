<!DOCTYPE html>
<html lang="en" dir="ltr">

<!-- START head -->

<head>
    <!-- Site meta charset -->
    <meta charset="UTF-8">

    <title>Tour Details | Guided Gateway - Authentic Affordable Travel</title>

    <!-- meta description -->
    <meta name="description" content="Authentic Afordable Travel in India" />

    <!-- meta keywords -->
    <meta name="keywords" content="travel
		guide tourism india" />

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
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <!--<script type="text/javascript"  src= "js/angular.min.js"></script>-->
    <script type="text/javascript" src="transport.js"></script>
    <script src="js/ui-bootstrap-tpls-0.10.0.min.js"></script>

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
        
        div.short-text {
            white-space: nowrap;
            width: 15em;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>
    <style type="text/css">
        ul>li,
        a {
            cursor: pointer;
        }
        
        img:hover {
    opacity: 1.0;
   // filter: alpha(opacity=100); /* For IE8 and earlier */
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

<body ng-app="topTours">
    <!-- START #wrapper -->
    <div id="wrapper">
        <!-- START header -->
        <?php 
			
				include('MasterTopHeader.php'); 
			
			
			?>

            <!-- START #page-header -->
            <div id="">

                <div class="container">
                    <div class="row">
                        <section class="col-sm-6">
                            <h1 class="text-upper"><i class="fa fa-cab" style="color:black;"></i>&nbsp;&nbsp;Transport</h1>
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

            <!-- START .main-contents -->
            <div class="main-contents" ng-controller="transportCrtl">
                <div class="container">

                    <div class="row">
                            <div class="col-md-8">
                                <div ng-show="filteredItems > 0">
                                    <div class="" ng-repeat="data in filtered = (list) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                                        <div class="col-md-12 ">
                                            <div class="row">
                                            <div class="tour-plans">
                                                 <div class="col-md-6">
                                                <div class="plan-image">
                                                    <a ng-href="transport-booking-form.php#?id={{data.ID}}">
                                                        <img class="img-responsive" style="width:770px; height:150px;hover:opacity: 0.6;" ng-src="{{data.Media.Image[0] ==null ? 'img/SAMPLE_TAJ.jpg' : data.Media.Image[0]}}" alt="Tranport image" />
                                                    </a>
                                                    <div class="offer-boxNew" style="width: 300px; ">
<!--
                                                       <div class="offer-topNew">
                                                            <span class="fa fa-tag alignright">{{data.tour_category}}</span>
                                                            <span class="text-upper" style="color:#ff845e; font-size:12px; font-weight:700;">{{data.tour_location}}</span>
                                                            <div class="short-text text-upper" style="color:#fff; line-height:1; font-size:20px; margin:0;" title="{{data.tour_title}}">{{data.tour_title}}</div>
                                                        </div>
-->
                                                        
<!--
                                                        <div class="offer-top">
                                                            <span class="fa fa-tag alignright">{{data.tour_category}}</span>
                                                            <span class="text-upper" style="color:#ff845e; font-size:12px; font-weight:700;">{{data.tour_location}}</span>
                                                            <div class="short-text text-upper" style="color:#fff; line-height:1; font-size:20px; margin:0;" title="{{data.tour_title}}">{{data.tour_title}}</div>
                                                        </div>

                                                        <div class="offer-bottom">
                                                            <span class="" style="font-size:12px;">Starting From </span>
                                                            <span class="" style="font-size:18px; font-weight:700; line-height:1;">Rs. {{data.tour_price}}</span>
                                                        </div>
-->
                                                    </div>
                                                </div>
                                                </div>
                                              
                                           
                                            <div class="col-md-6">
                                                <div class="offer-top">
                                                            <span class="fa fa-tag alignright">{{data.Category}}</span>
                                                            <span class="text-upper" style="color:#ff845e; font-size:12px; font-weight:700;">{{data.PartnerName}}</span>
                                                            <div class="short-text text-upper" style="color:#fff; line-height:1; font-size:20px; margin:0;" title="{{data.tour_title}}">{{data.Description}}</div>
                                                        </div>
                                                 <div class="offer-bottom">
                                                            <span class="" style="font-size:12px;">Price Per Hour </span>
                                                            <span class="" style="font-size:18px;color:black; font-weight:700; line-height:1;">&nbsp;<i class="fa fa-rupee" ></i>&nbsp;{{data.PricePerHour}}&nbsp;</span>
                                        <span class="" style="font-size:12px;">Price Per KM </span>
                                                            <span class="" style="font-size:18px;color:black; font-weight:700; line-height:1;">&nbsp;<i class="fa fa-rupee" ></i>&nbsp;{{data.PricePerKM}}&nbsp;</span>
                                                        </div>
<!--
                                              <div class="featured-btm box-shadow1">
                                                    <span class="fa fa-map-pin text-upper">&nbsp;&nbsp;{{data.tour_territory[0]}}&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                    <span class="fa fa-hourglass text-upper">&nbsp;&nbsp;{{data.tour_duration}}&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                    <span class="fa fa-thumbs-up text-upper" star-rating rating-value="5"></span>
                                                    <span class="alignleft fa fa-life-ring">&nbsp;&nbsp; reviews&nbsp;&nbsp;&nbsp;&nbsp;</span>
                                                </div>
--><br>
                                                <div class="post-desc">
        <input type="text" class="form-control" name="fromLocation" id="fromLocation" autocomplete="on" placeholder="From Location" ng-pattern="/^[a-z A-Z]+$/" />
        <input type="text" class="form-control" name="toLocation" id="toLocation" autocomplete="on" placeholder="To Location" ng-pattern="/^[a-z A-Z]+$/" />
                                                    <a id="bookButton" class="alignright" ng-href="#">
                                                        <input type="submit" name="submit" class="btn btn-sm btn-success text-upper marb20" value="Estimate Charge" />
                                                    </a>
                                                </div>
                                                </div>
                                                 </div>
                                        </div><br>
</div>
                                        <!-- <div class="clearfix"></div>-->
                                    </div>
                                    
                                </div>
                            </div>
                        <!-- START #sidebar -->
                        <aside id="sidebar" class="col-md-4">
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
                    <!-- START .pagination -->
                    <div class="col-md-12">
                        <div pagination="" style="background-color:white;" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>


                    </div>
                    <!-- END .pagination -->
                </div>
            </div>
            <!-- END .main-contents -->

            <!-- START footer -->
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