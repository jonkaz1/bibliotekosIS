<?php
include_once'header.php';


?>
<section class="main-container">
    <div class="main-wrapper">
        <h2>
            Nauja papildoma paslauga
        </h2>
        <form class="register-form" method="post" action="kontroleriai\paslauguKontroleris.php">
            <input type="text" name="a1" placeholder="Pavadinimas"><br/>
            <input type="text" name="a2" placeholder="Kaina"><br/>
            <input type="text" name="a3" placeholder="ID"><br/>
            
            <button type="submit" name="iterpti">Sukurti</button>
        </form>
    </div>
</section>


<?php
include_once'footer.php';
?>