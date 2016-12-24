<?php

	$task_id = intval($_GET['task_id']);

	if ($task_id == 0) {
		// Add a Task
		$header = "Add Task";

	} else {

		// Update a Task
		$header = "Update Task";

		$Task 			=  GetInfo($db1, "Tasks", $task_id);
		$user_id 		= $Task['user_id'];
		$description 	= $Task['description'];
		$date_assigned 	= $Task['date_assigned'];
		$completed 		= $Task['completed'];
	}
?>


<div class="well">

	<h3><?php print $header;?></h3>

	<form action="controller_tasks.php" method="post" class="form-inline">

		<div>User ID:</div>
		<div><input type="text" name="user_id" value="<?php print $user_id;?>" class="form-control" /></div>

		<div>Description:</div>
		<div><input type="text" name="description" value="<?php print $description;?>" class="form-control" /></div>

		<div>Date Assigned:</div>
		<div><input type="text" name="date_assigned" value="<?php print $date_assigned;?>" class="form-control" /></div>

		<div>Completed:</div>
		<div><input type="text" name="completed" value="<?php print $completed;?>" class="form-control" /></div>

		<div style="margin-top:10px;">
			<input type="hidden" name="AddUpdateTask" value="1" />
			<input type="hidden" name="task_id" value ="<?php print $task_id;?>" />
			<input type="submit" name="btnUpdateTask" value ="<?php print $header;?>" class="btn btn-primary" />
		</div>

	</form>

</div>

