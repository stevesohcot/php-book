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

$table_name = "Users";
$query = "DROP TABLE $table_name ";
ResetDatabase($db1, "Drop", $table_name, $query);

$table_name = "Tasks";
$query = "DROP TABLE $table_name ";
ResetDatabase($db1, "Drop", $table_name, $query);


// ************************
// Create tables
// ************************
	
$table_name = "Users";	
$query = "
	CREATE TABLE $table_name ( 
		`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
		`first_name` VARCHAR(25) NOT NULL , 
		`last_name` VARCHAR(25) NOT NULL ,
		`email` VARCHAR(100) NULL ,
		`password` CHAR(32) NULL 
	) ENGINE = InnoDB;
";

ResetDatabase($db1, "Create", $table_name, $query);

$table_name = "Tasks";	
$query = "
	CREATE TABLE $table_name ( 
		`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
		`user_id` INT NOT NULL , 
		`description` VARCHAR(100) NOT NULL ,
		`date_assigned` DATETIME NOT NULL ,
		`completed` CHAR ( 1 ) NOT NULL DEFAULT 'N'
	) ENGINE = InnoDB;
";

ResetDatabase($db1, "Create", $table_name, $query);


?>

<?php include_once("a_last.php");?>



