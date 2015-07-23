<!DOCTYPE html> <html lang="en" dir="ltr">

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

	</head> <!-- END head -->

<?php
include ('common_header.html');
include ('search_area.html');
include ('top_tours.html');
include ('top_guide.html');
include ('footer.html');
?> 

<!-- javascripts --> <script type="text/javascript"
		src="js/modernizr.custom.17475.js"></script>

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript"
		src="bs3/js/bootstrap.min.js"></script> <script
		type="text/javascript"
		src="js/bootstrap-datepicker.js"></script> <script
		src="js/jquery.flexslider-min.js"></script> <script
		src="js/script.js"></script> <script
		src="js/jquery.minimalect.min.js"
		type="text/javascript"></script>

		<script src="js/styleswitcher.js"></script>

		<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> <script
		type="text/javascript"
		src="js/rs-plugin/js/jquery.plugins.min.js"></script> <script
		type="text/javascript"
		src="js/rs-plugin/js/jquery.revolution.min.js"></script>

		<!--[if lt IE 9]> <script type="text/javascript"
		src="js/html5shiv.js"></script> <![endif]-->


		<script type="text/javascript"> $(document).ready(function() {
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