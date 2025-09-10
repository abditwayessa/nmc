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
		<title>Pharmacist | Admitted Medication</title>
		
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
<h1 class="mainTitle">Admitted Medication</h1>
</div>
<ol class="breadcrumb">
<li>
<span>Pharmacy</span>
</li>
<li class="active">
<span>Admitted Medication</span>
</li>
</ol>
</div>
</section>
<div class="container-fluid container-fullw bg-white">
	<br/><br/>
<form role="form" method="post" name="search">
<div class="form-group">
<label for="doctorname">
Search by first name, last name or card number.
</label><br/>
<input type="text" name="searchdata" id="searchdata" style="width: 250px;" required='true'>
<button type="submit" name="search" id="submit" class="btn btn-green">
Search
</button>
</div>
</form>	<br/><br/>
<?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
<h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>
<table class="table table-hover" id="sample-table-1">
<thead>
<tr>
<th class="center">No</th>
<th>Card No</th>
<th>First Name</th>
<th>Last Name</th>
<th>Age</th>
<th>Gender</th>
<th>Medication Name</th>
<th>Dose</th>
<th>Strength</th>
<th>Duration</th>
<th>Administration</th>
<th>Admitted By</th>
<th>Doctors Comment</th>
<th>Pharmacist Name</th>
<th>Pharmacist Comment</th>
<th>Date</th>
</tr>
</thead>
<tbody>
	<?php
$sql=mysqli_query($con,"select * from medication where patfname like '%$sdata%'|| patlname like '%$sdata%' || cardNo like '%$sdata%'");
$num=mysqli_num_rows($sql);
if($num>0){
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
	$doctorsname=mysqli_query($con, "SELECT * FROM employee WHERE id='".$row['docId']."'");
	while($dname=mysqli_fetch_array($doctorsname)){
		$pharmacistname=mysqli_query($con, "SELECT * FROM employee WHERE id='".$row['pid']."'");
		while($pname=mysqli_fetch_array($pharmacistname)){
?>
<tr style="background-color: #89CFFF; font-size: 17px;">
<td class="center"><?php echo $cnt;?>.</td>
<td><?php echo $row['cardNo'];?></td>
<td class="hidden-xs"><?php echo $row['patfname'];?></td>
<td><?php echo $row['patlname'];?></td>
<td><?php echo $row['age'];?></td>
<td><?php echo $row['gender'];?></td>
<td><?php echo $row['drugname'];?></td>
<td><?php echo $row['dose'];?></td>
<td><?php echo $row['medstrength'];?></td>
<td><?php echo $row['duration'];?></td>
<td><?php echo $row['administ'];?></td>
<td><?php echo $dname['fname']." ".$dname['lname'];?></td>
<td><?php echo $row['docComment'];?></td>
<td><?php echo $pname['fname']." ".$pname['lname'];?></td>
<td><?php echo $row['pharComment'];?></td>
<td><?php echo $row['adDate'];?></td>
</tr>
<?php 
$cnt=$cnt+1;
}}}} else { ?>
  <tr>
    <td colspan="16" style="text-align: center;"> <span style="text-align: center; color: red;">No result</span></td>

  </tr>
   <br><br>
<?php }} ?>
<div class="row">
<div class="col-md-12">
	
<table class="table table-hover" id="sample-table-1">
<thead>
<tr>
<th class="center">No</th>
<th>Card No</th>
<th>First Name</th>
<th>Last Name</th>
<th>Age</th>
<th>Gender</th>
<th>Medication Name</th>
<th>Dose</th>
<th>Strength</th>
<th>Duration</th>
<th>Administration</th>
<th>Admitted By</th>
<th>Doctors Comment</th>
<th>Pharmacist Name</th>
<th>Pharmacist Comment</th>
<th>Date</th>
</tr>
</thead>
<h5 class="over-title margin-bottom-15"><span class="text-bold">List of Admitted Medication</span></h5>

<tbody>
<?php
$pid=$_SESSION['userid'];
$sql=mysqli_query($con,"SELECT * FROM medication WHERE status=0 ORDER BY id DESC");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
	$doc=mysqli_query($con, "SELECT * FROM employee WHERE id='".$row['docId']."'");
	while ($nums=mysqli_fetch_array($doc)) {
		$pha=mysqli_query($con, "SELECT * FROM employee WHERE id='$pid'");
	while ($phars=mysqli_fetch_array($pha)) {
?>
<tr>
<td class="center"><?php echo $cnt;?>.</td>
<td><?php echo $row['cardNo'];?></td>
<td class="hidden-xs"><?php echo $row['patfname'];?></td>
<td><?php echo $row['patlname'];?></td>
<td><?php echo $row['age'];?></td>
<td><?php echo $row['gender'];?></td>
<td><?php echo $row['drugname'];?></td>
<td><?php echo $row['dose'];?></td>
<td><?php echo $row['medstrength'];?></td>
<td><?php echo $row['duration'];?></td>
<td><?php echo $row['administ'];?></td>
<td><?php echo $nums['fname']." ".$nums['lname'];?></td>
<td><?php echo $row['docComment'];?></td>
<td><?php echo $phars['fname']." ".$phars['lname'];?></td>
<td><?php echo $row['pharComment'];?></td>
<td><?php echo $row['adDate'];?></td>
</tr>
<?php 
$cnt=$cnt+1;
 }}}?></tbody>
</table>
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