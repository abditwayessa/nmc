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
	$tech=$_SESSION['id'];
	$cardNo=$_POST['cardNo'];
$docId=$_POST['docId'];
$tid=$_POST['tid'];
$hema=$_POST['hema'];
$para=$_POST['para'];
$urin=$_POST['urin'];
$sero=$_POST['sero'];
$chem=$_POST['chem'];
$bact=$_POST['bact'];
$testDate=date('y-m-d h:i:sa');
$sql=mysqli_query($con,"insert into labreport(cardNo,docId,tid,testDate,hema,para,urin,sero,chem,bact) values('$cardNo','$docId','$tid','$testDate','$hema','$para','$urin','$sero','$chem','$bact')");
if($sql){
	echo '<script type="text/javascript">alert("Lab report added Successfully");</script>';
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
<div class="col-md-12">
<div class="row margin-top-30">
<div class="col-lg-8 col-md-12">
<div class="panel panel-white">
<div class="panel-heading">
<h5 class="panel-title">Lab Report </h5>
</div>
<div class="panel-body">
<form role="form" name="" method="post">
	<div class="form-group">
<label for="doctorname">
Card No
</label>
<input type="text" name="cardNo" class="form-control"  placeholder="Card No" required="true">
</div>
<div class="form-group">
<label for="doctorname">
First Name
</label>
<input type="text" name="patfname" class="form-control"  placeholder="Enter Patient First Name" required="true">
</div>
<div class="form-group">
<label for="doctorname">
Last Name
</label>
<input type="text" name="patlname" class="form-control"  placeholder="Enter Patient Last Name" required="true">
</div>
<div class="form-group">
<label for="fess">
Age
</label>
<input type="number" name="age" placeholder="Enter Patient Age" class="form-control"  required="true">
</div>
<div class="form-group">
<label class="block">
Gender
</label>
<div class="clip-radio radio-primary">
<input type="radio" id="rg-male" name="gender" value="male" checked="checked">
<label for="rg-male">
Male
</label>
<input type="radio" id="rg-female" name="gender" value="female" >
<label for="rg-female">
Female
</label>
</div>
</div>
<div class="form-group">
<label class="block">
1. HEMATOLOGY
</label>
<textarea name="hema" placeholder="Hematology report(CBC, WBC/Diff, ESR and etc.)" rows="5" cols="14" class="form-control wd-450" ></textarea>
</div>
<div class="form-group">
<label class="block">
2. PARASTOLOGY
</label>
<textarea name="para" placeholder="Parastology report(BF and Stool exam)" rows="5" cols="14" class="form-control wd-450" ></textarea>
</div>
<div class="form-group">
<label class="block">
3.URINE ANALYSIS
</label>
<textarea name="urin" placeholder="Urine Analysis report(Chemical, Microscopic and HCG)" rows="5" cols="14" class="form-control wd-450" ></textarea>
</div>
<div class="form-group">
<label class="block">
4. SEROLOGY
</label>
<textarea name="sero" placeholder="Serology report(Widal, Weiflex, RF, HBSAG, VDRL and etc.)" rows="5" cols="14" class="form-control wd-450" required="true"></textarea>
</div>
<div class="form-group">
<label class="block">
5. CHEMISTRY
</label>
<textarea name="chem" placeholder="Chemistry report(RBS/FBS, Creatinine, BUN, TP, ALB, TSP and etc.)" rows="5" cols="14" class="form-control wd-450" ></textarea>
</div>
<div class="form-group">
<label class="block">
6. BACTEROLOGY
</label>
<textarea name="bact" placeholder="Bacterology report(AFB, Gram's stain and KOH)" rows="5" cols="14" class="form-control wd-450"></textarea>
</div>
<div class="form-group">
<label for="address">
Requested by
</label>
<input type="text" name="docId" class="form-control"  placeholder="Requested by" required="true">
</div><?php
$query=mysqli_query($con, "SELECT * FROM technician WHERE tid='".$_SESSION['userid']."'");
$num=mysqli_num_rows($query);
if($num==1){
    while($row = mysqli_fetch_array($query)){

?>
<div class="form-group">
<label for="address">
Done by
</label>
<input type="text" name="tid" class="form-control"  value="<?php $_SESSION['userid'];?>" placeholder="<?php  echo " ".$row['fname']." ".$row['lname'];?>" readonly="true" style="font-size: 20px; color: red">
</div>
<?php 

}} ?>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
Add
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