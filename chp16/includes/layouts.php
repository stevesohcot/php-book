<?php function Template_Header() { ?>

<!DOCTYPE html>
<html>
<head>
	<title><?php print constant('PAGE_TITLE');?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
</head>
<body>
	
	<div class="container" style="margin-top:20px;">
		<ul class="nav nav-pills">
		  <li role="presentation" 
		  	<?php if( strlen(stristr($_SERVER['SCRIPT_FILENAME'], "/users")) > 0) { ?>
					class="active"
			  <?php } ?>
			>
		  		<a href="../users/users.php">Users</a>
		  </li>
		  <li role="presentation"
 			<?php if( strlen(stristr($_SERVER['SCRIPT_FILENAME'], "/tasks")) > 0) { ?>
					class="active"
			<?php } ?>
		  >
		  		<a href="../tasks/tasks.php">Tasks</a>
		  </li>
		</ul>
	</div>

	<?php include_once("alerts.php"); ?>

<?php } ?>

<?php function Template_Footer() { ?>
 
	</body>
	</html>
<?php } ?>

