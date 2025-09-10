<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_GET['del']))
		  {
		          mysqli_query($con,"delete from users where id = '".$_GET['id']."'");
                  $_SESSION['msg']="data deleted !!";
		  }
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Manage Users</title>
		
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
									<h1 class="mainTitle">Admin | Manage Users</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin</span>
									</li>
									<li class="active">
										<span>Manage Users</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
							<form role="form" method="post" name="search">

<div class="form-group">
<label for="doctorname">
Search by Name.
</label>
<input type="text" name="searchdata" id="searchdata" class="form-control" value="" required='true' size="12px">
</div>

<button type="submit" name="search" id="submit" class="btn btn-o btn-primary">
Search
</button>
</form>
<?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
  
<table class="table table-hover" id="sample-table-1">
<thead>
<tr>
<th class="center">No</th>
<th>Full Name</th>
<th>Address</th>
<th>City </th>
<th>Gender</th>
<th>Email</th>
<th>Creation Date</th>
<th>Update Date</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php

$sql=mysqli_query($con,"select * from users where fullName like '%$sdata%'|| address like '%$sdata%'");
$num=mysqli_num_rows($sql);
if($num>0){
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
<tr>
<td class="center"><?php echo $cnt;?>.</td>
<td class="hidden-xs"><?php echo $row['fullName'];?></td>
<td><?php echo $row['address'];?></td>
<td><?php echo $row['city'];?></td>
<td><?php echo $row['gender'];?></td>
<td><?php echo $row['email'];?></td>
<td><?php echo $row['regDate'];?></td>
<td><?php echo $row['updationDate'];?></b></td>
<td >
												<div class="visible-md visible-lg hidden-sm hidden-xs">
							
													
	<a href="manage-users.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete this user?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
												</div>
												<div class="visible-xs visible-sm hidden-md hidden-lg">
													<div class="btn-group" dropdown is-open="status.isopen">
														<button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
															<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
														</button>
														<ul class="dropdown-menu pull-right dropdown-light" role="menu">
															<li>
																<a href="#">
																	Edit
																</a>
															</li>
															<li>
																<a href="#">
																	Share
																</a>
															</li>
															<li>
																<a href="#">
																	Remove
																</a>
															</li>
														</ul>
													</div>
												</div></td>
</tr>
<?php 
$cnt=$cnt+1;
} } else { ?>
  <tr>
    <td colspan="8"> <h4 align="center">Result for "<?php echo $sdata;?>" not found! </h4></td>

  </tr>
   
<?php } }?></tbody>
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
						

									<div class="row">
								<div class="col-md-12">
									<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Users</span></h5>
									<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>	
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">User ID</th>
												<th>First Name</th>
												<th class="hidden-xs">Last Name</th>
												<th>Address</th>
												<th>Gender </th>
												<th>Telephone </th>
												<th>Username</th>
												<th>User Type</th>
												<th>Creation Date </th>
												<th>Updation Date </th>
												<th>Action</th>
												
											</tr>
										</thead>
										<tbody>
<?php
$sql=mysqli_query($con,"select * from users");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

											<tr>
												<!-- <td class="center"><?php echo $cnt;?>.</td> -->
												<td class="hidden-xs"><?php echo $row['userid'];?></td>
												<td><?php
												if ($row['priv']==1) {													
													echo $adm['fname'];
												} elseif ($row['priv']==2) {
													echo $cle['firstName'];
												} elseif ($row['priv']==3) {
													echo $doc['docfname'];
												} elseif ($row['priv']==4) {
													echo $pha['fname'];
												} elseif ($row['priv']==5) {
													echo $tec['fname'];
												} else
													echo $pat['patfname'];
												?></td>
												<td><?php 
												if ($row['priv']==1) {													
													echo $adm['lname'];
												} elseif ($row['priv']==2) {
													echo $cle['lastName'];
												} elseif ($row['priv']==3) {
													echo $doc['doclname'];
												} elseif ($row['priv']==4) {
													echo $pha['lname'];
												} elseif ($row['priv']==5) {
													echo $tec['lname'];
												} else 
													echo $pat['patlname'];
												?>
												</td>
												<td><?php
												 if ($row['priv']==1) {													
													echo $adm['address'];
												} elseif ($row['priv']==2) {
													echo $cle['address'];
												} elseif ($row['priv']==3) {
													echo $doc['address'];
												} elseif ($row['priv']==4) {
													echo $pha['address'];
												} elseif ($row['priv']==5) {
													echo $tec['address'];
												} else 
													echo $pat['address'];
												 ?>
												 	
												 </td>
												<td><?php 
												if ($row['priv']==1) {													
													echo $adm['gender'];
												} elseif ($row['priv']==2) {
													echo $cle['gender'];
												} elseif ($row['priv']==3) {
													echo $doc['gender'];
												} elseif ($row['priv']==4) {
													echo $pha['gender'];
												} elseif ($row['priv']==5) {
													echo $tec['gender'];
												} else
													echo $pat['gender'];
												?>
												</td>
												<td><?php
												 if ($row['priv']==1) {													
													echo $adm['tele'];
												} elseif ($row['priv']==2) {
													echo $cle['tele'];
												} elseif ($row['priv']==3) {
													echo $doc['tele'];
												} elseif ($row['priv']==4) {
													echo $pha['tele'];
												} elseif ($row['priv']==5) {
													echo $tec['tele'];
												} else
													echo $pat['tele'];
												 ?>
												 </td>
												<td><?php echo $row['username'];?></td>
												<td><?php echo $row['priv'];?></td>
												<td><?php echo $row['regDate'];?></td>
												<td><?php echo $row['updationDate'];?>
												</td>
												<td >
												<div class="visible-md visible-lg hidden-sm hidden-xs">
							
													
	<a href="manage-users.php?id=<?php echo $row['id']?>&del=delete" onClick="return confirm('Are you sure you want to delete?')"class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
												</div>
												<div class="visible-xs visible-sm hidden-md hidden-lg">
													<div class="btn-group" dropdown is-open="status.isopen">
														<button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle" dropdown-toggle>
															<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
														</button>
														<ul class="dropdown-menu pull-right dropdown-light" role="menu">
															<li>
																<a href="#">
																	Edit
																</a>
															</li>
															<li>
																<a href="#">
																	Share
																</a>
															</li>
															<li>
																<a href="#">
																	Remove
																</a>
															</li>
														</ul>
													</div>
												</div></td>
											</tr>
											
											<?php 
$cnt=$cnt+1;
											 }}}}}}}?>
											
											
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
