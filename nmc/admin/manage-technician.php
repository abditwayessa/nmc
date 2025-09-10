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
if(isset($_GET['del']))
		  {
		          $del=mysqli_query($con,"delete from employee where id = '".$_GET['id']."'");
                  if ($del) {
                  	echo '<script type="text/javascript"> alert("Data deleted successfully!"); </script>';
                  } else{
                  	echo '<script type="text/javascript"> alert("Something wants wrong"); </script>';
                  }
		  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | View Lab Technician Information</title>
		
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
					
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Lab Technician's Information</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Manage Lab Technician</span>
									</li>
									<li class="active">
										<span>View Lab Technician Information</span>
									</li>
								</ol>
							</div>
						</section>
						<form role="form" method="post" name="search">

<div class="form-group">
<label for="doctorname">
Search by providing keyword from ID, first name, last name, address or telephone.
</label><br><br>
<input type="text" name="searchdata" id="searchdata" class="col-sm-2" value="" required='true' size="12px">&emsp;
<button type="submit" name="search" id="submit" style="font-size: 12px;" class="btn btn-green btn-primary">
Search
</button></div>
</form>	
<?php
if(isset($_POST['search']))
{ 
$sdata=$_POST['searchdata'];
  ?>
<h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>

<table class="table table-hover" style="background-color: #ffff99; font-size: 17px;">
<thead>
<tr>
<th class="center">ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Age</th>
<th>Gender </th>
<th>Address</th>
<th>Telephone</th>
<th>Registered Date</th>
<th>Updation Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php
$sql=mysqli_query($con,"select * from employee where id like '%$sdata%'|| fname like '%$sdata%'|| lname like '%$sdata%' || address like '%$sdata%' || tele like '%$sdata%' and privilege=5");
$num=mysqli_num_rows($sql);
if($num>0){
while($row=mysqli_fetch_array($sql))
{
	if ($row['privilege']==5) {
?>
<tr>
<td class="hidden-xs"><?php echo $row['id'];?></td>
<td><?php echo $row['fname'];?></td>
<td><?php echo $row['lname'];?></td>
<td><?php echo $row['age'];?></td>
<td><?php echo $row['gender'];?></td>
<td><?php echo $row['address'];?></td>
<td><?php echo $row['tele'];?></td>
<td><?php echo $row['regDate'];?></td>
<td><?php echo $row['updationDate'];?></td>
<td>
												<div class="visible-md visible-lg hidden-sm hidden-xs">
							<a href="edit-technician.php?id=<?php echo $row['id'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>
													
	<a href="manage-technician.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-trash"></i></a>
												</div>
											</td>
</tr>
<?php 
} }} else { ?>
  <tr>
    <td colspan="8"> No record found against this search</td>

  </tr>
   
<?php }} ?>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
						

									<div class="row">
								<div class="col-md-12">
									<h5 class="over-title margin-bottom-15">List of <span class="text-bold">Technician</span></h5>
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">ID</th>
												<th>First Name</th>
												<th>Last Name</th>
												<th>Age</th>
												<th>Gender</th>
												<th>Address</th>
												<th>Telephone</th>
												<th>Registered Date</th>
												<th>Updation Date</th>
												<th>Action</th>
												
											</tr>
										</thead>
										<tbody>
<?php
$sql=mysqli_query($con,"select * from employee where privilege=5");
while($row=mysqli_fetch_array($sql))
{
?>
											<tr>
												<td class="hidden-xs"><?php echo $row['id'];?></td>
												<td><?php echo $row['fname'];?></td>
												<td><?php echo $row['lname'];?>
												<td><?php echo $row['age'];?>
												<td><?php echo $row['gender'];?>
												<td><?php echo $row['address'];?>
												<td><?php echo $row['tele'];?>
												<td><?php echo $row['regDate'];?>
												<td><?php echo $row['updationDate'];?>
												</td>
												<td>
												<div class="visible-md visible-lg hidden-sm hidden-xs">
							<a href="edit-technician.php?id=<?php echo $row['id'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>
													
	<a href="manage-technician.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-trash"></i></a>
												</div>
												<div class="visible-xs visible-sm hidden-md hidden-lg">
													<div class="btn-group" dropdown is-open="status.isopen">
														<button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
															<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
														</button>
													</div>
												</div></td>
											</tr>
											
											<?php 
											 }?>
											
											
										</tbody>
									</table>
								</div>
							</div>
								</div>
							</div>
						</div>
						<!-- end: BASIC EXAMPLE -->
						<!-- end: SELECT BOXES -->
						
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