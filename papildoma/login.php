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
        if (!empty($enteredUser) && !empty($enteredPass)) {
            $sql = "SELECT* FROM klientai WHERE el_pastas='$enteredUser' AND slaptazodis='$enteredPass'";
            $result = $dbc ->query($sql);
            if(!$row=$result->fetch_assoc())
            {
                $sql = "SELECT * FROM darbuotojai WHERE el_pastas='$enteredUser' AND slaptazodis='$enteredPass' AND pareigu_tipas='2'";
                $result = $dbc ->query($sql);
                if(!$row=$result->fetch_assoc())
                {
					
					$sql = "SELECT * FROM darbuotojai WHERE el_pastas='$enteredUser' AND slaptazodis='$enteredPass' AND pareigu_tipas='1'";
					$result = $dbc ->query($sql);
					if(!$row=$result->fetch_assoc())
					{
						header("Location: ../index.php");
						$_SESSION['zinute'] = "Neteisingas slapyvardis/slaptažodis";
					}
					else{
						$_SESSION['name'] = $row['vardas'];
						$_SESSION['priv'] = 1;
						$_SESSION['nick'] = $row['el_pastas'];
						header("Location: ../index.php");
					}
					
					
					
                   
                }
                else{
                    $_SESSION['name'] = $row['vardas'];
                    $_SESSION['priv'] = 3;
                    $_SESSION['nick'] = $row['el_pastas'];
                    $_SESSION['userId'] = $row['darbuotoju_nr'];
                    header("Location: ../index.php");
                }
            }
            else{
                $_SESSION['name'] = $row['vardas'];
                $_SESSION['priv'] = 2;
                $_SESSION['nick'] = $row['el_pastas'];
                $_SESSION['kliento_kodas'] = $row['kliento_kodas'];
                header("Location: ../index.php");
            }
        }else {
            $_SESSION['zinute'] = "Prašome užpildyti prisijungimo laukus";
            header("Location: ../index.php");
        }
    }
}

?>