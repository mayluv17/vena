<?php
include '../config.php';
 error_reporting(0);
$att=$org=$to=$text=$qr= "";


$title = $_POST['name'];
$decr = $_POST['desc'];
$cat = $_POST['bookcat'];

 //echo $text;
 $date_time= date('Y-m-d H:i:s');
$uploadDir = '../attachments/';
$fileName = $_FILES['attachment']['name'];
$tmpName = $_FILES['attachment']['tmp_name'];
$fileSize = round($_FILES['attachment']['size']/1024);
$fileType = $_FILES['attachment']['type'];


if (!$_POST['name']){
	echo 'Please give your book a name';
}
else{

if($fileSize > 3042){
echo "<div class=\"frminfo\"><font color=\"#FF0000\">* Sorry, your file size is larger than maximum file size allowed!</font></div>";
echo "<script>";
echo "alert('Sorry, your file size is larger than maximum file size allowed!');";
echo "</script>" ;$erro=1;
}else{
		$part = pathinfo($fileName);
$ext = substr(strrchr($fileName, "."), 1);
$ext = strtolower($ext);
$sext = array('pdf');
// make the random file name
if(in_array($ext,$sext)){
$randName = md5(rand() * time());
// and now we have the unique file name for the upload file
$att = $uploadDir . $randName . '.' . $ext;
//move_uploaded_file($tmpName, $att);
move_uploaded_file($tmpName, $att);
$fl = $randName . '.' . $ext;

if (!$erro){
	 $qr= mysqli_query($con,"INSERT INTO books values('','$cat','$title','$decr','$fl','$date_time')");
	}
		//}
		
//}
		   if ($qr)
{echo "success";}
		   else{
		   echo 'Unknown Error';
		   }
		   	
		}
else{
	echo 'Unsurpported attacment format'; $erro=1;
	}	
			}
		
	} //If some text is written
?>
