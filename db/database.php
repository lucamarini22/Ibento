<?php

$dbh = new DatabaseHelper("localhost", "root", "", "IbentoDB");


if(isset($_POST['quantity_add']) && !empty($_POST['quantity_add']) &&

   isset($_POST['id_event_add']) && !empty($_POST['id_event_add']) &&
   isset($_POST['id_user_add']) && !empty($_POST['id_user_add'])) {
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
            $dbh->insertSoldTicket($event["id_evento"], $_POST["id_user_sell"],$event["quantita"]);
            $dbh->updateSoldTickets($event["quantita"]+$event["biglietti_venduti"],$event["id_evento"]);
        
    }
    //$email = $dbh->getUserFromId($_POST['id_user_sell'])[0]["email"];
    //$_SESSION["email"] = $email;
    //$_POST["invia-email"] = "acquisto";
    unset($_POST['id_user_sell']);
    //require_once '../invia-email.php';
}




class DatabaseHelper{
    private $db;

    public function __construct($servername, $username, $password, $dbname){
        $this->db = new mysqli($servername, $username, $password, $dbname);
        if ($this->db->connect_error) {
            die("Connection failed: " . $db->connect_error);
        }        
    }

    public function checkLogin($email, $password){
        $query = "SELECT id, email, `password`, nome, cognome, immagine FROM Utente WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $ret = $result->fetch_all(MYSQLI_ASSOC);
        if(!empty($ret)){
            $hashed_password = $ret[0]['password'];
            if (!password_verify($password, $hashed_password)) { 
                $ret = NULL; 
            }
        } else {
            $ret = NULL;
        }
        return $ret;
        
    }   

    public function checkManagerLogin($email, $password){
        $query = "SELECT username, email, `password`, partitaIVA, ragioneSociale, descrizione FROM Organizzatore WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $ret = $result->fetch_all(MYSQLI_ASSOC);
        if(!empty($ret)){
            $hashed_password = $ret[0]['password'];
            if (!password_verify($password, $hashed_password)) { 
                $ret = NULL; 
            }
        } else {
            $ret = NULL;
        }
        return $ret;
    }   

    public function checkAdminLogin($email, $password){
        $query = "SELECT id, email, `password`, nome, cognome FROM `Admin` WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $ret = $result->fetch_all(MYSQLI_ASSOC);
        if(!empty($ret)){
            $hashed_password = $ret[0]['password'];
            if (!password_verify($password, $hashed_password)) { 
                $ret = NULL; 
            }
        } else {
            $ret = NULL;
        }
        return $ret;  
    }  
    public function insertSoldTicket($id_evento, $id_utente, $quantita){
        $query_select = "SELECT quantita FROM `Biglietto` WHERE `id_evento`=? AND `id_utente`=?";
        $stmt_select = $this->db->prepare($query_select);
        $stmt_select->bind_param('ss',$id_evento,$id_utente);
        $stmt_select->execute();
        $result_select = $stmt_select->get_result();
        $stmt_select->close();
        $ret = $result_select->fetch_all(MYSQLI_ASSOC);
        if(empty($ret)){
            $query_insert = "INSERT INTO `Biglietto` (`id`, `id_evento`, `id_utente`, `data_acquisto`, `quantita`) VALUES (DEFAULT, ?, ?, DEFAULT , ?)";
            $stmt_insert = $this->db->prepare($query_insert);
            $stmt_insert->bind_param('sss', $id_evento, $id_utente, $quantita);
            $stmt_insert->execute();
            $stmt_insert->close();
        }else{
            $query_update = "UPDATE `Biglietto` SET `quantita`=? WHERE `id_evento`=? AND `id_utente`=?";
            $stmt_update = $this->db->prepare($query_update);
            $new_quantity = $ret[0]["quantita"]+$quantita;
            $stmt_update->bind_param('sss',$new_quantity, $id_evento,$id_utente);
            $stmt_update->execute();
            $stmt_update->close();
        }
        
    }  

    public function updateSoldTickets($newQuantitySold,$id_evento){
        $query = "UPDATE `Evento` SET `biglietti_venduti`=? WHERE id=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $newQuantitySold, $id_evento);
        $stmt->execute();
        $stmt->close();
    }

    public function insertUser($password, $email, $name, $surname){
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO `Utente` (`id`, `password`, `email`, `nome`, `cognome`, `immagine`) VALUES (DEFAULT, ?, ?, ? , ?, DEFAULT)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssss', $hashed_password, $email, $name, $surname);
        $stmt->execute();
        $stmt->close();
        return $this->checkLogin($email, $password);
    }  

