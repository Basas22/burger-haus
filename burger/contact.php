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
</head>
  
<main>
	<?php
	if (isset($_GET['message'])) {
		if ($_GET['message'] == "sent") {
			echo '<p>Your message has been sent!</p>';
		}
	}
	?>
	<div class="container">
		<div class="contact">
			<h1>Contact</h1>
			<hr>
			<form class="contact-form" action="includes/inc.contactform.php" method="post">
				<input type="text" name="name" placeholder="Full Name" required>
				<input type="text" name="email" placeholder="Email" required>
				<input type="text" name="subject" placeholder="Subject" required>
				<textarea name="message" placeholder="Message"></textarea>
				<button type="submit" class="submitbtn" name="contactsubmit">Send Message</button>
			</form>
		</div>
	  	 <h5>Photo by:<a style="background-color:black;color:white;text-decoration:none;padding:4px 6px;font-family:-apple-system, BlinkMacSystemFont, &quot;San Francisco&quot;, &quot;Helvetica Neue&quot;, Helvetica, Ubuntu, Roboto, Noto, &quot;Segoe UI&quot;, Arial, sans-serif;font-size:12px;font-weight:bold;line-height:1.2;display:inline-block;border-radius:3px" href="https://unsplash.com/@pablomerchanm?utm_medium=referral&amp;utm_campaign=photographer-credit&amp;utm_content=creditBadge" target="_blank" rel="noopener noreferrer" title="Download free do whatever you want high-resolution photos from Pablo Merchán Montes"><span style="display:inline-block;padding:2px 3px"><svg xmlns="http://www.w3.org/2000/svg" style="height:12px;width:auto;position:relative;vertical-align:middle;top:-2px;fill:white" viewBox="0 0 32 32"><title>unsplash-logo</title><path d="M10 9V0h12v9H10zm12 5h10v18H0V14h10v9h12v-9z"></path></svg></span><span style="display:inline-block;padding:2px 3px">Pablo Merchán Montes</span></a></h5>
	</div>
	<br><br><br><br>
</main>	

<?php
	require "footer.php";
?>