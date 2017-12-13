<?php
include_once 'header.php';
?>
    <section class="main-container">
        <div class="main-wrapper">
            <h2>
                Atlyginimo ataskaita
            </h2>
        </div>
    </section>

<?php
if (!isset($_POST['from']) || !isset($_POST['to'])) {
    echo '
        <div align="center">
            <form class="register-form" method="post" action="salaryReport.php">
            <p align="center" style="color: white; width: 50px">NUO</p>
                <input type="date" name="from" placeholder="from"><br/>
                <p align="center" style="color: white; width: 50px">IKI</p>
                <input type="date" name="to" placeholder="to"><br/>
                <button type="submit" name="inter">Gauti ataskaitą</button>
            </form>
        </div>
    ';
} else {
    $from = $_POST['from'];
    $to = $_POST['to'];
    $userId = $_SESSION['userId'];

    $sql = "SELECT * 
            FROM atlyginimai 
            WHERE data > '$from' AND data < '$to' AND darbuotojoId='$userId'";
    $result = mysqli_query($dbc, $sql);
    echo "<table border=\"1\">";
    echo "<tr><td>Data</td><td>Suma</td></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "
            <tr>
                <td>" . $row['data'] . "</td>
                <td>" . $row['suma'] . "</td>
            </tr>
        ";
    }
    echo "</table>";
}
include_once 'footer.php';
?>