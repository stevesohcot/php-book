<?php include_once("a_first.php");?>

<?php

$query = "
  CREATE TABLE Users ( 
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  `first_name` VARCHAR(25) NOT NULL , 
  `last_name` VARCHAR(25) NOT NULL,
  `email` VARCHAR(100) NULL ,
  `password` CHAR(32) NULL  
  ) ENGINE = InnoDB;
";

if (mysqli_query($db1, $query)) {
  print ("Table: Users - success<br />");
} else {
  print ("<strong>ERROR: Table: Users -  " 
  			. mysqli_error($db1) . "</strong><br />");
}


$query = "
  CREATE TABLE Tasks ( 
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
  `user_id` INT NOT NULL , 
  `description` VARCHAR(100) NOT NULL ,
  `date_assigned` DATETIME NOT NULL ,
  `completed` CHAR ( 1 ) NOT NULL DEFAULT 'N'
  ) ENGINE = InnoDB;
";

if (mysqli_query($db1, $query)) {
  print ("Table: Tasks - success<br />");
} else {
  print ("<strong>ERROR: Table: Tasks -  " 
  			. mysqli_error($db1) . "</strong><br />");
}

?>

<?php include_once("a_last.php");?>


