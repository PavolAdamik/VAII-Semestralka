<?php
include 'header.php';
require "App.php";

$app = new App();
?>

<div>
    <h1 class="nadpisH1">Otázky k prenájmu:</h1>
    <img src="https://deltarentcar.sk/wp-content/uploads/2022/03/auta_uvod.png" alt="..." class="responsive">
</div>

<div class="kontainer">
    <div>
        <script>
            function toggle(obj) {
                obj=document.getElementById(obj);
                if (obj.style.display === "block") obj.style.display = "none";
                else obj.style.display = "block";
            }
        </script>
        <a href="javascript: void(0);" style="text-decoration: none" onclick="toggle('q1') ">
            <h3 class="farba not-underline ital">Akým spôsobom si môžete prenajať vozidlo ?</h3>
        </a>
        <div id="q1" style="display: none;">
            <p>Vozidlo si môžu prenajať len zaregistrovaný zákazníci. <br>Zaregistrovať sa môžete vpravo hore pri nápise „Zaregistrujte sa / Prihláste sa". <br>Po úspešnej registrácii si môžete na domovskej stránke nájsť sekciu s druhmy ponúkaných vozidiel a môžete si vybrať konkrétne vozidlo. <br> K výberu vozidiel sa dosanete taktiež prostredníctvom navigačného baru.</p>
        </div>
    </div>

    <div class="odsek">
        <a href="#" style="text-decoration: none" onclick="toggle('q2') ">
            <h3 class="farba ital">Kto si môže prenajať vozidlo ?</h3>
        </a>
        <div id="q2" style="display: none;">
            <p>Vozidlo si môže prenajať každá osoba, ktorá má: <br>platný vodičský preukaz <br>minimálne 20 rokov <br>vodičský preukaz aspoň 4 roky<br>dostatok finančných prostriedkov na zálohu</p>
        </div>
    </div>

    <div class="odsek">
        <a href="#" style="text-decoration: none" onclick="toggle('q3') ">
            <h3 class="farba ital" >Na ako dlho si môže prenajať vozidlo ?</h3>
        </a>
        <div id="q3" style="display: none;">
            <p>Poskytujeme krátkodobý aj dlhodobý prenájom. <br>Ak si zvolíte krátkodobý prenájom tak si môžete prenajať vozidlo od jedného dňa čo znamená minimálne na 24 hodín až po dobu 30 dní. <br>Ak dlhodobý tak ten je viac, ako jeden mesiac.</p>
        </div>
    </div>

    <div class="odsek">
        <a href="#" style="text-decoration: none" onclick="toggle('q4') ">
            <h3 class="farba ital" >Môžem ísť mimo krajinu ?</h3>
        </a>
        <div id="q4" style="display: none;">
            <p>Po dohode s prenajímateľom môžete ísť kam checte.</p>
        </div>
    </div>

    <div class="odsek">
        <a href="#" style="text-decoration: none" onclick="toggle('q5') ">
            <h3 class="farba ital" >GDPR</h3>
        </a>
        <div id="q5" style="display: none;">
            <p>Vami poskytnuté údaje, ktoré budete musieť vyplniť pri prenajatí vozidla budú dôverihodne strážené a budeme sa snažiť aby nepadli do zlých rúk. <br>Tak ako sa o nás hovorí, je na nás spoľah</p>
        </div>
    </div>



</div>



<?php
include 'footer.php';
?>