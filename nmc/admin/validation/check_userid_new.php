<?php
require_once("../include/config.php");
if(!empty($_POST["userid"])) {
	$userid= $_POST["userid"];
		$result =mysqli_query($con,"SELECT userid FROM users WHERE userid='$userid'");
		$count=mysqli_num_rows($result);
if($count>0)
{
echo "<span style='color:red'> This user has an account!</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	$emp=mysqli_query($con, "SELECT * FROM employee WHERE id='$userid'");
	if (mysqli_num_rows($emp)!=1) {
		echo "<span style='color:red'> ID doesn't exist!</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
	}else{
	echo "<span style='color:green'> This user doesn't have an account!</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}}
}
?>
