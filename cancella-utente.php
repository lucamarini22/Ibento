<script src="https://js.pusher.com/5.0/pusher.min.js"></script>

<?php
require_once 'materialize.php';
require __DIR__ . '/vendor/autoload.php';


if(isAdminLoggedIn()){
    $templateParams["titolo"] = "Cancella Utente";
    $templateParams["nome"] = "cancella-utente-temp.php";
} else {
    $templateParams["titolo"] = "Ibento";
    $templateParams["nome"] = "index-temp.php";
}

if(isset($_POST["email-to-delete"])){
    $delete_result = $dbh->deleteUser($_POST["email-to-delete"]);
    if(! $delete_result) {
        $templateParams["errorecancellazione"] = "Errore: cancellazione non riuscita";
    } else {
        $templateParams["errorecancellazione"] = "Cancellazione eseguita con successo!";
        
        $emailToDelete = $_POST['email-to-delete'];
    
        $options = array(
            'cluster' => 'eu',
            'useTLS' => true
            );
            $pusher = new Pusher\Pusher(
            '1378e71933caa3d3ec1e',
            '9bdef6e05f0ceca49dcb',
            '925060',
            $options
        );
                
            $data['message'] = $emailToDelete;
            $pusher->trigger('my-channel', 'utente-cancellato', $data);

            $_SESSION["utentedacancellare"] = $emailToDelete;
            $_POST["invia-email"] = "cancellazione";
            require_once 'invia-email.php';
        
    }
}

require 'template/base.php';
?>