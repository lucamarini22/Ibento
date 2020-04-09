<?php
require_once 'materialize.php';

/*Funzione Custom per la comparazione degli id degli eventi*/
function compareIdValue($val1, $val2)
{
    return strcmp($val1["id"], $val2["id"]);
}


/*FILTRO SU CATEGORIE*/
if (isset($_POST['categorie'])) {
    foreach($_POST['categorie'] as $categoria) {
        if (empty($templateParams["eventi"])) {
            $templateParams["eventi"] = $dbh->getPreviewsForCategory($categoria);
        }
        else{
            foreach($dbh->getPreviewsForCategory($categoria) as $eve) {
                array_push($templateParams["eventi"], $eve);
            }
        }
    }
}
else {
    $templateParams["eventi"] = $dbh->getPreviews();
}

/*FILTRO SU DATA*/
if(isset($_POST['date']) && $_POST['date']!="Qualsiasi data") {
    if ($_POST['date']!="") {
        list($day, $month, $year)=explode("-",$_POST["date"]);
        $data_res = $year."-".$month."-".$day;
        $dataFilterd = $dbh->getPreviewsForDate($data_res);
        $templateParams["eventi"]=array_uintersect($templateParams["eventi"], $dataFilterd, 'compareIdValue');
    }
}

/*FILTRO SU LUOGO*/
if(isset($_POST['where']) && $_POST['where']!="Qualsiasi luogo") {
    if ($_POST['where']!="") {
        $luogoFilterd = $dbh->getPreviewsForPlace($_POST['where']);
        $templateParams["eventi"]=array_uintersect($templateParams["eventi"], $luogoFilterd, 'compareIdValue');
    }
}

if(isUserLoggedIn()){
    $templateParams["titolo"] = "Eventi";
    $templateParams["nome"] = "event-preview-temp.php";
} else {
    $templateParams["titolo"] = "Ibento";
    header("Location: index.php");
    exit;
}

require 'template/base.php';
?>