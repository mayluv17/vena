<?php
include 'config.php';
if (!$id):
header("location: sign_in.php");
endif;
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>vena</title>
<link rel="stylesheet" href="css/bootstrap.min.css" />
<link rel="stylesheet" href="css/vena.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<div class="top-menu">
<?php
include'includes/top.php';
?>
</div>

<div class="content">
<div class="container">

<div class="row">
<div class="col-md-3 user-details">

<?php
include'includes/left.php';
?>
</div>



<div class="col-md-6 library">

<div class="library-wrap">

<div class="panel panel-default">
<div class="panel-body">
<button class="btn btn-success" id="btn-adbook"><img src="img/clipboard.png" />Add Book to Library</button>
<button class="btn btn-success pull-right" id="btn-adbookcat">Add a Book Category</button>
<br>
<div class="alert alert-danger" id="ack" role="alert" style="display: none">ERRRRRORRRR!</div>
<div class="alert alert-success" id="acks" role="alert" style="display: none"></div>


<form class="form-horizontal" id="addcat-form" method="POST" style="display:none; margin-top: 20px;">
  <input name="name" type="text" placeholder="Input Category" class="form-control" required="">
  <br>

  <input name="desc" type="text" placeholder="Input Category Description" class="form-control" required="">
  <input type="submit" name="reg" value="Add Book Category " class="btn btn-danger btn-lg register-btn" id="subcat" style="width: 250px; margin:auto; margin-left: 100px; margin-top: 40px;" /> 
</form>







<form class="form-horizontal" action="action/postbook.php"  id="addbook-form" method="POST" enctype="multipart/form-data" runat="server" style="display:none;">

<div class="col-md-6">
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="Name">Book Title</label>
  <div class="controls">
    <input id="Name" name="name" type="text" placeholder="Embeded systems" class="form-control" required="">
    
  </div>
</div>
</div>

<div class="col-md-6">
<div class="control-group">
  <label class="control-label" for="level">Select Categories</label>
  <div class="controls">
    <select id="level" name="bookcat" class="form-control">
 <?php   
 $bk = mysqli_query($con,"SELECT * FROM book_cat");

if(mysqli_num_rows($bk)){
	while($bkcat = mysqli_fetch_array($bk)){
		 
		echo "<option value=\"$bkcat[id]\">$bkcat[cat]</option>";
	}
}
  ?>
     </select>
  </div>
</div>

</div>

<div class="col-md-12">
<div class="control-group">

  <label class="control-label" for="level">Book Description</label>
  <div class="controls">
    <textarea style="width: 99%" name="desc"></textarea>
  </div>
</div>
<a class="btn btn-default" id="btn-pdffile">Attach File &nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span></a>
<input type="file" name="attachment" id="attachment" style="display:none" />
<input type="submit" name="reg" value="Submit Book" class="btn btn-danger btn-lg register-btn" id="sub" style="width: 250px; margin:auto; margin-left: 100px; margin-top: 40px;" /> 
</div>

</form>
</div>
</div>
<?php
if(isset($_GET['catid'])){
$bookcat = $_GET['catid'];
echo getbookbycat($bookcat);
}else{
	echo getallbook();
	}
?>

</div>

</div>


<div class="col-md-3 book-cat">
<div class="books-wrap">

<div class="panel panel-default">
<div class="panel-heading"><h4>Book Categories</h4></div>
<div class="panel-body">
<nav class="hidden-sm hidden-xs affix-top" data-spy="affix" data-offset-top="319" data-offset-bottom="500">
<ul class="nav nav-pills nav-stacked" id="abt-navbar">
<?php
echo getbookcat();

?>
  </ul>
  </nav>
  

<!-- <div class="well well-sm userToChat">
 <div class="thumbnail" style="background:#DBDBDB url(img/user.jpg) no-repeat; background-size: cover;">&nbsp;</div>&nbsp;&nbsp; <strong>Kazan</strong>
 
  </div> -->
</div>
</div>


</div>
</div>

</div>

</div>
</div>
</div>

<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<script src="js/vena.js"></script>

<script>
$('#crt-grp').click(function(e) {
   $('#addgrp-modal').modal('show');  
});

</script>
</body>
</html>