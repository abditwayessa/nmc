<?php
define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS' ,'');
define('DB_NAME', 'national');
$con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
// Check connection
if (mysqli_connect_errno())
{
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if (isset($_POST['submit'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$query = mysqli_query($con, "INSERT INTO employee(id, name) VALUES ('$id', '$name');");
	$que = mysqli_query($con, "INSERT INTO account(id,username, password) VALUES ((SELECT id FROM employee WHERE name='$name'), '$username', '$password')");
	if ($query && $que) {
		echo '<script>alert("Done");</script>';
	}else{
		echo '<script>alert("Not Done");</script>';		
	}
}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
	<form method="post">
		employee registration <br><br>
		ID: <input type="number" name="id"><br><br>
		Name: <input type="text" name="name"><br><br>
		Username: <input type="text" name="username"><br><br>
		Password: <input type="password" name="password"><br><br>
		<input type="submit" name="submit" value="Save"><br><br>

	</form>
</body>
</html>