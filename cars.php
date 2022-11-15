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
    <img src="pictures/titulka.jpg" alt="titulna fotka" class="responsive">
</div>

<div class="kontainer">
    <h3 class="nadpisH1">Naša ponuka:</h3>
    <?php if(isset($_SESSION['prihlaseny']) && $_SESSION['prihlaseny'] == '1' && $_SESSION['admin'] == '1'): ?>

        <div class="row">
            <div class="col my-2 ">

                <div class="card margin" style="width: 30rem; margin: 1rem" >
                    <?php
                    if(isset($_POST['id_Car_to_update'])) {
                        foreach ($app->getCar() as $car) { ?>
                            <H3 class="nadpisH1" >Upraviť dané auto ?</H3>

                            <form method="post" enctype="multipart/form-data" onsubmit="return car_validationUpdate(this);">
                                <div class="col my-2 ">
                                    <input type="text" name="spzCarUpravovane" class="margin" placeholder="Zadaj ŠPZ" value="<?=$car->getSPZ() ?>" ><br>
                                    <input type="text" name="idCategoryCarUpravovane" class="margin" placeholder="Zadaj id kategorie" value="<?=$car->getIdCategory() ?>" ><br>
                                    <input type="file" name="fileCarUpravovane" class="margin" accept="pictures/<?=$car->getImage() ?>"><br>
                                    <input type="text" name="nazovCarUpravovane" class="margin" placeholder="Zadaj nazov" value="<?=$car->getName() ?>" ><br>
                                    <input type="text" name="minCarUpravovane" class="margin" placeholder="Zadaj minimálnu cenu" value="<?=$car->getMinPrice() ?>" ><br>
                                    <input type="text" name="maxCarUpravovane" class="margin" placeholder="Zadaj maximálnu cenu" value="<?=$car->getMaxPrice() ?>" ><br>
                                    <input type="file" name="file1CarUpravovane" class="margin" accept="pictures/<?=$car->getDetailImage1() ?>"><br>
                                    <input type="file" name="file2CarUpravovane" class="margin" accept="pictures/<?=$car->getDetailImage2() ?>"><br>
                                    <input type="file" name="file3CarUpravovane" class="margin" accept="pictures/<?=$car->getDetailImage3() ?>"><br>
                                    <input type="checkbox" name="isRentCarUpravovane" class="margin"  <?=$car->isChecked()?>>Je prenajate?<br>

                                    <input type="text" name="yearCarUpravovane" class="margin" placeholder="Zadaj rok výroby" value="<?=$car->getYear() ?>" ><br>
                                    <input type="text" name="typeCarUpravovane" class="margin" placeholder="Zadaj typ vozidla" value="<?=$car->getType() ?>" ><br>

                                    <input type="hidden" name="id_car_final_update" value="<?= $car->getSPZ()?>">
                                    <input type="submit" name="carFinalUpdate" value="Upraviť" class="btn btn-outline-success" onclick="return confirm('Naozaj chcete upraviť dané auto?');">
                                    <button type="button" class="btn btn-outline-danger" name="edit_zrus_auto" onclick="location.href='cars.php'">Zrušiť</button>
                                </div>
                            </form>

                        <?php }} else { ?>
                        <H3 class="nadpisH1" >Vytvorit ďalšie auto ?</H3>

                        <form method="post" enctype="multipart/form-data" onsubmit="return car_validation(this);">
                            <div class="col my-2 ">
                                <input type="text" name="spzCar" class="margin" placeholder="Zadaj ŠPZ" ><br>
                                <input type="text" name="idCategoryCar" class="margin" placeholder="Zadaj id kategorie" ><br>
                                <input type="file" name="fileCar" class="margin"><br>
                                <input type="text" name="nazovCar" class="margin" placeholder="Zadaj nazov"><br>
                                <input type="text" name="minCar" class="margin" placeholder="Zadaj minimálnu cenu"><br>
                                <input type="text" name="maxCar" class="margin" placeholder="Zadaj maximálnu cenu"><br>
                                <input type="file" name="file1Car" class="margin"><br>
                                <input type="file" name="file2Car" class="margin"><br>
                                <input type="file" name="file3Car" class="margin"><br>
                                <input type="checkbox" name="isRentCar" class="margin">Je prenajate?<br>

                                <input type="text" name="yearCar" class="margin" placeholder="Zadaj rok výroby"><br>
                                <input type="text" name="typeCar" class="margin" placeholder="Zadaj typ vozidla"><br>

                                <input type="submit" value="Odošli súbor" class="margin">
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php endif;?>

    <div class="row row-cols-1 row-cols-md-3 g-3">
        <?php foreach ($app->getAllCars() as $car) { ?>
        <div class="col">
            <div class="card" >
                <a href="detail.php">
                    <img class="card-img-top" src="pictures/<?=$car->getImage()?> " alt="Sorry, cannot load an image">
                </a>
                <div class="card-body">
                    <h5 class="card-title textik"><?= $car->getName() ?></h5>
                    <p class="card-text">Cena od <?= $car->getMinPrice() ?> - <?= $car->getMaxPrice() ?>&#8364; / deň. </p>
                    <button type="button" class="btn btn-outline-success" onclick="location.href='detail.php'">Zobraziť detail</button>
                    <?php if(isset($_SESSION['prihlaseny']) && $_SESSION['prihlaseny'] == '1' && $_SESSION['admin'] == '1'): ?>
<!--                            <button type="button" class="btn btn-outline-danger" onclick="location.href='index.php'">Vymazať auto</button>
-->                     <form method="post">
                            <input type="hidden" name="id_car_to_delete" value="<?= $car->getSPZ()?>">
                            <input type="submit" name="deleteCar" value="Vymazať" class="btn btn-outline-danger" onclick="return confirm('Naozaj si prajete odstrániť toto vozidlo?');">
                            <!--                        <button type="submit" name="delete" class="btn btn-outline-danger">Vymazať</button>-->
                            <input type="hidden" name="id_Car_to_update" value="<?= $car->getSPZ()?>">
                            <input type="submit" name="updateCar" value="Upraviť" class="btn btn-outline-warning">
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<?php
include 'footer.php';
?>
