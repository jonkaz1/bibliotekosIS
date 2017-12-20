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
    
	
	
    $sql = "UPDATE papildomos_paslaugos 
            SET
              pavadinimas='$a1'
              , suma='$a2'
			  , id_papildomos_paslaugos='$a3'
              
        WHERE id_papildomos_paslaugos='$a3'";
    if (mysqli_query($dbc, $sql)) {
        header("Location: ../papildomosPvald.php");
    }
}

	else if (isset($_POST['iterpti'])) {
    $a1 = $_POST['a1'];
    $a2 = $_POST['a2'];
	$a3 = $_POST['a3'];
    
	
	
    $sql = "INSERT INTO `papildomos_paslaugos` (`pavadinimas`, `suma`, `id_papildomos_paslaugos`) VALUES ('$a1', '$a2', '$a3')
            ";
    if (mysqli_query($dbc, $sql)) {
        header("Location: ../papildomosPvald.php");
    }
}

	else{
	
    header("Location: ../papildomosPvald.php");
}