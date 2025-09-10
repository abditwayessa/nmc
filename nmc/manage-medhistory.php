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
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>  Medical History</title>
		
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
<h1 class="mainTitle"> Medical History</h1>
</div>
<ol class="breadcrumb">
<li class="active">
<span>Medical History</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15"><span class="text-bold">Basic Information</span></h5>
<table class="table table-hover" id="sample-table-1">
<thead>
<tr>
<th class="center">Card No</th>
<th>First Name</th>
<th>Last Name</th>
<th>Gender </th>
<th>Age</th>
<th>Registred Date</th>
</tr>
</thead>
<tbody>
<?php
$cardNo=$_SESSION['userid'];
$sql=mysqli_query($con,"select * from tblpatient where cardNo='$cardNo'");
while($row=mysqli_fetch_array($sql))
{
?>
<tr>
<td class="center"><?php echo $row['cardNo'];?></td>
<td class="hidden-xs"><?php echo $row['patfname'];?></td>
<td><?php echo $row['patlname'];?></td>
<td><?php echo $row['gender'];?></td>
<td><?php echo $row['age'];?></td>
<td><?php echo $row['regDate'];?>
</td>
</tr>
<?php 
 }?></tbody>
</table>
</div>
</div>
</div>
<!-- Medication Report start  -->
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15"><span class="text-bold">Medication Report</span></h5>
	
<table class="table table-hover" id="sample-table-1">
<thead>
<tr>
<th class="center">No</th>
<th>Medication Name</th>
<th>Dose</th>
<th>Medication Strength </th>
<th>Duration</th>
<th>Administration</th>
<th>Admitted Date</th>
<th>Comment</th>
</tr>
</thead>
<tbody>
<?php
$card=$_SESSION['userid'];
$sql=mysqli_query($con,"select * from medication where cardNo='$card'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
<tr>
<td class="center"><?php echo $cnt;?>.</td>
<td class="hidden-xs"><?php echo $row['drugname'];?></td>
<td><?php echo $row['dose'];?></td>
<td><?php echo $row['medstrength'];?></td>
<td><?php echo $row['duration'];?></td>
<td><?php echo $row['administ'];?></td>
<td><?php echo $row['adDate'];?></td>
<td><?php echo $row['pharComment'];?></td>
</tr>
<?php 
$cnt=$cnt+1;
 }?></tbody>
</table>
</div>
</div>
</div>
<!-- Medication Report end -->
<!-- Medical Record start -->
<div class="container-fluid container-fullw bg-white">
<div class="row">
<div class="col-md-12">
<h5 class="over-title margin-bottom-15"><span class="text-bold">Medical Report</span></h5>
	
<table class="table table-hover" id="sample-table-1">
<thead>
<tr>
<th class="center">No</th>
<th>Blood Pressure</th>
<th>Blood Sugar</th>
<th>Weight</th>
<th>Temperature</th>
<th>Remark</th>
<th>Date</th>
</tr>
</thead>
<tbody>
<?php
$card=$_SESSION['userid'];
$sql=mysqli_query($con,"select * from tblmedicalhistory where PatientID='$card'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
<tr>
<td class="center"><?php echo $cnt;?>.</td>
<td class="hidden-xs"><?php echo $row['BloodPressure'];?></td>
<td><?php echo $row['BloodSugar'];?></td>
<td><?php echo $row['Weight'];?></td>
<td><?php echo $row['Temperature'];?></td>
<td><?php echo $row['MedicalPres'];?></td>
<td><?php echo $row['CreationDate'];?></td>
</tr>
<?php 
$cnt=$cnt+1;
 }?></tbody>
</table>
</div>
</div>
</div>

<!-- Medical Report end -->
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