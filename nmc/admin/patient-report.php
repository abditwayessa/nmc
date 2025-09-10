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
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Patient Reports</title>
		
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
									<h1 class="mainTitle">Patient Reports</h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Patient Report</span>
									</li>
									<li class="active">
										<span>Reports</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<!-- All Patient report start here -->
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">All Patient Report</h5>
												</div>
												<div class="panel-body">
									
													<form role="form" method="post" action="Report/all-patient-reports.php">
														<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
															Generate All Patients Report
														</button>
													</form>
												</div>
											</div>
											<!-- All Patient report end here -->
											<!-- Gender Start here -->
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Patient report based on gender </h5>
												</div>
												<div class="panel-body">
									
													<form role="form" method="post" action="Report/gender-reports.php">
														Please Select Gender
														<div class="clip-radio radio-primary">
<input type="radio" id="rg-male" name="gender" value="Male" checked="true">
<label for="rg-male">
Male
</label>
<input type="radio" id="rg-female" name="gender" value="Female" >
<label for="rg-female">
Female
</label>
</div>
														
														
														<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
															Generate Report
														</button>
													</form>
												</div>
											</div>

											<!-- Gender end here -->
											<!-- Between age report start here -->
												<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Between Age Reports</h5>
												</div>
												<div class="panel-body">
									
													<form role="form" method="post" action="Report/age-report.php">
														<div class="form-group">
															<label for="exampleInputPassword1">
																 Start from
															</label>
					<input type="number" class="form-control" name="start_age" id="fromdate"  required='true'>
														</div>
		
													<div class="form-group">
															<label for="exampleInputPassword1">
																End at
															</label>
					 <input type="number" class="form-control" name="end_age" id="todate"  required='true'>

														</div>	
														
														
														<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
															Generate Report
														</button>
													</form>
												</div>
											</div>
										</div>
											
											</div>
											<!-- Between age report end here -->
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="panel panel-white">
												<div class="panel-heading">
													<h5 class="panel-title">Between Dates Reports</h5>
												</div>
												<div class="panel-body">
									
													<form role="form" method="post" action="Report/date-pat-report.php">
														<div class="form-group">
															<label for="exampleInputPassword1">
																 From Date:
															</label>
					<input type="date" class="form-control" name="fromdate" id="fromdate" value="" required='true'>
														</div>
		
													<div class="form-group">
															<label for="exampleInputPassword1">
																 To Date::
															</label>
					 <input type="date" class="form-control" name="todate" id="todate" value="" required='true'>

														</div>	
														
														
														<button type="submit" name="submit" id="submit" class="btn btn-o btn-primary">
															Generate Report
														</button>
													</form>
												</div>
											</div>
										</div>
											
											</div>
										</div>
									<div class="col-lg-12 col-md-12">
											<div class="panel panel-white">
												
												
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