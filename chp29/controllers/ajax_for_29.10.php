<?php include_once("../includes/a_first.php");?>
<?php include_once("../includes/validation.php");?>

<?php 

if (array_key_exists('AjaxAddUpdateTask', $_POST)) { 
		
		$task_id 		= intval($_POST['task_id']);
		$description 	= quote_smart($db1, $_POST['description']);
		$date_assigned	= $_POST['date_assigned'];
		$completed		= quote_smart($db1, $_POST['completed']);


		// Define array that will hold any errors we have
		$ServerSideCheckErrors	=	array();

		// Description is not blank
		if ( $description == "") {
			$ServerSideCheckErrors[] = "The description is required";
		}

		// validate the date
		if (!verifyDate($date_assigned)){			
			$ServerSideCheckErrors[]="Invalid date; needs to be in the format: mm/dd/yyyy";
		}

		// Define list of possible values for Completed
		// Then see if the value given is in that array of possible values
		$arrValuesForCompleted = array("Y","N");

		if ( !in_array($completed, $arrValuesForCompleted) ) {
			$ServerSideCheckErrors[]="Invalid value for Completed ";	
		}


		// Convert to PHP "date" data type AFTER we do the checks
		$date_assigned	= date("Y-m-d G:i:s", strtotime( quote_smart($db1, $_POST['date_assigned'])));



		if (sizeof($ServerSideCheckErrors) > 0) {
				
				print "Error";
				if (sizeof($ServerSideCheckErrors) > 1) print "s";
				print ":<br>";
				
				for($x=0; $x < sizeof($ServerSideCheckErrors); $x++) {
					print "$ServerSideCheckErrors[$x]<br>";
				}
				
				echo "<p><A HREF=\"javascript: self.history.back()\">Click here</A> to fix these errors.</p>";
				exit();
		
		}



		if ($task_id == 0) {				

			$query = "INSERT INTO Tasks 
					(`id`, `user_id` ,`description`, `date_assigned`, `completed`)
					VALUES ('', " . constant('USER_ID') . ", '$description','$date_assigned','$completed')";

			$notification = "task-added";

		} else {

			$query = "UPDATE Tasks SET
					description 	= '$description',
					date_assigned 	= '$date_assigned',
					completed 		= '$completed'
					WHERE 	id = $task_id AND 
							user_id = " . constant('USER_ID') . "
					LIMIT 1
			";
			$notification = "task-updated";
		}

		// Use this for debugging
		if (mysqli_query($db1, $query)) {
			print $notification;
			exit();
		} else {
			print ("<strong>ERROR: " . mysqli_error($db1) . "</strong><br />");
		}

		// once you know the above works, you can use this consolidated code instead:
		//$run_query = mysqli_query($db1, $query);			
		// print $notification;
		//exit();

} // if (array_key_exists('AjaxAddUpdateTask', $_POST)) 

if (array_key_exists('AjaxViewTasks', $_POST)) {
		
		$query = "SELECT * 
					FROM Tasks 
					WHERE user_id = " . constant('USER_ID') . "
					ORDER BY date_assigned";

		$get_entries = mysqli_query($db1, $query);

		if ( mysqli_num_rows($get_entries) == 0) {

			?>
				<div class="alert alert-danger">
					No data
				</div>
			<?php
			
		} else {
			?>

				<div class="alert alert-warning">
					Click on a value in the table to edit it.
				</div>
			
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Description</th>
							<th>Date Assigned</th>
							<th>Completed</th>
						</tr>
					</thead>
					<tbody>
			<?php
				while ($entries = mysqli_fetch_array($get_entries)) {
					?>
						<tr>
							<td id="<?php print $entries['id'] . '_description'; ?>">
								<a href="#" onClick="ShowTaskUpdateFields('<?php print $entries['id'] . '_description'; ?>'); return false;">
									<?php print $entries['description'];?>
								</a>
							</td>
							<td id="<?php print $entries['id'] . '_date_assigned'; ?>">
								<a href="#" onClick="ShowTaskUpdateFields('<?php print $entries['id'] . '_date_assigned'; ?>'); return false;">
									<?php print date("n/j/Y", strtotime($entries['date_assigned']));?>
								</a>
							</td>
							<td id="<?php print $entries['id'] . '_completed'; ?>">
								<a href="#" onClick="ShowTaskUpdateFields('<?php print $entries['id'] . '_completed'; ?>'); return false;">
									<?php if ($entries['completed'] == "Y") print "Yes"; ?>
									<?php if ($entries['completed'] == "N") print "No"; ?>
								</a>
							</td>
							
						</tr>
					<?php
				} // while
			?>
					</tbody>
				</table>
			<?php

		} // if ( mysqli_num_rows($get_entries) == 0)

} // if (array_key_exists('AjaxViewTasks', $_POST))



