﻿<?php
include_once 'header.php';
?>

    <section class="main-container">
        <div class="main-wrapper">
            <h2>
                Darbuotojo redagavimas
            </h2>
            <?php
            $id = $_GET['id'];

            $sql = "SELECT * FROM darbuotojai WHERE darbuotoju_nr='".$id."'";
            $result = mysqli_query($dbc, $sql);
            $row = mysqli_fetch_assoc($result);

            

            echo '
             <form class="register-form" method="post" action="kontroleriai\vartotojuKontroleris.php">
                <input type="text" name="a1" placeholder="Vardas" value="'.$row['vardas'].'"><br/>
                <input type="text" name="a2" placeholder="Pavardė" value="'.$row['pavarde'].'"><br/>
                <input type="text" name="a3" placeholder="Telefonas" value="'.$row['telefonas'].'"><br/>
                <input type="email" name="a4" placeholder="El. paštas" value="'.$row['el_pastas'].'"><br/>
                <input type="text" name="a5" placeholder="Darbuotoju nr." value="'.$row['darbuotoju_nr'].'"><br/>
                <input type="text" name="a6" placeholder="Pareigų tipas" value="'.$row['pareigu_tipas'].'"><br/>
				<input type="password" name="a7" placeholder="Slaptažodis" value="'.$row['slaptazodis'].'"><br/>
                <button type="submit" name="save">Saugoti</button>
            </form>
            ';
            ?>
        </div>
    </section>

<?php
include_once 'footer.php';