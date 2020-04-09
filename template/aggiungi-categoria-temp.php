<div class="container">
            <div class="valign-wrapper row login-box">
            <div class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4">

            <div class="row">
                <h5 class="card-title center-align">Aggiungi Categoria</h5>
                  <div class="row">
                        <form class="col s12 form formcategoria"  role="form" action="#" method="post">
                        <div class="card-content">
                          <div class="row">
                              <div class="input-field col s12">
                                  <input id="categoria" type="text" name="categoria" required="" aria-required="true" class="validate">
                                  <label for="categoria">Nome Categoria</label>
                                  <?php if(isset($templateParams["errorecategoria"])): ?>
                                     <p><?php echo "<strong>".$templateParams["errorecategoria"]."</strong>"; ?></p>
                                  <?php endif; ?>
                              </div>
                          </div>
                          <div class="row">
                              <div class="input-field col s12">
                                  <input id="immagine" type="text" name="immagine" required="" aria-required="true" class="validate">
                                  <label for="immagine">Immagine</label>
                              </div>
                          </div>
                          <div class="divider"></div>
                          <div class="row">
                                  <p class="card-action right-align">
                                      <button type="reset" id="reset" class="btn-flat waves-effect">Reset</button>
                                      <button class="btn waves-effect waves-light" type="submit" name="submit">Aggiungi</button>
                                  </p>
                          </div>
                        </div>
                        </form>
                  </div>
            </div>
              </div>
          </div>
      </div>