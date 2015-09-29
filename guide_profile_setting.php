<?php
	session_start();
	
	if(isset($_SESSION['userId']))
	{
		if(isset($_GET['id']))
		{
		$userid = $_GET['id'];
		}
		if($_SESSION['userId']!=$userid)
		{
			include("signOut.php");
            header('Location:guide_login.php');
			exit;
		}
		else
		{
			
			$_SESSION['photo'] = array();
			$_SESSION['signinCheck']="signin";
			$_SESSION['phase'] = "signin";
				include('db.php');

				$select1 = mysql_query("SELECT * FROM `tbl_user_profile` WHERE `user_id` = $userid");
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

				$select2 = mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
				$row22 = mysql_fetch_assoc($select2);
				if(mysql_num_rows($select2) > 0 )
				{
				$profilePicture = $row22["guide_profile_pic"];
				$coverPicture = $row22["guide_Cover_pic"];
				$nickName = $row22["nick_name"];
				$LicenceImage = $row22["license_Image"];
				$licenceNumber = $row22["license_no"];
				$licenceValidty = $row22["validity"];
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
		}
	}
	else
	{
		include("signOut.php");
        header('Location:guide_login.php');
		exit;
	}
?>
<html lang="en" dir="ltr">

	<!-- START head -->
	<head>
		<!-- Site meta charset -->
		<meta charset="UTF-8">
		
		<!-- title -->
		<title>Guide Profile | Guided Gateway</title>
		
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
		
		<link rel="stylesheet" type="text/css" href="css/quiker1.js" media="all" />
		
		<!-- Load Fonts via Google Fonts API -->
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Karla:400,700,400italic,700italic" />
		<!-- color scheme -->
		<link rel="stylesheet" type="text/css" href="css/colors/color1.css" title="color1" />
		
		

			<style>

			body
			{
			font-family:arial;
			}
			.preview
			{
			width:92%;
			height:92%;
			border:solid 1px #dedede;
			padding:5px;
			}
			#preview
			{
			color:#cc0000;
			font-size:12px
			}
			</style>
		
		<style type="text/css" >
		
		#editButton{
			top: 5px;     
			height: 29px;
			position: absolute;
			right: 20px;
		}
 
		
		.hovera a:hover
		{
		opacity:0.5;
		filter:alpha(opacity=50);
		}
		
		.hovera :hover .text
		{
		visibility:visible;
		color:black;
		}
		
		.hovera .text
		{
		position:relative;
		bottom:100px;
		left:0px;
		visibility:hidden;
		}
		
		
		a.my-tool-tip, a.my-tool-tip:hover, a.my-tool-tip:visited {

    color: black;
}
		
		</style>
		
		
	</head>
	<!-- END head -->

	<!-- START body -->
	<body>
		<!-- START #wrapper -->
		<div id="wrapper">
			
			<?php include('MasterHeaderAfterLogin.php'); ?>
			
			<!-- START #page-header -->
			<div class="" >
			<?php 		
			$count4pic = mysql_num_rows($select2);
			if ($count4pic==0)
			{
				echo '<img style="width:1400px; height:200px;" class="hover img-responsive" src="img/Default.jpg"/>';
			}
			else
			{
				if($coverPicture==null)
				{
					echo '<img style="width:1400px; height:200px;" class="hover img-responsive" src="img/Default.jpg"/>';
				}
				else
				{
					echo '<img style="width:1400px; height:200px;" class="hover img-responsive" src="showCover.php?id=' . $userid . '"/>';
				}
			}
			?><br>
					</div>
					
		<input type="hidden" name="userid" value="<?php echo $userid ?>" />
			<!-- END #page-header -->
			
			<!-- START .main-contents -->
			<div class="main-contents">
				<div class="container">
				<div class="row">
					<div id="page" class="col-md-2 col-sm-12">
					 
					   <center>
					    <div class="row">
						<?php 
						$count4pic = mysql_num_rows($select2);
						if ($count4pic==0)
						{
							echo '<img style="max-height:200px; max-width:170px;" class="hover img-responsive" src="img/userDefaultIcon.png"/>';
						}
						else
						{
							if($profilePicture==null)
							{
								echo '<img style="max-height:200px; max-width:170px;" class="hover img-responsive" src="img/userDefaultIcon.png"/>';
							}
							else
							{
								echo '<img style="max-height:200px; max-width:170px;" class="hover img-responsive" src="showImage.php?id=' . $userid . '"/>';
							}
						}
							
						?>
						</div>
						 </center>
					
					        <br /><br />
					   <div class="row">
					<div class="col-md-11">
					<a href="guide_login.php" style="color:#5a5a5a;" title=""><center><u><span style="font-size:18px;font-weight:bold;"><?php echo strtoupper($username) ?></span></u></center></a>
					<br /><br />
					<label style="font-size:14px;">Licence Number. :</label><br><br />
					<span style="font-size:18px;font-weight:bold;"><?php echo $licenceNumber ?></span><br />
					<hr>
					<label style="font-size:14px;">Licence Expiry Date :</label><br><br />
					<span style="font-size:18px;font-weight:bold;"><?php echo $licenceValidty ?></span><br />
					<hr>
					<label style="font-size:14px;">Licence Image :</label><br><br />
					<?php 
							$count4pic = mysql_num_rows($select2);
							if ($count4pic==0)
							{
								echo '<img style="max-height:127px; max-width:200px;" class="hover img-responsive" src="img/PRcard.jpg"/>';
							}
							else
							{
								if($LicenceImage==null)
								{
									echo '<img style="max-height:127px; max-width:200px;" class="hover img-responsive" src="img/PRcard.jpg"/>';
								}
								else
								{
									echo '<img style="max-height:127px; max-width:200px;" class="hover img-responsive" src="showLicence.php?id=' . $userid . '"/>';
								}
							}
							?>
						<br>
					
					</div>
					
					</div>
					  
					    
			      </div>
						<!-- START #page -->
						<div id="page" class="col-md-10 col-sm-12 col-xs-12">
							<div class="user-profile">
								<!-- START TABS -->
								<ul class="nav nav-tabs text-upper" style="background-color:#FFA98E;">
									<li class="active"><a href="#profileSetting" data-toggle="tab">Guide Profile Setting</a></li>
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content clearfix ">
									<!-- START TAB 1 -->
									<div class="tab-pane active" id="profileSetting">
										<div class="booking gray clearfix box-shadow1">
									<div class="col-md-6"><center><h2>CHange your Password Here</h2></center><br /></div>
										<form action="reset_Password.php" method="post" ng-app="myApp"  ng-controller="resetPswrdvalidateCtrl" name="myForm"  novalidate>
										<input type="hidden" name="userid" value="<?php echo $userid ?>" />
											<div class="col-md-12">
											
											<ul  class="formFields list-unstyled">
											<li class="row">
											<div class="col-md-6">
												<label style="font-size:13px; font-weight:bold">Old Password</label>
												<input type="password" class="form-control" id="oldPassword" ng-model="oldPassword" maxlength="15" name="oldPassword" placeholder="oldPassword" style="background-color:#f7f7f7;" ng-pattern="/^[a-zA-Z_0-9!@#$%^&* ]{6,15}$/" required >
									<span style="color:red" ng-show="myForm.oldPassword.$dirty && myForm.oldPassword.$invalid">
									  <span ng-show="myForm.oldPassword.$error.required">*Password is required.</span>
									  <span ng-show="myForm.oldPassword.$error.pattern">*Invalid Password ...</span>
									  </span>
											</div>
											</li>
											<li class="row">
											<div class="col-md-6">
												<label style="font-size:13px; font-weight:bold">Choose New Password</label>
												<input type="password" class="form-control" id="newPassword" ng-model="newPassword" maxlength="15" name="newPassword" placeholder="newPassword" style="background-color:#f7f7f7;" ng-pattern="/^[a-zA-Z_0-9!@#$%^&* ]{6,15}$/" required >
									<span style="color:red" ng-show="myForm.newPassword.$dirty && myForm.newPassword.$invalid">
									  <span ng-show="myForm.newPassword.$error.required">*Password is required.</span>
									  <span ng-show="myForm.newPassword.$error.pattern">*Invalid Password ...</span>
									  </span>
											</div>
											</li>
											<li class="row">
											<div class="col-md-6">
												<label style="font-size:13px; font-weight:bold">Re-enter new password </label>
												<input type="password" class="form-control" id="conformpassword" ng-model="conformpassword" maxlength="15" name="conformpassword" style="background-color:#f7f7f7;" onKeyUp="validate()" placeholder="Confirm Password" ng-pattern="/^[a-zA-Z_0-9!@#$%^&* ]{6,15}$/" required  >
									<span style="color:red" ng-show="myForm.conformpassword.$dirty && myForm.conformpassword.$invalid">
									  <span ng-show="myForm.conformpassword.$error.required">*password is required.</span>
									  <span ng-show="myForm.conformpassword.$error.pattern">*Invalid password ...</span>
									  </span>
														</div>
														
													</li>
													<li class="row">
													<div class="col-md-3 col-md-offset-3" >
														<button type="submit" id="resetPasswordBtn" name="resetPasswordBtn" class="btn btn-warning form-control" ng-disabled="myForm.oldPassword.$dirty && myForm.oldPassword.$invalid || myForm.newPassword.$dirty && myForm.newPassword.$invalid || myForm.conformpassword.$dirty && myForm.conformpassword.$invalid">Reset Password</button>
													</div>
													</li>
													</ul>
											</div>
									</form>
										</div>
											</div>
									
									

								</div>
								<!-- END TAB CONTENT -->
							</div>
						</div>
						<!-- END #page -->
					</div>
					<!-- END .row -->
				</div>
			</div>
			<!-- END .main-contents -->
			
			<?php include('MasterFooter.php'); ?>
			
			<?php
			
			if(isset($_SESSION['notification']))
			{
				echo '<script> alert("' . $_SESSION['notification'] . '"); </script>';
				
			}
			$_SESSION['notification']="";
				unset($_SESSION['notification']);
			
			?>
		</div>
		<!-- END #wrapper -->
		 
		<!-- javascripts -->
		<script type="text/javascript" src="js/angular.min.js"></script>
		<script type="text/javascript" src="js/AngularControler.js"></script>
		
		<script>

			$(function () {
			  $('[data-toggle="popover"]').popover();
			});
			
				function editProfile(id) 
				{
					window.location.href = "guide_profile_edit.php?id="+id;
					return false;
				}
				
				function createTour(id) 
				{
					window.location.href = "tour_Create.php?id="+id+"";
					return false;
				}
				
				function editTour(id1,id2) 
				{
					window.location.href = "edit_Tour.php?id1="+id1+"&id2="+id2+"";
					return false;
				}
				
				function detailTour(id) 
				{
					window.location.href = "tour_detail_sidebar.php?id="+id+"";
					return false;
				}
		</script>
		
		<script type="text/javascript">
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