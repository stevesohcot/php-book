<?php include_once("../includes/a_first.php");?>

<?php define("PAGE_TITLE", "Home");?>

<?php Template_Header();?>


	<div class="container">

		<h1>Hello</h1>

		<?php $User =  GetInfo($db1, "Users", $_SESSION['User_ID'] ); ?>
		You are signed in as <?php print $User["first_name"] . " " . $User["last_name"] ;?>.

	</div> <!-- /.container -->

<?php Template_Footer();?>

<?php include_once("../includes/a_last.php");?>


