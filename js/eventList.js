/*AGGIUNGE UN EVENTO ALLA LISTA DEGLI INTERESSI*/
function addIntrest(eventID){
    $.ajax({
        url: 'list-buttons.php',
        
        data: { addIntrest: eventID },
        type: "post",

        success: function(data){          
            M.toast({html: "evento inserito nei tuoi interessi", classes: 'rounded', displayLength: 1000});
        }
    });
};

/*RIMUOVE UN EVENTO DALLA LISTA DEGLI INTERESSI*/
function removeIntrest(eventID){
    $.ajax({
        url: 'list-buttons.php',
        
        data: { removeIntrest: eventID },
        type: "post",
        success: function(data){          
            document.getElementById(eventID).remove();
            M.toast({html: "evento rimosso di tuoi interessi", classes: 'rounded', displayLength: 1000});
        }
    });
};

/*AGGIUNGE UN EVENTO AL CARRELLO*/
function addToCart(eventID){
    $.ajax({
        url: 'list-buttons.php',
        
        data: { addToCart: eventID },
        type: "post",
        success: function(data){          
            M.toast({html: "evento aggiunto al carrello", classes: 'rounded', displayLength: 1000});

        }
    });
}
