
function sellTickets(iduser){
    $.ajax({ url: 'db/database.php',
    data: {id_user_sell: iduser},
    type: 'post',
    success: function(data) {
        window.location.href = 'home.php';

    }
    });
}

function anableButton(){
    let bool = checkCardInfo();
    if(!bool){
        $("#pay").attr('disabled','disabled');
    }else{
        $("#pay").removeAttr('disabled');
    }
    
}
function checkCardInfo(){
    let card_number = document.getElementById("card_number").value;
    let client_name = document.getElementById("client_name").value;
    let cvv = document.getElementById("cvv").value;
    let month = document.getElementById("expiration_month").value;
    let year = document.getElementById("expiration_year").value;
    let date = new Date();    
    let actual_month = date.getMonth();
    let actual_year = date.getFullYear();

    return client_name.length != 0 && card_number.length == 16 && /^\d+$/.test(card_number) && /^\d+$/.test(cvv)  && 
    /^\d+$/.test(month)  && /^\d+$/.test(year) && month <= 12 && /^([a-zA-z]+\s)*[a-zA-z]+$/.test(client_name) && cvv.length == 3 &&
     (year > actual_year || (year == actual_year && month > actual_month));
}
