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
<?php
if(isset($_POST['submit']))
{
$docId=$_POST['docId'];
$cardNo=$_SESSION['userid'];
$reasonPat=$_POST['reasonPat'];
$appdate=$_POST['appdate'];
$apptime=$_POST['apptime'];
$postingDate=date('y-m-d h:i:sa');
$userstatus=1;
$docstatus=1;
$query=mysqli_query($con,"insert into appointment(docId,cardNo,appointmentDate,appointmentTime,postingDate,userStatus,doctorStatus,reasonPat) values('$docId','$cardNo','$appdate','$apptime','$postingDate','$userstatus','$docstatus','$reasonPat')");
	if($query)
	{
		echo "<script>alert('Your appointment successfully booked');</script>";
	}

}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Book Appointment</title>
	
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
		<script>
function getdoctor(val) {
	$.ajax({
	type: "POST",
	url: "get_doctor.php",
	data:'specilizationid='+val,
	success: function(data){
		$("#doctor").html(data);
	}
	});
}
</script>	


<script>
function getfee(val) {
	$.ajax({
	type: "POST",
	url: "get_doctor.php",
	data:'doctor='+val,
	success: function(data){
		$("#fees").html(data);
	}
	});
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
									<h1 class="mainTitle"> Book Appointment</h1>
																	</div>
								<ol class="breadcrumb">
									
									<li class="active">
										<span>Book Appointment</span>
									</li>
								</ol>
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
													<h5 class="panel-title" style="margin-left: 200px;">Book Appointment</h5>
													<label style=" margin-left: 200px; color: red; font-size: 18px;">*</label> is required field.

												</div>
												<div class="panel-body">
								<p style="color:red;"><?php echo htmlentities($_SESSION['msg1']);?>
								<?php echo htmlentities($_SESSION['msg1']="");?></p>	
													<form role="form" name="book" method="post" >
														


<div class="form-group">
															<label for="DoctorSpecialization" style="margin-left: 200px;">
																Doctor <label style="color: red; font-size: 15px;">*</label>
															</label><br>
							<select name="docId" style="margin-left: 200px;" class="col-sm-5" onChange="getdoctor(this.value);" required="required">
																<option value="">Select Doctors</option>
<?php $ret=mysqli_query($con,"select * from employee where privilege=3");
while($row=mysqli_fetch_array($ret))
{
?>
																<option value="<?php echo $row['id']; ?>">
				<?php echo htmlentities($row['fname']." ".$row['lname']."(".$row['specilization'].")");?>
																</option>
																<?php } ?>
																
															</select>
														</div><br><br>
														<div class="form-group">
															<label for="AppointmentDate" style="margin-left: 200px;">
																Reason for appointment<label style="color: red; font-size: 15px;">*</label>
															</label><br>
<textarea class="col-lg-5"  style="margin-left: 200px;" name="reasonPat" placeholder="Enter reason of appointment" required="required" ></textarea>
	
														</div><br><br><br>
														
<div class="form-group">
															<label for="AppointmentDate" style="margin-left: 200px;">
																Date<label style="color: red; font-size: 15px;">*</label>
															</label><br>
<input class="col-sm-3 datepicker" style="margin-left: 200px;" name="appdate" required="required" data-date-format="yyyy-mm-dd">
	
														</div><br><br>
														
<div class="form-group">
															<label for="Appointmenttime" style="margin-left: 200px;">
														
														Time<label style="color: red; font-size: 15px;">*</label>
													
															</label><br>
			<input class="col-sm-2" style="margin-left: 200px;" name="apptime" id="timepicker1" required="required">
														</div>	<br><br><br>			
														<button type="submit" style="margin-left: 140px;" name="submit" class="btn btn-green btn-primary">
															Book
														</button>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
														<button type="reset" class="btn btn-red btn-primary">Clear</button>
													</form>
												</div>
											</div>
										</div><div class="col-lg-4 col-md-4" style="float: right;">
<div class="panel panel-green" >
	<img src="images/images-4.jpg" style="height: 523px;">
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

			$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-0d'
});
		</script>
		  <script type="text/javascript">
            $('#timepicker1').timepicker();
        </script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

	</body>
</html>
<?php } ?>