
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
    
    $sql = "UPDATE darbuotojai 
            SET
              vardas='$a1'
              , pavarde='$a2'
			  , telefonas='$a3'
			  , el_pastas='$a4'
			  , darbuotoju_nr='$a5'
			  , pareigu_tipas='$a6'
			  , slaptazodis='$a7'
              WHERE darbuotoju_nr='$a5'
        ";
    if (mysqli_query($dbc, $sql)) {
        header("Location: ../darbuotojuValdymas.php");
    }
}
	else if (isset($_POST['iterpti'])) {
    $a1 = $_POST['a1'];
    $a2 = $_POST['a2'];
	$a3 = $_POST['a3'];
	$a4 = $_POST['a4'];
	$a5 = $_POST['a5'];
	$a6 = $_POST['a6'];
	$a7 = $_POST['a7'];
    
    $sql = "INSERT INTO `darbuotojai` (`vardas`, `pavarde`, `telefonas`, `el_pastas`, `darbuotoju_nr`, `pareigu_tipas`, `slaptazodis`) 
				VALUES ('$a1', '$a2', '$a3', '$a4', '$a5', '$a6', '$a7')
            
        ";
    if (mysqli_query($dbc, $sql)) {
        header("Location: ../darbuotojuValdymas.php");
    }
}
  else {
    header("Location: ../darbuotojuValdymas.php");
}