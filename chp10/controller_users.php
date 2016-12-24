<?php include_once("a_first.php");?>
	
<?php 

if (array_key_exists('AddUser', $_POST)) { 

	$first_name = quote_smart($db1, $_POST['first_name']);
	$last_name	= quote_smart($db1, $_POST['last_name']);

	$query = "INSERT INTO Users 
			(`id`, `first_name` ,`last_name`)
			VALUES ('', '$first_name' , '$last_name')";

	$addnewuser = mysqli_query($db1, $query);
	
	header("Location: users.php?action=user-added");
	exit();

}

?>	

	This is the "User's Controller"

<?php include_once("a_last.php");?>


