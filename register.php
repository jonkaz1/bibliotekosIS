<?php
include_once'header.php';


?>
<section class="main-container">
    <div class="main-wrapper">
        <h2>
            Registracija
        </h2>
        <form class="register-form" method="post" action="papildoma\KlientoDuomenuKontroleris.php">
            <input type="text" name="a1" placeholder="Vardas"><br/>
            <input type="text" name="a2" placeholder="Pavardė"><br/>
            <input type="text" name="a3" placeholder="Lytis"><br/>
            <input type="text" name="a4" placeholder="Telefonas"><br/>
            <input type="text" name="a5" placeholder="Adresas"><br/>
            <input type="email" name="a6" placeholder="El. paštas"><br/>
            <input type="password" name="a7" placeholder="Slaptažodis"><br/>
            <button type="submit" name="regi">Sukurti</button>
        </form>
    </div>
</section>


<?php
include_once'footer.php';
?>