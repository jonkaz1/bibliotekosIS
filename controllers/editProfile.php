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
    $sql = "UPDATE darbuotojai 
            SET
              vardas='$a1'
              , pavarde='$a2'
              , telefonas='$a3'
              , el_pastas='$a4'
              , darbuotoju_nr='$a5'
              , slaptazodis='$a6'            
        ";
    if (mysqli_query($dbc, $sql)) {
        header("Location: ../index.php");
    }
}  else {
    header("Location: ../index.php");
}