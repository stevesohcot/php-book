<?php include_once("a_first.php");?>

<?php define("PAGE_TITLE", "Users");?>

<?php Template_Header();?>

<div class="container">

 <h1>Users</h1>
 <div class="well">
 <h3>Add User</h3>
 
 <form action="controller_users.php" method="post" class="form-inline">
 
  <div>First Name:</div>
  <div><input type="text" name="first_name" class="form-control" /></div>
  
  <div>Last Name:</div>
  <div><input type="text" name="last_name" class="form-control" /></div>
  
  <div style="margin-top:10px;">
    <input type="hidden" name="AddUser" value="1" />
    <input type="submit" name="btnAddUser" value="Add User" class="btn btn-primary" />
  </div>

 </form>
 
</div> <!-- /.well -->

</div> <!-- /.container -->

<?php Template_Footer();?>

<?php include_once("a_last.php");?>

