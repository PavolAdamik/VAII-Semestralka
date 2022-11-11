<?php
include 'header.php';
include 'database.php';
require "App.php";
$app = new App();

/*if (isset($_POST['id_zobrazit'])) {
    $typ = "SELECT * FROM vehicle_types WHERE id = $_POST['id_zobrazit']"
}*/
?>

<div>
    <h1 class="nadpisH1">Osobné autá:</h1>
    <img src="https://deltarentcar.sk/wp-content/uploads/2022/03/auta_uvod.png" alt="..." class="responsive">
</div>

<?php
include 'footer.php';
?>
