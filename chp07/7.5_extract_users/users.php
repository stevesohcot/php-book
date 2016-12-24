<?php include_once("a_first.php");?>

 <h1>Contents of the "Users" table</h1>
 
<?php

   $query = "SELECT * FROM Users";
   $get_entries = mysqli_query($db1, $query);
   
   if ( mysqli_num_rows($get_entries) == 0) {
   
     print "No data";
   
   } else {
   
      while ($entries = mysqli_fetch_array($get_entries)) {
        print "<br />" . $entries['id'] . " - " . $entries['name'];
      }
   }		

?>

<?php include_once("a_last.php");?>


