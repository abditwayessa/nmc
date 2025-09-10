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
		<title>Admin | User Session Logs</title>

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
									<h1 class="mainTitle">Admin  | User Session Logs</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin </span>
									</li>
									<li class="active">
										<span>User Session Logs</span>
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
								<!-- Search start -->
								Search by providing keyword from username, user ID or email address.<br><br>
</label><br>
<form  method="post" name="search">
<input type="text" name="searchdata" id="searchdata" class="col-sm-2" value="" required='true' size="12px">
&emsp;
<button type="submit" name="search" id="submit" style="font-size: 12px;" class="btn btn-green btn-primary">
Search
</button></div>
</form>
<?php
if(isset($_POST['search']))
{

$sdata=$_POST['searchdata'];
  ?>
<h4 align="center">Result against '<?php echo $sdata;?>' keyword </h4>
<table class="table table-hover" id="sample-table-1">
<thead>
<tr>
<th class="center">No</th>
												<th class="hidden-xs">User id</th>
												<th>Username</th>
												<th>User IP</th>
												<th>Login Time</th>
												<th>Logout Time </th>
												<th>Attempt Time <br> (If failed)</th>
												<th> Status </th>
</tr>
</thead>
<tbody>
<?php
$sql=mysqli_query($con,"select * from userlog where username like '%$sdata%' || uid like '%$sdata%' || userip like '%$sdata%' || loginTime like '%$sdata%' || logout like '%$sdata%'");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
	$user_ty = mysqli_query($con, "SELECT * FROM users WHERE userid='".$row['uid']."'");
	while ($rom = mysqli_fetch_array($user_ty)) {
?>

											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['uid'];?></td>
												<td class="hidden-xs"><a href="users-log-details.php?id=<?php echo $row['uid']."&role".$rom['priv']; ?>">
													<?php echo $row['username'];?></a></td>
												<td><?php echo $row['userip'];?></td>
												<td><?php echo $row['loginTime'];?></td>
												<td><?php echo $row['logout'];?></td>
												<td><?php echo $row['tryDate'];?></td>

												<td>
<?php if($row['status']==1)
{
	echo "Success";
}
else
{
	echo "Failed";
}?>

</td>

											</tr>

											<?php
$cnt=$cnt+1;
}}
echo "	</tbody>";
}else{?>




								<!-- Search End -->
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">No</th>
												<th class="hidden-xs">User id</th>
												<th>Username</th>
												<th>User IP</th>
												<th>Login Time</th>
												<th>Logout Time </th>
												<th>Attempt Time <br> (If failed)</th>
												<th> Status </th>


											</tr>
										</thead>
										<tbody>
<?php
$sql=mysqli_query($con,"select * from userlog ");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
	$user_ty = mysqli_query($con, "SELECT * FROM users WHERE userid='".$row['uid']."' || username='".$row['username']."'");
	while ($rom = mysqli_fetch_array($user_ty)) {
?>

											<tr>
												<td class="center"><?php echo $cnt;?>.</td>
												<td class="hidden-xs"><?php echo $row['uid'];?></td>
												<td class="hidden-xs"><a href="users-log-details.php?id=<?php echo base64_encode($row['uid'])."&role=".base64_encode($rom['priv'])."&un=".base64_encode($rom['username']); ?>">
													<?php echo $row['username'];?></a></td>
												<td><?php echo $row['userip'];?></td>
												<td><?php echo $row['loginTime'];?></td>
												<td><?php echo $row['logout'];?></td>
												<td><?php echo $row['tryDate'];?></td>

												<td>
<?php if($row['status']==1)
{
	echo "Success";
}
else
{
	echo "Failed";
}?>

</td>

											</tr>

											<?php
$cnt=$cnt+1;
}}}?>


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
