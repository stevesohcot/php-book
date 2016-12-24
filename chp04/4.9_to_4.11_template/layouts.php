<?php function Template_Header() { ?>

<!DOCTYPE html>
<html>
<head>
	<title><?php print constant('PAGE_TITLE');?></title>
	<link rel="stylesheet" href="css-style-file-here.css">
</head>
<body>
	
	<header>
		My Header
	</header>

	<nav>
		<a href="#">Link 1</a>
		<a href="#">Link 2</a>
	</nav>

<?php } ?>

<?php function Template_Footer() { ?>
 
	<footer>
		Copyright Info
	</footer>

	 <script src="javascript-file-here.js"></script>
</body>
</html>
<?php } ?>

