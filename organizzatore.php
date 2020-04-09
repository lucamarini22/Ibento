

<script src="https://js.pusher.com/5.0/pusher.min.js"></script>
<script>

  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  var pusher = new Pusher('1378e71933caa3d3ec1e', {
    cluster: 'eu',
    forceTLS: true
  });

  var channel = pusher.subscribe('my-channel');
  
  channel.bind('my-event', function(data) {
   // alert(JSON.stringify(data));
   
    $.get('username-organizzatore.php', function (data1) {
      username = data1;
    });
    str = JSON.stringify(data, ['message']);
    str = JSON.stringify(data, null, 4); // (Optional) beautiful indented output.
    var obj = JSON.parse(str);
    var username2 = obj.message;
    alert(" ");
    
    if(username == username2){
      $.ajax({
          
          url: 'registrazione-accettata.php',
          success: function(data){
              
              $("h5.accettazione").html(M.toast({html: JSON.stringify(data), classes: 'rounded', displayLength: 6000}));
          }
      });
    }
  });


  channel.bind('categoria-aggiunta', function(data) {
   
    $.ajax({
          
        url: 'categoria-aggiunta.php',
        success: function(data){
            M.toast({html: JSON.stringify(data), classes: 'rounded', displayLength: 6000});
        }
    });
    
  });
</script>

<?php
require_once 'materialize.php';

if(!isManagerLoggedIn()){
    $templateParams["titolo"] = "Ibento";
    header("Location: index.php");
    exit;
} else {
    $templateParams["titolo"] = "Organizzatore";
    $templateParams["nome"] = "organizzatore-temp.php";
    $result = $dbh->isManagerActive($_SESSION["email"]);
    if(!$result) {
        $templateParams["nonaccettato"] = "La sua registrazione non è ancora stata accettata";
    }
}


require 'template/base.php';
?>
