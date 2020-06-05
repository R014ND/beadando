<?php
if(isset($_POST['signup-submit'])){

	require 'dbconn.inc.php';

	$username = $_POST['uid'];
	$email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$pwdrep = $_POST['pwd-repeat'];


	if(empty($username) || empty($email) || empty($pwd) || empty($pwdrep)){
		header("Location: ../signup.php?err=emptyfields&uid=".$username."$email=".$email);
		exit();
	}
	else if(strlen($pwd >= 8)){
		header("Location: ../signup.php?err=tooshortpsw");
		exit();
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
		header("Location: ../signup.php?err=invalidemailuid");
		exit();
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: ../signup.php?err=invalidemail&uid=".$username);
		exit();
	}
	else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
		header("Location: ../signup.php?err=invalidemail&mail=".$email);
		exit();
	}
	else if($pwd !== $pwdrep){
		header("Location: ../signup.php?err=pswcheck&uid=".$username."&mail=".$email);
		exit();	
	}
	else{

		$sql = "SELECT uidUsers FROM userdata WHERE uidUsers=?";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../signup.php?err=sqlerr");
			exit();	
		}
		else{
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resCheck = mysqli_stmt_num_rows($stmt);
			if($resCheck > 0){
				header("Location: ../signup.php?err=usertakenl&mail=".$email);
				exit();
			}

			else{
				$sql = "INSERT INTO userdata (uidUsers, emailUsers, pwdUsers) VALUES (?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: ../signup.php?err=sqlerr");
					exit();	
				}
				else{
					$hash = password_hash($pwd, PASSWORD_DEFAULT);

					mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hash);
					mysqli_stmt_execute($stmt);

					header("Location: ../signup.php?signup=success");
					exit();	
				}
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}
else{
	header("Location: ../signup.php");
	exit();		
}

