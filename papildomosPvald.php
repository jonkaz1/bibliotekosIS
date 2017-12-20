<?php
include_once 'header.php';
?>
    <section class="main-container">
        <div class="main-wrapper">
            <h2>
                Papildomos paslaugos
            </h2>
        </div>
    </section>

<?php
$sql = "SELECT * FROM papildomos_paslaugos";
$result = mysqli_query($dbc, $sql);



echo "<table border=\"1\">";
echo "<tr><td>Pavadinimas</td><td>Paslaugos kaina</td>	<td>
					<form method='get' action='iterptiPpas.php'>
                       
                        <button type='submit' name='insert'>Įterpti naują</button>
                    </form>
													
													";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "
            <tr>
                <td>" . $row['pavadinimas'] . "</td>
                <td>" . $row['suma'] . "</td>
               
                <td>
                    <form method='get' action='redaguotiPpas.php'>
                        <input type='hidden' name='id' value='". $row['id_papildomos_paslaugos'] ."'>
                        <button type='submit' name='edit'>Redaguoti</button>
                    </form>
					<form method='get' action='istrintiPpas.php'>
                        <input type='hidden' name='id' value='". $row['id_papildomos_paslaugos'] ."'>
                        <button type='submit' name='delete'>Ištrinti</button>
                    </form>
                </td>
            </tr>
        ";
    }
echo "</table>";



include_once 'footer.php';
?>