<?php include_once("../includes/a_first.php");?>
	
	<?php 

		if (array_key_exists('AddUpdateUser', $_POST)) { 
			
			$user_id 	= intval($_POST['user_id']);
			$first_name = quote_smart($db1, $_POST['first_name']);
			$last_name	= quote_smart($db1, $_POST['last_name']);

			if ($user_id == 0) {				

				$query = "INSERT INTO Users 
						(`id`, `first_name` ,`last_name`)
						VALUES ('', '$first_name' , '$last_name')";

				$notification = "user-added";

			} else {

				$query = "UPDATE Users SET
						first_name = '$first_name',
						last_name = '$last_name'
						WHERE id = $user_id
						LIMIT 1
				";
				$notification = "user-updated";
			} // if ($user_id == 0)

			// Use this for debugging
			if (mysqli_query($db1, $query)) {
				header("Location: ../users/index.php?action=$notification");
				exit();
			} else {
				print ("<strong>ERROR: " . mysqli_error($db1) . "</strong><br />");
			}

			// once you know the above works, you can use this consolidated code instead:
			//$run_query = mysqli_query($db1, $query);			
			//header("Location: ../users/index.php?action=notification");
			//exit();

		}

	?>	

	<?php 

		if (array_key_exists('DeleteUser', $_GET)) { 

			$user_id 	= intval($_GET['DeleteUser']);
			
			$query = "DELETE FROM Users
						WHERE id = $user_id
						LIMIT 1
			";

			if (mysqli_query($db1, $query)) {
				header("Location: ../users/index.php?action=user-deleted");
				exit();
			} else {
				print ("<strong>ERROR: " . mysqli_error($db1) . "</strong><br />");
			}

			// once you know the above works, you can use this consolidated code instead:
			//$run_query = mysqli_query($db1, $query);			
			//header("Location: ../users/index.php?action=user-deleted");
			//exit();

		}

	?>	
	
	This is the "users controller"

<?php include_once("../includes/a_last.php");?>


