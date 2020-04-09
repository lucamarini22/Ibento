<?php
require_once 'materialize.php';


if(isset($_POST["email"]) && isset($_POST["password"])){
    $login_result = $dbh->checkLogin($_POST["email"], $_POST["password"]);
    if($login_result == NULL){
        //Login fallito
        $templateParams["errorelogin"] = "Errore: email o password errate";
    }
    else{
        registerLoggedUser($login_result[0]);
    }
}

if(isUserLoggedIn()){
    $templateParams["titolo"] = "Home";
    header("Location: home.php");
    exit;
} else{
    $templateParams["titolo"] = "Login";
    $templateParams["nome"] = "accedi-temp.php";
}


require 'template/base.php';
?>