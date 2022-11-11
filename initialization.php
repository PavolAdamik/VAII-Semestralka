<?php
if(!isset($_POST['prihlaseny'])){
    $_SESSION['prihlaseny'] = '0';
}
if(!isset($_POST['admin'])){
    $_SESSION['admin'] = '0';
}

?>