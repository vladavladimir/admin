<?php 
	include('functions.php');

	if (!isLoggedIn()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: login.php');
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/png" href="/images/images.png" sizes="128x128" />
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}

        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body class="body3">
	<div class="header">
		<h2>Home Page</h2>
	</div>
	<div class="content">

		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<div class="profile_info">
			<img src="images/user_profile.png"  >

			<div>
				<?php  if (isset($_SESSION['user'])) : ?>
					<strong><?php echo $_SESSION['user']['username']; ?></strong>

					<small>
						<i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i> 
						<br>
						<a href="index.php?logout='1'" style="color: red;">logout</a>
					</small>

				<?php endif ?>
			</div>
		</div>
        <div align="center">
        <?php
        $conn=new mysqli("127.0.0.1","root","","filmovi") or die(mysqli_error($conn));
        $result=$conn->query("SELECT film.id,film.naziv,film.godina,zanrovi.zanr FROM film INNER JOIN zanrovi ON film.zanr_id=zanrovi.id") or die($conn->error);
        ?>

        <table align="center" border="6px">
            <thead>
            <tr>
                <th>Naziv</th>
                <th>Godina</th>
                <th>Zanr</th>
            </tr>
            </thead>
            <?php
            while ($row=$result->fetch_assoc()) : ?>
                <tr>
                    <td><?php echo $row['naziv']; ?></td>
                    <td><?php echo $row['godina']; ?></td>
                    <td><?php echo $row['zanr']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
        </div>
	</div>


</body>
<footer class="footer">
    <p>Sajt izradio Vladimir Markovic</p>
</footer>
</html>