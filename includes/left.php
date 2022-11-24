<div class="panel panel-default">
<div style="width:100%; height: 150px; background: url(img/ubk.jpg) no-repeat; background-size: cover;">&nbsp;</div>
  <div class="panel-body" style="word-wrap:break-word;">
  
      <div class="thumbnail" style="background:#DBDBDB url(img/ppix/<?php 
	$group_q= mysqli_query($con, "SELECT * FROM user WHERE id='$id'");
	if(mysqli_num_rows($group_q)){
	while($user= mysqli_fetch_array($group_q)){
	$record = $user["ppix"];
	echo $record;
		}} ?>) no-repeat; background-size: cover; margin-top: -40%; border: 4px solid rgba(255,255,255,0.89);"></div>
      
    <ul class="nav nav-stacked">
  <li role="presentation" class="active"><a href="#"><img src="img/svg/user.svg" width="20" style="fill: #494949" />&nbsp;&nbsp; <?php 
  	$group_q= mysqli_query($con, "SELECT * FROM user WHERE id='$id'");
	if(mysqli_num_rows($group_q)){
	while($user= mysqli_fetch_array($group_q)){
	$record = $user["username"];
	echo $record;
		}} ?></a></li>
  <li role="presentation"><a href="#"><img src="img/svg/envelop.svg"  width="20" style="fill: #494949" />&nbsp;&nbsp; <?php 
  	$group_q= mysqli_query($con, "SELECT * FROM user WHERE id='$id'");
	if(mysqli_num_rows($group_q)){
	while($user= mysqli_fetch_array($group_q)){
	$record = $user["email"];
	echo $record;
		}} ?></a></li>
</ul>
    
    <a href="sign-out.php" class="btn btn-danger btn-lg"><img src="img/switch.png" width="16" />&nbsp;&nbsp; Sign Out</a>  
  </div>
</div>

<div class=" well well-sm boss" >
<?php  
if ($acl==0){ echo getboss();}else{
	echo getkid();
	echo "<button class=\"btn btn-success  btn-lg\" id=\"crt-grp\">Create Group</button>";

}
 ?>

</div>

<div class="modal fade" id="addgrp-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Create a Group</h4>
      </div>
      <div class="modal-body">
        <div class="alert alert-warning alert-dismissible fade in" id="ack222" style="display:none;"></div>
        <form class="form-horizontal" id="form-addgrp" action="action/addgrp.php" method="post">
  <div class="form-group">
    <label for="grpname" class="col-sm-2 control-label">Group Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="grpname" name="name" placeholder="Group Title">
    </div>
  </div>
  <div class="form-group">
    <label for="grp-descr" class="col-sm-2 control-label">Description</label>
    <div class="col-sm-10">
      <textarea rows="6" class="form-control" id="grp-descr" name="tittle" ></textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-success btn-lg"  id="btn-addgrp" value="Create Group" />
    </div>
  </div>
</form>


      </div>
     
    </div>
  </div>
</div>

