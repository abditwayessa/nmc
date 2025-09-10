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
$did=intval($_GET['userid']);
if(isset($_POST['submit']))
{
$email=$_POST['email'];
$username=$_POST['username'];
$priv=$_POST['priv'];
$updationDate=date('y-m-d h:i:sa');
$chkun=mysqli_query($con, "Select * from users where username='$username'");
$num=mysqli_num_rows($chkun);
if($num<1){
$chkem=mysqli_query($con, "SELECT * FROM users WHERE email='$email' and");
$num2=mysqli_num_rows($chkem);
	if($num2<1){
		$sql=mysqli_query($con,"Update users set username='$username',email='$email',priv='$priv', updationDate='$updationDate' where userid='$did'");
				echo '<script type="text/javascript">alert("User updated Successfully");</script>';
			} else {
			echo '<script type="text/javascript">alert("Email already exist!");</script>';
		}
} else {
echo "<script>alert('Users already exist!');</script>";
}
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
<script type="text/javascript">
	//Username
function usernameAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "validation/check_users_edit.php",
data:'username='+$("#username").val(),
type: "POST",
success:function(data){
$("#username-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
//Email
function emailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "validation/check_email_edit.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#email-availability-status1").html(data);
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
						<!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
					
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Update User Information</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Admin</span>
									</li>
									<li class="active">
										<span>Update user information</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white" >
							<div class="row">
								<div class="col-md-10">
									<h5 style="color: green; font-size:18px; ">
<?php if($msg) { echo htmlentities($msg);}?> </h5>
									<div class="row margin-top-50">
										<div class="col-lg-8 col-md-12" >
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title" style="margin-left: 270px;">Edit user info</h5>
												</div>
												<div class="panel-body">
									<?php $sql=mysqli_query($con,"select * from users where userid='$did'");
while($data=mysqli_fetch_array($sql))
{
?>
<p>
<h3 style="margin-left: 200px;margin-right: 200px;background-color: #D3D3D3"><?php echo htmlentities($data['username']);?>'s Profile</h3>
<p style="margin-left: 200px;"><b>Profile Reg. Date: </b><?php echo htmlentities($data['regDate']);?></p>
<?php if($data['updationDate']){?>
<p style="margin-left: 200px;"><b>Profile Last Updation Date: </b><?php echo htmlentities($data['updationDate']);?></p>
<?php } ?>
</p>
<hr />
													<form role="form" name="adddoc" method="post" onSubmit="return valid();">
														<div class="form-group">
<label for="doctorname" style="margin-left: 200px;">
Username
</label>
<input type="text" style="margin-left: 200px;" name="username" id="username" onBlur="usernameAvailability()" class="col-sm-5"  value="<?php echo htmlentities($data['username']);?>" required="true"><br>
<span id="username-availability-status1" style="margin-left: 200px;font-size:15px;"></span>
</div>

<div class="form-group">
															<label for="doctorname" style="margin-left: 200px;">
																 Email
															</label>
	<input type="email" style="margin-left: 200px;" name="email" id="email" onBlur="emailAvailability()" class="col-sm-5" value="<?php echo htmlentities($data['email']);?>" required="required"><br>
	<span id="email-availability-status1" style="margin-left: 200px;font-size:15px;"></span>

														</div>

														<div class="form-group">
<label for="DoctorSpecialization" style="margin-left: 200px;">
Account Type
</label>
<select name="priv" class="col-sm-5" required="required" style="margin-left: 200px;">
<option value="<?php echo htmlentities($data['priv']);?>" style="background-color: #E8E8E8;" >
	<?php if ($data['priv']==1){
	echo htmlentities("Admin");
} elseif ($data['priv']==2) {
	echo htmlentities("Clerk");
} elseif ($data['priv']==3) {
	echo htmlentities("Doctor");
} elseif ($data['priv']==4) {
	echo htmlentities("Pharmacist");
} elseif ($data['priv']==5) {
	echo htmlentities("Technician");
} else
	echo htmlentities("Patient");

	?></option>
<?php $ret=mysqli_query($con,"select * from privilege");
while($row=mysqli_fetch_array($ret))
{
?>
<option value="<?php echo htmlentities($row['id']);?>">
<?php 
echo htmlentities($row['name']);?>
</option>
<?php } ?>
</select>
</div><br><br>
<div class="form-group">
									<label for="fess" style="margin-left: 200px;">
																 Registered Date
															</label>
					<input type="text" style="margin-left: 200px;" name="regDate" class="col-sm-5" readonly="readonly" value="<?php echo htmlentities($data['regDate']);?>">
														</div>

<br><br><br>
														
														<?php } ?>
														
														&emsp;&emsp;&emsp;&emsp;
														<button type="submit" style="margin-left: 200px;" name="submit" class="btn btn-green btn-primary">
															Update
														</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
<button type="reset" name="" id="submit" class="btn btn-red btn-primary" >
Clear
</button>
													</form>
												</div>
											</div>
										</div><div class="col-lg-4 col-md-4" style="float: right;">
<div class="panel panel-green" >
	<img src="images/images-9.png" style="height: 589px;width: 650px;">
</div>			
</div>
											
											</div>
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
			<>
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