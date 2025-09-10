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
if(isset($_POST['submit']))
{	
	$clerkId=$_SESSION['userid'];
	$patfname=$_POST['patfname'];
$patlname=$_POST['patlname'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$tele=$_POST['tele'];
$address=$_POST['address'];
$regDate=date('y-m-d h:i:sa');
$room=$_POST['room'];
//patient add
$sql=mysqli_query($con,"insert into tblpatient(patfname,patlname,age,gender,tele,address,regDate,clerkId) values('$patfname','$patlname','$age','$gender','$tele','$address','$regDate','$clerkId')");
$docr=mysqli_query($con, "SELECT docId FROM rooms WHERE roomNo='$room'");
while ($doci=mysqli_fetch_array($docr)) {
$pat=mysqli_query($con, "SELECT cardNo FROM tblpatient WHERE patfname='$patfname' and patlname='$patlname'");
	while ($pats=mysqli_fetch_array($pat)) {
		$pid=$pats['cardNo'];
	$docId=$doci['docId'];
$nots=mysqli_query($con, "INSERT INTO notifications(clerkId, docId, pid, patfname, patlname) VALUES ('$clerkId', '$docId', '$pid', '$patfname', '$patlname')");
}
if($sql){
	echo '<script type="text/javascript">alert("Patient registered successfully");</script>';
} else {
	echo "<script>alert('Something wants wrong!');</script>";
}
}}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Clerk | Add Patient</title>
		
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
function valid(){
	var patfname=document.forms["adddoc"]["patfname"].value;
	var patlname=document.forms["adddoc"]["patlname"].value;
	var age=document.forms['adddoc']['age'].value;
	var tele=document.forms["adddoc"]["tele"].value;
	var address=document.forms["adddoc"]["address"].value;
	var chk_txt = /^[a-zA-Z]+$/;
	var chk_num=/^[0-9]+$/;
	if((patfname.search(chk_txt)==-1)){
		alert("Please insert only character");
		document.adddoc.patfname.focus();
		return  false;
	}
	if((patlname.search(chk_txt)==-1)){
		alert("Please insert only character");
		document.adddoc.patlname.focus();
		return  false;
	}
	if (age<1) {
		alert("Please enter only postive number");
		document.adddoc.age.focus();
		return false;
	}
	if ((tele.search(chk_num)==-1)) {
		alert("Please insert only number");
		document.adddoc.tele.focus();
		return false;
	}
	if(tele.length<10 || tele.length>10){
		alert("Telephone number must 10 digits");
		document.adddoc.tele.focus();
		return  false;
	}
	if((address.search(chk_txt)==-1)){
		alert("Please insert only character");
		document.adddoc.address.focus();
		return  false;
	}
}
</script>
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
<h1 class="mainTitle">Patient | Add Patient</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Patient</span>
</li>
<li class="active">
<span>Add Patient</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-10">
<div class="row margin-top-30">
<div class="col-lg-8 col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h5 class="panel-title" style="margin-left: 270px;">Add New Patient</h5>
<label style="margin-left: 270px; color: red; font-size: 18px;">*</label> is required field.
</div>
<div class="panel-body">
<form role="form" name="adddoc" onsubmit="return valid()" method="post">
<div class="form-group">
<label for="doctorname" style="margin-left: 200px;">
First Name <label style="color: red; font-size: 15px;">*</label>
</label><br>
<input type="text" style="margin-left: 200px;" name="patfname" class="col-sm-5"  placeholder="Enter Patient First Name" required="true">
</div><br><br>
<div class="form-group">
<label for="doctorname"  style="margin-left: 200px;">
Last Name<label style="color: red; font-size: 15px;">*</label>
</label><br>
<input type="text" style="margin-left: 200px;" name="patlname" class="col-sm-5"  placeholder="Enter Patient Last Name" required="true">
</div><br/><br>
<div class="form-group">
<label for="doctorname" style="margin-left: 200px;">
Age<label style="color: red; font-size: 15px;">*</label>
</label><br>
<input type="Number" style="margin-left: 200px;" name="age" class="col-sm-5" placeholder="Enter Patient Age" required="true">
</div><br/>
<div class="form-group">
<label class="block" style="margin-left: 200px;">
Gender <label style="color: red; font-size: 15px;">*</label>
</label>
<div class="clip-radio radio-primary" style="margin-left: 200px;">
<input type="radio" id="rg-male" name="gender" value="Male" checked="checked">
<label for="rg-male">
Male
</label>
<input type="radio" id="rg-female" name="gender" value="Female" >
<label for="rg-female">
Female
</label>
</div>
</div>
<div class="form-group">
<label for="fess" style="margin-left: 200px;">
Telephone
</label><br>
<input type="text" style="margin-left: 200px;" id="patemail" name="tele" class="col-sm-5"  placeholder="Enter Patient Telephone Number">
</div><br><br>
<div class="form-group">
<label for="address" style="margin-left: 200px;">
Address<label style="color: red; font-size: 15px;">*</label>
</label><br>
<input type="text" style="margin-left: 200px;" name="address" class="col-sm-5"  placeholder="Enter Patient Address" required="true">
</div><br><br>
<div class="form-group">
<label for="address"style="margin-left: 200px;">
Room<label style="color: red; font-size: 15px;">*</label>
</label>
<select name="room" style="margin-left: 200px;" class="col-sm-5" required="true">
<option value="">Select Room</option>
<?php $ret=mysqli_query($con,"select * from rooms where status=1");
while($row=mysqli_fetch_array($ret))
{
?>
<option value="<?php echo htmlentities($row['roomNo']);?>">
<?php echo htmlentities($row['roomNo']); } ?>
</option>
<!-- <?php } ?> -->
</select>
</div><br><br><br>
<button type="submit" style="margin-left: 200px;" name="submit" id="submit" class="btn btn-green btn-primary">
Register
</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<button type="reset" name="" id="submit" class="btn btn-red btn-primary" >
Clear
</button>

</form>
</div>
</div>
</div><div class="col-lg-4 col-md-4" style="float: right;">
<div class="panel panel-green" >
	<img src="images/images-5.jpg" style="height: 705px;">
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