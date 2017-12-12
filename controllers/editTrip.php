<?php
session_start();
$dbc=mysqli_connect('localhost', 'root', '', 'is');

if (!$dbc) {
    die("Neišėjo prisijungt" . mysqli_error($dbc));
}

if (isset($_POST['save'])) {
    $a1 = $_POST['a1'];
    $a2 = $_POST['a2'];
    $a3 = $_POST['a3'];
    $a4 = $_POST['a4'];
    $a5 = $_POST['a5'];
    $a6 = $_POST['a6'];
    $a7 = $_POST['a7'];
    $a8 = $_POST['a8'];
    $a9 = $_POST['a9'];
    $a10 = $_POST['a10'];
    $a11 = $_POST['a11'];
    $a12 = $_POST['a12'];
    $sql = "UPDATE keliones 
            SET
              pavadinimas='$a1'
              , aprasymas='$a2'
              , marsutas='$a3'
              , tipas='$a4'
              , kaina_asmeniui='$a5'
              , vietu_sk='$a6'
              , trukme='$a7'
              , isvykimo_data='$a8'
              , isvykimo_vieta='$a9'
              , transporto_tipas='$a10'
              , nakvynes_tipas='$a11'
              , maitinimo_tipas='$a12'
        ";
    if (mysqli_query($dbc, $sql)) {
        header("Location: ../workerTrips.php");
    }
}  else {
    header("Location: ../workerTrips.php");
}