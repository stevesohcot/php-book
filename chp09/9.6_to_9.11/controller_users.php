<?php include_once("a_first.php");?>
	
	<?php 

		if (array_key_exists('hello', $_GET)) { 
			print "<h1>Hello!</h1>";
		}

	?>	

	This is the "User's Controller"

<?php include_once("a_last.php");?>


