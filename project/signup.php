<?php
    require_once 'header.php';
    session_destroy();
    session_unset();
?>
    <link rel="stylesheet" href="signup.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="logout.css">
    <main>
        <section class="signup-container">
        <h1>Sign Up</h1>
            <div class="signup-wrapper">
                <form class="signup-form" action="includes/signup.inc.php" method="POST">
                    <input autocomplete="off" type="text" name="uid" placeholder="Username"><br>    
                    <input autocomplete="off" type="text" name="email" placeholder="E-mail"><br>
                    <input autocomplete="off" type="password" name="pwd" placeholder="Password"><br>
                    <input autocomplete="off" type="password" name="pwd-repeat" placeholder="Repeat password"><br>
                    <button type="submit" name="signup-submit">Sign up</button>
                </form>
            </div>
        </section>
    </main>
    
<?php
    require_once 'footer.php';
?>