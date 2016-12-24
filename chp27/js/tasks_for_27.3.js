function AddUpdateTask() {

	// Get variables by ID
	var task_id			 	= $('#task_id').val();
	var description 		= $('#description').val();
	var date_assigned		= $('#date_assigned').val();
	var completed 			= $('#completed').val();

	// Submit form with Ajax
	$.post( 
			"url_goes_here.php",

			{VariableNameOne: VariableValueOne, VariableNameTwo: VariableValueTwo},

			function(responseText){

				// do something with the results

			},

			format
	);
}
