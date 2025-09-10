<?php
session_start();
error_reporting(0);
include ("include/config.php");
include ("../include/web.php");
$messages = "";
if (isset($_POST['submit'])) {
	$pow = md5($_POST['password']);
	if ($_POST['username'] == "newuser1" && $pow == "MTIzNDU2") {
		$newuser = mysqli_query($con, "SELECT userid FROM users WHERE username='newuser1' AND password='MTIzNDU2'");
		while ($row = mysqli_fetch_array($newuser)) {
			header("location:new-users.php?sdatas=" . md5($row['userid']) . "");
		}

	} else {
		echo '<script type="text/javascript"> alert("hoooray!");</script>';

		$sql = mysqli_query($con, "SELECT * FROM users WHERE username='" . $_POST['username'] . "' and password='" . md5($_POST['password']) . "'");
		$num = mysqli_num_rows($sql);
		if ($num == 1) {
			while ($row = mysqli_fetch_array($sql)) {
				$priv = $row["priv"];
				if ($row['status'] == 1) {
					if ($priv == 1) {
						$_SESSION["username"] = $row["username"];
						$_SESSION["userid"] = $row["userid"];
						$uip = $_SERVER['REMOTE_ADDR'];
						$status = 1;
						$ldate = date('d-m-Y h:i:s A', time());
						$log = mysqli_query($con, "insert into userlog(uid,username,userip,loginTime,status) values('" . $_SESSION['userid'] . "','" . $_SESSION['username'] . "','$uip','$ldate','$status')");
						$active = mysqli_query($con, "UPDATE users SET active_now='1' WHERE username='" . $_POST['username'] . "'");
						header("location:admin/dashboard.php");
					}
					if ($priv == 2) {
						$_SESSION["username"] = $row["username"];
						$_SESSION["userid"] = $row["userid"];
						$uip = $_SERVER['REMOTE_ADDR'];
						$status = 1;
						$ldate = date('d-m-Y h:i:s A', time());
						$log = mysqli_query($con, "insert into userlog(uid,username,userip,loginTime,status) values('" . $_SESSION['userid'] . "','" . $_SESSION['username'] . "','$uip','$ldate','$status')");
						$active = mysqli_query($con, "UPDATE users SET active_now='1' WHERE username='" . $_POST['username'] . "'");
						header("location:clerk/dashboard.php");
					}
					if ($priv == 3) {
						$_SESSION["username"] = $row["username"];
						$_SESSION["userid"] = $row["userid"];
						$uip = $_SERVER['REMOTE_ADDR'];
						$status = 1;
						$ldate = date('d-m-Y h:i:s A', time());
						$log = mysqli_query($con, "insert into userlog(uid,username,userip,loginTime,status) values('" . $_SESSION['userid'] . "','" . $_SESSION['username'] . "','$uip','$ldate','$status')");
						$active = mysqli_query($con, "UPDATE users SET active_now='1' WHERE username='" . $_POST['username'] . "'");
						header("location:doctor/dashboard.php");
					}
					if ($priv == 4) {
						$_SESSION["username"] = $row["username"];
						$_SESSION["userid"] = $row["userid"];
						$uip = $_SERVER['REMOTE_ADDR'];
						$status = 1;
						$ldate = date('d-m-Y h:i:s A', time());
						$log = mysqli_query($con, "insert into userlog(uid,username,userip,loginTime,status) values('" . $_SESSION['userid'] . "','" . $_SESSION['username'] . "','$uip','$ldate','$status')");
						$active = mysqli_query($con, "UPDATE users SET active_now='1' WHERE username='" . $_POST['username'] . "'");
						header("location:pharm/dashboard.php");
					}
					if ($priv == 5) {
						$_SESSION["username"] = $row["username"];
						$_SESSION["userid"] = $row["userid"];
						$uip = $_SERVER['REMOTE_ADDR'];
						$status = 1;
						$ldate = date('d-m-Y h:i:s A', time());
						$log = mysqli_query($con, "insert into userlog(uid,username,userip,loginTime,status) values('" . $_SESSION['userid'] . "','" . $_SESSION['username'] . "','$uip','$ldate','$status')");
						$active = mysqli_query($con, "UPDATE users SET active_now='1' WHERE username='" . $_POST['username'] . "'");
						header("location:tech/dashboard.php");
					}
					if ($priv == 6) {
						$_SESSION["username"] = $row["username"];
						$_SESSION["userid"] = $row["userid"];
						$uip = $_SERVER['REMOTE_ADDR'];
						$status = 1;
						$ldate = date('d-m-Y h:i:s A', time());
						$log = mysqli_query($con, "insert into userlog(uid,username,userip,loginTime,status) values('" . $_SESSION['userid'] . "','" . $_SESSION['username'] . "','$uip','$ldate','$status')");
						$active = mysqli_query($con, "UPDATE users SET active_now='1' WHERE username='" . $_POST['username'] . "'");
						header("location:dashboard.php");
					}
					if ($priv == 7) {
						$_SESSION["username"] = $row["username"];
						$_SESSION["userid"] = $row["userid"];
						$uip = $_SERVER['REMOTE_ADDR'];
						$status = 1;
						$ldate = date('d-m-Y h:i:s A', time());
						$log = mysqli_query($con, "insert into userlog(uid,username,userip,loginTime,status) values('" . $_SESSION['userid'] . "','" . $_SESSION['username'] . "','$uip','$ldate','$status')");
						$active = mysqli_query($con, "UPDATE users SET active_now='1' WHERE username='" . $_POST['username'] . "'");
						header("location:radiologist/dashboard.php");
					}
				} else {
					$_SESSION['username'] = $_POST['username'];
					$uip = $_SERVER['REMOTE_ADDR'];
					$status = 0;
					$tryDate = date('d-m-Y h:i:s A', time());
					mysqli_query($con, "insert into userlog(username,userip,tryDate,status) values('" . $_SESSION['username'] . "','$uip','$tryDate','$status')");
					echo '<script type="text/javascript"> alert("Sorry! Your account is deactivated! Contact system administrator.");</script>';
				}
			}
		} else {
			$_SESSION['username'] = $_POST['username'];
			$uip = $_SERVER['REMOTE_ADDR'];
			$status = 0;
			$tryDate = date('d-m-Y h:i:s A', time());
			mysqli_query($con, "insert into userlog(username,userip,tryDate,status) values('" . $_SESSION['username'] . "','$uip','$tryDate','$status')");
			echo '<script type="text/javascript">';
			echo 'alert("The Combination of username and password is incorrect")';
			echo '</script>';
		}
	}
}
?>
<html lang="en">

