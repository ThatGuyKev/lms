<?php
require_once("../includes/connect.php");
if(!empty($_POST["bookID"])) {
  $bookID=$_POST["bookID"];

$sql ="SELECT Title, bookID FROM books WHERE bookID=$bookID";
$query= $dbh -> prepare($sql);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query -> rowCount() > 0)
{
  foreach ($results as $result) {?>
<option value="<?php echo htmlentities($result->bookID);?>"><?php echo htmlentities($result->Title);?></option>
<b>Book Title :</b>
<?php
echo htmlentities($result->Title);
 echo "<script>$('#submit').prop('disabled',false);</script>";
}
}
 else{?>

<option class="others"> Invalid ISBN Number</option>
<?php
 echo "<script>$('#submit').prop('disabled',true);</script>";
}
}



?>
