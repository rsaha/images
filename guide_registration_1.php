<?php
session_start();
if(isset($_SESSION['userId']))
{
	header('Location:guide_registration_2.php?id=' . $_SESSION['userId'] . '');
	exit;
}
?>

<html lang="en" dir="ltr">

	<!-- START head -->
	<head>
		<!-- Site meta charset -->
		<meta charset="UTF-8">
		
		<!-- title -->
		<title>User Profile</title>
		
		<!-- meta description -->
		<meta name="description" content="YOUR META DESCRIPTION GOES HERE" />
		
		<!-- meta keywords -->
		<meta name="keywords" content="YOUR META KEYWORDS GOES HERE" />
		
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
		<style type="text/css" >
		#abc {
			border-radius: 25px;
	padding: 80px 20px 80px 20px;
	background: url(img/divad.jpg);
}

	#abc h1 {
		font: 20px Georgia, Serif; color: #f2f0eb; letter-spacing: 2px; margin: 0 0 10px 0;
		text-shadow: 0px 10px 10px #000000;
	}
	#abc h2 {
		font: 12px Georgia, Serif; color: #f2f0eb; letter-spacing: 2px; margin: 0 0 10px 0;
		text-shadow: 0px 10px 10px #000000;
	}
	#abc h3 {
		font: 12px Georgia, Serif; color: #f2f0eb; letter-spacing: 2px; margin: 0 0 10px 0;
		text-shadow: 0px 10px 10px #000000;
	}
	
		</style>
	</head>
	<!-- END head -->

	<!-- START body -->
	<body>
		<!-- START #wrapper -->
		<div id="wrapper">
			<?php include('MasterHeader.php'); ?>
			<br />
			
			<!-- START .main-contents -->
			<div class="main-contents">
				<div class="container">
					<div class="row">
					
						<!-- START #page -->
						<section
						class="col-md-3 fd-column"> <div
						class="featured-dest"> <span class="fd-image">
						<img class="img-circle"
						src="http://placehold.it/150x150" alt="Featured
						Destination" /> 
						<h1>Make tourists happier</h1>
						<h3>Be great at what you do!</h3><br />
						<h2>Attract More Tourists through our marketing programs</h2>
						<h2>Make more from each tourist with our low commission</h2>
						<h2>Provide complete tour package with our partners</h2>
						<h2>Compensation for no-show or late cancellation</h2>
						</div>
                        <span
						class="btn-center"><a class="btn btn-primary
						text-upper" href="How it works"
						title="Learn More">Learn More</a></span> </div>
						</section>	
						<!-- END #page -->
						
						<!-- START #sidebar -->
						<div id="sidebar" class="col-md-7">
						<div id="DivSignUp" >
								<div class="row">
								<div class="text-center">
								<p href="Index.html" style="color:#444454; ">
								<span style="font-size:25px;">Welcome Guide </span>&nbsp;&nbsp;
								<span style="font-size:15px;">Get started - It's absolutely free</span>
								</div>
								</div>
								
							<div class="row">
							 <form action="guide_Step1.php" method="post">
							<div class="col-sm-12">
								<div class="row">
								<div class="col-sm-12">
								<div class="form-group">
								<div class="form-group col-sm-6">
								<input type="text" value="" name="FirstName" id="FirstName" placeholder="First Name" class="form-control" required pattern="[a-z A-Z]+" > 
								</div>
								<div class="form-group col-sm-6">
								<input type="text" value="" name="LastName" id="LastName" placeholder="Last Name" class="form-control" required pattern="[a-z A-Z]+">
								</div>
								</div>
								</div>
								</div>
								
									<div class="form-group">
								<div class="form-group col-sm-12">
								<input type="email" value="" name="EmailAddress" id="EmailAddress" placeholder="Email Address" class="form-control" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9]+\.([a-zA-Z]{2,3}|([a-zA-Z]{2,3}\.[a-zA-Z]{2}))" required >
								</div>
								</div>
								
								<div class="form-group">
								<div class="form-group col-sm-12">
								<input type="tel" value="" name="MobileNumber" id="MobileNumber" placeholder="Mobile Number" class="form-control" maxlength="10" required pattern="(^[7-9]{1}\d{9}$)">
								</div>
								</div>
								
								
								<div class="form-group">
								<div class="form-group col-sm-6">
								<input type="password" class="form-control" id="Password" maxlength="15" name="Password" placeholder="Password" pattern="(^[a-zA-Z_0-9!@#$%^&* ]{6,15}$)" required >
								</div>
								<div class="form-group col-sm-6">
								<input type="password" class="form-control" id="conformpassword" name="conformpassword" onKeyUp="validate()" placeholder="Conform Password" pattern="(^[a-zA-Z_0-9!@#$%^&* ]{6,15}$)" required  >
								</div>
								</div>
								
								<div class="form-group">
								<div class="col-sm-12 text-center">
								<strong style="color:#444454;">By clicking Register button, you agree to Guided Gateway's <a target="_blank" id="TosLink" href="termsofuse.html">Terms of Service</a> and <a target="_blank" id="PrivacyLink" href="privacy.html">Privacy Policy</a></strong>
								<br /><br />
								<input class="col-md-8 col-md-offset-2 btn btn-warning" name="submitbutton" type="submit" id="registerUser" value="Register" style="font-size:17px; font-weight: bold;" class="form-control"><br><br><br>
								</div>
								</div>
                                <div class="col-sm-12 text-center">
								<strong style="color:#444454;">Or call us at 9830032920</strong>
								</div>
								<div class="text-center">
								<span style="color:gray;">
								Already a member? <a id="LinkSignIn" href="guide_login.php">Sign In</a>
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
			
			<?php include('MasterFooter.php'); ?>
		</div>
		<!-- END #wrapper -->

				<!-- javascripts -->
			<script type="text/javascript">
			/* function agreeCondition()
			{
				var password1 = $("#Password").val();
				var password2 = $("#conformpassword").val();
				if(password1 == password2) {
				if ($('#TermsOfService').is(':checked')) {
				$('#registerUser').removeAttr('disabled'); 
				} else {
				$('#registerUser').attr('disabled', true); 
				}
			
			}
			else {
					alert("Sorry, Password do not match");
					document.getElementById("Password").value = "";
					document.getElementById("conformpassword").value = "";
					document.getElementById('conformpassword').style.border='';
					document.getElementById("TermsOfService").checked = false;
			}
			} */
			
			function validate() {
			var password1 = $("#Password").val();
			var password2 = $("#conformpassword").val();
			
			if(password1 != password2) {
				document.getElementById('conformpassword').style.border='1px solid red';
			
			}
			else {
					document.getElementById('conformpassword').style.border='';
			}
			}

			</script>
		<script type="text/javascript" src="js/modernizr.custom.17475.js"></script>
		
			
			
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="bs3/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/check-radio-box.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<!--[if lt IE 9]>
			<script type="text/javascript" src="js/html5shiv.js"></script>
		<![endif]-->

	</body>
</html>
