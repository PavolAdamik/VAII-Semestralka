<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "dtb456";
$db_name = "autopozicovna";

$db = new mysqli($db_host,$db_user,$db_pass,$db_name);

if ($db->connect_error) {
    die ($db->connect_error);
}
mysqli_query($db,"SET CHARACTER SET utf8");
mysqli_query($db,"SET NAMES 'utf8'");
mysqli_query($db,"SET CHARACTER_SET_CLIENT=utf8");
mysqli_query($db,"SET CHARACTER_SET_RESULTS=utf8");