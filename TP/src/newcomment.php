<?php
    require('bdd.php');
    include "header.php";



  $query = $pdo->prepare('INSERT INTO commentaire (username, content) VALUES(:username, :content)');
  $query->execute(array(
      'content' => $_POST['content'],
      'username' => $_POST['username']));

  if (!$query) {
      echo "\nPDO::errorInfo():\n";
      print_r($pdo->errorInfo());
  }

  header("Location:details.php?id=<?php echo $data['id']; ?>");
  