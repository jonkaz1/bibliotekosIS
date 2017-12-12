<?php
include_once 'header.php';
?>

    <section class="main-container">
        <div class="main-wrapper">
            <h2>
                Kelionės redagavimas
            </h2>
            <?php
            $id = $_GET['id'];

            $sql = "SELECT * FROM keliones WHERE id_Kelione='".$id."'";
            $result = mysqli_query($dbc, $sql);
            $row = mysqli_fetch_assoc($result);

            $sql = "SELECT * FROM transporto_tipai";
            $selectData = mysqli_query($dbc, $sql);
            $select1= '<select name="a10">';
            while($rs=mysqli_fetch_array($selectData)){
                $select1.='<option value="'.$rs['id_transporto_tipas'].'">'.$rs['name'].'</option>';
            }
            $select1.='</select>';

            $sql = "SELECT * FROM nakvynes_tipai";
            $selectData = mysqli_query($dbc, $sql);
            $select2= '<select name="a11">';
            while($rs=mysqli_fetch_array($selectData)){
                $select2.='<option value="'.$rs['id_nakvynes_tipas'].'">'.$rs['name'].'</option>';
            }
            $select2.='</select>';

            $sql = "SELECT * FROM maitinimo_tipai";
            $selectData = mysqli_query($dbc, $sql);
            $select3= '<select name="a12">';
            while($rs=mysqli_fetch_array($selectData)){
                $select3.='<option value="'.$rs['id_maitinimo_tipas'].'">'.$rs['name'].'</option>';
            }
            $select3.='</select>';

            echo '
            <form class="register-form" method="post" action="controllers\editTrip.php">
                <input type="hidden" name="id" value="'.$id.'">
                <input type="text" name="a1" placeholder="Pavadinimas" value="'.$row['pavadinimas'].'"><br/>
                <input type="text" name="a2" placeholder="Aprašymas" value="'.$row['aprasymas'].'"><br/>
                <input type="text" name="a3" placeholder="Maršrutas" value="'.$row['marsutas'].'"><br/>
                <input type="text" name="a4" placeholder="Tipas" value="'.$row['tipas'].'"><br/>
                <input type="number" name="a5" placeholder="Kaina asmeniui" value="'.$row['kaina_asmeniui'].'"><br/>
                <input type="number" name="a6" placeholder="Vietų skaičius" value="'.$row['vietu_sk'].'"><br/>
                <input type="number" name="a7" placeholder="Trukmė" value="'.$row['trukme'].'"><br/>
                <input type="date" name="a8" placeholder="Išvykimo data" value="'.$row['isvykimo_data'].'"><br/>
                <input type="date" name="a9" placeholder="Išvykimo vieta" value="'.$row['isvykimo_vieta'].'"><br/>
                '. $select1 .'
                '. $select2 .'
                '. $select3 .'
                <button type="submit" name="save">Saugoti</button>
            </form>
            ';
            ?>
        </div>
    </section>

<?php
include_once 'footer.php';