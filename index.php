<?php
session_start();
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
		<!-- favicon --> 
		<link rel="icon" href="favicon.ico" type="image/x-icon" /> 
		<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />

		<!-- bootstrap 3 stylesheets --> 
		<link rel="stylesheet" type="text/css" href="bs3/css/bootstrap.css" media="all" /> 
		<!-- template stylesheet --> 
		<link rel="stylesheet" type="text/css" href="css/styles.css" media="all" />

		<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" /> 
		<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
		<link rel="stylesheet" type="text/css" href="js/rs-plugin/css/settings.css" media="all" />
		<!-- responsive stylesheet --> 
		<link rel="stylesheet" type="text/css" href="css/responsive.css" media="all" /> 
		<!-- Load Fonts via Google Fonts API --> 
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Karla:400,700,400italic,700italic" /> 
		<!-- color scheme --> 
		<link rel="stylesheet" type="text/css" href="css/colors/color3.css" title="color3" />

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

	<!-- START body --> <body> <!-- START #wrapper --> <div id="wrapper"> 
	
	<?php 
	
if((isset($_SESSION['userId'])) && ($_SESSION['phase'] == "signin"))
			{
				include('MasterHeaderAfterLogin.php'); 
			}
			else
			{
				include('MasterHeader.php'); 
			}
	?>

			<div id="main-slider">
				<div id="content-slider">
					<ul>
						<!-- START Slide 1 -->
						<li data-transition="fade" data-slotamount="5" data-masterspeed="700">
							<img src="img/tour_1.jpg" alt="Slider Image 1" data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" />
							
							<!-- LAYER NR. 1 -->
							<div class="caption caption-yellow sft stt headline text-upper"
								data-x="20"
								data-y="150"
								data-speed="600"
								data-start="2000"
								data-easing="Power3.easeOut"
								data-endspeed="400"
								data-endeasing="Power4.easeIn"
								data-captionhidden="off"
								style="z-index:6;font-size:18px;">Starting From 1200 $ Only
							</div>
							
							<!-- LAYER NR. 2 -->
							<div class="caption caption-white sfr stl slider-heading text-upper"
								data-x="20"
								data-y="185"
								data-speed="1000"
								data-start="1800"
								data-easing="Power2.easeOut"
								data-endspeed="600"
								data-endeasing="Power3.easeIn"
								data-captionhidden="off"
								style="z-index:6;font-size:48px; ">Luxury Journeys
							</div>
							
							<!-- LAYER NR. 3 -->
							<div class="caption caption-black sfb stb headline text-upper"
								data-x="20"
								data-y="263"
								data-speed="600"
								data-start="1500"
								data-easing="Power4.easeOut"
								data-endspeed="500"
								data-endeasing="Power1.easeIn"
								data-captionhidden="off"
								style="z-index:6">Crafting individual and unique itineraries to every corner of Japan.<br />
								Peruse the possibilities here.
							</div>
						</li>
						<!-- END Slide 1 -->
						
						<!-- START Slide 2 -->
						<li data-transition="fade" data-slotamount="7" data-masterspeed="1000">
							<img src="img/tour_2.jpg" alt="Slider Image 2"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" />
							
							<!-- LAYER NR. 1 -->
							<div class="caption caption-yellow sfl str headline text-upper"
								data-x="20"
								data-y="150"
								data-speed="600"
								data-start="2000"
								data-easing="Bounce.easeInOut"
								data-endspeed="400"
								data-endeasing="Bounce.easeOut"
								data-captionhidden="off"
								style="z-index:6;font-size:18px;">Starting From 1200 $ Only
							</div>
							
							<!-- LAYER NR. 2 -->
							<div class="caption caption-white sft stb slider-heading text-upper"
								data-x="20"
								data-y="185"
								data-speed="500"
								data-start="800"
								data-easing="Expo.easeIn"
								data-endspeed="600"
								data-endeasing="Expo.easeInOut"
								data-captionhidden="off"
								style="z-index:6;font-size:48px; ">Luxury Journeys
							</div>
							
							<!-- LAYER NR. 3 -->
							<div class="caption caption-black sfr stl headline text-upper"
								data-x="20"
								data-y="263"
								data-speed="600"
								data-start="1500"
								data-easing="Power0.easeOut"
								data-endspeed="500"
								data-endeasing="Back.easeOut"
								data-captionhidden="off"
								style="z-index:6">Crafting individual and unique itineraries to every corner of Japan.<br />
								Peruse the possibilities here.
							</div>
						</li>
						
						<!-- START Slide 3 -->
						<li data-transition="fade" data-slotamount="6" data-masterspeed="800">
							<img src="img/tour_1.jpg" alt="Slider Image 3"  data-bgfit="cover" data-bgposition="center center" data-bgrepeat="no-repeat" />
							
							<!-- LAYER NR. 1 -->
							<div class="caption caption-yellow sft stt headline text-upper"
								data-x="20"
								data-y="150"
								data-speed="600"
								data-start="2000"
								data-easing="Power3.easeOut"
								data-endspeed="400"
								data-endeasing="Power4.easeIn"
								data-captionhidden="off"
								style="z-index:6;font-size:18px;">Starting From 1200 $ Only
							</div>
							
							<!-- LAYER NR. 2 -->
							<div class="caption caption-white sfr stl slider-heading text-upper"
								data-x="20"
								data-y="185"
								data-speed="1000"
								data-start="1800"
								data-easing="Power2.easeOut"
								data-endspeed="600"
								data-endeasing="Power3.easeIn"
								data-captionhidden="off"
								style="z-index:6;font-size:48px; ">Luxury Journeys
							</div>
							
							<!-- LAYER NR. 3 -->
							<div class="caption caption-black sfb stb headline text-upper"
								data-x="20"
								data-y="263"
								data-speed="600"
								data-start="1500"
								data-easing="Power4.easeOut"
								data-endspeed="500"
								data-endeasing="Power1.easeIn"
								data-captionhidden="off"
								style="z-index:6">Crafting individual and unique itineraries to every corner of Japan.<br />
								Peruse the possibilities here.
							</div>
						</li>
						<!-- END Slide 3 -->
					</ul>
				</div>
				<div id="slider-overlay"></div>
			</div>
			<!-- END #main-slider -->


			<!-- START .main-contents --> <div class="main-contents">
			<div class="container" id="home-page">

					<!-- START .tour-plan --> <form class="plan-tour">
					<!-- div class="plan-banner"><span>WHERE WHAT</span></div -->
					<div class="top-fields"> <div class="input-field
					col-md-3"><input type="text" placeholder="Where
					" /></div> <!-- div class="input-field
					col-md-3"><input type="text" placeholder="2. What to
					do?" /></div> <div
					class="input-field col-md-4" --> 
                    <!-- label>3.
					Including</label> <label><input class="input-cb"
					type="checkbox" name="inc_hotel" value="1"
					checked="checked" /> Hotel</label> <label><input
					class="input-cb" type="checkbox" name="inc_flight"
					value="1" checked="checked" /> Meals </label>
					<label><input class="input-cb" type="checkbox"
					name="inc_car" value="1" /> Transport</label> </div --> 
                    <div class="submit-btn col-md-2"> <input type="submit"
					value="Search" /> </div> </div> </form> <!-- END
					.tour-plan -->

					<h2 class="ft-heading text-upper">Top
					Destinations</h2>

					<div class="carousel"> <ul class="slides"> <li> <div
					class="row"> <div class="col-md-3"> <div
					class="ft-item"> <span class="ft-image"> <img
					src="https://storage.googleapis.com/
						guidedgateway_media/top_dest_1.jpg" alt="featured
					Scroller" /> </span> <div class="ft-data"> <a
					class="ft-hotel text-upper" href="#">Hotel</a> <a
					class="ft-plane text-upper" href="#">Guide</a>
					<a class="ft-tea text-upper" href="#">Meals</a>
					</div> <div class="ft-foot"> <h4 class="ft-title
					text-upper"><a href="#">Pushkar, RJ</a></h4> <span
					class="ft-offer text-upper">Starting From INR 5000
					</span> </div> <div class="ft-foot-ex"> <span
					class="ft-date text-upper alignleft">28 October
					2015</span> <span class="ft-temp
					alignright">17&#730;c</span> </div> </div>

										 </div> <div
										class="col-md-3"> <div
										class="ft-item"> <span
										class="ft-image"> <img
										src="https://storage.googleapis.com/
						guidedgateway_media/top_dest_2.jpg
										" alt="featured Scroller" />
										</span> <div class="ft-data"> <a
										class="ft-hotel text-upper"
										href="#">Hotel</a> <a
										class="ft-plane text-upper"
										href="#">Guide</a> <a
										class="ft-tea text-upper"
										href="#">Meals</a> </div>
										<div class="ft-foot"> <h4
										class="ft-title text-upper"><a
										href="#">Konark, OR</a></h4>
										<span class="ft-offer
										text-upper">Starting From 250
										$</span> </div> <div
										class="ft-foot-ex"> <span
										class="ft-date text-upper
										alignleft">28 December
										2013</span> <span class="ft-temp
										alignright">17&#730;c</span>
										</div> </div>

										 </div> <div
										class="col-md-3"> <div
										class="ft-item"> <span
										class="ft-image"> <img
										src="http://storage.googleapis.com/
						guidedgateway_media/top_dest_3.jpg
										" alt="featured Scroller" />
										</span> <div class="ft-data"> <a
										class="ft-hotel text-upper"
										href="#">Hotel</a> <a
										class="ft-plane text-upper"
										href="#">Guide</a> <a
										class="ft-tea text-upper"
										href="#">Meals</a> </div>
										<div class="ft-foot"> <h4
										class="ft-title text-upper"><a
										href="#">Agra, UP</a></h4>
										<span class="ft-offer
										text-upper">Starting From INR 1000
										</span> </div> <div
										class="ft-foot-ex"> <span
										class="ft-date text-upper
										alignleft">28 December
										2015</span> <span class="ft-temp
										alignright">17&#730;c</span>
                        </div> </div></div><div
										class="col-md-3"> <div
										class="ft-item"> <span
										class="ft-image"> <img
										src="https://storage.googleapis.com/
						guidedgateway_media/top_dest_4.jpg
										" alt="featured Scroller" />
										</span> <div class="ft-data"> <a
										class="ft-hotel text-upper"
										href="#">Hotel</a> <a
										class="ft-plane text-upper"
										href="#">Guide</a> <a
										class="ft-tea text-upper"
										href="#">Meals</a> </div>
										<div class="ft-foot"> <h4
										class="ft-title text-upper"><a
										href="#">Aleppy, KE</a></h4>
										<span class="ft-offer
										text-upper">Starting From 250
										$</span> </div> <div
										class="ft-foot-ex"> <span
										class="ft-date text-upper
										alignleft">28 November
										2015</span> <span class="ft-temp
										alignright">17&#730;c</span>

                        </div></div></div> </li> </ul> </div>
                
