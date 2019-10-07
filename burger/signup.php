<?php
	require "header.php";
?>
<style>
		body {
			background-image: url('images/burger2.jpeg');
		    background-repeat: repeat;
			background-attachment: fixed;
			background-size: 550px;
			background-position: 50% 0%;
		}
		</style>
<main>
<div class="container">
	<div class="contact">
	    <h1>Sign up!</h1>
		<?php
		if (isset($_GET['error'])) {
			if ($_GET['error'] == "emptyfields") {
				echo '<p>Fill in all fields</p>';
			} else if ($_GET['error'] == "invalidemail") {
				echo '<p>Please enter a valid email!</p>';
			} else if ($_GET['error'] == "passwordcheck") {
				echo '<p>Your passwords to not match. Please try again!</p>';
			} else if ($_GET['error'] == "sqlerror") {
				echo '<p>Error. Please try again!</p>';
			} else if ($_GET['error'] == "usertaken") {
				echo '<p>This user already exists! Please try a new email.</p>';
			} 
		} else if (isset($_GET['signup']) && $_GET["signup"] == "success") {
             echo '<p>Sign up succesfull!</p>';
		 		}
		?>
	    	<hr>
  		<form action="includes/inc.signup.php" method="post">
  	    	<input type="text" placeholder="Enter Email" name="mailid" required>

  	    	<input type="password" placeholder="Enter Password" name="pwd" required>
			
			<input type="password" placeholder="Repeat Password" name="pwd-repeat" required>
		
  	    <p>By creating an account you agree to our <a href="#">Terms & Privacy.</a></p>
		
  	    <button type="submit" class="submitbtn" name="signupsubmit">Sign Up!</button>
		
		</form>
	</div>
			</div>
			<br><br><br><br>
	
</main>


<?php
	require "footer.php";
?>