<?php include_once("../includes/a_first.php");?>
<?php include_once("../includes/validation.php");?>

<?php define("PAGE_TITLE", "Home");?>

<?php Template_Header();?>

	<div class="container">

		<div id="task_added_confirmation" class="alert alert-success" style="display:none;">
			Task Added
		</div>

		<!-- START Add Task -->
		<div class="well">

			<h3>Add Task</h3>

			<form action="../controllers/ajax.php" method="post" class="form-inline">

				<div>Description:</div>
				<div><input type="text" name="description" id="description" class="form-control" /></div>

				<div>Date Assigned:</div>
				<div><input type="text" name="date_assigned" id="date_assigned" class="form-control" /></div>

				<div>Completed:</div>
				<div>
					<select name="completed" id="completed" class="form-control">
						<option value=""></option>
						<option value="Y">Yes</option>
						<option value="N">No</option>
					</select>
				</div>
				
				<div style="margin-top:10px;">
					<input type="hidden" name="AddTask" value="1" />
					<button type="button" name="btnAddTask" onClick="AddUpdateTask();" class="btn btn-primary">Add Task</button>
				</div>

			</form>

		</div>

		<!-- END  Add Task -->

		<div id="task_list"></div>

	</div> <!-- /.container -->

<?php Template_Footer();?>

<?php include_once("../includes/a_last.php");?>


