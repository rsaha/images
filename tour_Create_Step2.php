<?php
	session_start();
	
	if(isset($_SESSION['userId']))
	{
		if(isset($_GET['id1']) && isset($_GET['id2']))
		{
		$userid = $_GET['id1'];
		$tour_id = $_GET['id2'];
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
				$experiance = $row22["guide_experience"];
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
				$experiance = "";
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
		
		

		<script type="text/javascript" src="js/angular.min.js"></script>
		<script type="text/javascript" src="js/AngularControler.js"></script>
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
					<a href="guide_login.php" style="color:#5a5a5a;" title="">
					<center><u><span style="font-size:18px;font-weight:bold;"><?php echo strtoupper($username) ?></span></u></center>
					</a> 
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
									<li class="active"><a href="#createTour" data-toggle="tab">Please Fill the day wise details of the tour</a></li>
								</ul>
								<!-- END TABS -->
								
								<!-- START TAB CONTENT -->
								<div class="tab-content clearfix ">
									
									<!-- START TAB 1 -->
									<div class="tab-pane active" id="createTour">
										<div class="booking gray clearfix box-shadow1">
											
											<form method="post" action="tour_Create_Step2_code.php">
											<input type="hidden" name="userid" value="<?php echo $userid ?>" />
											<input type="hidden" name="tour_id" value="<?php echo $tour_id ?>" />
											
											<?php
											
											$select3 = mysql_query("SELECT * FROM `tbl_tours` WHERE `tour_id` = $tour_id");
											$row33 = mysql_fetch_assoc($select3);
											$tour_duration=$row33["tour_duration"];
											
											for($f=0 ; $f < $tour_duration ; $f++)
											{
											?>
											<input type="hidden" name="tour_duration" value="<?php echo $tour_duration ?>" />
											
											
											<div class="row">
											<h1>Day <?php echo ($f+1); ?></h1>
											<div class="col-sm-12">
											<div class="form-group" style="overflow: auto">
											<table ID="tblPets<?php echo ($f+1); ?>" class="tbl-responsive" style="width:100%">
											<tr id="tblPets<?php echo ($f+1); ?>_TR1">
											<td><h2>Visit : 1</h2><br></td>
											<td align="right"><input type="Button" class="btn btn-success btn-sm" id="tblPets<?php echo ($f+1); ?>_input1" NAME="tblPets<?php echo ($f+1); ?>_input1" onClick="addRow('tblPets<?php echo ($f+1); ?>')" value="Add New Visit"></td>
											</tr>
											<tr id="tblPets<?php echo ($f+1); ?>_TR2">
												<th style="width:15%">Hours Schedule</th>
												<td>
												<input class="form-control" style="background-color:white" required TYPE="text" id="tblPets<?php echo ($f+1); ?>_input2" NAME="tblPets<?php echo ($f+1); ?>_input2"  >
												</td>
											</tr>
											<tr id="tblPets<?php echo ($f+1); ?>_TR3">
												<th style="width:15%">Description</th>
												<td>
												<input class="form-control" style="background-color:white" required TYPE="text" id="tblPets<?php echo ($f+1); ?>_input3" NAME="tblPets<?php echo ($f+1); ?>_input3"  >
												</td>
											</tr>
											<tr id="tblPets<?php echo ($f+1); ?>_TR4">
												<th style="width:15%">Transport</th>
												<td>
												<input class="form-control" style="background-color:white" required TYPE="text" id="tblPets<?php echo ($f+1); ?>_input4" NAME="tblPets<?php echo ($f+1); ?>_input4"  >
												</td>
											</tr>
											<tr id="tblPets<?php echo ($f+1); ?>_TR5">
												<th style="width:15%">Tourist Place</th>
												<td>
												<input class="form-control" style="background-color:white" required TYPE="text" id="tblPets<?php echo ($f+1); ?>_input5" NAME="tblPets<?php echo ($f+1); ?>_input5"  ><br>
												</td>
											</tr>
											</table>
											</div>
											</div>
											</div>
											
											
											
											
											<?php
											}
											
											?>
											
											<div class="col-sm-12">
												<div class="col-sm-6 col-sm-offset-3">
													<input type="submit" tabindex="13" class="form-control btn btn-warning" value="Create Tour"  name="tourNmae" />
												</div>
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
				$_SESSION['notification']="";
				unset($_SESSION['notification']);
			}
			
			?>
		</div>
		<!-- END #wrapper -->
		 
		 
		 <script>
var count = "1";
var visit = "2";

  function addRow(in_tbl_name)
  {
	  
	  var rowCount = document.getElementById(in_tbl_name).rows.length;
	  trid=rowCount+1;
	  var no=(parseInt(rowCount)/5)+1;
	  
  //var count = document.getElementById(in_tbl_name).rows.length;
    var tbody = document.getElementById(in_tbl_name).getElementsByTagName("TBODY")[0];
    // create row
    var row1 = document.createElement("TR");
	row1.setAttribute('id',in_tbl_name+'_TR'+trid+'');
	
	var row2 = document.createElement("TR");
	row2.setAttribute('id',in_tbl_name+'_TR'+(parseInt(trid) + 1)+'');
	
	var row3 = document.createElement("TR");
	row3.setAttribute('id',in_tbl_name+'_TR'+(parseInt(trid) + 2)+'');
	
	var row4 = document.createElement("TR");
	row4.setAttribute('id',in_tbl_name+'_TR'+(parseInt(trid) + 3)+'');
	
	var row5 = document.createElement("TR");
	row5.setAttribute('id',in_tbl_name+'_TR'+(parseInt(trid) + 4)+'');
	
    
	var td11 = document.createElement("TD")
    var strHtml11 = "<h2>Visit : "+ no +"</h2><br>";
	td11.setAttribute('style','width:15%');
    td11.innerHTML = strHtml11.replace(/!count!/g,count);
	
	var abc="hello";
	var td12 = document.createElement("TD")
	var strHtml12 = "<INPUT class='btn btn-danger btn-sm' id= '"+in_tbl_name+"_input"+trid+"' NAME='"+in_tbl_name+"_input"+trid+"'  TYPE='Button' CLASS='Button' onClick='delRow(\""+in_tbl_name+"\","+trid+")' VALUE='Delete Visit'>";
	td12.setAttribute('align','right');
	td12.innerHTML = strHtml12.replace(/!count!/g,count);
    
	row1.appendChild(td11);
	row1.appendChild(td12);
	tbody.appendChild(row1);
	count = parseInt(count) + 1;
	
	//=================================================================
	
	var td21 = document.createElement("TD")
    var strHtml21 = "<b>Hours Schedule</b>";
	td21.setAttribute('style','width:15%');
    td21.innerHTML = strHtml21.replace(/!count!/g,count);
	
	
	var td22 = document.createElement("TD")
	var strHtml22 = "<input class=\"form-control\" style=\"background-color:white\" required TYPE=\"text\" id= \""+in_tbl_name+"_input"+(parseInt(trid) + 1)+"\" NAME=\""+in_tbl_name+"_input"+(parseInt(trid) + 1)+"\"  >";
	td22.innerHTML = strHtml22.replace(/!count!/g,count);
    
	row2.appendChild(td21);
	row2.appendChild(td22);
	tbody.appendChild(row2);
	count = parseInt(count) + 1;
	
	//=================================================================
	
	var td31 = document.createElement("TD")
    var strHtml31 = "<b>Description</b>";
	td31.setAttribute('style','width:15%');
    td31.innerHTML = strHtml31.replace(/!count!/g,count);
	
	
	var td32 = document.createElement("TD")
	var strHtml32 = "<input class=\"form-control\" style=\"background-color:white\" required TYPE=\"text\" id= \""+in_tbl_name+"_input"+(parseInt(trid) + 2)+"\" NAME=\""+in_tbl_name+"_input"+(parseInt(trid) + 2)+"\"  >";
	td32.innerHTML = strHtml32.replace(/!count!/g,count);
    
	row3.appendChild(td31);
	row3.appendChild(td32);
	tbody.appendChild(row3);
	count = parseInt(count) + 1;
	
	//=================================================================
	
	var td41 = document.createElement("TD")
    var strHtml41 = "<b>Transport</b>";
	td41.setAttribute('style','width:15%');
    td41.innerHTML = strHtml41.replace(/!count!/g,count);
	
	
	var td42 = document.createElement("TD")
	var strHtml42 = "<input class=\"form-control\" style=\"background-color:white\" required TYPE=\"text\" id= \""+in_tbl_name+"_input"+(parseInt(trid) + 3)+"\" NAME=\""+in_tbl_name+"_input"+(parseInt(trid) + 3)+"\"  >";
	td42.innerHTML = strHtml42.replace(/!count!/g,count);
    
	row4.appendChild(td41);
	row4.appendChild(td42);
	tbody.appendChild(row4);
	count = parseInt(count) + 1;
	
	//=================================================================
	
	var td51 = document.createElement("TD")
    var strHtml51 = "<b>Tourist Place</b>";
	td51.setAttribute('style','width:15%');
    td51.innerHTML = strHtml51.replace(/!count!/g,count);
	
	
	var td52 = document.createElement("TD")
	var strHtml52 = "<input class=\"form-control\" style=\"background-color:white\" required TYPE=\"text\" id= \""+in_tbl_name+"_input"+(parseInt(trid) + 4)+"\" NAME=\""+in_tbl_name+"_input"+(parseInt(trid) + 4)+"\"  ><br>";
	td52.innerHTML = strHtml52.replace(/!count!/g,count);
    
	row5.appendChild(td51);
	row5.appendChild(td52);
	tbody.appendChild(row5);
	count = parseInt(count) + 1;
	
	visit = parseInt(visit) + 1;
  }
  
  function delRow(in_tbl_name,id)
  {
    for(i = id; i <= (parseInt(id)+4); i++)
	{
		var row = document.getElementById(in_tbl_name + '_TR' + i);
    var table = row.parentNode;
    while ( table && table.tagName != 'TABLE' )
        table = table.parentNode;
    if ( !table )
        return;
    table.deleteRow(row.rowIndex);
	}
  }
  
  </script>
  
			<script type="text/javascript" src="js/jquery.min.js"></script>
			<script>
			$(function () {
			  $('[data-toggle="popover"]').popover();
			});
			
				function myFunction(id) 
				{
					window.location.href = "guide_profile.php?id="+id;
					return false;
				}
				
				
				function addTour(id,id2) 
				{
					window.location.href = "add_Existing_Tour.php?id1="+id+"&id2="+id2+"";
					return false;
				}
				
				function detailTour(id) 
				{
					window.location.href = "tour_detail_sidebar.php?id="+id+"";
					return false;
				}
			</script>

			<script src="http://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places" type="text/javascript"></script>
			<script type="text/javascript">
			function initialize() {

			 var options = {
			  types: ['(cities)'],
			  componentRestrictions: {country: "in"}
			 };

			 var input = document.getElementById('tourLocation');
			 var autocomplete = new google.maps.places.Autocomplete(input, options);
			}
			google.maps.event.addDomListener(window, 'load', initialize);
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