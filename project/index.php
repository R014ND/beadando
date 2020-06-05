<?php
        require_once 'header.php';

        require 'includes/dbconn.inc.php';

?>
    <link rel="stylesheet" href="index.css">
    <main>
            <section class="index-container">
            <div class="box1">
                    <?php
                    if(isset($_SESSION['userId'])){
                        $identifier = $_SESSION['userId'];
                        $sql = "SELECT uidUsers FROM userdata WHERE idUsers = $identifier;";
                        $result = mysqli_query($conn, $sql);
                        $resultCheck = mysqli_num_rows($result);

                        if($resultCheck > 0){
                            $row = mysqli_fetch_assoc($result);
                            if(0 < $row): ?>
                                <h1 id="welc">Welcome back <?php echo $row['uidUsers']." !";?></h1>
                            <?php endif; ?>
                    <?php
                        }
                    }
                    if(!isset($_SESSION['userId'])) : ?>
                    <div class="box1">
                        <h1 class="improve">Improve your time management <br> with us!  <br> <u><a id="impa" href="signup.php">Sign up</a></u> for free!</h1>
                        <p id="forfree"></p>
                    </div>
                    <div class="box2">
                        <h1>Manage your To Do's easily!</h1>
                    </div>
                    <div class="box3">
                        <h1>If you already have an account, please <a href="login.php"  id="impa">log in!</a></h1>
                    </div>
                    <?php endif; ?>
             </div>
        </section>
    </main>
<?php
    require_once 'footer.php';
?>
