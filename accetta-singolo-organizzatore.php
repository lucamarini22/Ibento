<script src="https://js.pusher.com/5.0/pusher.min.js"></script>

<?php
require_once 'materialize.php';
require 'template/base.php';
require __DIR__ . '/vendor/autoload.php';

    if(isset($_POST['username']) && !empty($_POST['username'])) {
        $username = $_POST['username'];
        $dbh->acceptManager($_POST['username']);

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
            
            $data['message'] = $username;
            $pusher->trigger('my-channel', 'my-event', $data);

            $_SESSION["emaildacancellare"] = $_POST["email"];
            $_POST["invia-email"] = "accettazione";
            require_once 'invia-email.php';
    }




    








?>