<?php
//session_start();
    if(isset($_POST['knygos_pasiskolinimas']))
    {
        $con = mysqli_connect("localhost","root","","biblioteka");
        $knygosID = $_POST['knygosID'];
        $kiekisGautas = $_POST['kiekisGautas']-1;
        $manoID = $_POST['manoID'];

        $sql = "UPDATE knyga SET Kiekis=".$kiekisGautas." WHERE id=".$knygosID;

        $sql2 = " SELECT * FROM knyga WHERE knyga.id=".$knygosID;

        $dataMano = date("Y/m/d");

        $sql3 = "INSERT INTO pasiskolinimas( laikas, id, fk_VartotojasSlapyvardis, fk_Knygaid)
        VALUES ('$dataMano', '$manoID', '$manoID','$knygosID')";

        if (mysqli_query($con, $sql)){
            if(mysqli_query($con, $sql2))
            {
                echo' KGNYA';
                if(mysqli_query($con, $sql3))
                {
                    echo' PASISKOLINIASm';
                }
            }
            header("Location: ../pickabook.php");
        }
        else{
            echo'nepavyko xd';
        }
    }

    function SpausdintiNeisrinktasKnygas()
    {
        $con=mysqli_connect('localhost', 'root', '', 'biblioteka');
        $query = " SELECT * FROM knyga WHERE knyga.kiekis>0";
        $result = $con->query($query);
        $knygos=mysqli_fetch_all($result);

        echo '    
        <section class="main-container">
        <div class="main-wrapper">
            <h3>
                Knygos
            </h3>
        </div>
        </section>';
        echo "<table border=\"1\">";
        echo "<tr><td>Pavadinimas</td><td>Metai</td><td>Kiekis</td></tr>";
        foreach ($knygos as $knyga)
        {
            echo "<tr>
            <td>".$knyga[0]."</td><td>".$knyga[1]."</td><td>".$knyga[2]."</td>
            <td>";
            echo '
            <form method="post" action="papildoma/KlientoKelioniuKontroleris.php">
            <input type="hidden" name ="kiekisGautas" value='.$knyga[2].'>
            <input type="hidden" name ="knygosID" value='.$knyga[3].'>
            <input type="hidden" name ="manoID" value='.$_SESSION['nick'].'>
            <input type="submit" name="knygos_pasiskolinimas" value="Išsirinkti"/> 
            </form>
            </td>
            </tr>';
        }
        echo '</table>';
    }


    function KlientoUzsakymai()
    {
        echo '        <section class="main-container">
        <div class="main-wrapper">
            <h3>
                Užsakymai:
            </h3>
        </div>
        </section>';

        $dbc=mysqli_connect('localhost', 'root', '', 'is');
        
        //$sql = " SELECT * FROM keliones_uzsakymai";
        $sql = " SELECT * FROM keliones JOIN keliones_uzsakymai ON keliones.id_Kelione=keliones_uzsakymai.fk_Kelioneid_Kelione ";
        $result = mysqli_query($dbc, $sql);
        echo "<table border=\"1\">";
        echo "<tr><td>Pavadinimas</td><td>Išvykimo data</td><td>Užsakymo data</td><td>Užsakymo būsena</td><td>Kaina</td></tr>";
        {while($row = mysqli_fetch_assoc($result))
        {
            if($_SESSION['kliento_kodas']==$row['fk_Klientaskliento_kodas'])
            {
                if($row['uzsakymo_busena']== 1)
                {
                    echo '<tr>
                        <td>'.$row['pavadinimas'].'</td>
                        <td>'.$row['isvykimo_data'].'</td>
                        <td>'.$row['sukurimo_data'].'</td>
                        <td>'.'Atšauktas'.'</td>
                        <td>'.$row['kaina_asmeniui'].' eur</td>
                    </tr>';
                }else if ($row['uzsakymo_busena']== 2){
                    echo '<tr>
                        <td>'.$row['pavadinimas'].'</td>
                        <td>'.$row['isvykimo_data'].'</td>
                        <td>'.$row['sukurimo_data'].'</td>
                        <td>'.'Neapmokėta'.'</td>
                        <td>'.$row['kaina_asmeniui'].' eur</td>
                        <td>';
                                echo '<form method="post" action="uzsakymoLangas.php">
                                <input type="hidden" name ="uzsakymo_nr" value='.$row['uzsakymo_nr'].'>
                                <input type="submit" name="atsaukimas" value="Atšaukti"/> 
                                </form>
                        </td>
                    </tr>';
                }else if ($row['uzsakymo_busena']== 3){
                    echo '<tr>
                        <td>'.$row['pavadinimas'].'</td>
                        <td>'.$row['isvykimo_data'].'</td>
                        <td>'.$row['sukurimo_data'].'</td>
                        <td>'.'Apmokėta įmoka'.'</td>
                        <td>'.$row['kaina_asmeniui'].' eur</td>
                        <td>';
                                echo '<form method="post" action="uzsakymoLangas.php">
                                <input type="hidden" name ="uzsakymo_nr" value='.$row['uzsakymo_nr'].'>
                                <input type="submit" name="atsaukimas" value="Atšaukti"/> 
                                </form>
                        </td>
                    </tr>';
                }else if ($row['uzsakymo_busena']== 4){
                    echo '<tr>
                        <td>'.$row['pavadinimas'].'</td>
                        <td>'.$row['isvykimo_data'].'</td>
                        <td>'.$row['sukurimo_data'].'</td>
                        <td>'.'Apmokėta'.'</td>
                        <td>'.$row['kaina_asmeniui'].'</td>
                        <td>';
                            echo '<form method="post" action="uzsakymoLangas.php">
                            <input type="hidden" name ="uzsakymo_nr" value='.$row['uzsakymo_nr'].'>
                            <input type="submit" name="atsaukimas" value="Atšaukti"/> 
                            </form>
                        </td>
                    </tr>';
                }else if ($row['uzsakymo_busena']== 5){
                    echo '<tr>
                        <td>'.$row['pavadinimas'].'</td>
                        <td>'.$row['isvykimo_data'].'</td>
                        <td>'.$row['sukurimo_data'].'</td>
                        <td>'.'pabaigta'.'</td>
                        <td>'.$row['kaina_asmeniui'].' eur</td>
                    </tr>';
                }
            }
        
        
        }
        };
        echo "</table>";
    }

    function KlientoSekamosKeliones()
    {
        echo '        <section class="main-container">
        <div class="main-wrapper">
            <h3>
                Sekamos keliones:
            </h3>
        </div>
        </section>';

        $dbc=mysqli_connect('localhost', 'root', '', 'is');
        
        $sql = "SELECT * FROM keliones JOIN sekamos_keliones ON keliones.id_Kelione=sekamos_keliones.fk_Kelioneid_Kelione ";
        $result = mysqli_query($dbc, $sql);
        echo "<table border=\"1\">";
        echo "<tr><td>Pavadinimas</td><td>aprasymas</td><td>kaina_asmeniui</td><td>Sekama kelionė</td></tr>";
        {while($row = mysqli_fetch_assoc($result))
        {
            if($_SESSION['kliento_kodas']==$row['fk_Klientaskliento_kodas'])
            {
                echo '<tr>
                        <td>'.$row['pavadinimas'].'</td>
                        <td>'.$row['aprasymas'].'</td>
                        <td>'.$row['kaina_asmeniui'].'</td>
                        <td>'.$row['fk_Kelioneid_Kelione'].'</td>
                        <td>';
                            echo '<form method="post" action="sekamosKeliones.php">
                            <input type="hidden" name ="id_Sekama_kelione" value='.$row['id_Sekama_kelione'].'>
                            <input type="submit" name="sekimoAtsaukimas" value="Ištrinti"/> 
                            </form>
                        </td>
                    </tr>';
            }
        }
        };
        echo "</table>";
    }

    if(isset($_POST['uzsakymas']))
    {
        $con = mysqli_connect("localhost","root","","is");
        $id_Kelione = $_POST['id_Kelione'];
        $_SESSION['uzsakymoBool'] = 1;
        $tempTime = date('Y-m-d');
        $klientoKodas = $_SESSION['kliento_kodas'];
        $sql = "INSERT INTO keliones_uzsakymai(sukurimo_data, uzsakymo_busena, fk_Kelioneid_Kelione, fk_Klientaskliento_kodas)
         VALUES ('$tempTime', '2', '$id_Kelione', '$klientoKodas')";

        if (mysqli_query($con, $sql)){
            //header("Location: ../index.php");
        }
        else{
            echo'Klaida :(<br>';
            echo '<a href="../index.php">Atgal</a>';
        }
    }
    //Užsakymo atšaukimas
    if(isset($_POST['atsaukimas']))
    {
        $con = mysqli_connect("localhost","root","","is");
        $uzsakymo_nr = $_POST['uzsakymo_nr'];

        $sql = "UPDATE keliones_uzsakymai SET uzsakymo_busena = 1 WHERE uzsakymo_nr=".$uzsakymo_nr;

        if (mysqli_query($con, $sql)){
            $_SESSION['zinute'] = "Užsakymas sėkmingai atšauktas!";
            header("Location: ./uzsakymoLangas.php");
        }
        else{
            echo'Klaida :(<br>';
            echo '<a href="../index.php">Atgal</a>';
        }
    }

    if(isset($_POST['sekti']))
    {
        $con = mysqli_connect("localhost","root","","is");
        $id_Kelione = $_POST['id_Kelione'];

        $klientoKodas = $_SESSION['kliento_kodas'];
        $sql = "INSERT INTO sekamos_keliones(fk_Klientaskliento_kodas, fk_Kelioneid_Kelione)
         VALUES ('$klientoKodas', '$id_Kelione')";

        if (mysqli_query($con, $sql)){
            $_SESSION['zinute'] = "Sekama kėlionė sėkmingai pridėta!";
            header("Location: ./index.php");
        }
        else{
            echo'Klaida :(<br>';
            echo '<a href="../index.php">Atgal</a>';
        }
    }
    
    //Sekamos kelionės atšaukimas
    if(isset($_POST['sekimoAtsaukimas']))
    {
        $con = mysqli_connect("localhost","root","","is");
        $id_Sekama_kelione = $_POST['id_Sekama_kelione'];

        $sql = "DELETE FROM sekamos_keliones WHERE id_Sekama_kelione=".$id_Sekama_kelione;
        
        if (mysqli_query($con, $sql)){
            $_SESSION['zinute'] = "Sekama kėlionė sėkmingai panaikinta!";
            header("Location: ./sekamosKeliones.php");
        }
        else{
            echo'Klaida :(<br>';
            echo '<a href="../sekamosKeliones.php">Atgal</a>';
        }
    }
?>