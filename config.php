<?php
session_start ();
error_reporting(0);

if(isset($_SESSION["uid"])){
$id=$_SESSION["uid"];
$acl=$_SESSION["acl"];

if ($acl==0){$boss=$_SESSION["bss"];}

}
else {//$id = "";
}
$con = mysqli_connect('localhost','root','','vena');

if(!$con):
echo "<script> alert('cannnot connect to database')</script>";
else:
endif;

//$v = mysqli_query($con, "SELECT * FROM contacts where added_by='$id' ORDER BY contact_name ") or die(mysqli_error($con));

//$cont_query= mysqli_query($con, "SELECT * FROM contacts ORDER BY contact_name");
//$user_q= mysqli_query($con, "SELECT * FROM user WHERE id=$id ");
//$c_log=mysqli_query($con, "SELECT * FROM log_calls WHERE log_by=$id ");

/*if(mysqli_num_rows($user_q)){
	$user_q_out= mysqli_fetch_array($user_q);
	}
*/
function mydetails($data){
	global $con;
	global $id;
	$record = "";
	 $group_q= mysqli_query($con, "SELECT * FROM user WHERE id='$id' ");
	if(mysqli_num_rows($group_q)){
	while($user= mysqli_fetch_array($group_q)){
	$record = $user[$user];
		}
			}
			return $record;
	}
