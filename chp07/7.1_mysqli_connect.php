<?php

	$host = "localhost";
	$user = "myUser1";
	$password = "";

	$connection_to_database = mysqli_connect($host, $user, $password);

	if ($connection_to_database) {
		print "Successfully connected to the database";
	} else {
		die("Connection failed: " . mysqli_connect_error());
	}

?>

