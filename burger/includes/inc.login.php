<?php

if (isset($_POST['loginsubmit'])) {
		
		require 'inc.dbh.php';
		
		$email=$_POST['mailid'];
		$password=$_POST['pwd'];
		
		if (empty($email) || empty($password)) {
			header("Location: ../index.php?error=emptyfields");
			exit();
		}
		else {
			$sql = "SELECT * FROM users WHERE emailUsers=?";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) {
				header("Location: ../index.php?error=sqlerror");
				exit();
			} else {
			
				mysqli_stmt_bind_param($stmt, "s", $email);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				if ($row = mysqli_fetch_assoc($result)) {
					$pwdCheck = password_verify($password, $row['pwdUsers']);
					if ($pwdCheck == false) {
						header("Location: ../index.php?error=wrongpwd");
							exit();
					} else if ($pwdCheck == true) {
						session_start();
						$_SESSION['userId'] = $row['idUsers'];
						$_SESSION['mailid'] = $row['emailUsers'];
						
						header("Location: ../index.php?login=success");
						exit();	
						
					} 
					} else {
					header("Location: ../index.php?error=nouser");
					exit();
						}
					}
	} 
}