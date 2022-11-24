<?php
session_start();
$fchs="";
$actual_host = "http://$_SERVER[HTTP_HOST]";
$con= mysqli_connect('localhost','root','','vena');
if (isset($_GET['id'])){	
$bkid= $_GET['id'];
$fch = mysqli_fetch_array(mysqli_query($con, "SELECT * FROM books WHERE id='$bkid' "));

// PDF trigger
$file = "attachments/".$fch[bookDir]; //file directory
$filename = "$fch[bookName]";


  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file); 
  
}


 
?> 