<?php
include_once 'header.php';
?>

    <section class="main-container">
        <div class="main-wrapper">
            <h2>
                Papildoma paslauga sėkmingai ištrinta
            </h2>
            <?php
            $id = $_GET['id'];

            $sql = "DELETE  FROM papildomos_paslaugos WHERE id_papildomos_paslaugos='".$id."'";
            $result = mysqli_query($dbc, $sql);
            //$row = mysqli_fetch_assoc($result);

            

            
            ?>
        </div>
    </section>

<?php
include_once 'footer.php';