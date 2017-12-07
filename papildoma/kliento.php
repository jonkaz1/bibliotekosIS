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
            <form method="post" action="papildoma/kliento.php">
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
    function SpausdintiKlientoKnygas()
    {
    echo '        <section class="main-container">
    <div class="main-wrapper">
        <h3>
            Mano paimtos knygos
        </h3>
    </div>
</section>';

    $dbc=mysqli_connect('localhost', 'root', '', 'is');
    $sql = " SELECT * FROM vartotojas INNER JOIN pasiskolinimas ON vartotojas.Slapyvardis=pasiskolinimas.fk_VartotojasSlapyvardis INNER JOIN knyga ON pasiskolinimas.fk_Knygaid=knyga.id";
    $result = mysqli_query($dbc, $sql);
    echo "<table border=\"1\">";
    echo "<tr><td>Data</td><td>Pavadinimas</td><td>Metai</td><td>Grąžinimo data</td></tr>";
    // if (mysqli_num_rows($result) > 0)
    {while($row = mysqli_fetch_assoc($result))
    {
        if($_SESSION['nick']=$row['fk_VartotojasSlapyvardis'])
        {
            $tempTime = date('Y-m-d', strtotime($row['laikas']. ' + 7 days'));
            echo "<tr><td>".$row['laikas']."</td><td>".$row['Pavadinimas']."</td><td>".$row['Metai']."</td><td>".$tempTime."</td></tr>";
        }
    
    
    }
    };
    echo "</table>";
    }
?>