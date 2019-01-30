<?php
  include "header.php";
  require 'bdd.php';

  $page = 'compte';

//Si le membre n'est pas conecte on le redirige
  if (!$_SESSION['connected'] == TRUE) {
      header("Location: connexion.php");
  }

// Recuperer les infos du membre connecte
  if (isset($_SESSION['username'])) {
      $requser = $pdo->prepare('SELECT * FROM user WHERE username = ?');
      $requser->execute(array('username'));
      $userinfo = $requser->fetch();
  }

//Recuperer les dernieres annonces du user
  $stmt = $pdo->prepare("SELECT  id, title, content FROM article WHERE author = :author ");
  $stmt->execute([':author' => $_SESSION['username']]);
?>


<html lang="fr">
    <head>
        <meta charset="UTF-8">

        <!-- STYLES -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css"> 

    </head>
    <body>
    <center>
        <div>
            <?php echo '<h1>Profil de : ' . $_SESSION['username'] . '</h1>'; ?>  
        </div>
 

        <?php
          if (isset($_SESSION['suparticle']) && $_SESSION['suparictile'] == true) {
              echo '<div><p>Votre annonce a bien ete supp</p></div>';
              $_SESSION['suparticle'] = false;
          }
        ?>
        <div class="profil col-xs-10 col-xs-offset-1"> 
            <div >
                <a href="newarticle.php?id=<?php echo $articles['id']; ?>">Poster un article</a> <br><br>

            </div>
        </div>
        <div>
            <div>
                <h3>Mes Articles</h3>
            </div>
        </div>

        <table class="table" style="max-width: 50%;">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($articles = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                      <tr>
                          <td><?php echo $articles['id']; ?></td>
                          <td><?php echo $articles['title']; ?></td>

                          <td>
                              <a href="update.php?id=<?php echo $articles['id']; ?>" name='update'>
                                  Modifier
                              </a>
                              <a href="suparticle.php?id=<?php echo $articles['id']; ?>" name='delete'>
                                  Supprimer
                              </a>
                              <a href="details.php?id=<?php echo $articles['id']; ?>" name='all' target="_blank">
                                  Details
                              </a>
                          </td>
                      </tr>
                  <?php endwhile; ?>
            </tbody>
        </table>

    </center>
</body>
</html>
