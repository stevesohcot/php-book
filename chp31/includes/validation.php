<?php

	if ( constant('USER_ID') == 0 ) {

		header("Location: ../login/index.php?action=not-authorized");
		exit();

	}

	// no "ELSE" statement
	// if the USER_ID is not 0
	// then the user is logged in,
	// and should proceed
?>

