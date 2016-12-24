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


function ValidateTask() {

	// hide errors
	// incase the user tries multiple times
	$('.error, #error_general').hide();

	var OkToProceed = true;

	var user_id 			= $('#user_id').val();
	var description_needed 	= $('#description').val();
	var date_assigned 		= $('#date_assigned').val();
	var completed 			= $('#completed').val();

	if (user_id == "0") {
		$('#user_needed').show();
		OkToProceed = false;
	}

	if (description_needed == "") {
		$('#description_needed').show();
		OkToProceed = false;
	}

	if ((date_assigned == "") || isDate(date_assigned) == false ) {
		$('#date_assigned_needed').show();
		OkToProceed = false;
	}

	if (completed == "") {
		$('#completed_needed').show();
		OkToProceed = false;
	}

	if (OkToProceed == true) {
		return true;
	} else{
		$('#error_general').show();
		return false;
	}

}



function isDate(TheDate) {
	
	// validates date in the format of mm/dd/yyyy

	if ((TheDate == "") || (typeof(TheDate) == "undefined"))
		return false;
	
	var y = TheDate.split("/");
	var TheMonth	= y[0];
	var TheDay	 	= y[1];
	var TheYear 	= y[2];
	
	if ( isNaN(TheMonth) || (TheMonth < 1) || (TheMonth > 12)  )
			return false;	
	if ( isNaN(TheDay) || (TheDay < 1) || (TheDay > 31)  )						
		return false;	
	if ( isNaN(TheYear) || (TheYear < 1900) || (TheYear > 3000)  ) 
		return false;

	// We made it here: return true
	return true;

}

function ValidateLogin() {

	$('#error_general').hide();

	var OkToProceed = true;

	var requiredFields = $('[data-required = true]');
	requiredFields.each(function(){

		if ( $(this).val() == "") {
			OkToProceed = false;

			$("label[for='" +  $(this).attr('id') + "']")
				.removeClass('sr-only')
				.addClass("error_alert");
		}
	});

	if (OkToProceed == true) {
		return true;
	} else{
		$('#error_general').show();
		return false;
	}

}
