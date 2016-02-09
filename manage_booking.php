<?php 


?>

<html lang="en" dir="ltr">

<!-- START head -->

<head>
    <!-- Site meta charset -->
    <meta charset="UTF-8">

    <!-- title -->
    <title>Guide Sign In | Guided Gateway</title>

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
    <link rel="stylesheet" type="text/css" href="css/colors/color1.css" title="color1" />

</head>
<!-- END head -->

<!-- START body -->

<body>
    <!-- START #wrapper -->
    <div id="wrapper">
        <?php 
			include_once('MasterTopHeader.php'); 
			?>

            <!-- START .main-contents -->
            <div class="main-contents" id="myDiv">
                <br />
                <div class="container">
                    <div class="row">
                        <!-- START #page -->
                        <div id="page" class="col-md-4" style="border:1px solid gray">
                            <div id="DivSignIn">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="text-center">
                                            <a href="index.php" style="color: black; font-size:47px; font-weight:bold; font-family:Pacifico; text-decoration:none;">Guided Gateway</a>
                                            <br>
                                            <span style="color: black; font-size:20px; font-weight:bold; font-family:Pacifico; text-decoration:none;">Manage Your Booking Here</span>
                                        </div>
                                    </div>
                                    <br />
                                    <br />
                                    <div class="row">
                                        <div class="col-sm-12">

                                            <form action="booking-form-edit.php" method="POST" ng-app="myApp" ng-controller="validateBookingLogin" name="myForm" novalidate>
                                                <!--													<span>Your Name:</span>-->
                                                <input type="text" class="form-control" id="username" name="username" ng-model="username" placeholder="Enter Your Name" ng-pattern="/^([a-z A-Z]+)$/" required>
                                                <span style="color:red" ng-show="myForm.username.$dirty && myForm.username.$invalid">
                                                    <span ng-show="myForm.username.$error.required">*name is required.</span>
                                                    <span ng-show="myForm.username.$error.pattern">*Invalid Name ...</span>
                                                </span>
                                                <br />
                                                <!--                                                <span>Your Mobile:</span>-->
                                                <input type="text" class="form-control" id="mobilnumber" name="mobilnumber" ng-model="mobilnumber" placeholder="Enter Your Mobile Number" ng-pattern="/^[7-9]{1}\d{9}$/" required>
                                                <span style="color:red" ng-show="myForm.mobilnumber.$dirty && myForm.mobilnumber.$invalid">
                                                    <span ng-show="myForm.mobilnumber.$error.required">*mobile is required.</span>
                                                    <span ng-show="myForm.mobilnumber.$error.pattern">*Invalid mobile number ...</span>
                                                </span>
                                                <br />
                                                <!--                                                <span>Booking ID:</span>-->
                                                <input type="text" class="form-control" id="bookingnumber" name="bookingnumber" ng-model="bookingnumber" placeholder="Enter Booking Number" ng-pattern="/^[B]\d{10}$/" required>
                                                <span style="color:red" ng-show="myForm.bookingnumber.$dirty && myForm.bookingnumber.$invalid">
                                                    <span ng-show="myForm.bookingnumber.$error.required">*Booking ID is required.</span>
                                                    <span ng-show="myForm.bookingnumber.$error.pattern">*Invalid Booking ID ...</span>
                                                </span>
                                                <br />
                                                <button class="btn  btn-sm btn-warning btn-block form-control" type="submit" style="font-size:17px; font-weight: bold;" ng-disabled="myForm.username.$dirty && myForm.username.$invalid || myForm.username.$error.required|| myForm.mobilnumber.$dirty && myForm.mobilnumber.$invalid || myForm.mobilnumber.$error.required || myForm.bookingnumber.$dirty && myForm.bookingnumber.$invalid || myForm.bookingnumber.$error.required">Find Your Booking</button>
                                            </form>

                                            <br />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END #page -->
                        <div id="sidebar" class="col-md-1">
                        </div>
                        <!-- START #sidebar -->
                        <div id="sidebar" class="col-md-7">
                            <img src="images/slo1.png" style="width:90%" />
                        </div>
                        <!-- END #sidebar -->
                    </div>
                    <!-- END .row -->
                    <br />
                </div>
            </div>
            <!-- END .main-contents -->

            <?php include_once('MasterTopFooter.php'); ?>

    </div>
    <!-- END #wrapper -->

    <!-- javascripts -->
    <script type="text/javascript" src="js/angular.min.js"></script>
    <script type="text/javascript" src="js/AngularControler.js"></script>
    <script type="text/javascript" src="js/modernizr.custom.17475.js"></script>
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="bs3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/check-radio-box.js"></script>
    <script type="text/javascript" src="js/script.js"></script>

</body>

</html>