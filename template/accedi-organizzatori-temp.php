<div class="container">
            <div class="valign-wrapper row login-box">
            <div class="col card hoverable s10 pull-s1 m6 pull-m3 l4 pull-l4">

            <div class="row">
                <h5 class="card-title center-align">Login area organizzatori</h5>
                  <div class="row">
                        <form class="col s12 form"  role="form" method="POST" action="#">
                        <div class="card-content">
                          <div class="row">
                              <div class="input-field col s12">
                                  <input id="email" type="email" name="email" required="" aria-required="true" class="validate">
                                  <label for="email">Email</label>
                                  <span class="helper-text" data-error="email non valida" data-success="email valida"></span>
                              </div>
                          </div>
                          <div class="row">
                              <div class="input-field col s12">
                                  <input id="password" type="password" name="password" required="" aria-required="true" class="validate">
                                  <label for="password">Password</label>
                                  <?php if(isset($templateParams["errorelogin"])): ?>
                                     <p><?php echo "<strong>".$templateParams["errorelogin"]."</strong>"; ?></p>
                                  <?php endif; ?>
                              </div>
                          </div>
                          <div>
                            <label>
                                <input type="checkbox" name="checkbox-admin" class="filled-in" />
                                <span>Sono un amministratore</span>
                                
                            </label>
                          </div>
                          <div class="divider"></div>
                          <div class="row">
                                  <p class="card-action right-align">
                                      <button type="reset" id="reset" class="btn-flat waves-effect">Reset</button>
                                      <button class="btn waves-effect waves-light" type="submit" name="submit">Login</button>
                                  </p>
                          </div>
                        </div>
                        </form>
                  </div>
            </div>
              </div>
          </div>
      </div>