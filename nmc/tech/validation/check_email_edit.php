<?php
session_start();
if(!$_SESSION["username"] && !$_SESSION["userid"]){
	header("Location:../index.php");
}
else{
	
	
?>
<?php 
require_once("../include/config.php");
if(!empty($_POST["email"])) {
	$email= $_POST["email"];
		$result =mysqli_query($con,"SELECT email FROM users WHERE email='$email'");
		$count=mysqli_num_rows($result);
		$usemail=mysqli_query($con, "SELECT email FROM users WHERE userid='".$_SESSION['userid']."'");
		while ($uemail=mysqli_fetch_array($usemail)) {
			if ($uemail['email']==$email) {
				echo "<span style='color:blue'></span>";
 				echo "<script>$('#submit').prop('disabled',false);</script>";
			}elseif($count>0)
{
echo "<span style='color:red'> This email address is using by other user</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> This email address ok</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}
}
?>
