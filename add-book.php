<?php
session_start();
error_reporting(0);
include('includes/connect.php');
if(strlen($_SESSION['admin_ID'])==0)
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
    <title>Online Library Management System | Add Book</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
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
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add Book</h4>

                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
<div class="panel panel-info">
<div class="panel-heading">
Book Info
</div>
<div class="panel-body">
<form action="routers/insert-book.php" role="form" method="post">

  <div class="form-group">
  <label>ISBN Number</label>
  <input class="form-control" type="text" name="ISBN"   autocomplete="off" required />
  <p class="help-block">An ISBN is an International Standard Book Number.ISBN Must be unique</p>
  </div>
  <div class="form-group">
  <label>Book Title</label>
  <input class="form-control" type="text" name="Title" autocomplete="off"  required />
  </div>
   <div class="form-group">
   <label>Author</label>
   <input class="form-control" type="text" name="Author" autocomplete="off"    />
   </div>
   <div class="form-group">
   <label>Grade Level</label>
   <input class="form-control" type="text" name="Grade_Level" autocomplete="off"    />
   </div>
   <div class="form-group">
   <label>Fiction_Nonfiction_F_NF</label>
   <input class="form-control" type="text" name="Fiction_Nonfiction_F_NF" autocomplete="off"    />
   </div>
   <div class="form-group">
   <label>Page_Count</label>
   <input class="form-control" type="text" name="Page_Count" autocomplete="off"    />
   </div>
   <div class="form-group">
   <label>Language</label>
   <input class="form-control" type="text" name="Language" autocomplete="off"    />
   </div>
   <div class="form-group">
   <label>Location</label>
   <input class="form-control" type="text" name="Location" autocomplete="off"    />
   </div>
   <div class="form-group">
   <label>Genre</label>
   <input class="form-control" type="text" name="Genre" autocomplete="off"    />
   </div>
   <div class="form-group">
   <label>Condition</label>
   <input class="form-control" type="text" name="Condition" autocomplete="off"    />
   </div>
   <div class="form-group">
   <label>Annotation</label>
   <input class="form-control" type="text" name="Annotation"/>
   </div>
   <div class="form-group">
 <label>
   AR_Level</label>
   <input class="form-control" type="text" name="AR_Level"/>
   </div>
   <div class="form-group">
 <label>AR_Points</label>
   <input class="form-control" type="text" name="AR_Points"/>
   </div>
   <div class="form-group">
 <label>Binding</label>
   <input class="form-control" type="text" name="Binding"/>
   </div>
   <div class="form-group">
 <label>Illustrator</label>
   <input class="form-control" type="text" name="Illustrator"/>
   </div>
   <div class="form-group">
 <label>Interest_Level</label>
   <input class="form-control" type="text" name="Interest_Level" />
   </div>
   <div class="form-group">
 <label>Lexile</label>
   <input class="form-control" type="text" name="Lexile" />
   </div>
   <div class="form-group">
 <label>List_Price</label>
   <input class="form-control" type="text" name="List_Price"/>
   </div>
   <div class="form-group">
 <label>Publication_Date</label>
   <input class="form-control" type="text" name="Publication_Date"/>
   </div>
   <div class="form-group">
 <label>Publisher</label>
   <input class="form-control" type="text" name="Publisher" />
   </div>
   <div class="form-group">
 <label>Reading_Level</label>
   <input class="form-control" type="text" name="Reading_Level"/>
   </div>
   <div class="form-group">
 <label>Reading_Recovery_Level</label>
   <input class="form-control" type="text" name="Reading_Recovery_Level"/>
   </div>
   <div class="form-group">
 <label>Teachers_College</label>
   <input class="form-control" type="text" name="Teachers_College"/>
   </div>
   <div class="form-group">
 <label>Word_Count</label>
   <input class="form-control" type="text" name="Word_Count"/>
   </div>
   <div class="form-group">
 <label>Guided_Reading_Level</label>
   <input class="form-control" type="text" name="Guided_Reading_Level"/>
   </div>


  <button type="submit" name="add" class="btn btn-info">Add </button>

                                    </form>
                            </div>
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
