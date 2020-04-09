<?php
require_once 'materialize.php';

if(isUserLoggedIn()){
    $templateParams["titolo"] = "Interessi Utente";
    $templateParams["nome"] = "tickets-temp.php";
    $templateParams["eventi"] = $dbh->getTicketsForUser($_SESSION["idutente"]);
} else {
    $templateParams["titolo"] = "Ibento";
    header("Location: index.php");
    exit;
}

require 'template/base.php';
?>