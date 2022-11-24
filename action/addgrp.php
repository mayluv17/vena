<?php
include '../config.php';
 error_reporting(0);
$name=$tittle=$qr="";


$name = $_POST['name'];
$title = $_POST['title'];
$randid = md5(rand() * time());
 //echo $text;

if (!$_POST['name']){
	echo 'Please type a name';
}
else{

if (!$erro){

          $qr= mysqli_query($con,"INSERT INTO groups values('$randid','$name','$title','$id')");
		 
}
		   if ($qr)
{
	$qr= mysqli_query($con,"INSERT INTO group_join values('','$id','$randid')");
	echo "success";}
		   else{
		   echo 'Unknown Error';
		   }
		   	
}
	
			
?>