function getgrp(){
	global $con;
	global $id;
	$rec ="";
	$group_q= mysqli_query($con, "SELECT group_join.*,groups.name FROM group_join
	LEFT JOIN groups ON groups.gid = group_join.gid
	WHERE joined_user='$id'");
	if($n=mysqli_num_rows($group_q)){
	while($group_q1 = mysqli_fetch_array($group_q)){
		
	$rec .= "<li><a href='#' class=\"grp-to-join\" gid=\"$group_q1[gid]\">$group_q1[name]</a></li>";
}
	}
	return $rec;
	
}

function getboss(){
	global $con;
	global $boss;
	$rec ="";
	 $group_q= mysqli_query($con, "SELECT * FROM user WHERE id='$boss' ");
	if($n=mysqli_num_rows($group_q)){
	while($group_q1 = mysqli_fetch_array($group_q)){
		
	$rec .= "<div class=\"thumbnail\" id=\"md-tumb\" style=\"background: url(img/ppix/$group_q1[ppix]); background-size: cover;\"></div>
<strong> $group_q1[name]</strong>
";
}
	}
	return $rec;
	
}

function getkid(){
	global $con;
	global $id;
	$rec ="";
	 $group_q= mysqli_query($con, "SELECT * FROM user WHERE boss='$id' ");
	if($n=mysqli_num_rows($group_q)){
	while($group_q1 = mysqli_fetch_array($group_q)){
		
	$rec .= "<div class=\"thumbnail\" id=\"md-tumb\" style=\"background: url(img/ppix/$group_q1[ppix]); background-size: cover;\"></div>
<strong> $group_q1[name]</strong>
";
}
	}
	return $rec;
	
}


function allgrp(){
	global $con;
	global $id;
	$rec ="";
	$group_q= mysqli_query($con, "SELECT groups.*,user.boss FROM user LEFT JOIN groups ON groups.created_by = user.boss or groups.created_by='$id' WHERE user.id='$id' ");
	if(mysqli_num_rows($group_q)){
	while($group_q1 = mysqli_fetch_array($group_q)){
	$rec .= "	<div class=\"well well-sm\">
$group_q1[name]
<button class=\"add-to-group\" gid=\"$group_q1[gid]\">
<span class=\"glyphicon glyphicon-plus\" aria-hidden=\"true\"></span>

</button>
</div>";
}
	}
	return $rec;
	
}

function broadcast(){
	global $con;
	global $id;
	$rec ="";
	$gid ="";
	$group_q= mysqli_query($con, "SELECT broadcast.*,user.* FROM broadcast
LEFT JOIN user ON broadcast.uid=user.id
WHERE uid IN (Select joined_user from group_join where gid IN (Select gid from group_join where joined_user = '$id')) ORDER BY broadcast.bid DESC");
	

	/*	$group_q= mysqli_query($con, "SELECT broadcast.*,group_join.gid,group_join.joined_user,user.* FROM group_join LEFT JOIN broadcast ON group_join.gid = broadcast.too LEFT JOIN user ON broadcast.uid=user.id WHERE group_join.joined_user='$id' ORDER BY broadcast.bid DESC");*/
	if(mysqli_num_rows($group_q)){
	while($group_q1 = mysqli_fetch_array($group_q)){

	$part = pathinfo($group_q1['file']);
$ext = substr(strrchr($group_q1['file'], "."), 1);
$ext = strtolower($ext);

	if($ext=='mp4'){
		
		$rec .= "
<div class=\"panel panel-default each-broadcast\">
 <div class=\"panel-heading\"><div class=\"thumbnail small-thumb\" style=\"background-image:url(img/ppix/$group_q1[ppix]); background-size:cover;\"></div><h6>$group_q1[name]</h6> </div>
  <div class=\"panel-body\">
  <div class=\"broadcast-vid\"><video src=\"attachments/$group_q1[file]\" controls> Not dupported </video></div>
   $group_q1[text]
  </div>
  <div class=\"panel-footer\"><img src=\"img/svg/eye.svg\" style=\"fill: #666666\" width=\"16\" height=\"16\" /> <small>14</small>  <div class=\"pull-right\"><small>$group_q1[date_time]</small></div> </div>
</div>";
//$gid ="$group_q1[bid]";
	}//if ends*/
	
if($ext=='jpg' || $ext=='png'){
	
$rec .= "<div class=\"panel panel-default each-broadcast\">
 <div class=\"panel-heading\"><div class=\"thumbnail small-thumb\" style=\"background-image:url(img/ppix/$group_q1[ppix]); background-size:cover;\"></div><h6>$group_q1[name]</h6> </div>

  <div class=\"panel-body\">
 
  <div class=\"broadcast-pix\"><img src=\"attachments/$group_q1[file]\" /></div>
  $group_q1[text]
  </div>
  <div class=\"panel-footer\"><img src=\"img/svg/eye.svg\" style=\"fill: #666666\" width=\"16\" height=\"16\" /> <small>14</small>  <div class=\"pull-right\"><small>$group_q1[date_time]</small></div> </div>
</div>";
	
	} //elseif ends
if($ext=='pdf'){
	
$rec .= "<div class=\"panel panel-default each-broadcast\">
 <div class=\"panel-heading\"><div class=\"thumbnail small-thumb\" style=\"background-image:url(img/ppix/$group_q1[ppix]); background-size:cover;\"></div><h6>$group_q1[name]</h6> </div>

  <div class=\"panel-body\">
 $group_q1[text]
 
 <a href=\"attachments/$group_q1[file]\" class=\"filetype-wrap\">
 <div class=\"well-sm\" style=\"padding-left: 50px; border-top: 1px solid #E3E3E3\"><img src=\"img/ftype/pdf.png\" width=\"42\" style=\"border-right: 1px solid #E3E3E3;\"> A File is attached</div></a>
 

  
  </div>
  <div class=\"panel-footer\"><img src=\"img/svg/eye.svg\" style=\"fill: #666666\" width=\"16\" height=\"16\" /> <small>14</small>  <div class=\"pull-right\"><small>$group_q1[date_time]</small></div> </div>
</div>";
	
	}
if($ext=='docx'){
	
$rec .= "<div class=\"panel panel-default each-broadcast\">
 <div class=\"panel-heading\"><div class=\"thumbnail small-thumb\" style=\"background-image:url(img/ppix/$group_q1[ppix]); background-size:cover;\"></div><h6>$group_q1[name]</h6> </div>

  <div class=\"panel-body\">
 $group_q1[text]
 
 <a href=\"attachments/$group_q1[file]\" class=\"filetype-wrap\">
 <div class=\"well-sm\" style=\"padding-left: 50px; border-top: 1px solid #E3E3E3\"><img src=\"img/ftype/docx.png\" width=\"42\" style=\"border-right: 1px solid #E3E3E3;\"> A File is attached</div></a>
 

  
  </div>
  <div class=\"panel-footer\"><img src=\"img/svg/eye.svg\" style=\"fill: #666666\" width=\"16\" height=\"16\" /> <small>14</small>  <div class=\"pull-right\"><small>$group_q1[date_time]</small></div> </div>
</div>";
	
	} 
if($ext=='doc'){
	
$rec .= "<div class=\"panel panel-default each-broadcast\">
 <div class=\"panel-heading\"><div class=\"thumbnail small-thumb\" style=\"background-image:url(img/ppix/$group_q1[ppix]); background-size:cover;\"></div><h6>$group_q1[name]</h6> </div>

  <div class=\"panel-body\">
 $group_q1[text]
 
 <a href=\"attachments/$group_q1[file]\" class=\"filetype-wrap\">
 <div class=\"well-sm\" style=\"padding-left: 50px; border-top: 1px solid #E3E3E3\"><img src=\"img/ftype/doc.png\" width=\"42\" style=\"border-right: 1px solid #E3E3E3;\"> A File is attached</div></a>
 

  
  </div>
  <div class=\"panel-footer\"><img src=\"img/svg/eye.svg\" style=\"fill: #666666\" width=\"16\" height=\"16\" /> <small>14</small>  <div class=\"pull-right\"><small>$group_q1[date_time]</small></div> </div>
</div>";
	
	} 	 
		
	elseif ($ext=='') {
		$rec .= "
<div class=\"panel panel-default each-broadcast\">
 <div class=\"panel-heading\"><div class=\"thumbnail small-thumb\" style=\"background-image:url(img/ppix/$group_q1[ppix]); background-size:cover;\"></div><h6>$group_q1[name]</h6> </div>
  <div class=\"panel-body\">
  
   $group_q1[text]
  </div>
  <div class=\"panel-footer\"><img src=\"img/svg/eye.svg\" style=\"fill: #666666\" width=\"16\" height=\"16\" /> <small>14</small>  <div class=\"pull-right\"><small>$group_q1[date_time]</small></div> </div>
</div>";
	}
	
} //while ends
	}
	return $rec;
		
}

///////////////////////////////////////////////////////////////////

function getfriends(){
	global $con;
	global $id;
	$rec ="";


$g = mysqli_query($con,"SELECT * FROM user WHERE id IN (Select joined_user from group_join where gid IN (Select gid from group_join where joined_user = '$id')) and id!='$id' ");

if(mysqli_num_rows($g)){
	while($friends = mysqli_fetch_array($g)){
		 
		$rec .= " <div class=\"well well-sm userToChat\" id=\"user_$friends[id]\" title=\"user_$friends[username]\">
 <div class=\"thumbnail\" style=\"background:#DBDBDB url(img/ppix/$friends[ppix]); background-size: cover;\">&nbsp;</div>&nbsp;&nbsp; <strong>$friends[name]</strong>

  </div>  ";
  
	}
}


return $rec;
}
//////////////////////////////////////////////////////////////////////
function getbookcat(){
	global $con;
	global $id;
	$rec ="";
$g = mysqli_query($con,"SELECT * FROM book_cat");

if(mysqli_num_rows($g)){
	while($book_cat = mysqli_fetch_array($g)){
		$bic = $book_cat['id'];
		 $gc = mysqli_query($con,"SELECT * FROM books WHERE courseId='$bic' ");
		 $no_of_course=mysqli_num_rows($gc);
		$rec .= " 
		<li role=\"presentation\" >
		<a href=\"library.php?catid=$book_cat[id]\" title=\"$book_cat[description]\">
  
$book_cat[cat]
<span class=\"badge\">$no_of_course</span>
  </a> </li> ";
  
	}
}
else {$rec = 'No categories set';}
return $rec;
}
/////////////////////////////////////////////////////////////////////
function getbookbycat($bookcat){
	global $con;
	global $id;
	//$bookcat = $_GET['catid'];
	$rec ="";
$g = mysqli_query($con,"SELECT * FROM books WHERE courseId='$bookcat' ");

if(mysqli_num_rows($g)){
	while($book = mysqli_fetch_array($g)){		
        $rec .="<div class=\"well well-sm\">
<img src=\"img/ftype/pdf.png\" />
<p><strong>$book[bookName]</strong><br>
$book[description]</p>
<a href=\"viewbookoff.php?id=$book[id]\" class=\"pull-right\" >Read Book</a>
</div>";
  
	}
}
else {$rec = 'No categories set';}
return $rec;
}
/////////////////////////////////////////////////////////////////////


function getallbook(){
	global $con;
	global $id;
	$rec ="";
$g = mysqli_query($con,"SELECT * FROM books ORDER BY id DESC");

if(mysqli_num_rows($g)){
	while($book= mysqli_fetch_array($g)){
	$rec .="<div class=\"well well-sm\">
<img src=\"img/ftype/pdf.png\" />
<p><strong>Embeded systems-Aduino Uno beginer guide</strong><br>
The description of the book above is simply stated below</p>
<a href=\"viewbookoff.php?id=$book[id]\" class=\"pull-right\" >Read Book</a>
</div>";
	}
	}
else {$rec = 'No Books uploaded yet';}
return $rec;
		
}

?>