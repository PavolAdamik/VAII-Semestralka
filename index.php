<?php
//session_start();
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
    <div>
        <!--<h1 class="nadpisH1">Vitajte!</h1> -->
        <?php if(isset($_SESSION['prihlaseny']) && $_SESSION['prihlaseny'] == '1' && isset($_SESSION['celemeno'])): ?>
            <h1 class="nadpisH1">Vitajte <?php echo $_SESSION['celemeno']?> !</h1>
            <!--<p id="prihlasenie" class="pull-right">Vitajte: <?php echo $_SESSION['celemeno']?> !</p> -->
        <?php endif; ?>
        <img src="https://deltarentcar.sk/wp-content/uploads/2022/03/auta_uvod.png" alt="..." class="responsive">
    </div>


    <div>
        <p class="popisObchodu">
            Hľadáte auto na krátku alebo dlhú dobu ? Neváhajte a požičajte si jedno (dve :D) v našej požičovni PP čo výrazne a jasne charakterizuje Palovu Požičovňu. V ponuke máme ojazdené autá každeho druhu, cez osobné, šporotvé, dodávky a dokonca aj autobsy. Samozrejme máme aj nové autá ale Boh ťa chráň ak ho nabúraš. Môžete si vybrať z akejkoľvek značky (okrem tých drahých, ako je Lamborginy a Jaguar).
        </p >
    </div>

    <div class="kontainer">
        <!--    (Mám spravenú len kategóriu osobné autá tak ju hodím všade)-->
        <h3 class="nadpisH1">Naša ponuka:</h3>
        <div class="row row-cols-1 row-cols-md-4 g-4">
            <div class="col ">
                <div class="card ">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRE7V0VNY_lm2a-itih84y6nLwVz0yCBEuVFgfHwtJ572Z0sB82qgupNV6LWSBtqh4PGeI&usqp=CAU" class="card-img-top" alt="...">
                    <div class="card-body ">
                        <h5 class="card-title">Osobné autá</h5>
                        <p class="card-text">Môžete si vybrať zo značiek: Škoda, Volkswagen, Dacia, Suzuky. Ceny sa pohybujú od 40-60&#8364; &#x2f; deň. </p>

                        <button type="button" class="btn btn-outline-success" onclick="location.href='osobneAuta.php'">Zobraziť autá</button>

                    </div>
                </div>
            </div>
            <div class="col ">
                <div class="card ">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTC7PZYMH-lUSES8FVdg2bxFRD5xZ85ElevVw&usqp=CAU" class="card-img-top" alt="...">
                    <div class="card-body ">
                        <h5 class="card-title">Dodávky</h5>
                        <p class="card-text">Môžete si vybrať zo značiek: Citroen, Volkswagen, Mercedes. Ceny sa pohybujú od 30 - 50&#8364; / deň.</p>
                        <button type="button" class="btn btn-outline-success disabled">Zobraziť autá</button>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card ">
                    <img src="data:image/jpeg;base64,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" class="card-img-top mh" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Autobusy</h5>
                        <p class="card-text">Môžete si vybrať zo značiek: Iveco, Irisbus, MAN, tatra. Ceny sa pohybujú od 50 - 70&#8364; / deň.</p>
                        <button type="button" class="btn btn-outline-success disabled">Zobraziť autá</button>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card ">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSjgyc8fZPMs6f_HcSTocfOCs3GNt6ZQYiyyg&usqp=CAU" class="card-img-top otoc" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Športové autá</h5>
                        <p class="card-text">Môžete si vybrať zo značiek: Nissan a Mustang. Ceny sa pohybujú od 100 - 150&#8364; / deň.</p>
                        <button type="button" class="btn btn-outline-success disabled">Zobraziť autá</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</html>

<?php
include 'footer.php';
?>
