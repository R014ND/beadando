<?php
if(isset($_POST['addtask-submit'])){

	require 'dbconn.inc.php';

	$title = $_POST['title'];
	$descript = $_POST['descript'];
	$expiry_date = $_POST['date'];
	
	$now = getdate();
	$date_added = $now['year']."-".$now['mon']."-".$now['mday'];



	if(empty($title) || empty($descript) || empty($expiry_date) || empty($date_added)){
		header("Location: ../mytasks.php?err=emptyfields");
        exit();
	}
	else{
		session_start();
		$identifier = $_SESSION['userId'];
		$sql = "INSERT INTO todos (id, title, descript, e_date, date_added) VALUES (?, ?, ?, ?, ?);";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../index.php?err=sqlerr");
			exit();
		}
		else{
			mysqli_stmt_bind_param($stmt, "sssss", $identifier, $title, $descript, $expiry_date, $date_added);
			mysqli_stmt_execute($stmt);
		}

		header("Location: ../mytasks.php?success");
		exit();	
	}
}
else{
	header("Location: ../mytasks.php");
	exit();		
}
