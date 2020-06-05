<?php

if(isset($_POST['save-submit'])){
    require 'dbconn.inc.php';
    $title = $_POST['s-title'];
    $descript = $_POST['s-descript'];
    $date = $_POST['s-date'];
    $index = $_POST['smthg'];

    if($date == 0000-00-00){
        $sql = "UPDATE todos 
        SET 
        title='$title',
        descript='$descript'
        WHERE
        `todos`.`indexOf` = $index;
        ";
    }
    else{
        $sql = "UPDATE todos 
        SET 
        title='$title',
        descript='$descript',
        e_date='$date'
        WHERE
        `todos`.`indexOf` = $index;
        ";
    }
    if(!mysqli_query($conn, $sql)){
        header("Location: ../mytasks.php?edit=err");
    }
    else{
        header("Location: ../mytasks.php?edit=success");
    }
    
}
?>