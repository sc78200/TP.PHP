<?php
  include 'header.php';
  require('bdd.php');

  $page = 'compte';

  // Vérification de la validité des informations
// Hachage du mot de passe
  $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Insertion

  if ($_SESSION['open']) {

      if ($_POST['password'] === $_POST['password_confirm'] && isset($_POST['password']) && isset($_POST['password_confirm'])) {

          echo'les mdp correspondent bien';

          $query = $pdo->prepare('INSERT INTO user(username, password) VALUES(:username, :password)');
          $query->execute(array(
              'username' => $_POST['username'],
              'password' => $pass_hache));

          if (!$query) {
              echo "\nPDO::errorInfo():\n";
              print_r($pdo->errorInfo());
          } else {

              echo 'Inscription faite !';
              echo 'Cliquez <a href="connexion.php">ici <a> pour vous connecter !';
          }
      } 
  } 
?>


<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <title>Titre de la page</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/bootstrap.css"/>
        <script src="script.js"></script>
    </head>

    <body>
    <center>
        <form class="form-horizontal" action='inscription.php' method="POST">
            <fieldset> <br>

                <h1>Registration</h1> <br>

                <div class="control-group">
                    <!-- Username -->
                    <label class="control-label"  for="username">Username</label>
                    <div class="controls">
                        <input type="text" id="username" name="username" placeholder="" class="input-xlarge">
                    </div>
                </div>

                <div class="control-group">
                    <!-- Password-->
                    <label class="control-label" for="password">Password</label>
                    <div class="controls">
                        <input type="password" id="password" name="password" placeholder="" class="input-xlarge">
                    </div>
                </div>
                <div class="control-group">
                    <!-- Password2-->
                    <label class="control-label" for="password">Confirm password</label>
                    <div class="controls">
                        <input type="password" id="password" name="password_confirm" placeholder="" class="input-xlarge">
                    </div>
                </div>
                <br>
                <div class="control-group">
                    <!-- Button -->
                    <div class="controls">
                        <button class="btn btn-success">Register</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </center>
</body>
</html>