<?php 
require_once("../include/config.php");
if(!empty($_POST["username"])) {
	$username= $_POST["username"];
		$result =mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> This username is available. </span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> This username is not available.</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
