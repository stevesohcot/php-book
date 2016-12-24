<?php include_once("../includes/a_first.php");?>
<?php include_once("../includes/validation_admin.php");?>
<?php define("PAGE_TITLE", "Tasks");?>

<?php Template_Header();?>

<div class="container">

 <h1>Tasks</h1>

	<?php include_once("../includes/tasks_add_update.php");?>	

<?php

	$query = "SELECT Tasks.*, Users.first_name, Users.last_name 
		FROM Tasks
		INNER JOIN Users ON Users.id = Tasks.user_id
	";

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
						<th>Task ID</th>
						<th>User ID</th>
						<th>Description</th>
						<th>Date Assigned</th>
						<th>Completed</th>
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
					<td><?php print $entries['description'];?></td>
					<td><?php print date("n/j/Y", strtotime($entries['date_assigned']));?></td>
					<td>
						<?php if ($entries['completed'] == "Y") print "Yes"; ?>
						<?php if ($entries['completed'] == "N") print "No"; ?>
					</td>					
					<td>
						<a href="tasks_update.php?task_id=<?php print $entries['id'];?>">Update</a>
						<a href="../controllers/controller_tasks.php?DeleteTask=<?php print $entries['id'];?>" onClick="return confirm('Really Delete?');">Delete</a>
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

