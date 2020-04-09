<?php
require_once 'materialize.php';

$passwordlength = 8;
$uploadDir = "./upload/";

if(isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["password2"])
    && isset($_POST["name"]) && isset($_POST["surname"])){

    // Check lenght of the password
    if(strlen($_POST["password"]) >= $passwordlength){
        

        // Check equal password
        if($_POST["password"] != $_POST["password2"]){
        $templateParams["errorepassword"] = "le password non coincidono";
        } else {
        // Register ok
        if(isset($_POST["immagine"]) && !empty($_POST["immagine"])) {
            $newimage = $uploadDir.$_POST["immagine"];
        } else {
            $newimage = $_SESSION["immagine"];
        }
        $register_result = $dbh->modifyUserInfo($_POST["password"], $_POST["email"], $_POST["name"], $_POST["surname"],$newimage);
        registerLoggedUser($register_result[0]);
        }
    } else {
        $templateParams["errorelunghezzapassword"] = "la password deve contenere almeno 8 caratteri";
    }
}




if(isUserLoggedIn()){  
    //Base Template
    $templateParams["titolo"] = "Modifica profilo";
    $templateParams["nome"] = "gestisciProfilo-temp.php";
} else{
    $templateParams["titolo"] = "Home";
    header("Location: index.php");
    exit;
}


require 'template/base.php';
?>