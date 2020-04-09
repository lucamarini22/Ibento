<script type="text/javascript" src="js/eventList.js"></script>
<main>
    <div class="section no-pad-bot">
        <div class="container">            
            <div class="row">
                <?php
                    if(empty($templateParams["eventi"])):
                ?>
                <h4>Non hai creato nessun evento  ¯\_(ツ)_/¯</h4>
                <?php
                    else:
                    foreach($templateParams["eventi"] as $evento):
                ?>
                    <div id="<?php echo $evento['id']?>" class="col s12 m6 l4 cards-container active">
                        <div class="card hoverable" style="height: 480px;">
                            <div class="card-image waves-effect waves-block waves-light" style="height: 60%;">
                                <img class="responsive-img activator" style="height: 100%;" alt="" src="<?php echo $evento["immagine"]; ?>">
                            </div>                        
                            <div class="card-content" style="height: 20%;">
                                <span class="card-title activator grey-text text-darken-4"><?php echo $evento["titolo"]; ?><i class="material-icons right">more_vert</i></span>
                                <p class="left-align"><?php echo $evento["data_inizio"]; ?>         <?php echo $evento["luogo"]; ?></p>
                            </div>                        
                            <div class="card-action" style="height: 10%;">
                                <form role="form" action="#" method="post">
                                    <a class="btn-large btn-floating waves-effect waves-light #00e676 green accent-3 right hoverable" style="margin:5px;"><i class="material-icons">cancel</i></a>
                                    <a href='edit-event.php?id=<?php echo $evento["id"] ?>' class=" btn-large btn-floating waves-effect waves-light #00e676 green accent-3 right-align hoverable" style="margin:5px;"><i class="material-icons">edit</i></a>
                                </form>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4"><?php echo $evento["titolo"]; ?><i class="material-icons right">close</i></span>
                                <br>
                                <br>
                                <p class="left-align"><strong>Inizia il:</strong> <?php echo $evento["data_inizio"]; ?> alle <?php echo $evento["ora_inizio"]; ?></p>
                                <p class="left-align"><strong>Termina il:</strong> <?php echo $evento["data_fine"]; ?> alle <?php echo $evento["ora_fine"]; ?></p>
                                <p class="left-align"><strong>Luogo:</strong> <?php echo $evento["luogo"]; ?></p>                    
                                <p class="left-align"><strong>Descrizione:</strong> <?php echo $evento["descrizione"]; ?></p>
                                <p class="left-align"><strong>Organizzato da:</strong> <?php echo $evento["id_organizzatore"]; ?></p>
                                <p class="left-align"><strong>Biglietti venduti:</strong> <?php echo $evento["biglietti_venduti"]; ?> di <?php echo $evento["biglietti_totali"]; ?></p>
                                <p class="left-align"><strong>Biglietti acquistabili:</strong> <?php echo $evento["max_biglietti_ciascuno"]; ?></p>   
                                <p class="left-align"><strong>Prezzo:</strong> <?php echo $evento["prezzo_biglietto"]; ?> €</p>
                                <p class="left-align"><strong>Utenti Interessati:</strong> <?php echo $evento["utenti_interessati"]; ?></p>
                            </div>
                        </div>                    
                    </div>
                <?php            
                    endforeach;
                    endif;
                ?>                
            </div>
        </div>
        <div class="fixed-action-btn" style="bottom: 10px; right: 10px;">
                <a href="new-event.php" class="btn-floating btn-large waves-effect waves-light #00bfa5 accent-3 right hoverable" style="margin-right:10px; position: sticky; bottom: 0;"><i class="material-icons">add_circle</i></a>
        </div>
    </div>
</main>
        