<div class="container">
    <div class="valign-wrapper row register-box">
        <div class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4">
            <div class="row">
                <h5 class="card-title center-align">Aggiungi un Nuovo Evento</h5>
                <div class="row">
                    <form class="col s12 form"  role="form" method="POST" action="">
                        <div class="card-content">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input value="<?php echo $templateParams["evento"]["titolo"] ?>" id="titolo" type="text" name="titolo" required="" aria-required="true" class="validate">
                                    <label for="titolo">Titolo</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <select name="categoria" id="categoria" required="" aria-required="true" class="validate">
                                        <?php                   
                                            if(!empty($templateParams["categorie"])):
                                                
                                                foreach($templateParams["categorie"] as $categoria):

                                                    if($categoria["id"] == $templateParams["evento"]["id_categoria"]):
                                        ?>
                                                        <option selected="selected" value="<?php echo $categoria["id"]?>"><?php echo $categoria["nome"]?></option>
                                        <?php       else:       ?>
                                                        <option value="<?php echo $categoria["id"]?>"><?php echo $categoria["nome"]?></option>
                                        <?php
                                                    endif;
                                                endforeach;
                                            endif;
                                        ?>
                                    </select>
                                    <label for="categoria">Categoria</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input value="<?php echo $templateParams["data_inizio"] ?>" id="data-inizio" type="text" name="data-inizio" required="" aria-required="true" class="datepicker">
                                    <label for="data-inizio">Data Inizio</label>
                                    <?php if(isset($templateParams["erroreDateTime"])): ?>
                                    <p><?php echo "<strong>".$templateParams["erroreDateTime"]."</strong>"; ?></p>
                                    <?php endif; ?>
                                    <span class="helper-text" data-error="errore nella data inserita" data-success=""></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input value="<?php echo $templateParams["ora_inizio"] ?>" id="ora-inizio" type="text" name="ora-inizio" required="" aria-required="true" class="timepicker">
                                    <label for="ora-inizio">Orario Inizio</label>
                                    <?php if(isset($templateParams["erroreDateTime"])): ?>
                                    <p><?php echo "<strong>".$templateParams["erroreDateTime"]."</strong>"; ?></p>
                                    <?php endif; ?>
                                    <span class="helper-text" data-error="errore nell'orario inserito" data-success=""></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input value="<?php echo $templateParams["data_fine"] ?>" id="data-fine" type="text" name="data-fine" required="" aria-required="true" class="datepicker">
                                    <label for="data-fine">Data Fine</label>
                                    <?php if(isset($templateParams["erroreDateTime"])): ?>
                                    <p><?php echo "<strong>".$templateParams["erroreDateTime"]."</strong>"; ?></p>
                                    <?php endif; ?>
                                    <span class="helper-text" data-error="errore nella data inserita" data-success=""></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input value="<?php echo $templateParams["ora_fine"] ?>" id="ora-fine" type="text" name="ora-fine" required="" aria-required="true" class="timepicker">
                                    <label for="ora-fine">Ora Fine</label>
                                    <?php if(isset($templateParams["erroreDateTime"])): ?>
                                    <p><?php echo "<strong>".$templateParams["erroreDateTime"]."</strong>"; ?></p>
                                    <?php endif; ?>
                                    <span class="helper-text" data-error="errore nell'orario inserito" data-success=""></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input value="<?php echo $templateParams["evento"]["luogo"] ?>" id="luogo" type="text" name="luogo" required="" aria-required="true" class="validate">
                                    <label for="luogo">Luogo</label>
                                </div>
                            </div><div class="row">
                                <div class="input-field col s12">
                                    <input value="<?php echo $templateParams["evento"]["immagine"] ?>" id="immagine" type="text" name="immagine">
                                    <label for="immagine">Immagine di Copertina</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="descrizione" class="materialize-textarea" name="descrizione"><?php echo $templateParams["evento"]["descrizione"] ?></textarea>
                                    <label for="descrizione">Descrizione</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input value="<?php echo $templateParams["evento"]["biglietti_totali"] ?>" id="biglietti-totali" type="number" name="biglietti-totali" min="0" max="99999" required="" aria-required="true" class="validate">
                                    <label for="biglietti-totali">Biglietti Disponibili</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input value="<?php echo $templateParams["evento"]["max_biglietti_ciascuno"] ?>" id="biglietti-ciascuno" type="number" name="biglietti-ciascuno" min="0" max="99999" required="" aria-required="true" class="validate">
                                    <label for="biglietti-ciascuno">Biglietti Acquistabili da ogni Utente</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input value="<?php echo $templateParams["evento"]["prezzo_biglietto"] ?>" id="prezzo" type="number" step="0.01" name="prezzo" min="0" max="99999" required="" aria-required="true" class="validate">
                                    <label for="prezzo">Prezzo Biglietto</label>
                                </div>
                            </div>
                            <div>
                                <label>
                                    <input <?php echo $templateParams["checkbox"] ?> type="checkbox" name="acquistabili-durante" class="filled-in" />
                                    <span>Possibilità di Acquisto ad Evento Iniziato</span>
                                    
                                </label>
                            </div>
                            <div class="divider"></div>
                            <div class="row">
                                <p class="card-action right-align">
                                    <button class="btn waves-effect waves-light" type="submit" name="submit">Conferma Modifiche</button>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>