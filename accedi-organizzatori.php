<?php


require_once 'materialize.php';


if (isset($_POST["checkbox-admin"])) {
    // Admin Login
    if(isset($_POST["email"]) && isset($_POST["password"])){
        $login_result = $dbh->checkAdminLogin($_POST["email"], $_POST["password"]);
        if($login_result == NULL){
            // Failed Login
            $templateParams["errorelogin"] = "Errore: email o password errate";
        }
        else{
            registerLoggedAdmin($login_result[0]);
        }
    }
} else {
    // Manager Login
    if(isset($_POST["email"]) && isset($_POST["password"])){
        $login_result = $dbh->checkManagerLogin($_POST["email"], $_POST["password"]);
        if($login_result == NULL){
            // Failed Login
            $templateParams["errorelogin"] = "Errore: email o password errate";
        }
        else{
            registerLoggedManager($login_result[0]);
        }
    }
}

if(isAdminLoggedIn()){
    $templateParams["titolo"] = "Admin";
    header("Location: admin.php"); // go to admin home
    exit;
} elseif(isManagerLoggedIn()){
    $templateParams["titolo"] = "Organizzatore";
    header("Location: organizzatore.php");
    exit;
} else{
    $templateParams["titolo"] = "Login";
    $templateParams["nome"] = "accedi-organizzatori-temp.php";
}


require 'template/base.php';
?>