<?php include_once("../includes/a_first.php");?>
	
<?php 

	if (array_key_exists('signup', $_POST)) { 

		$email 		= quote_smart($db1, $_POST['email']);
		$password	= quote_smart($db1, $_POST['password']);

		$first_name	= quote_smart($db1, $_POST['first_name']);
		$last_name	= quote_smart($db1, $_POST['last_name']);

		// Define array that will hold any errors we have
		$ServerSideCheckErrors	=	array();


		if ( !isValidateEmail($email) )
			$ServerSideCheckErrors[]="Invalid e-mail";
		

		if (strlen($Email) > 100)		
				$ServerSideCheckErrors[]="The e-mail can not have more than 100 characters.";

		
		// Is the email already in use?
        $User 				=  GetUserInfoFromEmail($db1, $email);
		$User_ID_Attempt 	= intval($User["id"]);

		if ($User_ID_Attempt != 0) {
			$ServerSideCheckErrors[]="This e-mail address already has an account; please sign in instead";
		}

		if ($password == "")
				$ServerSideCheckErrors[]="You did not enter a password.";

		if ( $first_name == "")
			$ServerSideCheckErrors[] = "The first name is required";
		

		if ( $last_name == "")
			$ServerSideCheckErrors[] = "The last name is required";
		




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

		$password = md5($SaltForPasswordEncryption . $password);

		$query = "INSERT INTO Users 
							(`id`, `first_name` ,`last_name`,`email`,`password`)
							VALUES ('', '$first_name' , '$last_name','$email','$password')";

		// Use this for debugging
		if (mysqli_query($db1, $query)) {

			// Create Session variable
			// To remember the user between the individual web pages
			$_SESSION['User_ID'] = mysqli_insert_id($db1);

			header("Location: ../home");
			exit();

		} else {
			print ("<strong>ERROR: " . mysqli_error($db1) . "</strong><br />");
		}

		// Create Session variable
		// To remember between the individual web pages who the user is
		//$_SESSION['User_ID'] = mysqli_insert_id($db1);
		

		// once you know the above works, you can use this consolidated code instead:
		//$run_query = mysqli_query($db1, $query);			
		//header("Location: ../home");
		//exit();

	}

?>	

This is the "signup controller"

<?php include_once("../includes/a_last.php");?>


