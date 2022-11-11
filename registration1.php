<?php
include 'header.php';
include 'database.php';
$_SESSION['success'] = 0;
?>


<div>


<?php
 //if(isset($_POST['submit'])) {
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['driving_licence']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmPassword'])){
     $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
     $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
     $driving_licence = mysqli_real_escape_string($db, $_POST['driving_licence']);
     //$login = mysqli_real_escape_string($db, $_POST['login']); //ten tu mozno ani nemusi byt
     $email = mysqli_real_escape_string($db, $_POST['email']);
     $password = md5($_POST['password']);
     $confirmPassword = md5($_POST['confirmPassword']);
     //$user_type = $_POST['user_type'];


     $select1 = " SELECT * FROM person WHERE password = '$password' ";
     $res1 = mysqli_query($db, $select1);
    $result1 = mysqli_num_rows($res1);

    $select2 = " SELECT * FROM person WHERE email = '$email' ";
    $res2 = mysqli_query($db, $select2);
    $result2 = mysqli_num_rows($res2);

    $select3 = " SELECT * FROM person WHERE driving_licence = '$driving_licence' ";
    $res3 = mysqli_query($db, $select3);
    $result3 = mysqli_num_rows($res3);

     if($result1 > 0) {
         echo "<script type='text/javascript'>alert('Heslo už existuje. Zadajte nové/iné heslo.');</script>";
         //$error[] = 'Používateľ už existuje!';
     }
     if($result2 > 0){
         echo "<script type='text/javascript'>alert('Email už existuje. Zadajte nové email.');</script>";
     }
     if($result3 > 0) {
         echo "<script type='text/javascript'>alert('Vodičský preukaz už existuje. Zadajte nové vodičský.');</script>";
     }

    if($password != $confirmPassword){
         echo "<script type='text/javascript'>alert('Heslá sa nezhodujú, skúste znovu');</script>";

         //$error[] = 'Heslá sa nezhodujú!';
     } else if($result1 == 0 && $result2 == 0 && $result3 == 0) {
         $insert = "INSERT INTO person(firstname, lastname, driving_licence, email, password, isAdmin) VALUES('$firstname','$lastname','$driving_licence','$email','$password',0)";
         $_SESSION['success'] = 1;
         mysqli_query($db, $insert);
     } else {
         $_SESSION['success'] = 0;
     }
         /*else{
             //header('location:index.php');

             //include 'login.php';
             header('location:index.php');

             //$db->query("INSERT INTO person(firstname, lastname, driving_licence, email, password, isAdmin) VALUES('$firstname','$lastname','$driving_licence','$email','$password',0)")
             //or die ("Užívateľa sa nepodarilo registrovať.");
             $_SESSION['success'] = 1;
         }*/

    /*
    $vysledok1 = mysqli_query($db, "SELECT * FROM person WHERE email = '$email'");
    $pocet1 = mysqli_num_rows($vysledok1);

    $vysledok2 = mysqli_query($db, "SELECT * FROM person WHERE password = '$password'");
    $pocet2 = mysqli_num_rows($vysledok2);

    if($pocet1 > 0){
        echo "<script type='text/javascript'>alert('Daný užívateľ už existuje. Zvolte si iný login.');</script>";
    }
    if($pocet2 > 0){
        echo "<script type='text/javascript'>alert('Mail už existuje. Zvolte si iný mail.');</script>";
    }
    if($pocet1 == 0 && $pocet2 == 0){
        $db->query("INSERT INTO person(firstname, lastname, driving_licence, email, password, isAdmin) VALUES('$firstname','$lastname','$driving_licence','$email','$password',0)")

        or die ("Užívateľa sa nepodarilo registrovať.");
        $_SESSION['uspech'] = 1;
    }
    */
}
mysqli_close($db);
?>

<?php if($_SESSION['success'] == 0): ?>

<form action="registration1.php" class="form-horizontal bg-dark bg-success" method="post" onsubmit="return reg_kontrola(this);>
      <div class=" container">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">
                            <div class="col-xl-6 d-none d-xl-block">
                                <img src=
                                     "https://as1.ftcdn.net/v2/jpg/00/54/90/10/1000_F_54901062_6Fo991H4PykSDkkeCr7GUnCp1PqbvmRs.jpg"
                                     alt="Sample photo" class="img-fluid"
                                     style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem; border-bottom-right-radius: .25rem" />
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">
                                    <fieldset>
                                    <h3 class="mb-5 text-uppercase">Registrácia</h3>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="firstname" name="firstname" class="form__input" placeholder="Meno" />
                                                <!--<label class="form-label" for="form3Example1m">Meno</label> -->
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="lastname" name="lastname" class="form__input" placeholder="Priezvisko" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline" title="Použite formát: X0000000">
                                                <input type="text" id="driving_licence" name="driving_licence" onkeyup="checkDrivingLicence()" class="form__input" placeholder="Vodičský preukaz" />
                                                <span id="driving_licence"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <input type="text" id="email" name="email" class="form__input" onkeyup="checkEmail()" placeholder="Emailová adresa" />
                                        <span id="email"></span>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
<!--                                                <input type="password" id="password" name="password" class="form__input" placeholder="Heslo" />
-->                                            <input type="password" class="form__input" id="pwd" name="password" placeholder="Heslo" onkeyup="lengthOfPassword(this.value)">
                                                <span id="password"></span>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mb-4">
                                            <div class="form-outline">
                                                <input type="password" id="confirmPassword" name="confirmPassword" class="form__input" placeholder="Potvrdenie hesla" />
                                                <span id="confirmPassword"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <!--
                                    this.value, ['password'].values()                                                       onkeyup="samePassword(this)"
                                    <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                                        <h6 class="mb-0 me-4">Type: </h6>

                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="user"
                                                   value="user" />
                                            <label class="form-check-label" for="user">Použivateľ</label>
                                        </div>

                                        <div class="form-check form-check-inline mb-0 me-4">
                                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="admin"
                                                   value="admin" />
                                            <label class="form-check-label" for="admin">Admin</label>
                                        </div>

                                    </div>
                                    -->

                                    <!--<div class="d-flex justify-content-end pt-3">
                                        <button type="button" name="submit" class="btn btn-warning btn-lg ms-2"><a name="submit" class="nav-link" href="login.php">Zaregistrovať sa</a></button>

                                    </div>-->
                                    <div class="align-center">
                                        <input type="submit" name="reg_potvrd" value="Registrovať sa" class="login_btn">
                                    </div>
                                    <p>Už máte vytvorený účet? <a href="login.php">Prihlásiť sa</a></p>
                                    </fieldset>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
</form>
<?php else:?>
    <p class="reg_uspesna">Registrácia prebehla úspešne <a href="login.php">PRIHLÁSIŤ SA</a></p>
<?php endif;?>
</div>

<?php
include 'footer.php';
?>