<?php if ($_GET['action'] == "user-added") { ?>
	<div class="alert alert-success" style="margin-top:10px;">
		The user was successfully added!
	</div>
<?php } ?>

<?php if ($_GET['action'] == "blah") { ?>
	<div class="alert alert-danger">
		You won't see this code in the "blah" section
	</div>
<?php } ?>

