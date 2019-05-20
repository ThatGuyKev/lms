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


$sql = "INSERT INTO books (ISBN, Title, Author, Grade_Level ,Fiction_Nonfiction_F_NF, Page_Count, Language, Location, Genre, Condi, borrowed) VALUES ('$ISBN','$Title', '$Author', '$Grade_Level','$Fiction_Nonfiction_F_NF', '$Page_Count', '$Language', '$Location', '$Genre', '$Condition', 0);";
$sql .= "INSERT INTO bookdetails($bookID, '$Annotation', '$AR_Level','$AR_Points', '$Binding', '$Illustrator', '$Interest_Level', '$Lexile', '$List_Price', '$Publication_Date', '$Publisher', '$Reading_Level', '$Reading_Recovery_Level', '$Teachers_College', '$Word_Count', '$Guided_Reading_Level') VALUES ($bookID, '$Annotation', '$AR_Level','$AR_Points', '$Binding', '$Illustrator', '$Interest_Level', '$Lexile', '$List_Price', '$Publication_Date', '$Publisher', '$Reading_Level', '$Reading_Recovery_Level', '$Teachers_College', '$Word_Count', '$Guided_Reading_Level')";

$con->multi_query($sql);
	if ( $con->affected_rows >= 1 )
{
$_SESSION['msg']="Book Listed successfully";
header('location:../manage-books.php');
}
else
{
$_SESSION['error']="Something went wrong. Please try again";
header('location:../manage-books.php');
}


?>
