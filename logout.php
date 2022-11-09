<?php

include 'database.php';

session_start();
session_unset();
session_destroy();
$_SESSION['prihlaseny'] = '0';
$_SESSION['admin'] = '0';

header('location:index.php');

?>