<head>
	<title>Login</title>
	<meta charset="utf-8" />
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<meta content="" name="description" />
	<meta content="" name="author" />
	<link
		href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
		rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
	<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
	<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
	<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
	<link rel="stylesheet" href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/plugins.css">
	<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
	<!--header-->
	<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="../css/responsiveslides.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
	<script src="../js/responsiveslides.min.js"></script>
	<script type="text/javascript">
		function ValidateForm() {
			var username = document.forms["logform"]["username"].value;
			var password = document.forms["logform"]["password"].value;
			var chk_txt = /^[a-z0-9]+$/;
			if (username == "") {
				alert("Please enter your username!");
				document.logform.username.focus();
				return false;
			}
			if ((username.search(chk_txt) == -1)) {
				alert("Please enter small alphabet and digit characters!");
				document.logform.username.focus();
				return false;
			}
			if (password == "" || password.length < 6) {
				alert("Please enter your password! Your password must equal or greaterthan 6.");
				document.logform.password.focus();
				return false;
			}
		}
	</script>
</head>

<body class="login">
	<div class="header">
		<div class="wrap">
			<!--start-logo-->
			<div class="logo">

				<a href="index.php" style="font-size: 30px;"><?php echo $titles; ?></a>
			</div>
			<!--end-logo-->
			<!--start-top-nav-->
			<div class="top-nav">
				<ul>
					<li><a href="../index.php">Home</a></li>
					<li class="active"><a href="index.php">Login</a></li>
					<li><a href="new-user.php">Signup</a></li>
					<li><a href="../contact.php">contact us</a></li>
				</ul>
			</div>
			<div class="clear"> </div>
			<!--end-top-nav-->
		</div>
		<!--end-header-->
	</div>
	<div class="row">
		<div class="main-login col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="logo margin-top-30">
				<h2 align="center"></h2>
			</div><br><br><br><br><br>
			<div class="box-login">
				<center>
					<form name="logform" onsubmit="return ValidateForm()" method="post">
						<fieldset>
							<legend style="margin-left: 150px;">
								Sign in to your account
							</legend>
							<br><br>
							<p style="margin-left: 0px;">
								Please enter your username and password
								<br><br><br>
								<span style='color:green'>

								</span>
							</p>
							<div class="form-group">
								<span class="input-icon" style="margin-left: 150px;">
									<input type="text" style="color:black;" class="col-sm-8" name="username"
										id="username" onBlur="userAvailability()" placeholder="Username"
										required="true">
									<i class="fa fa-user"></i> </span><br><br>
								<span id="user-availability-status1" style="margin-left: 0px; font-size:12px;"></span>
							</div>
							<br>
							<div class="form-group ">
								<span class="input-icon" style="margin-left: 150px;">
									<input type="password" style="color:black;" class="col-sm-8" name="password"
										id="password" onBlur="passCheck()" placeholder="Password">
									<i class="fa fa-lock"></i></span><br><br>
								<span id="user-availability-status2" style="margin-left: 0px; font-size:12px;"></span>
								<br /><br>
								<a href="forgot-password.php">
									Forgot Password ?
								</a>
								</span>
							</div>
							<div style="margin-left: 0px; right:-50%">


								<button type="submit" name="submit" id="submit" align="right" class="btn btn-green">
									&emsp;Login <i class="fa fa-arrow-circle-right"></i>&emsp;
								</button>&emsp;&emsp;&emsp;&emsp;
								<button type="reset" name="clear" align="left" class="btn btn-red">
									Clear <i class="fa fa-arrow-circle-left"></i>
								</button>
							</div>

						</fieldset>
					</form>
				</center>
			</div>

		</div>
	</div>
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/modernizr/modernizr.js"></script>
	<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script src="vendor/switchery/switchery.min.js"></script>
	<script src="vendor/jquery-validation/jquery.validate.min.js"></script>

	<script src="assets/js/main.js"></script>

	<script src="assets/js/login.js"></script>
	<script>
		jQuery(document).ready(function () {
			Main.init();
			Login.init();
		});
	</script>
	<br><br><br><br><br><br><br><br>
	<div class="footer">
		<div class="wrap">
			<div class="footer" align="center">


				<center><b>&copy;<?php echo $footer; ?></b></center><br />
				<a href="<?php echo $facebook; ?>"><img src="images/icon-1.png" style="width: 40px;" alt="facebook">
					<a href="<?php echo $twitter; ?>"><img src="images/icon-2.png" style="width: 40px;" alt="twitter">
						<a href="<?php echo $linkedin; ?>"><img src="images/icon-3.png" style="width: 40px;"
								alt="linkedin">
							<a href="<?php echo $telegram; ?>"><img src="images/icon-6.png" style="width: 40px;"
									alt="telegram"><br />
			</div>

			<div class="clear"> </div>
		</div>
	</div>
	<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/login.js"></script>
	<script>
		jQuery(document).ready(function () {
			Main.init();
			Login.init();
		});
	</script>

	<script>
		function userAvailability() {
			$("#loaderIcon").show();
			jQuery.ajax({
				url: "check_users.php",
				data: 'username=' + $("#username").val(),
				type: "POST",
				success: function (data) {
					$("#user-availability-status1").html(data);
					$("#loaderIcon").hide();
				},
				error: function () { }
			});
		}

		function passCheck() {
			$("#loaderIcon").show();
			jQuery.ajax({
				url: "check_pass.php",
				data: 'password=' + $("#password").val(),
				type: "POST",
				success: function (data) {
					$("#user-availability-status2").html(data);
					$("#loaderIcon").hide();
				},
				error: function () { }
			});
		}
	</script>
</body>
<!-- end: BODY -->

</html>