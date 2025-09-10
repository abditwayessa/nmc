<?php
session_start();
error_reporting(0);
include('include/config.php');
include ("../include/web.php");
?>
<?php
if(isset($_POST['submit']))
{
	if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
    } else{
$userid=$_POST['userid'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=md5($_POST['password']);
$priv=6;
$regDate=date('y-m-d h:i:sa');
$status=1;
				$sql=mysqli_query($con,"insert into users(userid,username,email,password,regDate,priv,status) values('$userid','$username','$email','$password','$regDate','$priv','$status')");
				echo '<script type="text/javascript">alert("Your account created successfully!");</script>';
			}}
 ?>
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
		<script type="text/javascript">
			function validate(){
	var cardNo=document.forms["newform"]["userid"].value;
    //var confirm_password=document.forms["newform"]["confirm_password"].value;
    var username=document.forms["newform"]["username"].value;
    var email=document.forms["newform"]["email"].value;
    var chk_un= /^[a-z0-9]+$/;
    var chk_em=/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}+$/;

    //Card number validation
    if(cardNo.length >=4 ){
 	alert("Your card number length must equal to or greaterthan 4 !");
 	document.newform.userid.focus();
 	return false;
 }
    // Username Validation
if(username==""){
	alert("Please enter your username!");
	document.newform.username.focus();
	return false;
}
if(username.search(chk_un)==-1){
		alert("Please provide only small alphanumeric characters!");
		document.newform.username.focus();
		return false;
	}
if(username.length < 6){
 	alert("Your username length must equal or greaterthan 6!");
 	document.newform.username.focus();
 	return false;
 }
 //Email validation
 if(email==""){
	alert("Please enter your email address!");
	document.newform.email.focus();
	return false;
}
if(email.search(chk_em)==-1){
		alert("Please provide valid email address!");
		document.newform.email.focus();
		return false;
	}
			}
		</script>
	</head>
	<body>
<!--start-header-->
			<div class="header">
				<div class="wrap">
				<!--start-logo-->
				<div class="logo">
					<a href="../index.html" style="font-size: 30px;"><?php echo $titles; ?></a>
				</div>
				<!--end-logo-->
				<!--start-top-nav-->
				<div class="top-nav">
					<ul>
						<li><a href="../index.php">Home</a></li>
						<li><a href="index.php">Login</a></li>
						<li class="active"><a href="new-user.php">Signup</a></li>
						<li><a href="../contact.php">Contact us</a></li>
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
<h1 class="mainTitle" align="center">Create New Account</h1>
</div>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-10">
<div class="row margin-top-30">
<div class="col-lg-6 col-md-10">
<div class="panel panel-white">
<div class="panel-heading">
</div><center>Create new account by providing the following forms</center>
<div class="panel-body" >

<form role="form" name="newform" onsubmit="return validate()" method="post">
<div class="form-group">
<label for="doctorname" style="margin-left: 130px;">
Card Number
</label><br>
<span class="input-icon" style="margin-left: 130px;">
	<input type="Number"  name="userid" id="userid" onBlur="cardAvailability()" class="col-sm-7"  placeholder="Card number" required="true"><i class="fa fa-credit-card"></i><br>
</span>
<span id="card-availability-status1"  style="margin-left: 130px;font-size:12px;"></span>
</div>
<div class="form-group">
<label for="doctorname" style="margin-left: 130px;">
Email
</label>
<span class="input-icon" style="margin-left: 130px;">
<input type="text" name="email" id="email" onBlur="emailAvailability()" class="col-sm-7"  placeholder="Email" required="true">
<li class="fa fa-envelope"></i>
</span>
</div><br>
<span id="email-availability-status1" style="margin-left: 130px;font-size:12px;"></span>
<div class="form-group">
<label for="doctorname" style="margin-left: 130px;">
Username
</label>
<span class="input-icon" style="margin-left: 130px;">
<input type="text" name="username" class="col-sm-6" id="username" onBlur="usernameAvailability()"  placeholder="Username" required="true">
<li class="fa fa-user"></i><br><br>
</span>
</div><br>
<span id="username-availability-status1" style="margin-left: 130px;font-size:12px;"></span>
<div class="form-group">
<label for="fess" style="margin-left: 130px;">
Password
</label>
<span class="input-icon" style="margin-left: 130px;">
<input type="password" name="password" placeholder="********" class="col-sm-6"  required="true">
<li class="fa fa-lock"></i>
</span>
</div><br><br>
<div class="form-group">
<label style="margin-left: 130px;">Verification code : </label><br/>
<input type="text" style="margin-left: 130px;" class="col-sm-3"  name="vercode" maxlength="5" autocomplete="off" required  style="height:25px;" /><img style="background-color: red;" src="captcha.php">
</div>
<input type="checkbox" style="margin-left: 0px;" name="agreement" required="true" > I agree to the Term of Service and Privacy Policy.
</div>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<button type="submit" style="margin-left: 0px;" name="submit" id="submit" class="btn btn-green">
	Signup
</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<button type="reset" name="" id="submit" class="btn btn-red" >
Clear <li class="fa fa-arrow-left"></li>
</button>
</form>
</div>
</div><div class="col-lg-6 col-md-10" style="float: right;">
<div class="panel panel-green">
	<img src="images/images-8.webp" style="width: 1950px; height: 530px;">
</div>
</div>
</div>
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
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>

	<script>
function usernameAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "validation/check_users_new.php",
data:'username='+$("#username").val(),
type: "POST",
success:function(data){
$("#username-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
// Card availability
function cardAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "validation/check_cardno_new.php",
data:'userid='+$("#userid").val(),
type: "POST",
success:function(data){
$("#card-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
// Email
function emailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "validation/check_email_new.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#email-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>
	</body>
</html>
