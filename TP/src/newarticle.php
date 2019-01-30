<?php session_start();
  require('bdd.php');
  include "header.php";

if(isset($_POST['title'], $_POST['content'])) {
   if(!empty($_POST['title']) AND !empty($_POST['content'])) {
      
      $article_titre = htmlspecialchars($_POST['title']);
      $article_contenu = htmlspecialchars($_POST['content']);
     
      $query = $pdo->prepare('INSERT INTO article (title, content) VALUES(:title, :content)');
      $query->execute(array(
              'title' => $article_titre,
              'content' =>  $article_contenu));
      $message = 'Votre article a bien été posté';
   } else {
      $message = 'Veuillez remplir tous les champs';
   }
}

?>

<!DOCTYPE html>
<html>
<body>
<center>
	<div>
		 <h1> Ajouter un article</h1> <br>
	</div>


	<div> 
            <form method="post" action="newArticle.php?id=<?php echo $userId['id']; ?>""
                <fieldset>
                    <label  for="nom"></label>
                    <input  type="text" name="title" id="nom" placeholder="Title" />
                </fieldset>

                <fieldset>
                    <p>
                    </p>
                    <p>
                        <label for="precisions"></label>
                        <textarea placeholder="content" name="content" id="precisions" cols="40" rows="4"></textarea>
                    </p>
                </fieldset>
                <div>
                    <input type="submit" class="" name="send" value="Add article"/>
                </div> 
            </form>
            </center>
</body>
</html>