<?php
	session_start();

	if($_SESSION["login"]=="true")
	{
		header('location:guide_profile.php');
	}
	else
	{
	$_SESSION["login"]="false";
	}
?>

<html lang="en" dir="ltr">

	<!-- START head --> <head> <!-- Site meta charset --> <meta
	charset="UTF-8">

		<!-- title --> <title>Home | Guided Gateway - Authentic
		Affordable Travel</title>

		<!-- meta description --> <meta name="description" content="Authentic Afordable Travel in India" />

		<!-- meta keywords --> <meta name="keywords" content="travel
		guide tourism india" />

		<!-- meta viewport --> <meta name="viewport"
		content="width=device-width, initial-scale=1, maximum-scale=1"
		/>
		
		
		<!-- favicon --> <link rel="icon" href="favicon.ico"
		type="image/x-icon" /> <link rel="shortcut icon"
		href="favicon.ico" type="image/x-icon" />

		<!-- bootstrap 3 stylesheets --> <link rel="stylesheet"
		type="text/css" href="bs3/css/bootstrap.css" media="all" /> <!--
		template stylesheet --> <link rel="stylesheet" type="text/css"
		href="css/styles.css" media="all" />

		<link rel="stylesheet" href="css/flexslider.css" type="text/css"
		media="screen" /> <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
		<link rel="stylesheet" type="text/css"
		href="js/rs-plugin/css/settings.css" media="all" /> <!--
		responsive stylesheet --> <link rel="stylesheet" type="text/css"
		href="css/responsive.css" media="all" /> <!-- Load Fonts via
		Google Fonts API --> <link rel="stylesheet" type="text/css"
		href="http://fonts.googleapis.com/css?family=Karla:400,700,
		400italic,700italic" /> <!-- color scheme --> <link
		rel="stylesheet" type="text/css" href="css/colors/color3.css"
		title="color3" />
		
		<!--################################################################################-->
		<style type="text/css">
		.mycontainer { padding:10px 10px 10px 10px; }
		#main-slider { height:320px; }
		#content-slider { height:410px; }
		</style>

		
		<!--##############################################################################-->

<!-- Google Analytics -->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64862528-1', 'auto');
  ga('send', 'pageview');

