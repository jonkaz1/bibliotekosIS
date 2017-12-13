<?php
include_once 'header.php';

$id = $_GET['id'];

$sql = "SELECT pavadinimas FROM keliones WHERE id_Kelione='$id'";
$result = mysqli_query($dbc, $sql);
$row = mysqli_fetch_assoc($result);
echo '
    <section class="main-container">
        <div class="main-wrapper">
            <h2>
                Kelionės "'. $row['pavadinimas'] .'" išlaidos
            </h2>
        </div>
    </section>
';

$sql = "SELECT * FROM islaidos WHERE kelionesId='$id'";
$result = mysqli_query($dbc, $sql);
echo "<table border=\"1\">";
echo "<tr><td>Pavadinimas</td><td>Kaina</td></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "
            <tr>
                <td>" . $row['pavadinimas'] . "</td>
                <td>" . $row['kaina'] . "</td>
                <td>
                    <form style='display: inline' method='post' action='controllers/editExpenses.php'>
                        <input type='hidden' name='id' value='". $row['id'] ."'>
                        <button type='submit' name='delete'>Ištrinti</button>
                    </form>
                    <form style='display: inline' method='get' action='editExpense.php'>
                        <input type='hidden' name='id' value='". $row['id'] ."'>
                        <button type='submit' name='edit'>Redaguoti</button>
                    </form>
                </td>
            </tr>
        ";
}
echo "</table>";
echo "
    <div align='center'>
        <form method='get' action='createExpense.php'>
            <input type='hidden' name='tripId' value='$id'>
            <button type='submit' name='new'>Pridėti naują</button>
        </form>
    </div>
";

include_once 'footer.php';
?>