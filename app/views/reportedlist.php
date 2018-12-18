<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <?php
    $title = "Liste des commentaires signaler";
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
        <h1>Liste des Commentaires signaler</h1>
        <?php while($c = $commentary->fetch()) { ?>
        <div class="rows">
          <div class="card marginlist" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title"></h5>
            <p class="card-text"><?= $c['comment_text'] ?></p>
            <a class="btn btn-success" href="?action=validatecommentary&id=<?= $c['id'] ?>">Valider le Commentaire</a>
            <a class="btn btn-danger" href="?action=deletecommentary&id=<?= $c['id'] ?>">Supprimer le Commentaire</a>
          </div>
        </div>
        <?php } ?>
      </section>
      <?php require'footer.php'; ?>
    </body>
</html>
