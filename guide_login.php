<?php
session_start();
/* if(isset($_SESSION['userId']))
{
	unset($_SESSION['userId']);
} */

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
										<a href="Index.html" style="color: black; font-size:47px; font-weight:bold; font-family:Pacifico; text-decoration:none;">Guided Gateway</a><br>
										<a href="Index.html" style="color:#444454; font-size:28px; font-weight:bold; font-family:Pacifico; text-decoration:none;">Sign In Here</a>
											
										</div>
										</div>
										<br /><br />
										<div class="row">
											<div class="col-sm-12">
												<form action="guide_login_code.php" method="POST">
													<input type="text" class="form-control" id="username" name="username" placeholder="Email Address or Mobile Number" pattern="(([a-zA-Z0-9._%+-]+@[a-zA-Z0-9]+\.([a-zA-Z]{2,3}|([a-zA-Z]{2,3}\.[a-zA-Z]{2})))|([7-9]{1}\d{9}))" required >
													<br /> <input type="password" class="form-control" id="password" name="password" placeholder="Password" pattern="(^[a-zA-Z_0-9!@#$%^&* ]{6,15}$)" required>
													<br /> <button class="btn  btn-sm btn-warning btn-block form-control" type="submit" style="font-size:17px; font-weight: bold;">Login</button>
												</form>
												<center><span style="color:gray;">Not a member? 
												<a id="LinkSignUp" href="guide_registration_1.php">Join now</a>
												</span></center><br />
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
			
			<?php include('MasterFooter.php'); ?>
		</div>
		<!-- END #wrapper -->

				<!-- javascripts -->
				
			
			
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