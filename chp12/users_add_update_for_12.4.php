<?php

	$user_id = intval($_GET['user_id']);

	if ($user_id == 0) {
		// Add a user
		$header = "Add User";

	} else {

		// Update a user
		$header = "Update User";

		$User 		=  GetInfo($db1, "Users", $user_id);
		$first_name = $User['first_name'];
		$last_name 	= $User['last_name'];

	}
?>


<div class="well">

	<h3><?php print $header;?></h3>

	<form action="controller_users.php" method="post" class="form-inline">

		<div>First Name:</div>
		<div><input type="text" name="first_name" value="<?php print $first_name;?>" class="form-control" /></div>

		<div>Last Name:</div>
		<div><input type="text" name="last_name" value="<?php  print $last_name;?>" class="form-control" /></div>

		<div style="margin-top:10px;">

		<?php if ($user_id == 0) { ?>
			<input type="hidden" name="AddUser" value="1" />
			<input type="submit" name="btnAddUser" value="Add User" class="btn btn-primary" />
		<?php } else { ?>
			<input type="hidden" name="UpdateUser" value="1" />
			<input type="hidden" name="user_id" value="<?php print $user_id;?>" />
			<input type="submit" name="btnUpdateUser" value="Update User" class="btn btn-primary" />
		<?php } ?>

		</div>
	</form>

</div>

