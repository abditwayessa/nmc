<?php
session_start();
error_reporting(0);
include('include/config.php');
?>
<?php 
if(isset($_POST['submit']))
{	
$userid=$_GET['viewid'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
$priv=6;
$regDate=date('y-m-d h:i:sa');
$status=1;
$checkCard=mysqli_query($con, "SELECT * FROM tblpatient WHERE cardNo='$userid'");
$cno=mysqli_num_rows($checkCard);
if ($cno==1){
	$chkun=mysqli_query($con, "SELECT * from users where username='$username'");
	$num=mysqli_num_rows($chkun);
	if($num<1){
		$chkem=mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
		$num2=mysqli_num_rows($chkem);
			if($num2<1){
				$sql=mysqli_query($con,"insert into users(userid,username,email,password,regDate,priv,status) values('$userid','$username','$email','$password','$regDate','$priv','$status')");
				echo '<script type="text/javascript">alert("Your account created Successfully!");</script>';
			}else{
			echo '<script type="text/javascript">alert("Email already exist!");</script>';
			}

	} else {
echo "<script>alert('Users already exist!');</script>";
	}
} else{
echo "<script>alert('Your card number is not exist!');</script>";
}} ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Create New Account</title>
		
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

		<link href="../css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="../css/responsiveslides.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#patemail").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
	</head>
	<body>
<!--start-header-->
			<div class="header">
				<div class="wrap">
				<!--start-logo-->
				<div class="logo">
					<a href="../index.html" style="font-size: 30px;">National Medium Clinic</a>
				</div>
				<!--end-logo-->
				<!--start-top-nav-->
				<div class="top-nav">
					<ul>
						<li><a href="../index.html">Home</a></li>
						<li><a href="index.php">Login</a></li>
						<li class="active"><a href="new-user.php">Signup</a></li>
						<li><a href="contact.php">contact</a></li>
						<li><a href="##">About us</a></li>
					</ul>					
				</div>
				<div class="clear"> </div>
				<!--end-top-nav-->
			</div>
		</div>
<div class="main-content" >
<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-8">
<h1 class="mainTitle" align="center">User authentication Form <?php echo $_GET['viewid']; ?></h1>
</div>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<div class="row margin-top-30">
<div class="col-lg-8 col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
</div>
<div class="panel-body" >
	<h5>Please fill the following form accordingly. It is used to authenticate the users.</h5><br>
		<form role="form" name="" method="post" action="new-user-auth.php">
<div class="form-group">
<label for="doctorname">
What is your name?
</label>
<span class="input-icon">
	<input type="text" name="patfname" class="form-control"  placeholder="What is your name?" required="true"><i class="fa fa-credit-card"></i>
</span>
</div>
<div class="form-group">
<label for="doctorname">
What is your fathers name?
</label>
<span class="input-icon">
<input type="text" name="patlname" class="form-control"  placeholder="What is your fathers name?" required="true">
<li class="fa fa-envelope"></i>
</span>
</div>
<div class="form-group">
<label for="doctorname">
Write your address
</label>
<span class="input-icon">
<input type="text" name="address" class="form-control"  placeholder="Write your address" required="true">
<li class="fa fa-user"></i>
</span>
</div>
</div>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
	Submit
</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<button type="reset" name="" id="submit" class="btn btn-o btn-primary" >
Clear
</button>
</form>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="col-lg-12 col-md-12">
<div class="panel panel-white">
</div>
</div>
</div>
</div>
</div>
</div>				
</div>
</div>
</div>
			<!-- start: FOOTER -->
<?php include('include/footer.php');?>
			<!-- end: FOOTER -->

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

		<div style="visibility: hidden;">
			<?php require('new-user.php'); ?>
		</div>