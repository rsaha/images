<?php
session_start();
if((isset($_SESSION['userId'])) && ($_SESSION['phase'] == "reg"))
{
	if(isset($_GET['id']))
	{
	$userid = $_GET['id'];
	}
	if($_SESSION['userId']!=$userid)
	{
		include("signOut.php");
		header('Location:guide_registration_1.php');
		exit;
	}
	else
	{
	include('db.php');
	$select = mysql_query("SELECT * FROM `tbl_user_profile` WHERE `user_id` = $userid");
	$firstName=mysql_result($select, 0, 3);
	$secondName=mysql_result($select, 0, 4);
	$username =  $firstName . " " . $secondName;
	$emailID = mysql_result($select, 0, 5);
	$mobileNumber = mysql_result($select, 0, 6); 
	}
}
else
{
	include("signOut.php");
	header('Location:guide_registration_1.php');
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
		<!-- Load Fonts via Google Fonts API -->
		<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Karla:400,700,400italic,700italic" />
		<!-- color scheme -->
		<link rel="stylesheet" type="text/css" href="css/colors/color1.css" title="color1" />
		
		<style type="text/css" >
		
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
		left:55px;
		visibility:hidden;
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
			<div>
					<?php 
							
							$select4pic = mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
							$count4pic = mysql_num_rows($select4pic);
							if ($count4pic==0)
							{
								echo '<img style="width:1400px; height:200px;" class="hover img-responsive" src="img/Default.jpg"/>';
							}
							else
							{
								$picVal = mysql_result($select4pic, 0, 2);
								if($picVal==null)
								{
									echo '<img style="width:1400px; height:200px;" class="hover img-responsive" src="img/Default.jpg"/>';
								}
								else
								{
									echo '<img style="width:1400px; height:200px;" class="hover img-responsive" src="showCover.php?id=' . $userid . '"/>';
								}
							}
							?><br><br />
					</div>
					
		
			<!-- END #page-header -->
			
			<!-- START .main-contents -->
			<div class="main-contents">
				<div class="container">
					<div class="row">
					<div id="page" class="col-md-2">
					<center>
					<div class="row">
<?php 
						$select4pic = mysql_query("SELECT * FROM `tbl_guide_detail_profile` WHERE `user_id` = $userid");
						$count4pic = mysql_num_rows($select4pic);
						if ($count4pic==0)
						{
							echo '<img style="max-height:200px; max-width:170px;" class="hover img-responsive" src="img/userDefaultIcon.png"/>';
						}
						else
						{
							$picVal = mysql_result($select4pic, 0, 2);
							if($picVal==null)
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
					<label style="font-size:14px;">Name :</label><br><br />
					<span style="font-size:18px;font-weight:bold;"><?php echo $username ?></span><br />
					<hr>
					<label style="font-size:14px;">Mobile :</label><br><br />
					<span style="font-size:18px;font-weight:bold;"><?php echo $mobileNumber ?></span><br />
					<hr>
					<label style="font-size:14px;">Email :</label><br><br />
					<span style="font-size:14px;font-weight:bold;"><?php echo $emailID ?></span><br /><br />
					
					</div>
					
					</div>
					
					</div>
						<!-- START #page -->
						<div id="page" class="col-md-10">
							<div class="user-profile">
								<!-- Sidebar recent popular posts -->
								<!-- START TABS -->
								<ul class="nav nav-tabs text-upper" style="background-color:#ff845e">
									<li class="active"><a data-toggle="tab">Registration Step 4</a></li>
									<li style="color:black; font-size:35px">&nbsp;&nbsp;&nbsp;Welcome <?php echo $firstName ?></li>
								</ul>
								<!-- END TABS --><br>
								
								<div class="">
								<!-- START TAB CONTENT -->
								<div class="tab-content clearfix marb30">
									<!-- START TAB 1 -->
									<div class="tab-pane active mart20" id="inviteGuide">
									<center><h3>Invite 3 Guide Friends and get some exciting referal rewards when your friend register with us...</h3></center><br />
										<form action="guide_step4.php" method="post">
										<input type="hidden" name="userid" value="<?php echo $userid ?>" />
										
											<div class="col-md-12">
											
											<ul  class="formFields list-unstyled">
											<li class="row">
											<div class="col-md-4">
															<label style="font-size:13px; font-weight:bold">Name of your 1st friend</label>
															<input type="text" class="form-control" name="nameFriend1" value=""  pattern="[a-z A-Z]+" />
														</div>
														<div class="col-md-4">
															<label style="font-size:13px; font-weight:bold">Email Id of your 1st friend</label>
															<input type="email" class="form-control" name="emailFriend1" value=""  pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,5}(\.[a-zA-Z]{2,5}){0,1}"/>
														</div>
														<div class="col-md-4">
															<label style="font-size:13px; font-weight:bold">Mobile Number of your 1st friend</label>
															<input type="tel" class="form-control" name="mobileFeiend1" maxlength="10" pattern="([7-9]{1})(\d{9})" value=""/>
														</div>
														
													</li>
													<hr>
													<li class="row">
														<div class="col-md-4">
															<label style="font-size:13px; font-weight:bold">Name of your 2nd friend</label>
															<input type="text" class="form-control" name="nameFriend2" value=""  pattern="[a-z A-Z]+" />
														</div>
														<div class="col-md-4">
															<label style="font-size:13px; font-weight:bold">Email Id of your 2nd friend</label>
															<input type="email" class="form-control" name="emailFriend2" value=""  pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,5}(\.[a-zA-Z]{2,5}){0,1}"/>
														</div>
														<div class="col-md-4">
															<label style="font-size:13px; font-weight:bold">Mobile Number of your 2nd friend</label>
															<input type="tel" class="form-control" name="mobileFeiend2" maxlength="10" pattern="([7-9]{1})(\d{9})" value="" />
														</div>
														
													</li>
													<hr>
													<li class="row">
														<div class="col-md-4">
															<label style="font-size:13px; font-weight:bold">Name of your 3rd friend</label>
															<input type="text" class="form-control" name="nameFriend3" value=""  pattern="[a-z A-Z]+"/>
														</div>
														<div class="col-md-4">
															<label style="font-size:13px; font-weight:bold">Email Id of your 3rd friend</label>
															<input type="email" class="form-control" name="emailFriend3" value="" pattern="[a-zA-Z0-9._-]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,5}(\.[a-zA-Z]{2,5}){0,1}"/>
														</div>
														<div class="col-md-4">
															<label style="font-size:13px; font-weight:bold">Mobile Number of your 3rd friend</label>
															<input type="tel" class="form-control" name="mobileFeiend3" value="" maxlength="10" pattern="([7-9]{1})(\d{9})" value="" />
														</div>
														
													</li>
													<li class="row">
													<div class="col-md-4 pull-right" >
														<button type="submit" class="btn btn-warning form-control">Send Invitation</button>
													</div>
													<div class="col-md-4 pull-right" >
														<?php
														echo '<input type="button" class="btn btn-default form-control" onclick="myFunction(' . $userid. ')" value="Skip">'
														?>
													</div>
													</li>
													</ul>
											</div>
													
									</form>
									</div>
									<!-- END TAB 1 -->
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
		</div>
		<!-- END #wrapper -->
		
		<script type="text/javascript" >
 $(function() {
			$( "#LicenceValidtyDatepicker" ).datepicker();
		  });
		  </script>
		  <script>
		function myFunction(id) {
		window.location.href = "guide_profile.php?id="+id;
		return false;
		}
		</script>
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