<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" ></script>
<script src="js/counter.js"></script>
<h4 class="admin-title">Benvenuto <?php echo($_SESSION["nome"]) ?> </h4>
<div class="row container">
            <section id="counter-stats" class="wow fadeInRight" data-wow-duration="1.4s">
                <div class="row">
                    <div class="col s6 stats">
                            <div class="row"><i class="fas fa-users"></i></div>
                            <span class="countnumber" data-count="<?php echo $dbh->getUsersNumber()[0]["COUNT(*)"]; ?>">0</span>
                            <h6>Utenti Registrati</h6>
                    </div>
                    <div class="col s6 stats">
                            <div class="row"><i class="fas fa-users-cog"></i></div>
                            <div class="countnumber" data-count="<?php echo $dbh->getManagersNumber()[0]["COUNT(*)"]; ?>">0</div>
                            <h6>Organizzatori Registrati</h6>
                    </div>
                </div>
                <div class="row">
                    <div class="col s6 stats">
                            <div class="row"><i class="fas fa-calendar-check"></i></div>
                            <span class="countnumber" data-count="<?php echo $dbh->getEventsNumber()[0]["COUNT(*)"]; ?>">0</span>
                            <h6>Eventi Totali</h6>
                    </div>
                    <div class="col s6 stats">
                            <div class="row"><i class="fas fa-money-bill"></i></div>
                            <div class="countnumber" data-count="<?php echo $dbh->getAllSoldTicketsNumber()[0]["COUNT(*)"]; ?>">0</div>
                            <h6>Biglietti Venduti</h6>
                    </div>
                </div>
            </section>
        </div>