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
if(isset($_POST['admeds'])){	
$pid=$_SESSION['userid'];
$administ=$_POST['administ'];
$pharComment=$_POST['pharComment'];
$status=0;
 $sql =mysqli_query($con, "UPDATE medication set pid='$pid', administ='$administ', pharComment='$pharComment', status='$status' WHERE cardNo='".$_GET['cardno']."' AND status=1");
if($sql){
	echo '<script type="text/javascript">alert("Medication admitted successfully!");</script>';
	header("Location:med-response.php");
} else {
	echo "<script>alert('Something wants wrong!');</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Pharmacist | Medication</title>
		
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
<script type="text/javascript">
	function valid(){
          var pharComment=document.forms["adddoc"]["pharComment"].value;
          var chk_txts= /^[a-zA-Z]+$/;
          if ((pharComment.search(chk_txts)==-1)) {
            alert("Please insert only character");
            document.adddoc.pharComment.focus();
            return false;
          }
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
<h1 class="mainTitle">Medication Admitting</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Pharmacy</span>
</li>
<li class="active">
<span>Medication Admitting</span>
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
<h5 class="panel-title"><center>Medication Admission </center></h5>
</div>
<div class="panel-body">
	<?php
	$admed=mysqli_query($con, "SELECT * FROM medication WHERE cardNo='".$_GET['cardno']."' AND status=1");
	while ($meds=mysqli_fetch_array($admed)) {
	?>
<form role="form" name="adddoc" onsubmit="return valid()" method="post">
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
<input type="text" style="margin-left: 200px;" name="patfname" class="col-sm-5"  value="<?php echo $meds['patfname'];?>" readonly="true">
</div><br><br>
<div class="form-group">
<label for="doctorname" style="margin-left: 200px;">
Last Name
</label><br>
<input type="text" style="margin-left: 200px;" name="patlname" class="col-sm-5"  value="<?php echo $meds['patlname'];?>" readonly="true">
</div><br><br>
<div class="form-group">
<label for="fess" style="margin-left: 200px;">
Age
</label><br>
<input type="number" style="margin-left: 200px;" name="age" value="<?php echo $meds['age'];?>" class="col-sm-5"  readonly="true">
</div><br><br>
<div class="form-group">
<label for="fess" style="margin-left: 200px;">
Gender
</label><br>
<div class="clip-radio radio-primary" style="margin-left: 200px;">
  <?php  if($meds['gender']=="Female"){ ?>
    <input type="radio" name="gender" id="gender" value="Male"><label for="rg-male">Male</label>
    <input type="radio" name="gender" id="gender" value="Female" checked="true"><label for="rg-female">Female</label>
  <?php } else { ?>
   <input type="radio" name="gender" id="gender" value="Male" checked="true"><label for="rg-male">Male</label>
    <input type="radio" name="gender" id="gender" value="Female"><label for="rg-female">Female</label>
             <?php } ?>
           </div>
           </div>
<div class="form-group">
<label class="block" style="margin-left: 200px;">
Medication Administration
</label><br>
<textarea name="administ" style="margin-left: 200px;" placeholder="Enter how the patient will administrate the medication" rows="5" cols="14" class="col-sm-5 wd-450" ></textarea>
</div><br><br><br><br><br>
<div class="form-group">
<label class="block" style="margin-left: 200px;">
Comment
</label><br>
<textarea name="pharComment" style="margin-left: 200px;" placeholder="Enter your comment" rows="5" cols="14" class="col-sm-5 wd-450" ></textarea>
</div><br><br><br><br><br>
<?php 
$docname=mysqli_query($con, "SELECT * FROM employee WHERE id='".$meds['docId']."'");
while ($dn=mysqli_fetch_array($docname)) {

 ?>
<div class="form-group"><br>
<label for="address" style="margin-left: 200px;">
Requested by
</label><br>
<input type="text" name="docId" style="margin-left: 200px;" class="col-sm-5"  value="<?php echo $dn['fname']." ".$dn['lname'] ?>" readonly="true">
</div><br><br><?php
}
$query=mysqli_query($con, "SELECT * FROM pharmacist WHERE pid='".$_SESSION['userid']."'");
$num=mysqli_num_rows($query);
if($num==1){
    while($rows = mysqli_fetch_array($query)){

?>
<div class="form-group">
<label for="address" style="margin-left: 200px;">
Pharmacist Name
</label><br>
<input type="text" style="margin-left: 200px;" name="tid" class="col-sm-5"  value="<?php $_SESSION['userid'];?>" placeholder="<?php  echo " ".$rows['fname']." ".$rows['lname'];?>" readonly="true" style="font-size: 20px; color: red">
</div><br><br>
<?php 

}} ?>
&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<button type="submit" style="margin-left: 200px;" name="admeds" id="submit" class="btn btn-green btn-primary">
Admit
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
	<img src="images/images-2.jpg" style="height: 950px;">
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