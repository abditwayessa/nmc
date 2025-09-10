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
$did=intval($_GET['id']);
if(isset($_POST['submit']))
{
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$tele=$_POST['tele'];
$updationDate=date('y-m-d h:i:sa');
$sql=mysqli_query($con,"Update employee set fname='$fname',lname='$lname',age='$age',gender='$gender',address='$address', tele='$tele', updationDate='$updationDate' where id='$did'");
if($sql)
{
$msg="Lab technician's details updated successfully";

}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin Edit | Technician's Details</title>
		
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
	var fname=document.forms["adddoc"]["fname"].value;
	var lname=document.forms["adddoc"]["lname"].value;
	var age=document.forms["adddoc"]["age"].value;
	var address=document.forms["adddoc"]["address"].value;
	var tele=document.forms["adddoc"]["tele"].value;
	var chk_txt = /^[a-zA-Z]+$/;
	if((fname.search(chk_txt)==-1)){
		alert("Please insert only character");
		document.adddoc.fname.focus();
		return  false;
	}
	if((lname.search(chk_txt)==-1)){
		alert("Please insert only character");
		document.adddoc.lname.focus();
		return  false;
	}
	if(age<20){
		alert("Age must greaterthan or equal to 20");
		document.adddoc.age.focus();
		return  false;
	}
	if((address.search(chk_txt)==-1)){
		alert("Please insert only character");
		document.adddoc.address.focus();
		return  false;
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
									<h1 class="mainTitle">Edit Lab Technician's Details</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Manage Lab Technician</span>
									</li>
									<li>
										<span>View Lab Technician Information</span>
									</li>
									<li class="active">
										<span>Edit Lab Technician Details</span>
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
									<div class="row margin-top-50">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title"style="margin-left: 240px;">Edit Lab Technician's info</h5>
												</div>
												<div class="panel-body">
									<?php $sql=mysqli_query($con,"select * from employee where id='$did'");
while($data=mysqli_fetch_array($sql))
{
?>
<h4 style="margin-left: 200px;margin-right: 200px;background-color: #D3D3D3"><?php echo htmlentities($data['fname']);?>'s Information</h4>
<p style="margin-left: 200px;"><b>Information Reg. Date: </b><?php echo htmlentities($data['regDate']);?></p>
<?php if($data['updationDate']){?>
<p style="margin-left: 200px;"><b>Information Last Updation Date: </b><?php echo htmlentities($data['updationDate']);?></p>
<?php } ?>
<hr />
													<form role="form" name="adddoc" method="post" onSubmit="return valid();">

<div class="form-group">
															<label for="doctorname" style="margin-left: 200px;">
																 First Name
															</label><br>
	<input type="text" name="fname" style="margin-left: 200px;" class="col-sm-5" value="<?php echo htmlentities($data['fname']);?>" required="required"><br><br>
														</div>


<div class="form-group">
															<label for="address" style="margin-left: 200px;">
																 Last Name
															</label><br>
					<input type="text" name="lname" style="margin-left: 200px;" class="col-sm-5" value="<?php echo htmlentities($data['lname']);?>" required="required"><br><br>
														</div>
<div class="form-group">
															<label for="fess" style="margin-left: 200px;">
																 Age
															</label><br>
		<input type="text" name="age" style="margin-left: 200px;" class="col-sm-5" required="required"  value="<?php echo htmlentities($data['age']);?>" ><br><br>
														</div>
	
<div class="form-group" style="margin-left: 200px;">
              <label class="control-label">Gender: </label><br>
              <?php  if($row['gender']=="Female"){ ?>
              <input type="radio" name="gender" id="gender" value="Female" checked="true">Female &emsp;
              <input type="radio" name="gender" id="gender" value="Male">Male
              <?php } else { ?>
              <label>
              <input type="radio" name="gender" id="gender" value="Male" checked="true">Male&emsp;
              <input type="radio" name="gender" id="gender" value="Female">Female
              </label>
             <?php } ?>
            </div>

<div class="form-group">
									<label for="fess" style="margin-left: 200px;">
																 Address
															</label><br>
					<input type="text" name="address" style="margin-left: 200px;" class="col-sm-5" required="required"  value="<?php echo htmlentities($data['address']);?>"><br><br>
														</div>

<div class="form-group">
									<label for="fess" style="margin-left: 200px;">
																 Telephone
															</label><br>
					<input type="text" name="tele" style="margin-left: 200px;" class="col-sm-5"  value="<?php echo htmlentities($data['tele']);?>"><br><br>
														</div>

<div class="form-group">
									<label for="fess" style="margin-left: 200px;">
																 Registered Date
															</label><br>
					<input type="text" name="regDate" style="margin-left: 200px;" class="col-sm-5" readonly="readonly" value="<?php echo htmlentities($data['regDate']);?>"><br><br>
														</div>


														
														<?php } ?>
														
														<center>
														<button type="submit" style="margin-left: 200px;" name="submit" class="btn btn-green btn-primary">
															Update
														</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
														<button type="reset" name="clear" id="submit" class="btn btn-red btn-primary">
															Clear
														</button>
													</center>
													</form>
												</div>
											</div>
										</div><div class="col-lg-4 col-md-4" style="float: right;">
<div class="panel panel-green" >
	<img src="images/images-5.jpg" style="height: 740px;width: 650px;">
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