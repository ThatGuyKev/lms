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
    <title>Online Library Management System | Edit Book</title>
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
    <div class="content-wra
    <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Add Book</h4>

                            </div>

</div>
<div class="row">
<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3"">
<div class="panel panel-info">
<div class="panel-heading">
Book Info
</div>
<div class="panel-body">
<form action="routers/update-book.php" role="form" method="post">
<?php
$bookID=intval($_GET['bookID']);
$sql = "SELECT * from books,bookdetails where  books.bookID = $bookID AND bookdetails.bookID = $bookID";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>

  <div class="form-group">
  <label>Book ID<span style="color:red;">*</span></label>
  <input class="form-control" type="text" name="bookID" value="<?php echo htmlentities($result->bookID);?>" required />
  </div>
  <div class="form-group">
  <label>ISBN<span style="color:red;">*</span></label>
  <input class="form-control" type="text" name="ISBN" value="<?php echo htmlentities($result->ISBN);?>" required />
  </div>
  <div class="form-group">
  <label>Book Title<span style="color:red;">*</span></label>
  <input class="form-control" type="text" name="Title" value="<?php echo htmlentities($result->Title);?>" required />
  </div>
  <div class="form-group">
  <label>Author</label>
  <input class="form-control" type="text" name="Author" value="<?php echo htmlentities($result->Author);?>"  />
  </div>
  <div class="form-group">
  <label>Grade Level</label>
  <input class="form-control" type="text" name="Grade_Level" value="<?php echo htmlentities($result->Grade_Level);?>"  />
  </div>
  <div class="form-group">
  <label>Fiction_Nonfiction_F_NF</label>
  <input class="form-control" type="text" name="Fiction_Nonfiction_F_NF" value="<?php echo htmlentities($result->Fiction_Nonfiction_F_NF);?>"  />
  </div>
  <div class="form-group">
  <label>Page Count</label>
  <input class="form-control" type="text" name="Page_Count" value="<?php echo htmlentities($result->Page_Count);?>"  />
  </div>
  <div class="form-group">
  <label>Language</label>
  <input class="form-control" type="text" name="Language" value="<?php echo htmlentities($result->Language);?>"  />
  </div>
  <div class="form-group">
  <label>Location</label>
  <input class="form-control" type="text" name="Location" value="<?php echo htmlentities($result->Location);?>"  />
  </div>
  <div class="form-group">
  <label>Genre</label>
  <input class="form-control" type="text" name="Genre" value="<?php echo htmlentities($result->Genre);?>"  />
  </div>
  <div class="form-group">
  <label>Condition</label>
  <input class="form-control" type="text" name="Condition" value="<?php echo htmlentities($result->Condition);?>"  />
  </div>
  <div class="form-group">
  <label>Annotation</label>
  <input class="form-control" type="text" name="Annotation" value=" <?php echo htmlentities($result->Annotation);?>"/>
  </div>
  <div class="form-group">
<label>
  AR_Level</label>
  <input class="form-control" type="text" name="AR_Level" value=" <?php echo htmlentities($result->AR_Level);?>"/>
  </div>
  <div class="form-group">
<label>AR_Points</label>
  <input class="form-control" type="text" name="AR_Points" value=" <?php echo htmlentities($result->AR_Points);?>"/>
  </div>
  <div class="form-group">
<label>Binding</label>
  <input class="form-control" type="text" name="Binding" value=" <?php echo htmlentities($result->Binding);?>"/>
  </div>
  <div class="form-group">
<label>Illustrator</label>
  <input class="form-control" type="text" name="Illustrator" value=" <?php echo htmlentities($result->Illustrator);?>"/>
  </div>
  <div class="form-group">
<label>Interest_Level</label>
  <input class="form-control" type="text" name="Interest_Level" value=" <?php echo htmlentities($result->Interest_Level_Minimum);?>"/>
  </div>
  <div class="form-group">
<label>Lexile</label>
  <input class="form-control" type="text" name="Lexile" value=" <?php echo htmlentities($result->Lexile);?>"/>
  </div>
  <div class="form-group">
<label>List_Price</label>
  <input class="form-control" type="text" name="List_Price" value=" <?php echo htmlentities($result->List_Price);?>"/>
  </div>
  <div class="form-group">
<label>Publication_Date</label>
  <input class="form-control" type="text" name="Publication_Date" value=" <?php echo htmlentities($result->Publication_Date);?>"/>
  </div>
  <div class="form-group">
<label>Publisher</label>
  <input class="form-control" type="text" name="Publisher" value=" <?php echo htmlentities($result->Publisher);?>"/>
  </div>
  <div class="form-group">
<label>Reading_Level</label>
  <input class="form-control" type="text" name="Reading_Level" value=" <?php echo htmlentities($result->Reading_Level);?>"/>
  </div>
  <div class="form-group">
<label>Reading_Recovery_Level</label>
  <input class="form-control" type="text" name="Reading_Recovery_Level" value=" <?php echo htmlentities($result->Reading_Recovery_Level);?>"/>
  </div>
  <div class="form-group">
<label>Teachers_College</label>
  <input class="form-control" type="text" name="Teachers_College" value=" <?php echo htmlentities($result->Teachers_College);?>"/>
  </div>
  <div class="form-group">
<label>Word_Count</label>
  <input class="form-control" type="text" name="Word_Count" value=" <?php echo htmlentities($result->Word_Count);?>"/>
  </div>
  <div class="form-group">
<label>Guided_Reading_Level</label>
  <input class="form-control" type="text" name="Guided_Reading_Level" value=" <?php echo htmlentities($result->Guided_Reading_Level);?>"/>
  </div>



 <?php }} ?>
<button type="submit" name="update" class="btn btn-info">Update </button>

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
