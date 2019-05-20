<?php
require_once("../includes/connect.php");
if(!empty($_POST["studentID"])) {
  $studentID= strtoupper($_POST["studentID"]);

    $sql ="SELECT studentName FROM students WHERE studentID=$studentID";
$query= $dbh -> prepare($sql);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
foreach ($results as $result) {
if($result->Status==0)
{
echo "<span style='color:red'> Student ID Blocked </span>"."<br />";
echo "<b>Student Name-</b>" .$result->FullName;
 echo "<script>$('#submit').prop('disabled',true);</script>";
} else {
?>


<?php
echo htmlentities($result->FullName);
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
}
 else{

  echo "<span style='color:red'> Invaid Student Id. Please Enter Valid Student id .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
}
}



?>
