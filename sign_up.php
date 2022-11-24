<?php
include 'config.php';
if ($id):
header("location: index.php");
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
<div class="flyback"><img src="img/brand.png" /> </div>
<div class="container">
<div class="row">
<div class="col-md-3"> </div>
<div class="col-md-6 form-wrap">

<h3 class="text-center">Sign Up</h3>
<div class=" well-sm alert alert-danger" id="ack" role="alert" style="display: none">ERRRRRORRRR!</div>

<form class="form-horizontal" id="signup_Form" action="action/signup_action.php" method="POST" enctype="multipart/form-data" runat="server">

<div class="col-md-6">
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="Name">Name</label>
  <div class="controls">
    <input id="Name" name="name" type="text" placeholder="Mr/Mrs/Dr/Proff Surname First" class="form-control" required="">
    
  </div>
</div>
</div>
<div class="col-md-6">
<!-- Text input-->
<div class="control-group">
  <label class="control-label" for="username">Username</label>
  <div class="controls">
    <input id="username" name="username" type="text" placeholder="Username" class="form-control" required="">
    
  </div>
</div>
</div>

<div class="col-md-6">
<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="password">Password</label>
  <div class="controls">
    <input id="password" name="password" type="password" placeholder="" class="form-control" required="">
    
  </div>
</div>
</div>
<div class="col-md-6">
<!-- Password input-->
<div class="control-group">
  <label class="control-label" for="email">Email </label>
  <div class="controls">
    <input id="email" name="email" type="email" placeholder="" class="form-control" required="">
    
  </div>
</div>
</div>
<div class="col-md-6">
<!-- Select Basic -->
<div class="control-group">
  <label class="control-label" for="level">I am</label>
  <div class="controls">
    <select id="level" name="level" class="form-control">
      <option value="0">a student</option>
      <option value="1">a Lecturer</option>
    </select>
  </div>
</div>
</div>
<div class="col-md-6">
<!-- Select Basic -->
<div class="control-group" id="tog">
  <label class="control-label" for="under">Under</label>
  <div class="controls">
    <select id="under" name="under" class="form-control" >
    <?php
    $group_q= mysqli_query($con, "SELECT * FROM user WHERE ac_level='1' ");
	if($n=mysqli_num_rows($group_q)){
	while($user_q1 = mysqli_fetch_array($group_q)){
		echo "<option value=\"$user_q1[id]\">$user_q1[name]</option>";
		}}
		?>
      
    </select>
  </div>
</div>
</div>
<div class="col-md-6">
<!-- File Button --> 
<div class="control-group">
  <label class="control-label" for="filebutton">Select Profile Picture</label>
  <div class="controls">
    <input id="pixfile" name="ppix" class="input-file" type="file">
  </div>
</div>
<input type="submit" name="reg" value="Sign Up" class="btn btn-danger btn-lg register-btn" id="sub" style="width: 250px; margin:auto; margin-left: 100px; margin-top: 40px;" /> 
 <button class="btn btn-lg btn-danger btn-block" type="submit" id="loading" disabled style="width: 250px; margin:auto; margin-left: 100px; margin-top: 40px; display: none;"><span class="glyphicon"> <img src="img/spinner9.png" width="28"> Wait..</span></button>
</div>




</form>

</div>
<div class="col-md-3"> </div>
</div>
</div>



<script src="js/jquery-2.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.slimscroll.min.js"></script>
<script src="js/vena.js"></script>
<style>
.flyback { background-color: #f84e47; width: 100%; height: 150px;  padding-top: 25px;}
.flyback img { width: 71px; height: 20px; display: block; margin: 0px auto;}
.form-wrap{ border: 1px solid #E3E3E3; background-color: #FFFFFF; margin-top: -50px; padding-bottom: 50px;}
.form-wrap form{padding-top: 40px;}
.form-wrap form #pixfile {padding-top: 20px;}
#sub{ margin-left: -120px; margin-top: 100px;}
.form-wrap #loading span img{ animation-iteration-count: infinite; transition-duration: 2s; transform: rotate(360deg);}
</style>
</body>
</html>