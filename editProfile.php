<?php
include_once 'header.php';
?>

    <section class="main-container">
        <div class="main-wrapper">
            <h2>
                Profilio redagavimas
            </h2>
            <?php
            $email = $_SESSION["nick"];

            $sql = "SELECT * FROM darbuotojai WHERE el_pastas='".$email."'";
            $result = mysqli_query($dbc, $sql);
            $row = mysqli_fetch_assoc($result);
            echo '
            <form class="register-form" method="post" action="controllers\editProfile.php">
                <input type="text" name="a1" placeholder="Vardas" value="'.$row['vardas'].'"><br/>
                <input type="text" name="a2" placeholder="Pavardė" value="'.$row['pavarde'].'"><br/>
                <input type="text" name="a3" placeholder="Telefonas" value="'.$row['telefonas'].'"><br/>
                <input type="email" name="a4" placeholder="El. paštas" value="'.$row['el_pastas'].'"><br/>
                <input type="password" name="a6" placeholder="Slaptažodis" value="'.$row['slaptazodis'].'"><br/>
                <button type="submit" name="save">Saugoti</button>
            </form>
            ';
            ?>
        </div>
    </section>

<?php
include_once 'footer.php';