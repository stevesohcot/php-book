$.ajaxSetup ({
	cache: false
});

var ajaxController = "../controllers/ajax.php";

function AddUpdateTask() {

	// Get variables by ID
	var task_id			 	= $('#task_id').val();
	var description 		= $('#description').val();
	var date_assigned		= $('#date_assigned').val();
	var completed 			= $('#completed').val();

	// Submit form with Ajax
	$.post( 
		ajaxController,

		{VariableNameOne: VariableValueOne, VariableNameTwo: VariableValueTwo},

		function(responseText){

			// do something with the results

		},

		"html"
	);
}
