<?php
include_once 'header.php';
?>
    <section class="main-container">
        <div class="main-wrapper">
            <h2>
                Pridėti naują išlaidą
            </h2>
            <?php
            echo '
            <form class="register-form" align="center" method="post" action="controllers\editExpenses.php">
                <input type="hidden" name="tripId" value="'. $_GET['tripId'] .'">
                <input type="text" name="pavadinimas" placeholder="Pavadinimas"><br/>
                <input type="text" name="kaina" placeholder="Kaina"><br/>
                <button type="submit" name="create">Saugoti</button>
            </form>
            ';
            ?>
        </div>
    </section>

<?php
include_once 'footer.php';