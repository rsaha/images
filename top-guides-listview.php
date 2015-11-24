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
    <meta name="keywords" content="travel
		guide tourism india" />

    <!-- meta viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- favicon -->
    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
            font-size: 14px;
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
    <style type="text/css">
        ul>li,
        a {
            cursor: pointer;
        }
    </style>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"></script>
    <script src="guideList.js"></script>
    <!--<script type="text/javascript"  src="topTour.js"></script>-->
    <script src="js/ui-bootstrap-tpls-0.10.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<!-- END head -->

<!-- START body -->

<body ng-app="myGuideList">
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
                            <h1 class="text-upper"><i class="fa fa-user-secret" style="color:black;"></i>&nbsp;&nbsp;Top Guides</h1>
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
            <!-- <div class="main-contents col-md-8 col-md-offset-2" id="searchDiv">
					<form class="plan-tour">
						<div class="top-fields"><br>
						<div class="row">								
						<div class="col-md-8 col-md-offset-1">
						<input type="text" class="form-control" style="background-color:white;" placeholder="Where to go?" />
						</div> 
						<div class="col-md-2" >
						<input type="submit" class="form-control" style="background-color:#ff845e;" class="btn btn-primary" value="Search" /> 
						</div> 
						</div>
						<div class="row">
						<div class="col-md-7 col-md-offset-1"> <br>
						<label >Search via</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<label><input class="input-cb"	type="checkbox" name="inc_Tour" value="1"	checked="checked" /> Tours</label>&nbsp;&nbsp;&nbsp;&nbsp;
						<label><input class="input-cb" type="checkbox" name="inc_Guide" value="1" checked="checked" /> Guides </label>&nbsp;&nbsp;&nbsp;&nbsp;
						<label><input class="input-cb" type="checkbox"	name="inc_Destination" value="1" checked="checked"/> Destinations</label>&nbsp;&nbsp; 
						</div> 
						</div>
						</div>
					</form>
				</div> -->
            <!-- START .main-contents -->
            <div class="main-contents" ng-controller="customersCrtl">
                <div class="container">
                    <div class="row ">
                        <div class="col-md-8">
                            <div class="row bom-contents">
                                <div ng-show="filteredItems > 0">
                                    <div class="col-md-4" ng-repeat="data in filtered = (list) | startFrom:(currentPage-1)*entryLimit | limitTo:entryLimit">
                                        <div class="">
                                            <!--                                            ft-item-->
                                            <span class="ft-image">
                                          <a href="guide-detail-sidebar.php#?id2={{data.id}}">
                                             <img style="height:150px;" class="img-responsive"  ng-src="{{data.photo == null ? 'img/userDefaultIcon.png' : data.photo}}" alt="Top Guide" /> </a>
                                          </span>
                                            <div class="col-md-12" style="background-color:#ff845e;">
                                                <span style="color:black;" class="fa fa-map-marker text-upper">&nbsp;{{data.city}}&nbsp;</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <span style="color:black;" class="fa fa-hourglass text-upper">&nbsp;{{data.experiance_in_year}}&nbsp;</span>
                                                <br>
                                                <span style="font-size:11px;color:black;" class="fa fa-book text-upper">&nbsp;{{data.language_known[0][0]}}&nbsp;</span>
                                                 <span style="font-size:11px;color:black;" class="fa fa-registered text-upper" >{{data.license_no}}</span>
                                            </div>
                                        </div>

                                        <div class="ft-foot">
                                            <div class="short-text ft-title text-upper" style="font-size:16px ; color:white;" title="{{data.name}},&nbsp;&nbsp;{{data.gender}}">
                                                &nbsp;{{data.name}},&nbsp;&nbsp;{{data.gender}}&nbsp;
                                            </div>
                                        </div>

                                        <div class="ft-foot-ex">
                                            <span class="fa fa-trophy text-upper alignleft">&nbsp;{{data.tour.length}} Tours&nbsp;&nbsp;&nbsp;&nbsp;</span>&nbsp;&nbsp;&nbsp;
                                            <span star-rating rating-value="data.Review.Star" class="aligncenter"></span>
                                            <span class="alignright ">&nbsp;{{data.Review.Count}} reviews&nbsp;</span>
                                            <br>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <aside id="sidebar" class="col-md-4">
                            <div class="sidebar-widget">
                                <!-- Sidebar recent popular posts -->
                                <!-- START TABS -->
                                <ul class="nav nav-tabs text-upper">
                                    <li class="active"><a href="#toptours" data-toggle="tab">Tours</a></li>
                                    <li><a href="#topdestinations" data-toggle="tab">Places</a></li>
                                    <li><a href="#lodging" data-toggle="tab">Hotels</a></li>
                                </ul>
                                <!-- END TABS -->

                                <!-- START TAB CONTENT -->
                                <div class="tab-content gray box-shadow1 clearfix marb30">
                                    <!-- START TAB 1 -->
                                    <div class="tab-pane active" style="height:600px;" id="toptours">
                                        <ul class="rc-posts-list list-unstyled">
                                            <li ng-repeat="x in alltours" ng-show="$index<4">
                                                <span class="rc-post-image">
                                                    <a ng-href="tour_detail_sidebar.php#?id={{x.tour_id}}">
                                                        <img class="img-responsive" ng-src="{{x.photo ==null ? 'img/SAMPLE_TAJ.jpg' : x.photo[0]}}" alt="Tour 1" /></a>
												</span>
                                                <h5>{{x.tour_title}}</h5>
                                                <span class="rc-post-date small">Starting Price&nbsp;{{x.tour_price}}</span>
                                                <br/>
                                                <a ng-href="booking-form.php#?id1=0&&id2={{x.tour_id}}">
                                                    <input type="submit" name="submit" class="pull-right btn btn-sm btn-primary  marb20" value="Book Now" />
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- END TAB 1 -->
                                    <!-- START TAB 3 -->
                                    <div class="tab-pane" id="topdestinations" style="height:600px;">
                                        <ul class="rc-posts-list list-unstyled">
                                            <li ng-repeat="k in allplaces" ng-show="$index<4">
                                                <span class="rc-post-image">
                                                <a ng-href="destination-detail-sidebar.php#?id3={{k.ID}}">
													<img class="img-responsive" style="height:80px;width:80px;" ng-src="{{k.Media.Image[0]}}" alt="Tour 1" />
                                                </a>
												</span>
                                                <h5>{{k.Name}}</h5>
                                                <span class="rc-post-date small">Best Time to Visit:&nbsp;{{k.BestTimeToVisit}}</span>
                                                <br/>
                                                <a ng-href="destination-detail-sidebar.php#?id3={{k.ID}}">
                                                    <input type="submit" name="submit" class="pull-right btn btn-sm btn-primary text-upper marb20" value="Explore" />
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- END TAB 3 -->
                                    <!-- START TAB 4 -->
                                    <!-- lodging hotels -->
                                    <div class="tab-pane" id="lodging" style="height:600px;">
                                        <ul class="rc-posts-list list-unstyled">
                                            <li ng-repeat="lodge in lodging" ng-show="$index<4 ">
                                                <span class="rc-post-image">
                                                    <a ng-href="#">	
                                                        <img class="img-responsive" style="height:80px; width:65px;" ng-src="{{lodge.Media.Image[0]}}" alt="Hotel" /></a>
												</span>
                                                <h5><a ng-href="#">{{lodge.Address}}</a></h5>
                                                <span style="" class="">Coming Soon from our partners</span>
                                                <br>
                                                <br>
                                                <a href="#" style="margin-left:110px;">
                                                    <input type="submit" name="submit" class="pull-right btn btn-sm btn-primary  marb20" value="Coming Soon" />
                                                </a>
                                            </li>

                                        </ul>
                                    </div>
                                    <!-- END TAB 4 -->
                                </div>
                                <!-- END TAB CONTENT -->
                            </div>
                        </aside>
                    </div>
                    <br>
                    <!-- START .pagination -->
                    <div class="row">
                        <div pagination="" style="background-color:white;;" page="currentPage" on-select-page="setPage(page)" boundary-links="true" total-items="filteredItems" items-per-page="entryLimit" class="pagination-small" previous-text="&laquo;" next-text="&raquo;"></div>
                    </div>
                    <!-- END .pagination -->
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