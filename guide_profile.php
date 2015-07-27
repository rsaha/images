<?php

session_start();
if($_SESSION["login"]=="false")
{
	header('location:guide_login.php');
}

?>

<html lang="en">
  <head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guided Gateway</title>
    <meta name="description" content="waltrump.com">
    <meta name="keywords" content="">
    <meta name="author" content="Waltrump.com">
    
    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css"  href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

	<link rel="stylesheet" type="text/css" href="bs3/css/bootstrap.css" media="all" />
	
		<!--template stylesheet --> 
		
		<link rel="stylesheet" type="text/css" href="css/styles.css" media="all" />
		<link rel="stylesheet" href="css/flexslider.css" type="text/css" 	media="screen" />
		
		<!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
		<link rel="stylesheet" type="text/css"	href="js/rs-plugin/css/settings.css" media="all" /> 
		
		<!--responsive stylesheet -->

		<link rel="stylesheet" type="text/css" href="css/responsive.css" media="all" />
		
		<!-- Load Fonts via	Google Fonts API --> 
		
		<link rel="stylesheet" type="text/css"	href="http://fonts.googleapis.com/css?family=Karla:400,700,400italic,700italic" />

		<!-- color scheme --> 
				<link rel="stylesheet" type="text/css" href="css/colors/color3.css" 	title="color3" />
				
    <!-- Slider
    ================================================== -->
    <link href="css/owl.carousel.css" rel="stylesheet" media="screen">
    <link href="css/owl.theme.css" rel="stylesheet" media="screen">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css"  href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/responsive2.css">

    <link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,700,300,600,800,400' rel='stylesheet' type='text/css'>

    <script type="text/javascript" src="js/modernizr.custom.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
	
	
  </head>
  
    <!-- Navigation
	
	<!-- START body --> <body> <!-- START #wrapper --> <div
	id="wrapper"> <!-- START header --> <header> <!-- START #top-header
	--> <div id="top-header"> <div class="container"> <div class="row
	top-row"> <div class="col-md-6"> <div class="left-part alignleft">
	<span class="contact-email small">support@xmapledatalab.com</span>
	<span class="contact-phone small">+1 510 938 2562</span> <ul
	class="social-media header-social"> <li><a class="sm-facebook"
	href="#"><span>Facebook</span></a></li> <li><a class="sm-flickr"
	href="#"><span>Pinterest</span></a></li> <li><a class="sm-windows"
	href="#"><span>Youtube</span></a></li> <li><a class="sm-stumble"
	href="#"><span>Twitter</span></a></li> </ul> </div> </div> <div
	class="col-md-6"> 
	<div class="alignright"> 
	<span class="top-link"><a href="guide_profile_code.php" title="" style="color:#5a5a5a;">SIGN OUT</a></span>
	<span class="top-link"><a href="#" style="color:#5a5a5a;" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome Guide <span class="caret"></span></a>
	  <ul class="dropdown-menu">
		<li><a href="">Setting</a></li>
		<li><a href="">Change Password</a></li>
	  </ul>
	  </span>
	<span class="top-link"><a href="" title="" style="color:#5a5a5a;"><i style="height:0px; margin-right:15px;" class="fa fa-user "></i></a></span>
	<span class="top-link"><a href="" title="" style="color:#5a5a5a;"><i style="height:0px; margin-right:15px;" class="fa fa-envelope "></i></a></span>
	<span class="top-link"><a href="" title="" style="color:#5a5a5a;"><i style="height:0px; margin-right:15px;" class="fa fa-info "></i></a></span>
	</div>
	</div> </div> </div> </div> <!-- END #top-header -->

				<!-- START #main-header --> <div id="main-header"> <div
				class="container"> <div class="row"> <div
				class="col-md-3"> <a id="site-logo" href="#"> <img
				src="img/logo.png" alt="Guided Gateway" /> </a> </div> <div
				class="col-md-9"> <nav class="main-nav">
				<span>MENU</span> <ul id="main-menu"> <li><a href="index.html"
				title="">HOME</a>  </li> <li><a
				href="guides.html" title="">Guides</a>  </li> <li><a
				href="top-destinations-listview-sidebar.html" title="">Destinations</a> </li>
                <li><a
				href="top-themes-listview-sidebar.html" title="">Themes</a> </li>

												

									</ul> </nav> </div> </div> </div>
									</div> <!-- END #main-header -->
									</header> <!-- END header -->
    
    <!-- Home Page
    ==========================================-->
    <div id="tf-home" class="">
        <div class="overlay">
            
			<div class="container">
				     <div class="row" >
				         <div  class="col-md-3">
						 <div style="background-color:white;height:390px;">
						 <img src="img/actress.jpg" class="img-responsive img-thumbnail" ></img>
						     <div class="" style="padding:10px 10px 10px 10px">
							    <span class="text-center" style="color:black;font-family:Gabriola; font-size:30px;"><strong>Profile</strong> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style="color:#009900" class="fa fa-pencil pull-right" style="height:10px;"></i></span>
							 <div>
							    <ul style="color:black;" class="list-unstyled">
								    <li> Alen</li>
									<li> former Army officer</li>
									<li> Age-45</li>
									<li> North-East region</li>
									<li> Male</li>
									<li> English, hindi</li>
									<li> $10/hour</li>
								</ul>
							 </div>
							 
							 </div>
						 
						 </div>
						 <div style="margin-top:5px; height:70px; background-color:white;">
						 <div style="margin-left:10px;">
						 <span class="text-center" style="color:black;font-family:Gabriola; font-size:25px;"><strong>Pricing</strong>
						 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style=";margin-right:10px;" class="fa fa-pencil pull-right color" style="height:10px;"></i> </span>
						 <ul style="font-size:12px; color:black" class="list-unstyled">
						     <li>$ 10/ Hour</li>
							 <li>Max 8 Hours/ Day</li>
						 </ul>
						 </div>
						 </div>
						 <div style="margin-top:5px; height:70px; background-color:white;">
						 <span class="text-center" style="color:black;font-family:Gabriola; font-size:25px;"><strong>Upcoming Tours</strong> 
						 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style="color:#009900;margin-right:10px;" class="fa fa-pencil pull-right" style="height:10px;"></i></span>
						 </div>
						 <div style="margin-top:5px; height:70px; background-color:white;">
						 <span class="text-center" style="color:black;font-family:Gabriola; font-size:25px;"><strong>Recent Activities</strong> 
						 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style="color:#009900; margin-right:10px;" class="fa fa-pencil pull-right" style="height:10px;"></i></span>
						 </div>
						 </div>
						<div  class="col-md-8 col-md-offset-1">
						    <div style="background-color:white; height:45px;">
							   <div class="form-inline">
						         <span  style="font-size:30px;"><strong class="" style="font-size:30px; margin-left:10px; color:black; font-family:Gabriola;">Tour List &nbsp;&nbsp;&nbsp;&nbsp;</strong><i class="fa fa-pencil color" style=""></i></span>
								 <input class="form-control" style="height:25px; margin-bottom:5px; margin-left:400px;" type="text" placeholder="Search Tour" id="search">
						       </div>
						    </div>
                        <div style="background-color:white; height:130px;  margin-top:5px;" >
						 
							
							     <div style="height:25px; background-color:#FFA87D; padding-left:10px; color:black;" class="col-md-12">Delhi Tour
								 <span class="pull-right"><i class="fa fa-pencil" style="color:black;"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$ 60 USD</span>
								 
								 </div>
							     <div style="color:black;">
								 
								   <table>
								      <tr>
									      <td>
										      <dl class="dl-horizontal">
														  <dt>Places</dt>
														  <dd>GTB, kutumbhminar</dd>
														  <dt>Foods</dt>
														  <dd>lunch, dinner</dd>
														  <dt>Exclusive</dt>
														  <dd>Bus, hotel service</dd>
														   <dt>Foods</dt>
														  <dd>lunch, dinner</dd>
														  <dt>Exclusive</dt>
														  <dd>Bus, hotel service</dd>
														</dl>
									     </td>
										  <td>  <dl class="dl-horizontal">
														  <dt>Places</dt>
														  <dd>GTB, kutumbhminar</dd>
														  <dt>Foods</dt>
														  <dd>lunch, dinner</dd>
														  <dt>Exclusive</dt>
														  <dd>Bus, hotel service</dd>
														    <dt>Places</dt>
														  <dd>GTB, kutumbhminar</dd>
														</dl>
										  </td>
										 
									  </tr>
									  
								   </table>
								 
							     </div>
								 </div>
								 <div style="background-color:white; height:130px;  margin-top:5px;">
								  <div style="height:25px;background-color:#FFA87D; padding-left:10px; color:black; " class="col-md-12">Agra Tour
								   <span class="pull-right"><i class="fa fa-pencil" style="color:black;"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$ 120 USD</span>
								  </div>
								  <div style="color:black;">
								 
								   <table>
								      <tr>
									      <td>
										      <dl class="dl-horizontal">
														  <dt>Places</dt>
														  <dd>GTB, kutumbhminar</dd>
														  <dt>Foods</dt>
														  <dd>lunch, dinner</dd>
														  <dt>Exclusive</dt>
														  <dd>Bus, hotel service</dd>
														   <dt>Foods</dt>
														  <dd>lunch, dinner</dd>
														  <dt>Exclusive</dt>
														  <dd>Bus, hotel service</dd>
														</dl>
									     </td>
										  <td>  <dl class="dl-horizontal">
														  <dt>Places</dt>
														  <dd>GTB, kutumbhminar</dd>
														  <dt>Foods</dt>
														  <dd>lunch, dinner</dd>
														  <dt>Exclusive</dt>
														  <dd>Bus, hotel service</dd>
														    <dt>Places</dt>
														  <dd>GTB, kutumbhminar</dd>
														</dl>
										  </td>
										 
									  </tr>
									  
								   </table>
								 
							     </div>
						    </div>
								 <div style="background-color:white; height:130px;  margin-top:5px;">
								  <div style="height:25px;background-color:#FFA87D; padding-left:10px; color:black; " class="col-md-12">Uttrakhand Tour
								   <span class="pull-right"><i class="fa fa-pencil" style="color:black;"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$ 85 USD</span>
								  </div>
								  <div style="color:black;">
								 
								   <table>
								      <tr>
									      <td>
										      <dl class="dl-horizontal">
														  <dt>Places</dt>
														  <dd>GTB, kutumbhminar</dd>
														  <dt>Foods</dt>
														  <dd>lunch, dinner</dd>
														  <dt>Exclusive</dt>
														  <dd>Bus, hotel service</dd>
														   <dt>Foods</dt>
														  <dd>lunch, dinner</dd>
														  <dt>Exclusive</dt>
														  <dd>Bus, hotel service</dd>
														</dl>
									     </td>
										  <td>  <dl class="dl-horizontal">
														  <dt>Places</dt>
														  <dd>GTB, kutumbhminar</dd>
														  <dt>Foods</dt>
														  <dd>lunch, dinner</dd>
														  <dt>Exclusive</dt>
														  <dd>Bus, hotel service</dd>
														    <dt>Places</dt>
														  <dd>GTB, kutumbhminar</dd>
														</dl>
										  </td>
										 
									  </tr>
									  
								   </table>
								 
							     </div>
						    </div>
								 <div style="background-color:white; height:130px;  margin-top:5px;">
								  <div style="height:25px;background-color:#FFA87D; padding-left:10px; color:black; " class="col-md-12">Jammu & kashmir Tour
								    <span class="pull-right"><i class="fa fa-pencil" style="color:black;"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$ 60 USD</span>
								  </div>
								  <div style="color:black;">
								 
								   <table>
								      <tr>
									      <td>
										      <dl class="dl-horizontal">
														  <dt>Places</dt>
														  <dd>GTB, kutumbhminar</dd>
														  <dt>Foods</dt>
														  <dd>lunch, dinner</dd>
														  <dt>Exclusive</dt>
														  <dd>Bus, hotel service</dd>
														   <dt>Foods</dt>
														  <dd>lunch, dinner</dd>
														  <dt>Exclusive</dt>
														  <dd>Bus, hotel service</dd>
														</dl>
									     </td>
										  <td>  <dl class="dl-horizontal">
														  <dt>Places</dt>
														  <dd>GTB, kutumbhminar</dd>
														  <dt>Foods</dt>
														  <dd>lunch, dinner</dd>
														  <dt>Exclusive</dt>
														  <dd>Bus, hotel service</dd>
														    <dt>Places</dt>
														  <dd>GTB, kutumbhminar</dd>
														</dl>
										  </td>
										 
									  </tr>
									  
								   </table>
								 
							     </div>
						    </div>
							    <div style="background-color:white; height:25px; margin-top:5px;">
								    <span class="pull-right" style="margin-right:10px; color:black;">More &nbsp;<i class="fa fa-angle-double-right"></i></span>
							    </div>
						
						</div>
				</div>
		</div>
	</div>
