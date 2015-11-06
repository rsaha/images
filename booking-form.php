<?php

/* 
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

$select3 = mysql_query("SELECT * FROM `tbl_tours` WHERE `tour_id` = $tourID && `status` != 0");
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
$notes = $row33["notes"]; */



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
        
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        
		<style type="text/css">
		
		#addExtraService{
			top: 5px;     
			height: 29px;
			position: absolute;
			right: 20px;
		}
            
			#registration-form 
			{
				background: #FDFDFD;
				padding: 20px;
				margin-right: auto;
				margin-left: auto;
				border: 1px solid #E9E9E9;
				border-radius: 10px;
			}
            
            div.short-text
        {
        white-space:nowrap; 
        width:13em; 
        overflow:hidden; 
        }
            
		</style>
<script src= "js/angular.min.js"></script>
    <script src="booking.js."></script>
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
	<body ng-app="mybookingPage">
		<!-- START #wrapper -->
		<div id="wrapper" ng-controller="guides_booking" >
			<!-- START header -->
			<?php include_once('MasterTopHeader.php'); ?>
			<!-- END header -->
			<!-- END #page-header -->
			
			<!-- START .main-contents -->
			<div class="main-contents">
				<div class="container">
					<div class="row">
					
						<!-- START #page -->
						<div id="page" class="col-md-8" >
						<!-- START #contactForm -->
							<section id="booking-form">
								<h2 class="ft-heading text-upper">Provide Your Booking Information</h2>
