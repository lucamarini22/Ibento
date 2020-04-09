$(document).ready(function(){
    $('select').formSelect();
    $('.sidenav').sidenav();
    $('.timepicker').timepicker({
      format:'HH:MM:SS',
      showClearBtn: true,
      twelveHour: false
    });

    $('.datepicker').datepicker({
        format:'dd-mm-yyyy',
        showClearBtn:true,
        minDate: new Date(),
        i18n: {
                months: ["Gennaio", "Febbraio", "Marzo", "Aprile", "Maggio", "Giugno", "Luglio", "Agosto", "Settembre", "Ottobre", "Novembre", "Dicembre"],
                monthsShort: ["Gen", "Feb", "Mar", "Apr", "Mag", "Giu", "Lug", "Ago", "Set", "Ott", "Nov", "Dic"],
                weekdays: ["Domenica","Lunedì", "Martedì", "Mercoledì", "Giovedì", "Venerdì", "Sabato"],
                weekdaysShort: ["Dom","Lun", "Mar", "Mer", "Gio", "Ven", "Sab"],
                weekdaysAbbrev: ["D","L", "M", "M", "G", "V", "S"]
        }
    });
    $('.tabs').tabs();
});





var categorieSelezionate=[];

function addCategorie(idcategoria,nome,immagine) {
  if(!categorieSelezionate.includes(nome)){
      categorieSelezionate.push(nome);
      var xhttp = new XMLHttpRequest();
      xhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
            document.getElementById("selezionate").innerHTML = this.responseText + document.getElementById("selezionate").innerHTML;
          }
      };
      xhttp.open("GET", "chips.php?nome="+nome+"&immagine="+immagine+"&idcategoria="+idcategoria, true);
      xhttp.send();
  }else{
    M.toast({html: "categoria già inserita", classes: 'rounded', displayLength: 500});
  }
    
}

function rimuoviLi(nome){
  categorieSelezionate.pop(nome);
  var myEl = document.getElementById(nome);
  myEl.remove();
}

function qualsiasiData(){
  
  if(document.getElementById('data-input').value==""){
    document.getElementById('data-input').value="Qualsiasi data";
  }
}