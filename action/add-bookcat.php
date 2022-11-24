<?php
include '../config.php';
 error_reporting(0);
$name=$tittle=$qr="";


$cat = $_POST['name'];
$desc = ['desc'];
 //echo $text;

if (!$_POST['name']){
	echo 'Error';
}
else{

 $g = mysqli_query($con, "SELECT * FROM book_cat WHERE cat='$cat'");
 if(mysqli_num_rows($g)==1){
	 echo "Category Already exists!";
	 }
 
 else{

        $qr= mysqli_query($con,"INSERT INTO book_cat values('','$cat','$desc')");;
 }

		   if ($qr){
	
	echo "ok";}
		   else{
		   echo '';
		   }
		   	
}
	
			
?>
