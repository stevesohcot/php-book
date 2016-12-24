<?php include_once("a_first.php");?>
	
<?php 

if (array_key_exists('AddUser', $_POST)) { 

	$first_name = $_POST['first_name'];
	$last_name	= $_POST['last_name'];

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

}

?>	

	This is the "User's Controller"

<?php include_once("a_last.php");?>


