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



<div class="col-md-6 chat">
<div class="chat-wrap">


<div class="panel panel-default">
<div class="panel-heading"><strong id="uname">&nbsp;</strong> <small class="pull-right">Online</small></div>
<div class="panel-body" id="display_chat">

<div style="text-align: center">
<div id="welcome" style="margin:auto; margin-top: 50px; ">
<h2>Welcome to Vena Chat</h2>
<p>Please select a user to chat</p>
</div>
</div>

</div>
<div class="panel-footer"> <div class="input-group">

      <input type="text" class="form-control" placeholder="Type here...." id="chatData" name="chat_msg" />
      
    <input type="hidden" name="toUser" id="toUser" value="" />

      <span class="input-group-btn">
        <button id="submitChat" class="btn btn-default" type="button"><span class="glyphicon glyphicon-send" aria-hidden="true"></span></button>
        </span>
        
      </span>

    </div><!-- /input-group -->
    </div>
    
</div>

</div>

</div>


<div class="col-md-3 chat-users">
<div class="users-wrap">

<div class="panel panel-default">
<div class="panel-heading"><h4>Chat List</h4></div>
<div class="panel-body">
<?php
echo getfriends();
?>
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
<script src="js/chat.js"></script>
<script>
$('#crt-grp').click(function(e) {
   $('#addgrp-modal').modal('show');  
});

</script>
</body>
</html>