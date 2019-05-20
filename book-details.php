<?php
session_start();
error_reporting(0);
include('includes/connect.php');
if(strlen($_SESSION['admin_sid'])==0)
    {
header('location:../index.php');
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
  <title>Library Management System | Manage Details</title>

  <script src="assets/js/custom.js"></script>
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
<body >
    <!------MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
<div class="content-wrapper">
     <div class="container">
       <div class="panel panel-default">

           <div class="panel-heading">
             <?php
             $bookID = $_GET['bookID'];

             $sql = "SELECT * FROM books, bookdetails WHERE books.bookID=$bookID AND bookdetails.bookID=$bookID";
             $query = $dbh -> prepare($sql);
             $query->execute();
             $results=$query->fetchAll(PDO::FETCH_OBJ);
             $cnt=1;
             ?>
            <h4 class="header-line"><?php if($query->rowCount() > 0)
            {
            foreach($results as $result)
            {        echo htmlentities($result->Title);}}?></h4>
              <button onclick="location.href='issue-book.php?bookID=<?php echo htmlentities($result->bookID);?>';" name="issuebook" id="submit" class="btn btn-info">Issue Book </button>

          </div>
      </div>


        <div class="row">
          <div class="box">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <i class="fa fa-book fa-2x"></i> Book Details
                    </div>
                    <div class="panel-body">
                      <ul class="list-group">
                        <?php
                        if($query->rowCount() > 0)
                        {
                        foreach($results as $result)
                        {               ?>

                  <li class="list-group-item"><b>Book ID : </b><?php echo htmlentities($result->bookID);?></li>
                  <li class="list-group-item"><b>ISBN : </b><?php echo htmlentities($result->ISBN);?></li>
                  <li class="list-group-item"><b>Book Title : </b><?php echo htmlentities($result->Title);?></li>
                  <li class="list-group-item"><b>Author : </b><?php echo htmlentities($result->Author);?></li>
                  <li class="list-group-item"><b>Grade Level : </b><?php echo htmlentities($result->Grade_Level);?></li>
                  <li class="list-group-item"><b>Fiction : </b><?php echo htmlentities($result->Fiction_Nonfiction_F_NF);?></li>
                  <li class="list-group-item"><b>Page Count : </b><?php echo htmlentities($result->Page_Count);?></li>
                  <li class="list-group-item"><b>Language : </b><?php echo htmlentities($result->Language);?></li>
                  <li class="list-group-item"><b>Genre : </b><?php echo htmlentities($result->Location);?></li>
                  <li class="list-group-item"><b>Condition : </b><?php echo htmlentities($result->Genre);?></li>
                  <li class="list-group-item"><b>Annotation : </b><?php echo htmlentities($result->Annotation);?></li>
                  <li class="list-group-item"><b>AR_Level : </b><?php echo htmlentities($result->AR_Level);?></li>
                  <li class="list-group-item"><b>AR_Points : </b><?php echo htmlentities($result->AR_Points);?></li>
                  <li class="list-group-item"><b>Binding : </b><?php echo htmlentities($result->Binding);?></li>
                  <li class="list-group-item"><b>Illustrator : </b><?php echo htmlentities($result->Illustrator);?></li>
                  <li class="list-group-item"><b>Interest_Level : </b><?php echo htmlentities($result->Interest_Level);?></li>
                  <li class="list-group-item"><b>Lexile : </b><?php echo htmlentities($result->Lexile);?></li>
                  <li class="list-group-item"><b>List_Price : </b><?php echo htmlentities($result->List_Price);?></li>
                  <li class="list-group-item"><b>Publication_Date : </b><?php echo htmlentities($result->Publication_Date);?></li>
                  <li class="list-group-item"><b>Publisher : </b><?php echo htmlentities($result->Publisher);?></li>
                  <li class="list-group-item"><b>Reading_Level : </b><?php echo htmlentities($result->Reading_Level);?></li>
                  <li class="list-group-item"><b>Reading_Recovery_Level : </b><?php echo htmlentities($result->Reading_Recovery_Level);?></li>
                  <li class="list-group-item"><b>Teachers_College	Word_Count : </b><?php echo htmlentities($result->Teachers_College);?></li>
                  <li class="list-group-item"><b>Guided_Reading_Level : </b><?php echo htmlentities($result->Guided_Reading_Level);?></li>
              <?php
                  }
                }else{
                     $_SESSION['msgdet'] = "Book details not available ";
                     header('location:manage-books.php');
                   }?>

                </ul>
                        </div>

                    </div>
                </div>
                <!--End Advanced Tables -->
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
<!-- DATATABLE SCRIPTS  -->
<script src="assets/js/dataTables/jquery.dataTables.js"></script>
<script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
  <!-- CUSTOM SCRIPTS  -->
<script src="assets/js/custom.js"></script>
</body>
</html>
<?php } ?>
