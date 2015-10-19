<?php
if($_GET["id1"] == 0)
{
	$tourID=$_GET["id2"];
	$userID=0;
}
if($_GET["id2"]==0)
{
	$userID=$_GET["id1"];
	$tourID=0;
}

include_once('db.php');

$select1 = mysql_query("SELECT * FROM `tbl_user_profile` WHERE `user_id` = $userID");
$row11 = mysql_fetch_assoc($select1);
$firstName=$row11["f_name"];
$lastName=$row11["l_name"];
$username =  $firstName . " " . $lastName;
$emailID = $row11["email"];
$mobileNumber = $row11["mobileNo"];
$gender = $row11["gender"];
$birthday = $row11["d_o_b"];
$streetAddress = $row11["street_address"];
$city = $row11["city"];
$state = $row11["state"];
$country = $row11["country"];

$select2 = mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userID");
$row22 = mysql_fetch_assoc($select2);
if(mysql_num_rows($select2) > 0 )
{
$profilePicture = $row22["guide_profile_pic"];
$coverPicture = $row22["guide_Cover_pic"];
$nickName = $row22["nick_name"];
$LicenceImage = $row22["license_Image"];
$licenceNumber = $row22["license_no"];
$licenceValidty = $row22["validity"];
$guideTerritory = $row22["guide_territory"];
$summery = $row22["guide_summary"];
$otherExperiance = $row22["other_experience"];
$experianceInYear = $row22["experiance_in_year"];
$intrest = $row22["guide_interest"];
$landLineNumber = $row22["landline_no"];
$paymentCurrency = $row22["payment_currency"];
$paymentTerm = $row22["payment_terms"];
$bestTimeToContace = $row22["Best_time_for_contact"];
$communicationMechanism = $row22["Communication_mechanism"];
$remark = $row22["guide_Remarks"];
}
else
{
$nickName = "";
$licenceNumber = "";
$licenceValidty = "";
$guideTerritory = "";
$summery = "";
$otherExperiance = "";
$experianceInYear = "";
$intrest = "";
$landLineNumber = "";
$paymentCurrency = "";
$paymentTerm = "";
$bestTimeToContace = "";
$communicationMechanism = "";
$remark = "";
}

$select3 = mysql_query("SELECT * FROM `tbl_tours` WHERE `tour_id` = $tourID && `status` = 1");
$row33 = mysql_fetch_assoc($select3);
$user_id=$row33["user_id"];
$tour_category_id = $row33["tour_category_id"];
$tour_title = $row33["tour_title"];
$tour_location = $row33["tour_location"];
$tour_description = $row33["tour_description"];
$tour_duration = $row33["tour_duration"];
$tour_price = $row33["tour_price"];
$start_point = $row33["start_point"];
$end_point = $row33["end_point"];
$inclusive = $row33["inclusive"];
$exclusive = $row33["exclusive"];
$cancelation_policy = $row33["cancelation_policy"];
$restrictions = $row33["restrictions"];
$notes = $row33["notes"];



