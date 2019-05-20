<?php
session_start();
error_reporting(0);
include('includes/connect.php');
if(strlen($_SESSION['admin_sid'])==0)
    {
header('location:../index.php');
}
else{

if(isset($_POST['return']))
{
$borrowID = intval($_GET['rid']);
$returned=1;
$sql = "UPDATE borrow SET returned=$returned, returnDate=CURRENT_TIMESTAMP WHERE borrowID=$borrowID";
$query = $dbh->prepare($sql);
$query->execute();

$_SESSION['msg']="Book Returned successfully";
header('location:manage-issued-books.php');



}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Library Management System | Issued Book Details</title>
    <!-- icon -->
    <link rel="icon" href="assets/favicon/favicon.png" sizes="32x32">
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
<script>
// function for get student name
function getstudent() {
$("#loaderIcon").show();
jQuery.ajax({
url: "get_student.php",
data:'studentid='+$("#studentid").val(),
type: "POST",
success:function(data){
$("#get_student_name").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

//function for book details
function getbook() {
$("#loaderIcon").show();
jQuery.ajax({
url: "get_book.php",
data:'bookid='+$("#bookid").val(),
type: "POST",
success:function(data){
$("#get_book_name").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

</script>
<style type="text/css">
  .others{
    color:red;
}

</style>


</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wra
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Issued Book Details</h4>

                            </div>

</div>
<div class="row">
<div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1"">
<div class="panel panel-info">
<div class="panel-heading">
Issued Book Details
</div>
<div class="panel-body">
<form role="form" method="post">
<?php
$rid=intval($_GET['rid']);
$borrowID = ($_GET['rid']);
$sql = "SELECT students.studentName, books.Title, books.ISBN, borrow.issueDate, borrow.returnDate, borrow.borrowID as rid, borrow.returned FROM borrow JOIN students on students.studentID=borrow.studentID Join books on books.bookID=borrow.bookID WHERE borrow.borrowID=$borrowID";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>




<div class="form-group">
<label>Student Name :</label>
<?php echo htmlentities($result->studentName);?>
</div>

<div class="form-group">
<label>Book Title :</label>
<?php echo htmlentities($result->Title);?>
</div>


<div class="form-group">
<label>ISBN :</label>
<?php echo htmlentities($result->ISBN);?>
</div>

<div class="form-group">
<label>Book Issued Date :</label>
<?php echo htmlentities($result->issueDate);?>
</div>


<div class="form-group">
<label>Book Returned Date :</label>
<?php if($result->returnDate=="")
                                            {
                                                echo htmlentities("Not Return Yet");
                                            } else {


                                            echo htmlentities($result->returnDate);
}
                                            ?>
</div>


 <?php if($result->returned==0){?>

<button type="submit" name="return" id="submit" class="btn btn-info">Return Book </button>

 </div>

<?php }}} ?>
                                    </form>
                            </div>
                        </div>
                            </div>

        </div>

    </div>
    </div>
     <!-- CONTENT-WRAPPER SECTION END-->
  <?php include('includes/footer.php');?>
      <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>

</body>
</html>
<?php } ?>
