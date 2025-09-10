<?php 
require_once("../include/config.php");
if(!empty($_POST["doctorspecilization"])) {
	$doctorspecilization= $_POST["doctorspecilization"];
		$result =mysqli_query($con,"SELECT specilization FROM doctorspecilization WHERE specilization='$doctorspecilization'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> This specilization is already exist!</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> This uspecilization is doesn't exist!</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
