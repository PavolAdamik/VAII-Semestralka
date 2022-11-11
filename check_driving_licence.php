<?php
$q = $_REQUEST["q"];
if($q !== ""){
    if($q == 8){
        echo "Správny tvar";
    } else {
        echo "Nesprávny tvar";
    }
}
