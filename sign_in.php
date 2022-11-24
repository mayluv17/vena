<?php
include 'config.php';
if ($id):
header("location: sign_up.php");
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

<h3 class="text-center">Sign In</h3>

<div class=" well-sm alert alert-danger" id="ack" role="alert" style="display: none">ERRRRRORRRR!</div>

      <form id="login_form" class="form-signin" method="POST" action="action/login_action.php" >

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address or Usename" name="email" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="Password" required>
        <div class="checkbox">
          <label>
            <input type="checkbox" value="remember-me"> Remember me 
          </label>
        </div>
        <button class="btn btn-lg btn-danger btn-block" type="submit" id="signIn">Sign in</button>
        <button class="btn btn-lg btn-danger btn-block" type="submit" id="loading" disabled style="display: none;"><span class="glyphicon"> <img src="img/spinner9.png" width="28"> Wait..</span></button>
        
        <a href="sign_up.php">Register an Account</a>
      </form>

    </div> <!-- /container -->
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
</body>
</html>