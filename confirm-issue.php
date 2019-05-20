<?php
session_start();
error_reporting(0);
include('includes/connect.php');
if(strlen($_SESSION['admin_sid'])==0)
    {
header('location:../index.php');
}
else{
  $studentName = $_POST['studentName'];
  $ISBN = $_POST['ISBN'];
  $student = mysqli_query($con, "SELECT * FROM students where studentName = '$studentName'");
  while($row = mysqli_fetch_array($student)){
  	$studentID = $row['studentID'];
    $class = $row['class'];
}
  $book = mysqli_query($con, "SELECT * FROM books where ISBN = '$ISBN'");
    while($row = mysqli_fetch_array($book)){
      $Title = $row['Title'];
      $bookID = $row['bookID'];
      $Author = $row['Author'];
}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Library Management System | Confirm Issue</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />


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
    <div class="content-wra">
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Confirm Issue</h4>

                            </div>

</div>
<div class="row">
<div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1">
<div class="panel panel-info">
<div class="panel-heading">
Student Details
</div>
<div class="panel-body">

              <ul id="issues-collection" class="collection">
              <?php
                  echo '<li class="list-group-item">
                  <i class="fa fa-users fa-3x"></i>
                  <p><strong>Student Name : </strong>'.$studentName.'</p>
                  <p><strong>Student ID : </strong>'.$studentID.'</p>
              		<p><strong>Class : </strong> '.$class.'</p></li>';
?>
</ul>



                            </div>
                        </div>
                            </div>

</div>
<div class="row">
<div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1">
<div class="panel panel-info">
<div class="panel-heading">
Book Details
</div>
<div class="panel-body">

  <ul id="issues-collection" class="collection">
  <?php
      echo '<li class="list-group-item">
      <i class="fa fa-book fa-3x"></i>
      <p><strong>Book Title : </strong>'.$Title.'</p>
      <p><strong>ISBN : </strong>'.$ISBN.'</p>
      <p><strong>Book ID : </strong> '.$bookID.'</p>
      <p><strong>Author : </strong>'.$Author.'</p></li>';
?>
<li class="list-group-item">
<button onclick="location.href='routers/insert-issue.php?bookID=<?php echo htmlentities($bookID);?>&studentID=<?php echo htmlentities($studentID);?>';" name="confirmissue" id="confirmissue" class="btn btn-info"> Confirm Issue </button></li>
</ul>

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
    <!-- <script src="assets/js/custom.js"></script> -->

</body>

</html>
<?php } ?>
