<?php
include '../includes/connect.php';
$success=false;

$username = $_POST['username'];
$password = $_POST['password'];

$result = mysqli_query($con, "SELECT * FROM users WHERE username='$username' AND password='$password' AND administrator='1'");
while($row = mysqli_fetch_array($result))
{
	$success = true;
	$user_id = $row['userID'];
	$name = $row['name'];
	$role= $row['administrator'];
}
if($success == true)
{
	session_start();
	$_SESSION['admin_sid']=session_id();
	$_SESSION['user_id'] = $user_id;
	$_SESSION['administrator'] = $role;
	$_SESSION['name'] = $name;

	header("location: ../dashboard.php");
}
else
{
	$result = mysqli_query($con, "SELECT * FROM users WHERE username='$username' AND password='$password' AND administrator='0' AND not deleted;");
	while($row = mysqli_fetch_array($result))
	{
	$success = true;
	$user_id = $row['userID'];
	$name = $row['name'];
	$role= $row['administrator'];
	}
	if($success == true)
	{
		session_start();
		$_SESSION['customer_sid']=session_id();
		$_SESSION['user_id'] = $user_id;
		$_SESSION['administrator'] = $role;
		$_SESSION['name'] = $name;
		header("location: ../dashboard.php");
	}
	else
	{
		header("location: ../login.php");
	}
}
?>
