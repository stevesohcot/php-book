<?php

 $host = "localhost";
 $user = "myUser1";
 $password = "";
 
 $connection_to_database = mysqli_connect($host, $user, $password)
    or die("Connection failed: " . mysqli_connect_error());

?>

