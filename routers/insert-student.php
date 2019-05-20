<?php

include '../includes/connect.php';

$studentName = $_POST['studentName'];
$gender = $_POST['gender'];
$class = $_POST['class'];


$sql = "INSERT INTO students (studentName, gender, class) VALUES ('$studentName', '$gender', '$class')";
$con->multi_query($sql);
	if ( $con->affected_rows >= 1 )
{
$_SESSION['msg']="Student Added successfully";
header('location:../manage-students.php');
}
else
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:../manage-students.php');
}


?>
