<?php
session_start();
if(isset($_POST['email']) && isset($_POST['password'])){
    include 'database.php';
    $email = $_POST['email'];
    if(strlen($_POST['password']) < 8) {
        $_SESSION['heslo_chyba'] = '1';
    } else {
        $_SESSION['heslo_chyba'] = '0';
    }
    $password = md5($_POST['password']); //zahesovane password

    $result = mysqli_query($db,"SELECT password FROM person WHERE email = '$email'");
    $row = mysqli_fetch_row($result); //v row[0] bude password ziskane z db

    if($row[0] == $password){

        $_SESSION['prihlaseny'] = '1';
        $_SESSION['email'] = $email;

        $result = mysqli_query($db,"SELECT id,firstname,lastname FROM person WHERE email = '$email'");
        $row = mysqli_fetch_row($result);
        $_SESSION['fullname'] = $row[1]. " ".$row[2];
        $_SESSION['id'] = $row[0];

        $result = mysqli_query($db,"SELECT isAdmin FROM person WHERE email = '$email'");
        $row = mysqli_fetch_row($result);
        if($row[0] == '1'){
            $_SESSION['admin'] = '1';
        }
        if($row[0] == '0'){
            $_SESSION['admin'] = '0';
        }
        $_SESSION['email_chyba'] = '0';

    } else {
        $_SESSION['email_chyba'] = '1';
        $_SESSION['prihlaseny'] = '0';
    }
    //mysql_free_result($result);
    //mysql_close($db);

    if($_SESSION['email_chyba'] == '1' || $_SESSION['heslo_chyba'] == '1'){
        header("location: login.php");
    } else {
        header("location: index.php");
    }
}
