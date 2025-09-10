<?php
session_start();
//error_reporting(0);
include("include/config.php");
include("../include/web.php");
// Code for updating Password
if(isset($_POST['change']))
{
$username=$_SESSION['username'];
$email=$_SESSION['email'];
$newpassword=md5($_POST['password']);
$query=mysqli_query($con,"update users set password='$newpassword' where username='$username' and email='$email'");
if ($query) {
echo "<script>alert('Password successfully updated.');</script>";
echo "<script>window.location.href ='index.php'</script>";
}

}


?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Password Reset</title>

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
<!--header-->
		<link href="../css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="../css/responsiveslides.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="../js/responsiveslides.min.js"></script>
				<script type="text/javascript">
function valid()
{
 if(document.passwordreset.password.value!= document.passwordreset.password_again.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.passwordreset.password_again.focus();
return false;
}
return true;
}
</script>
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
						<li><a href="../contact.php">Contact</a></li>
					</ul>
				</div>
				<div class="clear"> </div>
				<!--end-top-nav-->
			</div>
			<!--end-header-->
		</div>
		<div class="row">
			<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
				<br/><br/><br/><br/>
				<div class="box-login">
					<form class="form-login" name="passwordreset" method="post" onSubmit="return valid();">
						<fieldset>
							<legend>
							 Reset Password
							</legend><br/><br/>
							<p>
								Please set your new password.<br/><br/><br/>
								<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
							</p>

<div class="form-group">
<span class="input-icon">
<input type="password" class="form-control" id="password" name="password" placeholder="Enter New Password" required>
<i class="fa fa-lock"></i> </span>
</div>
	<br/><br/>

<div class="form-group">
<span class="input-icon">
<input type="password" class="form-control"  id="password_again" name="password_again" placeholder="Confirm Your Password" required>
<i class="fa fa-lock"></i> </span>
</div><br/><br/>
							<div>
								&emsp;&emsp;&emsp;&emsp;
								<button type="reset" name="clear" align="left" class="btn btn-red">
									Clear <i class="fa fa-arrow-circle-left"></i>
								</button>&emsp;&emsp;&emsp;&emsp;
								<button type="submit" name="change" id="submit" align="right" class="btn btn-primary">
									&emsp;Change <i class="fa fa-arrow-circle-right"></i>&emsp;
								</button>

							</div><br/><br/>
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
