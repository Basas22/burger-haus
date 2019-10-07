<?php
if (isset($_POST["resetsubmit"])) {

$selector = bin2hex(random_bytes(8));	
$token = random_bytes(32);

$url = "create-new-pwd.php?selector=" . $selector . "&validator=" . bin2hex($token);

$expires = date("U") + 1800;

require 'inc.dbh.php';

$userEmail = $_POST["email"];

$sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?";
$stmt = mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt, $sql)) {
			echo 'There was an error. Please try again!';
			exit();
		} else {
			mysqli_stmt_bind_param($stmt, "s", $userEmail);
			mysqli_stmt_execute($stmt);
			
			}
			
			$sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				echo 'there was an error. Please try again!';
				exit();
			} else {
			$hashedToken = password_hash($token, PASSWORD_DEFAULT);
			mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
			mysqli_stmt_execute($stmt);
			}
			
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	
	$to = $userEmail;
	$subject = 'Reset your password';
	$message = '<p>This link can be used to reset your password to your Under account. If you did not make this request you can ignore this email.';
	$message .= '<p>Click here to reset your password: </br>';
	$message .= '<a href="' . $url . '"> ' . $url . '</a></p>';
	
	$headers = "From: Under <Kapacluke@gmail.com>/r/n";
	$headers .= "Reply-To: kapacluke@gmail.com/r/n";
	$headers .= "Content-type: text/html/r/n";
	
	mail($to, $subject, $message, $headers);
	
	header("Location: ../reset-pwd.php?reset=success");
			
	 
} else {
	header("Location: ../index.php");
	exit();
}
?>