<?php
	 if ( $errors > 0) {
		print '<div class="alert alert-danger">';
		print 'Error!';
		print '</div>';
	} else {	
		print '<div class="alert alert-success">';
		print 'Proceed';
		print '</div>';
	}
?>

<?php // these two are the same! ?>


<?php if ( $errors > 0) { ?>
	<div class="alert alert-danger">
		Error!
	</div>
<?php } else { ?>
	<div class="alert alert-success">
		Proceed
	</div>
<?php } ?>

