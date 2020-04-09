

<div class="valign-wrapper row register-box">
  <div class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4">
      <div class="card-content">
        <span class="card-title">Completa Ordine</span>
        <div class="row">
          <div class="input-field col s12">
            <div class="col s4">
              <label class="radio-inline">
                <input name="group1" type="radio" checked="">
                <span><i class=" fab fa-cc-mastercard fa-2x"></i></span> 
              </label>
            </div>
            <div class="col s4">
              <label class="radio-inline">
                <input name="group1" type="radio">
                <span><i class="fab fa-cc-visa fa-2x"></i></span>
              </label>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <label for="client_name">Intestatario</label>
            <input type="text" class="validate" onchange="anableButton()" name="client_name" id="client_name" value="">
                      </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <label for="card_number">Numero carta</label>
            <input type="text" class="validate" onchange="anableButton()" name="card_number" id="card_number" value="">
                      </div>
          <div class="input-field col s6">
            <input name="cvv" onchange="anableButton()" id="cvv" type="text" class="validate">
            <label for="cvv">CVV</label>
                      </div>
        </div>
        <div class="row">
          <div class="col-sm-2">
            <div class="input-field col s6">
              <input name="expiration_month" onchange="anableButton()" id="expiration_month" type="number" class="validate" value="">
              <label for="expiration_month">Mese scadenza</label>
                          </div>
          </div>
          <div class="input-field col s6">
            <input name="expiration_year" onchange="anableButton()" id="expiration_year" type="number" class="validate" value="">
            <label for="expiration_year">Anno scadenza</label>
                      </div>
        </div>
        <div class="row">
          <div class="col s12 right-align">
            <h5>Totale: <?php echo $_POST["totale"]?>€</h5>
          </div>
        </div>
      </div>
      <div class="row card-action">
        <div class="left-align col s6">
          <a href="carrello.php" class="btn-flat waves-effect waves-light">Indietro</a>
        </div>
        <div class="right-align col s6">
          <a id="pay" class="btn waves-effect waves-light hoverable" disabled onclick="sellTickets(<?php echo $_SESSION['idutente']?>);" >Paga Ora</a>
        </div>
      </div>
  </div>
</div>