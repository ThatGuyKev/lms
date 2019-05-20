
<?php
include '../includes/connect.php';
  $studentID = $_POST['studentID'];
  $studentName = $_POST['studentName'];
  $gender = $_POST['gender'];
  $class = $_POST['class'];


$sql = "UPDATE students SET studentName='$studentName', gender='$gender', class='$class' WHERE studentID=$studentID";
if ($con -> multi_query($sql))
{
$_SESSION['msg']="Student info updated successfully";
header('location:../manage-students.php');
}
else
{
  $_SESSION['error']="Something went wrong. Please try again bookID = ".$studentID." ".$con->error;
  header('location:../manage-students.php');
}

?>
