<?php
	
if (isset($_POST['contactsubmit'])) {
	$name=$_POST['name'];
	$email=$_POST['email'];
	$subject=$_POST['subject'];
	$message=$_POST['message'];
	
	$mailTo = "Kapacluke@gmail.com";
	$headers = "From: Website".$email;
	$text = "You have recieved an email from ".$name."/n/n".$message;
	
	mail($mailTo, $subject, $txt, $headers);
	header("Location: ../contact.php?message=sent");
}
?>
