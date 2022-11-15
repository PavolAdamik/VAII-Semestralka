<?php
//session_start();
include 'header.php';
require "App.php";
$app = new App();
?>

    <div>
        <?php if(isset($_SESSION['prihlaseny']) && $_SESSION['prihlaseny'] == '1' && isset($_SESSION['fullname'])): ?>
            <h1 class="nadpisH1">Vitajte <?php echo $_SESSION['fullname']?> !</h1>
            <!--<p id="prihlasenie" class="pull-right">Vitajte: <?php echo $_SESSION['fullname']?> !</p> -->
        <?php endif; ?>
        <img src="pictures/titulka.jpg" alt="titulna fotka" class="responsive">
    </div>


    <div>
        <p class="popisObchodu">
            Hľadáte auto na krátku alebo dlhú dobu ? Neváhajte a požičajte si jedno (dve :D) v našej požičovni PP čo výrazne a jasne charakterizuje Palovu Požičovňu. V ponuke máme ojazdené autá každeho druhu, cez osobné, šporotvé, dodávky a dokonca aj autobsy. Samozrejme máme aj nové autá ale Boh ťa chráň ak ho nabúraš. Môžete si vybrať z akejkoľvek značky (okrem tých drahých, ako je Lamborginy a Jaguar).
        </p >
    </div>

    <div class="kontainer">
        <h3 class="nadpisH1">Naša ponuka:</h3>

        <?php if(isset($_SESSION['prihlaseny']) && $_SESSION['prihlaseny'] == '1' && $_SESSION['admin'] == '1'): ?>

        <div class="row">
            <div class="col my-2 ">

                <div class="card margin" style="width: 30rem; margin: 1rem" >
                    <?php
                    if(isset($_POST['id_to_update'])) {
                        foreach ($app->getVehicleType() as $auto) { ?>
                    <H3 class="nadpisH1" >Upraviť daný typ vozidiel?</H3>

                    <form method="post" enctype="multipart/form-data" onsubmit="return vehicle_validationUpdate(this);">

                                <div class="col my-2 ">

                                    <input type="file" name="fileUpravovane" class="margin" accept="pictures/<?=$auto->getImage() ?>"><br>
                                    <input type="text" name="nazovUpravovane" class="margin" placeholder="Zadaj nazov" value="<?=$auto->getName() ?>" >   <!--value=--><?php /*if (isset($_POST['id_to_update'])) {echo } value=""*/?>
                                        <br>
                                        <textarea name="popisUpravovane" rows="4" cols="50" placeholder="Zadaj popis"  ><?=$auto->getDescription() ?></textarea>

                                        <!--                            <input type="text" name="popis" placeholder="Zadaj popis" class="margin"><br>
    -->                            <!--<input type="submit" value="Upravit" class="margin" name="finalUpdate">-->
                                        <input type="hidden" name="id_for_final_update" value="<?= $auto->getId()?>">
                                        <input type="submit" name="finalUpdate" value="Upraviť" class="btn btn-outline-success" onclick="return confirm('Naozaj chcete upraviť túto kategóriu vozidiel?');">
                                        <!--                                    <input type="submit" name="zruzit" value="Zrušiť" class="btn btn-outline-danger" onclick="location.href='index.php">
                                                                         <button type="submit" class="btn btn-outline-success" name="edit_potvrdit" onclick="return confirm('Naozaj chcete upravit toto auto?');">Upraviť</button>
                                        -->
                                        <button type="button" class="btn btn-outline-danger" name="edit_zrus" onclick="location.href='index.php'">Zrušiť</button>
                                </div>
                    </form>

                        <?php }} else { ?>
                        <H3 class="nadpisH1" >Vytvorit další typ vozidiel?</H3>

                        <form method="post" enctype="multipart/form-data" onsubmit="return vehicle_validation(this);">
                            <div class="col my-2 ">
                                <input type="file" name="file" class="margin"><br>
                                <input type="text" name="nazov" class="margin" placeholder="Zadaj nazov">   <!--value=--><?php /*if (isset($_POST['id_to_update'])) {echo } value=""*/?>
                                <br>
                                <textarea name="popis" rows="4" cols="50" placeholder="Zadaj popis" ></textarea>
                                <!--                            <input type="text" name="popis" placeholder="Zadaj popis" class="margin"><br>
                                -->                            <input type="submit" value="Odošli súbor" class="margin">
                                <!--                            <button type="button" class="btn btn-outline-success">Vytvorit</button>
                                -->
                            </div>
                        </form>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php endif;?>

        <div class="d-flex justify-content-lg-start flex-wrap ">
            <?php foreach ($app->getAllVehicleTypes() as $vehicle) { ?>
                <div class="card" style="width: 18rem; margin: 1rem">
                    <img src="pictures/<?=$vehicle->getImage()?>" class="card-img-top" height="160" alt="cannot load an image">
                    <div class="card-body text-end">
                        <div class="text-start mt-2 ">
                            <strong class="margin"><?= $vehicle->getName() ?></strong><br>
                            <p class="margin"><?= $vehicle->getDescription() ?></p>
                        </div>
                    </div>
                    <input type="hidden" name="id_zobrazit" value="<?= $vehicle->getId()?>">
                    <input type="submit" name="zobrazit" value="Zobraziť autá" class="btn btn-outline-success" onclick="location.href='osobneAuta.php'">

<!--                    <button type="button" class="btn btn-outline-success" onclick="location.href='osobneAuta.php'">Zobraziť autá</button>
-->                    <?php if(isset($_SESSION['prihlaseny']) && $_SESSION['prihlaseny'] == '1' && $_SESSION['admin'] == '1'): ?>

                    <form method="post">
                        <input type="hidden" name="id_to_delete" value="<?= $vehicle->getId()?>">
                        <input type="submit" name="deleteVehicle" value="Vymazať" class="btn btn-outline-danger" onclick="return confirm('Naozaj si prajete odstrániť túto kategóriu vozidiel?');">
<!--                        <button type="submit" name="delete" class="btn btn-outline-danger">Vymazať</button>-->
                        <input type="hidden" name="id_to_update" value="<?= $vehicle->getId()?>">
                        <input type="submit" name="update" value="Upraviť" class="btn btn-outline-warning">      <!--onclick="location.href='update.php'"-->
                    </form>
                    <?php endif;?>
                </div>
            <?php } ?>
        </div>
    </div>

<?php
include 'footer.php';
?>
