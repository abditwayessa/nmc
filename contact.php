<?php
include_once('nmc/include/config.php');
include("include/web.php");
if(isset($_POST['submit']))
{
$name=$_POST['fullname'];
$email=$_POST['emailid'];
$mobileno=$_POST['mobileno'];
$dscrption=$_POST['description'];
$query=mysqli_query($con,"insert into tblcontactus(fullname,email,contactno,message) value('$name','$email','$mobileno','$dscrption')");
echo "<script>alert('Your information succesfully submitted');</script>";
echo "<script>window.location.href ='contact.php'</script>";

}


?>
<!DOCTYPE HTML>
<html>
	<head>
		<title><?php echo $titles; ?> | Contact us</title>
		<link href="css/style.css" rel="stylesheet" type="text/css"  media="all" />
		<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<!--start-wrap-->

			<!--start-header-->
			<div class="header">
				<div class="wrap">
				<!--start-logo-->
				<div class="logo">
		<a href="index.html" style="font-size: 30px;"><?php echo $titles; ?></a>
				</div>
				<!--end-logo-->
				<!--start-top-nav-->
				<div class="top-nav">
					<ul>
						<li><a href="nmc/index.php">Home</a></li>
						<li><a href="nmc/index.php">Login</a></li>
						<li><a href="nmc/new-user.php">Signup</a></li>
						<li class="active"><a href="contact.php">Contact us</a></li>
					</ul>
				</div>
				<div class="clear"> </div>
				<!--end-top-nav-->
			</div>
			<!--end-header-->
		</div>
		    <div class="clear"> </div>
		   <div class="wrap">
		   	<div class="contact">
		   	<div class="section group">
				<div class="col span_1_of_3">

      			<div class="company_address">
				     	<h2>Our Address  :</h2>
						    	<p><?php echo $zone; ?></p>
						   		<p><?php echo $region; ?></p>
				   		<p>Telephone: <?php echo $telephone; ?></p>
				 	 	<p>Email: <span><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></</span></p>

				   </div>
				</div>
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<br><br>
				  	<h2>Feedback</h2><br><br>
					    <form name="contactus" method="post">
					    	<div>
						    	<span><label>NAME</label></span>
						    	<span><input type="text" class="col-sm-3" name="fullname" required="true" value=""></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input type="email" name="emailid" required="ture" value=""></span>
						    </div>
						    <div>
						     	<span><label>MOBILE.NO</label></span>
						    	<span><input type="text" name="mobileno" required="true" value=""></span>
						    </div>
						    <div>
						    	<span><label>FEEDBACK</label></span>
						    	<span><textarea name="description" required="true"> </textarea></span>
						    </div>
						   <div>
						   		<span>
						   			<input type="submit" name="submit" value="Submit"></span>
						  </div>
					    </form>
				    </div>
  				</div>
			  </div>
			  	 <div class="clear"> </div>
	</div>
	<div class="clear"> </div>
			</div>
	      <div class="clear"> </div>
		    <div class="footer">
		   	 <div class="wrap">
		   	<div class="footer" align="center">


		   			<center><b>&copy;<?php echo $footer; ?> </b></center><br/>
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
