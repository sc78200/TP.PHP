<?php

  $query = 'SELECT username, content, article FROM commentaire WHERE id = :id';
  $statement = $pdo->prepare($query);

  $id = strip_tags($_GET['id']);
  $statement->execute(['id' => $id]);

  $comment = $statement->fetch(PDO::FETCH_ASSOC);
  if ($comment === false) {
      http_response_code(404);
      die;
  }
?>