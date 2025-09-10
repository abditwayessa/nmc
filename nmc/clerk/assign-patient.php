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

 ?>
<?php 
if (isset($_GET['as'])) {

	$cardNo=$_GET['cardno'];
	$room=rand(1,5);
	$patfname=$_GET['fn'];
	$patlname=$_GET['ln'];

	$docr=mysqli_query($con, "SELECT docId FROM rooms WHERE roomNo='$room'");
while ($doci=mysqli_fetch_array($docr)) {
	$docId=$doci['docId'];
$nots=mysqli_query($con, "INSERT INTO notifications(clerkId, docId, pid, patfname, patlname) VALUES ('".$_SESSION['userid']."', '$docId', '$cardNo', '$patfname', '$patlname')");
if ($nots) {
	echo '<script>alert("Patient assigned successfully!");</script>';
	header("Location: manage-patient.php");
}else{
	echo '<script>alert("Something wents wrong!");</script>';	
}
}
}}
 ?>