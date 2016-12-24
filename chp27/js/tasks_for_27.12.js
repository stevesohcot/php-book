$.ajaxSetup ({
	cache: false
});

var ajaxController = "../controllers/ajax.php";

function AddUpdateTask() {

	// Get variables by ID
	var task_id			 	= $('#task_id').val();
	var description	 		= $('#description').val();
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

			if (responseText == "task-added") {

				// notify the user
				$('#task_added_confirmation').show();

				// reset fields for the next task
				$('#description').val('');
				$('#date_assigned').val('');
				$('#completed').val('');

			} else {
				// updating a task
				// will be done after
			}

		},

		"html"
	);
}
