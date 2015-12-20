<?php
	session_start();
	
	if(isset($_SESSION['userId']))
	{ 
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
		
	 }
	else
	{
		include_once("signOut.php");
        header('Location:login.php');
		exit;
	} 
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
        <script type="text/javascript" src="topTour.js"></script>
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
            #editButton {
                top: 20px;
                height: 29px;
                position: absolute;
                right: 20px;
            }
            
            div.short-text {
                white-space: nowrap;
                width: 10em;
                overflow: hidden;
                text-overflow: ellipsis;
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
        <div id="wrapper">
            <!-- START header -->
            <?php 
			
				include('MasterHeaderAfterLogin.php'); 
			
			
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
                                            <?php
                                        $select4Tpic = mysql_query("SELECT * FROM `tbl_tour_media_pictures` WHERE `tour_id` = $tourID");
                                        $count4Tpic = mysql_num_rows($select4Tpic);
                                        if ($count4Tpic==0)
                                        {
                                            echo '<img alt="featured Scroller" class="img-responsive" draggable="false" src="img/custom11.jpg"/>';
                                        }
                                        else
                                        {
                                            echo '<img alt="featured Scroller" class="img-responsive" draggable="false" src="showMediaPicture.php?id=' . mysql_result($select4Tpic, 0, 0) . '"/>';
                                        }
                                        ?>

                                                <div class="offer-box">
                                                    <div class="offer-top">
                                                        <span class="fa fa-tag alignright"> <?php echo $tour_category_id; ?></span>

                                                        <span class="fa fa-location-arrow" style="font-weight:bold;color:white"> <?php echo $tour_location; ?> </span>
                                                        <h2 class="featured-cy text-upper"> <?php echo $tour_duration; ?> day(s)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h2>
                                                    </div>

                                                    <div class="offer-bottom">
                                                        <!--											<span class="featured-stf">Per Person </span>-->
                                                        <span class="featured-spe">Rs. <?php echo $tour_price; ?><span style="font-size:20px"> Per Person</span></span>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="featured-btm box-shadow1">
                                            <a class="fa fa-map-pin text-upper" style="color:black; font-size:12px; font-weight:bold;" href="#"> #### </a>
                                            <a class="fa fa-user text-upper" style="color:black; font-size:12px; font-weight:bold;" href="#">
                                                <?php echo $user_id; ?>
                                            </a>
                                            <a class="fa fa-map-marker text-upper" style="color:black; font-size:12px; font-weight:bold;" href="#"> Start Point:&nbsp;&nbsp;<?php echo $start_point ?>&nbsp;&nbsp;-&nbsp;&nbsp; End Point:&nbsp;&nbsp;<?php echo $end_point; ?></a>
                                        </div>
                                        <?php echo '<a id="editButton" onclick="editTour(' . $user_id . ',' . $row1['tour_id'] . ');" class="alignright"> <input type="submit" name="submit" class="btn btn-success text-upper " value="Edit" /></a>'; ?>


                                    </div>
                                    <!-- END .tour-plans -->
                                    <br>
                                    <br>


                                    <!-- START TABS -->
                                    <ul class="nav nav-tabs text-upper">
                                        <li class="active"><a href="#tourPlan" data-toggle="tab">Tour Plan</a></li>
                                        <li><a href="#flightSchedule" data-toggle="tab">Places Covered</a></li>
                                    </ul>
                                    <!-- END TABS -->

                                    <!-- START TAB CONTENT -->
                                    <div class="tab-content gray box-shadow1 clearfix marb30">
                                        <!-- START TAB 1 -->
                                        <div class="tab-pane active" id="tourPlan">
                                            <ul class="row list-unstyled" style="padding: 5px 5px 5px 5px;">
                                                <?php
										for($p=1; $p<=$tour_duration; $p++)
										{
											$select5 = mysql_query("SELECT * FROM `tbl_tour_itinerary` WHERE `tour_id` = $tourID and `day` = $p");
											$count5 = mysql_num_rows($select5);
											?>
                                                    <li class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                                        <img class="img-responsive" src="img/custom2.jpg" alt="Days" />
                                                        <div style="height:100px" class="plan-info">
                                                            <p style="font-size:12px; font-weight:bold;" class="text-upper">Day
                                                                <?php echo $p; ?>
                                                            </p>
                                                            <?php
													if($count5 > 0)
													{
														echo '<p>';
														while($row5 = mysql_fetch_array($select5))
														{
                                                            echo '<div class="short-text" title="' . $row5["description"]. '">' . $row5["description"]. '.</div>';
															//echo $row5["description"].". ";
														}
														echo '</p>';
													}
													else
													{
														echo "<p>Description is not provided</p>";
													}
													?>
                                                        </div>
                                                    </li>
                                                    <?php
										}
										?>
                                            </ul>
                                        </div>
                                        <!-- END TAB 1 -->

                                        <!-- START TAB 2 -->
                                        <?php
								$select4 = mysql_query("SELECT * FROM `tbl_tour_itinerary` WHERE `tour_id` = $tourID");
								
								$count4 = mysql_num_rows($select4);
								
								?>
                                            <div class="tab-pane" id="flightSchedule">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th>Place</th>
                                                                <th>Day</th>
                                                                <th>Time</th>
                                                                <th>Description</th>
                                                                <th>Transport</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php
											if($count4 > 0)
									{
										while($row4 = mysql_fetch_array($select4))
										{
											?>
                                                                <tr class="dark-gray">
                                                                    <td>
                                                                        <?php echo $row4["tourist_spot"]; ?>
                                                                    </td>
                                                                    <td>Day
                                                                        <?php echo $row4["day"]; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $row4["intraday"]; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $row4["description"]; ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php echo $row4["transport"]; ?>
                                                                    </td>
                                                                </tr>
                                                                <?php
										}
									}
									else
									{
										?>
                                                                    <tr class="dark-gray">
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                    <?php
									}
									?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <!-- END TAB 2 -->
                                    </div>
                                    <!-- END TAB CONTENT -->

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
                                        <div class="tab-pane active" id="topguides" ng-controller="guidescontrol">
                                            <br>
                                            <div class="col-md-12">
                                                <p>Description :
                                                    <?php echo $tour_description; ?>
                                                </p>
                                                <p>
                                                    <h5>Start Point : <?php echo $start_point; ?></h5></p>
                                                <p>
                                                    <h5>End Point : <?php echo $end_point; ?></h5></p>
                                                <p>Inclusive :
                                                    <?php echo $inclusive; ?>
                                                </p>
                                                <p>Exclusive :
                                                    <?php echo $exclusive; ?>
                                                </p>
                                                <p>
                                                    <h5>Cancellation Policy : <?php echo $cancelation_policy; ?></h5></p>
                                                <p>
                                                    <h5>Restrcitions: <?php echo $restrictions; ?></h5></p>
                                                <p>Notes &amp; Summary :
                                                    <br/>
                                                    <?php echo $notes; ?>
                                                        </h5>
                                                </p>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <?php
							$select4Tpic2 = mysql_query("SELECT * FROM `tbl_tour_media_pictures` WHERE `tour_id` = $tourID");
							$count4Tpic2 = mysql_num_rows($select4Tpic2);
							?>
                                                <div class="sidebar-widget">
                                                    <!-- Sidebar Flickr Gallery -->
                                                    <h3 class="text-upper">Tour Gallery</h3>
                                                    <ul class="col-md-12 list-unstyled">
                                                        <?php
									if($count4Tpic2 > 0)
									{
										while($row1 = mysql_fetch_array($select4Tpic2))
										{
											echo '<li class="col-md-4"><img class="img-responsive" src="showMediaPicture.php?id=' . $row1['picture_media_id'] . '"  /></li>';
										}
									}
									else
									{
										echo '<li class="col-md-4"><img class="img-responsive" src="http://placehold.it/85x62"  /></li>';
									}
									?>

                                                    </ul>
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
            function editTour(id1, id2) {
                window.location.href = "edit_Tour.php?id1=" + id1 + "&id2=" + id2 + "";
                return false;
            }
        </script>
        <!--[if lt IE 9]>
			<script type="text/javascript" src="js/html5shiv.js"></script>
		<![endif]-->

    </body>

    </html>