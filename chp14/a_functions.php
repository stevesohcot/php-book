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

function GetInfo($db_connection, $table_name, $id) {

	// Returns an array of rows from a database table
	//	assumes primary key is named "id"

	//To Use:
	//	$User_ID = 1;
    //    $User =  GetInfo($db_connection, "Users", $User_ID);
    //    print "hello " . $User["first_name"];

	$table_name = quote_smart($db_connection, $table_name);

	$sql = "SELECT * FROM $table_name where id = " . intval($id);
	$rs = mysqli_query($db_connection,$sql);
	//print $sql;

	  if (!$rs || mysqli_num_rows($rs) == 0) {
	  	//print "error" . mysqli_error($db_connection);
		$arrError["id"] = "0";
	     return $arrError;
	  } else {
	     $row = mysqli_fetch_array($rs);
	     mysqli_free_result($rs);
	     return $row;       
	  }
}

?>


