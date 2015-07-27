<?php
session_start();

?>

<html lang="en" dir="ltr">

	<!-- START head -->
	<head>
		<!-- Site meta charset -->
		<meta charset="UTF-8">
		
		<!-- title -->
		<title>User Profile | Travel Hub HTML5 Template</title>
		
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
						<div id="page" class="col-md-5">
							<div id="DivSignUpImage">
										<div class="col-sm-12">
											<center>
												<img class="img-responsive" src="images/slo22.png" />
											</center>
										</div>
									</div>
									
						</div>
						<!-- END #page -->
						
						<!-- START #sidebar -->
						<div id="sidebar" class="col-md-7">
						<div id="DivSignUp" >
								<div class="row">
								<div class="text-center">
								<a href="Index.html" style="color:#444454; font-size:25px; font-weight:bold; font-family:Pacifico; text-decoration:none;">New guide sign up here...</a>
								<br>
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
								<input type="email" value="" name="EmailAddress" id="EmailAddress" placeholder="Email Address" class="form-control" pattern="^[a-zA-Z0-9._]+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$" required >
								</div>
								</div>
								
								<div class="form-group">
								<div class="form-group col-sm-12">
								<input type="tel" value="" name="MobileNumber" id="MobileNumber" placeholder="Mobile Number"  maxlength="10" class="form-control" required pattern="([7-9]{1})(\d{9})">
								</div>
								</div>
								
								
								<div class="form-group">
								<div class="form-group col-sm-6">
								<input type="password" class="form-control" id="Password" maxlength="15" name="Password" placeholder="Password" pattern="[a-z A-Z 0-9]+" required >
								</div>
								<div class="form-group col-sm-6">
								<input type="password" class="form-control" id="conformpassword" name="conformpassword" onkeyup="validate()" placeholder="Conform Password" pattern="[a-z A-Z 0-9]+" required  >
								</div>
								</div>
								
								<div class="form-group">
								<div class="col-sm-12">
								<input type="checkbox" name="TermsOfService" onclick="agreeCondition()" id="TermsOfService"  >
								<strong style="color:#444454;">I agree to the Guided Gateway's <a target="_blank" id="TosLink" href="#">Terms of Service</a> and <a target="_blank" id="PrivacyLink" href="#">Privacy Policy</a></strong>
								</div>
								</div>
								<div class="form-group pull-right">
								<input class="btn btn-warning" name="submitbutton" type="submit" id="registerUser" disabled="true" value="Register" class="form-control">
								</div>
								<br /><br /><br /> <center>
								<span style="color:gray;">
								Already a member? <a href="Login2.html" id="LinkSignIn"  style="color:#ff845e">Sign In</a>
								</span>
								</center>
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
			
			<?php include('MasterFutter.php'); ?>
		</div>
		<!-- END #wrapper -->

				<!-- javascripts -->
			<script type="text/javascript">
			function agreeCondition()
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
				

			}
			
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