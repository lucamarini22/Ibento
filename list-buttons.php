<?php
    require_once 'materialize.php';
    
    /*Funzione Custom per la comparazione degli id degli eventi*/
    function compareIdValue($val1, $val2)
    {
        return strcmp($val1["id"], $val2["id"]);
    }    

    /*AGGIUNGE UN EVENTO ALLA LISTA DEGLI INTERESSI*/
    if (isset($_POST["addIntrest"])) {
        if (empty($dbh->getIntrest($_POST['addIntrest'], $_SESSION['idutente']))) {
            $addResult = $dbh->addIntrest($_SESSION['idutente'], $_POST['addIntrest']);
            $tmp = $dbh->getEventIntrestedQuantity($_POST['addIntrest']);
            $newqnt = $tmp[0]["utenti_interessati"] + 1;
            $dbh->updateEventIntrestedQuantity($_POST['addIntrest'], $newqnt);
        }
    }
    /*RIMUOVE UN EVENTO DALLA LISTA DEGLI INTERESSI*/
    if(isset($_POST['removeIntrest'])) {
        $dbh->removeIntrest($_SESSION['idutente'], $_POST['removeIntrest']);
        $tmp = $dbh->getEventIntrestedQuantity($_POST['removeIntrest']);
        $newqnt = $tmp[0]["utenti_interessati"] - 1;
        $dbh->updateEventIntrestedQuantity($_POST['removeIntrest'], $newqnt);
    }

    /*AGGIUNGE UN EVENTO AL CARRELLO SE E SOLO SE RISPETTA LE CONDIZIONI*/
    if (isset($_POST['addToCart'])) {
        /*Eventi con data di inizio postuma alla data odierna*/
        $yetToStart = $dbh->getPreviewsYetToStart(date("Y-m-d"));
        /*Eventi in data odierna con orario di inizio postumo all'ora attuale*/
        $yetToStartToday = $dbh->getPreviewsYetToStartToday(date("Y-m-d"), date("H:i:s"));
        /*Eventi già cominciati ma acquistabili*/
        $startedButPurchasable = $dbh->getPreviewsStartedButPurchasable(date("Y-m-d"), date("H:i:s"));
        /*Eventi con biglietti disponibili*/
        $bookable = $dbh->getBookablePreviews();
        /*Numero di biglietti acquistati dall'utente per questo evento*/
        $userTickets = $dbh->getCartTicketsForUser($_SESSION['idutente'], $_POST['addToCart']);
        /*Considero tutti gli eventi non terminati*/
        $all = array_merge($yetToStart, $yetToStartToday, $startedButPurchasable);
        /*Da questi prendo soltanto quelli con biglietti disponibili*/    
        $all = array_uintersect($all, $bookable, 'compareIdValue');
        
        /*Controllo se aumentare la quantità di biglietti nel carrello*/
        $thisEvent = $dbh->getPreviewById($_POST['addToCart']);
        if (empty($userTickets) && array_search($_POST['addToCart'], array_column($all, 'id')) !== FALSE) {
            $dbh->addToCart($_SESSION['idutente'], $_POST["addToCart"]);
        } elseif(!empty($userTickets) && array_search($_POST['addToCart'], array_column($all, 'id')) !== FALSE) {        
            $newqnty = $userTickets[0]["quantita"] + 1;
            $dbh->updateCartQuantity($_SESSION['idutente'], $_POST["addToCart"], $newqnty);
        }
    }

?>