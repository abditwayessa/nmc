<?php
session_start();
error_reporting(0);
include("include/config.php");
include("../include/web.php");
//Checking Details for reset password
if(isset($_POST['submit'])){
$username=$_POST['username'];
$email=$_POST['email'];
$query=mysqli_query($con,"select userid from  users where username='$username' and email='$email'");
$row=mysqli_num_rows($query);
if($row>0){
$_SESSION['username']=$username;
$_SESSION['email']=$email;
header('location:reset-password.php');
} else {
echo "<script>alert('Invalid details. Please try with valid details');</script>";
echo "<script>window.location.href ='forgot-password.php'</script>";


}

}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title> Password Recovery</title>

		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		<!--  -->
		<link href="../css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="../css/responsiveslides.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="../js/responsiveslides.min.js"></script>
	</head>
	<body class="login">
		<div class="header">
				<div class="wrap">
				<!--start-logo-->
				<div class="logo">
					<a href="index.html" style="font-size: 30px;"><?php echo $titles; ?></a>
				</div>
				<!--end-logo-->
				<!--start-top-nav-->
				<div class="top-nav">
					<ul>
						<li><a href="../index.php">Home</a></li>
						<li class="active"><a href="index.php">Login</a></li>
						<li><a href="new-user.php">Signup</a></li>
						<li><a href="../contact.php">contact</a></li>
					</ul>
				</div>
				<div class="clear"> </div>
				<!--end-top-nav-->
			</div>
			<!--end-header-->
		</div>
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<div class="logo margin-top-30">
				<br/>If you forget your password please fill the following form.<br/><br/>
				<div class="box-login">
					<form class="form-login" method="post">
						<fieldset>
							<legend>
								 Password Recovery Forms
							</legend>
							<p>
								<br/><br/>
								Please enter your username and email address to recover your password.<br/>

							</p>

							<div class="form-group form-actions">
								<span class="input-icon">
									<input type="text" class="form-control" name="username" placeholder="Enter Your Username">
									<i class="fa fa-user"></i>
									 </span>
							</div><br/><br/>
							<div class="form-group">
								<span class="input-icon">
									<input type="email" class="form-control" name="email" placeholder="Enter Your Email Address">
									<i class="fa fa-envelope"></i> </span>
							</div><br/><br/>
							<div>
								&emsp;&emsp;&emsp;&emsp;
								<button type="reset" name="clear" align="left" class="btn btn-red">
									Clear <i class="fa fa-arrow-circle-left"></i>
								</button>&emsp;&emsp;&emsp;&emsp;
								<button type="submit" name="submit" id="submit" align="right" class="btn btn-primary">
									&emsp;Next <i class="fa fa-arrow-circle-right"></i>&emsp;
								</button>

							</div>
							<div class="new-account">
								I already knew my password
								<a href="index.php">
									login
								</a>
								here
							</div>
						</fieldset>
					</form>


				</div>

			</div>
		</div>
	</div>
	<div class="footer">
		   	 <div class="wrap">
		   	<div class="footer">
		   				   			<center><b>&copy;<?php echo $footer; ?></b></center>
		   	</div>

		   	<div class="clear"> </div>
		   </div>
		   </div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>

		<script src="assets/js/main.js"></script>

		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>

	</body>
	<!-- end: BODY -->
</html>
