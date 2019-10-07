<?php
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<title> Burger Haus</title>
	<meta charset="utf-8">
	<meta name="Burger Haus">
	<meta name=viewport content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Comfortaa'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="icon" href="images/logo2.jpg">
	
</head>
  
<body>

	<header>
		<nav>
			<div class="header">
				
				<a href="index.php" class="logo">
					<img src="images/logo4.png" alt="Burger Haus Logo" style="width:130px;height:80px;">
				</a>
			  
			  <div class="header-right">
				  <a href="index.php" class="link">Home</a>
				  <a href="menu.php" class="link">Menu</a>
				  <a href="about.php" class="link">About</a>
				  <a href="contact.php" class="link">Contact Us</a>
				 
				  <div class="login-container">
				  <?php
				  if (isset($_SESSION['mailid'])) {
					  echo '<form action="includes/inc.logout.php" method="post">
					  <button type="submit" class="loginbtn" name="logoutsubmit">Logout</button> 
					  </form>';
					} else {
						echo '<form action="includes/inc.login.php" method="post">
						<input type="text" name="mailid" placeholder="Email" required>
						<input type="password" name="pwd" placeholder="Password" required>
						<button type="submit" class="loginbtn" name="loginsubmit">Login</button>
						</form>
						<a href="reset-pwd.php" class="signup">Forgot password?</a>
						<a href="signup.php" class="signup">Sign up here!</a>';
					}
					?>
					</div>
				</div>
			</div>
  	
		</nav>
	</header>

</body>


</HTML>