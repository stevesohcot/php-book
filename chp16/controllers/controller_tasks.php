<?php include_once("../includes/a_first.php");?>
	
	<?php 

		if (array_key_exists('AddUpdateTask', $_POST)) { 
			
			$task_id 		= intval($_POST['task_id']);
			$user_id 		= intval($_POST['user_id']);
			$description 	= quote_smart($db1, $_POST['description']);
			$date_assigned	= date("Y-m-d G:i:s", strtotime( quote_smart($db1, $_POST['date_assigned'])));
			$completed		= quote_smart($db1, $_POST['completed']);

			if ($task_id == 0) {				

				$query = "INSERT INTO Tasks 
						(`id`, `user_id` ,`description`, `date_assigned`, `completed`)
						VALUES ('', $user_id , '$description','$date_assigned','$completed')";

				$notification = "task-added";

			} else {

				$query = "UPDATE Tasks SET
						user_id 		= $user_id,
						description 	= '$description',
						date_assigned 	= '$date_assigned',
						completed 		= '$completed'
						WHERE id = $task_id
						LIMIT 1
				";
				$notification = "task-updated";
			}

			// Use this for debugging
			if (mysqli_query($db1, $query)) {
				header("Location: ../tasks/tasks.php?action=$notification");
				exit();
			} else {
				print ("<strong>ERROR: " . mysqli_error($db1) . "</strong><br />");
			}

			// once you know the above works, you can use this consolidated code instead:
			//$run_query = mysqli_query($db1, $query);			
			//header("Location: ../tasks/tasks.php?action=notification");
			//exit();

		}

	?>	

	<?php 

		if (array_key_exists('DeleteTask', $_GET)) { 

			$task_id 	= intval($_GET['DeleteTask']);
			
			$query = "DELETE FROM Tasks
						WHERE id = $task_id
						LIMIT 1
			";

			if (mysqli_query($db1, $query)) {
				header("Location: ../tasks/tasks.php?action=task-deleted");
				exit();
			} else {
				print ("<strong>ERROR: " . mysqli_error($db1) . "</strong><br />");
			}

			// once you know the above works, you can use this consolidated code instead:
			//$run_query = mysqli_query($db1, $query);			
			//header("Location: ../tasks/tasks.php?action=task-deleted");
			//exit();

		}

	?>	

	This is the "tasks controller"

<?php include_once("../includes/a_last.php");?>


