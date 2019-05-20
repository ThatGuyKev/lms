<?php
session_start();
error_reporting(0);
include('includes/connect.php');
if(strlen($_SESSION['admin_sid'])==0)
    {
header('location:../index.php');
}
else{
if(isset($_GET['del']))
{
$id=$_GET['del'];
$sql = "DELETE from books  WHERE bookID=$id";
$con->query($sql);
$_SESSION['delmsg'] = "Book deleted scuccessfully! ";
header('location:manage-books.php');

}


    ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Library Management System | Manage Books</title>
    <!-- icon -->
    <link rel="icon" href="assets/favicon/favicon.png" sizes="32x32">

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
<body>
      <!--MENU SECTION START-->
<?php include('includes/header.php');?>
<!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
           <div class="panel panel-default">
               <div class="panel-heading">
                <h4 class="header-line">Manage Books</h4>
    </div>
     <div class="row">
        <div class="box">
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

<?php if($_SESSION['updatemsg']!="")
{?>
<div class="col-md-6">
<div class="alert alert-success" >
 <strong>Success :</strong>
 <?php echo htmlentities($_SESSION['updatemsg']);?>
<?php echo htmlentities($_SESSION['updatemsg']="");?>
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

        </div>
            <div class="row">
              <div class="box">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Books Listing
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Book ID</th>
                                            <th>ISBN</th>
                                            <th>Book Title</th>
                                            <th>Author</th>
                                            <th>Grade Level</th>
                                            <th>Fiction</th>
                                            <th>Page Count</th>
                                            <th>Language</th>
                                            <th>Genre</th>
                                            <th>Condition</th>
                                            <th>Borrowed</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php $sql = "SELECT * from  books";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>
                                        <tr class="clickable-row" style="cursor:pointer;" data-href='book-details.php?bookID=<?php echo htmlentities($result->bookID);?>'>
                                            <td class="center"><?php echo htmlentities($cnt);?></td>
                                            <td class="center"><?php echo htmlentities($result->bookID);?></td>
                                            <td class="center"><?php echo htmlentities($result->ISBN);?></td>
                                            <td class="center"><?php echo htmlentities($result->Title);?></td>
                                            <td class="center"><?php echo htmlentities($result->Author);?></td>
                                            <td class="center"><?php echo htmlentities($result->Grade_Level);?></td>
                                            <td class="center"><?php echo htmlentities($result->Fiction_Nonfiction_F_NF);?></td>
                                            <td class="center"><?php echo htmlentities($result->Page_Count);?></td>
                                            <td class="center"><?php echo htmlentities($result->Language);?></td>
                                            <td class="center"><?php echo htmlentities($result->Location);?></td>
                                            <td class="center"><?php echo htmlentities($result->Genre);?></td>
                                            <td class="center"><?php echo htmlentities($result->Condition);?></td>
                                            <td class="center">

                                            <a href="book-details.php?bookID=<?php echo htmlentities($result->bookID);?>"><button class="btn btn-success btn-xs"><i class="fa fa-book "></i> Details</button>
                                            <a href="edit-book.php?bookID=<?php echo htmlentities($result->bookID);?>"><button class="btn btn-primary btn-xs"><i class="fa fa-edit "></i> Edit</button>
                                          <a href="manage-books.php?del=<?php echo htmlentities($result->bookID);?>" onclick="return confirm('Are you sure you want to delete?');">  <button class="btn btn-danger btn-xs" ><i class="fa fa-pencil"></i> Delete</button>
                                            </td>
                                        </tr>
 <?php $cnt=$cnt+1;}} ?>
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
