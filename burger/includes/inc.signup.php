<?php

if (isset($_POST['signupsubmit'])) {
	require 'inc.dbh.php';
	
	$email=$_POST['mailid'];
	$password=$_POST['pwd'];
	$passwordrepeat=$_POST['pwd-repeat'];
	
	if (empty($email) || empty($password) || empty($passwordrepeat)) {
		header("Location: ../signup.php?error=emptyfields&mailid=".$email);
		exit();
	}
	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("Location: ../signup.php?error=invalidemail");
			exit();
		} else if ($password !== $passwordrepeat) {
		header("Location: ../signup.php?error=passwordcheck&mailid=".$email);
			exit();	
	} else {
		
		$sql = "SELECT emailUsers FROM users WHERE emailUsers=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../signup.php?error=sqlerror");
				exit();
		} else {
			mysqli_stmt_bind_param($stmt, "s", $email);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if ($resultCheck > 0) {
			header("Location: ../signup.php?error=usertaken");
				exit();
		} else {
		
		$sql = "INSERT INTO users (emailUsers, pwdUsers) VALUES (?, ?)";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("Location: ../signup.php?error=sqlerror");
				exit();
		} else {
		
			$hashedPwd = password_hash($password, PASSWORD_DEFAULT);
			
			mysqli_stmt_bind_param($stmt, "ss", $email, $hashedPwd);
			mysqli_stmt_execute($stmt);
			header("Location: ../signup.php?signup=success");
				exit();
		}
	}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	}
	} else {
		header("Location: ../signup.php");
			exit();
		}
?>