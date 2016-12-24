<?php include_once("a_first.php");?>

<?php define("PAGE_TITLE", "Update User");?>

<?php Template_Header();?>

<div class="container">

	<?php

		$user_id = intval($_GET['user_id']);
		$query = "SELECT * FROM Users WHERE id = $user_id";
		$get_entries = mysqli_query($db1, $query);

		if ( mysqli_num_rows($get_entries) != 0) {

			while ($entries = mysqli_fetch_array($get_entries)) {
					$first_name = $entries['first_name'];
					$last_name = $entries['last_name'];
			}

		}

	?>

	<div class="well" style="margin-top:10px;">
		<h3>Update User</h3>
		
		<form action="controller_users.php" method="post" class="form-inline">

			<div>First Name:</div>
			<div><input type="text" name="first_name" value="<?php print $first_name;?>" class="form-control" /></div>

			<div>Last Name:</div>
			<div><input type="text" name="last_name" value="<?php print $last_name;?>" class="form-control" /></div>

			<div style="margin-top:10px;">
				<input type="hidden" name="UpdateUser" value="1" />
				<input type="hidden" name="user_id" value="<?php print $user_id;?>" />
				<input type="submit" name="btnUpdateUser" value="Update User" class="btn btn-primary" />
			</div>
		</form>
	</div>
	
</div> <!-- /.container -->

<?php Template_Footer();?>

<?php include_once("a_last.php");?>


