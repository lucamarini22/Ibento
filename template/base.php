<!DOCTYPE html>
<html lang="it">
    <head>
        <title> Ibento </title>
        <link rel = "icon" href = "upload/logo.php" type = "image/x-icon"> 
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen"/>
        <link type="text/css" rel="stylesheet" href="css/style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!-- Import Font Awesome Icons-->
        <script> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
        <!-- Import Pusher-->
        <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
    </head>
    <body>
        <main>
        <div class="navbar-fixed">
        <nav>
        <div class="nav-wrapper">
        <a href="index.php" class="center brand-logo">Ibento</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <?php if(isUserLoggedIn()): ?>
                <li><a href="carrello.php">Carrello</a></li>
                <li><a href="lista-interessi.php">I miei interessi</a></li>
                <li><a href="lista-biglietti.php">Biglietti acquistati</a></li>
                <li><a href="gestisci-profilo.php">Modifica profilo</a></li>
                <li class="exit"><a class="exit" href="esci.php">Esci</a></li>
            <?php elseif(isset($templateParams["nonaccettato"])): ?>
                <li class="exit"><a class="exit" href="esci.php">Esci</a></li>
            <?php elseif(isManagerLoggedIn()): ?>
                <li><a href="lista-organizzatore.php">Gestisci eventi</a></li>
                <li><a href="gestisci-profilo-organizzatore.php">Modifica profilo</a></li>
                <li class="exit"><a class="exit" href="esci.php">Esci</a></li>
            <?php elseif(isAdminLoggedIn()): ?>
                <li><a href="cancella-utente.php">Cancella utente</a></li>
                <li><a href="aggiungi-categoria.php">Inserisci categoria</a></li>
                <li><a href="accetta-organizzatori.php">Accetta organizzatori</a></li>
                <li class="exit"><a class="exit" href="esci.php">Esci</a></li>
            <?php else:?>
                <li><a href="accedi.php">Accedi</a></li>
                <li><a href="registrati.php">Registrati</a></li>
            <?php endif;?>
        </ul>
        </div>
        </nav>
        </div>
        <ul class="sidenav" id="mobile-demo">
        <?php if(isUserLoggedIn()): ?>
                <li><a href="carrello.php"><i class="material-icons">shopping_cart</i>Carrello</a></li>
                <li><a href="lista-interessi.php"><i class="material-icons">favorite</i>I miei interessi</a></li>
                <li><a href="lista-biglietti.php"><i class="material-icons">event</i>Biglietti acquistati</a></li>
                <li><a href="gestisci-profilo.php"><i class="material-icons">account_circle</i>Modifica profilo</a></li>
                <li class="exit"><a class="exit" href="esci.php"><i class="material-icons">exit_to_app</i>Esci</a></li>
        <?php elseif(isset($templateParams["nonaccettato"])): ?>
            <li class="exit"><a class="exit" href="esci.php"><i class="material-icons">exit_to_app</i>Esci</a></li>
        <?php elseif(isManagerLoggedIn()): ?>
                <li><a href="lista-organizzatore.php"><i class="material-icons">build</i>Gestisci eventi</a></li>
                <li><a href="gestisci-profilo-organizzatore.php"><i class="material-icons">account_circle</i>Modifica profilo</a></li>
                <li class="exit"><a class="exit" href="esci.php"><i class="material-icons">exit_to_app</i>Esci</a></li>
        <?php elseif(isAdminLoggedIn()): ?>
                <li><a href="cancella-utente.php"><i class="material-icons">delete</i>Cancella utente</a></li>
                <li><a href="aggiungi-categoria.php"><i class="material-icons">category</i>Inserisci categoria</a></li>
                <li><a href="accetta-organizzatori.php"><i class="material-icons">done</i>Accetta organizzatori</a></li>
                <li class="exit"><a class="exit" href="esci.php"> <i class="material-icons">exit_to_app</i>Esci</a></li>
        <?php else:?>
                <li><a href="accedi.php"><i class="material-icons">input</i>Accedi</a></li>
                <li><a href="registrati.php"><i class="material-icons">assignment</i>Registrati</a></li>
        <?php endif;?>
        </ul>
        <?php
        if(isset($templateParams["nome"])){
            require($templateParams["nome"]);
        }
        ?>
        </main>
        <footer class="page-footer">
            <div class="container">
                <div class="row">
                <div class="col l4 s12">
                    <h5 class="white-text">Ibento</h5>
                    <h6>Cerca, clicca, divertiti</h6>
                </div>
                <div class="col l4 s12">
                    <h5 class="white-text">Seguici su</h5>
                    <a class="waves-effect waves-light btn-floating social facebook">
                    <i class="fab fa-facebook-f"></i> Sign in with facebook</a>
                    <a class="waves-effect waves-light btn-floating social instagram">
                    <i class="fab fa-instagram"></i> Sign in with instagram</a>
                </div>
                <div class="col l4 s12">
                    <h5 class="white-text">Hai eventi da proporre? <br>Unisciti a noi!</h5>
                    <ul>
                    <li><a class="grey-text text-lighten-3" href="registrati-organizzatori.php">Registrati</a></li>
                    <li><a class="grey-text text-lighten-3" href="accedi-organizzatori.php">Accedi</a></li>
                    </ul>
                </div>
                </div>
            </div>
            <div  class="darken-3 footer-copyright">
                <div class="container darken-3">
                © Copyright 2020 Ibento - Tutti i diritti riservati.
                <a class="grey-text text-lighten-4 right" href="https://www.unibo.it/it">Unibo</a>
                </div>
            </div>
            </footer>   
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="js/materialize.min.js"></script>
        <script src="js/home.js"></script>
        <script src="js/eventList.js"></script>
        <script src="js/carrello.js"></script>
        <script src="js/payment.js"></script>
        <script src="js/accettazione-organizzatori.js"></script>
    </body>
