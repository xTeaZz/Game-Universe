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
        <?php while($c = $category->fetch()) { ?>
        <div class="rows">
          <div class="card marginlist">
          <div class="card-body">
            <h5 class="card-title"><?= $c['category_name'] ?></h5>
            <a class="btn btn-danger" href="?action=deleteCategory&id=<?= $c['id'] ?>">Supprimer la catégorie</a>
          </div>
        </div>
        <?php } ?>
      </section>
      <?php require'footer.php'; ?>
    </body>
</html>
