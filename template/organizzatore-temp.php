<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" ></script>
<script src="js/counter.js"></script>

<?php if(isManagerLoggedIn()): ?>
    <h4 style="text-align: center; margin-bottom: 10%">Benvenuto <?php echo($_SESSION["username"]) ?> </h4>
    <?php if(isset($templateParams["nonaccettato"])): ?>
        <h5 class="accettazione" style="text-align: center; margin-bottom: 75%"><?php echo $templateParams["nonaccettato"]; ?></h5>
    <?php else:?>
        <div class="row container">
            <section id="counter-stats" class="wow fadeInRight" data-wow-duration="1.4s">
                <div class="row">
                    <div class="col s6 stats">
                            <div class="row"><i class="fas fa-calendar-check"></i></div>
                            <span class="countnumber" data-count="<?php echo $dbh->getEventsByManager($_SESSION["username"])[0]["COUNT(*)"] ?>">0</span>
                            <h6>Eventi Pubblicati</h6>
                    </div>
                    <div class="col s6 stats">
                            <div class="row"><i class="fas fa-hand-holding-usd"></i></div>
                            <div class="countnumber" data-count="<?php echo $dbh->getSoldTickets($_SESSION["username"])[0]["SUM(`biglietti_venduti`)"] ?>">0</div>
                            <h6>Biglietti Venduti</h6>
                    </div>
                </div>
            </section>
        </div>
    <?php endif; ?>
<?php else:?>
    <?php  $templateParams["titolo"] = "Home";
            header("Location: index.php");
            exit; ?>
<?php endif;?>