<?php include_once("a_first.php");?>
	
<?php 

	if (array_key_exists('AddUser', $_POST)) { 

		$first_name = quote_smart($db1, $_POST['first_name']);
		$last_name	= quote_smart($db1, $_POST['last_name']);

		$query = "INSERT INTO Users 
				(`id`, `first_name` ,`last_name`)
				VALUES ('', '$first_name' , '$last_name')";

		if (mysqli_query($db1, $query)) {
			header("Location: users.php?action=user-added");
			exit();
		} else {
			print ("<strong>ERROR: " 
					. mysqli_error($db1) . "</strong><br />");
		}

		// Once you know the above works, you can replace it with this:
		//$run_query = mysqli_query($db1, $query);		
		//header("Location: users.php?action=user-added");
		//exit();

	}

	if (array_key_exists('UpdateUser', $_POST)) { 

		$user_id 	= intval($_POST['user_id']);
		$first_name = quote_smart($db1, $_POST['first_name']);
		$last_name	= quote_smart($db1, $_POST['last_name']);

		$query = "UPDATE Users SET
					first_name = '$first_name',
					last_name = '$last_name'
					WHERE id = $user_id
					LIMIT 1
		";

		if (mysqli_query($db1, $query)) {
			header("Location: users.php?action=user-updated");
			exit();
		} else {
			print ("<strong>ERROR: " 
						. mysqli_error($db1) 
						. "</strong><br />");
		}

		// Once you know the above works, you can replace it with this:
		//$run_query = mysqli_query($db1, $query);			
		//header("Location: users.php?action=user-updated");
		//exit();

	}

?>	


	This is the "User's Controller"

<?php include_once("a_last.php");?>


