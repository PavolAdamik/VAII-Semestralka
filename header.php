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
    <title>Palova Pozicovna</title>
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <div>
        <nav id="#home" class="navbar navbar-expand-lg navbar-dark bg-dark" >
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php"><img src="data:image/jpeg;base64,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" width="50" height="50" alt=""></a>
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
                                <li><a class="dropdown-item" href="personalCars.php">Osobné auto</a></li>
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
                                <a class="nav-link" aria-current="page" href="mojePozicane.php">Moje požičané</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="profil.php">Profil</a>
                            </li>
                        <?php elseif(isset($_SESSION['prihlaseny']) && $_SESSION['prihlaseny'] == '1' && $_SESSION['admin'] == '1'): ?>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="prenajateAuta.php">Prenajaté autá</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="zoznamPouzivatelov.php">Používatelia</a>
                            </li><li class="nav-item">
                                <a class="nav-link" aria-current="page" href="profil.php">Profil</a>
                            </li>
                        <?php endif; ?>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.php">Kontakt</a>
                        </li>
                    </ul>
                    <div class="buttons">
<!--                        <input type="button" value="Login" />-->
<!--                        <input type="button" value="Register" />-->

                        <?php if(isset($_SESSION['prihlaseny']) && $_SESSION['prihlaseny'] == '1'): ?>
                            <button class="button button1"><a class="nav-link" href="logout.php">Odhlásiť sa</a></button>
                        <?php else: ?>
                            <button class="button button1"><a class="nav-link" href="login.php">Prihlásiť sa</a></button>
                            <button class="button button1"><a class="nav-link" href="registration.php">Registrovať</a></button>
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </nav>
    </div>
</body>