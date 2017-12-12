<?php
session_start();
$dbc=mysqli_connect('localhost', 'root', '', 'is');

if(!$dbc)
{
    die("Neišėjo prisijungt");
}
//Registruoja kažką kitą o ne klientą. (praitam darbe čia buvo, kad registruoja bibliotekininką, o aukščiau vartotoją)
if(isset($_POST['regi']))
{
    if(!$dbc){
        die ("Negaliu prisijungti prie MySQL:"	.mysqli_error($dbc));
    }
    if($_POST !=null){
        $a1 = $_POST['a1'];
        $a2 = $_POST['a2'];
        $a3 = $_POST['a3'];
        $a4 = $_POST['a4'];
        $a5 = $_POST['a5'];
        $a6 = $_POST['a6'];
        $a7 = $_POST['a7'];
        if (!empty($a1) && !empty($a2)&& !empty($a6)&& !empty($a7)) {
            $sql = "INSERT INTO klientai(vardas, pavarde, lytis, telefonas, adresas, el_pastas, slaptazodis, kliento_tipas) VALUES ('$a1', '$a2', '$a3','$a4', '$a5', '$a6','$a7', '2')";
            if (mysqli_query($dbc, $sql)){
                header("Location: index.php");
                echo "Įrašyta";
            }
            else{
                header("Location: ../register.php");
            }
        }
        else{
            $_SESSION['zinute'] = "Prašome teisingai užpildyti laukus";
            header("Location: ../register.php");
        }
    }
}
//Registruoja kažką kitą o ne klientą. (praitam darbe čia buvo, kad registruoja bibliotekininką, o aukščiau vartotoją)
else if(isset($_POST['regiLib']))
{
    if(!$dbc){
        die ("Negaliu prisijungti prie MySQL:"	.mysqli_error($dbc));
    }
    if($_POST !=null){
        $a1 = $_POST['a1'];
        $a2 =$_POST['a2'];
        $a3 = $_POST['a3'];
        $a4 = $_POST['a4'];
        $sql = "INSERT INTO Vartotojas(Vardas, Pavarde, Slapyvardis, Slaptazodis, Privilegijos ) VALUES ('$a1', '$a2', '$a3','$a4', '1')";
        //echo $sql; die;
        if (mysqli_query($dbc, $sql)){
            header("Location: ../index.php");
            echo "Įrašyta";
        }
    }
}else {
    header("Location: ../index.php");
}

?>