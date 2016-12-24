<?php function Template_Header() { ?>

<!DOCTYPE html>
<html>
<head>
	<title><?php print constant('PAGE_TITLE');?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
</head>
<body>
	
	<div class="container" style="margin-top:20px;">
		<ul class="nav nav-pills">
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
		</ul>
	</div>

	<?php include_once("alerts.php"); ?>

<?php } ?>

<?php function Template_Footer() { ?>
 
	</body>
	</html>
<?php } ?>

