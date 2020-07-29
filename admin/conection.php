<?php
$conn= new mysqli("127.0.0.1","root","","filmovi") or die(mysqli_error($conn));

$update=false;
$id=0;
$naziv='';
$godina='';

if (isset($_POST['sacuvaj'])){
    $naziv =$_POST['naziv'];
    $godina=$_POST['godina'];
    $zanr_id =$_POST['zanrovi'];

    $conn->query("INSERT INTO film(naziv,godina,zanr_id) VALUES ('$naziv','$godina',(SELECT id FROM zanrovi WHERE zanr='$zanr_id'))")
    or die($conn->error);

    $_SESSION['message']="Film sacuvan uspesno";
    $_SESSION['msg_type']="success";

    header("Location:home.php");
}

if (isset($_GET['delete'])){
    $id=$_GET['delete'];
    $conn->query("DELETE FROM film WHERE id=$id") or die($conn->error());

    $_SESSION['message']="Film obrisan uspesno";
    $_SESSION['msg_type']="danger";

    header("Location:home.php");
}

if (isset($_GET['update'])){
    $id=$_GET['update'];
    $result=$conn->query("SELECT naziv,godina FROM film WHERE id=$id") or die($conn->error());

    if (count($result)==1){
        $row=$result->fetch_array();
        $naziv=$row['naziv'];
        $godina=$row['godina'];
        $update=true;
    }

}

if (isset($_POST['update'])){
    $id=$_POST['id'];
    $naziv=$_POST['naziv'];
    $godina=$_POST['godina'];
    $zanr_id=$_POST['zanrovi'];

    $conn->query("UPDATE film SET naziv='$naziv',godina='$godina',zanr_id=(SELECT id id FROM zanrovi WHERE zanr='$zanr_id') WHERE id=$id") or die($conn->error);

    $_SESSION['message']="Azuriranje uspesno";
    $_SESSION['msg_type']="warning";


    header("Location:home.php");
}