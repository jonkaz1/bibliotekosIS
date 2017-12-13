<?php
session_start();
$dbc=mysqli_connect('localhost', 'root', '', 'is');

if (!$dbc) {
    die("Neišėjo prisijungt" . mysqli_error($dbc));
}

if (isset($_POST['save'])) {
    $id = $_POST['id'];
    $a1 = $_POST['pavadinimas'];
    $a2 = $_POST['kaina'];
    $sql = "UPDATE islaidos 
            SET
              pavadinimas='$a1'
              , kaina='$a2'
            WHERE id='$id'
        ";
    if (mysqli_query($dbc, $sql)) {
        header("Location: ../workerTrips.php");
    }
    else{
        header("Location: ../workerTrips.php");
    }
} elseif(isset($_POST['delete'])){
    $id = $_POST['id'];
    $sql = "DELETE FROM islaidos WHERE id='$id'";
    if (mysqli_query($dbc, $sql)) {
        header("Location: ../workerTrips.php");
    }
    else{
        header("Location: ../workerTrips.php");
    }
} elseif(isset($_POST['create'])){
    $tripId = $_POST['tripId'];
    $a1 = $_POST['pavadinimas'];
    $a2 = $_POST['kaina'];
    $sql = "INSERT INTO islaidos (pavadinimas, kaina, kelionesId)
            VALUES ('$a1', '$a2', '$tripId')
        ";
    if (mysqli_query($dbc, $sql)) {
        header("Location: ../workerTrips.php");
    }
    else{
        header("Location: ../workerTrips.php");
    }
}
else {
    header("Location: ../workerTrips.php");
}