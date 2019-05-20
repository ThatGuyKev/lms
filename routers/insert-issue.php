
<?php
include '../includes/connect.php';

$studentID = $_GET['studentID'];
$bookID = $_GET['bookID'];

$sql="INSERT INTO borrow(studentID,bookID,issueDate,returned) VALUES($studentID, $bookID, CURRENT_TIMESTAMP,0)";
$query = $dbh->prepare($sql);
$query->execute();

$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$_SESSION['msg']="Book issued successfully";
header('location:../manage-issued-books.php');
}
else
{
$_SESSION['error']="Something went wrong. Please try again $studentID .... $bookID";
header('location:../manage-issued-books.php');
}


?>
