<?php
session_start();
include("db.php");
if((isset($_POST['username'])) && (isset($_POST['emailid'])) && (isset($_POST['monileno'])))
{
	include('sendEmail.php');
	
	$HostEmail = parse_ini_file('config.ini',true)['email'];
	$subject = "Forget Password Retreval Email";
	$message = "Hii Admin,<br>I have forget my password, please recover my password. My details are as follows<br>Name : " . $_POST['username'] . "<br>Email Address : " . $_POST['emailid'] . "<br>Mobile Number : " . $_POST['monileno'] . "<br><br><br>Thank you.";
	if(SendMail($HostEmail, 'GuidedGateway', 'support@guidedgateway.com', 'Guided Gateway Support', $subject, $message))
		{
			$errormsg="Email Sent";
			error_log($errormsg,0);
			header('Location: guide_login.php');
			die;
		}
		else
		{
			$errormsg="Sorry Email Couldn't Sent.";
			error_log($errormsg,0);
			header('Location: guide_login.php');
			exit;
		}
}
?>
				
				
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="favicon.png">

    <title>Guided Gateway</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="css/style_how.css" rel="stylesheet">
    <style type="text/css">
    body { padding-top: 10px; }
.nav.nav-justified > li > a { position: relative; }
.nav.nav-justified > li > a:hover,
.nav.nav-justified > li > a:focus { background-color: transparent; }
.nav.nav-justified > li > a > .quote {
    position: absolute;
    left: 0px;
    top: 0;
    opacity: 0;
    width: 30px;
    height: 30px;
    padding: 5px;
    background-color: #13c0ba;
    border-radius: 15px;
    color: #fff;  
}
.nav.nav-justified > li.active > a > .quote { opacity: 1; }
.nav.nav-justified > li > a > img { box-shadow: 0 0 0 5px #13c0ba; }
.nav.nav-justified > li > a > img { 
    max-width: 100%; 
    opacity: .3; 
    -webkit-transform: scale(.8,.8);
            transform: scale(.8,.8);
    -webkit-transition: all 0.3s 0s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transition: all 0.3s 0s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}
.nav.nav-justified > li.active > a > img,
.nav.nav-justified > li:hover > a > img,
.nav.nav-justified > li:focus > a > img { 
    opacity: 1; 
    -webkit-transform: none;
            transform: none;
    -webkit-transition: all 0.3s 0s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            transition: all 0.3s 0s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}
.tab-pane .tab-inner { padding: 10px 0 10px; }

@media (min-width: 400px) {
    .nav.nav-justified > li > a > .quote {
        left: auto;
        top: auto;
        right: 20px;
        bottom: 0px;
    }  
}
    </style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="bootstrap/js/html5shiv.js"></script>
    <script src="bootstrap/js/respond.min.js"></script>
    <![endif]-->
    
    <!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64862528-1', 'auto');
  ga('send', 'pageview');

</script>
    
</head>

<body data-spy="scroll" data-target="#topnav">

<div class="navbar navbar-inverse navbar-fixed-top" id="topnav">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="img/logo.png" alt="GuideGateway" height="17px" /> </a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="http://www.guidedgateway.com">Home</a></li>
                <li><a href="guide_login.php">Guide Home</a></li>
                <li><a href="guide_registration_1.php">Guide Sign Up</a></li>
            </ul>

        </div>
        <!--/.navbar-collapse -->
    </div>
</div>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron" id="home">
    <div class="container">
        <div class="media">
            <div class="media-body">
                <div class="col-md-6">
                    <h1 class="title" style="color: #444454">Guided <span>Gateway</span></h1>

                    <p style="color: #444454">Forget your password?? Don't worry!! <br>
					We are here for you.<br/>Send us email with your basis details we will sure help you.</p>
                </div>
				<div class="col-md-6"><br>
					<form action="EmailSendCode.php" method="POST" ng-app="myApp"  ng-controller="forgetPasswordValidateCtrl" name="myForm"  novalidate>
							<div>
							<div><span style="color:Black;">Your Name : </span></div>
							<div><input type="text" class="form-control" id="username" name="username" ng-model="username" placeholder="User Name" ng-pattern="/^[a-z A-Z]+$/" required >
							 <span style="color:red" ng-show="myForm.username.$dirty && myForm.username.$invalid">
								  <span ng-show="myForm.username.$error.required">*username is required.</span>
								   <span ng-show="myForm.username.$error.pattern">*Invalid username Name ...</span>
							</span>
							</div>
							</div>
							<div>
							<div><span style="color:Black;">Your Email Address : </span></div>
							<div><input type="text" class="form-control" id="emailid" name="emailid" ng-model="emailid" placeholder="Email Address" ng-pattern="/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9]+\.([a-zA-Z]{2,3}|([a-zA-Z]{2,3}\.[a-zA-Z]{2}))$/" required >
							 <span style="color:red" ng-show="myForm.emailid.$dirty && myForm.emailid.$invalid">
								  <span ng-show="myForm.emailid.$error.required">*Email is required.</span>
								   <span ng-show="myForm.emailid.$error.pattern">*Invalid Email Name ...</span>
							</span>
							</div>
							</div>
							<div>
							<div><span style="color:Black;">Your Mobile Number : </span></div>
							<div><input type="tel" class="form-control" id="monileno" name="monileno" ng-model="monileno" placeholder="Mobile Number" required>
							 <span style="color:red" ng-show="myForm.monileno.$dirty && myForm.monileno.$invalid">
								  <span ng-show="myForm.monileno.$error.required">*Mobile Number is required.</span>
								  </span>
								  </div>
							</div>
							<br /> <button class="btn  btn-sm btn-warning btn-block form-control" type="submit" style="font-size:17px; font-weight: bold;" ng-disabled="myForm.username.$dirty && myForm.username.$invalid || myForm.emailid.$dirty && myForm.emailid.$invalid || myForm.monileno.$dirty && myForm.monileno.$invalid ">Request For your password</button>
						</form>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="contact" id="contact">

    <div class="container">
         <h4 class="pull-top">Get in <strong>touch</strong></h4>
                <p>for more details</p>
        <div class="row">

            <div class="col-md-6">

                <br/>
                <h4>The <strong>Indian Office</strong></h4>
                <ul class="unstyled">
                    <li><i class="icon-map-marker"></i> <strong>Address:</strong> Kalighat , Kolkata , West Bengal
                    </li>
                    <li><i class="icon-phone"></i> <strong>Phone:</strong> +91 9830032920</li>
                    <li><i class="icon-envelope"></i> <strong>Email:</strong> <a href="mailto:support@guidedgateway.com">touchus@guidedgateway.com</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-offset-1 col-md-5">
                <br/>
                <h4>The <strong>US Office</strong></h4>
                <ul class="unstyled">
                    <li><i class="icon-map-marker"></i> <strong>Address:</strong> 34149 Finnigan Terrace, Fremont , CA , 94555
                    </li>
                    <li><i class="icon-phone"></i> <strong>Phone:</strong> +1 5109382562</li>
                    <li><i class="icon-envelope"></i> <strong>Email:</strong> <a href="mailto:support@guidedgateway.com">support@guidedgateway.com</a>
                    </li>
                </ul>


            </div>


        </div>

    </div>

</section>

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="footer-ribbon" style="right: 0">
                <h3 class="title" style="margin: 0;padding: 5px 10px">Thank <span>You</span></h3>
            </div>

        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <a class="logo" href="index.html">
                        <img src="img/logo.png" alt="Guided Gateway" height="30px">
                    </a>
                </div>
                <div class="col-md-5">
                    <p>&copy; Copyright 2015 by Guided Gateway. All Rights Reserved.</p>
                </div>
                <!-- div class="col-md-5">
                    <nav id="footer-menu">
                        <ul>
                            <li><a href="#">FAQ's</a></li>
                            <li><a href="#">Sitemap</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </nav>
                </div -->
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="js/angular.min.js"></script>
		<script type="text/javascript" src="js/AngularControler.js"></script>
<script src="js/jquery.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
