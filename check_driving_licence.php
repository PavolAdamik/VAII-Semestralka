<?php
$registrujuci = $_POST["driving_licence"];
if(isset($_POST["drivind_licence"])){
    include 'database.php';

    $vysledok = mysqli_query($db,"SELECT driving_licence FROM person WHERE driving_licence = '$registrujuci'");
    $pocet = mysqli_num_rows($vysledok);
    if($pocet > 0){
        echo 0;
    } else {
        echo 1;
    }
}
?>