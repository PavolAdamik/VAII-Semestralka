<?php
include 'header.php';
if((isset($_SESSION['email_chyba']) && $_SESSION['email_chyba']=='1') || (isset($_SESSION['heslo_chyba']) && $_SESSION['heslo_chyba']=='1')){
    echo "<script type='text/javascript'>alert('Nesprávny email alebo heslo');</script>";
    $_SESSION['email_chyba']='0';
    $_SESSION['heslo_chyba']='0';
    //print_r("Ty jeden..zapni si ten javascript");
}
?>

    <div class="container-fluid">
        <form action="checkLogin.php" method="post">
            <div class="row main-content bg-success text-center">
                <div class="col-md-4 text-center company__info">
                    <a class="navbar-brand" href="index.php"><img src="pictures/PP_logo.jpg" width="50" height="50" alt=""></a>
                    <h4 class="company_title">Palova Požičovňa</h4>
                </div>
                <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                    <div class="container-fluid">
                        <div class="nadpisH1">
                            <h2>Prihlásenie do Vášho účtu</h2>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="row">
                                    <input type="email" name="email" id="email" class="form__input" placeholder="Email">
                                </div>
                                <div class="row">
                                    <!-- <span class="fa fa-lock"></span> -->
                                    <input type="password" name="password" id="password" class="form__input" placeholder="Heslo">
                                </div>
                                <div class="row">
                                    <input type="checkbox" name="remember_me" id="remember_me" class="">
                                    <label for="remember_me">Zapamätať si ma!</label>
                                </div>
                                <div class="align-center">
                                    <input type="submit" name="submit" value="Prihlásiť sa" class="login_btn">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <p>Ešte nemáte účet? <a href="registration.php">Registrovať sa</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php
include 'footer.php';
?>