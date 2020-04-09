<script src="https://js.pusher.com/5.0/pusher.min.js"></script>

<?php
require_once 'materialize.php';
require __DIR__ . '/vendor/autoload.php';

if(isAdminLoggedIn()){
    $templateParams["titolo"] = "Aggiungi Categoria";
    $templateParams["nome"] = "aggiungi-categoria-temp.php";
} else {
    $templateParams["titolo"] = "Ibento";
    $templateParams["nome"] = "index-temp.php";
}
if(isset($_POST["categoria"]) && isset($_POST["immagine"])){
    $result = $dbh->insertCategory($_POST["categoria"], $_POST["immagine"]);
    if(!$result){
        $templateParams["errorecategoria"] = "Errore: inserimento non riuscito";
    }
}
if(isset($_POST['categoria']) && !empty($_POST['categoria'])) {
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
        
        
    $data['message'] = 'Una nuova categoria è stata aggiunta per creare i tuoi eventi';
    $pusher->trigger('my-channel', 'categoria-aggiunta', $data);
}

require 'template/base.php';
?>