<!--								<form action="booking-form-code.php" method="post">-->
									<fieldset>
										<ul class="formFields list-unstyled">
											<li class="row">
												<div class="col-md-12" >
													<label>Name <span class="required small">(Required)</span></label>
													<input type="text" class="form-control" name="name" value="" />
                                                   
                                                  
                                                </div>
                                            </li>
                                            <li class="row">
												<div class="col-md-6">
													<label>Email <span class="required small">(Required)</span></label>
													<input type="text" class="form-control" name="email" value="" />
												</div>
                                                <div class="col-md-6">
													<label>Contact Number <span class="required small">(Required)</span></label>
													<input type="text" class="form-control" name="email" value="" />
												</div>
											</li>
                                            
                                            <li class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                    <div class="col-md-6">
                                                        <label>ADULT <span class="required small">(12+ YRS)</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-addon" style="cursor:pointer" onclick="adultMinus();"><i style="font-size:12px" class="fa fa-minus"></i></span>
                                                  <input type="text" id="adult" name="adult" class="form-control" value="1">
                                                    <span class="input-group-addon" style="cursor:pointer" onclick="adultPlus();"><i style="font-size:12px" class="fa fa-plus"></i></span>
                                                </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>CHILD <span class="required small">(0-11 YRS)</span></label>
                                                <div class="input-group">
                                                  <span class="input-group-addon" style="cursor:pointer" onclick="childMinus();"><i style="font-size:12px" class="fa fa-minus"></i></span>
                                                  <input type="text" id="child" name="child" class="form-control" value="0">
                                                  <span class="input-group-addon" style="cursor:pointer" onclick="childPlus();"><i style="font-size:12px" class="fa fa-plus"></i></span>
                                                </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                
                                            </li>
                                            <li class="row">
                                            <div class="col-md-6">
                                                <label>Date of Tour <span class="required small">(Required)</span></label>
													<input type="date" class="form-control" name="zipcode" value="" />
                                                </div>
                                            
                                            
												<div class="col-md-6" ng-controller="Singleguide" ng-show="{{guideValue}}">
													<label>Tour Duratios [In Days] <span class="required small">(Required)</span></label>
                                                    <div class="input-group">
                                                      <span class="input-group-addon" style="cursor:pointer" onclick="tourDurationMinus();"><i style="font-size:12px" class="fa fa-minus"></i></span>
                                                      <input type="text" id="tourDuration" name="tourDuration" class="form-control" value="1">
                                                      <span class="input-group-addon">Days</span>
                                                    <span class="input-group-addon" style="cursor:pointer" onclick="tourDurationPlus();"><i style="font-size:12px" class="fa fa-plus"></i></span>
                                                    </div>
												</div>
											
                                          <div class="col-md-6" ng-controller="Singletour" ng-show="{{tourValue}}">
													<label>Tour Duratios [In Days] <span class="required small">(Required)</span></label>
                                                    <div class="input-group">
                                                      <span class="input-group-addon" onclick="tourDurationMinus();"></span>
                                                      <input type="text" id="tourDuration" name="tourDuration" value="{{tour.tour_duration}}" class="form-control" readonly>
                                                      <span class="input-group-addon">Days</span>
                                                    </div>
												</div>
											</li>
                                            
                                            <li class="row"   >
                                                <div class="col-md-12">
                                            <div class="sidebar-widget" >
                                                    <!-- Sidebar What We Do -->
                                                    <div class="panel-group" id="accordion">
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                <a class="panel-title collapsed" data-toggle="collapse" href="#collapseOne">
                                                                    Hotels &amp; Inn
                                                                </a>
                                                            </div>
                                                            <div id="collapseOne" class="panel-collapse collapse">
                                                                <div class="panel-body">
                                                                    <div class="col-md-12" ng-controller="Singletour">
                                                                        
                <div ng-controller="hotel_booking">                                                        
                      
              <div class="col-md-3"   ng-repeat="lodge in lodging | filter:{ City: tour.tour_location} "> 
				   <a id="addExtraService" style="height:20px" class="btn btn-xs btn-default" data-toggle="tab" onclick="CommingSoon();" >Add</a>
				      <a style="cursor:pointer"  data-toggle="modal" data-target=".cabDetail">
                       <div	class="ft-item"> 
						  <span class="ft-image">
							 <img style="" src="{{lodge.Media.Image[0]}}" alt="Top Destination" /> 
						  </span>
					  
								<div class="ft-data" style="font-size:11px;">
							  <span style="color:black;"  class="fa fa-book text-upper">{{lodge.Address}}</span> &nbsp;&nbsp;&nbsp;&nbsp;
							  <!-- <span style="color:black;" class="fa fa-book text-upper" >&nbsp;&nbsp;{{x.Speciality}}</span>&nbsp;&nbsp;&nbsp;&nbsp;
							  <span style="color:black;" class="fa fa-plane text-upper" >&nbsp;&nbsp;{{x.LanguageKnown}}</span> -->
								</div> 
					
							<div class="ft-foot" style="word-wrap:break-word; ">
							<h4 class="ft-title text-upper" style="color:#686868">{{lodge.City}}</h4> 
							<span class="ft-offer text-upper">{{lodge.PricePerNight}}/Night</span> 
							</div>
					</div>
					</a>
					 </div>
					     
					 </div>
                        </div>
                        </div>
                </div>
            </div><br>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a class="panel-title collapsed" data-toggle="collapse" href="#collapseTwo">
                        Car Service
                    </a>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="panel-body">
                        <div class="col-md-12" ng-controller="Singletour">
                                                                        
                                                                        
                        <div ng-controller="transport_booking">                                                 
            <div class="col-md-3"  ng-repeat="trans in transport | filter:{ City: tour.tour_location}"> 
				   <a id="addExtraService" style="height:20px" class="btn btn-xs btn-default" data-toggle="tab" onclick="CommingSoon();" >Add</a>
				      <a style="cursor:pointer"  data-toggle="modal" data-target=".cabDetail">
                       <div	class="ft-item"> 
						  <span class="ft-image">
							 <img style="" src="{{trans.Media.Image[0]}}" alt="Top Destination" /> 
						  </span>
					  
								<div class="ft-data" style="font-size:11px;">
							  <span style="color:black;" class="fa fa-book text-upper">&nbsp;&nbsp;{{trans.Category}}&nbsp;&nbsp;</span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							  <!-- <span style="color:black;" class="fa fa-book text-upper" >&nbsp;&nbsp;{{x.Speciality}}</span>&nbsp;&nbsp;&nbsp;&nbsp;
							  <span style="color:black;" class="fa fa-plane text-upper" >&nbsp;&nbsp;{{x.LanguageKnown}}</span> -->
								</div> 
					
							<div class="ft-foot" style="word-wrap:break-word; ">
							<h4 class="ft-title text-upper" style="color:#686868">{{trans.City}}</h4> 
							<span class="ft-offer text-upper">{{trans.PriceForDay}}Per Day</span> 
							</div>
					</div>
					</a>
					 </div>
                            </div>
                   
                    
                   
                    
                   
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                    </div>
                                            </li>
											<li class="row">
												<div class="col-md-12">
													<input type="submit" class="btn btn-primary btn-lg text-upper" onclick="CommingSoon();" name="booknow" value="Book Now" />
													<span class="required small">*Your email will never published.</span>
												</div>
											</li>
											
										</ul>
									</fieldset>
