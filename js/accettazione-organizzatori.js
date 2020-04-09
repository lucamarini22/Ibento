$(document).ready(function() {
    

$(".accept").click(function(e){
    let el = $(this);
    //let username1 = document.getElementById("username").textContent;
    let username1 = el.val(); 
    let usernameForQuery = username1.replace('Nome: ','');

    usernameAndEmail = usernameForQuery.split("/");

    usernameForQuery = usernameAndEmail[0];
    emailForQuery = usernameAndEmail[1];

    $.ajax({
        url: 'accetta-singolo-organizzatore.php',
        
        data: { username: usernameForQuery,
                email: emailForQuery,
              },
        type: "post",
        beforeSend : function() {
            

      },
        success: function(data){
            
            el.remove();
        }
    });
    e.preventDefault();
});
});




document.addEventListener('DOMContentLoaded', function() {
  
  
    var url = new URL(window.location.href)
    var new_item = url.searchParams.get('new_item')
    if (new_item == 'true'){
      M.toast({html: 'Hai un nuovo ordine!', classes: 'rounded', displayLength: 6000})
    }
  });