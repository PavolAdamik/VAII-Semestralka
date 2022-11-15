<?php
include 'header.php';
if(!isset($_POST['edituj_profil'])){
    $_POST['edituj_profil'] = 0;
} /*else {
    $_POST['edituj_profil'] = 1;
}*/

if (isset($_POST['firstname']) && isset($_POST['lastname'])){ // ak mam menoo tak som prihlaseny :D.. zistenie roka 2k22
    include 'database.php';
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    //$driving_licence = $_POST['driving_licence'];
    $email = $_SESSION['email'];
    //$password = $_POST['password'];

    $_SESSION['fullname'] = $firstname." ".$lastname;

    mysqli_query($db, "update person set firstname='$firstname',lastname='$lastname' WHERE email = '$email'");
    mysqli_close($db);
}

include 'database.php';
/*if (isset($_POST['id_profil_to_edit']) {
    $id = $_POST['id_profil_to_edit'];
}*/
$id = $_SESSION['id'];
$select = mysqli_query($db,"select id,firstname,lastname,driving_licence,email,password FROM person WHERE id ='$id'");
$row = mysqli_fetch_row($select);
mysqli_close($db);
?>

<div class="pozadie">
    <h1  id="profil" class="nadpisH1">Môj profil!</h1>
    <?php if ($_POST['edituj_profil']=='1'): ?>
<!--    --><?php /*if(isset($_POST['id_profil_to_edit'])):*/?>
        <div class="container-fluid">
            <form action="profile.php" method="post" onsubmit="return reg_kontrola(this);">
                <div class="row main-content bg-success text-center">
                    <div class="col-md-4 text-center company__info">
                        <a class="navbar-brand" href="index.php"><img src="pictures/PP_logo.jpg" width="50" height="50" alt=""></a>
                        <h4 class="company_title">Palova Požičovňa</h4>
                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                        <div class="container-fluid">
                            <div class="nadpisH1">
                                <h2>Informácie o Vás</h2>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <fieldset>
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="text" id="firstname" name="firstname" class="form__input" placeholder="Meno" value="<?php echo $row[1]; ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <input type="text" id="lastname" name="lastname" class="form__input" placeholder="Priezvisko" value="<?php echo $row[2]; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <input type="email" name="email" id="email" class="form__input" placeholder="Email" onkeyup="checkEmail()" value="<?php echo $row[4]; ?>">
                                        </div>
                                        <div class="row">
                                            <input type="text" name="driving_licence" id="driving_licence" class="form__input" placeholder="Vodičský preukaz" onkeyup="checkDrivingLicence()" value="<?php echo $row[3]; ?>">
                                       </div>
                                    </fieldset>
                                    <div class="align-center">
                                        <input type="submit" name="submit" value="Potvrdiť" class="login_btn" onclick="return confirm('Určite si prajete zmeniť profil?');">
                                        <input type="submit" name="submit" value="Zrušiť" class="login_btn" onclick="location.href='profile.php'">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <?php else: ?>
        <div class="container-fluid">
            <form action="profile.php" method="post">
                <div class="row main-content bg-success text-center">
                    <div class="col-md-4 text-center company__info">
                        <a class="navbar-brand" href="index.php"><img src="pictures/PP_logo.jpg" width="50" height="50" alt=""></a>
                        <h4 class="company_title">Palova Požičovňa</h4>
                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                        <div class="container-fluid">
                            <div class="nadpisH1">
                                <h2>Informácie o Vás</h2>
                            </div>

                                <div class="row">
                                    <div class="form-group">
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <input disabled="disabled" type="text" id="firstname" name="firstname" class="form__input" placeholder="Meno" value="<?php echo $row[1]; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <input disabled="disabled" type="text" id="lastname" name="lastname" class="form__input" placeholder="Priezvisko" value="<?php echo $row[2]; ?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <input disabled="disabled" type="email" name="email" id="email" class="form__input" placeholder="Email" onkeyup="checkEmail()" value="<?php echo $row[4]; ?>">
                                            </div>
                                            <div class="row">
                                                <input disabled="disabled" type="text" name="driving_licence" id="driving_licence" class="form__input" placeholder="Vodičský preukaz" onkeyup="checkDrivingLicence()" value="<?php echo $row[3]; ?>">
                                            </div>
                                        </fieldset>

                                        <div class="align-center" >
                                            <input type="hidden" id="edituj_profil">
                                            <input id="zmen_profil" name="submit" value="Zmeniť profil" class="login_btn kurzor centrovat" onclick="redirect('edituj_profil','1','');">
                                        </div>

                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>


    <?php endif; ?>
</div>

<?php
include 'footer.php';
?>