if (array_key_exists('ShowUpdateTaskFields', $_POST)) {

	$task_id 		= intval($_POST['task_id']);
	$field_name 	= quote_smart($db1, $_POST['field_name']);

	// verify the field name is only one
	// that we expect it should be
	$validFields = array("description", "date_assigned", "completed");
	if ( in_array($field_name, $validFields) ) {

		// verify that the task we are about to edit
		// belongs to the right user
		$TaskInfo = GetInfo($db1, "Tasks", $task_id);
		$user_id_for_task = $TaskInfo["user_id"];

		if ($user_id_for_task == constant('USER_ID')) {

			// Validation checks pass:
			// Display a FORM for the user to update it

			// If it's "completed" we show a drop-down
			// Otherwise it's  textbox
			if ($field_name == "completed") {
			?>
				<form>
					<select id="x<?php print $task_id . '_' .$field_name ;?>" class="form-control">
						<option value=""></option>
						<option value="Y" <?php if ($TaskInfo[$field_name] == "Y") { ?> selected="selected" <?php } ?>>Yes</option>
						<option value="N" <?php if ($TaskInfo[$field_name] == "N") { ?> selected="selected" <?php } ?>>No</option>
					</select>
					<input type="button"  onClick="UpdateTaskSingleField('<?php print $task_id;?>', '<?php print $field_name ;?>');" class="btn btn-success" value="Save" />
				</form>
			<?php
			
			} else {

				// If it's a date, let's format it ahead of time
				if ($field_name == "date_assigned") {
					$previous_value =  date("n/j/Y", strtotime($TaskInfo[$field_name]));
				} else {
					$previous_value = $TaskInfo[$field_name];
				}

			?>
				<form>
					<input type="text"  id="x<?php print $task_id . '_' .$field_name ;?>" class="form-control" value="<?php print $previous_value;?>" />
					<input type="button" onClick="UpdateTaskSingleField('<?php print $task_id;?>', '<?php print $field_name ;?>');" class="btn btn-success" value="Save" />
				</form>
			<?php

			} // display dropdown vs textbox

		} // verify user ID for task belongs to this user


	} // in_array check for fields
		
} // if (array_key_exists('ShowUpdateTaskFields', $_POST)) {


if (array_key_exists('AjaxUpdateTaskSingleField', $_POST)) { 
		
	$task_id 				= intval($_POST['task_id']);
	$field_name 			= quote_smart($db1, $_POST['field_name']);
	$value_for_new_field 	= quote_smart($db1, $_POST['value_for_new_field']);

	// verify the field name is only one
	// that we expect it should be
	$validFields = array("description", "date_assigned", "completed");
	if ( in_array($field_name, $validFields) ) {

		// verify that the task we are about to edit
		// belongs to the right user
		$TaskInfo = GetInfo($db1, "Tasks", $task_id);
		$user_id_for_task = $TaskInfo["user_id"];

		if ($user_id_for_task == constant('USER_ID')) {

			// Perform other server-side validation checks here
			// ex values are not blank

			// If we are updating "date_assigned"
			// we DO have to do that now
			if ($field_name == "date_assigned") {
				$value_for_new_field = date("Y-m-d G:i:s", strtotime( quote_smart($db1,$value_for_new_field)));					
			}

			$query = "UPDATE Tasks SET
				$field_name 	= '$value_for_new_field'
				WHERE 	id = $task_id 
				LIMIT 1
			";

			// Use this for debugging
			if (mysqli_query($db1, $query)) {
				print $notification;
			} else {
				print ("<strong>ERROR: " . mysqli_error($db1) . "</strong><br />");
			}

			// once you know the above works, you can use this consolidated code instead:
			//$run_query = mysqli_query($db1, $query);			
			//exit();
		}	
	}
}
?>
	
<?php include_once("../includes/a_last.php");?>


