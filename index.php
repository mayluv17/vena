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
<div class="col-md-6 broadcast">

<div class="broadcast-wrap">

<div class="panel panel-default post-broadcast">
<form method="POST" action="action/add-broadcast.php" id="broadcast-form" enctype="multipart/form-data" runat="server">
  <div class="panel-body">
   <div class="input-group">
      <span class="input-group-btn">
       
      </span>
      
      <textarea class="form-control broadcast-text" name="broadcasttext" placeholder="Say Something..."></textarea>
    </div><!-- /input-group -->
    
  </div>
<div class="filetype-wrap">

</div> 
 
  <div class="panel-footer">
   <div class="input-group ">
   <!--<div class="input-group-btn">
        <button type="button" class="btn btn-default dropdown-toggle " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="">Everyone <span class="caret"></span></button>
        <ul class="dropdown-menu group-selector">
          <li><a href="#" id="" gid="0">Everyone</a></li>
          <li role="separator" class="divider"></li>
         <?php //echo getgrp();  ?>
          
        </ul>
      </div>--><!-- /btn-group -->
      <a class="btn btn-default" id="btn-file">Attach File &nbsp;&nbsp;&nbsp;&nbsp;<span class="glyphicon glyphicon-paperclip" aria-hidden="true"></span></a>
      </div>
      <input type="hidden" class="" value="0" name="to" id="input-gid" />
       <input type="file" name="attachment" id="attachment" style="display: none" />
       
      <button class="btn btn-danger" id="br-btn" >Broadcast</button> 
       </div>
       
       </form>
       
     
</div>
<div class=" well-sm alert alert-danger" id="ack" role="alert" style="display: none">ERRRRRORRRR!</div>




<?php echo broadcast() 

	?>


</div>
</div>
<div class="col-md-3 group">


<div class="panel panel-default">
<div class="panel-heading"><h4>Groups</h4></div>

<div class="group-wrap" >
  <div class="panel-body" >
  <?php echo allgrp();
 
 ?>
  
</div>
</div>

</div>

<h6>Project By</h6>

<small>Surname Othernames<br>Surname Othernames</small>
<hr>
</div>




</div>
</div>
</div>




<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<script src="js/home.js"></script>
<script>
$('#crt-grp').click(function(e) {
   $('#addgrp-modal').modal('show');  
});

</script>
</body>
</html>
