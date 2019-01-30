<?php session_start(); ?>
<!DOCTYPE html>
<html>    
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap.css"/>
    <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
    <head>
        <title></title>
    </head>
    <?php
      include 'header.php';
    ?>

    <body>
    <center>
       <!--affiche tout le contenu d'un articel-->
        <?php
          $query = 'SELECT title, content, author FROM article WHERE id = :id';
          $statement = $pdo->prepare($query);

          $id = strip_tags($_GET['id']);
          $statement->execute(['id' => $id]);

          $article = $statement->fetch(PDO::FETCH_ASSOC);
          if ($article === false) {
              http_response_code(404);
              die;
          }
        ?>

        <?php
          $statement = $pdo->prepare('SELECT * FROM commentaire WHERE article = ? ORDER BY id DESC'); //Selectionne uniquement les com qui correspondent a l'article
          $statement->execute(array($id));


          //Ajout d'un comentaire dans la bdd
          if (isset($_POST['submit_com'])) {
            if (isset($_POST['pseudo'], $_POST['content']) AND !empty($_POST['pseudo']) AND !empty($_POST['content'])
              ) {
                $pseudo = htmlspecialchars($_POST['pseudo']);
                $content = htmlspecialchars($_POST['content']);
                if (strlen($pseudo) < 25) {
                  $ins = $pdo->prepare('INSERT INTO commentaire (username, content, article VALUES (?, ?, ?)');
                  $ins->execute(array($pseudo,$content,$id));

                } else {
                  $c_msg = "Erreur le pseudo doit faire moins de 25 caractères";
                }
            } else {
              $c_msg = "Erreur remplir tous les champs ! ";
            }
          }


        ?>
        <div class="container">
            <div class="">
                <h1><?php echo $article['title']; ?></h1>
                <p><?php echo $article['content']; ?></p>
                <p>by : <?php echo $article['author']; ?></p>
            </div>

            <div> 
                <?php while ($data = $statement->fetch(PDO::FETCH_ASSOC)): ?>
                      <thead>
                          <tr>
                            <th><b><?php echo $data['username']; ?></b>:</th>   

                            <th> <?php echo $data['content']; ?></th>  
                          </tr>                       
                      </thead>
                      <tbody> <br><br>
                  <?php endwhile; ?>
                </tbody> 
            </div> 

            <div style="border-width: 20px; color: black;"> 
            <form method="post" action="details.php?id=<?php echo $data['id']; ?>""
                <fieldset>
                    <label  for="nom"></label>
                    <input  type="text" name="pseudo" id="nom" placeholder="Pseudo" />
                </fieldset>

                <fieldset>
                    <p>
                    </p>
                    <p>
                        <label for="precisions"></label>
                        <textarea placeholder="Comment" name="content" id="precisions" cols="40" rows="4"></textarea>
                    </p>
                </fieldset>
                <div>
                    <input type="submit" class="" name="send" value="Add comment"/>
                </div> 
            </form>
            </div>
            <?php if (isset($c_msg)) {echo $c_msg; }?>
        </div>
    </center>
</body>
</html>