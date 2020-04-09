<?php
require_once 'materialize.php';

if(isUserLoggedIn()){
    $templateParams["titolo"] = "Biglietti Utente";
    $templateParams["nome"] = "intrest-previews-temp.php";
    $templateParams["eventi"] = $dbh->getIntrestedPreviewsForUser($_SESSION["idutente"]);
} else {
    $templateParams["titolo"] = "Ibento";
    header("Location: index.php");
    exit;
}

require 'template/base.php';
?>