<?php

	session_start();

	if((isset($_SESSION['userId'])) && ($_SESSION['phase'] == "signin"))
	{
		header('Location:guide_profile.php?id=' . $_SESSION['userId'] . '');
		exit;
	}
	else if((isset($_SESSION['userId'])) && ($_SESSION['phase'] == "reg"))
	{
		header('Location:guide_registration_2.php?id=' . $_SESSION['userId'] . '');
		exit;
	}
	else
	{
		//session_unset();
		//session_destroy();
		//session_write_close();
	}
	
?>

<html lang="en" dir="ltr">

	<!-- START head -->
	<head>
		<!-- Site meta charset -->
		<meta charset="UTF-8">
		
		<!-- title -->
		<title>Guide Sign Up | Guided Gateway</title>
		
		<!-- meta description -->
		<meta name="description" content="Guided Gateway" />
		
		<!-- meta keywords -->
		<meta name="keywords" content="Travel India Tourist Guide" />
		
		<!-- meta viewport -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<script type="text/javascript" src="js/modernizr.custom.17475.js"></script>
			
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="bs3/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/check-radio-box.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
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
		<style type="text/css" >
		#abc {
			border-radius: 25px;
	padding: 25px 25px 25px 25px;
	}

	#abc h1 {
		font: 30px Georgia, Serif; color: #444454; letter-spacing: 2px; margin: 0 0 10px 0;
	}
	#abc h2 {
		font: 12px Georgia, Serif; color: #444454; letter-spacing: 2px; margin: 0 0 10px 0;
	}
	#abc h3 {
		font: 12px Georgia, Serif; color: #444454; letter-spacing: 2px; margin: 0 0 10px 0;
	}
	
		</style>
		<script type="text/javascript" src="js/bootbox.min.js"></script>
		<script type="text/javascript" src="js/bootbox.js"></script>
		
	<script type="text/javascript" src="js/angular.min.js"></script>
	<script type="text/javascript" src="js/AngularControler.js"></script>
	</head>
	<!-- END head -->

	<!-- START body -->
	<body>
        
        <div class="modal fade" id="memberModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                 <h4 class="modal-title" id="memberModalLabel">Sorry Already Registered !</h4>

            </div>
            <div class="modal-body">
                <p>The email address or Mobile number you entered is already registred with us.
                    <BR>Please login if you are already registered,</p>
                <p>Or sign up with different email id/mobile number.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
        
        
		<!-- START #wrapper -->
		<div id="wrapper">
			<?php 
			if((isset($_SESSION['userId'])) && ($_SESSION['phase'] == "signin"))
			{
				include_once('MasterHeaderAfterLogin.php'); 
			}
			else
			{
				include_once('MasterTopHeader.php'); 
			}
			
			?>
			<br />
			
