
<?php
include '../includes/connect.php';
  $ISBN = $_POST['ISBN'];
  $Title = $_POST['Title'];
  $Author = $_POST['Author'];
  $Grade_Level = $_POST['Grade_Level'];
  $Fiction_Nonfiction_F_NF = $_POST['Fiction_Nonfiction_F_NF'];
  $Page_Count = $_POST['Page_Count'];
  $Language = $_POST['Language'];
  $Location = $_POST['Location'];
  $Genre = $_POST['Genre'];
  $Condition = $_POST['Condition'];
  $bookID = ($_POST['bookID']);
  $Annotation = ($_POST['Annotation']);
  $AR_Level = ($_POST['AR_Level']);
  $AR_Points = ($_POST['AR_Points']);
  $Binding = ($_POST['Binding']);
  $Illustrator = ($_POST['Illustrator']);
  $Interest_Level = ($_POST['Interest_Level']);
  $Lexile = ($_POST['Lexile']);
  $List_Price = ($_POST['List_Price']);
  $Publication_Date	 = ($_POST['Publication_Date']);
  $Publisher = ($_POST['Publisher']);
  $Reading_Level = ($_POST['Reading_Level']);
  $Reading_Recovery_Level = ($_POST['Reading_Recovery_Level']);
  $Teachers_College = ($_POST['Teachers_College']);
  $Word_Count = ($_POST['Word_Count']);
  $Guided_Reading_Level	 = ($_POST['Guided_Reading_Level']);


$sql = "UPDATE bookdetails set Annotation='$Annotation', AR_Level='$AR_Level',	AR_Points='$AR_Points',	Binding='$Binding',	Illustrator='$Illustrator',	Interest_Level='$Interest_Level',	Lexile='$Lexile',	List_Price='$List_Price',	Publication_Date='$Publication_Date',	Publisher='$Publisher',	Reading_Level='$Reading_Level',
    Reading_Recovery_Level='$Reading_Recovery_Level',	Teachers_College='$Teachers_College',	Word_Count='$Word_Count',	Guided_Reading_Level='$Guided_Reading_Level' WHERE bookID=$bookID; ";
$sql .="UPDATE  books set ISBN='$ISBN', Title='$Title', Author='$Author', Grade_Level='$Grade_Level', Fiction_Nonfiction_F_NF='$Fiction_Nonfiction_F_NF', Page_Count='$Page_Count', Language='$Language',
 Location='$Location', Genre='$Genre', Condi='$Condition' WHERE bookID=$bookID";
if ($con -> multi_query($sql))
{
$_SESSION['msg']="Book info updated successfully";
header('location:../manage-books.php');
}
else
{
  $_SESSION['error']="Something went wrong. Please try again bookID = ".$bookID." ".$con->error;
  header('location:../manage-books.php');
}

?>
