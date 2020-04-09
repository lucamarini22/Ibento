<div class="container">
    <div class="row">
      <div class="section no-pad-bot" id="index-banner">
        <div class="col s12">
          <div class="row">
            <div class="col s12 l8">
              <h5 class="center">Il tuo carrello</h5>
              <div class="row center card-panel">
                <?php                   
                  if(empty($templateParams["eventi-in-carrello"])):
                ?>
                  <h5>Il tuo carrello è vuoto:(</h5>
                  <?php else:  
                    foreach($templateParams["eventi-in-carrello"] as $idEvent):    
                    $eventInfo=$dbh->getEventInfo($idEvent["id_evento"]);
                    ?>
                    <div class="card-panel row" id="row-<?php echo $idEvent['id_evento']?>">
                  <div class="col s12 m4 left"><p id="titolo" class="flow-text"><?php echo $eventInfo[0]["titolo"]?></p></br></div>
                  <div class="col s4 m3"><img class="responsive-img" src="<?php echo $eventInfo[0]["immagine"]?>" alt=""></div>
                  
                  <div class="col s4 m2">
                  
                    <input type="number" onchange="addToChart(<?php echo $_SESSION['idutente']?>,<?php echo $idEvent['id_evento']?>)" placeholder="Quantità" name="qty" id="new_quantity_<?php echo $idEvent["id_evento"]?>" min="1" step="1" value="<?php echo $eventInfo[0]["quantita"]?>" > 
                  
                  </div>

                  <div class="col s1 m1 right-align" style="margin-top: 15px; margin-left:5px">
                  <?php if($eventInfo[0]["prezzo_biglietto"] ==0){
                          echo "FREE";
                          } else{ echo '€'.$eventInfo[0]["prezzo_biglietto"];}?>
                  </div>
                  <div class="col s1 m1 right-align" style="margin-top: 8px"><a onclick="removeFromChart(<?php echo $_SESSION['idutente']?>,<?php echo $idEvent['id_evento']?>)" class="btn-flat"><i class="material-icons">delete</i></a></div>
                  <a class="waves-effect waves-light btn "><i class="material-icons">refresh</i></a>
                  <div class="col s12">
                    <p id="dataorastringa" class="left">Data e ora: </p>
                  </div>
                  <div class="col s12">
                    <p id="dataora" >
                      <?php 
                        list($year, $month, $day)=explode("-",$eventInfo[0]["data_inizio"]);
                        echo $day."-".$month."-".$year;
                      ?>, 
                      <?php 
                        list($hour, $minute, $second)=explode(":",$eventInfo[0]["ora_inizio"]);
                        echo $hour.":".$minute;
                      ?>
                    </p>
                    </div>
                    <div class="col s12">
                      <p id="luogostringa" class=" left">Luogo:</p>
                    </div>
                    <div class="col s12">
                      <p id="luogo"> <?php echo $eventInfo[0]["luogo"]?></p>
                    </div>
               
               
              </div>
                <?php 
                endforeach;
                endif?>
                  
              </div>
          </div>
          
            <div class="col s12 l4">
              <div class="card">
                <div class="card-content">
                  <h5 class="center">Riepilogo</h5>
                  <form method="POST" action="payment.php">
                  <table>
                
                    <tbody id="riepilogo">    
                                      
                    <?php 
                        $totale=0;
                        if(!empty($templateParams["eventi-in-carrello"])):
                          foreach($templateParams["eventi-in-carrello"] as $idEvent):               
                            $eventInfo=$dbh->getEventInfo($idEvent["id_evento"]);
                            $totale=$eventInfo[0]["prezzo_biglietto"]*$eventInfo[0]["quantita"]+$totale;
                    ?>
                      <?php 
                        endforeach;
                        endif;?>
                        <tr>
                        <td><h6>Totale:</h6></td>
                        <td id="totale">
                          <input type="hidden" name="totale" value="<?php echo $totale?>">
                          <div class="right-align"><h6><?php echo '€'.$totale?></h6></div>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          
                          <a href="home.php" class="btn-flat waves-effect">Indietro</a>
                        </td>
                        <td>
                          <button id="send_order" class="btn waves-effect waves-light hoverable " type="submit" >checkout</button>
                                                  </td>
                      </tr>
                      
                    </tbody>
                  </table>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>