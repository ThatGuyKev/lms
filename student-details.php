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
             $studentID = $_GET['studentID'];

             $sql = "SELECT * FROM students WHERE studentID=$studentID";
             $query = $dbh -> prepare($sql);
             $query->execute();
             $results=$query->fetchAll(PDO::FETCH_OBJ);
             $cnt=1;
             ?>
            <h4 class="header-line"><?php if($query->rowCount() > 0)
            {
            foreach($results as $result)
            {        echo htmlentities($result->studentName);}}?></h4>

          </div>
      </div>


        <div class="row">
          <div class="box">
            <div class="col-md-12">
                <!-- Advanced Tables -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                       <i class="fa fa-users fa-2x"></i> student Details
                    </div>
                    <div class="panel-body">
                      <ul class="list-group">
                        <?php
                        if($query->rowCount() > 0)
                        {
                        foreach($results as $result)
                        {               ?>

                  <li class="list-group-item"><b>Student ID : </b><?php echo htmlentities($result->studentID);?></li>
                  <li class="list-group-item"><b>Student Name : </b><?php echo htmlentities($result->studentName);?></li>
                  <li class="list-group-item"><b>Gender : </b><?php echo htmlentities($result->gender);?></li>
                  <li class="list-group-item"><b>Class : </b><?php echo htmlentities($result->class);?></li>
                  <li class="list-group-item"><a href="edit-student.php?studentID=<?php echo htmlentities($result->studentID);?>"><button class="btn btn-primary btn-xs"><i class="fa fa-edit "></i> Edit</button>
                <a href="manage-students.php?del=<?php echo htmlentities($result->studentID);?>" onclick="return confirm('Are you sure you want to delete?');">  <button class="btn btn-danger btn-xs" ><i class="fa fa-pencil"></i> Delete</button></li>
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
