<?php 
require_once("../include/config.php");
if(!empty($_POST["age"])) {
	// $age= $_POST["age"];
if($_POST['age']>100)
{
echo "<span style='color:red'> This email address is using by other user</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else{
	
	echo "<span style='color:green'> This email address ok</span>";
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
} else{
	echo "<span style='color:red'> This email address is using by other user</span>";

}


?>
