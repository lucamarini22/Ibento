<div class="valign-wrapper row register-box">
            <div class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4">
                <h5 class="card-title center-align">Modifica Profilo</h5>
                  <div class="row">
                    <form class="col s12" role="form" method="POST" action="">
                    <div class="card-content">
                    <div class="row">
                                <div class="input-field col s12">
                                    <input id="email" value="<?php echo($_SESSION["email"]); ?>" type="email" name="email" required="" aria-required="true" class="validate">
                                    <label for="email">Email</label>
                                    <span class="helper-text" data-error="email non valida" data-success="email valida"></span>
                                </div>
                          </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="partitaIVA" value="<?php echo($_SESSION["partitaiva"]); ?>" type="number" name="partitaIVA" required="" aria-required="true" class="validate">
                                <label for="partitaIVA">Partita IVA</label>
                            </div>
                            </div>
                                <div class="row">
                                <div class="input-field col s12">
                                    <input id="ragioneSociale" value="<?php echo($_SESSION["ragionesociale"]); ?>" type="text" name="ragioneSociale" required="" aria-required="true" class="validate">
                                    <label for="ragioneSociale">Ragione Sociale</label>
                                </div>
                            </div>
                            
                          <div class="row">
                              <div class="input-field col s12">
                                  <input id="password" type="password" name="password" required="" aria-required="true" class="validate">
                                  <label for="password">Modifica Password</label>
                                  <?php if(isset($templateParams["errorelunghezzapassword"])): ?>
                                    <p><?php echo "<strong>".$templateParams["errorelunghezzapassword"]."</strong>"; ?></p>
                                  <?php endif; ?>
                              </div>
                          </div>
                          <div class="row">
                                <div class="input-field col s12">
                                    <input id="password2" type="password" name="password2" required="" aria-required="true" class="validate">
                                    <label for="password2">Ripeti Nuova Password</label>
                                    <?php if(isset($templateParams["errorepassword"])): ?>
                                        <p><?php echo "<strong>".$templateParams["errorepassword"]."</strong>"; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                          <div class="divider"></div>
                          <div class="row">
                                  <p class="card-action right-align">
                                      <button class="btn waves-effect waves-light" type="submit" name="submit">Aggiorna</button>
                                  </p>
                          </div>
                    </div>
                        </form>
                  </div>
              </div>
          </div>
      </div>
      </div>