<?php
	require_once 'header.php';
	session_destroy();
    session_unset();
?>
	<link rel="stylesheet" href="login.css">
	<link rel="stylesheet" href="navbar.css">
	<link rel="stylesheet" href="logout.css">
    <section class="login-container">
	<h1>Log in</h1>
		<div class="login-wrapper">
			<form class="login-form" action="includes/login.inc.php" method="POST">
				<input autocomplete="off" type="text" name="emailuid" placeholder="Username/E-mail"><br>
				<input autocomplete="off" type="password" name="pwd" placeholder="Password"><br>
				<button type="submit" name="login-submit">Login</button>
			</form>
		</div>	
	</section>

<?php
    require_once 'footer.php';
?>