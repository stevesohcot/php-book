<?php include_once("a_first.php");?>

<?php define("PAGE_TITLE", "Tasks");?>

<?php Template_Header();?>

<div class="container">

 <h1>Tasks</h1>

	<?php include_once("tasks_add_update.php");?>	

<?php

	$query = "SELECT * FROM Tasks";
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
					<td><?php print $entries['user_id'];?></td>
					<td><?php print $entries['description'];?></td>
					<td><?php print date("n/j/Y", strtotime($entries['date_assigned']));?></td>
					<td><?php print $entries['completed'];?></td>					
					<td>
						<a href="tasks_update.php?task_id=<?php print $entries['id'];?>">Update</a>
						<a href="controller_tasks.php?DeleteTask=<?php print $entries['id'];?>" onClick="return confirm('Really Delete?');">Delete</a>
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

<?php include_once("a_last.php");?>

