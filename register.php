<?php include('functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registracija</title>
    <link rel="icon" type="image/png" href="/images/images.png" sizes="128x128" />
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="body1">
	<div class="header">
		<h2>Register</h2>
	</div>
	
	<form method="post" action="register.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>" placeholder="Unesi username">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>" placeholder="Unesi email">
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1" placeholder="Unesi password">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2" placeholder="Ponovi password">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn">Register</button>
		</div>
		<p>
			Already a member? <a href="login.php">Sign in</a>
		</p>
	</form>
</body>
<footer class="footer">
    <p>Sajt izradio Vladimir Markovic</p>
</footer>
</html>