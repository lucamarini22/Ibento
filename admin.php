<?php
require_once 'materialize.php';

if(isAdminLoggedIn()){
    $templateParams["titolo"] = "Admin";
    $templateParams["nome"] = "admin-temp.php";
} else {
    $templateParams["titolo"] = "Ibento";
    header("Location: index.php");
    exit;
}

if(isset($_POST["email-to-delete"])){
    $delete_result = $dbh->deleteUser($_POST["email-to-delete"]);
    if(! $delete_result) {
        $templateParams["errorecancellazione"] = "Errore: cancellazione non riuscita";
    }
}

require 'template/base.php';
?>