<?php
include ('../config.php');
$cd= $_POST['vcode'];
$verifid=$_SESSION['idver'];
$time=time();

if ($cd){
	$verifsent = mysqli_query($con, "SELECT * FROM userverif WHERE userid='$verifid' and codesent='$cd' ");
	$get=mysqli_fetch_array($verifsent);
	if (mysqli_num_rows($verifsent)==1){
		$timediff= $time-$get['time'];
		$timeminutes=$timediff/60;
		if($timeminutes > 4){
		mysqli_query($con, "UPDATE user SET verifstatus=verifstatus+1 WHERE profhId_user='$verifid'");
		echo "Verification Successful";
		//sleep(1);
		/*echo '<script> location: ../main.php</script>';*/
		}
		else {
			echo 'Verification code expired, click resend verification code';
			}
		}
	else {
		echo "Invalid Code";
		}
	}
	else  {echo 'Please input a verification Code';}
?>