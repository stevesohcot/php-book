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

	<form action="../controllers/controller_users.php" onSubmit="return ValidateUser();" method="post" class="form-inline">

		<div>First Name:* <span id="first_name_needed" style="display:none;" class="error error_alert">Required</span></div>
		<div><input type="text" name="first_name" id="first_name" value="<?php print $first_name;?>" class="form-control" /></div>

		<div>Last Name:* <span id="last_name_needed" style="display:none;" class="error error_alert">Required</span></div>
		<div><input type="text" name="last_name" id="last_name" value="<?php  print $last_name;?>" class="form-control" /></div>

		<div style="margin-top:10px;">
			<input type="hidden" name="AddUpdateUser" value="1" />
			<input type="hidden" name="user_id" value ="<?php print $user_id;?>" />
			<input type="submit" name="btnUpdateUser" value ="<?php print $header;?>" class="btn btn-primary" />
		</div>

		<div class="alert alert-danger" style="display:none; margin-top:10px;" id="error_general">
			Please fix the errors above before proceeding
		</div>

	</form>

</div>

