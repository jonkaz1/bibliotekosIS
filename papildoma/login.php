<?php
session_start();
$dbc=mysqli_connect('localhost', 'root', '', 'is');

if(!$dbc)
{
    die("Neišėjo prisijungt");
}

if(isset($_POST['logout']))
{
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php");
}

if ((isset($_POST['submit'])))
{
    if($_POST !=null){
        $enteredUser = $_POST['user'];
        $enteredPass = $_POST['pass'];

        $sql = "SELECT* FROM klientai WHERE el_pastas='$enteredUser' AND slaptazodis='$enteredPass'";
        $result = $dbc ->query($sql);
        if(!$row=$result->fetch_assoc())
        {
            header("Location: ../index.php");
            echo "Neteisingas slapyvardis/slaptažodis";
        }
        else{
            $_SESSION['name'] = $row['vardas'];
            $_SESSION['priv'] = $row['kliento_tipas'];
            $_SESSION['nick'] = $row['el_pastas'];
            header("Location: ../index.php");
        }
    }
}

?>