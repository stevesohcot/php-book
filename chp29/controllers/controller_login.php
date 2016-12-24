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

			if ( isset($_POST['remember_me']) ) {
				
				$CookieExpire = time()+60*60*24*365;
				setcookie("user_id", $User["id"], $CookieExpire,"/");
				setcookie("hash", substr($real_password,0, 25) , $CookieExpire,"/");
			}

			header("Location: ../home");
			exit();

		} else {
			header("Location: ../login/index.php?action=invalid-login");
			exit();
		}


	}


	if (array_key_exists('logout', $_GET)) { 

		// remove session contents
		$_SESSION['User_ID'] = "0";
		
		unset($_SESSION);
		session_destroy(); // removes data from the server

		// delete cookies			
		setcookie("user_id", "", time()-3600, "/");
		setcookie("hash", "", time()-3600, "/");

		header("Location: ../login/index.php?action=signed-out");
		exit();
	}


?>	

This is the "login controller"

<?php include_once("../includes/a_last.php");?>


