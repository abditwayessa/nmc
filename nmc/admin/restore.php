<?php
session_start();
// error_reporting(0);
include('include/config.php');
?>
<?php
if(!$_SESSION["username"] && !$_SESSION["userid"]){
	header("Location:../index.php");
}
else{

if (isset($_POST['restore'])) {
function restoreDatabaseTables($dbHost, $dbUsername, $dbPassword, $dbName, $filePath)
	{
		echo $dbHost;

		echo "";
    // Connect & select the database
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName); 

    // Temporary variable, used to store current query
    $templine = '';
    
    // Read in entire file
    $lines = file($filePath);
    
    $error = '';
    
    // Loop through each line
    foreach ($lines as $line){
        // Skip it if it's a comment
        if(substr($line, 0, 2) == '--' || $line == ''){
            continue;
        }
        
        // Add this line to the current segment
        $templine .= $line;
        
        // If it has a semicolon at the end, it's the end of the query
        if (substr(trim($line), -1, 1) == ';'){

            // Perform the query
            if(!$db->query($templine)){
                $error .= 'Error performing query "<b>' . $templine . '</b>": ' . $db->error . '<br /><br />';
            }
            
            // Reset temp variable to empty
            $templine = '';
        }
    }
    return !empty($error)?$error:true;
 
}	
?>

 <?php
$domain = $_POST['host'];
$dbuser = $_POST['username'];
$dbpass= $_POST['password'];
$dbname="nationalmc";
 $x=0;
 echo "hh";
$conn=mysqli_connect($domain,$dbuser,$dbpass) or die(mysqli_error());
if(mysqli_select_db($conn,$dbname))
$x=1;
else
$x=2;
if($x==2)
{	
mysqli_query("CREATE DATABASE nationalmc") or die(mysqli_error());
		echo "<br>Your Database is Successfully created";
}else if($x==1)

{ 
$filePath  = 'C:\xampp\htdocs\xampp\Nationalmc\nmc\admin\backup\nationalmc.sql';
$restore=restoreDatabaseTables($domain, $dbuser, $dbpass, $dbname, $filePath);
if($restore){
 echo '<script>alert("Database restored Successfully!");</script>';
echo "Daataabeeziin bakka turetti deebi'eera";
} else
 echo"<br>Something wents wrong!";
}

}
 ?>
	
?>
<html lang="en">
	<head>
		<title>Admin | Restore Database</title>
		
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
									<h1 class="mainTitle"><i class="fa fa-cloud-upload" style="font-size: 30px;"></i>Restore Database</h1>
																	</div>
								<ol class="breadcrumb">
									
									<li>
										<span>Database </span>
									</li>
									<li class="active">
										<span>Restore Database</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
						

									<div class="row">
								<div class="col-md-12">
									<h5 class="over-title margin-bottom-15"><span class="text-bold"></span></h5>

	<form method="POST" name="restores">
		<div class="form-group">
			<label for="doctorname">
			Host Address<label style="color: red; font-size: 18px;">*</label>
			</label><br>
			<input type="text" name="host" class="col-sm-3"  placeholder="Enter host address" required="true">
		</div>	<br>
		<div class="form-group">
			<label for="doctorname">
			Username<label style="color: red; font-size: 18px;">*</label>
			</label><br>
			<input type="text" name="username" class="col-sm-3"  placeholder="Enter username" required="true">
		</div>	<br>
		<div class="form-group">
			<label for="doctorname">
			Password<label style="color: red; font-size: 18px;">*</label>
			</label><br>
			<input type="password" name="password" class="col-sm-3"  placeholder="*******************">
		</div>	<br><br>&emsp;&emsp;
<input type="submit" class="btn btn-green btn-primary" id="btn" name="restore" value="Restore">&emsp;&emsp;&emsp;&emsp;
<input type="reset" class="btn btn-red btn-danger" name="reset" value="Clear">
	</form>
	
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