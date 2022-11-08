<?php
include 'header.php';
if(isset($_SESSION['email_chyba']) && $_SESSION['email_chyba']=='1'){
    echo "<script type='text/javascript'>alert('Nesprávny email alebo heslo');</script>";
    $_SESSION['email_chyba']='0';
}
/**
include 'database.php';
//session_start();
if(isset($_POST['submit'])){

    $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
    $driving_licence = mysqli_real_escape_string($db, $_POST['driving_licence']);
    //$login = mysqli_real_escape_string($db, $_POST['login']); //ten tu mozno ani nemusi byt
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = md5($_POST['password']);
    $confirmPassword = md5($_POST['confirmPassword']);
    $user_type = $_POST['user_type'];

    $select = " SELECT * FROM person WHERE email = '$email' && password = '$password' ";

    $result = mysqli_query($db, $select);

    /**
    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_array($result);

        if($row['user_type'] == 'admin'){

            $_SESSION['admin_name'] = $row['name'];
            header('location:admin_page.php'); //toto nechcem

        }elseif($row['user_type'] == 'user'){

            $_SESSION['user_name'] = $row['name'];
            header('location:user_page.php'); //ani toto

        }

    }else{
        $error[] = 'incorrect email or password!';
    }

    if(mysqli_num_rows($result) <= 0){
        $error[] = 'Nesprávny email alebo heslo!';
    } else {
        header('location: index.php');
    }

}
 * **/
?>

    <div class="container-fluid">
        <form action="checkLogin.php" method="post">
            <div class="row main-content bg-success text-center">
                <div class="col-md-4 text-center company__info">
                    <span class="company__logo"><h2><span class="fa fa-android"></span></h2></span>
                    <a class="navbar-brand" href="index.php"><img src="data:image/jpeg;base64,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" width="50" height="50" alt=""></a>

                    <h4 class="company_title">Palova Požičovňa</h4>
                </div>
                <div class="col-md-8 col-xs-12 col-sm-12 login_form ">
                    <div class="container-fluid">
                        <div class="nadpisH1">
                            <h2>Prihlásenie do Vášho účtu</h2>
                        </div>
                        <?php
                        if(isset($error)){
                            foreach($error as $error){
                                echo '<span class="error-msg">'.$error.'</span>';
                            }
                        }
                        ?>
                        <div class="row">
                            <form control="" class="form-group">
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
                            </form>
                        </div>
                        <div class="row">
                            <p>Ešte nemáte účet? <a href="registration.php">Registrovať sa</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </body>

<?php
include 'footer.php';
?>