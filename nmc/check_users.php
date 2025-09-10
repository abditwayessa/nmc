<?php 
require_once("include/config.php");
if(!empty($_POST["username"])) {
	$username= $_POST["username"];
		$result =mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:green'> Your username is valid.</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
} else{
	
	echo "<span style='color:red'> Your username is invalid.</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
}
}
?>
