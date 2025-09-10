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
if(isset($_POST['submit']))
{	
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$address=$_POST['address'];
$tele=$_POST['tele'];
$regDate=date('y-m-d h:i:sa');
$priv=7;
$sql=mysqli_query($con,"insert into employee(fname,lname,age,gender,address,tele,regDate,privilege) values('$fname','$lname','$age','$gender','$address','$tele','$regDate','$priv')");
if($sql)
{
echo "<script>alert('Radiologist information added Successfully');</script>";
echo "<script>window.location.href ='manage-radiologist.php'</script>";

}
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Admin | Register Radiologist</title>
		
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
						
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle">Register New Radiologist</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Manage Radiologist</span>
									</li>
									<li class="active">
										<span>Register Radiologist</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-10">
									
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title" style="margin-left: 270px;">Fill new radiologist information</h5>
												</div>
												<div class="panel-body">
									
													<form role="form" name="adddoc" method="post" onSubmit="return valid();">
														

<div class="form-group">
															<label for="doctorname" style="margin-left: 200px;">
																  First Name
															</label><br>
					<input type="text" style="margin-left: 200px;" name="fname" class="col-sm-5"  placeholder="Enter radiologist's first name" required="true">
														</div><br><br>


<div class="form-group">
															<label for="doctorname" style="margin-left: 200px;">
																  Last Name
															</label><br>
					<input type="text" style="margin-left: 200px;" name="lname" class="col-sm-5"  placeholder="Enter radiologist's last name" required="true"></textarea>
														</div><br><br>
<div class="form-group">
															<label for="fess" style="margin-left: 200px;">
																 Age
															</label><br>
					<input type="text" style="margin-left: 200px;" name="age" class="col-sm-5"  placeholder="Enter radiologist's age" required="true">
														</div><br><br>
	<div class="form-group">
<label class="block" style="margin-left: 200px;">
Gender
</label>
<div class="clip-radio radio-primary" style="margin-left: 200px;">
<input type="radio" id="rg-male" name="gender" value="Male" checked="true">
<label for="rg-male">
Male
</label>
<input type="radio" id="rg-female" name="gender" value="Female" >
<label for="rg-female">
Female
</label>
</div>
</div>
<div class="form-group">
									<label for="fess" style="margin-left: 200px;">
																 Address
															</label><br>
					<input type="text" style="margin-left: 200px;" name="address" class="col-sm-5"  placeholder="Enter address" required="true">
														</div><br><br>

<div class="form-group">
									<label for="fess" style="margin-left: 200px;">
																 Telephone Number
															</label><br>
<input type="text" style="margin-left: 200px;" id="docemail" name="tele" class="col-sm-5"  placeholder="Enter telephone number" required="true">
</div><br><br><br>												<center>
													<button type="submit" style="margin-left: 140px;" name="submit" id="submit" class="btn btn-green btn-primary">
															Register
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
	<img src="images/images-6.jpg" style="height: 550px;">
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