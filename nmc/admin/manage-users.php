<?php
session_start();
error_reporting(0);
include ('include/config.php');
?>
<?php
if (!$_SESSION["username"] && !$_SESSION["userid"]) {
	header("Location:../index.php");
} else {


	?>
	<?php
	if (isset($_GET['del'])) {
		$del = mysqli_query($con, "delete from users where userid = '" . $_GET['id'] . "'");
		if ($del) {
			echo '<script type="text/javascript"> alert("Data deleted successfully!"); </script>';
		} else {
			echo '<script type="text/javascript"> alert("Something wents wrong"); </script>';
		}
	}
	if (isset($_GET['dec'])) {
		$dec = mysqli_query($con, "Update users set status='0' where userid='" . $_GET['userid'] . "'");
		if ($dec) {
			echo '<script type="text/javascript"> alert("Account deactivated successfully!"); </script>';
		} else {
			echo '<script type="text/javascript"> alert("Something wents wrong"); </script>';
		}
	}
	if (isset($_GET['act'])) {
		$act = mysqli_query($con, "Update users set status='1' where userid='" . $_GET['userid'] . "'");
		if ($act) {
			echo '<script type="text/javascript"> alert("Account activated successfully!"); </script>';
		} else {
			echo '<script type="text/javascript"> alert("Something wents wrong"); </script>';
		}
	}
	?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Admin | Manage User</title>

		<link
			href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
			rel="stylesheet" type="text/css" />
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
			<?php include ('include/sidebar.php'); ?>
			<div class="app-content">

				<?php include ('include/header.php'); ?>

				<!-- end: TOP NAVBAR -->
				<div class="main-content">
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">User Account</h1>
								</div>
								<ol class="breadcrumb">
									<li>
										<span>Manage Users</span>
									</li>
									<li class="active">
										<span>View User Account</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<form role="form" method="post" name="search">

							<div class="form-group">
								<label for="doctorname">
									<span style="font-weight: bold;font-size: 15px;">
										Account Status Report<br>
										<?php $result = mysqli_query($con, "SELECT * FROM users ");
										$num_rows = mysqli_num_rows($result); {
											?>
											Total Users : <?php echo htmlentities($num_rows);
										} ?>
										<?php $resulta = mysqli_query($con, "SELECT * FROM users WHERE active_now='1'");
										$num_rowsa = mysqli_num_rows($resulta); {
											?>
											<br>
											<input type="text"
												style="color: green;background-color: green;width: 12px; height: 17px;"
												readonly="readonly"> Online Users : <?php echo htmlentities($num_rowsa);
										} ?>
										<?php $resultb = mysqli_query($con, "SELECT * FROM users WHERE active_now='0'");
										$num_rowsb = mysqli_num_rows($resultb); {
											?>
											<br>
											<input type="text"
												style="color: red;background-color: red;width: 12px; height: 17px;"
												readonly="readonly"> Offline Users : <?php echo htmlentities($num_rowsb);
										} ?>
										<?php $resultb = mysqli_query($con, "SELECT * FROM users WHERE status='1'");
										$num_rowsb = mysqli_num_rows($resultb); {
											?>
											<br>
											<input type="text"
												style="color: blue;background-color: blue;width: 12px; height: 17px;"
												readonly="readonly"> Active Account : <?php echo htmlentities($num_rowsb);
										} ?>
										<?php $resultb = mysqli_query($con, "SELECT * FROM users WHERE status='0'");
										$num_rowsb = mysqli_num_rows($resultb); {
											?>
											<br>
											<input type="text"
												style="color: black;background-color: black;width: 12px; height: 17px;"
												readonly="readonly"> Deactive Account :
											<?php echo htmlentities($num_rowsb);
										} ?>
										<br>
										<br><br><br>
									</span>
									Search by providing keyword from username, user ID or email address.<br><br>
								</label><br>
								<input type="text" name="searchdata" id="searchdata" class="col-sm-2" value=""
									required='true' size="12px">
								&emsp;
								<button type="submit" name="search" id="submit" style="font-size: 12px;"
									class="btn btn-green btn-primary">
									Search
								</button>
							</div>
						</form>
						<?php
						if (isset($_POST['search'])) {

							$sdata = $_POST['searchdata'];
							?>

							<table class="table table-hover" id="sample-table-1">
								<thead>
									<tr>
										<th class="center">User ID</th>
										<th>Username</th>
										<th>Email</th>
										<th>User Type </th>
										<th>Creation Date</th>
										<th>Update Date</th>
										<th>Action</th>
										<th>Status</th>
										<th>Change Status</th>
										<th>Active Now</th>
									</tr>
								</thead>
								<tbody style="background-color: #A9A9A9;">
									<?php

									$sql = mysqli_query($con, "select * from users where username like '%$sdata%' || userid like '%$sdata%' || email like '%$sdata%'");
									$num = mysqli_num_rows($sql);
									if ($num > 0) {
										$cnt = 1;
										while ($row = mysqli_fetch_array($sql)) {
											?>
											<tr>
												<!-- <td class="center"><?php echo $cnt; ?>.</td>
 -->
												<td class="center"><?php echo $row['userid']; ?></td>
												<td><?php echo $row['username']; ?></td>
												<td><?php echo $row['email']; ?></td>
												<td>
													<?php
													if ($row['priv'] == 1) {
														echo "Admin";
													} elseif ($row['priv'] == 2) {
														echo "Clerk";
													} elseif ($row['priv'] == 3) {
														echo "Doctor";
													} elseif ($row['priv'] == 4) {
														echo "Pharmacist";
													} elseif ($row['priv'] == 5) {
														echo "Technician";
													} else
														echo "Patient";
													?>
												</td>
												<td><?php echo $row['regDate']; ?></td>
												<td><?php echo $row['updationDate']; ?></td>
												<td>
													<div class="visible-md visible-lg hidden-sm hidden-xs">
														<a href="edit-user.php?userid=<?php echo $row['userid']; ?>"
															class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i
																class="fa fa-pencil"></i></a>

														<a href="manage-users.php?userid=<?php echo $row['userid'] ?>&del=delete"
															onClick="return confirm('Are you sure you want to delete?')"
															class="btn btn-transparent btn-xs tooltips" tooltip-placement="top"
															tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a>
													</div>
													<div class="visible-xs visible-sm hidden-md hidden-lg">
														<div class="btn-group" dropdown is-open="status.isopen">
															<button type="button" class="btn btn-primary btn-o btn-sm dropdown-toggle"
																dropdown-toggle>
																<i class="fa fa-cog"></i>&nbsp;<span class="caret"></span>
															</button>
														</div>
													</div>
												</td>
												<td>
													<?php
													if ($row['status'] == 1) {
														echo "Activated";
													} else {
														echo "Deactivated";
													}
													?>
												</td>
												<td>
													<?php
													if ($row['status'] == 1) {
														?>
														<a href="manage-users.php?userid=<?php echo $row['userid'] ?>&dec=deactive"
															onClick="return confirm('Are you sure you want to deactive the user?')"
															class="btn btn-transparent btn-xs tooltips" tooltip-placement="top"
															tooltip="Remove">Deactive</a><?php } else { ?>
														<a href="manage-users.php?userid=<?php echo $row['userid'] ?>&act=active"
															onClick="return confirm('Are you sure you want to activate the user?')"
															class="btn btn-transparent btn-xs tooltips" tooltip-placement="top"
															tooltip="Remove">Active</a> <?php } ?>
												</td>
												<td>
													<?php
													if ($row['active_now'] == 0) {
														echo '<span style="color:red; font-weight:bold;">No</span>';
													} else {
														echo '<span style="color:green; font-weight:bold;">Yes</span>';
													}
													?>
												</td>
											</tr>
											<?php
											$cnt = $cnt + 1;
										}
									} else { ?>
										<tr>
											<td colspan="9">
												<h4 align="center">Result for "<?php echo $sdata; ?>" not found! </h4>
											</td>

										</tr>

									<?php }
						} ?>
							</tbody>
							<!-- start: BASIC EXAMPLE -->
							<div class="container-fluid container-fullw bg-white">


								<div class="row">
									<div class="col-md-12">
										<h5 class="over-title margin-bottom-15">Manage <span class="text-bold">Users</span>
										</h5>
										<p style="color:red;"><?php echo htmlentities($_SESSION['msg']); ?>
											<?php echo htmlentities($_SESSION['msg'] = ""); ?>
										</p>
										<table class="table table-hover" id="sample-table-1">
											<thead>
												<tr>
													<th class="center">User ID</th>
													<th>Username</th>
													<th>Email</th>
													<th>User Type</th>
													<th>Creation Date </th>
													<th>Updation Date </th>
													<th>Action</th>
													<th>Status</th>
													<th>Change Status</th>
													<th>Active Now</th>
												</tr>
											</thead>
											<tbody>
												<?php
												$sql = mysqli_query($con, "select * from users");
												$cnt = 1;
												while ($row = mysqli_fetch_array($sql)) {
													?>

													<tr>
														<!-- <td class="center"><?php echo $cnt; ?>.</td> -->
														<td class="center"><?php echo $row['userid']; ?></td>
														<td><?php echo $row['username']; ?></td>
														<td><?php echo $row['email']; ?></td>
														<td><?php
														if ($row['priv'] == 1) {
															echo "Admin";
														} elseif ($row['priv'] == 2) {
															echo "Clerk";
														} elseif ($row['priv'] == 3) {
															echo "Doctor";
														} elseif ($row['priv'] == 4) {
															echo "Pharmacist";
														} elseif ($row['priv'] == 5) {
															echo "Technician";
														} else
															echo "Patient";
														?>

														</td>
														<td><?php echo $row['regDate']; ?></td>
														<td><?php echo $row['updationDate']; ?></td>
														</td>
														<td>
															<div class="visible-md visible-lg hidden-sm hidden-xs">
																<a href="edit-user.php?userid=<?php echo $row['userid']; ?>"
																	class="btn btn-transparent btn-xs" tooltip-placement="top"
																	tooltip="Edit"><i class="fa fa-pencil"></i></a>

																<a href="manage-users.php?id=<?php echo $row['userid'] ?>&del=delete"
																	onClick="return confirm('Are you sure you want to delete?')"
																	class="btn btn-transparent btn-xs tooltips"
																	tooltip-placement="top" tooltip="Remove"><i
																		class="fa fa-trash"></i></a>
															</div>
															<div class="visible-xs visible-sm hidden-md hidden-lg">
																<div class="btn-group" dropdown is-open="status.isopen">
																	<button type="button"
																		class="btn btn-primary btn-o btn-sm dropdown-toggle"
																		dropdown-toggle>
																		<i class="fa fa-cog"></i>&nbsp;<span
																			class="caret"></span>
																	</button>
																</div>
															</div>
														</td>
														<td>
															<?php
															if ($row['status'] == 1) {
																echo "Activated";
															} else {
																echo "Deactivated";
															}
															?>
														</td>
														<td>
															<?php
															if ($row['status'] == 1) {
																?>
																<a href="manage-users.php?userid=<?php echo $row['userid'] ?>&dec=deactive"
																	onClick="return confirm('Are you sure you want to deactive the user?')"
																	class="btn btn-transparent btn-xs tooltips"
																	tooltip-placement="top"
																	tooltip="Remove">Deactive</a><?php } else { ?>
																<a href="manage-users.php?userid=<?php echo $row['userid'] ?>&act=active"
																	onClick="return confirm('Are you sure you want to activate the user?')"
																	class="btn btn-transparent btn-xs tooltips"
																	tooltip-placement="top" tooltip="Remove">Active</a> <?php } ?>
														</td>
														<td>
															<?php
															if ($row['active_now'] == 0) {
																echo '<span style="color:red; font-weight:bold;">No</span>';
															} else {
																echo '<span style="color:green; font-weight:bold;">Yes</span>';
															}
															?>
														</td>
													</tr>

													<?php
													$cnt = $cnt + 1;
												} ?>


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
		<?php include ('include/footer.php'); ?>
		<!-- end: FOOTER -->

		<!-- start: SETTINGS -->
		<?php include ('include/setting.php'); ?>

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
			jQuery(document).ready(function () {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>

	</html>
<?php } ?>