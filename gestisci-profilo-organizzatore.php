<?php
require_once 'materialize.php';

$passwordlength = 8;
$uploadDir = "./upload/";

if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password2"])
    && isset($_POST["partitaIVA"]) && isset($_POST["ragioneSociale"])){

    // Check lenght of the password
    if(strlen($_POST["password"]) >= $passwordlength){
        
        // Check equal password
        if($_POST["password"] != $_POST["password2"]){
        $templateParams["errorepassword"] = "le password non coincidono";
        } else {
        // Register ok
        $register_result = $dbh->modifyManagerInfo($_POST["password"], $_POST["email"], $_POST["partitaIVA"], $_POST["ragioneSociale"]);
        registerLoggedManager($register_result[0]);
        }
    } else {
        $templateParams["errorelunghezzapassword"] = "la password deve contenere almeno 8 caratteri";
    }
}




if(isManagerLoggedIn()){  
    //Base Template
    $templateParams["titolo"] = "Modifica profilo";
    $templateParams["nome"] = "gestisci-profilo-organizzatore-temp.php";
} else{
    $templateParams["titolo"] = "Home";
    header("Location: index.php");
    exit;
}


require 'template/base.php';
?>