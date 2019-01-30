<?php
  require('bdd.php');
  include "header.php";

  $page = 'compte';
?>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
    <center>       

        <h1>Connexion</h1> <br>

        <div>
            <?php
              if ($_SESSION['inscrit'] == true) {
                  echo '<div class="erreur success"><p>Votre compte a bien été créé !</p></div>';
                  $_SESSION['inscrit'] = false;
              }
            ?>
            <form action="login.php" method="POST" id="contact-form" enctype="multipart/form-data" class="col-xs-12">
                <?php
                  if (isset($erreur)) {
                      echo '<div><p>' . $erreur . '</p></div>';
                  }
                ?>
                <input type="text" class="reset" name="username" placeholder="Username"> <br><br>
                <input type="password" class="reset" name="password" placeholder="Password"> <br>
                <div style="text-align:center;"> <br>
                    <input type="submit" class="btn" name="send" value="Connexion"/>
                </div>
                <div class="inscription">
                    <a href="inscription.php" class="inscription">Pas encore membre ?<br> Inscrivez vous !</a>
                </div>
            </form>
        </div>
        <script src="./js/jquery.min.js">
        </script>
        <script src="./js/bootstrap.min.js">
        </script> 
    </body>
</html>