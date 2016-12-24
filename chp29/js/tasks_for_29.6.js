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


function ShowTaskUpdateFields(task_id_and_field_name) {

	// Separate the parameter passed in
	// into the respective pieces
	// by the "_" character
	var separator	= task_id_and_field_name.indexOf("_");
	var task_id 	= task_id_and_field_name.substring(0, separator);
	var field_name 	= task_id_and_field_name.substring(separator + 1);

	// Display "loading" image
	// in the container we are loading into
	// which is the original parameter
	//	we passed into this function
	
	$('#' + task_id_and_field_name).html(ajax_load);

	// display the form to update the content
	$.post( 
		ajaxController,
		{ShowUpdateTaskFields:1, task_id: task_id, field_name: field_name },
		function(responseText){
			$('#' + task_id_and_field_name).html(responseText);
		},

		"html"
	);

}