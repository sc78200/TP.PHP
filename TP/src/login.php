<?php

  require 'bdd.php';
  session_start();
  // V�rification de la validit� des informations
//  R�cup�ration de l'utilisateur et de son pass hash�
  $query = $pdo->prepare('SELECT password FROM user WHERE username = :username');
  $query->execute(array(
      'username' => $_POST['username']));
  $resultat = $query->fetch();


// Comparaison du pass envoy� via le formulaire avec la base
  $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);

  if (!$resultat) {
      echo 'ERR requete!';
  } else {

      if ($isPasswordCorrect) {
          $_SESSION['username'] = $_POST['username'];
          $_SESSION['connected'] = TRUE;
          header('Location:profil.php');
      } else {
          echo 'Mauvais identifiant ou mot de passe !';
      }
  }
  
  
