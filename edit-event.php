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
        $result = $dbh->updateEvent($_GET["id"], $_POST["titolo"], $data_inizio, $ora_inizio, $data_fine, $ora_fine, $_POST["luogo"], $_POST["immagine"], $_POST["descrizione"], $_POST["biglietti-totali"], $_POST["biglietti-ciascuno"], $ad, $_POST["categoria"], $_POST["prezzo"], $_SESSION["username"]);

        /*Messaggio di corretta modifica*/
        header('Location: lista-organizzatore.php');
    }    
}

$tmp = $dbh->getEventToEdit($_GET["id"]);
$templateParams["evento"] = $tmp[0];

/*CAMBIO FORMATO DATE*/
$templateParams["data_inizio"]=$templateParams["evento"]["data_inizio"];
list($year, $month, $day)=explode("-",$templateParams["data_inizio"]);
$templateParams["data_inizio"] = $day."-".$month."-".$year;
$templateParams["data_fine"]=$templateParams["evento"]["data_fine"];
list($year, $month, $date)=explode("-",$templateParams["data_fine"]);
$templateParams["data_fine"] = $day."-".$month."-".$year;

/*CAMBIO FORMATO ORE*/
$templateParams["ora_inizio"]=$templateParams["evento"]["ora_inizio"];
list($hours, $minutes, $seconds)=explode(":",$templateParams["ora_inizio"]);
$templateParams["ora_inizio"] = $hours.":".$minutes;
$templateParams["ora_fine"]=$templateParams["evento"]["ora_fine"];
list($hours, $minutes, $seconds)=explode(":",$templateParams["ora_fine"]);
$templateParams["ora_fine"] = $hours.":".$minutes;


if(!isset($templateParams["evento"]["acquisto_durante_evento"])) {
    $templateParams["checkbox"] = "";
} elseif($templateParams["evento"]["acquisto_durante_evento"] == "1") {
    $templateParams["checkbox"] = "checked";
} else {
    $templateParams["checkbox"] = "";
}

$templateParams["categorie"] = $dbh->getCategorie();
$templateParams["titolo"] = "Modifica Evento";
$templateParams["nome"] = "edit-event-temp.php";
require 'template/base.php';
?>