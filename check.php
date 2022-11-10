<?php
$q = $_REQUEST["q"];
if($q !== ""){
    if($q < 5){
        echo "slabé heslo";
    } else if($q > 4 && $q < 9){
        echo "stredne silné heslo";
    } else {
        echo "silné heslo";
    }
}