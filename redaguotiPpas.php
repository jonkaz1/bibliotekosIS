<?php
include_once 'header.php';
?>

    <section class="main-container">
        <div class="main-wrapper">
            <h2>
                Papildomos paslaugos redagavimas
            </h2>
            <?php
            $id = $_GET['id'];

            $sql = "SELECT * FROM papildomos_paslaugos WHERE id_papildomos_paslaugos='".$id."'";
            $result = mysqli_query($dbc, $sql);
            $row = mysqli_fetch_assoc($result);

            

            echo '
             <form class="register-form" method="post" action="kontroleriai\paslauguKontroleris.php">
                <input type="text" name="a1" placeholder="Pavadinimas" value="'.$row['pavadinimas'].'"><br/>
                <input type="text" name="a2" placeholder="Kaina" value="'.$row['suma'].'"><br/>
				<input type="text" name="a3" placeholder="id" value="'.$row['id_papildomos_paslaugos'].'"><br/>
                <button type="submit" name="save">Saugoti</button>
				
            </form>
            ';
            ?>
        </div>
    </section>

<?php
include_once 'footer.php';