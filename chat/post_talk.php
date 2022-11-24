<?php
include '../config.php';
 
$chat_msg= "";
$qr = "";

$chat_msg = mysqli_real_escape_string($con,$_POST['chat_msg']);

$ToId = $_POST['toUser'];
$stime= time();
if ($chat_msg & $ToId){
			   $chat_id = substr(md5(time()), 0, 70);
			   $date_time= date('Y-m-d H:i:s');
               $qr= mysqli_query($con,"INSERT INTO chat values('','$chat_id','$chat_msg','$id-$ToId','$ToId','$id','$date_time','$stime','')");
			  // mysqli_query($con,'UPDATE user set last_chat="'.$ToId.'" WHERE profhId_user="'.$id.'"');
			   $vtm = split(' ', $date_time);
		       $todaytm= substr($vtm[1], 0,5);
		   }
		   
if ($qr){
	echo "<div class='sent_chat'> $chat_msg <br /> <span id='cdt'>Today $todaytm</span></div>".'<br />' ;

	}
	else{
		echo 'ErroR!';
		 echo $id . $ToId . $chat_msg; }

?>