<h2 class="ft-heading text-upper">Top
					Guides</h2>
                <div class="carousel"> <ul class="slides"> <li> <div
					class="row"> <div class="col-md-3"> <div
					class="ft-item"> <span class="ft-image"> <img
					src="https://storage.googleapis.com/
						guidedgateway_media/guide_1.jpg" alt="featured
					Scroller" /> </span> <div class="ft-data"> <a
					class="ft-hotel text-upper" href="#">Hotel</a> <a
					class="ft-plane text-upper" href="#">Guide</a>
					<a class="ft-tea text-upper" href="#">Meals</a>
					</div> <div class="ft-foot"> <h4 class="ft-title
					text-upper"><a href="#">Rakesh, RJ</a></h4> <span
					class="ft-offer text-upper">Starting From INR 5000
					</span> </div> <div class="ft-foot-ex"> <span
					class="ft-date text-upper alignleft">28 October
					2015</span> <span class="ft-temp
					alignright">17&#730;c</span> </div> </div>

										 </div> <div
										class="col-md-3"> <div
										class="ft-item"> <span
										class="ft-image"> <img
										src="https://storage.googleapis.com/
						guidedgateway_media/guide_2.jpg
										" alt="featured Scroller" />
										</span> <div class="ft-data"> <a
										class="ft-hotel text-upper"
										href="#">Hotel</a> <a
										class="ft-plane text-upper"
										href="#">Guide</a> <a
										class="ft-tea text-upper"
										href="#">Meals</a> </div>
										<div class="ft-foot"> <h4
										class="ft-title text-upper"><a
										href="#">Sujoy, WB</a></h4>
										<span class="ft-offer
										text-upper">Starting From 250
										$</span> </div> <div
										class="ft-foot-ex"> <span
										class="ft-date text-upper
										alignleft">28 December
										2013</span> <span class="ft-temp
										alignright">17&#730;c</span>
										</div> </div>

										 </div> <div
										class="col-md-3"> <div
										class="ft-item"> <span
										class="ft-image"> <img
										src="https://storage.googleapis.com/
						guidedgateway_media/guide_3.jpg
										" alt="featured Scroller" />
										</span> <div class="ft-data"> <a
										class="ft-hotel text-upper"
										href="#">Hotel</a> <a
										class="ft-plane text-upper"
										href="#">Guide</a> <a
										class="ft-tea text-upper"
										href="#">Meals</a> </div>
										<div class="ft-foot"> <h4
										class="ft-title text-upper"><a
										href="#">SUraj, Or</a></h4>
										<span class="ft-offer
										text-upper">Starting From 250
										$</span> </div> <div
										class="ft-foot-ex"> <span
										class="ft-date text-upper
										alignleft">28 December
										2013</span> <span class="ft-temp
										alignright">17&#730;c</span>
                        </div> </div></div><div
										class="col-md-3"> <div
										class="ft-item"> <span
										class="ft-image"> <img
										src="https://storage.googleapis.com/
						guidedgateway_media/guide_4.jpg
										" alt="featured Scroller" />
										</span> <div class="ft-data"> <a
										class="ft-hotel text-upper"
										href="#">Hotel</a> <a
										class="ft-plane text-upper"
										href="#">Guide</a> <a
										class="ft-tea text-upper"
										href="#">Meals</a> </div>
										<div class="ft-foot"> <h4
										class="ft-title text-upper"><a
										href="#">Prasun, Ke</a></h4>
										<span class="ft-offer
										text-upper">Starting From 250
										$</span> </div> <div
										class="ft-foot-ex"> <span
										class="ft-date text-upper
										alignleft">28 December
										2013</span> <span class="ft-temp
										alignright">17&#730;c</span>

                        </div></div></div> </li> </ul> </div>
				</div> </div> <!-- END .main-contents -->

			<!-- START .main-contents .bom-contents --> <div
			class="main-contents bom-contents"> <div class="container">
			<h2 class="text-center text-upper">Theme Based Tours</h2> <p
			class="headline text-center">A piece of heaven in the summer
			of 2013 brought ten small art houses enlivn the street scene
			in Tracy Arm FJord</p>

					<div class="row"> <!-- START featured destination 1
					--> <section class="col-md-3 fd-column"> <div
					class="featured-dest"> <span class="fd-image"> <img
					class="img-circle" src="http://placehold.it/150x150"
					alt="Featured Destination" /> </span> <h3
					class="text-center text-upper">Beach</h3> <p
					class="text-center">Egestas dignissim a enim lorem a
					mus egestas risus porta? Sed. Scelerisque, in nec
					velit augue aenean a, vut velit nec! Phasellus
					aliquam odio.</p> <span class="btn-center"><a
					class="btn btn-primary text-upper" href="#"
					title="Search">Search</a></span> </div> </section>
					<!-- END featured destination 1 -->

						<!-- START featured destination 2 --> <section
						class="col-md-3 fd-column"> <div
						class="featured-dest"> <span class="fd-image">
						<img class="img-circle"
						src="http://placehold.it/150x150" alt="Featured
						Destination" /> </span> <h3 class="text-center
						text-upper">Romantic</h3> <p
						class="text-center">Egestas dignissim a enim
						lorem a mus egestas risus porta? Sed.
						Scelerisque, in nec velit augue aenean a, vut
						velit nec! Phasellus aliquam odio.</p> <span
						class="btn-center"><a class="btn btn-primary
						text-upper" href="#"
						title="Search">Search</a></span> </div>
						</section> <!-- END featured destination 2 -->

						<!-- START featured destination 3 --> <section
						class="col-md-3 fd-column"> <div
						class="featured-dest"> <span class="fd-image">
						<img class="img-circle"
						src="http://placehold.it/150x150" alt="Featured
						Destination" /> </span> <h3 class="text-center
						text-upper">Adventure</h3> <p
						class="text-center">Egestas dignissim a enim
						lorem a mus egestas risus porta? Sed.
						Scelerisque, in nec velit augue aenean a, vut
						velit nec! Phasellus aliquam odio.</p> <span
						class="btn-center"><a class="btn btn-primary
						text-upper" href="#"
						title="Search">Search</a></span> </div>
						</section> <!-- END featured destination 3 -->

						<!-- START featured destination 4 --> <section
						class="col-md-3 fd-column"> <div
						class="featured-dest"> <span class="fd-image">
						<img class="img-circle"
						src="http://placehold.it/150x150" alt="Featured
						Destination" /> </span> <h3 class="text-center
						text-upper">Eco</h3> <p
						class="text-center">Egestas dignissim a enim
						lorem a mus egestas risus porta? Sed.
						Scelerisque, in nec velit augue aenean a, vut
						velit nec! Phasellus aliquam odio.</p> <span
						class="btn-center"><a class="btn btn-primary
						text-upper" href="#"
						title="Search">Search</a></span> </div>
						</section> <!-- END featured destination 4 -->
						</div> </div> </div> <!-- END .main-contents
						.bom-contents -->

			<!-- START footer --> <footer> <!-- START #ft-footer -->
			<div id="ft-footer"> <div class="footer-overlay"> <div
			class="container"> <div class="row"> <!-- testimonials -->
			<section class="col-md-6"> <h3>Testimonials</h3> <p>Tortor
			turpis. Proin. Dolor. Auctor arcu, habitasse mid placerat
			magna? Dis ac, adipiscing? Cras mus dolor sit a? Platea eros
			dictumst ridiculus sed phasellus, rhoncus magnis a
			pellentesque pulvinar duis purus risus tristique ultricies
			natoque, nec! Natoque natoque cum? Nec, placerat sociis! Sit
			ut, scelerisque? placerat sociis! Sit ut, scelerisque? Urna
			ut aliquam duis et scelerisque,</p> <div class="tl-author">
			<span class="tl-author-img"> <img class="img-circle"
			src="http://placehold.it/70x70" alt="Testimonial Author" />
			</span> <span class="tl-author-title">Jassem Elrakesh</span>
			<span class="tl-author-desc">Visited Barcelona
			recently</span> </div> </section>

								<!-- twitter --> <section
								class="col-md-6"> <h3
								class="tw-feeds">Pinterest Feeds</h3>
								                <a data-pin-do="embedBoard" href="https://www.pinterest.com/guidedgateway/guided-gateway/"data-pin-scale-width="80" data-pin-scale-height="200" data-pin-board-width="400">Follow Guided Gateway's board on Pinterest.</a><script type="text/javascript" async src="//assets.pinterest.com/js/pinit.js"></script>    
                								</section> </div> </div> </div> </div>
								<!-- END #ft-footer -->

				<?php include("MasterFooter.php"); ?>
				
							</div> <!-- END #wrapper -->




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
		</script><!--- SELECT BOX --> </bosdy> </html>