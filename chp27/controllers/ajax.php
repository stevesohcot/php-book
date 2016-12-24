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

		}

	?>	

	
<?php include_once("../includes/a_last.php");?>