<!--								</form>-->
							</section>
							<!-- END #contactForm -->
						</div>
						<!-- END #page -->
						<br>
						<!-- START #sidebar -->
						<aside id="sidebar" class="col-md-4">
							<div class="sidebar-widget">
								<!-- Sidebar recent popular posts -->
								<!-- START TABS -->
								
								<ul class="nav nav-tabs text-upper" style="background-color:#ff845e;">
									
                                    <li class="active" ng-controller="Singletour" ng-show="{{tourValue}}"><a href="#popular-posts" data-toggle="tab">Requested Tour Detail</a></li>
										<li ng-controller="Singleguide" class="active" ng-show="{{guideValue}}"><a href="#popular-posts" data-toggle="tab">Requested Guide Detail</a></li>
									
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content gray box-shadow1 clearfix marb30">
									<!-- START TAB 1 -->
									<div class="tab-pane active" id="popular-posts" ng-controller="Singletour" >
										
                                        <div ng-show="{{tourValue}}">
                                            
										<div class="tour-plans" style="padding:10px 10px 10px 10px;" data-model="tour.tour_location">
								<div class="plan-image">
						

								<img class="img-responsive" alt="featured Scroller" draggable="false" src="{{tour.photo == null ? 'img/custom11.jpg' : tour.photo}}"/>
								
							
									<!--<img class="img-responsive" src="img/custom2.jpg" alt="TajMahal" />-->
									<div class="offer-box">
										<div class="offer-top">
											<!--<span class="ft-temp alignright">19&#730;c</span>-->
											<span class="featured-cr text-upper" style="font-size:15px">{{tour.tour_location}}</span>
											<div class="short-text featured-cy text-upper" style="font-size:15px; text-overflow:ellipsis;" title="{{tour.tour_title}}">{{tour.tour_title}}</div>
										</div>
										
										<div class="offer-bottom">
											<span class="featured-spe" style="font-size:15px">Rs. {{tour.tour_price}} /-</span>
										</div>
									</div>
								</div>
								
								<div class="featured-btm box-shadow1">
									<a class="ft-hotel text-upper" href="#">{{tour.tour_duration}} Day Tour</a>
									<a class="ft-plane text-upper" href="#">{{tour.tour_category}}</a>
									<a class="ft-tea text-upper" href="#">{{tour.inclusive}}</a>
								</div>
								
							</div>
							<div style="text-align:justify; padding:10px 10px 10px 10px;">
							
							<div class="row">
							<div class="col-md-5">
							Exclusive :
							</div>
							<div class="col-md-7">
							{{tour.exclusive}}
							</div>
							</div>
							
							<div class="row">
							<div class="col-md-5">
							Cancelation Policy :
							</div>
							<div class="col-md-7">
							{{tour.cancelation_policy}}
							</div>
							</div>
							
							<br><br><br>
							</div>
							</div>
									
                                        
										<div style="text-align:justify; padding:10px 10px 10px 10px;" ng-controller="Singleguide">
                                          
										<div ng-show="{{guideValue}}">
										<div class="col-md-4 col-sm-4 plan-image">
									
									
												<img class="hover img-responsive"  src="{{ guide.photo == null ? 'img/userDefaultIcon.png' : guide.photo}}"/>
											
											
								
										
										</div>
										<div class="col-md-8 col-sm-8">
										<div class="row">
										<div class="col-md-3 col-sm-4 col-xs-4">Name:</div>
										<div class="col-md-8 col-sm-8 col-xs-8 alignright">{{guide.name}} </div>
										</div>
										<div class="row">
										<div class="col-md-4 col-sm-4 col-xs-4">Territory:</div>
										<div class="col-md-8 col-sm-8 col-xs-8 alignright" ng-repeat="z in guide.guide_territory">{{z}}, </div>
										</div>
										
										</div>
										</div>
										<div class="row">
										</div>
                                            <br><br><br>
										</div>
										
									
										
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
						</aside>
						<!-- END #sidebar -->
					</div>
					<!-- END .row -->
				</div>
			</div>
			<!-- END .main-contents -->
			
			<!-- START footer -->
			<?php include('MasterTopFooter.php'); ?>
			<!-- END footer -->
		</div>
		<!-- END #wrapper -->

        
<div id="cabDetail" class="modal fade cabDetail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridModalLabel">Cab Detail</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          We will be right back here soon...
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
        </div>
        
        <div id="hotelDetail" class="modal fade hotelDetail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridModalLabel">Hotel Detail</h4>
      </div>
      <div class="modal-body">
        <div class="row">
          We will be right back here soon...
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
        </div>
		
				<!-- javascripts -->
		<script type="text/javascript" src="js/modernizr.custom.17475.js"></script>

		<script type="text/javascript" src="js/jquery.min.js"></script>
		<script type="text/javascript" src="bs3/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/check-radio-box.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript" src="js/styleswitcher.js"></script>
		
        <script>
            function CommingSoon()
            {
                alert("This feature will be available soon......");
            }
            
            
        function adultMinus()
            {
                var oldValue = document.getElementById("adult").value;
                if(oldValue>1)
                    {
                var newValue = parseInt(oldValue) - 1;
                document.getElementById("adult").value = newValue;
                    }
            }
            function adultPlus()
            {
                var oldValue = document.getElementById("adult").value;
                var newValue = parseInt(oldValue) + 1;
                document.getElementById("adult").value = newValue;
            }
            function childMinus()
            {
                var oldValue = document.getElementById("child").value;
                if(oldValue>0)
                    {
                var newValue = parseInt(oldValue) - 1;
                document.getElementById("child").value = newValue;
                    }
            }
            function childPlus()
            {
                var oldValue = document.getElementById("child").value;
                var newValue = parseInt(oldValue) + 1;
                document.getElementById("child").value = newValue;
            }
            function tourDurationMinus()
            {
                var oldValue = document.getElementById("tourDuration").value;
                if(oldValue>1)
                    {
                var newValue = parseInt(oldValue) - 1;
                document.getElementById("tourDuration").value = newValue;
                    }
            }
            function tourDurationPlus()
            {
                var oldValue = document.getElementById("tourDuration").value;
                var newValue = parseInt(oldValue) + 1;
                document.getElementById("tourDuration").value = newValue;
            }
        </script>
		
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