</script>

	</head> <!-- END head -->

	<!-- START body --> <body>
	<!-- START #wrapper --> <div id="wrapper"> 
	<!-- START header --> <header> <!-- START #top-header
	--> <div id="top-header"> <div class="container"> <div class="row
	top-row"> <div class="col-md-6"> <div class="left-part alignleft">
	<span class="contact-email small">support@xmapledatalab.com</span>
	<span class="contact-phone small">+1 510 938 2562</span> <ul
	class="social-media header-social"> <li><a class="sm-facebook"
	href="#"><span>Facebook</span></a></li> <li><a class="sm-flickr"
	href="#"><span>Pinterest</span></a></li> <li><a class="sm-windows"
	href="#"><span>Youtube</span></a></li> <li><a class="sm-stumble"
	href="#"><span>Twitter</span></a></li> </ul> </div> </div> <div
	class="col-md-6"> <div class="right-part alignright"> <form
	action="#" method="get"> <fieldset class="alignright"> <input
	type="text" name="s" class="search-input" value="Search..."
	onfocus="if (this.value == 'Search...') { this.value = ''; }"
	onblur="if (this.value == '') { this.value = 'Search...'; }" />
	<input type="submit" name="submit" class="search-submit" value="" />
	</fieldset> </form> <span class="top-link small"><a
										href="guide_login.php" title="">Guide
										Sign-in</a></span> <span class="top-link small"><a href="sign-in.html"
										title="">SIGN IN</a></span> </div>
	</div> </div> </div> </div> <!-- END #top-header -->

						<!-- START #main-header --> 
						<div id="main-header"> 
						<div class="container"> 
						<div class="row"> 
						<div class="col-md-3">
						<a id="site-logo" href="#"> 
						<img src="img/logo.png" alt="Guided Gateway" />
						</a> 
						</div>
						<div class="col-md-9"> 
						<nav class="main-nav">
						<span>MENU</span> 
						<ul id="main-menu"> 
						<li>
						<a href="index.html" title="">HOME</a>
						</li> 
						<li>
						<a href="guides.html" title="">Guides</a>
						</li>
						<li><a href="top-destinations-listview-sidebar.html" title="">Destinations</a>
						</li>
						<li>
						<a href="top-themes-listview-sidebar.html" title="">Themes</a> 
						</li>
								</ul> 
								</nav> 
								</div> 
								</div> 
								</div>
								</div> <!-- END #main-header -->
								</header> <!-- END header -->

			<div id="main-slider">
				<div id="content-slider">
						<div data-transition="fade" data-slotamount="5" data-masterspeed="700">
							<img src="img/tour_2.jpg" alt="Slider Image 1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" />
						</div>
				</div>
			</div>
			<!-- END #main-slider -->


			<!-- START .main-contents --> 
			<div class="main-contents">
				<div class="container" id="home-page">
					<section id="page-top">
						<div class="row">
							<div class="col-sm-4 col-sm-offset-1">
								<div class="mycontainer" style="background-color:#dddddd;" id="DivSignIn">
										<div class="col-sm-12">
										<div class="row">
										<div class="text-center">
										<a href="Index.html" style="color: black; font-size:47px; font-weight:bold; font-family:Pacifico; text-decoration:none;">Guided Gateway</a><br>
										<a href="Index.html" style="color: black; font-size:28px; font-weight:bold; font-family:Pacifico; text-decoration:none;">Sign In Here</a>
											
										</div>
										</div>
										<br /><br />
										<div class="row">
											<div class="col-sm-12">
												<form action="guide_login_code.php" method="POST">
													<input type="text" class="form-control" id="username" name="username" placeholder="Email Address or Mobile Number" style="height:36px; background-color:white; color:black; -moz-border-radius: 10px; border-radius: 2px; border:solid 1px gray; padding:5px;">
													<br /> <input type="password" class="form-control" id="password" name="password" placeholder="Password" style="height:36px; background-color:white; color:black; -moz-border-radius: 10px; border-radius: 2px; border:solid 1px gray; padding:5px;">
													<br /> <button class="btn  btn-sm btn-default btn-block" style="font-size:18px; font-weight:bold; height:36px; -moz-border-radius: 10px; border-radius: 2px; padding:5px; background-color:#ff845e;" type="submit">Login</button>
													
												</form>
												<br /> <center><span style="color:gray;">Not a member? <a href="#!" id="LinkSignUp"  style="color:#ff845e">Join now</a></span></center>
											</div>
										</div>
									</div>
									</div>
									<div id="DivSignUpImage">
										<div class="col-sm-12">
											<center>
												<img class="img-responsive" src="images/slo22.png" />
											</center>
										</div>
									</div>
							</div>
							
							
							
							<div class="col-sm-6" >
							<div class="mycontainer"  style="background-color:#dddddd;" id="DivSignUp">
								<div class="row">
								<div class="text-center">
								<a href="Index.html" style="color: black; font-size:25px; font-weight:bold; font-family:Pacifico; text-decoration:none;">New guide sign up here...</a>
								<br>
								</div>
								</div>
								
							<div class="row">
							<div class="col-sm-12">
								<div class="row">
								<div class="col-sm-12">
								<div class="form-group">
								<div class="form-group col-sm-6">
								<input type="text" value="" name="FirstName" id="FirstName" placeholder="First Name" class="form-control" style="height:30px; background-color:white; color:black; -moz-border-radius: 10px; border-radius: 2px; border:solid 1px gray; padding:5px;"> 
								</div>
								<div class="form-group col-sm-6">
								<input type="text" value="" name="LastName" id="LastName" placeholder="Last Name" class="form-control" style="height:30px; background-color:white; color:black; -moz-border-radius: 10px; border-radius: 2px; border:solid 1px gray; padding:5px;">
								</div>
								</div>
								</div>
								</div>
								
								<div class="form-group">
								<div class="form-group col-sm-12">
								<input type="text" value="" name="EmailAddress" id="EmailAddress" placeholder="Email Address" class="form-control" style="height:30px; background-color:white; color:black; -moz-border-radius: 10px; border-radius: 2px; border:solid 1px gray; padding:5px;" >
								</div>
								</div>
								
								<div class="form-group">
								<div class="form-group col-sm-12">
								<input type="text" value="" name="MobileNumber" id="MobileNumber" placeholder="Mobile Number" class="form-control" style="height:30px; background-color:white; color:black; -moz-border-radius: 10px; border-radius: 2px; border:solid 1px gray; padding:5px;">
								</div>
								</div>
								
								
								<div class="form-group">
								<div class="form-group col-sm-6">
								<input type="password" name="Password" id="Password" value="" placeholder="Password" class="form-control" style="height:30px; background-color:white; color:black; -moz-border-radius: 10px; border-radius: 2px; border:solid 1px gray; padding:5px;">
								</div>
								<div class="form-group col-sm-6">
								<input type="password" name="Password" id="Password" value="" placeholder="Conform Password" class="form-control" style="height:30px; background-color:white; color:black; -moz-border-radius: 10px; border-radius: 2px; border:solid 1px gray; padding:5px;">
								</div>
								</div>
								
								<div class="form-group">
								<div class="col-sm-12">
								<input type="checkbox" value="yes" name="TermsOfService" id="TermsOfService"  >
								<strong style="color:#444454;">I agree to the Guided Gateway's <a target="_blank" id="TosLink" href="#">Terms of Service</a> and <a target="_blank" id="PrivacyLink" href="#">Privacy Policy</a></strong>
								</div>
								</div>
								<div class="form-group pull-right">
								<input class="btn btn-default" name="submitbutton" type="submit" id="btnSignUp" value="Register" style="background-color:#ff845e;">
								</div>
								<br /><br /><br /> <center><span style="color:gray;">Already a member? <a href="#!" id="LinkSignIn"  style="color:#ff845e">Sign In</a></span></center>
							</div>
							</div>
							</div>
						
						</div>
					</div>
					
					<br />
				</section><!-- /#page-top -->
			</div>
		</div>

			<!-- START footer --> <footer> 
				<!-- START #ex-footer --> <div id="#ex-footer"> <div
				class="container"> <div class="row"> <nav
				class="col-md-12"> <ul class="footer-menu"> <li><a
				href="#">Cancellation Policy</a></li> <li><a
				href="#">Careers</a></li> <li><a href="#">Hotel
				Directory</a></li> <li><a href="termofuse.html">Website Terms of
				Use</a></li> <li><a href="privacy.html">Privacy Statement</a></li>
				<li><a href="#">Affiliates</a></li> <li
				class="last-item"><a href="#">Top Destinations</a></li>
				</ul> </nav>

							<div class="foot-boxs"> <div class="foot-box
							col-md-4 text-right"> <span>Stay
							Connected</span> <ul class="social-media
							footer-social"><li><a class="sm-facebook"
	href="#"><span>Facebook</span></a></li> <li><a class="sm-flickr"
	href="#"><span>Pinterest</span></a></li> <li><a class="sm-windows"
	href="#"><span>Youtube</span></a></li> <li><a class="sm-stumble"
	href="#"><span>Twitter</span></a></li>
							</ul> </div> <div class="foot-box
							foot-box-md col-md-4"> <span
							class="contact-email">
							touchus@guidedgateway.com</span> <span
							class="contact-phone"> +1 510 938 2562</span> </div> <div class="foot-box
							col-md-4"> <span class="">&copy; 2015							GuideGateway. All Rights Reserved.</span>
							</div> </div> </div> </div> </div> <!-- END
							#ex-footer --> </footer> <!-- END footer -->
							</div> <!-- END #wrapper -->




		<!-- javascripts --> <script type="text/javascript" src="js/modernizr.custom.17475.js"></script>
		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="bs3/js/bootstrap.min.js"></script> 
		<script type="text/javascript" src="js/bootstrap-datepicker.js"></script>
		<script src="js/jquery.flexslider-min.js"></script> 
		<script ="js/script.js"></script> 
		<script src="js/jquery.minimalect.min.js" type="text/javascript"></script>

		<script src="js/styleswitcher.js"></script>

		<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> <script type="text/javascript" src="js/rs-plugin/js/jquery.plugins.min.js"></script> 
		<script type="text/javascript" src="js/rs-plugin/js/jquery.revolution.min.js"></script>

		<!--[if lt IE 9]> <script type="text/javascript"
		src="js/html5shiv.js"></script> <![endif]-->

		
		<script type="text/javascript">
		$(document).ready(function() {
			$('#DivSignIn').show();
			$('#DivSignUp').hide();
			$('#DivSignUpImage').hide();
		});
		
		$('#LinkSignUp').click(function () {
			$('#DivSignIn').hide();
			$('#DivSignUp').show();
			$('#DivSignUpImage').show();
				});
				
				$('#LinkSignIn').click(function () {
			$('#DivSignIn').show();
			$('#DivSignUp').hide();
			$('#DivSignUpImage').hide();
			});
			</script>
		<script type="text/javascript"> 
		$(document).ready(function() {
			// revolution slider
			revapi = $("#content-slider").revolution({ delay: 15000,
			startwidth: 1170, startheight: 920, hideThumbs: 10,
			fullWidth: "on", fullScreen: "off",
			fullScreenOffsetContainer: "", navigationVOffset: 320
			});
			}
			// initilize datepicker
			$(".date-picker").datepicker();
		});
		}
		}		}
	    $(window).load(function(){ $('.carousel').flexslider({
	    animation: "fade", animationLoop: true, controlNav: false,
	    maxItems: 1, pausePlay: false, mousewheel:true, start:
	    function(slider){ $('body').removeClass('loading');
			}
	      });
	    });
	    }
	    }	    }
		</script> <script> $(document).ready(function(){
		$("#adults").minimalect({ theme: "bubble", placeholder: "Select"
		}); $("#kids").minimalect({ theme: "bubble", placeholder:
		"Select" });
		});
		</script><!--- SELECT BOX --> </body> </html>