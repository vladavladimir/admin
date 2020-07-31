<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Film sajt</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/png" href="/images/images.png" sizes="128x128" />
</head>
<body class="login">

	<div class="header">
		<h2>Login</h2>
	</div>
	
	<form method="post" action="login.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" placeholder="Unesi username">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" placeholder="Unesi password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_btn">Login</button>
		</div>
		<p>
			Not yet a member? <a href="register.php">Sign up</a>
		</p>
	</form>


</body>
<footer class="footer">
    <p>Sajt izradio Vladimir Markovic</p>
</footer>
</html>