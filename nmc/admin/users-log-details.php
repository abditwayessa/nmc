<?php
session_start();
//error_reporting(0);
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
		<title>Admin | User Log Details</title>

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
									<h1 class="mainTitle">Admin  | User Log Details</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin </span>
									</li>
									<li class="active">
										<span>User Log Details</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">


									<div class="row">
								<div class="col-md-12">

									<p style="color:red;"><?php echo htmlentities($_SESSION['msg']);?>
								<?php echo htmlentities($_SESSION['msg']="");?></p>

<?php
	$username_log_img = base64_decode($_GET['un']);
	$image_sql = mysqli_query($con,"SELECT * FROM users WHERE username='$username_log_img'");
	$image_row=mysqli_fetch_array($image_sql);
	$profile =  $image_row['images'];
 ?>
 <center>
 <img src="../profile/<?php echo $profile; ?>" alt="profile_image" style="border-radius:150px;" ><br><br>
</center>
									<table class="table table-hover" id="sample-table-1">
																						<?php
								$user_id = base64_decode($_GET['id']);
								$role = base64_decode($_GET['role']);
								$username_log = base64_decode($_GET['un']);
								$privilege;
								$username_;
								$login_status;
								if ($user_id=='') {
									$user_name = mysqli_query($con,"SELECT * FROM users WHERE username='$username_log'");
									$test = mysqli_fetch_array($user_name);
									$user_id = $test['userid'];
								}
								if ($role!=6) {
									$sql=mysqli_query($con,"SELECT * from employee where id='$user_id'");
								}else{
									$sql= mysqli_query($con,"SELECT * from tblpatient where cardNo='$user_id'");
								}
														while($row=mysqli_fetch_array($sql))
														{
															$users_sql= mysqli_query($con,"SELECT * FROM users WHERE userid='$user_id'");
															while ($user_row = mysqli_fetch_array($users_sql)) {
																$user_type= mysqli_query($con,"SELECT * FROM privilege WHERE id='".$user_row['priv']."'");
																$re_role = mysqli_fetch_array($user_type);
																$privilege = $re_role['name'];
																$username_ = $user_row['username'];
												$log_sql=mysqli_query($con,"SELECT * FROM userlog WHERE uid='$user_id' || username='$username_'");
												$re_status = mysqli_fetch_array($log_sql);
												$login_status = $re_status['status'];

												?>

											<tr>
												<th class="hidden-xs">Full Name</th>
												<td><?php
												if ($role!=6) {
													echo $row['fname']." ".$row['lname'];
												}else{
													echo $row['patfname']." ".$row['patlname'];
												}
												?></td>
												<th class="hidden-xs">Username</th>
												<td><?php echo $user_row['username']; ?></td>
											</tr>
											 <tr>
												 <th class="hidden-xs">Age</th>
 												<td><?php echo $row['age']; ?></td>
 												<th class="hidden-xs">Email</th>
 												<td><?php echo $user_row['email']; ?></td>
											 	</tr>
											 	<tr>
													<th class="hidden-xs">Address</th>
													<td><?php echo $row['address']; ?></td>
													<th class="hidden-xs">Acc. Registered Date</th>
													<td><?php echo $user_row['regDate']; ?></td>
											</tr>
												<tr>
													<th class="hidden-xs">Telephone</th>
													<td><?php echo $row['tele']; ?></td>
													<th class="hidden-xs">Acc.Updated Date</th>
													<td><?php echo $user_row['updationDate']; ?></td>
											</tr>
											<tr>
												<th class="hidden-xs">Registered Date</th>
												<td><?php echo $row['regDate']; ?></td>
												<th class="hidden-xs">Current Status</th>
												<td><?php
												if ($login_status==1) {
													echo '<span style="color:green;font-weight:bold;">Active</span>';
												}else{
														echo '<span style="color:red;font-weight:bold;">Inactive</span>';
												}
												 ?></td>
											</tr>
											<tr>
												<th class="hidden-xs">Update Date</th>
												<td><?php
												if ($role!=6) {
												 echo $row['updationDate'];
											 }else{
												  echo $row['upDated'];
											 }
												 ?></td>
												<th class="hidden-xs">Account Type</th>
												<td><?php echo $privilege; ?></td>
											</tr>
										<?php  }}?>
									</table>
<h3><b>USER LOG SESSION INFORMATION</b></h3>
<h3><b>********************************************</b></h3>
<table class="table table-hover" id="sample-table-1">
	<thead>
		<tr>
			<th class="center">No</th>
			<th>IP Address</th>
			<th>Login Date & Time</th>
			<th>Logout Date & Time </th>
			<th> Status </th>
			<th>Attempt Time <br> (If failed)</th>
		</tr>
	</thead>
	<tbody>
<?php
$sql=mysqli_query($con,"SELECT * FROM userlog WHERE uid='$user_id' || username='$username_' ORDER BY id DESC");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>

		<tr>
			<td class="center"><?php echo $cnt;?>.</td>
			<td><?php echo $row['userip'];?></td>
			<td><?php echo $row['loginTime'];?></td>
			<td><?php echo $row['logout'];?></td>
			<td><?php if($row['status']==1){
				echo '<span style="color:green;font-weight:bold;">Succeed</span>';
			}else {
				echo '<span style="color:red;font-weight:bold;">Failed</span>';
			} ?></td>
			<td><?php echo $row['tryDate'];?></td>
		</tr>

		<?php
$cnt=$cnt+1;
}?>


	</tbody>
</table>
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
