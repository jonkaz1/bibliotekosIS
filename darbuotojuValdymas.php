<?php
include_once 'header.php';
?>
    <section class="main-container">
        <div class="main-wrapper">
            <h2>
                Darbuotojai
            </h2>
        </div>
    </section>

<?php
$sql = "SELECT * FROM darbuotojai";
$result = mysqli_query($dbc, $sql);
echo "<table border=\"1\">";
echo "<tr><td>Numeris</td><td>Vardas</td><td>Pavardė</td><td>Tipas</td>
																		<td>
					<form method='get' action='iterptiDarbuotoja.php'>
                       
                        <button type='submit' name='insert'>Įterpti naują</button>
                    </form>

</tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "
            <tr>
                <td>" . $row['darbuotoju_nr'] . "</td>
                <td>" . $row['vardas'] . "</td>
                <td>" . $row['pavarde'] . "</td>
                <td>" . $row['pareigu_tipas'] . "</td>
                <td>
					
					
					<form method='get' action='tvarkarasciai.php'>
                        <input type='hidden' name='id' value='". $row['darbuotoju_nr'] ."'>
                        <button type='submit' name='trips'>Tvarkaraštis</button>
                    </form>	
                    <form method='get' action='redaguotiDarbuotoja.php'>
                        <input type='hidden' name='id' value='". $row['darbuotoju_nr'] ."'>
                        <button type='submit' name='edit'>Redaguoti</button>
                    </form>
					<form method='get' action='istrintiDarbuotoja.php'>
                        <input type='hidden' name='id' value='". $row['darbuotoju_nr'] ."'>
                        <button type='submit' name='delete'>Ištrinti</button>
                    </form>
                </td>
            </tr>
        ";
    }
echo "</table>";
include_once 'footer.php';
?>