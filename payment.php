<?php
require_once 'materialize.php';

if(isUserLoggedIn()){
    //Base Template
    $templateParams["titolo"] = "Pagamento";
    $templateParams["nome"] = "payment-temp.php";
} else {
    $templateParams["titolo"] = "Ibento";
    header("Location: index.php");
    exit;
}


require 'template/base.php';
?>