<!-- START .main-contents -->
<div class="main-contents">
	<div class="container">
		<div class="row">

			<!-- START #page -->
			<div id="page" class="col-md-5">
				<div id="abc" class="text-center">

                    <h1><strong>Make tourists happier and earn more</strong></h1>
                    <h3><strong>Be great at what you do!</strong></h3><br/>
                    <h2><strong>Attract More Tourists through our marketing programs</strong></h2>
                        <h2><strong>Make more from each tourist with our low commission &amp; other services</strong></h2>
                        <h2><strong>Optionally offer lodging and transport service from our partners</strong></h2>
                        <h2><strong>Compensation for no-show or late cancellation</strong></h2></br/>
					<span class="btn-center">
					<a class="btn btn-primary text-upper" href="https://storage.googleapis.com/guidedgateway_media/GG_Guide.pdf" title="Learn More">Learn More</a>
					</span> 
				</div>
			</div>
			<!-- END #page -->

			<!-- START #sidebar -->
			<div id="sidebar" class="col-md-7">
				<div id="DivSignUp" >
					<div class="row">
						<div class="text-center">
							<p href="Index.html" style="color:#444454; ">
							<span style="font-size:25px;">Welcome Travel Enterprenures </span>&nbsp;&nbsp;
							<span style="font-size:15px;">Get started - It's absolutely free</span>
						</div>
					</div>

					<div class="row" ng-app="myApp">
						<form action="guide_Step1.php" method="post"  ng-controller="validateCtrl" ng-submit="submitForm(myForm.$valid)" name="myForm"  novalidate>
							<div class="col-sm-12">
								<div class="row">
									<div class="col-sm-12">
										<div class="form-group">
											<div class="form-group col-sm-6">
												<input type="text" value="" name="FirstName" ng-model="FirstName" id="FirstName" placeholder="First Name" class="form-control" required ng-pattern="/^[a-z A-Z]+$/" > 
											 <span style="color:red" ng-show="myForm.FirstName.$dirty && myForm.FirstName.$invalid">
											  <span ng-show="myForm.FirstName.$error.required">*First Name is required.</span>
											   <span ng-show="myForm.FirstName.$error.pattern">*Invalid First Name ...</span>
											  </span>
											</div>
											<div class="form-group col-sm-6">
												<input type="text" value="" name="LastName" ng-model="LastName" id="LastName" placeholder="Last Name" class="form-control" required ng-pattern="/^[a-z A-Z]+$/">
											     <span style="color:red" ng-show="myForm.LastName.$dirty && myForm.LastName.$invalid">
											  <span ng-show="myForm.LastName.$error.required">*Last Name is required.</span>
											   <span ng-show="myForm.LastName.$error.pattern">*Invalid Last Name ...</span>
											  </span>
											</div>
										</div>
									</div>
								</div>

								<div class="form-group">
									<div class="form-group col-sm-12">
										<input type="email" value="" name="EmailAddress" id="EmailAddress" ng-model="EmailAddress" onblur="checkEmail(this.value)"  placeholder="Email Address" class="form-control" ng-pattern="/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9]+\.([a-zA-Z]{2,3}|([a-zA-Z]{2,3}\.[a-zA-Z]{2}))$/" required >
										<span style="color:red" ng-show="myForm.EmailAddress.$dirty && myForm.EmailAddress.$invalid">
									  <span ng-show="myForm.EmailAddress.$error.required">*Email is required.</span>
									  <span ng-show="myForm.EmailAddress.$error.pattern">*Invalid email address.</span>
									  </span>								
									</div>
								</div>
                              <!-- <div class="form-group">
									<div class="form-group col-sm-12">
										<input type="hidden" value="" name="emailmessage" id="emailmessage"  >
									</div>
								</div> -->
								<div class="form-group">
									<div class="form-group col-sm-12">
										<input type="tel" value="" name="MobileNumber" ng-model="MobileNumber" id="MobileNumber" placeholder="Mobile Number" class="form-control" maxlength="10" required ng-pattern="/^[7-9]{1}\d{9}$/">
									<span style="color:red" ng-show="myForm.MobileNumber.$dirty && myForm.MobileNumber.$invalid">
									  <span ng-show="myForm.MobileNumber.$error.required">*MobileNumber is required.</span>
									  <span ng-show="myForm.MobileNumber.$error.pattern">*Invalid MobileNumber ...</span>
									  </span>
									</div>
								</div>


								<div class="form-group">
									<div class="form-group col-sm-6">
										<input type="password" class="form-control" id="Password" ng-model="Password" maxlength="15" name="Password" placeholder="Password" ng-pattern="/^[a-zA-Z_0-9!@#$%^&*]{6,15}$/" required >
									<span style="color:red" ng-show="myForm.Password.$dirty && myForm.Password.$invalid">
									  <span ng-show="myForm.Password.$error.required">*Password is required.</span>
									  <span ng-show="myForm.Password.$error.pattern">*Invalid Password ...</span>
									  </span>
									</div>
									<div class="form-group col-sm-6">
										<input type="password" compare-to="Password" class="form-control" id="conformpassword" ng-model="conformpassword" name="conformpassword"  placeholder="Confirm Password" ng-pattern="/^[a-zA-Z_0-9!@#$%^&*]{6,15}$/" required >
									<span style="color:red" ng-show="myForm.conformpassword.$dirty && myForm.conformpassword.$invalid">
									  <span ng-show="myForm.conformpassword.$error.required">*password is required.</span>
									  <span ng-show="myForm.conformpassword.$error.pattern">*Invalid password ...</span>
									  </span>
									</div>
								</div>
								
								<div class="form-group">
									<div class="col-sm-12 text-center">
										<strong style="color:#444454;">By clicking Register button, you agree to Guided Gateway's <a target="_blank" id="TosLink" href="termsofuse.html">Terms of Service</a> and <a target="_blank" id="PrivacyLink" href="privacy.html">Privacy Policy</a></strong>
										<br /><br />
										<input class="col-md-8 col-md-offset-2 btn btn-warning" name="submitbutton" type="submit" id="registerUser" value="Register" style="font-size:17px; font-weight: bold;" class="form-control" 
										ng-disabled="myForm.$invalid ||
										myForm.FirstName.$dirty && myForm.FirstName.$invalid 
										|| myForm.LastName.$dirty && myForm.LastName.$invalid 
										|| myForm.EmailAddress.$dirty && myForm.EmailAddress.$invalid 
										|| myForm.MobileNumber.$dirty && myForm.MobileNumber.$invalid 
										|| myForm.Password.$dirty && myForm.Password.$invalid 
										|| myForm.conformpassword.$dirty && myForm.conformpassword.$invalid
										"  />
										<br><br><br>
									</div>
								</div>
								<div class="col-sm-12 text-center">
									<strong style="color:#444454;">Or call us at 9830032920</strong>
								</div>
								<div class="text-center">
									<span style="color:gray;">
									Already a member? <a id="LinkSignIn" href="login.php">Sign In</a>
									</span>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<!-- END #sidebar -->
		</div>
		<!-- END .row -->
	</div>
</div>
<!-- END .main-contents -->
			
			<?php include_once('MasterTopFooter.php'); ?>
    
    <?php

if(isset($_SESSION['notification']))
	{
    //echo '<script> alert("' . $_SESSION['notification'] . '"); </script>';
    ?>
<script>
        $(document).ready(function () {
            $('#memberModal').modal('show');
           
        });
        </script>
<?php
        $_SESSION['notification']="";
		unset($_SESSION['notification']);
		
	}
    session_unset();
    session_destroy();
    session_write_close();

?>
    
		</div>

		<!-- END #wrapper -->

				<!-- javascripts -->

			<script type="text/javascript">
				function validate() {
				var password1 = $("#Password").val();
				var password2 = $("#conformpassword").val();
				
				if(password1 != password2) {
					document.getElementById('conformpassword').style.border='1px solid red';
					document.getElementById('registerUser').disabled=true;
				}
				else {
						document.getElementById('conformpassword').style.border='';
						//document.getElementById('registerUser').disabled=false;
				}
				}
			</script> 
		
		
			
		<!--[if lt IE 9]>
			<script type="text/javascript" src="js/html5shiv.js"></script>
		<![endif]-->
	</body>
</html>