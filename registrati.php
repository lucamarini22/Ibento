<?php
require_once 'materialize.php';


$passwordlength = 8;

if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password2"])
    && isset($_POST["name"]) && isset($_POST["surname"])){

    // Check if the email is already registered
    $checkEmailPresence = $dbh->isEmailUserAlreadyPresent($_POST["email"]);
    if (empty($checkEmailPresence)) {
        // Check lenght of the password
        if(strlen($_POST["password"]) >= $passwordlength){
            
            // Check equal password
            if($_POST["password"] != $_POST["password2"]){
                $templateParams["errorepassword"] = "le password non coincidono";
            } else {
                // Register ok
                $register_result = $dbh->insertUser($_POST["password"], $_POST["email"], $_POST["name"], $_POST["surname"]);
                registerLoggedUser($register_result[0]);

                $_POST["invia-email"] = "registrazione";
                require_once 'invia-email.php';
            }
        } else {
            $templateParams["errorelunghezzapassword"] = "la password deve contenere almeno 8 caratteri";
        }    
    } else {
        $templateParams["erroreemail"] = "email già registrata";
    }
}

if(isUserLoggedIn()){
   $templateParams["titolo"] = "Home";
   header("Location: home.php");
   exit;
} else{
    $templateParams["titolo"] = "Registrazione";
    $templateParams["nome"] = "registrati-temp.php";
}


require 'template/base.php';
?>