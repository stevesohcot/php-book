$.ajaxSetup ({
	cache: false
});

var ajaxController = "../controllers/ajax.php";
var ajax_load = "<img src='../images/load.gif' alt='Loading...' />";

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

			responseText = $.trim(responseText);

			if (responseText == "task-added") {

				// notify the user
				$('#task_added_confirmation').show();

				// refresh the list
				ViewTasks();

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


function ViewTasks() {

	$('#task_list').html(ajax_load);

	$.post( 
		ajaxController,
		{AjaxViewTasks:1, },
		function(responseText){
			$('#task_list').html(responseText);
		},

		"html"
	);
}
