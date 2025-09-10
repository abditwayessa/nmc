<?php
session_start();
include('include/config.php');
mysqli_query($con, "UPDATE users SET active_now='0' WHERE username='".$_SESSION['username']."'");
$_SESSION['username']=="";
$ldate=date( 'd-m-Y h:i:s A', time () );
mysqli_query($con,"UPDATE userlog  SET logout = '$ldate' WHERE uid = '".$_SESSION['userid']."' ORDER BY id DESC LIMIT 1");
session_unset();
//session_destroy()
?>
<script language="javascript">
document.location="../index.php";
</script>