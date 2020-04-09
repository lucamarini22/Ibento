<div class="container">
            <div class="valign-wrapper row register-box">
            <div class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4">
            <div class="row">
                <h5 class="card-title center-align">Registrazione come organizzatore</h5>
                  <div class="row">
                        <form class="col s12 form"  role="form" method="POST" action="">
                        <div class="card-content">
                        <div class="row">
                        <div class="input-field col s12">
                            <input id="name" type="text" name="name" required="" aria-required="true" class="validate">
                            <label for="name">Nome attività</label>
                        </div>
                        </div>
                          <div class="row">
                              <div class="input-field col s12">
                                  <input id="email" type="email" name="email" required="" aria-required="true" class="validate">
                                  <label for="email">Email</label>
                                  <?php if(isset($templateParams["erroreemail"])): ?>
                                    <p><?php echo "<strong>".$templateParams["erroreemail"]."</strong>"; ?></p>
                                  <?php endif; ?>
                                  <span class="helper-text" data-error="email non valida" data-success="email valida"></span>
                              </div>
                          </div>
                          <div class="row">
                            <div class="input-field col s12">
                                <input id="partitaIVA" type="number" name="partitaIVA" min="0" max="99999999999" required="" aria-required="true" class="validate">
                                <label for="partitaIVA">Partita IVA</label>
                                <?php if(isset($templateParams["errorepartitaiva"])): ?>
                                    <p><?php echo "<strong>".$templateParams["errorepartitaiva"]."</strong>"; ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="ragioneSociale" type="text" required="" aria-required="true" name="ragioneSociale" class="validate">
                                <label for="ragioneSociale">Ragione Sociale</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                            <textarea id="textarea1" class="materialize-textarea" required="" aria-required="true" name="description"></textarea>
                            <label for="textarea1">Descrizione</label>
                            </div>
                        </div>
                          <div class="row">
                              <div class="input-field col s12">
                                  <input id="password" type="password" required="" aria-required="true" name="password" class="validate">
                                  <label for="password">Password</label>
                                  <?php if(isset($templateParams["errorelunghezzapassword"])): ?>
                                    <p><?php echo "<strong>".$templateParams["errorelunghezzapassword"]."</strong>"; ?></p>
                                  <?php endif; ?>
                              </div>
                          </div>
                          <div class="row">
                                <div class="input-field col s12">
                                    <input id="password2" type="password" required="" aria-required="true" name="password2" class="validate">
                                    <label for="password2">Ripeti Password</label>
                                    <?php if(isset($templateParams["errorepassword"])): ?>
                                    <p><?php echo "<strong>".$templateParams["errorepassword"]."</strong>"; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                          <div class="divider"></div>
                          <div class="row">
                                  <p class="card-action right-align">
                                      <button type="reset" id="reset" class="btn-flat waves-effect">Reset</button>
                                      <button class="btn waves-effect waves-light" type="submit" name="submit">Crea account</button>
                                  </p>
                          </div>
                        </div>
                        </form>
                  </div>
              </div>
          </div>
            </div>
      </div>