<?php
include 'header.php';
include 'database.php';
$_SESSION['success'] = 0;
?>

    <?php
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
            echo "<script type='text/javascript'>alert('Vodičský preukaz už existuje. Zadajte nový vodičský.');</script>";
        }
        if($password != $confirmPassword){
            echo "<script type='text/javascript'>alert('Heslá sa nezhodujú, skúste znovu');</script>";

            //$error[] = 'Heslá sa nezhodujú!';
        }
        if($result1 == 0 && $result2 == 0 && $result3 == 0 && ($password == $confirmPassword)){
            /*$db->query("INSERT INTO person (admin,meno,priezvisko,login,heslo,mail)
                              VALUES (0,'$meno','$priezvisko','$login','$heslo','$mail')")*/
            $db->query("INSERT INTO person (firstname, lastname, driving_licence, email, password, isAdmin) VALUES('$firstname','$lastname','$driving_licence','$email','$password',0)")
            or die ("Užívateľa sa nepodarilo registrovať.");
            $_SESSION['success'] = 1;
        }
    }
    mysqli_close($db);
    ?>
    <?php if($_SESSION['success'] == 0): ?>
        <form action="reg2.php" class="form-horizontal" method="post" onsubmit="return reg_kontrola(this);">
            <div class="form-group">
                <fieldset>
                    <h4 class="nadpisH1 podnadpis">Osobné údaje</h4>
                    <div class="col-xs-offset-1">
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-10 popis"><span>*</span> Meno:</label>
                            <div class="col-sm-6 col-xs-11">
                                <input type="text" class="form-control" id="firstname" name="firstname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-10 popis"><span>*</span> Priezvisko:</label>
                            <div class="col-sm-6 col-xs-11">
                                <input type="text" class="form-control" id="lastname" name="lastname">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-10 popis"><span>*</span> Email:</label>
                            <div class="col-sm-6 col-xs-11">
                                <input type="text" class="form-control" id="email" name="email" onkeyup="checkEmail()"><span id="email"></span>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>

            <div class="form-group">
                <fieldset>
                    <h4 class="nadpisH1 podnadpis">Prihlasovacie údaje</h4>
                    <div class="col-xs-offset-1">
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-10 popis"><span>*</span> Vodicak:</label>
                            <div class="col-sm-6 col-xs-11">
                                <input type="text" id='driving_licence' class="form-control" name="driving_licence" onkeyup="checkDrivingLicence()"><span id="driving_licence"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-10 popis" for="password"><span>*</span> Heslo:</label>
                            <div class="col-sm-6 col-xs-11">
                                <input type="password" class="form-control" id="password" name="password" onkeyup="lengthOfPassword(this.value)"><span id="password"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-3 col-xs-10 popis" for="confirmPassword"><span>*</span> Heslo:</label>
                            <div class="col-sm-6 col-xs-11">
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"><span id="confirmPassword"></span>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="col-xs-offset-1">
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9">
                            <p><span class="popis">* povinné údaje</span></p>
                            <button type="submit" class="btn btn-default" name="reg_potvrd">Potvrdiť</button>
                            <button type="button" class="btn btn-default" name="reg_zrus" onclick="location.href='index.php'">Zrušiť</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    <?php else:?>
        <p class="reg_uspesna">Registrácia prebehla úspešne <a href="login.php">PRIHLÁSIŤ SA</a></p>
    <?php endif;?>

<?php
//include 'footer.php';
?>
