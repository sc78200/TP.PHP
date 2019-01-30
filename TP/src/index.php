<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/bootstrap.css"/>


        <title>Forum TP</title>
    </head>
    <?php
      include 'header.php';
    ?>  

    <?php
      $statement = $pdo->prepare('SELECT id, title, author FROM article');
      $statement->execute();
    ?>
    <body>
    <center>
        <h1>Forum</h1> 
        <table class="table" style="max-width: 50%;">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Title</th>
                    <th scope="col">Author</th>
                    <th scope="col">Details</th>
                </tr>
            </thead>
            <tbody>

                <?php while ($data = $statement->fetch(PDO::FETCH_ASSOC)): ?>
                      <tr>
                          <td><?php echo $data['id']; ?></td>
                          <td><?php echo $data['title']; ?></td>
                          <td><?php echo $data['author']; ?></td>

                          <td>
                              <a href="details.php?id=<?php echo $data['id']; ?>">
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




</table>