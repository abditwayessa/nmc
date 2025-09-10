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
		<title>Between Age Patients Report</title>
		
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
<h1 class="mainTitle">Patient Where age is between <?php echo $_POST['start_age']." and ".$_POST['end_age']; ?> Report</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Admin</span>
</li>
<li class="active">
<span>View Patients</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
	<?php
$start_age=$_POST['start_age'];
$end_age=$_POST['end_age'];
$male=0;
$female=0;
$sql=mysqli_query($con,"select * from tblpatient where age between '$start_age' and '$end_age'");
while($row=mysqli_fetch_array($sql))
{
	$count=$count+1;
	if ($row['gender']=='Male') {
		$male=$male+1;
	}else{
		$female=$female+1;
	}
}
?>
<div class="row">
<div class="col-md-12">
<h4 class="tittle-w3-agileits mb-4">Patient where age between <?php echo $_POST['start_age']." and ".$_POST['end_age']; ?> Patient Reports</h4>
<h4 class="tittle-w3-agileits mb-4">Total: <?php echo '<u>'.$count.'</u>'; ?></h4>
<h4 class="tittle-w3-agileits mb-4">Male: <?php echo '<u>'.$male.'</u>'; ?></h4>
<h4 class="tittle-w3-agileits mb-4">Female: <?php echo '<u>'.$female.'</u>'; ?></h4>
<table class="table table-hover" id="sample-table-1">
<thead>
<tr>
<th class="center">Card No</th>
<th>Patient First Name</th>
<th>Patient Last Name</th>
<th> Gender </th>
<th>Age</th>
<th>Address</th>
<th>Telephone</th>
<th>Registered Date</th>
</tr>
</thead>
<tbody>
<?php
$start_age=$_POST['start_age'];
$end_age=$_POST['end_age'];

$sql=mysqli_query($con,"select * from tblpatient where age between '$start_age' and '$end_age'");

while($row=mysqli_fetch_array($sql))
{
?>
<tr>
<td><?php echo $row['cardNo'];?></td>
<td class="hidden-xs"><?php echo $row['patfname'];?></td>
<td><?php echo $row['patlname'];?></td>
<td><?php echo $row['gender'];?></td>
<td><?php echo $row['age'];?></td>
<td><?php echo $row['address'];?></td>
<td><?php echo $row['tele'];?></td>
<td><?php echo $row['regDate'];?></td>
</tr>
<?php 
 }?></tbody>
</table>
<center><a href="pat-age-doc.php?ages=<?php echo $_POST['start_age'];?>&&agee=<?php echo $_POST['end_age']; ?>"><button type="button" class="btn btn-green"><i class="fa fa-download"></i> Download as Word </button></a>&emsp;&emsp;&emsp;
<a href="pat-age-exc.php?ages=<?php echo $_POST['start_age'];?>&&agee=<?php echo $_POST['end_age']; ?>"><button type="button" class="btn btn-red"><i class="fa fa-download"></i> Download as Excel </button></a></center>
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