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
		<title>Admin  | News</title>

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
									<h1 class="mainTitle">Post News </h1>
																	</div>
								<ol class="breadcrumb">
									<li>
										<span>Web Management</span>
									</li>
									<li class="active">
										<span>Post News</span>
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
<h5 class="panel-title">POST NEWS</h5>
</div>
<div class="panel-body">
<form action="" class="form-horizontal" id="form_sample_1" method="post" enctype="multipart/form-data">

									             <?php

				            if (isset($_POST['post_news'])){

										$title=$_POST['title'];
										$content = $_POST['content'];
										$date = date("Y-m-d h:m");
                    $post_by="Admin";
										$userids=$_SESSION['userid'];
								         $results = mysqli_query($con, "SELECT * FROM news WHERE userid='$userids' ");
								         $num_rows = mysqli_num_rows($results);
									     $rows=mysqli_fetch_array($results);
									         $fortitle =$rows["title"];
											 $forcontent=$rows["content"];
                               if($fortitle==$title && $forcontent==$content){
							   echo '<div class="alert alert-dismissable alert-danger" style="margin-top:-20px;">';
												echo '<strong>'.'<center>'."You have already posted this News ! ".'</center>'.'<strong>';
												echo '</div>';
							   } else{
		$posted=mysqli_query($con, "INSERT INTO news(post_date,posted_by,userid,title,content) values('$date','$post_by','$userids','$title','$content')");
						if ($posted) {
							echo '<div class="alert alert-dismissable alert-success" style="margin-top:-20px;">';
							echo '<strong>'.'<center>'."Your News to the Users has been post! ".'</center>'.'<strong>';
							echo '</div>';
						} else{
							echo '<div class="alert alert-dismissable alert-fail" style="margin-top:-20px;">';
							echo '<strong>'.'<center>'."Your News not posted ".'</center>'.'<strong>';
							echo '</div>';
								}

							   }
							}?>


                                        <div class="form-body">
                                           <div class="form-group form-md-line-input">
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">News Title
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <input type="text" class="form-control" placeholder="" name="title" id="title" required>
                                                    <div class="form-control-focus"> </div>
                                                    <span class="help-block">Enter the title for this News</span>
                                                </div>
                                            </div>
                                            <div class="form-group form-md-line-input">
                                                <label class="col-md-3 control-label" for="form_control_1">News Body
                                                    <span class="required">*</span>
                                                </label>
                                                <div class="col-md-9">
                                                    <textarea class="wysihtml5 form-control" rows="6" name="content" id="content" data-error-container="#editor1_error" required></textarea>
                                                    <div class="form-control-focus"> </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn green" name="post_news" id="post_news" >Post News</button>&nbsp;&nbsp;&nbsp;
                                                    <button type="reset"  class="btn default">Clear Data</button>

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
</div>
</div>
</div>



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
<?php
} ?>
