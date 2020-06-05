<?php
        require_once 'header.php';
        if(!isset($_SESSION['userId'])){
            header("Location: ./index.php");
            exit();
        }

        require 'includes/dbconn.inc.php';
        $index = $_POST['edit-input'];
        $sql = "SELECT * FROM `todos` WHERE `todos`.`indexOf` = $index";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
?>
    <link rel="stylesheet" href="edittask.css">
    <main>
        <section class="edittask-container">
        <h1>Edit tasks</h1>
            <div class="outer">
                <div class="edittask-wrapper">
                    <?php while($row = mysqli_fetch_assoc($result)) :?>
                        <form action="includes/saveedit.inc.php" name="save-form" method="POST">
                        <p id="cap">Edit title</p><input type="text" name="s-title" placeholder="Title" id="title" autocomplete="off" value="<?php echo $row['title']?>"><br>  
                        <p id="cap">Edit description</p>
                        <div class="outer"><textarea name="s-descript" id="descript" cols="30" rows="10" placeholder="Description"><?php echo $row['descript']?></textarea></div>
                        <br> 
                        <p id="cap">Edit due date</p><input type="date" name="s-date" id="dpick" placeholder="Date" min="<?php echo date('Y-m-d');?>" value="<?php $row['e_date']?>"><br> 
                            <input type="hidden" name="smthg" value="<?php echo $index;?>">
                    <?php endwhile;?>
                </div>
            </div>
                <button type="submit" class="edittaskbtn" name="save-submit">Save</button>
            </form> 
        </section>
    </main>
<?php
    require_once 'footer.php';
?>
