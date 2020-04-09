<h4 style="text-align: center; margin-bottom: 10%"> Accettazione organizzatori</h4>
<?php foreach($templateParams["organizzatori"] as $organizzatore): ?>
    <div class="col s12 m7 margin8">
        <div class="card horizontal hoverable">
            <div class="card-stacked">
            <form role="form" action="#" method="post">
                <div class="card-content">
                    <p id="username" name="username"><?php echo '<strong>'."Nome: ".'</strong>'.$organizzatore["username"]; ?></p>
                    <p id="email" name="email"><?php echo '<strong>'."Email: ".'</strong>'.$organizzatore["email"]; ?></p>
                    <p id="ragioneSociale" name="ragioneSociale"><?php echo '<strong>'."Ragione sociale: ".'</strong>'.$organizzatore["ragioneSociale"]; ?></p>  
                    <p id="partitaIVA" name="partitaIVA"><?php echo '<strong>'."Partita IVA: ".'</strong>'.$organizzatore["partitaIVA"]; ?></p>                   
                </div>
                <div class="row no-margin">
                    
                        <p class="card-action right-align">
                            <button class="btn waves-effect waves-light accept" type="submit" name="submit" value="<?php echo $organizzatore["username"]."/".$organizzatore["email"]; ?>">Accetta</button>
                        </p>
                   
                </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>