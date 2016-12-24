<?php function Template_Header() { ?>

<!DOCTYPE html>
<html>
<head>
	<title><?php print constant('PAGE_TITLE');?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<style>
		.error_alert{color:red;}
	</style>
</head>
<body>
	
	<?php if ( constant('USER_ID') != 0 ) { ?>

	<div class="container" style="margin-top:20px;">
		<ul class="nav nav-pills">

		<?php if ( constant('USER_ID') == 1 ) { ?>

		  <li role="presentation" 
		  	<?php if( strlen(stristr($_SERVER['SCRIPT_FILENAME'], "/users")) > 0) { ?>
					class="active"
			  <?php } ?>
			>
		  		<a href="../users">Users</a>
		  </li>
		  <li role="presentation"
 			<?php if( strlen(stristr($_SERVER['SCRIPT_FILENAME'], "/tasks")) > 0) { ?>
					class="active"
			<?php } ?>
		  >
		  		<a href="../tasks">Tasks</a>
		  </li>

		<?php } // checking for Admin (User ID = 1) ?>

		  <li role="presentation" class="pull-right">
		  	<a href="../controllers/controller_login.php?logout=1">Sign Out</a>
		  </li>

		</ul>
	</div>

	<?php }  // see if the user is logged in ?>

	<?php include_once("alerts.php"); ?>

<?php } ?>

<?php function Template_Footer() { ?>

 		<script src="../js/validation.js"></script>
 		<script src="../js/tasks.js"></script>
	</body>
	</html>
	
<?php } ?>

