<?php

if(isset($_POST['login-submit'])){
	require 'dbconn.inc.php';

	$mailuid = $_POST['emailuid'];
	$pwd = $_POST['pwd'];

	if(empty($mailuid) || empty($pwd)){
		header("Location: ../index.php?err=emptyfields");
		exit();
	}	
	else{
		$sql = "SELECT * FROM userdata WHERE uidUsers=? OR  emailUsers=?;";
		$stmt = mysqli_stmt_init($conn);
	
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../index.php?err=sqlerr");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
			mysqli_stmt_execute($stmt);
			$res = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($res)){
				$pwdCheck = password_verify($pwd, $row['pwdUsers']);
				if($pwdCheck == false){
					header("Location: ../login.php?err=wrongpwd");
					exit();
				}
				else if($pwdCheck == true){
					session_start();
					$_SESSION['userId'] = $row['idUsers'];
					$_SESSION['userUid'] = $row['uidUsers'];

					header("Location: ../index.php?login=success");
					exit();
				}

			}
			else{
				header("Location: ../index.php?err=nouser");
				exit();
			}

		}
	}
}
else{
	header("Location: ../index.php");
	exit();
}