<?php
include 'header.php';
include 'database.php';
$_SESSION['success'] = 0;

 //if(isset($_POST['submit'])) {
if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['driving_licence']) && isset($_POST['email']) && isset($_POST['heslo'])){
     $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
     $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
     $driving_licence = mysqli_real_escape_string($db, $_POST['driving_licence']);
     //$login = mysqli_real_escape_string($db, $_POST['login']); //ten tu mozno ani nemusi byt
     $email = mysqli_real_escape_string($db, $_POST['email']);
     $password = md5($_POST['password']);
     $confirmPassword = md5($_POST['confirmPassword']);
     //$user_type = $_POST['user_type'];

     $select = " SELECT * FROM person WHERE email = '$email' && password = '$password' ";

     $result = mysqli_query($db, $select);

     if(mysqli_num_rows($result) > 0){

         $error[] = 'Používateľ už existuje!';

     }else{
         if($password != $confirmPassword){
             $error[] = 'Heslá sa nezhodujú!';
         }else{
             //$insert = "INSERT INTO person(firstname, lastname, driving_licence, login, email, password, user_type) VALUES('$firstname','$lastname','$driving_licence' ,'$login','$email','$password','$user_type')";
             //mysqli_query($db, $insert);
             //header('location:login.php');
             $db->query("INSERT INTO person(firstname, lastname, driving_licence, email, password, isAdmin) VALUES('$firstname','$lastname','$driving_licence','$email','$password',0)")
             or die ("Užívateľa sa nepodarilo registrovať.");
             $_SESSION['success'] = 1;

         }
     }
     mysqli_close($db);
}
?>

<!DOCTYPE html>
<html lang="en">
<?php if($_SESSION['success'] == 0): ?>

<section class="h-100 bg-dark">
    <?php
    if(isset($error)){
        foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
        }
    }
    ?>

    <div class="container py-5 h-100">
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
                                <h3 class="mb-5 text-uppercase">Registrácia</h3>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="form3Example1m" class="form-control form-control-lg" placeholder="Meno" />
                                            <!--<label class="form-label" for="form3Example1m">Meno</label> -->
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="form3Example1n" class="form-control form-control-lg" placeholder="Priezvisko" />
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="text" id="form3Example1m" class="form-control form-control-lg" placeholder="Vodičský preukaz" />
                                        </div>
                                    </div>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="text" id="form3Example8" class="form-control form-control-lg" placeholder="Emailová adresa" />
                                </div>

                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="password" name="password" class="form-control form-control-lg" placeholder="Heslo" />
                                        </div>
                                    </div>

                                    <div class="col-md-6 mb-4">
                                        <div class="form-outline">
                                            <input type="password" name="confirmPassword" class="form-control form-control-lg" placeholder="Potvrdenie hesla" />
                                        </div>
                                    </div>
                                </div>

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

                                <div class="d-flex justify-content-end pt-3">
                                    <button type="button" name="submit" class="btn btn-warning btn-lg ms-2"><a name="submit" class="nav-link" href="login.php">Zaregistrovať sa</a></button>

                                </div>
                                <p>Už máte vytvorený účet? <a href="login.php">Prihlásiť sa</a></p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php else:?>
    <p class="reg_uspesna">Registrácia prebehla úspešne <a href="login.php">PRIHLÁSIŤ SA</a></p>
<?php endif;?>
</html>
<?php
include 'footer.php';
?>