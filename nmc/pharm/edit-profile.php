<?php
session_start();
//error_reporting(0);
include('include/config.php');
?>
<?php
if(!$_SESSION["username"] && !$_SESSION["userid"]){
	header("Location:../index.php");
}
else{
	
	
?>
<?php
if(isset($_POST['submit']))
{
	$username=$_POST['username'];
$sql=mysqli_query($con,"Update users set username='$username' where userid='".$_SESSION['userid']."'");
if($sql)
{
$msg="Your Profile updated Successfully";
}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Pharmacist | Edit Profile</title>
		
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		<script type="text/javascript">
function ValidateForm(){
	var username=document.forms["edit"]["username"].value;
	var email=document.forms['edit']['email'].value;
 var chk_txt = /^[a-z0-9]+$/;
	if( username==""){
	alert("Please enter your username!");
	document.edit.username.focus();
	return false;
	}
	if((username.search(chk_txt)==-1)){
		alert("Please enter small alphabet and digit characters!");
		document.edit.username.focus();
		return  false;
	}
	if (email=="") {
		alert("Please enter your email!");
		document.edit.email.focus();
		return false;
	}
	
}
</script>
 <script type="text/javascript">
 	function emailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "validation/check_email_edit.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#email-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
//Username
function usernameAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "validation/check_users_edit.php",
data:'username='+$("#username").val(),
type: "POST",
success:function(data){
$("#username-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
 </script>
	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
				
						<?php include('include/header.php');?>
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Pharmacist | Edit Profile</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Pharmacist </span>
									</li>
									<li class="active">
										<span>Edit Profile</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
<h5 style="color: green; font-size:18px; ">
<?php if($msg) { echo htmlentities($msg);}?> </h5>
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Edit Profile</h5>
												</div>
												<div class="panel-body">
									<?php 
$sql=mysqli_query($con,"select * from users where userid='".$_SESSION['userid']."'");
while($data=mysqli_fetch_array($sql))
{
?>
<h4><?php echo htmlentities($data['username']);?>'s Profile</h4>
<p><b>Profile Reg. Date: </b><?php echo htmlentities($data['regDate']);?></p>
<?php if($data['updationDate']){?>
<p><b>Profile Last Updation Date: </b><?php echo htmlentities($data['updationDate']);?></p>
<?php } ?>
<?php
echo '<center><img src="../profile/'.$data['images'].'" alt="user-profile" style="width:200px; height:200px; border-radius:120px;"></center>';  ?>
<hr />													<form role="form" name="edit" onsubmit="return ValidateForm()" method="post">
													

<div class="col-md-6">
															<label for="fname">
																 Username
															</label>
	<input type="text" name="username" id="username" onBlur="usernameAvailability()" class="form-control" value="<?php echo htmlentities($data['username']);?>" >
	<span id="username-availability-status1" style="font-size:15px;"></span>

														</div>
<div class="col-md-6">
									<label for="fess">
																  Email Address
															</label>
					<input type="email" name="email" id="email" class="form-control" onBlur="emailAvailability()"  value="<?php echo htmlentities($data['email']);?>">
					<span id="email-availability-status1" style="font-size:15px;"></span>
														</div><br/><br/><br/><br/><br/>
														<div class="form-group"><center>
			<button type="submit" name="submit" class="btn btn-success btn-sm ">Update</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
			<button type="reset" name="clear" class="btn btn-red btn-sm">Clear</button></center>
													</form>
													<?php } ?>
												</div>
											</div>
										</div>
											
											</div>
										</div>
									</div>
								</div>
						
						<!-- end: BASIC EXAMPLE -->
			
					
					
						
						
					
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
			<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>
<?php } ?>