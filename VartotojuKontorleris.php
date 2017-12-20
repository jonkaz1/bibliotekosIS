<?php
//session_start();

function VartotojuValdymas()
    {
        echo '        <section class="main-container">
        <div class="main-wrapper">
            <h3>
                Darbuotojai:
            </h3>
        </div>
        </section>';

        $dbc=mysqli_connect('localhost', 'root', '', 'is');
        
        $sql = "SELECT * FROM darbuotojai ";
        $result = mysqli_query($dbc, $sql);
        echo "<table border=\"1\">";
        echo "<tr><td>Vardas</td><td>Pavardė</td><td>Telefono nr</td><td>Pareigų tipas</td></tr>";
        {while($row = mysqli_fetch_assoc($result))
        {
            if($_SESSION['darduotojo_nr']==$row['fk_Darduotojasdarduotoju_nr'])
            {
                echo '<tr>
                        <td>'.$row['vardas'].'</td>
                        <td>'.$row['pavarde'].'</td>
                        <td>'.$row['telefonas'].'</td>
                        <td>'.$row['pareigu_tipas'].'</td>
                        <td>';
                            echo '<form method="post" action="sekamosKeliones.php">
                            <input type="hidden" name ="id_Sekama_kelione" value='.$row['darduotojo_nr'].'>
                            <input type="submit" name="sekimoAtsaukimas" value="Ištrinti"/> 
                            </form>
                        </td>
                    </tr>';
            }
        }
        };
        echo "</table>";
    }
	
	
	?>