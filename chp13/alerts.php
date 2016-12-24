<?php if ($_GET['action'] == "user-added") { ?>
	<div class="alert alert-success" style="margin-top:10px;">
		The user was successfully added!
	</div>
<?php } ?>

<?php if ($_GET['action'] == "user-updated") { ?>
	<div class="alert alert-success" style="margin-top:10px;">
		The user was successfully updated!
	</div>
<?php } ?>

<?php if ($_GET['action'] == "user-deleted") { ?>
	<div class="alert alert-success" style="margin-top:10px;">
		The user was successfully deleted!
	</div>
<?php } ?>
