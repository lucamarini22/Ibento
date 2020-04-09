
<?php
require_once 'materialize.php';
require 'template/base.php';

if(isset($_POST['quantity_add']) && !empty($_POST['quantity_add']) &&
   isset($_POST['id_event_add']) && !empty($_POST['id_event_add'])) &&
   isset($_POST['id_user_add']) && !empty($_POST['id_user_add']) {
    $event=$dbh->getEventInfo($_POST["id_event_add"]);
    
    $temp=$event[0]["biglietti_totali"]-($event[0]["biglietti_venduti"]+$_POST["quantity_add"]);
    if($temp>=0){
        $dbh->updateQuantityCart($_POST['id_event_add'],$_POST['id_user_add'],$_POST['quantity_add']);
        echo $_POST['quantity_add'];
    }else{
        
        $temp=$_POST['quantity_add']+$temp;
        $dbh->updateQuantityCart($_POST['id_event_add'],$_POST['id_user_add'],$temp);
        echo $temp;
    }
    unset($_POST['id_event_add'],$_POST['id_user_add'],$_POST['quantity_add']);
    
}

if(isset($_POST['id_user_total']) && !empty($_POST['id_user_total'])) {
    $dbh->getTotal($_POST['id_user_total']);
    unset($_POST['id_user_total']);
    
}

if(isset($_POST['id_user_remove']) && !empty($_POST['id_user_remove']) && isset($_POST['id_event_remove']) && !empty($_POST['id_event_remove'])) {
    $dbh->removeFromCart($_POST['id_user_remove'],$_POST['id_event_remove']);
    unset($_POST['id_user_remove'],$_POST['id_event_remove']);
    
}

if(isset($_POST['id_user_sell']) && !empty($_POST['id_user_sell'])){
    
    $cart=$dbh->getShoppingCartUser($_POST["id_user_sell"]);
    foreach($cart as $event){
            $dbh->removeFromCart($_POST["id_user_sell"],$event["id_evento"]);
            $dbh->insertSoldTicket($event["id_evento"], $_POST["idpaguro"],$event["quantita"]);
            $dbh->updateSoldTickets($event["quantita"]+$event["biglietti_venduti"],$event["id_evento"]);
        
    }
    unset($_POST['id_user_sell']);
}



    








?>