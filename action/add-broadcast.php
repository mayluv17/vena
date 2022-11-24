<?php
include '../config.php';
 error_reporting(0);
$att=$org=$to=$text=$qr= "";


$text = $_POST['broadcasttext'];

 $date_time= date('Y-m-d H:i:s');
$uploadDir = '../attachments/';
$fileName = $_FILES['attachment']['name'];
$tmpName = $_FILES['attachment']['tmp_name'];
$fileSize = round($_FILES['attachment']['size']/1024);
$fileType = $_FILES['attachment']['type'];


if (!$_POST['broadcasttext']){
	echo 'Please say Some Words';
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
$sext = array('jpg','jpeg','png','pdf','doc','docx','');
// make the random file name
if(in_array($ext,$sext)){
$randName = md5(rand() * time());
// and now we have the unique file name for the upload file
$att = $uploadDir . $randName . '.' . $ext;
//move_uploaded_file($tmpName, $att);
move_uploaded_file($tmpName, $att);
$fl = $randName . '.' . $ext;

if (!$erro){

//	if($to==0){
		 //$group_q= mysqli_query($con, "SELECT * FROM group_join WHERE joined_user='$id' ");

		// $qr= mysqli_query($con,"INSERT INTO broadcast values('','$id','$text','$fl','$group_q1[gid]','$date_time')");
	
		//}
		// else{ 
          $qr= mysqli_query($con,"INSERT INTO broadcast values('','$id','$text','$fl','$date_time')");
		  // }
}
		   if ($qr)
{echo "success";}
		   else{
		   echo '<br>
Something went wrong ';
		   }
		   	
		}
else{
	echo 'Unsurpported attacment format'; $erro=1;
	}	
			}
		
	} //If some text is written
?>
