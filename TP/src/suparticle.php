<?php session_start();

 require('bdd.php');

if(isset($_GET['id']) AND !empty($_GET['id'])) {
   $suppr_id = htmlspecialchars($_GET['id']);
   $suppr = $bdd->prepare('DELETE FROM articles WHERE id = ?');
   $suppr->execute(array($suppr_id));