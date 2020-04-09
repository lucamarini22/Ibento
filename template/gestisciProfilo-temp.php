        <div class="valign-wrapper row register-box">
            <div class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4">
                <h5 class="card-title center-align">Modifica Profilo</h5>
                <div class="row center user-view">
                    <a>
                      <img src="<?php echo($_SESSION["immagine"])?>" alt="" class="circle responsive-img" style="width: 100px; height: 100px;">
                    </a>
                </div>
                  <div class="row">
                    <form class="col s12" role="form" method="POST" action="">
                    <div class="card-content">
                        <div class="row">
                        <div class="input-field col s12">
                            <input id="name" value="<?php echo($_SESSION["nome"]); ?>" type="text" name="name" required="" aria-required="true" class="validate">
                            <label for="name">Nome</label>
                        </div>
                        </div>
                            <div class="row">
                            <div class="input-field col s12">
                                <input id="surname" value="<?php echo($_SESSION["cognome"]); ?>" type="text" name="surname" required="" aria-required="true" class="validate">
                                <label for="surname">Cognome</label>
                            </div>
                        </div>
                          <div class="row">
                              <div class="input-field col s12">
                                  <input id="email" value="<?php echo($_SESSION["email"]); ?>" type="email" name="email" required="" aria-required="true" class="validate">
                                  <label for="email">Email</label>
                                  <span class="helper-text" data-error="email non valida" data-success="email valida"></span>
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
                            <div class="row">
                                <div class="file-field input-field col s12">
                                    <div class="btn waves-light">
                                      <span>File</span>
                                      <input name="newavatar" type="file">
                                    </div>
                                    <div class="file-path-wrapper">
                                      <input class="file-path validate" type="text" name="immagine" placeholder="Carica immagine">
                                    </div>
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