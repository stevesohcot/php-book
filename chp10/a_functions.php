<?php

function quote_smart($db_connection, $value) {
	if( get_magic_quotes_gpc() )
	  $value = stripslashes( $value ); 
	 
	$value = mysqli_real_escape_string($db_connection, $value ); 
	$value = strip_tags($value);
	$value = htmlspecialchars($value);
	$value = trim($value);
	return $value; 
}

?>


