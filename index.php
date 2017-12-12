<!DOCTYPE HTML>

<?php
include_once'header.php';
?>
<section class="main-container">
    <div class="main-wrapper">
        <h2>
            Kelionės
        </h2>
    </div>
</section>

<section class="main-container">
    <div class="main-wrapper">
        <h3>
            Visos kelionės
        </h3>
    </div>
</section>
<?php
$dbc=mysqli_connect('localhost', 'root', '', 'is');
$sql = "SELECT * FROM keliones";

$result = mysqli_query($dbc, $sql);
echo "<table border=\"1\">";
if (isset($_SESSION['kliento_kodas'])) {
    echo "<tr><td>Pavadinimas</td><td>Aprašymas</td><td>Kaina</td><td>Užsakyti kelionę</td></tr>";
}else{
    echo "<tr><td>Pavadinimas</td><td>Aprašymas</td><td>Kaina</td></tr>";
}
{while($row = mysqli_fetch_assoc($result))
{
    if (isset($_SESSION['kliento_kodas'])) {

    $sql2 = "SELECT * FROM sekamos_keliones";
    $result2 = mysqli_query($dbc, $sql2);
    $arRasyti = 1;
    while($row2 = mysqli_fetch_assoc($result2)){
        if($row['id_Kelione'] == $row2['fk_Kelioneid_Kelione']){
            if($_SESSION['kliento_kodas'] == $row2['fk_Klientaskliento_kodas']){
                $arRasyti = 0;
            }
        }
    };
    if($arRasyti == 1){
    echo '<tr>
            <td>'.$row['pavadinimas'].'</td>
            <td>'.$row['aprasymas'].'</td>
            <td>'.$row['kaina_asmeniui'].' eur</td>
            <td>';
                    echo '<form method="post" action="uzsakymoLangas.php">
                    <input type="hidden" name ="id_Kelione" value='.$row['id_Kelione'].'>
                    <input type="submit" name="uzsakymas" value="Užsakyti"/> 
                    </form>
            
                    <form method="post" action="sekamosKeliones.php">
                    <input type="hidden" name ="id_Kelione" value='.$row['id_Kelione'].'>
                    <input type="submit" name="sekti" value="Sekti kelionę"/> 
                    </form>

            </td>
         </tr>';
    }else{
        echo '<tr>
        <td>'.$row['pavadinimas'].'</td>
        <td>'.$row['aprasymas'].'</td>
        <td>'.$row['kaina_asmeniui'].' eur</td>
        <td>';
                echo '<form method="post" action="uzsakymoLangas.php">
                <input type="hidden" name ="id_Kelione" value='.$row['id_Kelione'].'>
                <input type="submit" name="uzsakymas" value="Užsakyti"/> 
                </form>
     </tr>';
    }
        //$_SESSION['kliento_kodas'] = "";
    }
    else{
        echo '<tr>
            <td>'.$row['pavadinimas'].'</td>
            <td>'.$row['aprasymas'].'</td>
            <td>'.$row['kaina_asmeniui'].'</td>
        </tr>';
    }
}
};
echo "</table>";
include_once'footer.php';
?>
