<?php

function GetUserInfo($db_connection, $user_id) {

	$sql = "SELECT * FROM Users where id = " . intval($id);
	$rs = mysqli_query($db_connection,$sql);
	
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