<?php
include '../config.php';
$pcode=$em=$pass=$ss=$err=$ms=$iv=$perr=$eerr=$lerr="";

	

    $em= $_POST['email'];
    $pass= $_POST['pass'];

     if($em & $pass){
		 $g = mysqli_query($con, "SELECT * FROM user WHERE email='$em' or username='$em' and password='$pass' ");
		if(mysqli_num_rows($g)==1){
		$us = mysqli_fetch_array($g);
		$_SESSION['uid']=$us['id'];
		$_SESSION['acl']=$us['ac_level'];
		if ($us['ac_level']==0){
		$_SESSION['bss']=$us['boss'];
				
				}
		echo "<script>location='index.php'; </script>";
					
		}
		
		else{ 
		echo "ERROR:Incorrect combination of Username and password";
		}
	
    
    }
else echo "ERROR:**Either field is Empty**";
//sleep(4);
  ?>