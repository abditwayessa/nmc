<?php
require_once("include/config.php");
if(!empty($_POST["password"])) {
	$password= $_POST["password"];
if(strlen($password)<6)
{
echo "<span style='color:red'> Your password must greaterthan or equal to 6!</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	echo "<span style='color:green'>Good</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}


?>
