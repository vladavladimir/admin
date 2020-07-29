<html>
    <head>
        <meta lang="en">
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="../style.css">

    </head>
    <p align="center" class="naslovi"><u><i>FILMOVI</i></u></p>

    <body>
    <?php require 'conection.php'; ?>

    <?php
    if (isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>" role="alert">
        <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
    <?php endif; ?>

    <div class="container">

        <?php
    $conn=new mysqli("127.0.0.1","root","","filmovi") or die(mysqli_error($conn));
    $result=$conn->query("SELECT film.id,film.naziv,film.godina,zanrovi.zanr FROM film INNER JOIN zanrovi ON film.zanr_id=zanrovi.id") or die($conn->error);
    ?>
    <div class="row justify-content-center">
        <table class="table" align="center">
            <thead>
                <tr class="naslovi">
                    <th>Naziv</th>
                    <th>Godina</th>
                    <th>Zanr</th>
                    <th colspan="2">Dodatne opcije</th>
                </tr>
            </thead>
            <?php
            while ($row=$result->fetch_assoc()) : ?>
                <tr class="imena">
                    <td><?php echo $row['naziv']; ?></td>
                    <td><?php echo $row['godina']; ?></td>
                    <td><?php echo $row['zanr']; ?></td>
                    <td>
                        <a href="home.php?update=<?php echo $row['id']; ?>"
                           class="btn btn-info" style="color:black ">Azuriraj</a>
                        <a href="conection.php?delete=<?php echo $row['id']; ?>"
                           class="btn btn-danger" style="color:black">Obrisi</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table><br>
    </div>
            <?php
            function pre_r($array){
                echo '<pre>';
                print_r($array);
                echo '</pre>';
            }
            ?>

    <div class="row">
        <form action="conection.php" method="POST" class="tabla2">
            <p align="center"><i>Unesi novi film</i></p>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label><i>Naziv</i></label><br>
            <input type="text" name="naziv" class="form-control" placeholder="Unesi naziv" value="<?php echo $naziv; ?>"><br>
            <label><i>Godina</i></label><br>
             <input type="text" name="godina" class="form-control" placeholder="Unesi godinu" value="<?php echo $godina; ?>"><br>
            <label><i>Zanr</i></label><br>
            <select name="zanrovi" id="zanrovi"><br>
            <?php
            $resultSet= $conn->query("SELECT zanr FROM zanrovi");
            while ($rows=$resultSet->fetch_assoc()){
                $zanr=$rows['zanr'];
                echo "<option value='$zanr'>$zanr</option>";
                    } ?>
            </select><br>
            <?php
            if ($update==true): ?>
                <button type="submit" class="btn btn-info" name="update">Azuriraj</button>
            <?php else: ?>
                <button type="submit" name="sacuvaj" class="btn btn-primary">Sacuvaj</button>
            <?php endif; ?>
        </form>
    </div>
    </div>
    </body>

    <form action="insertzanr.php" method="post" class="tabla2">
        <p align="center">Unesi zanr</p>
        <table>
            <label><i>Naziv zanra</i></label>
            <td><input type="text" name="novizanr"> </td><br>
        </table><br>
        <button type="submit" name="sacuvaj" class="btn btn-primary">Sacuvaj</button>
    </form>


</html>