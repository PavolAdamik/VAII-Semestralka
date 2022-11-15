<?php
include 'header.php';
include 'database.php';
$_SESSION['success'] = 0;
?>

<?php
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['driving_licence']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmPassword'])){
    /*$pom1 = 0;
    $pom2 = 0;
    $pom3 = 0;
    $pom4 = 0;
    $pom5 = 0;
    $pom6 = 0;

    if($_POST['firstname'] == '') {
        $pom1 = 1;
        print_r("Musíš zadať meno!");
    }*/
    //if(isset($_SESSION['ERROR_REGISTRATION']) && $_SESSION['ERROR_REGISTRATION'] == '0' ) {

        $pom1 = 0;
        /*$pom2 = 0;
        $pom3 = 0;
        $pom4 = 0;
        $pom5 = 0;
        $pom6 = 0;*/

        if ($_POST['firstname'] == '' ||
            $_POST['lastname'] == '' ||
            $_POST['driving_licence'] == '' ||
            !preg_match("/^[A-Z]\w{7}$/",$_POST['driving_licence']) ||
            $_POST['email'] == '' || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ||
            $_POST['password'] == '' ||
            strlen($_POST['password']) < 9 ||
            $_POST['confirmPassword'] == '' ) {
            $pom1 = 1;
            //print_r("Musíš zadať meno!");
        }

       /* if ($_POST['lastname'] == '') {
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
        }*/

        //---------------

        $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
        $driving_licence = mysqli_real_escape_string($db, $_POST['driving_licence']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $password = md5($_POST['password']);
        $confirmPassword = md5($_POST['confirmPassword']);

        $select1 = " SELECT * FROM person WHERE password = '$password' ";
        $res1 = mysqli_query($db, $select1);
        $result1 = mysqli_num_rows($res1);

        $select2 = " SELECT * FROM person WHERE email = '$email' ";
        $res2 = mysqli_query($db, $select2);
        $result2 = mysqli_num_rows($res2);

        $select3 = " SELECT * FROM person WHERE driving_licence = '$driving_licence' ";
        $res3 = mysqli_query($db, $select3);
        $result3 = mysqli_num_rows($res3);

        //if($password)

        if($result1 > 0) {
            echo "<script type='text/javascript'>alert('Heslo už existuje. Zadajte nové/iné heslo.');</script>";
            print_r('Heslo už existuje. Zadajte nové/iné heslo.');
        }
        if($result2 > 0){
            echo "<script type='text/javascript'>alert('Email už existuje. Zadajte nové email.');</script>";
            print_r('Email už existuje. Zadajte nové email.');
        }
        if($result3 > 0) {
            echo "<script type='text/javascript'>alert('Vodičský preukaz už existuje. Zadajte nový vodičský.');</script>";
            print_r('Vodičský preukaz už existuje. Zadajte nový vodičský.');
        }
        if($password != $confirmPassword){
            echo "<script type='text/javascript'>alert('Heslá sa nezhodujú, skúste znovu');</script>";
            print_r('Heslá sa nezhodujú, skúste znovu');
        }
        if($result1 == 0 && $result2 == 0 && $result3 == 0 && ($password == $confirmPassword) && $pom1 == 0 ){ //&& $pom2 == 0 && $pom3 == 0 && $pom4 == 0 && $pom5 == 0 && $pom6 == 0
            $db->query("INSERT INTO person (firstname, lastname, driving_licence, email, password, isAdmin) VALUES('$firstname','$lastname','$driving_licence','$email','$password',0)")
            or die ("Užívateľa sa nepodarilo registrovať.");
            $_SESSION['success'] = 1;
        } else {

    //} else if ($_SESSION['ERROR_REGISTRATION'] == '1') {
        print_r("Chyba z pohladu servera");
        //$_SESSION['ERROR_REGISTRATION'] = '0';
    }
}
mysqli_close($db);
?>
<?php if($_SESSION['success'] == 0): ?>
    <div class="container-fluid">
        <form action="registration.php" method="post" onsubmit="return reg_kontrola(this);">
            <div class="row main-content bg-success text-center">
                <div class="col-md-4 text-center company__info">
                    <a class="navbar-brand" href="index.php"><img src="pictures/PP_logo.jpg" width="50" height="50" alt=""></a>
                    <h4 class="company_title">Palova Požičovňa</h4>
                </div>
                <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                    <div class="container-fluid">
                        <div class="nadpisH1">
                            <h2>Registrácia do Vášho účtu</h2>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="firstname" name="firstname" class="form__input" placeholder="Meno">
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="lastname" name="lastname" class="form__input" placeholder="Priezvisko">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!--ono to je tak asi spravene ze ked je zle tak bude podtym tabulecka.. skoda    -->
                                    <input type="email" name="email" id="email" class="form__input" placeholder="Email" onkeyup="checkEmail()">
<!--                                    <span id="em"></span>
-->                                </div>
                                <div class="row">
                                    <input type="text" name="driving_licence" id="driving_licence" class="form__input" placeholder="Vodičský preukaz" onkeyup="checkDrivingLicence()">
<!--                                    <span id="driving_licence"></span>
-->                                </div>
                                <div class="row">
                                    <input type="password" name="password" id="password" class="form__input" placeholder="Heslo" onkeyup="lengthOfPassword(this.value)">
<!--                                    <span id="password"></span>
-->                                </div>
                                <div class="row">
                                    <input type="password" name="confirmPassword" id="confpass" class="form__input" placeholder="Potvrdenie hesla">
                                </div>
                                <div class="align-center">
                                    <input type="submit" name="submit" value="Registrovať sa" class="login_btn">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <p>Už máte vytvorený účet? <a href="login.php">Prihláste sa</a></p>
                            <p>Nezabudnite vyplniť všetky údaje</p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php else:?>
<div style="text-align: center" class="margin">
    <p>Registrácia prebehla úspešne <a href="login.php">PRIHLÁSIŤ SA</a></p>
</div>
<?php endif;?>

<?php
include 'footer.php';
?>
