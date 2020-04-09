<div class="container">
            <div class="valign-wrapper row login-box">
            <div class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4">

            <div class="row">
                <h5 class="card-title center-align">Cancella Utente</h5>
                  <div class="row">
                        <form class="col s12 form"  role="form" action="#" method="post">
                        <div class="card-content">
                          <div class="row">
                              <div class="input-field col s12">
                                  <input id="email-to-delete" type="email" name="email-to-delete" class="validate">
                                  <label for="email-to-delete">Email dell'utente</label>
                                  <?php if(isset($templateParams["errorecancellazione"])): ?>
                                     <p><?php echo "<strong>".$templateParams["errorecancellazione"]."</strong>"; ?></p>
                                  <?php endif; ?>
                                  <span class="helper-text" data-error="email non valida" data-success="email valida"></span>
                              </div>
                          </div>
                          
                          <div class="divider"></div>
                          <div class="row">
                                  <p class="card-action right-align">
                                      <button type="reset" id="reset" class="btn-flat waves-effect">Reset</button>
                                      <button class="btn waves-effect waves-light" type="submit" name="submit">Cancella</button>
                                  </p>
                          </div>
                        </div>
                        </form>
                  </div>
            </div>
              </div>
          </div>
      </div>