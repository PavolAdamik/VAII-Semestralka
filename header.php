<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="rules.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="javaScript.js"></script>

    <title>Palova Pozicovna</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <div>
        <nav id="#home" class="navbar navbar-expand-lg navbar-dark bg-dark" >
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="pictures/PP_logo.jpg" width="50" height="50" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Domov</a>
                        </li>
                        <!--                    <li class="nav-item"> .. ten spravim potom -->
                        <!--                        <a class="nav-link" aria-current="page" href="#">Cenník</a>-->
                        <!--                    </li>-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Výber auta
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="cars.php">Osobné auto</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item disabled" href="#">Dodávka</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item disabled" href="#">Autobus</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item disabled" href="#">Športové auto</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="otazky.php">Otázky k prenájmu</a>
                        </li>
                        <?php if(isset($_SESSION['admin']) && isset($_SESSION['prihlaseny']) && $_SESSION['admin'] != '1' && $_SESSION['prihlaseny'] == '1'): ?>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="">Moje prenajaté</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="profile.php">Profil</a>
                            </li>
                        <?php elseif(isset($_SESSION['prihlaseny']) && $_SESSION['prihlaseny'] == '1' && $_SESSION['admin'] == '1'): ?>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="" >Prenajaté autá</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="userList.php">Používatelia</a>
                            </li><li class="nav-item">
                                <a class="nav-link" aria-current="page" href="" >Profil</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Kontakt</a>
                        </li>
                    </ul>
                    <!--                 <ul class="buttons">
                                         <input type="button" value="Login" />-->
<!--                        <input type="button" value="Register" />-->

                        <?php if(isset($_SESSION['prihlaseny']) && $_SESSION['prihlaseny'] == '1'): ?>
                                <button class="button button1" onclick="location.href='logout.php'">Odhlásiť sa</button>


                        <?php else: ?>
                        <div class="row">
                            <!--                           <input type="submit" value="Prihlásiť sa" src="login.php" class="btn button button1">
                                                       <input type="submit" value="Prihlásiť sa" src="login.php" class="button">
                           -->
                            <!--                            <input type="btn button button1" value="Registrovať sa" src="registration.php">
                                                        <input type="submit" name="submit" value="Prihlásiť sa" class="login_btn">
                            -->


                                <button class="button button1" onclick="location.href='login.php'">Prihlásiť sa</button>
                                <button class="button button1" onclick="location.href='registration.php'">Registrovať sa</button>

                        </div>
                        <?php endif; ?>

                    </div>
                </div>
        </nav>
