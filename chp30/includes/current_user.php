<?php

	$USER_ID = intval($_SESSION['User_ID']);

	// Check for cookie login
	if ($USER_ID == 0) {

		$User_ID_From_Cookie 	= $_COOKIE["user_id"];
		$Hash_From_Cookie 		= $_COOKIE["hash"];
		
		$PossiblyLogInUser 		= GetInfo($db1, "Users", $User_ID_From_Cookie);	
		$Password_Should_Be 	= substr($PossiblyLogInUser['password'],0,25);

		if ($Hash_From_Cookie == $Password_Should_Be) {

			$_SESSION['USER_ID'] 	= $User_ID_From_Cookie;
			$USER_ID 				= $User_ID_From_Cookie;
			
		}	
	}


	define("USER_ID", intval($USER_ID) );

?>