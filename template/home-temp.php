<div id="container-home" class="container">
    <div class="row">

        
            <form action="event-list.php" method="POST">

                <div class="input-field">
                    <input onchange="qualsiasiData()" value="Qualsiasi data" id="data-input" name="date" type="text" class="datepicker">
                    <label for="text">Quando</label>
                </div>

                <div class="input-field">
                    
                    <div class="input-field">
                        <select name="where" id="dove-input">
                        <option value="" selected>Qualsiasi luogo</option>
                        <?php                   
                            if(!empty($templateParams["città"])):
                                
                                foreach($templateParams["città"] as $citta):
                                   
                        ?>
                        <option value="<?php echo $citta["luogo"]?>"><?php echo $citta["luogo"]?></option>
                        <?php endforeach;
                        endif;?>
                        </select>
                        <label>Dove</label>
                    </div>

                </div>
                        
                <div class="row">
                    <div class="col s12">
                        
                        <label for="selezionate">Categorie selezionate</label>
                        <ul name="categories" id ="selezionate" class="tabs tabs-fixed-width tab-demo z-depth-1" ></ul>
                        
                        
                    </div>
                    
                </div>
                
                <div id="#elenco" class="row">
                    <div class="col s12">
                    <label for="selezionate">Tutte le categorie</label>
                        <table>
                            <tbody>
                                <?php if(isset($templateParams["categorie"])):
                                        foreach($templateParams["categorie"] as $categoria):?>
                                <tr onclick="addCategorie('<?php echo $categoria['id']?>','<?php echo $categoria['nome']?>','<?php echo $categoria['immagine']?>')">
                                    <td id="img-categoria"><i class="<?php echo $categoria["immagine"]?>"  style="font-size:48px;"></i></td>
                                    <td id="nome-categoria"><?php echo $categoria["nome"]?></td>
                                </tr>
                                        <?php endforeach;?>
                                    <?php endif;?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <button id="cerca" class="btn waves-effect waves-light right" type="submit" on >CERCA
                    <i class="material-icons right">search</i>
                </button>
               
            </form>
            


    
    </div>
</div>
