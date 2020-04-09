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
                                    <input id="titolo" type="text" name="titolo" maxlength="20" required="" aria-required="true" class="validate">
                                    <label for="titolo">Titolo</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <select name="categoria" id="categoria" required="" aria-required="true" class="validate">
                                        <?php                   
                                            if(!empty($templateParams["categorie"])):
                                                
                                                foreach($templateParams["categorie"] as $categoria):
                                                
                                        ?>
                                        <option value="<?php echo $categoria["id"]?>"><?php echo $categoria["nome"]?></option>
                                        <?php
                                            endforeach;
                                            endif;
                                        ?>
                                    </select>
                                    <label for="categoria">Categoria</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input required="" aria-required="true" id="data-inizio" name="data-inizio" type="text" class="datepicker">
                                    <label for="text">Data Inizio</label>
                                    <?php if(isset($templateParams["erroreDateTime"])): ?>
                                    <p><?php echo "<strong>".$templateParams["erroreDateTime"]."</strong>"; ?></p>
                                    <?php endif; ?>
                                    <span class="helper-text" data-error="errore nella data inserita" data-success=""></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input required="" aria-required="true" id="ora-inizio" name="ora-inizio" type="text" class="timepicker">
                                    <label for="text">Ora Inizio</label>
                                    <?php if(isset($templateParams["erroreDateTime"])): ?>
                                    <p><?php echo "<strong>".$templateParams["erroreDateTime"]."</strong>"; ?></p>
                                    <?php endif; ?>
                                    <span class="helper-text" data-error="errore nell'orario inserito" data-success=""></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input required="" aria-required="true" id="data-fine" name="data-fine" type="text" class="datepicker">
                                    <label for="text">Data Fine</label>
                                    <?php if(isset($templateParams["erroreDateTime"])): ?>
                                    <p><?php echo "<strong>".$templateParams["erroreDateTime"]."</strong>"; ?></p>
                                    <?php endif; ?>
                                    <span class="helper-text" data-error="errore nella data inserita" data-success=""></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input required="" aria-required="true" id="ora-fine" name="ora-fine" type="text" class="timepicker">
                                    <label for="text">Ora Fine</label>
                                    <?php if(isset($templateParams["erroreDateTime"])): ?>
                                    <p><?php echo "<strong>".$templateParams["erroreDateTime"]."</strong>"; ?></p>
                                    <?php endif; ?>
                                    <span class="helper-text" data-error="errore nell' orario inserito" data-success=""></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="luogo" type="text" name="luogo" required="" aria-required="true" class="validate">
                                    <label for="luogo">Luogo</label>
                                </div>
                            </div><div class="row">
                                <div class="input-field col s12">
                                    <input id="immagine" type="text" name="immagine">
                                    <label for="immagine">Immagine di Copertina</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="descrizione" class="materialize-textarea" name="descrizione"></textarea>
                                    <label for="descrizione">Descrizione</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="biglietti-totali" type="number" name="biglietti-totali" min="0" max="99999" required="" aria-required="true" class="validate">
                                    <label for="biglietti-totali">Biglietti Disponibili</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="biglietti-ciascuno" type="number" name="biglietti-ciascuno" min="0" max="99999" required="" aria-required="true" class="validate">
                                    <label for="biglietti-ciascuno">Biglietti Acquistabili da ogni Utente</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="prezzo" type="number" step="0.01" name="prezzo" min="0" max="99999" required="" aria-required="true" class="validate">
                                    <label for="prezzo">Prezzo Biglietto</label>
                                </div>
                            </div>
                            <div>
                                <label>
                                    <input type="checkbox" name="acquistabili-durante" class="filled-in" />
                                    <span>Possibilità di Acquisto ad Evento Iniziato</span>                                    
                                </label>
                            </div>
                            <div class="divider"></div>
                            <div class="row">
                                <p class="card-action right-align">
                                    <button type="reset" id="reset" class="btn-flat waves-effect">Reset</button>
                                    <button class="btn waves-effect waves-light" type="submit" name="submit">Crea Evento</button>
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>