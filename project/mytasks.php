<?php
    require 'header.php';
?>
<?php if(isset($_SESSION['userId'])) : ?>
<main>
    <link rel="stylesheet" href="mytasks.css">
    <link rel="stylesheet" href="logout.css">
    <section class="mytasks-container">
        <div class="outer">
            <div class="mytasks-wrapper">       
                <h1>Stuff you need to do...</h1>
                <?php
                require 'includes/dbconn.inc.php';
                $identifier = $_SESSION['userId'];
                $sql = "SELECT * FROM todos WHERE id = $identifier";
            
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                while($row = mysqli_fetch_assoc($result)): ?>
                <div class="outer2">
                <button type="button" class="collapsible">Title : <?php echo $row['title'];?></button>
                <div class="content">
                    <p>Note : <?php echo $row['descript'];?></p>
                    <p>Due date : <?php echo $row['e_date'];?></p>
                </div>
                </div>
                <script src="script.js"></script>
                    <table>
                        <tr>
                            <div class="btns">
                                <td>
                                    <form action="edittask.php?from=mytasks.php" method="POST">
                                    <input type="hidden" name="edit-input" value="<?php echo $row['indexOf']?>">
                                    <button type="submit" class="editbtn" name="edit-submit">Edit</button>
                                    </form>
                                </td>
                                <td>
                                <form action="includes/deletetask.inc.php?delete=<?php echo $row['indexOf']?>&from=mytasks.php" method="POST">
                                    <button type="submit" class="delbtn" name="delete-submit">Delete</button>
                                </form>
                                </td>
                            </div>
                        </tr>
                    </table>
                <?php endwhile; ?>
                <script src="script/script.js"></script>
            </div>
        </div>
    </section>
</main>
<?php endif?>
<?php
    if(!isset($_SESSION['userId'])){
        header("Location: ./index.php");
        exit();
    }

?>
<?php
    require 'footer.php';
?>