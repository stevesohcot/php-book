<?php include_once("../includes/a_first.php");?>

<?php define("PAGE_TITLE", "Sign Up");?>

<?php Template_Header();?>

<div class="container">

	<h1>Sign Up</h1>
	
	<form action="../controllers/controller_signup.php" method="POST" onSubmit="return ValidateLogin();">
	    <div class="input-group input-group-lg form-group">
	        <label for="email" class="sr-only">Email</label>
	        <input type="text" name="email" id="email" class="form-control input-lg" placeholder="Email" data-required="true" />
	    </div>
	          
	    <div class="input-group input-group-lg form-group">
	        <label for="password" class="sr-only">Password</label>
	        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" data-required="true" />
	    </div>

	    <div class="input-group input-group-lg form-group">
	        <label for="first_name" class="sr-only">First Name</label>
	        <input type="text" name="first_name" id="first_name" class="form-control input-lg" placeholder="First Name" data-required="true" />
	    </div>
	    
	    <div class="input-group input-group-lg form-group">
	        <label for="last_name" class="sr-only">Last Name</label>
	        <input type="text" name="last_name" id="last_name" class="form-control input-lg" placeholder="Last Name" data-required="true" />
	    </div>

	    <div class="form-group">
	    	<input type="hidden" name="signup" value="1" />
	    	<input type="submit" class="btn btn-primary btn-lg" value="Sign Up" />
	    	<a href="../login" class="btn  btn-lg">Log In</a>
	    </div> 

	    <div class="alert alert-danger" id="error_general" style="display:none;">
	    	Please fill in the required fields above
	    </div>
	</form>

</div> <!-- /.container -->

<?php Template_Footer();?>

<?php include_once("../includes/a_last.php");?>


