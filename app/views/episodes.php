<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <?php
    $title = "Liste des episodes";
    require'head.php';
    ?>
    <body>
      <?php
        if (isset($_SESSION['alias'])) {
          if ($_SESSION['admin'] == 1) {
            require'adminheader.php';
          }
          else{
            require'logedheader.php';
          }
        }
        else {
          require'header.php';
        }
      ?>
      <section class="container paddingtop">
        <?php while($p = $post->fetch()) { ?>
          <div class="card marginlist">
            <img class="card-img-top" src="public/pictures/Alaska.jpg" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title"><?= $p['title'] ?></h5>
            <p class="card-text"><?= $p['message'] ?></p>
            <a class="btn btn-primary" href="?action=article&id=<?= $p['id'] ?>">Lire l'article</a>
          </div>
        </div>
        <?php } ?>
      </section>
      <?php require'footer.php'; ?>
    </body>
</html>
