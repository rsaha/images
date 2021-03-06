<html lang="en">

<head>
    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv="x-ua-compatible" content="IE=9" /><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Guided Gateway</title>
    <meta name="description" content="Guided Gateway Website">
    <meta name="keywords" content="">
    <meta name="author" content="GuidedGateway">

    <!-- Favicons
    ================================================== -->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="img/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="img/apple-touch-icon-114x114.png">

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">

    <link rel="stylesheet" type="text/css" href="bs3/css/bootstrap.css" media="all" />

    <!--template stylesheet -->

    <link rel="stylesheet" type="text/css" href="css/styles.css" media="all" />
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="js/rs-plugin/css/settings.css" media="all" />

    <!--responsive stylesheet -->

    <link rel="stylesheet" type="text/css" href="css/responsive.css" media="all" />

    <!-- Load Fonts via	Google Fonts API -->

    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Karla:400,700,400italic,700italic" />

    <!-- color scheme -->
    <link rel="stylesheet" type="text/css" href="css/colors/color3.css" title="color3" />

    <!-- Slider
    ================================================== -->
    <link href="css/owl.carousel.css" rel="stylesheet" media="screen">
    <link href="css/owl.theme.css" rel="stylesheet" media="screen">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
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

    <style>
        #betaImg {
            top: 110px;
            position: absolute;
            right: 0px;
            z-index: 99999;
        }
    </style>

</head>

<!-- Navigation
	
	<!-- START body -->

<body>
    <!-- START #wrapper -->
    <div id="wrapper">
        <!-- START header -->
        <header>
            <!-- START #top-header -->
            <div id="top-header">
                <div class="container">
                    <div class="row top-row">
                        <div class="col-md-6">
                            <div class="left-part alignleft">
                                <span class="contact-email small">support@guidedgateway.com</span>
                                <span class="contact-phone small">+91 9830032920</span>
                                <ul class="social-media header-social">
                                    <li><a class="sm-facebook" href="https://www.facebook.com/Guided-Gateway-1462689710717715"><span>Facebook</span></a></li>
                                    <li><a class="sm-pinterest" href="https://www.pinterest.com/guidedgateway/"><span>Pinterest</span></a></li>
                                    <li><a class="sm-twitter" href="https://twitter.com/GuidedG"><span>Twitter</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="right-part alignright">
                                <span class="small pull-right">
								<a href="signOut.php" style="color:#292c2f;" title="">SIGN-OUT</a>
							</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END #top-header -->

            <div id="main-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <a id="site-logo" href="login.php">
                                <img src="images/logo.png" alt="Guided Gateway" />
                            </a>
                        </div>
                        <div class="col-md-9">
                            <nav class="main-nav">
                                <span>MENU</span>
                                <ul style="width:100%" id="main-menu">
                                    <li class="pull-right"><a href="#" title=""><i class="fa fa-cog"></i>&nbsp;&nbsp;Setting</a>
                                        <ul>
                                            <li><a onclick="editProfile(<?php echo $userid; ?>)" title="">Edit Profile</a></li>
                                            <li><a onclick="myFunctionSetting(<?php echo $userid; ?>)" title="">Change Password</a></li>
                                        </ul>
                                    </li>
                                    <li class="pull-right"><a href="#" title=""><i class="fa fa-inbox"></i>&nbsp;&nbsp;Messages (Coming Soon)</a></li>
                                    <li class="pull-right"><a href="login.php" title=""><i class="fa fa-home"></i>&nbsp;&nbsp;Home</a></li>
                                </ul>
                            </nav>
                        </div>
                        <img id="betaImg" src="img/Header_BetaBadge.png" alt="Guided Gateway Beta" />
                    </div>
                </div>
            </div>
            <!-- END #main-header -->
        </header>
        <!-- END header -->
        <!-- START #wrapper -->
    </div>

    <script>
        $(function () {
            $('[data-toggle="popover"]').popover();
        });

        function myFunctionSetting(id) {
            window.location.href = "guide_profile_setting.php?id=" + id;
            return false;
        }
    </script>

</body>

</html>