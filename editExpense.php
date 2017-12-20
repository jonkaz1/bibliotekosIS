<?php
include_once 'header.php';
?>
<section class="main-container">
    <div class="main-wrapper">
        <h2>
            Išlaidos redagavimas
        </h2>
        <?php
        $id = $_GET["id"];

        $sql = "SELECT * FROM islaidos WHERE id='$id'";
        $result = mysqli_query($dbc, $sql);
        $row = mysqli_fetch_assoc($result);
        echo '
            <form class="register-form" align="center" method="post" action="controllers\editExpenses.php">
                <input type="hidden" name="id" value="'.$id.'">
                <input type="text" name="pavadinimas" placeholder="Pavadinimas" value="'.$row['pavadinimas'].'"><br/>
                <input type="text" name="kaina" placeholder="Kaina" value="'.$row['kaina'].'"><br/>
                <button type="submit" name="save">Saugoti</button>
            </form>
            ';
        ?>
    </div>
</section>

<?php
include_once 'footer.php';