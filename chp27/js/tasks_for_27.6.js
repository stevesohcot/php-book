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

		{AjaxAddUpdateTask:1, 
			task_id: task_id, description: description,
			date_assigned: date_assigned,
			completed:completed
		 },

		function(responseText){

			// do something with the results

		},

		"html"
	);
}
