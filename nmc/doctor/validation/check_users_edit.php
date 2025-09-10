<?php
session_start();
if(!$_SESSION["username"] && !$_SESSION["userid"]){
	header("Location:../index.php");
}
else{
	
	
?>
<?php 
require_once("../include/config.php");
if(!empty($_POST["username"])) {
	$username= $_POST["username"];
		$result =mysqli_query($con,"SELECT username FROM users WHERE username='$username'");
		$count=mysqli_num_rows($result);
		$usnma=mysqli_query($con, "SELECT username FROM users WHERE userid='".$_SESSION['userid']."'");
		while ($uname=mysqli_fetch_array($usnma)) {
			if ($uname['username']==$username) {
				echo "<span style='color:blue'></span>";
 				echo "<script>$('#submit').prop('disabled',false);</script>";
			}elseif($count>0)
{	
	echo "<span style='color:red'> This username is taken by other user. </span>";
	echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	echo "<span style='color:green'> This username is not taken.</span>";
	echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}
}
?>