    public function insertManager($name, $password, $email, $partitaIVA, $ragioneSociale, $description){
        $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $query = "INSERT INTO `Organizzatore` (`username`, `password`, `email`, `partitaIVA`, `ragioneSociale`, `descrizione`) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssss', $name, $hashed_password, $email, $partitaIVA, $ragioneSociale, $description);
        $stmt->execute();
        $stmt->close();
        return $this->checkManagerLogin($email, $password);
    }  

    public function getCategorie(){
        $query = "SELECT id, nome, immagine FROM Categoria";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getEventCart($idUser){
        $query = "SELECT id_evento FROM Carrello WHERE id_utente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $idUser);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getShoppingCartUser($idUser){
        $query = "SELECT Carrello.id_evento, Evento.biglietti_totali, Evento.biglietti_venduti, Evento.prezzo_biglietto, Carrello.quantita FROM Carrello INNER JOIN Evento ON Evento.id = Carrello.id_evento WHERE Carrello.id_utente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $idUser);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPreviews(){
        $query = "SELECT * FROM Evento ORDER BY data_inizio";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getCities(){
        $query = "SELECT DISTINCT luogo FROM Evento ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function modifyUserInfo($password, $email, $name, $surname, $file){
        $_SESSION["email"] = $email;
        $_SESSION["immagine"] = $file;
        $_SESSION["nome"] = $name;
        $_SESSION["cognome"] = $surname;
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "UPDATE `Utente` SET `password` = ?, `email` = ?, `nome` = ?, `cognome` = ?, `immagine` = ?
         WHERE `id` = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssss', $hashed_password, $email, $name, $surname, $file, $_SESSION["idutente"]);
        $stmt->execute();
        $stmt->close();
        return $this->checkLogin($email, $password);
    }  

    public function isEmailUserAlreadyPresent($email){
        $query = "SELECT id, email, nome, cognome FROM Utente WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }   

    public function isEmailManagerAlreadyPresent($email){
        $query = "SELECT username, email, partitaIVA, ragioneSociale, descrizione FROM Organizzatore WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function addIntrest($userID, $eventID){
        $query = "INSERT INTO `Interesse` (`id_evento`, `id_utente`) VALUES (? , ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $eventID, $userID);
        $stmt->execute();
        $stmt->close();
    }

    public function disable(){
        $this->db->query('SET foreign_key_checks = 0');
    }

    public function enable(){
        $this->db->query('SET foreign_key_checks = 1');
    }

    public function deleteUserFromInteresse($idutente){
        $query = "DELETE FROM `Interesse` WHERE `id_utente` = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$idutente);
        $stmt->execute();
        $result1 = $stmt->get_result();
        $stmt->close();
    }

    public function deleteUserFromCarrello($idutente){
        $query = "DELETE FROM `Carrello` WHERE `id_utente` = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$idutente);
        $stmt->execute();
        $result1 = $stmt->get_result();
        $stmt->close();
    }


    public function deleteUser($email){
        $this->disable();

        $query = "SELECT id, email, `password`, nome, cognome FROM `Utente` WHERE email = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $ret = $result->fetch_all(MYSQLI_ASSOC);
        if($ret) {
            $idutente = $ret[0]['id'];
            $query = "DELETE FROM `Utente` WHERE `id` = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('s',$idutente);
            $stmt->execute();
            $result1 = $stmt->get_result();
            $stmt->close();

            $this->deleteUserFromInteresse($idutente);
            $this->deleteUserFromCarrello($idutente);

            $this->enable();

            return true;
        } else{
            return false;
        }
    } 

    public function insertCategory($categoria, $immagine){
        $query = "INSERT INTO `Categoria` (`nome`, `immagine`) VALUES (?, ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $categoria, $immagine);
        $stmt->execute();
        return $stmt;

    } 

    
    public function getEventInfo($idEvent){
        $query = "SELECT Evento.titolo, Evento.data_inizio,Evento.ora_fine,Evento.ora_inizio, Evento.data_fine, Evento.luogo, Evento.immagine, Evento.id_organizzatore, Evento.prezzo_biglietto, Evento.biglietti_totali, Evento.biglietti_venduti, Carrello.quantita FROM Evento INNER JOIN Carrello ON Evento.id = Carrello.id_evento WHERE Evento.id = ?";

        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$idEvent);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getPreviewsForOrganizer($idOrganizer){
        $query = "SELECT * FROM Evento WHERE id_organizzatore = ? ORDER BY data_inizio";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$idOrganizer);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);    
    } 

    public function isManagerActive($email){
        $query = "SELECT username, email, `password`, partitaIVA, ragioneSociale, descrizione FROM Organizzatore WHERE email = ? AND `accettato`=1";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $ret = $result->fetch_all(MYSQLI_ASSOC);
        return $ret;
    }  

    public function getTotal($idutente){
        $query = "SELECT Evento.prezzo_biglietto, Carrello.quantita FROM Evento INNER JOIN Carrello ON Evento.id = Carrello.id_evento WHERE Carrello.id_utente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$idutente);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $result->fetch_all(MYSQLI_ASSOC);
        $totale = 0;
        foreach($result as $evento){
            $totale = $totale + $evento["quantita"] * $evento["prezzo_biglietto"];
        }
        echo $totale;
    }

    public function updateQuantityCart($idEvent,$idUser,$newQuantity){
            
            $query = "UPDATE Carrello SET quantita= ?  WHERE id_utente = ? AND id_evento=?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param('sss',$newQuantity,$idUser,$idEvent);
            $stmt->execute();
            $result = $stmt->get_result();
            $stmt->close();
    }


    public function acceptManager($username){
        $query = "UPDATE `Organizzatore` SET `accettato` = ? WHERE `username` = ?";
        $stmt = $this->db->prepare($query);
        $accepted = 1;
        $stmt->bind_param('ss', $accepted, $username);
        $stmt->execute();
        $stmt->close();
    }  

    public function getUnacceptedManagers(){
        $query = "SELECT username, email, `password`, partitaIVA, ragioneSociale, descrizione FROM Organizzatore WHERE `accettato`= ?";
        $stmt = $this->db->prepare($query);
        $zero = 0;
        $stmt->bind_param('s', $zero);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $ret = $result->fetch_all(MYSQLI_ASSOC);
        return $ret;
    }  

    public function removeFromCart($idUser,$idEvent){
        $query = "DELETE FROM `Carrello` WHERE id_utente=? AND id_evento=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$idUser,$idEvent);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();

    }

    public function getPreviewsForCategory($cat){
        $query = "SELECT * FROM Evento WHERE id_categoria = ? ORDER BY data_inizio";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$cat);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC); 
    }

    public function getPreviewsForDate($dt){
        $query = "SELECT id, titolo, immagine, data_inizio, luogo FROM Evento WHERE data_inizio = ? ORDER BY ora_inizio";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$dt);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC); 
    }

    public function getPreviewsForPlace($place){
        $query = "SELECT * FROM Evento WHERE luogo = ? ORDER BY data_inizio";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$place);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC); 
    }

    /*evento da cominciare prarametri sono data ed ora attuale*/
    public function getPreviewsYetToStart($dt){
        $query = "SELECT * FROM Evento WHERE data_inizio >= ? ORDER BY data_inizio";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$dt);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC); 
    }

    /*evento da cominciare oggi prarametri sono data ed ora attuale*/
    public function getPreviewsYetToStartToday($dt, $hour){
        $query = "SELECT * FROM Evento WHERE data_inizio = ? AND ora_inizio >= ? ORDER BY data_inizio";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$dt, $hour);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC); 
    }

    /*evento iniziato e non acquistabile parametri sono data ed ora attuale*/
    public function getPreviewsStartedButPurchasable($dt, $hour){
        $query = "SELECT * FROM Evento WHERE data_inizio <= ? AND ora_fine > ? AND acquisto_durante_evento = TRUE ORDER BY data_inizio";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$dt, $hour);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC); 
    }

    /*biglietti non terminati*/
    public function getBookablePreviews(){
        $query = "SELECT * FROM Evento WHERE biglietti_totali > biglietti_venduti ORDER BY data_inizio";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /*evento quantità nel carrello*/
    public function getCartTicketsForUser($usr, $event){
        $query = "SELECT quantita FROM Carrello WHERE id_utente = ? AND id_evento = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$usr, $event);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC); 
    }

    /*Aggiungi a carrello se non esistente*/
    public function addToCart($userID, $eventID){
        $query = "INSERT INTO Carrello (id_utente, id_evento) VALUES (? , ?)";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $userID, $eventID);
        $stmt->execute();
        $stmt->close();
    }

    /*Aumenta quantità nel carrello*/
    public function updateCartQuantity($userID, $eventID, $qnt){
        $query = "UPDATE Carrello SET quantita = ? WHERE id_utente = ? AND `id_evento` = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sss', $qnt, $userID, $eventID);
        $stmt->execute();
        $stmt->close();
    }

    public function getPreviewById($eventID){
        $query = "SELECT * FROM Evento WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$eventID);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC); 
    }
    
    public function modifyManagerInfo($password, $email, $partitaIVA, $ragioneSociale){
        $_SESSION["email"] = $email;
        $_SESSION["partitaiva"] = $partitaIVA;
        $_SESSION["ragionesociale"] = $ragioneSociale;
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $query = "UPDATE `Organizzatore` SET `password` = ?, `email` = ?, `partitaIVA` = ?, `ragioneSociale` = ?
         WHERE `username` = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssss', $hashed_password, $email, $partitaIVA, $ragioneSociale, $_SESSION["username"]);
        $stmt->execute();
        $stmt->close();
        return $this->checkManagerLogin($email, $password);
    }

    public function getEventById($eventID) {
        $query = "SELECT * FROM Evento WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$eventID);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /*Aumenta il contatore degli utenti interessati*/
    public function updateEventIntrestedQuantity($eventID, $qnt){
        $query = "UPDATE Evento SET utenti_interessati = ? WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss', $qnt, $eventID);
        $stmt->execute();
        $stmt->close();
    }

    /*Ritorna il numero di utenti interessati all'evento*/
    public function getEventIntrestedQuantity($eventID) {
        $query = "SELECT utenti_interessati FROM Evento WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$eventID);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getIntrest($eventID, $userID) {
        $query = "SELECT * FROM Interesse WHERE id_evento = ? AND id_utente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$eventID, $userID);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getIntrestedPreviewsForUser($userID) {
        $query = "SELECT *  FROM Evento INNER JOIN Interesse ON Evento.id=Interesse.id_evento WHERE Interesse.id_utente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$userID);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insertNewEvent($titolo, $dataInizio, $oraInizio, $dataFine, $oraFine,
                                    $luogo, $immagine, $descrizione, $bigliettiTotali, $bigliettiAcquistabili,
                                    $eventoIniziato, $categoria, $prezzo, $idOrganizzatore)
    {
        $query = "INSERT INTO Evento (titolo, data_inizio, ora_inizio, data_fine, ora_fine, luogo, immagine, descrizione, biglietti_totali, max_biglietti_ciascuno, acquisto_durante_evento, id_categoria, prezzo_biglietto, id_organizzatore) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";        
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ssssssssssssss', $titolo, $dataInizio, $oraInizio, $dataFine, $oraFine, $luogo, $immagine, $descrizione, $bigliettiTotali, $bigliettiAcquistabili, $eventoIniziato, $categoria, $prezzo, $idOrganizzatore);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

    public function getEventToEdit($eventID) {
        $query = "SELECT titolo, data_inizio, ora_inizio, data_fine, ora_fine, luogo, immagine, descrizione, biglietti_totali, max_biglietti_ciascuno, acquisto_durante_evento, id_categoria, prezzo_biglietto, id_organizzatore FROM Evento WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$eventID);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function updateEvent($eventID, $titolo, $dataInizio, $oraInizio, $dataFine, $oraFine,
                                    $luogo, $immagine, $descrizione, $bigliettiTotali, $bigliettiAcquistabili,
                                    $eventoIniziato, $categoria, $prezzo, $idOrganizzatore)
    {
        $query = "UPDATE Evento SET titolo=?, data_inizio=?, ora_inizio=?, data_fine=?, ora_fine=?, luogo=?, immagine=?, descrizione=?, biglietti_totali=?, max_biglietti_ciascuno=?, acquisto_durante_evento=?, id_categoria=?, prezzo_biglietto=?, id_organizzatore=? WHERE id=?";        
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('sssssssssssssss', $titolo, $dataInizio, $oraInizio, $dataFine, $oraFine, $luogo, $immagine, $descrizione, $bigliettiTotali, $bigliettiAcquistabili, $eventoIniziato, $categoria, $prezzo, $idOrganizzatore, $eventID);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result;
    }

    public function removeIntrest($userID,$eventID){
        $query = "DELETE FROM `Interesse` WHERE id_utente=? AND id_evento=?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('ss',$userID,$eventID);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
    }

    public function getEventsByManager($username) {
        $query = "SELECT COUNT(*) FROM `Evento` WHERE id_organizzatore = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$username);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getSoldTickets($username){
        $query = "SELECT SUM(`biglietti_venduti`) FROM `Evento` WHERE id_organizzatore = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getTicketsForUser($userID) {
        $query = "SELECT Evento.*, Biglietto.* FROM Evento INNER JOIN Biglietto ON Evento.id=Biglietto.id_evento WHERE Biglietto.id_utente = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$userID);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
        
    public function getManagersNumber() {
        $query = "SELECT COUNT(*) FROM `Organizzatore`";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUsersNumber() {
        $query = "SELECT COUNT(*) FROM `Utente`";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getEventsNumber() {
        $query = "SELECT COUNT(*) FROM `Evento`";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getAllSoldTicketsNumber() {
        $query = "SELECT COUNT(*) FROM `Biglietto`";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getNumberOfTicketsFromCategory($idcategoria) {
        $query = "SELECT COUNT(*) FROM `Evento` WHERE id_categoria = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$idcategoria);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getUserFromId($iduser){
        $query = "SELECT email FROM Utente WHERE id = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param('s',$iduser);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $ret = $result->fetch_all(MYSQLI_ASSOC);
        return $ret; 
    } 

}
?>