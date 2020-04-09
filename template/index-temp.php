
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" ></script>
<script src="js/index.js"></script>
<div class="no-pad-bot" id="index-banner">
    <div class="container section">
        <div class="row ">
            <div class="logo col s12 ">
                <!--<img class="responsive-img logo-home" src="." alt="Logo Ibento">-->
                <div class="row center title-home">
                    <h4 class="header col s12 light">Ibento, cerca il tuo evento</h4>
                </div>
            </div>
        </div>
    </div>
    <div class="parallax-container">
        <div class="parallax">
            <img src="https://cdn.evbstatic.com/s3-build/perm_001/622db6/django/images/homefeed/music-campaing-2-792-tablet.jpg" alt="Concerto dal vivo al chiuso nel qule il cantante si avvicina a uno spettatore" style="opacity: 1; transform: translate3d(-50%, 76.7809px, 0px);">
        </div>
    </div>
    <div class="section">
        <div class="row center valign-wrapper">
            
        <div class="col s12">
        <div class="carousel carousel-slider center carousel-index">
    
          <div class="carousel-item active eds-align--center" data-href="#one!" style="z-index: -2; opacity: 1; visibility: visible; transform: translateX(0px) translateX(-1184px) translateZ(0px);">
            <p><h2 class="teal-text description-index">Registrati o accedi a Ibento</h2></p>
            <img class="image-index height-px" alt="Registrati o accedi a Ibento" src="https://cdn.evbstatic.com/s3-build/perm_001/943562/django/images/assortments/overview/img-sm-millions.png">   
          </div>
          <div class="carousel-item teal-text eds-align--center" data-href="#two!" style="transform: translateX(0px) translateX(-592px) translateZ(0px); z-index: -1; opacity: 1; visibility: visible;">
            <p><h2 class="teal-text description-index">Cerca gli eventi a cui sei interessato</h2></p>
            <img class="image-index height-px" alt="Cerca gli eventi a cui sei interessato" src="//cdn.evbstatic.com/s3-build/perm_001/c946c4/django/images/assortments/overview/img-sm-orgApp.png">   
          </div>
          <div class="carousel-item teal-text eds-align--center" data-href="#three!" style="transform: translateX(0px) translateX(0px) translateX(0px) translateZ(0px); z-index: 0; opacity: 1; visibility: visible;">
            <p><h2 class="teal-text description-index">Acquista il biglietto</h2></p>
            <img class="image-index height-px" alt="Acquista il biglietto" src="https://cdn.evbstatic.com/s3-build/perm_001/09d797/django/images/assortments/overview/img-sm-epp.png">   
          </div>
          <div class="carousel-item teal-text eds-align--center" data-href="#four!" style="transform: translateX(0px) translateX(592px) translateZ(0px); z-index: -1; opacity: 1; visibility: visible;">
            <p><h2 class="teal-text description-index">E divertiti!</h2></p>
            <img class="image-index height-px" alt="Persone che si divertono" src="https://cdn.evbstatic.com/s3-build/perm_001/19e26b/django/images/assortments/overview/img-sm-dance.png">   
          </div>
        <ul class="indicators"><li class="indicator-item"></li><li class="indicator-item"></li><li class="indicator-item"></li><li class="indicator-item"></li></ul></div>
        </div>
        </div>
    </div>
    <div class="parallax-container">
        <div class="parallax">
            <img src="https://cdn.evbstatic.com/s3-build/perm_001/1570cc/django/images/homefeed/music-campaing-1-792-tablet.jpg" alt="Una cantante che indica il pubblico mentre si esibisce dal vivo al chiuso, accompagnata da altri tre cantinti" style="opacity: 1; transform: translate3d(-50%, 9.84544px, 0px);">
        </div>
    </div>
    <div class="section white">
        <div class="row container center">
            <h3>I nostri eventi</h3>
        </div>
        <div class="row container">
            <section id="counter-stats" class="wow fadeInRight" data-wow-duration="1.4s">
                <div class="row">
                    <div class="col s3 stats">
                            <div class="row"><i class="fas fa-music"></i></div>
                            <span class="countnumber" data-count="<?php echo $dbh->getNumberOfTicketsFromCategory(5)[0]["COUNT(*)"]; ?>">0</span>
                            <h6>Musica</h6>
                    </div>
                    <div class="col s3 stats">
                            <div class="row"><i class="fas fa-motorcycle"></i></div>
                            <div class="countnumber" data-count="<?php echo $dbh->getNumberOfTicketsFromCategory(2)[0]["COUNT(*)"]; ?>">0</div>
                            <h6>Motori</h6>
                    </div>
                    <div class="col s3 stats">
                            <div class="row"><i class="far fa-futbol"></i></div>
                            <div class="countnumber" data-count="<?php echo $dbh->getNumberOfTicketsFromCategory(3)[0]["COUNT(*)"]; ?>">0</div>
                            <h6>Sport</h6>
                    </div>
                    <div class="col s3 stats">
                            <div class="row"><i class="fas fa-utensils"></i></div>
                            <div class="countnumber" data-count="<?php echo $dbh->getNumberOfTicketsFromCategory(1)[0]["COUNT(*)"]; ?>">0</div>
                            <h6>Cibo</h6>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="parallax-container no-margin-bottom">
        <div class="parallax">
            <img src="https://cdn.evbstatic.com/s3-build/perm_001/b56dcc/django/images/homefeed/music-campaing-4-792-tablet.jpg" alt="Un cantante che si esibisce in un concerto dal vivo al chiuso con gente che si diverte" style="opacity: 1; transform: translate3d(-50%, 3.07125px, 0px);">
        </div>
    </div>
</div>

