<?php
include("include/config.php");
include ("include/web.php");
 ?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $titles; ?></title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/responsiveslides.css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="js/responsiveslides.min.js"></script>
		  <script>
		    // You can also use "$(window).load(function() {"
			    $(function () {

			      // Slideshow 1
			      $("#slider1").responsiveSlides({
			        maxwidth: 16,
			        speed: 2
			      });
			});
		  </script>
		  <style type="text/css">
		  	.media_locate{
		  		background-image: url('images/image-1.webp');
		  		-webkit-background-size: cover;
		  		-moz-background-size: cover;
		  		-o-background-size: cover;
		  		background-repeat: no-repeat;
		  		background-size: cover;
		  		color-interpolation: red;
		  		-webkit-background-size: cover;

		  	}
		  	.timetable{
	display: inline-block;
	float:left;
	margin: 1% 0 1% 1.6%;
	background: skyblue;
	border: 1px solid deepskyblue;
	color: white;
	font-size: 25px;
	font-weight: bolder;

		  	}
		  </style>
	</head>
	<body>
		<!--start-wrap-->

			<!--start-header-->
			<div class="header">
				<div class="wrap">
				<!--start-logo-->
				<div class="logo">
					<a href="index.html" style="font-size: 30px;">
<?php echo $titles; ?></a>
				</div>
				<!--end-logo-->
				<!--start-top-nav-->
				<div class="top-nav">
					<ul>
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="nmc/index.php">Login</a></li>
						<li><a href="nmc/new-user.php">Signup</a></li>
						<li><a href="contact.php">contact us</a></li>
					</ul>

				</div>
				<div class="clear"> </div>
				<!--end-top-nav-->
			</div>
			<!--end-header-->
		</div>
		<br/><br/>
		<div class="media_locate">


		<div class="clear">
				<!--start-image-slider---->
					<div class="image-slider">
						<!-- Slideshow 1 -->
					    <ul class="rslides" id="slider1">
					              <div id="slider" class="slider">


                    </div>

					    </ul>
						 <!-- Slideshow 2 -->
					</div>
					<!--End-image-slider---->
		</div>
		<div class="content-grids">
		    	<div class="wrap">
		    	<div class="section group">
					<span style="color: antiquewhite; font-size:67px;"><center><?php echo $titles; ?></center></span>
			</div>
		    </div>
		   </div>
		<div class="wrap">
		   <div class="content-box">
		   <div class="section group">
				<div class="col_1_of_3 span_1_of_3 frist">
					<img src="images/images-1.jpg">
				<span style="color:red; font-weight:bolder;"><center><?php echo $titles; ?> takes the privacy of patient medical records and the security of personal information very seriously.</center> </span>
				</div>
				<div class="col_1_of_3 span_1_of_3 second">
					<img src="images/images-6.jpg" style="height: 320px;">
				<span style="color:red; font-weight:bolder;"><center>Welcome to <?php echo $titles; ?>. This clinic will provide secure patient portal website. That can help you to access your own medical records at any where and at any time.</center> </span>
				</div>
				<div class="col_1_of_3 span_1_of_3 frist">
					<img src="images/images-3.jpg" style="height: 320px;">
					<span style="color:red; font-weight:bolder;"><center><?php echo $titles; ?> is providing leading healthcare for the community, basically for people around western part of the country.</center> </span>

				</div>
			</div>
		   </div>
		   </div>
		    <div class="clear"> </div>
		    <!-- Backgraound image end here -->

		   <!--  <div class="content-grids">
		    	<div class="wrap">
		    	<div class="section group">
					<div class="listview_1_of_3 images_1_of_3">
					<div class="listimg listimg_1_of_2">
						  <img src="images/grid-img2.png">
					</div>
					<div class="text list_1_of_2">
						  <h3>It minimize time usagess</h3>
				     </div>
				     <div class="text list_1_of_2">
						hh
						  <div class="button"><span><a href="nmc/index.php">Click Here</a></span></div>
				     </div>
				</div>
			</div>
		    </div>
		   </div> --></div>

		   <div class="wrap"><br>
		   <!-- <div class="content-box"> -->
		   	<img src="images/covid.jpg">
		   <div class="section group">

				<div class="col_1_of_3 span_1_of_3 frist">
					<img src="images/images-5.jpg">
					<center><span style="font-weight: bolder;">Appointment</span><br></center>
				You can book an appointment.<br>
				<center><a href="nmc/index.php">Make an Appointment</a></center>
				</div>
				<div class="col_1_of_3 span_1_of_3 frist">
					<img src="images/images-4.jpg">
				<center><span style="font-weight: bolder;">Working Time</span><br></center>
				24 hours in a day and 7 day in a week
				</div>
				<div class="col_1_of_3 span_1_of_3 frist">
					<img src="images/images-7.jpg">
					<center><span style="font-weight: bolder;">Medical History</span><br></center>
					You can access your medical history at any where and at any time.<br>
					<center><a href="nmc/index.php">Medical History	</a></center>

				</div>
				<!-- Background image ends here -->
				<div class="container-fluid container-fullw bg-white">
				<div class="col-sm-4">

								</div>
			</div>
		   </div>
		   </div>
		   <div class="clear"> </div>
		   <div class="footer">
		   	 <div class="wrap">
		   	<div class="footer" align="center">

		   		<span style="color: blue; font-family: Arial; font-weight: bolder;">ADDRESS</span><br/>
		   		<?php echo $zone." ".$region; ?><br/>
		   			<center><b>&copy;<?php echo $footer; ?></b></center><br/>
		   		<a href="<?php echo $facebook; ?>"><img src="images/icon-1.png"  style="width: 40px;" alt="facebook">
		   		<a href="<?php echo $twitter; ?>"><img src="images/icon-2.png" style="width: 40px;" alt="twitter">
		   		<a href="<?php echo $linkedin; ?>"><img src="images/icon-3.png" style="width: 40px;" alt="linkedin">
		   		<a href="<?php echo $telegram; ?>"><img src="images/icon-6.png" style="width: 40px;" alt="telegram"><br/>
		   	</div>

		   	<div class="clear"> </div>
		   </div>
		   </div>
		<!--end-wrap-->
	</body>
</html>
