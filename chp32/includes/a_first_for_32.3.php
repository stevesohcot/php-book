<?php
	session_start();
	ob_start();	

	$WEBSITE_ENVIRONMENT = "Development";
	
	// detect the URL, or in this case the script name
	// to determine if it's development or production
	if(stristr($_SERVER['SCRIPT_FILENAME'], 'development') === FALSE) $WEBSITE_ENVIRONMENT = "Production";

	// Passwords are stored outside the web root directory
	// value of variables will change depending on if Development vs Production
	

	if ($WEBSITE_ENVIRONMENT =="Development") {

		include "/home/my-user-name/outside/passwords-dev.php";

		define("APP_ENVIRONMENT", "Development");
		define("APP_BASE_URL", "http://sandbox.my-website.com");
		error_reporting(E_ALL ^ E_NOTICE); // turn ON showing errors
	} else {

		include "/home/my-user-name/outside/passwords-prod.php";

		define("APP_ENVIRONMENT", "Production");
		define("APP_BASE_URL", "http://www.my-website.com");
		error_reporting(0); // turn OFF showing errors
	}	


	// database connection, other include files here... 
?>