<!-- FROM HERE -> MANAGE COOKIES -->
<? if (empty($_COOKIE['PHPSESSID'])): ?>
    <div class="js-cookie-consent cookie-consent">
        <div class="row container">
        <div class="section col s8">
            <p class="cookie-consent__message">
                Questo sito web utilizza cookie tecnici per fornire alcuni servizi. Continuando la navigazione, o cliccando sul pulsante di seguito, acconsenti al loro utilizzo in conformità alla nostra Informativa sulla Privacy e Cookie Policy. Il consenso può essere revocato in qualsiasi momento
            </p>
            <p><a href="https://www.garanteprivacy.it/cookie" style="color:teal;  text-decoration: underline;">Informativa Cookie completa</a></p>
        </div>
        <div class="button-cookie right-align">
            <button class="js-cookie-consent-agree cookie-consent__agree btn right-align">
                Accetta
            </button>
        </div>
        </div>
    </div>
<? endif; ?>

<script>
 window.laravelCookieConsent = (function () {
            const COOKIE_VALUE = 1;
            const COOKIE_DOMAIN = 'ibento.com';

            function consentWithCookies() {
                setCookie('cookie_consent', COOKIE_VALUE, 7300);
                hideCookieDialog();
            }

            function cookieExists(name) {
                return (document.cookie.split('; ').indexOf(name + '=' + COOKIE_VALUE) !== -1);
            }

            function hideCookieDialog() {
                const dialogs = document.getElementsByClassName('js-cookie-consent');

                for (let i = 0; i < dialogs.length; ++i) {
                    dialogs[i].style.display = 'none';
                }
            }

            function setCookie(name, value, expirationInDays) {
                const date = new Date();
                date.setTime(date.getTime() + (expirationInDays * 24 * 60 * 60 * 1000));
                document.cookie = name + '=' + value
                    + ';expires=' + date.toUTCString()
                    + ';domain=' + COOKIE_DOMAIN
                    + ';path=/';
                    
                }

            if (cookieExists('cookie_consent')) {
                hideCookieDialog();
            }

            const buttons = document.getElementsByClassName('js-cookie-consent-agree');

            for (let i = 0; i < buttons.length; ++i) {
                buttons[i].addEventListener('click', consentWithCookies);
            }

            return {
                consentWithCookies: consentWithCookies,
                hideCookieDialog: hideCookieDialog
            };
        })();  
    </script>
</html>