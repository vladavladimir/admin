<?php include('../functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registracija Napravi user</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
    <link rel="icon" type="image/png" href="/images/images.png" sizes="128x128" />
    <style>
		.header {
			background: #003366;
		}
		button[name=register_btn] {
			background: #003366;
		}
	</style>
</head>
<body class="body4">
	<div class="header">
		<h2>Admin - create user</h2>
	</div>
	
	<form method="post" action="create_user.php">

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
			<label>User type</label>
			<select name="user_type" id="user_type" >
				<option value=""></option>
				<option value="admin">Admin</option>
				<option value="user">User</option>
			</select>
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
			<button type="submit" class="btn" name="register_btn"> + Create user</button>
		</div>
	</form>
</body>
<footer class="footer">
    <p>Sajt izradio Vladimir Markovic</p>
</footer>
</html>