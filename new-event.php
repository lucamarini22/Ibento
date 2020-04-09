<?php
require_once 'materialize.php';

if(isset($_POST["titolo"]) && isset($_POST["categoria"])
    && isset($_POST["data-inizio"]) && isset($_POST["prezzo"])
    && isset($_POST["ora-inizio"]) && isset($_POST["data-fine"])
    && isset($_POST["ora-fine"]) && isset($_POST["luogo"])
    && isset($_POST["biglietti-totali"]) && isset($_POST["biglietti-ciascuno"])){

    /*CAMBIO FORMATO DATE*/
    list($day, $month, $year)=explode("-",$_POST["data-inizio"]);
    $data_inizio = $year."-".$month."-".$day;
    list($day, $month, $year)=explode("-",$_POST["data-fine"]);
    $data_fine = $year."-".$month."-".$day;
    /*CAMBIO FORMATO ORE*/
    $ora_inizio = $_POST["ora-inizio"].":"."00";
    $ora_fine = $_POST["ora-fine"].":"."00";

    if(!isset($_POST["acquistabili-durante"])) {
        $ad = 0;
    } elseif($_POST["acquistabili-durante"] == "on") {
        $ad = 1;
    } else {
        $ad = 0;
    }

    /*Controllo validità data e ora*/
    if($data_inizio > $data_fine || ($data_inizio == $data_fine && $ora_inizio >= $ora_fine)) {
        $templateParams["erroreDateTime"] = "I valori per data ed ora inseriti non sono validi";        
    } else {
        $result = $dbh->insertNewEvent($_POST["titolo"], $data_inizio, $ora_inizio, $data_fine, $ora_fine, $_POST["luogo"], $_POST["immagine"], $_POST["descrizione"], $_POST["biglietti-totali"], $_POST["biglietti-ciascuno"], $ad, $_POST["categoria"], $_POST["prezzo"], $_SESSION["username"]);
        
        /*Messaggio di corretta creazione*/
        header('Location: lista-organizzatore.php'); 
    }

}

$templateParams["categorie"] = $dbh->getCategorie();
$templateParams["titolo"] = "Nuovo Evento";
$templateParams["nome"] = "new-event-temp.php";
require 'template/base.php';
?>