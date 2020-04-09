

function removeFromChart(iduser,idevent){
    
    $.ajax({ url: 'db/database.php',
         data: {id_user_remove: iduser,
                id_event_remove: idevent},
         type: 'post',
         success: function() {
            calculateTotal(iduser);
         }
    });

    document.getElementById("row-"+idevent).remove();
}

function addToChart(iduser,idevent){
    quantity = document.getElementById('new_quantity_'+idevent).value;
    if(quantity == "" || quantity <= 0){
        quantity = 1;
    }
    $.ajax({ url: 'db/database.php',
         data: {id_user_add: iduser,
                id_event_add: idevent,
                quantity_add: quantity},
         type: 'post',
         success: function(output) {
             document.getElementById('new_quantity_'+idevent).value = output;
             
            calculateTotal(iduser);
         }
    });    
}

function calculateTotal(iduser){
    $.ajax({ url: 'db/database.php',
    data: {id_user_total: iduser},
    type: 'post',
    success: function(output) {
      updateTotal(output);
    }
    });
}

function updateTotal(newval){
    
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("totale").innerHTML = this.responseText;
        }
    };
    xhttp.open("GET", "totale.php?totale="+newval, true);
    xhttp.send();

}



