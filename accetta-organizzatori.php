<?php
require_once 'materialize.php';
if(isAdminLoggedIn()){
    $templateParams["titolo"] = "Accetta Organizzatore";
    $templateParams["nome"] = "accetta-organizzatori-temp.php";
    $templateParams["organizzatori"] = $dbh->getUnacceptedManagers();
} else {
    $templateParams["titolo"] = "Ibento";
    header("Location: index.php");
    exit;
}

require 'template/base.php';
?>