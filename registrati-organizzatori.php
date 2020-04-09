<?php
require_once 'materialize.php';
$passwordlength = 8;
$partitaIVAlength = 11;

	   
if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password2"])
    && isset($_POST["name"]) && isset($_POST["partitaIVA"]) && isset($_POST["ragioneSociale"])){

    // Check if the email is already registered
    $checkEmailPresence = $dbh->isEmailManagerAlreadyPresent($_POST["email"]);
   
    if (empty($checkEmailPresence)) {
        if(strlen($_POST["partitaIVA"]) != $partitaIVAlength){
            $templateParams["errorepartitaiva"] = "Partita IVA deve essere contenere 11 cifre";
        } else{
            // Check lenght of the password
            if(strlen($_POST["password"]) >= $passwordlength){
                // Check equal password
                if($_POST["password"] != $_POST["password2"]){
                    $templateParams["errorepassword"] = "le password non coincidono";
                } else {
                    // Register ok
                    $register_result = $dbh->insertManager($_POST["name"], $_POST["password"], $_POST["email"], 
                                                        $_POST["partitaIVA"], $_POST["ragioneSociale"], $_POST["description"]);  
                    registerLoggedManager($register_result[0]); 
                }
            } else {
                $templateParams["errorelunghezzapassword"] = "la password deve contenere almeno 8 caratteri";
            }
        }
    } else {
        $templateParams["erroreemail"] = "email già registrata";
    }

}



if(isManagerLoggedIn()){
    $templateParams["titolo"] = "Organizzatore";
    header("Location: organizzatore.php");
    exit;
} else{
    $templateParams["titolo"] = "Registrazione";
    $templateParams["nome"] = "registrati-organizzatori-temp.php";
}

require 'template/base.php';
?>