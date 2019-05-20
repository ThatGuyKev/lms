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
    <title>Library Management System | Issue a new Book</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME STYLE  -->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <script src="//code.jquery.com/jquery-2.1.4.min.js"></script>



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
                <h4 class="header-line">Issue a New Book</h4>

                            </div>

</div>
<div class="row">
<div class="col-md-10 col-sm-6 col-xs-12 col-md-offset-1">
<div class="panel panel-info">
<div class="panel-heading">
Issue a New Book
</div>
<div class="panel-body">
<form role="form" method="post" action="confirm-issue.php">

<div class="form-group">
<label>Srtudent Name<span style="color:red;">*</span></label>
<input class="form-control typeahead" type="text" name="studentName" id="studentName" />
</div>
<?php
$bookID=intval($_GET['bookID']);
$sql = "SELECT * from books where  bookID = $bookID";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{
  $ISBN = $result->ISBN;
  ?>
  <div class="form-group">
  <label>Book Title<span style="color:red;">*</span></label>
  <input class="form-control" type="text" name="Title" id="Title" value="<?php echo htmlentities($result->Title);?>" readonly/>
  </div>
  <?php
}}
              ?>
              <div class="form-group">
              <label>ISBN Number<span style="color:red;">*</span></label>
              <input class="form-control typeahead" type="text" name="ISBN" id="ISBN" value="<?php echo htmlentities($ISBN);?>" <?php if (isset($ISBN)){echo "readonly";}?>/>
              </div>

<button type="submit" name="issue" id="submit" class="btn btn-info">Issue Book </button>

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
    <!-- <script src="assets/js/custom.js"></script> -->

</body>
<script type="text/javascript" src="assets/js/typeahead.js"></script>
<script>
    $(document).ready(function () {
        $('#studentName').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "routers/search-student.php",
					data: 'query=' + query,
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
						result($.map(data, function (item) {
							return item['studentName'];
                        }));
                    }
                });
            }
        });
        $('#ISBN').typeahead({
            source: function (query, result) {
                $.ajax({
                    url: "routers/search-book.php",
          data: 'query=' + query,
                    dataType: "json",
                    type: "POST",
                    success: function (data) {
            result($.map(data, function (item) {
              return item['ISBN'];
                        }));
                    }
                });
            }
        });
    });
</script>
</html>
<?php } ?>
