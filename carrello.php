<?php
require_once 'materialize.php';


if(isUserLoggedIn()){
    //Base Template
    $templateParams["titolo"] = "Carrello";
    $templateParams["nome"] = "carrello-temp.php";
    $templateParams["eventi-in-carrello"]=$dbh->getEventCart($_SESSION["idutente"]);
} else {
    $templateParams["titolo"] = "Ibento";
    header("Location: index.php");
    exit;
}


require 'template/base.php';
?>