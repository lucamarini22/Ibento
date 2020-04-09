<!DOCTYPE html>
<html>
    <head>
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
        <link type="text/css" rel="stylesheet" href="css/style.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <!-- Import Font Awesome Icons-->
        <script type="text/javascript"> (function() { var css = document.createElement('link'); css.href = 'https://use.fontawesome.com/releases/v5.1.0/css/all.css'; css.rel = 'stylesheet'; css.type = 'text/css'; document.getElementsByTagName('head')[0].appendChild(css); })(); </script>
    </head>
    <body>
        <main>
       
        <div class="navbar-fixed">
        <nav>
        <div class="nav-wrapper">
        <a href="index.php" class="center brand-logo">Ibento</a>
        <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="accedi.php">Carrello</a></li>
            <li><a href="registrati.php">I miei eventi</a></li>
            <li><a href="gestisci-profilo.php">Modifica profilo</a></li>
            <li class="exit"><a class="exit" onclick="clearSession()">Esci</a></li>


        </ul>
        </div>
        </nav>
        </div>
        <ul class="sidenav" id="mobile-demo">
        <li><a href="accedi.php">Carrello</a></li>
            <li><a href="registrati.php">Miei eventi</a></li>
            <li><a href="gestisci-profilo.php">Modifica profilo</a></li>
            <li class="exit"><a class="exit" onclick="clearSession()">Esci</a></li>
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
            <div class="darken-3 footer-copyright">
                <div class="container darken-3">
                © Copyright 2019 Ibento - Tutti i diritti riservati.
                <a class="grey-text text-lighten-4 right" href="https://www.unibo.it/it">Unibo</a>
                </div>
            </div>
            </footer>
       
        
         
           
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script type="text/javascript" src="js/materialize.min.js"></script>
        <script type="text/javascript" src="js/home.js"></script>
        <script type="text/javascript" src="js/eventList.js"></script>
        <script type="text/javascript" src="js/index.js"></script>

    </body>
</html>