<?php
include '../config.php';
 error_reporting(0);
$name=$tittle=$qr="";


$gid = $_POST['gid'];
$randid = md5(rand() * time());
 //echo $text;

if (!$_POST['gid']){
	echo 'Error';
}
else{

 $g = mysqli_query($con, "SELECT * FROM group_join WHERE joined_user='$id' and gid='$gid' ");
 if(mysqli_num_rows($g)==1){
	 echo "You already joined this group";
	 }
 
 else{

        $qr= mysqli_query($con,"INSERT INTO group_join values('','$id','$gid')");;
 }

		   if ($qr){
	
	echo "Success Group successfully Joined";}
		   else{
		   echo '<br /> Unknown Error';
		   }
		   	
}
	
			
?>
