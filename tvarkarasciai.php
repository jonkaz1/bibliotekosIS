<?php
include_once 'header.php';
?>
    <section class="main-container">
        <div class="main-wrapper">
            <h2>
                Priskirtos kelionės
            </h2>
        </div>
    </section>

<?php
$sql = "SELECT * FROM keliones ";
$result = mysqli_query($dbc, $sql);
echo "<table border=\"1\">";
echo "<tr><td>Pavadinimas</td><td>Aprašymas</td><td>Kaina</td><td>Tipas</td></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "
            <tr>
                <td>" . $row['pavadinimas'] . "</td>
                <td>" . $row['aprasymas'] . "</td>
                <td>" . $row['kaina_asmeniui'] . "</td>
                <td>" . $row['tipas'] . "</td>
                
            </tr>
        ";
    }
echo "</table>";
include_once 'footer.php';
?>