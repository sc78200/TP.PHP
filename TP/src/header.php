<?php session_start();
  require 'bdd.php';
  $_SESSION['open'] = true;
?>
<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>FORUM TP</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/bootstrap.css"/>
        <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
        <script src="script.js"></script>
    </head>

    <header> 
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Accueil</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"></li>
                </ul>

                <?php
                  if ($_SESSION['connected'] == TRUE) {
                      echo '<a href="profil.php">Mon profil</a> &nbsp';
                      echo '<a href="deconnexion.php">Deconnexion</a>';
                  } else {
                      echo '<a href="connexion.php">Connexion</a> &nbsp';
                      echo '<a href="inscription.php">Inscription</a>';
                  }
                ?>
            </div>
        </nav>
    </header>
    
</html>
