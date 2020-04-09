<?php
require_once 'materialize.php';
//DA TOGLIERE QUESTE 3 RIGHE
//session_unset();
//var_dump($_COOKIE);
//unset($_COOKIE["PHPSESSID"]);


if(isUserLoggedIn()){
    //Go to home user
    $templateParams["titolo"] = "Home";
    header("Location: home.php");
    exit;
}
if(isManagerLoggedIn()){
    //Go to home manager
    $templateParams["titolo"] = "Organizzatore";
    header("Location: organizzatore.php");
    exit;
}
if(isAdminLoggedIn()){
    //Go to home admin
    $templateParams["titolo"] = "Admin";
    header("Location: admin.php");
    exit;
}

$templateParams["titolo"] = "Ibento";
$templateParams["nome"] = "index-temp.php";

require 'template/base.php';
?>