?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

	<!-- START head -->
	<head>
		<!-- Site meta charset -->
		<meta charset="UTF-8">
		
		<!-- title -->
		<title>Booking Form | Guided Gateway</title>
		
		<!-- meta description -->
		<meta name="description" content="Guided Gateway" />
		
		<!-- meta keywords -->
		<meta name="keywords" content="Travel India Tourist Guide" />
		
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
		<link rel="stylesheet" type="text/css" href="css/colors/color3.css" title="color3" />
		
		<style type="text/css">
			#registration-form 
			{
				background: #FDFDFD;
				padding: 20px;
				margin-right: auto;
				margin-left: auto;
				border: 1px solid #E9E9E9;
				border-radius: 10px;
			}
		</style>

		<script type="text/javascript" src="anki/jquery-1.10.2.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
			var x_timer;    
			$("#email").keyup(function (e){
				clearTimeout(x_timer);
				var email_name = $(this).val();
				x_timer = setTimeout(function(){
					check_email_ajax(email_name);
				}, 1000);
			}); 

		function check_email_ajax(email){
			$("#email-result").html('<img src="img/ajax-loader.gif" />');
			$.post('email-checker.php', {
				'email':email
				}, function(data) {
			  $("#email-result").html(data);
			});
		}
		});
		</script>

	</head>
	<!-- END head -->

	<!-- START body -->
	<body>
		<!-- START #wrapper -->
		<div id="wrapper">
			<!-- START header -->
			<?php include_once('MasterHeader.php'); ?>
			<!-- END header -->
			
			<!-- START #page-header -->
			<div id="header-banner">
				<div class="banner-overlay">
					<div class="container">
						<div class="row">
							<section class="col-sm-6">
								<h1 class="text-upper">Booking Form</h1>
							</section>
							
							<!-- breadcrumbs -->
							<section class="col-sm-6">
								<ol class="breadcrumb">
									<li class="home"><a href="#">Home</a></li>
									<li class="active">Contact Us</li>
								</ol>
							</section>
						</div>
					</div>
				</div>
			</div>
			<!-- END #page-header -->
			
			<!-- START .main-contents -->
			<div class="main-contents">
				<div class="container">
					<div class="row">
						<!-- START #page -->
						<div id="page" class="col-md-8">
						<div class="row">
						<div class="" id="registration-form">
						<label for="email">Email <span class="required small">(Required)</span></label><br><br>
						<div class="form-inline">
						<input name="email" class="form-control" type="text" id="email" >
						<span id="email-result"></span>
						</div>
						</div><br><br><br><br><br><br><br><br>
						</div>
							<!-- START #contactForm -->
							<section id="booking-form">
								<h2 class="ft-heading text-upper">Provide Your Booking Information</h2>
								<form action="contact.php" method="post">
									<fieldset>
										<ul class="formFields list-unstyled">
											<li class="row">
												<div class="col-md-6">
													<label>Name <span class="required small">(Required)</span></label>
													<input type="text" class="form-control" name="name" value="" />
												</div>
												<div class="col-md-6">
													<label>Email <span class="required small">(Required)</span></label>
													<input type="text" class="form-control" name="email" value="" />
												</div>
											</li>
											<li class="row">
												<div class="col-md-6">
													<label>City <span class="required small">(Required)</span></label>
													<input type="text" class="form-control" name="city" value="" />
												</div>
												<div class="col-md-6">
													<label>Country <span class="required small">(Required)</span></label>
													<input type="text" class="form-control" name="country" value="" />
												</div>
											</li>
											<li class="row">
												<div class="col-md-6">
													<label>Zip Code <span class="required small">(Required)</span></label>
													<input type="text" class="form-control" name="zipcode" value="" />
												</div>
												<div class="col-md-6">
													<label>Billing Method <span class="required small">(Required)</span></label>
													<input type="text" class="form-control" name="method" value="" />
												</div>
											</li>
											<li class="row">
												<div class="col-md-12">
													<label>Bank Account <span class="required small">(Required)</span></label>
													<input type="text" class="form-control" name="account" value="" />
												</div>
											</li>
											<li class="row">
												<div class="col-md-12">
													<label>Bank Address <span class="required small">(Required)</span></label>
													<input type="text" class="form-control" name="address" value="" />
												</div>
											</li>
											<li class="row">
												<div class="col-md-12">
													<div class="checkbox-container">
														<label><input type="checkbox" name="a" class="styled" />First Choice</label>
														<label><input type="checkbox" name="a" class="styled" />Second Choice</label>
														<label><input type="checkbox" name="a" class="styled" />Third Choice</label>
													</div>
													<div class="checkbox-container">
														<label><input type="radio" name="radio" class="styled"  checked="checked" /> First Choice</label>
														<label><input type="radio" name="radio" class="styled" /> Second Choice</label>
														<label><input type="radio" name="radio" class="styled" /> Third Choice</label>
													</div>
												</div>
											</li>
											<li class="row">
												<div class="col-md-12">
													<input type="submit" class="btn btn-primary btn-lg text-upper" name="save" value="Save" />
													<span class="required small">*Your email will never published.</span>
												</div>
											</li>
											
										</ul>
									</fieldset>
								</form>
							</section>
							<!-- END #contactForm -->
						</div>
						<!-- END #page -->
						
						<!-- START #sidebar -->
						<aside id="sidebar" class="col-md-4">
							<div class="sidebar-widget">
								<!-- Sidebar recent popular posts -->
								<!-- START TABS -->
								
								<ul class="nav nav-tabs text-upper" style="background-color:#ff845e;">
									<?php
									if($userID == 0)
									{
										echo '<li class="active"><a href="#popular-posts" data-toggle="tab">Requested Tour Detail</a></li>';
									}
									else if($tourID == 0)
									{
										echo '<li class="active"><a href="#popular-posts" data-toggle="tab">Requested Guide Detail</a></li>';
									}
									
									?>
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content gray box-shadow1 clearfix marb30">
									<!-- START TAB 1 -->
									<div class="tab-pane active" id="popular-posts">
										<?php 
										if($userID == 0)
									{
										?>
										<div class="tour-plans" style="padding:10px 10px 10px 10px;">
								<div class="plan-image">
								<?php
								
		
								$select4Tvid = mysql_query("SELECT * FROM `tbl_tour_media_videos` WHERE `tour_id` = $tourID");
								$select4Tpic = mysql_query("SELECT * FROM `tbl_tour_media_pictures` WHERE `tour_id` = $tourID");
								$count4Tpic = mysql_num_rows($select4Tpic);
								if ($count4Tpic==0)
								{
									echo '<img class="img-responsive" alt="featured Scroller" draggable="false" src="img/custom11.jpg"/>';
								}
								else
								{
									echo '<img class="img-responsive" alt="featured Scroller" draggable="false" src="showMediaPicture.php?id=' . mysql_result($select4Tpic, 0, 0) . '"/>';
								}
								?>
									<!--<img class="img-responsive" src="img/custom2.jpg" alt="TajMahal" />-->
									<div class="offer-box">
										<div class="offer-top">
											<!--<span class="ft-temp alignright">19&#730;c</span>-->
											<span class="featured-cr text-upper" style="font-size:15px"><?php echo $tour_location ; ?></span>
											<h2 class="featured-cy text-upper" style="font-size:15px"><?php echo $tour_title; ?></h2>
										</div>
										
										<div class="offer-bottom">
											<span class="featured-spe" style="font-size:15px"><?php echo $tour_price; ?></span>
										</div>
									</div>
								</div>
								
								<div class="featured-btm box-shadow1">
									<a class="ft-hotel text-upper" href="#"><?php echo $tour_duration; ?> Day Tour</a>
									<a class="ft-plane text-upper" href="#"><?php $select2 = mysql_query("SELECT `tour_category_title` FROM `tbl_tour_category` WHERE `tour_category_id` = $tour_category_id && `status` = 1"); echo mysql_result($select2, 0, 0); ?></a>
									<a class="ft-tea text-upper" href="#"><?php echo $inclusive; ?></a>
                                    <?php echo '<a class="ft-tea text-upper" style="cursor: pointer;" onclick="bookTour(' .$tourID.')">Book the Tour</a>'; ?>
								</div>
								
							</div>
							<div style="text-align:justify; padding:10px 10px 10px 10px;">
							<div class="row">
							<div class="col-md-5">
							Tour Description :
							</div>
							<div class="col-md-7">
							<?php echo $tour_description; ?>
							</div>
							</div>
							
							<div class="row">
							<div class="col-md-5">
							Start Point :
							</div>
							<div class="col-md-7">
							<?php echo $start_point; ?>
							</div>
							</div>
							
							<div class="row">
							<div class="col-md-5">
							End Point :
							</div>
							<div class="col-md-7">
							<?php echo $end_point; ?>
							</div>
							</div>
							
							<div class="row">
							<div class="col-md-5">
							Inclusive :
							</div>
							<div class="col-md-7">
							<?php echo $inclusive; ?>
							</div>
							</div>
							
							<div class="row">
							<div class="col-md-5">
							Exclusive :
							</div>
							<div class="col-md-7">
							<?php echo $exclusive; ?>
							</div>
							</div>
							
							<div class="row">
							<div class="col-md-5">
							Cancelation Policy :
							</div>
							<div class="col-md-7">
							<?php echo $cancelation_policy; ?>
							</div>
							</div>
							
							<div class="row">
							<div class="col-md-5">
							Restruction :
							</div>
							<div class="col-md-7">
							<?php echo $restrictions; ?>
							</div>
							</div>
							
							<div class="row">
							<div class="col-md-5">
							Note :
							</div>
							<div class="col-md-7">
							<?php echo $notes; ?>
							</div>
							</div>
							</div>
							<div style="text-align:justify; padding:10px 10px 10px 10px;">
							<?php echo '<a class="pull-right btn btn-sm btn-warning" onclick="detailTour(' . $tourID . ');">Detail</a>'; ?>
							
							<br><br>
							</div>
										<?php
									}
									else if($tourID == 0)
									{
										
										
										?>
										<div style="text-align:justify; padding:10px 10px 10px 10px;">
										<div class="row">
										<div class="col-md-4 col-sm-4 plan-image">
										<?php 
										$count4pic = mysql_num_rows($select2);
										if ($count4pic==0)
										{
											echo '<img class="hover img-responsive" src="img/userDefaultIcon.png"/>';
										}
										else
										{
											if($profilePicture==null)
											{
												echo '<img class="hover img-responsive" src="img/userDefaultIcon.png"/>';
											}
											else
											{
												echo '<img class="hover img-responsive" src="showImage.php?id=' . $userID . '"/>';
											}
										}
											
										?>
										
										</div>
										<div class="col-md-8 col-sm-8">
										<div class="row">
										<div class="col-md-3 col-sm-4 col-xs-4">Name:</div>
										<div class="col-md-9 col-sm-8 col-xs-8"><?php echo $username; ?></div>
										</div>
										<div class="row">
										<div class="col-md-3 col-sm-4 col-xs-4">Gender:</div>
										<div class="col-md-9 col-sm-8 col-xs-8"><?php echo $gender; ?></div>
										</div>
										<div class="row">
										<div class="col-md-3 col-sm-4 col-xs-4">DOB:</div>
										<div class="col-md-9 col-sm-8 col-xs-8"><?php echo $birthday; ?></div>
										</div>
										<div class="row">
										<div class="col-md-3 col-sm-4 col-xs-4">Mobile:</div>
										<div class="col-md-9 col-sm-8 col-xs-8"><?php echo $mobileNumber; ?></div>
										</div>
										<div class="row">
										<div class="col-md-3 col-sm-4 col-xs-4">Email:</div>
										<div class="col-md-9 col-sm-8 col-xs-8"><?php echo $emailID; ?></div>
										</div>
										</div>
										</div>
										<div class="row"><br>
										<div class="col-md-12">
										<div class="row">
										<div class="col-md-4 col-sm-4 col-xs-4">Address:</div>
										<div class="col-md-8 col-sm-8 col-xs-8"><?php echo $streetAddress . ", " . $city. ", " . $state. ", " . $country; ?></div>
										</div>
										<div class="row">
										<div class="col-md-4 col-sm-4 col-xs-4">Guide Territory:</div>
										<div class="col-md-8 col-sm-8 col-xs-8"><?php echo $guideTerritory; ?></div>
										</div>
										<div class="row">
										<div class="col-md-4 col-sm-4 col-xs-4">Licence No.:</div>
										<div class="col-md-8 col-sm-8 col-xs-8"><?php echo $licenceNumber; ?></div>
										</div>
										<div class="row">
										<div class="col-md-4 col-sm-4 col-xs-4">Experiance:</div>
										<div class="col-md-8 col-sm-8 col-xs-8"><?php echo $experianceInYear . " Year Experiance, " . $otherExperiance . "." ; ?></div>
										</div>
</div>
										</div>
										</div>
										<div style="text-align:justify; padding:10px 10px 10px 10px;">
										<?php echo '<a class="pull-right btn btn-sm btn-warning" onclick="detailGuide(' . $userID . ');">Detail</a>'; ?>
										<br><br>
										</div>
										
										<?php
									}
										?>
										
									</div>
									<!-- END TAB 1 -->
									
									<!-- START TAB 2 -->
									<div class="tab-pane" id="recent-posts">
										<ul class="rc-posts-list list-unstyled">
											<li>
												<span class="rc-post-image">
													<img class="img-responsive" src="http://placehold.it/80x65" alt="Recent Post 1" />
												</span>
												<h5><a href="#">Apple Fails to Fix iPhone Daylight Saving Time Alarm Bug</a></h5>
												<span class="rc-post-date small">January 20, 2014</span>
											</li>
											<li>
												<span class="rc-post-image">
													<img class="img-responsive" src="http://placehold.it/80x65" alt="Recent Post 2" />
												</span>
												<h5><a href="#">Limbaugh: Does 'Dark Knight Rise have it Bomb Found...</a></h5>
												<span class="rc-post-date small">January 18, 2014</span>
											</li>
											<li>
												<span class="rc-post-image">
													<img class="img-responsive" src="http://placehold.it/80x65" alt="Recent Post 3" />
												</span>
												<h5><a href="#">Shares suspende am Bankiaid 'Gloomy Forecast'</a></h5>
												<span class="rc-post-date small">January 15, 2014</span>
											</li>
											<li class="last-rc-post">
												<span class="rc-post-image">
													<img class="img-responsive" src="http://placehold.it/80x65" alt="Recent Post 4" />
												</span>
												<h5><a href="#">Shares suspende am Bankiaid 'Gloomy Forecast'</a></h5>
												<span class="rc-post-date small">January 11, 2014</span>
											</li>
										</ul>
									</div>
									<!-- END TAB 2 -->
									
									<!-- START TAB 3 -->
									<div class="tab-pane" id="recent-comments">
										<div class="inside-pane">
											<p>Amet turpis tristique, nec in aliquet dis amet, proin egestas in tempor, cras et dapibus, lectus pellentesque enim odio elementum eu tincidunt diam a et. Dapibus sed cum, aliquam cras egestas enim elit in mattis? Scelerisque, ultrices mid! Lorem. Scelerisque? Pid cras, mattis vel, porta, quis! Porttitor turpis cras, odio ultricies parturient pulvinar tempor.</p>
											<p>eu turpis enim dapibus diam tristique cursus egestas quis phasellus montes! Parturient porta purus quis scelerisque? Vel proin, ac odio cras penatibus magnis non? Aliquam elementum, dis? Elementum ac.</p>
										</div>
									</div>
									<!-- END TAB 3 -->
								</div>
								<!-- END TAB CONTENT -->
							</div>
							
							
							
							
							<div class="sidebar-widget">
								<!-- Sidebar What We Do -->
								<h3 class="text-upper">What We Do ?</h3>
								<div class="panel-group" id="accordion">
									<div class="panel panel-default">
										<div class="panel-heading">
											<a class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
												A Simple Heading for Accordion
											</a>
										</div>
										<div id="collapseOne" class="panel-collapse collapse in">
											<div class="panel-body">
												Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading">
											<a class="panel-title collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
												Another Example of Accordion
											</a>
										</div>
										<div id="collapseTwo" class="panel-collapse collapse">
											<div class="panel-body">
												Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
											</div>
										</div>
									</div>
									<div class="panel panel-default">
										<div class="panel-heading">
											<a class="panel-title collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
												This is The Last Test Item
											</a>
										</div>
										<div id="collapseThree" class="panel-collapse collapse">
											<div class="panel-body">
												Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
											</div>
										</div>
									</div>
								</div>
							</div>
						</aside>
						<!-- END #sidebar -->
					</div>
					<!-- END .row -->
				</div>
			</div>
			<!-- END .main-contents -->
			
			<!-- START footer -->
			<footer>
				<!-- START #ft-footer -->
				<div id="ft-footer">
					<div class="footer-overlay">
						<div class="container">
							<div class="row">
								<!-- testimonials -->
								<section class="col-md-6">
									<h3>Testimonials</h3>
									<p>Tortor turpis. Proin. Dolor. Auctor arcu, habitasse mid placerat magna? Dis ac, adipiscing? Cras mus dolor sit a? Platea eros dictumst ridiculus sed phasellus, rhoncus magnis a pellentesque pulvinar duis purus risus tristique ultricies natoque, nec! Natoque natoque cum? Nec, placerat sociis! Sit ut, scelerisque? placerat sociis! Sit ut, scelerisque? Urna ut aliquam duis et scelerisque,</p>
									<div class="tl-author">
										<span class="tl-author-img">
											<img class="img-circle" src="http://placehold.it/70x70" alt="Testimonial Author" />
										</span>
										<span class="tl-author-title">Jassem Elrakesh</span>
										<span class="tl-author-desc">Visited Barcelona recently</span>
									</div>
								</section>
								
								<!-- twitter -->
								<section class="col-md-6">
									<h3 class="tw-feeds">Twitter Feeds</h3>
									<p>The only netball team that takes a team photo after every game #envato <a href="#">http://instagram.com/p/gXSJNTwBJe/</a></p>
									<p>Very excited that Envato is joining the big-ticket Macaw backers list - <a href="#">http://macaw.co</a>  - very intuitive looking new web design app!</p>
									<p>Remember, you really are your own boss. Sink or swim, but do it like a boss. (10/10) <a href="#">#10BootstrappingTips</a></p>
								</section>
							</div>
						</div>
					</div>
				</div>
				<!-- END #ft-footer -->
				
				<!-- START #ex-footer -->
				<div id="#ex-footer">
					<div class="container">
						<div class="row">
							<nav class="col-md-12">
								<ul class="footer-menu">
									<li><a href="#">Best Rate Guarntee</a></li>
									<li><a href="#">Careers</a></li>
									<li><a href="#">Hotel Directory</a></li>
									<li><a href="#">Website Terms of Use</a></li>
									<li><a href="#">Privacy Statement</a></li>
									<li><a href="#">Affiliates</a></li>
									<li class="last-item"><a href="#">Top Destinations</a></li>
								</ul>
							</nav>
							
							<div class="foot-boxs">
								<div class="foot-box col-md-4 text-right">
									<span>Stay Connected</span>
									<ul class="social-media footer-social">
										<li><a class="sm-yahoo" href="#"><span>Yahoo</span></a></li>
										<li><a class="sm-facebook" href="#"><span>Facebook</span></a></li>
										<li><a class="sm-rss" href="#"><span>RSS</span></a></li>
										<li><a class="sm-flickr" href="#"><span>Flicker</span></a></li>
										<li><a class="sm-windows" href="#"><span>Windows</span></a></li>
										<li><a class="sm-stumble" href="#"><span>Stumbleupon</span></a></li>
									</ul>
								</div>
								<div class="foot-box foot-box-md col-md-4">
									<span class="contact-email"> touchus@travelhub.com</span>
									<span class="contact-phone"> +1 125 496 0999</span>
								</div>
								<div class="foot-box col-md-4">
									<span class="">&copy; 2013 travelhub. All Rights Reserved.</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- END #ex-footer -->
			</footer>
			<!-- END footer -->
		</div>
		<!-- END #wrapper -->

		
				<!-- javascripts -->
		<script type="text/javascript" src="js/modernizr.custom.17475.js"></script>

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="bs3/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/check-radio-box.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript" src="js/styleswitcher.js"></script>
		
		
		<script>
		function detailTour(id) 
				{
					window.location.href = "tour_detail_sidebar.php?id="+id+"";
					return false;
				}
				
				function detailGuide(id) 
				{
					//alert("user id - " + id);
					window.location.href = "guide_detail.php?id="+id+"";
					return false;
				}
		</script>

		<!--[if lt IE 9]>
			<script type="text/javascript" src="js/html5shiv.js"></script>
		<![endif]-->

	</body>
</html>