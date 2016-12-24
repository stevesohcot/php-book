<?php include_once("../includes/a_first.php");?>

<?php define("PAGE_TITLE", "Log In");?>

<?php Template_Header();?>

<div class="container">

	<h1>Log In</h1>
	
	<form action="../controllers/controller_login.php" method="POST">
	    <div class="input-group input-group-lg form-group">
	        <label for="email" class="sr-only">Email</label>
	        <input type="text" name="email" id="email" class="form-control input-lg" placeholder="Email" data-required="true" />
	    </div>
	          
	    <div class="input-group input-group-lg form-group">
	        <label for="password" class="sr-only">Password</label>
	        <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" data-required="true" />
	    </div>

   	    <div style="margin-bottom:10px;">	       
	        <input type="checkbox" name="remember_me" /> Remember Me
	    </div>


	    <div class="form-group">
	    	<input type="hidden" name="login" value="1" />
	    	<input type="submit" class="btn btn-primary btn-lg" value="Log In" />
	    	<a href="../signup" class="btn  btn-lg">Sign Up</a>
	    </div> 

	</form>

</div> <!-- /.container -->

<?php Template_Footer();?>

<?php include_once("../includes/a_last.php");?>


