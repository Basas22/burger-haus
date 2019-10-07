<?php
	require "header.php";
?>
<style>
		body {
			background-image: url('images/burger3.jpg');
		    background-repeat: repeat;
			background-attachment: fixed;
			background-size: 550px;
			background-position: 50% 0%;
		}
		</style>
<main>
	<div class="container">
		<div class="contact">
			<h1>Reset Password</h1>
				<p>An email with instructions to reset your password will be sent to you!</p>
				<hr>
			<form action="includes/inc.reset-request.php" method="post">
				<input type="text" placeholder="Enter Email" name="email" required>

		  		<button type="submit" class="submitbtn" name="resetsubmit">Send email</button>
			  </form>
			  
		 <?php
			if (isset($_GET["reset"])) {
 				if ($_GET["reset"] == "success") {
					 echo '<p>Email sent! Check your inbox!</p>';
				}
			} 
		?>
		</div>
	</div>
		<br><br><br><br>
	
</main>

<?php
require "footer.php";
?>