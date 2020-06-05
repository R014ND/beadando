<?php
    require 'dbconn.inc.php';
    // delete task then return to mytasks page // 
    if(isset($_POST['delete-submit'])){
        $index = $_GET['delete'];
        $from = $_GET['from'];
        $sql = "DELETE FROM `todos` WHERE `todos`.`indexOf` = $index";
        mysqli_query($conn, $sql);
        if($from == "myday.php"){
            header("Location: ../myday.php?delete=success");
            exit();	
        }
        else if($from == "mytasks.php"){
            header("Location: ../mytasks.php?delete=success");
            exit();	
        }
    }

?>