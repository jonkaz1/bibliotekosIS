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
echo "<tr><td>Pavadinimas</td><td>Aprašymas</td><td>Kaina</td><td>Užsakyti kelionę</td></tr>";
// if (mysqli_num_rows($result) > 0)
{while($row = mysqli_fetch_assoc($result))
{
    if (isset($_SESSION['kliento_kodas'])) {
        //echo $_SESSION['kliento_kodas'];
    
    echo '<tr>
            <td>'.$row['pavadinimas'].'</td>
            <td>'.$row['aprasymas'].'</td>
            <td>'.$row['kaina_asmeniui'].'</td>
            <td>';
                    echo '<form method="post" action="uzsakymoLangas.php">
                    <input type="hidden" name ="id_Kelione" value='.$row['id_Kelione'].'>
                    <input type="submit" name="uzsakymas" value="Užsakyti"/> 
                    </form>
            </td>
         </tr>';
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