</div>
      
  
	

    <!-- About Us Page
    ==========================================-->
    <div id="tf-about">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                   <!-- <img src="img/02.png" class="img-responsive">-->
				   <div class="about-text">
                        <div class="section-title">
                            <h4 class="color">Profile</h4>
                            <h2>Some words </h2> <br>
							<h2><strong>about Me</strong></h2>
                            <hr>
                            <div class="clearfix"></div>
                        </div>
						<div class="col-md-4">
						      <span class="input-group-btn"><button class="btn btn-danger">Create &nbsp;&nbsp;&nbsp;<i class="fa fa-floppy-o"></i></button></span>
						   </div>
						  <div class="col-md-4">
						   <span class="input-group-btn"><button class="btn btn-primary">Save &nbsp;&nbsp;&nbsp;<i class="fa fa-pencil"></i></button></span>
						   </div>
						   <div class="col-md-4">
						   <span class="input-group-btn"><button class="btn btn-success">Edit &nbsp;&nbsp;&nbsp;<i class="fa fa-pencil"></i></button></span>
						   </div>
						   
					</div>	
				   
                </div>
                <div class="col-md-9">
                    <div class="about-text">
                        <!--<div class="section-title">
                            <h4>Profile</h4>
                            <h2>Some words <strong>about us</strong></h2>
                            <hr>
                            <div class="clearfix"></div>
                        </div>-->
                       <!-- <p class="intro">We love building and rebuilding brands through our  specific skills. Using colour, fonts, and illustration, we brand companies in a way they will never forget.</p>-->
					   <div class="col-md-4">
                        <ul class="about-list">
                            
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Full Name" style="border:white;" value="Alice wiz"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Age" style="border:white;" value="24 years old"></em>
							</li>
							<span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Languages Known" style="border:white;" value="English Hindi"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Tour Region" style="border:white;" value="North-East Expert"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Mobile No." style="border:white;" value="9876543214"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Email" style="border:white;" value="Abc@guidedGateway.com"></em>
							</li>
                        </ul>
						</div>
						<div class="col-md-4">
                        <ul class="about-list">
                            
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Interest" style="border:white;" value="Travelling Books"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Experience" style="border:white;" value="Since 3 yrs"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Interest" style="border:white;" value="Travelling Books"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Experience" style="border:white;" value="Since 3 yrs"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Interest" style="border:white;" value="Travelling Books"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Experience" style="border:white;" value="Since 3 yrs"></em>
							</li>
                        </ul>
						</div>
						<div class="col-md-4">
                        <ul class="about-list">
                            
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Interest" style="border:white;" value="Travelling Books"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Experience" style="border:white;" value="Since 3 yrs"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Interest" style="border:white;" value="Travelling Books"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Experience" style="border:white;" value="Since 3 yrs"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Interest" style="border:white;" value="Travelling Books"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Experience" style="border:white;" value="Since 3 yrs"></em>
							</li>
                        </ul>
						</div>
						<!-- <div class="pull-right col-md-3 controls input-group form-inline" style="padding-top:20px;">
						   <div class="col-md-5">
						   <span class="input-group-btn"><button class="btn btn-danger">Save &nbsp;&nbsp;&nbsp;<i class="fa fa-floppy-o"></i></button>
						   </div>
						   <div class="col-md-1"></div>
						   <div class="col-md-5">
						   <span class="input-group-btn"><button class="btn btn-success">Edit &nbsp;&nbsp;&nbsp;<i class="fa fa-pencil"></i></button>
						   </div>
						   
						   </span>
						</div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- spacing  -->
	 <div id="tf-team" class="">
        <div class="overlay-new">
            <div class="container">
	            <div class="row"></div>
	</div></div></div>
	</div>
 <!-- Create Tour Page 
    ==========================================-->
    <div id="tf-about">
        <div class="container">
            <div class="row">
                
                <div class="col-md-9">
                    <div class="about-text">
                        <!--<div class="section-title">
                            <h4>Profile</h4>
                            <h2>Some words <strong>about us</strong></h2>
                            <hr>
                            <div class="clearfix"></div>
                        </div>-->
                       <!-- <p class="intro">.</p>-->
					   <div class="col-md-4">
                        <ul class="about-list">
                            
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Full Name" style="border:white;" value="Alice wiz"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Age" style="border:white;" value="24 years old"></em>
							</li>
							<span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Languages Known" style="border:white;" value="English Hindi"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Tour Region" style="border:white;" value="North-East Expert"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Mobile No." style="border:white;" value="9876543214"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Email" style="border:white;" value="Abc@guidedGateway.com"></em>
							</li>
                        </ul>
						</div>
						<div class="col-md-4">
                        <ul class="about-list">
                            
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Interest" style="border:white;" value="Travelling Books"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Experience" style="border:white;" value="Since 3 yrs"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Interest" style="border:white;" value="Travelling Books"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Experience" style="border:white;" value="Since 3 yrs"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Interest" style="border:white;" value="Travelling Books"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Experience" style="border:white;" value="Since 3 yrs"></em>
							</li>
                        </ul>
						</div>
						<div class="col-md-4">
                        <ul class="about-list">
                            
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Interest" style="border:white;" value="Travelling Books"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Experience" style="border:white;" value="Since 3 yrs"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Interest" style="border:white;" value="Travelling Books"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Experience" style="border:white;" value="Since 3 yrs"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Interest" style="border:white;" value="Travelling Books"></em>
							</li>
							<li>
							 <span class="fa fa-leaf"></span>
							    <em><input id="Interest" placeholder="Experience" style="border:white;" value="Since 3 yrs"></em>
							</li>
                        </ul>
						</div>
						<!-- <div class="pull-right col-md-3 controls input-group form-inline" style="padding-top:20px;">
						   <div class="col-md-5">
						      <span class="input-group-btn"><button class="btn btn-danger">Save &nbsp;&nbsp;&nbsp;<i class="fa fa-floppy-o"></i></button></span>
						   </div>
						   <div class="col-md-1"></div>
						   <div class="col-md-5">
						   <span class="input-group-btn"><button class="btn btn-success">Edit &nbsp;&nbsp;&nbsp;<i class="fa fa-pencil"></i></button></span>
						   </div>
						   
						   
						</div> -->
                    </div>
                </div>
				
				<div class="col-md-3">
                   <!-- <img src="img/02.png" class="img-responsive">-->
				   <div class="about-text">
                        <div class="section-title">
                            <h4 class="color">Create</h4>
                            <h2>Tours</h2> <br>
							<h2><strong>for Tourism</strong></h2>
                            <hr>
                            <div class="clearfix"></div>
                        </div>
						<div class="col-md-5">
						      <span class="input-group-btn"><button class="btn btn-danger">Create &nbsp;&nbsp;&nbsp;<i class="fa fa-floppy-o"></i></button></span>
						   </div>
						   <div class=""></div>
						   <div class="col-md-5">
						   <span class="input-group-btn"><button class="btn btn-success">Edit &nbsp;&nbsp;&nbsp;<i class="fa fa-pencil"></i></button></span>
						   </div>
					</div>	
				   
                </div>
            </div>
        </div>
    </div>
    <!--Guide Team Page
    ==========================================-->
    <div id="tf-team" class="text-center">
        <div class="overlay-new">
            <div class="container">
                <div class="section-title center">
                    <!-- <h2>Tourist <strong>Places</strong></h2> -->
                   <!--  <div class="line">
                        <hr>
                    </div> -->
                </div>

                <!-- <div id="team" class="owl-carousel owl-theme row">
                    <div class="item">
                        <div class="thumbnail">
                            <img src="img/team/1.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Taj Mahal</h3>
                                <p>Agra</p>
                                <p>Wonder of the world</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="thumbnail">
                            <img src="img/team/2.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>mayadwar</h3>
                                <p>Hastinapur</p>
                                <p>Historical Creature</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="thumbnail">
                            <img src="img/team/3.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Lake of Hari</h3>
                                <p>Haridwar</p>
                                <p>Place of Peace</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="thumbnail">
                            <img src="img/team/4.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Amarnath tourism</h3>
                                <p>haridwar</p>
                                <p>God's place</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="thumbnail">
                            <img src="img/team/04.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Jenn Gwapa</h3>
                                <p>CEO / Founder</p>
                                <p>Do not seek to change what has come before. Seek to create that which has not.</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="thumbnail">
                            <img src="img/team/01.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Jenn Gwapa</h3>
                                <p>CEO / Founder</p>
                                <p>Do not seek to change what has come before. Seek to create that which has not.</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="thumbnail">
                            <img src="img/team/02.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Jenn Gwapa</h3>
                                <p>CEO / Founder</p>
                                <p>Do not seek to change what has come before. Seek to create that which has not.</p>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="thumbnail">
                            <img src="img/team/03.jpg" alt="..." class="img-circle team-img">
                            <div class="caption">
                                <h3>Jenn Gwapa</h3>
                                <p>CEO / Founder</p>
                                <p>Do not seek to change what has come before. Seek to create that which has not.</p>
                            </div>
                        </div>
                    </div>
                </div> -->
                
            </div>
        </div>
    </div>
 <!-- Recent Trip Section
    ==========================================-->
    <div id="tf-works">
        <div class="container"> <!-- Container -->
		<div class="row">
            <div class="section-title text-center center">
                <h2>Recent <strong>Trips</strong></h2>
                <div class="line">
                    <hr>
                </div>
                <div class="clearfix"></div>
                <!--<small><em>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</em></small>-->
            </div>
			  <div class="col-md-6 col-md-offset-1 ">

                   <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tour Title</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Tour Title">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tour Place</label>
                                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter tour region">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Description about the Tour</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
						<span class="input-group-btn">
                       <label class="btn tf-btn btn-primary" for="my-file-selector">
   <input id="my-file-selector" type="file" style="display:none;"> Add Images </label><i class="fa fa-plus-circle"></i></span>
                      
						<button type="submit" class="btn tf-btn btn-default">Submit</button>
                    </form>

                </div>
			<!-- <div></div>
            <div class="space"></div> -->

          <!--  <div class="categories">
                
                <ul class="cat">
                    <li class="pull-left"><h4>Filter by Type:</h4></li>
                    <li class="pull-right">
                        <ol class="type">
                            <li><a href="#" data-filter="*" class="active">All</a></li>
                            <li><a href="#" data-filter=".web">Web Design</a></li>
                            <li><a href="#" data-filter=".photography">Photography</a></li>
                            <li><a href="#" data-filter=".app" >Mobile App</a></li>
                            <li><a href="#" data-filter=".branding" >Branding</a></li>
                        </ol>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>-->

           <!--  <div id="lightbox" class="row">

                <div class="col-sm-6 col-md-3 col-lg-3 branding">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Jammu Kashmir</h4>
                                    <small>Explore Now</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="img/portfolio/01.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 photography app">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Haridwar</h4>
                                    <small>Explore Now</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="img/portfolio/02.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 branding">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Goa</h4>
                                    <small>Explore Now</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="img/portfolio/03.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 branding">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Hastinapur</h4>
                                    <small>Explore Now</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="img/portfolio/04.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 web">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>J & k</h4>
                                    <small>Explore Now</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="img/portfolio/05.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 app">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Goa beech</h4>
                                    <small>Explore Now</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="img/portfolio/06.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 photography web">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Ajmer</h4>
                                    <small>Explore Now</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="img/portfolio/07.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-3 col-lg-3 web">
                    <div class="portfolio-item">
                        <div class="hover-bg">
                            <a href="#">
                                <div class="hover-text">
                                    <h4>Keral</h4>
                                    <small>Explore Now</small>
                                    <div class="clearfix"></div>
                                    <i class="fa fa-plus"></i>
                                </div>
                                <img src="img/portfolio/08.jpg" class="img-responsive" alt="...">
                            </a>
                        </div>
                    </div>
                </div>

            </div> -->
        </div>
		</div>
    </div>
    <!-- Clients Section
    ==========================================-->
    <div id="tf-clients" class="text-center">
        <div class="overlay-new">
            <div class="container">

              <!--   <div class="section-title center">
                    <h2> Exclusive <strong> Facilities</strong></h2>
                    <div class="line">
                        <hr>
                    </div>
                </div> -->
               <!--  <div id="clients" class="owl-carousel owl-theme">
                    <div class="item">
                        <img src="img/client/01.png">
                    </div>
                    <div class="item">
                        <img src="img/client/02.png">
                    </div>
                    <div class="item">
                        <img src="img/client/03.png">
                    </div>
                    <div class="item">
                        <img src="img/client/04.png">
                    </div>
                    <div class="item">
                        <img src="img/client/05.png">
                    </div>
                    <div class="item">
                        <img src="img/client/06.png">
                    </div>
                    <div class="item">
                        <img src="img/client/07.png">
                    </div>
                </div> -->

            </div>
        </div>
    </div>

      

    <!-- Contact Section
    ==========================================-->
    <div id="tf-contact" class="text-center">
        <div class="container">

            <div class="row">
			 <div class="section-title center">
                        <h2>Feel free to <strong>contact us</strong></h2>
                        <div class="line">
                            <hr>
                        </div>
                        <div class="clearfix"></div>
                       <!-- <small><em>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</em></small>-->            
                    </div>
                <div class="col-md-5 col-md-offset-1 ">

                    <div class="section-title center">
                        <h2> <strong>Email</strong></h2>
                        <div class="line">
                            <hr>
                        </div>
                        <div class="clearfix"></div>
                       <!-- <small><em>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</em></small>-->            
                    </div>

                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Message</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        
                        <button type="submit" class="btn tf-btn btn-default">Submit</button>
                    </form>

                </div>
				<!--spacing area-->
				 <div id="" class="col-md-1">
                     <div class="overlay-new2">
                          <div class="container">
	                          <div class="row"></div>
	                     </div>
	                </div>
	            </div>
	
	<!-- Message box-->
				<div class="col-md-5 ">

                    <div class="section-title center">
                        <h2> <strong>Message</strong></h2>
                        <div class="line">
                            <hr>
                        </div>
                        <div class="clearfix"></div>
                       <!-- <small><em>Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.</em></small>-->            
                    </div>

                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Message</label>
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        
                        <button type="submit" class="btn tf-btn btn-default">Submit</button>
                    </form>

                </div>
				</div>
            </div>

        </div>
    

   <!--  <nav id="footer">
        <div class="container">
            <div class="pull-left fnav">
                <p>ALL RIGHTS RESERVED. COPYRIGHT © 2015. Designed by <a href="https://Waltrump.com/">Waltrump Technology</a>  Designed for <a href="https://guidedgateway.com">Guided Gateway</a></p>
            </div>
            <div class="pull-right fnav">
                <ul class="footer-social">
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                </ul>
            </div>
        </div>
    </nav> -->
	<!-- spacing  -->
	 <div id="tf-team" class="">
        <div class="overlay-new">
            <div class="container">
	            <div class="row"></div>
	</div></div></div>
	</div>
<!-- START #ex-footer --> <div id="#ex-footer"> <div
				class="container"> <div class="row"> <nav
				class="col-md-12"> <ul class="footer-menu"> <li><a
				href="#">Best Rate Guarntee</a></li> <li><a
				href="#">Careers</a></li> <li><a href="#">Hotel
				Directory</a></li> <li><a href="#">Website Terms of
				Use</a></li> <li><a href="#">Privacy Statement</a></li>
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
							support@guidedgateway.com</span> <span
							class="contact-phone"> +1 510 938 2562</span> </div> <div class="foot-box
							col-md-4"> <span class="">&copy; 2015							GuideGateway. All Rights Reserved.</span>
							</div> </div> </div> </div> </div> <!-- END
							#ex-footer --> </footer> <!-- END footer -->
							</div> <!-- END #wrapper -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/jquery.1.11.1.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <script type="text/javascript" src="js/SmoothScroll.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.js"></script>

    <script src="js/owl.carousel.js"></script>

    <!-- Javascripts
    ================================================== -->
    <script type="text/javascript" src="js/main.js"></script>

  </body>
</html>