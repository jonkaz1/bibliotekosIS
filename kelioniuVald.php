<?php
include_once 'header.php';
?>
    <section class="main-container">
        <div class="main-wrapper">
            <h2>
                Kelionės
            </h2>
        </div>
    </section>

<?php
$sql = " SELECT * FROM keliones JOIN keliones_uzsakymai ON keliones.id_Kelione=keliones_uzsakymai.fk_Kelioneid_Kelione ";
        $result = mysqli_query($dbc, $sql);
        echo "<table border=\"1\">";
        
echo "<tr><td>Vardas</td><td>Pavardė</td><td>Kelionės pavadinimas</td><td>Tipas</td></tr>";
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