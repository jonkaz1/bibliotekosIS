<?php
include_once'header.php';


?>
<section class="main-container">
    <div class="main-wrapper">
        <h2>
            Naujas darbuotojas
        </h2>
        <form class="register-form" method="post" action="kontroleriai\vartotojuKontroleris.php">
            <input type="text" name="a1" placeholder="Vardas"><br/>
            <input type="text" name="a2" placeholder="Pavardė"><br/>
            <input type="text" name="a3" placeholder="Telefonas"><br/>
			<input type="text" name="a4" placeholder="El paštas"><br/>
			<input type="text" name="a5" placeholder="Darbuotojo numeris"><br/>
			<input type="text" name="a6" placeholder="Pareigų tipas"><br/>
			<input type="password" name="a7" placeholder="Slaptažodis"><br/>
            
            <button type="submit" name="iterpti">Sukurti</button>
        </form>
    </div>
</section>


<?php
include_once'footer.php';
?>