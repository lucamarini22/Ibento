 <div class="container">
            <div class="valign-wrapper row register-box">
            <div class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4">
            <div class="row">
                <h5 class="card-title center-align">Registrazione</h5>
                  <div class="row">
                        <form class="col s12 form"  role="form" method="POST" action="">
                        <div class="card-content">
                        <div class="row">
                        <div class="input-field col s12">
                            <input id="name" type="text" name="name" required="" aria-required="true" class="validate">
                            <label for="name">Nome</label>
                        </div>
                        </div>
                            <div class="row">
                            <div class="input-field col s12">
                                <input id="surname" type="text" name="surname" required="" aria-required="true" class="validate">
                                <label for="surname">Cognome</label>
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
                                  <input id="password" type="password" name="password" required="" aria-required="true" class="validate">
                                  <label for="password">Password</label>
                                  <?php if(isset($templateParams["errorelunghezzapassword"])): ?>
                                    <p><?php echo "<strong>".$templateParams["errorelunghezzapassword"]."</strong>"; ?></p>
                                  <?php endif; ?>
                              </div>
                          </div>
                          <div class="row">
                                <div class="input-field col s12">
                                    <input id="password2" type="password" name="password2" required="" aria-required="true" class="validate">
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