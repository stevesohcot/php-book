function ValidateUser() {
	
	// hide errors
	// incase the user tries multiple times
	//$('#first_name_needed').hide();
	//$('#last_name_needed').hide();

	$('#lastname_needed, #last_name_needed').hide();
	
	var OkToProceed = true;

	// If the user's name is blank,
	// toggle the variable

	var first_name = $('#first_name').val();
	var last_name  = $('#last_name').val();

	if (first_name == "") {
		$('#first_name_needed').show();
		OkToProceed = false;
	}

	if (last_name == "") {
		$('#last_name_needed').show();
		OkToProceed = false;
	}


	if (OkToProceed == true) {
		return true;
	} else{
		console.log("prevent user from going on");
		return false;
	}

}
