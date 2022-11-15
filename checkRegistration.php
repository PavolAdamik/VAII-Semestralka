<?php
/*session_start();
$_SESSION['ERROR_REGISTRATION'] = '1';
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['driving_licence']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmPassword'])){

    $pom1 = 0;
    $pom2 = 0;
    $pom3 = 0;
    $pom4 = 0;
    $pom5 = 0;
    $pom6 = 0;

    if ($_POST['firstname'] == '') {
        $pom1 = 1;
        //print_r("Musíš zadať meno!");
    }

    if ($_POST['lastname'] == '') {
        $pom2 = 1;
        //print_r("Musíš zadať priezvisko!");
    }
    if ($_POST['driving_licence'] == '') {
        $pom3 = 1;
        //print_r("Musíš zadať vodicsky preukaz!");
    }

    if (!preg_match("/^[A-Z]\w{7}$/",$_POST['driving_licence'])) {
        $pom3 = 1;
        //print_r("Musíš zadať spravny Vodicsky preukaz!");

    }
    if ($_POST['email'] == '') {
        $pom4 = 1;
        //print_r("Musíš zadať email!");
    }

    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $pom4 = 1;
        //print_r("Musíš zadať email v spravnom formate!");
    }
    if ($_POST['password'] == '') {
        $pom5 = 1;
        //print_r("Musíš zadať ine heslo!");
    }
    if (strlen($_POST['password']) < 9) {
        $pom5 = 1;
        //print_r("Musíš zadať dlhsie heslo, aspon 9 znakov!");
    }

    if ($_POST['confirmPassword'] == '') {
        $pom6 = 1;
        //print_r("Musíš zadať heslo pre potvrdenie!");
    }

    if($pom1 == 0 && $pom2 == 0 && $pom3 == 0 && $pom4 == 0 && $pom5 == 0 && $pom6 == 0) {
        $_SESSION['ERROR_REGISTRATION'] = '0';
        header("location: login.php");
    } else {
        header("location: registration.php");

    }

}*/
