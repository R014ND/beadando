<?php
    require 'header.php';
    if(!isset($_SESSION['userId'])){
        header("Location: ./index.php");
        exit();
    }
?>
<link rel="stylesheet" href="addtasks.css">
<link rel="stylesheet" href="navbar.css">
<link rel="stylesheet" href="logout.css">
<main>
    <section class="addtasks-container">
        <div class="outer">
            <div class="addtasks-wrapper">  
                <form class="add-task-form" action="includes/addtask.inc.php" method="POST">
                    <p id="cap">Add title</p><input type="text" name="title" placeholder="Title" id="title" autocomplete="off"><br>
                    <p id="cap">Add description</p><textarea name="descript" id="descript" cols="30" rows="10" placeholder="Description"></textarea><br>
                    <p id="cap">Add due date</p><input type="date" name="date" id="dpick" placeholder="Date" min="<?php echo date('Y-m-d');?>"><br>
                    <button type="submit" name="addtask-submit" class="addtaskbtn">Add task</button>
                </form>
                <form action="index.php">
                    <button type="submit" name="cancel-submit" class="cancelbtn">Cancel</button>
                </form>
            </div>
		</div>	
    </section>
</main>
<?php
    require 'footer.php';
?>