<?php
include_once 'header.php';
?>

    <section class="main-container">
        <div class="main-wrapper">
            <h2>
                Vartotojas sėkmingai ištrintas
            </h2>
            <?php
            $id = $_GET['id'];

            $sql = "DELETE  FROM darbuotojai WHERE darbuotoju_nr='".$id."'";
            $result = mysqli_query($dbc, $sql);
            //$row = mysqli_fetch_assoc($result);

            

            
            ?>
        </div>
    </section>

<?php
include_once 'footer.php';