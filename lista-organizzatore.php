<?php
require_once 'materialize.php';

if(isManagerLoggedIn()){  
    $templateParams["titolo"] = "Eventi Organizzatore";
    $templateParams["nome"] = "manager-previews-temp.php";
    $templateParams["eventi"] = $dbh->getPreviewsForOrganizer($_SESSION["username"]);
} else{
    $templateParams["titolo"] = "Home";
    header("Location: index.php");
    exit;
}


require 'template/base.php';
?>