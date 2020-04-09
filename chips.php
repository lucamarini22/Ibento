<?php
    $nomeCategoria = $_GET["nome"];
    $idcategoria = $_GET["idcategoria"];
    $immagineCategoria = $_GET["immagine"];

?>
<li id="<?php echo $nomeCategoria;?>" class="tab">
    <input type="hidden" name="categorie[]" value="<?php echo $idcategoria?>">
    <div id="categoria-selezionata" class="chip left" onclick="rimuoviLi('<?php echo $nomeCategoria;?>')">
    <i class=" small <?php echo $immagineCategoria?>"></i>            
    </div>
</li> 

