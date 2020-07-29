<?php
$conn=mysqli_connect("127.0.0.1","root","","filmovi");

$novizanr=$conn->real_escape_string($_REQUEST['novizanr']);

$sql="INSERT INTO zanrovi (id,zanr) VALUES (NULL,'$novizanr')";

$res=mysqli_query($conn,$sql);

header('location:home.php');
