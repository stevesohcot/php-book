<?php include_once("a_first.php");?>

<?php

 function ResetDatabase($db_connection, $query_type, $table_name, $SQL) {
 
   if (mysqli_query($db_connection, $SQL)) {
   	print ("$query_type query for $table_name - success<br />");
   } else {
   	print ("<strong>ERROR: $query_type for $table_name failed: "
   				. mysqli_error($db_connection) 
   				. "</strong><br />");
   }
 
 }
 
// ************************
// Drop existing tables
// ************************

	// code here

// ************************
// Create tables
// ************************

	// code here

// ************************
// Insert Sample Data
// ************************

$table_name = "Users";
$query = "
	INSERT INTO $table_name 
			(`id`, `first_name`, `last_name`) 
	VALUES 	('', 'Peter','Griffin'), 
			('','Phil','Fry')

";
ResetDatabase($db1, "Add Data", $table_name, $query);	

?>

<?php include_once("a_last.php");?>



