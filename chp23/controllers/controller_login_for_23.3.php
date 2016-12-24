<?php include_once("../includes/a_first.php");?>
	
<?php 

	if (array_key_exists('login', $_POST)) { 

		$email 				= quote_smart($db1, $_POST['email']);
		$password_attempt	= quote_smart($db1, $_POST['password']);

		// Convert the password that was typed in,
		// into the version we have encrypted in the database
		$password_attempt = md5($SaltForPasswordEncryption . $password_attempt);
		
		// Get the REAL password for this user		
	    $User 			= GetUserInfoFromEmail($db1, $email);
        $real_password 	= $User["password"];

		if ($password_attempt == $real_password) {

			// Create Session variable
			// To remember the user between the individual web pages
			$_SESSION['User_ID'] = $User["id"];

			header("Location: ../home");
			exit();

		} else {
			header("Location: ../login/index.php?action=invalid-login");
			exit();
		}

	}

?>	

This is the "login controller"

<?php include_once("../includes/a_last.php");?>


