

<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
<script>

  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher('1378e71933caa3d3ec1e', {
    cluster: 'eu',
    forceTLS: true
  });

  var channel = pusher.subscribe('my-channel');
  
  channel.bind('utente-cancellato', function(data) {
   
    $.get('id-utente.php', function (data1) {
      idutente = data1;
    });
    str = JSON.stringify(data, ['message']);
    str = JSON.stringify(data, null, 4); // (Optional) beautiful indented output.
    var obj = JSON.parse(str);
    var idutente2 = obj.message;
    alert("");

    if(idutente == idutente2){
      $.ajax({
          
          url: 'utente-cancellato.php',
          success: function(data){
              alert("Il suo account è stato rimosso a causa di una violazione");
          }
      });  
    }
});


</script>





<?php
require_once 'materialize.php';
//Base Template
if(isUserLoggedIn()){
    $templateParams["titolo"] = "Home";
    $templateParams["nome"] = "home-temp.php";
    $templateParams["categorie"] = $dbh->getCategorie();
    $templateParams["città"] = $dbh->getCities();
} else {
    $templateParams["titolo"] = "Ibento";
    header("Location: index.php");
    exit;
}

require 'template/base.php';
?>