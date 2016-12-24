<?php

	// Admin validation
	// we know the ONE user ID to allow in
	// if the user signed in is NOT this ID,
	// then redirect them
	if ( constant('USER_ID') != 1 ) {

		header("Location: ../login/index.php?action=not-authorized");
		exit();

	}

?>

