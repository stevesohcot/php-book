function ValidateUser() {
	
	// hide errors
	// incase the user tries multiple times
	$('.error, #error_general').hide();

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
		$('#error_general').show();
		return false;
	}

}
