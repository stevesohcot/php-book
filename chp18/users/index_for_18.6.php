<?php include_once("../includes/a_first.php");?>

<?php define("PAGE_TITLE", "Users");?>

<?php Template_Header();?>

<div class="container">

 <h1>Users</h1>
 	<a href="#" onClick="ValidateUser();">Validate User</a>
	<?php include_once("../includes/users_add_update.php");?>	

<?php

	$query = "SELECT * FROM Users";
	$get_entries = mysqli_query($db1, $query);

	if ( mysqli_num_rows($get_entries) == 0) {

		?>
			<div class="alert alert-danger">
				No data
			</div>
		<?php
		
	} else {
		?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
		<?php
		while ($entries = mysqli_fetch_array($get_entries)) {
			?>
				<tr>
					<td><?php print $entries['id'];?></td>
					<td><?php print $entries['first_name'];?> <?php print $entries['last_name'];?></td>
					<td>
						<a href="users_update.php?user_id=<?php print $entries['id'];?>">Update</a>
						<a href="../controllers/controller_users.php?DeleteUser=<?php print $entries['id'];?>" onClick="return confirm('Really Delete?');">Delete</a>
					</td>
				</tr>
			<?php
		}
		?>
				</tbody>
			</table>
		<?php
	}		

?>
	

</div> <!-- /.container -->

<?php Template_Footer();?>

<?php include_once("../includes/a_last.php");?>

