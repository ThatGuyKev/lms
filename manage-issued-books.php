<?php
session_start();
error_reporting(0);
include('includes/connect.php');
if(strlen($_SESSION['admin_sid'])==0)
    {
header('location:index.php');
}
else{



    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Library Management System | Manage Issued Books</title>
    <!-- icon -->
    <link rel="icon" href="assets/favicon/favicon.png" sizes="32x32">
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- DATATABLE STYLE  -->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
      <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Manage Issued Books</h4>
    </div>
     <div class="row">
    <?php if($_SESSION['error']!="")
    {?>
<div class="col-md-6">
<div class="alert alert-danger" >
 <strong>Error :</strong>
 <?php echo htmlentities($_SESSION['error']);?>
<?php echo htmlentities($_SESSION['error']="");?>
</div>
</div>
<?php } ?>
<?php if($_SESSION['msg']!="")
{?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong>
 <?php echo htmlentities($_SESSION['msg']);?>
<?php echo htmlentities($_SESSION['msg']="");?>
</div>
</div>
<?php } ?>



   <?php if($_SESSION['delmsg']!="")
    {?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong>
 <?php echo htmlentities($_SESSION['delmsg']);?>
<?php echo htmlentities($_SESSION['delmsg']="");?>
</div>
</div>
<?php } ?>

</div>


        </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                          Issued Books
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Issue ID</th>
                                            <th>Student Name</th>
                                            <th>Book Title</th>
                                            <th>Issued Date</th>
                                            <th>Return Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      if(isset($_GET['returned'])) {
                                      $returned = $_GET['returned'];
                                      $sql = "SELECT borrow.borrowID as rid, students.studentName, books.Title, borrow.issueDate, borrow.returnDate FROM borrow, students, books
                                      WHERE  borrow.studentID = students.studentID AND  borrow.bookID = books.bookID AND borrow.returned=$returned ";
                                      $query = $dbh -> prepare($sql);
                                      $query->execute();
                                      $results=$query->fetchAll(PDO::FETCH_OBJ);
                                      $cnt=1;
                                      if($query->rowCount() > 0)
                                      {
                                      foreach($results as $result)
                                      {               ?>
                                                                              <tr class="clickable-row" style="cursor:pointer;" data-href='update-issue-bookdeails.php?rid=<?php echo htmlentities($result->rid);?>'>
                                                                                  <td class="center"><?php echo htmlentities($cnt);?></td>
                                                                                  <td class="center"><?php echo htmlentities($result->rid);?></td>
                                                                                  <td class="center"><?php echo htmlentities($result->studentName);?></td>
                                                                                  <td class="center"><?php echo htmlentities($result->Title);?></td>
                                                                                  <td class="center"><?php echo htmlentities($result->issueDate);?></td>
                                                                                  <td class="center"><?php if($result->returnDate=="")
                                                                                  {
                                                                                      echo htmlentities("Not Return Yet");
                                                                                  } else {


                                                                                  echo htmlentities($result->returnDate);
                                      }
                                                                                  ?></td>
                                                                                  <td class="center">

                                                                                  <a href="update-issue-bookdeails.php?rid=<?php echo htmlentities($result->rid);?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>

                                                                                  </td>
                                                                              </tr>
                                       <?php $cnt=$cnt+1;}}}
                                       else{ ?>
                                        <?php $sql = "SELECT borrow.borrowID as rid, students.studentName, books.Title, borrow.issueDate, borrow.returnDate FROM borrow, students, books
                                        WHERE  borrow.studentID = students.studentID AND  borrow.bookID = books.bookID";
                                        $query = $dbh -> prepare($sql);
                                        $query->execute();
                                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt=1;
                                        if($query->rowCount() > 0)
                                        {
                                          foreach($results as $result)
                                          {               ?>
                                        <tr class="clickable-row" style="cursor:pointer;" data-href='update-issue-bookdeails.php?rid=<?php echo htmlentities($result->rid);?>'>
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($result->rid);?></td>
                                            <td class="center"><?php echo htmlentities($result->studentName);?></td>
                                            <td class="center"><?php echo htmlentities($result->Title);?></td>
                                            <td class="center"><?php echo htmlentities($result->issueDate);?></td>
                                            <td class="center"><?php if($result->returnDate=="")
                                            {
                                                echo htmlentities("Not Return Yet");
                                            } else {


                                            echo htmlentities($result->returnDate);
}
                                            ?></td>
                                            <td class="center">

                                            <a href="update-issue-bookdeails.php?rid=<?php echo htmlentities($result->rid);?>"><button class="btn btn-primary"><i class="fa fa-edit "></i> Edit</button>

                                            </td>
                                        </tr>
 <?php $cnt=$cnt+1;}}} ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <!--End Advanced Tables -->
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
    <!-- DATATABLE SCRIPTS  -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
