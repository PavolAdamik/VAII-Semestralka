<?php
include 'header.php';
echo("pred if som prisiel :D ");
echo($_GET['update_vehicle_types']);
echo($_POST['update_vehicle_types']);

if(isset($_GET['update_vehicle_types'])){ // && $_POST['update_vehicle_types']> 0)
    echo("som v ife");

    include 'database.php';
    echo("idecko: " . $_POST['update_vehicle_types']);
    $udaje = mysqli_query($db,"select id, image, name, description from vehicle_types where id= ".$_POST['update_vehicle_types']);
    echo("udaje: " . $udaje);
    $row = mysqli_fetch_row($udaje);
    echo("row: " . $row);

    mysqli_close($db);
    $_POST['update_vehicle_types'] == null;
}
echo("Za if som dosiel");

?>

<div class="card margin" >
    <H3 class="nadpisH1">Update auta</H3>

    <form method="post" action="index.php" onsubmit="return checkUpdateVehicleType(this)">
        <div class="col my-2 ">
            <fieldset>
                <input type="file" name="file" class="margin" ><br> <!--value="--><?php /*echo $row[0]; */?>"
                <input type="text" name="nazov" class="margin" placeholder="Zadaj nazov" <!--value="--><?php /*echo $row[1]; */?>"><br>
                <textarea name="popis" rows="4" cols="50" placeholder="Zadaj popis" <!--value="--><?php /*echo $row[2]; */?>"></textarea>
                <input type="text" name="popis" placeholder="Zadaj popis" class="margin" <!--value="--><?php /*echo $row[3]; */?>"><br>
            </fieldset>
<!--            <input type="submit" value="Odosli subor" class="margin">
-->            <button type="submit" class="btn btn-default" name="edit_potvrdit" onclick="return confirm('Určite si prajete zmeniť tento typ vozidiel?');">Potvrdiť</button>

            <!--                            <button type="button" class="btn btn-outline-success">Vytvorit</button>
            -->
        </div>

    </form>

</div>

<?php
include 'footer.php';
?>