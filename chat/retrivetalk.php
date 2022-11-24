<?php 
include '../config.php';
error_reporting(0);
if($_POST["ChatToRetrieve"]){
$chatwith = filter_var($_POST["ChatToRetrieve"],FILTER_SANITIZE_NUMBER_INT); 
$_SESSION['ctw']= $chatwith;

$chat_query= mysqli_query($con, "SELECT * FROM chat WHERE chat_between='$id-$chatwith' or chat_between='$chatwith-$id'  ORDER BY id ASC");
$_SESSION['nmtime'] = time();
}
elseif($_GET["method"]=newchat){
	$chatwith=$_SESSION['ctw'];
	$cint=$_SESSION['nmtime'];
	$chat_query = mysqli_query($con, "SELECT * FROM chat WHERE chat_between='$chatwith-$id' && status=0 ORDER BY id ASC");
	$_SESSION['nmtime'] = time();
	}

if (mysqli_num_rows($chat_query)){
        while ($chat_out=mysqli_fetch_array($chat_query)){
			
		mysqli_query($con, "UPDATE chat set status=1 WHERE id='$chat_out[id]' && status=0 "); 
		
		$vtm = split(' ', $chat_out['date_time']);
		$todaytm= date("h:sA",$chat_out['int_val']); //substr($vtm[1], 0,5);
		
		if( $vtm[0] == date("Y-m-d")):
	$date = 'Today';
	elseif($vtm[0] == date("Y-m-d", strtotime("-1 day"))):
	$date = 'Yesterday';
	else:
	$date = date("F d","$chat_out[int_val]");
	endif;
	
		
		if ($chat_out['from']==$id){ $class= 'sent_chat';
		}
		else {$class= 'recieved_chat';}
		echo "<div class='$class'> $chat_out[body] <br /> <small id='cdt'>$date $todaytm</small></div>".'<br />' ;
		
			}
		
	}
	
?>
