<?php 
require_once("../include/config.php");
if(!empty($_POST["userid"])) {
	$cardNo= $_POST["userid"];
		$result =mysqli_query($con,"SELECT cardNo FROM tblpatient WHERE cardNo='$cardNo'");
		$count=mysqli_num_rows($result);
if($count>0)
{
	$frmUser=mysqli_query($con, "SELECT userid FROM users WHERE userid='$cardNo'");
	$retr=mysqli_num_rows($frmUser);
	if ($retr==1) {
		echo "<span style='color:red'> This user has an account</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
	}else{
echo "<span style='color:green'> Card number is available</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
} else{
	
	echo "<span style='color:red'> This card number doesn't exist.</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
}
}
?>
