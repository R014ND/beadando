<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <title>TODO</title>
    <link rel="icon" href="icon.png">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="logout.css">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <nav class="navbar">

        <input type="checkbox" id="check">
        
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        
        <label class="logo">TODO</label>
        
        <ul class="navbar-ul">
        <?php    
            session_start();   
            if(isset($_SESSION['userId'])){     
                require 'indexlggdin.php';
            }
            else{
                require 'indexlggdout.php';
            } 
        ?>
        </ul>
    </nav>
</header>
