<?php
session_start();
error_reporting(0);
include('include/config.php');
?>
<?php
if(!$_SESSION["username"] && !$_SESSION["userid"]){
	header("Location:../index.php");
}
else{


?>
<?php
	//Avatar function start
function make_avatar($character)
{
	$path='../Profile/' . time() .'.png';
	$image=imagecreate(200, 200);
	$red=rand(0, 255);
	$green=rand(0, 255);
	$blue=rand(0, 255);
	imagecolorallocate($image, $red, $green, $blue);
	$textcolor=imagecolorallocate($image, 255, 255, 255);
	imagettftext($image, 100, 0, 55, 150, $textcolor, 'arial.ttf', $character);
	// header('Content-Type: image/png');
	imagepng($image, $path);
	// imagedestroy($image);
}
// Avatar function End
if(isset($_POST['submit']))
{
$adminId=$_SESSION['id'];
$userid=$_POST['userid'];
$email=$_POST['email'];
$username="newuser1";
$password= base64_encode('123456');
// $priv=$_POST['priv'];
$regDate=date('y-m-d h:i:sa');
$status=0;
$chkun=mysqli_query($con, "Select * from users where username='$username'");
$num=mysqli_num_rows($chkun);
if($num<1){
$chkem=mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
$num2=mysqli_num_rows($chkem);
	if($num2<1){

			$usAdmin=mysqli_query($con, "SELECT * FROM employee WHERE id='$userid'");
			$numad=mysqli_num_rows($usAdmin);
			while($row=mysqli_fetch_array($usAdmin)){
				$characters=$row['fname'];
    			$character=$characters[0];
    			$user_avatar=make_avatar(strtoupper($character));
    			$images=time() .'.png';
    			$priv=$row['privilege'];
				$sql=mysqli_query($con,"insert into users(userid,username,email,password,regDate,priv,status,images) values('$userid','$username','$email','$password','$regDate','$priv','$status','$images')");
				if ($sql) {
					echo '<script type="text/javascript">alert("User added Successfully");</script>';
				}else{
					echo '<script type="text/javascript">alert("Something wents wrong!");</script>';
				}
			}

		}else{
			echo '<script type="text/javascript">alert("Email already exist!");</script>';
		}

} else {
echo "<script>alert('Users already exist!');</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Add New Account</title>

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

	<script>
		//Form validation
function validUser(){
    var usernames=document.forms["myform"]["username"].value;
	var passwords=document.forms["myform"]["password"].value;
    var confirm_password=document.forms["myform"]["cpassword"].value;
    var chk_un= /^[a-z0-9]+$/;
    // Username Validation
if(usernames==""){
	alert("Please enter username!");
	document.myform.username.focus();
	return false;
}
if(usernames.search(chk_un)==-1){
		alert("Please provide only small alphabet and numeric characters!");
		document.myform.username.focus();
		return false;
	}
if(passwords=="")
 {
 	alert("Please enter password!")
 	document.myform.password.focus();
 	return false;
 }
 if(passwords.length < 6){
 	alert("Password length must equal or greaterthan 6!");
 	document.myform.password.focus();
 	return false;
 }
 // Confirm Admin Password Validation
 if(confirm_password==""){
 	alert("Confirm password!");
 	document.myform.cpassword.focus();
 	return false;
 }
 if(passwords!=confirm_password){
 	alert("Password doesn't match!");
 	document.myform.cpassword.focus();
 	return false;
 }}
function userIdAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "validation/check_userid_new.php",
data:'userid='+$("#userid").val(),
type: "POST",
success:function(data){
$("#userid-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
//Email
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
//Username
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
function validusers(){
	var username=document.forms["myform"]["username"].value;
	var chk_un= /^[a-z0-9]+$/;
	var submit=document.forms['myform']['submit'].value;
	if(username.search(chk_un)==-1){
		alert("Please provide only small alphanumeric characters!");
		document.myform.username.focus();
		return false;
	}
}
function validpassword(){
	var pass=document.forms["myform"]["password"].value;

}

function limitText(limitField, limitCount) {
	if (limitField.value.length <= 5) {
		limitCount.value = "Password must greaterthan or equal to 6";
		document.getElementById("countdown").style.color= "red";
	}
	 else if(limitField.value.length <= 7) {
		limitCount.value = "Password strength is poor";
		document.getElementById("countdown").style.color= "darkred";
	}
	else if(limitField.value.length <= 9) {
		limitCount.value = "Password strength is medium";
		document.getElementById("countdown").style.color= "orange";
	}
	else if(limitField.value.length >= 12) {
		limitCount.value = "Password strength is strong";
		document.getElementById("countdown").style.color= "green";
	}
}
// function matchpass(limitField, limitFields, respo){
// if (limitField.value!=limitFields.value) {
// respo.value = "Password doesn't match!";
// document.getElementById("countdowns").style.color= "red";
// }else if (limitField.value==limitFields.value) {
// respo.value = "Correct password!";
// document.getElementById("countdowns").style.color= "green";
// }
// }
</script>
	</head>
	<body>

		<div id="app">
<?php include('include/sidebar.php');?>
<div class="app-content">
<?php include('include/header.php');?>

<div class="main-content" >
<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
<section id="page-title">
<div class="row">
<div class="col-sm-8">
<h1 class="mainTitle">Add New Account</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Manage Users</span>
</li>
<li class="active">
<span>Add New Users</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-8">
<div class="row margin-top-30">
<div class="col-lg-8 col-md-12">
<div class="panel panel-white">
<div class="panel-heading"><center>
<h5 style="margin-left: 0px;">Add New Account</h5>
<label style="margin-left: 0px;color: red; font-size: 10px;">*</label> is required field.</center>
</div>
<div class="panel-body">
<form role="form" name="myform" onSubmit="return validUser()" method="post">
<div class="form-group">
<label for="doctorname" style="margin-left: 100px;">
User ID <label style="color: red; font-size: 18px;">*</label>
</label><br>
<input type="Number" style="margin-left: 100px;" name="userid" id="userid" onBlur="userIdAvailability()" class="col-sm-5"  placeholder="Enter user id" required="true">
<br><br><span id="userid-availability-status1" style="margin-left: 100px;font-size:12px;"></span>
</div>
<div class="form-group"><br>
<label for="doctorname" style="margin-left: 100px; ">
Email <label style="color: red; font-size: 18px;">*</label>
</label><br>
<input type="email" style="margin-left: 100px;" name="email" id="email" onBlur="emailAvailability()" class="col-sm-5"  placeholder="user@example.com" required="true">
<br><br><span id="email-availability-status1" style="margin-left: 100px;font-size:12px;"></span>
</div>
</div>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<button type="submit" style="margin-left: opx;" name="submit" id="submit" class="btn btn-green btn-primary">
Register
</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<button type="reset" style="margin-left: 0px;" name="" id="submit" class="btn btn-red btn-primary" >
Clear
</button>
</form>
</div>
</div><div class="col-lg-4 col-md-4" style="float: right;">
<div class="panel panel-green" >
	<img src="images/images-6.jpg" style="height: 550px;">
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
