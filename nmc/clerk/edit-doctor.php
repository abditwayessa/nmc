<?php
session_start();
error_reporting(0);
include('include/config.php');
$did=intval($_GET['id']);// get doctor id
if(isset($_POST['submit']))
{
$docspecialization=$_POST['Doctorspecialization'];
$docfname=$_POST['docfname'];
$doclname=$_POST['doclname'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$tele=$_POST['tele'];
$room=$_POST['room'];
$updationDate=date('y-m-d h:i:sa');

$sql=mysqli_query($con,"Update employee set specilization='$docspecialization',fname='$docfname',lname='$doclname',age='$age',gender='$gender',address='$address', updationDate='$updationDate' where id='$did'");
$sql1=mysqli_query($con, "UPDATE rooms SET roomNo='$room' Where docId='$did'");
if($sql)
{
$msg="Doctor Details updated Successfully";
}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Clerk | Edit Doctor Details</title>
		
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
function valid(){
	var docfname=document.forms["adddoc"]["docfname"].value;
	var doclname=document.forms["adddoc"]["doclname"].value;
	var age=document.forms["adddoc"]["age"].value;
	var address=document.forms["adddoc"]["address"].value;
	var tele=document.forms["adddoc"]["tele"].value;
	var chk_txt = /^[a-zA-Z]+$/;
	var chk_num=/^[0-9]+$/;
	if((docfname.search(chk_txt)==-1)){
		alert("Please insert only character");
		document.adddoc.docfname.focus();
		return  false;
	}
	if((doclname.search(chk_txt)==-1)){
		alert("Please insert only character");
		document.adddoc.doclname.focus();
		return  false;
	}
	if(age<21){
		alert("Age must greaterthan 20");
		document.adddoc.age.focus();
		return  false;
	}
	if((address.search(chk_txt)==-1)){
		alert("Please insert only character");
		document.adddoc.address.focus();
		return  false;
	}
	if ((tele.search(chk_num)==-1)) {
		alert("Please insert only number");
		document.adddoc.tele.focus();
		return false;
	}
	if(tele.length<10 || tele.length>10){
		alert("Telephone number must 10 digits");
		document.adddoc.tele.focus();
		return  false;
	}
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
									<h1 class="mainTitle">Clerk | Edit Doctor Details</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Clerk</span>
									</li>
									<li class="active">
										<span>Edit Doctor Details</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-10">
									<h5 style="color: green; font-size:18px; ">
<?php if($msg) { echo htmlentities($msg);}?> </h5>
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title" style="margin-left: 270px;">Edit Doctor Information</h5>
												</div>
												<div class="panel-body">
									<?php $sql=mysqli_query($con,"select * from employee where id='$did'");
while($data=mysqli_fetch_array($sql))
{
	$sql1=mysqli_query($con, "select * from rooms where docId='$did'");
	while ($roz=mysqli_fetch_array($sql1)) {
?>
													<form role="form" name="adddoc" method="post" onsubmit="return valid()">
														<div class="form-group">
															<label for="DoctorSpecialization" style="margin-left: 200px;">
																Doctor Specialization
															</label>
							<select name="Doctorspecialization" style="margin-left: 200px;" class="col-sm-5" required="required">
					<option value="<?php echo htmlentities($data['specilization']);?>">
					<?php echo htmlentities($data['specilization']);?></option>
<?php $ret=mysqli_query($con,"select * from doctorspecilization");
while($row=mysqli_fetch_array($ret))
{
?>
																<option value="<?php echo htmlentities($row['specilization']);?>">
																	<?php echo htmlentities($row['specilization']);?>
																</option>
																<?php } ?>
																
															</select>
														</div><br><br>

<div class="form-group">
															<label for="doctorname" style="margin-left: 200px;">
																 First Name
															</label>
	<input type="text" style="margin-left: 200px;" name="docfname" class="col-sm-5" value="<?php echo htmlentities($data['fname']);?>" required="required">
														</div><br><br>


<div class="form-group">
															<label for="address" style="margin-left: 200px;">
																 Last Name
															</label>
					<input type="text" style="margin-left: 200px;" name="doclname" class="col-sm-5" value="<?php echo htmlentities($data['lname']);?>" required="required">
														</div><br><br>
<div class="form-group">
															<label for="fess" style="margin-left: 200px;">
																 Age
															</label>
		<input type="text" style="margin-left: 200px;" name="age" class="col-sm-5" required="required"  value="<?php echo htmlentities($data['age']);?>" >
														</div><br><br>
	
<div class="form-group">
              <label class="control-label" style="margin-left: 200px;">Gender: </label><br>
              <?php  if($row['gender']=="Female"){ ?>
              <input type="radio" style="margin-left: 200px;" name="gender" id="gender" value="Female" checked="true">Female &emsp;
              <input type="radio" name="gender" id="gender" value="Male">Male
              <?php } else { ?>
              <label>
              <input type="radio" style="margin-left: 200px;" name="gender" id="gender" value="Male" checked="true">Male&emsp;
              <input type="radio" name="gender" id="gender" value="Female">Female
              </label>
             <?php } ?>
            </div>

<div class="form-group">
									<label for="fess" style="margin-left: 200px;">
																 Address
															</label>
					<input type="text" style="margin-left: 200px;" name="address" class="col-sm-5" required="required"  value="<?php echo htmlentities($data['address']);?>">
														</div><br><br>

<div class="form-group">
									<label for="fess" style="margin-left: 200px;">
																 Telephone
															</label>
					<input type="text" style="margin-left: 200px;" name="tele" class="col-sm-5"  value="<?php echo htmlentities($data['tele']);?>">
														</div><br><br>
<div class="form-group">
															<label for="doctorname" style="margin-left: 200px;">
																 Room No
															</label>
	<input type="text" style="margin-left: 200px;" name="room" class="col-sm-5" value="<?php echo htmlentities($roz['roomNo']);?>" required="required">
														</div><br><br>														

<div class="form-group">
									<label for="fess" style="margin-left: 200px;">
																 Registered Date
															</label>
					<input type="text" style="margin-left: 200px;" name="regDate" class="col-sm-5" readonly="readonly" value="<?php echo htmlentities($data['regDate']);?>">
														</div><br><br>


														
														<?php } }?>
														
														
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
	<img src="images/images-3.jpg" style="height: 770px;width: 600px;">
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
