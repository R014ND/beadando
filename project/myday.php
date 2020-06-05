<?php
    include 'header.php';
    if(isset($_SESSION['userId'])){
        require 'includes/dbconn.inc.php';
        $identifier = $_SESSION['userId'];
        $date = getdate();
        $day = $date['mday'];
        $m = $date['mon'];
        if($m < 10){
            $month = "0".$m;
        }
        else{
            $month = $m;
        }
        $year = $date['year'];
        $today = $year."-".$month."-".$day;
        $sql = "SELECT * FROM todos WHERE e_date = '$today' AND id = $identifier";
    
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
    }
    else{
        header("Location: ./index.php");
        exit();
    }
?>
<link rel="stylesheet" href="myday.css">
<section class="myday-container">
    <div class="outer">
    <div class="myday-wrapper">
    <h1>Stuff you need to do today...</h1>
    <?php
        if($resultCheck > 0){
            while($row = mysqli_fetch_assoc($result)): ?>
                <div class="outer2">
                    <button type="button" class="collapsible">Title : <?php echo $row['title'];?></button>
                <div class="content">
                    <p>Note : <?php echo $row['descript'];?></p>
                    <p>Due date : <?php echo $row['e_date'];?></p>
                </div>
                </div>
                <script src="script/script.js"></script>
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
                                    <form action="includes/deletetask.inc.php?delete=<?php echo $row['index']?>&from=myday.php" method="POST">
                                        <button type="submit" class="delbtn" name="delete-submit">Delete</button>
                                    </form>
                                </td>
                            </div>
                        </tr>
                    </table>
            <?php endwhile;?>
            <?php }?>
    </div>
    </div>
</section>
<?php
    include 'footer.php';
?>