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


function verifyDate( $TheDate ) {

	// Validates a date in the "mm/dd/yyyy" format
	// Accepts one character for month/day and two characters for the year
	$TheDatePieces 	= 	explode("/", $TheDate);

	if (count($TheDatePieces) != 3) {
		return false;
	}

	$TheDateMonth	= 	$TheDatePieces[0];
	$TheDateDay 	= 	$TheDatePieces[1];
	$TheDateYear	= 	$TheDatePieces[2];

	//	checkdate ( int month, int day, int year );
	if (!@checkdate ($TheDateMonth, $TheDateDay, $TheDateYear)) {
		return false;
	}

	return true;	

}

function isValidateEmail($EmailToCheck) {

	if (strlen($EmailToCheck) == 0) return false;

	if (eregi("^[\+a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$", $EmailToCheck))
		return true;
	else
		return false;

}

function GetUserInfoFromEmail($db_connection, $email) {

	// Used for Signing Up and Logging In

	$sql = "SELECT * FROM Users 
			WHERE email = '" . quote_smart($db_connection, $email) . "'";
	$rs = mysqli_query($db_connection, $sql);

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


