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
if(isset($_POST['reportlab'])){	
$tech=$_SESSION['userid'];
$response=$_POST['response'];
$status=0;
$testDate=date('y-m-d h:i:sa');
 $sql =mysqli_query($con, "UPDATE labreport set tid='$tech', response='$response', status='$status' WHERE cardNo='".$_GET['cardno']."' AND status=1");
if($sql){
	echo '<script type="text/javascript">alert("Laboratory result reported successfully!");</script>';
	header("Location:lab-response.php");
} else {
	echo "<script>alert('Something wants wrong!');</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Lab Technician | Lab Report</title>
		
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
<h1 class="mainTitle">Lab Report</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Patient</span>
</li>
<li class="active">
<span>Add Lab Report</span>
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
<h5 class="panel-title"><center>Lab Result Report </center></h5>
</div>
<div class="panel-body">
	<?php
	$adlab=mysqli_query($con, "SELECT * FROM labreport WHERE cardNo='".$_GET['cardno']."' AND status=1");
	while ($labs=mysqli_fetch_array($adlab)) {
	?>
<form role="form" name="" method="post">
	<div class="form-group">
<label for="doctorname" style="margin-left: 200px;">
Card No
</label><br>
<input type="text" style="margin-left: 200px;" name="cardNo" class="col-sm-5"  value="<?php echo $_GET['cardno'];?>" readonly="true">
</div><br><br>
<div class="form-group">
<label for="doctorname" style="margin-left: 200px;">
First Name
</label><br>
<input type="text" style="margin-left: 200px;" name="patfname" class="col-sm-5"  value="<?php echo $labs['patfname'];?>" readonly="true">
</div><br><br>
<div class="form-group">
<label for="doctorname" style="margin-left: 200px;">
Last Name
</label><br>
<input type="text" style="margin-left: 200px;" name="patlname" class="col-sm-5"  value="<?php echo $labs['patlname'];?>" readonly="true">
</div><br><br>
<div class="form-group">
<label for="fess" style="margin-left: 200px;">
Age
</label><br>
<input type="number" style="margin-left: 200px;" name="age" value="<?php echo $labs['age'];?>" class="col-sm-5"  readonly="true">
</div><br><br>
<div class="form-group">
<label for="fess" style="margin-left: 200px;">
Gender
</label>
<div class="clip-radio radio-primary"style="margin-left: 200px;">
  <?php  if($labs['gender']=="Female"){ ?>
    <input type="radio" name="gender" id="gender" value="Male"><label for="rg-male">Male</label>
    <input type="radio" name="gender" id="gender" value="Female" checked="true"><label for="rg-female">Female</label>
  <?php } else { ?>
   <input type="radio" name="gender" id="gender" value="Male" checked="true"><label for="rg-male">Male</label>
    <input type="radio" name="gender" id="gender" value="Female"><label for="rg-female">Female</label>
             <?php } ?>
           </div>
           </div><br><br>
<div class="form-group">
<label class="block" style="margin-left: 200px;">
Test Result
</label><br>
<textarea name="response" style="margin-left: 200px;" placeholder="Enter the result of the test" rows="5" cols="14" class="col-sm-5 wd-450" ></textarea>
</div><br><br>
<?php 
$docname=mysqli_query($con, "SELECT * FROM doctors WHERE docId='".$labs['docId']."'");
while ($dn=mysqli_fetch_array($docname)) {

 ?>
<div class="form-group">
<label for="address" style="margin-left: 200px;">
Requested by
</label><br>
<input type="text" style="margin-left: 200px;" name="docId" class="col-sm-5"  value="<?php echo $dn['docfname']." ".$dn['doclname'] ?>" readonly="true">
</div><?php
}
$query=mysqli_query($con, "SELECT * FROM technician WHERE tid='".$_SESSION['userid']."'");
$num=mysqli_num_rows($query);
if($num==1){
    while($rows = mysqli_fetch_array($query)){

?><br><br>
<div class="form-group">
<label for="address" style="margin-left: 200px;">
Done by
</label>
<input type="text" style="margin-left: 200px;" name="tid" class="col-sm-5"  value="<?php $_SESSION['userid'];?>" placeholder="<?php  echo " ".$rows['fname']." ".$rows['lname'];?>" readonly="true" style="font-size: 20px; color: red">
</div>
<?php 

}} ?>
<br><br><br><br><br>
<button type="submit" style="margin-left: 200px;" name="reportlab" id="submit" class="btn btn-green btn-primary">
Report
</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<button type="reset" name="" id="submit" class="btn btn-red btn-primary" >
Clear
</button>
<?php 
} ?>
</form>
</div>
</div>
</div><div class="col-lg-4 col-md-4" style="float: right;">
<div class="panel panel-green" >
	<img src="images/images-5.jpg" style="height: 710px;">
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
<?php 
} ?>